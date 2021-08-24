<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- BEGIN #wrapper -->
<div id="wrapper">

	<!-- BEGIN #header -->
	<header id="header">

		<!-- BEGIN #nav-bar -->
		<div id="nav-bar">

		<?php if ( is_front_page() ) { ?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
			</h1>
		<?php } else { ?>
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
			</p>
		<?php } ?>

		<?php if ( has_nav_menu( 'main-menu' ) ) { ?>

			<!-- BEGIN #navigation -->
			<nav id="navigation" class="navigation-main" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'block-lite' ); ?>">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'title_li'       => '',
					'depth'          => 4,
					'fallback_cb'    => 'wp_page_menu',
					'container'      => false,
					'menu_class'     => 'menu',
					'walker'         => new Aria_Walker_Nav_Menu(),
					'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
					'link_before'    => '<span>',
					'link_after'     => '</span>',
				) );
				?>

			<!-- END #navigation -->
			</nav>

			<button type="button" id="menu-toggle" class="menu-toggle" href="#sidr">
				<svg class="icon-menu-open" version="1.1" id="icon-open" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
					<rect y="2" width="24" height="2"/>
					<rect y="11" width="24" height="2"/>
					<rect y="20" width="24" height="2"/>
				</svg>
				<svg class="icon-menu-close" version="1.1" id="icon-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
					<rect x="0" y="11" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 12 28.9706)" width="24" height="2"/>
					<rect x="0" y="11" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 28.9706 12)" width="24" height="2"/>
				</svg>
			</button>

		<?php } ?>

		<!-- END #nav-bar -->
		</div>

		<?php if ( has_custom_header() || has_custom_logo() ) { ?>

			<?php if ( is_home() || is_archive() || is_search() || is_attachment() ) { ?>

			<!-- BEGIN #custom-header -->
			<div id="custom-header">

				<!-- BEGIN #masthead-->
				<div id="masthead">

					<div class="header-content">

						<?php the_custom_logo(); ?>

						<?php if ( is_front_page() && is_home() ) { ?>
							<h2 class="site-description"><?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?></h2>
						<?php } else { ?>
							<p class="site-description"><?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?></p>
						<?php } ?>

						<?php if ( have_posts() && is_category() ) { ?>
							<h1 class="text-center"><?php the_archive_title(); ?></h1>
							<?php the_archive_description( '<p class="archive-description">', '</p>' ); ?>
						<?php } ?>

					</div>

				<!-- END #masthead-->
				</div>

				<?php if ( is_front_page() && is_home() ) { ?>
					<a href="#blog-posts" class="scroll-down scroll"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<?php } ?>

				<?php the_custom_header_markup(); ?>

			<!-- END #custom-header -->
			</div>

			<?php } ?>

		<?php } ?>

	<!-- END #header -->
	</header>

	<!-- BEGIN .container -->
	<main class="container" role="main">
