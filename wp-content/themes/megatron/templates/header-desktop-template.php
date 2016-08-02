<?php
$g5plus_options = &G5Plus_Global::get_options();
$g5plus_header_layout = &G5Plus_Global::get_header_layout();
$prefix = 'g5plus_';

$header_class = array('main-header');

// GET HEADER BOXED
$header_boxed = rwmb_meta($prefix . 'header_boxed');
if (($header_boxed == '') || ($header_boxed == '-1')) {
	$header_boxed = $g5plus_options['header_boxed'];
}
if ($header_boxed == '1') {
	$header_class[] = 'header-boxed';
}

// GET HEADER FLOAT
$header_float = rwmb_meta($prefix . 'header_float');
if (($header_float === '') || ($header_float == '-1')) {
	$header_float = $g5plus_options['header_float'];
}
if(is_404()  && $g5plus_options['header_default_404']=='0'){
    $header_float = '0';
}
if ($header_float == '1') {
	$header_class[] = 'header-float';
}

// HEADER CUSTOM SYLE
$header_custom_style = '';

// GET HEADER SCHEME
$header_scheme = rwmb_meta($prefix . 'header_scheme');
if( is_404() && $g5plus_options['header_default_404']=='0'){
    $header_scheme = 'header-light';
}
if ($header_scheme == 'header-overlay') {
	$header_scheme_color = rwmb_meta($prefix . 'header_scheme_color');
	$header_scheme_opacity = rwmb_meta($prefix . 'header_scheme_opacity');
	if (($header_scheme_color !== '') && ($header_scheme_opacity != '')) {
		$header_custom_style = sprintf(' style="background-color:%s"', g5plus_hex2rgba($header_scheme_color, $header_scheme_opacity * 1.0 / 100));
	}
}
if (($header_scheme === '') || ($header_scheme == '-1')) {
	$header_scheme = $g5plus_options['header_scheme'];
	if ($header_scheme == 'header-overlay') {
		$header_scheme_color = $g5plus_options['header_scheme_color'];
		$header_scheme_opacity = $g5plus_options['header_scheme_opacity'];
		if (($header_scheme_color !== '') && ($header_scheme_opacity != '')) {
			$header_custom_style = sprintf(' style="background-color:%s"', g5plus_hex2rgba($header_scheme_color, $header_scheme_opacity * 1.0 / 100));
		}
	}
}
$header_class[] = $header_scheme;

// HEADER LAYOUT LEFT
if (in_array($g5plus_header_layout, array('header-7'))) {
	$header_class[] = 'header-left';
}
else {
	// GET SUB MENU SCHEME
	$menu_sub_scheme = rwmb_meta($prefix . 'menu_sub_scheme');
	if (($menu_sub_scheme === '') || ($menu_sub_scheme == '-1')) {
		$menu_sub_scheme = isset($g5plus_options['menu_sub_scheme']) ? $g5plus_options['menu_sub_scheme'] : 'sub-menu-dark';
	}
	if (!empty($menu_sub_scheme)) {
		$header_class[] = $menu_sub_scheme;
	}
}
if(is_404() && $g5plus_options['header_default_404']=='0'){
    $g5plus_header_layout= $g5plus_options['header_404_layout'];
}
?>
<header id="main-header-wrapper" class="<?php echo join(' ', $header_class); ?>" <?php echo sprintf('%s', $header_custom_style) ?>>
	<?php g5plus_get_template('header/top-bar' ); ?>
	<?php g5plus_get_template('header/' . $g5plus_header_layout ); ?>
</header>