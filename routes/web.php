<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('main');
Route::get('/en', 'IndexController@indexEn')->name('mainEn');
Route::get('/downloads', function () {
    $breadcrumb = "دانلود";
    $titleHeader = "فایل های برای دانلود";

    return view("download_page", compact('breadcrumb', 'titleHeader'));
})->name('download');
Route::get('/event/calender', function () {
    $breadcrumb = "تاریخ رویداد ها";
    $titleHeader = "نمایش تاریخ بر گذاری رویدادها";

    return view("event_calender", compact('breadcrumb', 'titleHeader'));
})->name('event.calender');
Route::get('/contact_us/', 'MessageController@create')->name('message.create');
Route::post('/contact_us/', 'MessageController@store')->name('message.store');
Route::get('/users', 'UserController@usersIndex')->name('user.index');
Route::post('/users', 'UserController@usersIndex')->name('user.search');

Route::get('/searchResult/', 'IndexController@search')->name('search');
Route::post('/searchResult', 'IndexController@search')->name('search.post');

Route::get('/register', 'AuthController@register')->name('register')->middleware('guest');
Route::get('/register/free/{event?}', 'AuthController@freeRegister')->name('register.free')->middleware('guest');
Route::post('/register/free/store', 'AuthController@postFreeRegister')->name('register.free.store')->middleware('guest');
Route::post('/register/store', 'AuthController@postRegister')->name('register.store')->middleware('guest');

Route::get('/event/{id}', 'EventController@show')->name("event");
Route::get('/events/', 'EventController@index')->name("events");

Route::get('/profile/{slug}', 'ProfileController@show')->name("profile");
Route::get('profile/upgrade/show', 'ProfileController@upgrade')->name("profile.upgrade.show");
Route::post('/profile/upgrade/store', 'ProfileController@postUpgradeRq')->name("profile.upgrade.store");
Route::post('profile/preUpgrade', 'ProfileController@preUpgradeCheckPass')->name("profile.preUpgrade");
Route::get('profile/preUpgrade/{code}', function ($code) {
    return view('pre_upgrade', compact('code'));
})->name('preUpgrade.code');


Route::get('user/preRepeat/{code}', function ($code) {
    return view('pre_repeat', compact('code'));
})->name('preRepeat.code');

Route::post('user/preRepeat', 'AuthController@preRepeatCheckPass')->name("user.preRepeat");


Route::post('profile/upgrade_result', 'ProfileController@bankCallBack')->name("profile.upgradeResult");

Route::post('/login', 'AuthController@postLogin')->name('login.post');
Route::get('/login', 'AuthController@Login')->name('login')->middleware('guest');

