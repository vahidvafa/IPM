<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\IPMA;
use App\MembershipType;
use App\News;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;

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
        $eventsWithCats->transform(function($category) {
            $category->event = Event::whereHas('category', function($q) use($category) {
                $q->where('id', $category->id);
            })
                ->take(3)
                ->get();
            return $category;
        });

//        return $eventsWithCats;

        return view('index', compact('events', 'news', 'ipma','eventsWithCats'));
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
        $status = true;
//        $status = false;
        $titleHeader = $breadcrumb = 'وضعیت پرداخت';
        return view('call_back', compact('status', 'titleHeader', 'breadcrumb'));
    }

    public function bank()
    {
        dd(response(auth()->user()->profile()->get()->first()));
        $price = (int)MembershipType::whereId(auth()->user()->membership_type_id)->get('price')->first()->price;
//        dd($price);
        return Payment::purchase(
            (new Invoice)->amount($price),
            function ($driver, $transactionId) {
                // store transactionId in database.
                // we need the transactionId to verify payment in future
            }
        )->pay();
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
        return view('winners', compact('titleHeader', 'breadcrumb','id'));
    }

    public function winners_detail($id)
    {
        if ($id > 0 && $id <= 7){
            $breadcrumb = $titleHeader = "ارزیابان";
            return view('winners_detail', compact('titleHeader', 'breadcrumb','id'));
        }else{
            abort(404);
        }
    }

    public function gov()
    {
        $breadcrumb = $titleHeader = "گواهینامه ها";
        return view('gov', compact('titleHeader', 'breadcrumb'));
    }

    public function newsEventShow(){
        $ipma = IPMA::get(['head_title','head_subtitle','head_description','event_id','news_id'])[0];

        return view('cms.main_news_event',compact('ipma'));
    }

    public function newsEventUpdate(){
        $request = \Request::except(['_token']);

        $valid = validator($request,[
            'head_title'=>'required | min:3',
            'head_subtitle'=>'required | min:6',
            'head_description'=>'required | min:15 | max:255',
        ],[
            'head_title.*'=>'سرتیتر رویداد نمی تواند خالی باشد و باید بیش از ۳ حرف باشد',
            'head_subtitle.*'=>'عنوان رویداد نمی تواند خالی باشد و باید بیش از ۶ حرف باشد',
            'head_description.*'=>'توضیحات رویداد نمی تواند خالی باشد و باید بین ۱۵ تا ۲۵۵ حرف باشد',
            'event_id.*'=>'لطفا یک رویداد را انتخاب کنید',
            'news_id.*'=>'لطفا یک اخبار را انتخاب کنید',
        ]);

        if ($valid->fails())
            return back()->withErrors($valid)->withInput();



        $ipma = IPMA::query();
        $request = \Request::except(['_token']);

        if ($request['newsOrEvent'] == 1) {
            unset($request['news_id']);
            if (is_numeric($request['event_id']) !=null ) {
                flash_message("error","متاسفانه هیچ رویدادی انتخاب نشده است");
                return back()->withInput();
            }

        } else{
            unset($request['event_id']);
            if (is_numeric($request['news_id']) !=null ) {
                flash_message("error", "متاسفانه هیچ اخباری انتخاب نشده است");
                return back()->withInput();
            }
        }

//        return $request;

        if ($ipma->update($request))
            flash_message("success","تغییرات با موفقیت ذخیره شد");
        else
            flash_message("error","متاسفانه خظایی رخ داده است مجددا تلاش کنید");


        return back()->withInput();

    }

    public function newsEventSearch(Request $request){
        $str = $request->get('eventInput');
        $isEvent = ($request->get('type') == 1);

        if ($isEvent)
        $event = Event::where('title','like',"%$str%")->orWhere('detail','like',"%$str%")->take(20)->get(['id','title']);
        else
        $event = News::where('title','like',"%$str%")->orWhere('detail','like',"%$str%")->take(20)->get(['id','title']);

        return $event;
    }

}
