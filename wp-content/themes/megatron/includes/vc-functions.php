<?php
function g5plus_custom_wp_admin_style()
{
    $primary_color = '';
    if (isset($g5plus_options['primary_color']) && !empty($g5plus_options['primary_color'])) {
        $primary_color = $g5plus_options['primary_color'];
    }
    if (empty($primary_color)) {
        $primary_color = '#29B667';
    }
    $secondary_color = '';
    if (isset($g5plus_options['secondary_color']) && !empty($g5plus_options['secondary_color'])) {
        $secondary_color = $g5plus_options['secondary_color'];
    }
    if (empty($secondary_color)) {
        $secondary_color = '#00BFFF';
    }
    echo "<style>
    .vc_colored-dropdown .primary-color {
        background-color: {$primary_color} !important;
    }
    .vc_colored-dropdown .secondary-color {
        background-color: {$secondary_color} !important;
    }</style>";
}

add_action('admin_head', 'g5plus_custom_wp_admin_style');

add_action('vc_before_init', 'g5plus_vcSetAsTheme');
function g5plus_vcSetAsTheme()
{
    vc_set_as_theme();
}

function g5plus_number_settings_field($settings, $value)
{
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type = isset($settings['type']) ? $settings['type'] : '';
    $min = isset($settings['min']) ? $settings['min'] : '';
    $max = isset($settings['max']) ? $settings['max'] : '';
    $suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
    $class = isset($settings['class']) ? $settings['class'] : '';
    $output = '<input type="number" min="' . esc_attr($min) . '" max="' . esc_attr($max) . '" class="wpb_vc_param_value ' . esc_attr($param_name) . ' ' . esc_attr($type) . ' ' . esc_attr($class) . '" name="' . esc_attr($param_name) . '" value="' . esc_attr($value) . '" style="max-width:100px; margin-right: 10px;" />' . esc_attr($suffix);
    return $output;
}

function g5plus_icon_text_settings_field($settings, $value)
{
    return '<div class="vc-text-icon">'
    . '<input  name="' . $settings['param_name'] . '" style="width:80%;" class="wpb_vc_param_value wpb-textinput widefat input-icon ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '_field" type="text" value="' . esc_attr($value) . '"/>'
    . '<input title="' . esc_html__('Click to browse icon', 'g5plus-megatron') . '" style="width:20%; height:34px;" class="browse-icon button-secondary" type="button" value="' . esc_html__('Browse Icon', 'g5plus-megatron') . '" >'
    . '<span class="icon-preview"><i class="' . esc_attr($value) . '"></i></span>'
    . '</div>';
}

function g5plus_multi_select_settings_field_shortcode_param($settings, $value)
{
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $param_option = isset($settings['options']) ? $settings['options'] : '';
    $output = '<input type="hidden" name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . '" value="' . $value . '"/>';
    $output .= '<select multiple id="' . $param_name . '_select2" name="' . $param_name . '_select2" class="multi-select">';
    if ($param_option != '' && is_array($param_option)) {
        foreach ($param_option as $text_val => $val) {
            if (is_numeric($text_val) && (is_string($val) || is_numeric($val))) {
                $text_val = $val;
            }
            $output .= '<option id="' . $val . '" value="' . $val . '">' . htmlspecialchars($text_val) . '</option>';
        }
    }

    $output .= '</select><input type="checkbox" id="' . $param_name . '_select_all" >' . esc_html__('Select All', 'g5plus-megatron');
    $output .= '<script type="text/javascript">
		        jQuery(document).ready(function($){

					$("#' . $param_name . '_select2").select2();

					var order = $("#' . $param_name . '").val();
					if (order != "") {
						order = order.split(",");
						var choices = [];
						for (var i = 0; i < order.length; i++) {
							var option = $("#' . $param_name . '_select2 option[value="+ order[i]  + "]");
							if (option.length > 0) {
							    choices[i] = {id:order[i], text:option[0].label, element: option};
							}
						}
						$("#' . $param_name . '_select2").select2("data", choices);
					}

			        $("#' . $param_name . '_select2").on("select2-selecting", function(e) {
			            var ids = $("#' . $param_name . '").val();
			            if (ids != "") {
			                ids +=",";
			            }
			            ids += e.val;
			            $("#' . $param_name . '").val(ids);
                    }).on("select2-removed", function(e) {
				          var ids = $("#' . $param_name . '").val();
				          var arr_ids = ids.split(",");
				          var newIds = "";
				          for(var i = 0 ; i < arr_ids.length; i++) {
				            if (arr_ids[i] != e.val){
				                if (newIds != "") {
			                        newIds +=",";
					            }
					            newIds += arr_ids[i];
				            }
				          }
				          $("#' . $param_name . '").val(newIds);
		             });

		            $("#' . $param_name . '_select_all").click(function(){
		                if($("#' . $param_name . '_select_all").is(":checked") ){
		                    $("#' . $param_name . '_select2 > option").prop("selected","selected");
		                    $("#' . $param_name . '_select2").trigger("change");
		                    var arr_ids =  $("#' . $param_name . '_select2").select2("val");
		                    var ids = "";
                            for (var i = 0; i < arr_ids.length; i++ ) {
                                if (ids != "") {
                                    ids +=",";
                                }
                                ids += arr_ids[i];
                            }
                            $("#' . $param_name . '").val(ids);

		                }else{
		                    $("#' . $param_name . '_select2 > option").removeAttr("selected");
		                    $("#' . $param_name . '_select2").trigger("change");
		                    $("#' . $param_name . '").val("");
		                }
		            });
		        });
		        </script>
		        <style>
		            .multi-select
		            {
		              width: 100%;
		            }
		            .select2-drop
		            {
		                z-index: 100000;
		            }
		        </style>';
    return $output;
}