Route::post('location', 'AuthController@locationSms')->name('location');
Route::get('about-us', 'IndexController@about_us')->name('about-us');
Route::get('/research', 'IndexController@research')->name('research');
Route::get('/gifts', 'IndexController@gifts')->name('gifts');
Route::get('/gifts/intro', 'IndexController@giftIntro')->name('giftIntro');
Route::get('/gifts/{picture}/{type}', 'IndexController@giftPicture')->name('giftPicture');
Route::get('/winners', 'IndexController@winners')->name('winners');
Route::get('/winners/{id}', 'IndexController@winners_detail')->name('winners_detail');
Route::get('/gov', 'IndexController@gov')->name('gov');
Route::get('news/{news}', 'NewsController@show')->name('news.show');
Route::get('en/news/{news}', 'NewsController@showEn')->name('news.show.en');
Route::middleware('auth')->group(function () {
    Route::post('user/verifyRepeat', 'AuthController@verifyRepeat')->name("user.verifyRepeat");
    Route::post('/verifyRegister', 'AuthController@verifyRegisterBank')->name("verifyRegister");
    Route::get('/event/{event}/reserve', 'EventController@reserve')->name("event.reserve");
    Route::post('/event/{event}/reserve/store', 'OrderController@store')->name("order.store");
    Route::get('logout', 'UserController@logout')->name('logout');
    Route::post('/logout', 'UserController@logout')->name('logout.post');
    Route::middleware('checkAdmin')->group(function () {
        Route::prefix('/cms/')->group(function () {

            Route::get('/', 'IndexController@cms')->name('cms.index');

            Route::get('mainPage', 'IndexController@mainPageShow')->name('mainPage');
            Route::post('mainPage/update', 'IndexController@mainPageUpdate')->name('cms.mainPage.update');
            Route::post('mainPage/search', 'IndexController@mainPageSearch')->name('cms.mainPage.search');


            Route::get('mainPage/sponsor', 'MainPageSponsorController@edit')->name('cms.sponsor.edit');
            Route::post('mainPage/sponsor', 'MainPageSponsorController@store')->name('cms.sponsor.store');
            Route::post('mainPage/sponsor/{id}/del', 'MainPageSponsorController@destroy')->name('cms.sponsor.del');


            Route::get('news/', 'NewsController@indexCms')->name('news.index');
            Route::get('news/create', 'NewsController@create')->name('news.create');
            Route::get('news/{news}/edit', 'NewsController@edit')->name('news.edit');
            Route::post('news/store', 'NewsController@store')->name('news.store');
            Route::post('news/{news}/delete', 'NewsController@destroy')->name('news.delete');
            Route::post('news/{news}/update', 'NewsController@update')->name('news.update');

            // add edit del update english news
            Route::get('news/en', 'NewsController@indexCmsEn')->name('news.en.index');
            Route::get('news/en/create', 'NewsController@createEn')->name('news.en.create');
//            Route::get('news/en/{news}/edit', 'NewsController@editEn')->name('news.en.edit');
//            Route::post('news/en/store', 'NewsController@storeEn')->name('news.en.store');
//            Route::post('news/en/{news}/update', 'NewsController@updateEn')->name('news.en.update');


            Route::post('picture/{picture}/delete', 'PictureController@destroy')->name('picture.delete');
            //------
            Route::get('events', 'EventController@indexCms')->name('event.index');
            Route::get('events/create', 'EventController@create')->name('event.create');
            Route::get('events/{event}/edit', 'EventController@edit')->name('event.edit');
            Route::get('events/{event}/orders', 'EventController@orders')->name('event.orders');
            Route::get('events/{event_id}/orders', 'EventController@orders')->name('event.orders');
            Route::get('events/{event_id}/orders/excel', 'OrderController@export')->name('event.orders.excel');
            Route::get('orders/excel', 'OrderController@exportAll')->name('orders.excel');
            Route::post('events/store', 'EventController@store')->name('event.store');
            Route::post('events/{event}/delete', 'EventController@destroy')->name('event.delete');
            Route::post('events/{event}/update', 'EventController@update')->name('event.update');

            Route::resource('eventCategory', 'EventCategoryController');


            //------
            Route::get('messages/', 'MessageController@index')->name('message.index');
            Route::post('messages/{message}/delete', 'MessageController@destroy')->name('message.delete');
            //------
            Route::get('jobs', 'JobController@indexCms')->name("cms.job.index");
            Route::post('jobs', 'JobController@indexCms')->name("cms.job.index");
            Route::get('job/{id}', 'JobController@showCms')->name("cms.job.show");
            Route::post('job/state/store/{id}', 'JobController@storeCms')->name('cms.job.store');
            Route::post('job//{id}/delete', 'JobController@destroyCms')->name('cms.job.destroy');
            //------
            Route::get('users', 'UserController@indexCms')->name('cms.user.index');
            Route::post('users', 'UserController@indexCms')->name('cms.user.index');
            Route::get('users/excel', 'UserController@export')->name('users.excel');
            Route::post('user/{id}/confirm', 'UserController@activeUser')->name('cms.user.active');
            Route::get('user/{id}/edit', 'UserController@edit')->name('cms.user.edit');
            Route::get('user/{user}/badge', 'UserController@badge')->name('cms.user.badge.edit');
            Route::post('user/{user}/badge/update', 'UserController@badgeUpdate')->name('cms.user.badge.update');
            Route::post('user/updateAdm', 'UserController@UpdateAdm')->name('user.updateAdm');
            Route::post('user/search', 'UserController@search')->name('cms.user.search');
            Route::get('user/search', 'UserController@search')->name('cms.user.search');
            Route::get('admins', 'UserController@admins')->name('admins');
            Route::post('admin/add', 'UserController@adminAdd')->name('admin.add');
            Route::post('admin/del', 'UserController@adminDel')->name('admin.del');
//            Route::post('user/{id}/destroy','UserController@destroy')->name('cms.user.del');
            Route::get('users/upgrade', "ProfileController@upgradeIndex")->name('cms.user.upgrade');
            Route::post('users/upgrade', "ProfileController@upgradeIndex")->name('cms.user.upgrade');
            Route::get('users/upgrade/{id}', "ProfileController@upgradeEdit")->name('cms.user.upgrade.edit');
            Route::post('users/upgrade/edit', "ProfileController@doUpgradeAdmin")->name('cms.user.upgrade.update');


            //------
            Route::get('passedCourse/{id}/edit', 'PassedCoursesController@edit')->name('PassedCourses.edit');
            Route::get('passedCourses', 'PassedCoursesController@index')->name('PassedCourses');
            Route::post('passedCourse/{id}/del', 'PassedCoursesController@destroy')->name('PassedCourses.del');
            Route::get('passedCourse/create', 'PassedCoursesController@create')->name('PassedCourses.create');
            Route::post('passedCourse/store', 'PassedCoursesController@store')->name('PassedCourses.store');
            Route::post('passedCourseSk/store', 'PassedCoursesController@storeSk')->name('PassedCourses.store.sk');
            Route::post('userPassedCourse/store', 'PassedCoursesController@storeCourseForUser')->name('UserPassedCourses.store');
            Route::post('passedCourse/{id}/update', 'PassedCoursesController@update')->name('PassedCourses.update');
            Route::post('passedCourse/bycat', 'PassedCoursesController@getCouseByCat')->name('PassedCourses.bycats');
            Route::get('ManageCourses', 'PassedCoursesController@relationUserCourse')->name('ManageCourses');
            Route::get('userPassedCourse/{id}', 'PassedCoursesController@PassedCoursesByUser')->name('PassedCourses.byUser');
            Route::get('userPassedCourseSk/{id}', 'PassedCoursesController@PassedCoursesByUserSk')->name('PassedCourses.byUser.sk');
            Route::post('userPassedCourse/del', 'PassedCoursesController@destroyCourseForUser')->name('PassedCourses.byUser.del');
            //------
            Route::post('document/del', 'DocumentController@destroy')->name('document.del');
            //------
            Route::get('buyReport', 'OrderController@index')->name('buyReport');
            Route::post('buyReport', 'OrderController@index')->name('buyReport');
            //------
            Route::get('gifts', 'GiftController@index')->name('gift.index');
            Route::get('gift/create', 'GiftController@create')->name('gift.create');
            Route::post('gift/store', 'GiftController@store')->name('gift.store');
            Route::post('gift/{gift}/delete', 'GiftController@destroy')->name('gift.delete');

            Route::get('membership', 'MembershipTypeController@index')->name('membership');
            Route::get('membership/{id}/edit', 'MembershipTypeController@edit')->name('membership.edit');
            Route::post('membership/{id}/update', 'MembershipTypeController@update')->name('membership.update');

            /*-------------------------------------------------------*/
            Route::resource('imageGallery', 'ImageGalleryController');
            Route::resource('videoGallery', 'VideoGalleryController');


        });
    });
});


