@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('eventCategory.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">لیست رویداد ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$eventCat->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان دسته بندی</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($eventCat as $cat)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{$loop->index+1}}</td>
                            <td data-th="عنوان رویداد" class="text-right">
                                <a href="{{route('eventCategory.edit',[$cat->id])}}" style="color: black !important;" target="_blank">
                                    {{$cat->name}}
                                </a>
                            </td>

                            <td data-th="ویرایش" class="text-right">
                                <a href="{{route('eventCategory.edit',[$cat->id])}}" target="_blank">
                                    <i class="material-icons text-gray">edit</i>
                                </a>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('eventCategory.destroy',[$cat->id])}}" method="post">
                                    @csrf
                                    @method('delete')

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
                {{$eventCat->links()}}
            </div>
        </div>
    </div>
@endsection
