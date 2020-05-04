@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">افزودن کد تخفیف</h4>
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
                                <form action="{{route('gift.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">انتخاب رویداد</label>
                                            <select name="event_id" class="selectPicker col-6"  required>
                                                @foreach($events as $event)
                                                    <option value="{{$event->id}}">{{$event->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('event_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">انتخاب افراد مجاز</label>
                                            <select name="members_usage" class="form-control" required>
                                                <option disabled selected value>لطفا افراد مجاز را انتخاب کنید</option>
                                                <option value="0">فقط اعضای انجمن</option>
                                                <option value="1">همه ی اعضا</option>
                                            </select>
                                            @error('members_usage')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">انتخاب نوع</label>
                                            <select name="type_id" id="type_id" class="form-control" onchange="changePlaceHolder()" required>
                                                <option disabled selected value>لطفا نوع کد تخفیف را انتخاب کنید</option>
                                                <option value="1">درصدی</option>
                                                <option value="2">مبلغی</option>
                                            </select>
                                            @error('type_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-4 mt-3">
                                            <label class="col-12">حداکثر تعداد استفاده</label>
                                            <input type="text" name="maximum_count" class="form-control" placeholder="اگر کد به صورت نامحدود است 0 وارد کنید">
                                            @error('maximum_count')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4 border-bottom border-dark">
                                            <h4>مهلت استفاده</h4>
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">از تاریخ</label>
                                            <input class="form-control datePickerInputs" name="from_date_display"
                                                   id="from_date_display"
                                                   type="text"
                                                   placeholder="از تاریخ"
                                                   value="{{old('from_date_display')}}"
                                                   autocomplete="off">
                                            <input class="form-control datePickerInputs" name="from_date" id="from_date"
                                                   type="hidden"
                                                   value="{{old('from_date')}}">
                                            @error('from_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">تا تاریخ</label>
                                            <input class="form-control datePickerInputs" name="to_date_display"
                                                   id="to_date_display"
                                                   type="text"
                                                   placeholder="تا تاریخ"
                                                   value="{{old('to_date_display')}}"
                                                   autocomplete="off">
                                            <input class="form-control datePickerInputs" name="to_date" id="to_date"
                                                   type="hidden"
                                                   value="{{old('to_date')}}">
                                            @error('to_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-4 border-bottom border-dark">
                                            <h4>مبلغ</h4>
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12" id="price_label">مبلغ</label>
                                            <input class="form-control" name="price" id="price" type="text"
                                                   value="{{old('price')}}">
                                            @error('price')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label class="col-12">حداقل قیمت ( به ریال )</label>
                                            <input type="text" name="minimum_price" class="form-control" placeholder="اگر محدودیتی نیست 0 وارد کنید">
                                            @error('minimum_price')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label class="col-12">حداکثر قیمت ( به ریال )</label>
                                            <input type="text" name="maximum_price" class="form-control" placeholder="اگر محدودیتی نیست 0 وارد کنید">
                                            @error('maximum_price')
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
        $(document).ready(function () {
            $('.selectPicker').select2();
        });
        $(document).ready(function () {
            $("#to_date_display").pDatepicker(
                {
                    initialValue: false,
                    responsive: true,
                    format: 'L H:m',
                    altFormat: 'X',
                    altField: '#to_date',
                    calendarType: 'persian',
                    timePicker: {
                        enabled: true,
                        second: {
                            enabled: false
                        }
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );
            $("#from_date_display").pDatepicker(
                {
                    initialValue: false,
                    responsive: true,
                    format: 'L H:m',
                    altFormat: 'X',
                    altField: '#from_date',
                    calendarType: 'persian',
                    timePicker: {
                        enabled: true,
                        second: {
                            enabled: false
                        }
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );
            $("#start_register_date_display").pDatepicker(
                {
                    initialValue: false,
                    responsive: true,
                    format: 'L H:m',
                    altFormat: 'X',
                    altField: '#start_register_date',
                    calendarType: 'persian',
                    timePicker: {
                        enabled: true,
                        second: {
                            enabled: false
                        }
                    },
                    toolbox: {
                        enabled: false,
                    }
                }
            );
        });
        function changePlaceHolder() {
            $('')
        }
        $('#type_id').change(function () {
            if ($('#type_id').val() == 2){
                $('#price_label').text('قیمت');
                $('#price').attr('placeholder','ریال به صورت عدد');
            }else{
                $('#price_label').text('درصد');
                $('#price').attr('placeholder','درصد به صورت اعشار');
            }
        })
    </script>
@endsection
