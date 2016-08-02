<?php

get_header();
$g5plus_options = &G5Plus_Global::get_options();
remove_action('g5plus_before_page','g5plus_page_heading',5);
do_action('g5plus_before_page');

?>

<div class="page404 ">
    <div class="container">
        <div class=" content-wrap">
            <h2 class="p-font"><?php echo wp_kses_post($g5plus_options['title_404']); ?></h2>
            <h4  class="description s-font"><?php echo wp_kses_post($g5plus_options['subtitle_404']); ?></h4>
            <div class="return">
                <?php
                $go_back_link = $g5plus_options['go_back_url_404'];
                if($go_back_link ==='')
                    $go_back_link = get_home_url();
                ?>
                <a class="m-button m-button-3d m-button-primary m-button-xs" href="<?php echo esc_url($go_back_link) ?>"><?php esc_html_e('BACK TO HOME PAGE','g5plus-megatron'); ?></a>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>


