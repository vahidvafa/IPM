@extends('master')
@section('header')

@stop

@section('content')
    <main id="content-page" role="main">
        <div class="history-about pt-5 pb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs d-block d-md-flex nav-justified last-pack-tabs col-12 mt-4 pr-0">
                        <li class="nav-item">
                            <a class="nav-link active font-22 text-black text-regular" data-toggle="tab" href="#user">
                                همکاران حقیقی
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  font-22 text-black-light text-regular" data-toggle="tab"
                               href="#company">
                                همکاران حقوقی
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content col-12 last-pack-content ">
                        <div class="tab-pane row active " id="user">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>تاریخ اعتبار</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>حسین</td>
                                    <td>رادمهر</td>
                                    <td>1400/10/17‏</td>

                                </tr>
                                <tr>
                                    <td>فریدون</td>
                                    <td>فرداد</td>
                                    <td>1400/12/13</td>

                                </tr>
                                <tr>
                                    <td>نادر</td>
                                    <td>خان زاده</td>
                                    <td>1399/06/24</td>

                                </tr>
                                <tr>
                                    <td>رضا</td>
                                    <td>آتش فراز</td>
                                    <td>‏1399/10/01</td>

                                </tr>

                                <tr>
                                    <td>ابوالفضل</td>
                                    <td>جعفری اصل</td>
                                    <td>1400/01/08</td>
                                </tr>

                                <tr>
                                    <td>وحید</td>
                                    <td>آزادمنش</td>
                                    <td>1400/11/13</td>

                                </tr>
                                <tr>
                                    <td>تقی</td>
                                    <td>باقر پور</td>
                                    <td>1400/11/13</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane row " id="company">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام شرکت</th>
                                    <th>نام مدیر عامل</th>
                                    <th>ادرس سایت</th>
                                    <th>لوگو</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td>شرکت سرآمد سازان مدیریت داتیس</td>
                                    <td>مهندس غلامرضا صفا کیش</td>
                                    <td>----‏</td>
                                    <td>----</td>
                                </tr>

                                <tr >
                                    <td >شرکت مهندسی مصور سازان پروژه </td>
                                    <td>دکتر محمد علی دیباجی</td>
                                    <td><a href="http://msproject.ir">www.msproject.ir</a>‏</td>
                                    <td><img style="max-height: 100px;" src="{{asset("img/company_MSP.jpg")}}"/></td>
                                </tr>

                                <tr>
                                    <td>شرکت مهندسی مشاور پیشرو مدیریت پیران</td>
                                    <td>مهندس مهدی معین</td>
                                    <td><a href="https://pmpiran.com">www.pmpiran.com</a>‏</td>
                                    <td><img style="max-height: 100px;" src="{{asset("img/company_pishro.jpeg")}}"/></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </main>
@stop