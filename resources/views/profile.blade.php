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
                        <div class="row profile-top pt-5 pb-5 mb-3">
                            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                                <div class="row justify-content-center">
                                    <div class="profile-top-image col-10 col-sm-8 col-md-6 col-lg-10 ">
                                        <img class="img-fluid img-profile"
                                             src="@if($user->profile_picture != null ) {{asset("img/profile/".$user->profile_picture)}} @else {{asset('img/profile/profile-default.png')}} @endif"
                                             alt="">
                                        <div class="profile-top-icons fix-profile-icon "
                                             style="background-color: @if($user->membership_type_id == 1) @if($user->main == 0) grey @else #372b7d @endif @else #372b7d @endif">
                                            <p class="font-18 text-medium m-0">
                                                {{$user->first_name." ".$user->last_name}}
                                            </p>

                                        </div>
                                        <p class="font-16 text-regular text-black">
                                            <span>کد عضویت: </span>
                                            <span class="text-black-light ">{{tr_num($user->user_code)}}</span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                @if(time() >= $user->expire)
                                    <p class="text-danger font-26 text-bold">اشتراک شما به پایان رسیده</p>
                                @endif

                                <p class="font-16 text-regular text-black">
                                    <span>رشته تحصیلی :</span>
                                    <span class="text-black-light">{{$user->education[0]->field_of_study}}</span>
                                </p>
                                <p class="font-16 text-regular text-black">
                                    <span>مقطع تحصیلی :</span>
                                    <span class="text-black-light">{{$user->education[0]->grade}}</span>
                                </p>
                                <p class="font-16 text-regular text-black">
                                    <span>حوزه های تخصصی :</span>
                                    <span class="text-black-light">{{$user->profile[0]->specialized_basins}}</span>
                                </p>
                                @if($user->isShowMyPhone == 1)
                                    <p class="font-16 text-regular text-black">
                                        <span>موبایل :</span>
                                        <span class="text-black-light">{{$user->mobile}}</span>
                                    </p>
                                @endif
                                <p class="font-16 text-regular text-black">
                                    <span>ایمیل :</span>
                                    <span class="text-black-light">{{$user->email}}</span>
                                </p>

                                @if(File::exists("files/resume/$user->resume_address"))
                                    <p class="font-16 text-regular text-black ">
                                        <a href="{{asset("files/resume/$user->resume_address")}}" class=" text-black">
                                            <i class="fas fa-save"></i>
                                            <span>دانلود رزومه </span>
                                        </a>
                                    </p>
                                @endif

                            </div>
                            <div class="col-md-6 col-lg-4">
                                <!--<div class="row col-6 mb-3 "  >-->
                                <!--<img class="img-fluid" src="http://new.ipma.ir/img/YC1.jpeg" alt="..">-->
                                <!--</div>-->


                                <div class="qr-profile">
                                    {!! (new \SimpleSoftwareIO\QrCode\BaconQrCodeGenerator())->size(250)->generate(route('profile',$user->slug)); !!}
                                </div>
                                <div class="social-profile mt-3">
                                    <a href="{{$user->profile[0]->telegram}}"><img src="{{asset('img/social11.png')}}"
                                                                                   alt="..."></a>
                                    <a href="{{$user->profile[0]->instagram}}"><img src="{{asset('img/social22.png')}}"
                                                                                    alt="..."></a>
                                    <a href="{{$user->profile[0]->facebook}}"><img src="{{asset('img/social33.png')}}"
                                                                                   alt="..."></a>
                                    <a href="{{$user->profile[0]->twitter}}"><img src="{{asset('img/social44.png')}}"
                                                                                  alt="..."></a>
                                    <a href="{{$user->profile[0]->youTube}}"><img src="{{asset('img/social55.png')}}"
                                                                                  alt="..."></a>
                                </div>
                                @if(auth()->id() == $user->id)
                                    <div class="mt-4">
                                        <!-- Button trigger modal -->
                                        <a href="/" class="btn btn-white-border " data-toggle="modal"
                                           data-target="#exampleModalCenter">
                                            ویرایش پروفایل </a>
                                        <!--<a href="/" class="btn btn-yellow-border ">-->
                                        <!--دانلود رزومه-->
                                        <!--</a>-->
                                    </div>
                                @endif

                            </div>

                            <div class="profile-top-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">
                                    <path d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="row align-items-center profile-top pt-4 pb-4 p-3 mb-3">
                            <div class="col-12 ">
                                <p class="font-18  mb-3 mb-lg-0 text-medium text-dark-violet ">افتخارات حضور در انجمن :
                                    <span class="font-16 text-light2 text-black">{{$user->profile[0]->honors}}</span>
                                </p>
                            </div>
                            <div class="col-12 list-diamond align-items-center d-flex flex-wrap">

                                <div class="avatar-group mb-3 mb-lg-0">

                                    @for($i = 0; $i < $user->diamond; $i++)
                                        <a href="#" class="avatar diamond avatar-sm" data-toggle="tooltip"
                                           data-original-title="Jessica Doe">
                                            <img alt="Image placeholder" src="{{asset('img/Diamond.png')}}"
                                                 class="rounded-circle">
                                        </a>
                                    @endfor
                                    <a href="#" class="avatar diamond avatar-text avatar-sm" data-toggle="tooltip"
                                       data-original-title="Jessica Doe">
                                        <span>{{tr_num($user->diamond)}}</span>
                                    </a>
                                </div>
                                <div class="avatar-group ml-3 mb-3 mb-lg-0">
                                    @for($i = 0; $i < $user->gold; $i++)

                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                           data-original-title="Ryan Tompson">
                                            <img alt="Image placeholder" src="{{asset('img/Gold.png')}}"
                                                 class="rounded-circle">
                                        </a>
                                    @endfor

                                    <a href="#" class="avatar diamond avatar-text avatar-sm" data-toggle="tooltip"
                                       data-original-title="Jessica Doe">
                                        <span>{{tr_num($user->gold)}}</span>
                                    </a>
                                </div>
                                <div class="avatar-group ml-3 mb-3 mb-lg-0">

                                    @for($i = 0; $i < $user->silver; $i++)

                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                           data-original-title="Romina Hadid">
                                            <img alt="Image placeholder" src="{{asset('img/Silver.png')}}"
                                                 class="rounded-circle">
                                        </a>
                                    @endfor
                                    <a href="#" class="avatar diamond avatar-text avatar-sm" data-toggle="tooltip"
                                       data-original-title="Jessica Doe">
                                        <span>{{tr_num($user->silver)}}</span>
                                    </a>
                                </div>
                                <div class="avatar-group ml-3 mb-3 mb-lg-0">
                                    @for($i = 0; $i < $user->bronze; $i++)
                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                           data-original-title="Alexander Smith">
                                            <img alt="Image placeholder" src="{{asset('img/Borenze.png')}}"
                                                 class="rounded-circle">
                                        </a>
                                    @endfor
                                    <a href="#" class="avatar diamond avatar-text avatar-sm" data-toggle="tooltip"
                                       data-original-title="Jessica Doe">
                                        <span>{{tr_num($user->bronze)}}</span>
                                    </a>
                                </div>
                                @if((jdate()->getYear() - (int)explode('/',$user->profile[0]->birth_date)[0]) <= 35)
                                    <div class="ml-lg-auto ">
                                        <img alt="YC-Member" src="{{asset('img/YC-Member.png')}}" class="YC-Member">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row align-items-center profile-top p-3 ">
                            <div class="col-12">
                                <h3 class="text-right">
                                    <span>{{$user->profile[0]->certificate}}</span>
                                    <img src="{{asset('img/level-'.substr(explode("“",$user->profile[0]->certificate)[1],0,1).'.jpg')}}"
                                         class="lebel-img" alt="level">
                                </h3>
                            </div>

                        </div>
                    </div>

                    <div class="row align-items-center profile-top p-3 col-12 ml-1">

                        @foreach(explode("?!?",$user->profile[0]->awards) as $val)
                            <div class="col-12">
                                <h3 class="text-right">
                                    <span>{{$val}}</span>
                                    <img src="{{asset('img/award_baje.png')}}"
                                         class="lebel-img" alt="level">
                                </h3>
                            </div>
                        @endforeach

                    </div>
                </div>


                @auth()
                    @if(auth()->id() == $user->id )
                        <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 mb-4 ">

                            <li class="nav-item">
                                <a class="nav-link font-22 text-black-light text-regular show active"
                                   data-toggle="tab" href="#preview">
                                    مدارک و گواهینامه ها
                                    <p class="font-14 text-black-light text-regular m-0 m-md-2">
                                        مورد تایید انجمن مدیریت پروژه ایران
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link font-22 text-black-light text-regular " data-toggle="tab"
                                   href="#pay">
                                    پرداختی ها
                                    <p class="font-14 text-black-light text-regular m-0 m-md-2">تراکنش های مالی شما با
                                        انجمن</p>
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content col-12 last-pack-content ">
                            <div class="tab-pane row show active" id="preview">

                                @endif
                                @endauth
                                <div class="col-12">
                                    <div class="detail-profile mb-4">
                                        @if(auth()->id() != $user->id)
                                            <h2 class=" font-24 text-medium text-black mb-4 text-dark-violet mb-5">
                                                مدارک و گواهینامه های مورد تایید انجمن مدیریت پروژه ایران
                                            </h2>
                                        @endif
                                        {{--sk editor
                                        <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                            <li class="col-12 mb-3 mb-lg-5">
                                                <img src="{{asset('img/Silver.png')}}" class="list-img" alt="level">
                                                <span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span
                                                        class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span
                                                        class="text-dark-violet text-medium">[ از 89 تا 95 ]</span>
                                            </li>
                                        --}}
                                        <div class="col-12">
                                            @if(count($user->passedCourse) != 0)
                                                {!! $user->passedCourse[0]->content !!}
                                            @else
                                                <p>مدارکی یافت نشد</p>
                                            @endif

                                        </div>
                                    </div>

                                </div>

                                @auth()
                                    @if(auth()->id() == $user->id )
                            </div>

                            <div class="tab-pane row " id="pay">

                                <table class="table table-responsive col-12">

                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">عنوان</th>
                                        <th scope="col">مبلع</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">تاریخ</th>
                                        <th scope="col">کد پیگیری بانک</th>
                                        <th scope="col">مشاهده کدها</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->orders as $pay)
                                        <tr class="table-@switch($pay->state_id) @case(0)light @break @case(1)success @break @case(2)danger @break @endswitch ">
                                            <th scope="row">{{($loop->index)+1}}</th>
                                            <td></td>
                                            <td>{{$pay->total_price}} تومان</td>
                                            <td>@switch($pay->state_id) @case(0) منتظر پرداخت@break @case(1) تراکنش
                                                موفق @break @case(2) تراکنش ناموفق @break @endswitch</td>
                                            <td>{{jdate($pay->create_at)}}</td>
                                            <td>{{$pay->reference_id}}</td>
                                            <td>
                                                <button class="btn btn-white-border" data-toggle="modal"
                                                        data-target="#order-code" data-extra="{{$pay->ordercodes}}">
                                                    نمایش
                                                </button>
                                            </td>
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

    <div class="modal fade" id="order-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">موبایل</th>
                            <th scope="col">کد</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-ordersCode">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ویرایش پروفایل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="sidebar-form-body" action="{{route('user.update')}}" method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body form-profile">
                        <div class="row">
                            <div class="input-form col-lg-12">
                                <label for="profile[specialized_basins]">حوضه های تخصصی*</label>
                                <input type="text" id="profile[specialized_basins]" name="profile[specialized_basins]" size="40"
                                       aria-invalid="false"
                                       placeholder="حوضه های تخصصی"
                                       value="{{$user->profile[0]->specialized_basins}}"
                                       required>

                            </div>

                            <div class="input-form col-lg-6 mt-4 mb-3 ">
                                <div class="input-upload ">
                                    <label class="custom-file-label" id="resumeLbl" for="resume">انتخاب عکس پروفایل
                                    </label>
                                    <input type="file" name="profile_pic" class="custom-file-input"
                                           id="profile_pic">

                                </div>
                            </div>

                            <div class="col-lg-6 mt-4 mb-3">
                                <div class="input-upload ">
                                    <label class="custom-file-label" id="resumeLbl" for="resume"> فایل رزومه
                                    </label>
                                    <input type="file" name="resume" class="custom-file-input"
                                           id="resume">

                                </div>
                            </div>

                            <div class="input-form col-lg-11">
                            <p >نقص مدارک: {{$user->shortcomings}}</p>
                            </div>
                            <div class="col-lg-1 py-2">
                                <button type="button" class="btn btn-success"
                                        onclick="addRow('documentDefect')">+
                                </button>
                            </div>


                            <div class="col-md-12" id="documentDefect">

                            </div>


                            <!--<div class="input-form col-md-12">-->
                            <!--<textarea type="text" name="about_me" aria-invalid="false"-->
                            <!--placeholder="درباره من">about me text about me text about me text about me text about me text about me text about me text about me text about me text about me text</textarea>-->

                            <!--</div>-->

                            <div class="input-form col-lg-6">
                                <label for="profile[youTube]">لینک یوتویوپ</label>
                                <input type="text" id="profile[youTube]" name="profile[youTube]" size="40"
                                       aria-invalid="false"
                                       placeholder="لینک یوتویوپ"
                                       value="{{$user->profile[0]->youTube}}"
                                       required>

                            </div>

                            <div class="input-form col-lg-6">
                                <label for="profile[facebook]">لینک فیسبوک</label>
                                <input type="text" id="profile[facebook]" name="profile[facebook]" size="40"
                                       aria-invalid="false"
                                       placeholder="لینک فیسبوک"
                                       value="{{$user->profile[0]->facebook}}"
                                       required>

                            </div>

                            <div class="input-form col-lg-6">
                                <label for="profile[instagram]">لینک اینستاگرام</label>
                                <input type="text" id="profile[instagram]" name="profile[instagram]" size="40"
                                       aria-invalid="false"
                                       placeholder="لینک اینستاگرام"
                                       value="{{$user->profile[0]->instagram}}"
                                       required>

                            </div>

                            <div class="input-form col-lg-6">
                                <label for="profile[telegram]">لینک تلگرام</label>
                                <input type="text" id="profile[telegram]" name="profile[telegram]" size="40"
                                       aria-invalid="false"
                                       placeholder="لینک تلگرام"
                                       value="{{$user->profile[0]->telegram}}"
                                       required>

                            </div>

                            <div class="input-form col-lg-6">
                                <label for="profile[twitter]">لینک تویتر</label>
                                <input type="text" id="profile[twitter]" name="profile[twitter]" size="40"
                                       aria-invalid="false"
                                       placeholder="لینک تویتر"
                                       value="{{$user->profile[0]->twitter}}"
                                       required>

                            </div>

                            <div class="input-form col-lg-6 mt-5">
                                <label for="isShowMyPhone">نمایش شماره موبایل برای همه </label>
                                <input type="checkbox" id="isShowMyPhone" name="isShowMyPhone" size="40"
                                       @if($user->isShowMyPhone) checked @endif
                                        value="1"
                                       />
                            </div>


                            <!--<div class="col-sm-6 col-md-4 col-lg-3 mt-4 center-y">-->
                            <!--<input  value="ذخیره تغییرات" type="submit"-->
                            <!--class="form-submit-violet text-white font-16 text-medium">-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>


                        <button type="submit"
                                class="btn form-submit-violet submin-modal text-white font-16 text-medium">ذخیره تغییرات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script async>
        // Add the following code if you want the name of the file appear on select
        $("#profile_pic").on("input", function () {
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
                "                                    <div class=\"input-form col-md-3\">\n" +
                "<label class=\"custom-file-label\" style='width: 166px;margin-right: 30px;'  >اسناد</label>" +
                "                                        <input type=\"file\" class='custom-file-input'  name=\"files[]\" value=\"\" size=\"40\" aria-invalid=\"false\" placeholder=\"آپلود مدارک\" required>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"input-form col-md-8\">\n" +
                "                                        <input type=\"text\" name=\"files_explain[]\" value=\"\" size=\"40\" aria-invalid=\"false\" placeholder=\"توضیحات مدارک *\" required>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"col-md-1 py-2\">\n" +
                "                                        <button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(" + row_id + ")\">-</button>\n" +
                "                                    </div>\n" +
                "                                </div>";
            $("#" + id).append(new_row);
        }


        function deleteRow(id) {
            $("#" + id).remove();
        }


        $('#order-code').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var orderCodes = button.data('extra');

            var trs = '';
            var i = 0;
            orderCodes.forEach(function (e) {
                i++;
                trs += "<tr>" +
                    "<th scope='row' >" + i + "</th>" +
                    "<td>" + e.name + "</td>" +
                    "<td>" + e.mobile + "</td>" +
                    "<td>" + e.code + "</td>" +
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