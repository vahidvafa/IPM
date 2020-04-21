@extends('master')
@section('header')

@stop

@section('content')

    <div class="container my-5" dir="ltr" >

        <div class="row my-5">
            @for($i=1 ; $i<=10 ; $i++)
                <div class="col-12 col-md-4 my-2 shadow-sm">
                    <div class="card card-news ">
                        <div class="card-news-img">
                            <img src="{{asset("img/image_archive/$i.jpeg")}}" class="w-100">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-14 text-black">تست {{$i}}
                            </h5>
                            <a href="{{route('ImageArchiveGallery')}}" class="btn btn-news text-dark-violet text-medium">
                                نمایش تما عکس ها
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

    </div>

@stop