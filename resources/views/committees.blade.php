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


                        <h4 class="card-title text-center  mt-5 mb-3 ">
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


                <div class="card img-top-detail mt-4 mb-3">
                    <div class="card-body">
                        <h4 class="card-title text-white m-0 text-center ">
                            معرفی کمیته جایزه مدیریت پروژه
                        </h4>
                    </div>
                </div>
                <h4 class="card-title">
                    ترکیب و نحوه انتخاب اعضای کمیته جایزه
                </h4>

                <p class="text-black-light font-16 font-line-30">

                    کمیته جایزه در هر دوره هیات مدیره تعیین می شود که شامل 5 نفر است مسوول کمیته موظف است حداکثر تا
                    پانزده روز بعد از انتخاب خود، نفرات پیشنهادی خود برای عضویت در کمیته جایزه و اخذ تایید به حوزه معرفی
                    نماید. حوزه اعضای تایید شده کمیته را بهمراه سوابق شغلی ایشان برای تصویب به هیات مدیره معرفی نماید.
                    اعضای پیشنهادی کمیته باید:
                    <br>
                    • دست کم سه سال سابقه عضویت در انجمن مدیریت پروژه ایران را داشته باشد.
                    <br>
                    • لااقل دارای پنج سال سابقه کار در زمینه مدیریت پروژه باشد.
                    <br>
                    • لااقل یک نفر از آنها (چهار نفر باقیمانده) باید سابقه دست کم یک سال عضویت فعال در ادوار پیشین کمیته
                    را دارا باشد.
                    <br>
                    • چهار نفر باقیمانده نباید همگی از یک صنعت دانشگاه و یا سازمان، شرکت یکسان باشند.
                    <br>
                    • حداقل یک نفر و حداکثر دو نفر از اعضای کمیته می تواند از میان دیگر اعضای دوره جاری هیات مدیره باشد.
                    <br>
                    • حداقل سه نفر از اعضای کمیته دارای سابقه دست کم یک دوره سرارزیاب یا سه دوره ارزیاب ملی (با گواهی
                    معتبر) یا دست کم دو دوره ارزیاب بین المللی (با گواهی معتبر) باشند. دو عضو دیگر می بایست آشنایی کافی
                    با مدل تعالی جایزه داشته باشند.
                    <br>
                    وظایف کمیته
                    <br>
                    کمیته کلیه مسئولیت های کارشناسی و تخصصی فرایند جایزه را بعهده داشته و حداقل بطور ماهیانه به شکل منظم
                    و یا هر زمان دیگر به شکل فوق العاده تشکیل جلسه می دهد و وظایف آن به شرح زیر است :
                    <br>
                    • تعیین خط مشی های کلان اجرایی در مورد فعالیت های اجرایی جایزه
                    <br>
                    • تعیین اعضای متغیر شورای سیاستگذاری جایزه
                    <br>
                    • بررسی برنامه زمانی عملیات اجرایی هر دوره که توسط دبیر خانه تهیه شده و ارایه آن به شورای سیاست
                    گذاری جهت تصویب
                    <br>
                    • رفع مشکلات احتمالی و انجام مساعدت های لازم جهت اجرای هر چه بهتر فرایند جایزه
                    <br>
                    • بررسی اصلاحات ضروری منشور و پیشنهاد تغییرات به هیات مدیره انجمن جهت تصویب
                    <br>
                    • بررسی و تدوین معیارهای ارزیابی اصلی، معیارهای فرعی و امتیازات آنها
                    <br>
                    • بررسی و تدوین حدنصابهای امتیاز هر یک از سطوح سرآمدی
                    <br>
                    • تدوین معیارها و رویه تعیین صلاحیت و انتخاب ارزیابان و ارزیابان ارشد
                    <br>
                    • بررسی و تدوین شرایط و ویژگی های ارزیابان و ارزیابان ارشد
                    <br>
                    • انتخاب نهایی ارزیابان و ارزیابان ارشد بر اساس معیارهای مصوب شورای سیاست گذاری
                    <br>
                    • تدوین معیارها و رویه های اجرایی برای ارزیابی متقاضیان در سطوح مختلف
                    <br>
                    • نظارت بر عملکرد گروه های ارزیابی و ارزیابان ارشد
                    <br>
                    • نظارت بر رعایت و اجرای فرایند ارزیابی پروژه های متقاضی دریافت جایزه
                    <br>
                    • انتخاب هیات داوران برای جمع بندی نظرات تیم های ارزیابی و تایید نهایی احراز سطوح مختلف کیفیت برای
                    متقاضیان
                    <br>
                    • نظارت بر انجام فعالیت ها و هماهنگی های لازم در خصوص همایش پایانی اعطای جایزه
                    <br>
                    • نظارت بر انتشار نشریات مرتبط با جایزه
                    <br>
                    • تعیین صلاحیت مراکز آموزشی برای دوره های آموزشی ویژه ارزیابان
                    <br>
                    • بازنگری معیارهای انتخاب پروژه های برتر پس از هر دوره اعطای جایزه
                    <br>
                    • بررسی شکایات و اعتراضات متقاضیان و رسیدگی به آنها و اعلام نتیجه به شورای سیاستگذاری
                    <br>
                    • ارایه پیشنهادهای لازم به دبیرخانه در مدت اجرای فرایندهای اجرایی جایزه
                    <br>
                    • پیشنهاد برنامه و بودجه سالانه به هیات مدیره جهت تصویب
                    <br>
                    • ارائه گزارش های مرتبط با جایزه به هیات مدیره انجمن
                    <br>
                    کمیته جایزه ملی مدیریت پروژه، مجری کلیه روشها و آئین نامه های جایزه ملی مدیریت پروژه که قبلا به
                    تصویب هیات مدیره انجمن رسیده است بوده و می­تواند در راستای اجرای وظایف خود گروه های کاری خاص تشکیل
                    داده یا افراد خاصی را برای تصدی وظایفی تعریف شده، منصوب نماید.
                </p>
                <h4 class="card-title">
                    اعضای کمیته جایزه مدیریت پروژه
                </h4>

                <div class="row ">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/awards/1.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        مهندس محمد حسین صیقلی
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        رئیس کمیته جایزه
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/awards/2.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        مهندس داود کشاورز
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو کمیته جایزه
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 ">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/awards/3.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        مهندس پریسا ندیری
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو کمیته جایزه
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/awards/4.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        هنگامه سادات خوش چشمی
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو کمیته جایزه
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/awards/5.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        مهندس مجید فراهانی
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو کمیته جایزه
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/awards/6.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        مهندس مهدی ابراهیمی
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو کمیته جایزه
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card img-top-detail mt-4 mb-3">
                    <div class="card-body">
                        <h4 class="card-title text-white m-0 text-center ">
                            معرفی مرکز صدور گواهینامه های مدیریت پروژه
                        </h4>
                    </div>
                </div>
                <p class="card-title">

                    ساختار كلان سازمانی مرکز گواهینامه متشكل از واحدهاي ذیل مي باشد كه در نمودار سازماني زير ترسيم
                    گرديده است: 
                    <br>
                    • هیات مدیره انجمن 
                    <br>
                    • هيات رييسه مرکز گواهینامه
                    <br>
                    • کمیسیون طرح و توسعه 
                    <br>
                    • کمیسیون استيناف
                    <br>
                    • مدیریت گروه B وA 
                    <br>
                    • مدیریت گروه DوC 
                    <br>
                    • مدیریت مالی ـ اداری
                </p>

                <img src="{{asset("img/committees/certification center/img.jpg")}}" class="mb-5" />

                <h4 class="mt-5 mb-3">اعضای مرکز صدور گواهینامه</h4>
                <div class="row ">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/certification center/1.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        دکتر اقبال شاکری
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        رئیس مرکز صدور گواهینامه 

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/certification center/2.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                         دکتر حمید زرگرپور
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو هیات رئیسه
                                        <br>
                                        رئیس کمیته مشاوران 
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 ">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/certification center/3.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                         دکتر محمد مهدی مرتهب
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو هیات رئیسه
                                        <br>
                                        رئیس کمیته دلتا 
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/certification center/4.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                         مهندس غلامحسین خواجه علی
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو هیات رئیسه 
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="ceo-out">
                            <div class="ceo-in">
                                <div class="ceo-img">
                                    <img class="rounded" src="{{asset('img/committees/certification center/5.jpg')}}"
                                         alt="انجمن مدیریت پروژه">
                                </div>
                                <div class="ceo-more-out hidden">
                                    <a href="#" class="ceo-more font-16"><i class="fas fa-address-card"></i>مشاهده
                                        رزومه</a>

                                </div>
                                <div class="ceo-text text-center">
                                    <p class="text-black text-medium font-16 mb-0 mt-3">
                                        مهندس حسینعلی زحمتکش
                                    </p>
                                    <p class="text-yellow font-16 m-0">
                                        عضو هیات رئیسه 
                                        <br>
                                        رئیس کمیته چهار سطحی
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
@endsection
