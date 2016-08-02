<?php
add_action( 'admin_print_styles-nav-menus.php' , 'xmenu_admin_menu_load_assets' );
function xmenu_admin_menu_load_assets() {

	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('wp-color-picker');

	wp_enqueue_style( 'xmenu-menu-admin', XMENU_URL. 'admin/assets/css/admin.css' );
	wp_enqueue_script( 'xmenu-menu-jquery-mouse-wheel', XMENU_URL. 'admin/assets/js/jquery.mousewheel.js' , array( 'jquery' ) , XMENU_VERSION , true );
	wp_enqueue_script( 'xmenu-menu-media-init', XMENU_URL. 'admin/assets/js/media-init.js' , array( 'jquery' ) , XMENU_VERSION , true );
	wp_enqueue_script( 'xmenu-menu-admin', XMENU_URL. 'admin/assets/js/admin.js' , array( 'jquery' ) , XMENU_VERSION , true );

	$xmenu_menu_data = xmenu_get_menu_items_data();
	$items_default = xmenu_get_item_defaults();
	wp_localize_script( 'xmenu-menu-admin' , 'xmenu_menu_item_data' , $xmenu_menu_data );
	wp_localize_script( 'xmenu-menu-admin' , 'xmenu_menu_item_default' , $items_default );
	wp_localize_script( 'xmenu-menu-admin' , 'xmenu_meta' , array(
		'ajax_url' => admin_url( 'admin-ajax.php?activate-multi=true' )
	) );
}

function xmenu_get_menu_items_data($post_status = 'any') {
	global $nav_menu_selected_id;
	$items_default = xmenu_get_item_defaults();
	$menu_items = wp_get_nav_menu_items( $nav_menu_selected_id, array( 'post_status' => $post_status ) );

	$xmenu_data = array();
	if (!$menu_items) return $items_default;
	foreach ($menu_items as $key => $item) {
		$menu = array(
			'nosave-type_label' => $item->type_label,
			'nosave-type' => $item->type,
			'general-url' => $item->url,
			'general-title' => $item->title,
			'general-attr-title' => $item->attr_title,
			'general-target' => $item->target,
			'general-classes' => join(' ',$item->classes),
			'general-xfn' => $item->xfn,
			'general-description' => $item->description,
		);
		$menu_item_meta = get_post_meta( $item->ID, '_menu_item_xmenu_config', true );
		if ($menu_item_meta) {
			$menu_item_meta = json_decode($menu_item_meta, true);
			$menu = array_merge($menu_item_meta, $menu);
		}
		$xmenu_data [$item->ID] = array_merge($items_default, $menu);
	}
	return $xmenu_data;
}