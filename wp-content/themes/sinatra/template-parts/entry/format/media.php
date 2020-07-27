<?php
/**
 * Template part for displaying entry thumbnail (featured image).
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

// Get default post media.
$sinatra_media = sinatra_get_post_media( '' );

if ( ! $sinatra_media || post_password_required() ) {
	return;
}

$sinatra_post_format = get_post_format();

// Wrap with link for non-singular pages.
if ( 'link' === $sinatra_post_format || ! is_single( get_the_ID() ) ) {

	$sinatra_icon = '';

	if ( is_sticky() ) {
		$sinatra_icon = '<span class="entry-media-icon" title="' . esc_attr( 'Featured', 'sinatra' ) . '" aria-hidden="true"><span class="entry-media-icon-wrapper"><i class="si-icon si-star top-icon" aria-hidden="true"></i><i class="si-icon si-star"></i></span></span>';
	} elseif ( 'video' === $sinatra_post_format ) {
		$sinatra_icon = '<span class="entry-media-icon" aria-hidden="true"><span class="entry-media-icon-wrapper"><i class="si-icon si-play top-icon"></i><i class="si-icon si-play" aria-hidden="true"></i></span></span>';
	} elseif ( 'link' === $sinatra_post_format ) {
		$sinatra_icon = '<span class="entry-media-icon" title="' . esc_url( sinatra_entry_get_permalink() ) . '" aria-hidden="true"><span class="entry-media-icon-wrapper"><i class="si-icon si-external-link top-icon"></i><i class="si-icon si-external-link"></i></span></span>';
	}

	$sinatra_icon = apply_filters( 'sinatra_post_format_media_icon', $sinatra_icon, $sinatra_post_format );

	$sinatra_media = sprintf(
		'<a href="%1$s" class="entry-image-link">%2$s%3$s</a>',
		esc_url( sinatra_entry_get_permalink() ),
		$sinatra_media,
		$sinatra_icon
	);
}

$sinatra_media = apply_filters( 'sinatra_post_thumbnail', $sinatra_media );

// Print the post thumbnail.
echo wp_kses_post(
	sprintf(
		'<div class="post-thumb entry-media thumbnail">%1$s</div>',
		$sinatra_media
	)
);
