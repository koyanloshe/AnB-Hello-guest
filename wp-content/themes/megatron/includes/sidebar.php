<?php
if (!function_exists('g5plus_register_sidebar')) {
    function g5plus_register_sidebar() {
        register_sidebar( array(
            'name'          => esc_html__("Sidebar 1",'g5plus-megatron'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__("Widget Area 1",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__("Sidebar 2",'g5plus-megatron'),
            'id'            => 'sidebar-2',
            'description'   => esc_html__("Widget Area 2",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Top Drawer",'g5plus-megatron'),
            'id'            => 'top_drawer_sidebar',
            'description'   => esc_html__("Top Drawer",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ));
	    register_sidebar( array(
		    'name'          => esc_html__("Top Bar Left",'g5plus-megatron'),
		    'id'            => 'top_bar_left',
		    'description'   => esc_html__("Top Bar Left",'g5plus-megatron'),
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget'  => '</aside>',
		    'before_title'  => '<h4 class="widget-title"><span>',
		    'after_title'   => '</span></h4>',
	    ) );

	    register_sidebar( array(
		    'name'          => esc_html__("Top Bar Right",'g5plus-megatron'),
		    'id'            => 'top_bar_right',
		    'description'   => esc_html__("Top Bar Right",'g5plus-megatron'),
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget'  => '</aside>',
		    'before_title'  => '<h4 class="widget-title"><span>',
		    'after_title'   => '</span></h4>',
	    ) );

        register_sidebar( array(
            'name'          => esc_html__("Footer Above Left",'g5plus-megatron'),
            'id'            => 'footer_above_left',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Footer Above Right",'g5plus-megatron'),
            'id'            => 'footer_above_right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Footer 1",'g5plus-megatron'),
            'id'            => 'footer-1',
            'description'   => esc_html__("Footer 1",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Footer 2",'g5plus-megatron'),
            'id'            => 'footer-2',
            'description'   => esc_html__("Footer 2",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Footer 3",'g5plus-megatron'),
            'id'            => 'footer-3',
            'description'   => esc_html__("Footer 3",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Footer 4",'g5plus-megatron'),
            'id'            => 'footer-4',
            'description'   => esc_html__("Footer 4",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Bottom Bar Left",'g5plus-megatron'),
            'id'            => 'bottom_bar_left',
            'description'   => esc_html__("Bottom Bar Left",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__("Bottom Bar Right",'g5plus-megatron'),
            'id'            => 'bottom_bar_right',
            'description'   => esc_html__("Bottom Bar Right",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );


        register_sidebar( array(
            'name'          => esc_html__("Woocommerce",'g5plus-megatron'),
            'id'            => 'woocommerce',
            'description'   => esc_html__("Woocommerce",'g5plus-megatron'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );

	    register_sidebar( array(
		    'name'          => esc_html__("Canvas Menu",'g5plus-megatron'),
		    'id'            => 'canvas-menu',
		    'description'   => esc_html__("Canvas Menu Widget Area",'g5plus-megatron'),
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget'  => '</aside>',
		    'before_title'  => '<h4 class="widget-title"><span>',
		    'after_title'   => '</span></h4>',
	    ) );

        $theme_mods = get_theme_mods();
        if(is_array($theme_mods) && array_key_exists('redux-widget-areas', $theme_mods)){
            $sidebar = $theme_mods['redux-widget-areas'];
            foreach ($sidebar as $name){
                register_sidebar( array(
                    'name'          => $name,
                    'id'            => str_replace(' ','',strtolower ($name)),
                    'description'   =>  $name,
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h4 class="widget-title"><span>',
                    'after_title'   => '</span></h4>',
                ) );
            }
        }



    }
    add_action( 'widgets_init', 'g5plus_register_sidebar' );
}

if (!function_exists('g5plus_redux_custom_widget_area_filter')) {
    function g5plus_redux_custom_widget_area_filter($arg) {
        return array(
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>'
        );
    }
    add_filter('redux_custom_widget_args','g5plus_redux_custom_widget_area_filter');
}

