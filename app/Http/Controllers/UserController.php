<?php

namespace App\Http\Controllers;

use App\Company;
use App\Document;
use App\Exports\UsersExport;
use App\Membership;
use App\MembershipType;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class UserController extends Controller
{

    public function doSearch(){
        if (\request()->has('search')) {
            $searchString = \request()->get('search');
            $users = User::where("first_name", "LIKE", "%$searchString%")
                ->orWhere("last_name", "LIKE", "%$searchString%")
                ->orWhere("mobile", "LIKE", "%$searchString%")
                ->orWhere("email", "LIKE", "%$searchString%")
                ->orWhere("user_code", "LIKE", "%$searchString%")->latest()->paginate(10);
        } else {
            $users = User::latest()->paginate(10);
        }

        return $users;
    }



    public function usersIndex()
    {
        $users = $this->doSearch();
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


    public function edit($id)
    {
        $user = User::with(['education', 'companies', 'documents'])->findOrFail($id);
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

        $rq = $request->except('_token');
        $rq['isShowMyPhone'] = (int)($request->has('isShowMyPhone'));
        $rq['active'] = 4;
        $tmRq = json_encode($rq);
        $rq = [];
        $rq['upgrade_update_data'] = $tmRq;

//        $user->profile()->update($rq);

//        $user->active = 4;
        $user->isShowMyPhone = (int)($request->has('isShowMyPhone'));

        $user->profile()->update($request->all('profile')['profile']);

        if ($request->hasFile('profile_pic')) {

            $picname = $user->profile_picture ?? (time() . $user->id . '.' . $request->file('profile_pic')->getClientOriginalExtension());
            $request->file('profile_pic')->move(public_path('img/profile'), $picname);
            if ($user->profile_picture == null) {
                $user->profile_picture = $picname;

            }
        }

        if ($request->hasFile('resume')) {

            $resumeAddress = $user->resume_address ?? (time() . $user->id . '.' . $request->file('resume')->getClientOriginalExtension());
            $request->file('resume')->move(public_path('files/resume'), $resumeAddress);
            if ($user->resume_address == null) {
                $user->resume_address = $resumeAddress;
            }
        }
        $document = [];
        if ($request->hasFile('files')) {
            for ($i = 0; $i < count($request->file('files')); $i++) {
                $documentName = time() . $i . '.' . $request->file('files')[$i]->getClientOriginalExtension();
                $request->file('files')[$i]->move(public_path('/img/documents'), $documentName);
//                 $document['documents'] += ;
                $user->documents()->save(new Document(['address' => $documentName, 'explain' => $request->get('files_explain')[$i]]));
            }
        }

        /*Membership::insert(['user_id'=>$user->id,'membership_type_id'=>$rq['membership_type_id'],
            'year'=>$rq['year'],'start'=>0,'end'=>0,'state_id'=>0]);*/

        $user->save();
//        return var_dump($user->profile);

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


        $user = User::with("education", "companies", 'documents','profile')->find($request->get("tmp"));


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
                if (Company::whereEstablishedNumber($request->get('company')['certificate_number']))
                    flash_message("error", "متاسفانه این شماره ثبت قبلا ثبت شده است.");
                return redirect()->back();
            }
            if ($user->companies[0]->economy_number != $request->get('company')['economy_number']) {
                if (Company::whereEconomyNumber($request->get('company')['certificate_number']))
                    flash_message("error", "متاسفانه این شماره اقتصادی قبلا ثبت شده است.");
                return redirect()->back();
            }

            if ($user->companies[0]->national_number != $request->get('company')['national_number']) {
                if (Company::whereNationalNumber($request->get('company')['certificate_number']))
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

        if ($pass != null) {
            $user->password = Hash::make($pass);
            $user->save();
        }

        $rq = $rq->except('password');

        $rq['isShowMyPhone'] = (int)$request->has('isShowMyPhone');

        unset($rq['active']);
        $user->update($rq);


        if ($request->has('active')) {
         $this->activeUser($user->id);
        }

        $profile = $request->all('profile')['profile'];

        $profile['certificate'] = "IPMA CB Certificate Level “" . $request['certificate-level'] . "” - " . tr_num($request['certificate-date'], "en");


        $profile['awards'] =
            $request->all('awards')['awards']['1'] .
            "?!?" . $request->all('awards')['awards']['2'] .
            "?!?" . $request->all('awards')['awards']['3'];


        $user->profile()->update($profile);

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



    public function activeUser($id, User $user = null)
    {
        if ($user == null)
        $user = User::find($id);

//        if ($user->active == 1) {
            $membershipType = MembershipType::find($user->membership_type_id);
            $memberShip = $user->memberships()->get('year')->last();
            $user->expire = time() + ($membershipType->period * $memberShip->year );
            $user->active = 2;
            $user->user_code = createUserCode($user->membership_type_id,$user->main);
            $user->userCard = $this->showCard($user);
            $user->profile()->update(['upgrade_update_data'=>null]);
        $user->save();

            $user->memberships()->update(['membership_type_id'=>$user->membership_type_id,
                'start'=>time(),'end'=>$user->expire,'state_id'=>1,'year'=>$memberShip->year]);

            if ($id != null ){
                return back();
            }
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
            ->orWhere('email', 'like', "%" . $request->get('str') . "%")->get(['id', 'first_name', 'last_name', 'roles']);

    }

    public function badge(User $user)
    {
        return view('cms.user.badge', compact('user'));
    }

    public function badgeUpdate(User $user, Request $request)
    {
        try {
            $user->update($request->only('diamond', 'gold', 'silver', 'bronze'));
            flash_message('success', __('string.successful.edit'));
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
        }
        return back();
    }


    public function admins(Request $request)
    {

        $users = User::whereRoles(1)->paginate(14);

        return view('cms.user.admins', compact('users'));

    }


    public function adminDel(Request $request)
    {

        if (auth()->check()) {

            if (auth()->user()->roles == 0) {
                $user = User::find($request->get('user'));
                $user->roles = 2;
                $user->save();
                flash_message("info", "مدیر با موفقیت حذف شد");
                return redirect()->back();
            } else {
                flash_message("error", "متاسفانه شما مجاز به انجام این کار نیستید");
                return redirect()->back();
            }

        } else {
            flash_message("error", "اجراز حویت لازم است");
            return redirect()->back();
        }

    }


    public function adminAdd(Request $request)
    {

        if (auth()->check()) {

            if (auth()->user()->roles == 0) {
                $user = User::find($request->get('selectedUser'));
                if ($user == null) {
                    flash_message("error", "متاسفانه کاربر مورد نظر پیدا نشد");
                    return redirect()->back();
                }
                $user->roles = 1;
                $user->save();
                flash_message("success", "مدیر با موفقیت ثبت شد");
                return redirect()->back();
            } else {
                flash_message("error", "متاسفانه شما مجاز به انجام این کار نیستید");
                return redirect()->back();
            }

        } else {
            flash_message("error", "اجراز حویت لازم است");
            return redirect()->back();
        }

    }

    public function showCard(User $user)
    {
//        auth()->loginUsingId(1);

        $name = persianText($user->first_name . ' ' . $user->last_name);
        $nameEn = persianText($user->name_en);
        $imageName = $user->id . time();
        if ($user->membership_type_id == 2){
            $img = Image::make(public_path('img/register/C.png'));
        }else{
            if ((jdate()->getYear() - (int)explode('/',$user->profile[0]->birth_date)[0]) > 35){
                switch ($user->membership_type_id){
                    case 1:
                        if ($user->main == 1)
                            $img = Image::make(public_path('img/register/M.png'));
                        else
                            $img = Image::make(public_path('img/register/A.png'));
                        break;
                    case 3:
                        $img = Image::make(public_path('img/register/S.png'));
                        break;
                    default:
                        $img = Image::make(public_path('img/register/S.png'));
                }
            }else{
                switch ($user->membership_type_id){
                    case 1:
                        if ($user->main == 1)
                            $img = Image::make(public_path('img/register/YC-M.png'));
                        else
                            $img = Image::make(public_path('img/register/YC-A.png'));
                        break;
                    case 3:
                        $img = Image::make(public_path('img/register/YC-S.png'));
                        break;
                    default:
                        $img = Image::make(public_path('img/register/YC-S.png'));
                }
            }
        }
        $img->text($name, 950, 90, function (\Intervention\Image\Gd\Font $font) {
            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
            $font->size(28);
            $font->color('#000000');
            $font->align('right');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->text($nameEn, 590, 553, function (\Intervention\Image\Gd\Font $font) {
            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
            $font->size(28);
            $font->color('#000000');
            $font->align('left');
            $font->valign('bottom');
            $font->angle(0);
        });
        if ($user->membership_type_id != 2){
            $img->text(persianText(tr_num($user->user_code)), 220, 340, function (\Intervention\Image\Gd\Font $font) {
                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                $font->size(28);
                $font->color('#000000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
        }else{
            $img->text(persianText(tr_num($user->user_code)), 220, 290, function (\Intervention\Image\Gd\Font $font) {
                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                $font->size(28);
                $font->color('#000000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $img->text(persianText(tr_num($user->companies[0]->name)), 220, 380, function (\Intervention\Image\Gd\Font $font) {
                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
                $font->size(24);
                $font->color('#000000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
        }
        $img->text(persianText(tr_num(jdate($user->expire)->format('Y/m/d'))), 220, 470, function (\Intervention\Image\Gd\Font $font) {
            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
            $font->size(28);
            $font->color('#000000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $img->insert(asset('img/profile/'.($user->profile_picture??'profile-default.png')), 'right', 70, 0);
        $img->save(public_path("img/userCards/$imageName.jpg"));
//        return "<img src='" . asset("img/userCards/$imageName.jpg") . "'>";
        return $imageName.'.jpg';

    }

    public function export()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
