<?php
define( 'G5PLUS_HOME_URL', trailingslashit( home_url() ) );
define( 'G5PLUS_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'G5PLUS_THEME_URL', trailingslashit( get_template_directory_uri() ) );

if (!function_exists('g5plus_include_theme_options')) {
	function g5plus_include_theme_options() {
		if (!class_exists( 'ReduxFramework' )) {
			require_once( G5PLUS_THEME_DIR . 'g5plus-framework/options/framework.php' );
		}
		require_once( G5PLUS_THEME_DIR . 'g5plus-framework/option-extensions/loader.php' );
		require_once( G5PLUS_THEME_DIR . 'includes/options-config.php' );
	}
	g5plus_include_theme_options();
}

if (!function_exists('g5plus_add_custom_mime_types')) {
    function g5plus_add_custom_mime_types($mimes) {
        return array_merge($mimes, array(
            'eot'  => 'application/vnd.ms-fontobject',
            'woff' => 'application/x-font-woff',
            'ttf'  => 'application/x-font-truetype',
            'svg'  => 'image/svg+xml',
        ));
    }
    add_filter('upload_mimes','g5plus_add_custom_mime_types');
}


if (!function_exists('g5plus_include_library')) {
	function g5plus_include_library() {
        require_once(G5PLUS_THEME_DIR . 'g5plus-framework/g5plus-framework.php');
		require_once(G5PLUS_THEME_DIR . 'includes/register-require-plugin.php');
		require_once(G5PLUS_THEME_DIR . 'includes/theme-setup.php');
		require_once(G5PLUS_THEME_DIR . 'includes/sidebar.php');
		require_once(G5PLUS_THEME_DIR . 'includes/meta-boxes.php');
		require_once(G5PLUS_THEME_DIR . 'includes/admin-enqueue.php');
		require_once(G5PLUS_THEME_DIR . 'includes/theme-functions.php');
		require_once(G5PLUS_THEME_DIR . 'includes/theme-action.php');
		require_once(G5PLUS_THEME_DIR . 'includes/theme-filter.php');
		require_once(G5PLUS_THEME_DIR . 'includes/frontend-enqueue.php');
		require_once(G5PLUS_THEME_DIR . 'includes/tax-meta.php');
		if(class_exists('Vc_Manager')){
			require_once(G5PLUS_THEME_DIR . 'includes/vc-functions.php');
		}
    }
	g5plus_include_library();
}
