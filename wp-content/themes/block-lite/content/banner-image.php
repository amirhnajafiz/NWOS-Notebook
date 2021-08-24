<?php
/**
 * This template is used to display the banner image on posts and pages.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<?php $header_image = get_header_image(); ?>
<?php $thumb = ( '' !== get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'block-featured-large' ) : false; ?>

<?php if ( has_post_thumbnail() ) { ?>

	<!-- BEGIN .row -->
	<header class="row" role="banner">

		<div class="featured-img banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
			<?php if ( is_page() || is_single() ) { ?>
				<div class="img-title">
					<?php if ( is_single() ) { ?>
						<p class="post-author"><?php block_lite_posted_on_no_link(); ?> <em><?php esc_html_e( 'by', 'block-lite' ); ?></em> <?php the_post(); ?><?php echo get_the_author(); ?><?php rewind_posts(); ?></p>
					<?php } ?>
					<h1 class="img-headline"><?php the_title(); ?></h1>
					<?php if ( ! empty( $post->post_excerpt ) ) { ?>
						<div class="excerpt"><?php the_excerpt(); ?></div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php the_post_thumbnail( 'block-featured-large' ); ?>
		</div>

	<!-- END .row -->
	</header>

<?php } ?>
