@extends('master')
@section('header')
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
            <div class="register-main mt-5 mb-5">

                <h2 class=" font-24 text-medium text-black  mb-4">درخواست چه نوع عضویتی دارید؟
                </h2>
                <p class=" text-black-light font-16 mb-5">لطفا نوع عضویت خود را انتخاب نمایید و فرم عضویت مرتبط با آن را پر نمایید</p>

                <!-- Nav pills -->
                <ul class="nav nav-pills row">
                    <li class="nav-item col-12 col-sm-6 col-lg-3">

                        <a class="nav-link active p-4" data-toggle="pill" href="#home">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black"> عضویت حقیقی</span>
                            <p class="font-12 text-black-light m-0 mt-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>


                        </a>

                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
                        <a class="nav-link p-4" data-toggle="pill" href="#menu1">
                            <span class="option-input "></span>
                            <span class=" text-medium text-black">  عضویت حقوقی</span>
                            <p class="font-12 text-black-light m-0 mt-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>

                        </a>
                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0">
                        <a class="nav-link p-4" data-toggle="pill" href="#menu2">
                            <span class="option-input "></span>
                            <span class="text-medium text-black">عضویت دانشجویی</span>
                            <p class="font-12 text-black-light m-0 mt-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>

                        </a>
                    </li>
                    <li class="nav-item  col-12 col-sm-6 col-lg-3  mt-4 mt-lg-0">
                        <a class="nav-link p-4" data-toggle="pill" href="#menu3">
                            <span class="option-input "></span>
                            <span class="text-medium text-black">عضویت دانش آموزی</span>
                            <p class="font-12 text-black-light m-0 mt-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>

                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane  active" id="home">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4">فرم عضویت
                        </h2>
                        <form class="sidebar-form-body row">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="نام و نام خانوادگی*">
                                <img src="img/001-user.png" class="form-icon">

                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="کد ملی*">
                                <img src="img/004-key.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="شماره تماس*">
                                <img src="img/002-telephone.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="text-759" value="" size="40" aria-invalid="false" placeholder="ایمیل*">
                                <img src="img/003-envelope.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-12">
                                    <textarea  rows="4" name="text-760" value="" aria-invalid="false" placeholder="توضیحات*">
                                    </textarea>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <input type="submit" value="عضو شوید" class="form-submit-violet text-white font-16 text-medium">

                            </div>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="menu1">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4">  فرم عضویت 2
                        </h2>
                        <form class="sidebar-form-body row">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="نام و نام خانوادگی*">
                                <img src="img/001-user.png" class="form-icon">

                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="کد ملی*">
                                <img src="img/004-key.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="شماره تماس*">
                                <img src="img/002-telephone.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="text-759" value="" size="40" aria-invalid="false" placeholder="ایمیل*">
                                <img src="img/003-envelope.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-12">
                                    <textarea  rows="4" name="text-760" value="" aria-invalid="false" placeholder="توضیحات*">
                                    </textarea>
                            </div>
                            <div class="col-3">
                                <input type="submit" value="عضو شوید" class="form-submit-violet text-white font-16 text-medium">

                            </div>

                        </form>
                    </div>
                    <div class="tab-pane  fade" id="menu2">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4">فرم عضویت 3
                        </h2>
                        <form class="sidebar-form-body row">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="نام و نام خانوادگی*">
                                <img src="img/001-user.png" class="form-icon">

                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="کد ملی*">
                                <img src="img/004-key.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="شماره تماس*">
                                <img src="img/002-telephone.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="text-759" value="" size="40" aria-invalid="false" placeholder="ایمیل*">
                                <img src="img/003-envelope.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-12">
                                    <textarea  rows="4" name="text-760" value="" aria-invalid="false" placeholder="توضیحات*">
                                    </textarea>
                            </div>
                            <div class="col-3">
                                <input type="submit" value="عضو شوید" class="form-submit-violet text-white font-16 text-medium">

                            </div>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="menu3">
                        <h2 class=" font-22 text-medium text-black mt-5 mb-4">فرم عضویت 4
                        </h2>
                        <form class="sidebar-form-body row">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="نام و نام خانوادگی*">
                                <img src="img/001-user.png" class="form-icon">

                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="کد ملی*">
                                <img src="img/004-key.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="شماره تماس*">
                                <img src="img/002-telephone.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="text-759" value="" size="40" aria-invalid="false" placeholder="ایمیل*">
                                <img src="img/003-envelope.png" class="form-icon">
                            </div>
                            <div class="input-form col-md-12">
                                    <textarea  rows="4" name="text-760" value="" aria-invalid="false" placeholder="توضیحات*">
                                    </textarea>
                            </div>
                            <div class="col-3">
                                <input type="submit" value="عضو شوید" class="form-submit-violet text-white font-16 text-medium">

                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>



    </main>
