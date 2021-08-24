<?php
/**
 * This template displays the post loop.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php if ( ! has_post_thumbnail() ) { ?>
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

	<!-- END .entry-content -->
	</article>

	<!-- BEGIN .post-meta -->
	<div class="post-meta">

		<?php
		$prev_post = get_previous_post( true );
		if ( is_object( $prev_post ) ) {
			$prev_thumb = get_the_post_thumbnail_url( $prev_post->ID, array( 600, 600 ) );
		}
		$next_post = get_next_post( true );
		if ( is_object( $next_post ) ) {
			$next_thumb = get_the_post_thumbnail_url( $next_post->ID, array( 600, 600 ) );
		}
		?>

		<?php if ( get_previous_post( true ) ) { ?>
		<div class="post-navigation">
			<div class="previous-post" style="background-image: url(<?php echo esc_url( $prev_thumb ); ?>);">
				<span class="nav-label"><i class="fa fa-angle-left"></i></span>
				<?php previous_post_link( '%link', '%title', true ); ?>
			</div>
		</div>
		<?php } ?>

		<!-- BEGIN .post-information -->
		<div class="post-information text-center">

			<!-- BEGIN .post-author -->
			<div class="post-author">
				<p class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 48 ); ?></p>
				<p><em><?php esc_html_e( 'Posted by', 'block-lite' ); ?></em></p>
				<h6><?php esc_url( the_author_posts_link() ); ?></h6>
			<!-- END .post-author -->
			</div>

			<?php $tag_list = get_the_tag_list( esc_html__( ', ', 'block-lite' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
				<!-- BEGIN .post-taxonomy -->
				<div class="post-taxonomy">
					<p><?php esc_html_e( 'Category:', 'block-lite' ); ?> <?php the_category( ', ' ); ?><p>
					<?php if ( ! empty( $tag_list ) ) { ?>
						<p><?php esc_html_e( 'Tags:', 'block-lite' ); ?> <?php the_tags( '' ); ?></p>
					<?php } ?>
				<!-- END .post-taxonomy -->
				</div>
			<?php } ?>

			<?php edit_post_link( esc_html__( '(Edit)', 'block-lite' ), '', '' ); ?>

		<!-- END .post-information -->
		</div>

		<?php if ( get_next_post( true ) ) { ?>
		<div class="post-navigation">
			<div class="next-post" style="background-image: url(<?php echo esc_url( $next_thumb ); ?>);">
				<span class="nav-label"><i class="fa fa-angle-right"></i></span>
				<?php next_post_link( '%link', '%title', true ); ?>
			</div>
		</div>
		<?php } ?>

	<!-- END .post-meta -->
	</div>

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
