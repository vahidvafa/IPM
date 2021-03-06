@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('news.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">news</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$news->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">row</th>
                        <th scope="col">عنوان خبر</th>
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
                    @foreach($news as $singleNews)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="عنوان خبر" class="text-right">
                                <a href="{{route('news.show',[$singleNews->id])}}" style="color: black !important;" target="_blank">
                                    {{$singleNews->title}}
                                </a>
                            </td>
                            <td data-th="ویرایش" class="text-right">
                                <a href="{{route('news.edit',[$singleNews->id])}}">
                                    <i class="material-icons text-gray">edit</i>
                                </a>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('news.delete',[$singleNews->id])}}" method="post">
                                    @csrf
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$news->links()}}
            </div>
        </div>
    </div>
@endsection
