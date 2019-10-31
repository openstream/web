<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Register the REST API endpoint
 */
function aspl_register_tracking_api() {
    register_rest_route( 'wc/v2', '/asendia-plugin-tracking/(?P<id>[\d]+)', array(
            'methods' => 'PUT',
            'callback' => 'aspl_add_tracking_no',
            'args' => array(
                'id' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_numeric( $param );
                    }
                ),
            ),
            'permission_callback' => function() {
                return current_user_can( 'edit_posts' );
            },
        )
    );

    register_rest_route( 'wc/v3', '/asendia-plugin-tracking/(?P<id>[\d]+)', array(
            'methods' => 'PUT',
            'callback' => 'aspl_add_tracking_no',
            'args' => array(
                'id' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_numeric( $param );
                    }
                ),
            ),
            'permission_callback' => function() {
                return current_user_can( 'edit_posts' );
            },
        )
    );
}
add_action( 'rest_api_init', 'aspl_register_tracking_api');

/**
 * Add tracking no as asendia_tracking_no in the order meta data
 */
function aspl_add_tracking_no( $data ) {
    if( isset( $data[ 'id' ] ) ) {
        $order = wc_get_order( intval($data[ 'id' ]) );
        if ($order !== false) {
            $json = $data->get_json_params();

            $tracking_no = $json['tracking_number'];

            if (is_null($tracking_no)) {
                return new WP_Error( 'no_tracking_no', 'Body should contain tracking_number', array( 'status' => 500 ) );
            }

            $order->update_meta_data( '_asendia_tracking_number', sanitize_text_field( $tracking_no ) );
            $order->save();

            return rest_ensure_response( '' );
        }
    }

    return new WP_Error( 'no_order', 'No or invalid order id', array( 'status' => 500 ) );
}

// display the extra data in the order admin panel
function aspl_display_tracking_no_in_admin( $order ) {
    $trackingNo = get_post_meta( $order->id, '_asendia_tracking_number', true );
    if (!is_null($trackingNo) && $trackingNo !== '') {
        echo '<div>';
        echo '<p><strong style="display:block">' . __('Asendia tracking number', 'asendia-plugin') . ': </strong> ';
        echo '<a href="https://service.post.ch/EasyTrack/submitParcelData.do?formattedParcelCodes=' . $trackingNo . '" target="_blank">';
        echo $trackingNo . '</a> </p>';
        echo '</div>';
    }
}
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'aspl_display_tracking_no_in_admin' );