@extends('master')
@section('content')
    <div class="container my-5">
        {{ $events->links() }}
        <div class="row my-5">
            @foreach($events as $event)
                <div class="col-12 col-md-4 my-2">
                    <div class="card card-news">
                        <div class="card-news-img">
                            <img src="{{asset("/img/events/$event->photo")}}" class="w-100">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-14 text-black">
                                <span>
                                    {{ $event->title }}
                                </span>
                            </h5>
                            <p class="card-text font-14">{{substr($event->description,0,150)."..."}}</p>
                            <a href="{{route('event',[$event->id])}}" class="popular-pack-in-img-more font-16 mt-2">
                                شرکت در رویداد
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $events->links() }}
    </div>
@endsection
