@extends('cms.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div>
                    <h4 class="card-title">لیست مدیران سطح ۲</h4>
                </div>
            </div>
            <div class="card-body table-responsive request-table ">

                <form class="row" method="post"  action="{{route('admin.add')}}" >
                    @csrf
                <div class="col-5 mt-3 mb-5">
                    <label for="users" class=" col-12">کاربران(مشخصات کاربر مورد نظر را جستوجو کنید)</label>
                    <input type="text" {{--onchange="searchUser(this)"--}} id="users" class="form-control"
                           style="margin-top: -3px">
                    <div style="background-color: #fff" class="col-12" >
                        <select class="col-12 form-control hide" id="userSelect" name="selectedUser"  >
                        </select>
                    </div>
                    @if ($errors->has('selectedUser'))
                        <div id="title-error"
                             class="error text-danger pl-3" for="title"
                             style="display: block;">
                            <strong>{{ $errors->first('selectedUser') }}</strong>
                        </div>
                    @endif
                </div>
                    <div class="col-5 mt-3">
                    <button class="btn btn-success col-4" type="submit">ثبت</button>
                    </div>
                </form>


                {{$users->links()}}
                <table class="rwd-table table">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام</th>
                        <th scope="col">تایید</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        if (request('page'))
                            $i = 10 * (request('page') - 1);
                        else
                            $i = 0;
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <td data-th="ردیف" class="text-right">{{++$i}}</td>
                            <td data-th="نام" class="text-right">
                                <p>{{$user->first_name}} {{$user->last_name}}</p>
                            </td>
                            <td data-th="تایید" class="text-right">
                                <form action="{{route('admin.del')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user" value="{{$user->id}}" >
                                    <a href="#" onclick="confirm('{{ __("آیا مطمئن به حذف این مدیر هستید؟") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>

    <script>
        $('#users').on('input',function(e){

            if (this.value.length >= 4) {
                $.post("{{route('cms.user.search')}}",
                    {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        str: this.value,
                    },
                    function (res) {

                        var opt = "";
                        res.forEach(function (user) {
                            if (user.roles == 2)
                            opt += "<option value=\"" + user.id + "\">" + user.first_name+" "+user.last_name + "</option>"
                        });

                        if (opt == "") {
                            $('#userSelect').addClass('hide');
                            alert("متاسفانه کاربی با این مشخصات پیدا نشد");
                        }
                        else
                            $('#userSelect').removeClass('hide');


                        $('#userSelect').html(opt);


                    }
                );

            }
        });

    </script>

@endsection
