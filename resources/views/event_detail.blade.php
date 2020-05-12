@extends('master')

@section('content')
<main id="content-page" role="main">
    <!-- calender main -->
    <div class="container">
        <div class="detail-main mt-5 mb-5">
            <div class="row">
                <div class="col-lg-9">

                    <div class="text-detail mt-4">
                        <h2 class=" font-24 text-medium text-black  mb-4">توضیحات دوره
                        </h2>
                        {{--<p class=" text-black-light font-16 "></p>--}}
                        <p class=" text-black-light font-16 ">{!!$event->description !!}</p>

                    </div>
                    <div class="list-detail mt-4">
                        <h2 class=" font-24 text-medium text-black  mb-4">سر فصل های دوره
                        </h2>
                        <p>
                            {!! $event->course_headings !!}
                        </p>
                        {{--<ul class="list-detail-in">
                            <li class="text-black-light mb-2">فصل اول: کار با صفحات گسترده</li>
                            <li class="text-black-light mb-2">آشنایی با نرم افزار EXCEL 2016</li>
                            <li class="text-black-light mb-2">معرفی نرم افزار EXCEL</li>
                            <li class="text-black-light mb-2">بازکردن برنامه وایجاد فایل</li>
                            <li class="text-black-light mb-2">آشنایی با محیط کاریEXCEL </li>
                            <li class="text-black-light mb-2">بستن فایل</li>
                            <li class="text-black-light mb-2">مفاهیم اصل</li>
                            <li class="text-black-light mb-2">انتخاب ها</li>
                            <li class="text-black-light mb-2">حذف و اضافه کردن سطرها و ستون ها</li>
                            <li class="text-black-light mb-2">تغییر عرض ستون ها وارتفاع سطرها</li>
                            <li class="text-black-light mb-2">مخفی کردن ستون و ردیف </li>
                            <li class="text-black-light mb-2">ثابت کردن ستون و ردیف</li>
                            <li class="text-black-light mb-2">انتقال مکان نما به کمک کلیدهای میانبر</li>
                            <li class="text-black-light mb-2">تغییر جهت کلید Enter</li>
                            <li class="text-black-light mb-2">مخفی کردن عنوان ستون ها،شماره سطرها و خطوط سلول ها</li>

                        </ul>--}}
                    </div>
                    <div class="address-detail mt-4">
                        <h2 class=" font-24 text-medium text-black  mb-4">اطلاعات برگزاری
                        </h2>
                        <p class=" text-black-light font-16 ">
                            آدرس: {{$event->address}}
                        </p>
                        <p class=" text-black-light font-16 ">
                            تلفن: {{$event->tel}}
                        </p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1020.2035107695417!2d{{$event->longitude}}!3d{{$event->latitude}}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0728f1286b91%3A0xf8a61ce1468a9dcd!2sKuy-e-Daneshgah%2C%20District%206%2C%20Tehran%2C%20Tehran%20Province%2C%20Iran!5e0!3m2!1sen!2s!4v1578650567409!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="bar-detail pt-4 pb-4 pr-3 pl-3">
                        <img class="card-img-top" src="{{asset("img/events/$event->photo")}}" alt="Card image"style="margin-bottom: 20px" >
                        <h2 class="title-bar-detail text-white font-18 text-medium mb-4">زمانبندی دوره</h2>

                        <ul class="list-detail-in">
                            {{--$table->string('from_date');
            $table->string('to_date');
            $table->string('start_register_date');--}}
                            <li><span class="text-black pr-1 text-regular "  >شروع ثبت نام : </span><span dir="ltr" class="text-red">{{tr_num(jdate($event->start_register_date))}}</span></li>
                            <li><span class="text-black pr-1 text-regular" style="margin-top: -20px;margin-bottom: -20px" > شروع دوره : </span><span dir="ltr" class="text-black-light">{{tr_num(jdate($event->from_date))}}</span></li>
                            <li ><span class="text-black pr-1 text-regular">مدت دوره: </span><span  class="text-black-light">
                                    {{DateDifference(str_replace("-","/",explode(" ",jdate($event->to_date))[0]),str_replace("-","/",explode(" ",jdate($event->from_date))[0]),true)}}</span></li>

                        </ul>
                        <h2 class="title-bar-detail text-white font-18 text-medium mb-4">اطلاعات ثبت نام</h2>

                        <ul class="list-detail-in">
                            <li ><span class="text-black pr-1 text-regular">مخاطبین  : </span><span class="text-black-light">متن تصادفی</span></li>
                            <li ><span class="text-black pr-1 text-regular">مدرس : </span><span class="text-black-light">متن تصادفی</span></li>
                            <li ><span class="text-black pr-1 text-regular">سرمایه گذاری : </span><span class="text-black-light">{{tr_num(number_format($event->price))}} ریال </span></li>
                        </ul>
                        @if(auth()->check())
                        @if(time() >= $event->start_register_date && time() <= $event->to_date)
                            <a href="{{route('event.reserve',[$event->id])}}" class="btn btn-bar-detail mt-3 mb-4">ثبت نام</a>
                            @else
                            <a href="#" class="btn btn-bar-detail mt-3 mb-4 btn-info">اتمام مهلت ثبت نام</a>
                        @endif
                            @else
                            <a href="/res" class="btn btn-bar-detail mt-3 mb-4 btn-info" data-toggle="modal" data-target="#ModalLogin" >ورود</a>
                        @endif

                    </div>
                    <div class="bar-detail pt-4 pb-4 pr-3 pl-3 mt-4">
                        <h2 class="title-bar-detail text-white font-18 text-medium mb-4">دوره های مرتبط</h2>
                        @foreach($similars as $similar)
                        <div class="Related-post row mb-4 pr-3 pr-lg-0 pl-3 pl-lg-0">
                            <div class="col-12 col-sm-3 col-md-2 col-lg-5 col-xl-4">
                                <div class="Related-post-img ">
                                     <img class="rounded" src="{{asset("img/events/$similar->photo")}}" alt="">
                                </div>
                            </div>
                            <div class="Related-post-titles pl-0 col-12 col-sm-9 col-md-10 col-lg-7 col-xl-8 mt-2 mt-sm-0">
                                <h4 class="Related-post-title font-14 text-medium text-black mb-2 ">
                                    <a class="text-black hover-text-black" href="{{route('event',[$similar->id])}}" >
                                        {{$similar->title}}
                                </a></h4>
                                <div class="Related-post-title-sub text-yellow font-14 text-light2 mb-0">
                                    {{jdate($similar->from_date)}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

                </div>
    </div>

</main>
@endsection
