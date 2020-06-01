@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">آرشیو ویدیو ها</h4>
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
                                <form action="{{route('videoGallery.update',[$video->id])}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">نام فایل(برای نشان دادن در لیست )</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')??$video->name}}" required >
                                            @if ($errors->has('name'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="name"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">کد اپارات</label>
                                            <textarea dir="ltr" rows="8"
                                                    class="form-control" name="sourceCode" required>{{old('sourceCode')??$video->sourceCode}}</textarea>
                                            @if ($errors->has('sourceCode'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="sourceCode"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('sourceCode') }}</strong>
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
