@extends('master')
@section('header')

@stop

@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>لوگو</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>حسین</td>
                                <td>رادمهر</td>
                                <td>h.radmehr78@gmail.com‏</td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>
                            <tr>
                                <td>فریدون</td>
                                <td>فرداد</td>
                                <td>f.f1357@yahoo.com‏</td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>
                            <tr>
                                <td>نادر</td>
                                <td>خان زاده</td>
                                <td>nader.khanzadeh@gmail.com‏</td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>
                            <tr>
                                <td>رضا</td>
                                <td>آتش فراز</td>
                                <td>rezaatashfaraz@yahoo.com ‏</td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>

                            <tr>
                                <td>ابوالفضل</td>
                                <td>جعفری اصل</td>
                                <td>Abolfazl.jafari.asl@gmail.com </td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>

                            <tr>
                                <td>وحید</td>
                                <td>آزادمنش</td>
                                <td>vazadmanesh@gmail.com</td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>
                            <tr>
                                <td>تقی</td>
                                <td>باقر پور</td>
                                <td>Bagherpour@mapnamd3.com</td>
                                <td><img src="{{asset("img/amozesh.png")}}"/></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop