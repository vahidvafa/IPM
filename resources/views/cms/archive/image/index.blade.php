@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('imageGallery.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">آرشیو عکس ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$images->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عکس</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $img)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{$loop->index+1}}</td>
                            <td data-th="عکس" class="text-right"><img style="max-height: 350px;max-width: 350px" src="{{asset("img/image_archive/$img->photo")}}" /> </td>
                            <td data-th="ویرایش" class="text-right">
                                <a href="{{route('imageGallery.edit',[$img->id])}}" style="color: black !important;" target="_blank">
                                    <i class="material-icons text-gray">edit</i>
                                </a>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('imageGallery.destroy',[$img->id])}}" method="post">
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
                {{$images->links()}}
            </div>
        </div>
    </div>
@endsection
