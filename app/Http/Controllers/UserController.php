<?php

namespace App\Http\Controllers;

use App\Document;
use App\Membership;
use App\MembershipType;
use App\PassedCourses;
use App\Profile;
use App\User;
use App\Utils\UnsetUserRelation;
use App\Utils\UserProFields;
use App\visibiliy;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\Jalalian;
use PhpParser\Node\Stmt\Break_;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;
use Symfony\Component\VarDumper\VarDumper;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $profileVisible = [];
        $memberships = [];


        $FieldsInClass = new UserProFields();

        $FieldsInClass = $FieldsInClass->asArray();

        $user = User::with(['workExperience', 'education', 'profile','companies','documents' => function (HasMany $doc) {
            $doc->where('state', '=', 0);
        }, 'PassedCoursesCat' => function (HasMany $relation) {
            $relation->with('PassedCourses')->get();
        }])->where('slug', '=', $slug)->get();

        $breadcrumb = "پروفایل";


        if (count($user) != 0) {
            $user = $user[0];
            $others_visibles = visibiliy::where("user_id", '=', "$user->id")->get();

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


            }

            $titleHeader = $user->name;

            if (auth()->check() && (auth()->user()->roles == 0 || auth()->user()->roles == 1))
                $memberships = MembershipType::all();

            $name_en = str_replace("-"," ",$user->slug);
//            $name_en = str_replace(str_split('1234567890'),'',$name_en);

            return view('profile', compact("user", "titleHeader", "breadcrumb", 'profileVisible', 'memberships','name_en'));
        } else return view("404");
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
    public function update(Request $request)
    {
        $user = User::find(auth()->id());

        $user->update($request->all());

        $user->profile()->update($request->all('profile')['profile']);

        return redirect()->back();
    }

    public function updateAdm(Request $request)
    {

//        return $request;
    //        'profile[birth_date]' => "birthday error",
//        'profile[birth_place]' => "birth_place error",
//        'profile[work_address]' => "work_address error",

   $validate =  \Validator::make($request->all(),[
//        "name" => 'required|string|max:4',

       'about_me'=>'required|string',
       "profile.birth_date"=>"required"
    ],[
       'about_me.*' => "about error",
       'profile.birth_date.*' => "max 1 for profile[birth_date] error"
    ]);

//        return $validate->errors();

    /*$validate = $this->validate($request, [
//        "name" => 'required|string|max:4',
        "about_me" => ['min:6']
    ],[
        'about_me.*' => "name error"
    ]);*/

        $user = User::whereSlug($request->all("slug"))->get("id")[0];
        $user = User::find($user->id);

        $check_slug = str_replace(" ","-",$request->get('name_en'));

        if ($user->slug != $check_slug){
            $slug = str_replace(' ', '-', $request->get('name_en'));

            $number = 1;

            if (User::whereSlug($slug)->exists()) {
                if (User::whereSlug($slug)->get('id')[0]['id'] != $user->id )
                  $slug .= '-' . ++$number;


            }
        }


        $user->update($request->all());
        if (isset($slug)) {
            $user->slug = $slug;
            $user->save(['slug'=>$slug]);
        }

        $user->profile()->update($request->all('profile')['profile']);

        switch ($request->get('type')) {
            case 2:
                $user->companies()->update($request->all('companies')['companies']);
                break;
            case 30:
                $user->workExperience()->update($request->all('workExperience')['workExperience']);

                $user->education()->update($request->all('education')['education']);

                break;


        }

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        else
            return redirect("profile",['slug'=>$user->slug]);
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

    public function logout()
    {
        auth()->logout();
        return redirect()->back();
    }


}
