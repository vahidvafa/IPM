@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">ویرایش دسته بندی رویداد ها</h4>
            </div>
            <div class="card-body table-responsive yourPlan pack-info">
                <div class="row">
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">add_box</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('eventCategory.update',[$cat->id])}}" method="post">
                                    @csrf
                                    @method('patch')

                                    <div class="row">

                                        <div class="col-12 mb-4 mt-3 form-group">
                                            <label class="col-12">نام دسته بندی</label>
                                            <input class="form-control my-2" type="text" name="name"
                                                   value="{{$cat->name}}"
                                            >
                                            @if($errors->has('name'))
                                                <div class="error text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
