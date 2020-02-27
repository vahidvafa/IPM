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
    <div class="container-fluid">
        <div class="calender-main">
            <div class="pt-5  p-lg-5 pb-0">
                <div class="row justify-content-center">
                    <h3 class="font-20 text-yellow text-light2 text-center col-12 mb-3">رویدادها</h3>
                    <h2 class="text-center font-24 text-medium text-black col-12 mb-4">آخرین رویدادها
                    </h2>
                    <p class="col-12 col-md-10 text-center text-black-light font-16 mb-5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.  </p>

                </div>
                <div class="card mt-2 mt-lg-5">
                    <div class="card-body p-0">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-calender ">
        <div class="container-fluid">
            <div class="row pr-lg-5 pl-lg-5 pb-5 pt-3 pt-lg-0 ">
                <div class="circle-red text-regular mb-3 mb-xl-0 col-12 col-sm-6 col-md-4 col-lg-3 col-xl">کارگاه های آموزشی <span>(1)</span></div>
                <div class="circle-violet text-regular mb-3 mb-xl-0 col-12 col-sm-6 col-md-4  col-lg-3 col-xl">رویداد های آموزشی <span>(5)</span></div>
                <div class="circle-yellow text-regular mb-3 mb-xl-0 col-12 col-sm-6 col-md-4 col-lg-3 col-xl">رویداد های جایزه <span>(12)</span></div>
                <div class="circle-green text-regular mb-3 mb-xl-0 col-12 col-sm-6 col-md-4 col-lg-3 col-xl">رویداد های پژوهشی <span>(1)</span></div>
                <div class="circle-blue text-regular mb-3 mb-xl-0 col-12 col-sm-6 col-md-4 col-lg-3 col-xl">کارگاه های گواهینامه <span>(6)</span></div>
            </div>
        </div>
        <div class="col-12 text-center mb-5 mb-lg-5 pb-3 pb-lg-5 pt-0 pt-lg-3">
            <a class="btn text-center  btn-in-calender" href="{{route('events')}}">لیست تمام رویداد ها</a>
        </div>
    </div>

    <!-- calendar modal -->
    <div id="modal-view-event" class="modal modal-top fade calendar-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title mb-3"><span class="event-title"></span></h4>
                    <div class="event-body"></div>

                </div>
                <div class="modal-footer">
                    <a {{--href="{{route('event',[1])}}"--}} id="url" class="btn btn-primary btn-violet-calender">بیشتر بدانید</a>
                    {{--<button type="button" class="btn btn-primary btn-yellow-calender" data-dismiss="modal">ثبت نام</button>--}}
                </div>
            </div>
        </div>
    </div>
</main>

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

        $.post("{{route('event.list')}}",
            {
                '_token': $('meta[name=csrf-token]').attr('content'),

            },
            function (res) {

                var events = [];
                if (res != ""){
                    var i=-1;
                    res.forEach(function (e) {
                        var start=new Date(parseInt(e.from_date)*1000);
                        var end=new Date(parseInt(e.to_date)*1000);
                        events.push({
                            'title':e.title,
                            "start":start.getFullYear()+"-"+(start.getMonth()<=9?"0"+start.getMonth():start.getMonth())+"-"+(start.getDay()<=9?"0"+start.getDay():start.getDay()),
                            "end":end.getFullYear()+"-"+(end.getMonth()<=9?"0"+end.getMonth():end.getMonth())+"-"+(end.getDay()<=9?"0"+end.getDay():end.getDay())+"T"+(end.getHours()<=9?"0"+end.getHours():end.getHours())+":"+(end.getMinutes()<=9?"0"+end.getMinutes():end.getMinutes())+":"+(end.getSeconds()<=9?"0"+end.getSeconds():end.getSeconds()),
                            "className": 'fc-bg-red',
                            "icon": "calendar",
                            "extendedProps":{"description":e.description},
                            "id":"{{url("/")}}/event/"+e.id,
                        })

                    });
                }
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
            events: events,

            eventRender: function(event, element) {
                if(event.event.icon){
                    element.find(".fc-content").prepend("<i class='fa fa-"+event.icon+"'></i>");

                }

            },

            eventClick: function(event, jsEvent, view) {
                jQuery('.event-icon').html("<i class='fa fa-"+event.event.icon+"'></i>");
                jQuery('.event-title').html(event.event.title);
                jQuery('.event-body').html(event.event.extendedProps.description);
                jQuery('#url').attr('href',event.event.id);
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

            }
        );
    });

</script>

    @stop
