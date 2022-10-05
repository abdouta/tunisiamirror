@php Theme::layout('no-sidebar') @endphp

<?php
$populars = Botble\Blog\Models\Post::getPopularPosts(5);
$politic = \Botble\Blog\Models\Category::find(55);
$press = \Botble\Blog\Models\Category::find(28);
$detect = \Botble\Blog\Models\Category::find(23);
$sport = \Botble\Blog\Models\Category::find(24);
$variety = \Botble\Blog\Models\Category::find(25);
$culture = \Botble\Blog\Models\Category::find(24);
$style = \Botble\Blog\Models\Category::find(26);
$economy = \Botble\Blog\Models\Category::find(27);
$video = \Botble\Blog\Models\Category::find(51);
$health = \Botble\Blog\Models\Category::find(64);

?>
<!-- Main Wrapper -->
<div id="main-wrapper" class="home-page">

    <!-- Hero Section Start -->

    {!! do_shortcode('[featured-posts][/featured-posts]') !!}

    <!-- Popular Section Start -->
    <!-- Popular Section End -->

    <!-- Post Section Start -->
    <div class="post-section  section mb-50 mb-50">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head feature-head politic">

                            <!-- Title -->
                            <h4 class="title">{{ $politic->name }}</h4>

                            <!-- Tab List Start -->
                            <ul class="post-block-tab-list feature-post-tab-list nav d-none d-md-block">
                                <?php $active = 'active'; ?>
                                @foreach ($politic->children as $politic_cat)
                                    <li><a class="{{ $active }}" data-toggle="tab"
                                            href="#politic-cat-{{ $politic_cat->id }}">{{ $politic_cat->name }}</a>
                                    </li>
                                    <?php $active = ''; ?>
                                @endforeach


                            </ul><!-- Tab List End -->

                            <!-- Tab List Start -->
                            <ul class="post-block-tab-list feature-post-tab-list nav d-sm-block d-md-none">
                                <li><a class="dropdown-toggle" data-toggle="dropdown"
                                        href="#">{{ __('Cat') }}</a>

                                    <!-- Dropdown -->
                                    <ul class="dropdown-menu">
                                        @foreach ($politic->children as $politic_cat)
                                            <li><a class="{{ $active }}" data-toggle="tab"
                                                    href="#politic-cat-{{ $politic_cat->id }}">{{ $politic_cat->name }}</a>
                                            </li>
                                            <?php $active = ''; ?>
                                        @endforeach
                                    </ul>

                                </li>
                            </ul><!-- Tab List End -->

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0 politic-posts">

                            <!-- Tab Content Start-->
                            <div class="tab-content">
                                <?php $show = 'show active'; ?>
                                <!-- Tab Pane Start-->
                                @foreach ($politic->children as $politic_cat)
                                    <div class="tab-pane fade  {{ $show }}"
                                        id="politic-cat-{{ $politic_cat->id }}">

                                        <div class="row">

                                            <!-- Post Wrapper Start -->
                                            <div class="col-md-8 col-12 mb-20">
                                                @php
                                                $politic_posts = \Botble\Blog\Models\Post::getPostsByCategory($politic_cat->id, 4, 0); @endphp

                                                <div class="row">
                                                    @foreach ($politic_posts as $politic_post)
                                                        <div
                                                            class="post feature-post post-separator-border col-md-6 col-lg-6 mb-20">
                                                            <div class="post-wrap">

                                                                <!-- Image -->
                                                                <a class="image" href="{{ $politic_post->url }}"><img
                                                                        src="{{ RvMedia::getImageUrl($politic_post->image, $loop->first ? 'featured' : 'medium') }}"
                                                                        alt="post"></a>

                                                                <!-- Content -->
                                                                <div class="content">

                                                                    <!-- Title -->
                                                                    <h4 class="title"><a
                                                                            href="{{ $politic_post->url }}">{{ $politic_post->name }}</a>
                                                                    </h4>

                                                                    <!-- Meta -->
                                                                    <div class="meta fix">
                                                                        {{-- <a href="#" class="meta-item author"><i --}}
                                                                        {{-- class="fa fa-user"></i>Sathi Bhuiyan</a> --}}
                                                                        <span class="meta-item date"><i
                                                                                class="fa fa-clock-o"></i>{{ ArabicDate($politic_post->created_at) }}</span>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- Post End -->
                                                    @endforeach
                                                </div>


                                            </div><!-- Post Wrapper End -->


                                            <!-- Small Post Wrapper Start -->
                                            <div class="col-md-4 col-12 mb-20">

                                                @foreach ($politic_posts_small = \Botble\Blog\Models\Post::getPostsByCategory($politic_cat->id, 6) as $politic_post_small)
                                                    <!-- Post Small Start -->
                                                    <div
                                                        class="post post-small post-list feature-post post-separator-border">
                                                        <div class="post-wrap">

                                                            <!-- Image -->
                                                            <a class="image"
                                                                href="{{ $politic_post_small->url }}"><img
                                                                    src="{{ RvMedia::getImageUrl($politic_post_small->image, $loop->first ? 'under_post' : 'medium') }}"
                                                                    alt="post"></a>

                                                            <!-- Content -->
                                                            <div class="content">

                                                                <!-- Title -->
                                                                <h5 class="title"><a
                                                                        href="{{ $politic_post_small->url }}">{{ $politic_post_small->name }}</a>
                                                                </h5>

                                                                <!-- Meta -->
                                                                <div class="meta fix">
                                                                    <span class="meta-item date"><i
                                                                            class="fa fa-clock-o"></i>{{ ArabicDate($politic_post_small->created_at) }}</span>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div><!-- Post Small End -->
                                                @endforeach
                                            </div><!-- Small Post Wrapper End -->

                                        </div>

                                    </div><!-- Tab Pane End-->
                                    <?php $show = ''; ?>
                                @endforeach


                            </div><!-- Tab Content End-->

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

            </div><!-- Feature Post Row End -->


            <div class="recent-section section bg-dark mb-50">
                <div class="container">

                    <!-- Feature Post Row Start -->
                    <div class="row">

                        <div class="col-12">

                            <!-- Post Block Wrapper Start -->
                            <div class="post-block-wrapper dark most-read">

                                <!-- Post Block Head Start -->
                                <div class="head life-style-head">

                                    <!-- Title -->
                                    <h4 class="title white">صحة</h4>

                                </div><!-- Post Block Head End -->

                                <!-- Post Block Body Start -->
                                <div class="body">

                                    <div
                                        class="three-column-post-carousel column-post-carousel post-block-carousel dark life-style-post-carousel row">
                                        <?php $health_posts = \Botble\Blog\Models\Post::getPostsByCategory(64, 6, 0); ?>
                                        @foreach ($health_posts as $popular_post)
                                            <!-- Post Start -->

                                            <div class="post post-dark life-style-post col">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="{{ $popular_post->url }}">
                                                        <img src="{{ RvMedia::getImageUrl($popular_post->image, $loop->first ? 'featured' : 'medium') }}"
                                                            alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a
                                                                href="{{ $popular_post->url }}">{{ $popular_post->name }}</a>
                                                        </h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">

                                                            <span class="meta-item date"><i
                                                                    class="fa fa-clock-o"></i>{{ ArabicDate($popular_post->created_at) }}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post End -->
                                        @endforeach
                                        <!-- Post Start -->


                                    </div>

                                </div><!-- Post Block Body End -->

                            </div><!-- Post Block Wrapper End -->

                        </div>

                    </div><!-- Feature Post Row End -->

                </div>
            </div><!-- Popular Section End -->

            <div class="row">
                <div class="col-lg-8 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper economy-posts">

                        <!-- Post Block Head Start -->
                        <div class="head feature-head economy">

                            <!-- Title -->
                            <h4 class="title">{{ $economy->name }}</h4>



                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0">

                            <!-- Tab Content Start-->
                            <div class="">
                                <?php $show = 'show active'; ?>
                                <!-- Tab Pane Start-->

                                <div class="row" id="economy-cat-all">
                                    <!-- Small Post Wrapper Start -->


                                    @foreach ($economy_posts_small = \Botble\Blog\Models\Post::getPostsByCategory(27, 4) as $economy_post_small)
                                        <div class="post post-overlay sports-post col-md-6 mb-20">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <div class="image"><img
                                                        src="{{ RvMedia::getImageUrl($economy_post_small->image, $loop->first ? 'featured' : 'medium') }}"
                                                        alt="post"></div>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title"><a
                                                            href="{{ $economy_post_small->url }}">{{ $economy_post_small->name }}</a>
                                                    </h4>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <span class="meta-item date"><i
                                                                class="fa fa-clock-o"></i>{{ ArabicDate($economy_post_small->created_at) }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div><!-- Tab Content End-->

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4 currencies-section col-12 mb-50">
                    <div class="row">

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <!-- Sidebar Block Wrapper -->
                            <div class="sidebar-block-wrapper">

                                <!-- Sidebar Block Head Start -->
                                <div class="head feature-head">

                                    <!-- Title -->
                                    <h4 class="title">{{ __('currencies') }}</h4>

                                </div><!-- Sidebar Block Head End -->

                                <!-- Sidebar Block Body Start -->
                                <div class="body ">
                                    {!!  do_shortcode('[currencies][/currencies]') !!}

                                </div><!-- Sidebar Block Body End -->

                            </div>
                        </div>

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            <a class="weatherwidget-io" href="https://forecast7.com/en/36d8110d18/tunis/"
                                data-label_1="TUNIS" data-label_2="WEATHER" data-theme="pure">TUNIS WEATHER</a>
                            <script>
                                ! function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = 'https://weatherwidget.io/js/widget.min.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'weatherwidget-io-js');
                            </script>

                        </div>

                    </div>
                </div><!-- Sidebar End -->

            </div>
            {{-- @include('templates.economy') --}}

            <!-- Football Post Row Start -->
            <div class="row vid">

                <div class="col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper dark bg-dark vid-dark">

                        <!-- Post Block Head Start -->
                        <div class="head sports-head">

                            <!-- Title -->
                            <h4 class="title">فيديو</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0">
                            <div class="row">

                                <?php $video_posts = \Botble\Blog\Models\Post::getPostsByCategory(51, 1); ?>
                                @if ($video_posts)
                                    @foreach ($video_posts as $video_post)
                                        <div class="post post-dark col-lg-7 col-12 mb-20">
                                            <div class="post-wrap">
                                                <div class="o-video">
                                                    <iframe id="main-vid"
                                                        src="https://www.youtube.com/embed/{{ GetYoutubeID($video_post->youtube_url) }}"
                                                        allowfullscreen></iframe>
                                                </div>


                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="col-lg-5 col-12 mb-20">
                                    <div class="row">
                                        @foreach (\Botble\Blog\Models\Post::getPostsByCategory(51, 4) as $video_post_small)
                                            @if ($video_post_small->youtube_url)
                                                <div data-yid="{{ GetYoutubeID($video_post_small->youtube_url) }}"
                                                    class="col-6 post post-small post-small-youtube post-list post-dark post-separator-border">
                                                    <div class="">

                                                        <!-- Image -->
                                                        <img style="width:100%;"
                                                            src="{{ RvMedia::getImageUrl($video_post_small->image, $loop->first ? 'featured' : 'featured') }}"
                                                            alt="post">

                                                        <!-- Content -->
                                                        <div class="content">

                                                            <!-- Title -->


                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

            </div><!-- Football Post Row End -->

            <div class="row press">
                <div class="col-lg-8 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head feature-head">

                            <!-- Title -->
                            <h4 class="title">{{ $press->name }}</h4>

                            <!-- Tab List Start -->
                            <ul class="post-block-tab-list feature-post-tab-list nav d-none d-md-block">
                                <?php $active = 'active'; ?>
                                @foreach ($press->children as $press_cat)
                                    <li><a class="{{ $active }}" data-toggle="tab"
                                            href="#politic-cat-{{ $press_cat->id }}">{{ $press_cat->name }}</a>
                                    </li>
                                    <?php $active = ''; ?>
                                @endforeach

                                <li><a class="{{ $active }}" data-toggle="tab"
                                        href="#politic-cat-all">{{ __('صحافة') }}</a>
                                </li>
                            </ul><!-- Tab List End -->


                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0">

                            <!-- Tab Content Start-->
                            <div class="tab-content">
                                <?php $show = 'show active'; ?>
                                <!-- Tab Pane Start-->
                                @foreach ($press->children as $press_cat)
                                    <div class="tab-pane fade  {{ $show }}"
                                        id="politic-cat-{{ $press_cat->id }}">

                                        <div class="row">

                                            <!-- Post Wrapper Start -->
                                            <div class="col-md-6 col-12 mb-20">
                                                @php
                                                    $press_posts = \Botble\Blog\Models\Post::getPostsByCategory($press_cat->id, 1, 0);
                                                @endphp

                                                @foreach ($press_posts as $press_post)
                                                    <!-- Overlay Post Start -->
                                                    <div
                                                        class="post post-overlay life-style-post post-separator-border">
                                                        <div class="post-wrap">

                                                            <!-- Image -->
                                                            <a class="image" href="{{ $press_post->url }}"><img
                                                                    src="{{ RvMedia::getImageUrl($press_post->image, $loop->first ? 'thumb' : 'medium') }}"
                                                                    alt="post"></a>
                                                            <!-- Content -->
                                                            <div class="content">

                                                                <!-- Title -->
                                                                <h4 class="title"><a
                                                                        href="{{ $press_post->url }}">{{ $press_post->name }}</a>
                                                                </h4>


                                                                <!-- Meta -->
                                                                <div class="meta fix">
                                                                    <span class="meta-item date"><i
                                                                            class="fa fa-clock-o"></i>{{ ArabicDate($press_post->created_at) }}</span>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- Overlay Post End -->
                                                @endforeach


                                            </div><!-- Post Wrapper End -->

                                            <!-- Small Post Wrapper Start -->
                                            <div class="col-md-6 col-12 mb-20">

                                                @foreach ($press_posts_small = \Botble\Blog\Models\Post::getPostsByCategory($press_cat->id, 4) as $press_post_small)
                                                    <!-- Post Small Start -->
                                                    <div
                                                        class="post post-small post-list feature-post post-separator-border">
                                                        <div class="post-wrap">

                                                            <!-- Image -->
                                                            <a class="image"
                                                                href="{{ $press_post_small->url }}"><img
                                                                    src="{{ RvMedia::getImageUrl($press_post_small->image, $loop->first ? 'thumb' : 'medium') }}"
                                                                    alt="post"></a>
                                                            <!-- Content -->
                                                            <div class="content">

                                                                <!-- Title -->
                                                                <h5 class="title"><a
                                                                        href="{{ $press_post_small->url }}">{{ $press_post_small->name }}</a>
                                                                </h5>

                                                                <!-- Meta -->
                                                                <div class="meta fix">
                                                                    <span class="meta-item date"><i
                                                                            class="fa fa-clock-o"></i>{{ ArabicDate($press_post_small->created_at) }}</span>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div><!-- Post Small End -->
                                                @endforeach
                                            </div><!-- Small Post Wrapper End -->

                                        </div>

                                    </div><!-- Tab Pane End-->
                                    <?php $show = ''; ?>
                                @endforeach
                                <div class="tab-pane fade " id="politic-cat-all">

                                    <div class="row">

                                        <!-- Post Wrapper Start -->
                                        <div class="col-md-6 col-12 mb-20">
                                            @php
                                                $press_posts = \Botble\Blog\Models\Post::getPostsByCategory(28, 1, 0);
                                            @endphp

                                            @foreach ($press_posts as $press_post)
                                                <!-- Overlay Post Start -->
                                                <div class="post post-overlay life-style-post post-separator-border">
                                                    <div class="post-wrap">

                                                        <!-- Image -->
                                                        <a class="image" href="{{ $press_post->url }}"><img
                                                                src="{{ RvMedia::getImageUrl($press_post->image, $loop->first ? 'thumb' : 'medium') }}"
                                                                alt="post"></a>
                                                        <!-- Content -->
                                                        <div class="content">

                                                            <!-- Title -->
                                                            <h4 class="title"><a
                                                                    href="{{ $press_post->url }}">{{ $press_post->name }}</a>
                                                            </h4>


                                                            <!-- Meta -->
                                                            <div class="meta fix">
                                                                <span class="meta-item date"><i
                                                                        class="fa fa-clock-o"></i>{{ ArabicDate($press_post->created_at) }}</span>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div><!-- Overlay Post End -->
                                            @endforeach


                                        </div><!-- Post Wrapper End -->

                                        <!-- Small Post Wrapper Start -->
                                        <div class="col-md-6 col-12 mb-20">

                                            @foreach ($press_posts_small = \Botble\Blog\Models\Post::getPostsByCategory($press_cat->id, 4) as $press_post_small)
                                                <!-- Post Small Start -->
                                                <div
                                                    class="post post-small post-list feature-post post-separator-border">
                                                    <div class="post-wrap">

                                                        <!-- Image -->
                                                        <a class="image" href="{{ $press_post_small->url }}"><img
                                                                src="{{ RvMedia::getImageUrl($press_post_small->image, $loop->first ? 'thumb' : 'medium') }}"
                                                                alt="post"></a>
                                                        <!-- Content -->
                                                        <div class="content">

                                                            <!-- Title -->
                                                            <h5 class="title"><a
                                                                    href="{{ $press_post_small->url }}">{{ $press_post_small->name }}</a>
                                                            </h5>

                                                            <!-- Meta -->
                                                            <div class="meta fix">
                                                                <span class="meta-item date"><i
                                                                        class="fa fa-clock-o"></i>{{ ArabicDate($press_post_small->created_at) }}</span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div><!-- Post Small End -->
                                            @endforeach
                                        </div><!-- Small Post Wrapper End -->

                                    </div>

                                </div><!-- Tab Pane End-->

                            </div><!-- Tab Content End-->

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>


                <!-- Sidebar Start -->
                <div class="col-lg-4 col-12 mb-50">
                    <div class="row detect">

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <!-- Sidebar Block Wrapper -->
                            <div class="sidebar-block-wrapper">

                                <!-- Sidebar Block Head Start -->
                                <div class="head life-style-head">

                                    <!-- Title -->
                                    <h4 class="title">{{ $detect->name }}</h4>

                                </div><!-- Sidebar Block Head End -->

                                <!-- Sidebar Block Body Start -->
                                <div class="body">

                                    <!-- Sidebar Post Slider Start -->
                                    <div class="sidebar-post-carousel post-block-carousel life-style-post-carousel">

                                        @foreach ($detect_posts = \Botble\Blog\Models\Post::getPostsByCategory($detect->id, 3) as $detect_post)
                                            <!-- Post Small Start -->
                                            <div class="post life-style-post">
                                                <div class="post-wrap">

                                                    <a class="image" href="{{ $detect_post->url }}"><img
                                                            src="{{ RvMedia::getImageUrl($detect_post->image, $loop->first ? 'featured' : 'medium') }}"
                                                            alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h4 class="title"><a
                                                                href="{{ $detect_post->url }}">{{ $detect_post->name }}</a>
                                                        </h4>

                                                        <!-- Read More Button -->
                                                        <a href="#"
                                                            class="read-more btn">{{ __('continue reading') }}</a>

                                                    </div>

                                                </div>
                                            </div><!-- Post End -->
                                        @endforeach
                                        <!-- Post Start -->


                                    </div><!-- Sidebar Post Slider End -->

                                </div><!-- Sidebar Block Body End -->

                            </div>

                        </div>

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            @if (theme_option('banner-ads-1'))
                                <!-- Sidebar Banner -->
                                <a href="#" class="sidebar-banner"><img
                                        src="{{ theme_option('banner-ads-1') ? RvMedia::getImageUrl(theme_option('banner-ads-1')) : Theme::asset()->url('images/banner.png') }}"
                                        alt="Sidebar Banner"></a>
                            @endif
                        </div>

                    </div>
                </div><!-- Sidebar End -->

            </div><!-- Life Style Post Row End -->


            <!-- Sports Post Row Start -->
            <div class="row mb-50 sport">

                <div class="col-12">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head sports-head">

                            <!-- Title -->
                            <h4 class="title">{{ $sport->name }}</h4>

                            <!-- Tab List Start -->
                            <ul class="post-block-tab-list sports-post-tab-list nav d-none d-md-block">

                                <?php $active = 'active'; ?>
                                @foreach ($sport->children as $sport_cat)
                                    <li><a class="{{ $active }}" data-toggle="tab"
                                            href="#sports-cat-{{ $sport_cat->id }}">{{ $sport_cat->name }}</a></li>

                                    <?php $active = ''; ?>
                                @endforeach
                            </ul><!-- Tab List End -->

                            <!-- Tab List Start -->
                            <ul class="post-block-tab-list sports-post-tab-list nav d-sm-block d-md-none">
                                <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">تصنيفات</a>

                                    <!-- Dropdown -->
                                    <ul class="dropdown-menu">
                                        @foreach ($sport->children as $sport_cat)
                                            <li><a class="{{ $active }}" data-toggle="tab"
                                                    href="#sports-cat-{{ $sport_cat->id }}">{{ $sport_cat->name }}</a>
                                            </li>

                                            <?php $active = ''; ?>
                                        @endforeach
                                    </ul>

                                </li>
                            </ul><!-- Tab List End -->

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0">

                            <!-- Tab Content Start-->
                            <div class="tab-content">
                                <?php $sport_featured = \Botble\Blog\Models\Post::getPostsByCategory($sport->id, 3, 1); ?>
                                <!-- Tab Pane Start-->
                                <?php $show = 'show active'; ?>
                                @foreach ($sport->children as $sport_cat)
                                    @php
                                    $sport_posts_small = \Botble\Blog\Models\Post::getPostsByCategory($sport_cat->id, 3); @endphp

                                    <div class="tab-pane fade {{ $show }}"
                                        id="sports-cat-{{ $sport_cat->id }}">

                                        <div class="row">

                                            <!-- Overlay Post Wrapper Start -->
                                            <div class="col-lg-8 col-12">

                                                <div class="row">
                                                    @if (count($sport_featured) > 2)
                                                        <!-- Overlay Post Start -->
                                                        <div
                                                            class="post post-overlay post-large sports-post col-12 mb-20">
                                                            <div class="post-wrap">

                                                                <!-- Image -->
                                                                <div class="image"><img
                                                                        src="{{ RvMedia::getImageUrl($sport_featured[0]->image, $loop->first ? 'featured' : 'medium') }}"
                                                                        alt="post"></div>

                                                                <!-- Content -->
                                                                <div class="content">

                                                                    <!-- Title -->
                                                                    <h2 class="title"><a
                                                                            href="{{ $sport_featured[0]->url }}">{{ $sport_featured[0]->name }}</a>
                                                                    </h2>

                                                                    <!-- Meta -->
                                                                    <div class="meta fix">

                                                                        <span class="meta-item date"><i
                                                                                class="fa fa-clock-o"></i>{{ ArabicDate($sport_featured[0]->created_at) }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- Overlay Post End -->

                                                        <!-- Overlay Post Start -->
                                                        <div class="post post-overlay sports-post col-md-6 mb-20">
                                                            <div class="post-wrap">

                                                                <!-- Image -->
                                                                <div class="image"><img
                                                                        src="{{ RvMedia::getImageUrl($sport_featured[1]->image, $loop->first ? 'featured' : 'medium') }}"
                                                                        alt="post"></div>

                                                                <!-- Content -->
                                                                <div class="content">

                                                                    <!-- Title -->
                                                                    <h4 class="title"><a
                                                                            href="{{ $sport_featured[1]->url }}">{{ $sport_featured[1]->name }}</a>
                                                                    </h4>

                                                                    <!-- Meta -->
                                                                    <div class="meta fix">
                                                                        <span class="meta-item date"><i
                                                                                class="fa fa-clock-o"></i>{{ ArabicDate($sport_featured[1]->created_at) }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- Overlay Post End -->

                                                        <!-- Overlay Post Start -->
                                                        <div class="post post-overlay sports-post col-md-6 mb-20">
                                                            <div class="post-wrap">

                                                                <!-- Image -->
                                                                <div class="image"><img
                                                                        src="{{ RvMedia::getImageUrl($sport_featured[2]->image, $loop->first ? 'featured' : 'medium') }}"
                                                                        alt="post"></div>

                                                                <!-- Content -->
                                                                <div class="content">

                                                                    <!-- Title -->
                                                                    <h4 class="title"><a
                                                                            href="{{ $sport_featured[2]->url }}">{{ $sport_featured[2]->name }}</a>
                                                                    </h4>

                                                                    <!-- Meta -->
                                                                    <div class="meta fix">
                                                                        <span class="meta-item date"><i
                                                                                class="fa fa-clock-o"></i>{{ ArabicDate($sport_featured[2]->created_at) }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- Overlay Post End -->
                                                    @endif
                                                </div>

                                            </div><!-- Overlay Post Wrapper End -->

                                            @if (count($sport_posts_small) > 2)
                                                <!-- Post Wrapper Start -->
                                                <div class="col-lg-4 col-12">
                                                    <div class="row">

                                                        <div class="col-lg-12 col-md-6 col-12 mb-20">

                                                            <!-- Post Start -->
                                                            <div class="post sports-post">
                                                                <div class="post-wrap">

                                                                    <!-- Image -->
                                                                    <a class="image" style="flex: 0 0 124px;"
                                                                        href="{{ $sport_posts_small[2]->url }}"><img
                                                                            src="{{ RvMedia::getImageUrl($sport_posts_small[2]->image, $loop->first ? 'featured' : 'medium') }}"
                                                                            alt="post"></a>

                                                                    <!-- Content -->
                                                                    <div class="content">

                                                                        <!-- Title -->
                                                                        <h4 class="title"><a
                                                                                href="{{ $sport_posts_small[2]->url }}">{{ $sport_posts_small[2]->name }}</a>
                                                                        </h4>

                                                                        <!-- Meta -->
                                                                        <div class="meta fix">

                                                                            <span class="meta-item date"><i
                                                                                    class="fa fa-clock-o"></i>{{ ArabicDate($sport_featured[2]->created_at) }}</span>
                                                                        </div>

                                                                        <!-- Description s-->
                                                                        <p>{{ $sport_posts_small[2]->description }}</p>

                                                                    </div>
                                                                </div>
                                                            </div><!-- Post End -->

                                                        </div>

                                                        <div class="col-lg-12 col-md-6 col-12 mb-20">

                                                            <!-- Small Post Start -->
                                                            <div
                                                                class="post post-small post-list sports-post post-separator-border">
                                                                <div class="post-wrap">
                                                                    <!-- Image -->
                                                                    <a class="image" style="flex: 0 0 124px;"
                                                                        href="{{ $sport_posts_small[0]->url }}"><img
                                                                            style="flex: 0 0 124px;"
                                                                            src="{{ RvMedia::getImageUrl($sport_posts_small[0]->image, $loop->first ? 'featured' : 'medium') }}"
                                                                            alt="post"></a>

                                                                    <!-- Content -->
                                                                    <div class="content">

                                                                        <!-- Title -->
                                                                        <h5 class="title"><a
                                                                                href="{{ $sport_posts_small[0]->url }}">{{ $sport_posts_small[0]->name }}</a>
                                                                        </h5>

                                                                        <!-- Meta -->
                                                                        <div class="meta fix">
                                                                            <span class="meta-item date"><i
                                                                                    class="fa fa-clock-o"></i>{{ ArabicDate($sport_posts_small[0]->created_at) }}</span>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div><!-- Small Post End -->

                                                            <!-- Small Post Start -->
                                                            <div
                                                                class="post post-small post-list sports-post post-separator-border">
                                                                <div class="post-wrap">

                                                                    <!-- Image -->
                                                                    <a class="image" style="flex: 0 0 124px;"
                                                                        href="{{ $sport_posts_small[1]->url }}"><img
                                                                            src="{{ RvMedia::getImageUrl($sport_posts_small[1]->image, $loop->first ? 'featured' : 'medium') }}"
                                                                            alt="post"></a>

                                                                    <!-- Content -->
                                                                    <div class="content">

                                                                        <!-- Title -->
                                                                        <h5 class="title"><a
                                                                                href="{{ $sport_posts_small[1]->url }}">{{ $sport_posts_small[1]->name }}</a>
                                                                        </h5>

                                                                        <!-- Meta -->
                                                                        <div class="meta fix">
                                                                            <span class="meta-item date"><i
                                                                                    class="fa fa-clock-o"></i>{{ ArabicDate($sport_posts_small[1]->created_at) }}</span>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div><!-- Small Post End -->

                                                        </div>

                                                    </div>
                                                </div><!-- Post Wrapper End -->
                                            @endif
                                        </div>

                                    </div><!-- Tab Pane End-->
                                    <?php $show = ''; ?>
                                @endforeach


                            </div><!-- Tab Content End-->

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

            </div><!-- Sports Post Row End -->

            {{-- Tech --}}
            <div class="row vid">

                <div class="col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper dark black-dark">

                        <!-- Post Block Head Start -->
                        <div class="head sports-head">

                            <!-- Title -->
                            <h4 class="title">{{ __('تكنولوجيا') }}</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0">
                            <div class="row">

                                <?php $tech_posts = \Botble\Blog\Models\Post::getPostsByCategory(26, 1); ?>
                                @if ($tech_posts)
                                    @foreach ($tech_posts as $tech_post)
                                        <div class="post post-dark col-lg-6 col-12 mb-20">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <a class="image" href="{{ $tech_post->url }}"><img
                                                        src="{{ RvMedia::getImageUrl($tech_post->image, $loop->first ? 'featured' : 'medium') }}"
                                                        alt="post"></a>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title"><a
                                                            href="{{ $tech_post->url }}">{{ $tech_post->name }}</a>
                                                    </h4>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <span class="meta-item date"><i
                                                                class="fa fa-clock-o"></i>{{ ArabicDate($tech_post->created_at) }}</span>
                                                    </div>

                                                    <p>{{ $tech_post->description }}</p>

                                                    <a href="{{ $tech_post->url }}"
                                                        class="read-more btn">{{ __('continue reading') }}</a>

                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="col-lg-6 col-12 mb-20">
                                    <div class="row">
                                        @foreach (\Botble\Blog\Models\Post::getPostsByCategory(26, 4) as $tech_post_small)
                                            <div
                                                class="post post-small post-list post-dark post-separator-border col-lg-12 col-md-6 col-12">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="{{ $tech_post_small->url }}"><img
                                                            src="{{ RvMedia::getImageUrl($tech_post_small->image, $loop->first ? 'under_post' : 'medium') }}"
                                                            alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h4 class="title"><a
                                                                href="{{ $tech_post_small->url }}">{{ $tech_post_small->name }}</a>
                                                        </h4>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i
                                                                    class="fa fa-clock-o"></i>{{ ArabicDate($tech_post_small->created_at) }}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

            </div>
            {{-- Art --}}
            <div class="recent-section section bg-dark mb-50">
                <div class="container">

                    <!-- Feature Post Row Start -->
                    <div class="row">

                        <div class="col-12">

                            <!-- Post Block Wrapper Start -->
                            <div class="post-block-wrapper dark most-read">

                                <!-- Post Block Head Start -->
                                <div class="head life-style-head">

                                    <!-- Title -->
                                    <h4 class="title white">{{ __(' ثقافة و فن') }}</h4>

                                </div><!-- Post Block Head End -->

                                <!-- Post Block Body Start -->
                                <div class="body">

                                    <div
                                        class="three-column-post-carousel column-post-carousel post-block-carousel dark life-style-post-carousel row">
                                        <?php $art_posts = \Botble\Blog\Models\Post::getPostsByCategory(25, 6, 0); ?>
                                        @foreach ($art_posts as $popular_post)
                                            <!-- Post Start -->

                                            <div class="post post-dark life-style-post col">
                                                <div class="post-wrap">
                                                    <!-- Content -->
                                                    <div class="content"
                                                        style="padding: 10px; background-color: #1d70b8 !important;min-height: 80px;">

                                                        <!-- Title -->
                                                        <h5 class="title"><a
                                                                href="{{ $popular_post->url }}">{{ $popular_post->name }}</a>
                                                        </h5>
                                                    </div>
                                                    <!-- Image -->
                                                    <a class="image" href="{{ $popular_post->url }}">
                                                        <img src="{{ RvMedia::getImageUrl($popular_post->image, $loop->first ? 'featured' : 'medium') }}"
                                                            alt="post"></a>


                                                </div>
                                            </div><!-- Post End -->
                                        @endforeach
                                        <!-- Post Start -->


                                    </div>

                                </div><!-- Post Block Body End -->

                            </div><!-- Post Block Wrapper End -->

                        </div>

                    </div><!-- Feature Post Row End -->


        </div>
            </div><!-- Popular Section End -->

        </div>
    </div><!-- Post Section End -->


</div>
@push('scripts')
    <script>
        alert(45);
        $(document).ready(function() {
            alert(345);
        });
    </script>
@endpush