function g5plus_tags_settings_field_shortcode_param($settings, $value)
{
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $output = '<input  name="' . $settings['param_name']
        . '" class="wpb_vc_param_value wpb-textinput '
        . $settings['param_name'] . ' ' . $settings['type']
        . '" type="hidden" value="' . $value . '"/>';
    $output .= '<input type="text" name="' . $param_name . '_tagsinput" id="' . $param_name . '_tagsinput" value="' . $value . '" data-role="tagsinput"/>';
    $output .= '<script type="text/javascript">
							jQuery(document).ready(function($){
								$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();

								$("#' . $param_name . '_tagsinput").on("itemAdded", function(event) {
		                             $("input[name=' . $param_name . ']").val($(this).val());
								});

								$("#' . $param_name . '_tagsinput").on("itemRemoved", function(event) {
		                             $("input[name=' . $param_name . ']").val($(this).val());
								});
							});
						</script>';
    return $output;
}

if (function_exists('vc_add_' . 'shortcode_param')) {
	call_user_func('vc_add_' . 'shortcode_param', 'number', 'g5plus_number_settings_field');
	call_user_func('vc_add_' . 'shortcode_param', 'icon_text', 'g5plus_icon_text_settings_field');
	call_user_func('vc_add_' . 'shortcode_param', 'multi-select', 'g5plus_multi_select_settings_field_shortcode_param');
	call_user_func('vc_add_' . 'shortcode_param', 'tags', 'g5plus_tags_settings_field_shortcode_param');
}
function g5plus_add_vc_param()
{
    $megatron_icons = &G5Plus_Global::theme_font_icon();
	$megatron_font_awesome = &G5Plus_Global::font_awesome();
    if (function_exists('vc_add_param')) {
        vc_add_param('vc_tta_accordion', array(
                'type' => 'dropdown',
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Icon backround dark, active gray', 'g5plus-megatron') => 'accordion_style1',
                    esc_html__('Icon backround gray, active dark', 'g5plus-megatron') => 'accordion_style2',
                    esc_html__('Panel title transparent, active transparent', 'g5plus-megatron') => 'accordion_style3',
                    esc_html__('Panel title transparent, active dark', 'g5plus-megatron') => 'accordion_style4',
                    esc_html__('Classic', 'g5plus-megatron') => 'classic',
                    esc_html__('Modern', 'g5plus-megatron') => 'modern',
                    esc_html__('Flat', 'g5plus-megatron') => 'flat',
                    esc_html__('Outline', 'g5plus-megatron') => 'outline',
                ),
                'heading' => esc_html__('Style', 'g5plus-megatron'),
                'description' => esc_html__('Select accordion display style.', 'g5plus-megatron'),
                'weight' => 1,
            )
        );
        vc_add_param('vc_tta_tabs', array(
                'type' => 'dropdown',
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Megatron', 'g5plus-megatron') => 'tab_style1',
                    esc_html__('Classic', 'g5plus-megatron') => 'classic',
                    esc_html__('Modern', 'g5plus-megatron') => 'modern',
                    esc_html__('Flat', 'g5plus-megatron') => 'flat',
                    esc_html__('Outline', 'g5plus-megatron') => 'outline',
                ),
                'heading' => esc_html__('Style', 'g5plus-megatron'),
                'description' => esc_html__('Select tabs display style.', 'g5plus-megatron'),
                'weight' => 1,
            )
        );
        vc_add_param('vc_tta_tour', array(
                'type' => 'dropdown',
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Megatron', 'g5plus-megatron') => 'tour_style1',
                    esc_html__('Classic', 'g5plus-megatron') => 'classic',
                    esc_html__('Modern', 'g5plus-megatron') => 'modern',
                    esc_html__('Flat', 'g5plus-megatron') => 'flat',
                    esc_html__('Outline', 'g5plus-megatron') => 'outline',
                ),
                'heading' => esc_html__('Style', 'g5plus-megatron'),
                'description' => esc_html__('Select tabs display style.', 'g5plus-megatron'),
                'weight' => 1,
            )
        );
        vc_remove_param('vc_icon', 'type');
        vc_add_param('vc_icon', array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon library', 'g5plus-megatron'),
                'value' => array(
                    esc_html__('Megatron Icon', 'g5plus-megatron') => 'megatron',
                    esc_html__('Font Awesome', 'g5plus-megatron') => 'fontawesome',
                    esc_html__('Open Iconic', 'g5plus-megatron') => 'openiconic',
                    esc_html__('Typicons', 'g5plus-megatron') => 'typicons',
                    esc_html__('Entypo', 'g5plus-megatron') => 'entypo',
                    esc_html__('Linecons', 'g5plus-megatron') => 'linecons',
                ),
                'admin_label' => true,
                'weight' => 2,
                'param_name' => 'type',
                'description' => esc_html__('Select icon library.', 'g5plus-megatron'),
            )
        );
        vc_add_param('vc_icon',array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-info-circle',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    'source' => $megatron_font_awesome,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'type',
                    'value' => 'fontawesome',
                ),
                'description' => esc_html__( 'Select icon from library.', 'g5plus-megatron' ),
            )
        );
        vc_add_param('vc_icon', array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', 'g5plus-megatron'),
                'param_name' => 'icon_megatron',
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    'type' => 'megatron',
                    'source' => $megatron_icons,
                ),
                'dependency' => array(
                    'element' => 'type',
                    'value' => 'megatron',
                ),
                'weight' => 1,
                'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
            )
        );

        $settings_vc_map = array(
            'category' => array(esc_html__('Content', 'g5plus-megatron'), esc_html__('Megatron Shortcodes', 'g5plus-megatron'))
        );
        vc_map_update('vc_tta_tabs', $settings_vc_map);
        vc_map_update('vc_tta_tour', $settings_vc_map);
        vc_map_update('vc_tta_accordion', $settings_vc_map);
    }
}

g5plus_add_vc_param();

function g5plus_get_css_animation($css_animation)
{
    $output = '';
    if ($css_animation != '') {
        wp_enqueue_script('waypoints');
        $output = ' wpb_animate_when_almost_visible g5plus-css-animation ' . $css_animation;
    }
    return $output;
}

