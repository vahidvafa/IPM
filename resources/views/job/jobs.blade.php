@extends('master')
@section('header')

@stop

@section('content')
    {{--@if(count($news) == 0 )

        @include("component.empty_list")

        @else
    @php
        $i=-1;
        $offsets =4;
    @endphp--}}
    <div class="container">
    @auth()
        <a href="{{route('job.create')}}" class="col-2 btn btn-white-border center-y mt-4 mb-4 ">افزودن فرصت شغلی</a>

        <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 ">

            <li class="nav-item">
                <a class="nav-link font-22 text-black-light text-regular show active" data-toggle="tab" href="#jobs">
                    فرصت های شغلی
                    <p class="font-14 text-black-light text-regular m-0 m-md-2">تعداد فرصت های شغلی:
                        <span>{{$jobs->total()}}</span></p>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link font-22 text-black-light text-regular " data-toggle="tab" href="#myJob">
                    فرصت های شغلی من
                    <p class="font-14 text-black-light text-regular m-0 m-md-2">تعداد فرصت های شغلی من:
                        <span>{{$myJobs->total()}}</span></p>
                </a>
            </li>
        </ul>
    @endauth
    <div class="tab-content col-12 last-pack-content ">
        <div class="tab-pane row show active" id="jobs">
            <form action="{{route('job.index')}}" method="post" class="col-12 row shadow mb-2 mt-3 p-5">
                @csrf
                @method("get")
                <label class="col-3">
                    دسته بندی: <select name="cats">
                        <option value="-100" @if(request()->get("cats") == "-100") selected @endif>--------------</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}" @if(request()->get("cats") == $cat->title) selected @endif >{{$cat->title}}</option>
                        @endforeach
                    </select>
                </label>

                <label class="col-2">
                    نوع قرار داد: <select name="contract_type">
                        @foreach($contract_type as $type)
                            <option value="{{$type}}" @if(request()->get("contract_type") == $type) selected @endif >{{$type}}</option>
                        @endforeach
                    </select>
                </label>

                <label class="col-2">
                    سابقه کاری: <select name="work_experience">
                        @foreach($work_experience as $work)
                            <option value="{{$work}}" @if(request()->get("work_experience") == $work) selected @endif >{{$work}}</option>
                        @endforeach
                    </select>
                </label>

                <label class="col-2" >
                    مدرک تحصیلی: <select name="education">
                        @foreach($education as $ed)
                            <option value="{{$ed}}" @if(request()->get("education") == $ed) selected @endif >{{$ed}}</option>
                        @endforeach
                    </select>
                </label>

                <label class="col-2">
                    جنسیت: <select name="sex">
                        <option value="-1" @if(request()->get("sex") == null  || request()->get("sex") == -1) selected @endif >تفاوتی ندارد</option>
                        <option value="0" @if(request()->get("sex") !=null && request()->get("sex") == 0) selected @endif >زن</option>
                        <option value="1" @if(request()->get("sex") == 1) selected @endif >مرد</option>

                    </select>
                </label>

                <button type="submit" class="col-3 btn btn-white-border center-y ">جست و جو</button>

            </form>
            <div class="container m-5  ">
                {{ $jobs->links() }}
                @foreach($jobs as $job)
                    <div class="row mt-1 mb-4 center-y">
                        <div class="last-pack-content-in col-11 col-lg-11   col-md-6 mb-3 mt-3 pt-4 pb-4 ">
                            <div class="row align-items-center">
                                <div class="last-pack-content-in-time text-lg-left text-center col-12 col-lg-2">
                                    <p class="text-medium font-14  mb-1 mb-lg-2">دسته بندی :<span
                                                class="pl-3">{{$job->jobCategory->title}}</span>
                                    </p>

                                </div>
                                <div class="col-12 col-lg-8 d-lg-flex align-items-center text-lg-left text-center">
                                    <div class="last-pack-content-in-img mt-3 mt-lg-0 mb-3 mb-lg-0">
                                        <div class="last-pack-content-in-img-in">
                                            <img src="{{asset('img/job/'.$job->company_logo)}}" alt="anjoman">
                                        </div>

                                    </div>
                                    <div class="last-pack-content-in-description pl-3">
                                        <h2 class="text-black font-16 text-medium mb-3">{{$job->title}}</h2>
                                        <h3 class="text-light2 text-black-light font-14">{{substr($job->content,0,255)}}</h3>
                                        <div class="col-12 register-footer ">
                                            {{--                                            <button type="button" class="btn mt-1 mb-2" @if($job->work_experience == "همه موارد" ) style="display: none" @endif >{{$job->work_experience}}</button>--}}
                                            <button type="button" class="btn mt-1 mb-2"
                                                    @if($job->contract_type == "همه موارد" ) style="display: none;" @endif >{{$job->contract_type}}</button>
                                            <button type="button" class="btn mt-1 mb-2"
                                                    @if($job->education == "فرقی نمی کن" ) style="display: none" @endif >{{$job->education}}</button>
                                            <button type="button"
                                                    class="btn mt-1 mb-2">{{$job->province->title}}</button>
                                            {{--{{var_dump(($job->sex == 0))}}--}}
                                            @if($job->sex != -1)
                                            <button type="button" class="btn mt-1 mb-2">@if($job->sex == 1) مرد @else
                                                    زن @endif</button>
                                                @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="last-pack-content-in-more text-center col-12 col-lg-2 text-lg-left text-center">

                                    <a href="{{route("job.show",[$job->id])}}" class="btn btn-white-border"
                                       @guest data-toggle="modal" data-target="#ModalLogin" @endguest >جزئیات فرصت
                                        شغلی</a>

                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
                {{ $jobs->links() }}

            </div>
        </div>
        <div class="tab-pane row " id="myJob">
            <div class="container m-5">
                @foreach($myJobs as $myJob)
                    <div class="row mt-1 mb-4 center-y">
                        <div class="last-pack-content-in col-11 col-lg-11   col-md-6 mb-3 mt-3 pt-4 pb-4">
                            <div class="row align-items-center">
                                <div class="last-pack-content-in-time text-lg-left text-center col-12 col-lg-2">
                                    <p class="text-medium font-14  mb-1 mb-lg-2">دسته بندی :<span
                                                class="pl-3">{{$myJob->jobCategory->title}}</span>
                                    </p>

                                </div>
                                <div class="col-12 col-lg-8 d-lg-flex align-items-center text-lg-left text-center">
                                    <div class="last-pack-content-in-img mt-3 mt-lg-0 mb-3 mb-lg-0">
                                        <div class="last-pack-content-in-img-in">
                                            <img src="{{asset('img/job/'.$myJob->company_logo)}}" alt="anjoman">
                                        </div>

                                    </div>
                                    <div class="last-pack-content-in-description pl-3">
                                        <h2 class="text-black font-16 text-medium mb-3">{{$myJob->title}}</h2>
                                        <h3 class="text-light2 text-black-light font-14">{{substr($myJob->content,0,255)}}</h3>
                                        <div class="col-12 register-footer ">
                                            {{--                                            <button type="button" class="btn mt-1 mb-2" @if($myJob->work_experience == "همه موارد" ) style="display: none" @endif >{{$myJob->work_experience}}</button>--}}
                                            <button type="button" class="btn mt-1 mb-2"
                                                    @if($myJob->contract_type == "همه موارد" ) style="display: none;" @endif >{{$myJob->contract_type}}</button>
                                            <button type="button" class="btn mt-1 mb-2"
                                                    @if($myJob->education == "فرقی نمی کن" ) style="display: none" @endif >{{$myJob->education}}</button>
                                            <button type="button"
                                                    class="btn mt-1 mb-2">{{$myJob->province->title}}</button>
                                            {{--{{var_dump(($myJob->sex == 0))}}--}}

                                            @if($myJob->sex != -1)
                                            <button type="button" class="btn mt-1 mb-2">@if($myJob->sex == 0) مرد @else
                                                    زن @endif</button>
                                                @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="last-pack-content-in-more text-center col-12 col-lg-2 text-lg-left text-center">
                                    <a href="{{route("job.edit",[$myJob->id])}}" class="btn btn-white-border"
                                       @guest data-toggle="modal" data-target="#ModalLogin" @endguest >نمایش و ویرایش</a>
                                    <form action="{{route('job.destroy',[$myJob->id])}} " class="mt-3" method="post">
                                        @csrf
                                        @method("delete")
                                        <a href="#" onclick="confirm('{{ __("آیا مطمئن هستید؟") }}') ? this.parentElement.submit() : ''" class="btn btn-white-border "   >
                                            <i class="material-icons text-danger">جذف</i>
                                        </a>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach


            </div>
        </div>

    </div>
    </div>
@stop