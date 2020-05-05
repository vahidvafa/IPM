@extends('cms.master')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    {{--<a href="{{route('cms.user.create')}}">--}}
                    {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title"> ارتقا کاربر (
                         @if($user->active == 4)
                             منتطر پرداخت یا مشکل در پرداخت
                         @else
                             پرداخت شده
                         @endif
                         {{")"}}
                    </h4>

                </div>
            </div>

            <div id="menu0" class="card-body">
                <h2 class=" font-22 text-medium text-black mt-5 mb-4">
                    فرم {{$membership->title}}
                </h2>
                <form class="sidebar-form-body row"
                      action="{{route('user.updateAdm')}}" method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="type"
                           value="{{$membership->id}}">
                    <input type="hidden" name="tmp"
                           value="{{request('id')}}">

                    <div class="form-group col-md-6 mb-3 ">
                        <label for="first_name" class="col-12">نام *</label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                               value="{{old('first_name')??$user->first_name}}"
                               aria-invalid="false"
                               required>
                        @if ($errors->has('first_name'))
                            <div id="first_name-error"
                                 class="error text-danger pl-3" for="first_name"
                                 style="display: block;">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </div>

                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 ">
                        <label for="last_name" class="col-12">نام خانوادگی *</label>
                        <input type="text" name="last_name"
                               value="{{old('last_name')??$user->last_name}}"
                               class="form-control" aria-invalid="false"
                               placeholder="نام خانوادگی *" required>

                        @if ($errors->has('last_name'))
                            <div id="last_name-error"
                                 class="error text-danger pl-3" for="last_name"
                                 style="display: block;">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 ">
                        <label for="name_en" class="col-12">نام و نام خانوادگی انگلیسی*</label>
                        <input type="text" name="name_en"
                               value="{{old('name_en')??$user->name_en}}"
                               class="form-control" aria-invalid="false"
                               placeholder="نام و نام خانوادگی انگلیسی*"
                               required>

                        @if ($errors->has('name_en'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('name_en') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 ">
                        <label for="profile[father_name]" class="col-12">نام پدر*</label>
                        <input type="text" name="profile[father_name]" id="profile[father_name]"
                               value="{{old('profile.father_name')??$user->profile->father_name}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.father_name'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.father_name') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 ">
                        <label for="profile[national_code]" class="col-12">کد ملی*</label>
                        <input type="text" name="profile[national_code]" id="profile[national_code]"
                               value="{{old('profile.national_code')??$user->profile->national_code}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.national_code'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.national_code') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 ">
                        <label for="profile[certificate_number]" class="col-12">شماره شناسنامه*</label>
                        <input type="text" name="profile[certificate_number]" id="profile[certificate_number]"
                               value="{{old('profile.certificate_number')??$user->profile->certificate_number}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.certificate_number'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.certificate_number') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="birth_date" class="col-12">تاریخ تولد*</label>
                        <input type="text" name="profile[birth_date]" id="birth_date"
                               value="{{old('profile.birth_date')??$user->profile->birth_date}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.birth_date'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.birth_date') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="profile[birth_place]" class="col-12">محل تولد*</label>
                        <input type="text" name="profile[birth_place]" id="profile[birth_place]"
                               value="{{old('profile.birth_place')??$user->profile->birth_place}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.birth_place'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.birth_place') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 mt-3 py-2 px-4">
                        <label for="profile[sex]">جنسیت : </label>
                        <input type="radio" class="option-input"
                               name="profile[sex]"
                               value="1"
                               aria-invalid="false" required @if($user->profile->sex == 1) checked @endif>
                        مرد
                        <input type="radio" class="option-input"
                               name="profile[sex]" value="0"
                               aria-invalid="false" required @if($user->profile->sex == 0) checked @endif>
                        زن
                        @if ($errors->has('profile.sex'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.sex') }}</strong>
                            </div>
                        @endif
                    </div>

     {{--               <div class="form-group col-md-6 mb-3 mt-3">
                        <label for="profile[work_address]" class="col-12">نشانی محل کار *</label>
                        <input type="text" name="profile[work_address]" id="profile[work_address]"
                               value="{{old('profile.work_address')??$user->profile->work_address}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.work_address'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.work_address') }}</strong>
                            </div>
                        @endif

                    </div>--}}

                    {{--<div class="form-group col-md-6 mb-3">
                        <label for="profile[work_post]" class="col-12">کد پستی محل کار *</label>
                        <input type="text" name="profile[work_post]" id="profile[work_post]"
                               value="{{old('profile.work_post')??$user->profile->work_post}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.work_post'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.work_post') }}</strong>
                            </div>
                        @endif

                    </div>--}}

                    {{--<div class="form-group col-md-6 mb-3">
                        <label for="profile[home_address]" class="col-12">نشانی منزل *</label>
                        <input type="text" name="profile[home_address]" id="profile[home_address]"
                               value="{{old('profile.home_address')??$user->profile->home_address}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.home_address'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.home_address') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="profile[home_post]" class="col-12">کد پستی منزل *</label>
                        <input type="text" name="profile[home_post]" id="profile[home_post]"
                               value="{{old('profile.home_post')??$user->profile->home_post}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.home_post'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.home_post') }}</strong>
                            </div>
                        @endif

                    </div>--}}

                    {{--<div class="form-group col-md-6 mb-3">
                        <label for="profile[work_name]" class="col-12">محل کار *</label>
                        <input type="text" name="profile[work_name]" id="profile[work_name]"
                               value="{{old('profile.work_name')??$user->profile->work_name}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.work_name'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.work_name') }}</strong>
                            </div>
                        @endif

                    </div>--}}

                    {{--<div class="form-group col-md-6 mb-3 py-2 px-4">
                        <label for="">انتخاب نشانی ارسال مراسلات : </label>
                        <input type="radio" class="option-input"
                               name="profile[receive_place]" value="0"
                               aria-invalid="false" required @if($user->profile->receive_place == 0) checked @endif >
                        منزل
                        <input type="radio" class="option-input"
                               name="profile[receive_place]" value="1"
                               aria-invalid="false" required @if($user->profile->receive_place == 1) checked @endif >
                        محل کار
                        @if ($errors->has('receive_place'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('receive_place') }}</strong>
                            </div>
                        @endif
                    </div>--}}

                    <div class="form-group col-md-6 mb-3">
                        <label for="password" class="col-12">رمز عبور*</label>
                        <input type="password" name="password" value=""
                               class="form-control" aria-invalid="false"
                        >

                        @if ($errors->has('password'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="mobile" class="col-12">موبایل*</label>
                        <input type="text" name="mobile"
                               value="{{old('mobile')??$user->mobile}}"
                               class="form-control" aria-invalid="false"
                        >
                        @if ($errors->has('mobile'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="mobile"
                                 style="display: block;">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="email" class="col-12">ایمیل</label>
                        <input type="text" name="email"
                               value="{{old('email')??$user->email}}"
                               class="form-control" aria-invalid="false"
                        >

                        @if ($errors->has('email'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="email"
                                 style="display: block;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif

                    </div>


                    <div class="form-group col-md-3 mb-3 mt-3 py-2 px-4">
                        <label for="active">تایید کاربر: </label>
                        <input type="checkbox" class="option-input"
                               name="active"
                               value="true"
                               aria-invalid="false" @if($user->active == 2) checked @endif>

                        @if ($errors->has('active'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="active"
                                 style="display: block;">
                                <strong>{{ $errors->first('active') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-3 mb-3 mt-3 py-2 px-4">
                        <span for="reagent_id" class="text-black mr-3">نوع عضویت:</span>

                        <label for="reagent_id0">وابسته</label>
                        <input type="radio" class="option-input mr-2"
                               name="reagent_id"
                               value="0"
                               id="reagent_id0"
                               aria-invalid="false" @if($user->reagent_id == 0) checked @endif>

                        <label for="reagent_id1">اصلی</label>
                        <input type="radio" class="option-input"
                               name="reagent_id"
                               value="1"
                               id="reagent_id1"
                               aria-invalid="false" @if($user->reagent_id == 1) checked @endif>

                        @if ($errors->has('reagent_id'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="reagent_id"
                                 style="display: block;">
                                <strong>{{ $errors->first('reagent_id') }}</strong>
                            </div>
                        @endif
                    </div>

                    @if($user->membership_type_id == 2)

                        <div class="col-md-12 my-4">
                            <h2 class="font-22 text-medium text-black">مشخصات شرکت
                                :</h2>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[name]" class="col-12">نام سازمان *</label>
                            <input type="text" name="companies[name]"
                                   value="{{old('companies.name')??$user->companies->name}}"
                                   class="form-control" aria-invalid="false"
                            >

                            @if ($errors->has('companies.name'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.name') }}</strong>
                                </div>
                            @endif


                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[established_date]" class="col-12">سال تاسیس*</label>
                            <input type="text" name="companies[established_date]"
                                   value="{{old('companies.established_date')??$user->companies->established_date}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.established_date'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.established_date') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[established_number]" class="col-12">شماره ثبت*</label>
                            <input type="text" name="companies[established_number]"
                                   value="{{old('companies.established_number')??$user->companies->established_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.established_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong> {{ $errors->first('companies.established_number') }} </strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[economy_number]" class="col-12">شماره اقتصادی*</label>
                            <input type="text" name="companies[economy_number]"
                                   value="{{old('companies.economy_number')??$user->companies->economy_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.economy_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.economy_number') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[national_number]" class="col-12">شناسه ملی *</label>
                            <input type="text" name="companies[national_number]"
                                   value="{{old('companies.national_number')??$user->companies->national_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.national_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.national_number') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[post_number]" class="col-12">کد پستی*</label>
                            <input type="text" name="companies[post_number]"
                                   value="{{old('companies.post_number')??$user->companies->post_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>
                            @if ($errors->has('companies.post_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.post_number') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3 py-2 px-4">
                            <label for="companies[ownership_type]">نوع مالکیت شرکت : </label>
                            <input type="radio" class="option-input"
                                   name="companies[ownership_type]" value="دولتی"
                                   aria-invalid="false"
                                   required @if($user->companies->ownership_type == "دولتی") checked @endif >
                            دولتی
                            <input type="radio" class="option-input"
                                   name="companies[ownership_type]" value="خصوصی"
                                   aria-invalid="false"
                                   required @if($user->companies->ownership_type == "خصوصی") checked @endif>
                            خصوصی
                            <input type="radio" class="option-input"
                                   name="companies[ownership_type]" value="عمومی"

                                   aria-invalid="false"
                                   required @if($user->companies->ownership_type == "عمومی") checked @endif>
                            عمومی
                            <input type="radio" class="option-input"
                                   name="companies[ownership_type]"
                                   value="دولتی / خصوصی"
                                   aria-invalid="false"
                                   required @if($user->companies->ownership_type == "دولتی / خصوصی") checked @endif>
                            دولتی / خصوصی
                            <input type="radio" class="option-input"
                                   name="companies[ownership_type]"
                                   value="خصوصی / دولتی"
                                   aria-invalid="false"
                                   required @if($user->companies->ownership_type == "خصوصی / دولتی") checked @endif>
                            خصوصی / دولتی
                            <input type="radio" class="option-input"
                                   name="companies[ownership_type]" value="سایر"
                                   aria-invalid="false" required
                                   @if($user->companies->ownership_type == "سایر") checked @endif
                            >
                            سایر
                            @if ($errors->has('companies.ownership_type'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.ownership_type') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6 mb-3 py-2 px-4">
                            <label for="companies[legal_type]">نوع حقوقی شرکت : </label>
                            <input type="radio" class="option-input"
                                   name="companies[legal_type]" value="سهامی خاص"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies->legal_type == "سهامی خاص") checked @endif
                            >
                            سهامی خاص
                            <input type="radio" class="option-input"
                                   name="companies[legal_type]" value="سهامی عام"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies->legal_type == "سهامی عام") checked @endif
                            >
                            سهامی عام
                            <input type="radio" class="option-input"
                                   name="companies[legal_type]"
                                   value="با مسئولیت محدود"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies->legal_type == "با مسئولیت محدود") checked @endif
                            >
                            با مسئولیت محدود
                            <input type="radio" class="option-input"
                                   name="companies[legal_type]" value="تضامنی"

                                   aria-invalid="false"
                                   required
                                   @if($user->companies->legal_type == "تضامنی") checked @endif
                            >
                            تضامنی
                            <input type="radio" class="option-input"
                                   name="companies[legal_type]" value="سایر"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies->legal_type == "سایر") checked @endif
                            >
                            سایر
                            @if ($errors->has('companies.legal_type'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.legal_type') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="companies[address]" class="col-12">نشانی دفتر مرکزی *</label>
                            <input type="text" name="companies[address]"
                                   value="{{old('companies.address')??$user->companies->address}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.address'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.address') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[ceo_name]" class="col-12">نام مدیر عامل شرکت*</label>
                            <input type="text" name="companies[ceo_name]"
                                   value="{{old('companies.ceo_name')??$user->companies->ceo_name}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.ceo_name'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.ceo_name') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="companies[ceo_name_en]" class="col-12">نام مدیر عامل شرکت انگلیسی*</label>
                            <input type="text" name="companies[ceo_name_en]" id="companies[ceo_name_en]"
                                   value="{{old('companies.ceo_name_en')??$user->name_en}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('companies.ceo_name_en'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('companies.ceo_name_en') }}</strong>
                                </div>
                            @endif
                        </div>


                    @elseif($user->membership_type_id == 3)

                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">مشخصات تحصیلی
                                    :</h2>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="education[education_place]" class="col-12">نام مجل تحصیل*</label>
                                <input type="text" name="education[education_place]" id="education[education_place]"
                                       value="{{old('education.education_place')??$user->education->education_place}}"
                                       class="form-control" aria-invalid="false"
                                       required>

                                @if ($errors->has('education.education_place'))
                                    <div id="name-error" class="error text-danger pl-3"
                                         for="education[education_place]"
                                         style="display: block;">
                                        <strong>{{ $errors->first('education.education_place') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label for="education[grade]" class="col-12">سطح*</label>
                                <input type="text" name="education[grade]" id="education[grade]"
                                       value="{{old('education.grade')??$user->education->grade}}"
                                       class="form-control" aria-invalid="false"
                                       required>

                                @if ($errors->has('education.grade'))
                                    <div id="name-error" class="error text-danger pl-3"
                                         for="education[grade]"
                                         style="display: block;">
                                        <strong>{{ $errors->first('education.grade') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label for="from_date" class="col-12">از تاریخ*</label>
                                <input type="text" name="education[from_date]" id="from_date"
                                       value="{{old('education.from_date')??$user->education->from_date}}"
                                       class="form-control" aria-invalid="false"
                                       required>

                                @if ($errors->has('education.from_date'))
                                    <div id="name-error" class="error text-danger pl-3"
                                         for="education[from_date]"
                                         style="display: block;">
                                        <strong>{{ $errors->first('education.from_date') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label for="to_date" class="col-12">تا تاریخ</label>
                                <input type="text" name="education[to_date]" id="to_date"
                                       value="{{old('education.to_date')??$user->education->to_date}}"
                                       class="form-control" aria-invalid="false"
                                >

                                @if ($errors->has('education.to_date'))
                                    <div id="name-error" class="error text-danger pl-3"
                                         for="education[to_date]"
                                         style="display: block;">
                                        <strong>{{ $errors->first('education.to_date') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-3 mb-3">
                                <label for="education[gpa]" class="col-12">معدل</label>
                                <input type="text" name="education[gpa]" id="education[gpa]"
                                       value="{{old('education.gpa')??$user->education->gpa}}"
                                       class="form-control" aria-invalid="false"
                                       required>

                                @if ($errors->has('education.gpa'))
                                    <div id="name-error" class="error text-danger pl-3"
                                         for="education[gpa]"
                                         style="display: block;">
                                        <strong>{{ $errors->first('education.gpa') }}</strong>
                                    </div>
                                @endif
                            </div>


                            <div class="form-group col-md-3 mb-3">
                                <label for="education[field_of_study]" class="col-12">رشته تحصیلی</label>
                                <input type="text" name="education[field_of_study]" id="education[field_of_study]"
                                       value="{{old('education.field_of_study')??$user->education->field_of_study}}"
                                       class="form-control" aria-invalid="false"
                                       required>

                                @if ($errors->has('education.field_of_study'))
                                    <div id="name-error" class="error text-danger pl-3"
                                         for="education[gpa]"
                                         style="display: block;">
                                        <strong>{{ $errors->first('education.field_of_study') }}</strong>
                                    </div>
                                @endif
                            </div>

                        @endif


                    {{-- ------------ document ------------------}}
                    <div class="col-md-12 my-4">
                        <h2 class="font-22 text-medium text-black">مدارک اپلود شده
                            :</h2>
                    </div>

                    <div class="card-body table-responsive request-table">
                        <table class="rwd-table table">
                            <thead>
                            <tr>
                                <th scope="col">ردیف</th>
                                <th scope="col">توضیخات</th>
                                <th scope="col">عکس مدرک</th>
                                <th scope="col">تایید</th>
                                {{--<th scope="col">حذف</th>--}}
                            </tr>
                            </thead>
                            <tbody>


                            @if(property_exists($user,'documents'))
                                @foreach($user->documents as $doc)
                                    <input type="hidden" name="isUpgrade" value="{{!property_exists($doc ,'id')}}" >
                                    <tr>
                                        <td data-th="ردیف" class="text-right">{{$loop->index}}</td>
                                        <td data-th="عنوان خبر" class="text-right">{{$doc->explain}}</td>
                                        <td data-th="عکس مدرک" class="text-right">
                                            <img src="{{asset('img/documents/'.$doc->address)}}" class="col-8"
                                                 style="height: 150px;">
                                        </td>
                                        <td data-th="تایید" class="text-right">
                                            <input type="checkbox" class="option-input"
                                                   name="documents[]"
                                                   value="{{$doc->id??$doc->address}}"
                                                   aria-invalid="false" @if(property_exists($doc ,'id') && $doc->state == 1 ) checked @endif>
                                        </td>
                                        {{--<td data-th="حذف" class="text-right">
                                            <form action="{{route('document.del')}}" method="post" id="form{{$doc->id}}" >
                                                @csrf
                                                <input type="hidden" name="id" value="{{$doc->id}}" >
                                                <input type="submit" class="btn btn-danger" value="حذف" >

                                            </form>

                                        </td>--}}
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                    <div class="form-group col-12">
                        <label for="shortcomings" class="col-12">نقص مدارک</label>
                        <textarea placeholder="لطفا مدارکی که مجدد کاربر جاری لازم دارد که اپلود کند را بنویسید"
                                  name="shortcomings" id="shortcomings"
                                  class="form-control">{{$user->shortcomings??''}}</textarea>
                    </div>


                    <div class="col-md-12 card-footer">
                        <div class="col-md-4 col-sm-8">
                            <input type="submit" value="ثبت اطلاعات"
                                   class=" btn btn-success form-submit-violet text-white font-16 text-medium">
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
{{--<script src="{{ asset('material/js/core/jquery.min.js') }}"></script>--}}
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".datePickerInput").pDatepicker(
            {
                initialValue: false,
                responsive: true,
                format: 'L',
                calendarType: 'gregorian',
                timePicker: {
                    enabled: false,
                },
                toolbox: {
                    enabled: false,
                }
            }
        );
    });


    $(document).ready(function () {
        $("#birth_date").pDatepicker(
            {
                initialValue: false,
                responsive: true,
                format: 'L',
                calendarType: 'persian',
                timePicker: {
                    enabled: false,
                },
                toolbox: {
                    enabled: false,
                }
            }
        );
    });

    $(document).ready(function () {
        $("#from_date").pDatepicker(
            {
                initialValue: false,
                responsive: true,
                format: 'L',
                calendarType: 'persian',
                timePicker: {
                    enabled: false,
                },
                toolbox: {
                    enabled: false,
                }
            }
        );
    });

    $(document).ready(function () {
        $("#to_date").pDatepicker(
            {
                initialValue: false,
                responsive: true,
                format: 'L',
                calendarType: 'persian',
                timePicker: {
                    enabled: false,
                },
                toolbox: {
                    enabled: false,
                }
            }
        );
    });
</script>