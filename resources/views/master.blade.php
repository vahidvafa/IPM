<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href=""/>
    <title>
        انجمن مدیریت پروژه - {{$titleHeader ?? ''}}
    </title>
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel='stylesheet' href="{{asset('css/bootstrap.min.css')}}" type='text/css' media='all'/>
    <link rel="stylesheet" href="{{asset('css/stylefont.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/fontiran.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/style-main.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type='text/css' media='all'>
    {{--    <link rel="stylesheet" href="{{asset('css/persianDatepicker-default.css')}}" type='text/css' media='all'>--}}
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}" type='text/css' media='all'>
{{--    <link rel="stylesheet" href="{{asset('css/ltr.css')}}" type='text/css' media='all'>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script type='text/javascript' src='{{asset('js/bootstrap.min.js')}}'></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.min.js')}}"></script>



    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code
            /*$('.has-sub').click(function (e) {
                $('.submenu-left').css('display','block')
            });*/
            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function (e) {
                e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                $('.dropdown-menu a').click(function(e){
                    e.preventDefault();
                    if($(this).next('.submenu').length){
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function () {
                        $(this).find('.submenu').hide();
                    })
                });
            }

        }); // jquery end
    </script>

    @yield('header')

</head>
<body style="overflow-x: hidden;">
<header id="header">
    <div class="header-top-bar back-dark-violet pt-3 pb-3">
        <div class="container">
            <div class="row">

                <div class="col-8 col-md-8 d-lg-flex align-items-center pr-0"  >
                    <img class="img-fluid" src="{{asset('img/logo.png')}}" alt="انجمن مدیریت پروژه">
                    <h1 class="text-white d-inline-block font-18 text-regular text-logo ml-2">انجمن مدیریت پروژه ایران</h1>

                    @if(Route::currentRouteName() != 'search' && Route::currentRouteName() != 'search.post' )
                    <form method="post" action="{{route('search.post')}}" class="form-top">
                        @csrf
                        <input name="search" type="search" placeholder="جست و جو" autocomplete="off" />
                    </form>
                        @endif
                </div>

                <div class="col-4 col-md-4 text-right">
                    <img class="img-fluid logo-ipma" src="{{asset('img/ipma-logo.png')}}" alt="انجمن مدیریت پروژه">
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-pages ">
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
                                    <a class="dropdown-item nav-lang-eng" href="{{route('mainEn')}}"><span>انگلیسی</span></a>

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

        <div class="slider-text-page pt-2 pt-lg-2 mt-lg-2">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item font-20"><a href="/">خانه</a></li>
                            <li class="breadcrumb-item font-20 active">{{$breadcrumb??''}}</li>
                        </ul>
                        <h1 class="title-page font-40 text-white"
                            style="display: block;text-overflow: ellipsis;word-wrap: break-word;overflow: hidden;max-height: 1.3em;line-height: 1.3em;">{{$titleHeader ?? ''}}</h1>

                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<div class="alert p-4 @if(session('success') == null) hidden @elseif(session('success')[0]) alert-success @else alert-danger @endif">@if(session('success')!=null) {{session('success')[1]}} @endif</div>
@yield('content')
<footer id="footer">
    <div class="container">
        <div class="row mb-3">
            <div class="contact-footer col-12 col-lg-5">
                <div class="footer-logo mb-3">
                    <img src="{{asset('img/logo-foo.png')}}" alt=".." style="width: 60px;">
                    <span class="text-regular text-white">تماس با انجمن</span>
                </div>
                @php
                    $ipma = \App\IPMA::latest()->first()
                @endphp
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
                            <a class="nav-link text-gray font-14" href="http://yc.ipma.ir/">شبکه اعضای جوان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="https://isac.msrt.ir/fa">كميسيون انجمن هاي علمي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="https://www.ipma.world/">ipma جهانی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="https://www.become.pm/">become.pm</a>
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
                    <li><a href="https://telegram.me/PMAIran"></a></li>
                    <li><a href="https://www.instagram.com/iranpma/"></a></li>
                    {{--<li><a href="https://www.aparat.com/iranpma"></a></li>--}}


                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- The Modal -->
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
    // $(".datePickerInputs").persianDatepicker();
    $(document).ready(function () {
        $('.logo-slid').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 5,
            rtl: true,

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
</script>
<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof (settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof (settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
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
                        console.log(1);
                    } else {
                        if (typeof json.errors.username !== 'undefined') {
                            console.log(2);
                            $('#username-error-text').text(json.errors.username[0]);
                        }
                        if (typeof json.errors.password !== 'undefined') {
                            console.log(3);
                            $('#password-error-text').text(json.errors.password[0]);
                        }
                        console.log(4);
                    }
                } else {
                    console.log('hooooraaa')
                    location.reload();
                }
            });
    }
</script>

</body>
</html>
