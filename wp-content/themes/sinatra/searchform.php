<?php
/**
 * The template for displaying search form.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Support for custom search post type.
$sinatra_post_type = apply_filters( 'sinatra_search_post_type', 'all' );
$sinatra_post_type = 'all' !== $sinatra_post_type ? '<input type="hidden" name="post_type" value="' . esc_attr( $sinatra_post_type ) . '" />' : '';
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'sinatra' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'sinatra' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<?php echo $sinatra_post_type; // phpcs:ignore ?>

		<button role="button" type="submit" class="search-submit" aria-label="<?php esc_attr_e( 'Search', 'sinatra' ); ?>">
			<i class="si-icon si-search" aria-hidden="true"></i>
		</button>
	</div>
</form>
