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
    include( plugin_dir_path(__FILE__) . 'markup.php' );

}
add_shortcode('able_player', 'able_short');


// DETERMINE THE MEDIA TYPE BASED ON FILE EXTENSION
function media_type($src){

    preg_match("/^.*\.(webm|webmv|mp4|ogg|ogv|mp3|oga|wav)$/i", $src, $able_match);
    $able_src_mime = $able_match[1];

    $able_video_types = ["webm","webmv","mp4","ogg","ogv"];
    $able_audio_types = ["mp3","oga","wav"];

    if( in_array($able_src_mime, $able_video_types) ){ $able_type = "video"; }
    if( in_array($able_src_mime, $able_audio_types) ){ $able_type = "audio"; }

    echo $able_type . '/' . $able_src_mime;

}