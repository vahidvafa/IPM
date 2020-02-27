@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <h4 class="card-title">لیست پیام ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">متن</th>
                        <th scope="col">تاریخ و ساعت</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page') - 1);
                        else
                            $i = 0;
                    @endphp
                    @foreach($messages as $message)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="نام" class="text-right">{{$message->name}}</td>
                            <td data-th="ایمیل" class="text-right">{{$message->email}}</td>
                            <td data-th="متن" class="text-right">
                                <textarea class="form-control" disabled rows="6" cols="20">{{$message->detail}}</textarea>
                            </td>
                            <td data-th="تاریخ و ساعت" class="text-right">
                                <h4 dir="ltr">
                                    {{tr_num(jdate($message->created_at)->format('Y/m/d H:i:s'),'fa')}}
                                </h4>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('message.delete',[$message->id])}}" method="post">
                                    @csrf
                                    <a href="#"
                                       onclick="confirm('{{ __("آیا مطمئن هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$messages->links()}}
            </div>
        </div>
    </div>
@endsection
