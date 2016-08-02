<?php
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$header_class = array('header-8');

// GET HEADER CONTAINER LAYOUT
$header_container_layout = rwmb_meta($prefix . 'header_container_layout');
if (($header_container_layout == '') || ($header_container_layout == '-1')) {
	$header_container_layout = $g5plus_options['header_container_layout'];
}

$logo_sticky = g5plus_get_logo_url('sticky_logo');
if (empty($logo_sticky)) {
	$logo_sticky = g5plus_get_logo_url('logo');
}

$logo_sticky_retina = g5plus_get_logo_url('sticky_logo_retina');
if (empty($logo_sticky_retina)) {
	$logo_sticky_retina = g5plus_get_logo_url('logo_retina');
}

// GET PAGE MENU
$page_menu = rwmb_meta($prefix . 'page_menu');
?>
<div class="<?php echo join(' ', $header_class) ?>">
	<div class="header-above-wrapper">
		<div class="<?php echo esc_attr($header_container_layout) ?>">
			<?php g5plus_get_template('header/header-logo' ); ?>
		</div>
	</div>
	<div class="header-bellow">
		<div class="<?php echo esc_attr($header_container_layout) ?>">
			<?php g5plus_get_template('header/header-customize-nav' ); ?>
		</div>
	</div>
	<i class="header-overlay-open micon icon-menu53"></i>
	<?php if (has_nav_menu('primary')) : ?>
		<div class="overlay-menu-wrapper">
			<div class="overlay-menu-left">
				<a  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>">
					<img class="<?php echo !empty($logo_sticky_retina) ? 'has-retina' : '' ?>" src="<?php echo esc_url($logo_sticky) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>"/>
					<?php if (!empty($logo_sticky_retina)): ?>
						<img class="retina-logo" src="<?php echo esc_url($logo_sticky_retina) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>"/>
					<?php endif;?>
				</a>
			</div>
			<div class="overlay-menu-right">
				<div class="overlay-menu-inner">
					<?php
					$arg_menu = array(
						'menu_id' => 'main-menu',
						'container' => '',
						'theme_location' => 'primary',
						'menu_class' => 'main-menu x-nav-vmenu',
						'walker' => new XMenuWalker()
					);
					if (!empty($page_menu)) {
						$arg_menu['menu'] = $page_menu;
					}
					wp_nav_menu( $arg_menu );
					?>
				</div>
			</div>
			<i class="header-overlay-close micon icon-wrong6"></i>
		</div>
	<?php endif; ?>
</div>