(function ($) {
    "use strict";
    /*--
     Menu Sticky
     -----------------------------------*/
    var windows = $(window);

    $('.post-small-youtube').click(function () {
        var YID=$(this).attr('data-yid');
        $('#main-vid').attr('src','https://www.youtube.com/embed/'+YID)
        // alert(YID);
    });

    var sticky = $('.header-sticky');

    var tab_active = 0;
    setInterval(function () {
        $('#latest-news').removeClass('active');
        $('#latest-news').removeClass('show');
        $('#popular-news').removeClass('active');
        $('#popular-news').removeClass('show');
        $("#link-latest-news").removeClass('active');
        $("#link-popular-news").removeClass('active');
        if (tab_active == 0) {
            $('#latest-news').addClass('active');
            $('#latest-news').addClass('show');
            $("#link-latest-news").addClass('active');
            tab_active = 1;
        } else {
            $('#popular-news').addClass('active');
            $('#popular-news').addClass('show');
            $("#link-popular-news").addClass('active');
            tab_active = 0;
        }
        console.log('tab_active='.tab_active);
    }, 5000)

    $('#subscribe-form').submit(function (event) {


// Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        $.ajax({
            url: "contact/subscribe",
            type: "post",
            data: {email: $('#mce-email').val(), "_token": $('#csrf').val(),}
        }).done(function (response, textStatus, jqXHR) {

            $('#pop-up-text').text(response.message);
            $(".custom-model-main").addClass('model-open');


            // Log a message to the console
            console.log("Hooray, it worked!");
        }).fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });


    });
    $(".close-btn, .bg-overlay").click(function () {
        $(".custom-model-main").removeClass('model-open');
    });

    /*--
     Mobile Menu
     ------------------------*/
    $('.mobile-menu-wrap').meanmenu({
        meanScreenWidth: '767',
        meanMenuContainer: '.mobile-menu',
        meanMenuClose: '<span class="menu-close"></span>',
        meanMenuOpen: '<span class="menu-bar"></span>',
        meanRevealPosition: 'left',
        meanMenuCloseSize: '0',
    });

    /*--
     Header Search
     --------------------------------------------*/
    var searchToggle = $('.header-search-toggle');
    var searchForm = $('.header-search-form');

    searchForm.hide();
    /*-- Search Toggle --*/
    searchToggle.on('click', function () {
        if (searchToggle.hasClass('open')) {
            searchForm.animate({
                width: "toggle",
            });
            $(this).removeClass('open').find('i').removeClass('fa-close').addClass('fa-search');
        } else {
            searchForm.animate({
                width: "toggle",
            });
            $(this).addClass('open').find('i').removeClass('fa-search').addClass('fa-close');
        }
    });

    /*--
     Breaking News Ticker
     --------------------------------------------*/
    $('.breaking-news-ticker').newsTicker({
        row_height: 40,
        max_rows: 1,
        speed: 900,
        duration: 5000,
        prevButton: $('.news-ticker-prev'),
        nextButton: $('.news-ticker-next'),
    });

    /*--
     Main Slick Slider
     -----------------------------------*/

    /*-- Post Carousel --*/
    $('.post-carousel-1').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,

        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 350,
                settings: {
                    arrows: false,
                }
            }
        ]
    });
    // $('.post-carousel-1').slick('slickGoTo', 1);

    /*-- Popular Post Slider --*/
    $('.popular-post-slider').slick({
        arrows: true,
        // autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    $('.popular-post-slider').on('afterChange', function (event, currentSlide) {
        //   $('.post-carousel-1').slick('slickGoTo', nextSlide);
        //console.log('afterChange');
        //console.log(currentSlide);
        //  console.log('nextSlide='+nextSlide);
    });

// On before slide change
    $('.popular-post-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {

        // console.log(currentSlide.currentDirection);
        console.log('currentSlide=' + currentSlide);
        console.log('nextSlide=' + nextSlide);
        if (currentSlide <= nextSlide) {
            $('.post-carousel-1').slick('slickGoTo', nextSlide);

        } else {
            $('.post-carousel-1').slick('slickGoTo', nextSlide);

        }


    });
    $(".slid-nav").click(function () {
        var index = $(this).data('num');
        $('.post-carousel-1').slick('slickGoTo', index);
    });
    var s_height = $('.hero-section .main-slider ').innerHeight();

    // $('.f-sidebar .sidebar-block-wrapper').css('min-height',s_height);


    /*-- Five Row Post Carousel --*/
    $('.five-row-post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        rows: 5,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    rows: 4,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*-- Four Row Post Carousel --*/
    $('.four-row-post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        rows: 4,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    });

    /*-- Three Row Post Carousel --*/
    $('.three-row-post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        rows: 3,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    });

    /*-- Two Row Post Carousel --*/
    $('.two-row-post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        rows: 2,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    });

    /*-- Sidebar Post Carousel --*/
    $('.sidebar-post-carousel').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    });

    /*-- Video Post Slider --*/
    $('.video-post-slider').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 3,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    });

    /*-- Four Column Post Carousel --*/
    $('.four-column-post-carousel').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*-- Three Column Post Carousel --*/
    $('.three-column-post-carousel').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 3,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*-- Two Column Post Carousel --*/
    $('.two-column-post-carousel').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 2,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*-- Full Width Instagram Carousel --*/
    $('.fullwidth-instagram-carousel').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 5,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $(document).ready(function () {
        $("#loader-container").css('display', 'none');
    })
    /*--
     Custom Scroll
     -----------------------------------*/
    $(".customScroll").niceScroll();

    /*--
     Scroll Up
     -----------------------------------*/
    $.scrollUp({
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade',
        scrollText: '<i class="fa fa-angle-up"></i>',
    });

    /*--
     Magnific Video Popup
     --------------------------------*/
    var imagePopup = $('.image-popup');
    imagePopup.magnificPopup({
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        gallery: {
            enabled: true,
        },
    });
    var videoPopup = $('.video-popup');
    videoPopup.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        zoom: {
            enabled: true,
        }
    });


})(jQuery);	