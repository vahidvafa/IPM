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

use App\MembershipType;
use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('main');
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
Route::get('/branches', 'IndexController@branches')->name('branches');
Route::get('/research', 'IndexController@research')->name('research');
Route::get('/gifts', 'IndexController@gifts')->name('gifts');
Route::get('/winners', 'IndexController@winners')->name('winners');
Route::get('/winners/{id}', 'IndexController@winners_detail')->name('winners_detail');
Route::get('/gov', 'IndexController@gov')->name('gov');
Route::get('news/{news}', 'NewsController@show')->name('news.show');
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


            Route::get('news/', 'NewsController@indexCms')->name('news.index');
            Route::get('news/create', 'NewsController@create')->name('news.create');
            Route::get('news/{news}/edit', 'NewsController@edit')->name('news.edit');
            Route::post('news/store', 'NewsController@store')->name('news.store');
            Route::post('news/{news}/delete', 'NewsController@destroy')->name('news.delete');
            Route::post('news/{news}/update', 'NewsController@update')->name('news.update');

            // add edit del update english news
            Route::get('news/en', 'NewsController@indexCmsEn')->name('news.en.index');
            Route::get('news/en/create', 'NewsController@createEn')->name('news.en.create');
            Route::get('news/en/{news}/edit', 'NewsController@editEn')->name('news.en.edit');
            Route::post('news/en/store', 'NewsController@storeEn')->name('news.en.store');
            Route::post('news/en/{news}/update', 'NewsController@updateEn')->name('news.en.update');


            Route::post('picture/{picture}/delete', 'PictureController@destroy')->name('picture.delete');
            //------
            Route::get('events/', 'EventController@indexCms')->name('event.index');
            Route::get('events/create', 'EventController@create')->name('event.create');
            Route::get('events/{event}/edit', 'EventController@edit')->name('event.edit');
            Route::get('events/{event}/orders', 'EventController@orders')->name('event.orders');
            Route::get('events/{event_id}/orders', 'EventController@orders')->name('event.orders');
            Route::get('events/{event_id}/orders/excel', 'OrderController@export')->name('event.orders.excel');
            Route::post('events/store', 'EventController@store')->name('event.store');
            Route::post('events/{event}/delete', 'EventController@destroy')->name('event.delete');
            Route::post('events/{event}/update', 'EventController@update')->name('event.update');

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


        });
    });
});


Route::post('/user/update', 'UserController@Update')->name('user.update');


Route::post("/applyJob", "RequestController@store")->name("applyJob");
Route::get('news', 'NewsController@index')->name('news');

Route::resource("job", "JobController");

Route::post('/event/list', 'EventController@indexJs')->name('event.list');
Route::get('callback', 'IndexController@callback')->name('callback');
Route::get('bank', 'IndexController@bank')->name('bank');
Route::post('verifyBank', 'IndexController@verify')->name('verifyBank');
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

Route::get('VideoArchive', function () {
    $breadcrumb = "آرشیو ویدیو ها";
    $titleHeader = "ویدیو ها";
    return view('video_archive', compact('breadcrumb', 'titleHeader'));

})->name('VideoArchive');


Route::get('Committees', function () {
    $breadcrumb = "کمیته ها";
    $titleHeader = "کمیته ها";
    return view('committees', compact('breadcrumb', 'titleHeader'));

})->name('committees');


Route::get('WorkingGroups', function () {
    $breadcrumb = "کارگروه ها";
    $titleHeader = "کارگروه ها";
    return view('working_groups', compact('breadcrumb', 'titleHeader'));

})->name('WorkingGroups');


Route::prefix('Committees')->group(function () {

    Route::get('register', function () {
        $breadcrumb = $titleHeader = "کمیته عضویت";
        return view('committees.register', compact('titleHeader', 'breadcrumb'));
    })->name('committees.register');

    Route::get('awards', function () {
        $breadcrumb = $titleHeader = "کمیته جایزه ملی";
        return view('committees.awards', compact('titleHeader', 'breadcrumb'));
    })->name('committees.awards');

    Route::get('education', function () {
        $breadcrumb = $titleHeader = "کمیته آموزش";
        return view('committees.education', compact('titleHeader', 'breadcrumb'));
    })->name('committees.education');

    Route::get('researches', function () {
        $breadcrumb = $titleHeader = "کمیته پژوهش و انتشارات";
        return view('committees.researches', compact('titleHeader', 'breadcrumb'));
    })->name('committees.researches');

    Route::get('certificate', function () {
        $breadcrumb = $titleHeader = "کمیته گواهینامه ها";
        return view('committees.certificate', compact('titleHeader', 'breadcrumb'));
    })->name('committees.certificate');

});

Route::get("hashMake/{id}", function ($id) {
    $user = \App\User::find($id);
    var_dump($enc = encrypt($user->email));
    $dec = decrypt($enc);
    echo "<br>";
    return $dec;
});
Route::get('card', 'UserController@showCard');
//Route::get("testMail", function () {
//    Jalalian::forge('today')->format('%A, %d %B %y')
//    $order = \App\Order::find(41);
//    Mail::to('drvafaiee@gmail.com')->send(new \App\Mail\OrderEmail($order));
//    dd(1);
//});
//Route::get("createOrder/{order}", 'OrderCodeController@show');

Route::get('test',function (){
    $userController = new \App\Http\Controllers\UserController();

    return $userController->activeUser(4);
});


#{"_token":"rGi0QW9D7Z1UzaX5K1XE51jBZlrkSsCPRHastdAd","membership_type_id":"1","year":"1","first_name":"jasdhaksdasd  ashd","last_name":"jasdhaksdasd  ashd","name_en":"jasdhaksdasd  ashd","profile":{"father_name":"jasdhaksdasd  ashd","national_code":"1321323","certificate_number":"123123123","birth_date":"1397\/10\/23","birth_place":"jasdhaksdasd  ashd","sex":"1","work_address":"jasdhaksdasd  ashd","work_post":"23213213232","home_address":"jasdhaksdasd  ashd","home_post":"213212132","work_name":"jasdhaksdasd  ashd","receive_place":"0"},"mobile":"09198167422","email":"dr@g.com","files_explain":["jasdhaksdasd  ashd"],"workExperience":{"company_name":"jasdhaksdasd  ashd","job_title":"jasdhaksdasd  ashd","from_date":"1397\/10\/23","to_date":"1397\/10\/23"},"branch_id":"1","password":"12345678","password_confirmation":"12345678","files":[{}],"documents":[{"address":"15888794110.png","explain":"jasdhaksdasd  1"},{"address":"15888794110.png","explain":"jasdhaksdasd  2"},{"address":"15888794110.png","explain":"jasdhaksdasd  3"},{"id":50,"state":0,"address":"15888794110.png","explain":"jasdhaksdasd  4"}]}
