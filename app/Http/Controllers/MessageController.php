<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('cms.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titleHeader = "تماس با انجمن مدیریت پروژه ایران";
        $breadcrumb = "تماس با انجمن";
        return view('contact_us', compact('titleHeader', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required', 'detail' => 'required',], ['*.required' => 'وارد کردن این فیلد الزامی است']);
        try {
            Message::create($request->all());
            return back();
        } catch (\Exception $exception) {
            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        try {
            $message->delete();
            flash_message('success', __('string.successful.delete'));
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
        }
        return back();
    }
}
