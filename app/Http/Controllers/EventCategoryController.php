<?php

namespace App\Http\Controllers;

use App\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventCat = EventCategory::paginate(10);
        return view('cms.events.category.index', compact('eventCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.events.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new EventCategory(['name'=>$request->get('name')]);
       $b = $cat->save();

        if ($b)
            flash_message('success', __('string.successful'));
        else
            flash_message('error', __('string.unsuccessful.create'));

        return redirect()->route('eventCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventCategory $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventCategory $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = EventCategory::find($id);
        return view('cms.events.category.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\EventCategory $eventCategory
     * @return EventCategory
     */
    public function update(Request $request, EventCategory $eventCategory)
    {

//        return $eventCategory;
       $b = $eventCategory->update(['name'=>$request->get('name')]);

        if ($b)
            flash_message('success', __('string.successful.edit'));
        else
            flash_message('error', __('string.unsuccessful.edit'));

        return redirect()->route('eventCategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventCategory $eventCategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(EventCategory $eventCategory)
    {
        $b = $eventCategory->delete();

        if ($b)
            flash_message('success', __('string.successful.delete'));
        else
            flash_message('error', __('string.unsuccessful.delete'));


        return back();
    }
}
