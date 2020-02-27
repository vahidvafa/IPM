@extends('master',['titleHeader'=>$titleHeader,'breadcrumb'=>$code])
@section('content')
    <div class="container">
        <div class="row profile-top py-5 my-5" style="height: 370px">
            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <div class="row">
                    <div class="col-12 text-center my-5">
                        <img class="img-fluid" style="width: 100px;height: 100px;"
                             src="{{asset('img/close.png')}}">
                    </div>
                    <div class="col-12 text-center my-1">
                        <h4 class="text-danger">
                            @yield('message')
                        </h4>
                    </div>
                </div>
            </div>
            <div class="profile-top-svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.5 607.6">
                    <path
                        d="M5.1,0c28.2,19.8,54.2,48.1,71.6,86.8C140.3,242.3,17,370.8,2,468.5c-12.7,83.3,42.1,144.6,221.2,138.7V0H5.1z"></path>
                </svg>
            </div>
        </div>
    </div>
@endsection
