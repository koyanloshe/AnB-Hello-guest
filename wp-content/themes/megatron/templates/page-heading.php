<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/2/2015
 * Time: 2:54 PM
 */
$g5plus_options = &G5Plus_Global::get_options();
$prefix = 'g5plus_';
$show_page_title =  rwmb_meta($prefix.'show_page_title');
if (($show_page_title == -1) || ($show_page_title === '')) {
    if (is_singular('post')) {
        $show_page_title = isset($g5plus_options['show_single_blog_title']) ? $g5plus_options['show_single_blog_title'] : 1;
    }elseif(is_singular('portfolio')){
        $show_page_title = isset($g5plus_options['show_portfolio_single_title']) ? $g5plus_options['show_portfolio_single_title'] : 1;
    } else {
        $show_page_title = isset($g5plus_options['show_page_title']) ? $g5plus_options['show_page_title'] : 1;
    }
}
if ($show_page_title == 0) return;

$page_title = rwmb_meta($prefix.'page_title_custom');
if ($page_title === '') {
    $page_title = get_the_title();
}


$enable_custom_page_subtitle = rwmb_meta($prefix.'enable_custom_page_subtitle');
if ($enable_custom_page_subtitle == 1) {
    $page_sub_title = rwmb_meta($prefix.'page_subtitle_custom');
} else {
    if (is_singular('post')) {
        $page_sub_title = isset($g5plus_options['single_blog_sub_title']) ? $g5plus_options['single_blog_sub_title'] : '';
    } elseif(is_singular('product')) {
        $page_sub_title = isset($g5plus_options['single_product_sub_title']) ? $g5plus_options['single_product_sub_title'] : '';
    }elseif(is_singular('portfolio')){
        $page_sub_title = isset($g5plus_options['portfolio_single_sub_title']) ? $g5plus_options['portfolio_single_sub_title'] : '';
    } else {
        $page_sub_title = isset($g5plus_options['page_sub_title']) ? $g5plus_options['page_sub_title'] : '';
    }
}


$custom_styles = array();
$page_title_wrap_class = array();
$page_title_inner_class = array();

if (is_singular('post')) {
    $page_title_wrap_class[] = 'single-blog-title-wrap';
    $page_title_inner_class[] = 'single-blog-title-inner';
} elseif(is_singular('product')) {
    $page_title_wrap_class[] = 'single-product-title-wrap';
    $page_title_inner_class[] = 'single-product-title-inner';
}elseif(is_singular('portfolio')){
    $page_title_wrap_class[] = 'single-portfolio-title-wrap';
    $page_title_inner_class[] = 'single-portfolio-title-inner';
} else {
    $page_title_wrap_class[] = 'page-title-wrap';
    $page_title_inner_class[] = 'page-title-inner';
}


// Page Title Text Align
$page_title_text_align = rwmb_meta($prefix . 'page_title_text_align');
if(!isset($page_title_text_align) || ($page_title_text_align == '') || ($page_title_text_align == '-1')) {
    if (is_singular('post')) {
        $page_title_text_align = isset($g5plus_options['single_blog_title_text_align']) ? $g5plus_options['single_blog_title_text_align'] : 'center';
    } elseif(is_singular('product')) {
        $page_title_text_align = isset($g5plus_options['single_product_title_text_align']) ? $g5plus_options['single_product_title_text_align'] : 'center';
    }elseif(is_singular('portfolio')){
        $page_title_text_align = isset($g5plus_options['portfolio_single_title_text_align']) ? $g5plus_options['portfolio_single_title_text_align'] : 'center';
    } else {
        $page_title_text_align = isset($g5plus_options['page_title_text_align']) ? $g5plus_options['page_title_text_align'] : 'center';
    }

}
$page_title_inner_class[] = 'text-' . $page_title_text_align;
$custom_inner_styles = array();

// Custom Page Title Padding
$page_title_padding_top = rwmb_meta($prefix.'page_title_padding_top');
if (($page_title_padding_top != '') && ($page_title_padding_top >= 0)) {
    $custom_inner_styles[] = 'padding-top:' . $page_title_padding_top . 'px';
}

$page_title_padding_bottom = rwmb_meta($prefix.'page_title_padding_bottom');
if (($page_title_padding_bottom != '') && ($page_title_padding_bottom >= 0)) {
    $custom_inner_styles[] = 'padding-bottom:' . $page_title_padding_bottom . 'px';
}

$custom_inner_style= '';
if ($custom_inner_styles) {
    $custom_inner_style = 'style="'. join(';',$custom_inner_styles).'"';
}

// Border Bottom
$border_bottom = rwmb_meta($prefix.'page_title_border_bottom');
if(!isset($border_bottom) || ($border_bottom == '') || ($border_bottom == '-1')) {
    if (is_singular('post')) {
        $border_bottom = isset($g5plus_options['single_blog_title_border_bottom']) ? $g5plus_options['single_blog_title_border_bottom'] : '0';
    } elseif(is_singular('product')) {
        $border_bottom = isset($g5plus_options['single_product_title_border_bottom']) ? $g5plus_options['single_product_title_border_bottom'] : '0';
    }elseif(is_singular('portfolio')){
        $border_bottom = isset($g5plus_options['portfolio_single_title_border_bottom']) ? $g5plus_options['portfolio_single_title_border_bottom'] : '0';
    } else {
        $border_bottom = isset($g5plus_options['page_title_border_bottom']) ? $g5plus_options['page_title_border_bottom'] : '0';
    }
}

