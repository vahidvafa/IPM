<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Membership;
use App\MembershipType;
use App\Profile;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $memberships = MembershipType::all();
        $titleHeader = "ثبت نام ";
        $breadcrumb = "عضویت";
        return view('register', compact('memberships', 'titleHeader', 'breadcrumb'));
    }

    public function postRegister(Request $request)
    {
        $messages = [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره موبایل قبلا ثبت شده است',
            'established_number.unique' => 'این شماره ثبت قبلا ثبت شده است',
            'economy_number.unique' => 'این شماره اقتصادی قبلا ثبت شده است',
            'national_number.unique' => 'این شناسه ملی قبلا ثبت شده است',
        ];
        switch ($request->get('type')) {
            case (1):
            case (3):
                $this->validate($request,
                    [
                        'name' => ['required', 'string', 'max:255'],
                        'name_en' => ['required', 'string', 'max:255'],
                        'father_name' => ['required', 'string', 'max:255'],
                        'national_code' => ['required', 'string', 'max:255'],
                        'mobile' => ['required', 'string', 'unique:users'],
                        'certificate_number' => ['required', 'string'],
                        'birth_date' => ['required', 'string'],
                        'birth_place' => ['required', 'string'],
                        'sex' => ['required'],
                        'work_address' => ['required', 'string'],
                        'home_address' => ['required', 'string'],
                        'home_post' => ['required', 'string'],
                        'work_name' => ['required', 'string'],
                        'receive_place' => ['required', 'string'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ], $messages);
                break;
            case 2:
                $this->validate($request,
                    [
                        'name' => ['required', 'string', 'max:255'],
                        'name_en' => ['required', 'string', 'max:255'],
                        'established_date' => ['required', 'string', 'max:255'],
                        'established_number' => ['required', 'string', 'max:255', 'unique:profiles'],
                        'economy_number' => ['required', 'string', 'unique:profiles'],
                        'national_number' => ['required', 'string', 'unique:profiles'],
                        'post_number' => ['required', 'string'],
                        'ownership_type' => ['required', 'string'],
                        'legal_type' => ['required', 'string'],
                        'address' => ['required', 'string'],
                        'ceo_name' => ['required', 'string'],
                        'ceo_name_en' => ['required', 'string'],
                        'agent_name' => ['required', 'string'],
                        'agent_name_en' => ['required', 'string'],
                        'receive_place' => ['required', 'string'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ], $messages);
                break;
            case 4:
                $this->validate($request,
                    [
                        'name' => ['required', 'string', 'max:255'],
                        'name_en' => ['required', 'string', 'max:255'],
                        'father_name' => ['required', 'string', 'max:255'],
                        'national_code' => ['required', 'string', 'max:255'],
                        'mobile' => ['required', 'string', 'unique:users'],
                        'certificate_number' => ['required', 'string'],
                        'birth_date' => ['required', 'string'],
                        'birth_place' => ['required', 'string'],
                        'sex' => ['required'],
                        'home_address' => ['required', 'string'],
                        'home_post' => ['required', 'string'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ], $messages);
                break;
        }

        $slug = str_replace(' ', '-', $request->get('name_en'));
        $number = 1;
        while (User::whereSlug($slug)->exists()) {
            $slug .= '-' . ++$number;
        }
        $date = Jalalian::now()->format('Ym');
        $userCode = mt_rand(1000, 100000);
        while (User::whereUserCode($date . '-' . $userCode)->exists()) {
            $userCode = mt_rand(1000, 100000);
        }
        $userCode = $date . '-' . $userCode;
        $user = new User(
            [
                'name' => $request->get('name'),
                'mobile' => $request->get('mobile'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'slug' => $slug,
                'user_code' => $userCode,
                'remembership_type_id', $request->get('type')
            ]
        );
        $profile = new Profile($request->all());
        $isSuccessful = false;
        \DB::transaction(function () use ($user, $profile, $request) {
            $user->save();
            $user->profile()->save($profile);
            $membership = new Membership(
                [
                    'membership_type_id' => $request->get('type'),
                    'user_id' => $user->id,
                    'lang_id' => 1
                ]
            );
            $membership->save();
            $isSuccessful = true;
        });
        if ($isSuccessful) {
            return response()->json(makeMsgCode(true, 'successful', '00'));
        }
        return response()->json(makeMsgCode(false, 'unsuccessful', '500'));
    }

    public function postLogin(Request $request)
    {
        $validator = \Validator::make($request->all(),
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                '*.required' => 'وارد کردن این فیلد الزامی است'
            ]
        );
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'code' => 400,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);
        }
        $checkType = checkUserNameType($request->post('username'));
        if ($checkType->status) {
            if (Auth::attempt([$checkType->type => $request->post('username'), 'password' => $request->post('password')])) {
                return response()->json(array(
                    'status' => true,
                    'code' => 200,
                ), 200);
//                \redirect()->to(route('profile'));
            }
            return response()->json(array(
                'status' => false,
                'code' => 100,
                'errors' => makeObj(['username' => ['نام کاربری یا رمز عبور اشتباه است']])
            ), 200);
        }
        return response()->json(array(
            'status' => false,
            'code' => 400,
            'errors' => makeObj(['username' => ['ایمیل یا شماره موبایل اشتباه وارد شده است']])
        ), 200);
        //        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
}
