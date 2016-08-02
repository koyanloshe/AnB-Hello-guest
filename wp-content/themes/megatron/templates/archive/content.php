<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 */
$g5plus_archive_loop = &G5Plus_Global::get_archive_loop();

$size = 'full';
if (isset($g5plus_archive_loop['image-size'])) {
    $size = $g5plus_archive_loop['image-size'];
}

$archive_style = 'large-image';
if (isset($g5plus_archive_loop['style']) && !empty($g5plus_archive_loop['style'])) {
    $archive_style  = $g5plus_archive_loop['style'];
}

$class = array();
$class[]= "clearfix";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
    <?php if ($archive_style == 'timeline') : ?>
        <div class="entry-timeline">
            <span class="timeline-note"></span>
            <span class="timeline-date p-font"><?php echo  get_the_date('F j, Y');?></span>
        </div>
    <?php endif; ?>
    <?php
    $thumbnail = g5plus_post_thumbnail($size);
    if (!empty($thumbnail)) : ?>
        <div class="entry-thumbnail-wrap">
            <?php echo wp_kses_post($thumbnail); ?>
        </div>
    <?php endif; ?>
    <div class="entry-content-wrap">
        <h3 class="entry-post-title p-font">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="entry-post-meta-wrap">
            <?php g5plus_post_meta(); ?>
        </div>
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="entry-content-footer social-share-hover">
            <a class="m-button m-button-3d m-button-primary m-button-xs" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php esc_html_e('Read More','g5plus-megatron') ?></a>
            <?php g5plus_share(); ?>
        </div>
    </div>
</article>


