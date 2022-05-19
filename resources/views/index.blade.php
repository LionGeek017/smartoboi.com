<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>{{ $meta->meta_title ?? '' }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset($ogImage ?? 'img/brand/favicon.png') }}" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ URL::asset('libs/@fortawesome/fontawesome-free/css/all.min.css') }}"><!-- Purpose CSS -->
    <link rel="stylesheet" href="{{ URL::asset('libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/flatpickr/dist/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/swiper/dist/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{--    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ URL::asset('css/purpose.css') }}" rel="stylesheet" type="text/css">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="SmartOboi">
    <meta property="og:title" content="{{ $meta->meta_title ?? '' }}">
    <meta property="og:description" content="{{ $meta->meta_description ?? '' }}">
    <meta property="og:keywords" content="{{ $meta->meta_keywords ?? '' }}">
    <meta property="og:url" content="https://smartoboi.com">
{{-- <meta property="og:image" content="">
<meta property="og:image:width" content="">
<meta property="og:image:height" content=""> --}}
<!-- CSRF Token -->
    <meta name="csrf-token" content="O5KfwAfxVXfFOgqp7hKMFeSx0gaRcmqVvPykBPFR">
</head>

<body class="d-flex flex-column min-vh-100">

{{--<!--LiveInternet counter--><script>--}}
{{--    new Image().src = "https://counter.yadro.ru/hit?r"+--}}
{{--        escape(document.referrer)+((typeof(screen)=="undefined")?"":--}}
{{--            ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?--}}
{{--                screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+--}}
{{--        ";h"+escape(document.title.substring(0,150))+--}}
{{--        ";"+Math.random();</script><!--/LiveInternet-->--}}

<header class="header" id="header-main">
    <!-- Topbar -->
    <div id="navbar-top-main" class="navbar-top  navbar-light bg-white border-bottom">
        <div class="container px-0">
            <div class="navbar-nav align-items-center">
                <div class="d-none d-lg-inline-block">
                    <span class="navbar-text mr-3">Бесплатные обои для твоего гаджета</span>
                </div>
                <div class="ml-auto">
                    <ul class="nav">
                        <!-- Authentication Links -->
                        @guest
                            {{-- @if (Route::has('register'))
                                <li class="nav-item mx-1">
                                    <a href="{{ route('register') }}" class="btn btn-warning text-white nav-link">
                                        Создать аккаунт
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item ml-1">
                                    <a href="{{ route('login') }}" class="btn btn-warning text-white nav-link">
                                        Войти
                                    </a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item align-self-center">
                                <a class="" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @include('layouts.user-avatar', ['nexClass' => 'avatar-sm'])
                                </a>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Привет, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right shadow">
                                    <h6 class="dropdown-header">Ваш ID: {{ Auth::id() }}</h6>
                                    <a class="dropdown-item" href="{{ route('aaadminca.home') }}">
                                        <i class="fas fa-user-shield"></i>Админ панель
                                    </a>
                                    <div class="dropdown-divider" role="presentation"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>Выход
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Navigation -->
    @if(Route::is('aaadminca*'))
        @include('admin.main-nav-top')
    @else
        @include('site.main-nav-top')
    @endif
</header>

<div class="main-content">
    @yield('main_content')
</div>

<div class="alert alert-modern alert-success" style="display: none;" role="alert">
        <span class="badge badge-success badge-pill">
            OK
        </span>
    <span class="alert-content"></span>
</div>

<footer class="footer footer-dark bg-dark mt-auto" id="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4 class="heading mb-3">
                    <a class="text-white" href="/">
                        SmartOboi
                    </a>
                </h4>
                <p class="text-sm">
                    Сервис обоев для смартфонов и планшетов
                </p>
                <p class="text-sm">
                    Высокое качество наших обоев гарантирует приятный и стильный вид вашего устройства, скачать которые можно абсолютно бесплатно.
                </p>
            </div>
            <div class="col-6 col-sm-4 col-md-2 ml-lg-auto">
                <h6 class="heading mb-3">Навигация</h6>
                <ul class="list-unstyled">
                    {{-- <li><a href="#">Категории</a></li> --}}
                    <li><a href="{{ route('wallpaper.index') }}">Все обои</a></li>
                    <li><a href="{{ route('login') }}">Вход в кабинет</a></li>
                    {{-- <li><a href="{{ route('register') }}">Создать аккаунт</a></li> --}}
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <h6 class="heading mb-3">Информация</h6>
                <ul class="list-unstyled text-small">
                    <li><a href="#">Блог</a></li>
                    <li><a href="#">Правила</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="{{ route('information', ['type' => 'privacy', 'name' => 'SmartOboi']) }}">Политика конфиденциальности</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4">
                <h6 class="heading mb-3">Приложения</h6>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://play.google.com/store/apps/details?id=smartoboi.smart_oboi" title="Установить с Google Play"> <i class="fab fa-google-play"></i> Google Play</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="copyright text-sm font-weight-bold text-center text-md-left py-2">
                    &copy; {{ $date->year }} MobileWallpaper
                </div>
            </div>
            <div class="col-12 col-md-6">
                <ul class="nav justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
{{--                    <li class="nav-item ali">--}}
{{--                        <!--LiveInternet logo-->--}}
{{--                        <a href="https://www.liveinternet.ru/click"--}}
{{--                           target="_blank"><img src="https://counter.yadro.ru/logo?18.2"--}}
{{--                                                title="LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня"--}}
{{--                                                alt="" style="border:0" width="88" height="31"/></a>--}}
{{--                        <!--/LiveInternet-->--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Core JS -->
<script src="{{ asset('js/purpose.core.js') }}"></script>
{{--<script src="{{ URL::asset('js/app.js') }}"></script>--}}
{{--<!-- Page JS -->--}}
<script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('libs/swiper/dist/js/swiper.min.js') }}"></script>
{{--<!-- Purpose JS -->--}}
<script src="{{ asset('js/purpose.js') }}"></script>

<script src="{{ asset('js/functions.js') }}"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.textarea-editor').summernote();
    });
</script>
</body>

</html>
