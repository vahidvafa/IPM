@extends('cms.master')
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">ویرایش نوع عضویت</h4>
            </div>
            <div class="card-body table-responsive yourPlan pack-info">
                <div class="row">
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">sync</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('membership.update',[$membership->id])}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">عنوان عضویت</label>
                                            <input class="form-control" name="title" type="text"
                                                   placeholder="عنوان عضویت"
                                                   value="{{$membership->title}}">
                                            @if ($errors->has('title'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">قیمت</label>
                                            <input class="form-control" name="price" type="text"
                                                   placeholder="قیمت"
                                                   value="{{$membership->price}}">
                                            @if ($errors->has('price'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="price"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">بازه زمانی</label>
                                            <input id="period" name="period"
                                                   class="form-control ckeditor cke_rtl"
                                                   value="{{ $membership->period }}">

                                            @if ($errors->has('period'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="period"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('period') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">مدارک مورد نیاز جهت اپلود توسط کاربران</label>
                                            <textarea
                                                    class="form-control " name="required_documents" >{{$membership->required_documents}}</textarea>
                                            @if ($errors->has('required_documents'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="required_documents"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('required_documents') }}</strong>
                                                </div>
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
                </div>
            </div>
        </div>
    </div>

@endsection
