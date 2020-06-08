@extends('master')
@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-20 text-yellow text-center text-light2 mb-4">
                            @if($type == 1)
                                سطوح مختلف جایزه ملی مدیریت پروژه
                            @elseif($type == 2)
                                معرفی مدل جایزه ملی مدیریت پروژه (مبنای PEM)
                            @elseif($type == 3)
                                برنامه زمانبندی دوره نهم جایزه ملی مدیریت پروژه
                            @endif
                        </h3>
                        <img style="margin-right: auto;margin-left: auto;display: block;width: 100%"
                             src="{{asset("img/$picture.jpg")}}">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
