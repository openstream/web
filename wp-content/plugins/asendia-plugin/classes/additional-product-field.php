<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Display the hs tarif number
 * @since 1.0.0
 */
function aspl_create_hs_tarif_number_field() {
    $args = array(
        'id' => 'hs_tarif_number',
        'label' => __( 'Customs tariff number', 'asendia-plugin' ),
        'desc_tip' => true,
        'description' => __( 'Please enter the customs tariff number.', 'asendia-plugin' ),
    );
    woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_shipping', 'aspl_create_hs_tarif_number_field' );

/**
 * Display the origin country
 * @since 1.0.0
 */
function aspl_create_origin_country_field() {
    $args = array(
        'id' => 'origin_country',
        'label' => __( 'Origin country', 'asendia-plugin' ),
        'desc_tip' => true,
        'description' => __( 'Please enter ISO code of the origin country if it is relevant for customs.', 'asendia-plugin' ),
    );
    woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_shipping', 'aspl_create_origin_country_field' );

/**
 * Save the custom field values
 * @since 1.0.0
 */
function aspl_save_custom_field( $post_id ) {
    $product = wc_get_product( $post_id );
    $hs_tarif_number = isset( $_POST['hs_tarif_number'] ) ? $_POST['hs_tarif_number'] : '';
    $origin_country = isset( $_POST['origin_country'] ) ? $_POST['origin_country'] : '';
    $product->update_meta_data( 'hs_tarif_number', sanitize_text_field( $hs_tarif_number ) );
    $product->update_meta_data( 'origin_country', sanitize_text_field( $origin_country ) );
    $product->save();
}

add_action( 'woocommerce_process_product_meta', 'aspl_save_custom_field' );

/**
 * Add custom fields to REST API get product
 * @since 1.0.0
 */
function aspl_custom_field_api_data( $response, $post ) {

    // retrieve a custom field and add it to API response
    $response->data['hs_tarif_number'] = get_post_meta( $post->ID, 'hs_tarif_number', true );
    $response->data['origin_country'] = get_post_meta( $post->ID, 'origin_country', true );

    return $response;

}
add_filter( 'woocommerce_rest_prepare_product', 'aspl_custom_field_api_data', 90, 2 );