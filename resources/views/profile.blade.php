@extends('master')
@section('header')
    <title>انجمن مدیریت پروژه</title>

    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="fullcalendar/list/main.css">
    <link href='fullcalendar/bootstrap/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="fullcalendar/timegrid/main.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css'>
    <link rel="stylesheet" href="css/style-calender.css">
@stop
@section('content')
<main id="content-page" role="main">
    <!-- calender main -->
    <div class="container">
        <div class="profile-main mt-5 mb-5">
            <div class="row pb-5">
               <div class="col-12">
                   <div class="row profile-top pt-5 pb-5">
                       <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                           <div class="row justify-content-center">
                               <div class="profile-top-image col-12 col-sm-8 col-md-6 col-lg-12 ">
                                   <img class="img-fluid" src="{{asset('img/nasrollahpour.jpg')}}" alt="">
                                   <div class="profile-top-icons">
                                       <p class="text-white font-18 text-medium m-0">
                                           <span>کد عضویت :</span>
                                           <span>{{$user->user_code}}</span>
                                       </p>

                                   </div>
                               </div>
                           </div>

                       </div>
                       <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                           <h2 class="popular-pack-in-info-title font-22 text-medium text-black mb-3 ">
                               {{$user->name}}
                          </h2>
                           <p class="font-16 text-regular text-black">
                               @if()
                               <span>سن :</span>
                               <span class="text-black-light">۲۵ سال</span>
                           </p>
                           <p class="font-16 text-regular text-black">
                               <span>سابقه :</span>
                               <span class="text-black-light">تولید متن تصادفی</span>
                           </p>
                           <p class="font-16 text-regular text-black">
                               <span>مدرک تحصیلی :</span>
                               <span class="text-black-light">تولید متن تصادفی</span>
                           </p>
                           <p class="font-16 text-regular text-black">
                               <span>متن تصادفی :</span>
                               <span class="text-black-light">تولید متن تصادفی</span>
                           </p>
                           <p class="font-16 text-regular text-black">
                               <span>متن تصادفی :</span>
                               <span class="text-black-light">تولید متن تصادفی</span>
                           </p>
                          <div class="social-profile mt-3">
                              <a href="/"><img src="{{asset('imgsocial11.png')}}" alt="..."></a>
                              <a href="/"><img src="{{asset('imgsocial22.png')}}" alt="..."></a>
                              <a href="/"><img src="{{asset('imgsocial33.png')}}" alt="..."></a>
                              <a href="/"><img src="{{asset('imgsocial44.png')}}" alt="..."></a>
                              <a href="/"><img src="{{asset('imgsocial55.png')}}" alt="..."></a>
                          </div>

                       </div>
                       <div class="col-md-6 col-lg-4">
                          <div class="qr-profile">
                              <img class="img-fluid" src="{{asset('imggoogleQRcodes.png')}}" alt="..">
                          </div>
                       </div>
                       <div class="profile-top-svg">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">
                           <path d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>
                       </svg>
                       </div>
                   </div>
               </div>
                <div class="col-12">
                    <div class="detail-profile">
                        <h2 class=" font-24 text-medium text-black  mb-4">مدارک و دوره های گذرانده شده
                        </h2>
                        <p class=" text-black-light font-16 mb-4">
                            تمامی دوره های گذرانده مورد تایید مدیریت پروژه ایران می باشد
                        </p>
                        <h2 class=" font-20 text-medium text-black  mb-4">گواهی نامه ها :
                        </h2>
                        <ul class="list-profile">
                            <li><p class="font-16"><span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class="text-dark-violet text-medium">[ از 89 تا 95 ]</span></p></li>
                            <li><p class="font-16"><span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class="text-dark-violet text-medium">[ از 89 تا 95 ]</span></p></li>
                            <li><p class="font-16"><span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class="text-dark-violet text-medium">[ از 89 تا 95 ]</span></p></li>

                        </ul>
                        <h2 class=" font-20 text-medium text-black mt-4  mb-4">دوره های آموزشی :
                        </h2>
                        <ul class="list-profile">
                            <li><p class="font-16"><span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class="text-dark-violet text-medium">[ از 89 تا 95 ]</span></p></li>
                            <li><p class="font-16"><span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class="text-dark-violet text-medium">[ از 89 تا 95 ]</span></p></li>
                            <li><p class="font-16"><span class="text-black text-medium">عنوان دوره گذرانده شده : </span><span class="text-black-light">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class="text-dark-violet text-medium">[ از 89 تا 95 ]</span></p></li>

                        </ul>
                    </div>

                    <div class="form-profile">
                        <h2 class=" font-24 text-medium text-black  mb-4 mt-5">اطلاعات تکمیلی
                        </h2>
                        <form class="sidebar-form-body row">
                            <div class="input-form col-md-6 ">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="موبایل*">
                                <img src="{{asset('img002-telephone.png')}}" class="form-icon">

                            </div>
                            <div class="input-form col-md-6">
                                <input type="email" name="text-759" value="" size="40" aria-invalid="false" placeholder="ایمیل*">
                                <img src="{{asset('img003-envelope.png')}}" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="سابقه کار*">
                                <img src="{{asset('img001-user.png')}}" class="form-icon">
                            </div>
                            <div class="input-form col-md-6">
                                <input type="text" name="text-759" value="" size="40" aria-invalid="false" placeholder="صنعت قالب*">
                                <img src="{{asset('imgengineer.png')}}" class="form-icon">
                            </div>
                            <div class="col-12">
                                <div class="input-upload ">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                                <input type="submit" value="ذخیره تغییرات" class="form-submit-violet text-white font-16 text-medium">

                            </div>

                        </form>
                    </div>


                </div>
            </div>




                </div>

    </div>



</main>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@stop