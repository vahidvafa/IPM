@extends('master')
@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <a href="{{route('winners_detail',[1])}}">
                                سرارزیابان و ارزیابان دور اول جایزه
                            </a>
                            <br>
                            <a href="{{route('winners_detail',[2])}}">
                                سرارزیابان و ارزیابان دور دوم جایزه
                            </a>
                            <br>
                            <a href="{{route('winners_detail',[3])}}">
                                سرارزیابان و ارزیابان دور سوم جایزه
                            </a>
                            <br>
                            <a href="{{route('winners_detail',[4])}}">
                                سرارزیابان و ارزیابان دور چهارم جایزه
                            </a>
                            <br>
                            <a href="{{route('winners_detail',[5])}}">
                                سرارزیابان و ارزیابان دور پنجم جایزه
                            </a>
                            <br>
                            <a href="{{route('winners_detail',[6])}}">
                                سرارزیابان و ارزیابان دور ششم جایزه
                            </a>
                            <br>
                            <a href="{{route('winners_detail',[7])}}">
                                سرارزیابان و ارزیابان دور هفتم جایزه
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
