<?php
add_action( 'wp_enqueue_scripts', 'openstream_theme_enqueue_styles' );
function openstream_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action('storefront_footer', 'openstream_theme_add_footer_credits', 12);
function openstream_theme_add_footer_credits() {
    echo '<div>MultilingualPress integration and WooCommerce support by <a href="https://www.openstream.ch">Openstream Internet Solutions</a>.</div>';
}
