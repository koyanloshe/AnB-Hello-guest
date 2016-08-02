<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/29/2015
 * Time: 5:06 PM
 */
global $post;
$class = array();
$class[]= "clearfix";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<div class="search-icon"><span class="icon-menu"></span></div>
	<div class="entry-content-wrap">
		<h3 class="entry-post-title p-font">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h3>
		<span class="entry-post-type s-font">

			<?php
				$post_type = '';
				switch ($post->post_type) {
					case 'post':
						$post_type = esc_html__('Blog post','g5plus-megatron');
						break;
					case 'page':
						$post_type = esc_html__('Pages','g5plus-megatron');
						break;
					case 'product':
						$post_type = esc_html__('Product','g5plus-megatron');
						break;
					default:
						$post_type = $post->post_type;
						break;
				}
			echo sprintf('%s',$post_type);
			?>
		</span>
		<?php if (in_array($post->post_type, array('post','product'))) : ?>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	</div>
</article>