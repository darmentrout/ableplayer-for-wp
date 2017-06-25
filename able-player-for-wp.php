<?php
/**
* Plugin Name: Able Player for WP
* Description: An implementation of Able Player for WordPress
* Version: 1.0
* Author: Damion Armentrout
* License: GPLv2 or later
*/


// ALLOWS WP TO HANDLE VTT FILES IN MEDIA LIBRARY
function able_mime_types($mime_types){
    $mime_types['vtt'] = 'text/vtt';
    return $mime_types;
}
add_filter('mime_types', 'able_mime_types', 1, 1);


// COMMENTS
function able_short($atts){

    wp_enqueue_style( 'css-c', plugin_dir_url(__FILE__) . 'ableplayer/build/ableplayer.min.css', false );

    wp_enqueue_script( 'js-b', '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', false );
    wp_enqueue_script( 'js-a', plugin_dir_url(__FILE__) . 'ableplayer/thirdparty/modernizr.custom.js', false );
    wp_enqueue_script( 'js-c', plugin_dir_url(__FILE__) . 'ableplayer/thirdparty/js.cookie.js', false );
    wp_enqueue_script( 'js-d', plugin_dir_url(__FILE__) . 'ableplayer/build/ableplayer.js', false );

    ob_start();   
        $able_src = $atts['src'];
        wp_head();
        wp_footer();
        require_once( plugin_dir_path(__FILE__) . 'markup.php' );
    return ob_get_clean();
}
add_shortcode('able_video', 'able_short');