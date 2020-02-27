@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <form action="{{route('user.search')}}" method="post" class="row">
                @csrf
                <div class="row w-100">
                    <div class="col-12 col-md-8">
                        <input class="form-control w-100" type="text" name="search" placeholder="جستجو">
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="submit" value="جستجو" class="form-submit-violet text-white font-16 text-medium w-100">
                    </div>
                    <div class="col-12 col-md-2">
                        <a href="{{route('user.index')}}" class="btn btn-news text-yellow text-medium w-100"> لیست تمام اعضا</a>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد عضویت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->user_code }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </main>
@endsection
