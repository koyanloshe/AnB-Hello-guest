<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/1/2015
 * Time: 5:50 PM
 */

/*================================================
BODY CLASS
================================================== */
if (!function_exists('g5plus_body_class_name')) {
	function g5plus_body_class_name($classes) {
		$g5plus_options = &G5Plus_Global::get_options();
		$prefix = 'g5plus_';

		$action = isset($_GET['action']) ? $_GET['action'] : '';

		$page_transition = isset($g5plus_options['page_transition']) ? $g5plus_options['page_transition'] : '0';
		if (($page_transition == '1') && ($action != 'yith-woocompare-view-table')) {
			$classes[] = 'page-transitions';
		}

		if ($action == 'yith-woocompare-view-table') {
			$classes[] = 'woocommerce-compare-page';
		}

		$loading_animation = isset($g5plus_options['loading_animation']) ? $g5plus_options['loading_animation'] : '';
		if (!empty($loading_animation) && ($loading_animation != 'none')) {
			$classes[] = 'page-loading';
		}

		$classes[] = 'footer-static';

		$page_class_extra =  rwmb_meta($prefix.'page_class_extra');
		if (!empty($page_class_extra)) {
			$classes[] = $page_class_extra;
		}

		$layout_style = rwmb_meta($prefix.'layout_style');
		if(!isset($layout_style) || $layout_style == '-1' || $layout_style == '') {
			$layout_style = isset($g5plus_options['layout_style']) ? $g5plus_options['layout_style'] : 'wide';
		}

		if ($layout_style != 'wide') {
			$classes[] =  $layout_style;
		}

		$g5plus_header_layout = rwmb_meta($prefix . 'header_layout');
		if (($g5plus_header_layout === '') || ($g5plus_header_layout == '-1')) {
			$g5plus_header_layout = $g5plus_options['header_layout'];
		}
		G5Plus_Global::set_header_layout($g5plus_header_layout);

		$classes[] = $g5plus_header_layout;
		switch ($g5plus_header_layout) {
			case 'header-7':
				$classes[] = 'header-is-left';
				break;
		}



		$header_float = rwmb_meta($prefix . 'header_float');
		if (($header_float === '') || ($header_float == '-1')) {
			$header_float = $g5plus_options['header_float'];
		}

        if(is_404()){
            $header_float == '0';
        }

		if ($header_float == '1') {
			$classes[] = 'header-is-float';
		}

		// get header mobile layout
		$mobile_header_layout = rwmb_meta($prefix . 'mobile_header_layout');
		if (($mobile_header_layout === '') || (($mobile_header_layout == '-1'))) {
			$mobile_header_layout = 'header-mobile-1';
			if (isset($g5plus_options['mobile_header_layout']) && !empty($g5plus_options['mobile_header_layout'])) {
				$mobile_header_layout = $g5plus_options['mobile_header_layout'];
			}
		}
		if ($mobile_header_layout == 'header-mobile-4') {
			// HEADER BORDER BOTTOM
			$mobile_header_border_bottom = rwmb_meta($prefix . 'mobile_header_border_bottom');
			if (($mobile_header_border_bottom === '') || ($mobile_header_border_bottom == '-1')) {
				$mobile_header_border_bottom = isset($g5plus_options['mobile_header_border_bottom']) ? $g5plus_options['mobile_header_border_bottom'] : '';
			}

			if ($mobile_header_border_bottom == 'container-bordered') {
				$classes[] = 'mobile-border-container';
			}
		}


		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE) $classes[] = 'ie';
		else $classes[] = 'unknown';
		if($is_iphone) $classes[] = 'iphone';

		$enable_rtl_mode = '0';
		if (isset($g5plus_options['enable_rtl_mode'])) {
			$enable_rtl_mode =  $g5plus_options['enable_rtl_mode'];
		}

		if (is_rtl() || $enable_rtl_mode == '1' || isset($_GET['RTL'])) {
			$classes[] = 'rtl';
		}

		if (class_exists( 'WooCommerce' )) {
			$classes[] = 'woocommerce';
		}

		return $classes;
	}
	add_filter('body_class','g5plus_body_class_name');
}

/*================================================
SITE LOADING
================================================== */
if (!function_exists('g5plus_site_loading')) {
	function g5plus_site_loading(){
        g5plus_get_template('site-loading');
	}
	add_action('g5plus_before_page_wrapper','g5plus_site_loading',5);
}
/*================================================
PAGE HEADING
================================================== */
if (!function_exists('g5plus_page_heading')) {
	function g5plus_page_heading() {
		g5plus_get_template('page-heading');
	}
	add_action('g5plus_before_page','g5plus_page_heading',5);
}
/*================================================
ARCHIVE HEADING
================================================== */
if (!function_exists('g5plus_archive_heading')) {
	function g5plus_archive_heading() {
		g5plus_get_template('archive-heading');
	}
	add_action('g5plus_before_archive','g5plus_archive_heading',5);
}

if (!function_exists('g5plus_archive_product_heading')) {
    function g5plus_archive_product_heading() {
        g5plus_get_template('archive-product-heading');
    }
    add_action('g5plus_before_archive_product','g5plus_archive_product_heading',5);
}

/*================================================
ABOVE HEADER
================================================== */
if (!function_exists('g5plus_page_top_drawer')) {
	function g5plus_page_top_drawer() {
		g5plus_get_template('top-drawer-template');
	}
	add_action('g5plus_before_page_wrapper_content','g5plus_page_top_drawer',10);
}

/*================================================
HEADER
================================================== */
if (!function_exists('g5plus_page_header')) {
	function g5plus_page_header() {
		$prefix = 'g5plus_';
		// SHOW HEADER
		$header_show_hide = rwmb_meta($prefix . 'header_show_hide');
		if (($header_show_hide === '')) {
			$header_show_hide = '1';
		}
		if (($header_show_hide == '1')) {
			g5plus_get_template('header-desktop-template');
			g5plus_get_template('header-mobile-template');
			g5plus_get_template('header/search-popup');
		}

	}
	add_action('g5plus_before_page_wrapper_content','g5plus_page_header',15);
}

/*================================================
EMPTY SHOPPING CART
================================================== */
if (!function_exists('g5plus_woocommerce_clear_cart_url')) {
	function g5plus_woocommerce_clear_cart_url() {
		global $woocommerce;
		if (class_exists( 'WooCommerce' ) && isset($woocommerce)) {
			if ( isset( $_GET['empty-cart'] ) ) {
				$woocommerce->cart->empty_cart();
			}
		}
	}
	add_action( 'init', 'g5plus_woocommerce_clear_cart_url' );
}
