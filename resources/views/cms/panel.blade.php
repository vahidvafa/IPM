@extends('cms.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">اطلاعات انجمن</h4>
                </div>
                <div class="card-body table-responsive yourPlan">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <h3 class="card-title mt-4">
                                        تعداد کاربران :
                                        {{\App\User::whereRoles(2)->count()}}
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <h3 class="card-title mt-4">
                                        تعداد اخبار :
                                        {{\App\News::count()}}
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <h3 class="card-title mt-4">
                                        تعداد رویداد ها :
                                        {{\App\Event::count()}}
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
