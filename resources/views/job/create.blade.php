@extends('master')
@section('header')

@stop

@section('content')
    <div class="container mt-5 form-profile">
        <form action="{{route('job.store')}}" method="post" class="row" enctype="multipart/form-data" >
            @csrf

            <div class="input-form col-md-11 mb-5 ">
                <label class="col-12">عنوان*
                    <input type="text" name="title" class="mb-0"
                           value="{{old('title')}}"
                           aria-invalid="false"
                           placeholder="عنوان*" required>
                    {{--<img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                    @if ($errors->has('title'))
                        <div id="first_name-error" class="error text-danger pl-3" for="title"
                        >
                            <strong>{{ $errors->first('title') }}</strong>
                        </div>
                    @endif
                </label>
            </div>

            <div class="input-form col-md-4 mb-5 ">
                <label class="col-12">کمترین میزان حقوق
                    <input type="number" name="min_salary" class="mb-0"
                           value="{{old('min_salary')}}"
                           aria-invalid="false"
                           placeholder="کمترین میزان حقوق">
                </label>
            </div>

            <div class="input-form col-md-4 mb-5 ">
                <label class="col-12">بیشترین میزان حقوق
                    <input type="number" name="max_salary" class="mb-0"
                           value="{{old('max_salary')}}"
                           aria-invalid="false"
                           placeholder="بیشترین حقوق">
                </label>
            </div>

            <div class="input-form col-md-4 col-sm-5 mb-5 ">
                <label class="col-12">استان
                    <select name="province_id">
                        @foreach($province as $city)
                            <option value="{{$city->id}}"
                                    @if(old("province") == $city->id) selected @endif >{{$city->title}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-form col-md-6 mb-5 ">
                <label class="col-12">ادرس
                    <input type="text" name="location" class="mb-0"
                           value="{{old('location')}}"
                           aria-invalid="false"
                           placeholder="ادرس">
                    {{--                <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                </label>
            </div>

            <div class="input-form col-md-6 mb-5 ">
                <label class="col-12">دسته بندی
                    <select name="jobsCategory_id">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}"
                                    @if((old("cats")) == $cat->title) selected @endif >{{$cat->title}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-form col-md-3 col-sm-5 mb-5 ">
                <label class="col-12">نوع قرار داد
                    <select name="contract_type">
                        @foreach($contract_type as $type)
                            <option value="{{$type}}"
                                    @if((old("contract_type")) == $type) selected @endif >{{$type}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-form col-md-3 col-sm-5 mb-5 ">
                <label class="col-12">سابقه کاری
                    <select name="work_experience">
                        @foreach($work_experience as $work)
                            <option value="{{$work}}"
                                    @if(old("work_experience") == $work) selected @endif >{{$work}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-form col-md-3 col-sm-5 mb-5 ">
                <label class="col-12">مدرک تحصیلی
                    <select name="education">
                        @foreach($education as $ed)
                            <option value="{{$ed}}"
                                    @if(old("education") == $ed) selected @endif >{{$ed}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="input-form col-md-3 col-sm-5 mb-5 ">
                <label class="col-12">جنسیت
                    <select name="sex">
                        <option value="-1"
                                @if(old("sex") == null  || old("sex") == -1) selected @endif >تفاوتی
                            ندارد
                        </option>
                        <option value="0" @if(old("sex") !=null && old("sex") == 0) selected @endif >
                            زن
                        </option>
                        <option value="1" @if(old("sex") == 1) selected @endif >مرد</option>
                    </select>
                </label>
            </div>


            <div class="input-form col-md-6 mb-5 ">
                <label class="col-12">تسهیلات و مزایا
                    <textarea
                            type="text"
                            name="benefits"
                            class="mb-0"
                            aria-invalid="false"
                            placeholder="تسهیلات و مزایا">{{old('benefits')}}</textarea>
                    {{--                <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                </label>
            </div>

            <div class="input-form col-md-6 mb-5 ">
                <label class="col-12">مهارت های مورد نیا
                    <textarea type="text" name="skills"
                              class="mb-0"
                              aria-invalid="false"
                              placeholder="مهارت های مورد نیاز">{{old('skills')}}</textarea>
                                    {{--<img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                </label>
            </div>

            <div class="input-form col-md-12 mb-5 ">
                <label class="col-12">شرح شغل و وظایف*
                    <textarea type="text" name="content" class="mb-0"
                              aria-invalid="false"
                              placeholder="شرح شغل و وظایف*"
                              required>{{old('content')}}</textarea>
                    {{--                <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                    @if ($errors->has('content'))
                        <div id="first_name-error" class="error text-danger pl-3" for="content">
                            <strong>{{ $errors->first('content') }}</strong>
                        </div>
                    @endif
                </label>
            </div>

            <div class="col-8">
                <div class="input-upload ">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                    <label class="custom-file-label" for="customFile">انتخاب عکس فرصت شغلی</label>
                </div>
            </div>

            <div class="col-12  ">
                <div class="col-md-4 col-sm-8 center-y">
                    <input type="submit" value="ویرایش"
                           class="form-submit-violet text-white font-16 text-medium">
                </div>
            </div>
        </form>
    </div>
@stop