function g5plus_get_style_animation($duration, $delay)
{
    $styles = array();
    if ($duration != '0' && !empty($duration)) {
        $duration = (float)trim($duration, "\n\ts");
        $styles[] = "-webkit-animation-duration: {$duration}s";
        $styles[] = "-moz-animation-duration: {$duration}s";
        $styles[] = "-ms-animation-duration: {$duration}s";
        $styles[] = "-o-animation-duration: {$duration}s";
        $styles[] = "animation-duration: {$duration}s";
    }
    if ($delay != '0' && !empty($delay)) {
        $delay = (float)trim($delay, "\n\ts");
        $styles[] = "opacity: 0";
        $styles[] = "-webkit-animation-delay: {$delay}s";
        $styles[] = "-moz-animation-delay: {$delay}s";
        $styles[] = "-ms-animation-delay: {$delay}s";
        $styles[] = "-o-animation-delay: {$delay}s";
        $styles[] = "animation-delay: {$delay}s";
    }
    if (count($styles) > 1) {
        return 'style="' . implode(';', $styles) . '"';
    }
    return implode(';', $styles);
}

function  g5plus_convert_hex_to_rgba($hex, $opacity = 1)
{
    $hex = str_replace("#", "", $hex);
    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgba = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
    return $rgba;
}

