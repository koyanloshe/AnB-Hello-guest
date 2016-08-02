<?php
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$header_class = array('header-7');

// GET PAGE MENU
$page_menu = rwmb_meta($prefix . 'page_menu');
?>
<div class="<?php echo join(' ', $header_class) ?>">
	<div class="header-above-wrapper">
		<?php g5plus_get_template('header/header-logo' ); ?>
	</div>
	<?php if (has_nav_menu('primary')) : ?>
		<div class="menu-wrapper">
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
			<div class="header-bellow">
				<?php g5plus_get_template('header/header-customize-nav' ); ?>
			</div>
		</div>
	<?php endif; ?>
</div>