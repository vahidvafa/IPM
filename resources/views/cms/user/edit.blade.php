@extends('cms.master')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    {{--<a href="{{route('cms.user.create')}}">--}}
                    {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title">ویرایش اطلاعات کاربر</h4>
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
                           value="{{$user->id}}">
                    <input type="hidden" name="slug"
                           value="{{$user->slug}}">
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

                    {{--<div class="form-group col-md-6 mb-3 ">
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

                    </div>--}}
                    <div class="form-group col-md-6 mb-3 ">
                        <label for="profile[father_name]" class="col-12">نام پدر*</label>
                        <input type="text" name="profile[father_name]" id="profile[father_name]"
                               value="{{old('profile.father_name')??$user->profile[0]->father_name}}"
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
                               value="{{old('profile.national_code')??$user->profile[0]->national_code}}"
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
                               value="{{old('profile.certificate_number')??$user->profile[0]->certificate_number}}"
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
                               value="{{old('profile.birth_date')??$user->profile[0]->birth_date}}"
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
                               value="{{old('profile.birth_place')??$user->profile[0]->birth_place}}"
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
                               aria-invalid="false" required @if($user->profile[0]->sex == 1) checked @endif>
                        مرد
                        <input type="radio" class="option-input"
                               name="profile[sex]" value="0"
                               aria-invalid="false" required @if($user->profile[0]->sex == 0) checked @endif>
                        زن
                        @if ($errors->has('profile.sex'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.sex') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-6 mb-3 mt-3">
                        <label for="profile[work_address]" class="col-12">نشانی محل کار *</label>
                        <input type="text" name="profile[work_address]" id="profile[work_address]"
                               value="{{old('profile.work_address')??$user->profile[0]->work_address}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.work_address'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.work_address') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="profile[work_post]" class="col-12">کد پستی محل کار *</label>
                        <input type="text" name="profile[work_post]" id="profile[work_post]"
                               value="{{old('profile.work_post')??$user->profile[0]->work_post}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.work_post'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.work_post') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="profile[home_address]" class="col-12">نشانی منزل *</label>
                        <input type="text" name="profile[home_address]" id="profile[home_address]"
                               value="{{old('profile.home_address')??$user->profile[0]->home_address}}"
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
                               value="{{old('profile.home_post')??$user->profile[0]->home_post}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.home_post'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.home_post') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="profile[work_name]" class="col-12">محل کار *</label>
                        <input type="text" name="profile[work_name]" id="profile[work_name]"
                               value="{{old('profile.work_name')??$user->profile[0]->work_name}}"
                               class="form-control" aria-invalid="false"
                               required>

                        @if ($errors->has('profile.work_name'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile.work_name') }}</strong>
                            </div>
                        @endif

                    </div>

                    <div class="form-group col-md-6 mb-3 py-2 px-4">
                        <label for="">انتخاب نشانی ارسال مراسلات : </label>
                        <input type="radio" class="option-input"
                               name="profile[receive_place]" value="0"
                               aria-invalid="false" required @if($user->profile[0]->receive_place == 0) checked @endif >
                        منزل
                        <input type="radio" class="option-input"
                               name="profile[receive_place]" value="1"
                               aria-invalid="false" required @if($user->profile[0]->receive_place == 1) checked @endif >
                        محل کار
                        @if ($errors->has('receive_place'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="name"
                                 style="display: block;">
                                <strong>{{ $errors->first('receive_place') }}</strong>
                            </div>
                        @endif
                    </div>

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

                    <div class="form-group col-md-6 mb-3">
                        <label for="profile[specialized_basins]" class="col-12">حوضه فعالیت</label>
                        <input type="text" name="profile[specialized_basins]"
                               value="{{old('profile[specialized_basins]')??$user->profile[0]->specialized_basins}}"
                               class="form-control" aria-invalid="false"
                        >

                        @if ($errors->has('profile[specialized_basins]'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="specialized_basins"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile[specialized_basins]') }}</strong>
                            </div>
                        @endif

                    </div>


                    <div class="form-group col-md-12 mb-3">
                        <label for="profile[honors]" class="col-12">افتخارات حضور در انجمن</label>
                        <input type="text" name="profile[honors]"
                               value="{{old('profile[honors]')??$user->profile[0]->honors}}"
                               class="form-control" aria-invalid="false"
                        >

                        @if ($errors->has('profile[honors]'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="specialized_basins"
                                 style="display: block;">
                                <strong>{{ $errors->first('profile[honors]') }}</strong>
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
                        <label for="isShowMyPhone">نمایش شماره تلفن برای همه: </label>
                        <input type="checkbox" class="option-input"
                               name="isShowMyPhone"
                               value="0"
                               id="isShowMyPhone"
                               aria-invalid="false" @if($user->isShowMyPhone == 1) checked @endif>

                        @if ($errors->has('isShowMyPhone'))
                            <div id="name-error" class="error text-danger pl-3"
                                 for="active"
                                 style="display: block;">
                                <strong>{{ $errors->first('isShowMyPhone') }}</strong>
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

                    <div class="col-md-12 mb-3 mt-3 py-2 px-4 row">
                        <div class="form-group col-md-5 mb-3">
                            <label for="certificate-level">سطح مدرک</label>
                            <select class="form-control" name="certificate-level" id="certificate-level">
                                <option value="A" @if(substr(explode("“",$user->profile[0]->certificate)[1],0,1) == "A") selected @endif >IPMA CB Certificate Level A</option>
                                <option value="B" @if(substr(explode("“",$user->profile[0]->certificate)[1],0,1) == "B") selected @endif >IPMA CB Certificate Level B</option>
                                <option value="C" @if(substr(explode("“",$user->profile[0]->certificate)[1],0,1) == "C") selected @endif >IPMA CB Certificate Level C</option>
                                <option value="D" @if(substr(explode("“",$user->profile[0]->certificate)[1],0,1) == "D") selected @endif >IPMA CB Certificate Level D</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-3 mt-4">
                            <label for="certificate-date" class="col-12">تاریخ*</label>
                            <input type="text" name="certificate-date" id="certificate-date"
                                   value="{{old('certificate-date')??explode(" - ",$user->profile[0]->certificate)[1]}}"
                                   class="form-control datePickerInput" aria-invalid="false"
                                   style="margin-top: 19px"
                                   required>

                            @if ($errors->has('certificate-date'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="certificate-date"
                                     style="display: block;">
                                    <strong>{{ $errors->first('certificate-date') }}</strong>
                                </div>
                            @endif
                        </div>

                        <h3 class="font-22 text-medium text-black col-12">جوایز و مدارک: </h3>
                        <div class="form-group col-md-6 mb-3 mt-4">
                            <label for="awards[1]" class="col-12">ردیف اول*</label>
                            <input type="text" name="awards[1]" id="awards[1]"
                                   value="{{old('awards[1]')??explode("?!?",$user->profile[0]->awards)[0]}}"
                                   class="form-control " aria-invalid="false"
                                   required>

                        </div>
                        <div class="form-group col-md-6 mb-3 mt-4">
                            <label for="awards[2]" class="col-12">ردیف دوم*</label>
                            <input type="text" name="awards[2]" id="awards[2]"
                                   value="{{old('awards[2]')??explode("?!?",$user->profile[0]->awards)[1]}}"
                                   class="form-control " aria-invalid="false"
                                   required>

                        </div>
                        <div class="form-group col-md-6 mb-3 mt-4">
                            <label for="awards[3]" class="col-12">ردیف سوم*</label>
                            <input type="text" name="awards[3]" id="awards[3]"
                                   value="{{old('awards[3]')??explode("?!?",$user->profile[0]->awards)[2]}}"
                                   class="form-control" aria-invalid="false"
                                   required>
                        </div>


                    </div>




                    @if($user->membership_type_id == 2)

                        <div class="col-md-12 my-4">
                            <h2 class="font-22 text-medium text-black">مشخصات شرکت
                                :</h2>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="company[name]" class="col-12">نام سازمان *</label>
                            <input type="text" name="company[name]"
                                   value="{{old('company.name')??$user->companies[0]->name}}"
                                   class="form-control" aria-invalid="false"
                            >

                            @if ($errors->has('company.name'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.name') }}</strong>
                                </div>
                            @endif


                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[established_date]" class="col-12">سال تاسیس*</label>
                            <input type="text" name="company[established_date]"
                                   value="{{old('company.established_date')??$user->companies[0]->established_date}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.established_date'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.established_date') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[established_number]" class="col-12">شماره ثبت*</label>
                            <input type="text" name="company[established_number]"
                                   value="{{old('company.established_number')??$user->companies[0]->established_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.established_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong> {{ $errors->first('company.established_number') }} </strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[economy_number]" class="col-12">شماره اقتصادی*</label>
                            <input type="text" name="company[economy_number]"
                                   value="{{old('company.economy_number')??$user->companies[0]->economy_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.economy_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.economy_number') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[national_number]" class="col-12">شناسه ملی *</label>
                            <input type="text" name="company[national_number]"
                                   value="{{old('company.national_number')??$user->companies[0]->national_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.national_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.national_number') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[post_number]" class="col-12">کد پستی*</label>
                            <input type="text" name="company[post_number]"
                                   value="{{old('company.post_number')??$user->companies[0]->post_number}}"
                                   class="form-control" aria-invalid="false"
                                   required>
                            @if ($errors->has('company.post_number'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.post_number') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6 mb-3 py-2 px-4">
                            <label for="company[ownership_type]">نوع مالکیت شرکت : </label>
                            <input type="radio" class="option-input"
                                   name="company[ownership_type]" value="دولتی"
                                   aria-invalid="false"
                                   required @if($user->companies[0]->ownership_type == "دولتی") checked @endif >
                            دولتی
                            <input type="radio" class="option-input"
                                   name="company[ownership_type]" value="خصوصی"
                                   aria-invalid="false"
                                   required @if($user->companies[0]->ownership_type == "خصوصی") checked @endif>
                            خصوصی
                            <input type="radio" class="option-input"
                                   name="company[ownership_type]" value="عمومی"

                                   aria-invalid="false"
                                   required @if($user->companies[0]->ownership_type == "عمومی") checked @endif>
                            عمومی
                            <input type="radio" class="option-input"
                                   name="company[ownership_type]"
                                   value="دولتی / خصوصی"
                                   aria-invalid="false"
                                   required @if($user->companies[0]->ownership_type == "دولتی / خصوصی") checked @endif>
                            دولتی / خصوصی
                            <input type="radio" class="option-input"
                                   name="company[ownership_type]"
                                   value="خصوصی / دولتی"
                                   aria-invalid="false"
                                   required @if($user->companies[0]->ownership_type == "خصوصی / دولتی") checked @endif>
                            خصوصی / دولتی
                            <input type="radio" class="option-input"
                                   name="company[ownership_type]" value="سایر"
                                   aria-invalid="false" required
                                   @if($user->companies[0]->ownership_type == "سایر") checked @endif
                            >
                            سایر
                            @if ($errors->has('company.ownership_type'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.ownership_type') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6 mb-3 py-2 px-4">
                            <label for="company[legal_type]">نوع حقوقی شرکت : </label>
                            <input type="radio" class="option-input"
                                   name="company[legal_type]" value="سهامی خاص"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies[0]->legal_type == "سهامی خاص") checked @endif
                            >
                            سهامی خاص
                            <input type="radio" class="option-input"
                                   name="company[legal_type]" value="سهامی عام"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies[0]->legal_type == "سهامی عام") checked @endif
                            >
                            سهامی عام
                            <input type="radio" class="option-input"
                                   name="company[legal_type]"
                                   value="با مسئولیت محدود"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies[0]->legal_type == "با مسئولیت محدود") checked @endif
                            >
                            با مسئولیت محدود
                            <input type="radio" class="option-input"
                                   name="company[legal_type]" value="تضامنی"

                                   aria-invalid="false"
                                   required
                                   @if($user->companies[0]->legal_type == "تضامنی") checked @endif
                            >
                            تضامنی
                            <input type="radio" class="option-input"
                                   name="company[legal_type]" value="سایر"
                                   aria-invalid="false"
                                   required
                                   @if($user->companies[0]->legal_type == "سایر") checked @endif
                            >
                            سایر
                            @if ($errors->has('company.legal_type'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.legal_type') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="company[address]" class="col-12">نشانی دفتر مرکزی *</label>
                            <input type="text" name="company[address]"
                                   value="{{old('company.address')??$user->companies[0]->address}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.address'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.address') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[ceo_name]" class="col-12">نام مدیر عامل شرکت*</label>
                            <input type="text" name="company[ceo_name]"
                                   value="{{old('company.ceo_name')??$user->companies[0]->ceo_name}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.ceo_name'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.ceo_name') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="company[ceo_name_en]" class="col-12">نام مدیر عامل شرکت انگلیسی*</label>
                            <input type="text" name="company[ceo_name_en]" id="company[ceo_name_en]"
                                   value="{{old('company.ceo_name_en')??$user->name_en}}"
                                   class="form-control" aria-invalid="false"
                                   required>

                            @if ($errors->has('company.ceo_name_en'))
                                <div id="name-error" class="error text-danger pl-3"
                                     for="name"
                                     style="display: block;">
                                    <strong>{{ $errors->first('company.ceo_name_en') }}</strong>
                                </div>
                            @endif
                        </div>


                    @elseif($user->membership_type_id == 3)
                        @if(count($user->education) > 0 )
                            <div class="col-md-12 my-4">
                                <h2 class="font-22 text-medium text-black">مشخصات تحصیلی
                                    :</h2>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="education[education_place]" class="col-12">نام مجل تحصیل*</label>
                                <input type="text" name="education[education_place]" id="education[education_place]"
                                       value="{{old('education.education_place')??$user->education[0]->education_place}}"
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
                                       value="{{old('education.grade')??$user->education[0]->grade}}"
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
                                       value="{{old('education.from_date')??$user->education[0]->from_date}}"
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
                                       value="{{old('education.to_date')??$user->education[0]->to_date}}"
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
                                       value="{{old('education.gpa')??$user->education[0]->gpa}}"
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
                                       value="{{old('education.field_of_study')??$user->education[0]->field_of_study}}"
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

                            @php

                                $i = 0;
                            @endphp


                            @foreach($user->documents as $doc)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td data-th="ردیف" class="text-right">{{++$i}}</td>
                                    <td data-th="عنوان خبر" class="text-right">{{$doc->explain}}</td>
                                    <td data-th="عکس مدرک" class="text-right">
                                        <img src="{{asset('img/documents/'.$doc->address)}}" class="col-8" style="height: 150px;" >
                                    </td>
                                    <td data-th="تایید" class="text-right">
                                        <input type="checkbox" class="option-input"
                                               name="documents[]"
                                               value="{{$doc->id}}"
                                               aria-invalid="false" @if($doc->state == 1 ) checked @endif>
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
                            </tbody>
                        </table>

                    </div>

                    <div class="form-group col-12">
                        <label for="shortcomings" class="col-12"  >نقص مدارک</label>
                    <textarea placeholder="لطفا مدارکی که مجدد کاربر جاری لازم دارد که اپلود کند را بنویسید" name="shortcomings" id="shortcomings" class="form-control"  >{{$user->shortcomings}}</textarea>
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