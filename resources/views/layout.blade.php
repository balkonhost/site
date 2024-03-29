@php
    $messages = [
        config('app.name') ." — мы перешли\r\n с перфокарт на бабины",
        config('app.name') ." — наши сервера\r\n на 64 мб оперативы",
        config('app.name') ." — 1000 строчек кода\r\n и сервер перезагружается",
        config('app.name') ." — сделано на Урале",
        config('app.name') ." — MADE IN URAL",
        config('app.name') ." — баяним на районе",
        config('app.name') ." — : [:]|||||||||||[:] на районе",
        config('app.name') ." — проект\r\n неадекватного хостинга",
        config('app.name') ." — через жопу, но с душой",
        config('app.name') ." — cамый\r\n стебанутый хостинг России"
    ];
    $key = array_rand($messages);
    $message = $messages[$key];

    $cartTotal = Cart::getTotal();
    $cartItemCount = Cart::getContent()->count();
    $user = auth()->user();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#000066">
    <meta name="theme-color" content="#000066">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="yandex-verification" content="59cc7a0d7da5fc79" />

    <title>@yield('title', $message)</title>
    <meta name="description" content="@yield('description', $message)">
    <meta name="keywords" content="@yield('keywords', 'хостинг,регистрация доменов,сделано на Урале')">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
