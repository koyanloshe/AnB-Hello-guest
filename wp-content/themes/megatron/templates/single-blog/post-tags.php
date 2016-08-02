<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/6/2015
 * Time: 4:28 PM
 */
?>
<div class="entry-meta-tag-wrap social-share-hover">
<?php  the_tags('<div class="entry-meta-tag tagcloud"><label>'.esc_html__('Tags','g5plus-megatron') .' :</label>', '', '</div>');?>
<?php g5plus_share(); ?>
</div>
