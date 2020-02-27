@extends('cms.master')
@section('content')
    <script src="{{asset('js/jquery.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
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
                        <select name="passed_courses_category_id" id="passed_courses_category_id"
                                class=" col-4 form-control selectpicker"
                                data-style="btn btn-link">
                            @foreach($PassedCoursesCategory as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12 mb-4 ">
                        <label for="title" class="col-12">عنوان دوره</label>
                        <select class="js-example-basic-multiple" name="states[]" id="sl" multiple="multiple">
                            @foreach($PassedCourses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('title'))
                            <div id="title-error"
                                 class="error text-danger pl-3" for="title"
                                 style="display: block;">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">ثبت</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script async>
    $(document).ready(function() {
    $('#sl').select2();
    });
    </script>

@endsection