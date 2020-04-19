<?php

namespace App\Http\Controllers;

use App\Event;
use App\Exports\OrdersExport;
use App\Order;
use App\OrderCode;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
//        $date = "۱۳۹۹/۰۲/۰۱ ۰۲:۳۶";
//        $referenceId = "132";
//        $status = false;
//        return view('call_back',compact('status','date','referenceId'));
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
        $referenceId = mt_rand(1000, 100000);
        $order = new Order([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'total_price' => $totalPrice,
            'reference_id' => $referenceId,
        ]);
        $status = \DB::transaction(function () use ($users, $order,$event) {
            $order->save();
            foreach ($users as $user) {
                $code = $event->event_category_id.'-'.mt_rand(1000, 100000);
                while (OrderCode::whereCode($code)->exists()) {
                    $code = $event->event_category_id.'-'.mt_rand(1000, 100000);
                }
                $orderCode = new OrderCode([
                    'name' => $user['name'],
                    'mobile' => $user['mobile'],
                    'email' => $user['email'],
                    'code' => $code
                ]);
                $order->orderCodes()->save($orderCode);
            }
            return true;
        });
        $titleHeader = $event->title;
        $breadcrumb = "دریافت بلیط رویداد";
        if ($status) {
            $date = Jalalian::fromCarbon($order->created_at)->format('Y/m/d H:i');
            $tickets = $order->orderCodes()->get();
            return view('call_back',compact('status','date','referenceId','tickets','titleHeader','breadcrumb'));
        }
        $date = jdate()->format('Y/m/d H:i');
        $status = false;
        $referenceId = "----";
        return view('call_back',compact('status','date','referenceId','titleHeader','breadcrumb'));
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
}
