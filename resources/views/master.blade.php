<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href=""/>
    <title>انجمن مدیریت پروژه</title>
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel='stylesheet' href="{{asset('css/bootstrap.min.css')}}" type='text/css' media='all'/>
    <link rel="stylesheet" href="{{asset('css/stylefont.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/fontiran.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/style-main.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type='text/css' media='all'>

    @yield('header')

</head>
<body>
<header id="header">
    <div class="header-top-bar back-dark-violet pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('img/logo.png')}}" alt="انجمن مدیریت پروژه">
                    <h1 class="text-white d-inline-block font-18 text-regular ml-2">انجمن مدیریت پروژه ایران</h1>
                </div>
                <div class="col-md-6 text-right">
                    <img src="{{asset('img/ipma-logo.png')}}" alt="انجمن مدیریت پروژه">
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-pages ">
        <div class="header-menu pt-2 pb-2">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg  navbar-dark col-12">


                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav nav-login-out ml-auto  order-lg-1">
                            <li class="nav-item ">
                                <a class="nav-link nav-login" data-toggle="modal" data-target="#ModalLogin">
                                    <i class="fa fa-user mr-1"></i>
                                    <span>   ورود کاربران</span>
                                </a>

                            </li>
                            <!-- Dropdown -->
                            <li class="nav-item dropdown nav-lang">
                                <a class="nav-link dropdown-toggle nav-lang-persian" href="#" id="navbardrop5"
                                   data-toggle="dropdown">
                                    <span>فارسی</span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item nav-lang-eng" href="#"><span>انگلیسی</span></a>

                                </div>
                            </li>
                        </ul>
                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse order-lg-0" id="collapsibleNavbar">
                            <ul class="navbar-nav header-main">
                                <li class="nav-item active">
                                    <a class="nav-link " href="#">صفحه اول</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">درباره انجمن</a>
                                </li>

                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        شبکه اعضا </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Link 1</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop2"
                                       data-toggle="dropdown">
                                        محصولات و خدمات </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Link 1</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop3"
                                       data-toggle="dropdown">
                                        ارکان انجمن </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Link 1</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </nav>
                </div>
            </div>
        </div>

        <div class="slider-text-page pt-5 pt-lg-5 mt-lg-5">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item font-20"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item font-20 active">کاربر</li>
                        </ul>
                        <h1 class="title-page font-42 text-white">صفحه کاربری</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>


</header>
@yield('content')
<footer id="footer">
    <div class="container">
        <div class="row mb-3">
            <div class="contact-footer col-12 col-lg-5">
                <div class="footer-logo mb-3">
                    <img src="{{asset('img/logo-foo.png')}}" alt="..">
                    <span class="text-regular text-white">تماس با انجمن</span>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>آدرس:</span><span>تهران، امیرآباد شمالی، بالاتر از بزرگراه جلال آل احمد، پردیس دانشکده های فنی دانشگاه تهران، ساختمان انستیتو مهندسی نفت، طبقه همکف</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>تلفن:</span><span>(5خط) 88229406</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>نمابر:</span><span>89784216</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>پست الكترونيك دبیرخانه:</span><span>info@ipma.ir</span></p>
                </div>
                <div class="contact-footer-in">
                    <p class="text-gray font-14"><span>پست الکترونیک عضویت: </span><span>membership@ipma.ir</span></p>
                </div>
            </div>
            <div class="link-footer col-6 col-sm-6 col-md-3 col-lg-2">
                <p class="text-regular text-white pt-2">لینک انجمن</p>
                <nav class="navbar p-0">

                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">تاریخچه انجمن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">سازمان انجمن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">اساسنامه و مجوزها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">اعضای هیات مدیره</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">موسسین انجمن</a>
                        </li>

                    </ul>

                </nav>
            </div>
            <div class="link-footer col-6 col-sm-6 col-md-3 col-lg-2">
                <p class="text-regular text-white pt-2">خدمات انجمن</p>
                <nav class="navbar p-0">

                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">دوره های آموزشی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">کارگاه ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">همایش ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">جوایز</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">گواهی نامه ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray font-14" href="#">مسابقات</a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="register-footer col-12 col-md-6 col-lg-3">
                <p class="text-regular text-white pt-2">عضویت در خبرنامه</p>
                <form action="">
                    <div class="form-group">

                        <input type="email" class="form-control" placeholder="ایمیل" id="email">
                    </div>

                    <button type="submit" class="btn ">عضویت</button>
                </form>
            </div>
        </div>
        <div class="footer-copy row align-items-center pt-4 pb-3">

            <div class="col-12 col-lg-6 text-center text-lg-left">
                <p class="text-gray font-14 ">تمامی حقوق این سایت محفوظ و متعلق به انجمن پروژه ایران می باشد</p>
            </div>
            <div class="col-12 col-lg-6 ">
                <ul class="social m-0 text-center text-lg-right">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- The Modal -->
<div class="modal fade " id="ModalLogin">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header pb-0 ">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center pt-0 pr-3 pl-3 pr-sm-5 pl-sm-5">
                <img src="{{asset('img/logo-login.png')}}" alt="" class="mb-4">
                <h4 class="modal-title text-black">ورود به انجمن مدیریت پروژه</h4>
                <p class="text-black-light font-18 text-light2 mt-4 mb-4">جهت ورورد به سایت اطلاعات زیر را تکمیل نمایید</p>
                <form class="sidebar-form-body">
                    <div class="input-form">
                        <input type="email" name="text-759" value="" size="40" aria-invalid="false" placeholder="ایمیل*">
                        <img src="{{asset('img/003-envelope.png')}}" class="form-icon">
                    </div>
                    <div class="input-form">
                        <input class="mb-3" type="password" name="text-759" value="" size="40" aria-invalid="false" placeholder="پسورد*">
                        <img src="{{asset('img/002-telephone.png')}}" class="form-icon">
                    </div>
                    <a href="/" class="d-block text-left text-dark-violet font-14 text-light2">رمز عبور خود را فراموش کرده ام؟</a>
                    <input type="submit" value="وارد شوید" class="form-submit mt-5 text-white font-16 text-medium">

                </form>
            </div>


        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script type='text/javascript' src='{{asset('js/bootstrap.min.js')}}'></script>
<script src="{{asset('js/all.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.logo-slid').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 5,
            rtl: true,

            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });


</script>
<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>

</body>
</html>
