<?php
$demo_site = array(
	'main' => array(
		'name' => esc_html__('Main','g5plus-megatron'),
		'path'  => 'megatron/main',
	),
	'construction' => array(
		'name' => esc_html__('Construction','g5plus-megatron'),
		'path'  => 'megatron/construction',
	),
	'hospital' => array(
		'name' => esc_html__('Hospital','g5plus-megatron'),
		'path'  => 'megatron/hospital',
	),
	'handyman' => array(
		'name' => esc_html__('Handyman','g5plus-megatron'),
		'path'  => 'megatron/handyman',
	),
	'cleaning' => array(
		'name' => esc_html__('Cleaning','g5plus-megatron'),
		'path'  => 'megatron/cleaning',
	),
	'fitness' => array(
		'name' => esc_html__('Fitness','g5plus-megatron'),
		'path'  => 'megatron/fitness',
	),
	'interior' => array(
		'name' => esc_html__('Interior','g5plus-megatron'),
		'path'  => 'megatron/interior',
	),
	'lawyer' => array(
		'name' => esc_html__('Lawyer','g5plus-megatron'),
		'path'  => 'megatron/lawyer',
	),
	'logistics' => array(
		'name' => esc_html__('Logistics','g5plus-megatron'),
		'path'  => 'megatron/logistics',
	),
);
foreach ($demo_site as $key => $value) {
	$demo_site[$key]['image'] = G5PLUS_THEME_URL . 'assets/data-demo/' . $key . '/preview.jpg';
}

$hide_fix_class = 'hide';
if (isset($_REQUEST['fix-demo-data']) && ($_REQUEST['fix-demo-data'] == '1')) {
$hide_fix_class = '';
}
?>
<div class="g5plus-demo-data-wrapper">
	<h1><?php esc_html_e('G5PLUS - Install Demo Data','g5plus-megatron') ?></h1>
	<p><?php esc_html_e('Please choose demo to install (take about 3-35 mins)','g5plus-megatron') ?></p>
	<div class="install-message" data-success="<?php esc_html_e('Install Done','g5plus-megatron') ?>"></div>

	<div class="g5plus-demo-site-wrapper">
		<?php foreach ($demo_site as $key => $value): ?>
			<div class="g5plus-demo-site">
				<div class="g5plus-demo-site-inner">
					<div class="demo-site-thumbnail">
						<div class="centered">
							<img src="<?php echo esc_url($value['image'])?>" alt="<?php echo esc_attr($value['name'])?>"/>
						</div>
					</div>
				</div>
				<h3><span><?php echo esc_html($value['name'])?></span><span class="install-button" data-demo="<?php echo esc_attr($key) ?>" data-path="<?php echo esc_attr($value['path']) ?>"><?php esc_html_e('Install','g5plus-megatron'); ?></span></h3>
				<button class="fix_install_demo_error <?php echo esc_attr($hide_fix_class) ?>" data-demo="<?php echo esc_attr($key) ?>" data-path="<?php echo esc_attr($value['path']) ?>"><?php esc_html_e('Fix Setting','g5plus-megatron') ?></button>
			</div>
		<?php endforeach; ?>
		<div class="clear"></div>
	</div>
	<div class="install-progress-wrapper">
		<div class="title"><?php esc_html_e('Reset theme options','g5plus-megatron') ?></div>
		<div id="g5plus_reset_option" class="meter"><span style="width: 0%"></span></div>

		<div class="title"><?php esc_html_e('Install Demo Data','g5plus-megatron') ?></div>
		<div id="g5plus_install_demo" class="meter orange"><span style="width: 0%"></span></div>

		<div class="title"><?php esc_html_e('Import slider','g5plus-megatron') ?></div>
		<div id="g5plus_import_slider" class="meter red"><span style="width: 0%"></span></div>
	</div>
</div>