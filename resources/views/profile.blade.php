@extends('master')
@section('header')
    <title>انجمن مدیریت پروژه</title>

    <link href='{{asset('fullcalendar/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('fullcalendar/daygrid/main.css')}}' rel='stylesheet' />
    <link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
    <link href='{{asset('fullcalendar/bootstrap/main.css')}}' rel='stylesheet' />
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
                           <h2 class="popular-pack-in-info-title font-22 text-medium text-black mb-3 ">
                               {{$user->name}}
                          </h2>
                           <p class="font-16 text-regular text-black">
                               @if($user->membership_type_id==2)
                               <span>تاریخ تاسیس شرکت : {{count($user->profile)!=0??$user->profile[0]->established_date}}</span>
                               <span class="text-black-light"></span>
                               @else
                               <span>سن : {{count($user->profile)!=0??$user->profile[0]->birth_date}}</span>
                               <span class="text-black-light"></span>
                               @endif
                           </p>
                           <p class="font-16 text-regular text-black">
                               <span>سابقه :</span>
                               <br>
                               @foreach($user->wordExperience as $word_experience)
                               <span class="text-black-light">{{$word_experience->company_name}} ({{substr($word_experience->from_date,0,4)}} تا {{substr($word_experience->to_date,0,4)}})</span><br>
                                   @endforeach
                           </p>
                           <p class="font-16 text-regular text-black">
                               <span>مدرک تحصیلی :</span><br>
                               @foreach($user->education as $education)
                                   <span class="text-black-light">دانشگاه: {{$education->education_place}}, معدل: {{$education->gpa}}</span><br>
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
                        <h2 class=" font-20 text-medium text-black  mb-4">{{$courseCat->name}}: </h2>
                        @foreach($courseCat->PassedCourses as $course)
                        <ul class="list-profile">
                            <li><p class="font-16"><span class="text-black text-medium">{{$course->title}}: </span>
                                    {!! $course->content !!}
                        </ul>

                            @endforeach
                            @endforeach
                    </div>

                    <div class="form-profile">
                        <h2 class=" font-24 text-medium text-black  mb-3 mt-5">نواقصی مدارک </h2>
                        @foreach($user->documents as $document)
                        <p class=" text-black-light font-16 mb-2">
                            ادرس: {{$document->address}} ||
                            نواقصی: {{$document->explain}}
                         </p>
                        @endforeach

                        <h2 class=" font-24 text-medium text-black  mb-4 mt-5">اطلاعات تکمیلی
                        </h2>
                        <form class="sidebar-form-body row">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="text-759" value="{{old('mobile',$user->mobile)}}" size="40" aria-invalid="false" placeholder="موبایل*">
                                <img src="{{asset('img/002-telephone.png')}}" class="form-icon">

                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="text-759" value="{{old('mobile',$user->mobile)}}" size="40" aria-invalid="false" placeholder="ایمیل*">
                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="سابقه کار*">
                                <img src="{{asset('img/001-user.png')}}" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="صنعت قالب*">
                                <img src="{{asset('img/engineer.png')}}" class="form-icon">
                            </div>
                            <div class="col-12">
                                <div class="input-upload ">
                                    <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                    <input type="file" class="custom-file-input" id="customFile">

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                                <input type="submit" value="ذخیره تغییرات" class="form-submit-violet text-white font-16 text-medium">

                            </div>

                        </form>
                    </div>


                </div>
            </div>




                </div>

    </div>



</main>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@stop