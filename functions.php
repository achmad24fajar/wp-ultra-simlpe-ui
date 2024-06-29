<?php

function ultra_simple_files()
{
    wp_enqueue_script('ultra-simple-script', get_theme_file_uri('/script/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts-inria', '//fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');
    wp_enqueue_style('custom-google-fonts-kanit', '//fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    wp_enqueue_style('ultra-simple-style', get_theme_file_uri('/css/styles.css'));
}
add_action('wp_enqueue_scripts', 'ultra_simple_files');

function custom_wpp_update_postview($postId)
{
    $accuracy = 50;

    if (function_exists('wpp_get_views') && (mt_rand(0, 100) < $accuracy)) {
        update_post_meta($postId, 'views_total', wpp_get_views($postId, 'all', false));
    }
}
add_action('wpp_post_update_views', 'custom_wpp_update_postview');
