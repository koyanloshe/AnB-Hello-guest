<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/3/2015
 * Time: 9:16 AM
 */
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$portfolio_post_type = 'portfolio';
$post_types =  get_post_type();
$cat = get_queried_object();
$show_page_title = isset($g5plus_options['show_archive_title']) ? $g5plus_options['show_archive_title'] : '1';
if ($show_page_title == 0) return;

$on_front = get_option('show_on_front');
$page_sub_title = strip_tags(term_description());
if (empty($page_sub_title)) {
    $page_sub_title = isset($g5plus_options['archive_sub_title']) ? $g5plus_options['archive_sub_title'] : '';
}
$page_title = '';
if (!have_posts()) {
    $page_title = esc_html__("Nothing Found", 'g5plus-megatron');
} elseif (is_home()) {
    if (($on_front == 'page' && (get_queried_object_id() == get_post(get_option('page_for_posts'))->ID)) || ($on_front == 'posts')) {
        $page_title = esc_html__("Blog", 'g5plus-megatron');
    } else {
        $page_title = '';
    }
} elseif (is_category()) {
    $page_title = single_cat_title('', false);
} elseif (is_tag()) {
    $page_title = single_tag_title(esc_html__("Tags: ", 'g5plus-megatron'), false);
} elseif (is_author()) {
    $page_title = sprintf(esc_html__('Author: %s', 'g5plus-megatron'), get_the_author());
} elseif (is_day()) {
    $page_title = sprintf(esc_html__('Daily Archives: %s', 'g5plus-megatron'), get_the_date());
} elseif (is_month()) {
    $page_title = sprintf(esc_html__('Monthly Archives: %s', 'g5plus-megatron'), get_the_date(_x('F Y', 'monthly archives date format', 'g5plus-megatron')));
} elseif (is_year()) {
    $page_title = sprintf(esc_html__('Yearly Archives: %s', 'g5plus-megatron'), get_the_date(_x('Y', 'yearly archives date format', 'g5plus-megatron')));
} elseif (is_search()) {
    $page_title = esc_html__('Search Result','g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-aside')) {
    $page_title = esc_html__('Asides', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-gallery')) {
    $page_title = esc_html__('Galleries', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-image')) {
    $page_title = esc_html__('Images', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-video')) {
    $page_title = esc_html__('Videos', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-quote')) {
    $page_title = esc_html__('Quotes', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-link')) {
    $page_title = esc_html__('Links', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-status')) {
    $page_title = esc_html__('Statuses', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-audio')) {
    $page_title = esc_html__('Audios', 'g5plus-megatron');
} elseif (is_tax('post_format', 'post-format-chat')) {
    $page_title = esc_html__('Chats', 'g5plus-megatron');
}elseif(isset($post_types) && $post_types== $portfolio_post_type){
    if(isset($cat) && property_exists($cat,'labels')){
        $page_title =  isset($g5plus_options['portfolio_archive_title']) ? $g5plus_options['portfolio_archive_title'] : '';
        if($page_title==''){
            $page_title = $cat->labels->name;
            if(array_key_exists('p-cat',$_REQUEST)){
                $portfolio_cat  = get_term_by('slug',$_REQUEST['p-cat'],'portfolio-category');
                if(isset($portfolio_cat) && property_exists($portfolio_cat,'name')){
                    $page_title = $portfolio_cat->name;
                }
            }
        }
        $page_sub_title = isset($g5plus_options['portfolio_archive_sub_title']) ? $g5plus_options['portfolio_archive_sub_title'] : '';
    }
} else {
    $page_title = esc_html__("Archives", 'g5plus-megatron');
}

$custom_styles = array();
if(isset($post_types) && $post_types== $portfolio_post_type){
    $page_title_wrap_class = array('archive-portfolio-title-wrap');
    $page_title_inner_class = array('archive-portfolio-title-inner');
}else{
    $page_title_wrap_class = array('archive-title-wrap');
    $page_title_inner_class = array('archive-title-inner');
}


// Page Title Text Align
$page_title_text_align = isset($g5plus_options['archive_title_text_align']) ? $g5plus_options['archive_title_text_align'] : 'center';
if(isset($post_types) && $post_types== $portfolio_post_type){
    $page_title_text_align = isset($g5plus_options['portfolio_archive_title_text_align']) ? $g5plus_options['portfolio_archive_title_text_align'] : '';
}
$page_title_inner_class[] = 'text-' . $page_title_text_align;

// Border Bottom
$border_bottom = isset($g5plus_options['archive_title_border_bottom']) ? $g5plus_options['archive_title_border_bottom'] : '0';
if(isset($post_types) && $post_types== $portfolio_post_type){
    $border_bottom = isset($g5plus_options['portfolio_page_title_border_bottom']) ? $g5plus_options['portfolio_page_title_border_bottom'] : '0';
}
if ($border_bottom == '1') {
    $page_title_wrap_class[] = 'page-title-border-bottom';
}

//Page Title Text Size
$page_title_text_size = isset($g5plus_options['archive_title_text_size']) ? $g5plus_options['archive_title_text_size']: 'lg';
if(isset($post_types) && $post_types== $portfolio_post_type){
    $page_title_text_size = isset($g5plus_options['portfolio_archive_title_text_size']) ? $g5plus_options['portfolio_archive_title_text_size'] : 'lg';
}
$page_title_wrap_class[] = 'page-title-size-'. $page_title_text_size;

// Custom Page Title Background Image
$page_title_bg_image_url = '';
$page_title_bg_image = '';
if ($cat && property_exists( $cat, 'term_id' )) {
    $page_title_bg_image = get_tax_meta($cat,$prefix.'page_title_background');
}
if(isset($post_types) && $post_types== $portfolio_post_type){
    $page_title_bg_image = isset($g5plus_options['portfolio_archive_title_bg_image']) ? $g5plus_options['portfolio_archive_title_bg_image'] : '';
}

if(!$page_title_bg_image || ($page_title_bg_image === '')) {
    $page_title_bg_image = $g5plus_options['archive_title_bg_image'];
}

if (isset($page_title_bg_image) && isset($page_title_bg_image['url'])) {
    $page_title_bg_image_url = $page_title_bg_image['url'];
}

if(isset($post_types) && $post_types== $portfolio_post_type){
    $page_title_wrap_class[] = 'archive-portfolio-title-margin';
}else{
    $page_title_wrap_class[] = 'archive-title-margin';
}


$custom_style= '';
if ($custom_styles) {
    $custom_style = 'style="'. join(';',$custom_styles).'"';
}

// Page Title Parallax
if (!empty($page_title_bg_image_url)) {
    if(isset($post_types) && $post_types== $portfolio_post_type){
        $page_title_parallax = isset($g5plus_options['portfolio_archive_title_parallax']) ? $g5plus_options['portfolio_archive_title_parallax']: '';
    } else {
        $page_title_parallax = isset($g5plus_options['archive_title_parallax']) ? $g5plus_options['archive_title_parallax'] : '0';
    }

    if ($page_title_parallax == 1) {
        if(isset($post_types) && $post_types== $portfolio_post_type){
            $page_title_parallax_position = isset($g5plus_options['portfolio_archive_title_parallax_position']) ? $g5plus_options['portfolio_archive_title_parallax_position'] : 'center';
        }else{
            $page_title_parallax_position = isset($g5plus_options['archive_title_parallax_position']) ? $g5plus_options['archive_title_parallax_position'] : 'center';
        }
    }
}




// Breadcrumbs
$breadcrumbs_class = array('breadcrumbs-wrap');
$breadcrumbs = isset($g5plus_options['archive_breadcrumbs']) ? $g5plus_options['archive_breadcrumbs'] : '1';
if(isset($post_types) && $post_types== $portfolio_post_type){
    $breadcrumbs = isset($g5plus_options['breadcrumbs_in_portfolio_archive']) ? $g5plus_options['breadcrumbs_in_portfolio_archive']: '';
}


if ($breadcrumbs == '1') {
    $breadcrumbs_style = isset($g5plus_options['archive_breadcrumbs_style']) ? $g5plus_options['archive_breadcrumbs_style'] : 'float';
    if(isset($post_types) && $post_types== $portfolio_post_type){
        $breadcrumbs_style = isset($g5plus_options['portfolio_archive_breadcrumbs_style']) ? $g5plus_options['portfolio_archive_breadcrumbs_style'] : 'float';
    }
    $page_title_wrap_class[] = 'page-title-breadcrumbs-'.$breadcrumbs_style;
    $breadcrumbs_class[]  = $breadcrumbs_style;

    if ($breadcrumbs_style == 'float') {
        $breadcrumbs_align = isset($g5plus_options['archive_breadcrumbs_align']) ? $g5plus_options['archive_breadcrumbs_align'] : 'left' ;
        if(isset($post_types) && $post_types== $portfolio_post_type){
            $breadcrumbs_align = isset($g5plus_options['portfolio_archive_breadcrumbs_align']) ? $g5plus_options['portfolio_archive_breadcrumbs_align'] : 'float';
        }
        $breadcrumbs_class[] = 'text-'. $breadcrumbs_align;
    }
}
?>
<section id="page-title" class="<?php echo join(' ', $page_title_wrap_class); ?>" <?php echo wp_kses_post($custom_style); ?>>
    <?php if (!empty($page_title_bg_image_url)) :?>
        <?php if ($page_title_parallax == 1) : ?>
            <div data-stellar-background-image="<?php echo esc_url($page_title_bg_image_url); ?>" data-stellar-background-position="<?php echo esc_attr($page_title_parallax_position); ?>" data-stellar-background-ratio="0.5" class="page-title-parallax" style="background-image: url('<?php echo esc_url($page_title_bg_image_url); ?>');background-position:center <?php echo esc_attr($page_title_parallax_position); ?>;"></div>
        <?php else: ?>
            <div class="page-title-wrap-bg" style="background-image: url('<?php echo esc_attr($page_title_bg_image_url); ?>');"></div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="container">
        <div class="<?php echo join(' ',$page_title_inner_class); ?>">
            <h1 class="p-font"><?php echo esc_html($page_title); ?></h1>
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

