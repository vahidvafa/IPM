<?php

namespace App\Http\Controllers;

use App\Document;
use App\Membership;
use App\MembershipType;
use App\PassedCourses;
use App\Profile;
use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\Jalalian;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        //['word_experience','education','education'])->where('slug','=',$slug);
        $user = User::with(['wordExperience', 'education', 'profile','documents'=>function(HasMany $doc){
            $doc->where('state','=',0);
        },'PassedCoursesCat'=>function(HasMany $relation){
            $relation->with('PassedCourses')->get();
        }])->where('slug', '=', $slug)->get();
        $breadcrumb=$titleHeader="پروفایل";
        if (count($user)!=0) {
            $user=$user[0];
            return view('profile', compact("user", "titleHeader", "breadcrumb"));
        }else return view("404");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberships = MembershipType::all();

        $titleHeader="ثبت نام ";
        $breadcrumb="عضویت";
        return view('register', compact('memberships',"titleHeader","breadcrumb"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                'membership_type_id', $request->get('type')
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
