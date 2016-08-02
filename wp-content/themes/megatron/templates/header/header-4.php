<?php
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$header_class = array('header-4');
$header_nav_class = array('header-nav-wrapper', 'clearfix');

// HEADER NAV CUSTOM STYLE
$header_custom_style = '';

// GET HEADER NAVIGATION SCHEME
$header_nav_scheme = rwmb_meta($prefix . 'header_nav_scheme');
if(is_404() && $g5plus_options['header_default_404']=='0'){
    $header_nav_scheme = 'header-light';
}

if ($header_nav_scheme == 'header-overlay') {
	$header_nav_scheme_color = rwmb_meta($prefix . 'header_nav_scheme_color');
	$header_nav_scheme_opacity = rwmb_meta($prefix . 'header_nav_scheme_opacity');
	if (($header_nav_scheme_color !== '') && ($header_nav_scheme_opacity != '')) {
		$header_custom_style = sprintf(' style="background-color:%s"', g5plus_hex2rgba($header_nav_scheme_color, $header_nav_scheme_opacity * 1.0 / 100));
	}
}
if (($header_nav_scheme === '') || ($header_nav_scheme == '-1')) {
	$header_nav_scheme = $g5plus_options['header_nav_scheme'];
	if ($header_nav_scheme == 'header-overlay') {
		$header_nav_scheme_color = $g5plus_options['header_nav_scheme_color'];
		$header_nav_scheme_opacity = $g5plus_options['header_nav_scheme_opacity'];
		if (($header_nav_scheme_color !== '') && ($header_nav_scheme_opacity != '')) {
			$header_custom_style = sprintf(' style="background-color:%s"', g5plus_hex2rgba($header_nav_scheme_color, $header_nav_scheme_opacity * 1.0 / 100));
		}
	}
}
$header_nav_class[] = $header_nav_scheme;

// GET HEADER NAVIGATION BORDER TOP
$header_nav_border_top = rwmb_meta($prefix . 'header_nav_border_top');
if (($header_nav_border_top === '') || ($header_nav_border_top == '-1')) {
	$header_nav_border_top = $g5plus_options['header_nav_border_top'];
}
if(is_404()){
    $header_nav_border_top = $g5plus_options['header_404_nav_border_top'];
}
if ($header_nav_border_top != 'none') {
	$header_nav_class[] = $header_nav_border_top;
}

// GET HEADER NAVIGATION BORDER BOTTOM
$header_nav_border_bottom = rwmb_meta($prefix . 'header_nav_border_bottom');
if (($header_nav_border_bottom === '') || ($header_nav_border_bottom == '-1')) {
	$header_nav_border_bottom = $g5plus_options['header_nav_border_bottom'];
}
if(is_404()){
    $header_nav_border_bottom = $g5plus_options['header_404_nav_border_bottom'];
}
if ($header_nav_border_bottom != 'none') {
	$header_nav_class[] = $header_nav_border_bottom;
}


// GET HEADER STICKY
$header_sticky = rwmb_meta($prefix . 'header_sticky');
if (($header_sticky === '') || ($header_sticky == '-1')) {
	$header_sticky = $g5plus_options['header_sticky'];
}
if ($header_sticky == '1') {
	$header_nav_class[] = 'header-sticky';

	$header_sticky_scheme = rwmb_meta($prefix . 'header_sticky_scheme');
	if (($header_sticky_scheme == '') || ($header_sticky_scheme == '-1')) {
		$header_sticky_scheme = isset($g5plus_options['header_sticky_scheme']) ? $g5plus_options['header_sticky_scheme'] : 'sticky-inherit';
	}
	$header_nav_class[] = $header_sticky_scheme;
}

$header_above_class = array('header-above-wrapper', 'clearfix');

// GET HEADER CONTAINER LAYOUT
$header_container_layout = rwmb_meta($prefix . 'header_container_layout');
if (($header_container_layout == '') || ($header_container_layout == '-1')) {
	$header_container_layout = $g5plus_options['header_container_layout'];
}
$header_above_class [] = $header_container_layout;

// GET PAGE MENU
$page_menu = rwmb_meta($prefix . 'page_menu');
?>
<div class="<?php echo join(' ', $header_class) ?>">
	<div class="header-above-wrapper">
		<div class="<?php echo esc_attr($header_container_layout) ?>">
			<?php g5plus_get_template('header/header-logo' ); ?>
			<div class="header-above-right">
				<?php g5plus_get_template('header/header-customize-right' ); ?>
			</div>
		</div>
	</div>
	<div class="<?php echo join(' ', $header_nav_class) ?>"<?php echo sprintf('%s', $header_custom_style) ?>>
		<div class="<?php echo esc_attr($header_container_layout) ?>">
			<div class="header-container clearfix">
				<div class="header-nav-left">
					<?php if (has_nav_menu('primary')) : ?>
						<div id="primary-menu" class="menu-wrapper">
							<?php
							$arg_menu = array(
								'menu_id' => 'main-menu',
								'container' => '',
								'theme_location' => 'primary',
								'menu_class' => 'main-menu',
								'walker' => new XMenuWalker()
							);
							if (!empty($page_menu)) {
								$arg_menu['menu'] = $page_menu;
							}
							wp_nav_menu( $arg_menu );
							?>
						</div>
					<?php endif; ?>
				</div>
				<div class="header-nav-right">
					<?php g5plus_get_template('header/header-customize-nav' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>