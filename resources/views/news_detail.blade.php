@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container">
            <div class="detail-main mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card img-top-detail">
                            <img class="card-img-top" src="{{asset("img/events/$news->photo")}}" alt="Card image">
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
