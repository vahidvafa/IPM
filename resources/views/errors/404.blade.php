@extends('errors::minimal',['titleHeader'=>__('string.404'),'code'=>tr_num(404,'fa')])
{{--@section('code', '404')--}}
@section('message', __('string.404'))
<div class="tab-pane {{(Session::get('type') == 4) ? 'active':'fade'}}" id="menu3">
<h2 class=" font-22 text-medium text-black mt-5 mb-4"> فرم {{$memberships[3]->title}}
</h2>
<form class="sidebar-form-body row" action="{{route('register.store')}}" method="POST"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type" value="{{$memberships[3]->id}}">
    <div class="input-form col-md-6">
        <div class="row">
            <div class="col-12">
                <label>نام :</label>
            </div>
            <div class="col-12">
                <input type="text" name="first_name"
                       value="{{(Session::get('type') == 4) ? request()->old('first_name'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="نام *" required>
                <img src="img/001-user.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('first_name'))
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
                       value="{{(Session::get('type') == 4) ? request()->old('last_name'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="نام خانوادگی *" required>
                <img src="img/001-user.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('last_name'))
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
                       value="{{(Session::get('type') == 4) ?request()->old('name_en'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="نام و نام خانوادگی انگلیسی*" required>
                <img src="img/001-user.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('name_en'))
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
                <label>نام پدر :</label>
            </div>
            <div class="col-12">
                <input type="text" name="father_name"
                       value="{{(Session::get('type') == 4) ?request()->old('father_name'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="نام پدر*" required>
                <img src="img/004-key.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('father_name'))
                    <div id="name-error" class="error text-danger pl-3" for="name"
                         style="display: block;">
                        <strong>{{ $errors->first('father_name') }}</strong>
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
                       value="{{(Session::get('type') == 4) ?request()->old('national_code'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="کد ملی*" required>
                <img src="img/004-key.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('national_code'))
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
                       value="{{(Session::get('type') == 4) ?request()->old('mobile'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="شماره تماس*" required>
                <img src="img/002-telephone.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('mobile'))
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
                       value="{{(Session::get('type') == 4) ?request()->old('email'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="ایمیل*" required>
                <img src="img/003-envelope.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('email'))
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
                <label>شماره شناسنامه :</label>
            </div>
            <div class="col-12">
                <input type="text" name="certificate_number"
                       value="{{(Session::get('type') == 4) ?request()->old('certificate_number'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="شماره شناسنامه*" required>
                <img src="img/004-key.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('certificate_number'))
                    <div id="name-error" class="error text-danger pl-3" for="name"
                         style="display: block;">
                        <strong>{{ $errors->first('certificate_number') }}</strong>
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
                       class="datePickerInput"
                       value="{{(Session::get('type') == 4) ?request()->old('birth_date'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="تاریخ تولد*" required autocomplete="off">
                <img src="img/001-user.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('birth_date'))
                    <div id="name-error" class="error text-danger pl-3" for="name"
                         style="display: block;">
                        <strong>{{ $errors->first('birth_date') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="input-form col-md-6">
        <div class="row">
            <div class="col-12">
                <label>محل تولد :</label>
            </div>
            <div class="col-12">
                <input type="text" name="birth_place"
                       value="{{(Session::get('type') == 4) ?request()->old('birth_place'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="محل تولد*" required>
                <img src="img/001-user.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('birth_place'))
                    <div id="name-error" class="error text-danger pl-3" for="name"
                         style="display: block;">
                        <strong>{{ $errors->first('birth_place') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="input-form col-md-12 py-2 px-4">
        <label for="">جنسیت : </label>
        <input type="radio" class="option-input" name="sex" value="1" size="40"
               aria-invalid="false" placeholder="مرد" required>
        مرد
        <input type="radio" class="option-input" name="sex" value="0" size="40"
               aria-invalid="false" placeholder="زن" required>
        زن
        @if (Session::get('type') == 4 && $errors->has('sex'))
            <div id="name-error" class="error text-danger pl-3" for="name"
                 style="display: block;">
                <strong>{{ $errors->first('sex') }}</strong>
            </div>
        @endif
    </div>
    <div class="input-form col-md-6">
        <div class="row">
            <div class="col-12">
                <label>نشانی منزل :</label>
            </div>
            <div class="col-12">
                <input type="text" name="home_address"
                       value="{{(Session::get('type') == 4) ?request()->old('home_address'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="نشانی منزل *" required>
                <img src="img/003-envelope.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('home_address'))
                    <div id="name-error" class="error text-danger pl-3" for="name"
                         style="display: block;">
                        <strong>{{ $errors->first('home_address') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="input-form col-md-6">
        <div class="row">
            <div class="col-12">
                <label>کد پستی منزل :</label>
            </div>
            <div class="col-12">
                <input type="text" name="home_post"
                       value="{{(Session::get('type') == 4) ?request()->old('home_post'):''}}"
                       size="40" aria-invalid="false"
                       placeholder="کد پستی منزل *" required>
                <img src="img/003-envelope.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('home_post'))
                    <div id="name-error" class="error text-danger pl-3" for="name"
                         style="display: block;">
                        <strong>{{ $errors->first('home_post') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="input-form col-md-12 py-2 px-4">
        <label for="branch">شاخه : </label>
        <select name="branch" required>
            <option disabled selected value>شاخه مورد نظر را انتخاب کنید</option>
            @foreach($branches as $branch)
                <option value="{{$branch->id}}">{{ $branch->title }}</option>
            @endforeach
        </select>
        @if (Session::get('type') == 4 && $errors->has('branch'))
            <div id="name-error" class="error text-danger pl-3" for="name"
                 style="display: block;">
                <strong>{{ $errors->first('branch') }}</strong>
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
                <img src="img/004-key.png" class="form-icon">
                @if (Session::get('type') == 4 && $errors->has('password'))
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
                <img src="img/004-key.png" class="form-icon">
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
