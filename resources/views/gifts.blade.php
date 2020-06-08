@extends('master')
@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container font-16">
                <div class="row">
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto">
                        <a href="{{route('giftIntro')}}" class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">معرفی
                            جایزه ملی مدیریت پروژه</a><br>
                    </div>
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto">
                        <a href="{{route('giftPicture',['giftchart',1])}}"
                           class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">سطوح مختلف جایزه ملی مدیریت
                            پروژه</a><br>
                    </div>
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto">
                        <a href="{{route('giftPicture',['giftmodel',2])}}"
                           class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">معرفی مدل جایزه ملی مدیریت پروژه
                            (مبنای PEM)</a><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto">
                        <a href="{{route('giftPicture',['gift99',3])}}"
                           class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">برنامه زمانبندی دوره نهم جایزه ملی
                            مدیریت پروژه</a><br>

                    </div>
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto">
                        <a href="{{asset('files/tgh.pdf')}}" class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">تقاضا
                            نامه جایزه ملی مدیریت پروژه</a><br>

                    </div>
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto">
                        <a href="{{asset('files/brochure.pdf')}}"
                           class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">بروشور جایزه ملی مدیریت
                            پروژه</a><br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xs-12 text-center mr-auto ml-auto" >
                        <a href="{{route('winners')}}" class="btn text-center last-pack-calender-btn mt-5 px-2 w-100">سر
                            ارزیابان و ارزیابان ادوار مختلف جایزه</a><br>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
