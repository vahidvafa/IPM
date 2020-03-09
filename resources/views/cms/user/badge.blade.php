@extends('cms.master')
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">نشان های کاربر</h4>
            </div>
            <div class="card-body table-responsive yourPlan pack-info">
                <div class="card-body table-responsive yourPlan">
                    <form action="{{route('cms.user.badge.update',[$user->id])}}" method="post">
                        @csrf
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon" style="background: #5063ff !important;">
                                        <i class="material-icons">account_circle</i>
                                    </div>
                                    <p class="card-category" style="color: #5063ff;font-size: 20px">الماس</p>
                                    <h3 class="card-title">
                                        <div class="qty mt-5">
                                            <span class="plus bg-dark" id="plus_diamond">+</span>
                                            <input type="number" class="count" name="diamond" id="diamond" value="{{$user->diamond}}">
                                            <span class="minus bg-dark" id="minus_diamond" >-</span>
                                        </div>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon" style="background: #ffd686 !important;">
                                        <i class="material-icons">account_circle</i>
                                    </div>
                                    <p class="card-category" style="color: #ffd686;font-size: 20px">طلایی</p>
                                    <h3 class="card-title">
                                        <div class="qty mt-5">
                                            <span class="plus bg-dark" id="plus_gold">+</span>
                                            <input type="number" class="count" name="gold" id="gold" value="{{$user->gold}}">
                                            <span class="minus bg-dark" id="minus_gold" >-</span>
                                        </div>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon"  style="background: silver !important;">
                                        <i class="material-icons">account_circle</i>
                                    </div>
                                    <p class="card-category" style="color: silver;font-size: 20px">نقره ای</p>
                                    <h3 class="card-title">
                                        <div class="qty mt-5">
                                            <span class="plus bg-dark" id="plus_silver">+</span>
                                            <input type="number" class="count" name="silver" id="silver" value="{{$user->silver}}">
                                            <span class="minus bg-dark" id="minus_silver" >-</span>
                                        </div>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon"  style="background: saddlebrown !important;">
                                        <i class="material-icons">account_circle</i>
                                    </div>
                                    <p class="card-category" style="color: saddlebrown;font-size: 20px">برنزی</p>
                                    <h3 class="card-title">
                                        <div class="qty mt-5">
                                            <span class="plus bg-dark" id="plus_bronze">+</span>
                                            <input type="number" class="count" name="bronze" id="bronze" value="{{$user->bronze}}">
                                            <span class="minus bg-dark" id="minus_bronze" >-</span>
                                        </div>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <button class="btn btn-success m-auto" type="submit">
                                ویرایش
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#diamond').prop('readonly', true);
            $('#gold').prop('readonly', true);
            $('#silver').prop('readonly', true);
            $('#bronze').prop('readonly', true);
            $(document).on('click','#plus_diamond',function(){
                $('#diamond').val(parseInt($('#diamond').val()) + 1 );
            });
            $(document).on('click','#plus_gold',function(){
                $('#gold').val(parseInt($('#gold').val()) + 1 );
            });
            $(document).on('click','#plus_silver',function(){
                $('#silver').val(parseInt($('#silver').val()) + 1 );
            });
            $(document).on('click','#plus_bronze',function(){
                $('#bronze').val(parseInt($('#bronze').val()) + 1 );
            });
            $(document).on('click','#minus_diamond',function(){
                $('#diamond').val(parseInt($('#diamond').val()) - 1 );
                if ($('#diamond').val() == -1) {
                    $('#diamond').val(0);
                }
            });
            $(document).on('click','#minus_gold',function(){
                $('#gold').val(parseInt($('#gold').val()) - 1 );
                if ($('#gold').val() == -1) {
                    $('#gold').val(0);
                }
            });
            $(document).on('click','#minus_silver',function(){
                $('#silver').val(parseInt($('#silver').val()) - 1 );
                if ($('#silver').val() == -1) {
                    $('#silver').val(0);
                }
            });
            $(document).on('click','#minus_bronze',function(){
                $('#bronze').val(parseInt($('#bronze').val()) - 1 );
                if ($('#bronze').val() == -1) {
                    $('#bronze').val(0);
                }
            });
        });
    </script>
    <style>
        .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px
        ;min-width: 35px;
            text-align: center;
        }
        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
        }
        .qty .minus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }
        div {
            text-align: center;
        }
        .minus:hover{
            background-color: #717fe0 !important;
        }
        .plus:hover{
            background-color: #717fe0 !important;
        }
        /*Prevent text selection*/
        span{
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        input{
            border: 0;
            width: 2%;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input:disabled{
            background-color:white;
        }

    </style>
@endsection
