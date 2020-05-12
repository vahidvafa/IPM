@extends('master')
@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        {{--<h1 class="font-23 text-yellow text-center text-light2 mb-4">معرفی شاخه ها </h1>--}}
                        <div class="card img-top-detail mt-4 mb-3">
                            <div class="card-body">
                                <h4 class="card-title text-white m-0 text-center ">
                                    معرفی کمیته پژوهش
                                </h4>
                            </div>
                        </div>

                        <p class="text-black-light font-16 font-line-30">
                            کمیته جایزه پژوهش برتر مدیریت پروژه ایران ضمن عهده دار بودن کلیه مسئولیت های کارشناسی و
                            تخصصی فرآیند جایزه، مجری کلیه روشها و آئین نامه های جایزه پژوهش برتر مدیریت پروژه بوده و می
                            تواند در راستای اجرای وظایف خود، با اخذ مصوبه هیات مدیره انجمن مدیریت پروژه ایران، گروه های
                            کاری خاص تشکیل داده یا افراد خاصی را برای تصدی وظایفی تعریف شده، منصوب نماید. این کمیته جهت
                            انجام امور اجرایی از ظرفیت های موجود در دبیرخانه انجمن استفاده می نماید.
                            <br>
                            کمیته جایزه پژوهش برتر متشکل از ۵ عضو دارای تحصیلات عالیه (کارشناسی ارشد و دکترا) در رشته
                            های مرتبط با مدیریت پروژه همراه با سوابق پژوهشی در این حوزه می باشد که برای یک دوره جایزه و
                            به صورت ذیل انتخاب می شوند. ریاست این کمیته از افراد هیات علمی دانشگاه در زمینه مدیریت پروژه
                            و رشته های مرتبط، ترجیحا از بین اعضای هیأت مدیره انجمن و با تصویب هیأت مدیره انتخاب می گردد.
                            ۴ عضو دیگر کمیته توسط رییس کمیته جایزه پیشنهاد و با تصویب هیات مدیره انتخاب می گردند، ترکیب
                            ۵ نفره کمیته جایزه به گونه ای می باشد که در هر دوره ۳ نفر از آنها ترجیحا از اعضای هیأت علمی
                            دانشگاهها و ۲ نفر از پژوهشگران صنعتی باشد.
                            <br>
                            وظایف این کمیته عبارت اند از:
                            <br>
                            • تهیه تقویم اجرایی جایزه (برنامه زمان بندی)
                            <br>
                            • بازنگری منشور و پیشنهاد اصلاحات به هیأت مدیره انجمن جهت اخذ مصوبه
                            <br>
                            • طراحی و تنظیم فرم ها و دستورالعمل های اجرایی موردنیاز فرآیند جایزه مطابق با منشور مصوب
                            هیات مدیره
                            <br>
                            • تصویب فراخوان و رویه های اجرایی فرایند جایزه
                            <br>
                            • تهیه و نظارت بر اجرای رویه های اجرایی جایزه پژوهش برتر شامل فراخوان، ثبت نام، دریافت
                            مستندات و مدارک داوری، انتخاب کاندیداهای اخذ جایزه پژوهش برتر، انتخاب برگزیدگان نهایی و ...
                            <br>
                            • انتخاب کمیته علمی
                            <br>
                            • نظارت بر حسن انجام کار کمیته علمی
                            <br>
                            • پیشنهاد هیات داوران متناسب با تعداد پژوهش های متقاضی شرکت در جایزه و اخذ تاییدیه هیات
                            مدیره انجمن
                            <br>
                            • نظارت بر عملکرد هیات داوران
                            <br>
                            • نظارت بر انجام فعالیت ها و هماهنگی های لازم در خصوص مراسم اعطای جایزه
                            <br>
                            • نظارت بر انتشار نشریات و تبلیغات مرتبط با جایزه
                            <br>
                            • بررسی و ثبت گزارش درس آموخته های برگزاری هر دوره از جایزه پژوهش برتر و انجام اصلاحات در
                            منشور، فرآیند، رویه ها و دستور العمل های اجرایی جایزه
                            <br>
                            • بررسی و رسیدگی به شکایات و اعلام نتیجه به هیأت مدیره متناسب با رویه مصوب
                            <br>
                            • ارائه پیشنهادهای لازم به دبیرخانه در مدت اجرای فرایندهای اجرایی جایزه
                            <br>
                            • پیشنهاد برنامه و بودجه سالانه به انجمن مدیریت پروژه جهت طرح و تصویب در هیأت مدیره انجمن
                            <br>
                            • ارائه گزارشهای مرتبط با جایزه به هیأت مدیره انجمن
                            <br>
                            • پیشنهاد طرح نهایی و بودجه تهیه جوایز (تندیسهاء تقدیرنامه ها و گواهی نامه) به هیات مدیره و
                            اخذ تائیدیه
                        </p>


                        <h4 class="card-title text-white m-0 text-center ">
                            اعضای کمیته پژوهش
                        </h4>

                        <div class="row ">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/researchers/1.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                دکتر آرنوش شاکری
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                رئیس کمیته پژوهش
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/researchers/2.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                دکتر سید حسین حسینی نورزاد</p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته پژوهش
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 ">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/researchers/3.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                دکتر شهرام قبادی</p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته پژوهش
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/researchers/4.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                دکتر امیر فرجی
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته پژوهش
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/committees/researchers/5.jpg')}}"
                                                 alt="انجمن مدیریت پروژه">
                                        </div>
                                        <div class="ceo-more-out hidden">
                                            <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                                رزومه</a>

                                        </div>
                                        <div class="ceo-text text-center">
                                            <p class="text-black text-medium font-16 mb-0 mt-3">
                                                دکتر امیر حسین خامنه
                                            </p>
                                            <p class="text-yellow font-16 m-0">
                                                عضو کمیته پژوهش
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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

            </div>
        </div>
    </main>
@endsection
