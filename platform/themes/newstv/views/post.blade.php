<!-- Main Wrapper -->

<div id="main-wrapper" dir="rtl">

    <!-- Blog Section Start -->
    <div class="blog-section section">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row">

                <div class="col-lg-8 col-12 mb-50">

                    <!-- Single Blog Start -->
                    <div class="single-blog mb-50">
                        <div class="blog-wrap">

                            <!-- Image -->

                            @if($post->youtube_url)
                                <div class="o-video">
                                    <iframe id="main-vid"
                                            src="https://www.youtube.com/embed/{{ GetYoutubeID($post->youtube_url) }}"
                                            allowfullscreen></iframe>
                                </div>

                            @else
                                <div class="image"><img
                                            src="{{ RvMedia::getImageUrl($post->image, 'full', false, RvMedia::getDefaultImage()) }}"
                                            alt="post"></div>
                                @endif
                                        <!-- Title -->
                                <h3 style="color:{{$post->title_color}}!important;" class="title">{{ $post->name }}</h3>

                                <!-- Meta -->
                                <div class="meta fix">
                                    @if (!$post->categories->isEmpty())
                                        <a href="{{ $post->categories->first()->url }}"
                                           class="meta-item category fashion">{{ $post->categories->first()->name }}</a>
                                    @endif
                                    {{--<a href="#" class="meta-item author"><img src="img/post/post-author-1.jpg" alt="post author">{{ $post->author->getFullName() }}</a>--}}
                                    <span class="meta-item date"><i
                                                class="fa fa-clock-o"></i>{{ ArabicDate( $post->created_at) }}</span>
                                </div>

                                <!-- Content -->
                                <div class="content">
                                    {!! clean($post->content, 'youtube') !!}
                                </div>

                                <div class="tags-social float-left">

                                    @if (!$post->tags->isEmpty())
                                        <div class="tags float-left">
                                            <i class="fa fa-tags"></i>
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="blog-social float-right">
                                        <a target="_blank"
                                           href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                                           class="facebook"><i class="fa fa-facebook"></i></a>
                                        <a target="_blank" href="https://twitter.com/home?status={{url()->current()}}"
                                           class="twitter"><i class="fa fa-twitter"></i></a>
                                        <a target="_blank" href="https://t.me/share/url?url={{url()->current()}}"
                                           class="telegram"><i class="fa fa-telegram"></i></a>
                                        <a target="_blank" href=" https://wa.me/?text={{ url()->current() }}"
                                           data-action="share/whatsapp/share" class="whatsapp"><i
                                                    class="fa fa-whatsapp"></i></a>
                                    </div>

                                </div>

                        </div>
                    </div><!-- Single Blog End -->

                    <div class="row">
                        @foreach (get_related_posts($post->id, 2) as $relatedItem)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="post__relate-group @if ($loop->last) post__relate-group--right @endif">
                                    <h4 class="relate__title <?php if (!$loop->first) echo 'left';?>">@if ($loop->first) {{ __('Previous Post') }} @else {{ __('Next Post') }} @endif</h4>
                                    <article class="post post--related">
                                        <div class="post__thumbnail">
                                            <a href="{{ $relatedItem->url }}" class="post__overlay">
                                                <img style="max-width: 100%;"
                                                     src="{{ RvMedia::getImageUrl($relatedItem->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                     alt="{{ $relatedItem->name }}">
                                            </a>
                                        </div>
                                        <h4 class="post__header"><a href="{{ $relatedItem->url }}"
                                                                    class="title"> {{ $relatedItem->name }}</a></h4>
                                    </article>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes')
                            <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head">

                            <!-- Title -->
                            <h4 class="title">{{ __('Leave a Comment') }}</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body">
                            <div class="post-comment-form">
                                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
                            </div>
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->
                    @endif


                            <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper mb-50">

                        <!-- Post Block Head Start -->
                        <div class="head">

                            <!-- Title -->
                            <h4 class="title">{{ __('You might also like!') }}</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body">

                            <div class="two-column-post-carousel column-post-carousel post-block-carousel row">

                                @foreach (get_recent_posts(4) as $post)
                                    <div class="col-md-6 col-12">

                                        <!-- Overlay Post Start -->
                                        <div class="post post-overlay hero-post">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <div class="image"><img
                                                            src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                            alt="post"></div>

                                                <!-- Category -->
                                                <a href="{{ $post->url }}"
                                                   class="category gadgets">{{ $post->category }}</a>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title"><a href="{{ $post->url }}">{{ $post->name }}</a>
                                                    </h4>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <span class="meta-item date"><i
                                                                    class="fa fa-clock-o"></i>{{ $post->created_at }}</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div><!-- Overlay Post End -->

                                    </div>
                                @endforeach


                            </div>
                            [auto-reload-posts][/auto-reload-posts]
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4 col-12 mb-50">
                    <div class="row">

                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            <!-- Post Block Wrapper Start -->
                            <div class="post-block-wrapper">

                                <!-- Post Block Head Start -->
                                <div class="head featured-head">

                                    <!-- Title -->
                                    <h4 class="title">{{__("Recent Posts")}}</h4>

                                </div><!-- Post Block Head End -->

                                <!-- Post Block Body Start -->
                                <div class="body">

                                    <!-- Sidebar Post Slider Start -->
                                    <div class="sidebar-post-carousel post-block-carousel gadgets-post-carousel">

                                        @foreach(get_recent_posts(4) as $post)
                                                <!-- Post Start -->
                                        <div class="post gadgets-post">
                                            <div class="post-wrap">
                                                <!-- Image -->
                                                <a class="image" href="{{ $post->url }}"><img
                                                            src="{{ RvMedia::getImageUrl($post->image, 'medium') }}"
                                                            alt="post"></a>
                                                <!-- Content -->
                                                <div class="content">
                                                    <!-- Title -->
                                                    <h4 class="title"><a href="{{ $post->url }}">{{ $post->name }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div><!-- Post End -->
                                        @endforeach


                                    </div><!-- Sidebar Post Slider End -->

                                </div><!-- Post Block Body End -->

                            </div><!-- Post Block Wrapper End -->
                        </div>
                        @if(theme_option('twitter_feeds'))
                                <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            <div class="col-sm-12 hidden-xs">
                                <a class="twitter-timeline" data-height="600"
                                   href="https://twitter.com/jusoorstudies?ref_src=twsrc%5Etfw">
                                    آخر التغريدات
                                </a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                        @endif
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            <!-- Post Block Wrapper Start -->
                            <div class="post-block-wrapper">

                                <!-- Post Block Head Start -->
                                <div class="head featured-head">

                                    <!-- Title -->
                                    <h4 class="title">{{__("Popular News")}}</h4>

                                </div><!-- Post Block Head End -->

                                <!-- Post Block Body Start -->
                                <div class="body">

                                    <!-- Sidebar Post Slider Start -->
                                    <div class="sidebar-post-carousel post-block-carousel gadgets-post-carousel">

                                        <?php
                                        $popular = Botble\Blog\Models\Post::getPopularPosts(4);
                                        ?>
                                        @foreach($popular as $post)
                                                <!-- Post Start -->
                                        <div class="post gadgets-post">
                                            <div class="post-wrap">
                                                <!-- Image -->
                                                <a class="image" href="{{ $post->url }}"><img
                                                            src="{{ RvMedia::getImageUrl($post->image, 'medium') }}"
                                                            alt="post"></a>
                                                <!-- Content -->
                                                <div class="content">
                                                    <!-- Title -->
                                                    <h4 class="title"><a href="{{ $post->url }}">{{ $post->name }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div><!-- Post End -->
                                        @endforeach


                                    </div><!-- Sidebar Post Slider End -->

                                </div><!-- Post Block Body End -->

                            </div><!-- Post Block Wrapper End -->
                        </div>

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            {!! do_shortcode('[subscribe-form][/subscribe-form]') !!}

                            <div class="sidebar-subscribe" style="display: none;">
                                <h4>{{__("Subscribe To")}} <br>{{__("To Get Latest")}}
                                    <span>{{__("Updates")}}</span> {{__("News")}}</h4>
                                <!-- Newsletter Form -->
                                <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                      method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                      class="subscribe-form validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <label for="mce-EMAIL" class="d-none">Subscribe to our mailing list</label>
                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL"
                                               placeholder="{{__('Your email address')}}" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                                    type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                                                    tabindex="-1" value=""></div>
                                        <button type="submit" name="subscribe" id="mc-embedded-subscribe"
                                                class="button">{{__('Submit')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!-- Sidebar End -->

            </div><!-- Feature Post Row End -->

        </div>
    </div><!-- Blog Section End -->
</div>