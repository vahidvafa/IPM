@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container">
            <div class="profile-main mt-5 mb-5">
                <div class="row pb-3  pb-lg-5">
                    <div class="col-12 mb-3">
                        <h2 class="title-contactus font-24 text-medium text-black  mb-5">
                            <i class="fas fa-map-marker text-yellow"></i>
                            اطلاعات تماس
                        </h2>
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            آدرس انجمن :
                        </h2>
                        <p class="font-16 text-black-light "> تهران، امیرآباد شمالی، بالاتر از بزرگراه جلال آل احمد،
                            پردیس
                            دانشکده های فنی دانشگاه تهران، ساختمان انستیتو مهندسی نفت، طبقه همکف</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            تلفن تماس :
                        </h2>
                        <p class="font-16 text-black-light ">(5خط) 88229406</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            پست الکترونیک آموزش :
                        </h2>
                        <p class="font-16 text-black-light ">edu@ipma.ir</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            پست الکترونیک عضویت :
                        </h2>
                        <p class="font-16 text-black-light ">membership@ipma.ir</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            نمابر انجمن :
                        </h2>
                        <p class="font-16 text-black-light ">89784216</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            پست الکترونیک مرکز صدور گواهینامه :
                        </h2>
                        <p class="font-16 text-black-light ">cb@ipma.ir</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            پست الکترونیک جایزه ملی مدیریت پروژه :
                        </h2>
                        <p class="font-16 text-black-light ">award@ipma.ir</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            پست الکترونیک :
                        </h2>
                        <p class="font-16 text-black-light ">info@ipma.ir</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            پست الکترونیک جایزه پژوهش برتر مدیریت پروژه :
                        </h2>
                        <p class="font-16 text-black-light ">research-award@ipma.ir</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            شماره حساب :
                        </h2>
                        <p class="font-16 text-black-light "> 261655640 به نام انجمن مدیریت پروژه ایران نزد بانک تجارت</p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            شماره کارت :
                        </h2>
                        <p class="font-16 text-black-light ">  6489 0185 8370 5859 به نام انجمن مدیریت پروژه ایران نزد بانک تجارت</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h2 class="title-contactus font-18 text-medium text-black  mb-3">

                            شماره شبا :
                        </h2>
                        <p class="font-16 text-black-light ">IR060180000000000261655640</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-contact pt-5 pb-5  pl-lg-4 pr-lg-4">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-9">
                                    <h3 class="font-20 text-yellow text-light2 mb-4">فرم تماس</h3>
                                    <h2 class="font-24 text-medium text-black  mb-3">ارتباط مستقیم با انجمن
                                    </h2>
                                    <p class="text-black-light font-16">
                                        انجمن در سریعترین زمان پاسخگو ی پیام های شما است !
                                    </p>
                                </div>
                                <div class="col-12 d-none d-lg-block col-lg-3 text-right">
                                    <img src="{{asset('img/send-1.png')}}">
                                </div>
                            </div>
                            <form class="sidebar-form-body row mt-4" action="{{route('message.store')}}" method="post">
                                @csrf
                                <div class="input-form col-md-6 ">
                                    <input type="text" name="name" value="{{old('name')}}" size="40"
                                           aria-invalid="false"
                                           placeholder="نام و نام خانوادگی *" required>
                                    <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                    @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form col-md-6">
                                    <input type="email" name="email" value="{{old('email')}}" size="40"
                                           aria-invalid="false"
                                           placeholder="ایمیل *" required>
                                    <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                    @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form col-md-12">
                                    <textarea rows="4" name="detail" aria-invalid="false"
                                              value="{{old('detail')}}" placeholder="توضیحات *" required>
                                    </textarea>
                                    @error('detail')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <input type="submit" value="ارسال پیغام"
                                           class="form-submit-violet text-white font-16 text-medium">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-contact">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12954.853719944527!2d51.379332384785705!3d35.73326570113224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0728f1286b91%3A0xf8a61ce1468a9dcd!2sKuy-e-Daneshgah%2C%20District%206%2C%20Tehran%2C%20Tehran%20Province%2C%20Iran!5e0!3m2!1sen!2sus!4v1579277414645!5m2!1sen!2sus"
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </main>
@endsection
