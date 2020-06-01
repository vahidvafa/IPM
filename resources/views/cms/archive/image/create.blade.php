@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">آرشیو عکس ها</h4>
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
                                <form action="{{route('imageGallery.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">ادرس اینترنتی (بعد از کلیک بر روی عکس کاربر به ان صفحه هدایت می شود)</label>
                                            <input type="url" class="form-control" name="url" value="{{old('url')}}"  >
                                            @if ($errors->has('url'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="url"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('url') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">اپلود عکس</label>
                                            <input type="file"
                                                   class="form-control" name="photo" >
                                            @if ($errors->has('photo'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="photo"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">ثبت</button>
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
