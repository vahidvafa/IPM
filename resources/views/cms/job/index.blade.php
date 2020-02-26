@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('news.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">لیست فرصت های شغلی</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان فرصت شغلی</th>
                        <th scope="col">نمایش جزئیات</th>
                        <th scope="col">تایید</th>
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
                    @foreach($jobs as $job)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="عنوان فرصت شغلی" class="text-right">{{$job->title}}</td>
                            <td data-th="نمایش جزئیات" class="text-right">
                                <a href="{{route('cms.job.show',[$job->id])}}">
                                    <i class="material-icons text-gray">pageview</i>
                                </a>
                            </td>
                            <td data-th="تایید" class="text-right">

                                @if($job->state == 0)
                                <form action="{{route('cms.job.store',[$job->id])}}" method="post">
                                    @csrf
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن به تایید این فرصت شغلی هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-success">done</i>
                                    </a>
                                </form>
                                    @endif
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('cms.job.destroy',[$job->id])}}" method="post">
                                    @csrf
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن به حذف فرصت شغلی هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$jobs->links()}}
            </div>
        </div>
    </div>
@endsection
