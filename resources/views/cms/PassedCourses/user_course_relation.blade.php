@extends('cms.master')
@section('content')


    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <h4 class="card-title">ثبت دوره</h4>
                </div>
            </div>
            <div id="menu0" class="card-body">
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


                    <div class="col-5 mt-3">
                        <label for="users" class=" col-12">کاربران(مشخصات کاربر مورد نظر را جستوجو کنید)</label>
                        <input type="text" {{--onchange="searchUser(this)"--}} id="users" class="form-control"
                               style="margin-top: -3px">
                        <div style="background-color: #fff" class="col-12" >
                            <select class="col-12 form-control hide" id="userSelect" name="selectedUser"  >
                            </select>
                        </div>
                        @if ($errors->has('selectedUser'))
                            <div id="title-error"
                                 class="error text-danger pl-3" for="title"
                                 style="display: block;">
                                <strong>{{ $errors->first('selectedUser') }}</strong>
                            </div>
                        @endif
                    </div>


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
        </div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
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

        $('#users').on('input',function(e){

            if (this.value.length >= 4) {
                $.post("{{route('user.search')}}",
                    {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        str: this.value,
                    },
                    function (res) {

                        var opt = "";
                        res.forEach(function (user) {
                            opt += "<option value=\"" + user.id + "\">" + user.first_name+" "+user.last_name + "</option>"
                        });

                        if (opt == "") {
                            $('#userSelect').addClass('hide');
                            alert("متاسفانه کاربی با این مشخصات پیدا نشد");
                        }
                        else
                            $('#userSelect').removeClass('hide');


                        $('#userSelect').html(opt);


                    }
                );

            }
        });



    </script>

@endsection
