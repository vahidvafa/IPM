@extends('master')
@section('header')
    <title>انجمن مدیریت پروژه</title>

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
            <div class="profile-main mt-5 mb-5">
                <div class="row pb-5">
                    <div class="col-12">
                        <div class="row profile-top pt-5 pb-5">
                            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                                <div class="row justify-content-center">
                                    <div class="profile-top-image col-12 col-sm-8 col-md-6 col-lg-12 ">
                                        <img class="img-fluid" src="{{asset('img/nasrollahpour.jpg')}}" alt="">
                                        <div class="profile-top-icons">
                                            <p class="text-white font-18 text-medium m-0">
                                                <span>کد عضویت :</span>
                                                <span>{{$user->user_code}}</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                <p class="font-16 text-regular text-black">
                                    <span>سابقه :</span>
                                    <br>
                                    @foreach($user->workExperience as $word_experience)
                                        <span class="text-black-light">{{$word_experience->company_name}} ({{substr($word_experience->from_date,0,4)}} تا {{substr($word_experience->to_date,0,4)}})</span>
                                        <br>
                                    @endforeach
                                </p>
                                <p class="font-16 text-regular text-black">
                                    <span>مدرک تحصیلی :</span><br>
                                    @foreach($user->education as $education)
                                        <span class="text-black-light">دانشگاه: {{$education->education_place}}, معدل: {{$education->gpa}}</span>
                                        <br>
                                    @endforeach
                                </p>
                                <p class="font-16 text-regular text-black">
                                    <span>درباره من :</span>
                                    <span class="text-black-light">{{$user->about_me}}</span>
                                </p>
                                <div class="social-profile mt-3">
                                    <a href="/"><img src="{{asset('img/social11.png')}}" alt="..."></a>
                                    <a href="/"><img src="{{asset('img/social22.png')}}" alt="..."></a>
                                    <a href="/"><img src="{{asset('img/social33.png')}}" alt="..."></a>
                                    <a href="/"><img src="{{asset('img/social44.png')}}" alt="..."></a>
                                    <a href="/"><img src="{{asset('img/social55.png')}}" alt="..."></a>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="qr-profile">
                                    <img class="img-fluid" src="{{asset('img/googleQRcodes.png')}}" alt="..">
                                </div>
                            </div>
                            <div class="profile-top-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">
                                    <path d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="detail-profile">
                            <h2 class=" font-24 text-medium text-black  mb-4">مدارک و دوره های گذرانده شده
                            </h2>
                            <p class=" text-black-light font-16 mb-4">
                                تمامی دوره های گذرانده مورد تایید مدیریت پروژه ایران می باشد
                            </p>

                            @foreach($user->PassedCoursesCat as $courseCat)
                                @if(count($courseCat->PassedCourses) != 0)
                                    <h2 class=" font-20 text-medium text-black  mb-4">{{$courseCat->name}}: </h2>

                                @endif
                                @foreach($courseCat->PassedCourses as $course)
                                    <ul class="list-profile">
                                        <li><p class="font-16"><span
                                                        class="text-black text-medium">{{$course->title}}: </span>
                                        {!! $course->content !!}
                                    </ul>

                                @endforeach
                            @endforeach
                        </div>

                        <div class="form-profile">
                            @if(count($user->documents) !=0 )
                                <h2 class=" font-24 text-medium text-black  mb-3 mt-5">نواقصی مدارک </h2>
                            @else
                                <h2 class=" font-24 text-medium text-black  mb-3 mt-5">ویرایش اطلاعات</h2>
                            @endif
                            @foreach($user->documents as $document)
                                <p class=" text-black-light font-16 mb-2">
                                    ادرس: {{$document->address}} ||
                                    نواقصی: {{$document->explain}}
                                </p>
                            @endforeach
                            @if(auth()->check() && (auth()->user()->roles == 0 || auth()->user()->roles == 1) )

                                    {{--<div id="menu0">
                                        <h2 class=" font-22 text-medium text-black mt-5 mb-4">
                                            فرم {{$memberships[$user->membership_type_id]->title}}
                                        </h2>
                                        <form class="sidebar-form-body row" action="{{route('user.updateAdm')}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="type" value="{{$user->membership_type_id}}">
                                            <input type="hidden" name="slug" value="{{$user->slug}}">
                                            <div class="input-form col-md-6 ">
                                                <input type="text" name="name_en" value="{{(old('type') == 4) ?old('name_en'):$name_en}}" size="40" aria-invalid="false"
                                                       placeholder="نام و نام خانوادگی انگلیسی*" required>
                                                <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                                @if ($errors->has('profile.name_en'))
                                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.name_en') }}</strong>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="input-form col-md-6 ">
                                                <input type="text" name="name"
                                                       value="{{(old('type') == 1) ? old('name'):$user->name}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="نام و نام خانوادگی*" required>
                                                <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('name'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[father_name]"
                                                       value="{{(old('type') == 1) ?old('profile.father_name'):$user->profile[0]->father_name}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="نام پدر*" required>
                                                <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.father_name'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.father_name') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[national_code]"
                                                       value="{{(old('type') == 1) ?old('profile.national_code'):$user->profile[0]->national_code}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="کد ملی*" required>
                                                <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.national_code'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.national_code') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            --}}{{--<div class="input-form col-md-6">
                                                <input type="text" name="mobile"
                                                       value="{{(old('type') == 1) ?old('mobile'):$user->mobile}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="شماره تماس*" required>
                                                <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('mobile'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('mobile') }}</strong>
                                                    </div>
                                                @endif
                                            </div>--}}{{--
                                            --}}{{--<div class="input-form col-md-6">
                                                <input type="email" name="email"
                                                       value="{{(old('type') == 1) ?old('email'):$user->email}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="ایمیل*" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('email'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </div>
                                                @endif
                                            </div>--}}{{--
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[certificate_number]"
                                                       value="{{(old('type') == 1) ?old('profile.certificate_number'):$user->profile[0]->certificate_number}}"
                                                       size="40" aria-invalid="false"
                                                       placeholder="شماره شناسنامه*" required>
                                                <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.certificate_number'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">

                                                <input type="text" name="profile[birth_date]"
                                                       value="{{(old('type') == 1) ?old('profile.birth_date'):$user->profile[0]->birth_date}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="تاریخ تولد*" required>
                                                <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                                @if ($errors->has('profile.birth_date'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[birth_place]"
                                                       value="{{(old('type') == 1) ?old('profile.birth_place'):$user->profile[0]->birth_place}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="محل تولد*" required>
                                                <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.birth_place'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6 py-2 px-4">
                                                <label for="">جنسیت : </label>
                                                <input type="radio" class="option-input" name="profile[sex]" value="1" size="40"
                                                       aria-invalid="false" placeholder="مرد" >
                                                مرد
                                                <input type="radio" class="option-input" name="profile[sex]" value="0" size="40"
                                                       aria-invalid="false" placeholder="زن" >
                                                زن
                                                @if (old('type') == 1 && $errors->has('profile.sex'))

                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.sex') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[work_address]"
                                                       value="{{(old('type') == 1) ?old('profile.work_address'):$user->profile[0]->work_address}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="نشانی محل کار *" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.work_address'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.work_address') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[work_post]"
                                                       value="{{(old('type') == 1) ?old('profile.work_post'):$user->profile[0]->work_post}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="کد پستی محل کار *" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.work_post'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.work_post') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[home_address]"
                                                       value="{{(old('type') == 1) ?old('profile.home_address'):$user->profile[0]->home_address}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="نشانی منزل *" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.home_address'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.home_address') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[home_post]"
                                                       value="{{(old('type') == 1) ?old('profile.home_post'):$user->profile[0]->home_post}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="کد پستی منزل *" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.home_post'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.home_post') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="text" name="profile[work_name]"
                                                       value="{{(old('type') == 1) ?old('profile.work_name'):$user->profile[0]->work_name}}"
                                                       size="40"
                                                       aria-invalid="false"
                                                       placeholder="محل کار *" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('profile.work_name'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.work_name') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6 py-2 px-4">
                                                <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                                <input type="radio" class="option-input" name="profile[receive_place]" value="0"
                                                       size="40"
                                                       aria-invalid="false" placeholder="منزل" >
                                                منزل
                                                <input type="radio" class="option-input" name="profile[receive_place]" value="1"
                                                       size="40"
                                                       aria-invalid="false" placeholder="محل کار" >
                                                محل کار
                                                @if (old('type') == 1 && $errors->has('profile.receive_place'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('profile.receive_place') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            --}}{{--<div class="input-form col-md-6">
                                                <input type="password" name="password" value="" size="40"
                                                       aria-invalid="false"
                                                       placeholder="رمز عبور*" >
                                                <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                                @if (old('type') == 1 && $errors->has('password'))
                                                    <div id="name-error" class="error text-danger pl-3"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input-form col-md-6">
                                                <input type="password" name="password_confirmation" value="" size="40"
                                                       aria-invalid="false" placeholder="تایید رمز عبور *" >
                                                <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                            </div>
--}}{{--
                                            <div class="input-form col-md-12">
                                            <textarea type="text" name="about_me" size="40" aria-invalid="false"
                                                      placeholder="درباره من">{{old('about_me',$user->about_me)}}</textarea>

                                            </div>
                                            --}}{{--                            <div class="input-form col-md-12" id="files_div_menu0">--}}{{--
                                            --}}{{--                                <div class="row">--}}{{--
                                            --}}{{--                                    <div class="col-md-12">--}}{{--
                                            --}}{{--                                        <span>--}}{{--
                                            --}}{{--                                            مدارک مورد نیاز : ( {{$memberships[0]->required_documents}} )--}}{{--
                                            --}}{{--                                        </span>--}}{{--
                                            --}}{{--                                    </div>--}}{{--
                                            --}}{{--                                </div>--}}{{--
                                            --}}{{--                                <div class="row">--}}{{--
                                            --}}{{--                                    <div class="input-form col-md-2">--}}{{--
                                            --}}{{--                                        <input type="file" name="files[]" value="" size="40" aria-invalid="false"--}}{{--
                                            --}}{{--                                               placeholder="آپلود مدارک" >--}}{{--
                                            --}}{{--                                    </div>--}}{{--
                                            --}}{{--                                    <div class="input-form col-md-8">--}}{{--
                                            --}}{{--                                        <input type="text" name="files_explain[]" value="" size="40"--}}{{--
                                            --}}{{--                                               aria-invalid="false" placeholder="توضیحات مدارک *" >--}}{{--
                                            --}}{{--                                    </div>--}}{{--
                                            --}}{{--                                    <div class="col-md-2 py-2">--}}{{--
                                            --}}{{--                                        <button type="button" class="btn btn-success" onclick="addRow('files_div_menu0')">+</button>--}}{{--
                                            --}}{{--                                    </div>--}}{{--
                                            --}}{{--                                </div>--}}{{--
                                            --}}{{--                            </div>--}}{{--
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
                                    </div>--}}


                                @switch($user->membership_type_id)
                                    {{--عضویت حقیقی--}}
                                    @case(1)
                                        <div id="menu0">
                                            <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[0]->title}}
                                            </h2>
                                            <form class="sidebar-form-body row" action="{{route('user.updateAdm')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="type" value="{{$memberships[0]->id}}">
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="first_name" value="{{(Session::get('type') == 1) ? request()->old('first_name'):$user->first_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('first_name'))
                                                        <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="last_name" value="{{(Session::get('type') == 1) ? request()->old('last_name'):$user->last_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام خانوادگی *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('last_name'))
                                                        <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="name_en" value="{{(Session::get('type') == 1) ?request()->old('name_en'):$name_en}}" size="40" aria-invalid="false"
                                                           placeholder="نام و نام خانوادگی انگلیسی*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('name_en'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[father_name]" value="{{(Session::get('type') == 1) ?request()->old('profile.father_name'):$user->profile[0]->father_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام پدر*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.father_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.father_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[national_code]" value="{{(Session::get('type') == 1) ?request()->old('profile.national_code'):$user->profile[0]->national_code}}" size="40" aria-invalid="false"
                                                           placeholder="کد ملی*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.national_code'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.national_code') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[certificate_number]" value="{{(Session::get('type') == 1) ?request()->old('profile.certificate_number'):$user->profile[0]->certificate_number}}" size="40" aria-invalid="false"
                                                           placeholder="شماره شناسنامه*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.certificate_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_date]" value="{{(Session::get('type') == 1) ?request()->old('profile.birth_date'):$user->profile[0]->birth_date}}" size="40" aria-invalid="false"
                                                           placeholder="تاریخ تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.birth_date'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_place]" value="{{(Session::get('type') == 1) ?request()->old('profile.birth_place'):$user->profile[0]->birth_place}}" size="40" aria-invalid="false"
                                                           placeholder="محل تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.birth_place'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">جنسیت : </label>
                                                    <input type="radio" class="option-input" name="profile[sex]" value="1" size="40"
                                                           aria-invalid="false" placeholder="مرد" required>
                                                    مرد
                                                    <input type="radio" class="option-input" name="profile[sex]" value="0" size="40"
                                                           aria-invalid="false" placeholder="زن" required>
                                                    زن
                                                    @if (Session::get('type') == 1 && $errors->has('profile.sex'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.sex') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[work_address]" value="{{(Session::get('type') == 1) ?request()->old('profile.work_address'):$user->profile[0]->work_address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی محل کار *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.work_address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.work_address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[work_post]" value="{{(Session::get('type') == 1) ?request()->old('profile.work_post'):$user->profile[0]->work_post}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی محل کار *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.work_post'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.work_post') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_address]" value="{{(Session::get('type') == 1) ?request()->old('profile.home_address'):$user->profile[0]->home_address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.home_address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_post]" value="{{(Session::get('type') == 1) ?request()->old('profile.home_post'):$user->profile[0]->home_post}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.home_post'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_post') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[work_name]" value="{{(Session::get('type') == 1) ?request()->old('profile.work_name'):$user->profile[0]->work_name}}" size="40" aria-invalid="false"
                                                           placeholder="محل کار *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('profile.work_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.work_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                                    <input type="radio" class="option-input" name="profile[receive_place]" value="0" size="40"
                                                           aria-invalid="false" placeholder="مرد" required>
                                                    منزل
                                                    <input type="radio" class="option-input" name="profile[receive_place]" value="1" size="40"
                                                           aria-invalid="false" placeholder="زن" required>
                                                    محل کار
                                                    @if (Session::get('type') == 1 && $errors->has('receive_place'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('receive_place') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password" value="" size="40" aria-invalid="false"
                                                           placeholder="رمز عبور*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 1 && $errors->has('password'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password_confirmation" value="" size="40"
                                                           aria-invalid="false" placeholder="تایید رمز عبور " >
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
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
                                    @break
                                    {{--عضویت حقوقی--}}
                                    @case(2)
                                        <div id="menu1">
                                            <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم  {{$memberships[1]->title}}
                                            </h2>
                                            <form class="sidebar-form-body row" action="{{route('user.updateAdm')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="type" value="{{$memberships[1]->id}}">
                                                <div class="col-md-12 my-4">
                                                    <h2 class="font-22 text-medium text-black">مشخصات فردی نماینده :</h2>
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="first_name" value="{{(Session::get('type') == 2) ? request()->old('first_name'):$user->first_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('first_name'))
                                                        <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="last_name" value="{{(Session::get('type') == 2) ? request()->old('last_name'):$user->last_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام خانوادگی *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('last_name'))
                                                        <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="name_en" value="{{(Session::get('type') == 2) ?request()->old('name_en'):$name_en}}" size="40" aria-invalid="false"
                                                           placeholder="نام و نام خانوادگی انگلیسی*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('name_en'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[father_name]" value="{{(Session::get('type') == 2) ?request()->old('profile.father_name'):$user->profile[0]->father_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام پدر*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.father_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.father_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[national_code]" value="{{(Session::get('type') == 2) ?request()->old('profile.national_code'):$user->profile[0]->national_code}}" size="40" aria-invalid="false"
                                                           placeholder="کد ملی*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.national_code'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.national_code') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[certificate_number]" value="{{(Session::get('type') == 2) ?request()->old('profile.certificate_number'):$user->profile[0]->certificate_number}}" size="40" aria-invalid="false"
                                                           placeholder="شماره شناسنامه*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.certificate_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_date]" value="{{(Session::get('type') == 2) ?request()->old('profile.birth_date'):$user->profile[0]->birth_date}}" size="40" aria-invalid="false"
                                                           placeholder="تاریخ تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.birth_date'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_place]" value="{{(Session::get('type') == 2) ?request()->old('profile.birth_place'):$user->profile[0]->birth_place}}" size="40" aria-invalid="false"
                                                           placeholder="محل تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.birth_place'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">جنسیت : </label>
                                                    <input type="radio" class="option-input" name="profile[sex]" value="1" size="40"
                                                           aria-invalid="false" placeholder="مرد" required>
                                                    مرد
                                                    <input type="radio" class="option-input" name="profile[sex]" value="0" size="40"
                                                           aria-invalid="false" placeholder="زن" required>
                                                    زن
                                                    @if (Session::get('type') == 2 && Session::get('profile.sex'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.sex') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_address]" value="{{(Session::get('type') == 2) ?request()->old('profile.home_address'):$user->profile[0]->home_address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.home_address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_post]" value="{{(Session::get('type') == 2) ?request()->old('profile.home_post'):$user->profile[0]->home_post}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('profile.home_post'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_post') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 my-4">
                                                    <h2 class="font-22 text-medium text-black">مشخصات شرکت :</h2>
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[name]" value="{{(Session::get('type') == 2) ?request()->old('company.name'):$user->companies[0]->name}}" size="40" aria-invalid="false"
                                                           placeholder="نام سازمان *" >
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.name') }}</strong>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[established_date]" value="{{(Session::get('type') == 2) ?request()->old('company.established_date'):$user->companies[0]->established_date}}" size="40" aria-invalid="false"
                                                           placeholder="سال تاسیس*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.established_date'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.established_date') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[established_number]" value="{{(Session::get('type') == 2) ?request()->old('company.established_number'):$user->companies[0]->established_number}}" size="40" aria-invalid="false"
                                                           placeholder="شماره ثبت*" required>
                                                    <img src="{{asset("img/002-telephone.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.established_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong> {{ $errors->first('company.established_number') }} </strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[economy_number]" value="{{(Session::get('type') == 2) ?request()->old('company.economy_number'):$user->companies[0]->economy_number}}" size="40" aria-invalid="false"
                                                           placeholder="شماره اقتصادی*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.economy_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.economy_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[national_number]" value="{{(Session::get('type') == 2) ?request()->old('company.national_number'):$user->companies[0]->post_number}}" size="40" aria-invalid="false"
                                                           placeholder="شناسه ملی *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.national_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.national_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[post_number]" value="{{(Session::get('type') == 2) ?request()->old('company.post_number'):$user->companies[0]->post_number}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.post_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.post_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">نوع مالکیت شرکت : </label>
                                                    <input type="radio" class="option-input" name="company[ownership_type]" value="دولتی" size="40"
                                                           aria-invalid="false" placeholder="دولتی" required>
                                                    دولتی
                                                    <input type="radio" class="option-input" name="company[ownership_type]" value="خصوصی" size="40"
                                                           aria-invalid="false" placeholder="خصوصی" required>
                                                    خصوصی
                                                    <input type="radio" class="option-input" name="company[ownership_type]" value="عمومی" size="40"
                                                           aria-invalid="false" placeholder="عمومی" required>
                                                    عمومی
                                                    <input type="radio" class="option-input" name="company[ownership_type]" value="دولتی / خصوصی" size="40"
                                                           aria-invalid="false" placeholder="دولتی / خصوصی" required>
                                                    دولتی / خصوصی
                                                    <input type="radio" class="option-input" name="company[ownership_type]" value="خصوصی / دولتی" size="40"
                                                           aria-invalid="false" placeholder="خصوصی / دولتی" required>
                                                    خصوصی / دولتی
                                                    <input type="radio" class="option-input" name="company[ownership_type]" value="سایر" size="40"
                                                           aria-invalid="false" placeholder="سایر" required>
                                                    سایر
                                                    @if (Session::get('type') == 2 && $errors->has('company.ownership_type'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.ownership_type') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">نوع حقوقی شرکت : </label>
                                                    <input type="radio" class="option-input" name="company[legal_type]" value="سهامی خاص" size="40"
                                                           aria-invalid="false" placeholder="سهامی خاص" required>
                                                    سهامی خاص
                                                    <input type="radio" class="option-input" name="company[legal_type]" value="سهامی عام" size="40"
                                                           aria-invalid="false" placeholder="سهامی عام" required>
                                                    سهامی عام
                                                    <input type="radio" class="option-input" name="company[legal_type]" value="با مسئولیت محدود" size="40"
                                                           aria-invalid="false" placeholder="با مسئولیت محدود" required>
                                                    با مسئولیت محدود
                                                    <input type="radio" class="option-input" name="company[legal_type]" value="تضامنی" size="40"
                                                           aria-invalid="false" placeholder="تضامنی" required>
                                                    تضامنی
                                                    <input type="radio" class="option-input" name="company[legal_type]" value="سایر" size="40"
                                                           aria-invalid="false" placeholder="سایر" required>
                                                    سایر
                                                    @if (Session::get('type') == 2 && $errors->has('company.legal_type'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.legal_type') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-12">
                                                    <input type="text" name="company[address]" value="{{(Session::get('type') == 2) ?request()->old('company.address'):$user->companies[0]->address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی دفتر مرکزی *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[ceo_name]" value="{{(Session::get('type') == 2) ?request()->old('company.ceo_name'):$user->companies[0]->ceo_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام مدیر عامل شرکت *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.ceo_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.ceo_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="company[ceo_name_en]" value="{{(Session::get('type') == 2) ?request()->old('company.ceo_name_en'):$name_en}}" size="40" aria-invalid="false"
                                                           placeholder="نام مدیر عامل شرکت به انگلیسی *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('company.ceo_name_en'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('company.ceo_name_en') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password" value="" size="40" aria-invalid="false"
                                                           placeholder="رمز عبور*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 2 && $errors->has('password'))
                                                        <div id="password-error" class="error text-danger pl-3"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password_confirmation" value="" size="40"
                                                           aria-invalid="false" placeholder="تایید رمز عبور " >
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
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
                                    @break
                                    {{--عضویت دانشجویی--}}
                                    @case(3)
                                        <div id="menu2">
                                            <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[2]->title}}
                                            </h2>
                                            <form class="sidebar-form-body row" action="{{route('user.updateAdm')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="type" value="{{$memberships[2]->id}}">
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="first_name" value="{{(Session::get('type') == 3) ? request()->old('first_name'):$user->first_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('first_name'))
                                                        <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="last_name" value="{{(Session::get('type') == 3) ? request()->old('last_name'):$user->last_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام خانوادگی *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('last_name'))
                                                        <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="name_en" value="{{(Session::get('type') == 3) ?request()->old('name_en'):$name_en}}" size="40" aria-invalid="false"
                                                           placeholder="نام و نام خانوادگی انگلیسی*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('name_en'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[father_name]" value="{{(Session::get('type') == 3) ?request()->old('profile.father_name'):$user->profile[0]->father_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام پدر*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.father_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.father_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[national_code]" value="{{(Session::get('type') == 3) ?request()->old('profile.national_code'):$user->profile[0]->national_code}}" size="40" aria-invalid="false"
                                                           placeholder="کد ملی*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.national_code'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.national_code') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[certificate_number]" value="{{(Session::get('type') == 3) ?request()->old('profile.certificate_number'):$user->profile[0]->certificate_number}}" size="40" aria-invalid="false"
                                                           placeholder="شماره شناسنامه*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.certificate_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_date]" value="{{(Session::get('type') == 3) ?request()->old('profile.birth_date'):$user->profile[0]->birth_date}}" size="40" aria-invalid="false"
                                                           placeholder="تاریخ تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.birth_date'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ Session::get('profile.birth_date') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_place]" value="{{(Session::get('type') == 3) ?request()->old('profile.birth_place'):$user->profile[0]->birth_place}}" size="40" aria-invalid="false"
                                                           placeholder="محل تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.birth_place'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">جنسیت : </label>
                                                    <input type="radio" class="option-input" name="profile[sex]" value="1" size="40"
                                                           aria-invalid="false" placeholder="مرد" required>
                                                    مرد
                                                    <input type="radio" class="option-input" name="profile[sex]" value="0" size="40"
                                                           aria-invalid="false" placeholder="زن" required>
                                                    زن
                                                    @if (Session::get('type') == 3 && $errors->has('profile.sex'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.sex') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[work_address]" value="{{(Session::get('type') == 3) ?request()->old('profile.work_address'):$user->profile[0]->work_address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی محل کار *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.work_address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.work_address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[work_post]" value="{{(Session::get('type') == 3) ?request()->old('profile.work_post'):$user->profile[0]->work_post}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی محل کار *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.work_post'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.work_post') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_address]" value="{{(Session::get('type') == 3) ?request()->old('profile.home_address'):$user->profile[0]->home_address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.home_address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_post]" value="{{(Session::get('type') == 3) ?request()->old('profile.home_post'):$user->profile[0]->home_post}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.home_post'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_post') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[work_name]" value="{{(Session::get('type') == 3) ?request()->old('profile.work_name'):$user->profile[0]->work_name}}" size="40" aria-invalid="false"
                                                           placeholder="محل کار *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('profile.work_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.work_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">انتخاب نشانی ارسال مراسلات : </label>
                                                    <input type="radio" class="option-input" name="profile[receive_place]" value="منزل" size="40"
                                                           aria-invalid="false" placeholder="مرد" required>
                                                    منزل
                                                    <input type="radio" class="option-input" name="profile[receive_place]" value="محل کار" size="40"
                                                           aria-invalid="false" placeholder="زن" required>
                                                    محل کار
                                                    @if (Session::get('type') == 3 && $errors->has('receive_place'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('receive_place') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password" value="" size="40" aria-invalid="false"
                                                           placeholder="رمز عبور*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 3 && $errors->has('password'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password_confirmation" value="" size="40"
                                                           aria-invalid="false" placeholder="تایید رمز عبور " >
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
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
                                    @break
                                    {{--عضویت دانش آموزی--}}
                                    @case(4)
                                        <div id="menu3">
                                            <h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[3]->title}}
                                            </h2>
                                            <form class="sidebar-form-body row" action="{{route('user.updateAdm')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="type" value="{{$memberships[3]->id}}">
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="first_name" value="{{(Session::get('type') == 4) ? request()->old('first_name'):$user->first_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('first_name'))
                                                        <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="last_name" value="{{(Session::get('type') == 4) ? request()->old('last_name'):$user->last_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام خانوادگی *" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('last_name'))
                                                        <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 ">
                                                    <input type="text" name="name_en" value="{{(Session::get('type') == 4) ?request()->old('name_en'):$name_en}}" size="40" aria-invalid="false"
                                                           placeholder="نام و نام خانوادگی انگلیسی*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('name_en'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[father_name]" value="{{(Session::get('type') == 4) ?request()->old('profile.father_name'):$user->profile[0]->father_name}}" size="40" aria-invalid="false"
                                                           placeholder="نام پدر*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.father_name'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.father_name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[national_code]" value="{{(Session::get('type') == 4) ?request()->old('profile.national_code'):$user->profile[0]->national_code}}" size="40" aria-invalid="false"
                                                           placeholder="کد ملی*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.national_code'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.national_code') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[certificate_number]" value="{{(Session::get('type') == 4) ?request()->old('profile.certificate_number'):$user->profile[0]->certificate_number}}" size="40" aria-invalid="false"
                                                           placeholder="شماره شناسنامه*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.certificate_number'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_date]" value="{{(Session::get('type') == 4) ?request()->old('profile.birth_date'):$user->profile[0]->birth_date}}" size="40" aria-invalid="false"
                                                           placeholder="تاریخ تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.birth_date'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_date') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[birth_place]" value="{{(Session::get('type') == 4) ?request()->old('profile.birth_place'):$user->profile[0]->birth_place}}" size="40" aria-invalid="false"
                                                           placeholder="محل تولد*" required>
                                                    <img src="{{asset("img/001-user.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.birth_place'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.birth_place') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6 py-2 px-4">
                                                    <label for="">جنسیت : </label>
                                                    <input type="radio" class="option-input" name="profile[sex]" value="1" size="40"
                                                           aria-invalid="false" placeholder="مرد" required>
                                                    مرد
                                                    <input type="radio" class="option-input" name="profile[sex]" value="0" size="40"
                                                           aria-invalid="false" placeholder="زن" required>
                                                    زن
                                                    @if (Session::get('type') == 4 && $errors->has('profile.sex'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.sex') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_address]" value="{{(Session::get('type') == 4) ?request()->old('profile.home_address'):$user->profile[0]->home_address}}" size="40" aria-invalid="false"
                                                           placeholder="نشانی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.home_address'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_address') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="text" name="profile[home_post]" value="{{(Session::get('type') == 4) ?request()->old('profile.home_post'):$user->profile[0]->home_post}}" size="40" aria-invalid="false"
                                                           placeholder="کد پستی منزل *" required>
                                                    <img src="{{asset("img/003-envelope.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('profile.home_post'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('profile.home_post') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password" value="" size="40" aria-invalid="false"
                                                           placeholder="رمز عبور*" required>
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
                                                    @if (Session::get('type') == 4 && $errors->has('password'))
                                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                                             style="display: block;">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="input-form col-md-6">
                                                    <input type="password" name="password_confirmation" value="" size="40"
                                                           aria-invalid="false" placeholder="تایید رمز عبور " >
                                                    <img src="{{asset("img/004-key.png")}}" class="form-icon">
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
                                    @break
                                @endswitch
                            @else
                                @if(auth()->id() != $user->id)
                                    <h2 class=" font-24 text-medium text-black  mb-4 mt-5">اطلاعات بیشتر قابل مشاهده
                                    </h2>
                                    <div class="sidebar-form-body row">
                                        @foreach($profileVisible as $key=>$value)
                                            <div class="input-form col-md-12 ">
                                                <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                                <p>{{$value}}</p>
                                            </div>
                                        @endforeach

                                    </div>

                                @else
                                    <form class="sidebar-form-body row" action="{{route("user.update")}}" method="POST"
                                          enctype="multipart/form-data">>
                                        @csrf
                                        {{--@method('post')--}}
                                        <div class="input-form col-md-5">
                                            <input type="text" name="profile[youTube]" size="40" aria-invalid="false"
                                                   placeholder="لینک یوتویوپ"
                                                   value="{{old('profile.birth_date',$user->profile[0]->youTube)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-5">
                                            <input type="text" name="profile[facebook]" size="40" aria-invalid="false"
                                                   placeholder="لینک فیسبوک"
                                                   value="{{old('profile.birth_place',$user->profile[0]->facebook)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-5">
                                            <input type="text" name="profile[instagram]" size="40" aria-invalid="false"
                                                   placeholder="لینک اینستاگرام"
                                                   value="{{old('profile.birth_place',$user->profile[0]->instagram)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-5">
                                            <input type="text" name="profile[telegram]" size="40" aria-invalid="false"
                                                   placeholder="لینک تلگرام"
                                                   value="{{old('profile.birth_date',$user->profile[0]->telegram)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-5">
                                            <input type="text" name="profile[twitter]" size="40" aria-invalid="false"
                                                   placeholder="لینک تویتر"
                                                   value="{{old('profile.birth_place',$user->profile[0]->twitter)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-5">
                                            <input type="text" name="profile[home_tel]" size="40" aria-invalid="false"
                                                   placeholder="تلفن منزل*"
                                                   value="{{old('profile.birth_date',$user->profile[0]->home_tel)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-3">
                                            <input type="text" name="profile[birth_date]" size="40" aria-invalid="false"
                                                   placeholder="تاریخ تولد*"
                                                   value="{{old('profile.birth_date',$user->profile[0]->birth_date)}}" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="input-form col-md-3">
                                            <input type="text" name="profile[birth_place]" size="40" aria-invalid="false"
                                                   placeholder="محل تولد*"
                                                   value="{{old('profile.birth_place',$user->profile[0]->birth_place)}}"
                                                   required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-upload ">
                                                <label class="custom-file-label" for="customFile">انتخاب عکس
                                                    پروفایل</label>
                                                <input type="file" name="profile_picture" class="custom-file-input"
                                                       id="customFile">

                                            </div>
                                        </div>


                                        <div class="input-form col-md-12">
                                            <textarea type="text" name="about_me" size="40" aria-invalid="false"
                                                      placeholder="درباره من">{{old('about_me',$user->about_me)}}</textarea>

                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 mt-4 center-y">
                                            <input type="submit" value="ذخیره تغییرات"
                                                   class="form-submit-violet text-white font-16 text-medium">

                                        </div>
                                    </form>

                                @endif
                            @endif


                        </div>


                    </div>
                </div>


            </div>

        </div>


    </main>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop