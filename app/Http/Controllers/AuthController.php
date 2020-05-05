<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Document;
use App\Order;
use App\User;
use App\WorkExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Morilog\Jalali\Jalalian;
use App\Membership;
use App\MembershipType;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;
use Symfony\Component\Console\Input\Input;
use Validator;

class AuthController extends Controller
{
    public function register()
    {
        $memberships = MembershipType::all();
        $titleHeader = $breadcrumb = "عضویت";
        $type = 0;
        $branches = Branch::all();
        return view('register', compact('memberships', 'titleHeader', 'breadcrumb', 'type', 'branches'));
    }

    public function postRegister(Request $request)
    {
//        dd($request->all());
//        dd($request->get('experience'));
        $messages = [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            'password.min' => 'رمز عبور باید حداقل 8 کاراکتر باشد',
            'password.confirmed' => 'تایید رمز عبور اشتباه است',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره موبایل قبلا ثبت شده است',
            'company.established_number.unique' => 'این شماره ثبت قبلا ثبت شده است',
            'company.economy_number.unique' => 'این شماره اقتصادی قبلا ثبت شده است',
            'company.national_number.unique' => 'این شناسه ملی قبلا ثبت شده است',
            'files.*.mimes' => 'فرمت فایل های ارسالی صحیح نمی باشد',
        ];
        switch ($request->get('type')) {
            case (1):
            case (3):
                $validator = Validator::make($request->all(), [
                    'first_name' => 'bail | required | string | max:255',
                    'last_name' => 'bail | required | string | max:255',
                    'name_en' => 'bail | required | string | max:255',
                    'father_name' => 'bail | required | string | max:255',
                    'national_code' => 'bail | required | numeric ',
                    'mobile' => 'bail | required | string |unique:users',
                    'certificate_number' => 'bail | required | numeric',
                    'birth_date' => 'bail | required | string',
                    'birth_place' => 'bail | required | string',
                    'sex' => 'bail | required',
                    'work_address' => 'bail | required | string',
                    'home_address' => 'bail | required | string',
                    'home_post' => 'bail | required | string',
                    'work_name' => 'bail | required | string',
                    'receive_place' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255 | unique:users',
                    'password' => 'bail | required | string | min:8 | confirmed',
                    'branch_id' => 'bail | required | numeric',
                    'files.*' => 'bail | required | mimes:jpeg,bmp,png,jpg,pdf',
                    'files_explain.*' => 'bail | required | string',
                ], $messages);
                break;
            case 2:

                $validator = Validator::make($request->all(), [
                    'first_name' => 'bail | required | string | max:255',
                    'last_name' => 'bail | required | string | max:255',
                    'name_en' => 'bail | required | string | max:255',
                    'father_name' => 'bail | required | string | max:255',
                    'national_code' => 'bail | required | numeric',
                    'mobile' => 'bail | required | string |unique:users',
                    'certificate_number' => 'bail | required | numeric',
                    'birth_date' => 'bail | required | string',
                    'birth_place' => 'bail | required | string',
                    'sex' => 'bail | required',
                    'home_address' => 'bail | required | string',
                    'home_post' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255 | unique:users',
                    'company.name' => 'bail | required | string | max:255',
                    'company.established_date' => 'bail | required | string | max:255',
                    'company.established_number' => 'bail | required | string | max:255 | unique:companies,established_number',
                    'company.economy_number' => 'bail | required | string | unique:companies,economy_number',
                    'company.national_number' => 'bail | required | string | unique:companies,national_number',
                    'company.post_number' => 'bail | required | string',
                    'company.ownership_type' => 'bail | required | string',
                    'company.legal_type' => 'bail | required | string',
                    'company.address' => 'bail | required | string',
                    'company.ceo_name' => 'bail | required | string',
                    'company.ceo_name_en' => 'bail | required | string',
                    'password' => 'bail | required | string | min:8 | confirmed',
                    'branch_id' => 'bail | required | numeric',
                    'files.*' => 'bail | required | mimes:jpeg,bmp,png,jpg,pdf ',
                    'files_explain.*' => 'bail | required | string ',
                ], $messages);
                break;
            case 4:
                $validator = Validator::make($request->all(), [
                    'first_name' => 'bail | required | string | max:255',
                    'last_name' => 'bail | required | string | max:255',
                    'name_en' => 'bail | required | string | max:255',
                    'father_name' => 'bail | required | string | max:255',
                    'national_code' => 'bail | required | numeric ',
                    'mobile' => 'bail | required | string |unique:users',
                    'certificate_number' => 'bail | required | numeric',
                    'birth_date' => 'bail | required | string',
                    'birth_place' => 'bail | required | string',
                    'sex' => 'bail | required',
                    'home_address' => 'bail | required | string',
                    'home_post' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255 | unique:users',
                    'password' => 'bail | required | string | min:8 | confirmed',
                    'branch_id' => 'bail | required | numeric',
                ], $messages);
                break;
        }
//
        if ($validator->fails()) {
            \Session::flash('type', $request->get('type'));
            return redirect()->route('register')->withErrors($validator)->withInput();
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
        $memberShipType = MembershipType::find($request->get('type'));
        $user = new User(
            [
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'name_en' => $request->get('name_en'),
                'mobile' => $request->get('mobile'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'slug' => $slug,
                'user_code' => $userCode,
                'membership_type_id' => $request->get('type'),
                'branch_id' => $request->get('branch_id'),
            ]
        );
        $user->active = ($memberShipType->price == 0) ? 2 : 0;
        $profile = new Profile($request->all());
        $profile->lang_id = 1;

        $isSuccessful = \DB::transaction(function () use ($user, $profile, $request) {
            $user->save();
            $user->profile()->save($profile);
            if ($request->hasFile('files')) {
                for ($i = 0; $i < count($request->file('files')); $i++) {
                    $documentName = time() . $i . '.' . $request->file('files')[$i]->getClientOriginalExtension();
                    $request->file('files')[$i]->move(public_path('/img/documents'), $documentName);
                    $document = new Document(['address' => $documentName, 'explain' => $request->get('files_explain')[$i]]);
                    $user->education()->save($document);
                }
            }
            if ($request->has('experience')) {
                $experience = new WorkExperience([
                    'company_name' => ((isset($request->get('experience')['company_name'])) ? $request->get('experience')['company_name'] : null),
                    'job_title' => ((isset($request->get('experience')['job_title'])) ? $request->get('experience')['job_title'] : null),
                    'from_date' => ((isset($request->get('experience')['from_date'])) ? $request->get('experience')['from_date'] : null),
                    'to_date' => ((isset($request->get('experience')['to_date'])) ? $request->get('experience')['to_date'] : null),
                ]);
                $user->workExperience()->save($experience);
            }
            if ($request->has('company')) {
                $company = new Company($request->all('company')['company']);
                $user->companies()->save($company);
            }
            $year = ($request->get('year') == 3) ? 3 : 1;
            $membership = new Membership(
                [
                    'membership_type_id' => $request->get('type'),
                    'user_id' => $user->id,
                    'year' => $year,
                    'lang_id' => 1
                ]
            );
            $membership->save();
            return true;
        });
        if ($isSuccessful) {
            auth()->loginUsingId($user->id);
            if ($user->active == 0) {
                $commentTitle = $memberShipType->title;
                $price = ($request->get('year') == 3) ? $memberShipType->price * 2 : $memberShipType->price;
                //premium user
                $order = new Order([
                    'user_id' => $user->id,
                    'event_id' => 0,
                    'type_id' => 1,
                    'comment' => " پرداخت جهت $commentTitle در انجمن ",
                    'total_price' => $price,
                    'reference_id' => $user->id . time(),
                ]);
                $order->save();
                $breadcrumb = $titleHeader = "در حال انتقال به بانک";
                $resNum = $order->reference_id;
                $comment = $order->comment;
                $merchantCode = '11175778';
                $redirectURL = route('verifyRegister');
                return view('bank', compact('titleHeader', 'breadcrumb', 'price', 'resNum', 'merchantCode', 'redirectURL', 'comment'));
            } else
                return redirect()->to(route('main'));
            //free user
        }
        return back();
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

    public function login()
    {
        return view('login');
    }

    public function locationSms(Request $request)
    {
        $this->validate($request,
            ['mobile' => ' required | numeric ']
        );
        Curl::to('https://panel.asanak.com/webservice/v1rest/sendsms')
            ->withData(['username' => 'ipmairan',
                'password' => 'ipma!@#$%^',
                'source' => '982188229406',
                'destination' => $request->get('mobile'),
                'message' => 'سلام کاربر عزیر آدرس انجمن مدیریت پروژه ایران به شرح زیر است ! https://goo.gl/maps/dK2g7juXjzcpddDa8'])
            ->post();
        return back();
    }

    public function verifyRegisterBank(Request $request)
    {
        $MerchantCode = "11175778";
        $date = Jalalian::now()->format('Y/m/d H:i');
        $titleHeader = $breadcrumb = 'وضعیت پرداخت';
        $status = false;
        $type_id = 1;
        $referenceId = "----";
        $user = User::find(\auth()->id());
        if ($request->has('State') && $request->get('State') == "OK") {
            $referenceId = $request->get('ResNum');
            $referenceNumber = $request->get('RefNum');
            $order = Order::whereReferenceId($referenceId)->whereStateId(0);
            if ($order->exists()) {
                if (($order->total_price) == $request->get('Amount')) {
                    $soapClient = new soapclient('https://verify.sep.ir/Payments/ReferencePayment.asmx?WSDL');
                    $verify = $soapClient->VerifyTransaction($referenceNumber, $MerchantCode);
                    if ($verify > 0) {
                        $order->update([
                            'state_id' => '1',
                            'reference_number' => $referenceNumber,
                        ]);
                        $user->active = 1;
                        $user->save();
                        $status = true;
                        $date = Jalalian::fromCarbon($order->created_at)->format('Y/m/d H:i');
                        return view('call_back', compact('titleHeader', 'breadcrumb', 'status', 'referenceId', 'date', 'type_id'));
                    }
                }
                $order->update(['state_id' => 2]);
            }
        }
        return view('call_back', compact('titleHeader', 'breadcrumb', 'status', 'referenceId', 'date', 'type_id'));
    }
}
