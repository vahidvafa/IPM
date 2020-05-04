@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <div class="col-sm-12 shadow my-3 p-5">
                <h5 class="text-center text-success">
                    مبلغ قابل پرداخت :{{tr_num(number_format($price),'fa')}} ریال
                </h5>
                <br>
                <h5 class="text-center text-black">
                    {{ $comment }}
                </h5>
                <hr>
                <form id='samanpeyment' action='https://sep.shaparak.ir/payment.aspx' method='post'>
                    <input type='hidden' name='Amount' value='{{$price}}'>
                    <input type='hidden' name='ResNum' value='{{$resNum}}'>
                    <input type='hidden' name='RedirectURL' value='{{$redirectURL}}'>
                    <input type='hidden' name='MID' value='{{$merchantCode}}'>
                    <button type="submit" class="col-3 btn btn-white-border center-y center-x d-block">خرید</button>
                </form>
            </div>
        </div>
    </main>
@endsection

