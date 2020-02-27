@extends('cms.master')
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    {{--<a href="{{route('cms.user.create')}}">--}}
                    {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title">ثبت دوره</h4>
                </div>
            </div>
            <div id="menu0" class="card-body">
                <form class="sidebar-form-body row"
                      action="{{route('PassedCourses.store')}}" method="post"
                      enctype="multipart/form-data"
                >
                    @method('post')
                    @csrf
                    <div class="form-group col-12 mb-4">
                        <label for="passed_courses_category_id">دسته بندی اصلی</label>
                        <select name="passed_courses_category_id" id="passed_courses_category_id" class=" col-4 form-control selectpicker"
                                data-style="btn btn-link">
                            @foreach($PassedCoursesCategory as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12 mb-4 ">
                        <label for="title" class="col-12">عنوان دوره</label>
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{old('title')}}"
                               aria-invalid="false"
                               required>
                        @if ($errors->has('title'))
                            <div id="title-error"
                                 class="error text-danger pl-3" for="title"
                                 style="display: block;">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="editor">
                        <label for="content">متن دوره</label>
                        <textarea id="content" name="content"
                                  class="form-control ckeditor cke_rtl"></textarea>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">ثبت</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        CKEDITOR.replace('content', {
            contentsLangDirection: "rtl",
        });
    </script>
@endsection