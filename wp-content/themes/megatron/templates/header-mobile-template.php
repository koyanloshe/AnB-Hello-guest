<?php
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';

$header_class = array('mobile-header');

// get header mobile layout
$mobile_header_layout = rwmb_meta($prefix . 'mobile_header_layout');
if (($mobile_header_layout === '') || (($mobile_header_layout == '-1'))) {
	$mobile_header_layout = 'header-mobile-1';
	if (isset($g5plus_options['mobile_header_layout']) && !empty($g5plus_options['mobile_header_layout'])) {
		$mobile_header_layout = $g5plus_options['mobile_header_layout'];
	}
}
$header_class[] = $mobile_header_layout;

$mobile_header_scheme = rwmb_meta($prefix . 'mobile_header_scheme');
if (($mobile_header_scheme === '') || ($mobile_header_scheme == '-1')) {
	if (isset($g5plus_options['mobile_header_scheme']) && !empty($g5plus_options['mobile_header_scheme'])) {
		$mobile_header_scheme = $g5plus_options['mobile_header_scheme'];
	}
}

if (!empty($mobile_header_scheme)) {
	$header_class[] = $mobile_header_scheme;
}

// GET MOBILE FLOAT
$mobile_header_float = rwmb_meta($prefix . 'mobile_header_float');
if (($mobile_header_float === '') || ($mobile_header_float == '-1')) {
	$mobile_header_float = isset($g5plus_options['mobile_header_float']) ? $g5plus_options['mobile_header_float'] : '';
}
if ($mobile_header_float == '1') {
	$header_class[] = 'mobile-header-float';
}

// HEADER BORDER BOTTOM
$mobile_header_border_bottom = rwmb_meta($prefix . 'mobile_header_border_bottom');
if (($mobile_header_border_bottom === '') || ($mobile_header_border_bottom == '-1')) {
	$mobile_header_border_bottom = isset($g5plus_options['mobile_header_border_bottom']) ? $g5plus_options['mobile_header_border_bottom'] : '';
}
if (!empty($mobile_header_border_bottom) && ($mobile_header_border_bottom != 'none')) {
	$header_class[] = $mobile_header_border_bottom;
}
?>
<header id="mobile-header-wrapper" class="<?php echo join(' ', $header_class); ?>">
	<?php g5plus_get_template('header/mobile-top-bar' ); ?>
	<?php g5plus_get_template('header/' . $mobile_header_layout ); ?>
</header>