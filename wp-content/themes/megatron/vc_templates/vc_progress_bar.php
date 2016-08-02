<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $layout_style
 * @var $title
 * @var $values
 * @var $units
 * @var $bgcolor
 * @var $custombgcolor
 * @var $custombgbarcolor
 * @var $customtxtcolor
 * @var $customvaluetxtcolor
 * @var $options
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Progress_Bar
 */
$output = $layout_style = $title = $values = $units = $bgcolor = $custombgcolor=$custombgbarcolor = $customtxtcolor =$customvaluetxtcolor= $options = $el_class = $css = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
$atts = $this->convertAttributesToNewProgressBar($atts);

extract($atts);
$g5plus_options = &G5Plus_Global::get_options();
$min_suffix_css = (isset($g5plus_options['enable_minifile_css']) && $g5plus_options['enable_minifile_css'] == 1) ? '.min' : '';
wp_enqueue_style('megatron_vc_progress_bar_css', G5PLUS_THEME_URL . 'assets/vc-extend/css/vc_progress_bar' . $min_suffix_css . '.css', array(), false);
wp_enqueue_script('waypoints');

$el_class = $this->getExtraClass( $el_class );

$bar_options = array();
$options = explode( ',', $options );
if ( in_array( 'animated', $options ) ) {
    $bar_options[] = 'animated';
}
if ( in_array( 'striped', $options ) ) {
    $bar_options[] = 'striped';
}

if ( 'custom' === $bgcolor && '' !== $custombgcolor ) {
    $custombgcolor = ' style="' . vc_get_css_color( 'background-color', $custombgcolor ) . '"';
    if ( '' !== $customtxtcolor ) {
        $customtxtcolor = ' style="' . vc_get_css_color( 'color', $customtxtcolor ) . '"';
    }
    if ( '' !== $customvaluetxtcolor ) {
        $customvaluetxtcolor = ' style="' . vc_get_css_color( 'color', $customvaluetxtcolor ) . '"';
    }
    if ('' !== $custombgbarcolor) {
        $custombgbarcolor = ' style="' . vc_get_css_color('background-color', $custombgbarcolor) . '"';
    }
    $bgcolor = '';
} else {
    $custombgcolor = '';
    $custombgbarcolor = '';
    $customtxtcolor = '';
    $customvaluetxtcolor='';
    $bgcolor = 'vc_progress-bar-color-' . esc_attr( $bgcolor );
    $el_class .= ' ' . $bgcolor;
}

$class_to_filter = 'vc_progress_bar wpb_content_element';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$output = '<div class="h-progress-bar ' . esc_attr($layout_style) . ' ' . esc_attr($css_class) . '">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_progress_bar_heading' ) );
$values = (array) vc_param_group_parse_atts( $values );
$max_value = 0.0;
$graph_lines_data = array();
foreach ( $values as $data ) {
    $new_line = $data;
    $new_line['value'] = isset( $data['value'] ) ? $data['value'] : 0;
    $new_line['label'] = isset( $data['label'] ) ? $data['label'] : '';
    $new_line['bgcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $custombgcolor;
    $new_line['bgbarcolor'] = isset($data['color']) && 'custom' !== $data['color'] ? '' : $custombgbarcolor;
    $new_line['txtcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $customtxtcolor;
    $new_line['valuetxtcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $customvaluetxtcolor;
    if ( isset( $data['customcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
        $new_line['bgcolor'] = ' style="background-color: ' . esc_attr( $data['customcolor'] ) . ';"';
    }
    if (isset($data['custombarcolor']) && (!isset($data['color']) || 'custom' === $data['color'])) {
        $new_line['bgbarcolor'] = ' style="background-color: ' . esc_attr($data['custombarcolor']) . ';"';
    }
    if ( isset( $data['customtxtcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
        $new_line['txtcolor'] = ' style="color: ' . esc_attr( $data['customtxtcolor'] ) . ';"';
    }
    if ( isset( $data['customvaluetxtcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
        $new_line['valuetxtcolor'] = ' style="color: ' . esc_attr( $data['customvaluetxtcolor'] ) . ';"';
    }
    if ( $max_value < (float) $new_line['value'] ) {
        $max_value = $new_line['value'];
    }
    $graph_lines_data[] = $new_line;
}

foreach ($graph_lines_data as $line) {
    $unit = ('' !== $units) ? ' <span class="vc_label_units"'.(( isset($line['valuetxtcolor'])) ? $line['valuetxtcolor'] : '').'>' . $line['value'] . $units . '</span>' : '';
    $output .= '<div class="vc_general vc_single_bar' . ( ( isset( $line['color'] ) && 'custom' !== $line['color'] ) ?
            ' vc_progress-bar-color-' . $line['color'] : '' )
        . '"'.(( isset($line['bgbarcolor'])) ? $line['bgbarcolor'] : '').'>';

    if ($layout_style == 'style1') {
        $output .= '<small class="vc_label"' . $line['txtcolor'] . '><span class="progress-bar-title">' . $line['label'] . $unit . '</span></small>';
    } elseif ($layout_style == 'style2') {
        $output .= '<small class="vc_label"' . $line['txtcolor'] . '><span class="progress-bar-title">' . $line['label'] . '</span>' . $unit . '</small>';
    } else {
        $output .= '<small class="vc_label"' . $line['txtcolor'] . '><span class="progress-bar-title">' . $line['label'] . '</span></small>';
    }

    if ($max_value > 100.00) {
        $percentage_value = (float)$line['value'] > 0 && $max_value > 100.00 ? round((float)$line['value'] / $max_value * 100, 4) : 0;
    } else {
        $percentage_value = $line['value'];
    }
    $output .= '<span class="vc_bar ' . esc_attr(implode(' ', $bar_options)) . '" data-percentage-value="' . esc_attr($percentage_value) . '" data-value="' . esc_attr($line['value']) . '"' . $line['bgcolor'] . '>';
    if ($layout_style == 'style3') {
        $output .= $unit;
    }
    $output .= '</span></div>';
}
$output .= '</div>';
echo !empty($output) ? $output : '';