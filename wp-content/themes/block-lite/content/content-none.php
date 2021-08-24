<?php
/**
 * This template is used when no content is present.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<!-- BEGIN .no-results -->
<div class="no-results">

	<h1><?php esc_html_e( 'No Results Found', 'block-lite' ); ?></h1>
	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching will help.', 'block-lite' ); ?></p>
	<div class="no-result-search"><?php get_search_form(); ?></div>

<!-- END .no-results -->
</div>
