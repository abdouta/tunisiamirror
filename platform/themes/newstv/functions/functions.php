<?php

register_page_template([
    'no-sidebar' => __('No Sidebar'),
]);

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('This is footer sidebar section'),
]);


function ArabicDate($your_date) {

    $months = array("Jan" => "جانفي", "Feb" => "فيفري", "Mar" => "مارس", "Apr" => "أفريل", "May" => "ماي", "Jun" => "جوان", "Jul" => "جويلية",
        "Aug" => "أوت", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D', strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    $current_date = $ar_day.' '.date('d', strtotime($your_date)).'  '.$ar_month.'  '.date('Y', strtotime($your_date));

    return $current_date;
}

add_shortcode('google-map', 'Google map', 'Custom map', function ($shortCode) {
    return Theme::partial('short-codes.google-map', ['address' => $shortCode->content]);
});

add_shortcode('youtube-video', 'Youtube video', 'Add youtube video', function ($shortCode) {
    return Theme::partial('short-codes.video', ['url' => $shortCode->content]);
});

add_shortcode('featured-posts', 'Featured posts', 'Featured posts', function () {
    return Theme::partial('short-codes.featured-posts');
});

add_shortcode('category-posts', 'Category posts', 'Category posts', function () {
    return Theme::partial('short-codes.category-posts');
});

add_shortcode('all-galleries', 'All Galleries', 'All Galleries', function () {
    return Theme::partial('short-codes.all-galleries');
});
register_sidebar([
    'id'          => 'sidebar_currencies',
    'name'        => __('Currencies'),
    'description' => __('This the description for widget area'),
]);
add_shortcode('subscribe-form', 'Subscribe Form', 'Subscribe Form', function () {
   // return Theme::partial('short-codes.featured-posts');
    return Theme::partial('short-codes.subscribe-form');
});

shortcode()->setAdminConfig('google-map', Theme::partial('short-codes.google-map-admin-config'));
shortcode()->setAdminConfig('youtube-video', Theme::partial('short-codes.youtube-admin-config'));
function make_slug($string, $separator = '-')
{
    $string = trim($string);
    $string = mb_strtolower($string, 'UTF-8');

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and Persian characters as well
    $string = preg_replace("/[^a-z0-9_\s\-ءابپتثجحخدذرزسشصضطظعغفقكلمنوهی]/u", '', $string);

    // Remove multiple dashes or whitespaces or underscores
    $string = preg_replace("/[\s\-_]+/", ' ', $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}
function GetYoutubeID($url){
parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    if(isset($my_array_of_vars['v']))
return $my_array_of_vars['v'];
}
theme_option()
    ->setArgs(['debug' => config('app.debug')])
    ->setSection([ // Set section with no field
        'title' => __('Banners'),
        'desc' => __('General settings'),
        'id' => 'opt-banners',
        'subsection' => true,
        'icon' => 'fa fa-home',
    ])

    ->setField([
    'id' => 'twitter_feeds',
        'section_id' => 'opt-text-subsection-general',
    'type' => 'onOff',
    'label' => __('Enable Twitter Feeds'),
    'attributes' => [
        'name' => 'twitter_feeds',
        'value' => 1,
        'data' => [
            0 => 0,
            1 => 1,
        ],
        'options' => [],// Optional
    ],

])
    ->setField([
        'id'         => 'phone',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Phone'),
        'attributes' => [
            'name'    => 'phone',
            'value'   => __(''),
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change Phone'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __(' Phone on footer of site'),
    ])
    ->setField([
        'id'         => 'email',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Email'),
        'attributes' => [
            'name'    => 'email',
            'value'   => __(''),
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change Email'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __(' Address on footer of site'),
    ])
    ->setField([
        'id'         => 'address',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Address'),
        'attributes' => [
            'name'    => 'address',
            'value'   => __(''),
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change Address'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __(' Address on footer of site'),
    ])
    ->setField([
        'id'         => 'who_we_are',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Who We Are'),
        'attributes' => [
            'name'    => 'who_we_are',
            'value'   => __(''),
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change Who We Are'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __(' Who We Are on footer of site'),
    ])
    ->setField([
        'id'         => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Copyright'),
        'attributes' => [
            'name'    => 'copyright',
            'value'   => __('© 2020 Botble Technologies. All right reserved.'),
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __('Copyright on footer of site'),
    ])
    ->setField([
        'id'         => 'primary_font',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'googleFonts',
        'label'      => __('Primary font'),
        'attributes' => [
            'name'  => 'primary_font',
            'value' => 'Roboto Slab',
        ],
    ])
    ->setField([
        'id'         => 'primary_color',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'customColor',
        'label'      => __('Primary color'),
        'attributes' => [
            'name'  => 'primary_color',
            'value' => '#d8403f',
        ],
    ])
    ->setField([
        'id'         => 'top-banner',
        'section_id' => 'opt-banners',
        'type'       => 'mediaImage',
        'label'      => __('Top banner'),
        'attributes' => [
            'name'       => 'top_banner',
            'value'      => '',
            'attributes' => [
                'allow_thumb' => false,
            ],
        ],
    ])
    ->setSection([
        'title'      => __('Social'),
        'desc'       => __('Social links'),
        'id'         => 'opt-text-subsection-social',
        'subsection' => true,
        'icon'       => 'fa fa-share-alt',
    ])
    ->setField([
        'id'         => 'facebook',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Facebook',
        'attributes' => [
            'name'    => 'facebook',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://facebook.com/@username',
            ],
        ],
    ])
    ->setField([
        'id'         => 'twitter',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Twitter',
        'attributes' => [
            'name'    => 'twitter',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://twitter.com/@username',
            ],
        ],
    ])
    ->setField([
        'id'         => 'youtube',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Youtube',
        'attributes' => [
            'name'    => 'youtube',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://youtube.com/@channel-url',
            ],
        ],
    ])
    ->setField([
        'id'         => 'instagram',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Instagram',
        'attributes' => [
            'name'    => 'instagram',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://instagram.com/@page',
            ],
        ],
    ])
    ->setField([
        'id'         => 'facebook_chat_enabled',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'select',
        'label'      => __('Enable Facebook chat?'),
        'attributes' => [
            'name'    => 'facebook_chat_enabled',
            'list'    => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
            'value'   => 'yes',
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'facebook_page_id',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Facebook page ID'),
        'attributes' => [
            'name'    => 'facebook_page_id',
            'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'facebook_comment_enabled_in_post',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'select',
        'label'      => __('Enable Facebook comment in post detail page?'),
        'attributes' => [
            'name'    => 'facebook_comment_enabled_in_post',
            'list'    => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
            'value'   => 'yes',
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])->setField([
        'id' => 'header-banner-ads',
        'section_id' => 'opt-banners',
        'type' => 'mediaImage',
        'label' => __('header Banner'),
        'attributes' => [
            'name' => 'banner-ads-1',
            'value' => null,
        ],
    ])->setField([
        'id' => 'side-banner-ads',
        'section_id' => 'opt-banners',
        'type' => 'mediaImage',
        'label' => __('Side Banner'),
        'attributes' => [
            'name' => 'banner-ads-2',
            'value' => null,
        ],
    ])->setField([
        'id' => 'body-banner-ads',
        'section_id' => 'opt-banners',
        'type' => 'mediaImage',
        'label' => __('Body Banner'),
        'attributes' => [
            'name' => 'banner-ads-3',
            'value' => null,
        ],
    ])

;

add_action('init', function () {
    config(['filesystems.disks.public.root' => public_path('storage')]);
}, 124);

RvMedia::addSize('featured', 560, 380)->addSize('medium', 540, 360);
RvMedia::addSize('thumbnail', 80, 80)->addSize('thumbnail', 80, 80);
RvMedia::addSize('under_post', 270, 200)->addSize('under_post', 270, 200);
RvMedia::addSize('doctor', 400, 400)->addSize('doctor', 400, 400);