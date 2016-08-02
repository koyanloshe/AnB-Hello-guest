<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; ?>
<li>
	<div class="product-widget-thumb">
		<?php echo wp_kses_post($product->get_image()); ?>
		<?php
		/**
		 * g5plus_woocommerce_after_product_widget_thumb hook
		 *
		 * @hooked woocommerce_template_loop_add_to_cart - 15
		 * @hooked g5plus_woocomerce_template_loop_link - 20
		 *
		 */
		do_action( 'g5plus_woocommerce_after_product_widget_thumb' );
		?>
	</div>
	<div class="product-widget-inner">
		<?php
		$cat_name = '';
		$terms = wc_get_product_terms( $product->id, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
		if ($terms) {
			$cat_link = get_term_link( $terms[0], 'product_cat' );
			$cat_name = $terms[0]->name;
		}
		if (!empty($cat_name)) :
		?>
			<a class="product-widget-cat s-font" href="<?php echo esc_url($cat_link) ?>" ><?php echo esc_html($cat_name);?></a>
		<?php endif; ?>


		<a class="product-widget-title p-font" href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php echo wp_kses_post($product->get_title()); ?>
		</a>
		<div class="product-widget-price-wrap product">
			<?php if ( ! empty( $show_rating ) ) echo wp_kses_post($product->get_rating_html()); ?>
			<span class="price">
				<?php echo wp_kses_post($product->get_price_html()); ?>
			</span>
		</div>
	</div>
</li>