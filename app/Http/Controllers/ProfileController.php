<?php

namespace App\Http\Controllers;

use App\MembershipType;
use App\Profile;
use App\User;
use App\Utils\UserProFields;
use App\visibiliy;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
