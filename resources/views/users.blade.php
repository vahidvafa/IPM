@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <form action="{{route('user.search')}}" method="post" class="row" >
                @csrf
                <input class="form-control col-10" type="text" name="search" placeholder="جستجو" >
                <input type="submit" value="جستجو"  class="col-2 form-submit-violet text-white font-16 text-medium">
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
