<?php

namespace App\Http\Controllers;

use App\{Branch, Document, Membership, MembershipType, Order, User};
use Hash;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

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
            return abort(404, "متاسفانه کاربری با این مشخصات یافت نشد");

        $user = $user[0];

        if ($user->active != 2 && $user->active != 4 && $user->active != 5 ) {
            if (auth()->check()) {
                if (auth()->user()->roles == 2)
                    abort(404, "متاسفانه صفحه مورد نظر در دسترس نمی باشد(1001)");
            } else
                abort(404, "متاسفانه صفحه مورد نظر در دسترس نمی باشد(1002)");

        }

        if (time() >= $user->expire) {
            if (auth()->check()) {
                if (auth()->user()->roles == 2)
                    abort(404, (auth()->id() == $user->id) ? "متاسفانه مدت اعتبار شنا به اتمام رسیده" : "متاسفانه صفحه مورد نظر در دسترس نمی باشد(1003)");
            } else
                abort(404, "متاسفانه صفحه مورد نظر در دسترس نمی باشد(1004)");
        }

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
            return redirect()->back()->with("errorField", "متاسفانه همچین کاربری یافت نشد! لطفا با پشتیبانی تمایس بگیرید");


        if (!Hash::check($request->get('pass'), $user[0]->password))
            return redirect()->back()->with("errorField", "رمز عبور اشتباه");


        auth()->loginUsingId($user[0]->id);

        return redirect()->route("profile.upgrade.show");
    }


    public function upgrade()
    {
        if (!auth()->check())
            return redirect()->route("login");

        $memberships = MembershipType::all();
        $titleHeader = $breadcrumb = "ارتقا";
        $membership_type_id = User::find(auth()->id())->membership_type_id;
        $branches = Branch::all();

        return view('upgrade', compact('memberships', 'titleHeader', 'breadcrumb', 'membership_type_id', 'branches'));
    }

    public function postUpgradeRq(Request $request)
    {
//        dd($request->all());
//        dd($request->get('workExperience'));
//        return $request->all();
        $messages = [
            '*.required' => 'وارد کردن این فیلد الزامی است',
            'password.min' => 'رمز عبور باید حداقل 8 کاراکتر باشد',
            'password.confirmed' => 'تایید رمز عبور اشتباه است',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره موبایل قبلا ثبت شده است',
            'companies.established_number.unique' => 'این شماره ثبت قبلا ثبت شده است',
            'companies.economy_number.unique' => 'این شماره اقتصادی قبلا ثبت شده است',
            'companies.national_number.unique' => 'این شناسه ملی قبلا ثبت شده است',
            'files.*.mimes' => 'فرمت فایل های ارسالی صحیح نمی باشد',

        ];
        switch ($request->get('membership_type_id')) {
            case (1):
            case (3):
                $validator = Validator::make($request->all(), [
                    'first_name' => 'bail | required | string | max:255',
                    'last_name' => 'bail | required | string | max:255',
                    'name_en' => 'bail | required | string | max:255',
                    'profile.father_name' => 'bail | required | string | max:255',
                    'profile.national_code' => 'bail | required | numeric ',
                    'mobile' => 'bail | required | string |unique:users',
                    'profile.certificate_number' => 'bail | required | numeric',
                    'profile.birth_date' => 'bail | required | string',
                    'profile.birth_place' => 'bail | required | string',
                    'profile.sex' => 'bail | required',
                    'profile.work_address' => 'bail | required | string',
                    'profile.home_address' => 'bail | required | string',
                    'profile.home_post' => 'bail | required | string',
                    'profile.work_name' => 'bail | required | string',
                    'profile.receive_place' => 'bail | required | string',
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
                    'profile.father_name' => 'bail | required | string | max:255',
                    'profile.national_code' => 'bail | required | numeric',
                    'mobile' => 'bail | required | string |unique:users',
                    'profile.certificate_number' => 'bail | required | numeric',
                    'profile.birth_date' => 'bail | required | string',
                    'profile.birth_place' => 'bail | required | string',
                    'profile.sex' => 'bail | required',
                    'profile.home_address' => 'bail | required | string',
                    'profile.home_post' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255 | unique:users',
                    'companies.name' => 'bail | required | string | max:255',
                    'companies.established_date' => 'bail | required | string | max:255',
                    'companies.established_number' => 'bail | required | string | max:255 | unique:companies,established_number',
                    'companies.economy_number' => 'bail | required | string | unique:companies,economy_number',
                    'companies.national_number' => 'bail | required | string | unique:companies,national_number',
                    'companies.post_number' => 'bail | required | string',
                    'companies.ownership_type' => 'bail | required | string',
                    'companies.legal_type' => 'bail | required | string',
                    'companies.address' => 'bail | required | string',
                    'companies.ceo_name' => 'bail | required | string',
                    'companies.ceo_name_en' => 'bail | required | string',
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
                    'profile.father_name' => 'bail | required | string | max:255',
                    'profile.national_code' => 'bail | required | numeric ',
                    'mobile' => 'bail | required | string |unique:users',
                    'profile.certificate_number' => 'bail | required | numeric',
                    'profile.birth_date' => 'bail | required | string',
                    'profile.birth_place' => 'bail | required | string',
                    'profile.sex' => 'bail | required',
                    'profile.home_address' => 'bail | required | string',
                    'profile.home_post' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255 | unique:users',
                    'password' => 'bail | required | string | min:8 | confirmed',
                    'branch_id' => 'bail | required | numeric',
                ], $messages);
                break;
        }
//
        if ($validator->fails()) {
            \Session::flash('membership_type_id', $request->get('membership_type_id'));
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = User::find(auth()->id());
//        return var_dump($request->file('files'));
        $document = [];
        if ($request->hasFile('files')) {
            for ($i = 0; $i < count($request->file('files')); $i++) {
                $documentName = time() . $i . '.' . $request->file('files')[$i]->getClientOriginalExtension();
                $request->file('files')[$i]->move(public_path('img/documents'), $documentName);
                $document[] = new Document(['address' => $documentName, 'explain' => $request->get('files_explain')[$i]]);
            }
        }


        $tmp_request = $request->all();
        $tmp_request['documents'] = $document;
//        return $request['document'] ;
        $user->update(["active"=>4]);

        $user->profile()->update(['upgrade_update_data'=>$tmp_request]);



        $year = ($request->get('year') == 3) ? 3 : 1;
        $membership = new Membership(
            [
                'membership_type_id' => $request->get('membership_type_id'),
                'user_id' => auth()->id(),
                'year' => $year,
                'lang_id' => 1
            ]
        );
        $membership->save();
        $memberShipType = MembershipType::find($request->get('membership_type_id'));
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
        $redirectURL = route('profile.upgradeResult');
//        return $request;
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
            try{
                $order = Order::whereReferenceId($referenceId)->whereStateId(0)->firstOrFail();
                $find = true;
            }catch (ModelNotFoundException $exception){
                $find = false;
            }
            if ($find) {
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
            'companies.established_number.unique' => 'این شماره ثبت قبلا ثبت شده است',
            'companies.economy_number.unique' => 'این شماره اقتصادی قبلا ثبت شده است',
            'companies.national_number.unique' => 'این شناسه ملی قبلا ثبت شده است',
            'files.*.mimes' => 'فرمت فایل های ارسالی صحیح نمی باشد',
            '*.numeric' => 'این فیلد باید عدد باشد',

        ];
        switch ($request->get('membership_type_id')) {
            case (1):
            case (3):
                $validator = Validator::make($request->all(), [
                    'first_name' => 'bail | required | string | max:255',
                    'last_name' => 'bail | required | string | max:255',
                    'name_en' => 'bail | required | string | max:255',
                    'profile.father_name' => 'bail | required | string | max:255',
                    'profile.national_code' => 'bail | required | numeric ',
                    'mobile' => 'bail | required | string ',
                    'profile.certificate_number' => 'bail | required | numeric',
                    'profile.birth_date' => 'bail | required | string',
                    'profile.birth_place' => 'bail | required | string',
                    'profile.sex' => 'bail | required',
                    'profile.work_address' => 'bail | required | string',
                    'profile.home_address' => 'bail | required | string',
                    'profile.home_post' => 'bail | required | string',
                    'profile.work_name' => 'bail | required | string',
                    'profile.receive_place' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255 ',
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
                    'profile.father_name' => 'bail | required | string | max:255',
                    'profile.national_code' => 'bail | required | numeric',
                    'mobile' => 'bail | required | string ',
                    'profile.certificate_number' => 'bail | required | numeric',
                    'profile.birth_date' => 'bail | required | string',
                    'profile.birth_place' => 'bail | required | string',
                    'profile.sex' => 'bail | required',
                    'profile.home_address' => 'bail | required | string',
                    'profile.home_post' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255',
                    'companies.name' => 'bail | required | string | max:255',
                    'companies.established_date' => 'bail | required | string | max:255',
                    'companies.established_number' => 'bail | required | string | max:255 | unique:companies,established_number',
                    'companies.economy_number' => 'bail | required | string | unique:companies,economy_number',
                    'companies.national_number' => 'bail | required | string | unique:companies,national_number',
                    'companies.post_number' => 'bail | required | string',
                    'companies.ownership_type' => 'bail | required | string',
                    'companies.legal_type' => 'bail | required | string',
                    'companies.address' => 'bail | required | string',
                    'companies.ceo_name' => 'bail | required | string',
                    'companies.ceo_name_en' => 'bail | required | string',
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
                    'profile.father_name' => 'bail | required | string | max:255',
                    'profile.national_code' => 'bail | required | numeric ',
                    'mobile' => 'bail | required | string ',
                    'profile.certificate_number' => 'bail | required | numeric',
                    'profile.birth_date' => 'bail | required | string',
                    'profile.birth_place' => 'bail | required | string',
                    'profile.sex' => 'bail | required',
                    'profile.home_address' => 'bail | required | string',
                    'profile.home_post' => 'bail | required | string',
                    'email' => 'bail | required | string | email | max:255',
                    'branch_id' => 'bail | required | numeric',
                ], $messages);
                break;
        }

        $tmp_user = User::whereEmail($request->get('email'))->get();

        if (count($tmp_user) != 0){
            if ($tmp_user[0]->id != $request->get('tmp') ) {
                flash_message("error", "ایمیل تکراری");
                return back();
            }
        }

        $tmp_user = User::whereMobile($request->get('mobile'))->get();

        if (count($tmp_user) != 0){
            if ($tmp_user[0]->id != $request->get('tmp') ) {
                flash_message("error", "موبایل تکراری");
                return back();
            }
        }


        if ($validator->fails()){
            flash_message("error","لطفا فیلد ها رو به درستی پر کنید");
            return back()->withErrors($validator->messages());
        }

        $user = User::findOrFail($request->get('tmp'));

        if ($request->get('name_en') != $user->name_en ) {
            $slug = str_replace(' ', '-', $request->get('name_en'));
            $number = 1;
            while (User::whereSlug($slug)->exists()) {
                $slug .= '-' . ++$number;
            }
        }




        $isSuccessful = \DB::transaction(function () use ($user, $request) {

            $user->update($request->all());

            $this->activeUser(null,$user);

            $user->profile()->update($request->get('profile'));

            if ( $request->has('documents') )
                foreach ( $request->get('documents') as $doc ) {
                    $doc = json_decode($doc);
                    /** if true => this doc not on database and doc is file name  ,  if false => return doc id , and exist on db **/
                    if( !isset($doc->id) )
                        $user->documents()->save(new Document(['address'=>$doc->address,'state'=>1,'explain'=>$doc->explain ]));
                    else
                        $user->documents()->whereId($doc->id)->update(['address'=>$doc->address,'state'=>1,'explain'=>$doc->explain ]);

                }

            if ($request->has('companies'))
                $user->companies()->update($request->get('companies'));

            if ($request->has('workExperience'))
                $user->workExperience()->update($request->get('workExperience'));

            if ($request->has('education') )
                $user->education()->update($request->get('education'));

            return true;
        });


        if ($isSuccessful) {

            flash_message('success', "کاربر با موفقت ارتفا یافت");
            return redirect()->route('cms.user.upgrade');
        }
        else {

            flash_message('error', "لطفا یک بار دیگر تلاش کنید و بعد از آن در صورت شکست عملیات با پشتیبانی تماس بگیرید");
            return back();
        }


    }

    public function upgradeIndex(){

        $users = User::whereActive(5)->orWhere("active",'=','4')->paginate(15);

        return view('cms.user.upgrade.index',compact('users'));
    }

public function upgradeEdit($id){
        $user = User::with('profile','companies','workExperience','education','documents')->find($id);

        if ($user->profile[0]->upgrade_update_data!=null) {
            $active = $user->active;
            $reagent_id = $user->reagent_id;

            $user = json_decode($user->profile[0]->upgrade_update_data);

            $user->active = $active;
            $user->reagent_id= $reagent_id;

        }
    else{

        if ($user->profile !=null )
            $user->profile = $user->profile[0];

        if (count($user->companies) !=0)
            $user->companies = $user->companies[0];

        if ($user->workExperience != null)
            $user->workExperience = $user->workExperience[0];

        if (count($user->education) !=0 )
            $user->education = $user->education[0];

    }


    $membership = MembershipType::find($user->membership_type_id);

//    return json_encode($user->education);
    $branches = Branch::all('id','title');

        return view('cms.user.upgrade.edit',compact('user','membership','branches'));
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

        $user->memberships()->latest('id')->update(['membership_type_id'=>$user->membership_type_id,
            'start'=>time(),'end'=>$user->expire,'state_id'=>1,'year'=>$memberShip->year]);

        if ($id != null ){
            return back();
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
}