@endsection
<script src='{{asset('fullcalendar/core/main.js')}}'></script>
<script src='{{asset('fullcalendar/daygrid/main.js')}}'></script>
<script src='{{asset('fullcalendar/bootstrap/main.js')}}'></script>
<script src="{{asset('fullcalendar/interaction/main.js')}}"></script>
<script src="{{asset('fullcalendar/list/main.js')}}"></script>
<script src="{{asset('fullcalendar/moment/main.js')}}"></script>
<script src="{{asset('fullcalendar/timegrid/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales/fa.js"
        integrity="sha256-xMKbF/7LQq6ROtSHcNKZtylu1zhGqEFvefXb7ENciKc=" crossorigin="anonymous"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {

        var initialLocaleCode = 'fa';
        var localeSelectorEl = document.getElementById('locale-selector');
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {


            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ,'bootstrap' ],
            themeSystem: 'bootstrap',
            header: {

                left: 'prevYear,nextYear ,title',
                center: 'dayGridMonth,dayGridWeek,dayGridDay',
                right: 'today prev,next'
            },
            views: {
                dayGridMonth: { // name of view
                    titleFormat: { year: 'numeric', month: '2-digit', day: '2-digit' }
                    // other view-specific options here
                }
            },
            locale: initialLocaleCode,
            businessHours: false,
            defaultView: 'dayGridMonth',
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            DayNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-07-07',
                    end: '2019-07-07',
                    className: 'fc-bg-red',
                    icon : "calendar"

                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-08-08T14:00:00',
                    end: '2019-08-08T20:00:00',
                    className: 'fc-bg-red',
                    icon : "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-07-10T13:00:00',
                    end: '2019-07-10T16:00:00',
                    className: 'fc-bg-yellow',
                    icon : "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-08-12',
                    className: 'fc-bg-green',
                    icon : "calendar"
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-08-13',
                    end: '2019-08-15',
                    className: 'fc-bg-blue',
                    icon : "calendar"
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-08-13',
                    end: '2019-08-14',
                    icon : "calendar",
                    className: 'fc-bg-default'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-09-13',
                    end: '2019-09-14',
                    icon : "calendar",
                    className: 'fc-bg-yellow'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-10-15T09:30:00',
                    end: '2019-10-15T11:45:00',
                    className:  'fc-bg-green',
                    icon : "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-11-15T20:00:00',
                    end: '2019-11-15T22:30:00',
                    className:  'fc-bg-green',
                    icon : "calendar",
                    allDay: false
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        icon : "calendar",
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-08-25',
                    end: '2019-08-25',

                    className: 'fc-bg-blue'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        icon : "calendar",
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },                    start: '2019-12-27',
                    end: '2019-12-27',

                    className: 'fc-bg-default'
                },
                {
                    title: 'عنوان کارگاه آموزشی',
                    extendedProps: {
                        icon : "calendar",
                        description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    },
                    start: '2019-12-29T11:30:00',
                    end: '2019-12-29T012:30:00',
                    className: 'fc-bg-blue',

                    allDay: false
                }
            ],

            eventRender: function(event, element) {
                if(event.event.icon){
                    element.find(".fc-content").prepend("<i class='fa fa-"+event.icon+"'></i>");

                }
                console.log('hhhh')
            },

            eventClick: function(event, jsEvent, view) {



                jQuery('.event-icon').html("<i class='fa fa-"+event.event.icon+"'></i>");
                jQuery('.event-title').html(event.event.title);
                jQuery('.event-body').html(event.event.extendedProps.description);
                jQuery('.eventUrl').attr('href',event.event.url);
                jQuery('#modal-view-event').modal();
            }
        });

        calendar.render();

        // build the locale selector's options
        calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
            var optionEl = document.createElement('option');
            optionEl.value = localeCode;
            optionEl.selected = localeCode == initialLocaleCode;
            optionEl.innerText = localeCode;
            localeSelectorEl.appendChild(optionEl);
        });

        // when the selected option changes, dynamically change the calendar option
        localeSelectorEl.addEventListener('change', function() {
            if (this.value) {
                calendar.setOption('locale', this.value);
            }
        });

    });

</script>
