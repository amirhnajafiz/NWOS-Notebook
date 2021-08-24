<?php
/**
 * This file includes the theme functions.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'block_lite_setup' ) ) :

	/** Function block_lite_setup */
	function block_lite_setup() {
		/*
		 * Enable support for translation.
		 */
		load_theme_textdomain( 'block-lite', get_template_directory() . '/languages' );

		/*
		 * Enable support for RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for post thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'block-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'block-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'block-featured-small', 640, 640, true ); // Small Featured Image.
		add_image_size( 'block-featured-square', 1200, 1200, true ); // Square Featured Image.

		/*
		 * Enable support for site title tag.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for wide alignment class for Gutenberg blocks.
		 */
		add_theme_support( 'align-wide' );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 480,
			'width'       => 480,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		/*
		 * Enable support for custom menus.
		 */
		register_nav_menus( array(
			'main-menu'   => esc_html__( 'Main Menu', 'block-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'block-lite' ),
		));

		/*
		 * Enable support for custom header.
		 */
		register_default_headers( array(
			'default' => array(
				'url'           => get_template_directory_uri() . '/images/default-header.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
				'description'   => esc_html__( 'Default Custom Header', 'block-lite' ),
			),
		) );
		$defaults = array(
			'video'         => true,
			'width'         => 2400,
			'height'        => 1800,
			'flex-height'   => true,
			'flex-width'    => true,
			'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
			'header-text'   => false,
			'uploads'       => true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		 * Enable support for custom background.
		 */
		$defaults = array(
			'default-color' => 'ffffff',
		);
		add_theme_support( 'custom-background', $defaults );

	}
endif; // End function block_lite_setup.
add_action( 'after_setup_theme', 'block_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'block_lite_enqueue_scripts' ) ) {

	/** Function block_lite_enqueue_scripts */
	function block_lite_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'block-lite-style', get_stylesheet_uri() );
		wp_enqueue_style( 'block-lite-style-conditionals', get_template_directory_uri() . '/css/style-conditionals.css', array( 'block-lite-style' ), '1.0' );
		wp_enqueue_style( 'block-lite-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'block-lite-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'block-lite-style' ), '1.0' );

		// Resgister Scripts.
		wp_register_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array( 'jquery' ), '1.0' );
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0' );
		wp_register_script( 'jquery-bg-brightness', get_template_directory_uri() . '/js/jquery.bgBrightness.js', array( 'jquery' ), '1.0' );

		// Enqueue Scripts.
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'block-lite-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'jquery-sidr', 'jquery-fitvids', 'jquery-bg-brightness' ), '1.0', true );

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'block_lite_enqueue_scripts' );
}

if ( ! function_exists( 'block_lite_enqueue_admin_scripts' ) ) {

	/** Function block_lite_enqueue_admin_scripts */
	function block_lite_enqueue_admin_scripts( $hook ) {
		if ( 'themes.php' !== $hook ) {
			return;
		}
		wp_enqueue_script( 'block-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
	}
	add_action( 'admin_enqueue_scripts', 'block_lite_enqueue_admin_scripts' );
}

/*
-------------------------------------------------------------------------------------------------------
	Gutenberg Editor Styles
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'block_lite_gutenberg_styles' ) ) {

	/**
	 * Enqueue WordPress theme styles within Gutenberg.
	 */
	function block_lite_gutenberg_styles() {
		// Load the theme styles within Gutenberg.
		wp_enqueue_style(
			'block-lite-gutenberg',
			get_theme_file_uri( '/css/gutenberg.css' ),
			false,
			'1.0',
			'all'
		);
		wp_enqueue_style(
			'font-awesome',
			get_template_directory_uri() . '/css/font-awesome.css',
			array( 'block-lite-gutenberg' ),
			'1.0'
		);
	}
}
add_action( 'enqueue_block_editor_assets', 'block_lite_gutenberg_styles', 10 );

