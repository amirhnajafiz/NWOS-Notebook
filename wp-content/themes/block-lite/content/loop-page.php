<?php
/**
 * This template displays the page loop.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<?php $front_page = is_front_page(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php if ( ! $front_page && ! has_post_thumbnail() || $front_page && ! has_post_thumbnail() && ! has_custom_header() ) { ?>
			<h1 class="entry-header"><?php the_title(); ?></h1>
		<?php } ?>

		<?php the_content( sprintf( esc_html__( 'Continue reading%s', 'block-lite' ), '<span class="screen-reader-text">  ' . get_the_title() . '</span>', false ) ); ?>

		<?php
		wp_link_pages(array(
			'before'           => '<p class="page-links"><span class="link-label">' . esc_html__( 'Pages:', 'block-lite' ) . '</span>',
			'after'            => '</p>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'next_or_number'   => 'next_and_number',
			'nextpagelink'     => esc_html__( 'Next', 'block-lite' ),
			'previouspagelink' => esc_html__( 'Previous', 'block-lite' ),
			'pagelink'         => '%',
			'echo'             => 1,
		) );
		?>

		<?php edit_post_link( esc_html__( '(Edit)', 'block-lite' ), '', '' ); ?>

	<!-- END .entry-content -->
	</article>

		<?php
		if ( comments_open() || '0' !== get_comments_number() ) {
			comments_template();
		}
		?>

<?php endwhile; else : ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php get_template_part( 'content/content', 'none' ); ?>

	<!-- END .entry-content -->
	</article>

<?php endif; ?>
