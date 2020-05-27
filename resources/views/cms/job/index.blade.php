@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
{{--                    <a href="{{route('job.create')}}">--}}
                        {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title">لیست فرصت های شغلی</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">

                <form action="{{route('cms.job.index')}}" method="post" class="col-12 row shadow mb-2 mt-3 p-5 form-group">
                    @csrf
                    <label class="col-3">
                        دسته بندی: <select name="cats" class="form-control">
                            <option value="-100" @if(request()->get("cats") == "-100") selected @endif>--------------</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}" @if(request()->get("cats") == $cat->title) selected @endif >{{$cat->title}}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="col-2">
                        نوع قرار داد: <select name="contract_type"  class="form-control" >
                            @foreach($contract_type as $type)
                                <option value="{{$type}}" @if(request()->get("contract_type") == $type) selected @endif >{{$type}}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="col-2 ">
                        سابقه کاری: <select name="work_experience" class="form-control">
                            @foreach($work_experience as $work)
                                <option value="{{$work}}" @if(request()->get("work_experience") == $work) selected @endif >{{$work}}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="col-2" >
                        مدرک تحصیلی: <select name="education" class="form-control">
                            @foreach($education as $ed)
                                <option value="{{$ed}}" @if(request()->get("education") == $ed) selected @endif >{{$ed}}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="col-2">
                        جنسیت: <select name="sex" class="form-control">
                            <option value="-1" @if(request()->get("sex") == null  || request()->get("sex") == -1) selected @endif >تفاوتی ندارد</option>
                            <option value="0" @if(request()->get("sex") !=null && request()->get("sex") == 0) selected @endif >زن</option>
                            <option value="1" @if(request()->get("sex") == 1) selected @endif >مرد</option>

                        </select>
                    </label>

                    <button type="submit" class="col-3 btn btn-primary center-y ">جست و جو</button>

                </form>

                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان فرصت شغلی</th>
                        <th scope="col">نمایش جزئیات</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * request('page');
                        else
                            $i = 0;
                    @endphp
                    @foreach($jobs as $job)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="عنوان فرصت شغلی" class="text-right">{{$job->title}}</td>
                            <td data-th="نمایش جزئیات" class="text-right">
                                <a href="{{route('job.show',[$job->id])}}">
                                    <i class="material-icons text-gray">pageview</i>
                                </a>
                            </td>
                            <td data-th="تایید" class="text-right">

                                @if($job->state == 0)
                                <form action="{{route('cms.job.store',[$job->id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-success" onclick="confirm('{{ __("آیا مطمئن به تایید این فرصت شغلی هستید؟") }}') ? this.parentElement.submit() : ''">
                                        تایید
                                    </button>
                                </form>
                                    @endif
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('cms.job.destroy',[$job->id])}}" method="post">
                                    @csrf
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن به حذف فرصت شغلی هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$jobs->links()}}
            </div>
        </div>
    </div>
@endsection
