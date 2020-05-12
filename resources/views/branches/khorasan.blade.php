@extends('master')
@section('header')

@stop

@section('content')


    <main id="content-page" role="main">
        <div class="history-about  pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">

                        <h4 class="card-title v-purple text-white text-center mt-5 mb-3">
                            تاریخچه و موسسین
                        </h4>

                        <p>متن ساختگی <br>
                            متن ساختگی<br>
                            متن ساختگی
                        </p>

                        <h4 class="card-title v-purple text-white text-center mt-5 mb-3">
                            معرفی شاخه
                        </h4>


                        <p>متن ساختگی <br>
                            متن ساختگی<br>
                            متن ساختگی
                        </p>

                        <h4 class="card-title v-purple text-white text-center mt-5 mb-3">
                            اعضاء هیأت رئیسه
                        </h4>

                        <div class="row ">
                            <p class="text-black-light font-16 font-line-30">
                                مجوز راه­ اندازي اولين نمایندگی (شاخۀ) انجمن مديريت پروژه ايران در خراسان بزرگ توسط هيأت مديره انجمن صادرشد. اسامي هيأت مؤسس شاخه خراسان بزرگ به شرح ذيل مي باشد: (به ترتيب حروف الفبا)
                                آقايان دکتر حسين انصاري، مهندس مهران اميري، مهندس مجيد بردبار، مهندس آرش داور پناه، دکتر سيد مهدي درهمي، مهندس سيد مهرداد رئيس زاده، مهندس فرهاد شريف، مهندس علي کيوانلو شهرستانکي، مهندس عليرضا منصوريان.
                                <br>
                                طبق آيين نامه انجمن، اين هيأت موسس انتخابات داخلي مسئولين را برگزار و به اتفاق آرا از میان خود مسئوليت­ها را به شرح ذیل تقسیم نمودند:
                                <br>
                                آقای دکتر درهمی به عنوان رئیس هیأت موسس
                                <br>
                                آقای دکتر انصاری به عنوان نایب رئیس هیأت موسس
                                <br>
                                آقای مهندس رئیس زاده به عنوان دبیر هیأت موسس
                                <br>
                                آقای مهندس بردبار به عنوان خزانه دار هیأت موسس
                                <br>
                                هيأت مديره انجمن اين مجوز را در شرايطي صادر کرد که هیأت موسس بایستی پس از افزايش تعداد اعضاي حقيقي و حقوقي انجمن در منطقه فوق، اقدام به برگزاري اولين مجمع عمومي و انتخاب هیأت مدیره از میان اعضاء اصلی خود نمايد.
                            </p>
                            {{--<div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/profile/profile-default.png')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                نام
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                سمت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>--}}
                        </div>


                    </div>
                </div>

                <div class="row  @if(count($events) == 0)hidden @endif">
                    <div class="v-purple col-12 mt-5 mb-5 row">
                        <h2 class="text-white font-24 text-medium col-10 ">رویداد های مرتبط با کمیته</h2>
                        <a href="{{route('events')}}" class="btn btn-white-border col-1">مشاهده تمامی رویداد</a>
                    </div>
                    @foreach($events as $event)
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card card-news">
                                <div class="card-news-img">
                                    <img src="{{asset('img/posts/'.$event->photo)}}" class=""
                                         style="width: 100% !important;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-14 text-black">
                                        <span>[</span>{{\Morilog\Jalali\Jalalian::forge($event->created_at)->format('%A, %d %B %y')}}
                                        <span>]</span>
                                    </h5>
                                    <p class="card-text font-14">{{$event->title}}</p>
                                    <a href="{{route('news.show',[$event->id])}}"
                                       class="btn btn-news text-yellow text-medium">ادامه مطلب</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h4 class="card-title v-purple text-white text-center mt-5 mb-3">
                    آدرس شاخه
                </h4>

                <p>
                    آدرس:تهران، امیرآباد شمالی، بالاتر از بزرگراه جلال آل احمد، پردیس دانشکده های فنی دانشگاه تهران، ساختمان انستیتو مهندسی نفت، طبقه همکف / کدپستی: 1439956191

                </p>

                <a class="btn btn-white-border" href="">لینک به سایت شاخه</a>

            </div>
        </div>
    </main>

@stop