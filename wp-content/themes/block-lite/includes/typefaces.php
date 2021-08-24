<?php
/**
 * Google Fonts Implementation
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

/**
 * Register Google Font URLs
 *
 * @since Block Lite 1.0
 */
function block_lite_fonts_url() {
	$fonts_url = '';

	/*
	Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/

	$raleway      = _x( 'on', 'Raleway font: on or off', 'block-lite' );
	$montserrat   = _x( 'on', 'Montserrat font: on or off', 'block-lite' );
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'block-lite' );

	if ( 'off' !== $merriweather || 'off' !== $raleway || 'off' !== $montserrat ) {

		$font_families = array();

		if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:400,200,300,800,700,500,600,900,100';
		}

		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}

		if ( 'off' !== $merriweather ) {
			$font_families[] = 'Merriweather:300,300i,400,400i,700,700i';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue Google Fonts on Front End
 *
 * @since Block Lite 1.0
 */
function block_lite_scripts_styles() {
	wp_enqueue_style( 'block-lite-fonts', block_lite_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'block_lite_scripts_styles' );

/**
 * Add Google Scripts for use with the editor
 *
 * @since Block Lite 1.0
 */
function block_lite_editor_styles() {
	add_editor_style( array( 'style.css', block_lite_fonts_url() ) );
}
add_action( 'after_setup_theme', 'block_lite_editor_styles' );