if ($border_bottom == '1') {
    $page_title_wrap_class[] = 'page-title-border-bottom';
}

//Page Title Text Size
$page_title_text_size = rwmb_meta($prefix.'page_title_text_size');
if (!isset($page_title_text_size) || empty($page_title_text_size) || ($page_title_text_size == '-1')) {
    if (is_singular('post')) {
        $page_title_text_size = isset($g5plus_options['single_blog_title_text_size']) ? $g5plus_options['single_blog_title_text_size']: 'lg';
    } elseif(is_singular('product')) {
        $page_title_text_size = isset($g5plus_options['single_product_title_text_size']) ? $g5plus_options['single_product_title_text_size']: 'lg';
    }elseif(is_singular('portfolio')){
        $page_title_text_size = isset($g5plus_options['portfolio_single_title_text_size']) ? $g5plus_options['portfolio_single_title_text_size']: 'lg';
    } else {
        $page_title_text_size = isset($g5plus_options['page_title_text_size']) ? $g5plus_options['page_title_text_size']: 'lg';
    }


}
$page_title_wrap_class[] = 'page-title-size-'. $page_title_text_size;

// Custom Page Title Text Color
$page_title_text_color = rwmb_meta($prefix.'page_title_text_color','type=color');
if ($page_title_text_color != '') {
    $custom_styles[] = 'color:' . $page_title_text_color;
}

// Custom Page Title Background Color
$enable_custom_background_color = rwmb_meta($prefix.'enable_custom_background_color');
if ($enable_custom_background_color == 1) {
    $page_title_bg_color = rwmb_meta($prefix.'page_title_bg_color');
    $page_title_bg_color_opacity = rwmb_meta($prefix.'page_title_bg_color_opacity','type=slider') / 100;
    $page_title_bg_color_rgba = g5plus_hex2rgba($page_title_bg_color, $page_title_bg_color_opacity);
    if (!empty($page_title_bg_color_rgba)) {
        $custom_styles[] = 'background-color:' . $page_title_bg_color_rgba;
    }
}


// Custom Page Title Background Image
$page_title_bg_image_url = '';
$enable_custom_page_title_bg_image = rwmb_meta($prefix.'enable_custom_page_title_bg_image');
if ($enable_custom_page_title_bg_image == '1') {
    $page_title_bg_images = rwmb_meta($prefix.'page_title_bg_image','type=image&size=full');
    if ($page_title_bg_images) {
        $page_title_bg_image_id = g5plus_get_post_meta(get_the_ID(),$prefix.'page_title_bg_image',true);
        $page_title_bg_image = $page_title_bg_images[$page_title_bg_image_id];
    }
} else {
    if (is_singular('post')) {
        $page_title_bg_image = isset($g5plus_options['single_blog_title_bg_image']) ? $g5plus_options['single_blog_title_bg_image'] : '';
    } elseif(is_singular('product')) {
        $page_title_bg_image = isset($g5plus_options['single_product_title_bg_image']) ? $g5plus_options['single_product_title_bg_image'] : '';
    }elseif(is_singular('portfolio')){
        $page_title_bg_image = isset($g5plus_options['portfolio_single_title_bg_image']) ? $g5plus_options['portfolio_single_title_bg_image'] : '';
    } else {
        $page_title_bg_image = isset($g5plus_options['page_title_bg_image']) ?  $g5plus_options['page_title_bg_image'] : '';
    }

}
if (isset($page_title_bg_image) && isset($page_title_bg_image['url'])) {
    $page_title_bg_image_url = $page_title_bg_image['url'];
}



$custom_style= '';
if ($custom_styles) {
    $custom_style = 'style="'. join(';',$custom_styles).'"';
}



// Page Title Parallax
if (!empty($page_title_bg_image_url)) {
    $page_title_parallax = rwmb_meta($prefix.'page_title_parallax');
    if (!isset($page_title_parallax) || ($page_title_parallax == '') || ($page_title_parallax == '-1')) {
        if (is_singular('post')) {
            $page_title_parallax = isset($g5plus_options['single_blog_title_parallax']) ? $g5plus_options['single_blog_title_parallax'] : '0';
        } elseif(is_singular('product')) {
            $page_title_parallax = isset($g5plus_options['single_product_title_parallax']) ? $g5plus_options['single_product_title_parallax'] : '0';
        }elseif(is_singular('portfolio')){
            $page_title_parallax = isset($g5plus_options['portfolio_single_title_parallax']) ? $g5plus_options['portfolio_single_title_parallax'] : '0';
        } else {
            $page_title_parallax = isset($g5plus_options['page_title_parallax']) ? $g5plus_options['page_title_parallax'] : '0';
        }
    }

    if ($page_title_parallax == 1) {
        $page_title_parallax_position = rwmb_meta($prefix.'page_title_parallax_position');
        if (!isset($page_title_parallax_position) || ($page_title_parallax_position == '') || ($page_title_parallax_position == '-1')) {
            if (is_singular('post')) {
                $page_title_parallax_position = isset($g5plus_options['single_blog_title_parallax_position']) ? $g5plus_options['single_blog_title_parallax_position'] : 'center';
            } elseif(is_singular('product')) {
                $page_title_parallax_position = isset($g5plus_options['single_product_title_parallax_position']) ? $g5plus_options['single_product_title_parallax_position'] : 'center';
            }elseif(is_singular('portfolio')){
                $page_title_parallax_position = isset($g5plus_options['portfolio_single_title_parallax_position']) ? $g5plus_options['portfolio_single_title_parallax_position'] : 'center';
            } else {
                $page_title_parallax_position = isset($g5plus_options['page_title_parallax_position']) ? $g5plus_options['page_title_parallax_position'] : 'center';
            }
        }
    }

}


