<?php

namespace App\Http\Controllers;

use App\Document;
use App\Membership;
use App\MembershipType;
use App\PassedCourses;
use App\Profile;
use App\User;
use App\Utils\UserProFields;
use App\visibiliy;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\Jalalian;
use PhpParser\Node\Stmt\Break_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        $FieldsInClass = new UserProFields();

        $FieldsInClass = $FieldsInClass->asArray();

        $user = User::with(['wordExperience', 'education', 'profile', 'documents' => function (HasMany $doc) {
            $doc->where('state', '=', 0);
        }, 'PassedCoursesCat' => function (HasMany $relation) {
            $relation->with('PassedCourses')->get();
        }])->where('slug', '=', $slug)->get();

        $breadcrumb = "پروفایل";


        if (count($user) != 0) {
            $user = $user[0];
            $others_visibles = visibiliy::where("user_id", '=', "$user->id")->get();

            $fields = array();
            foreach ($others_visibles as $field)
                array_push($fields, $field->profile_fields);

            $profileVisible = Profile::where('id', '=', $user->id)->get($fields)[0];
            $profileVisible = json_decode($profileVisible, true);
//            echo ($profileVisible);
//            echo "<br>";
//            echo "<br>";
//            echo json_encode($FieldsInClass);
//            exit();

            foreach ($profileVisible as $keyVisible => $valueVisible) {
                foreach ($FieldsInClass as $key => $value) {
                    if ($keyVisible == $key) {

                        $profileVisible["$keyVisible"] = $value . " " . $valueVisible;
                    }
                }

            }

            $titleHeader = $user->name;

            return view('profile', compact("user", "titleHeader", "breadcrumb", 'profileVisible'));
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

    public function logout()
    {
        auth()->logout();
        return redirect()->route("main");
    }


}
