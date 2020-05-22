<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href=""/>
    <title>انجمن مدیریت پروژه</title>
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel='stylesheet' href="{{asset('css/bootstrap.min.css')}}" type='text/css' media='all'/>
    <link rel="stylesheet" href="{{asset('css/stylefont.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/fontiran.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/style-main.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type='text/css' media='all'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script type='text/javascript' src='{{asset('js/bootstrap.min.js')}}'></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>


    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function () {
            // jQuery code
            /*$('.has-sub').click(function (e) {
                $('.submenu-left').css('display', 'block')
            });*/
            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function (e) {
                e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                $('.dropdown-menu a').click(function (e) {
                    e.preventDefault();
                    if ($(this).next('.submenu').length) {
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function () {
                        $(this).find('.submenu').hide();
                    })
                });
            }

        }); // jquery end
    </script>


</head>
<body style="overflow-x: hidden">
@guest()
    <div class="register-fix">
        <a href="{{route('register')}}" target="_blank">
            <span class="register-fix-in text">
                همین الان عضو شو
            </span>
        </a>
    </div>
@endguest

<header id="header">
    <div class="header-top-bar back-dark-violet pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-8 col-md-8 d-lg-flex align-items-center pr-0">
                    <img class="img-fluid" src="{{asset('img/logo.png')}}" alt="انجمن مدیریت پروژه">
                    <h1 class="text-white d-inline-block font-18 text-regular text-logo ml-2">انجمن مدیریت پروژه
                        ایران</h1>
                    <form method="post" action="{{route('search.post')}}" class="form-top">
                        @csrf
                        <input name="search" type="search" placeholder="جستجو" autocomplete="off"/>
                    </form>
                </div>
                <div class="col-4 col-md-4 text-right">
                    <img class="img-fluid logo-ipma" src="{{asset('img/ipma-logo.png')}}" alt="انجمن مدیریت پروژه">
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar ">
        <div class="header-menu pt-2 pb-2">
            <div class="container">
                <div class="row">

                    <nav class="navbar navbar-expand-lg  navbar-dark col-12">


                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav nav-login-out ml-auto  order-lg-1">
                            <!-- Dropdown -->
                            <li class="nav-item dropdown nav-lang">
                                @auth()
                                    <div class="nav-link dropdown-toggle nav-login" id="navbardrop6"
                                         data-toggle="dropdown">
                                        <i class="fa fa-user mr-1"></i>
                                        <span>پروفایل</span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item profile-dropdown"
                                           href="{{route('profile',auth()->user()->slug)}}" target="_blank" ><i
                                                    class="fa fa-user mr-1"></i><span>مشاهده پروفایل</span></a>
                                        <hr class="m-0">
                                        <a class="dropdown-item profile-dropdown " href="{{route('logout')}}"><i
                                                    class="fa fa-sign-out-alt mr-1"></i><span>خروج</span></a>
                                    </div>
                                @else
                                    <a class="nav-link nav-login" data-toggle="modal" data-target="#ModalLogin">
                                        <i class="fa fa-user mr-1"></i>
                                        <span href="/res">ورود کاربران</span>
                                    </a>
                                @endauth
                            </li>
                            <!--<li class="nav-item ">-->
                            <!--<a class="nav-link nav-login" data-toggle="modal" data-target="#ModalLogin">-->
                            <!--<i class="fa fa-user mr-1"></i>-->
                            <!--<span>   ورود کاربران</span>-->
                            <!--</a>-->

                            <!--</li>-->
                            <!-- Dropdown -->
                            <li class="nav-item dropdown nav-lang">
                                <a class="nav-link dropdown-toggle nav-lang-persian" href="#" id="navbardrop5"
                                   data-toggle="dropdown">
                                    <span>فارسی</span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item nav-lang-eng" href="#"><span>انگلیسی</span></a>
                                </div>
                            </li>
                        </ul>
                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse order-lg-0" id="collapsibleNavbar">
                            <ul class="navbar-nav header-main">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_blank"
                                    >درباره انجمن</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('about-us')}}#more">بیشتر بدانیم</a>
                                        <a class="dropdown-item" target="_blank" href="{{route('about-us')}}#history">تاریخچه</a>
                                        <a class="dropdown-item" target="_blank" href="{{route('about-us')}}#target">اهداف و نقشه
                                            راهبردی</a>
                                        <a class="dropdown-item" target="_blank" href="{{route('about-us')}}#creator">موسسین</a>
                                        <a class="dropdown-item" target="_blank" href="{{route('about-us')}}#board-of-directors">هیات
                                            مدیره</a>
                                        <a class="dropdown-item" target="_blank" href="{{route('about-us')}}#chart">چارت سازمانی</a>
                                        <div class="dropdown-divider">برای دانلود</div>
                                        <a class="dropdown-item" target="_blank" href="{{route('download')}}">اسناد مرجع</a>
                                        <a class="dropdown-item" href="{{route('download')}}"
                                           target="_blank">مجوزها</a>
                                        <a class="dropdown-item"  target="_blank" href="{{route('download')}}">گزارش ها</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        کمیته ها و شاخه ها و کارگروه ها</a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item has-sub dropdown-toggle">کمیته ها</a>

                                            <div class="submenu submenu-left dropdown-menu">
                                                <a class="dropdown-item" target="_blank" href="{{route('committees.register')}}">کمیته
                                                    عضویت</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('committees.awards')}}">کمیته
                                                    جایزه
                                                    ملی</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('committees.education')}}">کمیته
                                                    آموزش</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('committees.researches')}}">کمیته
                                                    پژوهش و انتشارات</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('committees.certificate')}}">مرکز
                                                    گواهینامه ها</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item has-sub dropdown-toggle">شاخه ها</a>

                                            <div class="submenu submenu-left dropdown-menu">
                                                <a class="dropdown-item" target="_blank" href="{{route('branches.northWest')}}">شاخه
                                                    شمال
                                                    غرب</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('branches.khozestan')}}">شاخه
                                                    خوزستان</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('branches.esfehan')}}">شاخه
                                                    اصفهان</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('branches.khorasan')}}">شاخه
                                                    خراسان</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item has-sub dropdown-toggle">کارگروه ها</a>
                                            <div class="submenu submenu-left dropdown-menu">
                                                <a class="dropdown-item" target="_blank" href="{{route('WorkingGroups.women')}}">کار
                                                    گروه
                                                    زنان</a>
                                                <a class="dropdown-item" target="_blank" href="{{route('WorkingGroups.PMIS')}}">کار
                                                    گروه
                                                    PMIS</a>
                                                <a class="dropdown-item" target="_blank"
                                                   href="{{route('WorkingGroups.knowledgeManagement')}}">کار گروه
                                                    مدیریت
                                                    دانش</a>
                                                <a class="dropdown-item" target="_blank"
                                                   href="{{route('WorkingGroups.startup')}}">کار گروه
                                                    استارت آپ</a>
                                                <a class="dropdown-item" target="_blank"
                                                   href="{{route('WorkingGroups.ProjectAndProgram')}}">کار گروه سید
                                                    و برنامه
                                                    پروژه</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_blank" >
                                        درباره اعضا </a>
                                    <div class="dropdown-menu">
                                        @guest
                                            <a class="dropdown-item" target="_blank" href="{{route('register')}}">ثبت عضویت</a>
                                        @endguest

                                        <a class="dropdown-item" target="_blank" href="{{route('user.search')}}">يافتن اعضا</a>
                                        <a class="dropdown-item" href="http://yc.ipma.ir/" target="_blank">شبكه اعضا
                                            جوان</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " target="_blank" href="{{route('job.index')}}">فرصت های شغلی</a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link " target="_blank" href="{{route('message.create')}}">تماس با ما</a>
                                </li>

                                @auth()
                                    @if(auth()->user()->roles == 0 || auth()->user()->roles == 1)
                                        <li class="nav-item ">
                                            <a class="nav-link" target="_blank" href="{{route('cms.index')}}">پنل مدیریت</a>
                                        </li>
                                    @endif

                                @endauth

                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
        <div class="slider-text pt-5 pb-5">
            <div class="container">
                <div class="row align-items-center justify-content-around pb-5 col-lg-6 col-md-6 "
                     style="margin-right: auto;margin-left: 0">
                    <div class="col-12 order-1 order-md-2 pt-5 pb-5 ">
                        <h2 class="font-24 text-white mb-5">
                            <span class="text-yellow">
                                {{$ipma->head_title}}
                            </span>
                        </h2>
                        <h3 class="font-18 text-white mb-4">
                            {{$ipma->head_subtitle}}
                        </h3>
                        <p class="font-16 text-white ">{{$ipma->head_description}}</p>
                        <a target="_blank" href="{{route($ipma->event_id==null ? "news.show":"event",[$ipma->event_id==null?$ipma->news_id:$ipma->event_id])}}"
                           class="btn btn-white font-16 text-black mt-5">ادامه مطلب</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</header>


