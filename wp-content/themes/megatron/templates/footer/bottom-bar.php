<?php
/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 6/10/15
 * Time: 2:10 PM
 */
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$bottom_bar = rwmb_meta($prefix . 'bottom_bar');
if (!isset($bottom_bar) || $bottom_bar == '-1' || $bottom_bar=='') {
	$bottom_bar = $g5plus_options['bottom_bar'];
}
if ($bottom_bar != '1') {
	return;
}

$bottom_bar_layout = rwmb_meta($prefix . 'bottom_bar_layout');
if (!isset($bottom_bar_layout) ||  $bottom_bar_layout == '-1' || $bottom_bar_layout=='') {
    $bottom_bar_layout = $g5plus_options['bottom_bar_layout'];
}

$bottom_bar_left_sidebar = rwmb_meta($prefix . 'bottom_bar_left_sidebar');
if (!isset($bottom_bar_left_sidebar) ||  $bottom_bar_left_sidebar == '-1' || $bottom_bar_left_sidebar == '') {
	$bottom_bar_left_sidebar = $g5plus_options['bottom_bar_left_sidebar'];
}

$bottom_bar_right_sidebar = '';

if ($bottom_bar_layout != 'bottom-bar-4') {
	$bottom_bar_right_sidebar = rwmb_meta($prefix . 'bottom_bar_right_sidebar');
	if (!isset($bottom_bar_right_sidebar) ||  $bottom_bar_right_sidebar == '-1' || $bottom_bar_right_sidebar == '') {
		$bottom_bar_right_sidebar = $g5plus_options['bottom_bar_right_sidebar'];
	}
}

$col_left_class = $col_right_class = 'col-md-6';
switch ($bottom_bar_layout) {
	case 'bottom-bar-2':
		$col_left_class =  'col-md-9';
		$col_right_class = 'col-md-3';
		break;
	case 'bottom-bar-3':
		$col_left_class =  'col-md-3';
		$col_right_class = 'col-md-9';
		break;
	case 'bottom-bar-4':
		$col_left_class =  'col-md-12';
		$col_right_class = 'col-md-12';
		break;

}

if (!is_active_sidebar($bottom_bar_left_sidebar) || !is_active_sidebar($bottom_bar_left_sidebar)) {
	$col_left_class =  'col-md-12';
	$col_right_class =  'col-md-12';
}

$sidebar_bottom_right_class = array($col_right_class, 'sidebar');
$sidebar_bottom_left_class = array($col_left_class, 'sidebar');
if($bottom_bar_layout === 'bottom-bar-4'){
	$sidebar_bottom_left_class[] = 'text-center';
	$sidebar_bottom_right_class[] = 'text-center';
}
else {
	$sidebar_bottom_left_class[] = 'text-left';
	$sidebar_bottom_right_class[] = 'text-right';
}
$g5plus_footer_container_layout = &G5Plus_Global::get_footer_container_layout();

if(( (($bottom_bar_left_sidebar != '') && ($bottom_bar_left_sidebar != '-2') && is_active_sidebar($bottom_bar_left_sidebar)) ||
                            (($bottom_bar_right_sidebar != '') && ($bottom_bar_right_sidebar != '-2') && is_active_sidebar($bottom_bar_right_sidebar)))):
?>
	<div class="bottom-bar-wrapper">
	    <div class="bottom-bar-inner">
		    <div class="<?php echo esc_attr($g5plus_footer_container_layout) ?>">
			    <div class="row">
				    <?php if(($bottom_bar_left_sidebar != '') && ($bottom_bar_left_sidebar != '-2') && is_active_sidebar($bottom_bar_left_sidebar)): ?>
					    <div class="<?php echo join(' ', $sidebar_bottom_left_class) ?>">
						    <?php dynamic_sidebar($bottom_bar_left_sidebar); ?>
					    </div>
				    <?php endif;?>
					<?php if(($bottom_bar_right_sidebar != '') && ($bottom_bar_right_sidebar != '-2') && is_active_sidebar($bottom_bar_right_sidebar)): ?>
						<div class="<?php echo join(' ', $sidebar_bottom_right_class) ?>">
							<?php dynamic_sidebar($bottom_bar_right_sidebar); ?>
						</div>
					<?php endif;?>
			    </div>
		    </div>
	    </div>
	</div>
<?php endif; ?>