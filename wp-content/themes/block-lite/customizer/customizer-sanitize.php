<?php
/**
 * Theme customizer sanitization
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

/**
 * Sanitize Categories.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_categories( $input, $setting ) {
	$input = absint( $input );
	return is_string( get_the_category_by_ID( $input ) ) ? $input : $setting->default;
}

/**
 * Sanitize Mulitple Selection.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_multi_select( $input ) {
	$valid = block_lite_blog_categories();

	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return;
		}
	}

	return $input;
}

/**
 * Sanitize Pages.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_pages( $input ) {
	$pages = get_all_page_ids();

	if ( in_array( $input, $pages, true ) ) {
			return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Interval.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_transition_interval( $input ) {
	$valid = array(
		'2000'      => esc_html__( '2 Seconds', 'block-lite' ),
		'4000'      => esc_html__( '4 Seconds', 'block-lite' ),
		'6000'      => esc_html__( '6 Seconds', 'block-lite' ),
		'8000'      => esc_html__( '8 Seconds', 'block-lite' ),
		'10000'     => esc_html__( '10 Seconds', 'block-lite' ),
		'12000'     => esc_html__( '12 Seconds', 'block-lite' ),
		'20000'     => esc_html__( '20 Seconds', 'block-lite' ),
		'30000'     => esc_html__( '30 Seconds', 'block-lite' ),
		'60000'     => esc_html__( '1 Minute', 'block-lite' ),
		'999999999' => esc_html__( 'Hold Frame', 'block-lite' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Style.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_transition_style( $input ) {
	$valid = array(
		'fade'  => esc_html__( 'Fade', 'block-lite' ),
		'slide' => esc_html__( 'Slide', 'block-lite' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Columns.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_columns( $input ) {
	$valid = array(
		'one'   => esc_html__( 'One Column', 'block-lite' ),
		'two'   => esc_html__( 'Two Columns', 'block-lite' ),
		'three' => esc_html__( 'Three Columns', 'block-lite' ),
		'four'  => esc_html__( 'Four Columns', 'block-lite' ),
		'five'  => esc_html__( 'Five Columns', 'block-lite' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Alignment.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_align( $input ) {
	$valid = array(
		'left'   => esc_html__( 'Left Align', 'block-lite' ),
		'center' => esc_html__( 'Center Align', 'block-lite' ),
		'right'  => esc_html__( 'Right Align', 'block-lite' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Colors.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_title_color( $input ) {
	$valid = array(
		'black' => esc_html__( 'Black', 'block-lite' ),
		'white' => esc_html__( 'White', 'block-lite' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Checkboxes.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function block_lite_sanitize_checkbox( $input ) {
	if ( 1 === $input ) {
		return 1;
	} else {
		return '';
	}
}
