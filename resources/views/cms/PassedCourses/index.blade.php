@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('PassedCourses.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">لیست دوره ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام دوره</th>
                        <th scope="col">جزئیات دوره</th>
                        <th scope="col">نمایش جزئیات</th>
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
                    @foreach($PassedCourses as $course)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="نام دوره" class="text-right">{{$course->title}}</td>
                            <td data-th="جزئیات از دوره" class="text-right">
                                <h4 dir="ltr">{!! $course->content !!}</h4>
                            </td>
                            <td data-th="نمایش جزئیات" class="text-right pl-1">
                                    <a href="{{route('PassedCourses.edit',[$course->id])}}">
                                        <i class="material-icons text-success">pageview</i>
                                    </a>

                            </td>
                            <td data-th="حذف" class="text-right" >
                                <form action="{{route('PassedCourses.del',[$course->id])}}" method="post">
                                    @csrf
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن به حذف این دوره هستید؟( دقت کنید که منکن است بعضی از کاربران این دوره را گدرانده باشند و در پروفایل خود نوشته شده است )") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$PassedCourses->links()}}
            </div>
        </div>
    </div>
@endsection
