@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <div class="row profile-top py-5 my-5" style="height: 370px">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="row justify-content-center">
                        <div class="profile-top-image col-12 col-sm-8 col-md-6 col-lg-12 ">
                            <img class="img-fluid" style="width: 100px;height: 100px;"
                                 src="{{($status) ? asset('img/tick.png') : asset('img/close.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                    <div class="row text-center">
                        <div class="col-12 py-3">
                            <h4 class="{{($status) ? 'text-success' : 'text-danger'}}">{{ ($status) ? __('string.successful.pay') : __('string.unsuccessful.pay') }}</h4>
                        </div>
                        <div class="col-12 py-3">
                            <h5> کد پیگری : {{ tr_num($referenceId,'fa') }}</h5>
                        </div>
                        <div class="col-12 py-3" dir="rtl">
                            <h5> تاریخ و زمان : {{tr_num($date,'fa')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="profile-top-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">
                        <path
                            d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>
                    </svg>
                </div>
            </div>
            @if($status && $type_id == 0)
                <div class="col-sm-12 shadow my-3 p-5">
                    <h5 class="text-left">بلیت ها</h5>
                    <table class="rwd-table table">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام</th>
                            <th scope="col">شماره موبایل</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">کد</th>
{{--                            <th scope="col">چاپ</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $i => $ticket)
                            <tr>
                                <td data-th="ردیف">{{++$i}}</td>
                                <td data-th="نام">{{$ticket->name}}</td>
                                <td data-th="شماره موبایل">{{tr_num($ticket->mobile,'fa')}}</td>
                                <td data-th="ایمیل">{{$ticket->email}}</td>
                                <td data-th="کد">{{tr_num($ticket->code,'fa')}}</td>
{{--                                <td data-th="چاپ">--}}
{{--                                    <a href="{{route('orderCode.show',[$ticket->id])}}" target="_blank">چاپ</a></td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
@endsection

