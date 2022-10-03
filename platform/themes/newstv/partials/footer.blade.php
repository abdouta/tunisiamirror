<footer class="footer" id="footer">

    <!-- Footer Top Section Start -->
    <div class="footer-top-section section bg-dark">
        <div class="container-fluid">
            <div class="row">

                <!-- Footer Widget Start -->
                <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                    <!-- Title -->
                    <h4 class="widget-title">{{__('Who We Are')}}</h4>

                    <div class="content fix">

                        <p>{{ theme_option('who_we_are') }}</p>

                        <!-- Footer Contact -->
                        <ol class="footer-contact">
                            <li><i class="fa fa-home"></i>{{ theme_option('address') }}</li>
                            <li><i class="fa fa-envelope-open"></i>{{ theme_option('email') }}</li>
                            <li><i class="fa fa-headphones"></i>{{ theme_option('phone') }}</li>
                        </ol>

                        <!-- Footer Social -->
                        <div class="footer-social">
                            <a href="{{ theme_option('facebook') }}" title="Facebook" class="hi-icon fa fa-facebook"></a>
                            <a href="{{ theme_option('twitter') }}" title="Twitter" class="hi-icon fa fa-twitter"></a>
                            <a target="_blank" href="{{ theme_option('instagram') }}" title="Twitter" class="hi-icon fa fa-instagram"></a>
                            <a href="{{ theme_option('youtube') }}" title="Youtube" class="hi-icon fa fa-youtube-play"></a>
                        </div>

                    </div>

                </div><!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">
                    <?php $populars = Botble\Blog\Models\Post::getPopularPosts(3); ?>
                    <!-- Title -->
                    <h4 class="widget-title">{{__("Popular News")}}</h4>

                    @foreach($populars as $popular_post)

                    <div class="footer-widget-post">
                        <!-- Post Start -->
                        <div class="post-wrap">
                            <div class="post-wrap">

                                <!-- Image -->
                                <a class="image" href="{{ $popular_post->url }}"><img src="{{ RvMedia::getImageUrl($popular_post->image, $loop->first ? 'under_post' : 'medium') }}" alt="post"></a>

                                <!-- Content -->
                                <div class="content fix">

                                    <h5 class="title"><a href="{{ $popular_post->url }}">{{$popular_post->name}}</a></h5>

                                    <!-- Description -->



                                </div>

                            </div>
                        </div><!-- Post Start -->
                    </div>
                    @endforeach




                </div><!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">
                    <?php $featured = get_featured_posts(3); ?>
                    <!-- Title -->
                    <h4 class="widget-title">{{__("Top News")}}</h4>

                    @foreach($featured as $featured_post)

                    <div class="footer-widget-post">
                        <!-- Post Start -->
                        <div class="post-wrap">
                            <div class="post-wrap">

                                <!-- Image -->
                                <a class="image" href="{{ $featured_post->url }}"><img src="{{ RvMedia::getImageUrl($featured_post->image, $loop->first ? 'under_post' : 'medium') }}" alt="post"></a>

                                <!-- Content -->
                                <div class="content fix">

                                    <h5 class="title"><a href="{{ $featured_post->url }}">{{$featured_post->name}}</a></h5>

                                    <!-- Description -->



                                </div>

                            </div>
                        </div><!-- Post Start -->
                    </div>
                    @endforeach




                </div><!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                    <h4 class="widget-title">{{ __("Cat")}}</h4>

                    {!!
                        Menu::renderMenuLocation('footer-menu', [ //
                            'options' => [],
                            'theme'   => true,
                        ])
                    !!}

                </div><!-- Footer Widget End -->
                
            </div>
            <div class="row copy-right">
                <div class="container">
                    <p>{!! clean(theme_option('copyright')) !!}</p>
                </div>
            </div>
        </div>
    </div><!-- Footer Top Section End -->






</footer>

</div>

{{--{!! Theme::footer() !!}--}}

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <!-- jQuery JS -->

<script src="/themes/newstv/pad/js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="/themes/newstv/pad/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="/themes/newstv/pad/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="/themes/newstv/pad/js/plugins.js"></script>
<!-- rypp JS -->
<script src="/themes/newstv/pad/js/owl.carousel.js"></script>
<script src="/themes/newstv/pad/js/rypp.js"></script>
<script src="/themes/newstv/pad/js/ytp-playlist.js"></script>
<!-- Ajax Mail JS -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="/themes/newstv/pad/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="/themes/newstv/pad/js/main.js?v=<?=rand(1,99999)?>"></script>
<![endif]-->

    @if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' || (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id')))
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml            : true,
                    version          : 'v7.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        @if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
            <div class="fb-customerchat"
                 attribution="install_email"
                 page_id="{{ theme_option('facebook_page_id') }}">
            </div>
        @endif
    @endif
</body>
</html>