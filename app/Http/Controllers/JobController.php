<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobsCategory;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use Symfony\Component\Console\Input\Input;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $contract_type = array("همه موارد", "تمام وقت", "نیمه وقت", "قراردادی / پروژه ای",);
        $work_experience = array("همه موارد", "زیر ۲ سال", "بین ۲ تا ۵ سال", "بین ۵ تا ۸ سال", "۸ سال به بالا");
        $education = array("تفاوتی ندارد", "دیپلم", "کاردانی", "کارشناسی", "کارشناسی ارشد", "دکترا");

        $jobs = Job::query();

        if ($request->has("cats")) {

//            return $request->get("cats");

            if ($request->get("cats") != "-100")
                $jobs->where("jobsCategory_id", "=", $request->get("cats"));

            if ($request->get("contract_type") != $contract_type[0])
                $jobs->where("contract_type", "=", $request->get("contract_type"));

            if ($request->get("work_experience") != $work_experience[0])
                $jobs->where("work_experience", "=", $request->get("work_experience"));

            if ($request->get("education") != $education[0])
                $jobs->where("education", "=", $request->get("education"));

            if ($request->get('sex') != "-1")
                $jobs->where("sex", "=", $request->get("sex"));

        }

        $jobs = $jobs->whereState(1)->with('province', "jobCategory")->latest('id')->paginate(15)
            ->appends(['cats' => $request->get("cats"), 'contract_type' => $request->get("contract_type"), 'work_experience' => $request->get("work_experience"), 'education' => $request->get("education"), 'sex' => $request->get("sex")],
                null);
        $cats = JobsCategory::all();

        $myJobs = Job::whereUserId(auth()->id() ?? -1)->latest()->paginate(15);


        $breadcrumb = "فرصت های شغلی";
        $titleHeader = "فرصت های شغلی";

        return view("job.jobs", compact("jobs", "cats", 'myJobs', 'titleHeader','breadcrumb', 'contract_type', 'work_experience', 'education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!auth()->check() || auth()->user()->active != 2){
            abort(404,'شما مجاز به دیدن این صفحه نمی باشید');
        }
        $province = Province::all();
        $cats = JobsCategory::all();

        $contract_type = array("همه موارد", "تمام وقت", "نیمه وقت", "قراردادی / پروژه ای",);
        $work_experience = array("همه موارد", "زیر ۲ سال", "بین ۲ تا ۵ سال", "بین ۵ تا ۸ سال", "۸ سال به بالا");
        $education = array("فرقی نمی کن", "دیپلم", "کاردانی", "کارشناسی", "کارشناسی ارشد", "دکترا");

        $breadcrumb = "ثبت فرصت شغلی";
        $titleHeader = "ثبت فرصت شغلی";

        return view("job.create", compact('province', 'cats', 'contract_type', 'work_experience', 'education', 'breadcrumb','titleHeader'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = validator($request->all(), [
            'title' => 'bail |required||min:4',
            'content' => 'bail |required|min:10',
            'province_id' => 'bail |required|integer',
            'jobsCategory_id' => 'bail |required|integer',
        ], [
            "title.*" => "فیلد عنوان نمی تواند خالی باشدو باید بیش از ۴ حرف باشد",
            'content.*' => "توضیحات نمی تواند خالی باشد و باید بیش از ۱۰ حرف باشد",
            'province_id.*' => 'لطفا یک شهر را انتخاب کنید',
            'jobsCategory_id.*' => 'لطفا یک دسته بندی را انتخاب کنید',
        ]);
        if (auth()->check()) {
            if (!$validate->fails()) {
                $job = new Job($request->except(['image']));
                $job->user_id = auth()->id();
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/img/job'), $imageName);
                $job->company_logo = $imageName;
                $job->save();
                return back()->withErrors($validate)->withInput([])->with("success",[true,"فرصت شغلی شما به درستی درج شد. لطفا منتظر تایید از سوی انجمن باشید"]);
            }else
            return back()->withErrors($validate)->withInput()->with("success",[false,"لطفا فرم را به درستی پر کنید"]);
        } else {
            auth()->logout();
            return route('main');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $job = Job::with(['province', "jobCategory",'requests'])->findOrFail($id);

        if (auth()->check()){
            $user = User::find(auth()->id());
            if ($user->roles == 2 && $job->user_id != $user->id)
                return abort('404');

            if ($job->user_id == $user->id){
                return redirect()->route('job.edit',$job->id);
            }

        }else {
            return abort('404');
        }

        $breadcrumb = "توضیحات فرصت شغلی";
        $titleHeader = "";
        $similar = [];
        if ($job != null) {
            if ($job->state == 1)
                $job->save(["visibility_count " => $job->visibility_count++]);
            $titleHeader = $job->title;
            $similar = Job::whereState(1)->with('province')->where('jobsCategory_id', '=', $job->jobsCategory_id)->get(['id', 'province_id', "title", 'work_experience', 'education', 'company_logo'])->take(10);
        }

        return view('job.job_detail', compact("job", "titleHeader", "breadcrumb", 'similar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contract_type = array("همه موارد", "تمام وقت", "نیمه وقت", "قراردادی / پروژه ای",);
        $work_experience = array("همه موارد", "زیر ۲ سال", "بین ۲ تا ۵ سال", "بین ۵ تا ۸ سال", "۸ سال به بالا");
        $education = array("فرقی نمی کن", "دیپلم", "کاردانی", "کارشناسی", "کارشناسی ارشد", "دکترا");

        $job = Job::with('province', "jobCategory")->findOrFail($id);

        $similar = [];

        if ($job != null) {

            if (auth()->check() && auth()->id() == $job->user_id) {
                $titleHeader = $job->title;
                $similar = Job::with('province')->where('jobsCategory_id', '=', $job->jobsCategory_id)->get(['id', 'province_id', "title", 'work_experience', 'education', 'company_logo'])->take(5);
            } else {
                $job = null;

            }
        }

        $province = Province::all();

        $cats = JobsCategory::all(['id', 'title']);

        $breadcrumb = "ویرایش فرصت شغلی من";
        $titleHeader = "ویرایش فرصت شغلی من";

        return view( 'job.job_edit', compact('job', 'breadcrumb', 'titleHeader', 'similar', "cats", 'contract_type', 'work_experience', 'education', 'province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validate = validator($request->all(), [
            'title' => 'bail |required||min:4',
            'content' => 'bail |required|min:10',
            'province_id' => 'bail |required|integer',
            'jobsCategory_id' => 'bail |required|integer',
        ], [
            "title.*" => "فیلد عنوان نمی تواند خالی باشدو باید بیش از ۴ حرف باشد",
            'content.*' => "توضیحات نمی تواند خالی باشد و باید بیش از ۱۰ حرف باشد",
            'province_id.*' => 'لطفا یک شهر را انتخاب کنید',
            'jobsCategory_id.*' => 'لطفا یک دسته بندی را انتخاب کنید',
        ]);

        $res[2] = [];
        $job = Job::find($id);
        if ($job != null) {
            $job->state = 0;
            if (auth()->check() && auth()->id() == $job->user_id) {
                if (!$validate->fails()) {
                    if ($job->update($request->except(['image']))) {
                        if ($request->has('image'))
                        $request->file('image')->move(public_path('/img/job'), $job->company_logo);
                        $res = [true, "فرصت شغلی مورد نظر با موفقیت ویرایش شد"];
                    }
                    else
                        $res = [false . "خطا! متاسفانه در این لحظه سیستم قادر به ویرایش این فرصت شغلی نمی باشد"];
                } else
                    $res = [false, "لطفا فرم را به درستی پر کنید"];
            } else
                $res = [false . "خطا! متاسفانه این فرصت شغلی برای شما نمیباشد"];
        } else
            $res = [false, "متاسفانه فرصت شغلی مورد نظر برای ویرایش پیدا نشد"];


        return back()->withErrors($validate)->withInput()->with("success", $res);

    }

    /** fiter update
     * Remove the specified resource from storage.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $status = Job::whereId($id)->delete();
        return back()->with("success", [$status, $status ? 'فرصت شغلی مورد نظر با موفقیت حذف شد' : "حطا! متاسفانه درخواست شما با خطا مواجه شده است. لطفا مجددا تلاش کنید"]);
    }


    public function indexCms(Request $request){
        $contract_type = array("همه موارد", "تمام وقت", "نیمه وقت", "قراردادی / پروژه ای",);
        $work_experience = array("همه موارد", "زیر ۲ سال", "بین ۲ تا ۵ سال", "بین ۵ تا ۸ سال", "۸ سال به بالا");
        $education = array("تفاوتی ندارد", "دیپلم", "کاردانی", "کارشناسی", "کارشناسی ارشد", "دکترا");

        $jobs = Job::query();

        if ($request->has("cats")) {

//            return $request->get("cats");

            if ($request->get("cats") != "-100")
                $jobs->where("jobsCategory_id", "=", $request->get("cats"));

            if ($request->get("contract_type") != $contract_type[0])
                $jobs->where("contract_type", "=", $request->get("contract_type"));

            if ($request->get("work_experience") != $work_experience[0])
                $jobs->where("work_experience", "=", $request->get("work_experience"));

            if ($request->get("education") != $education[0])
                $jobs->where("education", "=", $request->get("education"));

            if ($request->get('sex') != "-1")
                $jobs->where("sex", "=", $request->get("sex"));

        }

        $jobs = $jobs->with('province', "jobCategory")->latest('id')->paginate(15)
            ->appends(['cats' => $request->get("cats"), 'contract_type' => $request->get("contract_type"), 'work_experience' => $request->get("work_experience"), 'education' => $request->get("education"), 'sex' => $request->get("sex")],
                null);
        $cats = JobsCategory::all();


        if (count($jobs) == 0)
        flash_message("success","لیست خالی میباید");

        return view('cms.job.index',compact("jobs",'cats','contract_type','work_experience','education'));
    }


    public function showCms($id){

        $job = Job::whereState(0)->findOrFail($id);

        $similar = [];

        if ($job == null)
            flash_message("error","متاسفانه این فرصت شغلی برای نمایش وجود ندارد");

        $breadcrumb = "توضیحات فرصت شغلی";
        $titleHeader = "قابل مشاهده تنها توصت ادمین";

        return view( 'job.job_detail',compact("job",'similar','breadcrumb','titleHeader'));
    }

    public function storeCms($id){
        $job = Job::find($id);
        if ($job!=null) {
            $job->state = 1;
            $isSave = $job->save();
            flash_message($isSave,$isSave?"تایید با موفقیت انجام شد":"خطا! متاسفانه درخواست تایید با مشکل مواجه شده است");

        }else{
            flash_message("error","متاسفانه این فرصت شغلی پیدا نشد");
        }

        return back();

    }


    public function destroyCms($id)
    {
        $job = Job::whereId($id);
        $job->update(['state'=>0]);
        $status = $job->delete();
        flash_message($status?"success":"error", $status ? 'فرصت شغلی مورد نظر با موفقیت حذف شد' : "حطا! متاسفانه درخواست شما با خطا مواجه شده است. لطفا مجددا تلاش کنید");
        return back();
    }

}
