@extends('master')
@section('header')
    <link href='{{asset('fullcalendar/core/main.css')}}' rel='stylesheet'/>
    <link href='{{asset('fullcalendar/daygrid/main.css')}}' rel='stylesheet'/>
    <link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
    <link href='{{asset('fullcalendar/bootstrap/main.css')}}' rel='stylesheet'/>
    <link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css'>
    <link rel="stylesheet" href="{{asset('css/style-calender.css')}}">
@stop
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container">
            <div class="register-main mt-5 mb-5">
                <h2 class=" font-24 text-medium text-black  mb-4">درخواست چه نوع عضویتی دارید؟
                </h2>
                <p class=" text-black-light font-16 mb-5">لطفا نوع عضویت خود را انتخاب نمایید و فرم عضویت مرتبط با آن را
                    پر نمایید</p>
                <!-- Nav pills -->
                <ul class="nav nav-pills row">
                    <li class="nav-item col-12 col-sm-6 col-lg-3">

                        <a class="nav-link {{(old('type') == 1) ? 'active':(!old('type')?'active':'')}} p-4" data-toggle="pill" href="#menu0">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[0]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[0]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[0]->price),'fa')}} ریال </p>
                        </a>

                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
                        <a class="nav-link {{(old('type') == 2) ? 'active':''}} p-4" data-toggle="pill" href="#menu1">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[1]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[1]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[1]->price),'fa')}} ریال </p>
                        </a>
                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0">
                        <a class="nav-link {{(old('type') == 3) ? 'active':''}} p-4" data-toggle="pill" href="#menu2">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[2]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[2]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[2]->price),'fa')}} ریال </p>
                        </a>
                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3  mt-4 mt-lg-0">
                        <a class="nav-link {{(old('type') == 4) ? 'active':''}} p-4" data-toggle="pill" href="#menu3">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[3]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[3]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[3]->price),'fa')}} ریال </p>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane  {{(old('type') == 1) ? 'active':(!old('type')?'active':'fade')}}" id="menu0">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[0]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{$memberships[0]->id}}">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name" value="{{(old('type') == 1) ? old('name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام و نام خانوادگی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name_en" value="{{(old('type') == 1) ?old('name_en'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام و نام خانوادگی انگلیسی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('name_en'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="father_name" value="{{(old('type') == 1) ?old('father_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام پدر*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('father_name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="national_code" value="{{(old('type') == 1) ?old('national_code'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد ملی*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('national_code'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="mobile" value="{{(old('type') == 1) ?old('mobile'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره تماس*" required>
                                <img src="img/002-telephone.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('mobile'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="email" value="{{(old('type') == 1) ?old('email'):''}}" size="40" aria-invalid="false"
                                       placeholder="ایمیل*" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('email'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="certificate_number" value="{{(old('type') == 1) ?old('certificate_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره شناسنامه*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('certificate_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('certificate_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="birth_date" value="{{(old('type') == 1) ?old('birth_date'):''}}" size="40" aria-invalid="false"
                                       placeholder="تاریخ تولد*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('birth_date'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="birth_place" value="{{(old('type') == 1) ?old('birth_place'):''}}" size="40" aria-invalid="false"
                                       placeholder="محل تولد*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('birth_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('birth_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">جنسیت : </label>
                                <input type="radio" class="option-input" name="sex" value="1" size="40"
                                       aria-invalid="false" placeholder="مرد" required>
                                مرد
                                <input type="radio" class="option-input" name="sex" value="0" size="40"
                                       aria-invalid="false" placeholder="زن" required>
                                زن
                                @if (old('type') == 1 && $errors->has('sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="work_address" value="{{(old('type') == 1) ?old('work_address'):''}}" size="40" aria-invalid="false"
                                       placeholder="نشانی محل کار *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('work_address'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('work_address') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="work_post" value="{{(old('type') == 1) ?old('work_post'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد پستی محل کار *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('work_post'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('work_post') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="home_address" value="{{(old('type') == 1) ?old('home_address'):''}}" size="40" aria-invalid="false"
                                       placeholder="نشانی منزل *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('home_address'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('home_address') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="home_post" value="{{(old('type') == 1) ?old('home_post'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد پستی منزل *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('home_post'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('home_post') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="work_name" value="{{(old('type') == 1) ?old('work_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="محل کار *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('work_name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('work_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                <input type="radio" class="option-input" name="receive_place" value="منزل" size="40"
                                       aria-invalid="false" placeholder="مرد" required>
                                منزل
                                <input type="radio" class="option-input" name="receive_place" value="محل کار" size="40"
                                       aria-invalid="false" placeholder="زن" required>
                                محل کار
                                @if (old('type') == 1 && $errors->has('receive_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('receive_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password" value="" size="40" aria-invalid="false"
                                       placeholder="رمز عبور*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 1 && $errors->has('password'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password_confirmation" value="" size="40"
                                       aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                <img src="img/004-key.png" class="form-icon">
                            </div>
{{--                            <div class="input-form col-md-12" id="files_div_menu0">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <span>--}}
{{--                                            مدارک مورد نیاز : ( {{$memberships[0]->required_documents}} )--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="input-form col-md-2">--}}
{{--                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"--}}
{{--                                               placeholder="آپلود مدارک" >--}}
{{--                                    </div>--}}
{{--                                    <div class="input-form col-md-8">--}}
{{--                                        <input type="text" name="files_explain[]" value="" size="40"--}}
{{--                                               aria-invalid="false" placeholder="توضیحات مدارک *" >--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 py-2">--}}
{{--                                        <button type="button" class="btn btn-success" onclick="addRow('files_div_menu0')">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-12">
                                <div class="row my-2">
                                    <div class="col-md-4 col-sm-2"></div>
                                    <div class="col-md-4 col-sm-8">
                                        <input type="submit" value="عضو شوید"
                                               class="form-submit-violet text-white font-16 text-medium">
                                    </div>
                                    <div class="col-md-4 col-sm-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane {{(old('type') == 2) ? 'active':'fade'}}" id="menu1">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم  {{$memberships[1]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{$memberships[1]->id}}">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name" value="{{(old('type') == 2) ?old('name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام سازمان*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif

                            </div>
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name_en" value="{{(old('type') == 2) ?old('name_en'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام سازمان انگلیسی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('name_en'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </div>
                                @endif

                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="established_date" value="{{(old('type') == 2) ?old('established_date'):''}}" size="40" aria-invalid="false"
                                       placeholder="سال تاسیس*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('established_date'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('established_date') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="established_number" value="{{(old('type') == 2) ?old('established_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره ثبت*" required>
                                <img src="img/002-telephone.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('established_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('established_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="email" value="{{(old('type') == 2) ?old('email'):''}}" size="40" aria-invalid="false"
                                       placeholder="ایمیل*" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('email'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="economy_number" value="{{(old('type') == 2) ?old('economy_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره اقتصادی*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('economy_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('economy_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="national_number" value="{{(old('type') == 2) ?old('national_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="شناسه ملی *" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('national_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('national_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="post_number" value="{{(old('type') == 2) ?old('post_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد پستی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('post_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('post_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">نوع کالکیت شرکت : </label>
                                <input type="radio" class="option-input" name="ownership_type" value="دولتی" size="40"
                                       aria-invalid="false" placeholder="دولتی" required>
                                دولتی
                                <input type="radio" class="option-input" name="ownership_type" value="خصوصی" size="40"
                                       aria-invalid="false" placeholder="خصوصی" required>
                                خصوصی
                                <input type="radio" class="option-input" name="ownership_type" value="عمومی" size="40"
                                       aria-invalid="false" placeholder="عمومی" required>
                                عمومی
                                <input type="radio" class="option-input" name="ownership_type" value="دولتی / خصوصی" size="40"
                                       aria-invalid="false" placeholder="دولتی / خصوصی" required>
                                دولتی / خصوصی
                                <input type="radio" class="option-input" name="ownership_type" value="خصوصی / دولتی" size="40"
                                       aria-invalid="false" placeholder="خصوصی / دولتی" required>
                                خصوصی / دولتی
                                <input type="radio" class="option-input" name="ownership_type" value="سایر" size="40"
                                       aria-invalid="false" placeholder="سایر" required>
                                سایر
                                @if (old('type') == 2 && $errors->has('ownership_type'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('ownership_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">نوع حقوقی شرکت : </label>
                                <input type="radio" class="option-input" name="legal_type" value="سهامی خاص" size="40"
                                       aria-invalid="false" placeholder="سهامی خاص" required>
                                سهامی خاص
                                <input type="radio" class="option-input" name="legal_type" value="سهامی عام" size="40"
                                       aria-invalid="false" placeholder="سهامی عام" required>
                                سهامی عام
                                <input type="radio" class="option-input" name="legal_type" value="با مسئولیت محدود" size="40"
                                       aria-invalid="false" placeholder="با مسئولیت محدود" required>
                                با مسئولیت محدود
                                <input type="radio" class="option-input" name="legal_type" value="تضامنی" size="40"
                                       aria-invalid="false" placeholder="تضامنی" required>
                                تضامنی
                                <input type="radio" class="option-input" name="legal_type" value="سایر" size="40"
                                       aria-invalid="false" placeholder="سایر" required>
                                سایر
                                @if (old('type') == 2 && $errors->has('legal_type'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('legal_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-12">
                                <input type="text" name="address" value="{{(old('type') == 2) ?old('address'):''}}" size="40" aria-invalid="false"
                                       placeholder="نشانی دفتر مرکزی *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('address'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="ceo_name" value="{{(old('type') == 2) ?old('ceo_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام مدیر عامل شرکت *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="ceo_name_en" value="{{(old('type') == 2) ?old('ceo_name_en'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام مدیر عامل شرکت به انگلیسی *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('ceo_name_en'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('ceo_name_en') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="agent_name" value="{{(old('type') == 2) ?old('agent_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام نماینده شرکت *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('agent_name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('agent_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="agent_name_en" value="{{(old('type') == 2) ?old('agent_name_en'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام نماینده شرکت به انگلیسی *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('agent_name_en'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('agent_name_en') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password" value="" size="40" aria-invalid="false"
                                       placeholder="رمز عبور*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 2 && $errors->has('password'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password_confirmation" value="" size="40"
                                       aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                <img src="img/004-key.png" class="form-icon">
                            </div>
{{--                            <div class="input-form col-md-12" id="files_div_menu1">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <span>--}}
{{--                                            مدارک مورد نیاز : ( {{$memberships[1]->required_documents}} )--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="input-form col-md-2">--}}
{{--                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"--}}
{{--                                               placeholder="آپلود مدارک" >--}}
{{--                                    </div>--}}
{{--                                    <div class="input-form col-md-8">--}}
{{--                                        <input type="text" name="files_explain[]" value="" size="40"--}}
{{--                                               aria-invalid="false" placeholder="توضیحات مدارک *" >--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 py-2">--}}
{{--                                        <button type="button" class="btn btn-success" onclick="addRow('files_div_menu1')">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-12">
                                <div class="row my-2">
                                    <div class="col-md-4 col-sm-2"></div>
                                    <div class="col-md-4 col-sm-8">
                                        <input type="submit" value="عضو شوید"
                                               class="form-submit-violet text-white font-16 text-medium">
                                    </div>
                                    <div class="col-md-4 col-sm-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane  {{(old('type') == 3) ? 'active':'fade'}}" id="menu2">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[2]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{$memberships[2]->id}}">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name" value="{{(old('type') == 3) ? old('name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام و نام خانوادگی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name_en" value="{{(old('type') == 3) ?old('name_en'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام و نام خانوادگی انگلیسی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('name_en'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="father_name" value="{{(old('type') == 3) ?old('father_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام پدر*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('father_name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="national_code" value="{{(old('type') == 3) ?old('national_code'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد ملی*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('national_code'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="mobile" value="{{(old('type') == 3) ?old('mobile'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره تماس*" required>
                                <img src="img/002-telephone.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('mobile'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="email" value="{{(old('type') == 3) ?old('email'):''}}" size="40" aria-invalid="false"
                                       placeholder="ایمیل*" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('email'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="certificate_number" value="{{(old('type') == 3) ?old('certificate_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره شناسنامه*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('certificate_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('certificate_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="birth_date" value="{{(old('type') == 3) ?old('birth_date'):''}}" size="40" aria-invalid="false"
                                       placeholder="تاریخ تولد*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('birth_date'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="birth_place" value="{{(old('type') == 3) ?old('birth_place'):''}}" size="40" aria-invalid="false"
                                       placeholder="محل تولد*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('birth_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('birth_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">جنسیت : </label>
                                <input type="radio" class="option-input" name="sex" value="1" size="40"
                                       aria-invalid="false" placeholder="مرد" required>
                                مرد
                                <input type="radio" class="option-input" name="sex" value="0" size="40"
                                       aria-invalid="false" placeholder="زن" required>
                                زن
                                @if (old('type') == 3 && $errors->has('sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="work_address" value="{{(old('type') == 3) ?old('work_address'):''}}" size="40" aria-invalid="false"
                                       placeholder="نشانی محل کار *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('work_address'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('work_address') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="work_post" value="{{(old('type') == 3) ?old('work_post'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد پستی محل کار *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('work_post'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('work_post') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="home_address" value="{{(old('type') == 3) ?old('home_address'):''}}" size="40" aria-invalid="false"
                                       placeholder="نشانی منزل *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('home_address'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('home_address') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="home_post" value="{{(old('type') == 3) ?old('home_post'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد پستی منزل *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('home_post'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('home_post') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="work_name" value="{{(old('type') == 3) ?old('work_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="محل کار *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('work_name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('work_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                <input type="radio" class="option-input" name="receive_place" value="منزل" size="40"
                                       aria-invalid="false" placeholder="مرد" required>
                                منزل
                                <input type="radio" class="option-input" name="receive_place" value="محل کار" size="40"
                                       aria-invalid="false" placeholder="زن" required>
                                محل کار
                                @if (old('type') == 3 && $errors->has('receive_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('receive_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password" value="" size="40" aria-invalid="false"
                                       placeholder="رمز عبور*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 3 && $errors->has('password'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password_confirmation" value="" size="40"
                                       aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                <img src="img/004-key.png" class="form-icon">
                            </div>
{{--                            <div class="input-form col-md-12" id="files_div_menu2">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <span>--}}
{{--                                            مدارک مورد نیاز : ( {{$memberships[2]->required_documents}} )--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="input-form col-md-2">--}}
{{--                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"--}}
{{--                                               placeholder="آپلود مدارک" >--}}
{{--                                    </div>--}}
{{--                                    <div class="input-form col-md-8">--}}
{{--                                        <input type="text" name="files_explain[]" value="" size="40"--}}
{{--                                               aria-invalid="false" placeholder="توضیحات مدارک *" >--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 py-2">--}}
{{--                                        <button type="button" class="btn btn-success" onclick="addRow('files_div_menu2')">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-12">
                                <div class="row my-2">
                                    <div class="col-md-4 col-sm-2"></div>
                                    <div class="col-md-4 col-sm-8">
                                        <input type="submit" value="عضو شوید"
                                               class="form-submit-violet text-white font-16 text-medium">
                                    </div>
                                    <div class="col-md-4 col-sm-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane {{(old('type') == 4) ? 'active':'fade'}}" id="menu3">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[3]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{$memberships[3]->id}}">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name" value="{{(old('type') == 4) ?old('name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام و نام خانوادگی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif

                            </div>
                            <div class="input-form col-md-6 ">
                                <input type="text" name="name_en" value="{{(old('type') == 4) ?old('name_en'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام و نام خانوادگی انگلیسی*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('name_en'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </div>
                                @endif

                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="father_name" value="{{(old('type') == 4) ?old('father_name'):''}}" size="40" aria-invalid="false"
                                       placeholder="نام پدر*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('father_name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="national_code" value="{{(old('type') == 4) ?old('national_code'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد ملی*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('national_code'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="mobile" value="{{(old('type') == 4) ?old('mobile'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره تماس*" required>
                                <img src="img/002-telephone.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('mobile'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="email" value="{{(old('type') == 4) ?old('email'):''}}" size="40" aria-invalid="false"
                                       placeholder="ایمیل*" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('email'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="certificate_number" value="{{(old('type') == 4) ?old('certificate_number'):''}}" size="40" aria-invalid="false"
                                       placeholder="شماره شناسنامه*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('certificate_number'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('certificate_number') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="birth_date" value="{{(old('type') == 4) ?old('birth_date'):''}}" size="40" aria-invalid="false"
                                       placeholder="تاریخ تولد*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('birth_date'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="birth_place" value="{{(old('type') == 4) ?old('birth_place'):''}}" size="40" aria-invalid="false"
                                       placeholder="محل تولد*" required>
                                <img src="img/001-user.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('birth_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('birth_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 py-2 px-4">
                                <label for="">جنسیت : </label>
                                <input type="radio" class="option-input" name="sex" value="1" size="40"
                                       aria-invalid="false" placeholder="مرد" required>
                                مرد
                                <input type="radio" class="option-input" name="sex" value="0" size="40"
                                       aria-invalid="false" placeholder="زن" required>
                                زن
                                @if (old('type') == 4 && $errors->has('sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="home_address" value="{{(old('type') == 4) ?old('home_address'):''}}" size="40" aria-invalid="false"
                                       placeholder="نشانی منزل *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('home_address'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('home_address') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="home_post" value="{{(old('type') == 4) ?old('home_post'):''}}" size="40" aria-invalid="false"
                                       placeholder="کد پستی منزل *" required>
                                <img src="img/003-envelope.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('home_post'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('home_post') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password" value="" size="40" aria-invalid="false"
                                       placeholder="رمز عبور*" required>
                                <img src="img/004-key.png" class="form-icon">
                                @if (old('type') == 4 && $errors->has('password'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <input type="password" name="password_confirmation" value="" size="40"
                                       aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                <img src="img/004-key.png" class="form-icon">
                            </div>
                            <div class="col-md-12">
                                <div class="row my-2">
                                    <div class="col-md-4 col-sm-2"></div>
                                    <div class="col-md-4 col-sm-8">
                                        <input type="submit" value="عضو شوید"
                                               class="form-submit-violet text-white font-16 text-medium">
                                    </div>
                                    <div class="col-md-4 col-sm-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<script src='{{asset('fullcalendar/core/main.js')}}'></script>
<script src='{{asset('fullcalendar/daygrid/main.js')}}'></script>
<script src='{{asset('fullcalendar/bootstrap/main.js')}}'></script>
<script src="{{asset('fullcalendar/interaction/main.js')}}"></script>
<script src="{{asset('fullcalendar/list/main.js')}}"></script>
<script src="{{asset('fullcalendar/moment/main.js')}}"></script>
<script src="{{asset('fullcalendar/timegrid/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales/fa.js"
        integrity="sha256-xMKbF/7LQq6ROtSHcNKZtylu1zhGqEFvefXb7ENciKc=" crossorigin="anonymous"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {

        var initialLocaleCode = 'fa';
        var localeSelectorEl = document.getElementById('locale-selector');
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {


            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'bootstrap'],
            themeSystem: 'bootstrap',
            header: {

                left: 'prevYear,nextYear ,title',
                center: 'dayGridMonth,dayGridWeek,dayGridDay',
                right: 'today prev,next'
            },
            views: {
                dayGridMonth: { // name of view
                    titleFormat: {year: 'numeric', month: '2-digit', day: '2-digit'}
                    // other view-specific options here
                }
            },
            locale: initialLocaleCode,
            businessHours: false,
            defaultView: 'dayGridMonth',
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            DayNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-07-07',
                    end: '2019-07-07',
                    className: 'fc-bg-red',
                    icon: "calendar"

                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-08-08T14:00:00',
                    end: '2019-08-08T20:00:00',
                    className: 'fc-bg-red',
                    icon: "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-07-10T13:00:00',
                    end: '2019-07-10T16:00:00',
                    className: 'fc-bg-yellow',
                    icon: "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-08-12',
                    className: 'fc-bg-green',
                    icon: "calendar"
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-08-13',
                    end: '2019-08-15',
                    className: 'fc-bg-blue',
                    icon: "calendar"
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-08-13',
                    end: '2019-08-14',
                    icon: "calendar",
                    className: 'fc-bg-default'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-09-13',
                    end: '2019-09-14',
                    icon: "calendar",
                    className: 'fc-bg-yellow'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-10-15T09:30:00',
                    end: '2019-10-15T11:45:00',
                    className: 'fc-bg-green',
                    icon: "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-11-15T20:00:00',
                    end: '2019-11-15T22:30:00',
                    className: 'fc-bg-green',
                    icon: "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        icon: "calendar",
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-08-25',
                    end: '2019-08-25',

                    className: 'fc-bg-blue'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        icon: "calendar",
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    }, start: '2019-12-27',
                    end: '2019-12-27',

                    className: 'fc-bg-default'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        icon: "calendar",
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },
                    start: '2019-12-29T11:30:00',
                    end: '2019-12-29T012:30:00',
                    className: 'fc-bg-blue',

                    allDay: false
                }
            ],

            eventRender: function (event, element) {
                if (event.event.icon) {
                    element.find(".fc-content").prepend("<i class='fa fa-" + event.icon + "'></i>");

                }
                console.log('hhhh')
            },

            eventClick: function (event, jsEvent, view) {


                jQuery('.event-icon').html("<i class='fa fa-" + event.event.icon + "'></i>");
                jQuery('.event-title').html(event.event.title);
                jQuery('.event-body').html(event.event.extendedProps.description);
                jQuery('.eventUrl').attr('href', event.event.url);
                jQuery('#modal-view-event').modal();
            }
        });

        calendar.render();

        // build the locale selector's options
        calendar.getAvailableLocaleCodes().forEach(function (localeCode) {
            var optionEl = document.createElement('option');
            optionEl.value = localeCode;
            optionEl.selected = localeCode == initialLocaleCode;
            optionEl.innerText = localeCode;
            localeSelectorEl.appendChild(optionEl);
        });

        // when the selected option changes, dynamically change the calendar option
        localeSelectorEl.addEventListener('change', function () {
            if (this.value) {
                calendar.setOption('locale', this.value);
            }
        });

    });


    document.addEventListener("DOMContentLoaded", function () {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("پر کردن این فیلد الزامی است");
                }
            };
            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }
    })

    function addRow(id) {
        var row_id = Date.now();
        var new_row = "                                <div class=\"row\" id=" + row_id + ">\n" +
            "                                    <div class=\"input-form col-md-2\">\n" +
            "                                        <input type=\"file\" name=\"files[]\" value=\"\" size=\"40\" aria-invalid=\"false\" placeholder=\"آپلود مدارک\">\n" +
            "                                    </div>\n" +
            "                                    <div class=\"input-form col-md-8\">\n" +
            "                                        <input type=\"text\" name=\"files_explain[]\" value=\"\" size=\"40\" aria-invalid=\"false\" placeholder=\"توضیحات مدارک *\">\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-2 py-2\">\n" +
            "                                        <button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(" + row_id + ")\">-</button>\n" +
            "                                    </div>\n" +
            "                                </div>";
        $("#"+id).append(new_row);
    }

    function deleteRow(id) {
        $("#" + id).remove();
    }
</script>
