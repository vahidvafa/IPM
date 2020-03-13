@extends('cms.master')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    {{--                    <a href="{{route('job.create')}}">--}}
                    {{--<i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>--}}
                    {{--</a>--}}
                    <h4 class="card-title">گزارشات مالی</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                <form action="{{route('buyReport')}}" method="post" class="col-12 row shadow mb-2 mt-3 p-5 form-group">
                    @csrf

                    <div class="col-6 form-group mt-4 ">
                        <label for="user" class="col-12">نام یا مشخصات کاربر را تایپ کنید</label>
                        <input value="{{request('user')}}" type="text" class="form-control" name="user" id="user" placeholder="نام و نام حانوادگی , ایمیل ,شماره موبایل ,کد کاربری" >
                    </div>

                    <div class="col-4 " style="margin-top: -10px">
                    <label for="payState" class="col-12">وضعیت پرداخت: </label>
                        <select name="payState" id="payState" class="form-control">
                            <option value="-100" @if(request("payState") == "-100") selected @endif>--------------</option>
                            <option value="0" @if(request("payState") == "0") selected @endif >درجال پرداخت</option>
                            <option value="1" @if(request("payState") == "1") selected @endif >موفق</option>
                            <option value="2" @if(request("payState") == "2") selected @endif >ناموفق</option>

                        </select>
                    </div>



                    <div class="col-6 form-group mt-4 ">
                        <label for="user" class="col-12">شماره پیگیری بانک</label>
                        <input value="{{request('ref_id')}}" type="text" class="form-control" name="ref_id" id="ref_id" >
                    </div>



                    <div class="col-3 form-group">
                        <button type="submit" class="btn btn-primary">جست و جو</button>
                    </div>

                    <div class="col-3 form-group">
                        <a href="#" onclick="
                        $('#user').val('');
                        $('#payState').val(-100);
                        $('#ref_id').val('');
                        this.parentElement.parentElement.submit();
                        // alert('asd');
                                " class="btn btn-primary">حذف فیلتر ها</a>
                    </div>

                </form>
                {{$orders->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام و نام خانوادگی</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">مبلع</th>
                        <th scope="col">شماره پیگیری بانک</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">مشاهده کدها</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($orders as $order)
                        <tr class="table-@switch($order->state_id) @case(0)light @break @case(1)success @break @case(2)danger @break @endswitch " >
                            <th class="row">{{($loop->index)+1}}</th>
                            <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                            <td>عنوان</td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->reference_id}}</td>
                            <td>{{jdate($order->create_at)}}</td>
                            <td>@switch($order->state_id) @case(0) منتظر پرداخت@break @case(1) تراکنش موفق @break @case(2) تراکنش ناموفق @break @endswitch</td>
                            <td><button class="btn btn-info" data-toggle="modal" data-target="#order-code" data-extra="{{$order->ordercodes}}" >نمایش</button></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>

    </div>

    <div class="modal fade" id="order-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">کدها</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive col-12">

                        <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col" >نام</th>
                            <th scope="col" >موبایل</th>
                            <th scope="col" >کد</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-ordersCode">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#order-code').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) ;
            var orderCodes = button.data('extra') ;

            var trs = '';
            var i=0;
            orderCodes.forEach(function (e) {
                i++;
                trs += "<tr>" +
                    "<th scope='row' >"+i+"</th>"+
                    "<td>"+e.name+"</td>"+
                    "<td>"+e.mobile+"</td>"+
                    "<td>"+e.code+"</td>"+
                    "</tr>";
            });

            console.log(trs);
            $('#tbody-ordersCode').html(trs);

            // var modal = $(this);
            // modal.find('.modal-title').text('New message to ' + recipient);
            // modal.find('.modal-body input').val(recipient);
        })
    </script>

@stop