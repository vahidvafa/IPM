@extends('master')
@section('content')
    <main id="content-page" role="main">
        <!-- calender main -->
        <div class="container my-5">
            <div class="col-12 shadow my-3 p-5">
                <form action="/" method="post" class="row">
                    @csrf
                    <div class="row w-100">
                        <div class="col-12 col-md-4">
                            <h5 id="total_price" class="text-success">
مبلغ قابل پرداخت :                                 {{tr_num(number_format($event->price),'fa')}}  ریال
                            </h5>
                        </div>
                    </div>
                </form>
                <hr>
                <h5 class="text-left">شرکت کنندگان</h5>
                <form action="{{route('order.store',[$event->id])}}" method="post">
                    <div id="users">
                        @csrf
                        @if(is_null(old('users')))
                            <div class="row">
                                <div class="input-form col-md-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>نام :</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="users[0][name]"
                                                   value=""
                                                   size="40" aria-invalid="false"
                                                   placeholder="نام *" required>
                                            <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-form col-md-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>تلفن همراه :</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="users[0][mobile]"
                                                   value=""
                                                   size="40" aria-invalid="false"
                                                   placeholder="تلفن همراه *" required>
                                            <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-form col-md-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>ایمیل :</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="users[0][email]"
                                                   value=""
                                                   size="40" aria-invalid="false"
                                                   placeholder="ایمیل *" required>
                                            <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-form col-md-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label style="color: #D21F3C;">حذف کردن </label>
                                        </div>
                                        <div class="col-12">
                                            <button class="deleteBtn col-3 btn btn-white-border center-y disabled" style="background-color: dimgray;border: dimgray;color: white;">حذف کردن -</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach(old('users') as $i => $field )
                                <div class="row" id="old-{{$i}}">
                                    <div class="input-form col-md-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>نام :</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="users[{{$i}}][name]"
                                                       value="{{old("users.$i.name")}}"
                                                       size="40" aria-invalid="false"
                                                       placeholder="نام *" required>
                                                <img src="{{asset('img/001-user.png')}}" class="form-icon">
                                                @if ($errors->has("users.$i.name"))
                                                    <div id="name-error" class="error text-danger pl-3" for="name"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first("users.$i.name") }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-form col-md-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>تلفن همراه :</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="users[{{$i}}][mobile]"
                                                       value="{{old("users.$i.mobile")}}"
                                                       size="40" aria-invalid="false"
                                                       placeholder="تلفن همراه *" required>
                                                <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                                                @if ($errors->has("users.$i.mobile"))
                                                    <div id="mobile-error" class="error text-danger pl-3" for="mobile"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first("users.$i.mobile") }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-form col-md-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>ایمیل :</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="users[{{$i}}][email]"
                                                       value="{{old("users.$i.email")}}"
                                                       size="40" aria-invalid="false"
                                                       placeholder="ایمیل*" required>
                                                <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                                                @if ($errors->has("users.$i.email"))
                                                    <div id="email-error" class="error text-danger pl-3" for="email"
                                                         style="display: block;">
                                                        <strong>{{ $errors->first("users.$i.email") }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-form col-md-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="color: #D21F3C;">حذف کردن </label>
                                            </div>
                                            <div class="col-12">
                                                <button onclick="deleteRow('old-{{$i}}')" class="deleteBtn col-3 btn btn-white-border center-y" style="background-color: #D21F3C;border: #D21F3C;color: white;">حذف کردن -</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <script>
                                    calculatePrice();
                                </script>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <button type="button" onclick="addRow()" class="col-3 btn btn-white-border center-y" style="background-color: #4CBB17;border: #4CBB17;color: white;">اضافه کردن +</button>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-8">
                            <input class="form-control w-100" type="text" name="gift" placeholder="کد هدیه ( در صورت داشتن کد هدیه وارد کنید )" value="{{old('gift')}}">
                                <div id="gift-error" class="error text-danger pl-3" for="gift"
                                     style="display: block;">
                                    <strong>{{ old('gift_error') }}</strong>
                                </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="col-3 btn btn-white-border centr-ey ">ادامه</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
<script>
    const price = "{{$event->price}}";
    function toEnglishNum( num, dontTrim ) {
        var i = 0,
            j = 0,
            dontTrim = dontTrim || false,
            num = dontTrim ? num.toString() : num.toString().trim(),
            len = num.length,
            res = '',
            pos,
            persianNumbers = typeof persianNumber == 'undefined' ?
                [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
                persianNumbers;

        for ( ; i < len; i++ )
            if ( ~( pos = persianNumbers.indexOf( num.charAt( i ) ) ) )
                res += pos;
            else
                res += num.charAt( i );
        return res;
    }
    function toPersianNum( num, dontTrim ) {

        var i = 0,

            dontTrim = dontTrim || false,

            num = dontTrim ? num.toString() : num.toString().trim(),
            len = num.length,

            res = '',
            pos,

            persianNumbers = typeof persianNumber == 'undefined' ?
                ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
                persianNumbers;

        for (; i < len; i++)
            if (( pos = persianNumbers[num.charAt(i)] ))
                res += pos;
            else
                res += num.charAt(i);

        return res;
    }
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
    function calculatePrice() {
        var totalPrice = toPersianNum(number_format( price * ($('.deleteBtn').length)));
        var label = "مبلغ قابل پرداخت : " + totalPrice + " تومان ";
        $('#total_price').text(label);
    }
    function addRow() {
        var row_id = Date.now();
        var index = $('.deleteBtn').length;
        var new_row = "                        <div class=\"row\" id=\""+row_id+"\">\n" +
            "                            <div class=\"input-form col-md-3\">\n" +
            "                                <div class=\"row\">\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <label>نام :</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <input type=\"text\" name=\"users["+index+"][name]\"\n" +
            "                                               value=\"\"\n" +
            "                                               size=\"40\" aria-invalid=\"false\"\n" +
            "                                               placeholder=\"نام *\" required>\n" +
            "                                        <img src=\"{{asset('img/001-user.png')}}\" class=\"form-icon\">\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"input-form col-md-3\">\n" +
            "                                <div class=\"row\">\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <label>تلفن همراه :</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <input type=\"text\" name=\"users["+index+"][mobile]\"\n" +
            "                                               value=\"\"\n" +
            "                                               size=\"40\" aria-invalid=\"false\"\n" +
            "                                               placeholder=\"تلفن همراه *\" required>\n" +
            "                                        <img src=\"{{asset('img/002-telephone.png')}}\" class=\"form-icon\">\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"input-form col-md-3\">\n" +
            "                                <div class=\"row\">\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <label>ایمیل :</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <input type=\"text\" name=\"users["+index+"][email]\"\n" +
            "                                               value=\"\"\n" +
            "                                               size=\"40\" aria-invalid=\"false\"\n" +
            "                                               placeholder=\"ایمیل *\" required>\n" +
            "                                        <img src=\"{{asset('img/003-envelope.png')}}\" class=\"form-icon\">\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"input-form col-md-3\">\n" +
            "                                <div class=\"row\">\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <label style=\"color: #D21F3C;\">حذف کردن </label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <button  onclick=\"deleteRow(" + row_id + ")\" class=\"deleteBtn col-3 btn btn-white-border center-y \" style=\"background-color: #D21F3C;border: #D21F3C;color: white;\">حذف کردن -</button>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n";
        $("#users").append(new_row);
        calculatePrice();
    }
    function deleteRow(id) {
        $("#" + id).remove();
        calculatePrice();
    }
</script>
