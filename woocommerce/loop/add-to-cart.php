<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
global $woocommerce;

// var_dump($product);
$variation_ids = array();
$target_attribute = 'sizes';

if ( 'variable' === $product->get_type() ) {
	?>
	<!-- Button trigger modal -->
	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $product->slug; ?>"><i class="fas fa-plus-circle"></i></a>
	
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $product->slug; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $product->slug; ?>Label" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="<?php echo $product->slug; ?>Label"><?php echo str_replace( '-', ' ', $product->slug ); ?></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  	<form action="" id="<?php echo $product->slug; ?>" method="get">
			  <input name="<?php echo $product->slug; ?>-hidden" id="<?php echo $product->slug; ?>-hidden" value="<?php echo $product->get_id(); ?>" type="hidden" />
				<?php
					$default_attributes   = $product->get_default_attributes();
					$available_attributes = $product->get_available_variations();

					// var_dump($available_attributes);
					foreach( $available_attributes as $variation_values ) {
						foreach($variation_values['attributes'] as $key => $attribute_value ) {
							$attribute_name = str_replace( 'attribute_', '', $key );
							if ( $attribute_name == $target_attribute ) {
								$default_value = $product->get_variation_default_attribute( $attribute_name );
								// if ( $default_value == $attribute_value ) {
									$variation_ids[] = $variation_values['variation_id'];
								// }
								// var_dump($variation_ids);
							}
						}
					}

					if ( count( $variation_ids ) > 0 ) {
						foreach( $variation_ids as $variation_id ) {
							$variation = wc_get_product( $variation_id );

							$variation_attribute = $variation->get_variation_attributes();
							$variation_price = $variation->get_price();

							$full_name = $variation_attribute['attribute_sizes'] . ' ' . $variation_attribute ['attribute_accompaniments'] . ' ' . get_woocommerce_currency_symbol() . $variation_price;
							
							?>
								<input name="<?php echo $variation_id; ?>" value="<?php echo $variation_id; ?>" id="<?php echo $variation_id?>" type="checkbox" />
								<label for="<?php echo $variation_id; ?>"><?php echo $full_name; ?></label>
								<br />
							<?php
						}
					}
				?>
				<button class="food-add-btn" form="<?php echo $product->slug; ?>" type="submit"><?php _e( 'Add to cart', 'techiefood' ); ?></button>
			</form>
		  </div> <!--End of modal-->
		</div>
	  </div>
	</div>
	<?php
} else {
	echo apply_filters(
		'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
		sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		),
		$product,
		$args
	);
}

