<?php

namespace App\Http\Controllers;

use App\PassedCourses;
use App\PassedCoursesCategory;
use Illuminate\Http\Request;

class PassedCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PassedCoursesCategory = PassedCoursesCategory::get();
        $PassedCourses = PassedCourses::latest()->paginate(20);

        return view('cms.PassedCourses.index', compact('PassedCourses', 'PassedCoursesCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PassedCoursesCategory = PassedCoursesCategory::get();

        return view('cms.PassedCourses.create', compact('PassedCoursesCategory'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'title' => "bail | required |min:4",
            'content' => "bail | required |min:6"
        ], [
            'title' => "عنوان باید بیش از ۴ حرف باشد",
            'content' => "متن باید بیش از ۶ حرف باشد"
        ]);


        $passedCourses = new PassedCourses($request->all());
        $passedCourses = $passedCourses->save($request->all());

        flash_message($passedCourses ? "success" : "error", $passedCourses ? "باموفقیت ثبت شد" : "خطا متاسفانه عملیات درج با مشکل مواجح شد");

        return back()->withErrors($validate)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PassedCourses $passedCourses
     * @return \Illuminate\Http\Response
     */
    public function show(PassedCourses $passedCourses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PassedCourses $passedCourses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $PassedCoursesCategory = PassedCoursesCategory::get();
        $PassedCourse = PassedCourses::findOrFail($id);

        return view('cms.PassedCourses.edit', compact('PassedCourse', 'PassedCoursesCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PassedCourses $passedCourses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassedCourses $passedCourses, $id)
    {
        $validate = validator($request->all(), [
            'title' => "bail | required |min:4",
            'content' => "bail | required |min:6"
        ], [
            'title' => "عنوان باید بیش از ۴ حرف باشد",
            'content' => "متن باید بیش از ۶ حرف باشد"
        ]);

        $passedCourses = PassedCourses::findOrFail($id);
        if ($passedCourses != null)
            $passedCourses = $passedCourses->update($request->all());

        flash_message($passedCourses ? "success" : "error", $passedCourses ? "باموفقیت ویرایش شد" : "خطا متاسفانه عملیات ویرایش با مشکل مواجح شد");

        return back()->withErrors($validate)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PassedCourses $passedCourses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $passedCourses = PassedCourses::findOrFail($id);
        if ($passedCourses != null)
            $passedCourses->delete();

        flash_message($passedCourses ? "success" : "error", $passedCourses ? "باموفقیت حذف شد" : "خطا متاسفانه عملیات حذف با مشکل مواجح شد");

        return back();
    }

    public function relationUserCourse()
    {
        $PassedCoursesCategory = PassedCoursesCategory::get();
        $PassedCourses = PassedCourses::get();

        return view('cms.PassedCourses.user_course_relation', compact('PassedCourses', 'PassedCoursesCategory'));
    }

}

