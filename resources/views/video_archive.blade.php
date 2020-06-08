@extends('master')
@section('header')

@stop

@section('content')

    <div class="container pt-5 mb-5">
        @foreach($rows as $row)
            <div class="row my-4">
                @foreach($row as $video)
                    <div class="col-6">
                        {!! $video->sourceCode !!}
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop
