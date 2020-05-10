@extends('master')
@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        {{--<h1 class="font-23 text-yellow text-center text-light2 mb-4">معرفی شاخه ها </h1>--}}

                        <div class="card img-top-detail mb-3">
                            <div class="card-body">
                                <h4 class="card-title text-white m-0 text-center ">
                                    معرفی کمیته عضویت
                                </h4>
                            </div>
                        </div>

                        <p class="text-black-light font-16 font-line-30">
                            ایرانیان دوستدار و دلبستۀ پروژه و مدیریت پروژه، اعضا بالقوه انجمن مدیریت پروژه ایران بوده و
                            می‌توانند با عضویت در این انجمن، علاوه بر مشارکت در بالندگی و ترویج مدیریت علمی پروژه­های
                            کشور، که بی شک موجب رشد و شکوفایی صنعتی و اقتصادی ایران عزیزمان خواهد شد، از مزایای عضویت
                            شامل شرکت در گردهمآیی­های علمی و حرفه‌ای، تسهیل دریافت گواهی نامه­های حرفه­ای، دسترسی به
                            آخرین اخبار علمی-حرفه­ای و کتب و انتشارات مرتبط و عضویت در انجمن بین­المللی مدیریت پروژه
                            (IPMA) به واسطه نماینده رسمی آن و بهره‌مندی از مزایای این عضویت برخوردار شوند.
                            <br>
                            کمیته عضویت انجمن در راستای تحقق هدف عالیه انجمن در زمینه جذب، نگهداشت و پایش اعضاء حقیقی و
                            حقوقی و دانشجوئی فعالیت می­کند.
                        </p>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/1.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس فرهاد نصراله پور
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                رئیس کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/2.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس ناصر اقتصادی
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/3.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس سید وحید حسینی
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/4.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس لیلا آموزگار
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/5.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس فروزنده طبیبی
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/6.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس مهدی ولایتی
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/register/7.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                مهندس محمد معهود
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته عضویت
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row mt-5 @if(count($events) == 0)hidden @endif">
                    <h2 class="font-24 text-medium text-black col-10 mt-5 mb-5">رویداد های مرتبط با کمیته</h2>
                    <a href="{{route('events')}}" class="btn btn-white-border col-1 mt-5">مشاهده تمامی رویداد</a>


                    @foreach($events as $event)
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
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

            </div>
        </div>
    </main>
@endsection
