@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
{{--                    <a href="{{route('PassedCourses.create')}}">--}}
                        {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title">لیست دوره های {{$name}}</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">

                <div class="row">
                    <form class="sidebar-form-body form-row"
                          action="{{route('PassedCourses.store')}}" method="post"
                          enctype="multipart/form-data"
                    >
                        @method('post')
                        @csrf

                        <div class="form-group col-5 mb-2 ">
                            <label for="passed_courses_category_id">دسته بندی اصلی</label>
                            <select name="passed_courses_category_id" id="passed_courses_category_id"
                                    onchange="OnSelectCourseCats(this)"
                                    class=" form-control selectpicker"
                                    data-style="btn btn-link">
                                @foreach($PassedCoursesCategory as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                            <input type="hidden" value="{{$id}}" name="selectedUser">

                        <div class="form-group col-md-12 mb-4 ">
                            <label for="course" class="col-12">عنوان دوره</label>
                            <select class="js-example-basic-multiple col-12" name="course[]" id="course"
                                    multiple="multiple">
                                @foreach($PassedCourse as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('course'))
                                <div id="title-error"
                                     class="error text-danger pl-3" for="title"
                                     style="display: block;">
                                    <strong>{{ $errors->first('course') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">ثبت</button>
                        </div>

                    </form>
                </div>
                <div class="row">
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        {{--<th scope="col">دسته بندی اصلی</th>--}}
                        <th scope="col">نام دوره</th>
                        <th scope="col">جزئیات دوره</th>
                        <th scope="col">نمایش جزئیات</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page') - 1);
                        else
                            $i = 0;
                    @endphp
                    @foreach($user as $course)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            {{--<td data-th="نام دوره" class="text-right">{{$courseCategory}}</td>--}}
                            <td data-th="نام دوره" class="text-right">{{$course->title}}</td>
                            <td data-th="جزئیات از دوره" class="text-right">
                                <h4 dir="ltr">{!! $course->content !!}</h4>
                            </td>
                            <td data-th="نمایش جزئیات" class="text-right">
                                    <a  class="ml-3" href="{{route('PassedCourses.edit',[$course->id])}}">
                                        <i class="material-icons text-success">edit</i>
                                    </a>

                            </td>
                            <td data-th="حذف" class="text-right" >
                                <form action="{{route('PassedCourses.byUser.del')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$id}}" name="user" >
                                    <input type="hidden" value="{{$course->id}}" name="course"  >
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن به حذف این دوره هستید؟(این دوره تنها برای این کاربر حذف میشود )") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#course').select2();
        });

        function OnSelectCourseCats(select) {

            $.post("{{route('PassedCourses.bycats')}}",
                {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    cat_id: select.value,
                },
                function (res) {
                    var opt = "";
                    res.forEach(function (course) {
                        opt += "<option value=\"" + course.id + "\">" + course.title + "</option>"
                    });

                    if (opt == "")
                        alert("هیچ دوره ای برای این دسته بندی ثبت نشده است");


                    $('#course').html(opt);
                    // $('#course').select2();
                });

        }

        </script>

@endsection
