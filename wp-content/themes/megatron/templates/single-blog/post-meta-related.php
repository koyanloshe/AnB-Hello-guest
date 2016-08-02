<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/9/2015
 * Time: 4:12 PM
 */
?>
<ul class="entry-meta s-font">
    <li class="entry-meta-date">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"> <?php echo  get_the_date("M j, Y");?> </a>
    </li>
    <li class="entry-meta-author">
        <?php printf('<a href="%1$s">%2$s</a>',esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),esc_html( get_the_author() )); ?>
    </li>
    <?php if (has_category()): ?>
        <?php
        $cat_name = '';
        $terms = get_the_category(get_the_ID());
        if ($terms) {
            $cat_link = get_term_link( $terms[0], 'category' );
            $cat_name = $terms[0]->name;
        }
        ?>
        <?php if (!empty($cat_name)) : ?>
            <li class="entry-meta-category">
                <a href="<?php echo esc_url($cat_link) ?>" ><?php echo esc_html($cat_name);?></a>
            </li>
        <?php endif; ?>
    <?php endif; ?>
    <?php edit_post_link( esc_html__( 'Edit', 'g5plus-megatron' ), '<li class="edit-link">', '</li>' ); ?>
</ul>