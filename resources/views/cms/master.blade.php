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
{{--    <link rel="stylesheet" href="{{asset('css/persianDatepicker-default.css')}}" type='text/css' media='all'>--}}
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}" type='text/css' media='all'>

    {{--    <script type="text/javascript" src="{{URL::to('js/p.js')}}"></script>--}}
    {{--    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>--}}
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
            <a href="/" class="simple-text logo-normal">
                پنل ادمین
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                {{--                <li class="nav-item ">--}}
                {{--                    <a class="nav-link" href="#">--}}
                {{--                        <i class="material-icons">person</i>--}}
                {{--                        <p>{{auth()->user()->name}}</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item {{checkMenu("panel",$title)}}">--}}
                {{--                    <a class="nav-link" href="{{route('indexPanel')}}">--}}
                {{--                        <i class="material-icons">dashboard</i>--}}
                {{--                        <p>داشبورد</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li class="nav-item {{checkMenu("cms/works",$title)}}">
                    <a class="nav-link" href="{{route('event.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>کارتابل</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item {{checkMenu("cms/events",$title)}}">
                    <a class="nav-link" href="{{route('event.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>سمینار ها</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/news",$title)}}">
                    <a class="nav-link" href="{{route('news.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>اخبار</p>
                    </a>
                </li>
                <li class="nav-item {{checkMenu("cms/messages",$title)}}">
                    <a class="nav-link" href="{{route('message.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>پیام ها</p>
                    </a>
                </li>
                {{--                <li class="nav-item {{checkMenu("panel/request",$title)}}">--}}
                {{--                    <a class="nav-link " href={{route('ownRequests')}}>--}}
                {{--                        <i class="material-icons">notifications</i>--}}
                {{--                        <p>تسویه حساب</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                @if(auth()->user()->type_id == 2)--}}
                {{--                    <li class="nav-item {{checkMenu("panel/requests",$title)}}">--}}
                {{--                        <a class="nav-link " href={{route('requests')}}>--}}
                {{--                            <i class="material-icons">restore</i>--}}
                {{--                            <p>لیست تسویه حساب ها</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-item {{checkMenu("panel/orders",$title)}}">--}}
                {{--                        <a class="nav-link " href={{route('orders')}}>--}}
                {{--                            <i class="material-icons">restore</i>--}}
                {{--                            <p>لیست خرید ها</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-item {{checkMenu("panel/plans",$title)}}">--}}
                {{--                        <a class="nav-link " href={{route('plans')}}>--}}
                {{--                            <i class="material-icons">dns</i>--}}
                {{--                            <p>لیست پلن ها</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-item {{checkMenu("panel/users",$title)}}">--}}
                {{--                        <a class="nav-link " href={{route('usersList')}}>--}}
                {{--                            <i class="material-icons">people</i>--}}
                {{--                            <p>لیست کاربران</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-item {{checkMenu("panel/prices",$title)}}">--}}
                {{--                        <a class="nav-link " href={{route('prices')}}>--}}
                {{--                            <i class="material-icons">sync_alt</i>--}}
                {{--                            <p>قیمت ارز ها</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endif--}}
                {{--                @if (Session::get('adminId'))--}}

                {{--                    <form method="post" action="{{route('userLogin')}}">--}}
                {{--                        @csrf--}}
                {{--                        <li class="nav-item active">--}}
                {{--                            <button class="nav-link text-right active_button">--}}
                {{--                                <i class="material-icons" style="color: #fff">power_settings_new</i>--}}
                {{--                                <p>بازگشت</p>--}}
                {{--                            </button>--}}
                {{--                        </li>--}}
                {{--                    </form>--}}

                {{--                @endif--}}
                <form method="post" action="/logout">
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
                    {{--<form class="navbar-form">--}}
                    {{--<div class="input-group no-border">--}}
                    {{--<input type="text" value="" class="form-control" placeholder="جستجو...">--}}
                    {{--<button type="submit" class="btn btn-white btn-round btn-just-icon">--}}
                    {{--<i class="material-icons">search</i>--}}
                    {{--<div class="ripple-container"></div>--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                    <ul class="navbar-nav">
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#pablo">--}}
                        {{--<i class="material-icons">dashboard</i>--}}
                        {{--<p class="d-lg-none d-md-block">--}}
                        {{--آمارها--}}
                        {{--</p>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">
                                <i class="material-icons">home</i>
                                {{--<span class="notification">۵</span>--}}
                                {{--<p class="d-lg-none d-md-block">--}}
                                {{--اعلان‌ها--}}
                                {{--</p>--}}
                            </a>
                            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                            {{--<a class="dropdown-item" href="#">محمدرضا به ایمیل شما پاسخ داد</a>--}}
                            {{--<a class="dropdown-item" href="#">شما ۵ وظیفه جدید دارید</a>--}}
                            {{--<a class="dropdown-item" href="#">از حالا شما با علیرضا دوست هستید</a>--}}
                            {{--<a class="dropdown-item" href="#">اعلان دیگر</a>--}}
                            {{--<a class="dropdown-item" href="#">اعلان دیگر</a>--}}
                            {{--</div>--}}
                        </li>
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#pablo">--}}
                        {{--<i class="material-icons">person</i>--}}
                        {{--<p class="d-lg-none d-md-block">--}}
                        {{--حساب کاربری--}}
                        {{--</p>--}}
                        {{--</a>--}}
                        {{--</li>--}}
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
    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('material/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material/js/core/bootstrap-material-design.min.js') }}"></script>
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
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.min.js')}}"></script>
    <script>
        // $(".datePickerInputs").persianDatepicker({formatDate: "YYYY/0M/0D"});
        // $(document).ready(function() {
        //     $(".datePickerInputs").pDatepicker(
        //         {
        //             altFormat:'YYYY/MM/DD H:i:s',
        //             timePicker: {
        //                 enabled:true
        //             }
        //         }
        //     );
        // });
    </script>
</div>
</body>
</html>
