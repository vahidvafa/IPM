@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <h4 class="card-title">لیست پیام ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$messages->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">متن</th>
                        <th scope="col">تاریخ و ساعت</th>
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
                    @foreach($messages as $message)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="نام" class="text-right">{{$message->name}}</td>
                            <td data-th="ایمیل" class="text-right">{{$message->email}}</td>
                            <td data-th="متن" class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal" data-detail="{{$message->detail}}">
                                    نمایش متن
                                </button>
                            </td>
                            <td data-th="تاریخ و ساعت" class="text-right">
                                <h4 dir="ltr">
                                    {{tr_num(jdate($message->created_at)->format('Y/m/d H:i:s'),'fa')}}
                                </h4>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('message.delete',[$message->id])}}" method="post">
                                    @csrf
                                    <a href="#"
                                       onclick="confirm('{{ __("آیا مطمئن هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$messages->links()}}
            </div>
        </div>
    </div>
    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#detailModal').on('show.bs.modal',function (event) {
                //get data-id attribute of the clicked element
                var detail = $(event.relatedTarget).data('detail');
                //populate the textbox
                $(event.currentTarget).find('#detail-element').text(detail);
            })
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">متن پیام</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="detail-element" dir="rtl" class="text-center"></p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

@endsection