/*
-------------------------------------------------------------------------------------------------------
	Admin Support and Upgrade Link
-------------------------------------------------------------------------------------------------------
*/

function block_lite_support_link() {
	global $submenu;
	$support_link = esc_url( 'https://organicthemes.com/support/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', 'block-lite' ), 'manage_options', $support_link );
}
add_action( 'admin_menu', 'block_lite_support_link' );

function block_lite_upgrade_link() {
	global $submenu;
	$upgrade_link = esc_url( 'https://organicthemes.com/theme/block-theme/?utm_source=lite_upgrade' );
	$submenu['themes.php'][] = array( __( 'Theme Upgrade', 'block-lite' ), 'manage_options', $upgrade_link );
}
add_action( 'admin_menu', 'block_lite_upgrade_link' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function block_lite_admin_notice */
function block_lite_admin_notice_follow() {
	if ( ! PAnD::is_admin_notice_active( 'notice-block-lite-30' ) ) {
		return;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=246727095428680";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));</script>

	<div data-dismissible="notice-block-lite-30" class="notice updated is-dismissible">

		<p><?php printf( __( 'Thanks for choosing the Block Lite theme! Enter your email to receive important updates and information from <a href="%1$s" target="_blank">Organic Themes</a>.', 'block-lite' ), 'https://organicthemes.com' ); ?></p>

		<div class="follows" style="overflow: hidden; margin-bottom: 12px;">

			<div id="mc_embed_signup" class="clear" style="float: left;">
				<form action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<div class="mc-field-group" style="float: left;">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
						</div>
						<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
					</div>
				</form>
			</div>

			<div class="social-links" style="float: left; margin-left: 24px; margin-top: 4px;">
				<div class="fb-like" style="float: left;" data-href="https://www.facebook.com/OrganicThemes/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow" style="float: left; margin-left: 6px;"><a class="twitter-follow-button" href="https://twitter.com/OrganicThemes" data-show-count="false">Follow @OrganicThemes</a></div>
			</div>

		</div>

	</div>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
	<?php
}

/** Function block_lite_admin_notice_review */
function block_lite_admin_notice_review() {
	if ( ! PAnD::is_admin_notice_active( 'notice-block-lite-review-30' ) ) {
		return;
	}
	?>

	<div data-dismissible="notice-block-lite-review-30" class="notice updated is-dismissible">

		<p><?php printf( wp_kses_post( '🍍 Aloha! Mahalo for using the <a href="%1$s" target="_blank">Block Lite</a> theme. As a <b>BIG</b> favor, could you please take a moment to <a href="%2$s" target="_blank">leave a positive review</a> for this theme. It takes a great deal of time to build and maintain a free product such as this, and your support is greatly appreciated.', 'block-lite' ), 'https://organicthemes.com/theme/block-lite/', 'https://wordpress.org/support/theme/block-lite/reviews/#new-post' ); ?></p>
		<p><b><?php esc_html_e( '&mdash; David Morgan', 'block-lite' ); ?></b><br/>
		<b><?php printf( wp_kses_post( 'Co-founder of <a href="%1$s" target="_blank">Organic Themes</a>', 'block-lite' ), 'https://organicthemes.com/' ); ?></b></p>

	</div>

	<?php
}

add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'block_lite_admin_notice_follow', 10 );
add_action( 'admin_notices', 'block_lite_admin_notice_review', 10 );

require( get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

/**
 * Changes category IDs to names.
 *
 * @param array $id IDs for categories.
 * @return array
 */

if ( ! function_exists( 'block_lite_cat_id_to_name' ) ) :

	/** Function block_lite_cat_id_to_name */
	function block_lite_cat_id_to_name( $id ) {
		$cat = get_category( $id );
		if ( is_wp_error( $cat ) ) {
			return false; }
		return $cat->cat_name;
	}

endif;

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'block_lite_widgets_init' ) ) :

	/** Function block_lite_widgets_init */
	function block_lite_widgets_init() {
		register_sidebar(array(
			'name'          => esc_html__( 'Home Bottom', 'block-lite' ),
			'id'            => 'home-bottom',
			'before_widget' => '<aside id="%1$s" class="organic-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar(array(
			'name'          => esc_html__( 'Footer Widgets', 'block-lite' ),
			'id'            => 'footer',
			'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="footer-widget">',
			'after_widget'  => '</div></aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}
endif;
add_action( 'widgets_init', 'block_lite_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Posted On Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'block_lite_posted_on' ) ) :

	/** Function block_lite_posted_on */
	function block_lite_posted_on() {
		printf( __( '<span class="%1$s">Posted:</span> %2$s', 'block-lite' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				get_the_date( get_option( 'date_format' ) )
			)
		);
	}

endif;

if ( ! function_exists( 'block_lite_posted_on_no_link' ) ) :

	/** Function block_lite_posted_on_no_link */
	function block_lite_posted_on_no_link() {
		printf( __( '<span class="%1$s">Posted on</span> %2$s', 'block-lite' ),
			'meta-prep meta-prep-author',
			get_the_date( get_option( 'date_format' ) )
		);
	}

endif;

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) {
	$content_width = 760;
}

if ( ! function_exists( 'block_lite_content_width' ) ) :

	/** Function block_lite_content_width */
	function block_lite_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'block_lite_content_width', 760 );
	}

endif;
add_action( 'after_setup_theme', 'block_lite_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'block_lite_comment' ) ) :

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function block_lite_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'block-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'block-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default:
				?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
					if ( '0' !== $comment->comment_parent ) {
						$avatar_size = 48; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'block-lite' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s, %2$s', 'block-lite' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
					</div><!-- END .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( '0' === $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'block-lite' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php
					comment_reply_link( array_merge( $args, array(
						'reply_text' => esc_html__( 'Reply', 'block-lite' ),
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
					) ) );
					?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( 'Edit', 'block-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

				<?php
				break;
			endswitch;
	}
endif; // Ends check for block_lite_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Block Lite 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function block_lite_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'block-lite' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'block_lite_excerpt_more' );

/**
 * Adds line break before Read More tag.
 *
 * @since Block Lite 1.0
 *
 * @return string
 */
function block_lite_more_link( $more_link, $more_link_text ) {
	return '<p><a class="more-link" href="' . esc_url( get_permalink() ) . '">' . $more_link_text . '</a></p>';
}
add_filter( 'the_content_more_link', 'block_lite_more_link', 10, 2 );

/*
-------------------------------------------------------------------------------------------------------
	Add Excerpt To Pages
-------------------------------------------------------------------------------------------------------
*/

add_action( 'init', 'block_lite_page_excerpts' );
/** Function block_lite_page_excerpts */
function block_lite_page_excerpts() {
	add_post_type_support( 'page', 'excerpt' );
}

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom page links to pages.
 *
 * @param array $args for page links.
 * @return array
 */

if ( ! function_exists( 'block_lite_wp_link_pages_args_prevnext_add' ) ) :

	function block_lite_wp_link_pages_args_prevnext_add( $args ) {
		global $page, $numpages, $more, $pagenow;

		if ( 'next_and_number' !== $args['next_or_number'] ) {
			return $args; }

		$args['next_or_number'] = 'number'; // Keep numbering for the main part.
		if ( ! $more ) {
			return $args; }

		if ( $page - 1 ) { // There is a previous page.
			$args['before'] .= _wp_link_page( $page - 1 )
				. $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>'; }

		if ( $page < $numpages ) { // There is a next page.
			$args['after'] = _wp_link_page( $page + 1 )
				. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
				. $args['after']; }

		return $args;
	}
endif;
add_filter( 'wp_link_pages_args', 'block_lite_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Remove First Gallery
-------------------------------------------------------------------------------------------------------
*/

/**
 * Removes first gallery shortcode from slideshow page template.
 *
 * @param array $content Content output on slideshow page template.
 * @return array
 */

if ( ! function_exists( 'block_lite_remove_gallery' ) ) :

	function block_lite_remove_gallery( $content ) {
		if ( is_page_template( 'template-slideshow.php' ) ) {
			$regex   = get_shortcode_regex( array( 'gallery' ) );
			$content = preg_replace( '/' . $regex . '/s', '', $content, 1 );
			$content = wp_kses_post( $content );
		}
		return $content;
	}
endif;
add_filter( 'the_content', 'block_lite_remove_gallery' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'block_lite_body_class' ) ) :

	function block_lite_body_class( $classes ) {

		$header_image = get_header_image();
		$post_pages   = is_home() || is_archive() || is_search() || is_attachment();

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$classes[] = 'block-has-logo';
		} else {
			$classes[] = 'block-no-logo';
		}

		if ( is_page_template( 'template-landing.php' ) ) {
			$classes[] = 'block-landing-page'; }

		if ( is_page_template( 'template-slideshow.php' ) ) {
			$classes[] = 'block-slideshow'; }

		if ( 'left' === get_theme_mod( 'block_lite_nav_align', 'right' ) ) {
			$classes[] = 'block-nav-left'; }

		if ( 'center' === get_theme_mod( 'block_lite_nav_align', 'right' ) ) {
			$classes[] = 'block-nav-center'; }

		if ( 'right' === get_theme_mod( 'block_lite_nav_align', 'right' ) ) {
			$classes[] = 'block-nav-right'; }

		if ( 'left' === get_theme_mod( 'block_lite_desc_align', 'center' ) ) {
			$classes[] = 'block-desc-left'; }

		if ( 'center' === get_theme_mod( 'block_lite_desc_align', 'center' ) ) {
			$classes[] = 'block-desc-center'; }

		if ( 'right' === get_theme_mod( 'block_lite_desc_align', 'center' ) ) {
			$classes[] = 'block-desc-right'; }

		if ( 'blank' !== get_theme_mod( 'block_lite_site_tagline' ) ) {
			$classes[] = 'block-desc-active';
		} else {
			$classes[] = 'block-desc-inactive';
		}

		if ( ! has_nav_menu( 'social-menu' ) ) {
			$classes[] = 'block-no-social-menu'; }

		if ( is_singular() && ! has_post_thumbnail() ) {
			$classes[] = 'block-no-img'; }

		if ( is_singular() && has_post_thumbnail() ) {
			$classes[] = 'block-has-img'; }

		if ( $post_pages && ! empty( $header_image ) ) {
			$classes[] = 'block-header-active';
		} else {
			$classes[] = 'block-header-inactive';
		}

		if ( is_header_video_active() && has_header_video() ) {
			$classes[] = 'block-header-video-active';
		} else {
			$classes[] = 'block-header-video-inactive';
		}

		if ( is_singular() ) {
			$classes[] = 'block-singular';
		}

		if ( '' !== get_theme_mod( 'background_image' ) ) {
			// This class will render when a background image is set
			// regardless of whether the user has set a color as well.
			$classes[] = 'block-background-image';
		} elseif ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
			// This class will render when a background color is set
			// but no image is set. In the case the content text will
			// Adjust relative to the background color.
			$classes[] = 'block-relative-text';
		}

		return $classes;
	}
endif;
add_action( 'body_class', 'block_lite_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once get_template_directory() . '/customizer/customizer.php';
require_once get_template_directory() . '/includes/style-options.php';
require_once get_template_directory() . '/includes/typefaces.php';
require_once get_template_directory() . '/includes/plugin-activation.php';
require_once get_template_directory() . '/includes/plugin-activation-class.php';
require_once get_template_directory() . '/includes/aria-walker-nav-menu.php';
