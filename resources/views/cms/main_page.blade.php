@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">مهم ترین رویداد یا خبر</h4>
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
                                <form action="{{route('cms.mainPage.update')}}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">سرتیتر</label>
                                            <input class="form-control" name="head_title" type="text" required
                                                   placeholder="سرتیتر"
                                                   value="{{old('head_title')?:$ipma->head_title}}">
                                            @if ($errors->has('head_title'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('head_title') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">عنوان</label>
                                            <input class="form-control" name="head_subtitle" type="text" required
                                                   placeholder="عنوان"
                                                   value="{{old('head_subtitle')?:$ipma->head_subtitle}}">
                                            @if ($errors->has('head_subtitle'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('head_subtitle') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">توضیحات بیشتر(۲۵۵ حرف)</label>
                                            <div class="editor">
                                                <textarea id="head_description" name="head_description" required
                                                          class="form-control ckeditor cke_rtl">{{ old('head_description')?:$ipma->head_description }}</textarea>
                                            </div>
                                            @if ($errors->has('head_description'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('head_description') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-12 mb-4">
                                        <p for="newsOrEvent" class="col-lg-12" >لطفا یکی از گزینه های زیر را انتخا کنید</p>
                                        <label for="news">احبار</label>
                                        <input type="radio" id="news" name="newsOrEvent" value="0" @if($ipma->news_id!=null) checked @endif />
                                        <label for="event">رویداد</label>
                                        <input type="radio" id="event" name="newsOrEvent" value="1" @if($ipma->event_id!=null) checked @endif  />
                                        </div>

                                        <div class="col-lg-5 mt-3">
                                            <label for="eventInput" class=" col-12">مهم ترین رویداد
                                                </label>
                                            <input type="text" id="eventInput" name="eventInput" class="form-control"
                                                   placeholder="عنوان و یا توضیحات رویداد مورد نظر را انتخاب کنید"
                                                   style="margin-top: -3px" value="@if($ipma->event_id !=null) {{$event->title}} @endif">
                                            <div style="background-color: #fff" class="col-12">
                                                <select class="col-12 form-control hide" id="events" name="event_id">
                                                    <option value="{{$event->id??null}}" selected></option>
                                                </select>
                                            </div>
                                            @if ($errors->has('events'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('events') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-5 mt-3">
                                            <label for="newsInput" class=" col-12">مهم ترین خبر
                                                    </label>
                                            <input type="text" id="newsInput" name="newsInput" class="form-control"
                                                   placeholder="عنوان و یا توضیحات اخبار مورد نظر را انتخاب کنید"
                                                   style="margin-top: -3px" value="@if($ipma->news_id !=null) {{$news->title}} @endif">
                                            <div style="background-color: #fff" class="col-12">
                                                <select class="col-12 form-control hide" id="newss" name="news_id">
                                                    <option value="{{$news->id??null}}" selected></option>
                                                </select>
                                            </div>
                                            @if ($errors->has('news'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('news') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <h3 class="col-12 mt-5  mb-4">پاورقی (footer): </h3>

                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">آدرس انحمن و کد پستی</label>

                                                <textarea id="address" name="address" required
                                                          class="form-control ">{{ old('address')?:$ipma->address }}</textarea>

                                            @if ($errors->has('address'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">تلفن</label>

                                                <input id="tel" name="tel" required type="text"
                                                          class="form-control " value="{{ old('tel')?:$ipma->tel }}" >

                                            @if ($errors->has('tel'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('tel') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">فکس</label>

                                                <input id="fax" name="fax" required type="text"
                                                          class="form-control " value="{{ old('fax')?:$ipma->fax }}" >

                                            @if ($errors->has('fax'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('fax') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">پست الكترونيك دبیرخانه</label>

                                                <input id="secretariat_email" name="secretariat_email" required type="text"
                                                          class="form-control " value="{{ old('secretariat_email')?:$ipma->secretariat_email }}" >

                                            @if ($errors->has('secretariat_email'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('secretariat_email') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 mb-4">
                                            <label class="col-12">پست الکترونیک عضویت</label>

                                                <input id="membership_email" name="membership_email" required type="text"
                                                          class="form-control " value="{{ old('membership_email')?:$ipma->membership_email }}" >

                                            @if ($errors->has('membership_email'))
                                                <div id="title-error"
                                                     class="error text-danger pl-3" for="title"
                                                     style="display: block;">
                                                    <strong>{{ $errors->first('membership_email') }}</strong>
                                                </div>
                                            @endif
                                        </div>


                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">@if($ipma->head_title == "" )
                                                ثبت @else ویرایش @endif </button>
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
    {{--<script src="{{ asset('material/js/core/jquery.min.js') }}"></script>--}}
    <script>
        $(document).ready(function () {
            // $('#events').select2();
        });


        $('#eventInput').on('input', function (e) {
            if (this.value.length >= 4) {

                $.post("{{route('cms.mainPage.search')}}",
                    {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        str: this.value,
                        type: 1,
                    },
                    function (res) {

                        var opt = "";
                        res.forEach(function (event) {
                            opt += "<option value=\"" + event.id + "\">" + event.title + "</option>"
                        });

                        if (opt == "") {
                            $('#events').addClass('hide');
                            alert("متاسفانه خبری با این مشخصات پیدا نشد");

                        } else
                            $('#events').removeClass('hide');


                        $('#events').html(opt);


                    }
                );

            }
        });

        $('#newsInput').on('input', function (e) {
            if (this.value.length >= 4) {
                $.post("{{route('cms.mainPage.search')}}",
                    {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        str: this.value,
                        type: 0,
                    },
                    function (res) {

                        var opt = "";
                        res.forEach(function (news) {
                            opt += "<option value=\"" + news.id + "\">" + news.title + "</option>"
                        });

                        if (opt == "") {
                            $('#newss').addClass('hide');
                            alert("متاسفانه کاربی با این مشخصات پیدا نشد");

                        } else
                            $('#newss').removeClass('hide');


                        $('#newss').html(opt);


                    }
                );

            }
        });

        $('#events').on('change', function() {
            $('#eventInput').val($('#events option:selected').text())
                $(this).addClass('hide');

        });

        $('#newss').on('change', function() {
            $('#newsInput').val($('#newss option:selected').text())
                $(this).addClass('hide');
        });

    </script>
@endsection
