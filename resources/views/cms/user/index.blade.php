@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    {{--                    <a href="{{route('news.create')}}">--}}
                    {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title">لیست کاربران</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">

                <form method="post" action="{{route('cms.user.index')}}" class="row form-group">
                    @csrf
                    <div class="col-6 form-group ">
                        <label for="str" class="col-12">نام یا مشخصات کاربر را تایپ کنید</label>
                        <input type="text" class="form-control" name="str" id="str">
                    </div>
                    <div class="col-3 form-group">
                        <button type="submit" class="btn btn-primary">جست و جو</button>
                    </div>
                    <div class="col-3 form-group">
                        <a href="#" onclick="
                        $('#str').val('');
                        this.parentElement.parentElement.submit();
                        // alert('asd');
                                " class="btn btn-primary">نمایش همه</a>
                    </div>
                </form>


                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام و نام خانوادگی</th>
                        <th scope="col">نمایش اطلاعات</th>
                        <th scope="col">تایید و فعال سازی</th>
                        <th scope="col">نمایش پروفایل</th>
                        <th scope="col" class="text-center">دوره ها</th>
                        <th scope="col" class="text-center">نشان ها</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page'));
                        else
                            $i = 0;
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="نام و نام خانوادگی"
                                class="text-right">{{$user->first_name}} {{$user->last_name}}</td>
                            <td data-th="نمایش اطلاعات" class="text-right">
                                <a href="{{route('cms.user.edit',[$user->id])}}">
                                    <i class="material-icons text-gray">pageview</i>
                                </a>
                            </td>
                            <td data-th="تایید" class="text-right">
                                <form action="{{route('cms.user.active',[$user->id])}}" method="post">
                                    @csrf
                                    @if($user->active == 1)
                                        <a href="#"
                                           onclick="confirm('{{ __("آیا مطمئن به تایید و فعال کردن کاربر جاری هستید؟") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons text-success">check</i>
                                        </a>
                                    @endif
                                </form>
                            </td>
                            <td data-th="نمایش پروفایل" class="text-right">
                                <a href="{{route('profile',[$user->slug])}}">
                                    <i class="material-icons text-gray">pageview</i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('PassedCourses.byUser.sk',[$user->id])}}">
                                <button class="btn btn-success" type="submit">نمایش دوره</button>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('cms.user.badge.edit',[$user->id])}}">
                                    <button class="btn btn-success" type="submit">نمایش نشان ها</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
