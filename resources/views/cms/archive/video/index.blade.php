@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <a href="{{route('videoGallery.create')}}">
                        <i class="material-icons" style="float: left;font-size: 32px;color: white">add_box</i>
                    </a>
                    <h4 class="card-title">لیست ویدیو ها</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table">
                {{$videos->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">ویدیو</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($videos as $video)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{$loop->index+1}}</td>
                            <td data-th="ویدیو" class="text-right">

                                {!! $video->name !!}
                            </td>
                            <td data-th="ویرایش" class="text-right">
                                <a href="{{route('videoGallery.edit',[$video->id])}}" style="color: black !important;" target="_blank">
                                    <i class="material-icons text-gray">edit</i>
                                </a>
                            </td>
                            <td data-th="حذف" class="text-right">
                                <form action="{{route('videoGallery.destroy',[$video->id])}}" method="post">
                                    @csrf
                                    @method('delete')
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
                {{$videos->links()}}
            </div>
        </div>
    </div>
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
