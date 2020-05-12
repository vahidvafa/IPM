@extends('master')
@section('header')

@stop

@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container">
            <div class="register-main mt-5 mb-5">
                <h2 class=" font-24 text-medium text-black  mb-4">درخواست ارتقا برای چه نوع عضویتی دارید؟
                </h2>
                <p class=" text-black-light font-16 mb-5">لطفا نوع عضویت خود را انتخاب نمایید و فرم عضویت مرتبط با آن را
                    پر نمایید</p>
                <!-- Nav pills -->
                <ul class="nav nav-pills row">
                    <li class="nav-item col-12 col-sm-6 col-lg-3">

                        <a class="nav-link {{(Session::get('membership_type_id') == 1) ? 'active':(!Session::get('membership_type_id')?'active':'')}} p-4"
                           data-toggle="pill" href="#menu0">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[0]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[0]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[0]->price),'fa')}} ریال </p>
                        </a>

                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
                        <a class="nav-link {{(Session::get('membership_type_id') == 2) ? 'active':''}} p-4" data-toggle="pill"
                           href="#menu1">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[1]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[1]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[1]->price),'fa')}} ریال </p>
                        </a>
                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0">
                        <a class="nav-link {{(Session::get('membership_type_id') == 3) ? 'active':''}} p-4" data-toggle="pill"
                           href="#menu2">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">{{$memberships[2]->title}}</span>
                            <p class="font-12 text-black-light m-0 mt-4">
                                {{tr_num(unixToDay($memberships[2]->period),'fa')}} روز
                                <br>
                                {{tr_num(number_format($memberships[2]->price),'fa')}} ریال </p>
                        </a>
                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3  mt-4 mt-lg-0">
                        <a class="nav-link {{(Session::get('membership_type_id') == 4) ? 'active':''}} p-4" data-toggle="pill"
                           href="#menu3">
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
                    <div class="tab-pane  {{(Session::get('membership_type_id') == 1) ? 'active':(!Session::get('membership_type_id')?'active':'fade')}}" id="menu0">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[0]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('profile.upgrade.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="membership_type_id" value="{{$memberships[0]->id}}">
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>مدت زمان : </label>
                                <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="1" checked>عضویت یکساله</label>
                                <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="3">عضویت سه ساله</label>
                                {{--../icon/chevron-down--}}
                                {{--            <i class="fa fa-chevron-down"></i>--}}
                                {{--            <select name="year" required >--}}
                                {{--                <option value="1" selected>عضویت یکساله</option>--}}
                                {{--                <option value="3">عضویت سه ساله</option>--}}
                                {{--            </select>--}}
                                @if (Session::get('membership_type_id') == 1 && $errors->has('year'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="first_name"
                                               value="{{(Session::get('membership_type_id') == 1) ? request()->old('first_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('first_name'))
                                            <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام خانوادگی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="last_name"
                                               value="{{(Session::get('membership_type_id') == 1) ? request()->old('last_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام خانوادگی *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('last_name'))
                                            <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام و نام خانوادگی انگلیسی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="name_en"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('name_en'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام و نام خانوادگی انگلیسی*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('name_en'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('name_en') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام پدر :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[father_name]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.father_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام پدر*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.father_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.father_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد ملی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[national_code]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.national_code'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد ملی*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.national_code'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.national_code') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره تماس :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="mobile"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('mobile'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره تماس*" required>
                                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('mobile'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>ایمیل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('email'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="ایمیل*" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('email'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره شناسنامه :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[certificate_number]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.certificate_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره شناسنامه*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.certificate_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_date]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.birth_date'):''}}"
                                               class="datePickerInput"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ تولد*" required autocomplete="off">
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.birth_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>محل تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_place]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.birth_place'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="محل تولد*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.birth_place'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>جنسیت : </label>
                                <select name="profile[sex]" required>
                                    <option disabled selected value>جنسیت مورد نظر را انتخاب کنید *</option>
                                    <option value="1">مرد</option>
                                    <option value="0">زن</option>
                                </select>
                                @if (Session::get('membership_type_id') == 1 && $errors->has('profile.sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('profile.sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[work_address]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.work_address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی محل کار *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.work_address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.work_address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[work_post]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('work_post'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی محل کار *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('work_post'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('work_post') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_address]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('home_address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('home_address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_post]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('home_post'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('home_post'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_post') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[work_name]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('profile.work_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام محل کار *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('profile.work_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.work_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                <select name="profile[receive_place]" required>
                                    <option disabled selected value>نشانی مورد نظر را انتخاب کنید *</option>
                                    <option value="0">منزل</option>
                                    <option value="1">محل کار</option>
                                </select>
                                @if (Session::get('membership_type_id') == 1 && $errors->has('receive_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('receive_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-12" id="files_div_menu0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>
                                            مدارک مورد نیاز : ( {{$memberships[0]->required_documents}} )
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        @if(Session::get('membership_type_id') == 1)
                                            @error('files.*')
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-form col-md-2">
                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"
                                               placeholder="آپلود مدارک" required>
                                    </div>
                                    <div class="input-form col-md-8">
                                        <input type="text" name="files_explain[]" value="" size="40"
                                               aria-invalid="false" placeholder="توضیحات مدارک *" required>
                                    </div>
                                    <div class="col-md-2 py-2">
                                        <button type="button" class="btn btn-success"
                                                onclick="addRow('files_div_menu0')">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">سابقه کاری :</h2>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="workExperience[company_name]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('workExperience.company_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام محل کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('workExperience.company_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.company_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>عنوان شغلی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="workExperience[job_title]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('workExperience.job_title'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="عنوان شغلی">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('workExperience.job_title'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.job_title') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ شروع به کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="datePickerInput" type="text" name="workExperience[from_date]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('workExperience.from_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ شروع به کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('workExperience.from_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.from_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ اتمام کار : (در صورت ادامه همکاری فیلد را خالی بگذارید)</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="datePickerInput" type="text" name="workExperience[to_date]"
                                               value="{{(Session::get('membership_type_id') == 1) ?request()->old('workExperience.to_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ اتمام کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('workExperience.to_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.to_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label for="branch">شاخه : </label>
                                <select name="branch_id" required>
                                    <option disabled selected value>شاخه مورد نظر را انتخاب کنید *</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                @if (Session::get('membership_type_id') == 1 && $errors->has('branch_id'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('branch_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password" value="" size="40" aria-invalid="false"
                                               placeholder="رمز عبور*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 1 && $errors->has('password'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تایید رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password_confirmation" value="" size="40"
                                               aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                    </div>
                                </div>
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
                    <div class="tab-pane {{(Session::get('membership_type_id') == 2) ? 'active':'fade'}}" id="menu1">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4">
                            فرم {{$memberships[1]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('profile.upgrade.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="membership_type_id" value="{{$memberships[1]->id}}">
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>مدت زمان : </label>
                                <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="1" checked>عضویت یکساله</label>
                                <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="3">عضویت سه ساله</label>
                                {{--            <select name="year" required>--}}
                                {{--                <option value="1" selected>عضویت یکساله</option>--}}
                                {{--                <option value="3">عضویت سه ساله</option>--}}
                                {{--            </select>--}}
                                @if (Session::get('membership_type_id') == 2 && $errors->has('year'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">مشخصات فردی نماینده :</h2>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="first_name"
                                               value="{{(Session::get('membership_type_id') == 2) ? request()->old('first_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('first_name'))
                                            <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام خانوادگی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="last_name"
                                               value="{{(Session::get('membership_type_id') == 2) ? request()->old('last_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام خانوادگی *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('last_name'))
                                            <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام و نام خانوادگی انگلیسی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="name_en"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('name_en'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام و نام خانوادگی انگلیسی*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('name_en'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('name_en') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام پدر :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[father_name]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('profile.father_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام پدر*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('profile.father_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.father_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد ملی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[national_code]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('profile.national_code'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد ملی*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('profile.national_code'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.national_code') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره تماس :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="mobile"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('mobile'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره تماس*" required>
                                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('mobile'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>ایمیل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('email'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="ایمیل*" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('email'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره شناسنامه :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[certificate_number]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('profile.certificate_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره شناسنامه*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('profile.certificate_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_date]"
                                               class="datePickerInput"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('profile.birth_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ تولد*" required autocomplete="off">
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('profile.birth_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>محل تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_place]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('profile.birth_place'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="محل تولد*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('profile.birth_place'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>جنسیت : </label>
                                <select name="profile[sex]" required>
                                    <option disabled selected value>جنسیت مورد نظر را انتخاب کنید *</option>
                                    <option value="1">مرد</option>
                                    <option value="0">زن</option>
                                </select>
                                @if (Session::get('membership_type_id') == 2 && $errors->has('profile.sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('profile.sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_address]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('home_address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('home_address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_post]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('home_post'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('home_post'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_post') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">سابقه کاری :</h2>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="workExperience[company_name]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('workExperience.company_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام محل کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('workExperience.company_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.company_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>عنوان شغلی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="workExperience[job_title]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('workExperience.job_title'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="عنوان شغلی">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('workExperience.job_title'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.job_title') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ شروع به کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="datePickerInput" type="text" name="workExperience[from_date]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('workExperience.from_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ شروع به کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('workExperience.from_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.from_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ اتمام کار : (در صورت ادامه همکاری فیلد را خالی بگذارید)</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="datePickerInput" type="text" name="workExperience[to_date]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('workExperience.to_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ اتمام کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('workExperience.to_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.to_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">مشخصات شرکت :</h2>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام سازمان :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[name]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام سازمان *">
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ تاسیس :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[established_date]"
                                               class="datePickerInput"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.established_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ تاسیس*" required autocomplete="off">
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.established_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.established_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره ثبت :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[established_number]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.established_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره ثبت*" required>
                                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.established_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong> {{ $errors->first('companies.established_number') }} </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره اقتصادی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[economy_number]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.economy_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره اقتصادی*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.economy_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.economy_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شناسه ملی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[national_number]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.national_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شناسه ملی *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.national_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.national_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[post_number]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.post_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.post_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.post_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label for="">نوع مالکیت شرکت : </label>
                                <select name="companies[ownership_type]" required>
                                    <option disabled selected value>نوع مالکیت را انتخاب کنید *</option>
                                    <option value="دولتی">دولتی</option>
                                    <option value="خصوصی">خصوصی</option>
                                    <option value="عمومی">عمومی</option>
                                    <option value="دولتی / خصوصی">دولتی / خصوصی</option>
                                    <option value="خصوصی / دولتی">خصوصی / دولتی</option>
                                    <option value="سایر">سایر</option>
                                </select>
                                @if (Session::get('membership_type_id') == 2 && $errors->has('companies.ownership_type'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('companies.ownership_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label for="">نوع حقوقی شرکت : </label>
                                <select name="companies[legal_type]" required>
                                    <option disabled selected value>نوع حقوقی را انتخاب کنید *</option>
                                    <option value="سهامی خاص">سهامی خاص</option>
                                    <option value="سهامی عام">سهامی عام</option>
                                    <option value="با مسئولیت محدود">با مسئولیت محدود</option>
                                    <option value="تضامنیی">تضامنی</option>
                                    <option value="سایر">سایر</option>
                                </select>
                                @if (Session::get('membership_type_id') == 2 && $errors->has('companies.legal_type'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('companies.legal_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی دفتر مرکزی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[address]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی دفتر مرکزی *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام مدیر عامل شرکت :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[ceo_name]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('companies.ceo_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام مدیر عامل شرکت *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.ceo_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.ceo_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام مدیر عامل شرکت به انگلیسی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="companies[ceo_name_en]"
                                               value="{{(Session::get('membership_type_id') == 2) ?request()->old('company.ceo_name_en'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام مدیر عامل شرکت به انگلیسی *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('companies.ceo_name_en'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('companies.ceo_name_en') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12" id="files_div_menu1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>
                                            مدارک مورد نیاز : ( {{$memberships[1]->required_documents}} )
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        @if(Session::get('membership_type_id') == 2)
                                            @error('files.*')
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-form col-md-2">
                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"
                                               placeholder="آپلود مدارک" required>
                                    </div>
                                    <div class="input-form col-md-8">
                                        <input type="text" name="files_explain[]" value="" size="40"
                                               aria-invalid="false" placeholder="توضیحات مدارک *" required>
                                    </div>
                                    <div class="col-md-2 py-2">
                                        <button type="button" class="btn btn-success"
                                                onclick="addRow('files_div_menu1')">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label for="branch">شاخه : </label>
                                <select name="branch_id" required>
                                    <option disabled selected value>شاخه مورد نظر را انتخاب کنید *</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                @if (Session::get('membership_type_id') == 2 && $errors->has('branch_id'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('branch_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password" value="" size="40" aria-invalid="false"
                                               placeholder="رمز عبور*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 2 && $errors->has('password'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تایید رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password_confirmation" value="" size="40"
                                               aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                    </div>
                                </div>
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
                    <div class="tab-pane  {{(Session::get('membership_type_id') == 3) ? 'active':'fade'}}" id="menu2">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[2]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('profile.upgrade.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="membership_type_id" value="{{$memberships[2]->id}}">
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>مدت زمان : </label>
                                <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="1" checked>عضویت یکساله</label>
                                <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="3">عضویت سه ساله</label>
                                {{--            <input type="radio" id="year_3" name="year" value="3" style="all: unset;">--}}
                                {{--            <label for="year_3">عضویت سه ساله</label>--}}
                                @if (Session::get('membership_type_id') == 3 && $errors->has('year'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="first_name"
                                               value="{{(Session::get('membership_type_id') == 3) ? request()->old('first_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('first_name'))
                                            <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام خانوادگی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="last_name"
                                               value="{{(Session::get('membership_type_id') == 3) ? request()->old('last_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام خانوادگی *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('last_name'))
                                            <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام و نام خانوادگی انگلیسی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="name_en"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('name_en'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام و نام خانوادگی انگلیسی*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('name_en'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('name_en') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام پدر :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[father_name]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.father_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام پدر*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.father_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.father_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد ملی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[national_code]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.national_code'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد ملی*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.national_code'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.national_code') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره تماس :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="mobile"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('mobile'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره تماس*" required>
                                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('mobile'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>ایمیل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('email'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="ایمیل*" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('email'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره شناسنامه :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[certificate_number]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.certificate_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره شناسنامه*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.certificate_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_date]"
                                               class="datePickerInput"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.birth_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ تولد*" required autocomplete="off">
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.birth_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>محل تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_place]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.birth_place'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="محل تولد*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.birth_place'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>جنسیت : </label>
                                <select name="profile[sex]" required>
                                    <option disabled selected value>جنسیت مورد نظر را انتخاب کنید *</option>
                                    <option value="1">مرد</option>
                                    <option value="0">زن</option>
                                </select>
                                @if (Session::get('membership_type_id') == 3 && $errors->has('profile.sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('profile.sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[work_address]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.work_address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی محل کار *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.work_address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.work_address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[work_post]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('work_post'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی محل کار *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('work_post'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('work_post') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_address]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('home_address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('home_address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_post]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('home_post'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('home_post'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_post') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[work_name]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('profile.work_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام محل کار *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('profile.work_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.work_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                <select name="profile[receive_place]" required>
                                    <option disabled selected value>نشانی مورد نظر را انتخاب کنید *</option>
                                    <option value="0">منزل</option>
                                    <option value="1">محل کار</option>
                                </select>
                                @if (Session::get('membership_type_id') == 3 && $errors->has('receive_place'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('receive_place') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-12" id="files_div_menu2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>
                                            مدارک مورد نیاز : ( {{$memberships[2]->required_documents}} )
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        @if(Session::get('membership_type_id') == 2)
                                            @error('files.*')
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-form col-md-2">
                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"
                                               placeholder="آپلود مدارک" required>
                                    </div>
                                    <div class="input-form col-md-8">
                                        <input type="text" name="files_explain[]" value="" size="40"
                                               aria-invalid="false" placeholder="توضیحات مدارک *" required>
                                    </div>
                                    <div class="col-md-2 py-2">
                                        <button type="button" class="btn btn-success"
                                                onclick="addRow('files_div_menu2')">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">سابقه کاری :</h2>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام محل کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="workExperience[company_name]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('workExperience.company_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام محل کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('workExperience.company_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.companies_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>عنوان شغلی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="workExperience[job_title]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('workExperience.job_title'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="عنوان شغلی">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('workExperience.job_title'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.job_title') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ شروع به کار :</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="datePickerInput" type="text" name="workExperience[from_date]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('workExperience.from_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ شروع به کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('workExperience.from_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.from_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ اتمام کار : (در صورت ادامه همکاری فیلد را خالی بگذارید)</label>
                                    </div>
                                    <div class="col-12">
                                        <input class="datePickerInput" type="text" name="workExperience[to_date]"
                                               value="{{(Session::get('membership_type_id') == 3) ?request()->old('workExperience.to_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ اتمام کار">
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('workExperience.to_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('workExperience.to_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label for="branch">شاخه : </label>
                                <select name="branch_id" required>
                                    <option disabled selected value>شاخه مورد نظر را انتخاب کنید *</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                @if (Session::get('membership_type_id') == 3 && $errors->has('branch_id'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('branch_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password" value="" size="40" aria-invalid="false"
                                               placeholder="رمز عبور*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 3 && $errors->has('password'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تایید رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password_confirmation" value="" size="40"
                                               aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                    </div>
                                </div>
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
                    <div class="tab-pane {{(Session::get('membership_type_id') == 4) ? 'active':'fade'}}" id="menu3">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[3]->title}}
                        </h2>
                        <form class="sidebar-form-body row" action="{{route('profile.upgrade.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="membership_type_id" value="{{$memberships[3]->id}}">
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="first_name"
                                               value="{{(Session::get('membership_type_id') == 4) ? request()->old('first_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('first_name'))
                                            <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام خانوادگی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="last_name"
                                               value="{{(Session::get('membership_type_id') == 4) ? request()->old('last_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام خانوادگی *" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('last_name'))
                                            <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام و نام خانوادگی انگلیسی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="name_en"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('name_en'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام و نام خانوادگی انگلیسی*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('name_en'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('name_en') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نام پدر :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[father_name]"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('profile.father_name'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نام پدر*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('profile.father_name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.father_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد ملی :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[national_code]"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('profile.national_code'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد ملی*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('profile.national_code'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.national_code') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره تماس :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="mobile"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('mobile'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره تماس*" required>
                                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('mobile'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>ایمیل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('email'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="ایمیل*" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('email'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>شماره شناسنامه :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[certificate_number]"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('profile.certificate_number'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="شماره شناسنامه*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('profile.certificate_number'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تاریخ تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_date]"
                                               class="datePickerInput"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('profile.birth_date'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="تاریخ تولد*" required autocomplete="off">
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('profile.birth_date'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>محل تولد :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[birth_place]"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('profile.birth_place'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="محل تولد*" required>
                                        <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('profile.birth_place'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label>جنسیت : </label>
                                <select name="profile[sex]" required>
                                    <option disabled selected value>جنسیت مورد نظر را انتخاب کنید *</option>
                                    <option value="1">مرد</option>
                                    <option value="0">زن</option>
                                </select>
                                @if (Session::get('membership_type_id') == 4 && $errors->has('profile.sex'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('profile.sex') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>نشانی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_address]"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('home_address'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="نشانی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('home_address'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label>کد پستی منزل :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="profile[home_post]"
                                               value="{{(Session::get('membership_type_id') == 4) ?request()->old('home_post'):''}}"
                                               size="40" aria-invalid="false"
                                               placeholder="کد پستی منزل *" required>
                                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('home_post'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('home_post') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-md-12 py-2 px-4">
                                <label for="branch">شاخه : </label>
                                <select name="branch_id" required>
                                    <option disabled selected value>شاخه مورد نظر را انتخاب کنید *</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                @if (Session::get('membership_type_id') == 4 && $errors->has('branch_id'))
                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                         style="display: block;">
                                        <strong>{{ $errors->first('branch_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password" value="" size="40" aria-invalid="false"
                                               placeholder="رمز عبور*" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                        @if (Session::get('membership_type_id') == 4 && $errors->has('password'))
                                            <div id="name-error" class="error text-danger pl-3" for="name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>تایید رمز عبور :</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password_confirmation" value="" size="40"
                                               aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                        <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function () {
            $(".datePickerInput").pDatepicker(
                {
                    initialValue: false,
                    responsive: true,
                    format: 'L',
                    calendarType: 'persian',
                    timePicker: {
                        enabled: false,
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );


           /* $(':text').val("jasdhaksdasd  ashd");
            $('input[name=mobile]').val("09198167422");
            $('input[name=email]').val("dr@g.com");
            $('input[name=national_code]').val("71371234");
            $('input[name=certificate_number]').val("71371234");
            $('input[name=password_confirmation]').val("12345678");
            $('input[name=password]').val("12345678");
            $('.datePickerInput').val("1397/10/23");*/
        });


    </script>
@endsection
<script>

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
    });

    function addRow(id) {
        var row_id = Date.now();
        var new_row = "                                <div class=\"row\" id=" + row_id + ">\n" +
            "                                    <div class=\"input-form col-md-2\">\n" +
            "                                        <input type=\"file\" name=\"files[]\" value=\"\" size=\"40\" aria-invalid=\"false\" placeholder=\"آپلود مدارک\" required>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"input-form col-md-8\">\n" +
            "                                        <input type=\"text\" name=\"files_explain[]\" value=\"\" size=\"40\" aria-invalid=\"false\" placeholder=\"توضیحات مدارک *\" required>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-2 py-2\">\n" +
            "                                        <button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(" + row_id + ")\">-</button>\n" +
            "                                    </div>\n" +
            "                                </div>";
        $("#" + id).append(new_row);
    }

    function deleteRow(id) {
        $("#" + id).remove();
    }

</script>
<style>
    .radio-year {
        height: auto !important;
        width: auto !important;
        display: inline !important;
        -webkit-appearance: radio !important;
        margin-left: 5px !important;
    }
</style>