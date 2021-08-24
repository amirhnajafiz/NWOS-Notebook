<?php
/**
 * This template is used to manage style options.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

/**
 * Changes styles upon user defined options.
 */
function block_lite_custom_styles() {

	$header_image = get_header_image();
	$header_bg    = get_theme_mod( 'block_lite_colors_header', '#ffffff' );
	$footer_bg    = get_theme_mod( 'block_lite_colors_footer', '#f4f4f4' );

	?>

	<style>

	<?php if ( ! empty( $header_image ) ) { ?>
	.wp-custom-header {
			background-image: url('<?php header_image(); ?>');
	}
	<?php } ?>

	#wrapper .footer {
		<?php
		if ( $footer_bg ) {
			echo 'background-color: ' . esc_html( $footer_bg ) . ';';
		};
		?>
	}

	.block-header-inactive #header {
		<?php
		if ( $header_bg ) {
			echo 'background-color: ' . esc_html( $header_bg ) . ';';
		};
		?>
	}

	</style>

	<?php
}
add_action( 'wp_head', 'block_lite_custom_styles', 100 );
