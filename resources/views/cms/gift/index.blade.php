@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('gift.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">لیست کد تخفیف ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$gifts->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">کد</th>
                        <th scope="col">رویداد</th>
                        <th scope="col">مقدار</th>
                        <th scope="col">نوع</th>
                        <th scope="col">حداکثر میزان استفاده</th>
                        <th scope="col">تعداد استفاده شده</th>
                        <th scope="col">حداقل قیمت</th>
                        <th scope="col">حداکثر قیمت</th>
                        <th scope="col">کاربران مجاز</th>
                        <th scope="col">از تاریخ</th>
                        <th scope="col">تا تاریخ</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page') - 1);
                        else
                            $i = 0;
                    @endphp
                    @foreach($gifts as $gift)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="کد" class="text-right">{{$gift->code}}</td>
                            <td data-th="رویداد" class="text-right">
                                <a href="{{route('event',[$gift->event->id])}}" style="color: black !important;" target="_blank">
                                    {{substr($gift->event->title,0,50)."..."}}
                                </a>
                            </td>
                            <td data-th="مقدار" class="text-right">{{tr_num(number_format($gift->price,($gift->type_id == 1) ? 2 : 0),'fa')}}</td>
                            <td data-th="نوع" class="text-right">{{($gift->type_id == 1) ? 'درصدی' : 'مبلغی' }}</td>
                            <td data-th="حداکثر میزان استفاده" class="text-right">{{($gift->maximum_count == 0) ? 'بدون محدودیت' : tr_num($gift->maximum_count,'fa')}}</td>
                            <td data-th="تعداد استفاده شده" class="text-right">{{tr_num($gift->used_count,'fa')}}</td>
                            <td data-th="حداقل قیمت" class="text-right">{{($gift->minimum_price == 0) ? 'بدون محدودیت' : tr_num(number_format($gift->minimum_price),'fa')}}</td>
                            <td data-th="حداقل قیمت" class="text-right">{{($gift->maximum_price == 0) ? 'بدون محدودیت' : tr_num(number_format($gift->maximum_price),'fa')}}</td>
                            <td data-th="کاربران مجاز" class="text-right">{{($gift->members_usage == 0) ? 'اعضای انجمن' : 'همه'}}</td>
                            <td data-th="از تاریخ" class="text-right">{{($gift->from_date->unix == 0) ? 'بدون محدودیت' : $gift->from_date->date_time}}</td>
                            <td data-th="تا تاریخ" class="text-right">{{($gift->to_date->unix == 0) ? 'بدون محدودیت' : $gift->to_date->date_time}}</td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('gift.delete',[$gift->id])}}" method="post">
                                    @csrf
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$gifts->links()}}
            </div>
        </div>
    </div>
@endsection
