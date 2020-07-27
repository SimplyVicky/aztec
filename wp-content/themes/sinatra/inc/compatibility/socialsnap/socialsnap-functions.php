<?php
/**
 * Sinatra Social Snap compatibility functions.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.1.0
 */

if ( ! function_exists( 'sinatra_entry_meta_shares' ) ):
	/**
	 * Add share count information to entry meta.
	 *
	 * @since 1.1.0
	 */
	function sinatra_entry_meta_shares() {

		$share_count = socialsnap_get_total_share_count();

		// Icon.
		$icon = sinatra_get_meta_icon( 'share', '<i class="si-icon si-share-2" aria-hidden="true"></i>' );

		$output = sprintf(
			'<span class="share-count">%3$s%1$s %2$s</span>',
			socialsnap_format_number( $share_count ),
			esc_html( _n( 'Share', 'Shares', $share_count, 'sinatra' ) ),
			wp_kses_post( $icon )
		);

		echo wp_kses_post( apply_filters( 'sinatra_entry_share_count', $output ) );
	}
endif;
