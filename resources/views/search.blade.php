@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <form action="{{route('search.post')}}" method="post">
                @csrf
                <input class="form-control" type="text" name="search" placeholder="جستجو">
                <input type="submit" value="جستجو" class="form-submit-violet text-white font-16 text-medium">
            </form>
            <div class="row justify-content-center">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 mt-4 pr-0">
                    <li class="nav-item">
                        <a class="nav-link active font-22 text-black text-regular" data-toggle="tab" href="#news">
                            اخبار
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  font-22 text-black-light text-regular" data-toggle="tab" href="#events">
                            سمینار ها
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content col-12 last-pack-content ">
                    <div class="tab-pane row  active" id="news">
                        @foreach($news as $singleNews)
                            <div class="last-pack-content-in col-12 col-md-6 col-lg-12  mb-3 mt-3 pt-4 pb-4">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-8 d-lg-flex align-items-center text-lg-left text-center">
                                        <div class="last-pack-content-in-img mt-3 mt-lg-0 mb-3 mb-lg-0">
                                            <div class="last-pack-content-in-img-in">
                                                <img src="{{asset('img/news/' . $singleNews->photo)}}"
                                                     alt="{{$singleNews->title}}">
                                            </div>
                                        </div>
                                        <div class="last-pack-content-in-description pl-3">
                                            <h2 class="text-black font-16 text-medium mb-3"> {{$singleNews->title}} </h2>
                                        </div>
                                    </div>
                                    <div
                                        class="last-pack-content-in-more text-center col-12 col-lg-2 text-lg-left text-center">
                                        <a href="{{route('news.show',[$singleNews->id])}}" class="btn btn-white-border"
                                           target="_blank">
                                            ورود به صفحه
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane row fade" id="events">
                        @foreach($events as $event)
                            <div class="last-pack-content-in col-12 col-md-6 col-lg-12  mb-3 mt-3 pt-4 pb-4">
                                <div class="row align-items-center">
                                    <div class="last-pack-content-in-time text-lg-left text-center col-12 col-lg-2">
                                        <p class="text-medium font-14  mb-1 mb-lg-2">شروع ثبت نام :<span class="pl-3">۲۶/۵/۹۸</span>
                                        </p>
                                        <p class="text-medium font-14 m-0">تاریخ برگزاری : <span
                                                class="pl-3">۲۶/۵/۹۸</span></p>
                                    </div>
                                    <div class="col-12 col-lg-8 d-lg-flex align-items-center text-lg-left text-center">
                                        <div class="last-pack-content-in-img mt-3 mt-lg-0 mb-3 mb-lg-0">
                                            <div class="last-pack-content-in-img-in">
                                                <img src="{{asset('img/events/' . $event->photo)}}"
                                                     alt="{{$event->title}}">
                                            </div>

                                        </div>
                                        <div class="last-pack-content-in-description pl-3">
                                            <h2 class="text-black font-16 text-medium mb-3"> {{$event->title}} </h2>
                                        </div>
                                    </div>

                                    <div
                                        class="last-pack-content-in-more text-center col-12 col-lg-2 text-lg-left text-center">
                                        <a href="{{route('event',[$event->id])}}" class="btn btn-white-border">شرکت در
                                            رویداد</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
