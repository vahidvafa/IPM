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
                                    <i class="material-icons">sync</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('news.update',[$news->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">news title</label>
                                            <input class="form-control" name="title" type="text" placeholder="news title"
                                                   value="{{$news->title}}">
                                            @error('title')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">brief news</label>
                                            <input class="form-control" name="description" type="text"
                                                   placeholder="خلاصه خبر"
                                                   value="{{$news->description}}">
                                            @error('description')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">news description</label>
                                            <div class="editor">
                                                <textarea id="detail" name="detail"
                                                          class="form-control ckeditor cke_rtl">{{ $news->detail }}</textarea>
                                            </div>
                                            @error('detail')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">news photo ( for change news photo ، upload new photo )</label>
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
                                        <button class="btn btn-success" type="submit">edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">ویرایش گالری</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    @foreach($news->pictures as $picture)
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="card card-stats">
                                                <div class="card-header card-header-warning card-header-icon">
                                                    <div class="card-icon">
                                                        <i class="material-icons">image</i>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{route('picture.delete',$picture->id)}}" method="post" class="my-2">
                                                            @csrf
                                                            <img src="{{asset('img/news/'.$picture->url)}}" style="width: 150px;height: 150px">
                                                            <button class="btn btn-danger btn-link" type="button" onclick="confirm('{{ __("string.delete.sure") }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
