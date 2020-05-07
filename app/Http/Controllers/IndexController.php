<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\IPMA;
use App\MembershipType;
use App\News;
use App\Order;
use App\OrderCode;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Ixudra\Curl\Facades\Curl;
use Mail;
use Morilog\Jalali\Jalalian;
use SoapClient;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->limit(2)->get(['id', 'photo', 'title', 'description', 'from_date']);
        $news = News::latest()->limit(3)->get(['id', 'photo', 'title', 'created_at']);
        $ipma = IPMA::latest()->first();
        $eventsWithCats = EventCategory::withCount(["event"])->get();
        $eventsWithCats->transform(function ($category) {
            $category->event = Event::whereHas('category', function ($q) use ($category) {
                $q->where('id', $category->id);
            })
                ->take(3)
                ->get();
            return $category;
        });

//        return $eventsWithCats;

        return view('index', compact('events', 'news', 'ipma', 'eventsWithCats'));
    }

    public function search()
    {
        $titleHeader = $breadcrumb = "جستجو";
        if (\request()->has('search')) {
            $searchString = \request()->get('search');
            $news = News::where("title", "LIKE", "%$searchString%")->get(['id', 'title', 'photo']);
            $events = Event::where("title", "LIKE", "%$searchString%")
                ->orWhere("address", "LIKE", "%$searchString%")
                ->orWhere("tel", "LIKE", "%$searchString%")
                ->orWhere("course_headings", "LIKE", "%$searchString%")
                ->get(['id', 'title', 'photo']);
        } else {
            $news = News::latest()->limit(10)->get(['id', 'title', 'photo']);
            $events = Event::latest()->limit(10)->get(['id', 'title', 'photo']);
        }
        return view('search', compact('titleHeader', 'breadcrumb', 'news', 'events'));
    }

    public function cms()
    {
        $userType1 = User::whereMembershipTypeId(1)->whereRoles(2)->count();
        $userType2 = User::whereMembershipTypeId(2)->whereRoles(2)->count();
        $userType3 = User::whereMembershipTypeId(3)->whereRoles(2)->count();
        $userType4 = User::whereMembershipTypeId(4)->whereRoles(2)->count();

        $newsCount = News::wherestate(1)->count();
        $eventsCount = Event::count();

        $TotalPendingBuy = Order::whereStateId(0)->count();
        $TotalSuccessBuy = Order::whereStateId(1)->count();
        $TotalFailBuy = Order::whereStateId(2)->count();

        $totalProfits = Order::whereStateId(1)->sum('total_price');


        return view('cms.panel', compact('userType1', 'userType2', 'userType3', 'userType4', 'newsCount', 'eventsCount', 'TotalPendingBuy', 'TotalSuccessBuy', 'TotalFailBuy', 'totalProfits'));
    }

    public function callback()
    {
//        $status = true;
//        $status = false;
        $titleHeader = $breadcrumb = 'وضعیت پرداخت';
        return view('call_back', compact('status', 'titleHeader', 'breadcrumb'));
    }

    public function bank()
    {
        return view('bank');
    }

    public function verify(Request $request)
    {
        $MerchantCode = "11175778";
        $date = Jalalian::now()->format('Y/m/d H:i');
        $titleHeader = $breadcrumb = 'وضعیت پرداخت';
        $status = false;
        $type_id = 0;
        $referenceId = ($request->has('ResNum')) ? $request->get('ResNum') : '----';
        if ($request->has('State') && $request->get('State') == "OK") {
            $referenceNumber = $request->get('RefNum');
            $order = Order::whereReferenceId($referenceId);
            if ($order->exists()) {
                $order = $order->first();
                if (($order->get()->first()->total_price) == $request->get('Amount')) {
                    $soapClient = new soapclient('https://verify.sep.ir/Payments/ReferencePayment.asmx?WSDL');
                    $verify = $soapClient->VerifyTransaction($referenceNumber, $MerchantCode);
                    if ($verify > 0) {
                        $order->update([
                            'state_id' => '1',
                            'reference_number' => $referenceNumber,
                        ]);
                        $event = $order->event()->get()->first();
                        $category = persianText($event->category()->get('name')->first()->name);
                        $date = $event->from_date;
                        $address = $event->address;
                        $latitude = $event->latitude;
                        $longitude = $event->longitude;
                        $year = jdate($date)->format('%Y');
                        $month = persianText(jdate($date)->format('%B')) . ' ' . jdate($date)->format('%d');
                        $day = persianText(jdate($date)->format('%A'));
                        $time = jdate($date)->format('H:i') . persianText(" ساعت ");
                        $lines = explode("\n", wordwrap(" محل برگزاری : $address ", 69));
                        switch ($event->event_category_id) {
                            case 1:
                                $type = public_path('img/BO1-red.jpg');
                                break;
                            case 2:
                                $type = public_path('img/BO1-ornge.jpg');
                                break;
                            case 3:
                                $type = public_path('img/BO1-blue.jpg');
                                break;
                            default:
                                $type = public_path('img/BO1-blue.jpg');
                        }
                        foreach ($order->orderCodes()->get() as $orderCode) {
                            $img = Image::make($type);
                            foreach ($lines as $index => $line) {
                                if ($index == 0) {
                                    $y = 950;
                                } else {
                                    $y = 950 + ($index * 30);
                                }
                                $img->text(persianText($line), 650, $y, function (\Intervention\Image\Gd\Font $font) {
                                    $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                    $font->size(25);
                                    $font->color('#424B54');
                                    $font->align('right');
                                    $font->valign('center');
                                    $font->angle(0);
                                });
                            }
                            $img->text($year, 190, 690, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(42);
                                $font->color('#424B54');
                                $font->align('right');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text($month, 420, 700, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(28);
                                $font->color('#424B54');
                                $font->align('right');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text($time, 420, 870, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(28);
                                $font->color('#424B54');
                                $font->align('right');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text($category, 500, 1200, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(35);
                                $font->color('#424B54');
                                $font->align('right');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text($day, 610, 700, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(38);
                                $font->color('#424B54');
                                $font->align('right');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text(persianText($event->title), 340, 510, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(28);
                                $font->color('#424B54');
                                $font->align('center');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text(persianText('مجوز حضور'), 320, 100, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(40);
                                $font->color('#ffffff');
                                $font->align('right');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->insert("https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://maps.google.com/?q=$latitude,$longitude", 'bottom-left', 50, 175);
                            $img->text(persianText($orderCode->name), 340, 250, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(30);
                                $font->color('#424B54');
                                $font->align('center');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $img->text($orderCode->code . persianText("کد :"), 340, 350, function (\Intervention\Image\Gd\Font $font) {
                                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                                $font->size(30);
                                $font->color('#424B54');
                                $font->align('center');
                                $font->valign('bottom');
                                $font->angle(0);
                            });
                            $imageName = $orderCode->id . $order->id . time();
                            $img->save(public_path("img/codes/$imageName.jpg"));
                            OrderCode::find($orderCode->id)->update(['picture' => "$imageName.jpg"]);
                        }
                        $eventName = $event->title;
                        $count = tr_num($order->orderCodes()->count());
                        Curl::to('https://panel.asanak.com/webservice/v1rest/sendsms')
                            ->withData(['username' => 'ipmairan',
                                'password' => 'ipma!@#$%^',
                                'source' => '982188229406',
                                'destination' => auth()->user()->mobile,
                                'message' => "کاربر عزیز بلیت شما برای رویداد $eventName به تعداد $count عدد صادر و به ایمیل شما ارسال شد !"])
                            ->post();
//                        Mail::to(auth()->user()->email)->send(new \App\Mail\OrderEmail($order));
                        $status = true;
                        $date = Jalalian::fromCarbon($order->get()->first()->created_at)->format('Y/m/d H:i');
                        $tickets = $order->orderCodes()->get();
                        return view('call_back', compact('titleHeader', 'breadcrumb', 'status', 'referenceId', 'date', 'tickets', 'type_id'));
                    }
                }
                $order->update(['state_id' => 2]);
                $order->orderCodes()->delete();
            }
        }
        return view('call_back', compact('titleHeader', 'breadcrumb', 'status', 'referenceId', 'date', 'type_id'));
    }


    public function about_us()
    {
        $titleHeader = "درباره انجمن";
        $breadcrumb = "درباره ما";
        return view('about_us', compact('titleHeader', 'breadcrumb'));
    }

    public function branches()
    {
        $breadcrumb = $titleHeader = "معرفی شاخه ها";
        return view('branches', compact('titleHeader', 'breadcrumb'));
    }

    public function research()
    {
        $breadcrumb = $titleHeader = "پژوهش برتر";
        return view('research', compact('titleHeader', 'breadcrumb'));
    }

    public function gifts()
    {
        $breadcrumb = $titleHeader = "کمیته جایزه";
        return view('gifts', compact('titleHeader', 'breadcrumb'));
    }

    public function winners()
    {
        $breadcrumb = $titleHeader = "کارگروه های تخصصی";
        return view('winners', compact('titleHeader', 'breadcrumb', 'id'));
    }

    public function winners_detail($id)
    {
        if ($id > 0 && $id <= 7) {
            $breadcrumb = $titleHeader = "ارزیابان";
            return view('winners_detail', compact('titleHeader', 'breadcrumb', 'id'));
        } else {
            abort(404);
        }
    }

    public function gov()
    {
        $breadcrumb = $titleHeader = "گواهینامه ها";
        return view('gov', compact('titleHeader', 'breadcrumb'));
    }

    public function mainPageShow()
    {
        $ipma = IPMA::get()[0];

        $news = News::find($ipma->news_id);
        $event = Event::find($ipma->event_id);

        return view('cms.main_page', compact('ipma', 'news', 'event'));
    }

    public function mainPageUpdate()
    {
        $request = \Request::except(['_token']);

        $valid = validator($request, [
            'head_title' => 'required | min:3',
            'head_subtitle' => 'required | min:6',
            'head_description' => 'required | min:15 | max:255',
        ], [
            'head_title.*' => 'سرتیتر رویداد نمی تواند خالی باشد و باید بیش از ۳ حرف باشد',
            'head_subtitle.*' => 'عنوان رویداد نمی تواند خالی باشد و باید بیش از ۶ حرف باشد',
            'head_description.*' => 'توضیحات رویداد نمی تواند خالی باشد و باید بین ۱۵ تا ۲۵۵ حرف باشد',
            'event_id.*' => 'لطفا یک رویداد را انتخاب کنید',
            'news_id.*' => 'لطفا یک اخبار را انتخاب کنید',
        ]);


        if ($valid->fails())
            return back()->withErrors($valid)->withInput();


        $ipma = IPMA::query();
        $request = \Request::except(['_token']);

        if ($request['newsOrEvent'] == 1) {
            $request['news_id'] = null;
            if (!\request()->has('event_id')) {
                flash_message("error", "متاسفانه هیچ رویدادی انتخاب نشده است");
                return back()->withInput();
            }

        } else {
            $request['event_id'] = null;
            if (!\request()->has('news_id')) {
                flash_message("error", "متاسفانه هیچ اخباری انتخاب نشده است");
                return back()->withInput();
            }
        }

        unset($request['newsOrEvent'], $request['eventInput'], $request['newsInput']);


        if ($ipma->update($request))
            flash_message("success", "تغییرات با موفقیت ذخیره شد");
        else
            flash_message("error", "متاسفانه خظایی رخ داده است مجددا تلاش کنید");


        return back()->withInput();

    }

    public function mainPageSearch(Request $request)
    {
        $str = $request->get('str');
        $isEvent = ($request->get('type') == 1);


        if ($isEvent)
            $event = Event::where('title', 'like', "%$str%")->orWhere('detail', 'like', "%$str%")->take(20)->get(['id', 'title']);
        else
            $event = News::where('title', 'like', "%$str%")->orWhere('detail', 'like', "%$str%")->take(20)->get(['id', 'title']);

        return $event;
    }


    public function test()
    {
        return "asdhasjdhaskh dkashdajshdkash dahs dasjd kdasd";
    }
}
