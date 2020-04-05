<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material/img/apple-icon.png') }}">
    {{--<link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>{{ __('پنل کاربری - انجمن مدیریت پروژه ایران') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">
    <link href="{{ asset('material/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet"/>
    <link href="{{ asset('material/css/material-dashboard-rtl.css?v=1.1') }}" rel="stylesheet"/>
    <link href="{{ asset('material/css/main.css') }}" rel="stylesheet"/>
    {{--<link href="{{asset('/css/select2.min.css')}}" rel="stylesheet"/>--}}
    {{--<script src="{{asset('/js/select2.min.js')}}"></script>--}}

    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script type='text/javascript' src='{{asset('js/bootstrap.min.js')}}'></script>
    {{--    <link rel="stylesheet" href="{{asset('css/persianDatepicker-default.css')}}" type='text/css' media='all'>--}}
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}" type='text/css' media='all'>

    {{--    <script type="text/javascript" src="{{URL::to('js/p.js')}}"></script>--}}
    {{--    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>--}}
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('material/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material/js/core/bootstrap-material-design.min.js') }}"></script>
    {{--    <script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    <script src="{{ asset('material/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('material/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('material/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material/js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('material/js/settings.js') }}"></script>
    {{--    <script src="{{asset('js/persianDatepicker.min.js')}}"></script>--}}

    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    <style>
        @import url('{{ asset('css/fontiran.css') }}');

        body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4 {
            font-family: IRANSans !important;
        } </style>
    @php
        $title = request()->route()->uri;
    @endphp
</head>
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white"
         data-image="{{ asset('material/img/sidebar-1.jpg') }}">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="{{route('cms.index')}}" class="simple-text logo-normal">
                پنل ادمین
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('main')}}">
                        <i class="material-icons">library_books</i>
                        <p>صفحه ی اصلی سایت</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">--}}
{{--                        <i class="material-icons">library_books</i>--}}
{{--                        <p>کارتابل</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <hr>
                <li class="nav-item {{checkMenu("cms/goldenEvent",$title)}}">
                    <a class="nav-link" href="{{route('goldenEvent')}}">
                        <i class="material-icons">library_books</i>
                        <p>مهم ترین رویداد</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/events",$title)}}">
                    <a class="nav-link" href="{{route('event.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>رویداد ها</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/news",$title)}}">
                    <a class="nav-link" href="{{route('news.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>اخبار فارسی</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/en/news",$title)}}">
                    <a class="nav-link" href="{{route('news.en.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>اخبار انگلیسی</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/messages",$title)}}">
                    <a class="nav-link" href="{{route('message.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>تماس با ما</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/jobs",$title)}}">
                    <a class="nav-link" href="{{route('cms.job.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>فرصت های شغلی</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/users",$title)}}">
                    <a class="nav-link" href="{{route('cms.user.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>کاربران</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/passedCourses",$title)}}">
                    <a class="nav-link" href="{{route('PassedCourses')}}">
                        <i class="material-icons">library_books</i>
                        <p>دوره ها</p>
                    </a>
                </li>

                <li class="nav-item {{checkMenu("cms/gifts",$title)}}">
                    <a class="nav-link" href="{{route('gift.index')}}">
                        <i class="material-icons">card_giftcard</i>
                        <p>لیست کد تخفیف ها</p>
                    </a>
                </li>

                <li class="nav-item {{checkMenu("cms/ManageCourses",$title)}}">
                    <a class="nav-link" href="{{route('ManageCourses')}}">
                        <i class="material-icons">library_books</i>
                        <p>اضاقه دوره به کاربر</p>
                    </a>
                </li>

                <li class="nav-item {{checkMenu("cms/buyReport",$title)}}">
                    <a class="nav-link" href="{{route('buyReport')}}">
                        <i class="material-icons">library_books</i>
                        <p>گزارشات مالی</p>
                    </a>
                </li>

                <li class="nav-item {{checkMenu("cms/admins",$title)}}">
                    <a class="nav-link" href="{{route('admins')}}">
                        <i class="material-icons">library_books</i>
                        <p>لیست مدیران سطح ۲</p>
                    </a>
                </li>

                <li class="nav-item {{checkMenu("cms/membership",$title)}}">
                    <a class="nav-link" href="{{route('membership')}}">
                        <i class="material-icons">library_books</i>
                        <p>ویرایش عضویت ها</p>
                    </a>
                </li>

                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <li class="nav-item active">
                        <button class="nav-link text-right active_button mt-1">
                            <i class="material-icons" style="color: #fff">power_settings_new</i>
                            <p>خروج</p>
                        </button>
                    </li>
                </form>
            </ul>
        </div>

    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('main')}}">
                                <i class="material-icons">home</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                @include('cms.flash-message')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.min.js')}}"></script>

</div>
</body>

</html>
