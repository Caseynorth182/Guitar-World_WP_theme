<?php
//remove head not-use links
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
// ******************** Clean up WordPress Header END ********************** //


// hide admin_bar
add_filter( 'show_admin_bar', '__return_false' );

add_action('wp_enqueue_scripts', function (){
    //remove
    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_script( 'wp-embed' );
});

