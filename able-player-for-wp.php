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


// SET UP THE SHORTCODE THAT GENERATES THE VIDEO ELEMENTS
function able_short($atts){

    wp_enqueue_style( 'css-c', plugin_dir_url(__FILE__) . 'ableplayer/build/ableplayer.min.css', false );

    wp_enqueue_script( 'js-b', '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', false );
    wp_enqueue_script( 'js-a', plugin_dir_url(__FILE__) . 'ableplayer/thirdparty/modernizr.custom.js', false );
    wp_enqueue_script( 'js-c', plugin_dir_url(__FILE__) . 'ableplayer/thirdparty/js.cookie.js', false );
    wp_enqueue_script( 'js-d', plugin_dir_url(__FILE__) . 'ableplayer/build/ableplayer.js', false );

    $able_src = $atts['src'];
    $ogg_type = $atts['ogg_type'];
    include( plugin_dir_path(__FILE__) . 'markup.php' );

}
add_shortcode('able_player', 'able_short');


// DETERMINE THE MEDIA TYPE BASED ON FILE EXTENSION
function media_type($src, $elem = false, $ogg = false){

    preg_match("/^.*\.(webm|webmv|mp4|ogv|ogg|mp3|oga|wav)$/i", $src, $able_match);
    $able_src_mime = $able_match[1];

    switch( $able_src_mime ){
        case "webm":
        case "webmv":
        case "mp4":
        case "ogv":
            $able_type = "video";
            break;
        case "mp3":
        case "oga":
        case "wav":
            $able_type = "audio";
            break;
        case "ogg":
            $able_type = $ogg;
            break;
    }


    if( $elem == false ){
        echo $able_type . '/' . $able_src_mime;
    }
    if( $elem == true){
        echo $able_type;
    }

}
