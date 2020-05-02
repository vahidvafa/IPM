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
                      action="{{route('PassedCourses.store.sk')}}" method="post"
                      enctype="multipart/form-data"
                >

                    @csrf
                    <input type="hidden" name="user_id" value="{{request('id')}}">
                    <div class="editor">
                        <label for="content">متن دوره</label>
                        <textarea id="content" name="content"
                                  class="form-control ckeditor cke_rtl">{!! old('content')??$passedCourses->content??"" !!}</textarea>
                        @if ($errors->has('content'))
                            <div id="title-error"
                                 class="error text-danger pl-3" for="title"
                                 style="display: block;">
                                <strong>{{ $errors->first('content') }}</strong>
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

    <script type="text/javascript">
        CKEDITOR.replace('content', {
            contentsLangDirection: "rtl",

        });
        CKEDITOR.config.autoParagraph = false;

    </script>

    {{--
    <ul>
	<li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. [ از 89 تا 95 ]</li>
	<li>
	<p>مدارک و گواهینامه های گذرانده شده</p>
	</li>
</ul>

<ol>
	<li>ششس</li>
	<li>شسیش</li>
</ol>

<p><img alt="SASDSF" src="http://localhost/img/level-A.jpg" style="float:right; height:42px; width:34px" />&nbsp; سیست نشتسی شسنیسششسی</p>

<p>شسیشسیشسیییشسیشسی</p>
--}}

@endsection