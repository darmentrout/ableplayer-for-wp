<?php
/**
* Plugin Name: Able Player for WordPress
* Description: An implementation of Able Player for WordPress
* Version: 1.0
* Author: Damion Armentrout
* License: GPLv2 or later
* Plugin URI: https://github.com/darmentrout/ableplayer-for-wp
*/


// ALLOWS WP TO HANDLE VTT FILES IN MEDIA LIBRARY
// (FOR IF A USER UPLOADS SUCH A FILE TO THEIR WP SITE)
function able_mime_types($mime_types){
    $mime_types['vtt'] = 'text/vtt';
    return $mime_types;
}
add_filter('mime_types', 'able_mime_types', 1, 1);


// DETERMINE THE MEDIA TYPE BASED ON FILE EXTENSION
function able_media_type($src, $elem = false, $ogg = false){

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
        default:
            $able_type = "video";
    }


    if( $elem == false ){
        echo $able_type . '/' . $able_src_mime;
    }
    if( $elem == true){
        echo $able_type;
    }

}


// SET UP THE SHORTCODE THAT GENERATES THE VIDEO ELEMENTS
function able_short($atts){

    // ENQUEUE THE SCRIPTS THAT ABLE PLAYER NEEDS
    wp_enqueue_style( 'css-c', plugin_dir_url(__FILE__) . 'ableplayer/build/ableplayer.min.css', false );
    wp_enqueue_script( 'js-a', plugin_dir_url(__FILE__) . 'ableplayer/thirdparty/modernizr.custom.js', false );
    wp_enqueue_script( 'js-c', plugin_dir_url(__FILE__) . 'ableplayer/thirdparty/js.cookie.js', false );
    wp_enqueue_script( 'js-d', plugin_dir_url(__FILE__) . 'ableplayer/build/ableplayer.js', false );

    // GET THE URL/PATH OF THE MEDIA FILE FROM THE SHORTCODE
    $able_src = $atts['src'];

    // GET THE CAPTION/SUBTITLE FILE
    if( isset($atts['captions']) && !empty($atts['captions']) ){
        $able_cap = $atts['captions'];
    }

    // GET THE CHAPTERS FILE
    if( isset($atts['chapters']) && !empty($atts['chapters']) ){
        $able_ch = $atts['chapters'];
    }

    // OGG IS A CONTAINER FORMAT AND CAN BE EITHER VIDEO OR AUDIO
    // FIND OUT IF OGG TYPE IS SPECIFIED, ELSE DEFAULT TO VIDEO
    if( isset($atts['ogg_type']) && !empty($atts['ogg_type']) ){
        $ogg_type = $atts['ogg_type'];
    }
    else {
        $ogg_type = "video";
    }

    ob_start();
    // INCLUDE THE MARKUP FOR THE VIDEO ELEMENT
    include( plugin_dir_path(__FILE__) . 'markup.php' );
    return ob_get_clean();

}
add_shortcode('able_player', 'able_short');
