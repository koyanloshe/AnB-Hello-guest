<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/4/2015
 * Time: 5:05 PM
 */
$g5plus_options = &G5Plus_Global::get_options();
$product_show_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
if (!in_array($product_show_filter, array('0','1'))) {
	$product_show_filter = isset($g5plus_options['product_show_filter']) ? $g5plus_options['product_show_filter'] : 1;
}
$filter_sidebar = $g5plus_options['archive_product_filter_sidebar'];
if (($product_show_filter == 0) || !is_active_sidebar( $filter_sidebar ) ) {
	return;
}
?>
<a class="product-filter" href="javascript:;"><span class="icon-menu"></span> <?php esc_html_e('Filter','g5plus-megatron'); ?> </a>
