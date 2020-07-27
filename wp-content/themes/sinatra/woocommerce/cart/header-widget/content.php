<?php
/**
 * Header Cart Widget dropdown content.
 *
 * @package Sinatra
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sinatra_cart_items = WC()->cart->get_cart();
?>
<div class="wc-cart-widget-content">
	<?php foreach ( $sinatra_cart_items as $item => $values ) { // phpcs:ignore ?>

		<?php $sinatra_product = new WC_Product( $values['product_id'] ); ?>

		<div class="si-cart-item">
			<div class="si-cart-image">
				<?php echo $sinatra_product->get_image( 'woocommerce_thumbnail' ); // phpcs:ignore ?>
			</div>

			<div class="si-cart-item-details">
				<p class="si-cart-item-title"><?php echo esc_html( $sinatra_product->get_title() ); ?></p>
				<div class="si-cart-item-meta">

				<?php if ( $values['quantity'] > 1 ) { ?>
						<span class="si-cart-item-quantity"><?php echo esc_html( $values['quantity'] ); ?></span>
					<?php } ?>

					<span class="si-cart-item-price"><?php echo $sinatra_product->get_price_html(); // phpcs:ignore ?></span>
				</div>
			</div>

			<?php /* translators: %s is cart item title. */ ?>
			<a href="<?php echo esc_url( wc_get_cart_remove_url( $item ) ); ?>" class="si-remove-cart-item" data-product_key="<?php echo esc_attr( $values['key'] ); ?>" title="<?php echo esc_html( sprintf( __( 'Remove %s from cart', 'sinatra' ), $sinatra_product->get_title() ) ); ?>">
				<i class="si-icon si-x" aria-hidden="true"></i>
				<?php /* translators: %s is cart item title. */ ?>
				<span class="screen-reader-text"><?php echo esc_html( sprintf( __( 'Remove %s from cart', 'sinatra' ), $sinatra_product->get_title() ) ); ?></span>
			</a>
		</div>
	<?php } ?>
</div><!-- END .wc-cart-widget-content -->
