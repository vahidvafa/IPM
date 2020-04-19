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
                                <form action="{{route('newsOrEvent.update')}}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <label>سرتیتر</label>
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
                                            <label>عنوان</label>
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
                                            <label>توضیحات بیشتر(۲۵۵ حرف)</label>
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
                                            <label for="eventInput" class=" col-12">رویداد مورد نظر برای باز شدن صفحه
                                                جزیات</label>
                                            <input type="text" id="eventInput" class="form-control"
                                                   placeholder="عنوان و یا توضیحات رویداد مورد نظر را انتخاب کنید"
                                                   style="margin-top: -3px">
                                            <div style="background-color: #fff" class="col-12">
                                                <select class="col-12 form-control hide" id="events" name="event_id"
                                                        required>
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
                                            <label for="newsInput" class=" col-12">اخبار مورد نظر برای باز شدن صفحه
                                                جزیات</label>
                                            <input type="text" id="newsInput" class="form-control"
                                                   placeholder="عنوان و یا توضیحات اخبار مورد نظر را انتخاب کنید"
                                                   style="margin-top: -3px">
                                            <div style="background-color: #fff" class="col-12">
                                                <select class="col-12 form-control hide" id="newss" name="news_id" required>
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

                $.post("{{route('cms.newsOrEvent.search')}}",
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
                            alert("متاسفانه کاربی با این مشخصات پیدا نشد");
                        } else
                            $('#events').removeClass('hide');


                        $('#events').html(opt);


                    }
                );

            }
        });

        $('#newsInput').on('input', function (e) {
            if (this.value.length >= 4) {
                $.post("{{route('cms.newsOrEvent.search')}}",
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
    </script>
@endsection
