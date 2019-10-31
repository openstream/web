<?php
/*
Plugin Name: asendia-plugin
Plugin URI: https://shopncross.post.ch
Description: Funktionen um WooCommerce an shopncross anzubinden.
Text Domain: asendia-plugin
Domain Path: /languages
Version: 1.9
Author: Asendia
Author URI: https://www.post.ch
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    require_once 'classes/additional-product-field.php';
    require_once 'classes/order-tracking.php';

    load_plugin_textdomain('asendia-plugin', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
} else {
    echo 'WooCommerce is not active, but asendia plugin requires it.';
}
