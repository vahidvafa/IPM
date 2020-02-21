@extends('cms.master')
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">افزودن خبر</h4>
            </div>
            <div class="card-body table-responsive yourPlan pack-info">
                <div class="row">
                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs"></div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">add_box</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>عنوان خبر</lable>
                                            <input class="form-control" name="title" type="text" placeholder="عنوان خبر"
                                                   value="{{old('title')}}">
                                            @error('title')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>خلاصه خبر</lable>
                                            <input class="form-control" name="description" type="text"
                                                   placeholder="خلاصه خبر"
                                                   value="{{old('description')}}">
                                            @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>متن خبر</lable>
                                            <div class="editor">
                                                <textarea id="detail" name="detail"
                                                          class="form-control ckeditor cke_rtl">{{ old('detail') }}</textarea>
                                            </div>
                                            @error('detail')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <lable>عکس خبر</lable>
                                            <input class="form-control-file my-2" type="file" name="image" id="image">
                                            @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">افزودن</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs"></div>
                </div>
            </div>
        </div>
    </div>
    {{--    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>--}}
    <script type="text/javascript">
        CKEDITOR.replace('detail', {
            contentsLangDirection: "rtl",
        });
    </script>
@endsection
