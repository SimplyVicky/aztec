<?php
/**
 * Header Cart Widget icon.
 *
 * @package Sinatra
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sinatra_cart_count = WC()->cart->get_cart_contents_count();
$sinatra_cart_icon  = apply_filters( 'sinatra_wc_cart_widget_icon', 'si-icon si-shopping-cart' );

?>
<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="si-cart">
	<i class="<?php echo esc_attr( $sinatra_cart_icon ); ?>"></i>
	<?php if ( $sinatra_cart_count > 0 ) { ?>
		<span class="si-cart-count"><?php echo esc_html( $sinatra_cart_count ); ?></span>
	<?php } ?>
</a>
