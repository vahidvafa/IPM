@extends('master')
@section('header')

@stop

@section('content')


    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                      دیتایی یافت نشد
                    </div>
                </div>

                <div class="row mt-5 @if(count($events) == 0)hidden @endif">
                    <div class="v-purple col-12 mt-5 mb-5 row">
                        <h2 class="text-white font-24 text-medium col-10 ">رویداد های مرتبط با کمیته</h2>
                        <a href="{{route('events')}}" class="btn btn-white-border col-1">مشاهده تمامی رویداد</a>
                    </div>
                    @foreach($events as $event)
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card card-news">
                                <div class="card-news-img">
                                    <img src="{{asset('img/posts/'.$event->photo)}}" class=""
                                         style="width: 100% !important;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-14 text-black">
                                        <span>[</span>{{\Morilog\Jalali\Jalalian::forge($event->created_at)->format('%A, %d %B %y')}}
                                        <span>]</span>
                                    </h5>
                                    <p class="card-text font-14">{{$event->title}}</p>
                                    <a href="{{route('news.show',[$event->id])}}"
                                       class="btn btn-news text-yellow text-medium">ادامه مطلب</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </main>

@stop