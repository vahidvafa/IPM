<?php

namespace App\Http\Controllers;

use App\Event;
use App\Exports\OrdersExport;
use App\Gift;
use App\Order;
use App\OrderCode;
use App\UsedGift;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Jalalian;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Order::query();

        if ($request->has('payState')) {

            $user = $request->get('user');
            $orders->orWhereHas("user", function ($query) use ($user) {

                $query->where('first_name', 'like', "%" . $user . "%")
                    ->orWhere('last_name', 'like', "%" . $user . "%")
                    ->orWhere('email', 'like', "%" . $user . "%")
                    ->orWhere('mobile', 'like', "%" . $user . "%")
                    ->orWhere('user_code', 'like', "%" . $user . "%");

            });

            if ($request->get('payState') != -100)
                $orders->where('state_id', '=', "" . $request->get('payState') . "");

            if (!empty($request->get('ref_id')))
                $orders->where('reference_id', '=', "" . $request->get('ref_id') . "");


        }


        $orders = $orders->with(['orderCodes', 'user' => function ($query) {
            $query->get(['id', 'first_name', 'last_name']);
        }])->latest()->paginate(20)->appends($request->all());


        return view('cms.buy_report', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        if (time() <= $event->start_register_date && time() >= $event->to_date)
            abort(404);
        $validator = \Validator::make($request->all(), [
            'users.*.name' => 'required',
            'users.*.mobile' => 'required',
            'users.*.email' => 'bail | required | string | email | max:255',
        ], [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            '*.email' => 'فرمت ایمیل اشتباه است',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator->errors());
        }
        $users = $request->get('users');
        $totalPrice = count($users) * $event->price;
        $referenceId = $event->id . time();
        $eventName = $event->title;
        $order = new Order([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'total_price' => $totalPrice,
            'reference_id' => $referenceId,
            'comment' => " تهیه مجوز ورود برای رویداد $eventName"
        ]);
        $status = \DB::transaction(function () use ($users, $order, $event, $request) {
            $order->save();
            foreach ($users as $user) {
                $code = $event->event_category_id . '-' . mt_rand(1000, 100000);
                while (OrderCode::whereCode($code)->exists()) {
                    $code = $event->event_category_id . '-' . mt_rand(1000, 100000);
                }
                $orderCode = new OrderCode([
                    'name' => $user['name'],
                    'mobile' => $user['mobile'],
                    'email' => $user['email'],
                    'code' => $code
                ]);
                $order->orderCodes()->save($orderCode);
            }
            if (!is_null($request->get('gift'))) {
                try {
                    $giftCode = Gift::whereEventId($event->id)->whereCode($request->get('gift'))->firstOrFail();
                    $find = true;
                } catch (ModelNotFoundException $exception) {
                    $find = false;
                }
                if ($find) {
                    if ($giftCode->from_date->unix == 0 || $giftCode->from_date->unix <= time()) {
                        if ($giftCode->to_date->unix == 0 || $giftCode->to_date->unix >= time()) {
                            if ($giftCode->minimum_price == 0 || $giftCode->minimum_price <= $order->total_price) {
                                if ($giftCode->maximum_price == 0 || $giftCode->maximum_price >= $order->total_price) {
                                    if (($giftCode->maximum_count == 0) || ($giftCode->maximum_count != 0 && $giftCode->maximum_count > UsedGift::whereGiftId($giftCode->id)->count())) {
                                        if ($giftCode->members_usage == 1 || auth()->user()->active == 2) {
                                            if ($giftCode->type_id == 1) {
                                                $finalPrice = $order->total_price * (1 - $giftCode->price);
                                            } else {
                                                $finalPrice = $order->total_price - $giftCode->price;
                                            }
                                            $usedGift = new UsedGift([
                                                'gift_id' => $giftCode->id,
                                                'order_id' => $order->id,
                                                'total_order_price' => $order->total_price
                                            ]);
                                            $usedGift->save();
                                            $order->update([
                                                'total_price' => $finalPrice
                                            ]);
                                            return true;
                                        } else
                                            $msg = __('string.gift.error.members_usage');
                                    } else
                                        $msg = __('string.gift.error.maximum_count');
                                } else
                                    $msg = __('string.gift.error.maximum_price');
                            } else
                                $msg = __('string.gift.error.minimum_price');
                        } else
                            $msg = __('string.gift.error.to_date');
                    } else
                        $msg = __('string.gift.error.from_date');
                } else
                    $msg = __('string.gift.error.exist');

                $order->delete();
                $request->request->add(['gift_error' => $msg]);
                return false;
            } else {
                return true;
            }
        });

        if ($status) {
            $titleHeader = $event->title;
            $breadcrumb = "دریافت مجوز رویداد";
            $price = $order->total_price;
            $resNum = $order->reference_id;
            $comment = $order->comment;
            $merchantCode = '11175778';
            $redirectURL = route('verifyBank');
            if ($price == 0 ){
                \Session::put('freeOrder',$order->reference_id);
                return redirect('verifyBank');
            }
            return view('bank', compact('titleHeader', 'breadcrumb', 'price', 'resNum', 'merchantCode', 'redirectURL', 'comment'));
        } else {
            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function export($event_id)
    {
        return Excel::download(new OrdersExport($event_id), 'orders.xlsx');
    }

    public function exportAll()
    {
        return Excel::download(new OrdersExport(0), 'orders.xlsx');
    }

}
