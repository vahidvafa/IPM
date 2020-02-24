@extends('master')
@section('header')

@stop

@section('content')
    <div class="container">
    <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 mt-4 mr-3 ml-3 mb-5 ">

        <li class="nav-item">
            <a class="nav-link font-22 text-black-light text-regular " data-toggle="tab" href="#preview">
                نمایش جزئیات
                <p class="font-14 text-black-light text-regular m-0 m-md-2">
                    فرصت شغلی من
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link font-22 text-black-light text-regular show active" data-toggle="tab" href="#edit">
                ویرایش
                <p class="font-14 text-black-light text-regular m-0 m-md-2">
                    انتشار پس از تایید مدیران انجمن
                </p>
            </a>
        </li>
    </ul>

    <div class="tab-content col-12 last-pack-content ">

        <div class="tab-pane row " id="preview">
            <div class="detail-main mt-2 mb-5 container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card shadow ">

                            <div class="row p-5 card-body mt-0">
                                <h2 class="title-bar-detail text-white font-18 text-medium mb-4 col-12 ">{{$job->title}}</h2>
                                <div class="row col-12 mb-4">
                                    <img src="{{asset("img/".$job->company_logo)}}" class="col-lg-3 col-12 col-sm-5"
                                         style="height: 90px">
                                    <div class="col-12 col-lg-9 mt-4">
                                        <p style="line-height: 0">سابقه کار: {{$job->work_experience}}</p>
                                        <p>میزان تحصیلات: {{$job->education}}</p>
                                    </div>
                                </div>
                                <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">میزان حقوق:</span>
                                    از‌ @if($job->min_salary==null) ---- @else{{$job->min_salary}}@endif
                                    تا @if($job->max_salary==null) ---- @else    {{$job->max_salary}}@endif</p>
                                <p class="col-lg-6 col-sm-12"><span
                                            class="text-black text-regular ">تحصیلات: </span>{{$job->education}}</p>
                                <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">سابثه کار مورد نیاز: </span>{{$job->work_experience}}
                                </p>

                                <p class="col-lg-6 col-sm-12"><span
                                            class="text-black text-regular ">دسته بندی: </span>{{$job->jobCategory->title}}
                                </p>

                                <p class="col-12 text-regular text-bold mt-1" style="color: #448aff;">توضیحات بیشتر</p>

                                <p class="col-lg-6 col-sm-12"><span
                                            class="text-black text-regular ">تسهیلات و مزایا: </span>{{$job->benefits}}
                                </p>
                                <p class="col-lg-6 col-sm-12"><span
                                            class="text-black text-regular ">محل کار: </span>{{$job->location}}</p>
                                <p class="col-lg-12 col-sm-12"><span class="text-black text-regular ">مهارت های مورد نیاز: </span>{{$job->skills}}
                                </p>
                                <p class="col-lg-12 col-sm-12"><span
                                            class="text-black text-regular ">شرح شغل و وظایف: </span>{{$job->content}}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="bar-detail pt-4 pb-4 pr-3 pl-3">
                            <h2 class="title-bar-detail text-white font-18 text-medium mb-4">توصیحات بیشتر</h2>
                            <ul class="col-12">
                                <li><span class="text-black pr-1 text-regular ">شهر:</span> {{$job->province->title}}
                                </li>
                                <li>
                                    <span class="text-black pr-1 text-regular ">نوع همکاری: </span>{{$job->contract_type}}
                                </li>
                                <li><span class="text-black pr-1 text-regular ">جنسیت:</span> @if($job->sex==-1 ) تفاوتی
                                    مدارد @elseif($job->sex ==0 ) زن @else مرد @endif</li>

                            </ul>


                        </div>
                        <div class="bar-detail pt-4 pb-4 pr-3 pl-3">
                            <h2 class="title-bar-detail text-white font-18 text-medium mb-4">فرصت های مشابه</h2>

                            @foreach($similar as $similarJob)

                                <div class="Related-post row mb-4 pr-3 pr-lg-0 pl-3 pl-lg-0 ">
                                    <div class="col-12 col-sm-3 col-md-2 col-lg-5 col-xl-4">
                                        <div class="Related-post-img ">
                                            <img class="rounded" src="{{asset("img/".$similarJob->company_logo)}}"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="Related-post-titles pl-0 col-12 col-sm-9 col-md-10 col-lg-7 col-xl-8 mt-2 mt-sm-0">
                                        <h4 class="Related-post-title font-14 text-medium text-black mb-2 ">
                                            <a class="text-black hover-text-black"
                                               href="{{route("job.show",[$similarJob->id])}}">
                                                {{$similarJob->title}}
                                            </a></h4>
                                        <div class="Related-post-title-sub text-yellow font-14 text-light2 mb-0">
                                            استان: {{$similarJob->province->title}}
                                        </div>
                                    </div>
                                </div>
                                <p style="line-height: 0">سابقه کار: {{$similarJob->work_experience}}</p>
                                <p>میزان تحصیلات: {{$similarJob->education}}</p>
                                <hr class="mb-4">

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane row show active" id="edit">
            <div class="container ">
                <form action="{{route('job.update',$job->id)}}" method="post" class="row">
                    @csrf
                    @method("put")
                    <div class="input-form col-md-11 mb-5 ">
                        <label class="col-12">عنوان*
                            <input type="text" name="title" class="mb-0"
                                   value="{{old('title')??$job->title}}"
                                   aria-invalid="false"
                                   placeholder="عنوان*" required>
                            {{--                        <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
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
                                   value="{{old('min_salary')??$job->min_salary}}"
                                   aria-invalid="false"
                                   placeholder="کمترین میزان حقوق">
                        </label>
                    </div>

                    <div class="input-form col-md-4 mb-5 ">
                        <label class="col-12">بیشترین میزان حقوق
                            <input type="number" name="max_salary" class="mb-0"
                                   value="{{old('max_salary')??$job->max_salary}}"
                                   aria-invalid="false"
                                   placeholder="بیشترین حقوق">
                        </label>
                    </div>

                    <div class="input-form col-md-4 col-sm-5 mb-5 ">
                        <label class="col-12">استان
                            <select name="province_id">
                                @foreach($province as $city)
                                    <option value="{{$city->id}}" @if(
                                                    (old("province")
                                                    ??$job->province->id) == $city->id) selected @endif >{{$city->title}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="input-form col-md-6 mb-5 ">
                        <label class="col-12">ادرس
                            <input type="text" name="location" class="mb-0"
                                   value="{{old('location')??$job->location}}"
                                   aria-invalid="false"
                                   placeholder="ادرس">
                            {{--                        <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                        </label>
                    </div>

                    <div class="input-form col-md-6 mb-5 ">
                        <label class="col-12">دسته بندی
                            <select name="jobsCategory_id">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}"
                                            @if((old("cats")??$job->jobCategory->title) == $cat->title) selected @endif >{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="input-form col-md-3 col-sm-5 mb-5 ">
                        <label class="col-12">نوع قرار داد
                            <select name="contract_type">

                                @foreach($contract_type as $type)
                                    <option value="{{$type}}"
                                            @if((old("contract_type")??$job->contract_type) == $type) selected @endif >{{$type}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="input-form col-md-3 col-sm-5 mb-5 ">
                        <label class="col-12">سابقه کاری
                            <select name="work_experience">
                                @foreach($work_experience as $work)
                                    <option value="{{$work}}"
                                            @if(old("work_experience")??$job->work_experience == $work) selected @endif >{{$work}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="input-form col-md-3 col-sm-5 mb-5 ">
                        <label class="col-12">مدرک تحصیلی
                            <select name="education">
                                @foreach($education as $ed)
                                    <option value="{{$ed}}"
                                            @if(old("education")??$job->education == $ed) selected @endif >{{$ed}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="input-form col-md-3 col-sm-5 mb-5 ">
                        <label class="col-12">جنسیت
                            <select name="sex">
                                <option value="-1"
                                        @if(old("sex")??$job->sex  == -1) selected @endif >تفاوتی
                                    ندارد
                                </option>
                                <option value="0" @if(old("sex")??$job->sex  == 0) selected @endif >
                                    زن
                                </option>
                                <option value="1" @if(old("sex")??$job->sex  == 1) selected @endif >مرد</option>
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
                                placeholder="تسهیلات و مزایا">{{old('benefits')??$job->benefits}}</textarea>
{{--                        <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                        </label>
                    </div>

                    <div class="input-form col-md-6 mb-5 ">
                        <label class="col-12">مهارت های مورد نیا
                        <textarea type="text" name="skills"
                                  class="mb-0"
                                  aria-invalid="false"
                                  placeholder="مهارت های مورد نیاز">{{old('skills')??$job->skills}}</textarea>
                        <img src="{{asset("img/001-user.png")}}" class="form-icon">
                    </div>
                    <div class="input-form col-md-12 mb-5 ">
                        <label class="col-12">شرح شغل و وظایف*
                        <textarea type="text" name="content" class="mb-0"
                                  aria-invalid="false"
                                  placeholder="شرح شغل و وظایف*"
                                  required>{{old('content')??$job->content}}</textarea>
{{--                        <img src="{{asset("img/001-user.png")}}" class="form-icon">--}}
                        @if ($errors->has('content'))
                            <div id="first_name-error" class="error text-danger pl-3" for="content"
                            >
                                <strong>{{ $errors->first('content') }}</strong>
                            </div>
                        @endif
                        </label>
                    </div>

                    <div class="col-12  ">
                        <div class="col-md-4 col-sm-8 center-y">
                            <input type="submit" value="ویرایش"
                                   class="form-submit-violet text-white font-16 text-medium">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@stop