<?php

namespace App\Http\Controllers;

use App\Company;
use App\Document;
use App\MembershipType;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;

class UserController extends Controller
{

    public function usersIndex()
    {
        if (\request()->has('search')) {
            $searchString = \request()->get('search');
            $users = User::where("first_name", "LIKE", "%$searchString%")
                ->orWhere("last_name", "LIKE", "%$searchString%")
                ->orWhere("user_code", "LIKE", "%$searchString%")->latest()->paginate(10);
        } else {
            $users = User::latest()->paginate(10);
        }
        $breadcrumb = "یافتن اعضای انجمن";
        $titleHeader = "لیست اعضای انجمن";
        return view('users', compact('users', 'breadcrumb', 'titleHeader'));
    }

    public function indexCms(Request $request)
    {

        $users = User::query();
        if ($request->get('str')) {

            $users = $users->latest()->orWhere('first_name', 'like', "%" . $request->get('str') . "%")
                ->orWhere('last_name', 'like', "%" . $request->get('str') . "%")
                ->orWhere('mobile', 'like', "%" . $request->get('str') . "%")
                ->orWhere('user_code', 'like', "%" . $request->get('str') . "%")
                ->orWhere('email', 'like', "%" . $request->get('str') . "%")
                ->orWhere('email', 'like', "%" . $request->get('str') . "%");

//            return var_dump($users->get());
        }

        $users = $users->latest()->paginate(15)->appends($request->all());

        return view('cms.user.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['education', 'companies','documents'])->findOrFail($id);
        $membership = MembershipType::findOrFail($user->membership_type_id);

        return view('cms.user.edit', compact('user', 'membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(auth()->id());

        $user->update($request->all());

        $user->profile()->update($request->all('profile')['profile']);


        if ($request->hasFile('profile_pic')) {

            $picname = $user->profile_picture??(time() .$user->id. '.' . $request->file('profile_pic')->getClientOriginalExtension());
            $request->file('profile_pic')->move(public_path('img/profile'),$picname);
            if ($user->profile_picture == null){
                $user->profile_picture = $picname;
                $user->save();
                }
        }

        if ($request->hasFile('resume')) {

            $resumeAddress = $user->resume_address??(time() .$user->id. '.' . $request->file('resume')->getClientOriginalExtension());
            $request->file('resume')->move(public_path('img/resume'),$resumeAddress);
            if ($user->resume_address == null){
                $user->resume_address = $resumeAddress;
                $user->save();
                }
        }



        if ($request->hasFile('files')) {
            for ($i = 0; $i < count($request->file('files')); $i++) {
                $documentName = time() . $i . '.' . $request->file('files')[$i]->getClientOriginalExtension();
                $request->file('files')[$i]->move(public_path('/files/documents'), $documentName);
                $document = new Document(['address' => $documentName, 'explain' => $request->get('files_explain')[$i]]);
                $user->documents()->save($document);
            }
        }

        return redirect()->back();
    }

    public function updateAdm(Request $request)
    {
        $messages = [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            'files.*.mimes' => 'فرمت فایل های ارسالی صحیح نمی باشد',
        ];

        $roles = [
            'first_name' => 'bail | required | string | max:255',
            'last_name' => 'bail | required | string | max:255',
            'mobile' => 'bail | required | string ',
            'email' => 'bail | required | string | email | max:255',
            'profile.father_name' => 'bail | required | string | max:255',
            'profile.national_code' => 'bail | required | numeric ',
            'profile.certificate_number' => 'bail | required | numeric',
            'profile.birth_date' => 'bail | required | string',
            'profile.birth_place' => 'bail | required | string',
            'profile.sex' => 'bail | required',
            'profile.work_address' => 'bail | required | string',
            'profile.home_address' => 'bail | required | string',
            'profile.home_post' => 'bail | required | string',
            'profile.work_name' => 'bail | required | string',
            'profile.receive_place' => 'bail | required | string',
            'files.*' => 'bail | required | mimes:jpeg,bmp,png,jpg,pdf',
            'files_explain.*' => 'bail | required | string',
        ];

        switch ($request->get('type')) {
            case (3):
//                $roles += [
//                    'education.education_place' => "bail | string  ",
//                    'education.grade' => "bail | required | string | ",
//                    'education.from_date' => "bail | required | ",
//                    'education.gpa' => "bail | required | string  ",
//                ];
                break;
            case 2:
                $roles += ['company.name' => 'bail | required | string | max:255',
                    'company.established_date' => 'bail | required | string | max:255',
                    'company.established_number' => 'bail | required | string | max:255',
                    'company.economy_number' => 'bail | required | string',
                    'company.national_number' => 'bail | required | string',
                    'company.post_number' => 'bail | required | string',
                    'company.ownership_type' => 'bail | required | string',
                    'company.legal_type' => 'bail | required | string',
                    'company.address' => 'bail | required | string',
                    'company.ceo_name' => 'bail | required | string',
                    'company.ceo_name_en' => 'bail | required | string'];
        }

        $validator = Validator::make($request->all(), $roles, $messages);

        if ($validator->fails()) {

            flash_message("error", "لطفا فیلد هارو به درستی پر کنید");
            return redirect()->back()->withErrors($validator);
        }

        $rq = $request;


        $user = User::with("education", "companies", 'documents')->find($request->get("tmp"));


        Document::whereUserId($user->id)->update(['state' => 0]);
        if ($request->has('documents')) {
            foreach ($request->get('documents') as $docId) {
                Document::whereId($docId)->update(['state' => 1]);
            }
        }

        if ($user->profile[0]->certificate_number != $request->get('profile')['certificate_number']) {
            if (Profile::whereCertificateNumber($request->get('profile')['certificate_number']))
                flash_message("error", "متاسفانه این کد ملی قبلا ثبت شده است.");
            return redirect()->back();
        }


        if ($request->get('type') == 2) {

            if ($user->companies[0]->established_number != $request->get('company')['established_number']) {
                if (Company::whereEstablishedNumber($request->get('profile')['certificate_number']))
                    flash_message("error", "متاسفانه این شماره ثبت قبلا ثبت شده است.");
                return redirect()->back();
            }
            if ($user->companies[0]->economy_number != $request->get('company')['economy_number']) {
                if (Company::whereEconomyNumber($request->get('profile')['certificate_number']))
                    flash_message("error", "متاسفانه این شماره اقتصادی قبلا ثبت شده است.");
                return redirect()->back();
            }

            if ($user->companies[0]->national_number != $request->get('company')['national_number']) {
                if (Company::whereNationalNumber($request->get('profile')['certificate_number']))
                    flash_message("error", "متاسفانه این شناسه ملی قبلا ثبت شده است.");
                return redirect()->back();
            }

        }
        /*'company.established_number' => 'bail | required | string | max:255',
                    'company.economy_number' => 'bail | required | string',
                    'company.national_number' => 'bail | required | string',*/


        if ($user->email != $rq->get('email') || $user->mobile != $rq->get('mobile')) {

            if ($user->email != $rq->get('email')) {
                if (User::whereEmail($rq->get('email')) != null)
                    flash_message("error", "این ایمیل قبلا برای کاربر دیگه ای ثبت شده است");
                return back();
            }

            if ($user->mobile != $rq->get('mobile')) {
                if (User::whereMobile($rq->get('mobile')) != null)
                    flash_message("error", "این شماره قبلا برای کاربر دیگه ای ثبت شده است");
                return back();
            }

        }

        /*        $check_slug = str_replace(" ", "-", $rq->get('name_en'));

                if ($user->slug != $check_slug) {
                    $slug = str_replace(' ', '-', $rq->get('name_en'));

                    $number = 1;

                    while (User::whereSlug($slug)->where('id','!=',$user->id)->exists()) {
                        $slug .= '-' . ++$number;
                    }
                }*/

        $pass = $rq->get('password');

        if ($pass != null)
            $pass = Hash::make($pass);

        $rq = $rq->except('password');


        $user->update($rq);

        if ($request->has('active') && $user->active == 1) {
            if ($request->get('active')) {
                $membershipType = MembershipType::find($user->membership_type_id);
                $user->expire = time() + $membershipType->period;
                $user->active = 2;
                $user->save();
            }
        }

        if ($pass != null) {
            $user->password = $pass;
            $user->save();
        }

        /*if (isset($slug)) {
            $user->slug = $slug;
            $user->save(['slug' => $slug]);
        }*/

        $user->profile()->update($request->all('profile')['profile']);

        switch ($request->get('type')) {
            case 2:
                $user->companies()->update($request->all('company')['company']);
                break;
            case 3:
                if ($request->has('education'))
                    $user->education()->update($request->all('education')['education']);
                break;
        }

        flash_message("success", __('string.successful'));

        return back();
    }

    public function active($id)
    {
        $user = User::find($id);
        if ($user->active == 1) {
            $membershipType = MembershipType::find($user->membership_type_id);
            $user->expire = time() + $membershipType->period;
            $user->active = 2;
            $user->save();
            flash_message('success', __('string.successful'));
            return back();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $status = User::whereId($id)->delete();
        flash_message($status, $status ? 'کاربر مورد نظر با موفقیت حذف شد' : "حطا! متاسفانه درخواست شما با خطا مواجه شده است. لطفا مجددا تلاش کنید");
        return back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('main');
    }


    public function search(Request $request)
    {

        if ($request->get('str') == null)
            return makeMsgCode(false, "دیتای ارسالی نادرست", 500);


        return User::orWhere('first_name', 'like', "%" . $request->get('str') . "%")
            ->orWhere('last_name', 'like', "%" . $request->get('str') . "%")
            ->orWhere('mobile', 'like', "%" . $request->get('str') . "%")
            ->orWhere('user_code', 'like', "%" . $request->get('str') . "%")
            ->orWhere('email', 'like', "%" . $request->get('str') . "%")
            ->orWhere('name_en', 'like', "%" . $request->get('str') . "%")
            ->orWhere('email', 'like', "%" . $request->get('str') . "%")->get(['id', 'first_name', 'last_name']);

    }

    public function badge(User $user)
    {
        return view('cms.user.badge',compact('user'));
    }

    public function badgeUpdate (User $user , Request $request)
    {
        try{
            $user->update($request->only('diamond','gold','silver','bronze'));
            flash_message('success', __('string.successful.edit'));
        }catch (\Exception $exception){
            flash_message('error', __('string.unsuccessful'));
        }
        return back();
    }

}
