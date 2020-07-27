<?php
/**
 * The template for displaying scroll to top button.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */

?>

<a href="#" id="si-scroll-top" class="si-smooth-scroll" title="<?php esc_attr_e( 'Scroll to Top', 'sinatra' ); ?>" <?php sinatra_scroll_top_classes(); ?>>
	<span class="si-scroll-icon" aria-hidden="true">
		<i class="si-icon si-chevron-up top-icon"></i>
		<i class="si-icon si-chevron-up"></i>
	</span>
	<span class="screen-reader-text"><?php esc_html_e( 'Scroll to Top', 'sinatra' ); ?></span>
</a><!-- END #sinatra-scroll-to-top -->
