<?php

namespace App\Http\Controllers;

use App\MainPageSponsor;
use Illuminate\Http\Request;

class MainPageSponsorController extends Controller
{

    public function edit()
    {
        $sponsors = MainPageSponsor::all();

        return view('cms.mainPage.sponsor.edit', compact('sponsors'));
    }


    public function store(Request $request){

        $this->validate($request,[
            "url"=>'required | string | nullable',
            "photo"=>'required'
        ],[
            "*.required"=>"پر کردن این فیلد اجباریست"
        ]);

        $imageName = time().'.' . $request->file('photo')->getClientOriginalExtension();


        $request->file('photo')->move(public_path('img/sponsor'), $imageName);


        $sponsor  = new MainPageSponsor(["url"=>$request->get('url'),'photo'=>$imageName]);

        $result = $sponsor->save();

        if ($result)
            flash_message('success', "با موفقیت ذخیره شد");
        else
            flash_message('error', "خطا لطفا مجددا تلاش کنید");

        return back();

    }

    public function destroy($id)
    {

        $result = MainPageSponsor::find($id);

        if (file_exists(public_path("img/sponsor/$result->photo")))
        unlink(public_path("img/sponsor/$result->photo"));
        
        $result = $result->delete();
        
        if ($result)
            flash_message('success', "با موفقیت حذف شد");
        else
            flash_message('error', "خطا لطفا مجددا تلاش کنید");


        return back();
    }
}
