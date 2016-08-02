<?php
/*
*
*	Meta Box Functions
*	------------------------------------------------
*	G5Plus Framework
* 	Copyright Swift Ideas 2015 - http://www.g5plus.net
*
*/
/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function g5plus_register_meta_boxes()
{
	$meta_boxes = &G5Plus_Global::get_meta_boxes();
	$prefix = 'g5plus_';
	/* PAGE MENU */
	$menu_list = array();
	if ( function_exists( 'g5plus_get_menu_list' ) ) {
		$menu_list = g5plus_get_menu_list();
	}

// POST FORMAT: Image
//--------------------------------------------------
	$meta_boxes[] = array(
		'title' => esc_html__('Post Format: Image', 'g5plus-megatron'),
		'id' => $prefix .'meta_box_post_format_image',
		'post_types' => array('post'),
		/*'context' => 'side',
		'priority' => 'low',*/
		'fields' => array(
			array(
				'name' => esc_html__('Image', 'g5plus-megatron'),
				'id' => $prefix . 'post_format_image',
				'type' => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => esc_html__('Select a image for post','g5plus-megatron')
			),
		),
	);

// POST FORMAT: Gallery
//--------------------------------------------------
	$meta_boxes[] = array(
		'title' => esc_html__('Post Format: Gallery', 'g5plus-megatron'),
		'id' => $prefix . 'meta_box_post_format_gallery',
		'post_types' => array('post'),
		'fields' => array(
			array(
				'name' => esc_html__('Images', 'g5plus-megatron'),
				'id' => $prefix . 'post_format_gallery',
				'type' => 'image_advanced',
				'desc' => esc_html__('Select images gallery for post','g5plus-megatron')
			),
		),
	);

// POST FORMAT: Video
//--------------------------------------------------
	$meta_boxes[] = array(
		'title' => esc_html__('Post Format: Video', 'g5plus-megatron'),
		'id' => $prefix . 'meta_box_post_format_video',
		'post_types' => array('post'),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'g5plus-megatron' ),
				'id'   => $prefix . 'post_format_video',
				'type' => 'textarea',
			),
		),
	);

// POST FORMAT: Audio
//--------------------------------------------------
	$meta_boxes[] = array(
		'title' => esc_html__('Post Format: Audio', 'g5plus-megatron'),
		'id' => $prefix . 'meta_box_post_format_audio',
		'post_types' => array('post'),
		'fields' => array(
			array(
				'name' => esc_html__( 'Audio URL or Embeded Code', 'g5plus-megatron' ),
				'id'   => $prefix . 'post_format_audio',
				'type' => 'textarea',
			),
		),
	);

