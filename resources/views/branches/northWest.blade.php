@extends('master')
@section('header')

@stop

@section('content')

    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
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

                        <div class="card img-top-detail mt-5">
                            <div class="card-body">
                                <h4 class="card-title text-white m-0 text-center">اعضاء هیأت رئیسه شاخه شمالغرب</h4>
                            </div>
                        </div>
                        <p class="text-black-light font-16 font-line-30">
                            اعضای هیات مدیره انجمن مدیریت پروژه ایران شاخه شمالغرب
                            <br>
                            نوبت اول مجمع عمومی و اولین دوره انتخابات هیئت مدیره شاخه شمالغرب انجمن مدیریت پروژه ایران روز پنجشنبه مورخ 11/07/98 در دانشکده اقتصاد و مدیریت دانشگاه تبریز برگزار گردید. و اعضای هیات مدیره شاخه شمالغرب بشرح ذیل برای مدت دو سال انتخاب شدند:
                            <br>
                            آقای دکتر یونس جبارزاده (رئیس هیات مدیره)
                            <br>
                            خانم مهندس لیلا اورندی (دبیر)
                            <br>
                            آقای مهندس ایوب علیون (خزانه دار)
                            <br>
                            بعنوان اعضای اصلی و :
                            <br>
                            آقای مهندس ناصر خوزم
                            <br>
                            آاقای مهندس نادر خانزاده بعنوان اعضای علی البدل
                            <br>
                            بعنوان اعضای علی البدل و
                            <br>
                            آقای مهندس بابک محمدی بعنوان بازرس اصلی و آقای مهندس رضا طیبی بعنوان بازرس علی البدل
                            <br>
                            شایان ذکر است شاخه شمالغرب انجمن مدیریت پروژه ایران به همت جمعی از علاقه مندان و فعالین این حوزه پس از برگزاری اولین جلسه هماهنگی تاسیس شاخه در محل شهرداری در آذر ماه ۹۷ با حضور آقای دکتر سبزوی (ریاست محترم شاخه های استانی انجمن) و آقای مهندس نصراله پور (دبیر انجمن مدیریت پروژه ایران), فعالیت خود را بطور رسمی در بهمن ماه 1397  با انتخاب اعضای هیات موسس در دانشگاه تبریز  آغاز کرد.
                            <br>
                            اعضای هیات موسس:
                            <br>
                            آقای دکتر یونس جبارزاده
                            <br>
                            آقای مهندس ناصر خوزم
                            <br>
                            آقای مهندس ایوب علیون بعنوان اعضای اصلی و:
                            <br>
                            خانم مهندس لیلا اورندی
                            <br>
                            آقای مهندس مهدی اسماعیلی بعنوان اعضای علی البدل

                        </p>



                    </div>
                </div>


                <div class="row mt-5 @if(count($events) == 0)hidden @endif">
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
                    تماس با شاخه شمالغرب
                </h4>
                <p>
                    تبریز، بلوار 29 بهمن، دانشگاه تبریز، ساختمان مرکز رشد و نوآوری، دفتر انجمن مدیریت پروژه شاخه شمالغرب
                    <br>
                    تلفن: 33306044-041</p>

                <a class="btn btn-white-border" href="">لینک به سایت شاخه</a>

            </div>
        </div>
    </main>

@stop