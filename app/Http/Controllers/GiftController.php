<?php

namespace App\Http\Controllers;

use App\Event;
use App\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::latest()->with(['event'])->paginate(10);
        return view('cms.gift.index',compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('cms.gift.create',compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'event_id'=> ' required | numeric',
           'type_id'=> ' required | numeric',
           'price'=> ' required | numeric',
           'maximum_count'=> ' nullable | numeric',
           'minimum_price'=> ' nullable | numeric',
           'maximum_price'=> ' nullable | numeric',
           'members_usage'=> ' required | numeric',
           'from_date'=> ' nullable | numeric',
           'to_date'=> ' nullable | numeric',
        ],[
            '*.required' =>'وارد کردن این فیلد الزامی است',
            '*.numeric' =>'فرمت این فیلد اشتباه است',
        ]);
        try{
            $code = Str::upper(Str::random(7));
            while (Gift::whereCode($code)->exists()){
                $code = Str::random(7);
            }
            $request->merge([
                'maximum_count' => ($request->get('maximum_count') == null) ? 0 : $request->get('maximum_count'),
                'minimum_price' => ($request->get('minimum_price') == null) ? 0 : $request->get('minimum_price'),
                'maximum_price' => ($request->get('maximum_price') == null) ? 0 : $request->get('maximum_price'),
                'from_date' => ($request->get('from_date_display') == null) ? 0 : $request->get('from_date'),
                'to_date' => ($request->get('to_date_display') == null) ? 0 : $request->get('to_date'),
            ]);
            $gift = new Gift($request->all());
            $gift->code = $code;
            $gift->save();
            flash_message('success', __('string.successful'));
            return redirect()->route('gift.index');
        }catch (\Exception $exception){
            flash_message('error', __('string.unsuccessful'));
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gift $gift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        try {
            $gift->delete();
            flash_message('success', __('string.successful.delete'));
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
        }
        return back();
    }
}