<main id="content" role="main">
    <div class="popular-pack pt-lg-5  pb-5 ">
        <div class="container">
            <div class="row">
                <h2 class="text-center font-24 text-medium text-black col-12 mb-4 mb-sm-5"><span
                            class="text-yellow">پرطرفدارترین </span>رویدادها
                </h2>
                @foreach($events as $event)
                    <div class="col-12 col-md-6 mb-4">
                        <div class="popular-pack-in  d-flex flex-column flex-sm-row  flex-md-column flex-lg-row">

                            <div
                                    class="popular-pack-in-info mt-xl-0 mt-4 mt-sm-0 mt-md-4 order-2 order-sm-1   order-md-2 order-lg-1">
                                <div class="popular-pack-in-info-titles">
                                    <h4 class="popular-pack-in-info-title font-16 text-medium text-black mb-3 ">
                                        <a class="text-black hover-text-black" target="_blank"
                                           href="{{route('event',[$event->id])}}">
                                            {{$event->title}}
                                        </a></h4>
                                    <div class="popular-pack-in-info-title-sub text-yellow font-16 text-light2 mb-2">
                                        {{tr_num(explode(" ",jdate($event->from_date))[0],'fa')}}
                                    </div>
                                </div>
                                <div class="popular-pack-in-info-title-excerpt text-black-light font-14 text-light2">
                                    {{substr($event->description,0,150)."..."}}
                                </div>
                            </div>
                            <div class="popular-pack-in-images mt-4 mt-sm-0 order-1 order-sm-2  order-md-1 order-lg-2">
                                <div class="popular-pack-in-img">
                                    <img class="rounded" src="img/posts/{{$event->photo}}" alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="popular-pack-in-img-mores">
                                    <a target="_blank" href="{{route('event',[$event->id])}}" class="popular-pack-in-img-more font-16">شرکت
                                        در رویداد</a>

                                </div>
                            </div>
                            <div class="popular-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.1 62.7">
                                    <path
                                            d="M59.2,19.4c91.2-28.9,166.6,27.1,224,33.9c37.7,4.5,67.8-9.4,77.9-53.3H0v62.4C11.5,45.7,30.5,29.4,59.2,19.4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="last-pack pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">


                <h2 class="text-center font-24 text-medium text-black col-12 mb-4"><span
                            class="text-yellow"> آخرین</span>
                    رویدادها
                </h2>

                <div class="w-100"></div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 mt-4">
                    @foreach($eventsWithCats as $eventCat)
                        <li class="nav-item">
                            <a class="nav-link @if($loop->first) active @endif font-22 text-black text-regular"
                               data-toggle="tab" href="#m{{$eventCat->id}}">
                                {{$eventCat->name}}
                                <p class="font-14 text-black-light text-regular m-0 m-md-2">
                                    تعداد {{str_replace(" و گواهینامه ها","",$eventCat->name)}}:
                                    <span>{{tr_num($eventCat->event_count,'fa')}}</span></p>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content col-12 last-pack-content ">

                    @foreach($eventsWithCats as $eventCat)
                        <div class="tab-pane row @if($loop->first) active @endif " id="m{{$eventCat->id}}">
                            @foreach($eventCat->event as $event)
                                <div class="last-pack-content-in col-12 col-md-6 col-lg-12  mb-3 mt-3 pt-4 pb-4">
                                    <div class="row align-items-center">
                                        <div class="last-pack-content-in-time text-lg-left text-center col-12 col-lg-2">
                                            <p class="text-medium font-14 mb-1 mb-lg-2 m-0">شروع ثبت نام : <span
                                                        class="pl-1 "
                                                        dir="rtl">{{tr_num(explode(" ",jdate($event->start_register_date))[0],"fa")}}</span>
                                            </p>
                                            <p class="text-medium font-14 m-0">تاریخ برگزاری : <span
                                                        class="pl-2"
                                                        dir="rtl">{{tr_num(explode(" ",jdate($event->start_date))[0],"fa")}}</span>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-8 d-lg-flex align-items-center text-lg-left text-center">
                                            <div class="last-pack-content-in-img mt-3 mt-lg-0 mb-3 mb-lg-0">
                                                <div class="last-pack-content-in-img-in">
                                                    <img src="{{asset("img/posts/$event->photo")}}" alt="غکس رویداد">
                                                </div>

                                            </div>
                                            <div class="last-pack-content-in-description pl-3">
                                                <h2 class="text-black font-16 text-medium mb-3">{{$event->title}}</h2>
                                                <h3 class="text-light2 text-black-light font-14">{{substr($event->description,0,225)}}</h3>
                                            </div>
                                        </div>

                                        <div
                                                class="last-pack-content-in-more text-center col-12 col-lg-2 text-lg-left text-center">
                                            <a target="_blank" href="{{route("event",[$event->id])}}" class="btn btn-white-border">شرکت
                                                در رویداد</a>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        </div>
                    @endforeach

                </div>
                <div class="col-12 text-center last-pack-calender">
                    <a class="btn text-center last-pack-calender-btn" target="_blank" href="{{route('event.calender')}}">مشاهده تقویم
                        رویدادها</a>
                </div>
            </div>
        </div>
    </div>
    <div class="Committee  ">
        <div class="d-none d-lg-block container-fluid Committee-cont">
            <div class="row Committee-cont">
                <div class="col-12 col-lg-5 Committee-cont Committee-violet">


                </div>
                <div class="col-12 col-lg-7">

                </div>
            </div>

        </div>
        <div class=" Committee-content ">
            <div class="container">
                <div class="row  align-items-center">
                    <div class="col-12 col-lg-5 Committee-icons">
                        <div class="row">
                            <div class="col-6 text-center bl-1 bb-1 pt-5 pb-5">

                                <a class="Committee-icons-text d-block text-white text-medium" target="_blank" href="{{route('gov')}}">
                                    <img class="mb-3" src="img/003-patent-1.png" alt="anjoman">
                                    <p>گواهینامه های چهار سطحی</p></a>
                            </div>
                            <div class="col-6 text-center  bb-1 pt-5 pb-5">

                                <a class="Committee-icons-text d-block text-white text-medium"
                                   target="_blank" href="{{route('main')}}">
                                    <img class="mb-3" src="img/006-sports-and-competition-1.png" alt="anjoman">
                                    <p>گواهینامه های مشاوران</p></a>
                            </div>
                            <div class="col-6 text-center bl-1  pt-5 pb-5">

                                <a class="Committee-icons-text d-block text-white text-medium"
                                   target="_blank"  href="{{route('main')}}">
                                    <img class="mb-3" src="{{asset('img/analytics.png')}}" alt="anjoman">
                                    <p>گواهینامه های دلتا</p></a>
                            </div>
                            <div class="col-6 text-center pt-5 pb-5">
                                <a class="Committee-icons-text d-block text-white text-medium" target="_blank" href="//">
                                    <img class="mb-3" src="img/009-exam.png" alt="anjoman">
                                    <p>شاخه ها</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-lg-2"></div>
                    <div class="col-12 col-lg-5 Committee-icons">
                        <div class="row">
                            <div class="col-6 text-center bl-1 bb-1 pt-5 pb-5">
                                <a class="Committee-icons-text d-block text-white text-medium"
                                   target="_blank" href="{{route('committees.awards')}}">
                                    <img class="mb-3" src="{{asset('img/teamwork.png')}}" alt="anjoman">
                                    <p>جایزه ملی مدیریت پروژه</p></a>
                            </div>
                            <div class="col-6 text-center  bb-1 pt-5 pb-5">
                                <a class="Committee-icons-text d-block text-white text-medium"
                                   target="_blank" href="{{route('committees.researches')}}">
                                    <img class="mb-3" src="{{asset('img/content.png')}}" alt="anjoman">
                                    <p>جایزه پژوهش</p></a>
                            </div>
                            <div class="col-6 text-center bl-1  pt-5 pb-5">
                                <a class="Committee-icons-text d-block text-white text-medium"
                                   target="_blank" href="{{route('user.index')}}">
                                    <img class="mb-3" src="img/001-user-group.png" alt="anjoman">
                                    <p>جستجوی اعضا</p></a>
                            </div>

                            <div class="col-6 text-center   pt-5 pb-5">
                                <a class="Committee-icons-text d-block text-white text-medium"
                                   target="_blank" href="{{route('top-research-award')}}">
                                    <img class="mb-3" src="{{asset('img/link.png')}}" alt="anjoman">
                                    <p>جایزه مدیریت پروژه برتر</p></a>
                            </div>

                            <!--<div class="col-6 text-center bl-1  pt-5 pb-5">-->
                            <!--<img class="mb-3" src="img/002-loupe.png" alt="anjoman">-->
                            <!--<a class="Committee-icons-text d-block text-white text-medium" href="/">کمیته پژوهش</a>-->
                            <!--</div>-->
                            <!--<div class="col-6 text-center pt-5 pb-5">-->
                            <!--<img class="mb-3" src="img/003-crowd-of-users.png" alt="anjoman">-->
                            <!--<a class="Committee-icons-text d-block text-white text-medium" href="/">کمیته گردهمایی </a>-->
                            <!--</div>-->
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="news pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-3">
                    <h3 class="font-20 text-yellow text-light2 mb-3">آخرین خبرها</h3>
                    <h2 class="font-24 text-medium text-black  mb-4">از انجمن بیشتر بدانید
                    </h2>
                </div>
                <div class="col-12 col-lg-7 align-self-end">
                    <p class="text-black-light font-16">
                </div>
                <div class="col-12 col-lg-2">
                    <a target="_blank" href="{{route("news")}}" class="btn btn-white-border">آرشیو خبر</a>
                </div>
            </div>
            <div class="row mt-5">
                @foreach($news as $singleNews)
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="card card-news">
                            <div class="card-news-img">
                                <img src="{{asset('img/posts/'.$singleNews->photo)}}" class=""
                                     style="width: 100% !important;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-14 text-black">
                                    <span>[</span>{{\Morilog\Jalali\Jalalian::forge($singleNews->created_at)->format('%A, %d %B %y')}}
                                    <span>]</span>
                                </h5>
                                <p class="card-text font-14">{{$singleNews->title}}</p>
                                <a href="{{route('news.show',[$singleNews->id])}}" target="_blank"
                                   class="btn btn-news text-yellow text-medium">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--                    <div class="col-12 col-md-4 mb-3 mb-md-0">--}}
                {{--                        <div class="card card-news">--}}
                {{--                            <div class="card-news-img">--}}
                {{--                                <img src="img/last3.jpg" class="" alt="...">--}}
                {{--                            </div>--}}
                {{--                            <div class="card-body">--}}
                {{--                                <h5 class="card-title font-14 text-black"><span>[</span> 23 شهریور 1398 <span>]</span>--}}
                {{--                                </h5>--}}
                {{--                                <p class="card-text font-14">ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و--}}
                {{--                                    با--}}
                {{--                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله </p>--}}
                {{--                                <a href="/" class="btn btn-news text-yellow text-medium">ادامه مطلب</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-12 col-md-4 mb-3 mb-md-0">--}}
                {{--                        <div class="card card-news">--}}
                {{--                            <div class="card-news-img">--}}
                {{--                                <img src="img/last2.jpg" class="" alt="...">--}}
                {{--                            </div>--}}
                {{--                            <div class="card-body">--}}
                {{--                                <h5 class="card-title font-14 text-black"><span>[</span> 23 شهریور 1398 <span>]</span>--}}
                {{--                                </h5>--}}
                {{--                                <p class="card-text font-14">ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و--}}
                {{--                                    با--}}
                {{--                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله </p>--}}
                {{--                                <a href="/" class="btn btn-news text-yellow text-medium">ادامه مطلب</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-12 col-md-4 ">--}}
                {{--                        <div class="card card-news">--}}
                {{--                            <div class="card-news-img">--}}
                {{--                                <img src="img/last3.jpg" class="" alt="...">--}}
                {{--                            </div>--}}

                {{--                            <div class="card-body">--}}
                {{--                                <h5 class="card-title font-14 text-black"><span>[</span> 23 شهریور 1398 <span>]</span>--}}
                {{--                                </h5>--}}
                {{--                                <p class="card-text font-14">ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و--}}
                {{--                                    با--}}
                {{--                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله </p>--}}
                {{--                                <a href="/" class="btn btn-news text-yellow text-medium">ادامه مطلب</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
            </div>
        </div>
    </div>
    <div class="counter pt-0 pt-md-5 pb-sm-5">
        <div class="counters">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="section4 pt-4 pb-4 justify-content-around  row">
                            <div class="counter-in text-center col-6 col-md-3 mb-4 mb-md-0">

                                <h2 class="c-section4 text-white font-42 text-bold">6</h2>
                                <p class="count-text text-yellow font-18 text-regular m-0">گواهینامه سطح A</p>
                            </div>
                            <div class="counter-in text-center col-6  col-md-3 mb-4 mb-md-0">

                                <h2 class="c-section4 text-white font-42 text-bold">14</h2>
                                <p class="count-text text-yellow font-18 text-regular m-0">گواهینامه سطح B</p>
                            </div>
                            <div class="counter-in text-center col-6 col-md-3  mb-md-0">

                                <h2 class="c-section4 text-white font-42 text-bold">34</h2>
                                <p class="count-text text-yellow font-18 text-regular m-0">گواهینامه سطح C</p>
                            </div>
                            <div class="counter-in text-center col-6 col-md-3 ">

                                <h2 class="c-section4 text-white font-42 text-bold">576</h2>
                                <p class="count-text text-yellow font-18 text-regular m-0">گواهینامه سطح D</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="link-counters">
            <div class="container-fluid">
                <div class="row">
                    <div class="link-img col-12 col-sm p-0">
                        <img class="img-fluid" alt="..." src="{{asset('img/camera-lens.jpg')}}">
                        <a href="{{route('ImageArchive')}}" class="link-img-more" target="_blank" >
                            <i class="fa fa-image fa-2x"></i>
                            <p>آرشیو تصاویر</p>
                        </a>
                        <div class="overlay-img"></div>
                    </div>
                    <div class="link-img col-12 col-sm p-0">
                        <img class="img-fluid" alt="..." src="{{asset('img/film-camera.jpg')}}">
                        <a class="link-img-more" href="{{route('VideoArchive')}}" target="_blank" >
                            <i class="fas fa-video fa-2x"></i>
                            <p>آرشیو ویدیو </p>
                        </a>

                        <div class="overlay-img"></div>
                    </div>
                    <div class="link-img col-12 col-sm p-0">
                        <img class="img-fluid" alt="..." src="{{asset('img/webinar-concept.jpg')}}">
                        <a href="{{route('webinar')}}" class="link-img-more">
                            <i class="fa fa-desktop fa-2x"></i>
                            <p>وبینار ها</p>
                        </a>
                        <div class="overlay-img"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo mt-5 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-sm-5 pt-sm-5">
                    <div class="logo-slid ">
                        <div><a href="https://mci.ir/" target="_blank"><img src="{{asset('img/b1.png')}}"
                                                                            style="zoom:1.3;"></a></div>
                        <div><a href="https://www.iranianatlas.ir/" target="_blank"><img src="{{asset('img/b2.png')}}"
                                                                                         style="zoom:1.3;"></a></div>
                        <div><a href="http://www.farab.com/fa/" target="_blank"><img src="{{asset('img/b3.png')}}"
                                                                                     style="zoom:1.3;"></a></div>
                        <div><a href="https://www.mapnanyp.com/" target="_blank"><img src="{{asset('img/b4.png')}}"
                                                                                      style="zoom:1.3;"></a></div>
                        <div><a href="https://www.nyu.edu/" target="_blank"><img src="{{asset('img/b5.png')}}"
                                                                                 style="zoom:1.3;"></a></div>
                        <div><a href="https://www.nyu.edu/" target="_blank"><img src="{{asset('img/b5.png')}}"
                                                                                 style="zoom:1.3;"></a></div>
                        <div><a href="https://www.nyu.edu/" target="_blank"><img src="{{asset('img/b5.png')}}"
                                                                                 style="zoom:1.3;"></a></div>
                        <div><a href="https://www.nyu.edu/" target="_blank"><img src="{{asset('img/b5.png')}}"
                                                                                 style="zoom:1.3;"></a></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

<footer id="footer">
    <div class="container">
        <div class="row mb-3">
            <div class="contact-footer col-12 col-lg-5">
                <div class="footer-logo mb-3">
                    <img src="img/logo-foo.png" alt=".." style="width: 60px;">
                    <span class="text-regular text-white">تماس با انجمن</span>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14 text-bold"><span>آدرس:</span><span>{{$ipma->address}}</span>
                    </p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>تلفن:</span><span>{{$ipma->tel}}</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>نمابر:</span><span>{{$ipma->fax}}</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14">
                        <span>پست الكترونيك دبیرخانه:</span><span>{{$ipma->secretariat_email}}</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14">
                        <span>پست الکترونیک عضویت: </span><span>{{$ipma->membership_email  }}</span></p>
                </div>
            </div>
            <div class="link-footer col-6 col-sm-6 col-md-3 col-lg-2">
                <p class="text-regular text-white pt-2">لینک ها</p>
                <nav class="navbar p-0">

                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="http://yc.ipma.ir/" target="_blank" >شبکه اعضای جوان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="https://isac.msrt.ir/fa" target="_blank" >كميسيون انجمن هاي
                                علمي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="https://www.ipma.world/" target="_blank" >ipma جهانی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="https://www.become.pm/" target="_blank" >become.pm</a>
                        </li>
                        {{--    <li class="nav-item">
                                <a class="nav-link text-gray font-14" href="{{route('about-us')}}#board-of-directors">اعضای
                                    هیات مدیره</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-gray font-14" href="{{route('about-us')}}#creator">موسسین انجمن</a>
                            </li>--}}
                    </ul>

                </nav>
            </div>
            {{--            <div class="link-footer col-6 col-sm-6 col-md-3 col-lg-2">--}}
            {{--                <p class="text-regular text-white pt-2">خدمات انجمن</p>--}}
            {{--                <nav class="navbar p-0">--}}

            {{--                    <!-- Links -->--}}
            {{--                    <ul class="navbar-nav">--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link text-gray font-14" href="#">دوره های آموزشی</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link text-gray font-14" href="#">کارگاه ها</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link text-gray font-14" href="{{route('events')}}">همایش ها</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link text-gray font-14" href="#">جوایز</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link text-gray font-14" href="#">گواهی نامه ها</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link text-gray font-14" href="#">مسابقات</a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}

            {{--                </nav>--}}
            {{--            </div>--}}
            <div class="register-footer col-12 col-md-6 col-lg-5">
                <p class="text-regular text-white pt-2">ارسال آدرس به موبایل شما</p>
                <form action="{{route('location')}}" method="post" class="mb-3">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="شماره تماس" id="address" name="mobile"
                               autocomplete="off">
                    </div>
                    <button type="submit" class="btn">ارسال</button>
                </form>
                <div class="map-footer">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12954.853719944527!2d51.379332384785705!3d35.73326570113224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0728f1286b91%3A0xf8a61ce1468a9dcd!2sKuy-e-Daneshgah%2C%20District%206%2C%20Tehran%2C%20Tehran%20Province%2C%20Iran!5e0!3m2!1sen!2sus!4v1579277414645!5m2!1sen!2sus"
                            width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                </div>
            </div>
        </div>
        <div class="footer-copy row align-items-center pt-4 pb-3">

            <div class="col-12 col-lg-6 text-center text-lg-left">
                <p class="text-gray font-14 ">تمامی حقوق این سایت محفوظ و متعلق به انجمن مدیریت پروژه ایران می باشد</p>
            </div>
            <div class="col-12 col-lg-6 ">
                <ul class="social m-0 text-center text-lg-right">
                    <li><a href="https://telegram.me/PMAIran" target="_blank" ></a></li>
                    <li><a href="https://www.instagram.com/iranpma/" target="_blank" ></a></li>
                    {{--<li><a href="https://www.aparat.com/iranpma"></a></li>--}}


                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade " id="ModalLogin">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header pb-0 ">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center pt-0 pr-3 pl-3 pr-sm-5 pl-sm-5">
                <img src="{{asset('img/logo-login.png')}}" alt="" class="mb-4">
                <h4 class="modal-title text-black">ورود به صفحه کاربری</h4>
                <p class="text-black-light font-18 text-light2 mt-4 mb-4">جهت ورود به صفحه کاربری اطلاعات زیر را تکمیل
                    نمایید</p>
                <form class="sidebar-form-body">
                    <div class="input-form">
                        <input type="text" name="username" id="input_username" value="" size="40" aria-invalid="false"
                               placeholder="ایمیل یا شماره موبایل*">
                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                        <div id="username-error" class="error text-danger pl-3" for="username"
                             style="display: block;">
                            <strong id="username-error-text"></strong>
                        </div>
                    </div>
                    <div class="input-form">
                        <input class="mb-3" type="password" name="password" id="input_password" value="" size="40"
                               aria-invalid="false" placeholder="پسورد*">
                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                        <div id="password-error" class="error text-danger pl-3" for="password"
                             style="display: block;">
                            <strong id="password-error-text"></strong>
                        </div>
                    </div>
                    <a href="/" class="d-block text-left text-dark-violet font-14 text-light2">رمز عبور خود را فراموش
                        کرده ام؟</a>
                    <div id="text-error" class="error text-danger pl-3"
                         style="display: block;">
                        <strong id="text-error"></strong>
                    </div>


                    <div class="col-12 d-block mt-4 text-left">
                        <label >مرا به خاظر بسپار</label>
                        <input type="checkbox" name="rememberMe" id="rememberMe" value="remember" >
                    </div>


                    <input type="button" value="وارد شوید" class="form-submit mt-5 text-white font-16 text-medium"
                           onclick="login()">

                </form>
            </div>


        </div>
    </div>
</div>

<script>
    // start slider
    $(document).ready(function () {
        $('.logo-slid').slick({
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1200,
            slidesToShow: 5,
            slidesToScroll: 1,
            rtl: true,
            centerMode: true,


            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

    });


    // start timer
    $(function () {
        function isScrolledIntoView($elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
        }

        function count($this) {
            var current = parseInt($this.html(), 10);
            if (isScrolledIntoView($this) && !$this.data("isCounting") && current < $this.data('count')) {
                $this.html(++current);
                $this.data("isCounting", true);
                setTimeout(function () {
                    $this.data("isCounting", false);
                    count($this);
                }, 50);
            }
        }

        $(".c-section4").each(function () {
            $(this).data('count', parseInt($(this).html(), 10));
            $(this).html('0');
            $(this).data("isCounting", false);
        });

        function startCount() {
            $(".c-section4").each(function () {
                count($(this));
            });
        };

        $(window).scroll(function () {
            startCount();
        });

        startCount();
    });
</script>
<script>
    function clearLoginErrors() {
        $('#text-error').text('');
        $('#username-error-text').text('');
        $('#password-error-text').text('');
    }

    function login() {
        clearLoginErrors();
        var username = $('#input_username').val();
        var password = $('#input_password').val();
        var rememberMe =  $('#rememberMe').prop('checked');
        $.post("/login",
            {
                '_token': $('meta[name=csrf-token]').attr('content'),
                username: username,
                password: password,
                rememberMe:rememberMe
            },
            function (json) {
                console.log(json);
                if (!json.status) {
                    if (json.code == 100) {
                        $('#text-error').text(json.errors.username[0]);
                    } else {
                        if (typeof json.errors.username !== 'undefined') {
                            $('#username-error-text').text(json.errors.username[0]);
                        }
                        if (typeof json.errors.password !== 'undefined') {
                            $('#password-error-text').text(json.errors.password[0]);
                        }
                    }
                } else {
                    location.reload();
                }
            });
    }
</script>
</body>
</html>
