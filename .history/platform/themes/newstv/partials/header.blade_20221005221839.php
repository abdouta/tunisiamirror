<!--[if IE 8]>
<html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Roboto Slab')) }}:100,300,400,700" rel="stylesheet" type="text/css">
    <!-- CSS Library-->
    <link rel="icon shortcut" href="/storage/logo/fv.png">

    {!! Theme::header() !!}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/themes/newstv/pad/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/themes/newstv/pad/css/font-awesome.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/themes/newstv/pad/css/plugins.css">
    <!-- rypp -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="/themes/newstv/pad/css/rypp.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/themes/newstv/pad/css/owl.carousel.css">
    <link rel="stylesheet" href="/themes/newstv/pad/css/theme-style1.css">
    <link rel="stylesheet" href="/themes/newstv/pad/css/theme-style1.css">
    <link rel="stylesheet" href="/themes/newstv/pad/css/pad-style1.css?v=<?php $date = new \DateTime('now');
    echo $date->format('d.G.i'); ?>">

    @if (class_exists('Language', false) && Language::getCurrentLocaleRTL())
    <link rel="stylesheet" href="/themes/newstv/pad/css/ar-style1.css">
    @endif

    <title>{{ \SeoHelper::getTitle() }}</title>

    <!-- Modernizer JS -->
    <script src="/themes/newstv/pad/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id='loader-container'>
        <div id="loader"></div>
    </div>
    {{--@if (class_exists('Language', false) && Language::getCurrentLocaleRTL()) dir="rtl" class="ar-lang" @endif--}}
    <div class="wrapper" id="site_wrapper">
        <header class="header" id="header">


            <nav class="navbar navbar-default hidden" role="navigation">
                <div class="container">


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        {!!
                        Menu::renderMenuLocation('main-menu', [
                        'options' => ['class' => ''],
                        'theme' => true,
                        'view' => 'custom-menu',
                        ])
                        !!}

                        @if (is_plugin_active('blog'))
                        <form class="navbar-form navbar-right" role="search" accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET">
                            <div class="tn-searchtop">
                                <button type="button" class="btn btn-default js-btn-searchtop">
                                    <i class="fa fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('البحث...') }}" name="q">
                                </div>
                            </div>
                            <button id="tn-searchtop" class="js-btn-searchtop" type="button"><i class="fa fa-search"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </nav>


            <!-- Header Top Start -->
            <div class="header-top section">
                <div class="container">
                    <div class="row">

                        <!-- Header Top Links Start -->
                        <div class="header-top-links col-md-9 col-6">

                            <!-- Header Links -->
                            <ul class="header-links">

                                <li class="disabled block d-none d-md-block"><a href="#">{{ ArabicDate(NOW()) }}<i class="fa fa-clock-o"></i>
                                    </a></li>

                                <li class="hidden">
                                    <div class="pull-right">
                                        @if (is_plugin_active('member'))
                                        <ul class="pull-left">
                                            @auth('member')
                                            <li><a href="{{ route('public.member.dashboard') }}" rel="nofollow"><i class="fa fa-user"></i>
                                                    <span>{{ auth('member')->user()->getFullName() }}</span></a></li>
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fa fa-sign-out"></i> {{ __('Logout') }}</a>
                                            </li>
                                            @elseauth
                                            <li><a href="{{ route('public.member.login') }}" rel="nofollow"><i class="fa fa-sign-in"></i> {{ __('Login') }}</a></li>
                                            @endauth
                                        </ul>
                                        @auth('member')
                                        <form id="logout-form" action="{{ route('public.member.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        @endauth
                                        @endif

                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-phone"></i>تواصل معنا</a></li>

                            </ul>

                            <div class="language-wrapper hidden">
                                {!! apply_filters('language_switcher') !!}
                            </div>

                        </div><!-- Header Top Links End -->

                        <!-- Header Top Social Start -->
                        <div class="header-top-social col-md-3 col-6">

                            <!-- Header Social -->
                            <div class="header-social">
                                <a target="_blank" href="{{ theme_option('facebook') }}" title="Facebook" class="hi-icon fa fa-facebook"></a>
                                <a target="_blank" href="{{ theme_option('twitter') }}" title="Twitter" class="hi-icon fa fa-twitter"></a>
                                <a target="_blank" href="{{ theme_option('instagram') }}" title="Twitter" class="hi-icon fa fa-instagram"></a>
                                <a target="_blank" href="{{ theme_option('youtube') }}" title="Youtube" class="hi-icon fa fa-youtube-play"></a>

                            </div>

                        </div><!-- Header Top Social End -->

                    </div>
                </div>
            </div><!-- Header Top End -->

            <!-- Header Start -->
            <div class="header-section section">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- Header Logo -->
                        <div class="header-logo col-md-4 d-none d-md-block">
                            <a href="{{ route('public.single') }}" title="{{ theme_option('site_title') }}">
                                <img src="{{ RvMedia::getImageUrl(theme_option('logo', Theme::asset()->url('images/logo.png'))) }}" alt="{{ theme_option('site_title') }}">
                            </a>
                        </div>
                        <div class="col-md-8 banner">
                            <img src="/themes/newstv/images/Asset-1.png">
                        </div>
                        <div class="mobile-logo d-none d-block d-md-none">
                            <a href="/">

                                <img src="{{ RvMedia::getImageUrl(theme_option('logo', Theme::asset()->url('images/logo.png'))) }}" alt="{{ theme_option('site_title') }}">
                            </a>
                        </div>

                    </div>
                </div>
            </div><!-- Header End -->

            <!-- Menu Section Start -->
            <div class="menu-section section bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-section-wrap">

                                <!-- Main Menu Start -->
                                <div class="main-menu float-left d-none d-md-block">

                                    <nav>
                                        {!!
                                        Menu::renderMenuLocation('main-menu', [ //
                                        'options' => ['class'=>'navigation clearfix'],
                                        'theme' => true,
                                        ])
                                        !!}

                                    </nav>
                                </div><!-- Main Menu Start -->
                                <div class="mobile-logo d-none d-block d-md-none">
                                    <a href="/">


                                    </a>
                                </div>


                                <!-- Header Search -->
                                <div class="header-search float-right">

                                    <!-- Search Toggle -->
                                    <button class="header-search-toggle"><i class="fa fa-search"></i></button>

                                    <!-- Header Search Form -->
                                    <div class="header-search-form">
                                        <form class="navbar-form navbar-right" role="search" accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET">
                                            <div class="tn-searchtop">

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="{{ __('البحث...') }}" name="q">
                                                </div>
                                            </div>
                                            <button id="tn-searchtop" class="js-btn-searchtop" type="button"><i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>

                                <!-- Mobile Menu Wrap -->
                                <div class="mobile-menu-wrap d-none">
                                    {!!
                                    Menu::renderMenuLocation('main-menu', [ //
                                    'options' => [],
                                    'theme' => true,
                                    ])
                                    !!}
                                </div>

                                <!-- Mobile Menu -->
                                <div class="mobile-menu"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Menu Section End -->

            <!-- Breaking News Section Start -->
            <div class="breaking-news-section section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!-- Breaking News Wrapper Start -->
                            <div class="breaking-news-wrapper">

                                <!-- Breaking News Title -->
                                <h5 class="breaking-news-title ">{{ __('BreakingNews') }}</h5>

                                <!-- Breaking Newsticker Start -->
                                <ul class="breaking-news-ticker ">
                                    @foreach (get_featured_posts(5) as $feature_item)
                                    <li><a href="{{ $feature_item->url }}" title="{{ $feature_item->name }}">{{ $feature_item->name }}</a></li>
                                    @endforeach

                                </ul><!-- Breaking Newsticker Start -->

                                <!-- Breaking News Nav -->
                                <div class="breaking-news-nav">
                                    <button class="news-ticker-prev"><i class="fa fa-angle-left"></i></button>
                                    <button class="news-ticker-next"><i class="fa fa-angle-right"></i></button>
                                </div>

                            </div><!-- Breaking News Wrapper End -->

                        </div>
                    </div>
                </div>
            </div><!-- Breaking News Section End -->


        </header>
