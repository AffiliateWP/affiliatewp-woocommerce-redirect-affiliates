<?php
/*
Plugin Name: AffiliateWP - WooCommerce Redirect Affiliates
Plugin URI: https://affiliatewp.com
Description: Redirect affiliates to their affiliate area when they login via WooCommerce's /my-account page
Version: 1.0
Author: AffiliateWP
Author URI: https://affiliatewp.com
License: GPL-2.0+
License URI: http://www.opensource.org/licenses/gpl-license.php
*/
function affwp_wc_redirect_affiliates( $redirect, $user ) {
	$user_id = $user->ID;

	if ( function_exists( 'affwp_is_affiliate' ) && affwp_is_affiliate( $user_id ) ) {
		$redirect = apply_filters( 'affwp_wc_redirect', get_permalink( affiliate_wp()->settings->get( 'affiliates_page' ) ) );
	}

    return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'affwp_wc_redirect_affiliates', 10, 2 );
