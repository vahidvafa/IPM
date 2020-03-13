@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('event.orders.excel',[$event->id])}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">attach_file</i>
                    </a>
                    <h4 class="card-title"> لیست پرداختی های رویداد {{$event->title}}</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$orders->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">کاربر</th>
                        <th scope="col">قیمت خرید</th>
                        <th scope="col">تاریخ خرید</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page') - 1);
                        else
                            $i = 0;
                    @endphp
                    @foreach($orders as $order)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="کاربر" class="text-right">
                                <a href="{{route('profile',[$order->user->slug])}}" style="color: black !important;" target="_blank">
                                    {{ $order->user->first_name.' '.$order->user->last_name }}
                                </a>
                            </td>
                            <td data-th="قیمت خرید" class="text-right">{{ number_format($order->total_price) }}</td>
                            <td data-th="تاریخ خرید" class="text-right">{{ jdate($order->updated_at)->format('Y/m/d H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection
