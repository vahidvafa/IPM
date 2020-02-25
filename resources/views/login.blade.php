@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <img src="{{asset('img/logo-login.png')}}" alt="" class="mb-4">
            <h4 class="modal-title text-black">ورود به انجمن مدیریت پروژه</h4>
            <p class="text-black-light font-18 text-light2 mt-4 mb-4">جهت ورورد به سایت اطلاعات زیر را تکمیل
                نمایید</p>
            <form class="sidebar-form-body">
                <div class="input-form">
                    <input type="text" name="username" id="input_username" value="" size="40" aria-invalid="false"
                           placeholder="ایمیل یا شماره موبایل*">
                    <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                    <div id="username-error" class="error text-danger pl-3" for="username"
                         style="display: block;">
                        <strong id="username-error-text"></strong>
                    </div>
                </div>
                <div class="input-form">
                    <input class="mb-3" type="password" name="password" id="input_password" value="" size="40"
                           aria-invalid="false" placeholder="پسورد*">
                    <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                    <div id="password-error" class="error text-danger pl-3" for="password"
                         style="display: block;">
                        <strong id="password-error-text"></strong>
                    </div>
                </div>
                <a href="/" class="d-block text-left text-dark-violet font-14 text-light2">رمز عبور خود را فراموش
                    کرده ام؟</a>
                <div id="text-error" class="error text-danger pl-3"
                     style="display: block;">
                    <strong id="text-error"></strong>
                </div>
                <input type="button" value="وارد شوید" class="form-submit mt-5 text-white font-16 text-medium"
                       onclick="login()">

            </form>
        </div>
    </main>
    <script>
        function clearLoginErrors() {
            $('#text-error').text('');
            $('#username-error-text').text('');
            $('#password-error-text').text('');
        }

        function login() {
            clearLoginErrors();
            var username = $('#input_username').val();
            var password = $('#input_password').val();
            $.post("/login",
                {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    username: username,
                    password: password
                },
                function (json) {
                    if (!json.status) {
                        if (json.code == 100) {
                            $('#text-error').text(json.errors.username[0]);
                        } else {
                            if (typeof json.errors.username !== 'undefined') {
                                $('#username-error-text').text(json.errors.username[0]);
                            }
                            if (typeof json.errors.password !== 'undefined') {
                                $('#password-error-text').text(json.errors.password[0]);
                            }
                        }
                    } else {
                        window.location('{{route('main')}}');
                    }
                });
        }
    </script>
@endsection