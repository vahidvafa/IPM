@extends('master')
@section('header')
    <title>انجمن مدیریت پروژه</title>

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
                                @if(time() >= $user->expire)
                                    <p class="text-danger font-26 text-bold">اشتراک شما به پایان رسیده</p>
                                @endif
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
                                    <a href="{{$user->profile[0]->telegram}}"><img src="{{asset('img/social11.png')}}" alt="..."></a>
                                    <a href="{{$user->profile[0]->instagram}}"><img src="{{asset('img/social22.png')}}" alt="..."></a>
                                    <a href="{{$user->profile[0]->facebook}}"><img src="{{asset('img/social33.png')}}" alt="..."></a>
                                    <a href="{{$user->profile[0]->twitter}}"><img src="{{asset('img/social44.png')}}" alt="..."></a>
                                    <a href="{{$user->profile[0]->youTube}}"><img src="{{asset('img/social55.png')}}" alt="..."></a>
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

                    @auth()
                        @if(auth()->id() == $user->id )
                            <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 mb-4 ">

                                <li class="nav-item">
                                    <a class="nav-link font-22 text-black-light text-regular show active"
                                       data-toggle="tab" href="#preview">
                                        پیش نمایش
                                        <p class="font-14 text-black-light text-regular m-0 m-md-2">همان طور ببنید که
                                            دیگران می بینند
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link font-22 text-black-light text-regular " data-toggle="tab"
                                       href="#edit">
                                        ویرایش اطلاعات
                                        <p class="font-14 text-black-light text-regular m-0 m-md-2">ویرایش اطلاعات بیشتر
                                            تنها توسط مدیران انجمن صورت میگیرد</p>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content col-12 last-pack-content ">
                                <div class="tab-pane row show active" id="preview">

                                    @endif
                                    @endauth
                                    <div class="col-12">
                                        <div class="detail-profile ">
                                            <h2 class=" font-24 text-medium text-black mb-4 text-dark-violet">مدارک و
                                                دوره های گذرانده شده
                                            </h2>
                                            <p class=" text-black-light font-16 mb-4">
                                                تمامی دوره های گذرانده شده مورد تایید انجمن مدیریت پروژه ایران می باشد
                                            </p>

                                            @foreach($PassedCoursesCats as $courseCat)

                                                @if(count($courseCat->PassedCourses) != 0)
                                                    <h2 class=" font-20 text-medium text-black  mb-4">{{$courseCat->name}}
                                                        : </h2>

                                                @endif
                                                    <ul class="list-profile">
                                                @foreach($user->passedCourse as $course)
                                                    @if($courseCat->id == $course->passed_courses_category_id)

                                                            <li><p class="font-16"><span
                                                                            class="text-black text-medium">{{$course->title}}: </span>
                                                            {!! $course->content !!}
                                                                </p>
                                                            </li>

                                                    @endif

                                                @endforeach
                                                    </ul>
                                            @endforeach
                                        </div>

                                        <div class="form-profile">
                                            @if( auth()->check() && $user->id == auth()->id() && count($user->documents) !=0 )
                                                <h2 class=" font-24 text-medium text-black  mb-3 mt-5">نواقصی
                                                    مدارک </h2>

                                            @foreach($user->documents as $document)
                                                <p class=" text-black-light font-16 mb-2">
                                                    ادرس: {{$document->address}} ||
                                                    نواقصی: {{$document->explain}}
                                                </p>
                                            @endforeach
                                            @endif

                                            @if(auth()->id() != $user->id)
                                                <h2 class=" font-24 text-medium text-black mb-4 mt-5 hide ">اطلاعات بیشتر
                                                    قابل مشاهده
                                                </h2>
                                                <div class="sidebar-form-body row hide"  >
                                                    @foreach($profileVisible as $key=>$value)
                                                        <div class="input-form col-md-12 ">
                                                            <img src="{{asset('img/002-telephone.png')}}"
                                                                 class="form-icon">
                                                            <p>{{$value}}</p>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                    @auth()
                                        @if(auth()->id() == $user->id )
                                </div>
                                <div class="tab-pane row form-profile" id="edit">
                                    <form class="sidebar-form-body row" action="{{route("user.update")}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        {{--@method('post')--}}
                                        <div class="input-form col-md-5">
                                            <label for="profile[youTube]">لینک یوتویوپ</label>
                                            <input type="text" name="profile[youTube]" size="40" aria-invalid="false"
                                                   placeholder="لینک یوتویوپ"
                                                   value="{{old('profile.birth_date',$user->profile[0]->youTube)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-5">
                                            <label for="profile[facebook]">لینک فیسبوک</label>
                                            <input type="text" name="profile[facebook]" size="40" aria-invalid="false"
                                                   placeholder="لینک فیسبوک"
                                                   value="{{old('profile.birth_place',$user->profile[0]->facebook)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-5">
                                            <label for="profile[instagram]">لینک اینستاگرام</label>
                                            <input type="text" name="profile[instagram]" size="40" aria-invalid="false"
                                                   placeholder="لینک اینستاگرام"
                                                   value="{{old('profile.birth_place',$user->profile[0]->instagram)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-5">
                                            <label for="profile[telegram]">لینک تلگرام</label>
                                            <input type="text" name="profile[telegram]" size="40" aria-invalid="false"
                                                   placeholder="لینک تلگرام"
                                                   value="{{old('profile.birth_date',$user->profile[0]->telegram)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-5">
                                            <label for="profile[twitter]">لینک تویتر</label>
                                            <input type="text" name="profile[twitter]" size="40" aria-invalid="false"
                                                   placeholder="لینک تویتر"
                                                   value="{{old('profile.birth_place',$user->profile[0]->twitter)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-5">
                                            <label for="profile[home_tel]">تلفن منزل*</label>
                                            <input type="text" name="profile[home_tel]" size="40" aria-invalid="false"
                                                   placeholder="تلفن منزل*"
                                                   value="{{old('profile.birth_date',$user->profile[0]->home_tel)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-3">
                                            <label for="profile[birth_date]">تاریخ تولد*</label>
                                            <input type="text" name="profile[birth_date]" size="40" aria-invalid="false"
                                                   placeholder="تاریخ تولد*"
                                                   value="{{old('profile.birth_date',$user->profile[0]->birth_date)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-3">
                                            <label for="profile[birth_place]">محل تولد*</label>
                                            <input type="text" name="profile[birth_place]" size="40"
                                                   aria-invalid="false"
                                                   placeholder="محل تولد*"
                                                   value="{{old('profile.birth_place',$user->profile[0]->birth_place)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="col-md-4 mt-5">
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
                                </div>
                            </div>

                        @endif
                    @endauth
                </div>

            </div>
        </div>

    </main>

    <script async>
        // Add the following code if you want the name of the file appear on select
        $("#customFile").on("input", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });




    </script>
@stop