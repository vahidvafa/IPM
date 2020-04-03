@extends('master')
@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <iframe src="https://docs.google.com/gview?url=http://ipma.vahidizadyar.ir/files/winners/{{$id}}.pdf&embedded=true" style="width:100%;max-height: 1200px;min-height: 500px;"  frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
