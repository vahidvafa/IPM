@extends('cms.master')
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">add news</h4>
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
                                <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">news title</label>
                                            <input class="form-control" name="title" type="text" placeholder="news title"
                                                   value="{{old('title')}}">
                                            @error('title')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">brief news</label>
                                            <input class="form-control" name="description" type="text"
                                                   placeholder="brief news"
                                                   value="{{old('description')}}">
                                            @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">news description</label>
                                            <div class="editor">
                                                <textarea id="detail" name="detail"
                                                          class="form-control ckeditor cke_rtl">{{ old('detail') }}</textarea>
                                            </div>
                                            @error('detail')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">news photo</label>
                                            <input class="form-control-file my-2" type="file" name="image" id="image">
                                            @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">gallery ( please select all photo for gallery )</label>
                                            <input class="form-control"
                                                   name="pictures[]" id="input-content" type="file" multiple>
                                            @error('pictures')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">add</button>
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
    {{--    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>--}}
    <script type="text/javascript">
        CKEDITOR.replace('detail', {
            contentsLangDirection: "rtl",
        });
    </script>
@endsection
