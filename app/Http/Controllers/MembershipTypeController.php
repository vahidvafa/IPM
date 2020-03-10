<?php

namespace App\Http\Controllers;

use App\MembershipType;
use App\MembershipTypesLog;
use Illuminate\Http\Request;

class MembershipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = MembershipType::all('id','title');

        return view("cms.membership.index",compact('memberships'));
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
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipType $membershipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = MembershipType::findOrFail($id);

        return view("cms.membership.edit",compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = validator($request->all(),[
            'title'=>'bail | required | string ',
            'price'=>'bail | required | integer ',
            'period'=>'bail | required | integer ',
        ],[
            'title'=>'عنوان نمی تواند خالی باشد',
            'price'=>'قیمت باید عدد باشد',
            'period'=>'عدد وارد کنید',

        ]);

        if ($validate->fails()) {
            flash_message("error","لطفا فیلد ها را به درستی پر کنید");
            return back()->withErrors($validate)->withInput();
        }


        $membershipType = MembershipType::findOrFail($id);

        $typeLog = new MembershipTypesLog([
            'user_id'=>auth()->id(),
            'old_price'=>$membershipType->price,
            'new_price'=>$request->get('price'),
            'old_period'=>$membershipType->period,
            'new_period'=>$request->get('period'),
            'old_title'=>$membershipType->title,
            'new_title'=>$request->get('title'),


            ]
        );



        if ($typeLog->save()) {
            flash_message("success","با موفقیت انجام شد");
            $membershipType->update($request->all());
        }
else {
    flash_message("error","متسفاه عملیات پیرایش  به خاظر گرفتن نسخه پشتیبان از تغییرات با مشکل مواجه شده است");
}
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembershipType $membershipType)
    {
        //
    }
}
