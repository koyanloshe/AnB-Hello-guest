<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/25/2015
 * Time: 3:15 PM
 */
?>
<?php if (in_array('yith-woocommerce-compare/init.php', apply_filters('active_plugins', get_option('active_plugins')))): ?>
	<a data-toggle="tooltip" data-placement="top" title="<?php esc_html_e('Compare', 'g5plus-megatron'); ?>" href="<?php the_permalink(); ?>?action=yith-woocompare-add-product&amp;id=<?php the_ID(); ?>"
	   class="compare no-animation" data-product_id="<?php the_ID(); ?>"><i class="micon icon-185061-photo-pictures-streamline"></i> </a>
<?php endif; ?>