Route::post('/user/update', 'UserController@Update')->name('user.update');


Route::post("/applyJob", "RequestController@store")->name("applyJob");
Route::get('news', 'NewsController@index')->name('news');
Route::get('en/news', 'NewsController@indexEn')->name('news.en');

Route::resource("job", "JobController");

Route::post('/event/list', 'EventController@indexJs')->name('event.list');
Route::get('callback', 'IndexController@callback')->name('callback');
Route::get('bank', 'IndexController@bank')->name('bank');
Route::any('verifyBank', 'IndexController@verify')->name('verifyBank');
Route::get('orderCode/{orderCode}', 'OrderCodeController@show')->name('orderCode.show');

Route::get('test', function () {

    $name = word2uni("ژپسسیپژپ ژگسگیشگ");

    $img = Image::make(public_path('img/BO1-blue.jpg'));
    $img->text($name, 620, 300, function (\Intervention\Image\Gd\Font $font) {

        $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
        $font->size(28);
        $font->color('#4285F4');
        $font->align('right');
        $font->valign('bottom');
        $font->angle(0);
    });
    $img->save(public_path('img/text_with_image.jpg'));

    echo "<img src='img/text_with_image.jpg'>";

});


Route::get('statute', function () {
    $breadcrumb = $titleHeader = "اسناد مرجع";
    return view('statute', compact('breadcrumb', 'titleHeader'));
})
    ->name("statute");


Route::get('ImageArchive', function () {
    $breadcrumb = "آرشیوه تصاویر";
    $titleHeader = "آلبوم ها";
    return view('image_archive', compact('breadcrumb', 'titleHeader'));

})->name('ImageArchive');


