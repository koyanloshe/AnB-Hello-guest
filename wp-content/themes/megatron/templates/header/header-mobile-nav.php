<?php
	$g5plus_options = &G5Plus_Global::get_options();
	$g5plus_header_layout = &G5Plus_Global::get_header_layout();
	$prefix = 'g5plus_';

	$mobile_header_menu_drop = rwmb_meta($prefix . 'mobile_header_menu_drop');
	if (($mobile_header_menu_drop === '') || ($mobile_header_menu_drop == '-1')) {
		$mobile_header_menu_drop = 'dropdown';
		if (isset($g5plus_options['mobile_header_menu_drop']) && !empty($g5plus_options['mobile_header_menu_drop'])) {
			$mobile_header_menu_drop = $g5plus_options['mobile_header_menu_drop'];
		}
	}

	$page_menu_mobile = rwmb_meta($prefix . 'page_menu_mobile');

	$theme_location = 'primary';
	if (has_nav_menu( 'mobile' )) {
		$theme_location = 'mobile';
	}

	$header_mobile_nav = array('header-mobile-nav' , 'menu-drop-' . $mobile_header_menu_drop);
?>
<div id="nav-menu-mobile" class="<?php echo join(' ', $header_mobile_nav) ?>">
	<?php echo apply_filters('g5plus_before_menu_mobile_filter',''); ?>
	<?php if (!empty($page_menu_mobile)): ?>
		<?php
		$arg_menu = array(
			'container' => '',
			'theme_location' => 'primary',
			'menu_class' => 'nav-menu-mobile',
			'is_mobile_menu' => true,
			'menu'              => $page_menu_mobile
		);
		wp_nav_menu( $arg_menu );
		?>
	<?php else:?>
		<?php if (in_array($g5plus_header_layout, array('header-2', 'header-3'))): ?>
			<?php
			// GET PAGE MENU
			$page_menu_left = rwmb_meta($prefix . 'page_menu_left');
			$page_menu_right = rwmb_meta($prefix . 'page_menu_right');

			// LEFT MENU
			$arg_menu = array(
				'container' => '',
				'theme_location' => 'left_menu',
				'menu_class' => 'nav-menu-mobile',
				'is_mobile_menu' => true
			);
			if ($page_menu_left) {
				$arg_menu['menu'] = $page_menu_left;
			}
			wp_nav_menu( $arg_menu );

			// RIGHT MENU
			$arg_menu = array(
				'container' => '',
				'theme_location' => 'right_menu',
				'menu_class' => 'nav-menu-mobile',
				'is_mobile_menu' => true
			);
			if ($page_menu_right) {
				$arg_menu['menu'] = $page_menu_right;
			}
			wp_nav_menu( $arg_menu );
			?>
		<?php else:?>
			<?php
			$page_menu = rwmb_meta($prefix . 'page_menu');

			$arg_menu = array(
				'container' => '',
				'theme_location' => $theme_location,
				'menu_class' => 'nav-menu-mobile',
				'is_mobile_menu' => true
			);
			if (!empty($page_menu)) {
				$arg_menu['menu'] = $page_menu;
			}
			wp_nav_menu( $arg_menu );
			?>
		<?php endif;?>
	<?php endif;?>

	<?php echo apply_filters('g5plus_after_menu_mobile_filter',''); ?>
</div>
<?php if ($mobile_header_menu_drop == 'fly'): ?>
	<div class="main-menu-overlay"></div>
<?php endif;?>