@extends('en.masterEn')
@section('content')
    <div class="container my-5" style="direction: ltr;text-align:left;">
        {{ $news->links() }}
        <div class="row my-5">
            @foreach($news as $singleNews)
                <div class="col-12 col-md-4 my-2">
                    <div class="card card-news">
                        <div class="card-news-img">
                            <img src="{{asset('img/posts/'.$singleNews->photo)}}" class=""
                                 style="width: 100% !important;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-14 text-black">
                                <span>[</span>
                                {{\Carbon\Carbon::parse($singleNews->created_at)->format('m/d/Y')}}
                                <span>]</span>
                            </h5>
                            <p class="card-text font-14">{{$singleNews->title}}</p>
                            <a href="{{route('news.show.en',[$singleNews->id])}}"
                               class="btn btn-news text-yellow text-medium">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $news->links() }}
    </div>
@endsection

