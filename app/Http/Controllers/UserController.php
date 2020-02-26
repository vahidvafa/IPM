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

    public function indexCms()
    {
        $users = User::paginate(15);

        return view('cms.user.index',compact('users'));
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
        $user = User::with(['education','companies'])->findOrFail($id);
        $membershipTitle = MembershipType::findOrFail($user->membership_type_id)->title;



        return view('cms.user.edit',compact('user','membershipTitle'));
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

        $validate = validator($request->all(), [
//        "name" => 'required|string|max:4',

            'first_name' => 'required|string|max:2',
            "last_name" => "required|max:2"
        ], [
            'first_name.*' => "first_name error",
            'last_name.*' => "max 1 for last_name    error"
        ]);

//        return $validate->errors();

   /*     $validate = $this->validate($request, [
    //        "name" => 'required|string|max:4',
            "about_me" => ['min:6']
        ],[
            'about_me.*' => "name error"
        ]);*/

        return back()->withErrors($validate)->withInput();

        $user = User::whereSlug($request->all("slug"))->get("id")[0];
        $user = User::find($user->id);

        $check_slug = str_replace(" ", "-", $request->get('name_en'));

        if ($user->slug != $check_slug) {
            $slug = str_replace(' ', '-', $request->get('name_en'));

            $number = 1;

            if (User::whereSlug($slug)->exists()) {
                if (User::whereSlug($slug)->get('id')[0]['id'] != $user->id)
                    $slug .= '-' . ++$number;


            }
        }


        $user->update($request->all());
        if (isset($slug)) {
            $user->slug = $slug;
            $user->save(['slug' => $slug]);
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
        } else
            return redirect("profile", ['slug' => $user->slug]);
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


}
