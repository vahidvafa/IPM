@extends('master')
@section('header')

@stop

@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
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
                            نام پروژه: فاز 13 طرح توسعه میدان گازی پارس جنوبی
                            نام شرکت: صنعتی دریایی ایران (صدرا(
                            نوع جایزه: گواهی تعهد به تعالی
                        </p>


                        <div class="row ">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="ceo-out">
                                    <div class="ceo-in">
                                        <div class="ceo-img">
                                            <img class="rounded" src="{{asset('img/awards/1.jpg')}}"
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop