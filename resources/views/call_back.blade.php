@extends('master')
@section('content')
    <div class="container">
        <div class="row profile-top py-5 my-5" style="height: 370px">
            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                <div class="row justify-content-center">
                    <div class="profile-top-image col-12 col-sm-8 col-md-6 col-lg-12 ">
                        <img class="img-fluid" style="width: 100px;height: 100px;" src="{{($status) ? asset('img/tick.png') : asset('img/close.png') }}" alt="">
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <div class="row">
                    <div class="col-12 py-3">
                        <h4 class="{{($status) ? 'text-success' : 'text-danger'}}">
                            {{ ($status) ? __('string.successful.pay') : __('string.unsuccessful.pay') }}
                        </h4>
                    </div>
                    <div class="col-12 py-3">
                        <h5>
                            کد رهگیری : {{ tr_num(12311521,'fa') }}
                        </h5>
                    </div>
                    <div class="col-12 py-3">
                        <h5>
                            تاریخ و زمان
                        </h5>
                    </div>
                </div>
            </div>
            <div class="profile-top-svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">
                    <path d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>
                </svg>
            </div>
        </div>
    </div>
@endsection
{{--<div class="row profile-top pt-5 pb-5">--}}
{{--    <div class="col-12 col-lg-4 mb-5 mb-lg-0">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="profile-top-image col-12 col-sm-8 col-md-6 col-lg-12 ">--}}
{{--                <img class="img-fluid" src="{{asset('img/nasrollahpour.jpg')}}" alt="">--}}
{{--                <div class="profile-top-icons">--}}
{{--                    <p class="text-white font-18 text-medium m-0">--}}
{{--                        <span>کد عضویت :</span>--}}
{{--                        <span>{{$user->user_code}}</span>--}}
{{--                    </p>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="col-md-6 col-lg-4 mb-4 mb-md-0">--}}
{{--        <p class="font-16 text-regular text-black">--}}
{{--            <span>سابقه :</span>--}}
{{--            <br>--}}
{{--            @foreach($user->workExperience as $word_experience)--}}
{{--                <span class="text-black-light">{{$word_experience->company_name}} ({{substr($word_experience->from_date,0,4)}} تا {{substr($word_experience->to_date,0,4)}})</span>--}}
{{--                <br>--}}
{{--            @endforeach--}}
{{--        </p>--}}
{{--        <p class="font-16 text-regular text-black">--}}
{{--            <span>مدرک تحصیلی :</span><br>--}}
{{--            @foreach($user->education as $education)--}}
{{--                <span class="text-black-light">دانشگاه: {{$education->education_place}}, معدل: {{$education->gpa}}</span>--}}
{{--                <br>--}}
{{--            @endforeach--}}
{{--        </p>--}}
{{--        <p class="font-16 text-regular text-black">--}}
{{--            <span>درباره من :</span>--}}
{{--            <span class="text-black-light">{{$user->about_me}}</span>--}}
{{--        </p>--}}
{{--        <div class="social-profile mt-3">--}}
{{--            <a href="/"><img src="{{asset('img/social11.png')}}" alt="..."></a>--}}
{{--            <a href="/"><img src="{{asset('img/social22.png')}}" alt="..."></a>--}}
{{--            <a href="/"><img src="{{asset('img/social33.png')}}" alt="..."></a>--}}
{{--            <a href="/"><img src="{{asset('img/social44.png')}}" alt="..."></a>--}}
{{--            <a href="/"><img src="{{asset('img/social55.png')}}" alt="..."></a>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="col-md-6 col-lg-4">--}}
{{--        <div class="qr-profile">--}}
{{--            <img class="img-fluid" src="{{asset('img/googleQRcodes.png')}}" alt="..">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="profile-top-svg">--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">--}}
{{--            <path d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--</div>--}}
