<?php

namespace App\Http\Controllers;

use App\Committee;
use App\Event;
use App\IPMA;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\QuestionHelper;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexJs()
    {

        return Event::get();
    }

    public function index()
    {
        $events = Event::latest()->paginate(15);
        $titleHeader = $breadcrumb = "لیست تمام رویداد ها";
        return view('events', compact('events', 'titleHeader', 'breadcrumb'));
    }

    public function indexCms()
    {
        $events = Event::latest()->paginate(10);
        return view('cms.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $committee = Committee::all();
        return view('cms.events.create',compact('committee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "course_headings" => "required",
            "detail" => "required",
            "from_date" => "required | numeric | lte:to_date",
            "to_date" => "required | numeric | gte:from_date",
            "start_register_date" => "required | numeric",
            "price" => "required | integer",
            "province_id" => "required | integer",
            "event_category_id" => "required | integer",
            /*"branch_id" => "required | integer",
            "committee_id" => "required | integer",
            "working-group_id" => "required | integer",*/
            "tel" => "required | numeric",
            "address" => "required",
            "latitude" => "required | numeric",
            "longitude" => "required | numeric",
            "image" => "required | image",
        ], [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            '*.numeric' => 'این فیلد باید عدد باشد',
            'from_date.*' => 'فرمت تاریخ انتخابی صحیح نمی باشد',
            'to_date.*' => 'فرمت تاریخ انتخابی صحیح نمی باشد',
            'start_register_date.*' => 'فرمت تاریخ انتخابی صحیح نمی باشد'
        ]);
        try {
            $event = new Event($request->all());
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img/posts'), $imageName);
            $event->photo = $imageName;
            $event->user_id = (auth()->check()) ? auth()->id() : 0;
            $event->save();
            flash_message('success', __('string.successful'));
            return redirect()->route('event.index');
        } catch (\Exception $exception) {

            flash_message('error', __('string.unsuccessful'));
            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*     $events = Event::all();
     foreach ($events as $event){
         $event->title.="$event->id";
         $event->description.="$event->id";
         $event->detail.="$event->id";
         $event->course_headings.="$event->id";
         $event->address.="$event->id";
         $event->price.=$event->id;
         $event->photo ="popular$event->id.jpg";
         $event->save();
     }
return;*/

        $event = Event::findOrFail($id);
        $similars = Event::where("event_category_id", '=', $event->event_category_id)->where('id', '!=', $id)->get();
        $titleHeader = $event->title;
        $breadcrumb = "رویداد";
//        return jdate($event->from_date);
        return view('event_detail', compact('event', 'similars', 'titleHeader', "breadcrumb"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $committee = Committee::all();
        return view('cms.events.edit', compact('event','committee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "detail" => "required",
            "from_date" => "required | numeric | lte:to_date",
            "to_date" => "required | numeric | gte:from_date",
            "start_register_date" => "required | numeric",
            "price" => "required | integer",
            "province_id" => "required | integer",
            "event_category_id" => "required | integer",
            /*"branch_id" => "required | integer",
            "committee_id" => "required | integer",
            "working-group_id" => "required | integer",*/
            "tel" => "required | numeric",
            "address" => "required",
            "latitude" => "required | numeric",
            "longitude" => "required | numeric",
            "image" => "nullable | image",
        ], [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            '*.numeric' => 'این فیلد باید عدد باشد',
            'from_date.*' => 'فرمت تاریخ انتخابی صحیح نمی باشد',
            'to_date.*' => 'فرمت تاریخ انتخابی صحیح نمی باشد',
            'start_register_date.*' => 'فرمت تاریخ انتخابی صحیح نمی باشد'
        ]);


        try{
            $event->update($request->all());
            if ($request->has('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/img/posts'), $imageName);
                $event->photo = $imageName;
            }
            $event->user_id = auth()->id();
            $event->save();


            flash_message('success', __('string.successful'));
            return redirect()->route('event.index');
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
            return back()->withInput($request->all());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();
            flash_message('success', __('string.successful.delete'));
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
        }
        return back();
    }

    public function orders(Event $event)
    {
        $orders = $event->orders()->where('state_id', 1)->with(['user'])->paginate(10);
        return view('cms.events.orders', compact('event', 'orders'));
    }

    public function reserve(Event $event)
    {
        $titleHeader = $event->title;
        $breadcrumb = "ثبت نام در رویداد";
        if (time() >= $event->start_register_date && time() <= $event->to_date)
            return view('reserve', compact('titleHeader', 'breadcrumb', 'event'));
        else
            abort(404);
    }
}
