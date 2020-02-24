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
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">add_box</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('event.update',[$event->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>عنوان خبر</lable>
                                            <input class="form-control" name="title" type="text"
                                                   placeholder="عنوان سمینار"
                                                   value="{{$event->title}}">
                                            @error('title')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>خلاصه دوره</lable>
                                            <input class="form-control" name="description" type="text"
                                                   placeholder="خلاصه دوره"
                                                   value="{{$event->description}}">
                                            @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>سرفصل های دوره</lable>
                                            <div class="editor">
                                                <textarea id="course_headings" name="course_headings"
                                                          class="form-control ckeditor cke_rtl">{{ $event->course_headings }}</textarea>
                                            </div>
                                            @error('course_headings')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <lable>متن سمینار</lable>
                                            <div class="editor">
                                                <textarea id="detail" name="detail"
                                                          class="form-control ckeditor cke_rtl">{{ $event->detail }}</textarea>
                                            </div>
                                            @error('detail')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>از تاریخ</lable>
                                            <input class="form-control datePickerInputs" name="from_date_display" id="from_date_display" type="text"
                                                   placeholder="از تاریخ"
                                                   value="{{tr_num(jdate($event->from_date)->format('Y/m/d H:i'),'fa')}}">
                                            <input class="form-control datePickerInputs" name="from_date" id="from_date" type="hidden"
                                                   value="{{$event->from_date}}">
                                            @error('from_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>تا تاریخ</lable>
                                            <input class="form-control datePickerInputs" name="to_date_display" id="to_date_display" type="text"
                                                   placeholder="تا تاریخ"
                                                   value="{{tr_num(jdate($event->to_date)->format('Y/m/d H:i'),'fa')}}">
                                            <input class="form-control datePickerInputs" name="to_date" id="to_date" type="hidden"
                                                   value="{{$event->to_date}}">
                                            @error('to_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>تاریخ شروع ثبت نام</lable>
                                            <input class="form-control datePickerInputs" name="start_register_date_display" id="start_register_date_display" type="text"
                                                   placeholder="تاریخ شروع ثبت نام"
                                                   value="{{tr_num(jdate($event->start_register_date)->format('Y/m/d H:i'),'fa')}}">
                                            <input class="form-control datePickerInputs" name="start_register_date" id="start_register_date" type="hidden"
                                                   value="{{$event->start_register_date}}">
                                            @error('start_register_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>قیمت (ریال به صورت عدد)</lable>
                                            <input class="form-control" name="price" type="text" placeholder="قیمت"
                                                   value="{{$event->price}}">
                                            @error('price')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>شماره تلفن</lable>
                                            <input class="form-control" name="tel" type="text" placeholder="شماره تلفن"
                                                   value="{{$event->tel}}">
                                            @error('tel')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>آدرس</lable>
                                            <input class="form-control" name="address" type="text" placeholder="آدرس"
                                                   value="{{$event->address}}">
                                            @error('address')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>عرض جغرافیایی</lable>
                                            <input class="form-control" name="latitude" type="text"
                                                   placeholder="عرض جغرافیایی"
                                                   value="{{$event->latitude}}">
                                            @error('latitude')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>طول جغرافیایی</lable>
                                            <input class="form-control" name="longitude" type="text"
                                                   placeholder="طول جغرافیایی"
                                                   value="{{$event->longitude}}">
                                            @error('longitude')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <lable>دسته بندی</lable>
                                            <select class="form-control" name="event_category_id">
                                                @foreach(\App\EventCategory::all() as $category)
                                                    <option value="{{$category->id}}" {{ ($category->id == $event->event_category_id) ? 'selected' : '' }} > {{$category->name}} </option>
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
                                                    <option value="{{$province->id}}" {{ ($province->id == $event->province_id) ? 'selected' : '' }} > {{$province->title}} </option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <lable>عکس سمینار</lable>
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
            $("#to_date_display").pDatepicker(
                {
                    initialValue:false,
                    responsive:true,
                    format:'L H:m',
                    altFormat:'X',
                    altField: '#to_date',
                    calendarType:'persian',
                    timePicker: {
                        enabled:true,
                        second:{
                            enabled:false
                        }
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );
            $("#from_date_display").pDatepicker(
                {
                    initialValue:false,
                    responsive:true,
                    format:'L H:m',
                    altFormat:'X',
                    altField: '#from_date',
                    calendarType:'persian',
                    timePicker: {
                        enabled:true,
                        second:{
                            enabled:false
                        }
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );
            $("#start_register_date_display").pDatepicker(
                {
                    initialValue:false,
                    responsive:true,
                    format:'L H:m',
                    altFormat:'X',
                    altField: '#start_register_date',
                    calendarType:'persian',
                    timePicker: {
                        enabled:true,
                        second:{
                            enabled:false
                        }
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );
        });
    </script>
@endsection
