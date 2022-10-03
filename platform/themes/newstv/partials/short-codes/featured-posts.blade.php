@if (is_plugin_active('blog'))
<?php
$araa = Botble\Blog\Models\Post::getPostsByCategory(62, 5);
$mlfat = Botble\Blog\Models\Post::getPostsByCategory(63, 5);
$featured = \Botble\Blog\Models\Post::getSlider(7);

?>
<div class="hero-section section mt-30 mb-30">
    <div class="">
        <div class="row">
            <div class="col">
                <div class="row row-1">

                    @if (count($featured) >= 7)
                        <div class="main-slider order-lg-2 col-lg-9 col-12">

                            <!-- Hero Post Slider Start -->
                            <div id="" class=" post-carousel-1">
                                @foreach ($featured as $feature_item)
                                <!-- Overlay Post Start -->
                                <div class="item post post-large post-overlay hero-post">
                                    <div class="post-wrap">
                                        <div class="image-box">
                                            <div class="image"><a href="{{ $feature_item->url }}"><img src="{{ RvMedia::getImageUrl($feature_item->image, $loop->first ? 'featured' : 'medium') }}" alt="post"></a></div>
                                        </div>
                                        <div class="content-box">
                                            <!-- Category -->

                                            <!-- Content -->
                                            <div class="">

                                                <!-- Title -->
                                                <h2 class="title"><a href="{{ $feature_item->url }}">{{  Str::limit($feature_item->name,70) }}</a>
                                                </h2>

                                                <!-- Meta -->

                                                <p>{{ $feature_item->description }}</p>
                                                <a class="btn" href="{{ $feature_item->url }}">{{__('read more')}}</a>
                                                <div class="meta fix">
                                                    <span class="meta-item date"><i class="ico-time"></i>{{ ArabicDate($feature_item->created_at) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Image -->




                                    </div>
                                </div><!-- Overlay Post End -->
                                @endforeach

                            </div><!-- Hero Post Slider End -->

                            <!-- Popular Post Slider Start -->
                            <div class="popular-post-slider">
                                <?php
                                $ingex = 0;
                                ?>
                                @foreach ($featured as $feature_item)
                                <!-- Post Start -->
                                <div class="post post-small post-list post-dark popular-post">
                                    <div class="post-wrap">

                                        <!-- Content -->
                                        <div class="content fix">

                                            <!-- Title -->
                                            <h5 class="title"><a class="active-red" href="{{$feature_item->url}}"><span class="slid-nav" data-num="{{$ingex}}">{{ $feature_item->name }}</span></a>
                                            </h5>

                                        </div>

                                    </div>
                                </div><!-- Post Start -->
                                <?php
                                $ingex++;
                                ?>
                                @endforeach


                            </div><!-- Popular Post Slider End -->

                        </div>
                    @endif

                    <div class="order-lg-1 col-lg-3 col-12">
                        <div class="row row-1">
                            <!-- Single Sidebar -->
                            <div class="single-sidebar hero-tabs f-sidebar">

                                <!-- Sidebar Block Wrapper -->
                                <div class="sidebar-block-wrapper">

                                    <!-- Sidebar Block Head Start -->
                                    <div class="head education-head">

                                        <!-- Tab List -->
                                        <div class="sidebar-tab-list education-sidebar-tab-list nav">
                                            <a id="link-latest-news" class="active" data-toggle="tab" href="#latest-news">آراء</a>
                                            <a  id="link-popular-news" data-toggle="tab" href="#popular-news">ملفات</a>
                                        </div>

                                    </div><!-- Sidebar Block Head End -->

                                    <!-- Sidebar Block Body Start -->
                                    <div class="body">

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="latest-news">

                                                <!-- Small Post Start -->
                                                <div class="post post-small post-list education-post post-separator-border">
                                                    @foreach ($araa as $feature_item)
                                                    <div class="post-wrap">

                                                        <!-- Image -->
                                                        <a class="image" href="{{ $feature_item->url }}"><img style="border-radius: 50%;width: 60px;height: 60px;" src="{{ RvMedia::getImageUrl($feature_item->image,  'thumb' ) }}" alt="post"></a>

                                                        <!-- Content -->
                                                        <div class="content">

                                                            <!-- Title -->
                                                            <h5 class="title"><a href="{{ $feature_item->url }}">{{  Str::limit($feature_item->name,70) }}</a>
                                                            </h5>

                                                        </div>

                                                    </div>
                                                    @endforeach
                                                </div><!-- Small Post End -->

                                            </div>
                                            <div class="tab-pane fade" id="popular-news">

                                                <!-- Small Post Start -->
                                                <div class="post post-small post-list education-post post-separator-border">
                                                    @foreach ($mlfat as $feature_item)
                                                    <div class="post-wrap">

                                                        <!-- Image -->
                                                        <a class="image" href=""><img style="border-radius: 50%;width: 60px;height: 60px;" src="{{ RvMedia::getImageUrl($feature_item->image,  'thumb' ) }}" alt="post"></a>

                                                        <!-- Content -->
                                                        <div class="content">

                                                            <!-- Title -->
                                                            <h5 class="title"><a href="{{ $feature_item->url }}">{{  Str::limit($feature_item->name,70) }}</a>
                                                            </h5>

                                                        </div>

                                                    </div>
                                                    @endforeach
                                                </div><!-- Small Post End -->

                                            </div>
                                        </div>

                                    </div><!-- Sidebar Block Body End -->

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div><!-- Hero Section End -->
<!-- Popular Section Start -->


@endif
