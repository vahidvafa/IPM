@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <h4 class="card-title">لیست انواع عضویت</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">

                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">ویرایش</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page') - 1);
                        else
                            $i = 0;
                    @endphp
                    @foreach($memberships as $membership)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="عنوان" class="text-right">{{$membership->title}}</td>
                            <td data-th="ویرایش" >
                            <a href="{{route('membership.edit',[$membership->id])}}">
                                <i class="material-icons text-danger">edit</i>
                            </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection
