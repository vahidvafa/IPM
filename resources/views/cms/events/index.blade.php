@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('event.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">لیست رویداد ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$events->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان رویداد</th>
                        <th scope="col">ویرایش</th>
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
                    @foreach($events as $event)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="عنوان رویداد" class="text-right">
                                <a href="{{route('event',[$event->id])}}" style="color: black !important;" target="_blank">
                                    {{$event->title}}
                                </a>
                            </td>
                            <td data-th="ویرایش" class="text-right">
                                <a href="{{route('event.edit',[$event->id])}}" target="_blank">
                                    <i class="material-icons text-gray">edit</i>
                                </a>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('news.delete',[$event->id])}}" method="post">
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
                {{$events->links()}}
            </div>
        </div>
    </div>
@endsection
