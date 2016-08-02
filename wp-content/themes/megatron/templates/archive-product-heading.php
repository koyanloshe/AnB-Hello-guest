<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/8/2015
 * Time: 2:44 PM
 */
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$show_page_title = isset($g5plus_options['show_archive_product_title']) ? $g5plus_options['show_archive_product_title'] : '1';
if ($show_page_title == 0) return;

$page_sub_title = strip_tags(term_description());
if (empty($page_sub_title)) {
    $page_sub_title = isset($g5plus_options['archive_product_sub_title']) ? $g5plus_options['archive_product_sub_title'] : '';
}

$custom_styles = array();
$page_title_wrap_class = array('archive-product-title-wrap');
$page_title_inner_class = array('archive-product-title-inner');

// Page Title Text Align
$page_title_text_align = isset($g5plus_options['archive_product_title_text_align']) ? $g5plus_options['archive_product_title_text_align'] : 'center';
$page_title_inner_class[] = 'text-' . $page_title_text_align;

// Border Bottom
$border_bottom = isset($g5plus_options['archive_product_title_border_bottom']) ? $g5plus_options['archive_product_title_border_bottom'] : '0';
if ($border_bottom == '1') {
    $page_title_wrap_class[] = 'page-title-border-bottom';
}

//Page Title Text Size
$page_title_text_size = isset($g5plus_options['archive_product_title_text_size']) ? $g5plus_options['archive_product_title_text_size']: 'lg';
$page_title_wrap_class[] = 'page-title-size-'. $page_title_text_size;

// Custom Page Title Background Image
$page_title_bg_image_url = '';
$page_title_bg_image = '';
$cat = get_queried_object();
if ($cat && property_exists( $cat, 'term_id' )) {
    $page_title_bg_image = get_tax_meta($cat,$prefix.'page_title_background');
}

if(!$page_title_bg_image || ($page_title_bg_image === '')) {
    $page_title_bg_image = $g5plus_options['archive_product_title_bg_image'];
}

if (isset($page_title_bg_image) && isset($page_title_bg_image['url'])) {
    $page_title_bg_image_url = $page_title_bg_image['url'];
}

$page_title_wrap_class[] = 'archive-product-title-margin';

$custom_style= '';
if ($custom_styles) {
    $custom_style = 'style="'. join(';',$custom_styles).'"';
}

// Page Title Parallax
if (!empty($page_title_bg_image_url)) {
    $page_title_parallax = isset($g5plus_options['archive_product_title_parallax']) ? $g5plus_options['archive_product_title_parallax'] : '0';
    if ($page_title_parallax == 1) {
        $page_title_parallax_position = isset($g5plus_options['archive_product_title_parallax_position']) ? $g5plus_options['archive_product_title_parallax_position'] : 'top';
    }
}



// Breadcrumbs
$breadcrumbs_class = array('breadcrumbs-wrap');
$breadcrumbs = isset($g5plus_options['archive_product_breadcrumbs']) ? $g5plus_options['archive_product_breadcrumbs'] : '1';

if ($breadcrumbs == '1') {
    $breadcrumbs_style = isset($g5plus_options['archive_product_breadcrumbs_style']) ? $g5plus_options['archive_product_breadcrumbs_style'] : 'float';
    $page_title_wrap_class[] = 'page-title-breadcrumbs-'.$breadcrumbs_style;
    $breadcrumbs_class[]  = $breadcrumbs_style;

    if ($breadcrumbs_style == 'float') {
        $breadcrumbs_align = isset($g5plus_options['archive_product_breadcrumbs_align']) ? $g5plus_options['archive_product_breadcrumbs_align'] : 'left' ;
        $breadcrumbs_class[] = 'text-'. $breadcrumbs_align;
    }
}
?>
<section id="page-title" class="<?php echo join(' ', $page_title_wrap_class); ?>" <?php echo wp_kses_post($custom_style); ?>>
    <?php if (!empty($page_title_bg_image_url)) :?>
        <?php if ($page_title_parallax == 1) : ?>
            <div data-stellar-background-image="<?php echo esc_url($page_title_bg_image_url); ?>"   data-stellar-background-position="<?php echo esc_attr($page_title_parallax_position); ?>" data-stellar-background-ratio="0.5" class="page-title-parallax" style="background-image: url('<?php echo esc_url($page_title_bg_image_url); ?>');background-position:center <?php echo esc_attr($page_title_parallax_position); ?>;"></div>
        <?php else: ?>
            <div class="page-title-wrap-bg" style="background-image: url('<?php echo esc_attr($page_title_bg_image_url); ?>');"></div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="container">
        <div class="<?php echo join(' ',$page_title_inner_class); ?>">
            <h1 class="p-font"><?php woocommerce_page_title(); ?></h1>
            <?php if ($page_sub_title != '') : ?>
                <p class="s-font"><?php echo esc_html($page_sub_title) ?></p>
            <?php endif; ?>
            <?php if (($breadcrumbs == '1') && ($breadcrumbs_style == 'normal')) : ?>
                <div class="<?php echo join(' ',$breadcrumbs_class); ?>">
                    <div class="breadcrumbs-inner text-left">
                        <label class="p-font"><?php esc_html_e('You are here:','g5plus-megatron') ?></label>
                        <?php g5plus_the_breadcrumb(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (($breadcrumbs == '1') && ($breadcrumbs_style == 'float')) : ?>
            <div class="<?php echo join(' ',$breadcrumbs_class); ?>">
                <div class="breadcrumbs-inner text-left">
                    <label class="p-font"><?php esc_html_e('You are here:','g5plus-megatron') ?></label>
                    <?php g5plus_the_breadcrumb(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


