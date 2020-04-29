<?php

namespace App\Http\Controllers;

use App\PassedCourses;
use App\PassedCoursesCategory;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\RequestAttributeValueSame;
use test\Mockery\Adapter\Phpunit\BaseClassStub;

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

    public function storeCourseForUser(Request $request)
    {
        $validate = validator($request->all(), [
            'selectedUser' => "bail | required | min:1",
            'course' => "bail | required | array"
        ], [
            'selectedUser.*' => "لطفا یک کاربر را انتخاب کنید",
            'course.*' => "حداقل یک دسته بندی را انتخاب کنید"
        ]);

        $passedCourses = false;
        if (!$validate->fails()) {
            $user = User::find($request->get('selectedUser'));
            $user->passedCourse()->attach($request->get('course'));
            $passedCourses = true;
        }

        flash_message($passedCourses ? "success" : "error", $passedCourses ? "باموفقیت ثبت شد" : "خطا متاسفانه عملیات درج با مشکل مواجه شد");
        return back()->withErrors($validate)->withInput();
    }


    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'title' => "bail | required | min:4",
            'content' => "bail | required | min:6"
        ], [
            'title.*' => "عنوان باید بییش از ۴ حرف باشد",
            'content.*' => "محتوا باید بیش از ۶ حرف باشد"
        ]);

        if (!$validate->fails()) {
            $passCourse = new PassedCourses($request->all());
            $passCourse->save();
        }

        flash_message(isset($passCourse) ? "success" : "error", isset($passCourse) ? "باموفقیت ثبت شد" : "خطا متاسفانه عملیات درج با مشکل مواجه شد");
        return back()->withErrors($validate)->withInput();

    }


    public function storeSk(Request $request)
    {
        $validate = validator($request->all(), [
            'content' => "bail | required | min:6"
        ], [
            'content.*' => "محتوا باید بیش از ۶ حرف باشد"
        ]);

        if (!$validate->fails()) {

            $passCourse = PassedCourses::whereUserId($request->get('user_id'))->get();
            if (count($passCourse) == 0) {
                $passCourse = new PassedCourses($request->except('_token'));
                $passCourse = $passCourse->save();
            }
            else {
                $passCourse = PassedCourses::find($passCourse[0]->id)->update($request->except('_token'));
            }
        }

//        return PassedCourses::whereUserId($request->get('user_id'))->get();

        flash_message(isset($passCourse) ? "success" : "error", isset($passCourse) ? "باموفقیت ثبت شد" : "خطا متاسفانه عملیات درج با مشکل مواجه شد");
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

        flash_message($passedCourses ? "success" : "error", $passedCourses ? "باموفقیت ویرایش شد" : "خطا متاسفانه عملیات ویرایش با مشکل مواجه شد");

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

        flash_message($passedCourses ? "success" : "error", $passedCourses ? "باموفقیت حذف شد" : "خطا متاسفانه عملیات حذف با مشکل مواجه شد");

        return back();
    }

    public function relationUserCourse()
    {
        $PassedCoursesCategory = PassedCoursesCategory::get();

        $PassedCourse = PassedCourses::wherePassedCoursesCategoryId($PassedCoursesCategory->first->get()->id)->get();

        return view('cms.PassedCourses.user_course_relation', compact('PassedCoursesCategory', 'PassedCourse'));
    }

    public function getCouseByCat(Request $request)
    {

        if ($request->get('cat_id') == null)
            return makeMsgCode(false, "دیتای ارسالی نادرست", 500);


        return PassedCourses::wherePassedCoursesCategoryId($request->get('cat_id'))->get(['id', 'title']);

    }


    public function PassedCoursesByUserSk($id)
    {
        $passedCourses = PassedCourses::whereUserId($id)->first();

        return view('cms.PassedCourses.create_edit_skeditor', compact('passedCourses'));

    }


    public function PassedCoursesByUser($id)
    {

        $user = User::findOrFail($id);
        $name = $user->first_name . " " . $user->last_name;
        $user = $user->passedCourse()->get();

        $PassedCoursesCategory = PassedCoursesCategory::get();

        $PassedCourse = PassedCourses::wherePassedCoursesCategoryId($PassedCoursesCategory->first->get()->id)->get();

        return view('cms.PassedCourses.user_passedCourse', compact('user', 'name', 'PassedCoursesCategory', 'PassedCourse', 'id'));
    }


    public function destroyCourseForUser(Request $request)
    {


        User::find($request->get('user'))->passedCourse()->detach($request->get('course'));

        return back();

    }

}