@section('body')
<body class="d-flex flex-column h-100">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 241 51" height="30" width="140" version="1.1">
                        <path d="m 72.9117,30.3016 c 0,2.4012 0.2084,4.178 0.6248,5.337 0.4093,1.1589 1.0409,1.7419 1.8808,1.7419 0.7701,0 1.3464,-0.5621 1.728,-1.6795 0.3818,-1.1174 0.5692,-2.8247 0.5692,-5.1287 0,-2.5262 -0.1806,-4.3305 -0.5483,-5.4201 -0.3679,-1.0897 -0.9649,-1.6379 -1.7906,-1.6379 -0.7982,0 -1.4088,0.576 -1.8323,1.7351 -0.4232,1.1588 -0.6316,2.8454 -0.6316,5.0522 z m 0.3056,11.9508 -5.7047,0 0,-31.8132 5.7047,0 0,12.7488 c 0.4858,-1.6795 1.131,-2.9148 1.9222,-3.6989 0.7914,-0.7843 1.7838,-1.1798 2.9775,-1.1798 1.8459,0 3.213,0.9992 4.1153,2.9979 0.9023,1.9988 1.3533,5.0386 1.3533,9.1194 0,3.9141 -0.4859,6.9055 -1.4505,8.9733 -0.9714,2.0682 -2.3803,3.1023 -4.2194,3.1023 -1.0618,0 -1.978,-0.3955 -2.7691,-1.1866 -0.7844,-0.7982 -1.4298,-1.978 -1.9293,-3.5464 l 0,4.4832 z m 22.7424,0 0,-4.4832 c -0.4998,1.5684 -1.1452,2.7482 -1.9293,3.5464 -0.7912,0.7911 -1.7073,1.1866 -2.7692,1.1866 -1.8391,0 -3.2479,-1.0341 -4.2196,-3.1023 -0.9647,-2.0678 -1.4502,-5.0592 -1.4502,-8.9733 0,-4.0808 0.451,-7.1206 1.3532,-9.1194 0.902,-1.9987 2.2624,-2.9979 4.0947,-2.9979 1.2075,0 2.2067,0.3955 2.9979,1.1798 0.7911,0.7841 1.4366,2.0194 1.9225,3.6989 l 0,-4.4206 5.7047,0 0,23.485 -5.7047,0 z m 0.2914,-11.9508 c 0,-2.2068 -0.2081,-3.8934 -0.6245,-5.0522 -0.4096,-1.1591 -1.0202,-1.7351 -1.8184,-1.7351 -0.8468,0 -1.4505,0.5482 -1.8253,1.6447 -0.3747,1.0967 -0.5621,2.9009 -0.5621,5.4133 0,2.3179 0.1874,4.0323 0.5692,5.1426 0.3816,1.1103 0.9714,1.6656 1.7765,1.6656 0.8399,0 1.4644,-0.583 1.874,-1.7419 0.4093,-1.159 0.6106,-2.9358 0.6106,-5.337 z m 9.0011,11.9508 0,-31.8132 5.6633,0 0,31.8132 -5.6633,0 z m 9.2514,0 0,-31.8132 5.7047,0 0,19.4531 0.2013,0 5.0454,-11.1249 5.8158,0 -5.4065,10.8609 5.7952,12.6241 -6.1628,0 -5.0871,-11.916 -0.2013,0 0,11.916 -5.7047,0 z m 25.4838,-4.2888 c 0.9229,0 1.5752,-0.5692 1.9641,-1.7005 0.3815,-1.1313 0.576,-3.0812 0.576,-5.8504 0,-2.7204 -0.1945,-4.6638 -0.5899,-5.8226 -0.3886,-1.1591 -1.0412,-1.7419 -1.9502,-1.7419 -0.8952,0 -1.5407,0.5899 -1.9432,1.7696 -0.3957,1.1798 -0.597,3.1162 -0.597,5.7949 0,2.6997 0.2013,4.6361 0.597,5.8019 0.4025,1.1659 1.048,1.749 1.9432,1.749 z m -8.4116,-7.4676 c 0,-4.1156 0.6942,-7.183 2.0753,-9.2026 1.381,-2.0194 3.4909,-3.0257 6.3292,-3.0257 2.8593,0 4.983,1.0063 6.3779,3.0257 1.3882,2.0196 2.0821,5.087 2.0821,9.2026 0,4.1363 -0.6939,7.2037 -2.0821,9.2095 -1.3949,2.0055 -3.5186,3.005 -6.3779,3.005 -2.8383,0 -4.9482,-1.0063 -6.3292,-3.0189 -1.3811,-2.0126 -2.0753,-5.0731 -2.0753,-9.1956 z m 19.245,11.7148 0,-23.4434 5.3992,0 0,3.7406 c 0.6664,-1.4088 1.4643,-2.4568 2.3944,-3.1507 0.93,-0.701 2.0058,-1.048 3.2411,-1.048 1.6586,0 2.8245,0.5066 3.5116,1.5197 0.6871,1.0202 1.0273,2.8732 1.0273,5.5661 l 0,16.8157 -5.7048,0 0,-14.6991 c 0,-1.7073 -0.1459,-2.8661 -0.4373,-3.4699 -0.2914,-0.6037 -0.8119,-0.9022 -1.5617,-0.9022 -0.7217,0 -1.2631,0.3537 -1.6239,1.0686 -0.3609,0.7078 -0.5412,1.7697 -0.5412,3.1785 l 0,14.8241 -5.7047,0 z m 18.1622,-2.6649 c 0,-0.8816 0.3123,-1.631 0.93,-2.2626 0.6245,-0.6315 1.381,-0.9439 2.2762,-0.9439 0.9094,0 1.6657,0.3055 2.2833,0.9232 0.6177,0.6177 0.923,1.374 0.923,2.2833 0,0.8813 -0.3192,1.6308 -0.9507,2.2624 -0.6384,0.6315 -1.3879,0.9439 -2.2556,0.9439 -0.8396,0 -1.5823,-0.3263 -2.2345,-0.9717 -0.6455,-0.6523 -0.9717,-1.395 -0.9717,-2.2346 z m 9.3276,2.6649 0,-31.7716 5.7048,0 0,11.6246 c 0.4858,-1.1381 1.2075,-2.0475 2.1583,-2.7275 0.9507,-0.6871 2.0058,-1.027 3.1717,-1.027 1.6585,0 2.8244,0.5066 3.5115,1.5197 0.6871,1.0202 1.0273,2.8732 1.0273,5.5661 l 0,16.8157 -5.7047,0 0,-14.6991 c 0,-1.7073 -0.146,-2.8661 -0.4374,-3.4699 -0.2914,-0.6037 -0.8119,-0.9022 -1.5616,-0.9022 -0.7217,0 -1.2631,0.3537 -1.624,1.0686 -0.3608,0.7078 -0.5411,1.7697 -0.5411,3.1785 l 0,14.8241 -5.7048,0 z m 26.0323,-4.2472 c 0.923,0 1.5752,-0.5692 1.9641,-1.7005 0.3816,-1.1313 0.576,-3.0812 0.576,-5.8504 0,-2.7204 -0.1944,-4.6638 -0.5899,-5.8226 -0.3886,-1.1591 -1.0411,-1.7419 -1.9502,-1.7419 -0.8952,0 -1.5406,0.5899 -1.9432,1.7696 -0.3957,1.1798 -0.5969,3.1162 -0.5969,5.7949 0,2.6997 0.2012,4.6361 0.5969,5.8019 0.4026,1.1659 1.048,1.749 1.9432,1.749 z m -8.4115,-7.4676 c 0,-4.1156 0.6942,-7.183 2.0752,-9.2026 1.3811,-2.0194 3.4909,-3.0257 6.3292,-3.0257 2.8593,0 4.983,1.0063 6.378,3.0257 1.3881,2.0196 2.082,5.087 2.082,9.2026 0,4.1363 -0.6939,7.2037 -2.082,9.2095 -1.395,2.0055 -3.5187,3.005 -6.378,3.005 -2.8383,0 -4.9481,-1.0063 -6.3292,-3.0189 -1.381,-2.0126 -2.0752,-5.0731 -2.0752,-9.1956 z m 18.0791,7.8353 4.1221,-2.9911 c 0.354,0.8951 0.7911,1.5893 1.3187,2.0888 0.5275,0.493 1.0896,0.7427 1.6866,0.7427 0.555,0 1.0341,-0.2013 1.4366,-0.6109 0.3954,-0.4093 0.5967,-0.8952 0.5967,-1.4641 0,-0.9924 -1.0619,-2.1724 -3.1924,-3.5396 -0.3124,-0.2013 -0.5482,-0.3608 -0.7078,-0.4649 -1.7768,-1.1381 -3.0328,-2.2555 -3.7548,-3.3381 -0.7285,-1.0828 -1.0893,-2.332 -1.0893,-3.7408 0,-1.9364 0.6939,-3.5533 2.0817,-4.8442 1.395,-1.2977 3.13,-1.9431 5.2192,-1.9431 1.5335,0 2.8939,0.3886 4.0807,1.1659 1.1866,0.7843 2.0682,1.8669 2.651,3.2479 l -3.7894,2.5401 c -0.2012,-0.7565 -0.5689,-1.381 -1.1103,-1.8601 -0.5343,-0.4787 -1.1174,-0.7217 -1.7558,-0.7217 -0.6315,0 -1.152,0.1806 -1.5406,0.5415 -0.3957,0.3537 -0.5899,0.8189 -0.5899,1.3878 0,0.951 0.9853,2.0265 2.9495,3.2341 0.7979,0.4858 1.4088,0.8815 1.8459,1.18 1.4644,0.9853 2.5262,2.0055 3.1788,3.0535 0.6522,1.048 0.9785,2.2487 0.9785,3.5881 0,2.1515 -0.6803,3.8863 -2.0475,5.1982 -1.3601,1.3116 -3.1785,1.9709 -5.4408,1.9709 -1.5755,0 -2.9775,-0.3818 -4.2058,-1.1452 -1.2285,-0.7634 -2.1999,-1.853 -2.9216,-3.2757 z m 23.6931,-4.2681 c 0,1.4366 0.1318,2.3595 0.3886,2.762 0.2568,0.3957 0.7495,0.597 1.4783,0.597 0.0694,0 0.1734,-0.007 0.3191,-0.021 0.1389,-0.0139 0.243,-0.0207 0.3124,-0.0207 l 0,4.8719 c -0.7288,0.0834 -1.3742,0.1457 -1.9363,0.1874 -0.5621,0.0417 -1.0131,0.0624 -1.3533,0.0624 -1.853,0 -3.1368,-0.451 -3.8449,-1.3533 -0.7146,-0.9023 -1.0687,-2.7553 -1.0687,-5.559 l 0,-12.4503 -2.2901,0 0,-4.3722 2.2901,0 0,-4.9969 5.7048,0 0,4.9969 2.4984,0 0,4.3722 -2.4984,0 0,10.9236 z" />
                        <g>
                            <path d="m 37,0 14.2087,0 0,50.9653 -14.2087,0 0,-4.2521 8.9707,0 0,-42.4608 -8.9707,0 0,-4.2524 z m -7.1725,18.3309 3.9311,0 0,14.3057 -3.9311,0 0,-1.1938 2.046,0 0,-11.9184 -2.046,0 0,-1.1935 z m 3.8465,-7.7636 8.1974,0 0,29.8333 -8.1974,0 0,-2.4896 4.5349,0 0,-24.8548 -4.5349,0 0,-2.4889 z" />
                            <path d="m 14,0 -14.2087,0 0,50.9653 14.2087,0 0,-4.2521 -8.9708,0 0,-42.4608 8.9708,0 0,-4.2524 z m 7.1725,18.3309 -3.9311,0 0,14.3057 3.9311,0 0,-1.1938 -2.046,0 0,-11.9184 2.046,0 0,-1.1935 z m -3.8465,-7.7636 -8.1981,0 0,29.8333 8.1981,0 0,-2.4896 -4.535,0 0,-24.8548 4.535,0 0,-2.4889 z" />
                        </g>
                    </svg>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if (Route::has('domain'))
                            <li class="nav-item {{ Route::is('domain*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('domain') }}">Домены</a>
                            </li>
                        @endif
                        @if (Route::has('hosting'))
                            <li class="nav-item {{ Route::is('hosting*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('hosting') }}">Хостинг</a>
                            </li>
                        @endif
                        @if (Route::has('server'))
                            <li class="nav-item {{ Route::is('server*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('server') }}">Сервера</a>
                            </li>
                        @endif
                        @if (Route::has('ssl'))
                            <li class="nav-item {{ Route::is('ssl*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('ssl') }}">SSL-сертификаты</a>
                            </li>
                        @endif
                        @if (Route::has('cms'))
                            <li class="nav-item {{ Route::is('cms*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('cms') }}">Продажа CMS</a>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('home'))
                                <li class="nav-item {{ Route::is('home*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home') }}">Личный кабинет</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Личный кабинет
                                </a>

                                <ul class="dropdown-menu">
                                    @if (Route::has('home'))
                                        <li>
                                            <a class="dropdown-item" href="{{ route('home') }}">{{ $user->name }}</a>
                                        </li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0">
        @yield('slider')
        @yield('main')
    </main>

    <footer class="footer mt-auto py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="footer-lic">
                        <svg viewBox="0 0 16 16" class="bi bi-file-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <a href="https://rkn.gov.ru/it/control/p852/" target="_blank" title="Разъяснения Федеральной службы по надзорув сфере связи, информационных технологий и массовых коммуникаций">В соответствиями с разъяснениями Роскомнадзора лицензия на телематические услуги связи для оказания услуг хостинга не требуется.</a>
                    </div>
                    <div class="footer-lic">
                        <div class="float-left">
                            <svg viewBox="0 0 16 16" class="bi bi-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                        </div>
                        <div>Не гарантируем возврат денежных средств, сохранность данных и конфиденциальность!</div>
                        <div class="mt-2 d-none">Настоящий ресурс может содержать материалы 18+.</div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <ul class="footer-menu">
                                @if (Route::has('domain'))
                                    <li class="{{ Route::is('domain*') ? 'active' : '' }}"><a href="{{ route('domain') }}">Регистрация доменов</a></li>
                                @endif
                                @if (Route::has('hosting'))
                                    <li class="{{ Route::is('hosting*') ? 'active' : '' }}"><a href="{{ route('hosting') }}">Хостинг сайтов</a></li>
                                @endif
                                @if (Route::has('server'))
                                    <li class="{{ Route::is('server*') ? 'active' : '' }}"><a href="{{ route('server') }}">Виртуальные и выделенные сервера</a></li>
                                @endif
                                @if (Route::has('ssl'))
                                    <li class="{{ Route::is('ssl*') ? 'active' : '' }}"><a href="{{ route('ssl') }}">SSL-сертификаты</a></li>
                                @endif
                                @if (Route::has('cms'))
                                    <li class="{{ Route::is('cms*') ? 'active' : '' }}"><a href="{{ route('cms') }}">Продажа CMS</a></li>
                                @endif
                                {{--
                                <li><a href="/wordpress-hosting/">Wordpress хостинг</a></li>
                                <li><a href="/joomla-hosting/">Joomla хостинг</a></li>
                                <li><a href="/hosting-1c-bitrix/">1С-Битрикс хостинг</a></li>
                                <li><a href="/hosting-umi-cms/">UMI.CMS хостинг</a></li>
                                <li><a href="/hosting-dle/">DLE хостинг</a></li>
                                <li><a href="/hosting-modx/">MODx хостинг</a></li>
                                <li><a href="/cms-hosting/">Хостинг CMS</a></li>
                                <li><a href="/bezlimitnyj-hosting/">Безлимитный хостинг</a></li>
                                <li><a href="/vip-hosting/">VIP хостинг</a></li>
                                <li><a href="/besplatnyj-hosting/">Бесплатный хостинг</a></li>
                                <li><a href="/about/">О компании</a></li>
                                <li><a href="/arenda-servera-dedicated/">Выделенные (dedicated)</a></li>
                                <li><a href="/arenda-servera-bitrix24/">Сервер Битрикс24</a></li>
                                <li><a href="/documents/">Документы</a></li>
                                <li><a href="/prodlenie-domenov/">Продление доменов</a></li>
                                <li><a href="/vds-vps-kvm-nvme-server/">VDS на NVMe (KVM)</a></li>
                                <li><a href="/hosting-dlya-foruma/">Хостинг для форума</a></li>
                                <li><a href="/hosting-dlya-amiro-cms/">Хостинг Amiro.CMS</a></li>
                                <li><a href="/hosting-typo3/">Хостинг TYPO3</a></li>
                                <li><a href="/hosting-dlya-opencart/">Хостинг для OpenCart</a></li>
                                <!--<li><a href="/#" rel="nofollow">Партнерская программа</a></li>-->
                                --}}
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <ul class="footer-menu">
                                @if (Route::has('home'))
                                    <li class="{{ Route::is('home*') ? 'active' : '' }}"><a href="{{ route('home') }}">Личный кабинет</a></li>
                                @endif
                                @if (Route::has('support'))
                                    <li class="{{ Route::is('support*') ? 'active' : '' }}"><a href="{{ route('support') }}">Техническая поддержка</a></li>
                                @endif
                                @if (Route::has('info'))
                                    <li class="{{ Route::is('info*') ? 'active' : '' }}"><a href="{{ route('info') }}">О проекте</a></li>
                                @endif
                                @if (Route::has('conversation'))
                                    <li class="{{ Route::is('conversation*') ? 'active' : '' }}"><a href="{{ route('conversation') }}">Разговоры на балконе</a></li>
                                @endif
                                <!--li><a href="">О лицензировании</a></li-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy mt-3">
                © 2018-{{ date('Y') }}, {{ $message }}{{--Проект «Балкон.Хост» — неадекватный хостинг --}}
            </div>
            <div class="footer-social mt-5 text-center">
                <a href="https://vk.com/balkon.host" title="Вконтакте" target="_blank">Вконтакте</a> ·
                <del><a href="https://t.me/balkonhost" title="Telegram" target="_blank">Telegram</a></del> ·
                <del><a href="https://twitter.com/balkonhost" title="Telegram" target="_blank">Twitter</a></del> ·
                <del><a href="https://www.facebook.com/balkon.host" title="Facebook" target="_blank">Facebook</a></del> ·
                <del><a href="https://www.instagram.com/balkon.host" title="Instagram" target="_blank">Instagram</a></del>
            </div>
            <div class="footer-version mt-5 text-center">
                Версия <a href="https://github.com/balkonhost/site/releases" target="_blank" title="Последная версия на GitHub">{{ env('APP_VERSION') }}</a> · Дальше будет хуже
            </div>
        </div>
    </footer>
    @show

    <script src="{{ mix('js/app.js') }}"></script>

    @yield('script')

    @if (!in_array(request()->ip(), ['::1', '127.0.0.1', '217.64.132.174', '217.64.134.161']))
        <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(65159950, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/65159950" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    @endif
</body>
</html>
