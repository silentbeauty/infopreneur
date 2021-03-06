<?php
/**
 * WooCommerce
 *
 * Functions for integrating with WooCommerce.
 *
 * @package   infopreneur
 * @copyright Copyright (c) 2016, Ashley Gibson
 * @license   GPL2+
 * @since     1.0.0
 */

/**
 * Is WooCommerce Installed
 *
 * @since 1.0.0
 * @return bool
 */
function infopreneur_has_wc() {
	return function_exists( 'WC' );
}

/**
 * Add WooCommerce Support
 *
 * @since 1.0.0
 * @return void
 */
function infopreneur_wc_support() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'infopreneur_wc_support' );

/**
 * Remove existing template actions.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Remove sidebar.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Wrapper - Start
 *
 * @since 1.0.0
 * @return void
 */
function infopreneur_wc_wrapper_start() {
	// Include left sidebar (maybe).
	infopreneur_maybe_show_sidebar( 'left' );

	echo '<main id="main" class="site-main" role="main">';
}

add_action( 'woocommerce_before_main_content', 'infopreneur_wc_wrapper_start', 10 );

/**
 * Wrapper - End
 *
 * @since 1.0.0
 * @return void
 */
function infopreneur_wc_wrapper_end() {
	echo '</main>';

	// Include right sidebar (maybe).
	infopreneur_maybe_show_sidebar( 'right' );
}

add_action( 'woocommerce_after_main_content', 'infopreneur_wc_wrapper_end', 10 );