function g5plus_register_vc_map()
{
    $megatron_icons = &G5Plus_Global::theme_font_icon();
	$megatron_font_awesome = &G5Plus_Global::font_awesome();
    $pixel_icons = &G5Plus_Global::get_pixel_icons();
    $add_css_animation = array(
        'type' => 'dropdown',
        'heading' => esc_html__('CSS Animation', 'g5plus-megatron'),
        'param_name' => 'css_animation',
        'value' => array(esc_html__('No', 'g5plus-megatron') => '', esc_html__('Fade In', 'g5plus-megatron') => 'wpb_fadeIn', esc_html__('Fade Top to Bottom', 'g5plus-megatron') => 'wpb_fadeInDown', esc_html__('Fade Bottom to Top', 'g5plus-megatron') => 'wpb_fadeInUp', esc_html__('Fade Left to Right', 'g5plus-megatron') => 'wpb_fadeInLeft', esc_html__('Fade Right to Left', 'g5plus-megatron') => 'wpb_fadeInRight', esc_html__('Bounce In', 'g5plus-megatron') => 'wpb_bounceIn', esc_html__('Bounce Top to Bottom', 'g5plus-megatron') => 'wpb_bounceInDown', esc_html__('Bounce Bottom to Top', 'g5plus-megatron') => 'wpb_bounceInUp', esc_html__('Bounce Left to Right', 'g5plus-megatron') => 'wpb_bounceInLeft', esc_html__('Bounce Right to Left', 'g5plus-megatron') => 'wpb_bounceInRight', esc_html__('Zoom In', 'g5plus-megatron') => 'wpb_zoomIn', esc_html__('Flip Vertical', 'g5plus-megatron') => 'wpb_flipInX', esc_html__('Flip Horizontal', 'g5plus-megatron') => 'wpb_flipInY', esc_html__('Bounce', 'g5plus-megatron') => 'wpb_bounce', esc_html__('Flash', 'g5plus-megatron') => 'wpb_flash', esc_html__('Shake', 'g5plus-megatron') => 'wpb_shake', esc_html__('Pulse', 'g5plus-megatron') => 'wpb_pulse', esc_html__('Swing', 'g5plus-megatron') => 'wpb_swing', esc_html__('Rubber band', 'g5plus-megatron') => 'wpb_rubberBand', esc_html__('Wobble', 'g5plus-megatron') => 'wpb_wobble', esc_html__('Tada', 'g5plus-megatron') => 'wpb_tada'),
        'description' => esc_html__('Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'g5plus-megatron'),
        'group' => esc_html__('Animation Settings', 'g5plus-megatron')
    );

    $add_duration_animation = array(
        'type' => 'textfield',
        'heading' => esc_html__('Animation Duration', 'g5plus-megatron'),
        'param_name' => 'duration',
        'value' => '',
        'description' => esc_html__('Duration in seconds. You can use decimal points in the value. Use this field to specify the amount of time the animation plays. <em>The default value depends on the animation, leave blank to use the default.</em>', 'g5plus-megatron'),
        'dependency' => Array('element' => 'css_animation', 'value' => array('wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada')),
        'group' => esc_html__('Animation Settings', 'g5plus-megatron')
    );

    $add_delay_animation = array(
        'type' => 'textfield',
        'heading' => esc_html__('Animation Delay', 'g5plus-megatron'),
        'param_name' => 'delay',
        'value' => '',
        'description' => esc_html__('Delay in seconds. You can use decimal points in the value. Use this field to delay the animation for a few seconds, this is helpful if you want to chain different effects one after another above the fold.', 'g5plus-megatron'),
        'dependency' => Array('element' => 'css_animation', 'value' => array('wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada')),
        'group' => esc_html__('Animation Settings', 'g5plus-megatron')
    );
    $params_row = array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'g5plus-megatron'),
            'param_name' => 'layout',
            'value' => array(
                esc_html__('Full Width (overflow hidden)', 'g5plus-megatron') => 'wide',
                esc_html__('Full Width (overflow visible)', 'g5plus-megatron') => 'fullwidth-visible',
                esc_html__('Container', 'g5plus-megatron') => 'boxed',
                esc_html__('Container Fluid', 'g5plus-megatron') => 'container-fluid',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Columns gap', 'g5plus-megatron'),
            'param_name' => 'gap',
            'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'std' => '0',
            'description' => esc_html__('Select gap between columns in row.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Full height row?', 'g5plus-megatron'),
            'param_name' => 'full_height',
            'description' => esc_html__('If checked row will be set to full height.', 'g5plus-megatron'),
            'value' => array(esc_html__('Yes', 'g5plus-megatron') => 'yes'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Columns position', 'g5plus-megatron'),
            'param_name' => 'columns_placement',
            'value' => array(
                esc_html__('Middle', 'g5plus-megatron') => 'middle',
                esc_html__('Top', 'g5plus-megatron') => 'top',
                esc_html__('Bottom', 'g5plus-megatron') => 'bottom',
                esc_html__('Stretch', 'g5plus-megatron') => 'stretch',
            ),
            'description' => esc_html__('Select columns position within row.', 'g5plus-megatron'),
            'dependency' => array(
                'element' => 'full_height',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Equal height', 'g5plus-megatron'),
            'param_name' => 'equal_height',
            'description' => esc_html__('If checked columns will be set to equal height.', 'g5plus-megatron'),
            'value' => array(esc_html__('Yes', 'g5plus-megatron') => 'yes')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content position', 'g5plus-megatron'),
            'param_name' => 'content_placement',
            'value' => array(
                esc_html__('Default', 'g5plus-megatron') => '',
                esc_html__('Top', 'g5plus-megatron') => 'top',
                esc_html__('Middle', 'g5plus-megatron') => 'middle',
                esc_html__('Bottom', 'g5plus-megatron') => 'bottom',
            ),
            'description' => esc_html__('Select content position within columns.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Use video background?', 'g5plus-megatron'),
            'param_name' => 'video_bg',
            'description' => esc_html__('If checked, video will be used as row background.', 'g5plus-megatron'),
            'value' => array(esc_html__('Yes', 'g5plus-megatron') => 'yes'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('YouTube link', 'g5plus-megatron'),
            'param_name' => 'video_bg_url',
            'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
            // default video url
            'description' => esc_html__('Add YouTube link.', 'g5plus-megatron'),
            'dependency' => array(
                'element' => 'video_bg',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Parallax', 'g5plus-megatron'),
            'param_name' => 'video_bg_parallax',
            'value' => array(
                esc_html__('None', 'g5plus-megatron') => '',
                esc_html__('Simple', 'g5plus-megatron') => 'content-moving',
                esc_html__('With fade', 'g5plus-megatron') => 'content-moving-fade',
            ),
            'description' => esc_html__('Add parallax type background for row.', 'g5plus-megatron'),
            'dependency' => array(
                'element' => 'video_bg',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Parallax', 'g5plus-megatron'),
            'param_name' => 'parallax',
            'value' => array(
                esc_html__('None', 'g5plus-megatron') => '',
                esc_html__('Simple', 'g5plus-megatron') => 'content-moving',
                esc_html__('With fade', 'g5plus-megatron') => 'content-moving-fade',
            ),
            'description' => esc_html__('Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'g5plus-megatron'),
            'dependency' => array(
                'element' => 'video_bg',
                'is_empty' => true,
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'g5plus-megatron'),
            'param_name' => 'parallax_image',
            'value' => '',
            'description' => esc_html__('Select image from media library.', 'g5plus-megatron'),
            'dependency' => array(
                'element' => 'parallax',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax speed', 'g5plus-megatron'),
            'param_name' => 'parallax_speed',
            'value' => '1.5',
            'dependency' => Array('element' => 'parallax', 'value' => array('content-moving', 'content-moving-fade')),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show background overlay', 'g5plus-megatron'),
            'param_name' => 'overlay_set',
            'description' => esc_html__('Hide or Show overlay on background images.', 'g5plus-megatron'),
            'value' => array(
                esc_html__('Hide, please', 'g5plus-megatron') => 'hide_overlay',
                esc_html__('Show Overlay Color', 'g5plus-megatron') => 'show_overlay_color',
                esc_html__('Show Overlay Image', 'g5plus-megatron') => 'show_overlay_image',
            )
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image Overlay:', 'g5plus-megatron'),
            'param_name' => 'overlay_image',
            'value' => '',
            'description' => esc_html__('Upload image overlay.', 'g5plus-megatron'),
            'dependency' => Array('element' => 'overlay_set', 'value' => array('show_overlay_image')),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Overlay color', 'g5plus-megatron'),
            'param_name' => 'overlay_color',
            'description' => esc_html__('Select color for background overlay.', 'g5plus-megatron'),
            'value' => '',
            'dependency' => Array('element' => 'overlay_set', 'value' => array('show_overlay_color')),
        ),
        array(
            'type' => 'number',
            'class' => '',
            'heading' => esc_html__('Overlay opacity', 'g5plus-megatron'),
            'param_name' => 'overlay_opacity',
            'value' => '50',
            'min' => '1',
            'max' => '100',
            'suffix' => '%',
            'description' => esc_html__('Select opacity for overlay.', 'g5plus-megatron'),
            'dependency' => Array('element' => 'overlay_set', 'value' => array('show_overlay_color', 'show_overlay_image')),
        ),
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Row ID', 'g5plus-megatron'),
            'param_name' => 'el_id',
            'description' => sprintf(esc_html__('Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'g5plus-megatron'), 'http://www.w3schools.com/tags/att_global_id.asp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'g5plus-megatron'),
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'g5plus-megatron'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'g5plus-megatron'),
        ),
        $add_css_animation,
        $add_duration_animation,
        $add_delay_animation,
    );
    vc_map(array(
        'name' => esc_html__('Row', 'g5plus-megatron'),
        'base' => 'vc_row',
        'is_container' => true,
        'icon' => 'icon-wpb-row',
        'show_settings_on_create' => false,
        'category' => esc_html__('Content', 'g5plus-megatron'),
        'description' => esc_html__('Place content elements inside the row', 'g5plus-megatron'),
        'params' => $params_row,
        'js_view' => 'VcRowView'
    ));
    vc_map(array(
        'name' => esc_html__('Row', 'g5plus-megatron'), //Inner Row
        'base' => 'vc_row_inner',
        'content_element' => false,
        'is_container' => true,
        'icon' => 'icon-wpb-row',
        'weight' => 1000,
        'show_settings_on_create' => false,
        'description' => esc_html__('Place content elements inside the row', 'g5plus-megatron'),
        'params' => $params_row,
        'js_view' => 'VcRowView'
    ));
    $params_icon = array(
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'g5plus-megatron'),
            'param_name' => 'i_icon_megatron',
            'value' => 'icon-adjustments', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                'type' => 'megatron',
                'source' => $megatron_icons,
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'megatron',
            ),
            'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'g5plus-megatron'),
            'param_name' => 'i_icon_fontawesome',
            'value' => 'fa fa-adjust', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                'source' => $megatron_font_awesome,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'g5plus-megatron'),
            'param_name' => 'i_icon_openiconic',
            'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'g5plus-megatron'),
            'param_name' => 'i_icon_typicons',
            'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'g5plus-megatron'),
            'param_name' => 'i_icon_entypo',
            'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'g5plus-megatron'),
            'param_name' => 'i_icon_linecons',
            'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
        ),
    );
    $params_section = array_merge(
        array(
            array(
                'type' => 'textfield',
                'param_name' => 'title',
                'heading' => esc_html__('Title', 'g5plus-megatron'),
                'description' => esc_html__('Enter section title (Note: you can leave it empty).', 'g5plus-megatron'),
            ),
            array(
                'type' => 'el_id',
                'param_name' => 'tab_id',
                'settings' => array(
                    'auto_generate' => true,
                ),
                'heading' => esc_html__('Section ID', 'g5plus-megatron'),
                'description' => esc_html__('Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'g5plus-megatron'),
            ),
            array(
                'type' => 'checkbox',
                'param_name' => 'add_icon',
                'heading' => esc_html__('Add icon?', 'g5plus-megatron'),
                'description' => esc_html__('Add icon next to section title.', 'g5plus-megatron'),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'i_position',
                'value' => array(
                    esc_html__('Before title', 'g5plus-megatron') => 'left',
                    esc_html__('After title', 'g5plus-megatron') => 'right',
                ),
                'dependency' => array(
                    'element' => 'add_icon',
                    'value' => 'true',
                ),
                'heading' => esc_html__('Icon position', 'g5plus-megatron'),
                'description' => esc_html__('Select icon position.', 'g5plus-megatron'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon library', 'g5plus-megatron'),
                'value' => array(
                    esc_html__('Megatron Icon', 'g5plus-megatron') => 'megatron',
                    esc_html__('Font Awesome', 'g5plus-megatron') => 'fontawesome',
                    esc_html__('Open Iconic', 'g5plus-megatron') => 'openiconic',
                    esc_html__('Typicons', 'g5plus-megatron') => 'typicons',
                    esc_html__('Entypo', 'g5plus-megatron') => 'entypo',
                    esc_html__('Linecons', 'g5plus-megatron') => 'linecons',
                ),
                'admin_label' => true,
                'param_name' => 'i_type',
                'description' => esc_html__('Select icon library.', 'g5plus-megatron'),
                'dependency' => array(
                    'element' => 'add_icon',
                    'value' => 'true',
                ),
            ),

        ),
        $params_icon,
        array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'g5plus-megatron'),
                'param_name' => 'el_class',
                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'g5plus-megatron')
            )
        )
    );
    vc_map(array(
        'name' => esc_html__('Section', 'g5plus-megatron'),
        'base' => 'vc_tta_section',
        'icon' => 'icon-wpb-ui-tta-section',
        'allowed_container_element' => 'vc_row',
        'is_container' => true,
        'show_settings_on_create' => false,
        'as_child' => array(
            'only' => 'vc_tta_tour,vc_tta_tabs,vc_tta_accordion',
        ),
        'category' => esc_html__('Content', 'g5plus-megatron'),
        'description' => esc_html__('Section for Tabs, Tours, Accordions.', 'g5plus-megatron'),
        'params' => $params_section,
        'js_view' => 'VcBackendTtaSectionView',
        'custom_markup' => '
		<div class="vc_tta-panel-heading">
		    <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left"><a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">{{ section_title }}</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
		</div>
		<div class="vc_tta-panel-body">
			{{ editor_controls }}
			<div class="{{ container-class }}">
			{{ content }}
			</div>
		</div>',
        'default_content' => '',
    ));
    /**
     * Pie chart
     */
    $params_piechart = array_merge(
        array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Layout Style', 'g5plus-megatron'),
                'param_name' => 'layout_style',
                'admin_label' => true,
                'value' => array(esc_html__('Normal', 'g5plus-megatron') => 'pie_text', esc_html__('Pie Icon', 'g5plus-megatron') => 'pie_icon'),
                'description' => esc_html__('Select Layout Style.', 'g5plus-megatron'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Value', 'g5plus-megatron'),
                'param_name' => 'value',
                'description' => esc_html__('Enter value for graph (Note: choose range from 0 to 100).', 'g5plus-megatron'),
                'value' => '50',
                'admin_label' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Label value', 'g5plus-megatron'),
                'param_name' => 'label_value',
                'description' => esc_html__('Enter label for pie chart (Note: leaving empty will set value from "Value" field).', 'g5plus-megatron'),
                'value' => ''
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Units', 'g5plus-megatron'),
                'param_name' => 'units',
                'description' => esc_html__('Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'g5plus-megatron')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon library', 'g5plus-megatron'),
                'value' => array(
                    esc_html__('[None]', 'g5plus-megatron') => '',
                    esc_html__('Megatron Icon', 'g5plus-megatron') => 'megatron',
                    esc_html__('Font Awesome', 'g5plus-megatron') => 'fontawesome',
                    esc_html__('Open Iconic', 'g5plus-megatron') => 'openiconic',
                    esc_html__('Typicons', 'g5plus-megatron') => 'typicons',
                    esc_html__('Entypo', 'g5plus-megatron') => 'entypo',
                    esc_html__('Linecons', 'g5plus-megatron') => 'linecons',
                    esc_html__('Image', 'g5plus-megatron') => 'image',
                ),
                'admin_label' => true,
                'param_name' => 'i_type',
                'description' => esc_html__('Select icon library.', 'g5plus-megatron'),
                'dependency' => Array('element' => 'layout_style', 'value' => array('pie_icon')),
            ),
        ),
        $params_icon,
        array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Upload Image Icon:', 'g5plus-megatron'),
                'param_name' => 'i_icon_image',
                'value' => '',
                'description' => esc_html__('Upload the custom image icon.', 'g5plus-megatron'),
                'dependency' => Array('element' => 'i_type', 'value' => array('image')),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Text value / Icon color', 'g5plus-megatron'),
                'param_name' => 'value_color',
                'description' => esc_html__('Select value/icon color.', 'g5plus-megatron'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Bar color', 'g5plus-megatron'),
                'param_name' => 'bar_color',
                'value' => array(esc_html__('Primary color', 'g5plus-megatron') => 'primary-color') + array(esc_html__('Secondary color', 'g5plus-megatron') => 'secondary-color') + getVcShared('colors-dashed') + array(esc_html__('Custom', 'g5plus-megatron') => 'custom'),
                'description' => esc_html__('Select pie chart color.', 'g5plus-megatron'),
                'param_holder_class' => 'vc_colored-dropdown',
                'std' => 'secondary-color'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Custom color', 'g5plus-megatron'),
                'param_name' => 'bar_custom_color',
                'description' => esc_html__('Select custom bar color.', 'g5plus-megatron'),
                'dependency' => array(
                    'element' => 'bar_color',
                    'value' => array('custom')
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Bar value color', 'g5plus-megatron'),
                'param_name' => 'color',
                'value' => array(esc_html__('Primary color', 'g5plus-megatron') => 'primary-color') + array(esc_html__('Secondary color', 'g5plus-megatron') => 'secondary-color') + getVcShared('colors-dashed') + array(esc_html__('Custom', 'g5plus-megatron') => 'custom'),
                'description' => esc_html__('Select pie chart color.', 'g5plus-megatron'),
                'param_holder_class' => 'vc_colored-dropdown',
                'std' => 'primary-color'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Custom color', 'g5plus-megatron'),
                'param_name' => 'custom_color',
                'description' => esc_html__('Select custom bar value color.', 'g5plus-megatron'),
                'dependency' => array(
                    'element' => 'color',
                    'value' => array('custom')
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'g5plus-megatron'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'g5plus-megatron')
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'g5plus-megatron'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'g5plus-megatron')
            ),
        )
    );
    vc_map(array(
        'name' => esc_html__('Pie Chart', 'g5plus-megatron'),
        'base' => 'vc_pie',
        'class' => '',
        'icon' => 'icon-wpb-vc_pie',
        'category' => array(esc_html__('Content', 'g5plus-megatron'), esc_html__('Megatron Shortcodes', 'g5plus-megatron')),
        'description' => esc_html__('Animated pie chart', 'g5plus-megatron'),
        'params' => $params_piechart,
    ));

    $custom_colors = array(
        esc_html__('Informational', 'g5plus-megatron') => 'info',
        esc_html__('Warning', 'g5plus-megatron') => 'warning',
        esc_html__('Success', 'g5plus-megatron') => 'success',
        esc_html__('Error', 'g5plus-megatron') => "danger",
        esc_html__('Informational Classic', 'g5plus-megatron') => 'alert-info',
        esc_html__('Warning Classic', 'g5plus-megatron') => 'alert-warning',
        esc_html__('Success Classic', 'g5plus-megatron') => 'alert-success',
        esc_html__('Error Classic', 'g5plus-megatron') => "alert-danger",
        esc_html__('Megatron Informational', 'g5plus-megatron') => "m-info",
        esc_html__('Megatron Warning', 'g5plus-megatron') => "m-warning",
        esc_html__('Megatron Success', 'g5plus-megatron') => "m-success",
        esc_html__('Megatron Error', 'g5plus-megatron') => "m-danger",
        esc_html__('Megatron Notice', 'g5plus-megatron') => "m-notice",
    );
    vc_map( array(
        'name' => esc_html__( 'Message Box', 'g5plus-megatron' ),
        'base' => 'vc_message',
        'icon' => 'icon-wpb-information-white',
        'category' => array(esc_html__('Content', 'g5plus-megatron'), esc_html__('Megatron Shortcodes', 'g5plus-megatron')),
        'description' => esc_html__( 'Notification box', 'g5plus-megatron' ),
        'params' => array(
            array(
                'type' => 'params_preset',
                'heading' => esc_html__( 'Message Box Presets', 'g5plus-megatron' ),
                'param_name' => 'color',
                // due to backward compatibility, really it is message_box_type
                'value' => '',
                'options' => array(
                    array(
                        'label' => esc_html__( 'Custom', 'g5plus-megatron' ),
                        'value' => '',
                        'params' => array(),
                    ),
                    array(
                        'label' => esc_html__( 'Informational', 'g5plus-megatron' ),
                        'value' => 'info',
                        'params' => array(
                            'message_box_color' => 'info',
                            'icon_type' => 'fontawesome',
                            'icon_fontawesome' => 'fa fa-info-circle',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Warning', 'g5plus-megatron' ),
                        'value' => 'warning',
                        'params' => array(
                            'message_box_color' => 'warning',
                            'icon_type' => 'fontawesome',
                            'icon_fontawesome' => 'fa fa-exclamation-triangle',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Success', 'g5plus-megatron' ),
                        'value' => 'success',
                        'params' => array(
                            'message_box_color' => 'success',
                            'icon_type' => 'fontawesome',
                            'icon_fontawesome' => 'fa fa-check',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Error', 'g5plus-megatron' ),
                        'value' => 'danger',
                        'params' => array(
                            'message_box_color' => 'danger',
                            'icon_type' => 'fontawesome',
                            'icon_fontawesome' => 'fa fa-times',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Informational Classic', 'g5plus-megatron' ),
                        'value' => 'alert-info', // due to backward compatibility
                        'params' => array(
                            'message_box_color' => 'alert-info',
                            'icon_type' => 'pixelicons',
                            'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-info',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Warning Classic', 'g5plus-megatron' ),
                        'value' => 'alert-warning', // due to backward compatibility
                        'params' => array(
                            'message_box_color' => 'alert-warning',
                            'icon_type' => 'pixelicons',
                            'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-alert',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Success Classic', 'g5plus-megatron' ),
                        'value' => 'alert-success',
                        // due to backward compatibility
                        'params' => array(
                            'message_box_color' => 'alert-success',
                            'icon_type' => 'pixelicons',
                            'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-tick',
                        ),
                    ),
                    array(
                        'label' => esc_html__( 'Error Classic', 'g5plus-megatron' ),
                        'value' => 'alert-danger',  // due to backward compatibility
                        'params' => array(
                            'message_box_color' => 'alert-danger',
                            'icon_type' => 'pixelicons',
                            'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-explanation',
                        ),
                    ),
                ),
                'description' => esc_html__( 'Select predefined message box design or choose "Custom" for custom styling.', 'g5plus-megatron' ),
                'param_holder_class' => 'vc_message-type vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'g5plus-megatron' ),
                'param_name' => 'message_box_style',
                'value' => getVcShared( 'message_box_styles' ),
                'description' => esc_html__( 'Select message box design style.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Shape', 'g5plus-megatron' ),
                'param_name' => 'style',
                // due to backward compatibility message_box_shape
                'std' => 'rounded',
                'value' => array(
                    esc_html__( 'Square', 'g5plus-megatron' ) => 'square',
                    esc_html__( 'Rounded', 'g5plus-megatron' ) => 'rounded',
                    esc_html__( 'Round', 'g5plus-megatron' ) => 'round',
                ),
                'description' => esc_html__( 'Select message box shape.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Color', 'g5plus-megatron' ),
                'param_name' => 'message_box_color',
                'value' => $custom_colors + getVcShared( 'colors' ),
                'description' => esc_html__( 'Select message box color.', 'g5plus-megatron' ),
                'param_holder_class' => 'vc_message-type vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon library', 'g5plus-megatron'),
                'value' => array(
                    esc_html__('Megatron Icon', 'g5plus-megatron') => 'megatron',
                    esc_html__('Font Awesome', 'g5plus-megatron') => 'fontawesome',
                    esc_html__('Open Iconic', 'g5plus-megatron') => 'openiconic',
                    esc_html__('Typicons', 'g5plus-megatron') => 'typicons',
                    esc_html__('Entypo', 'g5plus-megatron') => 'entypo',
                    esc_html__('Linecons', 'g5plus-megatron') => 'linecons',
                    esc_html__('Pixel', 'g5plus-megatron') => 'pixelicons',
                ),
                'param_name' => 'icon_type',
                'description' => esc_html__('Select icon library.', 'g5plus-megatron'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', 'g5plus-megatron'),
                'param_name' => 'icon_megatron',
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    'type' => 'megatron',
                    'source' => $megatron_icons,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'megatron',
                ),
                'description' => esc_html__('Select icon from library.', 'g5plus-megatron'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-info-circle',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    'source' => $megatron_font_awesome,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => esc_html__( 'Select icon from library.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_openiconic',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                'description' => esc_html__( 'Select icon from library.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_typicons',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_entypo',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_linecons',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'g5plus-megatron' ),
                'param_name' => 'icon_pixelicons',
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'pixelicons',
                    'source' => $pixel_icons,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'pixelicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon Size', 'g5plus-megatron' ),
                'param_name' => 'icon_size', // due to backward compatibility message_box_shape
                'std' => 'small',
                'value' => array(
                    esc_html__( 'Small', 'g5plus-megatron' ) => 'icon_small',
                    esc_html__( 'Large', 'g5plus-megatron' ) => 'icon_large',
                ),
            ),
            array(
                'type' => 'textarea_html',
                'holder' => 'div',
                'class' => 'messagebox_text',
                'heading' => esc_html__( 'Message text', 'g5plus-megatron' ),
                'param_name' => 'content',
                'value' => esc_html__( '<p>I am message box. Click edit button to change this text.</p>', 'g5plus-megatron' ),
            ),
            $add_css_animation,
            $add_duration_animation,
            $add_delay_animation,
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'g5plus-megatron' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'g5plus-megatron' ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'g5plus-megatron' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'g5plus-megatron' ),
            ),
        ),
        'js_view' => 'VcMessageView_Backend',
    ) );
    vc_map(array(
        'name' => esc_html__('Progress Bar', 'g5plus-megatron'),
        'base' => 'vc_progress_bar',
        'icon' => 'icon-wpb-graph',
        'category' => array(esc_html__('Content', 'g5plus-megatron'), esc_html__('Megatron Shortcodes', 'g5plus-megatron')),
        'description' => esc_html__('Animated progress bar', 'g5plus-megatron'),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Layout Style', 'g5plus-megatron'),
                'param_name' => 'layout_style',
                'admin_label' => true,
                'value' => array(esc_html__('Text left', 'g5plus-megatron') => 'style1', esc_html__('Text inner bar', 'g5plus-megatron') => 'style2', esc_html__('Text move', 'g5plus-megatron') => 'style3'),
                'description' => esc_html__('Select Layout Style.', 'g5plus-megatron')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Widget title', 'g5plus-megatron'),
                'param_name' => 'title',
                'description' => esc_html__('Enter text used as widget title (Note: located above content element).', 'g5plus-megatron')
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Values', 'g5plus-megatron'),
                'param_name' => 'values',
                'description' => esc_html__('Enter values for graph - value, title and color.', 'g5plus-megatron'),
                'value' => urlencode(json_encode(array(
                    array(
                        'label' => esc_html__('Development', 'g5plus-megatron'),
                        'value' => '90',
                    ),
                    array(
                        'label' => esc_html__('Design', 'g5plus-megatron'),
                        'value' => '80',
                    ),
                    array(
                        'label' => esc_html__('Marketing', 'g5plus-megatron'),
                        'value' => '70',
                    ),
                ))),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Label', 'g5plus-megatron'),
                        'param_name' => 'label',
                        'description' => esc_html__('Enter text used as title of bar.', 'g5plus-megatron'),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Value', 'g5plus-megatron'),
                        'param_name' => 'value',
                        'description' => esc_html__('Enter value of bar.', 'g5plus-megatron'),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Color', 'g5plus-megatron'),
                        'param_name' => 'color',
                        'value' => array(
                                esc_html__('Default', 'g5plus-megatron') => ''
                            ) + array(
                                esc_html__('Primary color', 'g5plus-megatron') => 'primary-color',
                                esc_html__('Secondary color', 'g5plus-megatron') => 'secondary-color',
                                esc_html__('Classic Grey', 'g5plus-megatron') => 'bar_grey',
                                esc_html__('Classic Blue', 'g5plus-megatron') => 'bar_blue',
                                esc_html__('Classic Turquoise', 'g5plus-megatron') => 'bar_turquoise',
                                esc_html__('Classic Green', 'g5plus-megatron') => 'bar_green',
                                esc_html__('Classic Orange', 'g5plus-megatron') => 'bar_orange',
                                esc_html__('Classic Red', 'g5plus-megatron') => 'bar_red',
                                esc_html__('Classic Black', 'g5plus-megatron') => 'bar_black',
                            ) + getVcShared('colors-dashed') + array(
                                esc_html__('Custom Color', 'g5plus-megatron') => 'custom'
                            ),
                        'description' => esc_html__('Select single bar background color.', 'g5plus-megatron'),
                        'admin_label' => true,
                        'param_holder_class' => 'vc_colored-dropdown'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Custom color', 'g5plus-megatron'),
                        'param_name' => 'customcolor',
                        'description' => esc_html__('Select custom single bar value background color.', 'g5plus-megatron'),
                        'dependency' => array(
                            'element' => 'color',
                            'value' => array('custom')
                        ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Custom bar color', 'g5plus-megatron'),
                        'param_name' => 'custombarcolor',
                        'description' => esc_html__('Select custom single bar background color.', 'g5plus-megatron'),
                        'dependency' => array(
                            'element' => 'color',
                            'value' => array('custom')
                        ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Custom label text color', 'g5plus-megatron'),
                        'param_name' => 'customtxtcolor',
                        'description' => esc_html__('Select custom single bar label text color.', 'g5plus-megatron'),
                        'dependency' => array(
                            'element' => 'color',
                            'value' => array('custom')
                        ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Custom value text color', 'g5plus-megatron'),
                        'param_name' => 'customvaluetxtcolor',
                        'description' => esc_html__('Select custom single bar value text color.', 'g5plus-megatron'),
                        'dependency' => array(
                            'element' => 'color',
                            'value' => array('custom')
                        ),
                    ),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Units', 'g5plus-megatron'),
                'param_name' => 'units',
                'description' => esc_html__('Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'g5plus-megatron')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Color', 'g5plus-megatron'),
                'param_name' => 'bgcolor',
                'value' => array(
                        esc_html__('Primary color', 'g5plus-megatron') => 'primary-color',
                        esc_html__('Secondary color', 'g5plus-megatron') => 'secondary-color',
                        esc_html__('Classic Grey', 'g5plus-megatron') => 'bar_grey',
                        esc_html__('Classic Blue', 'g5plus-megatron') => 'bar_blue',
                        esc_html__('Classic Turquoise', 'g5plus-megatron') => 'bar_turquoise',
                        esc_html__('Classic Green', 'g5plus-megatron') => 'bar_green',
                        esc_html__('Classic Orange', 'g5plus-megatron') => 'bar_orange',
                        esc_html__('Classic Red', 'g5plus-megatron') => 'bar_red',
                        esc_html__('Classic Black', 'g5plus-megatron') => 'bar_black',
                    ) + getVcShared('colors-dashed') + array(
                        esc_html__('Custom Color', 'g5plus-megatron') => 'custom'
                    ),
                'std' => 'primary-color',
                'description' => esc_html__('Select bar background color.', 'g5plus-megatron'),
                'admin_label' => true,
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Bar value custom background color', 'g5plus-megatron'),
                'param_name' => 'custombgcolor',
                'description' => esc_html__('Select custom background color for bars value.', 'g5plus-megatron'),
                'dependency' => array('element' => 'bgcolor', 'value' => array('custom'))
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Bar custom background color', 'g5plus-megatron'),
                'param_name' => 'custombgbarcolor',
                'description' => esc_html__('Select custom background color for bars.', 'g5plus-megatron'),
                'dependency' => array('element' => 'bgcolor', 'value' => array('custom'))
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Bar custom label text color', 'g5plus-megatron'),
                'param_name' => 'customtxtcolor',
                'description' => esc_html__('Select custom label text color for bars.', 'g5plus-megatron'),
                'dependency' => array('element' => 'bgcolor', 'value' => array('custom'))
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Bar custom value text color', 'g5plus-megatron'),
                'param_name' => 'customvaluetxtcolor',
                'description' => esc_html__('Select custom value text color for bars.', 'g5plus-megatron'),
                'dependency' => array('element' => 'bgcolor', 'value' => array('custom'))
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Options', 'g5plus-megatron'),
                'param_name' => 'options',
                'value' => array(
                    esc_html__('Add stripes', 'g5plus-megatron') => 'striped',
                    esc_html__('Add animation (Note: visible only with striped bar).', 'g5plus-megatron') => 'animated'
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'g5plus-megatron'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'g5plus-megatron')
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'g5plus-megatron'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'g5plus-megatron')
            ),
        )
    ));
}

add_action('vc_after_init', 'g5plus_register_vc_map');