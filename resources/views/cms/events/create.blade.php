@extends('cms.master')
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">افزودن رویداد</h4>
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
                                <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>عنوان رویداد</lable>
                                            <input class="form-control" name="title" type="text"
                                                   placeholder="عنوان رویداد"
                                                   value="{{old('title')}}">
                                            @error('title')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>خلاصه دوره</lable>
                                            <input class="form-control" name="description" type="text"
                                                   placeholder="خلاصه دوره"
                                                   value="{{old('description')}}">
                                            @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>سرفصل های دوره</lable>
                                            <div class="editor">
                                                <textarea id="course_headings" name="course_headings"
                                                          class="form-control ckeditor cke_rtl">{{ old('course_headings') }}</textarea>
                                            </div>
                                            @error('course_headings')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>متن رویداد</lable>
                                            <div class="editor">
                                                <textarea id="detail" name="detail"
                                                          class="form-control ckeditor cke_rtl">{{ old('detail') }}</textarea>
                                            </div>
                                            @error('detail')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>از تاریخ</lable>
                                            <input class="form-control datePickerInputs" name="from_date" id="from_date"
                                                   type="text"
                                                   placeholder="از تاریخ"
                                                   value="{{old('from_date')}}">
                                            @error('from_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>تا تاریخ</lable>
                                            <input class="form-control datePickerInputs" name="to_date" id="to_date"
                                                   type="text"
                                                   placeholder="تا تاریخ"
                                                   value="{{old('to_date')}}">
                                            @error('to_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>تاریخ شروع ثبت نام</lable>
                                            <input class="form-control datePickerInputs" name="start_register_date"
                                                   type="text"
                                                   placeholder="تاریخ شروع ثبت نام"
                                                   value="{{old('start_register_date')}}">
                                            @error('start_register_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>قیمت (ریال به صورت عدد)</lable>
                                            <input class="form-control" name="price" type="text" placeholder="قیمت"
                                                   value="{{old('price')}}">
                                            @error('price')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>شماره تلفن</lable>
                                            <input class="form-control" name="tel" type="text" placeholder="شماره تلفن"
                                                   value="{{old('tel')}}">
                                            @error('tel')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>آدرس</lable>
                                            <input class="form-control" name="address" type="text" placeholder="آدرس"
                                                   value="{{old('address')}}">
                                            @error('address')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>عرض جغرافیایی</lable>
                                            <input class="form-control" name="latitude" type="text"
                                                   placeholder="عرض جغرافیایی"
                                                   value="{{old('latitude')}}">
                                            @error('latitude')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>طول جغرافیایی</lable>
                                            <input class="form-control" name="longitude" type="text"
                                                   placeholder="طول جغرافیایی"
                                                   value="{{old('longitude')}}">
                                            @error('longitude')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>دسته بندی</lable>
                                            <select class="form-control" name="event_category_id">
                                                @foreach(\App\EventCategory::all() as $category)
                                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                                @endforeach
                                            </select>
                                            @error('event_category_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>استان</lable>
                                            <select class="form-control" name="province_id">
                                                @foreach(\App\Province::all() as $province)
                                                    <option value="{{$province->id}}"> {{$province->title}} </option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <lable>عکس رویداد</lable>
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
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('detail', {
            contentsLangDirection: "rtl",
        });
        CKEDITOR.replace('course_headings', {
            contentsLangDirection: "rtl",
        });
        $(document).ready(function() {
            $(".datePickerInputs").pDatepicker(
                {
                    altFormat:'YYYY/MM/DD',
                    viewMode:'year',
                    timePicker: {
                        enabled:true
                    }
                }
            );
        });
    </script>
@endsection
