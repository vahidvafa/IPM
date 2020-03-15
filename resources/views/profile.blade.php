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
                                    <div class="profile-top-image col-10 col-sm-8 col-md-6 col-lg-10 ">
                                        <img class="img-fluid" src="@if(file_exists("img/profile/".($user->profile_picture==null?"$.$":$user->profile_picture))) {{asset("img/profile/".$user->profile_picture)}} @else {{asset('img/nasrollahpour.jpg')}} @endif" alt="">
                                        <div class="profile-top-icons" style="background-color: @if($user->membership_type_id == 1) @if($user->reagent_id == 0) grey @else #372b7d @endif @endif">
                                            <p class="text-white font-18 text-medium m-0">
                                                <span >کد عضویت :</span>
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
                                    <span>نام: </span>
                                    <span class="text-black-light">{{$user->first_name}} {{$user->last_name}}</span>
                                </p>

                                    @if($user->membership_type_id == 2 )
                                        <p class="font-16 text-regular text-black">
                                            <span>نام شرکت: </span>
                                            {{$user->companies[0]->name}}
                                        </p>

                                        <p class="font-16 text-regular text-black">
                                            <span>محل شرکت: </span>
                                            {{$user->companies[0]->established_place}}
                                        </p>
                                        @endif

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
                                @if((jdate()->getYear() - (int)explode('/',$user->profile[0]->birth_date)[0]) <= 35)
                                <div class="row col-6 mb-3 "  >
                                    <img class="img-fluid" src="{{asset('img/YC1.jpeg')}}" alt="..">
                                </div>

                                @endif

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

                                <li class="nav-item">
                                    <a class="nav-link font-22 text-black-light text-regular " data-toggle="tab"
                                       href="#pay">
                                        پرداختی ها
                                        <p class="font-14 text-black-light text-regular m-0 m-md-2">تراکنش های مالی شما با انجمن</p>
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content col-12 last-pack-content ">
                                <div class="tab-pane row show active" id="preview">

                                    @endif
                                    @endauth
                                    <div class="col-12">
                                        <div class="detail-profile mb-4">
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


                                        <h2 class=" font-24 text-medium text-black mt-5 mb-4 text-dark-violet">
                                            اطلاعات بیشتر
                                        </h2>
                                        @if( auth()->check() && $user->id == auth()->id() && $user->shortcomings != null )

                                            <p class=" text-danger text-bold">
                                                نواقصی مدارک:
                                                {{--ادرس: {{$document->address}} ||--}}
                                                {{$user->shortcomings}}
                                            </p>

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





                                        {{--

                                                                                <div class="form-profile">

                                                                                    @if(auth()->id() != $user->id)
                                                                                        --}}{{--<h2 class=" font-24 text-medium text-black mb-4 mt-5 hide ">اطلاعات بیشتر
                                                                                            قابل مشاهده
                                                                                        </h2>--}}{{--
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

                                                                                </div>--}}

                                    </div>

                                    @auth()
                                        @if(auth()->id() == $user->id )
                                </div>
                                <div class="tab-pane row form-profile " id="edit">
                                    <form class="sidebar-form-body row" action="{{route("user.update")}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        {{--@method('post')--}}

                                        <div class="input-form col-md-4">
                                            <label for="profile[birth_date]">تاریخ تولد*</label>
                                            <input type="text" name="profile[birth_date]" size="40" aria-invalid="false"
                                                   placeholder="تاریخ تولد*"
                                                   value="{{old('profile.birth_date',$user->profile[0]->birth_date)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>

                                        <div class="input-form col-md-4">
                                            <label for="profile[birth_place]">محل تولد*</label>
                                            <input type="text" name="profile[birth_place]" size="40"
                                                   aria-invalid="false"
                                                   placeholder="محل تولد*"
                                                   value="{{old('profile.birth_place',$user->profile[0]->birth_place)}}"
                                                   required>
                                            {{--                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">--}}
                                        </div>
                                        <div class="col-4"></div>

                                        <div class="col-md-4 mt-4">
                                            <div class="input-upload ">
                                                <label class="custom-file-label" for="customFile">انتخاب عکس
                                                    پروفایل</label>
                                                <input type="file" name="profile_pic" class="custom-file-input"
                                                       id="customFile">

                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-4 mb-3">
                                            <div class="input-upload ">
                                                <label class="custom-file-label" id="resumeLbl" for="resume">انتخاب فایل رزومه
                                                    </label>
                                                <input type="file" name="resume" class="custom-file-input"
                                                       id="resume">

                                            </div>
                                        </div>

                                        @if( auth()->check() && $user->id == auth()->id() && $user->shortcomings != null )

                                            <p class=" text-danger text-bold col-12">
                                                نواقصی مدارک:
                                                {{--ادرس: {{$document->address}} ||--}}
                                                {{$user->shortcomings}}
                                            </p>

                                        @endif

                                        <div class="row ">
                                            <div class="input-form col-md-2 " >
                                                <input type="file" name="files[]" aria-invalid="false"
                                                       placeholder="آپلود مدارک"

                                                >
                                            </div>
                                            <div class="input-form col-md-8">
                                                <input type="text" name="files_explain[]" value="" size="40"
                                                       aria-invalid="false" placeholder="توضیحات مدارک *" >
                                            </div>
                                            <div class="col-md-2 py-2">
                                                <button type="button" class="btn btn-success"
                                                        onclick="addRow('documentDefect')">+
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-9" id="documentDefect" >

                                        </div>


                                        <div class="input-form col-md-12">
                                            <textarea type="text" name="about_me" aria-invalid="false"
                                                      placeholder="درباره من">{{old('about_me',$user->about_me)}}</textarea>

                                        </div>

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

                                        <div class="col-6"></div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 mt-4 center-y">
                                            <input type="submit" value="ذخیره تغییرات"
                                                   class="form-submit-violet text-white font-16 text-medium">

                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane row " id="pay">

                                    <table class="table table-responsive col-12">

                                        <thead>
                                        <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" >عنوان</th>
                                        <th scope="col" >مبلع</th>
                                        <th scope="col" >وضعیت</th>
                                        <th scope="col" >تاریخ</th>
                                        <th scope="col" >کد پیگیری بانک</th>
                                        <th scope="col" >مشاهده کدها</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->orders as $pay)
                                            <tr class="table-@switch($pay->state_id) @case(0)light @break @case(1)success @break @case(2)danger @break @endswitch " >
                                                <th scope="row">{{($loop->index)+1}}</th>
                                                <td></td>
                                                <td>{{$pay->total_price}} تومان</td>
                                                <td>@switch($pay->state_id) @case(0) منتظر پرداخت@break @case(1) تراکنش موفق @break @case(2) تراکنش ناموفق @break @endswitch</td>
                                                <td>{{jdate($pay->create_at)}}</td>
                                                <td>{{$pay->reference_id}}</td>
                                                <td><button class="btn btn-info" data-toggle="modal" data-target="#order-code" data-extra="{{$pay->ordercodes}}" >نمایش</button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        @endif
                    @endauth
                </div>

            </div>
        </div>

    </main>

    <div class="modal fade" id="order-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">کدها</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive col-12">

                        <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col" >نام</th>
                            <th scope="col" >موبایل</th>
                            <th scope="col" >کد</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-ordersCode">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script async>
        // Add the following code if you want the name of the file appear on select
        $("#customFile").on("input", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

$("#resume").on("input", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings("#resumeLbl").addClass("selected").html(fileName);
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


        $('#order-code').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) ;
            var orderCodes = button.data('extra') ;

            var trs = '';
            var i=0;
            orderCodes.forEach(function (e) {
                i++;
               trs += "<tr>" +
                       "<th scope='row' >"+i+"</th>"+
                       "<td>"+e.name+"</td>"+
                       "<td>"+e.mobile+"</td>"+
                       "<td>"+e.code+"</td>"+
                   "</tr>";
            });

console.log(trs);
            $('#tbody-ordersCode').html(trs);

            // var modal = $(this);
            // modal.find('.modal-title').text('New message to ' + recipient);
            // modal.find('.modal-body input').val(recipient);
        })

    </script>
@stop