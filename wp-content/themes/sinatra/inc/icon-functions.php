<?php
/**
 * SVG icons related functions and filters
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

/**
 * Add SVG definitions to the footer.
 */
function sinatra_include_svg_icons() {

	// Define SVG sprite file.
	$svg_icons = SINATRA_THEME_PATH . '/assets/images/sinatra-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once $svg_icons; // phpcs:ignore
	}
}
add_action( 'wp_footer', 'sinatra_include_svg_icons', 9999 );

/**
 * Display social icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function sinatra_nav_menu_social_icons( $item_output, $item, $depth, $args ) {

	// Get supported social icons.
	$social_icons = sinatra_social_links_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( false !== strpos( $args->menu_class, 'sinatra-socials-menu' ) ) {

		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span><i class="si-icon si-' . $value . '" aria-hidden="true"></i><i class="si-icon si-' . $value . ' bottom-icon" aria-hidden="true"></i>', $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'sinatra_nav_menu_social_icons', 10, 4 );

/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function sinatra_social_links_icons() {

	// Supported social links icons.
	$social_links_icons = array(
		'500px.com'       => '500px',
		'amazon.com'      => 'amazon',
		'behance.net'     => 'behance',
		'digg.com'        => 'digg',
		'dribbble.com'    => 'dribbble',
		'deviantart'      => 'deviantart',
		'etsy.com'        => 'etsy',
		'facebook.com'    => 'facebook',
		'flipboard.com'   => 'flipboard',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'github.com'      => 'github',
		'plus.google.com' => 'google-plus',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'mail',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest',
		'reddit.com'      => 'reddit',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'snapchat.com'    => 'snapchat',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'xing.com'        => 'xing',
		'vk.com'          => 'vkontakte',
		'youtube.com'     => 'youtube',
		'yelp.com'        => 'yelp',
	);

	/**
	 * Filter Sinatra social links icons.
	 *
	 * @since 1.0.0
	 * @param array $social_links_icons Array of social links icons.
	 */
	return apply_filters( 'sinatra_social_links_icons', $social_links_icons );
}

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function sinatra_get_svg( $args = array() ) {

	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', 'sinatra' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return esc_html__( 'Please define an SVG icon filename.', 'sinatra' );
	}

	// Set defaults.
	$defaults = array(
		'icon'         => '',
		'hover_effect' => false,
		'fill'         => false,
		'title'        => '',
		'desc'         => '',
		'fallback'     => false,
		'extra_class'  => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Icon has to be set.
	if ( ! $args['icon'] ) {
		return;
	}

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	// Extra class name.
	$extra_class = '';

	// Fill color.
	$fill = '';

	/*
	 * Sinatra doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo sinatra_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'sinatra' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo sinatra_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'sinatra' ), 'desc' => __( 'This is the description', 'sinatra' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	if ( $args['extra_class'] ) {
		$extra_class = ' ' . $args['extra_class'];
	}

	if ( $args['fill'] ) {
		$fill = ' style="fill: ' . $args['fill'] . '"';
	}

	// Begin SVG markup.
	$svg = '<svg class="sinatra-icon' . esc_attr( $extra_class ) . ' icon-' . esc_attr( $args['icon'] ) . '"' . $fill . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	if ( $args['hover_effect'] ) {
		return $svg . $svg;
	}

	return $svg;
}

/**
 * Get icon for post entry meta.
 *
 * @since  1.1.0
 * @param  string $slug    Icon slug.
 * @param  string $icon    Icon HTML markup.
 * @param  string $post_id Current post ID.
 * @return string          Icon HTML markup.
 */
function sinatra_get_meta_icon( $slug = '', $icon  = '', $post_id = '' ) {

	$return = '';

	if ( is_single( $post_id ) ) {
		if ( sinatra_option( 'single_entry_meta_icons' ) ) {
			$return = $icon;
		}
	} elseif ( ! is_single() ) {
		if ( sinatra_option( 'entry_meta_icons' ) ) {
			$return = $icon;
		}
	}

	return apply_filters( 'sinatra_' . $slug . '_meta_icon', $return, $post_id );
}
