<?php
/**
 * Core: Plugin Bootstrap
 *
 * @package     AffiliateWP WooCommerce Redirect Affiliates
 * @subpackage  Core
 * @copyright   Copyright (c) 2021, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.1
 */

function affwp_wc_redirect_affiliates( $redirect, $user ) {
	$user_id = $user->ID;

	if ( function_exists( 'affwp_is_affiliate' ) && affwp_is_affiliate( $user_id ) ) {
		$redirect = apply_filters( 'affwp_wc_redirect', get_permalink( affiliate_wp()->settings->get( 'affiliates_page' ) ) );
	}

    return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'affwp_wc_redirect_affiliates', 10, 2 );
