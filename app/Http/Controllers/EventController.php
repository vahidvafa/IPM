<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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

        $event = Event::find($id);
        $similars = Event::where("event_category_id",'=',$event->event_category_id)->where('id','!=',$id)->get();
        $titleHeader = $event->title;
        $breadcrumb = "رویداد";
//        return jdate($event->from_date);
        return view('event_detail',compact('event','similars','titleHeader',"breadcrumb"));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