// Remove Margin Bottom
$page_title_remove_margin_bottom = rwmb_meta($prefix.'page_title_remove_margin_bottom');
if ($page_title_remove_margin_bottom != '1') {
    if (is_singular('post')) {
        $page_title_wrap_class[] = 'single-blog-title-margin';
    } elseif(is_singular('product')) {
        $page_title_wrap_class[] = 'single-product-title-margin';
    }elseif(is_singular('portfolio')){
        $page_title_wrap_class[] = 'single-portfolio-title-margin';
    } else {
        $page_title_wrap_class[] = 'page-title-margin';
    }

}

// Breadcrumbs
$breadcrumbs_class = array('breadcrumbs-wrap');

$breadcrumbs = rwmb_meta($prefix.'breadcrumbs');
if (!isset($breadcrumbs) || ($breadcrumbs == -1) || ($breadcrumbs === '')  ) {
    if (is_singular('post')) {
        $breadcrumbs = isset($g5plus_options['single_blog_breadcrumbs']) ? $g5plus_options['single_blog_breadcrumbs'] : '1';
    } elseif(is_singular('product')) {
        $breadcrumbs = isset($g5plus_options['single_product_breadcrumbs']) ? $g5plus_options['single_product_breadcrumbs'] : '1';
    }if(is_singular('portfolio')){
        $breadcrumbs = isset($g5plus_options['portfolio_single_breadcrumbs']) ? $g5plus_options['portfolio_single_breadcrumbs'] : '1';
    } else {
        $breadcrumbs = isset($g5plus_options['breadcrumbs']) ? $g5plus_options['breadcrumbs'] : '1';
    }

}

if ($breadcrumbs == '1') {
    $breadcrumbs_style = rwmb_meta($prefix.'breadcrumbs_style');
    if (!isset($breadcrumbs_style) || ($breadcrumbs_style == -1) || ($breadcrumbs_style === '')  ) {
        if (is_singular('post')) {
            $breadcrumbs_style = isset($g5plus_options['single_blog_breadcrumbs_style']) ? $g5plus_options['single_blog_breadcrumbs_style'] : 'float';
        } elseif(is_singular('product')){
            $breadcrumbs_style = isset($g5plus_options['single_product_breadcrumbs_style']) ? $g5plus_options['single_product_breadcrumbs_style'] : 'float';
        }elseif(is_singular('portfolio')){
            $breadcrumbs_style = isset($g5plus_options['portfolio_single_breadcrumbs_style']) ? $g5plus_options['portfolio_single_breadcrumbs_style'] : 'float';
        } else {
            $breadcrumbs_style = isset($g5plus_options['breadcrumbs_style']) ? $g5plus_options['breadcrumbs_style'] : 'float';
        }

    }
    $page_title_wrap_class[] = 'page-title-breadcrumbs-'.$breadcrumbs_style;
    $breadcrumbs_class[] = $breadcrumbs_style;

    if ($breadcrumbs_style == 'float') {
        $breadcrumbs_align = rwmb_meta($prefix.'breadcrumbs_align');
        if (!isset($breadcrumbs_align) || ($breadcrumbs_align == -1) || ($breadcrumbs_align === '')  ) {
            if (is_singular('post')) {
                $breadcrumbs_align = isset($g5plus_options['single_blog_breadcrumbs_align']) ? $g5plus_options['single_blog_breadcrumbs_align'] : 'left' ;
            } elseif(is_singular('product')) {
                $breadcrumbs_align = isset($g5plus_options['single_product_breadcrumbs_align']) ? $g5plus_options['single_product_breadcrumbs_align'] : 'left' ;
            }elseif(is_singular('portfolio')){
                $breadcrumbs_align = isset($g5plus_options['portfolio_single_breadcrumbs_align']) ? $g5plus_options['portfolio_single_breadcrumbs_align'] : 'left' ;
            } else {
                $breadcrumbs_align = isset($g5plus_options['breadcrumbs_align']) ? $g5plus_options['breadcrumbs_align'] : 'left' ;
            }

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
        <div class="<?php echo join(' ',$page_title_inner_class); ?>" <?php echo wp_kses_post($custom_inner_style); ?>>
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


