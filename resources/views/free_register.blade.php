
@extends('master')
@section('header')
    <link href='{{asset('fullcalendar/core/main.css')}}' rel='stylesheet'/>
    <link href='{{asset('fullcalendar/daygrid/main.css')}}' rel='stylesheet'/>
    <link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
    <link href='{{asset('fullcalendar/bootstrap/main.css')}}' rel='stylesheet'/>
    <link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css'>
    <link rel="stylesheet" href="{{asset('css/style-calender.css')}}">

@stop
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container">
            <div class="register-main mt-5 mb-5">
                <h2 class=" font-24 text-medium text-black  mb-4">عضویت هواداری
                </h2>
                <!-- Nav pills -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <form class="sidebar-form-body row" action="{{route('register.free.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="event" value="{{$event}}">
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>نام :</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="first_name"
                                           value="{{old('first_name')}}"
                                           size="40" aria-invalid="false"
                                           placeholder="نام *" required>
                                    <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                    @if ($errors->has('first_name'))
                                        <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>نام خانوادگی :</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="last_name"
                                           value="{{old('last_name')}}"
                                           size="40" aria-invalid="false"
                                           placeholder="نام خانوادگی *" required>
                                    <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                    @if ($errors->has('last_name'))
                                        <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>نام و نام خانوادگی انگلیسی :</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="name_en"
                                           value="{{old('name_en')}}"
                                           size="40" aria-invalid="false"
                                           placeholder="نام و نام خانوادگی انگلیسی*" required>
                                    <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                    @if ($errors->has('name_en'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('name_en') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>کد ملی :</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="national_code"
                                           value="{{old('national_code')}}"
                                           size="40" aria-invalid="false"
                                           placeholder="کد ملی*" required>
                                    <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                    @if ($errors->has('national_code'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('national_code') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>شماره تماس :</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="mobile"
                                           value="{{old('mobile')}}"
                                           size="40" aria-invalid="false"
                                           placeholder="شماره تماس*" required pattern="\d*">
                                    <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                    @if ($errors->has('mobile'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>ایمیل :</label>
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email"
                                           value="{{old('email')}}"
                                           size="40" aria-invalid="false"
                                           placeholder="ایمیل*" required>
                                    <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                    @if ($errors->has('email'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>تاریخ تولد :</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="birth_date"
                                           value="{{old('birth_date')}}"
                                           class="datePickerInput"
                                           size="40" aria-invalid="false"
                                           placeholder="تاریخ تولد*" required autocomplete="off">
                                    <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                    @if ($errors->has('birth_date'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('birth_date') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-md-6 py-2 px-4">
                            <label>جنسیت : </label>
                            <select name="sex" required>
                                <option disabled selected value>جنسیت مورد نظر را انتخاب کنید *</option>
                                <option value="1" {{(request()->old('sex') == 1 ) ?'selected':''}}>مرد</option>
                                <option value="0" {{(request()->old('sex') == 0 ) ?'selected':''}}>زن</option>
                            </select>
                            @if ($errors->has('sex'))
                                <div id="name-error" class="error text-danger pl-3" for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('sex') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                            <div class="row">
                                <div class="col-12">
                                    <label>رمز عبور :</label>
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" value="" size="40" aria-invalid="false"
                                           placeholder="رمز عبور*" required>
                                    <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                    @if ($errors->has('password'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="input-form col-md-6 border-top border-dark pt-3 mt-3">
                            <div class="row">
                                <div class="col-12">
                                    <label>تایید رمز عبور :</label>
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password_confirmation" value="" size="40"
                                           aria-invalid="false" placeholder="تایید رمز عبور *" required>
                                    <img src="{{asset('img/004-key.png')}}" class="form-icon">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row my-2">
                                <div class="col-md-4 col-sm-2"></div>
                                <div class="col-md-4 col-sm-8">
                                    <input type="submit" value="عضو شوید"
                                           class="form-submit-violet text-white font-16 text-medium">
                                </div>
                                <div class="col-md-4 col-sm-2"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    {{--<script src="{{ asset('material/js/core/jquery.min.js') }}"></script>--}}
    <script>
        $(document).ready(function () {
            $(".datePickerInput").pDatepicker(
                {
                    initialValue: false,
                    responsive: true,
                    format: 'L',
                    calendarType: 'persian',
                    onlySelectOnDate:true,
                    autoClose:true,
                    timePicker: {
                        enabled: false,
                    },
                    toolbox: {
                        enabled: true,
                        submitButton:{
                            enabled:true,
                            text:{
                                fa:"تایید"
                            }
                        },
                        calendarSwitch:{
                            enabled:false
                        }
                    }
                }
            );
        });
    </script>
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

    document.addEventListener("DOMContentLoaded", function () {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("پر کردن این فیلد الزامی است");
                }
            };
            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }
    });
</script>
