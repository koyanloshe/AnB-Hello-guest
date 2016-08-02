<?php
$g5plus_options = &G5Plus_Global::get_options();
$g5plus_header_layout = &G5Plus_Global::get_header_layout();
$prefix = 'g5plus_';

$icon_shopping_cart_class = array('shopping-cart-wrapper', 'header-customize-item', 'no-price');
if ($g5plus_options['mobile_header_shopping_cart'] == '0') {
	$icon_shopping_cart_class[] = 'mobile-hide-shopping-cart';
}

$header_customize_nav_shopping_cart_style = 'default';
switch (G5Plus_Global::get_header_customize_current()) {
	case 'nav':
		$enable_header_customize_nav = rwmb_meta($prefix . 'enable_header_customize_nav');
		if ($enable_header_customize_nav == '1') {
			$header_customize_nav_shopping_cart_style = rwmb_meta($prefix . 'header_customize_nav_shopping_cart_style');
		}
		else {
			$header_customize_nav_shopping_cart_style = isset($g5plus_options['header_customize_nav_shopping_cart_style']) && !empty($g5plus_options['header_customize_nav_shopping_cart_style'])
				? $g5plus_options['header_customize_nav_shopping_cart_style'] : 'default';
		}

		break;
	case 'left':
		$enable_header_customize_left = rwmb_meta($prefix . 'enable_header_customize_left');
		if ($enable_header_customize_left == '1') {
			$header_customize_nav_shopping_cart_style = rwmb_meta($prefix . 'header_customize_left_shopping_cart_style');
		}
		else {
			$header_customize_nav_shopping_cart_style = isset($g5plus_options['header_customize_left_shopping_cart_style']) && !empty($g5plus_options['header_customize_left_shopping_cart_style'])
				? $g5plus_options['header_customize_left_shopping_cart_style'] : 'default';
		}
		break;
	case 'right':
		$enable_header_customize_right = rwmb_meta($prefix . 'enable_header_customize_right');
		if ($enable_header_customize_right == '1') {
			$header_customize_nav_shopping_cart_style = rwmb_meta($prefix . 'header_customize_right_shopping_cart_style');
		}
		else {
			$header_customize_nav_shopping_cart_style = isset($g5plus_options['header_customize_right_shopping_cart_style']) && !empty($g5plus_options['header_customize_right_shopping_cart_style'])
				? $g5plus_options['header_customize_right_shopping_cart_style'] : 'default';
		}
		break;
}
$icon_shopping_cart_class[] = 'style-' . esc_attr($header_customize_nav_shopping_cart_style);
?>
<div class="<?php echo join(' ', $icon_shopping_cart_class); ?>">
	<?php if ($g5plus_header_layout == 'header-7'): ?>
		<div class="mini-cart-link clearfix">
			<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="view-cart"><?php esc_html_e( 'View Cart', 'g5plus-megatron' ); ?></a>
			<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="check-out"><?php esc_html_e( 'Checkout', 'g5plus-megatron' ); ?></a>
			<div class="widget_shopping_cart_content">
				<?php get_template_part('woocommerce/cart/mini-cart'); ?>
			</div>
		</div>
	<?php else:?>
		<div class="widget_shopping_cart_content">
			<?php get_template_part('woocommerce/cart/mini-cart'); ?>
		</div>
	<?php endif;?>
</div>