// POST FORMAT: QUOTE
//--------------------------------------------------
    $meta_boxes[] = array(
        'title' => esc_html__('Post Format: Quote', 'g5plus-megatron'),
        'id' => $prefix . 'meta_box_post_format_quote',
        'post_types' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__( 'Quote', 'g5plus-megatron' ),
                'id'   => $prefix . 'post_format_quote',
                'type' => 'textarea',
            ),
            array(
                'name' => esc_html__( 'Author', 'g5plus-megatron' ),
                'id'   => $prefix . 'post_format_quote_author',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__( 'Author Url', 'g5plus-megatron' ),
                'id'   => $prefix . 'post_format_quote_author_url',
                'type' => 'url',
            ),
        ),
    );
    // POST FORMAT: LINK
	//--------------------------------------------------
    $meta_boxes[] = array(
        'title' => esc_html__('Post Format: Link', 'g5plus-megatron'),
        'id' => $prefix . 'meta_box_post_format_link',
        'post_types' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__( 'Url', 'g5plus-megatron' ),
                'id'   => $prefix . 'post_format_link_url',
                'type' => 'url',
            ),
            array(
                'name' => esc_html__( 'Text', 'g5plus-megatron' ),
                'id'   => $prefix . 'post_format_link_text',
                'type' => 'text',
            ),
        ),
    );

	// PAGE LAYOUT
	$meta_boxes[] = array(
		'id' => $prefix . 'page_layout_meta_box',
		'title' => esc_html__('Page Layout', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array(
				'name'  => esc_html__( 'Layout Style', 'g5plus-megatron' ),
				'id'    => $prefix . 'layout_style',
				'type'  => 'button_set',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'boxed'	  => esc_html__('Boxed','g5plus-megatron'),
					'wide'	  => esc_html__('Wide','g5plus-megatron'),
					'float'	  => esc_html__('Float','g5plus-megatron')
				),
				'std'	=> '-1',
				'multiple' => false,
			),
			array(
				'name'  => esc_html__( 'Page Layout', 'g5plus-megatron' ),
				'id'    => $prefix . 'page_layout',
				'type'  => 'button_set',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'full'	  => esc_html__('Full Width','g5plus-megatron'),
					'container'	  => esc_html__('Container','g5plus-megatron'),
					'container-fluid'	  => esc_html__('Container Fluid','g5plus-megatron'),
				),
				'std'	=> '-1',
				'multiple' => false,
			),
			array(
				'name'  => esc_html__( 'Page Sidebar', 'g5plus-megatron' ),
				'id'    => $prefix . 'page_sidebar',
				'type'  => 'image_set',
				'allowClear' => true,
				'options' => array(
					'none'	  => G5PLUS_THEME_URL.'/assets/images/theme-options/sidebar-none.png',
					'left'	  => G5PLUS_THEME_URL.'/assets/images/theme-options/sidebar-left.png',
					'right'	  => G5PLUS_THEME_URL.'/assets/images/theme-options/sidebar-right.png',
					'both'	  => G5PLUS_THEME_URL.'/assets/images/theme-options/sidebar-both.png'
				),
				'std'	=> '',
				'multiple' => false,

			),
			array (
				'name' 	=> esc_html__('Left Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_left_sidebar',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'page_sidebar','=',array('','left','both')),
			),

			array (
				'name' 	=> esc_html__('Right Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_right_sidebar',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'page_sidebar','=',array('','right','both')),
			),

			array(
				'name'  => esc_html__( 'Sidebar Width', 'g5plus-megatron' ),
				'id'    => $prefix . 'sidebar_width',
				'type'  => 'button_set',
				'options' => array(
					'-1'		=> esc_html__('Default','g5plus-megatron'),
					'small'		=> esc_html__('Small (1/4)','g5plus-megatron'),
					'larger'	=> esc_html__('Large (1/3)','g5plus-megatron')
				),
				'std'	=> '-1',
				'multiple' => false,
				'required-field' => array($prefix . 'page_sidebar','<>','none'),
			),

			array (
				'name' 	=> esc_html__('Page Class Extra', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_class_extra',
				'type' 	=> 'text',
				'std' 	=> ''
			),
		)
	);

	// TOP DRAWER
	$meta_boxes[] = array(
		'id' => $prefix . 'top_drawer_meta_box',
		'title' => esc_html__('Top drawer', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array (
				'name' 	=> esc_html__('Top Drawer Type', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_drawer_type',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'none' => esc_html__('Disable','g5plus-megatron'),
					'show' => esc_html__('Always Show','g5plus-megatron'),
					'toggle' => esc_html__('Toggle','g5plus-megatron')
				),
				'desc' => esc_html__('Top drawer type', 'g5plus-megatron'),
			),
			array (
				'name' 	=> esc_html__('Top Drawer Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_drawer_sidebar',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'top_drawer_type','<>','none'),
			),

			array (
				'name' 	=> esc_html__('Top Drawer Wrapper Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_drawer_wrapper_layout',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'full' => esc_html__('Full Width','g5plus-megatron'),
					'container' => esc_html__('Container','g5plus-megatron'),
					'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
				),
				'required-field' => array($prefix . 'top_drawer_type','<>','none'),
			),

			array (
				'name' 	=> esc_html__('Top Drawer hide on mobile', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_drawer_hide_mobile',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show on mobile','g5plus-megatron'),
					'0' => esc_html__('Hide on mobile','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'top_drawer_type','<>','none'),
			),

		)
	);

	// TOP BAR
	$meta_boxes[] = array(
		'id' => $prefix . 'top_bar_meta_box',
		'title' => esc_html__('Top Bar', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array (
				'name' 	=> esc_html__('Top Bar Desktop', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_section_1',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Show/Hide Top Bar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show Top Bar','g5plus-megatron'),
					'0' => esc_html__('Hide Top Bar','g5plus-megatron')
				),
				'desc' => esc_html__('Show Hide Top Bar.', 'g5plus-megatron'),
			),

			array (
				'name' 	=> esc_html__('Top Bar Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_layout',
				'type' 	=> 'image_set',
				'allowClear' => true,
				'width' => '80px',
				'std' 	=> '',
				'options' => array(
					'top-bar-1' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-1.jpg',
					'top-bar-2' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-2.jpg',
					'top-bar-3' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-3.jpg',
					'top-bar-4' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-4.jpg'
				),
				'required-field' => array($prefix . 'top_bar','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Top Left Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_left_sidebar',
				'type' 	=> 'sidebars',
				'std' 	=> '',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Top Right Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_right_sidebar',
				'type' 	=> 'sidebars',
				'std' 	=> '',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Top Bar Scheme', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_scheme',
				'type' 	=> 'select',
				'std' 	=> '-1',
				'options' => array(
					'-1'                    => esc_html__('Default','g5plus-megatron'),
					'top-bar-light'         => esc_html__('Light','g5plus-megatron'),
					'top-bar-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					'top-bar-gray'          => esc_html__('Gray','g5plus-megatron'),
					'top-bar-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					'top-bar-dark'          => esc_html__('Dark','g5plus-megatron'),
					'top-bar-overlay'       => esc_html__('Overlay','g5plus-megatron'),
					'top-bar-transparent'   => esc_html__('Transparent','g5plus-megatron'),
				),
				'desc' => esc_html__('Show Hide Top Bar.', 'g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Top Bar Border Bottom', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_border_bottom',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1'            => esc_html__('Default','g5plus-megatron'),
					'none'          => esc_html__('None','g5plus-megatron'),
					'bordered'      => esc_html__('Bordered','g5plus-megatron'),
				),
				'desc' => esc_html__('Show Hide Top Bar.', 'g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Top Bar Mobile', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_section_2',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Show/Hide Top Bar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_mobile',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show Top Bar','g5plus-megatron'),
					'0' => esc_html__('Hide Top Bar','g5plus-megatron')
				),
				'desc' => esc_html__('Show Hide Top Bar.', 'g5plus-megatron'),
			),
			array (
				'name' 	=> esc_html__('Top Bar Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_mobile_layout',
				'type' 	=> 'image_set',
				'allowClear' => true,
				'width' => '80px',
				'std' 	=> '',
				'options' => array(
					'top-bar-1' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-1.jpg',
					'top-bar-2' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-2.jpg',
					'top-bar-3' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-3.jpg',
					'top-bar-4' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-4.jpg'
				),
				'required-field' => array($prefix . 'top_bar_mobile','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Top Left Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_mobile_left_sidebar',
				'type' 	=> 'sidebars',
				'std' 	=> '',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar_mobile','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Top Right Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_mobile_right_sidebar',
				'type' 	=> 'sidebars',
				'std' 	=> '',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar_mobile','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Top Bar Scheme', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_mobile_scheme',
				'type' 	=> 'select',
				'std' 	=> '-1',
				'options' => array(
					'-1'                    => esc_html__('Default','g5plus-megatron'),
					'top-bar-light'         => esc_html__('Light','g5plus-megatron'),
					'top-bar-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					'top-bar-gray'          => esc_html__('Gray','g5plus-megatron'),
					'top-bar-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					'top-bar-dark'          => esc_html__('Dark','g5plus-megatron'),
					'top-bar-overlay'       => esc_html__('Overlay','g5plus-megatron'),
					'top-bar-transparent'   => esc_html__('Transparent','g5plus-megatron'),
				),
				'desc' => esc_html__('Show Hide Top Bar.', 'g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar_mobile','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Top Bar Border Bottom', 'g5plus-megatron'),
				'id' 	=> $prefix . 'top_bar_mobile_border_bottom',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1'                    => esc_html__('Default','g5plus-megatron'),
					'none'                  => esc_html__('None','g5plus-megatron'),
					'bordered'              => esc_html__('Bordered','g5plus-megatron'),
					'container-bordered'    => esc_html__('Container Bordered','g5plus-megatron'),
				),
				'desc' => esc_html__('Show Hide Top Bar.', 'g5plus-megatron'),
				'required-field' => array($prefix . 'top_bar_mobile','<>','0'),
			),
		)
	);

	// PAGE HEADER
	//--------------------------------------------------
	$meta_boxes[] = array(
		'id' => $prefix . 'page_header_meta_box',
		'title' => esc_html__('Page Header', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array (
				'name' 	=> esc_html__('Header On/Off?', 'g5plus-megatron'),
				'id' 	=> $prefix . 'header_show_hide',
				'type' 	=> 'checkbox',
				'desc' => esc_html__("Switch header ON or OFF?", 'g5plus-megatron'),
				'std'	=> '1',
			),
			array (
				'name' 	=> esc_html__('Page Header Desktop', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_header_section_1',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Header Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'header_layout',
				'type'  => 'image_set',
				'allowClear' => true,
				'std'	=> '',
				'options' => array(
					'header-1'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-1.png',
					'header-2'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-2.png',
					'header-3'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-3.png',
					'header-4'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-4.png',
					'header-5'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-5.png',
					'header-6'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-6.png',
					'header-7'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-7.png',
					'header-8'	    => G5PLUS_THEME_URL.'/assets/images/theme-options/header-8.png',
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_boxed',
				'name'  => esc_html__( 'Header Boxed', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'    => esc_html__('Default','g5plus-megatron'),
					'1'     => esc_html__('On','g5plus-megatron'),
					'0'     => esc_html__('Off','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_container_layout',
				'name'  => esc_html__( 'Header Container Layout', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'                => esc_html__('Default','g5plus-megatron'),
					'container'         => esc_html__('Container','g5plus-megatron'),
					'container-full'    => esc_html__('Container Full','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_float',
				'name'  => esc_html__( 'Header Float', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'    => esc_html__('Default','g5plus-megatron'),
					'1'     => esc_html__('On','g5plus-megatron'),
					'0'     => esc_html__('Off','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_scheme',
				'name'  => esc_html__( 'Header Scheme', 'g5plus-megatron' ),
				'type'  => 'select',
				'std'	=> '-1',
				'options' => array(
					'-1'                   => esc_html__('Default','g5plus-megatron'),
					'header-light'         => esc_html__('Light','g5plus-megatron'),
					'header-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					'header-gray'          => esc_html__('Gray','g5plus-megatron'),
					'header-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					'header-dark'          => esc_html__('Dark','g5plus-megatron'),
					'header-transparent'   => esc_html__('Transparent','g5plus-megatron'),
					'header-overlay'       => esc_html__('Overlay','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id' => $prefix . 'header_scheme_color',
				'name' => esc_html__('Header scheme background color', 'g5plus-megatron'),
				'desc' => esc_html__("Set header scheme background color overlay.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '#000',
				'required-field' => array($prefix . 'header_scheme','=','header-overlay'),
			),
			array(
				'id'        => $prefix .'header_scheme_opacity',
				'name'      => esc_html__( 'Header scheme opacity', 'g5plus-megatron' ),
				'desc'      => esc_html__( 'Set the opacity level of the overlay', 'g5plus-megatron' ),
				'clone'     => false,
				'type'      => 'slider',
				'prefix'    => '',
				'std'       => '20',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'header_scheme','=','header-overlay'),
			),
			array(
				'id' => $prefix . 'header_scheme_text_color',
				'name' => esc_html__('Header scheme text color', 'g5plus-megatron'),
				'desc' => esc_html__("Set header scheme text color overlay.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '#fff',
				'required-field' => array($prefix . 'header_scheme','=','header-overlay'),
			),

			array(
				'id'    => $prefix . 'header_nav_scheme',
				'name'  => esc_html__( 'Header Navigation Scheme', 'g5plus-megatron' ),
				'type'  => 'select',
				'std'	=> '-1',
				'options' => array(
					'-1'                   => esc_html__('Default','g5plus-megatron'),
					'header-light'         => esc_html__('Light','g5plus-megatron'),
					'header-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					'header-gray'          => esc_html__('Gray','g5plus-megatron'),
					'header-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					'header-dark'          => esc_html__('Dark','g5plus-megatron'),
					'header-transparent'   => esc_html__('Transparent','g5plus-megatron'),
					'header-overlay'       => esc_html__('Overlay','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id' => $prefix . 'header_nav_scheme_color',
				'name' => esc_html__('Header navigation scheme background color', 'g5plus-megatron'),
				'desc' => esc_html__("Set header navigation scheme background color overlay.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '#000',
				'required-field' => array($prefix . 'header_nav_scheme','=','header-overlay'),
			),
			array(
				'id'        => $prefix .'header_nav_scheme_opacity',
				'name'      => esc_html__( 'Header navigation scheme opacity', 'g5plus-megatron' ),
				'desc'      => esc_html__( 'Set the opacity level of the overlay', 'g5plus-megatron' ),
				'clone'     => false,
				'type'      => 'slider',
				'prefix'    => '',
				'std'       => '20',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'header_nav_scheme','=','header-overlay'),
			),
			array(
				'id' => $prefix . 'header_nav_scheme_text_color',
				'name' => esc_html__('Header navigation scheme text color', 'g5plus-megatron'),
				'desc' => esc_html__("Set header navigation scheme text color overlay.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '#fff',
				'required-field' => array($prefix . 'header_nav_scheme','=','header-overlay'),
			),
			array(
				'id'    => $prefix . 'header_nav_border_top',
				'name'  => esc_html__( 'Header navigation border top', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'            => esc_html__('Default','g5plus-megatron'),
					'none'          => esc_html__('None','g5plus-megatron'),
					'bottom-bordered'      => esc_html__('Solid','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_nav_border_bottom',
				'name'  => esc_html__( 'Header navigation border bottom', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'                => esc_html__('Default','g5plus-megatron'),
					'none'              => esc_html__('None','g5plus-megatron'),
					'bottom-border-solid'      => esc_html__('Solid','g5plus-megatron'),
					'bottom-border-gradient'   => esc_html__('Gradient','g5plus-megatron'),
					'bottom-border-gradient w2p3' => esc_html__('Gradient 2','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_sticky',
				'name'  => esc_html__( 'Show/Hide Header Sticky', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'    => esc_html__('Default','g5plus-megatron'),
					'1'     => esc_html__('On','g5plus-megatron'),
					'0'     => esc_html__('Off','g5plus-megatron')
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),
			array(
				'id'    => $prefix . 'header_sticky_scheme',
				'name'  => esc_html__( 'Header sticky scheme', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'    => esc_html__('Default','g5plus-megatron'),
					'sticky-inherit'   => esc_html__('Inherit','g5plus-megatron'),
					'sticky-gray'      => esc_html__('Gray','g5plus-megatron'),
					'sticky-light'     => esc_html__('Light','g5plus-megatron'),
					'sticky-dark'      => esc_html__('Dark','g5plus-megatron')
				),
				'required-field' => array($prefix . 'header_show_hide','=','1'),
			),

			array (
				'name' 	=> esc_html__('Page Header Mobile', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_header_section_2',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Header Mobile Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'mobile_header_layout',
				'type'  => 'image_set',
				'allowClear' => true,
				'std'	=> '',
				'options' => array(
					'header-mobile-1'	    => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-1.png',
					'header-mobile-2'	    => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-2.png',
					'header-mobile-3'	    => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-3.png',
					'header-mobile-4'	    => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-4.png',
				)
			),
			array(
				'id'    => $prefix . 'mobile_header_menu_drop',
				'name'  => esc_html__( 'Menu Drop Type', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'        => esc_html__('Default','g5plus-megatron'),
					'dropdown'  => esc_html__('Dropdown Menu','g5plus-megatron'),
					'fly'       => esc_html__('Fly Menu','g5plus-megatron'),
				)
			),
			array(
				'id'    => $prefix . 'mobile_header_scheme',
				'name'  => esc_html__( 'Header Scheme', 'g5plus-megatron' ),
				'type'  => 'select',
				'std'	=> '-1',
				'options' => array(
					'-1'                   => esc_html__('Default','g5plus-megatron'),
					'header-light'         => esc_html__('Light','g5plus-megatron'),
					'header-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					'header-gray'          => esc_html__('Gray','g5plus-megatron'),
					'header-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					'header-dark'          => esc_html__('Dark','g5plus-megatron'),
					'header-overlay'       => esc_html__('Overlay','g5plus-megatron'),
					'header-transparent'   => esc_html__('Transparent','g5plus-megatron'),
				)
			),
			array(
				'id'    => $prefix . 'mobile_header_border_bottom',
				'name'  => esc_html__( 'Mobile header border bottom', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'                    => esc_html__('Default','g5plus-megatron'),
					'none'                  => esc_html__('None','g5plus-megatron'),
					'bordered'              => esc_html__('Bordered','g5plus-megatron'),
					'container-bordered'    => esc_html__('Container Bordered','g5plus-megatron'),
				)
			),
			array(
				'id'    => $prefix . 'mobile_header_float',
				'name'  => esc_html__( 'Mobile header float', 'g5plus-megatron' ),
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'    => esc_html__('Default','g5plus-megatron'),
					'1'     => esc_html__('On','g5plus-megatron'),
					'0'     => esc_html__('Off','g5plus-megatron')
				)
			),
			array (
				'id' 	=> $prefix . 'mobile_header_stick',
				'name' 	=> esc_html__('Header mobile sticky', 'g5plus-megatron'),
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Enable','g5plus-megatron'),
					'0' => esc_html__('Disable','g5plus-megatron'),
				),
			),
			array (
				'name' 	=> esc_html__('Mobile Header Search Box', 'g5plus-megatron'),
				'id' 	=> $prefix . 'mobile_header_search_box',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show','g5plus-megatron'),
					'0' => esc_html__('Hide','g5plus-megatron')
				),
			),

			array (
				'name' 	=> esc_html__('Mobile Header Shopping Cart', 'g5plus-megatron'),
				'id' 	=> $prefix . 'mobile_header_shopping_cart',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show','g5plus-megatron'),
					'0' => esc_html__('Hide','g5plus-megatron')
				),
			),
		)
	);

	// HEADER CUSTOMIZE
	$meta_boxes[] = array(
		'id' => $prefix . 'page_header_customize_meta_box',
		'title' => esc_html__('Page Header Customize', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array (
				'name' 	=> esc_html__('Header Customize Navigation', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_header_customize_section_1',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array(
				'name'  => esc_html__( 'Set header customize navigation?', 'g5plus-megatron' ),
				'id'    => $prefix . 'enable_header_customize_nav',
				'type'  => 'checkbox',
				'std'	=> 0,
			),
			array (
				'name' 	=> esc_html__('Header Customize Navigation', 'g5plus-megatron'),
				'id' 	=> $prefix . 'header_customize_nav',
				'type' 	=> 'sorter',
				'std' 	=> '',
				'desc'  => esc_html__('Select element for header customize navigation. Drag to change element order', 'g5plus-megatron'),
				'options' => array(
					'shopping-cart'     => esc_html__('Shopping Cart','g5plus-megatron'),
					'search-button'     => esc_html__('Search Button','g5plus-megatron'),
					'social-profile'    => esc_html__('Social Profile','g5plus-megatron'),
					'canvas-menu'       => esc_html__('Canvas Menu','g5plus-megatron'),
					'custom-text'       => esc_html__('Custom Text','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'enable_header_customize_nav','=','1'),
			),
			array(
				'name' => esc_html__('Custom social profiles', 'g5plus-megatron'),
				'id' => $prefix . 'header_customize_nav_social_profile',
				'type'  => 'select_advanced',
				'placeholder' => esc_html__('Select social profiles','g5plus-megatron'),
				'std'	=> '',
				'multiple' => true,
				'options' => array(
					'twitter'  => esc_html__( 'Twitter', 'g5plus-megatron' ),
					'facebook'  => esc_html__( 'Facebook', 'g5plus-megatron' ),
					'dribbble'  => esc_html__( 'Dribbble', 'g5plus-megatron' ),
					'vimeo'  => esc_html__( 'Vimeo', 'g5plus-megatron' ),
					'tumblr'  => esc_html__( 'Tumblr', 'g5plus-megatron' ),
					'skype'  => esc_html__( 'Skype', 'g5plus-megatron' ),
					'linkedin'  => esc_html__( 'LinkedIn', 'g5plus-megatron' ),
					'googleplus'  => esc_html__( 'Google+', 'g5plus-megatron' ),
					'flickr'  => esc_html__( 'Flickr', 'g5plus-megatron' ),
					'youtube'  => esc_html__( 'YouTube', 'g5plus-megatron' ),
					'pinterest' => esc_html__( 'Pinterest', 'g5plus-megatron' ),
					'foursquare'  => esc_html__( 'Foursquare', 'g5plus-megatron' ),
					'instagram' => esc_html__( 'Instagram', 'g5plus-megatron' ),
					'github'  => esc_html__( 'GitHub', 'g5plus-megatron' ),
					'xing' => esc_html__( 'Xing', 'g5plus-megatron' ),
					'behance'  => esc_html__( 'Behance', 'g5plus-megatron' ),
					'deviantart'  => esc_html__( 'Deviantart', 'g5plus-megatron' ),
					'soundcloud'  => esc_html__( 'SoundCloud', 'g5plus-megatron' ),
					'yelp'  => esc_html__( 'Yelp', 'g5plus-megatron' ),
					'rss'  => esc_html__( 'RSS Feed', 'g5plus-megatron' ),
					'email'  => esc_html__( 'Email address', 'g5plus-megatron' ),
				),
				'required-field' => array($prefix . 'enable_header_customize_nav','=','1'),
			),
			array(
				'name'  => esc_html__( 'Custom text content', 'g5plus-megatron' ),
				'id'    => $prefix . 'header_customize_nav_text',
				'type'  => 'textarea',
				'std'	=> '',
				'required-field' => array($prefix . 'enable_header_customize_nav','=','1'),
			),

			array (
				'name' 	=> esc_html__('Header Customize Left', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_header_customize_section_2',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array(
				'name'  => esc_html__( 'Set header customize left?', 'g5plus-megatron' ),
				'id'    => $prefix . 'enable_header_customize_left',
				'type'  => 'checkbox',
				'std'	=> 0,
			),
			array (
				'name' 	=> esc_html__('Header Customize Left', 'g5plus-megatron'),
				'id' 	=> $prefix . 'header_customize_left',
				'type' 	=> 'sorter',
				'std' 	=> '',
				'desc'  => esc_html__('Select element for header customize left. Drag to change element order', 'g5plus-megatron'),
				'options' => array(
					'shopping-cart'     => esc_html__('Shopping Cart','g5plus-megatron'),
					'search-button'     => esc_html__('Search Button','g5plus-megatron'),
					'social-profile'    => esc_html__('Social Profile','g5plus-megatron'),
					'canvas-menu'       => esc_html__('Canvas Menu','g5plus-megatron'),
					'custom-text'       => esc_html__('Custom Text','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'enable_header_customize_left','=','1'),
			),
			array(
				'name' => esc_html__('Custom social profiles left', 'g5plus-megatron'),
				'id' => $prefix . 'header_customize_left_social_profile',
				'type'  => 'select_advanced',
				'placeholder' => esc_html__('Select social profiles','g5plus-megatron'),
				'std'	=> '',
				'multiple' => true,
				'options' => array(
					'twitter'  => esc_html__( 'Twitter', 'g5plus-megatron' ),
					'facebook'  => esc_html__( 'Facebook', 'g5plus-megatron' ),
					'dribbble'  => esc_html__( 'Dribbble', 'g5plus-megatron' ),
					'vimeo'  => esc_html__( 'Vimeo', 'g5plus-megatron' ),
					'tumblr'  => esc_html__( 'Tumblr', 'g5plus-megatron' ),
					'skype'  => esc_html__( 'Skype', 'g5plus-megatron' ),
					'linkedin'  => esc_html__( 'LinkedIn', 'g5plus-megatron' ),
					'googleplus'  => esc_html__( 'Google+', 'g5plus-megatron' ),
					'flickr'  => esc_html__( 'Flickr', 'g5plus-megatron' ),
					'youtube'  => esc_html__( 'YouTube', 'g5plus-megatron' ),
					'pinterest' => esc_html__( 'Pinterest', 'g5plus-megatron' ),
					'foursquare'  => esc_html__( 'Foursquare', 'g5plus-megatron' ),
					'instagram' => esc_html__( 'Instagram', 'g5plus-megatron' ),
					'github'  => esc_html__( 'GitHub', 'g5plus-megatron' ),
					'xing' => esc_html__( 'Xing', 'g5plus-megatron' ),
					'behance'  => esc_html__( 'Behance', 'g5plus-megatron' ),
					'deviantart'  => esc_html__( 'Deviantart', 'g5plus-megatron' ),
					'soundcloud'  => esc_html__( 'SoundCloud', 'g5plus-megatron' ),
					'yelp'  => esc_html__( 'Yelp', 'g5plus-megatron' ),
					'rss'  => esc_html__( 'RSS Feed', 'g5plus-megatron' ),
					'email'  => esc_html__( 'Email address', 'g5plus-megatron' ),
				),
				'required-field' => array($prefix . 'enable_header_customize_left','=','1'),
			),
			array(
				'name'  => esc_html__( 'Custom text content left', 'g5plus-megatron' ),
				'id'    => $prefix . 'header_customize_left_text',
				'type'  => 'textarea',
				'std'	=> '',
				'required-field' => array($prefix . 'enable_header_customize_left','=','1'),
			),

			array (
				'name' 	=> esc_html__('Header Customize Right', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_header_customize_section_3',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array(
				'name'  => esc_html__( 'Set header customize right?', 'g5plus-megatron' ),
				'id'    => $prefix . 'enable_header_customize_right',
				'type'  => 'checkbox',
				'std'	=> 0,
			),
			array (
				'name' 	=> esc_html__('Header Customize Right', 'g5plus-megatron'),
				'id' 	=> $prefix . 'header_customize_right',
				'type' 	=> 'sorter',
				'std' 	=> '',
				'desc'  => esc_html__('Select element for header customize right. Drag to change element order', 'g5plus-megatron'),
				'options' => array(
					'shopping-cart'     => esc_html__('Shopping Cart','g5plus-megatron'),
					'search-button'     => esc_html__('Search Button','g5plus-megatron'),
					'social-profile'    => esc_html__('Social Profile','g5plus-megatron'),
					'canvas-menu'       => esc_html__('Canvas Menu','g5plus-megatron'),
					'custom-text'       => esc_html__('Custom Text','g5plus-megatron'),
				),
				'required-field' => array($prefix . 'enable_header_customize_right','=','1'),
			),
			array(
				'name' => esc_html__('Custom social profiles right', 'g5plus-megatron'),
				'id' => $prefix . 'header_customize_right_social_profile',
				'type'  => 'select_advanced',
				'placeholder' => esc_html__('Select social profiles','g5plus-megatron'),
				'std'	=> '',
				'multiple' => true,
				'options' => array(
					'twitter'  => esc_html__( 'Twitter', 'g5plus-megatron' ),
					'facebook'  => esc_html__( 'Facebook', 'g5plus-megatron' ),
					'dribbble'  => esc_html__( 'Dribbble', 'g5plus-megatron' ),
					'vimeo'  => esc_html__( 'Vimeo', 'g5plus-megatron' ),
					'tumblr'  => esc_html__( 'Tumblr', 'g5plus-megatron' ),
					'skype'  => esc_html__( 'Skype', 'g5plus-megatron' ),
					'linkedin'  => esc_html__( 'LinkedIn', 'g5plus-megatron' ),
					'googleplus'  => esc_html__( 'Google+', 'g5plus-megatron' ),
					'flickr'  => esc_html__( 'Flickr', 'g5plus-megatron' ),
					'youtube'  => esc_html__( 'YouTube', 'g5plus-megatron' ),
					'pinterest' => esc_html__( 'Pinterest', 'g5plus-megatron' ),
					'foursquare'  => esc_html__( 'Foursquare', 'g5plus-megatron' ),
					'instagram' => esc_html__( 'Instagram', 'g5plus-megatron' ),
					'github'  => esc_html__( 'GitHub', 'g5plus-megatron' ),
					'xing' => esc_html__( 'Xing', 'g5plus-megatron' ),
					'behance'  => esc_html__( 'Behance', 'g5plus-megatron' ),
					'deviantart'  => esc_html__( 'Deviantart', 'g5plus-megatron' ),
					'soundcloud'  => esc_html__( 'SoundCloud', 'g5plus-megatron' ),
					'yelp'  => esc_html__( 'Yelp', 'g5plus-megatron' ),
					'rss'  => esc_html__( 'RSS Feed', 'g5plus-megatron' ),
					'email'  => esc_html__( 'Email address', 'g5plus-megatron' ),
				),
				'required-field' => array($prefix . 'enable_header_customize_right','=','1'),
			),
			array(
				'name'  => esc_html__( 'Custom text content right', 'g5plus-megatron' ),
				'id'    => $prefix . 'header_customize_right_text',
				'type'  => 'textarea',
				'std'	=> '',
				'required-field' => array($prefix . 'enable_header_customize_right','=','1'),
			),
		)
	);

	// LOGO
	$meta_boxes[] = array(
		'id' => $prefix . 'page_logo_meta_box',
		'title' => esc_html__('Logo', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array (
				'name' 	=> esc_html__('LOGO Desktop', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_logo_section_1',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array(
				'id'    => $prefix.  'logo',
				'name'  => esc_html__('Custom Logo', 'g5plus-megatron'),
				'desc'  => esc_html__('Upload custom logo in header.', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'id'    => $prefix.  'logo_retina',
				'name'  => esc_html__('Custom Logo Retina', 'g5plus-megatron'),
				'desc'  => esc_html__('Upload custom logo retina in header.', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'id'    => $prefix.  'logo_height',
				'name'  => esc_html__('Logo height', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo height (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),
			array(
				'id'    => $prefix.  'logo_max_height',
				'name'  => esc_html__('Logo max height', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo max height (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),
			array(
				'id'    => $prefix.  'logo_padding_top',
				'name'  => esc_html__('Logo padding top', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo padding top (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),
			array(
				'id'    => $prefix.  'logo_padding_bottom',
				'name'  => esc_html__('Logo padding bottom', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo padding bottom (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),

			array(
				'id'    => $prefix . 'sticky_logo',
				'name'  => esc_html__('Sticky Logo', 'g5plus-megatron'),
				'desc'  => esc_html__('Upload sticky logo in header (empty to default)', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'id'    => $prefix . 'sticky_logo_retina',
				'name'  => esc_html__('Sticky Logo Retina', 'g5plus-megatron'),
				'desc'  => esc_html__('Upload sticky logo retina in header (empty to default)', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
			),

			array (
				'name' 	=> esc_html__('LOGO Mobile', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_logo_section_2',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array(
				'id'    => $prefix.  'mobile_logo',
				'name'  => esc_html__('Mobile Logo', 'g5plus-megatron'),
				'desc'  => esc_html__('Upload mobile logo in header.', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'id'    => $prefix.  'mobile_logo_retina',
				'name'  => esc_html__('Mobile Logo Retina', 'g5plus-megatron'),
				'desc'  => esc_html__('Upload mobile logo retina in header.', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'id'    => $prefix.  'mobile_logo_height',
				'name'  => esc_html__('Mobile Logo Height', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo height (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),
			array(
				'id'    => $prefix.  'mobile_logo_max_height',
				'name'  => esc_html__('Mobile Logo Max Height', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo max height (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),
			array(
				'id'    => $prefix.  'mobile_logo_padding',
				'name'  => esc_html__('Mobile Logo Padding', 'g5plus-megatron'),
				'desc'  => esc_html__('Logo padding top/bottom (px). Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
			),
		)
	);

	// MENU
	$meta_boxes[] = array(
		'id' => $prefix . 'page_menu_meta_box',
		'title' => esc_html__('Menu', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array(
				'name'  => esc_html__( 'Page menu', 'g5plus-megatron' ),
				'id'    => $prefix . 'page_menu',
				'type'  => 'select_advanced',
				'options' => $menu_list,
				'placeholder' => esc_html__('Select Menu','g5plus-megatron'),
				'std'	=> '',
				'multiple' => false,
				'desc' => esc_html__('Optionally you can choose to override the menu that is used on the page', 'g5plus-megatron'),
			),

			array(
				'name'  => esc_html__( 'Page Menu Left', 'g5plus-megatron' ),
				'id'    => $prefix . 'page_menu_left',
				'type'  => 'select_advanced',
				'options' => $menu_list,
				'placeholder' => esc_html__('Select Menu','g5plus-megatron'),
				'std'	=> '',
				'multiple' => false,
				'desc' => esc_html__('Optionally you can choose to override the menu left that is used on the page (apply "header-2" and "header-3")', 'g5plus-megatron'),
			),
			array(
				'name'  => esc_html__( 'Page Menu Right', 'g5plus-megatron' ),
				'id'    => $prefix . 'page_menu_right',
				'type'  => 'select_advanced',
				'options' => $menu_list,
				'placeholder' => esc_html__('Select Menu','g5plus-megatron'),
				'std'	=> '',
				'multiple' => false,
				'desc' => esc_html__('Optionally you can choose to override the menu right that is used on the page (apply "header-2" and "header-3")', 'g5plus-megatron'),
			),

			array(
				'name'  => esc_html__( 'Page menu mobile', 'g5plus-megatron' ),
				'id'    => $prefix . 'page_menu_mobile',
				'type'  => 'select_advanced',
				'options' => $menu_list,
				'placeholder' => esc_html__('Select Menu','g5plus-megatron'),
				'std'	=> '',
				'multiple' => false,
				'desc' => esc_html__('Optionally you can choose to override the menu mobile that is used on the page', 'g5plus-megatron'),
			),

			array(
				'name'  => esc_html__( 'Is One Page', 'g5plus-megatron' ),
				'id'    => $prefix . 'is_one_page',
				'type' 	=> 'checkbox',
				'std' 	=> '0',
				'desc' => esc_html__('Set page style is One Page', 'g5plus-megatron'),
			),

			array(
				'name' => esc_html__('Sub menu scheme', 'g5plus-megatron'),
				'id' => $prefix . 'menu_sub_scheme',
				'desc' => esc_html__("Choose submenu scheme", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'sub-menu-dark' => esc_html__('Dark','g5plus-megatron'),
					'sub-menu-light' => esc_html__('Light','g5plus-megatron'),
				),
				'std' => '-1',
			),
		)
	);


	// PAGE TITLE
	//--------------------------------------------------
	$meta_boxes[] = array(
		'id' => $prefix . 'page_title_meta_box',
		'title' => esc_html__('Page Title', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array(
				'name'  => esc_html__('Show/Hide Page Title?', 'g5plus-megatron' ),
				'id'    => $prefix . 'show_page_title',
				'type'  => 'button_set',
				'std'	=> '-1',
				'options' => array(
					'-1'	=> esc_html__('Default','g5plus-megatron'),
					'1'	=> esc_html__('On','g5plus-megatron'),
					'0'	=> esc_html__('Off','g5plus-megatron'),
				)

			),
			// PAGE TITLE LINE 1
			array(
				'name' => esc_html__('Custom Page Title', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_custom',
				'desc' => esc_html__("Enter a custom page title if you'd like.", 'g5plus-megatron'),
				'type'  => 'text',
				'std' => '',
                'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name'  => esc_html__( 'Custom Page Subtitle?', 'g5plus-megatron' ),
				'id'    => $prefix . 'enable_custom_page_subtitle',
				'type'  => 'checkbox',
				'std'	=> 0,
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			// PAGE TITLE LINE 2
			array(
				'name' => esc_html__('Custom Page Subtitle', 'g5plus-megatron'),
				'id' => $prefix . 'page_subtitle_custom',
				'desc' => esc_html__("Enter a custom page title if you'd like.", 'g5plus-megatron'),
				'type'  => 'text',
				'std' => '',
                'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Text Align', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_text_align',
				'desc' => esc_html__("Set Page Title Text Align", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'left' => esc_html__('Left','g5plus-megatron'),
					'center' => esc_html__('Center','g5plus-megatron'),
					'right' => esc_html__('Right','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			// PAGE TITLE Height
			array(
				'name' => esc_html__('Padding Top', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_padding_top',
				'desc' => esc_html__("Enter a page title padding top value (not include unit).", 'g5plus-megatron'),
				'type'  => 'number',
				'std' => '',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Padding Bottom', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_padding_bottom',
				'desc' => esc_html__("Enter a page title padding bottom value (not include unit).", 'g5plus-megatron'),
				'type'  => 'number',
				'std' => '',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Border Bottom', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_border_bottom',
				'desc' => esc_html__("Enabling this option will display bottom border on Title Area", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Enable','g5plus-megatron'),
					'0' => esc_html__('Disable','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Text Size', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_text_size',
				'desc' => esc_html__("Choose a default Title size", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'md' => esc_html__('Medium','g5plus-megatron'),
					'lg' => esc_html__('Large','g5plus-megatron')
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),




			// PAGE TITLE TEXT COLOR
			array(
				'name' => esc_html__('Text Color', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_text_color',
				'desc' => esc_html__("Optionally set a text color for the page title.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
                'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			// PAGE TITLE BACKGROUND COLOR

			array(
				'name'  => esc_html__( 'Custom Background Color?', 'g5plus-megatron' ),
				'id'    => $prefix . 'enable_custom_background_color',
				'type'  => 'checkbox',
				'std'	=> 0,
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),


			array(
				'name' => esc_html__('Background Color', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_bg_color',
				'desc' => esc_html__("Optionally set a background color for the page title.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			// Overlay Opacity Value
			array(
				'name'       => esc_html__( 'Background Color Opacity', 'g5plus-megatron' ),
				'id'         => $prefix .'page_title_bg_color_opacity',
				'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'g5plus-megatron' ),
				'clone'      => false,
				'type'       => 'slider',
				'prefix'     => '',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),



			array(
				'name'  => esc_html__( 'Custom Background Image?', 'g5plus-megatron' ),
				'id'    => $prefix . 'enable_custom_page_title_bg_image',
				'type'  => 'checkbox',
				'std'	=> 0,
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			// BACKGROUND IMAGE
			array(
				'id'    => $prefix.  'page_title_bg_image',
				'name'  => esc_html__('Background Image', 'g5plus-megatron'),
				'desc'  => esc_html__('Background Image for page title.', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			// PAGE TITLE OVERLAY COLOR






			array(
				'name' => esc_html__('Page Title Parallax', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_parallax',
				'desc' => esc_html__("Enable Page Title Parallax", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Enable','g5plus-megatron'),
					'0' => esc_html__('Disable','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Parallax Position', 'g5plus-megatron'),
				'id' => $prefix . 'page_title_parallax_position',
				'desc' => '',
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'top' => esc_html__('Top','g5plus-megatron'),
					'center' => esc_html__('Center','g5plus-megatron'),
					'bottom' => esc_html__('Bottom','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),



			// Breadcrumbs in Page Title
			array(
				'name' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
				'id' => $prefix . 'breadcrumbs',
				'desc' => esc_html__("Show/Hide Breadcrumbs", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Enable','g5plus-megatron'),
					'0' => esc_html__('Disable','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
				'id' => $prefix . 'breadcrumbs_style',
				'desc' => esc_html__("Set breadcrumbs styles", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'float' => esc_html__('Float','g5plus-megatron'),
					'normal' => esc_html__('Normal','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

			array(
				'name' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
				'id' => $prefix . 'breadcrumbs_align',
				'desc' => esc_html__("Set breadcrumbs align (apply with breadcrumbs style float)", 'g5plus-megatron'),
				'type'  => 'button_set',
				'options'	=> array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'left' => esc_html__('Left','g5plus-megatron'),
					'center' => esc_html__('Center','g5plus-megatron'),
					'right' => esc_html__('Right','g5plus-megatron'),
				),
				'std' => '-1',
				'required-field' => array($prefix . 'show_page_title','<>','0'),
			),

            array(
                'name'  => esc_html__( 'Remove Margin Bottom', 'g5plus-megatron' ),
                'id'    => $prefix . 'page_title_remove_margin_bottom',
                'type'  => 'checkbox',
                'std'	=> 0,
	            'required-field' => array($prefix . 'show_page_title','<>','0'),
            ),
		)
	);

	// PAGE FOOTER
	//--------------------------------------------------
	$meta_boxes[] = array(
		'id' => $prefix . 'page_footer_meta_box',
		'title' => esc_html__('Page Footer', 'g5plus-megatron'),
		'post_types' => array('post', 'page',  'portfolio','product'),
		'tab' => true,
		'fields' => array(
			array (
				'name' 	=> esc_html__('Footer Settings', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_footer_section_1',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Show/Hide Footer', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_show_hide',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show Footer','g5plus-megatron'),
					'0' => esc_html__('Hide Footer','g5plus-megatron')
				),
				'desc' => esc_html__('Show/hide footer', 'g5plus-megatron'),
			),
			array (
				'name' 	=> esc_html__('Wrapper Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_wrapper_layout',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1'                => esc_html__('Default','g5plus-megatron'),
					'full'              => esc_html__('Full Width','g5plus-megatron'),
					'container-fluid'   => esc_html__('Container Fluid','g5plus-megatron'),
				),
				'desc' => esc_html__('Select Footer Wrapper Layout', 'g5plus-megatron'),
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Footer Container Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_container_layout',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1'                => esc_html__('Default','g5plus-megatron'),
					'full'              => esc_html__('Full Width','g5plus-megatron'),
					'container-fluid'   => esc_html__('Container Fluid','g5plus-megatron'),
					'container'         => esc_html__('Container','g5plus-megatron'),
				),
				'desc' => esc_html__('Select Footer Wrapper Layout', 'g5plus-megatron'),
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_layout',
				'type' 	=> 'image_set',
				'allowClear' => true,
				'width' => '80px',
				'std' 	=> '',
				'options' => array(
					'footer-1' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-1.jpg',
					'footer-2' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-2.jpg',
					'footer-3' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-3.jpg',
					'footer-4' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-4.jpg',
					'footer-5' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-5.jpg',
					'footer-6' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-6.jpg',
					'footer-7' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-7.jpg',
					'footer-8' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-8.jpg',
					'footer-9' => G5PLUS_THEME_URL.'/assets/images/theme-options/footer-layout-9.jpg',
				),
				'desc' => esc_html__('Select Footer Layout (Not set to default).', 'g5plus-megatron'),
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),
			array (
				'name' 	=> esc_html__('Sidebar 1', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_sidebar_1',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'footer_layout','=',array('footer-1','footer-2','footer-3','footer-4','footer-5','footer-6','footer-7','footer-8','footer-9')),
			),

			array (
				'name' 	=> esc_html__('Sidebar 2', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_sidebar_2',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'footer_layout','=',array('footer-1','footer-2','footer-3','footer-4','footer-5','footer-6','footer-7','footer-8')),
			),

			array (
				'name' 	=> esc_html__('Sidebar 3', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_sidebar_3',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'footer_layout','=',array('footer-1','footer-2','footer-3','footer-5','footer-8')),
			),

			array (
				'name' 	=> esc_html__('Sidebar 4', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_sidebar_4',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
				'required-field' => array($prefix . 'footer_layout','=',array('footer-1')),
			),
			array(
				'id'    => $prefix.  'footer_padding_top',
				'name'  => esc_html__('Main Footer padding top', 'g5plus-megatron'),
				'desc'  => esc_html__('Main Footer padding top. Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),

			array(
				'id'    => $prefix.  'footer_padding_bottom',
				'name'  => esc_html__('Main Footer padding bottom', 'g5plus-megatron'),
				'desc'  => esc_html__('Main Footer padding bottom. Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),
			array(
				'id'    => $prefix.  'footer_bg_image',
				'name'  => esc_html__('Background Image', 'g5plus-megatron'),
				'desc'  => esc_html__('Set footer background image', 'g5plus-megatron'),
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,
				'std' => '',
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Footer Scheme', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_scheme',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'dark-black'    => esc_html__('Dark - Black','g5plus-megatron'),
					'light-black'   => esc_html__('Light - Black','g5plus-megatron'),
					'light'         => esc_html__('Light','g5plus-megatron'),
					'dark'          => esc_html__('Dark','g5plus-megatron'),
					'custom'        => esc_html__('Custom','g5plus-megatron'),
				),
				'desc' => esc_html__('Select Footer Scheme', 'g5plus-megatron'),
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),
			array(
				'id' => $prefix . 'footer_bg_color',
				'name' => esc_html__('Background color', 'g5plus-megatron'),
				'desc' => esc_html__("Set footer background color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id'         => $prefix .'footer_bg_color_opacity',
				'name'       => esc_html__( 'Background color opacity', 'g5plus-megatron' ),
				'desc'       => esc_html__( 'Set the opacity level of the footer background color', 'g5plus-megatron' ),
				'clone'      => false,
				'type'       => 'slider',
				'prefix'     => '',
				'std' => '100',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),

			array(
				'id' => $prefix . 'footer_main_overlay_color',
				'name' => esc_html__('Main footer overlay color', 'g5plus-megatron'),
				'desc' => esc_html__("Set main footer overlay color", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id'         => $prefix .'footer_main_overlay_opacity',
				'name'       => esc_html__( 'Main footer overlay opacity', 'g5plus-megatron' ),
				'desc'       => esc_html__( 'Set the opacity level of the main footer overlay', 'g5plus-megatron' ),
				'clone'      => false,
				'type'       => 'slider',
				'prefix'     => '',
				'std' => '0',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),

			array(
				'id' => $prefix . 'footer_text_color',
				'name' => esc_html__('Text color', 'g5plus-megatron'),
				'desc' => esc_html__("Set footer text color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),

			array(
				'id' => $prefix . 'footer_heading_text_color',
				'name' => esc_html__('Heading text color', 'g5plus-megatron'),
				'desc' => esc_html__("Set footer heading text color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),

			array(
				'id' => $prefix . 'footer_above_bg_color',
				'name' => esc_html__('Footer Above Background Color', 'g5plus-megatron'),
				'desc' => esc_html__("Set Footer Above Background Color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id'         => $prefix .'footer_above_bg_color_opacity',
				'name'       => esc_html__( 'Footer Above Background color opacity', 'g5plus-megatron' ),
				'desc'       => esc_html__( 'Set the opacity level of the footer above background color', 'g5plus-megatron' ),
				'clone'      => false,
				'type'       => 'slider',
				'prefix'     => '',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id' => $prefix . 'footer_above_text_color',
				'name' => esc_html__('Footer Above Text Color', 'g5plus-megatron'),
				'desc' => esc_html__("Set Footer Above Text Color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id' => $prefix . 'bottom_bar_bg_color',
				'name' => esc_html__('Bottom Bar Background Color', 'g5plus-megatron'),
				'desc' => esc_html__("Set Bottom Bar Background Color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id'         => $prefix .'bottom_bar_bg_color_opacity',
				'name'       => esc_html__( 'Bottom Bar Background color opacity', 'g5plus-megatron' ),
				'desc'       => esc_html__( 'Set the opacity level of the bottom bar background color', 'g5plus-megatron' ),
				'clone'      => false,
				'type'       => 'slider',
				'prefix'     => '',
				'js_options' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),
			array(
				'id' => $prefix . 'bottom_bar_text_color',
				'name' => esc_html__('Bottom Bar Text Color', 'g5plus-megatron'),
				'desc' => esc_html__("Set Bottom Bar Text Color.", 'g5plus-megatron'),
				'type'  => 'color',
				'std' => '',
				'required-field' => array($prefix . 'footer_scheme','=',array('custom')),
			),

			array (
				'name' 	=> esc_html__('Footer Parallax', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_parallax',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => 'On',
					'0' => 'Off'
				),
				'desc' => esc_html__('Enable Footer Parallax', 'g5plus-megatron'),
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Collapse footer on mobile device', 'g5plus-megatron'),
				'id' 	=> $prefix . 'collapse_footer',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => 'On',
					'0' => 'Off'
				),
				'desc' => esc_html__('Enable collapse footer', 'g5plus-megatron'),
				'required-field' => array($prefix . 'footer_show_hide','<>','0'),
			),

			//--------------------------------------------------------------------
			array (
				'name' 	=> esc_html__('Footer Above Settings', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_footer_section_2',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Show/Hide Footer Above', 'g5plus-megatron'),
				'id' 	=> $prefix . 'footer_above_enable',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => esc_html__('Default','g5plus-megatron'),
					'1' => esc_html__('Show Footer Above','g5plus-megatron'),
					'0' => esc_html__('Hide Footer Above','g5plus-megatron')
				),
				'desc' => esc_html__('Show/hide footer above', 'g5plus-megatron'),
			),
            array (
                'name' 	=> esc_html__('Footer Above Layout', 'g5plus-megatron'),
                'id' 	=> $prefix . 'footer_above_layout',
                'type' 	=> 'image_set',
                'allowClear' => true,
                'width' => '80px',
                'std' 	=> '',
                'options' => array(
                    'footer-above-1' => G5PLUS_THEME_URL.'/assets/images/theme-options/bottom-bar-layout-4.jpg',
                    'footer-above-2' => G5PLUS_THEME_URL.'/assets/images/theme-options/bottom-bar-layout-1.jpg',
                ),
                'desc' => esc_html__('Footer above layout.', 'g5plus-megatron'),
                'required-field' => array($prefix . 'footer_above_enable','<>','0'),
            ),

            array (
                'name' 	=> esc_html__('Footer Above Left Sidebar', 'g5plus-megatron'),
                'id' 	=> $prefix . 'footer_above_left_sidebar',
                'type' 	=> 'sidebars',
                'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
                'std' 	=> '',
                'required-field' => array($prefix . 'footer_above_enable','<>','0'),
            ),

            array (
                'name' 	=> esc_html__('Footer Above Right Sidebar', 'g5plus-megatron'),
                'id' 	=> $prefix . 'footer_above_right_sidebar',
                'type' 	=> 'sidebars',
                'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
                'std' 	=> '',
                'required-field' => array($prefix . 'footer_above_enable','<>','0'),
            ),
			array(
				'id'    => $prefix.  'footer_above_padding_top',
				'name'  => esc_html__('Footer above padding top', 'g5plus-megatron'),
				'desc'  => esc_html__('Footer above padding top. Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
				'required-field' => array($prefix . 'footer_above_enable','<>','0'),
			),

			array(
				'id'    => $prefix.  'footer_above_padding_bottom',
				'name'  => esc_html__('Footer above padding bottom', 'g5plus-megatron'),
				'desc'  => esc_html__('Footer above padding bottom. Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
				'required-field' => array($prefix . 'footer_above_enable','<>','0'),
			),

			//--------------------------------------------------------------------
			array (
				'name' 	=> esc_html__('Bottom Bar Settings', 'g5plus-megatron'),
				'id' 	=> $prefix . 'page_footer_section_3',
				'type' 	=> 'section',
				'std' 	=> '',
			),
			array (
				'name' 	=> esc_html__('Show/Hide Bottom Bar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'bottom_bar',
				'type' 	=> 'button_set',
				'std' 	=> '-1',
				'options' => array(
					'-1' => 'Default',
					'1' => 'Show Bottom Bar',
					'0' => 'Hide Bottom Bar'
				),
				'desc' => esc_html__('Show Hide Bottom Bar.', 'g5plus-megatron'),
			),
			array (
				'name' 	=> esc_html__('Bottom Bar Layout', 'g5plus-megatron'),
				'id' 	=> $prefix . 'bottom_bar_layout',
				'type' 	=> 'image_set',
				'allowClear' => true,
				'width' => '80px',
				'std' 	=> '',
				'options' => array(
					'bottom-bar-1' => G5PLUS_THEME_URL.'/assets/images/theme-options/bottom-bar-layout-1.jpg',
					'bottom-bar-2' => G5PLUS_THEME_URL.'/assets/images/theme-options/bottom-bar-layout-2.jpg',
					'bottom-bar-3' => G5PLUS_THEME_URL.'/assets/images/theme-options/bottom-bar-layout-3.jpg',
					'bottom-bar-4' => G5PLUS_THEME_URL.'/assets/images/theme-options/bottom-bar-layout-4.jpg',
				),
				'desc' => esc_html__('Bottom bar layout.', 'g5plus-megatron'),
                'required-field' => array($prefix . 'bottom_bar','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Bottom Bar Left Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'bottom_bar_left_sidebar',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
                'required-field' => array($prefix . 'bottom_bar','<>','0'),
			),

			array (
				'name' 	=> esc_html__('Bottom Bar Right Sidebar', 'g5plus-megatron'),
				'id' 	=> $prefix . 'bottom_bar_right_sidebar',
				'type' 	=> 'sidebars',
				'placeholder' => esc_html__('Select Sidebar','g5plus-megatron'),
				'std' 	=> '',
                'required-field' => array($prefix . 'bottom_bar','<>','0'),
			),
			array(
				'id'    => $prefix.  'bottom_bar_padding_top',
				'name'  => esc_html__('Bottom bar padding top', 'g5plus-megatron'),
				'desc'  => esc_html__('Bottom bar padding top. Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
				'required-field' => array($prefix . 'bottom_bar','<>','0'),
			),

			array(
				'id'    => $prefix.  'bottom_bar_padding_bottom',
				'name'  => esc_html__('Bottom bar padding bottom', 'g5plus-megatron'),
				'desc'  => esc_html__('Bottom bar padding bottom. Do not include units (empty to set default)', 'g5plus-megatron'),
				'type'  => 'text',
				'sdt'   => '',
				'required-field' => array($prefix . 'bottom_bar','<>','0'),
			),

		)
	);

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if (class_exists('RW_Meta_Box')) {
		foreach ($meta_boxes as $meta_box) {
			new RW_Meta_Box($meta_box);
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action('admin_init', 'g5plus_register_meta_boxes');