Route::get('ImageArchiveGallery', function () {
    $breadcrumb = "آلبوم";
    $titleHeader = "تصاویر آلبوم";
    return view('image_archive_gallery', compact('breadcrumb', 'titleHeader'));

})->name('ImageArchiveGallery');

//Route::get('VideoArchive', function () {
//    $breadcrumb = "آرشیو ویدیو ها";
//    $titleHeader = "ویدیو ها";
//    return view('video_archive', compact('breadcrumb', 'titleHeader'));
//})->name('VideoArchive');
Route::get('VideoArchive', 'VideoGalleryController@archive')->name('VideoArchive');

/*Route::get('Committees', function () {
    $breadcrumb = "کمیته ها";
    $titleHeader = "کمیته ها";
    return view('committees', compact('breadcrumb', 'titleHeader'));

})->name('committees');*/


Route::get('WorkingGroups', function () {
    $breadcrumb = "کارگروه ها";
    $titleHeader = "کارگروه ها";
    return view('working_groups', compact('breadcrumb', 'titleHeader'));

})->name('WorkingGroups');


Route::prefix('Committees')->group(function () {

    Route::get('register', function () {
        $breadcrumb = $titleHeader = "کمیته عضویت";
        $events = \App\Event::whereCommitteeId(1);

        return view('committees.register', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('committees.register');

    Route::get('awards', function () {
        $breadcrumb = $titleHeader = "کمیته جایزه ملی مدیریت پروژه";
        $events = \App\Event::whereCommitteeId(2);

        return view('committees.awards', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('committees.awards');

    Route::get('education', function () {
        $breadcrumb = $titleHeader = "کمیته آموزش";
        $events = \App\Event::whereCommitteeId(3);
        return view('committees.education', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('committees.education');

    Route::get('researches', function () {
        $breadcrumb = $titleHeader = "کمیته پژوهش و انتشارات";
        $events = \App\Event::whereCommitteeId(4);
        return view('committees.researches', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('committees.researches');

    Route::get('certificate', function () {
        $breadcrumb = $titleHeader = "کمیته گواهینامه ها";
        $events = \App\Event::whereCommitteeId(5);
        return view('committees.certificate', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('committees.certificate');

});

/*Route::get('/branches', 'IndexController@branches')->name('branches');*/
Route::prefix("branches")->group(function () {

    Route::get('north-west', function () {
        $breadcrumb = "شاخه ها ";
        $titleHeader = "شاخه مرکز";
        $events = \App\Event::whereBranchId(1);
        return view('branches.center', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('branches.center');


    Route::get('north-west', function () {
        $breadcrumb = "شاخه ها ";
        $titleHeader = "شاخه شمال غرب";
        $events = \App\Event::whereBranchId(4);
        return view('branches.northWest', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('branches.northWest');


    Route::get('khozestan', function () {
        $breadcrumb = "شاخه ها ";
        $titleHeader = "شاخه خوزستان";
        $events = \App\Event::whereBranchId(6);
        return view('branches.khozestan', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('branches.khozestan');


    Route::get('esfehan', function () {
        $breadcrumb = "شاخه ها ";
        $titleHeader = "شاخه اصفهان";
        $events = \App\Event::whereBranchId(2);
        return view('branches.esfehan', compact('titleHeader', 'breadcrumb', "events"));
    })->name('branches.esfehan');


    Route::get('khorasan', function () {
        $breadcrumb = "شاخه ها ";
        $titleHeader = "شاخه خراسان";
        $events = \App\Event::whereBranchId(3);
        return view('branches.khorasan', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('branches.khorasan');

});

Route::prefix("working-groups")->group(function () {

    Route::get('women', function () {
        $breadcrumb = "کار گروه ها";
        $titleHeader = "کار گروه ها زنان";
        $events = \App\Event::whereWorkGroupId(1);
        return view('WorkingGroups.index', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('WorkingGroups.women');


    Route::get('PMIS', function () {
        $breadcrumb = "کار گروه ها";
        $titleHeader = "PMIS کار گروه ";
        $events = \App\Event::whereWorkGroupId(2);
        return view('WorkingGroups.index', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('WorkingGroups.PMIS');


    Route::get('knowledgeManagement', function () {
        $breadcrumb = "کار گروه ها";
        $titleHeader = "کار گروه مدیریت دانش";
        $events = \App\Event::whereWorkGroupId(3);
        return view('WorkingGroups.index', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('WorkingGroups.knowledgeManagement');


    Route::get('startup', function () {
        $breadcrumb = "کار گروه ها";
        $titleHeader = "کار گروه استارت آپ";
        $events = \App\Event::whereWorkGroupId(4);
        return view('WorkingGroups.index', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('WorkingGroups.startup');


    Route::get('ProjectAndProgram', function () {
        $breadcrumb = "کار گروه ها";
        $titleHeader = "کار گروه سید و برنامه پروژه";
        $events = \App\Event::whereWorkGroupId(5);
        return view('WorkingGroups.index', compact('titleHeader', 'breadcrumb', 'events'));
    })->name('WorkingGroups.ProjectAndProgram');

});


Route::get("h/{id}", function ($id) {
    $user = \App\User::find($id);
    var_dump($enc = encrypt($user->email));
    $dec = decrypt($enc);
    echo "<br>";
    return $dec;
});
Route::get('card', 'UserController@showCard');
Route::get('webinar', function () {
    $breadcrumb = $titleHeader = "وبینار ها";
    return view('webinar', compact('breadcrumb', 'titleHeader'));
})->name('webinar');


//Route::get("testMail", function () {
//    Jalalian::forge('today')->format('%A, %d %B %y')
//    $order = \App\Order::find(41);
//    Mail::to('drvafaiee@gmail.com')->send(new \App\Mail\OrderEmail($order));
//    dd(1);
//});
//Route::get("createOrder/{order}", 'OrderCodeController@show');

Route::get('test', function () {
    // branch 6 , committe 5 , work 5
    DB::table('events')->where('id', '<=', '6')->update(['branch_id' => 1, 'committee_id' => 1, 'working_group_id' => 1]);
    DB::table('events')->where('id', '>=', '7')
        ->where('id', '<=', '12')->update(['branch_id' => 2, 'committee_id' => 2, 'working_group_id' => 2]);

    DB::table('events')->where('id', '>=', '13')
        ->where('id', '<=', '19')->update(['branch_id' => 3, 'committee_id' => 3, 'working_group_id' => 3]);

    DB::table('events')->where('id', '>=', '20')
        ->where('id', '<=', '26')->update(['branch_id' => 4, 'committee_id' => 4, 'working_group_id' => 4]);

    DB::table('events')->where('id', '>=', '27')
        ->where('id', '<=', '33')->update(['branch_id' => 5, 'committee_id' => 5, 'working_group_id' => 5]);


    DB::table('events')->where('id', '>=', '34')
        ->where('id', '<=', '40')->update(['branch_id' => 6, 'committee_id' => 6, 'working_group_id' => 6]);
});


Route::get('top-research-award', function () {
    $breadcrumb = $titleHeader = "جایزه مدیر پروژه برتر";
    return view('top_research_award', compact('breadcrumb', 'titleHeader'));
})->name("top-research-award");


Route::get('delta-gov', function () {
    $breadcrumb = $titleHeader = "گواهینامه های دلتا";
    return view('delta-gov', compact('breadcrumb', 'titleHeader'));
})->name('delta_gov');


Route::get('consultants-gov', function () {
    $breadcrumb = $titleHeader = "گواهینامه های مشاوران";
    return view('consultants-gov', compact('breadcrumb', 'titleHeader'));
})->name('consultants_gov');


Route::get('Periods-of-association', function () {
    $breadcrumb = $titleHeader = "ادوار انجمن";
    return view('Periods_of_association', compact('breadcrumb', 'titleHeader'));
})->name('Periods_of_association');

Route::get('companies', function () {
    return view('users');
})->name('companies');


Route::get('mail', function () {
    return \Mail::to("drvafaiee@gmail.com")->send(new \App\Mail\RegisterMail("11588752619.jpg", "محمد رضا وفایی"));
})->name("mail");

Route::get('mail2', function () {
    $upgradeUrl = $repeatUrl = $text = "adad";
    return view('email.reminder', compact("upgradeUrl", "repeatUrl", 'text'));
})->name("mail2");

Route::get('trainingColleagues', function () {
    return view('training_colleagues');
})->name('trainingColleagues');

Route::get('tst', function () {
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 960);
    $arr = array();
    DB::beginTransaction();
    foreach ($arr as $row) {
        $main = $memberType = 0;

        switch ($row[4]) {
            case "M":
                $memberType = 1;
                $main = 1;
                break;
            case "S":
                $memberType = 3;
                break;
            case "A":
                $memberType = 1;
                break;

        }

        $jdate = $row[2] == null ? new \Morilog\Jalali\Jalalian(1376, 10, 26) : new \Morilog\Jalali\Jalalian(explode('/', $row[2])[0], explode('/', $row[2])[1], explode('/', $row[2])[2]);

//        dd($jdate->toCarbon()->timestamp , time());
        $slug = "";
        $i = 1;
        if ($row[37] != null) {
            foreach (explode(" ", $row[37]) as $slg) {

                $slug .= $slg . ($i == count(explode(" ", $row[37])) ? "" : "-");

                $i++;
            }

            foreach (explode(" ", $row[38]) as $slgg) {

                $slug .= "-" . $slgg;

                $i++;
            }
        } else {
            $slug = mt_rand(0, 999999999999999999);
        }


        $id = \App\User::insertGetId([
            'first_name' => $row[6] ?? " ",
            'last_name' => $row[7] ?? " ",
            'email' => $row[10] == null ? mt_rand(0, 999999999999999999) . "@g.com" : $row[10],
            'mobile' => $row[8] == null ? "76".mt_rand(0, 999999999) : (strlen($row[8]) == 11?$row[8]:"0".$row[8]),
            'password' => \Hash::make($row[8]),
            "expire" => $jdate->toCarbon()->timestamp,
            "active" => (int)($jdate->toCarbon()->timestamp >= time()),
            'name_en' => $row[37] . " " . $row[38],
            'slug' => $slug,
            'user_code' => $row[3] . "-" . $row[4],
            'membership_type_id' => $memberType,
            'main' => $main,

        ]);


        $pro = new \App\Profile([
            'user_id' => $id,
            "sex" => (int)($row[35] == null),
            'father_name' => $row[18],
            "certificate_number" => $row[19],
            'national_code' => $row[20],
            'birth_date' => $row[21] . '/' . $row[22] . "/" . $row[23],
            'receive_place' => $row[11] == null ? 0 : ($row == "محل کار"),
            'home_address' => $row[13],
            'work_tel' => $row[15],
            'home_tel' => $row[16],
            'work_address' => $row[14],
            'specialized_basins' => $row[25],

        ]);
        $pro->save();


        $grade = $row[27] == null ? " " : (explode(' ', $row[27])[0] ? (count(explode(' ', $row[27])) > 1) ? explode(' ', $row[27])[1] : " " : explode(' ', $row[27])[0]);
        $edu = new \App\Education([
            'education_place' => "",
            'gpa' => "0",
            'from_date' => "1300/01/01",
            'to_date' => "1300/01/01",
            'user_id' => $id,
            "grade" => $grade,
            "field_of_study" => $row[27] ?? " ",
        ]);
        $edu->save();

        $membership = new \App\Membership(
            [
                'membership_type_id' => $memberType,
                'user_id' => $id,
                'year' => 1,
                'lang_id' => 1
            ]
        );

        $membership->save();
    }
    DB::commit();
});

#{"_token":"rGi0QW9D7Z1UzaX5K1XE51jBZlrkSsCPRHastdAd","membership_type_id":"1","year":"1","first_name":"jasdhaksdasd  ashd","last_name":"jasdhaksdasd  ashd","name_en":"jasdhaksdasd  ashd","profile":{"father_name":"jasdhaksdasd  ashd","national_code":"1321323","certificate_number":"123123123","birth_date":"1397\/10\/23","birth_place":"jasdhaksdasd  ashd","sex":"1","work_address":"jasdhaksdasd  ashd","work_post":"23213213232","home_address":"jasdhaksdasd  ashd","home_post":"213212132","work_name":"jasdhaksdasd  ashd","receive_place":"0"},"mobile":"09198167422","email":"dr@g.com","files_explain":["jasdhaksdasd  ashd"],"workExperience":{"company_name":"jasdhaksdasd  ashd","job_title":"jasdhaksdasd  ashd","from_date":"1397\/10\/23","to_date":"1397\/10\/23"},"branch_id":"1","password":"12345678","password_confirmation":"12345678","files":[{}],"documents":[{"address":"15888794110.png","explain":"jasdhaksdasd  1"},{"address":"15888794110.png","explain":"jasdhaksdasd  2"},{"address":"15888794110.png","explain":"jasdhaksdasd  3"},{"id":50,"state":0,"address":"15888794110.png","explain":"jasdhaksdasd  4"}]}

