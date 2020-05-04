<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Document;
use App\Membership;
use App\MembershipType;
use App\Order;
use App\PassedCoursesCategory;
use App\Profile;
use App\User;
use App\Utils\UserProFields;
use App\visibiliy;
use App\WorkExperience;
use Hash;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $memberships = [];

        $pays = [];

        /*$FieldsInClass = new UserProFields();

        $FieldsInClass = $FieldsInClass->asArray();*/

        $user = User::with(['workExperience', 'education', 'profile', 'companies', 'orders' => function (HasMany $query) {
            $query->with('orderCodes');
        }, 'passedCourse'/* => function (BelongsToMany $query) {
            $query->with(['PassedCoursesCat'])->orderBy('passed_courses_category_id')->get();
        }*//*,'documents' => function (HasMany $doc) {
            $doc->where('state', '=', 0);
        }*/])->where('slug', '=', $slug)->get();

        $breadcrumb = "پروفایل";

        if (count($user) == 0)
            return abort(404);

        $user = $user[0];

        /*if ($user->active <= 1) {
            if (!auth()->check()) {
                abort(404, $user->active == 0 ? "نسبت به پرداخت اقدام کنید" : "منتطر تایید ادمین باشید");
            }else {
                if (auth()->user()->roles == 2 )
                    abort(404, $user->active == 0 ? "نسبت به پرداخت اقدام کنید" : "منتطر تایید ادمین باشید");
            }
        }*/

        /*--------------------- start work  ------------------*/


        /*$others_visibles = visibiliy::where("user_id", '=', "$user->id")->get();

            if (count($others_visibles) != 0) {

                $fields = array();
                foreach ($others_visibles as $field)
                    array_push($fields, $field->profile_fields);


                $profileVisible = Profile::where('id', '=', $user->id)->get($fields);
                if (count($profileVisible) != 0) {

                    $profileVisible = json_decode($profileVisible[0], true);


                    foreach ($profileVisible as $keyVisible => $valueVisible)
                        foreach ($FieldsInClass as $key => $value)
                            if ($keyVisible == $key)
                                $profileVisible["$keyVisible"] = $value . " " . $valueVisible;

                }

            }*/

        $titleHeader = $user->name;


        if (auth()->check()) {


            if (auth()->user()->roles == 0 || auth()->user()->roles == 1)
                $memberships = MembershipType::all();
        }

//            $name_en = str_replace(str_split('1234567890'),'',$name_en);

//        return $user;

        return view('profile', compact("user", "titleHeader", "breadcrumb", 'memberships', 'pays'));

    }

    public function preUpgradeCheckPass(Request $request)
    {

        $user = User::whereEmail(decrypt($request->get('encode')))->get();

        if (count($user) == 0)
            return redirect()->back()->with("errorField","متاسفانه همچین کاربری یافت نشد! لطفا با پشتیبانی تمایس بگیرید");


        if (!Hash::check($request->get('pass'),$user[0]->password))
            return redirect()->back()->with("errorField","رمز عبور اشتباه");


        auth()->loginUsingId($user[0]->id);

        return $this->upgrade();
    }


    public function upgrade()
    {
        if (!auth()->check())
            return redirect()->route("login");

        $memberships = MembershipType::all();
        $titleHeader = $breadcrumb = "ارتقا";
        $type = 0;
        $branches = Branch::all();

        return view('upgrade', compact('memberships', 'titleHeader', 'breadcrumb', 'type', 'branches'));
    }

    public function postUpgradeRq(Request $request)
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
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $year = ($request->get('year') == 3) ? 3 : 1;
        $membership = new Membership(
            [
                'membership_type_id' => $request->get('type'),
                'user_id' => auth()->id(),
                'year' => $year,
                'lang_id' => 1
            ]
        );
        $membership->save();
        $memberShipType = MembershipType::find($request->get('type'));
        $price = ($request->get('year') == 3) ? $memberShipType->price * 2 : $memberShipType->price;
        $order = new Order([
            'user_id' => auth()->id(),
            'event_id' => 0,
            'type_id' => 2,
            'comment' => "پرداخت جهت تمدید",
            'total_price' => $price,
            'reference_id' => auth()->id() . time(),
        ]);
        $order->save();
        $breadcrumb = $titleHeader = "در حال انتقال به بانک";
        $resNum = $order->reference_id;
        $comment = $order->comment;
        $merchantCode = '11175778';
        $redirectURL = route('verifyUpgrade');
        return view('bank', compact('titleHeader', 'breadcrumb', 'price', 'resNum', 'merchantCode', 'redirectURL', 'comment'));
    }

    public function bankCallBack(Request $request){

        $MerchantCode = "11175778";
        $date = Jalalian::now()->format('Y/m/d H:i');
        $titleHeader = $breadcrumb = 'وضعیت پرداخت';
        $status = false;
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
                            'state_id' => 1,
                            'reference_number' => $referenceNumber,
                        ]);
                        $user->active = 5;
                        $user->save();
                        $status = true;
                        $date = Jalalian::fromCarbon($order->created_at)->format('Y/m/d H:i');
                        return view('upgrade_call_back', compact('titleHeader', 'breadcrumb', 'status', 'referenceId', 'date'));
                    }
                }
                $order->update(['state_id' => 2]);
            }
        }
        return view('upgrade_call_back', compact('titleHeader', 'breadcrumb', 'status', 'referenceId', 'date'));

    }


    public function doUpgradeAdmin(Request $request)
    {

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


        $user->active = ($memberShipType->price == 0) ? 2 : 1;
        $profile = new Profile($request->all());
        $profile->lang_id = 1;
        $isSuccessful = \DB::transaction(function () use ($user, $profile, $request) {
            $user->save();
            $user->profile()->save($profile);
            if ($request->hasFile('files')) {
                for ($i = 0; $i < count($request->file('files')); $i++) {
                    $documentName = time() . $i . '.' . $request->file('files')[$i]->getClientOriginalExtension();
                    $request->file('files')[$i]->move(public_path('/files/documents'), $documentName);
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
            $membership = new Membership(
                [
                    'membership_type_id' => $request->get('type'),
                    'user_id' => $user->id,
                    'lang_id' => 1
                ]
            );
            $membership->save();
            return true;
        });
        if ($isSuccessful) {
            auth()->loginUsingId($user->id);
            return redirect()->to(route('main'));
        }
    }

}
