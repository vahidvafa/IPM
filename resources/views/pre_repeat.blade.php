@extends('master')
@section('content')
    <style>
        .radio-year {
            height: auto !important;
            width: auto !important;
            display: inline !important;
            -webkit-appearance: radio !important;
            margin-left: 5px !important;
        }
    </style>
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <img src="{{asset('img/logo-login.png')}}" alt="" class="mb-4">
            <h4 class="modal-title text-black">اعتبار سنجی</h4>
            <p class="text-black-light font-18 text-light2 mt-4 mb-4">
                قبل از تمدید برای تایید اصالت خود پسورد خود را وارد کنید
            </p>
            <form class="sidebar-form-body row" method="post" action="{{route('user.preRepeat')}}">
                @csrf
                <input type="hidden" name="encode" value="{{$code}}">
                <div class="input-form col-6">
                    <input type="password" name="pass" id="pass" value="{{old("pass")??request('pass')}}"
                           placeholder="پسورد*">
                    <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                    @if (Session::has('errorField') )
                        <div id="name-error" class="error text-danger pl-3 mb-2" for="name"
                             style="display: block;">
                            <strong>{{ Session::get('errorField') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="input-form col-6">
                    <label>مدت زمان : </label>
                    <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="1" checked>عضویت یکساله</label>
                    <label class="radio-inline"><input class="radio-year" type="radio" name="year" value="3">عضویت دو/سه ساله</label>
                </div>
                <div class="row col-12 col-sm-12">
                    <input type="submit" value="اعتبار سنجی"
                           class="ml-5 col-lg-3 col-sm-4 form-submit mt-1 text-white font-16 text-medium">
                </div>
            </form>
        </div>
    </main>
@stop
