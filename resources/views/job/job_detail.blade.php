@extends('master')
@section('header')

@stop

@section('content')
    <div class="container">
        <div class="detail-main mt-2 mb-5">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card shadow ">

                        <div class="row p-5 card-body mt-0">
                            {{--<h2 class="title-bar-detail text-white font-18 text-medium mb-4 col-12 ">{{$job->title}}</h2>--}}
                        <div class="row col-12 mb-4">
                            <img src="{{asset("img/".$job->company_logo)}}" class="col-lg-3 col-12 col-sm-5" style="height: 90px">
                            <div class="col-12 col-lg-9 mt-4">
                            <p style="line-height: 0">سابقه کار: {{$job->work_experience}}</p>
                            <p >میزان تحصیلات: {{$job->education}}</p>
                            </div>
                        </div>
                            <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">میزان حقوق:</span> از‌ @if($job->min_salary==null) ---- @else{{$job->min_salary}}@endif تا @if($job->max_salary==null) ---- @else    {{$job->max_salary}}@endif</p>
                            <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">تحصیلات: </span>{{$job->education}}</p>
                            <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">سابثه کار مورد نیاز: </span>{{$job->work_experience}}</p>
                            <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">دسته بندی: </span>{{$job->jobCategory->title}}</p>

                            <p class="col-12 text-regular text-bold mt-1" style="color: #448aff;">توضیحات بیشتر</p>

                            <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">تسهیلات و مزایا: </span>{{$job->benefits}}</p>
                            <p class="col-lg-6 col-sm-12"><span class="text-black text-regular ">محل کار: </span>{{$job->location}}</p>
                            <p class="col-lg-12 col-sm-12"><span class="text-black text-regular ">مهارت های مورد نیاز: </span>{{$job->skills}}</p>
                            <p class="col-lg-12 col-sm-12"><span class="text-black text-regular ">شرح شغل و وظایف: </span>{{$job->content}}</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="bar-detail pt-4 pb-4 pr-3 pl-3">
                        <h2 class="title-bar-detail text-white font-18 text-medium mb-4">توصیحات بیشتر</h2>
                    <ul class="col-12">
                        <li><span class="text-black pr-1 text-regular ">شهر:</span> {{$job->province->title}}</li>
                        <li><span class="text-black pr-1 text-regular ">نوع همکاری: </span>{{$job->contract_type}}</li>
                        <li><span class="text-black pr-1 text-regular ">جنسیت:</span> @if($job->sex==-1 ) تفاوتی مدارد @elseif($job->sex ==0 ) زن @else مرد @endif</li>

                    </ul>
                        <form method="post" action="{{route('applyJob')}}" >
                            <input type="hidden" name="job_id" value="{{$job->id}}" >
                            @csrf
                        <button type="submit" class="btn btn-bar-detail mt-3 mb-4">ثبت نام</button>
                        </form>
                    </div>
                        <div class="bar-detail pt-4 pb-4 pr-3 pl-3">
                        <h2 class="title-bar-detail text-white font-18 text-medium mb-4">فرصت های مشابه</h2>
                    @foreach($similar as $job)

                        <div class="Related-post row mb-4 pr-3 pr-lg-0 pl-3 pl-lg-0 ">
                            <div class="col-12 col-sm-3 col-md-2 col-lg-5 col-xl-4">
                                <div class="Related-post-img ">
                                    <img class="rounded" src="{{asset("img/".$job->company_logo)}}" alt="">
                                </div>
                            </div>
                            <div class="Related-post-titles pl-0 col-12 col-sm-9 col-md-10 col-lg-7 col-xl-8 mt-2 mt-sm-0">
                                <h4 class="Related-post-title font-14 text-medium text-black mb-2 ">
                                    <a class="text-black hover-text-black" href="{{route("job.show",[$job->id])}}">
                                        {{$job->title}}
                                    </a></h4>
                                <div class="Related-post-title-sub text-yellow font-14 text-light2 mb-0">
                                    استان: {{$job->province->title}}
                                </div>
                            </div>
                        </div>
                        <p style="line-height: 0">سابقه کار: {{$job->work_experience}}</p>
                        <p >میزان تحصیلات: {{$job->education}}</p>
                            <hr class="mb-4">

                        @endforeach
                    </div>
                    </div>
            </div>
        </div>
    </div>

@stop