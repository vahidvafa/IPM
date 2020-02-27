{{--@extends('master')--}}
{{--@section('content')--}}
{{--    @if(count($news) == 0 )--}}

{{--        @include("component.empty_list")--}}

{{--    @else--}}
{{--        @php--}}
{{--            $i=-1;--}}
{{--            $offsets =4;--}}
{{--        @endphp--}}
{{--        <div class="container my-5">--}}
{{--            {{ $news->links() }}--}}
{{--            <div class="row mt-4 mb-4 center-y">--}}
{{--                @foreach($news as $singleNews)--}}
{{--                    @php--}}
{{--                        $i++--}}
{{--                    @endphp--}}
{{--                    @if($i % $offsets == 0 )--}}
{{--                        @if($i != 0)--}}
{{--            </div>--}}
{{--            <div class="row mt-4 mb-4 center-y">--}}
{{--                @endif--}}
{{--                <div class="col-{{12/$offsets}} col-md-{{12/$offsets}} mb-{{12/$offsets}} mb-md-0">--}}
{{--                    <div class="card card-news">--}}
{{--                        <div class="card-news-img">--}}
{{--                            <img src="{{asset('img/events/'.$singleNews->photo)}}" class=""--}}
{{--                                 style="width: 100% !important;">--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title font-14 text-black">--}}
{{--                                <span>[</span>{{\Morilog\Jalali\Jalalian::forge($singleNews->created_at)->format('%A, %d %B %y')}}--}}
{{--                                <span>]</span>--}}
{{--                            </h5>--}}
{{--                            <p class="card-text font-14">{{$singleNews->title}}</p>--}}
{{--                            <a href="{{route('news.show',[$singleNews->id])}}"--}}
{{--                               class="btn btn-news text-yellow text-medium">ادامه مطلب</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @else--}}

{{--                    <div class="col-{{12/$offsets}} col-md-{{12/$offsets}} mb-{{12/$offsets}} mb-md-0 ">--}}
{{--                        <div class="card card-news">--}}
{{--                            <div class="card-news-img">--}}
{{--                                <img src="{{asset('img/events/'.$singleNews->photo)}}" class=""--}}
{{--                                     style="width: 100% !important;">--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title font-14 text-black">--}}
{{--                                    <span>[</span>{{\Morilog\Jalali\Jalalian::forge($singleNews->created_at)->format('%A, %d %B %y')}}--}}
{{--                                    <span>]</span>--}}
{{--                                </h5>--}}
{{--                                <p class="card-text font-14">{{$singleNews->title}}</p>--}}
{{--                                <a href="{{route('news.show',[$singleNews->id])}}"--}}
{{--                                   class="btn btn-news text-yellow text-medium">ادامه مطلب</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                @endif--}}



{{--                @endforeach--}}

{{--                @if(($i+1) == count($news) )--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--    @endif--}}
{{--            {{ $news->links() }}--}}
{{--        </div>--}}
{{--@endsection--}}

@extends('master')
@section('content')
    <div class="container my-5">
        {{ $news->links() }}
        <div class="row my-5">
            @foreach($news as $singleNews)
                <div class="col-12 col-md-4 my-2">
                    <div class="card card-news">
                        <div class="card-news-img">
                            <img src="{{asset("/img/news/$singleNews->photo")}}" class="w-100">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-14 text-black">
                                <span>[</span>{{\Morilog\Jalali\Jalalian::forge($singleNews->created_at)->format('%A, %d %B %y')}}
                                <span>]</span>
                            </h5>
                            <p class="card-text font-14">{{$singleNews->title}}</p>
                            <a href="{{route('event',[$singleNews->id])}}" class="btn btn-news text-yellow text-medium">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $news->links() }}
    </div>
@endsection

