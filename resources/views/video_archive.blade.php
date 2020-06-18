@extends('master')
@section('header')

@stop

@section('content')

    <div class="container pt-5 mb-5">
            <div class="row ">
                @foreach($videos as $video)
                    <div class="col-6 mb-5">
                        {!! $video->sourceCode !!}
                    </div>
                @endforeach
            </div>
    </div>
@stop
