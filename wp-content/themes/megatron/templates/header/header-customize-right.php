<?php
$g5plus_options = &G5Plus_Global::get_options();
$g5plus_header_layout = &G5Plus_Global::get_header_layout();
$prefix = 'g5plus_';
G5Plus_Global::set_header_customize_current('right');

$header_customize_class = array('header-customize header-customize-right');

$header_customize = array();
$enable_header_customize = rwmb_meta($prefix . 'enable_header_customize_right');
if ($enable_header_customize == '1') {
	$page_header_customize = rwmb_meta($prefix . 'header_customize_right');
	if (isset($page_header_customize['enable']) && !empty($page_header_customize['enable'])) {
		$header_customize = explode('||', $page_header_customize['enable']);
	}

	$header_customize_left_separate = rwmb_meta($prefix . 'header_customize_right_separate');
	if ($header_customize_left_separate == '1') {
		$header_customize_class[] = 'header-customize-separate';
	}
}
else {
	if (isset($g5plus_options['header_customize_right']) && isset($g5plus_options['header_customize_right']['enabled']) && is_array($g5plus_options['header_customize_right']['enabled'])) {
		foreach ($g5plus_options['header_customize_right']['enabled'] as $key => $value) {
			$header_customize[] = $key;
		}
	}

	if (isset($g5plus_options['header_customize_nav_separate']) && ($g5plus_options['header_customize_right_separate'] == '1')){
		$header_customize_class[] = 'header-customize-separate';
	}
}

?>
<?php if (count($header_customize) > 0): ?>
	<div class="<?php echo join(' ', $header_customize_class) ?>">
		<?php foreach ($header_customize as $key){
			switch ($key) {
				case 'search-button':
					if ($g5plus_header_layout == 'header-7') {
						g5plus_get_template('header/search-box');
					}
					else {
						g5plus_get_template('header/search-button');
					}
					break;
				case 'shopping-cart':
					if (class_exists( 'WooCommerce' )) {
						g5plus_get_template('header/mini-cart');
					}
					break;
				case 'social-profile':
					g5plus_get_template('header/social-profile');
					break;
				case 'canvas-menu':
					g5plus_get_template('header/canvas-menu');
					break;
				case 'custom-text':
					g5plus_get_template('header/custom-text');
					break;
			}
		} ?>
	</div>
<?php endif;?>