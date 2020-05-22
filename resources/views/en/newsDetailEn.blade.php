@extends('en.masterEn')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container">
            <div class="detail-main mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-12 ltr text-right">
                        <div class="card img-top-detail">
                            <img class="card-img-top" style="width:auto; height: auto;"
                                 src="{{asset("img/posts/$news->photo")}}" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title text-white m-0">{{$news->title}}</h4>
                            </div>
                        </div>
                        <div class="text-detail mt-4">
                            <p class=" text-black-light font-16 ">{{$news->description}}</p>
                        </div>
                        <div class="list-detail mt-4">
                            <p>
                                {!!  $news->detail !!}
                            </p>
                            </p>
                        </div>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($j = 0 ; $j < count($news->pictures) ; $j++)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$j}}" {{($j == 0) ? 'class="active"' : ''}}></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner" style="max-height: 460px;">
                                @for($i = 0 ; $i < count($news->pictures) ; $i++)
                                    <div class="carousel-item {{($i ==0 ) ? 'active' : ''}}">
                                        <img class="d-block w-100" style="max-height: 460px;"
                                             src="{{asset("img/posts/".$news->pictures[$i]->url)}}">
                                    </div>
                                @endfor
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
@endsection
