<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux_Framework_options_config' ) ) {

    class Redux_Framework_options_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            if ( ! class_exists( 'ReduxFramework' ) ) {
                return;
            }
            $this->initSettings();
        }

        public function initSettings() {
            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                return;
            }
            $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
        }

        public function setSections() {

            $page_title_bg_url = G5PLUS_THEME_URL . 'assets/images/bg-page-title.jpg';
            $archive_title_bg_url = G5PLUS_THEME_URL . 'assets/images/bg-archive-title.jpg';
            $archive_product_title_bg_url = G5PLUS_THEME_URL . 'assets/images/bg-archive-product-title.jpg';
            $single_product_title_bg_url = G5PLUS_THEME_URL . 'assets/images/bg-product-title.jpg';
            $logo_under_construction = G5PLUS_THEME_URL . 'assets/images/logo_under_construction.png';
            $image_left_under_construction = G5PLUS_THEME_URL . 'assets/images/image_left.png';

            $fonts =array(
                            "Arial, Helvetica, sans-serif"                         => "Arial, Helvetica, sans-serif",
                            "'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif",
                            "'Bookman Old Style', serif"                           => "'Bookman Old Style', serif",
                            "'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive",
                            "Courier, monospace"                                   => "Courier, monospace",
                            "Garamond, serif"                                      => "Garamond, serif",
                            "Georgia, serif"                                       => "Georgia, serif",
                            "Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif",
                            "'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace",
                            "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
                            "'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif",
                            "'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif",
                            "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
                            "Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif",
                            "'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif",
                            "'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif",
                            "Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif",
                        );

            $g5plus_megatron_options = get_option('g5plus_megatron_options');
            if(is_array($g5plus_megatron_options)){
                for($i=1;$i<=2;$i++){
                    if(array_key_exists('custom_font_'.$i.'_name', $g5plus_megatron_options)){
                        $custom_font = $g5plus_megatron_options['custom_font_'.$i.'_name'];
                    }
                    if(array_key_exists('custom_font_'.$i.'_ttf', $g5plus_megatron_options)){
                        $ttf = $g5plus_megatron_options['custom_font_'.$i.'_ttf'];
                    }
                    if(array_key_exists('custom_font_'.$i.'_eot', $g5plus_megatron_options)){
                        $eot = $g5plus_megatron_options['custom_font_'.$i.'_eot'];
                    }
                    if(array_key_exists('custom_font_'.$i.'_woff', $g5plus_megatron_options)){
                        $woff = $g5plus_megatron_options['custom_font_'.$i.'_woff'];
                    }
                    if(isset($custom_font) && isset($ttf) && isset($eot) &&  isset($woff) && $custom_font!='' ){
                        $fonts[$custom_font] = 'Custom - '.$custom_font;
                    }
                }
            }
            // General Setting
            $this->sections[] = array(
                'title'  => esc_html__( 'General Setting', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-wrench',
                'fields' => array(
                    array(
                        'id' => 'smooth_scroll',
                        'type' => 'button_set',
                        'title' => esc_html__('Smooth Scroll', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Smooth Scroll', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),

                    array(
                        'id' => 'custom_scroll',
                        'type' => 'button_set',
                        'title' => esc_html__('Custom Scroll', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Custom Scroll', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),

                    array(
                        'id'        => 'custom_scroll_width',
                        'type'      => 'text',
                        'title'     => esc_html__('Custom Scroll Width', 'g5plus-megatron'),
                        'subtitle'  => esc_html__('This must be numeric (no px) or empty.', 'g5plus-megatron'),
                        'validate'  => 'numeric',
                        'default'   => '10',
                        'required'  => array('custom_scroll', '=', array('1')),
                    ),

                    array(
                        'id'       => 'custom_scroll_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Custom Scroll Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Custom Scroll Color', 'g5plus-megatron'),
                        'default'  => '#19394B',
                        'validate' => 'color',
                        'required'  => array('custom_scroll', '=', array('1')),
                    ),

                    array(
                        'id'       => 'custom_scroll_thumb_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Custom Scroll Thumb Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Custom Scroll Thumb Color', 'g5plus-megatron'),
                        'default'  => '#e8aa00',
                        'validate' => 'color',
                        'required'  => array('custom_scroll', '=', array('1')),
                    ),


                    array(
                        'id' => 'panel_selector',
                        'type' => 'button_set',
                        'title' => esc_html__('Panel Selector', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Panel Selector', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),
                    array(
                        'id' => 'back_to_top',
                        'type' => 'button_set',
                        'title' => esc_html__('Back To Top', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Back to top button', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '1'
                    ),

	                array(
		                'id' => 'enable_rtl_mode',
		                'type' => 'button_set',
		                'title' => esc_html__('Enable RTL mode', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Enable/Disable RTL mode', 'g5plus-megatron'),
		                'desc' => '',
		                'options' => array('1' => 'On','0' => 'Off'),
		                'default' => '0'
	                ),


	                array(
                        'id' => 'enable_social_meta',
                        'type' => 'button_set',
                        'title' => esc_html__('Enable Social Meta Tags', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable the social meta head tag output.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),

                    array(
                        'id' => 'twitter_author_username',
                        'type' => 'text',
                        'title' => esc_html__('Twitter Publisher Username', 'g5plus-megatron'),
                        'subtitle' => esc_html__( 'Enter your twitter username here, to be used for the Twitter Card date. Ensure that you do not include the @ symbol.','g5plus-megatron'),
                        'desc' => '',
                        'default' => "",
                        'required'  => array('enable_social_meta', '=', array('1')),
                    ),
                    array(
                        'id' => 'googleplus_author',
                        'type' => 'text',
                        'title' => esc_html__('Google+ Username', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enter your Google+ username here, to be used for the authorship meta.','g5plus-megatron'),
                        'desc' => '',
                        'default' => "",
                        'required'  => array('enable_social_meta', '=', array('1')),
                    ),


                    array(
                        'id' => 'general_divide_2',
                        'type' => 'divide'
                    ),
                    array(
                        'id' => 'layout_style',
                        'type' => 'image_select',
                        'title' => esc_html__('Layout Style', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select the layout style', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'boxed' => array('title' => 'Boxed', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/layout-boxed.png'),
                            'wide' => array('title' => 'Wide', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/layout-wide.png'),
                            'float' => array('title' => 'Float', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/layout-float.png')
                        ),
                        'default' => 'wide'
                    ),

	                array(
		                'id' => 'search_box_type',
		                'type' => 'button_set',
		                'title' => esc_html__('Search Box Type', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select search box type.', 'g5plus-megatron'),
		                'desc' => '',
		                'options' => array('standard' => esc_html__('Standard','g5plus-megatron'),'ajax' => esc_html__('Ajax Search','g5plus-megatron')),
		                'default' => 'standard'
	                ),
	                array(
		                'id' => 'shopping_cart_button',
		                'type' => 'checkbox',
		                'title' => esc_html__('Shopping Mini Cart Button', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select shopping mini cart button', 'g5plus-megatron'),
		                'options' => array(
			                'view-cart' => esc_html__('View Cart','g5plus-megatron'),
			                'checkout' => esc_html__('Checkout','g5plus-megatron'),
		                ),
		                'default' => array(
			                'view-cart' => '1',
			                'checkout' => '1',
		                ),
	                ),
	                array(
		                'id'       => 'shopping_cart_scheme',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Shopping mini cart scheme', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Choose shopping mini cart scheme', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array(
			                'light'     => esc_html__('Light','g5plus-megatron'),
			                'dark'      => esc_html__('Dark','g5plus-megatron')
		                ),
		                'default'  => 'light'
	                ),

	                array(
		                'id' => 'search_box_post_type',
		                'type' => 'checkbox',
		                'title' => esc_html__('Post type for Ajax Search', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select post type for ajax search', 'g5plus-megatron'),
		                'options' => array(
			                'post' => 'Post',
			                'page' => 'Page',
			                'product' => 'Product',
			                'portfolio' => 'Portfolio',
			                'service' => 'Our Services',
		                ),
		                'default' => array(
			                'post'      => '1',
			                'page'      => '0',
			                'product'   => '1',
			                'portfolio' => '1',
			                'service'   => '1',
		                ),
		                'required' => array('search_box_type','=','ajax'),
	                ),

	                array(
		                'id'        => 'search_box_result_amount',
		                'type'      => 'text',
		                'title'     => esc_html__('Amount Of Search Result', 'g5plus-megatron'),
		                'subtitle'  => esc_html__('This must be numeric (no px) or empty (default: 8).', 'g5plus-megatron'),
		                'desc'      => esc_html__('Set mount of Search Result', 'g5plus-megatron'),
		                'validate'  => 'numeric',
		                'default'   => '',
		                'required' => array('search_box_type','=','ajax'),
	                ),

                    array(
                        'id' => 'body_background_mode',
                        'type' => 'button_set',
                        'title' => esc_html__('Body Background Mode', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Chose Background Mode', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('background' => 'Background','pattern' => 'Pattern'),
                        'default' => 'background'
                    ),

                    array(
                        'id'       => 'body_background',
                        'type'     => 'background',
                        'output'   => array( 'body' ),
                        'title'    => esc_html__( 'Body Background', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Body background (Apply for Boxed layout style).', 'g5plus-megatron' ),
                        'default'  => array(
                            'background-color' => '',
                            'background-repeat' => 'no-repeat',
                            'background-position' => 'center center',
                            'background-attachment' => 'fixed',
                            'background-size' => 'cover'
                        ),
                        'required'  => array(
                                array('body_background_mode', '=', array('background'))
                        ),
                    ),
                    array(
                        'id' => 'body_background_pattern',
                        'type' => 'image_select',
                        'title' => esc_html__('Background Pattern', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Body background pattern(Apply for Boxed layout style)', 'g5plus-megatron'),
                        'desc' => '',
                        'height' => '40px',
                        'options' => array(
                            'pattern-1.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-1.png'),
                            'pattern-2.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-2.png'),
                            'pattern-3.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-3.png'),
                            'pattern-4.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-4.png'),
                            'pattern-5.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-5.png'),
                            'pattern-6.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-6.png'),
                            'pattern-7.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-7.png'),
                            'pattern-8.png' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/pattern-8.png'),
                        ),
                        'default' => 'pattern-1.png',
                        'required'  => array(
                                array('body_background_mode', '=', array('pattern'))
                            ) ,
                    ),
	                array(
		                'id' => 'general_divide_3',
		                'type' => 'divide'
	                ),
	                array(
		                'id' => 'menu_transition',
		                'type' => 'button_set',
		                'title' => esc_html__('Menu transition', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select menu transition', 'g5plus-megatron'),
		                'desc' => '',
		                'options' => array(
			                'none'                  => esc_html__('None','g5plus-megatron'),
			                'x-animate-slide-up'    => esc_html__('Slide Up','g5plus-megatron'),
			                'x-animate-slide-down'  => esc_html__('Slide Down','g5plus-megatron'),
			                'x-animate-slide-left'  => esc_html__('Slide Left','g5plus-megatron'),
			                'x-animate-slide-right' => esc_html__('Slide Right','g5plus-megatron'),
			                'x-animate-sign-flip'   => esc_html__('Sign Flip','g5plus-megatron'),
		                ),
		                'default' => 'x-animate-sign-flip'
	                ),
                )
            );

            $this->sections[] = array(
                'title' => esc_html__('Maintenance Mode', 'g5plus-megatron'),
                'desc' => '',
                'subsection' => true,
                'icon' => 'el-icon-eye-close',
                'fields' => array(
                    array(
                        'id' => 'enable_maintenance',
                        'type' => 'button_set',
                        'title' => esc_html__('Enable Maintenance', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable the themes maintenance mode.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('2' => 'On (Custom Page)', '1' => 'On (Standard)','0' => 'Off',),
                        'default' => '0'
                    ),
                    array(
                        'id' => 'maintenance_mode_page',
                        'type' => 'select',
                        'data' => 'pages',
                        'required'  => array('enable_maintenance', '=', '2'),
                        'title' => esc_html__('Custom Maintenance Mode Page', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select the page that is your maintenace page, if you would like to show a custom page instead of the standard WordPress message. You should use the Holding Page template for this page.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => '',
                        'args' => array()
                    ),
                ),
            );


            // Performance Options
            $this->sections[] = array(
                'title'  => esc_html__( 'Performance', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-fire',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id' => 'enable_minifile_js',
                        'type' => 'button_set',
                        'title' => esc_html__('Enable Mini File JS', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Mini File JS', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),
                    array(
                        'id' => 'enable_minifile_css',
                        'type' => 'button_set',
                        'title' => esc_html__('Enable Mini File CSS', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Mini File CSS', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),
                )
            );

            // Page Transition
            $this->sections[] = array(
                'title'  => esc_html__( 'Page Transition', 'g5plus-megatron'),
                'desc'   => '',
                'icon'   => 'el el-dashboard',
                'subsection' => true,
                'fields' => array(

                    array(
                        'id' => 'page_transition',
                        'type' => 'button_set',
                        'title' => esc_html__('Page Transition', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Page Transition', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),

                    //Loading Animation
                    array(
                        'id' => 'loading_animation',
                        'type' => 'select',
                        'title' => esc_html__('Loading Animation', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose type of preload animation', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'none' => esc_html__('No animation','g5plus-megatron'),
                            'cube' => esc_html__('Cube','g5plus-megatron'),
                            'double-bounce' => esc_html__('Double bounce','g5plus-megatron'),
                            'wave' => esc_html__('Wave','g5plus-megatron'),
                            'pulse' => esc_html__('Pulse','g5plus-megatron'),
                            'chasing-dots' => esc_html__('Chasing dots','g5plus-megatron'),
                            'three-bounce' => esc_html__('Three bounce','g5plus-megatron'),
                            'circle' => esc_html__('Circle','g5plus-megatron'),
                            'fading-circle' => esc_html__('Fading circle','g5plus-megatron'),
                            'folding-cube' => esc_html__('Folding cube','g5plus-megatron'),
                        ),
                        'default' => 'none'
                    ),

                    array(
                        'id' => 'loading_logo',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Logo Loading', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload logo loading.', 'g5plus-megatron'),
                        'desc' => '',
                        'required'  => array('loading_animation', 'not_empty_and', array('none')),
                    ),

                    array(
                        'id'       => 'loading_animation_bg_color',
                        'type'     => 'color_rgba',
                        'title'    => esc_html__('Loading Background Color', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set loading background color.', 'g5plus-megatron' ),
                        'default'   => array(
                            'color'     => '#ffffff',
                            'alpha'     => 1
                        ),
                        'output' => array('background-color' => '.site-loading'),
                        'validate' => 'colorrgba',
                        'required'  => array('loading_animation', 'not_empty_and', array('none')),
                    ),

                    //Spinner Color
                    array(
                        'id'       => 'spinner_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Spinner color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a spinner color', 'g5plus-megatron'),
                        'default'  => '',
                        'validate' => 'color',
                        'output' => array('background-color' => '.sk-spinner-pulse,.sk-rotating-plane,.sk-double-bounce .sk-child,.sk-wave .sk-rect,.sk-chasing-dots .sk-child,.sk-three-bounce .sk-child,.sk-circle .sk-child:before,.sk-fading-circle .sk-circle:before,.sk-folding-cube .sk-cube:before'),
                        'required'  => array('loading_animation', 'not_empty_and', array('none')),
                    ),
                )
            );

            // Custom Favicon
            $this->sections[] = array(
                'title'  => esc_html__( 'Custom Favicon', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-eye-open',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id' => 'custom_favicon',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Custom favicon', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload a 16px x 16px Png/Gif/ico image that will represent your website favicon', 'g5plus-megatron'),
                        'desc' => ''
                    ),
                    array(
                        'id' => 'custom_ios_title',
                        'type' => 'text',
                        'title' => esc_html__('Custom iOS Bookmark Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enter a custom title for your site for when it is added as an iOS bookmark.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'custom_ios_icon57',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Custom iOS 57x57', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload a 57px x 57px Png image that will be your website bookmark on non-retina iOS devices.', 'g5plus-megatron'),
                        'desc' => ''
                    ),
                    array(
                        'id' => 'custom_ios_icon72',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Custom iOS 72x72', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload a 72px x 72px Png image that will be your website bookmark on non-retina iOS devices.', 'g5plus-megatron'),
                        'desc' => ''
                    ),
                    array(
                        'id' => 'custom_ios_icon114',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Custom iOS 114x114', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload a 114px x 114px Png image that will be your website bookmark on retina iOS devices.', 'g5plus-megatron'),
                        'desc' => ''
                    ),
                    array(
                        'id' => 'custom_ios_icon144',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Custom iOS 144x144', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload a 144px x 144px Png image that will be your website bookmark on retina iOS devices.', 'g5plus-megatron'),
                        'desc' => ''
                    ),
                )
            );


            // 404
            $this->sections[] = array(
                'title'  => esc_html__( '404 Setting', 'g5plus-megatron' ),
                'desc'   => '',
                'subsection' => true,
                'icon'   => 'el el-error',
                'fields' => array(

                    array(
                        'id'        => 'title_404',
                        'type'      => 'text',
                        'title'     => esc_html__('Title 404', 'g5plus-megatron'),
                        'default'   => '404 OPPS !',
                    ),
                    array(
                        'id'        => 'subtitle_404',
                        'type'      => 'textarea',
                        'title'     => esc_html__('Subtitle 404', 'g5plus-megatron'),
                        'default'   => 'The page you are looking for does not exist.',
                    ),
                    array(
                        'id'        => 'go_back_url_404',
                        'type'      => 'text',
                        'title'     => esc_html__('Go back link', 'g5plus-megatron'),
                        'default'   => '',
                    ),
                    array(
                        'id' => 'logo_default_404',
                        'type' => 'button_set',
                        'title' => esc_html__('Use logo default', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'Yes','0' => 'No'),
                        'default' => '1'
                    ),
                    array(
                        'id' => 'logo_404',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Logo', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your logo here.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo.png'
                        ),
                        'required'  => array('logo_default_404', '=', array('0')),
                    ),
                    array(
                        'id' => 'logo_retina_404',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Logo Retina', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your logo retina here.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo-2x.png'
                        ),
                        'required'  => array('logo_default_404', '=', array('0')),
                    ),

                    array(
                        'id' => 'header_default_404',
                        'type' => 'button_set',
                        'title' => esc_html__('Use header default', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'Yes','0' => 'No'),
                        'default' => '0'
                    ),

                    array(
                        'id' => 'header_404_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Header Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select a header layout option from the examples.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'header-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-1.png'),
                            'header-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-2.png'),
                            'header-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-3.png'),
                            'header-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-4.png'),
                            'header-5' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-5.png'),
                            'header-6' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-6.png'),
                            'header-7' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-7.png'),
                            'header-8' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-8.png'),
                        ),
                        'default' => 'header-5',
                        'required'  => array('header_default_404', '=', array('0')),
                    ),
                    array(
                        'id'        => 'header_404_nav_border_top',
                        'type'      => 'button_set',
                        'title'     => esc_html__('Header navigation border top', 'g5plus-megatron'),
                        'options'  => array(
                            'none'              => esc_html__('None','g5plus-megatron'),
                            'bottom-bordered'   => esc_html__('Solid','g5plus-megatron'),
                        ),
                        'default'  => 'bottom-bordered',
                        'required'  => array('header_default_404', '=', array('0')),
                    ),
                    array(
                        'id'        => 'header_404_nav_border_bottom',
                        'type'      => 'button_set',
                        'title'     => esc_html__('Header navigation border bottom style', 'g5plus-megatron'),
                        'options'  => array(
                            'none'                          => esc_html__('None','g5plus-megatron'),
                            'bottom-border-solid'           => esc_html__('Solid','g5plus-megatron'),
                            'bottom-border-gradient'        => esc_html__('Gradient','g5plus-megatron'),
                            'bottom-border-gradient w2p3'   => esc_html__('Gradient 2','g5plus-megatron'),
                        ),
                        'default'  => 'bottom-border-solid',
                        'required'  => array('header_default_404', '=', array('0')),
                    )
                )
            );

            // Pages Setting
            $this->sections[] = array(
                'title'  => esc_html__( 'Pages Setting', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-th',
                'fields' => array(
                    array(
                        'id' => 'page_layout',
                        'type' => 'button_set',
                        'title' => esc_html__('Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Page Layout', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'full' => esc_html__('Full Width','g5plus-megatron'),
                            'container' => esc_html__('Container','g5plus-megatron'),
                            'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
                        ),
                        'default' => 'container'
                    ),
                    array(
                        'id' => 'page_sidebar',
                        'type' => 'image_select',
                        'title' => esc_html__('Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar Style', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'none' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-none.png'),
                            'left' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-left.png'),
                            'right' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-right.png'),
                            'both' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-both.png'),
                        ),
                        'default' => 'right'
                    ),

                    array(
                        'id' => 'page_sidebar_width',
                        'type' => 'button_set',
                        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'small' => esc_html__('Small (1/4)','g5plus-megatron'),
                            'large' => esc_html__('Large (1/3)','g5plus-megatron')
                        ),
                        'default' => 'small',
                        'required'  => array('page_sidebar', '=', array('left','both','right')),
                    ),



                    array(
                        'id' => 'page_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default left sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'sidebar-1',
                        'required'  => array('page_sidebar', '=', array('left','both')),
                    ),
                    array(
                        'id' => 'page_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default right sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'sidebar-2',
                        'required'  => array('page_sidebar', '=', array('right','both')),
                    ),

                    array(
                        'id' => 'page_comment',
                        'type' => 'button_set',
                        'title' => esc_html__('Page Comment', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable page comment', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),


                    array(
                        'id' => 'section-page-title-start',
                        'type' => 'section',
                        'title' => esc_html__('Page Title Options', 'g5plus-megatron'),
                        'indent' => true
                    ),

                    array(
                        'id' => 'show_page_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Page Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Page Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'page_sub_title',
                        'type' => 'text',
                        'title' => esc_html__('Sub Title', 'g5plus-megatron'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'page_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Page Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default'  => 'center',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'page_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '120px',
                            'padding-bottom'  => '100px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'page_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title bottom margin.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'page_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'page_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'page_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for page title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'page_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for page title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'page_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background Image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload page title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $page_title_bg_url
                        ),
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'page_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Page Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Page Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default'  => '1',
                        'required'  => array(
                            array('show_page_title', '=', array('1')),
                            array('page_title_bg_image', '!=', ''),
                        ),
                    ),

                    array(
                        'id'       => 'page_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'center',
                        'required'  => array(
                            array('show_page_title', '=', array('1')),
                            array('page_title_bg_image', '!=', ''),
                            array('page_title_parallax', '=', '1'),
                        ),
                    ),

                    array(
                        'id' => 'breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Pages Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '1',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_page_title', '=', array('1')),
                            array('breadcrumbs', '=', array('1')),
                        ),
                    ),

                    array(
                        'id' => 'breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_page_title', '=', array('1')),
                            array('breadcrumbs', '=', array('1')),
                            array('breadcrumbs_style', '=', array('float')),
                        ),
                    ),

                    array(
                        'id' => 'section-page-title-end',
                        'type' => 'section',
                        'indent' => false
                    ),


                )
            );

            // Search Setting
            $this->sections[] = array(
                'title'  => esc_html__( 'Search Pages Setting', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-search',
                'fields' => array(
                    array(
                        'id' => 'search_layout',
                        'type' => 'button_set',
                        'title' => esc_html__('Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Page Layout', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'full' => esc_html__('Full Width','g5plus-megatron'),
                            'container' => esc_html__('Container','g5plus-megatron'),
                            'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
                        ),
                        'default' => 'container'
                    ),
                    array(
                        'id' => 'search_sidebar',
                        'type' => 'image_select',
                        'title' => esc_html__('Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar Style', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'none' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-none.png'),
                            'left' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-left.png'),
                            'right' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-right.png'),
                            'both' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-both.png'),
                        ),
                        'default' => 'right'
                    ),

                    array(
                        'id' => 'search_sidebar_width',
                        'type' => 'button_set',
                        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'small' => esc_html__('Small (1/4)','g5plus-megatron'),
                            'large' => esc_html__('Large (1/3)','g5plus-megatron')
                        ),
                        'default' => 'small',
                        'required'  => array('search_sidebar', '=', array('left','both','right')),
                    ),

                    array(
                        'id' => 'search_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default left sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'sidebar-1',
                        'required'  => array('search_sidebar', '=', array('left','both')),
                    ),

                    array(
                        'id' => 'search_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default right sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'sidebar-2',
                        'required'  => array('search_sidebar', '=', array('right','both')),
                    ),
                )
            );


	        // Archive Setting
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Archive Setting', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-folder-close',
		        'fields' => array(
                    array(
                        'id' => 'archive_display_type',
                        'type' => 'select',
                        'title' => esc_html__('Archive Display Type', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select archive display type', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'large-image' => esc_html__('Large Image','g5plus-megatron'),
                            'medium-image' => esc_html__('Medium Image','g5plus-megatron'),
                            'timeline' => esc_html__('Timeline','g5plus-megatron'),
                            'masonry' => esc_html__('Masonry','g5plus-megatron'),
                        ),
                        'default' => 'large-image'
                    ),

                    array(
                        'id' => 'archive_display_columns',
                        'type' => 'select',
                        'title' => esc_html__('Archive Display Columns', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the number of columns to display on archive pages.','g5plus-megatron'),
                        'options' => array(
                            '2'		=> '2',
                            '3'		=> '3',
                            '4'		=> '4',
                            '5'		=> '5',
                        ),
                        'desc' => '',
                        'default' => '2',
                        'required' => array('archive_display_type','=',array('masonry')),
                    ),

                    array(
                        'id' => 'archive_paging_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Paging Style', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select archive paging style', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'default' => esc_html__('Default','g5plus-megatron'),
                            'load-more' => esc_html__('Load More','g5plus-megatron'),
                            'infinity-scroll' => esc_html__('Infinity Scroll','g5plus-megatron')
                        ),
                        'default' => 'default'
                    ),

                    array(
                        'id' => 'section_archive_layout_start',
                        'type' => 'section',
                        'title' => esc_html__('Layout Options', 'g5plus-megatron'),
                        'indent' => true
                    ),


			        array(
				        'id' => 'archive_layout',
				        'type' => 'button_set',
				        'title' => esc_html__('Layout', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select Archive Layout', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
                            'full' => esc_html__('Full Width','g5plus-megatron'),
                            'container' => esc_html__('Container','g5plus-megatron'),
                            'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
                        ),
				        'default' => 'container'
			        ),

			        array(
				        'id' => 'archive_sidebar',
				        'type' => 'image_select',
				        'title' => esc_html__('Sidebar', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Set Sidebar Style', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
					        'none' => array('title' => '', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-none.png'),
					        'left' => array('title' => '', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-left.png'),
					        'right' => array('title' => '', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-right.png'),
					        'both' => array('title' => '', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-both.png'),
				        ),
				        'default' => 'left'
			        ),


			        array(
				        'id' => 'archive_sidebar_width',
				        'type' => 'button_set',
				        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
                            'small' => esc_html__('Small (1/4)','g5plus-megatron'),
                            'large' => esc_html__('Large (1/3)','g5plus-megatron')
                        ),
				        'default' => 'small',
				        'required'  => array('archive_sidebar', '=', array('left','both','right')),
			        ),

			        array(
				        'id' => 'archive_left_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Left Sidebar', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Choose the default left sidebar','g5plus-megatron'),
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'sidebar-1',
				        'required'  => array('archive_sidebar', '=', array('left','both')),
			        ),
			        array(
				        'id' => 'archive_right_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Right Sidebar', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Choose the default right sidebar','g5plus-megatron'),
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'sidebar-2',
				        'required'  => array('archive_sidebar', '=', array('right','both')),
			        ),

                    array(
                        'id' => 'section-archive-layout-end',
                        'type' => 'section',
                        'indent' => false
                    ),



                    array(
                        'id' => 'section_archive_title_start',
                        'type' => 'section',
                        'title' => esc_html__('Page Title Options', 'g5plus-megatron'),
                        'indent' => true
                    ),

                    array(
                        'id' => 'show_archive_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Archive Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Archive Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'archive_sub_title',
                        'type' => 'text',
                        'title' => esc_html__('Archive Sub Title', 'g5plus-megatron'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),


                    array(
                        'id'       => 'archive_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Archive Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default'  => 'center',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),


                    array(
                        'id'             => 'archive_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set archive title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '90px',
                            'padding-bottom'  => '70px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),


                    array(
                        'id'             => 'archive_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set archive title bottom margin.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for archive title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for archive title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),



                    array(
                        'id' => 'archive_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background Image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload archive title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $archive_title_bg_url
                        ),
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'archive_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Archive Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Archive Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '1',
                        'required'  => array(
                            array('show_archive_title', '=', array('1')),
                            array('archive_title_bg_image', '!=', ''),
                        ),
                    ),

                    array(
                        'id'       => 'archive_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'center',
                        'required'  => array(
                            array('show_archive_title', '=', array('1')),
                            array('archive_title_bg_image', '!=', ''),
                            array('archive_title_parallax', '=', '1'),
                        ),
                    ),

                    array(
                        'id' => 'archive_breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Archive Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'Enable','0' => 'Disable'),
                        'default' => '1',
                        'required'  => array('show_archive_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_archive_title', '=', array('1')),
                            array('archive_breadcrumbs', '=', array('1')),
                        ),
                    ),

                    array(
                        'id' => 'archive_breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_archive_title', '=', array('1')),
                            array('archive_breadcrumbs', '=', array('1')),
                            array('archive_breadcrumbs_style', '=', array('float')),
                        ),
                    ),

                    array(
                        'id' => 'section_archive_title_end',
                        'type' => 'section',
                        'indent' => false
                    ),



		        )
	        );

	        // Single Blog
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Single Blog', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-file',
		        'subsection' => true,
		        'fields' => array(

                    array(
                        'id' => 'show_post_navigation',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Post Navigation', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Post Navigation', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'show_author_info',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Author Info', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Author Info', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'show_related_post',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Related Post', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Related Post', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),

                    array(
                        'id'       => 'related_post_count',
                        'type'     => 'text',
                        'title'    => esc_html__('Related Post Number', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Total Record Of Related Post.', 'g5plus-megatron'),
                        'validate' => 'number',
                        'default'  => '6',
                        'required'  => array('show_related_post', '=', array('1')),
                    ),

                    array(
                        'id'       => 'related_post_columns',
                        'type'     => 'select',
                        'title'    => esc_html__('Related Post Columns', 'g5plus-megatron'),
                        'default'  => '3',
                        'options' => array('2' => '2' ,'3' => '3','4' => '4'),
                        'select2' => array('allowClear' =>  false) ,
                        'required'  => array('show_related_post', '=', array('1')),
                    ),

                    array(
                        'id' => 'related_post_condition',
                        'type' => 'checkbox',
                        'title' => esc_html__('Related Post Condition', 'g5plus-megatron'),
                        'options' => array(
                            'category' => esc_html__('Same Category','g5plus-megatron'),
                            'tag' => esc_html__('Same Tag','g5plus-megatron'),
                        ),
                        'default' => array(
                            'category'      => '1',
                            'tag'      => '1',
                        ),
                        'required'  => array('show_related_post', '=', array('1')),
                    ),


                    array(
                        'id' => 'section_single_blog_layout_start',
                        'type' => 'section',
                        'title' => esc_html__('Layout Options', 'g5plus-megatron'),
                        'indent' => true
                    ),


			        array(
				        'id' => 'single_blog_layout',
				        'type' => 'button_set',
				        'title' => esc_html__('Layout', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select Single Blog Layout', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
                            'full' => esc_html__('Full Width','g5plus-megatron'),
                            'container' => esc_html__('Container','g5plus-megatron'),
                            'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
                        ),
				        'default' => 'container'
			        ),

			        array(
				        'id' => 'single_blog_sidebar',
				        'type' => 'image_select',
				        'title' => esc_html__('Sidebar', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Set Sidebar Style', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
					        'none' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-none.png'),
					        'left' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-left.png'),
					        'right' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-right.png'),
					        'both' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-both.png'),
				        ),
				        'default' => 'right'
			        ),

			        array(
				        'id' => 'single_blog_sidebar_width',
				        'type' => 'button_set',
				        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
                            'small' => esc_html__('Small (1/4)','g5plus-megatron'),
                            'large' => esc_html__('Large (1/3)','g5plus-megatron')
                        ),
				        'default' => 'small',
				        'required'  => array('single_blog_sidebar', '=', array('left','both','right')),
			        ),


			        array(
				        'id' => 'single_blog_left_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Left Sidebar', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Choose the default left sidebar','g5plus-megatron'),
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'sidebar-1',
				        'required'  => array('single_blog_sidebar', '=', array('left','both')),
			        ),

			        array(
				        'id' => 'single_blog_right_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Right Sidebar', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Choose the default right sidebar','g5plus-megatron'),
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'sidebar-1',
				        'required'  => array('single_blog_sidebar', '=', array('right','both')),
			        ),

                    array(
                        'id' => 'section_single_blog_layout_end',
                        'type' => 'section',
                        'indent' => false
                    ),

                    array(
                        'id' => 'section_single_blog_title_start',
                        'type' => 'section',
                        'title' => esc_html__('Page Title Options', 'g5plus-megatron'),
                        'indent' => true
                    ),

                    array(
                        'id' => 'show_single_blog_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Page Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Page Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),


                    array(
                        'id' => 'single_blog_sub_title',
                        'type' => 'text',
                        'title' => esc_html__('Page Sub Title', 'g5plus-megatron'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'single_blog_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Page Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default'  => 'center',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'single_blog_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '90px',
                            'padding-bottom'  => '70px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'single_blog_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title bottom margin.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_blog_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_blog_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_blog_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for archive title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_blog_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for page title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_blog_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background Image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload page title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $archive_title_bg_url
                        ),
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'single_blog_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Page Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Page Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '1',
                        'required'  => array(
                            array('show_single_blog_title', '=', array('1')),
                            array('single_blog_title_bg_image', '!=', ''),
                        ),
                    ),

                    array(
                        'id'       => 'single_blog_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'center',
                        'required'  => array(
                            array('show_single_blog_title', '=', array('1')),
                            array('single_blog_title_bg_image', '!=', ''),
                            array('single_blog_title_parallax', '=', '1'),
                        ),
                    ),

                    array(
                        'id' => 'single_blog_breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Page Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'Enable','0' => 'Disable'),
                        'default' => '1',
                        'required'  => array('show_single_blog_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_blog_breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_single_blog_title', '=', array('1')),
                            array('single_blog_breadcrumbs', '=', array('1')),
                        ),
                    ),

                    array(
                        'id' => 'single_blog_breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_single_blog_title', '=', array('1')),
                            array('single_blog_breadcrumbs', '=', array('1')),
                            array('single_blog_breadcrumbs_style', '=', array('float')),
                        ),
                    ),



                    array(
                        'id' => 'section_single_blog_title_end',
                        'type' => 'section',
                        'indent' => false
                    ),





		        )
	        );

            // Logo
            $this->sections[] = array(
                'title'  => esc_html__( 'Logo Setting', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-leaf',
                'fields' => array(
	                array(
		                'id' => 'section-logo-desktop',
		                'type' => 'section',
		                'title' => esc_html__('Logo Desktop', 'g5plus-megatron'),
		                'indent' => true
	                ),
                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Logo', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your logo here.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo.png'
                        )
                    ),
	                array(
		                'id' => 'logo_retina',
		                'type' => 'media',
		                'url'=> true,
		                'title' => esc_html__('Logo Retina', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Upload your logo retina here.', 'g5plus-megatron'),
		                'desc' => '',
		                'default' => array(
			                'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo-2x.png'
		                )
	                ),
	                array(
		                'id'        => 'logo_height',
		                'type'      => 'dimensions',
		                'title'     => esc_html__('Logo Height', 'g5plus-megatron'),
		                'desc'      => esc_html__('You can set a height for the logo here', 'g5plus-megatron'),
		                'units' => 'px',
		                'width'    =>  false,
		                'default'  => array(
			                'Height'  => ''
		                )
	                ),
                    array(
                        'id'        => 'logo_max_height',
                        'type'      => 'dimensions',
                        'title'     => esc_html__('Logo Max Height', 'g5plus-megatron'),
                        'desc'      => esc_html__('You can set a max height for the logo here', 'g5plus-megatron'),
                        'units' => 'px',
                        'width'    =>  false,
                        'default'  => array(
                            'Height'  => ''
                        )
                    ),
	                array(
		                'id'             => 'logo_padding',
		                'type'           => 'spacing',
		                'mode'           => 'padding',
		                'units'          => 'px',
		                'units_extended' => 'false',
		                'title'          => esc_html__('Logo Top/Bottom Padding', 'g5plus-megatron'),
		                'subtitle'       => esc_html__('This must be numeric (no px). Leave balnk for default.', 'g5plus-megatron'),
		                'desc'           => esc_html__('If you would like to override the default logo top/bottom padding, then you can do so here.', 'g5plus-megatron'),
		                'left'          => false,
		                'right'          => false,
		                'default'            => array(
			                'padding-top'     => '',
			                'padding-bottom'  => '',
			                'units'          => 'px',
		                )
	                ),
	                array(
		                'id' => 'sticky_logo',
		                'type' => 'media',
		                'url'=> true,
		                'title' => esc_html__('Sticky Logo', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Upload a sticky version of your logo here', 'g5plus-megatron'),
		                'desc' => '',
		                'default' => array(
			                'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo.png'
		                )
	                ),
	                array(
		                'id' => 'sticky_logo_retina',
		                'type' => 'media',
		                'url'=> true,
		                'title' => esc_html__('Sticky Logo Retina', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Upload a sticky version of your logo retina here', 'g5plus-megatron'),
		                'desc' => '',
		                'default' => array(
			                'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo-2x.png'
		                )
	                ),

	                array(
		                'id' => 'section-logo-mobile',
		                'type' => 'section',
		                'title' => esc_html__('Logo Mobile', 'g5plus-megatron'),
		                'indent' => true
	                ),
	                array(
		                'id' => 'mobile_logo',
		                'type' => 'media',
		                'url'=> true,
		                'title' => esc_html__('Mobile Logo', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Upload your logo here.', 'g5plus-megatron'),
		                'desc' => '',
		                'default' => array(
			                'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo-mobile.png'
		                )
	                ),
	                array(
		                'id' => 'mobile_logo_retina',
		                'type' => 'media',
		                'url'=> true,
		                'title' => esc_html__('Mobile Logo Retina', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Upload your logo retina here.', 'g5plus-megatron'),
		                'desc' => '',
		                'default' => array(
			                'url' => G5PLUS_THEME_URL . 'assets/images/theme-options/logo-mobile-2x.png'
		                )
	                ),
	                array(
		                'id'        => 'mobile_logo_height',
		                'type'      => 'dimensions',
		                'title'     => esc_html__('Logo Height', 'g5plus-megatron'),
		                'desc'      => esc_html__('You can set a height for the logo here', 'g5plus-megatron'),
		                'units' => 'px',
		                'width'    =>  false,
		                'default'  => array(
			                'Height'  => ''
		                )
	                ),
	                array(
		                'id'        => 'mobile_logo_max_height',
		                'type'      => 'dimensions',
		                'title'     => esc_html__('Mobile Logo Max Height', 'g5plus-megatron'),
		                'desc'      => esc_html__('You can set a max height for the logo mobile here', 'g5plus-megatron'),
		                'units' => 'px',
		                'width'    =>  false,
		                'default'  => array(
			                'Height'  => ''
		                )
	                ),
	                array(
		                'id'        => 'mobile_logo_padding',
		                'type'      => 'dimensions',
		                'title'     => esc_html__('Logo Top/Bottom Padding', 'g5plus-megatron'),
		                'desc'      => esc_html__('If you would like to override the default logo top/bottom padding, then you can do so here', 'g5plus-megatron'),
		                'units' => 'px',
		                'width'    =>  false,
		                'default'  => array(
			                'Height'  => ''
		                )
	                ),

                )
            );
	        // Top Drawer
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Top Drawer', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-minus',
		        'fields' => array(
			        array(
				        'id'       => 'top_drawer_type',
				        'type'     => 'button_set',
				        'title'    => esc_html__( 'Top Drawer Type', 'g5plus-megatron' ),
				        'subtitle' => esc_html__( 'Set top drawer type.', 'g5plus-megatron' ),
				        'desc'     => '',
				        'options'  => array( 'none' => 'Disable', 'show' => 'Always Show', 'toggle' => 'Toggle' ),
				        'default'  => 'none'
			        ),
			        array(
				        'id'       => 'top_drawer_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Top Drawer Sidebar', 'g5plus-megatron'),
				        'subtitle' => "Choose the default top drawer sidebar",
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'top_drawer_sidebar',
				        'required' => array('top_drawer_type','=',array('show','toggle')),
			        ),

			        array(
				        'id' => 'top_drawer_wrapper_layout',
				        'type' => 'button_set',
				        'title' => esc_html__('Top Drawer Wrapper Layout', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select top drawer wrapper layout', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array('full' => 'Full Width','container' => 'Container', 'container-fluid' => 'Container Fluid'),
				        'default' => 'container',
				        'required' => array('top_drawer_type','=',array('show','toggle')),
			        ),

			        array(
				        'id'       => 'top_drawer_hide_mobile',
				        'type'     => 'button_set',
				        'title'    => esc_html__( 'Show/Hide Top Drawer on mobile', 'g5plus-megatron' ),
				        'desc'     => '',
				        'options'  => array( '1' => 'On', '0' => 'Off' ),
				        'default'  => '1',
				        'required' => array('top_drawer_type','=',array('show','toggle')),
			        ),

		        )
	        );


            // Header
            $this->sections[] = array(
                'title'  => esc_html__( 'Header', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-credit-card',
                'fields' => array(
                    array(
                        'id' => 'header_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Header Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select a header layout option from the examples.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'header-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-1.png'),
	                        'header-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-2.png'),
	                        'header-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-3.png'),
	                        'header-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-4.png'),
	                        'header-5' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-5.png'),
	                        'header-6' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-6.png'),
	                        'header-7' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-7.png'),
	                        'header-8' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-8.png'),
                        ),
                        'default' => 'header-1'
                    ),
	                array(
		                'id'        => 'header_boxed',
		                'type'      => 'button_set',
		                'title'     => esc_html__('Header Boxed', 'g5plus-megatron'),
		                'options'  => array(
			                '1'     => esc_html__('On','g5plus-megatron'),
			                '0'      => esc_html__('Off','g5plus-megatron'),
		                ),
		                'default'  => '0'
	                ),
	                array(
		                'id'        => 'header_container_layout',
		                'type'      => 'button_set',
		                'title'     => esc_html__('Header container layout', 'g5plus-megatron'),
		                'options'  => array(
			                'container'     => esc_html__('Container','g5plus-megatron'),
			                'container-full'      => esc_html__('Container Full','g5plus-megatron'),
		                ),
		                'default'  => 'container'
	                ),
	                array(
		                'id'       => 'header_float',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Header Float', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Enable/Disable Header Float.', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array( '1' => 'On', '0' => 'Off' ),
		                'default'  => '0',
	                ),
	                array(
		                'id'       => 'header_scheme',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Header scheme', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set header scheme', 'g5plus-megatron' ),
		                'default'  => 'header-light',
		                'options'  => array(
			                'header-light'         => esc_html__('Light','g5plus-megatron'),
			                'header-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
			                'header-gray'          => esc_html__('Gray','g5plus-megatron'),
			                'header-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
			                'header-dark'          => esc_html__('Dark','g5plus-megatron'),
			                'header-transparent'   => esc_html__('Transparent','g5plus-megatron'),
			                'header-overlay'       => esc_html__('Overlay','g5plus-megatron'),
		                )
	                ),
	                array(
		                'id'            => 'header_scheme_color',
		                'type'          => 'color',
		                'title'         => esc_html__('Header scheme background color', 'g5plus-megatron'),
		                'subtitle'      => esc_html__('Set header scheme background color.', 'g5plus-megatron'),
		                'transparent'   => false,
		                'default'       => '#000',
		                'validate'      => 'color',
		                'required'      => array('header_scheme', '=', 'header-overlay'),
	                ),
	                array(
		                'id'        => 'header_scheme_opacity',
		                'type'      => 'slider',
		                'title'     => esc_html__('Header scheme opacity', 'g5plus-megatron'),
		                'subtitle'  => esc_html__('Set the opacity level of the overlay.', 'g5plus-megatron'),
		                'default'   => '20',
		                'min'       => 0,
		                'step'      => 1,
		                'max'       => 100,
		                'required'  => array('header_scheme', '=', 'header-overlay'),
	                ),
	                array(
		                'id'            => 'header_scheme_text_color',
		                'type'          => 'color',
		                'title'         => esc_html__('Header scheme text color', 'g5plus-megatron'),
		                'subtitle'      => esc_html__('Set header scheme text color.', 'g5plus-megatron'),
		                'transparent'   => false,
		                'default'       => '#fff',
		                'validate'      => 'color',
		                'required'      => array('header_scheme', '=', 'header-overlay'),
	                ),

	                array(
		                'id'       => 'header_nav_scheme',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Header navigation scheme', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set header navigation scheme', 'g5plus-megatron' ),
		                'default'  => 'header-light',
		                'options'  => array(
			                'header-light'         => esc_html__('Light','g5plus-megatron'),
			                'header-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
			                'header-gray'          => esc_html__('Gray','g5plus-megatron'),
			                'header-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
			                'header-dark'          => esc_html__('Dark','g5plus-megatron'),
			                'header-transparent'   => esc_html__('Transparent','g5plus-megatron'),
			                'header-overlay'       => esc_html__('Overlay','g5plus-megatron'),
		                )
	                ),
	                array(
		                'id'            => 'header_nav_scheme_color',
		                'type'          => 'color',
		                'title'         => esc_html__('Header navigation scheme color', 'g5plus-megatron'),
		                'subtitle'      => esc_html__('Set header navigation scheme color.', 'g5plus-megatron'),
		                'transparent'   => false,
		                'default'       => '#000',
		                'validate'      => 'color',
		                'required'      => array('header_nav_scheme', '=', 'header-overlay'),
	                ),
	                array(
		                'id'        => 'header_nav_scheme_opacity',
		                'type'      => 'slider',
		                'title'     => esc_html__('Header navigation scheme opacity', 'g5plus-megatron'),
		                'subtitle'  => esc_html__('Set the opacity level of the overlay.', 'g5plus-megatron'),
		                'default'   => '20',
		                'min'       => 0,
		                'step'      => 1,
		                'max'       => 100,
		                'required'  => array('header_nav_scheme', '=', 'header-overlay'),
	                ),
	                array(
		                'id'            => 'header_nav_scheme_text_color',
		                'type'          => 'color',
		                'title'         => esc_html__('Header scheme text color', 'g5plus-megatron'),
		                'subtitle'      => esc_html__('Set header scheme text color.', 'g5plus-megatron'),
		                'transparent'   => false,
		                'default'       => '#fff',
		                'validate'      => 'color',
		                'required'      => array('header_nav_scheme', '=', 'header-overlay'),
	                ),

	                array(
		                'id'        => 'header_nav_border_top',
		                'type'      => 'button_set',
		                'title'     => esc_html__('Header navigation border top', 'g5plus-megatron'),
		                'options'  => array(
			                'none'              => esc_html__('None','g5plus-megatron'),
			                'bottom-bordered'   => esc_html__('Solid','g5plus-megatron'),
		                ),
		                'default'  => 'none'
	                ),
	                array(
		                'id'        => 'header_nav_border_bottom',
		                'type'      => 'button_set',
		                'title'     => esc_html__('Header navigation border bottom style', 'g5plus-megatron'),
		                'options'  => array(
			                'none'                          => esc_html__('None','g5plus-megatron'),
			                'bottom-border-solid'           => esc_html__('Solid','g5plus-megatron'),
			                'bottom-border-gradient'        => esc_html__('Gradient','g5plus-megatron'),
			                'bottom-border-gradient w2p3'   => esc_html__('Gradient 2','g5plus-megatron'),
		                ),
		                'default'  => 'none'
	                ),
                    array(
                        'id'       => 'header_sticky',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Show/Hide Header Sticky', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Show Hide header Sticky.', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
	                        '1' => esc_html__('On','g5plus-megatron'),
	                        '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default'  => '1'
                    ),

	                array(
		                'id'       => 'header_sticky_scheme',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Header sticky scheme', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Choose header sticky scheme', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array(
			                'sticky-inherit'   => esc_html__('Inherit','g5plus-megatron'),
			                'sticky-gray'      => esc_html__('Gray','g5plus-megatron'),
			                'sticky-light'     => esc_html__('Light','g5plus-megatron'),
			                'sticky-dark'      => esc_html__('Dark','g5plus-megatron')
		                ),
		                'default'  => 'sticky-inherit'
	                ),
                )
            );

	        // Top Bar
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Top Bar', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-minus',
		        'subsection' => true,
		        'fields' => array(
			        array(
				        'id'       => 'top_bar',
				        'type'     => 'button_set',
				        'title'    => esc_html__( 'Show/Hide Top Bar', 'g5plus-megatron' ),
				        'subtitle' => esc_html__( 'Show Hide Top Bar.', 'g5plus-megatron' ),
				        'desc'     => '',
				        'options'  => array( '1' => 'On', '0' => 'Off' ),
				        'default'  => '0',
			        ),
			        array(
				        'id' => 'top_bar_layout',
				        'type' => 'image_select',
				        'title' => esc_html__('Top bar Layout', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select the top bar column layout.', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
					        'top-bar-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-1.jpg'),
					        'top-bar-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-2.jpg'),
					        'top-bar-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-3.jpg'),
					        'top-bar-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-4.jpg'),
				        ),
				        'default' => 'top-bar-1',
				        'required' => array('top_bar','=','1'),
			        ),

			        array(
				        'id' => 'top_bar_left_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Top Left Sidebar', 'g5plus-megatron'),
				        'subtitle' => "Choose the default top left sidebar",
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'top_bar_left',
				        'required' => array('top_bar','=','1'),
			        ),
			        array(
				        'id' => 'top_bar_right_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Top Right Sidebar', 'g5plus-megatron'),
				        'subtitle' => "Choose the default top right sidebar",
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'top_bar_right',
				        'required' => array('top_bar','=','1'),
			        ),
			        array(
				        'id'       => 'top_bar_scheme',
				        'type'     => 'button_set',
				        'title'    => esc_html__( 'Top bar scheme', 'g5plus-megatron' ),
				        'subtitle' => esc_html__( 'Set top bar scheme', 'g5plus-megatron' ),
				        'default'  => 'top-bar-light',
				        'options'  => array(
					        'top-bar-light'         => esc_html__('Light','g5plus-megatron'),
					        'top-bar-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					        'top-bar-gray'          => esc_html__('Gray','g5plus-megatron'),
					        'top-bar-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					        'top-bar-dark'          => esc_html__('Dark','g5plus-megatron'),
					        'top-bar-overlay'       => esc_html__('Overlay','g5plus-megatron'),
					        'top-bar-transparent'   => esc_html__('Transparent','g5plus-megatron'),
				        ),
				        'required' => array('top_bar','=','1'),
			        ),
			        array(
				        'id'        => 'top_bar_border_bottom',
				        'type'      => 'button_set',
				        'title'     => esc_html__('Top bar border bottom', 'g5plus-megatron'),
				        'options'  => array(
					        'none'          => esc_html__('None','g5plus-megatron'),
					        'bordered'      => esc_html__('Bordered','g5plus-megatron'),
				        ),
				        'default'  => 'none',
				        'required' => array('top_bar','=','1'),
			        ),
		        )
	        );

	        // Mobile Header
            $this->sections[] = array(
                'title'  => esc_html__( 'Mobile Header', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-th-list',
                'fields' => array(
	                array(
		                'id' => 'mobile_header_layout',
		                'type' => 'image_select',
		                'title' => esc_html__('Header Layout', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select header mobile layout', 'g5plus-megatron'),
		                'desc' => '',
		                'options' => array(
			                'header-mobile-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-1.png'),
			                'header-mobile-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-2.png'),
			                'header-mobile-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-3.png'),
			                'header-mobile-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/header-mobile-layout-4.png'),
		                ),
		                'default' => 'header-mobile-1'
	                ),
	                array(
		                'id'       => 'mobile_header_responsive_breakpoint',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Mobile header responsive breakpoint', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set mobile header responsive breakpoint', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array(
			                '991' => esc_html__('Medium Devices: < 992px','g5plus-megatron'),
			                '767' => esc_html__('Tablet Portrait: < 768px','g5plus-megatron'),
		                ),
		                'default'  => '991'
	                ),
	                array(
		                'id'       => 'mobile_header_menu_drop',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Menu Drop Type', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set menu drop type for mobile header', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array(
			                'dropdown' => esc_html__('Dropdown Menu','g5plus-megatron'),
			                'fly' => esc_html__('Fly Menu','g5plus-megatron')
		                ),
		                'default'  => 'fly'
	                ),

	                array(
		                'id'       => 'mobile_header_scheme',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Mobile header scheme', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set mobile header scheme', 'g5plus-megatron' ),
		                'default'  => 'header-light',
		                'options'  => array(
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
		                'id'        => 'mobile_header_border_bottom',
		                'type'      => 'button_set',
		                'title'     => esc_html__('Mobile header border bottom', 'g5plus-megatron'),
		                'options'  => array(
			                'none'          => esc_html__('None','g5plus-megatron'),
			                'bordered'      => esc_html__('Bordered','g5plus-megatron'),
			                'container-bordered'      => esc_html__('Container Bordered','g5plus-megatron'),
		                ),
		                'default'  => 'none',
	                ),
	                array(
		                'id'       => 'mobile_header_float',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Mobile header float', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Enable mobile header float mode.', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array(
			                '1' => esc_html__('On','g5plus-megatron'),
			                '0' => esc_html__('Off','g5plus-megatron')
		                ),
		                'default'  => '0'
	                ),
                    array(
                        'id'       => 'mobile_header_stick',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Stick Mobile Header', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Stick Mobile Header.', 'g5plus-megatron' ),
                        'desc'     => '',
	                    'options'  => array( '1' => esc_html__('On','g5plus-megatron'), '0' => esc_html__('Off','g5plus-megatron') ),
                        'default'  => '0'
                    ),
                    array(
                        'id'       => 'mobile_header_search_box',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Search Box', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Search Box.', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'On', '0' => 'Off' ),
                        'default'  => '1'
                    ),
                    array(
                        'id'       => 'mobile_header_shopping_cart',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Shopping Cart', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Shopping Cart', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'On', '0' => 'Off' ),
                        'default'  => '1'
                    ),
                )
            );

	        // Top Bar Mobile
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Top Bar Mobile', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-minus',
		        'subsection' => true,
		        'fields' => array(
			        array(
				        'id'       => 'top_bar_mobile',
				        'type'     => 'button_set',
				        'title'    => esc_html__( 'Show/Hide Top Bar', 'g5plus-megatron' ),
				        'subtitle' => esc_html__( 'Show Hide Top Bar.', 'g5plus-megatron' ),
				        'desc'     => '',
				        'options'  => array( '1' => 'On', '0' => 'Off' ),
				        'default'  => '0',
			        ),
			        array(
				        'id' => 'top_bar_mobile_layout',
				        'type' => 'image_select',
				        'title' => esc_html__('Top bar Layout', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select the top bar column layout.', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
					        'top-bar-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-1.jpg'),
					        'top-bar-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-2.jpg'),
					        'top-bar-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-3.jpg'),
					        'top-bar-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/top-bar-layout-4.jpg'),
				        ),
				        'default' => 'top-bar-1',
				        'required' => array('top_bar_mobile','=','1'),
			        ),

			        array(
				        'id' => 'top_bar_mobile_left_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Top Left Sidebar', 'g5plus-megatron'),
				        'subtitle' => "Choose the default top left sidebar",
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'top_bar_left',
				        'required' => array('top_bar_mobile','=','1'),
			        ),
			        array(
				        'id' => 'top_bar_mobile_right_sidebar',
				        'type' => 'select',
				        'title' => esc_html__('Top Right Sidebar', 'g5plus-megatron'),
				        'subtitle' => "Choose the default top right sidebar",
				        'data'      => 'sidebars',
				        'desc' => '',
				        'default' => 'top_bar_right',
				        'required' => array('top_bar_mobile','=','1'),
			        ),
			        array(
				        'id'       => 'top_bar_mobile_scheme',
				        'type'     => 'button_set',
				        'title'    => esc_html__( 'Top bar mobile scheme', 'g5plus-megatron' ),
				        'subtitle' => esc_html__( 'Set top bar mobile scheme', 'g5plus-megatron' ),
				        'default'  => 'top-bar-light',
				        'options'  => array(
					        'top-bar-light'         => esc_html__('Light','g5plus-megatron'),
					        'top-bar-light-gray'    => esc_html__('Light Gray','g5plus-megatron'),
					        'top-bar-gray'          => esc_html__('Gray','g5plus-megatron'),
					        'top-bar-dark-gray'     => esc_html__('Dark Gray','g5plus-megatron'),
					        'top-bar-dark'          => esc_html__('Dark','g5plus-megatron'),
					        'top-bar-overlay'       => esc_html__('Overlay','g5plus-megatron'),
					        'top-bar-transparent'   => esc_html__('Transparent','g5plus-megatron'),
				        ),
				        'required' => array('top_bar_mobile','=','1'),
			        ),
			        array(
				        'id'        => 'top_bar_mobile_border_bottom',
				        'type'      => 'button_set',
				        'title'     => esc_html__('Top bar mobile border bottom', 'g5plus-megatron'),
				        'options'  => array(
					        'none'          => esc_html__('None','g5plus-megatron'),
					        'bordered'      => esc_html__('Bordered','g5plus-megatron'),
					        'container-bordered'      => esc_html__('Container Bordered','g5plus-megatron'),
				        ),
				        'default'  => 'none',
				        'required' => array('top_bar_mobile','=','1'),
			        ),
		        )
	        );

	        // Header Customize
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Header Customize', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-credit-card',
		        'fields' => array(
			        array(
				        'id' => 'section-header-customize-nav',
				        'type' => 'section',
				        'title' => esc_html__('Header Customize Navigation', 'g5plus-megatron'),
				        'indent' => true
			        ),
			        array(
				        'id'      => 'header_customize_nav',
				        'type'    => 'sorter',
				        'title'   => 'Header customize navigation',
				        'desc'    => 'Organize how you want the layout to appear on the header navigation',
				        'options' => array(
					        'enabled'  => array(
						        'social-profile' => esc_html__('Social Profile','g5plus-megatron'),
					        ),
					        'disabled' => array(
						        'shopping-cart'   => esc_html__('Shopping Cart','g5plus-megatron'),
						        'search-button' => esc_html__('Search Button','g5plus-megatron'),
						        'canvas-menu' => esc_html__('Canvas Menu','g5plus-megatron'),
						        'custom-text' => esc_html__('Custom Text','g5plus-megatron'),
					        )
				        )
			        ),
			        array(
				        'id' => 'header_customize_nav_social_profile',
				        'type' => 'select',
				        'multi' => true,
				        'width' => '100%',
				        'title' => esc_html__('Custom social profiles', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select social profile for custom text', 'g5plus-megatron'),
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
				        'desc' => '',
				        'default' => ''
			        ),
			        array(
				        'id' => 'header_customize_nav_text',
				        'type' => 'ace_editor',
				        'mode' => 'html',
				        'theme' => 'monokai',
				        'title' => esc_html__('Custom Text Content', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Add Content for Custom Text', 'g5plus-megatron'),
				        'desc' => '',
				        'default' => '',
				        'options'  => array('minLines'=> 5, 'maxLines' => 60),
			        ),

			        array(
				        'id' => 'section-header-customize-left',
				        'type' => 'section',
				        'title' => esc_html__('Header Customize Left', 'g5plus-megatron'),
				        'indent' => true
			        ),
			        array(
				        'id'      => 'header_customize_left',
				        'type'    => 'sorter',
				        'title'   => 'Header customize left',
				        'desc'    => 'Organize how you want the layout to appear on the header left',
				        'options' => array(
					        'enabled'  => array(
					        ),
					        'disabled' => array(
						        'shopping-cart'   => esc_html__('Shopping Cart','g5plus-megatron'),
						        'search-button' => esc_html__('Search Button','g5plus-megatron'),
						        'social-profile' => esc_html__('Social Profile','g5plus-megatron'),
						        'canvas-menu' => esc_html__('Canvas Menu','g5plus-megatron'),
						        'custom-text' => esc_html__('Custom Text','g5plus-megatron'),
					        )
				        )
			        ),
			        array(
				        'id' => 'header_customize_left_social_profile',
				        'type' => 'select',
				        'multi' => true,
				        'width' => '100%',
				        'title' => esc_html__('Custom social profiles', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select social profile for custom text', 'g5plus-megatron'),
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
				        'desc' => '',
				        'default' => ''
			        ),
			        array(
				        'id' => 'header_customize_left_text',
				        'type' => 'ace_editor',
				        'mode' => 'html',
				        'theme' => 'monokai',
				        'title' => esc_html__('Custom Text Content', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Add Content for Custom Text', 'g5plus-megatron'),
				        'desc' => '',
				        'default' => '',
				        'options'  => array('minLines'=> 5, 'maxLines' => 60),
			        ),

			        array(
				        'id' => 'section-header-customize-right',
				        'type' => 'section',
				        'title' => esc_html__('Header Customize Right', 'g5plus-megatron'),
				        'indent' => true
			        ),
			        array(
				        'id'      => 'header_customize_right',
				        'type'    => 'sorter',
				        'title'   => 'Header customize right',
				        'desc'    => 'Organize how you want the layout to appear on the header right',
				        'options' => array(
					        'enabled'  => array(
					        ),
					        'disabled' => array(
						        'shopping-cart'   => esc_html__('Shopping Cart','g5plus-megatron'),
						        'search-button' => esc_html__('Search Button','g5plus-megatron'),
						        'social-profile' => esc_html__('Social Profile','g5plus-megatron'),
						        'canvas-menu' => esc_html__('Canvas Menu','g5plus-megatron'),
						        'custom-text' => esc_html__('Custom Text','g5plus-megatron'),
					        )
				        )
			        ),
			        array(
				        'id' => 'header_customize_right_social_profile',
				        'type' => 'select',
				        'multi' => true,
				        'width' => '100%',
				        'title' => esc_html__('Custom social profiles', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select social profile for custom text', 'g5plus-megatron'),
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
				        'desc' => '',
				        'default' => ''
			        ),
			        array(
				        'id' => 'header_customize_right_text',
				        'type' => 'ace_editor',
				        'mode' => 'html',
				        'theme' => 'monokai',
				        'title' => esc_html__('Custom Text Content', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Add Content for Custom Text', 'g5plus-megatron'),
				        'desc' => '',
				        'default' => '',
				        'options'  => array('minLines'=> 5, 'maxLines' => 60),
			        ),
		        )
	        );

	        // Footer
            $this->sections[] = array(
                'title'  => esc_html__( 'Footer', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-website',
                'fields' => array(
	                array(
		                'id' => 'section-footer-settings',
		                'type' => 'section',
		                'title' => esc_html__('Footer Settings', 'g5plus-megatron'),
		                'indent' => true
	                ),
	                array(
		                'id' => 'footer_wrapper_layout',
		                'type' => 'button_set',
		                'title' => esc_html__('Footer Wrapper Layout', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select Footer Wrapper Layout', 'g5plus-megatron'),
		                'desc' => '',
		                'options' => array(
			                'full'              => esc_html__('Full Width','g5plus-megatron'),
			                'container-fluid'   => esc_html__('Container Fluid','g5plus-megatron'),
		                ),
		                'default' => 'full'
	                ),
	                array(
		                'id' => 'footer_container_layout',
		                'type' => 'button_set',
		                'title' => esc_html__('Footer Container Layout', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Select Footer Container Layout', 'g5plus-megatron'),
		                'desc' => '',
		                'options' => array(
                            'full'              => esc_html__('Full Width','g5plus-megatron'),
                            'container-fluid'   => esc_html__('Container Fluid','g5plus-megatron'),
			                'container'         => esc_html__('Container','g5plus-megatron')
                        ),
		                'default' => 'container'
	                ),


                    array(
                        'id' => 'footer_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select the footer column layout.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'footer-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-1.jpg'),
                            'footer-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-2.jpg'),
                            'footer-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-3.jpg'),
                            'footer-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-4.jpg'),
                            'footer-5' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-5.jpg'),
                            'footer-6' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-6.jpg'),
                            'footer-7' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-7.jpg'),
                            'footer-8' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-8.jpg'),
                            'footer-9' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/footer-layout-9.jpg'),
                        ),
                        'default' => 'footer-1'
                    ),

	                array(
		                'id' => 'footer_sidebar_1',
		                'type' => 'select',
		                'title' => esc_html__('Sidebar 1', 'g5plus-megatron'),
		                'subtitle' => "Choose the default footer sidebar 1",
		                'data'      => 'sidebars',
		                'desc' => '',
		                'default' => 'footer-1',
	                ),

	                array(
		                'id' => 'footer_sidebar_2',
		                'type' => 'select',
		                'title' => esc_html__('Sidebar 2', 'g5plus-megatron'),
		                'subtitle' => "Choose the default footer sidebar 2",
		                'data'      => 'sidebars',
		                'desc' => '',
		                'default' => 'footer-2',
	                ),

	                array(
		                'id' => 'footer_sidebar_3',
		                'type' => 'select',
		                'title' => esc_html__('Sidebar 3', 'g5plus-megatron'),
		                'subtitle' => "Choose the default footer sidebar 3",
		                'data'      => 'sidebars',
		                'desc' => '',
		                'default' => 'footer-3',
	                ),

	                array(
		                'id' => 'footer_sidebar_4',
		                'type' => 'select',
		                'title' => esc_html__('Sidebar 4', 'g5plus-megatron'),
		                'subtitle' => "Choose the default footer sidebar 4",
		                'data'      => 'sidebars',
		                'desc' => '',
		                'default' => 'footer-4',
	                ),

                    array(
                        'id'             => 'footer_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Footer Top/Bottom Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('This must be numeric (no px). Leave balnk for default.', 'g5plus-megatron'),
                        'desc'           => esc_html__('If you would like to override the default footer top/bottom padding, then you can do so here.', 'g5plus-megatron'),
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'     => '',
                            'padding-bottom'  => '',
                            'units'          => 'px',
                        )
                    ),


                    array(
                        'id' => 'footer_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload footer background image here', 'g5plus-megatron'),
                        'desc' => '',
                    ),


	                array(
		                'id' => 'footer_scheme',
		                'type' => 'button_set',
		                'title' => esc_html__('Footer Scheme', 'g5plus-megatron'),
		                'subtitle' => esc_html__( 'Choose footer scheme', 'g5plus-megatron' ),
		                'desc' => '',
		                'options'  => array(
			                'dark-black'    => esc_html__('Dark - Black','g5plus-megatron'),
			                'light-black'    => esc_html__('Light - Black','g5plus-megatron'),
			                'light'         => esc_html__('Light','g5plus-megatron'),
			                'dark'          => esc_html__('Dark','g5plus-megatron'),
			                'custom'        => esc_html__('Custom','g5plus-megatron'),
		                ),
		                'default' => 'dark-black'
	                ),

	                array(
		                'id'       => 'footer_bg_color',
		                'type'     => 'color_rgba',
		                'title'    => esc_html__('Background Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Footer Background Color.', 'g5plus-megatron'),
		                'default'  => array(),
		                'validate' => 'colorrgba',
		                'required' => array('footer_scheme','=','custom'),
	                ),
	                array(
		                'id'       => 'footer_main_overlay',
		                'type'     => 'color_rgba',
		                'title'    => esc_html__('Main Footer Overlay', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set main footer overlay.', 'g5plus-megatron'),
		                'default'  => array(),
		                'validate' => 'colorrgba',
		                'required' => array('footer_scheme','=','custom'),
	                ),

	                array(
		                'id'       => 'footer_text_color',
		                'type'     => 'color',
		                'title'    => esc_html__('Text Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Footer Text Color.', 'g5plus-megatron'),
		                'default'  => '',
		                'validate' => 'color',
		                'required' => array('footer_scheme','=','custom'),
	                ),

	                array(
		                'id'       => 'footer_heading_text_color',
		                'type'     => 'color',
		                'title'    => esc_html__('Heading Text Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Footer Heading Text Color.', 'g5plus-megatron'),
		                'default'  => '',
		                'validate' => 'color',
		                'required' => array('footer_scheme','=','custom'),
	                ),

	                array(
		                'id'       => 'footer_above_bg_color',
		                'type'     => 'color_rgba',
		                'title'    => esc_html__('Footer Above Background Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Footer Above Background Color.', 'g5plus-megatron'),
		                'default'  => array(),
		                'validate' => 'colorrgba',
		                'required' => array('footer_scheme','=','custom'),
	                ),

	                array(
		                'id'       => 'footer_above_text_color',
		                'type'     => 'color',
		                'title'    => esc_html__('Footer Above Text Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Footer Above Text Color.', 'g5plus-megatron'),
		                'default'  => '',
		                'validate' => 'color',
		                'required' => array('footer_scheme','=','custom'),
	                ),

	                array(
		                'id'       => 'bottom_bar_bg_color',
		                'type'     => 'color_rgba',
		                'title'    => esc_html__('Bottom Bar Background Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Bottom Bar Background Color.', 'g5plus-megatron'),
		                'default'  => array(),
		                'validate' => 'colorrgba',
		                'required' => array('footer_scheme','=','custom'),
	                ),

	                array(
		                'id'       => 'bottom_bar_text_color',
		                'type'     => 'color',
		                'title'    => esc_html__('Bottom Bar Text Color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Set Bottom Bar Text Color.', 'g5plus-megatron'),
		                'default'  => '',
		                'validate' => 'color',
		                'required' => array('footer_scheme','=','custom'),
	                ),

                    array(
                        'id'       => 'footer_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Footer Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Footer Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '0'
                    ),
                    array(
                        'id'       => 'collapse_footer',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Collapse footer on mobile device', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable collapse footer', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'On', '0' => 'Off' ),
                        'default'  => '0'
                    ),

	                array(
		                'id' => 'section-footer-above-settings',
		                'type' => 'section',
		                'title' => esc_html__('Footer Above Settings', 'g5plus-megatron'),
		                'indent' => true
	                ),
                    array(
                        'id'       => 'footer_above',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Footer Above', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Footer Above', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'On', '0' => 'Off' ),
                        'default'  => '1'
                    ),

                    array(
                        'id' => 'footer_above_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Footer above layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select the top bar column layout.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'footer-above-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/bottom-bar-layout-4.jpg'),
                            'footer-above-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/bottom-bar-layout-1.jpg')
                        ),
                        'default' => 'footer-above-1',
                        'required' => array('footer_above','=','1'),
                    ),

                    array(
                        'id' => 'footer_above_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Footer Above Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default top left sidebar",
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'footer_above_left',
                        'required' => array('footer_above','=','1'),
                    ),
                    array(
                        'id' => 'footer_above_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Footer Above Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default top right sidebar",
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'footer_above_right',
                        'required' => array('footer_above','=','1'),
                    ),
	                array(
		                'id'             => 'footer_above_padding',
		                'type'           => 'spacing',
		                'mode'           => 'padding',
		                'units'          => 'px',
		                'units_extended' => 'false',
		                'title'          => esc_html__('Footer Above Top/Bottom Padding', 'g5plus-megatron'),
		                'subtitle'       => esc_html__('This must be numeric (no px). Leave balnk for default.', 'g5plus-megatron'),
		                'desc'           => esc_html__('If you would like to override the default footer above top/bottom padding, then you can do so here.', 'g5plus-megatron'),
		                'left'          => false,
		                'right'         => false,
		                'default'            => array(
			                'padding-top'     => '',
			                'padding-bottom'  => '',
			                'units'          => 'px',
		                ),
		                'required' => array('footer_above','=','1'),
	                ),


	                array(
		                'id' => 'section-bottom-bar-settings',
		                'type' => 'section',
		                'title' => esc_html__('Bottom Bar Settings', 'g5plus-megatron'),
		                'indent' => true
	                ),
                    array(
                        'id'       => 'bottom_bar',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Bottom Bar', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Bottom Bar (below Footer)', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'On', '0' => 'Off' ),
                        'default'  => '1'
                    ),
                    array(
                        'id' => 'bottom_bar_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Bottom bar Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select the bottom bar column layout.', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'bottom-bar-1' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/bottom-bar-layout-1.jpg'),
                            'bottom-bar-2' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/bottom-bar-layout-2.jpg'),
                            'bottom-bar-3' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/bottom-bar-layout-3.jpg'),
	                        'bottom-bar-4' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/bottom-bar-layout-4.jpg'),
                        ),
                        'default' => 'bottom-bar-1',
                        'required' => array('bottom_bar','=','1'),
                    ),

                    array(
                        'id' => 'bottom_bar_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Bottom Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default bottom left sidebar",
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'bottom_bar_left',
                        'required' => array('bottom_bar','=','1'),
                    ),
                    array(
                        'id' => 'bottom_bar_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Bottom Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default bottom right sidebar",
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'bottom_bar_right',
                        'required' => array('bottom_bar','=','1'),
                    ),
	                array(
		                'id'             => 'bottom_bar_padding',
		                'type'           => 'spacing',
		                'mode'           => 'padding',
		                'units'          => 'px',
		                'units_extended' => 'false',
		                'title'          => esc_html__('Bottom Bar Top/Bottom Padding', 'g5plus-megatron'),
		                'subtitle'       => esc_html__('This must be numeric (no px). Leave balnk for default.', 'g5plus-megatron'),
		                'desc'           => esc_html__('If you would like to override the default bottom bar top/bottom padding, then you can do so here.', 'g5plus-megatron'),
		                'left'          => false,
		                'right'         => false,
		                'default'            => array(
			                'padding-top'     => '',
			                'padding-bottom'  => '',
			                'units'          => 'px',
		                ),
		                'required' => array('bottom_bar','=','1'),
	                ),
                )
            );

	        // Styling Options
            $this->sections[] = array(
                'title'  => esc_html__( 'Styling Options', 'g5plus-megatron' ),
                'desc'   => esc_html__( 'If you change value in this section, you must "Save & Generate CSS"', 'g5plus-megatron' ),
                'icon'   => 'el el-magic',
                'fields' => array(
                    array(
                        'id'       => 'primary_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Primary Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Primary Color', 'g5plus-megatron'),
                        'default'  => '#10B765',
                        'validate' => 'color',
                    ),

                    array(
                        'id'       => 'secondary_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Secondary Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Secondary Color', 'g5plus-megatron'),
                        'default'  => '#00BBFF',
                        'validate' => 'color',
                    ),


                    array(
                        'id'       => 'text_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Text Color.', 'g5plus-megatron'),
                        'default'  => '#444',
                        'validate' => 'color',
                    ),

                    array(
                        'id'       => 'border_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Border Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Border Color.', 'g5plus-megatron'),
                        'default'  => '#EEE',
                        'validate' => 'color',
                    ),



	                array(
		                'id'       => 'top_drawer_bg_color',
		                'type'     => 'color',
		                'title'    => esc_html__( 'Top drawer background color', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set Top drawer background color.', 'g5plus-megatron' ),
		                'default'  => '#2f2f2f',
		                'validate' => 'color',
	                ),

	                array(
		                'id'       => 'top_drawer_text_color',
		                'type'     => 'color',
		                'title'    => esc_html__('Top drawer text color', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Pick a text color for the Top drawer', 'g5plus-megatron'),
		                'default'  => '#c5c5c5',
		                'validate' => 'color',
	                ),


                    array(
                        'id'=>'styling-color-divide-0',
                        'type' => 'divide'
                    ),

	                array(
		                'id'       => 'menu_sub_scheme',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Sub menu scheme', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Set sub menu scheme', 'g5plus-megatron' ),
		                'default'  => 'sub-menu-dark',
		                'options'  => array(
			                'sub-menu-light' => esc_html__('Light','g5plus-megatron'),
			                'sub-menu-dark' => esc_html__('Dark','g5plus-megatron'),
		                )
	                ),




                )
            );

            // Custom font
            $this->sections[] = array(
                'title'  => esc_html__( 'Custom font', 'g5plus-megatron' ),
                'desc'   => '<span style="color:red"><strong>After upload font file, please click  "Save changes" and refresh page before go to Font Options</strong></span>',
                'icon'   => 'el el-text-width',
                'fields' => array(
                    array(
                        'id'        => 'section_custom_font_1',
                        'type'      => 'section',
                        'title'     => esc_html__('Custom Font 1', 'g5plus-megatron'),
                        'indent'    => true
                    ),
                    array(
                        'id' => 'custom_font_1_name',
                        'type' => 'text',
                        'title' => esc_html__('Custom font Name 1', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'custom_font_1_eot',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 1 (.eot)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .eot here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('eot')
                    ),
                    array(
                        'id' => 'custom_font_1_ttf',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 1 (.ttf)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .ttf here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('ttf')
                    ),
                    array(
                        'id' => 'custom_font_1_woff',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 1 (.woff)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .woff here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('woff')
                    ),
                    array(
                        'id' => 'custom_font_1_svg',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 1 (.svg)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .svg here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('svg')
                    ),
                    array(
                        'id'        => 'section_custom_font_2',
                        'type'      => 'section',
                        'title'     => esc_html__('Custom Font 2', 'g5plus-megatron'),
                        'indent'    => true
                    ),
                    array(
                        'id' => 'custom_font_2_name',
                        'type' => 'text',
                        'title' => esc_html__('Custom font Name 2', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'custom_font_2_eot',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 2 (.eot)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .eot here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('eot')
                    ),
                    array(
                        'id' => 'custom_font_2_ttf',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 2 (.ttf)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .ttf here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('ttf')
                    ),
                    array(
                        'id' => 'custom_font_2_woff',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 2 (.woff)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .woff here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('woff')
                    ),
                    array(
                        'id' => 'custom_font_2_svg',
                        'type' => 'upload',
                        'url'=> true,
                        'title' => esc_html__('Custom font 2 (.svg)', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload your font .svg here.', 'g5plus-megatron'),
                        'desc' => '',
                        'library_filter' => array('svg')
                    ),
                )
            );

	        // Font Options
            $this->sections[] = array(
                'icon' => 'el el-font',
                'title' => esc_html__('Font Options', 'g5plus-megatron'),
                'desc'   => esc_html__( 'If you change value in this section, you must "Save & Generate CSS"', 'g5plus-megatron' ),
                'fields' => array(
                    array(
                        'id'=>'body_font',
                        'type' => 'typography',
                        'title' => esc_html__('Body Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the body font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'text-align'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'line-height'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('body'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'14px',
                            'font-family'=>'Raleway',
                            'font-weight'=>'400',
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'=>'h1_font',
                        'type' => 'typography',
                        'title' => esc_html__('H1 Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the H1 font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'text-align'=>false,
                        'line-height'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h1'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h1'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'80px',
                            'font-family' => 'Montserrat',
                            'font-weight'=>'700',
                        ),
                    ),
                    array(
                        'id'=>'h2_font',
                        'type' => 'typography',
                        'title' => esc_html__('H2 Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the H2 font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'line-height'=>false,
                        'text-align'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h2'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h2'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'60px',
                            'font-family' => 'Montserrat',
                            'font-weight'=>'700',
                        ),
                    ),
                    array(
                        'id'=>'h3_font',
                        'type' => 'typography',
                        'title' => esc_html__('H3 Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the H3 font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'text-align'=>false,
                        'line-height'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h3'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h3'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'40px',
                            'font-family' => 'Montserrat',
                            'font-weight'=>'400',
                        ),
                    ),
                    array(
                        'id'=>'h4_font',
                        'type' => 'typography',
                        'title' => esc_html__('H4 Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the H4 font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'text-align'=>false,
                        'line-height'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h4'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h4'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'24px',
                            'font-family' => 'Montserrat',
                            'font-weight'=>'400',
                        ),
                    ),
                    array(
                        'id'=>'h5_font',
                        'type' => 'typography',
                        'title' => esc_html__('H5 Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the H5 font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'line-height'=>false,
                        'text-align'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h5'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h5'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'20px',
                            'font-family' => 'Montserrat',
                            'font-weight'=>'400',
                        ),
                    ),
                    array(
                        'id'=>'h6_font',
                        'type' => 'typography',
                        'title' => esc_html__('H6 Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the H6 font properties.', 'g5plus-megatron'),
                        'google'=> true,
                        'fonts' => $fonts,
                        'line-height'=>false,
                        'text-align'=>false,
                        'color'=>false,
                        'letter-spacing'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h6'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h6'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'default' => array(
                            'font-size'=>'18px',
                            'font-family' => 'Montserrat',
                            'font-weight'=>'400',
                        ),
                    ),

	                array(
		                'id'=> 'primary_font',
		                'type' => 'typography',
		                'title' => esc_html__('Primary Font', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Specify the Primary Font properties.', 'g5plus-megatron'),
		                'google' => true,
                        'fonts' => $fonts,
		                'line-height'=>false,
		                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
		                'color'=>false,
		                'text-align'=>false,
		                'font-style' => false,
		                'subsets' => false,
		                'font-size' => false,
		                'font-weight' => false,
		                'output' => array(''), // An array of CSS selectors to apply this font style to dynamically
		                'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
		                'units'=> 'px', // Defaults to px
		                'default' => array(
			                'font-family'=>'Montserrat',
		                ),
	                ),

                    array(
                        'id'=> 'secondary_font',
                        'type' => 'typography',
                        'title' => esc_html__('Secondary Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the Secondary font properties.', 'g5plus-megatron'),
                        'google' => true,
                        'fonts' => $fonts,
                        'line-height'=>false,
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'color'=>false,
                        'text-align'=>false,
                        'font-style' => false,
                        'subsets' => false,
                        'font-size' => false,
                        'font-weight' => false,
                        'output' => array(''), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
                        'units'=> 'px', // Defaults to px
                        'default' => array(
                            'font-family'=>'Playfair Display',
                        ),
                    ),
                    array(
                        'id'=> 'count_down_font',
                        'type' => 'typography',
                        'title' => esc_html__('Countdown Font', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Specify the countdown font properties.', 'g5plus-megatron'),
                        'google' => true,
                        'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
                        'line-height'=>false,
                        'color'=>false,
                        'text-align'=>false,
                        'font-style' => false,
                        'subsets' => false,
                        'font-size' => false,
                        'font-weight' => false,
                        'output' => array(''), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
                        'units'=> 'px', // Defaults to px
                        'default' => array(
                            'font-family'=>'Montserrat',
                        ),
                    ),
                ),
            );

	        // Social Profiles
            $this->sections[] = array(
                'title'  => esc_html__( 'Social Profiles', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-path',
                'fields' => array(
                    array(
                        'id' => 'twitter_url',
                        'type' => 'text',
                        'title' => esc_html__('Twitter', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Twitter','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'facebook_url',
                        'type' => 'text',
                        'title' => esc_html__('Facebook', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your facebook page/profile url','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'dribbble_url',
                        'type' => 'text',
                        'title' => esc_html__('Dribbble', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Dribbble','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'vimeo_url',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Vimeo','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'tumblr_url',
                        'type' => 'text',
                        'title' => esc_html__('Tumblr', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Tumblr','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'skype_username',
                        'type' => 'text',
                        'title' => esc_html__('Skype', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Skype username','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'linkedin_url',
                        'type' => 'text',
                        'title' => esc_html__('LinkedIn', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your LinkedIn page/profile url','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'googleplus_url',
                        'type' => 'text',
                        'title' => esc_html__('Google+', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Google+ page/profile URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'flickr_url',
                        'type' => 'text',
                        'title' => esc_html__('Flickr', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Flickr page url','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'youtube_url',
                        'type' => 'text',
                        'title' => esc_html__('YouTube', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your YouTube URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'pinterest_url',
                        'type' => 'text',
                        'title' => esc_html__('Pinterest', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Pinterest','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'foursquare_url',
                        'type' => 'text',
                        'title' => esc_html__('Foursquare', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Foursqaure URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'instagram_url',
                        'type' => 'text',
                        'title' => esc_html__('Instagram', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Instagram','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'github_url',
                        'type' => 'text',
                        'title' => esc_html__('GitHub', 'g5plus-megatron'),
                    'subtitle' => esc_html__('Your GitHub URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'xing_url',
                        'type' => 'text',
                        'title' => esc_html__('Xing', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Xing URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'behance_url',
                        'type' => 'text',
                        'title' => esc_html__('Behance', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Behance URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'deviantart_url',
                        'type' => 'text',
                        'title' => esc_html__('Deviantart', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Deviantart URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'soundcloud_url',
                        'type' => 'text',
                        'title' => esc_html__('SoundCloud', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your SoundCloud URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'yelp_url',
                        'type' => 'text',
                        'title' => esc_html__('Yelp', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your Yelp URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'rss_url',
                        'type' => 'text',
                        'title' => esc_html__('RSS Feed', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your RSS Feed URL','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id' => 'email_address',
                        'type' => 'text',
                        'title' => esc_html__('Email address', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Your email address','g5plus-megatron'),
                        'desc' => '',
                        'default' => ''
                    ),
                    array(
                        'id'=>'social-profile-divide-0',
                        'type' => 'divide'
                    ),
                    array(
                        'title'    => esc_html__('Social Share', 'g5plus-megatron'),
                        'id'       => 'social_sharing',
                        'type'     => 'checkbox',
                        'subtitle' => esc_html__('Show the social sharing in blog posts', 'g5plus-megatron'),

                        //Must provide key => value pairs for multi checkbox options
                        'options'  => array(
                            'facebook' => 'Facebook',
                            'twitter' => 'Twitter',
                            'google' => 'Google',
                            'linkedin' => 'Linkedin',
                            'tumblr' => 'Tumblr',
                            'pinterest' => 'Pinterest'
                        ),

                        //See how default has changed? you also don't need to specify opts that are 0.
                        'default' => array(
                            'facebook' => '1',
                            'twitter' => '1',
                            'google' => '1',
                            'linkedin' => '1',
                            'tumblr' => '1',
                            'pinterest' => '1'
                        )
                    )
                )
            );

	        // Woocommerce
            $this->sections[] = array(
                'title'  =>  esc_html__( 'Woocommerce', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-shopping-cart',
                'fields' => array(
                    array(
                        'id'       => 'product_show_rating',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Show Rating', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Show/Hide Rating product', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default'  => '1'
                    ),


                    array(
                        'id'       => 'product_sale_flash_mode',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Sale Flash Mode', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Chose Sale Flash Mode', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'text' => esc_html__('Text','g5plus-megatron'),
                            'percent' => esc_html__('Percent','g5plus-megatron')
                        ),
                        'default'  => 'percent'
                    ),

                    array(
                        'id'       => 'product_show_filter',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Show Filter', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Show/Hide Result Count In Archive Product', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default'  => '1'
                    ),


                    array(
                        'id' => 'archive_product_filter_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Filter Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default filter sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'woocommerce',
                        'required'  => array('product_show_filter', '=', array('1')),
                    ),



                    array(
                        'id'       => 'product_show_result_count',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Show Result Count', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Show/Hide Result Count In Archive Product', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default'  => '1'
                    ),
                    array(
                        'id'       => 'product_show_catalog_ordering',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Show Catalog Ordering', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Show/Hide Catalog Ordering', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default'  => '1'
                    ),
	                array(
		                'id'       => 'product_quick_view',
		                'type'     => 'button_set',
		                'title'    => esc_html__( 'Quick View', 'g5plus-megatron' ),
		                'subtitle' => esc_html__( 'Enable/Disable Quick View', 'g5plus-megatron' ),
		                'desc'     => '',
		                'options'  => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
		                'default'  => '1'
	                ),
                    array(
                        'id'       => 'product_add_to_cart',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Add To Cart Button', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable/Disable Add To Cart Button', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default'  => '1'
                    ),
                )
            );

            // Archive Product
            $this->sections[] = array(
                'title'  => esc_html__( 'Archive Product', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-book',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id'        => 'product_per_page',
                        'type'      => 'text',
                        'title'     => esc_html__('Products Per Page', 'g5plus-megatron'),
                        'desc'  => esc_html__('This must be numeric or empty (default 12).', 'g5plus-megatron'),
                        'subtitle'      => esc_html__('Set Products Per Page in archive product', 'g5plus-megatron'),
                        'validate'  => 'numeric',
                        'default'   => '12',
                    ),
                    array(
                        'id' => 'product_display_columns',
                        'type' => 'select',
                        'title' => esc_html__('Product Display Columns', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the number of columns to display on shop/category pages.','g5plus-megatron'),
                        'options' => array(
                            '2'		=> '2',
                            '3'		=> '3',
                            '4'		=> '4'
                        ),
                        'desc' => '',
                        'default' => '3',
                        'select2' => array('allowClear' =>  false) ,
                    ),


                    array(
                        'id' => 'section-archive-product-layout-start',
                        'type' => 'section',
                        'title' => esc_html__('Layout Options', 'g5plus-megatron'),
                        'indent' => true
                    ),



                    array(
                        'id' => 'archive_product_layout',
                        'type' => 'button_set',
                        'title' => esc_html__('Archive Product Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Archive Product Layout', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'full' => esc_html__('Full Width','g5plus-megatron'),
                            'container' => esc_html__('Container','g5plus-megatron'),
                            'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
                        ),
                        'default' => 'container'
                    ),
                    array(
                        'id' => 'archive_product_sidebar',
                        'type' => 'image_select',
                        'title' => esc_html__('Archive Product Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Archive Product Sidebar', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'none' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-none.png'),
                            'left' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-left.png'),
                            'right' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-right.png'),
                        ),
                        'default' => 'left'
                    ),
                    array(
                        'id' => 'archive_product_sidebar_width',
                        'type' => 'button_set',
                        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'small' => esc_html__('Small (1/4)','g5plus-megatron'),
                            'large' => esc_html__('Large (1/3)','g5plus-megatron')
                        ),
                        'default' => 'small',
                        'required'  => array('archive_product_sidebar', '=', array('left','both','right')),
                    ),
                    array(
                        'id' => 'archive_product_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Product Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default Archive Product left sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'woocommerce',
                        'required'  => array('archive_product_sidebar', '=', array('left','both')),
                    ),
                    array(
                        'id' => 'archive_product_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Product Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default Archive Product right sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'woocommerce',
                        'required'  => array('archive_product_sidebar', '=', array('right','both')),
                    ),

                    array(
                        'id' => 'section-archive-product-layout-end',
                        'type' => 'section',
                        'indent' => false
                    ),
                    array(
                        'id' => 'section-archive-product-title-start',
                        'type' => 'section',
                        'title' => esc_html__('Page Title Options', 'g5plus-megatron'),
                        'indent' => true
                    ),

                    array(
                        'id' => 'show_archive_product_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Archive Product Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Archive Product Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'archive_product_sub_title',
                        'type' => 'text',
                        'title' => esc_html__('Archive Sub Title', 'g5plus-megatron'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'archive_product_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Archive Product Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default'  => 'center',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'archive_product_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Page Title Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set archive product title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '120px',
                            'padding-bottom'  => '100px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),



                    array(
                        'id'             => 'archive_product_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set archive product title bottom margin', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_product_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),


                    array(
                        'id' => 'archive_product_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_product_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for archive product title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_product_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for archive product title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),


                    array(
                        'id' => 'archive_product_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background Image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload archive product title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $archive_product_title_bg_url
                        ),
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'archive_product_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Archive Product Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Archive Product Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default'  => '1',
                        'required'  => array(
                            array('show_archive_product_title', '=', array('1')),
                            array('archive_product_title_bg_image', '!=', ''),
                        ),
                    ),

                    array(
                        'id'       => 'archive_product_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'top',
                        'required'  => array(
                            array('show_archive_product_title', '=', array('1')),
                            array('archive_product_title_bg_image', '!=', ''),
                            array('archive_product_title_parallax', '=', '1'),
                        ),
                    ),



                    array(
                        'id' => 'archive_product_breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Archive Product Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options'  => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '1',
                        'required'  => array('show_archive_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'archive_product_breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_archive_product_title', '=', array('1')),
                            array('archive_product_breadcrumbs', '=', array('1')),
                        ),
                    ),

                    array(
                        'id' => 'archive_product_breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_archive_product_title', '=', array('1')),
                            array('archive_product_breadcrumbs', '=', array('1')),
                            array('archive_product_breadcrumbs_style', '=', array('float')),
                        ),
                    ),

                    array(
                        'id' => 'section-archive-product-title-end',
                        'type' => 'section',
                        'indent' => false
                    ),

                    array(
                        'id' => 'show_page_shop_content',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Page Shop Content', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Shop Page Content', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('0' => 'Off','before' => 'Show Before Archive','after' => 'Show After Archive'),
                        'default' => '0'
                    ),
                )
            );

            // Single Product
            $this->sections[] = array(
                'title'  => esc_html__( 'Single Product', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-laptop',
                'subsection' => true,
                'fields' => array(
	                array(
		                'id' => 'section-single-product-layout-start',
		                'type' => 'section',
		                'title' => esc_html__('Layout Options', 'g5plus-megatron'),
		                'indent' => true
	                ),

                    array(
                        'id' => 'single_product_layout',
                        'type' => 'button_set',
                        'title' => esc_html__('Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Single Product Layout', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'full' => esc_html__('Full Width','g5plus-megatron'),
                            'container' => esc_html__('Container','g5plus-megatron'),
                            'container-fluid' => esc_html__('Container Fluid','g5plus-megatron')
                        ),
                        'default' => 'container'
                    ),
                    array(
                        'id' => 'single_product_sidebar',
                        'type' => 'image_select',
                        'title' => esc_html__('Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Single Product Sidebar', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'none' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-none.png'),
                            'left' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-left.png'),
                            'right' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/sidebar-right.png'),
                        ),
                        'default' => 'none'
                    ),
                    array(
                        'id' => 'single_product_sidebar_width',
                        'type' => 'button_set',
                        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'small' => esc_html__('Small (1/4)','g5plus-megatron'),
                            'large' => esc_html__('Large (1/3)','g5plus-megatron')
                        ),
                        'default' => 'small',
                        'required'  => array('single_product_sidebar', '=', array('left','both','right')),
                    ),
                    array(
                        'id' => 'single_product_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default Single Product left sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'woocommerce',
                        'required'  => array('single_product_sidebar', '=', array('left','both')),
                    ),
                    array(
                        'id' => 'single_product_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default Single Product right sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'woocommerce',
                        'required'  => array('single_product_sidebar', '=', array('right','both')),
                    ),

                    array(
                        'id' => 'single_product_bottom_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Bottom Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose the default Single Product bottom sidebar','g5plus-megatron'),
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => '',
                    ),


                    array(
                        'id' => 'section-single-product-layout-end',
                        'type' => 'section',
                        'indent' => false
                    ),

                    array(
                        'id' => 'section-single-product-title-start',
                        'type' => 'section',
                        'title' => esc_html__('Page Title Options', 'g5plus-megatron'),
                        'indent' => true
                    ),

                    array(
                        'id' => 'show_single_product_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Page Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Page Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('On','g5plus-megatron'),
                            '0' => esc_html__('Off','g5plus-megatron')
                        ),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'single_product_sub_title',
                        'type' => 'text',
                        'title' => esc_html__('Page Sub Title', 'g5plus-megatron'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'single_product_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Page Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default'  => 'center',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'single_product_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '120px',
                            'padding-bottom'  => '100px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'single_product_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title bottom margin.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_product_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_product_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_product_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for page title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_product_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for page title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_product_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background Image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload archive title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $single_product_title_bg_url
                        ),
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'single_product_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Page Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Page Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '1',
                        'required'  => array(
                            array('show_single_product_title', '=', array('1')),
                            array('single_product_title_bg_image', '!=', ''),
                        ),
                    ),

                    array(
                        'id'       => 'single_product_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'center',
                        'required'  => array(
                            array('show_single_product_title', '=', array('1')),
                            array('single_product_title_bg_image', '!=', ''),
                            array('single_product_title_parallax', '=', '1'),
                        ),
                    ),

                    array(
                        'id' => 'single_product_breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Page Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'Enable','0' => 'Disable'),
                        'default' => '1',
                        'required'  => array('show_single_product_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'single_product_breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_single_product_title', '=', array('1')),
                            array('single_product_breadcrumbs', '=', array('1')),
                        ),
                    ),

                    array(
                        'id' => 'single_product_breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_single_product_title', '=', array('1')),
                            array('single_product_breadcrumbs', '=', array('1')),
                            array('single_product_breadcrumbs_style', '=', array('float')),
                        ),
                    ),



                    array(
                        'id' => 'section_single_product_title_end',
                        'type' => 'section',
                        'indent' => false
                    ),






	                array(
		                'id' => 'section-single-product-related-start',
		                'type' => 'section',
		                'title' => esc_html__('Product Related Options', 'g5plus-megatron'),
		                'indent' => true
	                ),
	                array(
		                'id'       => 'related_product_count',
		                'type'     => 'text',
		                'title'    => esc_html__('Related Product Total Record', 'g5plus-megatron'),
		                'subtitle' => esc_html__('Total Record Of Related Product.', 'g5plus-megatron'),
		                'validate' => 'number',
		                'default'  => '6',
	                ),

	                array(
		                'id' => 'related_product_condition',
		                'type' => 'checkbox',
		                'title' => esc_html__('Related Product Condition', 'g5plus-megatron'),
		                'options' => array(
			                'category' => esc_html__('Same Category','g5plus-megatron'),
			                'tag' => esc_html__('Same Tag','g5plus-megatron'),
		                ),
		                'default' => array(
			                'category'      => '1',
			                'tag'      => '1',
		                ),
	                ),


	                array(
		                'id' => 'section-single-product-related-end',
		                'type' => 'section',
		                'indent' => false
	                ),



                )
            );

			// Custom Post Type
            $this->sections[] = array(
                'title'  => esc_html__( 'Custom Post Type', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-screenshot',
                'fields' => array(
                    array(
                        'id' => 'cpt-disable',
                        'type' => 'checkbox',
                        'title' => esc_html__('Disable Custom Post Types', 'g5plus-megatron'),
                        'subtitle' => esc_html__('You can disable the custom post types used within the theme here, by checking the corresponding box. NOTE: If you do not want to disable any, then make sure none of the boxes are checked.', 'g5plus-megatron'),
                        'options' => array(
                            'portfolio' => 'Portfolio',
                            'ourteam' => 'Our Team',
                            'countdown' => 'CountDown',
                            'pricingtable' => 'Pricing Table',
                            'servicetable' => 'Service Table'
                        ),
                        'default' => array(
                            'portfolio' => '0',
                            'ourteam' => '0',
                            'countdown' => '0',
                            'pricingtable' => '0',
                            'servicetable' => '0'
                        )
                    ),


                )
            );

	        // Portfolio Settings
	        $this->sections[] = array(
		        'title'  => esc_html__( 'Portfolio Settings', 'g5plus-megatron' ),
		        'desc'   => '',
		        'icon'   => 'el el-th-large',
		        'subsection' => true,
		        'fields' => array(
                    array(
                        'id' => 'portfolio_disable_link_detail',
                        'type' => 'button_set',
                        'title' => esc_html__('Disable link to detail', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable link to detail in Portfolio', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '0'
                    ),

                    array(
                        'id' => 'show_portfolio_single_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Page Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Page Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '1'
                    ),

                    array(
                        'id' => 'portfolio_single_sub_title',
                        'type' => 'text',
                        'title' => esc_html__('Sub Title', 'g5plus-megatron'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'portfolio_single_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Page Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default'  => 'center',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'portfolio_single_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '120px',
                            'padding-bottom'  => '100px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id'             => 'portfolio_single_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title bottom margin.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'portfolio_single_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'portfolio_single_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_single_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for page title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_single_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for page title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_single_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Background Image', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload page title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $page_title_bg_url
                        ),
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id'       => 'portfolio_single_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Page Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Page Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default'  => '1',
                        'required'  => array(
                            array('show_portfolio_single_title', '=', array('1')),
                            array('portfolio_single_title_bg_image', '!=', ''),
                        ),
                    ),

                    array(
                        'id'       => 'portfolio_single_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'center',
                        'required'  => array(
                            array('show_portfolio_single_title', '=', array('1')),
                            array('portfolio_single_title_bg_image', '!=', ''),
                            array('portfolio_single_title_parallax', '=', '1'),
                        ),
                    ),

                    array(
                        'id' => 'portfolio_single_breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Pages Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '1',
                        'required'  => array('show_portfolio_single_title', '=', array('1')),
                    ),

                    array(
                        'id' => 'portfolio_single_breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_portfolio_single_title', '=', array('1')),
                            array('portfolio_single_breadcrumbs', '=', array('1')),
                        ),
                    ),

                    array(
                        'id' => 'portfolio_single_breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_portfolio_single_title', '=', array('1')),
                            array('portfolio_single_breadcrumbs', '=', array('1')),
                            array('portfolio_single_breadcrumbs_style', '=', array('float')),
                        ),
                    ),
                    array(
                        'id'       => 'portfolio-single-style-enable',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Custom Single Layout', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Custom Single Layout', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '1',

                    ),

			        array(
				        'id' => 'portfolio-single-style',
				        'type' => 'image_select',
				        'title' => esc_html__('Single Portfolio Layout', 'g5plus-megatron'),
				        'subtitle' => esc_html__('Select Single Portfolio Layout', 'g5plus-megatron'),
				        'desc' => '',
				        'options' => array(
					        'detail-01' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-01.jpg'),
					        'detail-02' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-02.jpg'),
					        'detail-03' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-03.jpg'),
					        'detail-04' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-04.jpg'),
                            'detail-05' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-05.jpg'),
                            'detail-06' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-06.jpg'),
                            'detail-07' => array('title' => '', 'img' => G5PLUS_THEME_URL.'assets/images/theme-options/portfolio-detail-07.jpg')
				        ),
				        'default' => 'detail-01',
                        'required'  => array('portfolio-single-style-enable', '=', array('1')),
			        ),
                    array(
                        'id' => 'portfolio_detail_07_layout',
                        'type' => 'select',
                        'title' => esc_html__('Select option layout detail 07', 'g5plus-megatron'),
                        'subtitle' => "Choose the full layout or only display content for layout detail 07",
                        'options'      => array(
                            '' => esc_html__('Full layout', 'g5plus-megatron'),
                            'only_content' => esc_html__('Only display portfolio content', 'g5plus-megatron'),
                        ),
                        'default' => '',
                        'required'  => array(
                            array('portfolio-single-style-enable', '=', array('1')),
                            array('portfolio-single-style', '=', array('detail-07'))
                            ),
                    ),
                    array(
                        'id' => 'portfolio_detail_bottom_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Bottom Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default detail bottom sidebar",
                        'data'      => 'sidebars',
                        'desc' => ''
                    ),
		        )
	        );

            //Portfolio Archive
            $this->sections[] = array(
                'title'  => esc_html__( 'Archive Portfolio Settings', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-folder-close',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id'        => 'portfolio_archive_page',
                        'type'      => 'text',
                        'title'     => esc_html__('Portfolio Archive page', 'g5plus-megatron'),
                        'subtitle'  => esc_html__('Push link to custom page in case you need build portfolio archive base on portfolio shortcode', 'g5plus-megatron'),
                    ),
                    array(
                        'id' => 'section_portfolio_archive_layout_start',
                        'type' => 'section',
                        'title' => esc_html__('Layout Options', 'g5plus-megatron'),
                        'indent' => true
                    ),
                    array(
                        'id' => 'portfolio_archive_layout',
                        'type' => 'button_set',
                        'title' => esc_html__('Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Archive Layout', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('full' => 'Full Width','container' => 'Container', 'container-fluid' => 'Container Fluid'),
                        'default' => 'container'
                    ),
                    array(
                        'id' => 'portfolio_archive_sidebar',
                        'type' => 'image_select',
                        'title' => esc_html__('Sidebar', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar Style', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'none' => array('alt' => 'No sidebar', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-none.png'),
                            'left' => array('alt' => 'Left sidebar', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-left.png'),
                            'right' => array('alt' => 'Right sidebar', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-right.png'),
                            'both' => array('alt' => 'Both left and right sidebar', 'img' => G5PLUS_THEME_URL . 'assets/images/theme-options/sidebar-both.png'),
                        ),
                        'default' => 'none'
                    ),
                    array(
                        'id' => 'portfolio_archive_sidebar_width',
                        'type' => 'button_set',
                        'title' => esc_html__('Sidebar Width', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set Sidebar width', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('small' => 'Small (1/4)', 'large' => 'Large (1/3)'),
                        'default' => 'small',
                        'required'  => array('portfolio_archive_sidebar', '=', array('left','both','right')),
                    ),
                    array(
                        'id' => 'portfolio_archive_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Left Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default left sidebar",
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'sidebar-1',
                        'required'  => array('portfolio_archive_sidebar', '=', array('left','both')),
                    ),
                    array(
                        'id' => 'portfolio_archive_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Right Sidebar', 'g5plus-megatron'),
                        'subtitle' => "Choose the default right sidebar",
                        'data'      => 'sidebars',
                        'desc' => '',
                        'default' => 'sidebar-2',
                        'required'  => array('portfolio_archive_sidebar', '=', array('right','both')),
                    ),
                    array(
                        'id' => 'portfolio_archive_item_style',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive Item Layout', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive Item Layout', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'grid' => esc_html__('Grid', 'g5plus-megatron'),
                            'title' => esc_html__('Title & category', 'g5plus-megatron'),
                            'one-page' => esc_html__('One page', 'g5plus-megatron') ,
                            'masonry' => esc_html__('Masonry extend', 'g5plus-megatron'),
                            'masonry-style-05' => esc_html__('Masonry 4 columns', 'g5plus-megatron'),
                            'masonry-style-02' => esc_html__('Masonry 3 columns', 'g5plus-megatron') ,
                            'masonry-style-03' => esc_html__('Masonry 2 columns left', 'g5plus-megatron'),
                            'masonry-style-04' => esc_html__('Masonry 2 columns right', 'g5plus-megatron') ,
                            'masonry-classic' => esc_html__('Masonry Classic', 'g5plus-megatron') ,
                            'masonry-home-portfolio' => esc_html__('Masonry home portfolio', 'g5plus-megatron'),
                            'left-menu' => esc_html__('Left menu', 'g5plus-megatron'),
                            'short-desc' => esc_html__('Short description', 'g5plus-megatron')
                        ),
                        'default' => 'grid'
                    ),
                    array(
                        'id'       => 'portfolio_archive_category_on_top',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Portfolio Archive Category On Top', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Display Portfolio Category On Top Page', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '0',
                    ),
                    array(
                        'id' => 'portfolio_archive_filter',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive Filter', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive Filter', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'filter' => esc_html__('Isotope Filter', 'g5plus-megatron') ,
                            'ajax' => esc_html__('Ajax filter', 'g5plus-megatron') ,
                        ),
                        'default' => 'ajax',
                    ),
                    array(
                        'id' => 'portfolio_archive_item_column',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive Item Column', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive Item Column', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '2' => '2' ,
                            '3' => '3' ,
                            '4' => '4' ,
                            '5' => '5',
                            '6' => '6'),
                        'default' => '4',
                        'required'  => array('portfolio_archive_item_style', '=', array('grid','title')),
                    ),
                    array(
                        'id' => 'portfolio_archive_item_masonry_column',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive Item Column', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive Item Column', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '3' => '3' ,
                            '4' => '4' ,
                            '5' => '5'),
                        'default' => '4',
                        'required'  => array('portfolio_archive_item_style', '=', array('masonry')),
                    ),
                    array(
                        'id'        => 'portfolio_archive_item_per_page',
                        'type'      => 'text',
                        'title'     => esc_html__('Portfolio Archive Iterm Per Page', 'g5plus-megatron'),
                        'subtitle'  => esc_html__('This must be numeric or empty. Empty for select all', 'g5plus-megatron'),
                    ),
                    array(
                        'id' => 'portfolio_archive_padding_item',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive Padding Between Items', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive Padding Between Items', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '' => esc_html__('No padding', 'g5plus-megatron'),
                            'col-padding-10'=> '10 px',
                            'col-padding-15' =>  '15 px',
                            'col-padding-20'  => '20 px',
                            'col-padding-40' =>  '40 px'),
                        'default' => 'col-padding-15'
                    ),
                    array(
                        'id' => 'portfolio_archive_item_image_size',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive Item Image Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive Item Image Size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' =>array('585x585' => '585x585', '590x393' => '590x393', '570x438' =>'570x438', '370x284' => '370x284', '370x620' => '370x620'),
                        'default' => '585x585',
                        'required'  => array('portfolio_archive_item_style', '=', array('grid','title')),
                    ),
                    array(
                        'id' => 'portfolio_archive_overlay',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive hover style', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive hover style', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'title' => esc_html__('Title', 'g5plus-megatron') ,
                            'title-category' => esc_html__('Title & Category', 'g5plus-megatron') ,
                            'title-category-link' => esc_html__('Title & Category & Link button', 'g5plus-megatron') ,
                            'title-excerpt-link' => esc_html__('Title & Excerpt & Link button', 'g5plus-megatron') ,
                            'title-excerpt' => esc_html__('Title & Excerpt', 'g5plus-megatron'),
                            'icon' => esc_html__('Icon Gallery', 'g5plus-megatron') ,
                            'icon-view' => esc_html__('Icon Gallery & Detail', 'g5plus-megatron')
                        ),
                        'default' => 'title'
                    ),
                    array(
                        'id' => 'portfolio_archive_overlay_effect',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive overlay effect', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive overlay effect', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'hover-dir' => esc_html__('Hover dir', 'g5plus-megatron') ,
                            'float-top' => esc_html__('Float top', 'g5plus-megatron') ,
                            'lily' => esc_html__('Lily', 'g5plus-megatron') ,
                            'sadie' => esc_html__('Sadie', 'g5plus-megatron') ,
                            'layla' => esc_html__('Layla', 'g5plus-megatron'),
                            'oscar' => esc_html__('Oscar', 'g5plus-megatron'),
                            'marley' => esc_html__('Marley', 'g5plus-megatron') ,
                            'sarah' => esc_html__('Sarah', 'g5plus-megatron'),
                            'chico' => esc_html__('Chico', 'g5plus-megatron') ,
                            'jazz' => esc_html__('Jazz', 'g5plus-megatron') ,
                            'ming' => esc_html__('Ming', 'g5plus-megatron')
                        ),
                        'default' => 'hover-dir',
                        // 'required'  => array('overlay_style', '=', array('left-menu','title', 'title-category', 'title-category-link', 'title-excerpt-link', 'left-title-excerpt-link', 'title-excerpt')),
                    ),
                    array(
                        'id' => 'portfolio_archive_overlay_background',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Archive overlay background', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Select Portfolio Archive overlay background', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'bg-overlay-ps' => esc_html__('Gradient primary & secondary color', 'g5plus-megatron'),
                            '' => esc_html__('Default', 'g5plus-megatron') ,
                            'bg-light' => esc_html__('Light', 'g5plus-megatron') ,
                            'bg-dark' => esc_html__('Dark', 'g5plus-megatron') ,
                        ),
                        'default' => 'bg-overlay-ps'
                    ),
                    array(
                        'id'        => 'portfolio_archive_css',
                        'type'      => 'text',
                        'title'     => esc_html__('Custome css class name', 'g5plus-megatron')
                    ),
                    array(
                        'id' => 'section_portfolio_archive_layout_end',
                        'type' => 'section',
                        'indent' => false
                    ),
                    array(
                        'id' => 'section_portfolio_archive_title_start',
                        'type' => 'section',
                        'title' => esc_html__('Page Title Options', 'g5plus-megatron'),
                        'indent' => true
                    ),
                    array(
                        'id' => 'breadcrumbs_in_portfolio_archive',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs in Portfolio Archive', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs in Portfolio Archive', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '1'
                    ),
                    array(
                        'id' => 'show_portfolio_archive_title',
                        'type' => 'button_set',
                        'title' => esc_html__('Show Portfolio Archive Title', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Portfolio Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array('1' => 'On','0' => 'Off'),
                        'default' => '1'
                    ),
                    array(
                        'id'        => 'portfolio_archive_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Archive title', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Display post type title if empty.', 'g5plus-megatron'),
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id'        => 'portfolio_archive_sub_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Archive sub title', 'g5plus-megatron')
                    ),
                    array(
                        'id'       => 'portfolio_archive_title_text_align',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Portfolio Archive Title Text Align', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Set Portfolio Archive Title Text Align', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' ),
                        'default'  => 'center',
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id'             => 'portfolio_archive_title_padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Padding', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title top/bottom padding.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'default'            => array(
                            'padding-top'  => '90px',
                            'padding-bottom'  => '60px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id'             => 'portfolio_archive_title_margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'title'          => esc_html__('Margin Bottom', 'g5plus-megatron'),
                        'subtitle'       => esc_html__('Set page title bottom margin.', 'g5plus-megatron'),
                        'desc'           => '',
                        'left'          => false,
                        'right'          => false,
                        'top'          => false,
                        'default'            => array(
                            'margin-bottom'  => '80px',
                            'units'          => 'px',
                        ),
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_page_title_border_bottom',
                        'type' => 'button_set',
                        'title' => esc_html__('Border Bottom', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enabling this option will display bottom border on Title Area', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '0',
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_archive_title_text_size',
                        'type' => 'button_set',
                        'title' => esc_html__('Text Size', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Choose a default Title size', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'md' => esc_html__('Medium','g5plus-megatron'),
                            'lg' => esc_html__('Large','g5plus-megatron')
                        ),
                        'default' => 'lg',
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_archive_title_color',
                        'type'     => 'color',
                        'title' => esc_html__('Text Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a color for page title.', 'g5plus-megatron'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_archive_title_bg_color',
                        'type'     => 'color_rgba',
                        'title' => esc_html__('Background Color', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Pick a background color for page title.', 'g5plus-megatron'),
                        'default'   => array(
                            'color'     => '#000',
                            'alpha'     => 0.55,
                            'rgba'     => 'rgba(0,0,0,0.55)'
                        ),
                        'validate' => 'colorrgba',
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_archive_title_bg_image',
                        'type' => 'media',
                        'url'=> true,
                        'title' => esc_html__('Portfolio Archive Title Background', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Upload portfolio title background.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => array(
                            'url' => $page_title_bg_url
                        ),
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id'       => 'portfolio_archive_title_parallax',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Portfolio Archive Title Parallax', 'g5plus-megatron' ),
                        'subtitle' => esc_html__( 'Enable Portfolio Archive Title Parallax', 'g5plus-megatron' ),
                        'desc'     => '',
                        'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
                        'default'  => '0',
                        'required'  => array('show_portfolio_archive_title', '=', array('1')),
                    ),
                    array(
                        'id'       => 'portfolio_archive_title_parallax_position',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Parallax Position', 'g5plus-megatron' ),
                        'subtitle' => '',
                        'desc'     => '',
                        'options'  => array(
                            'top' => esc_html__('Top','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'bottom' => esc_html__('Bottom','g5plus-megatron'),
                        ),
                        'default'  => 'center',
                        'required'  => array(
                            array('show_portfolio_archive_title', '=', array('1')),
                            array('portfolio_archive_title_bg_image', '!=', ''),
                            array('portfolio_archive_title_parallax', '=', '1'),
                        ),
                    ),
                    array(
                        'id' => 'portfolio_archive_breadcrumbs',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Enable/Disable Breadcrumbs In Pages Title', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            '1' => esc_html__('Enable','g5plus-megatron'),
                            '0' => esc_html__('Disable','g5plus-megatron')
                        ),
                        'default' => '1',
                        'required'  => array('show_page_title', '=', array('1')),
                    ),
                    array(
                        'id' => 'portfolio_archive_breadcrumbs_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Styles', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs styles', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'float' => esc_html__('Float','g5plus-megatron'),
                            'normal' => esc_html__('Normal','g5plus-megatron')
                        ),
                        'default' => 'float',
                        'required'  => array(
                            array('show_portfolio_archive_title', '=', array('1')),
                            array('portfolio_archive_breadcrumbs', '=', array('1')),
                        ),
                    ),
                    array(
                        'id' => 'portfolio_archive_breadcrumbs_align',
                        'type' => 'button_set',
                        'title' => esc_html__('Breadcrumbs Align', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Set breadcrumbs align (apply with breadcrumbs style float)', 'g5plus-megatron'),
                        'desc' => '',
                        'options' => array(
                            'left' => esc_html__('Left','g5plus-megatron'),
                            'center' => esc_html__('Center','g5plus-megatron'),
                            'right' => esc_html__('Right','g5plus-megatron')
                        ),
                        'default' => 'left',
                        'required'  => array(
                            array('show_portfolio_archive_title', '=', array('1')),
                            array('portfolio_archive_breadcrumbs', '=', array('1')),
                            array('portfolio_archive_breadcrumbs_style', '=', array('float')),
                        ),
                    ),


                    array(
                        'id' => 'section_portfolio_archive_title_end',
                        'type' => 'section',
                        'indent' => false
                    ),
                )
            );

            $this->sections[] = array(
                'title'  => esc_html__( 'Resources Options', 'g5plus-megatron' ),
                'desc'   => '',
                'icon'   => 'el el-th-large',
                'fields' => array(
                    array(
                        'id'        => 'cdn_bootstrap_js',
                        'type'      => 'text',
                        'title'     => esc_html__('CDN Bootstrap Script', 'g5plus-megatron'),
                        'subtitle'  => esc_html__('Url CDN Bootstrap Script', 'g5plus-megatron'),
                        'desc'      => '',
                        'default'   => '',
                    ),

                    array(
                        'id'        => 'cdn_bootstrap_css',
                        'type'      => 'text',
                        'title'     => esc_html__('CDN Bootstrap Stylesheet', 'g5plus-megatron'),
                        'subtitle'  => esc_html__('Url CDN Bootstrap Stylesheet', 'g5plus-megatron'),
                        'desc'      => '',
                        'default'   => '',
                    ),

                    array(
                        'id'        => 'cdn_font_awesome',
                        'type'      => 'text',
                        'title'     => esc_html__('CDN Font Awesome', 'g5plus-megatron'),
                        'subtitle'  => esc_html__('Url CDN Font Awesome', 'g5plus-megatron'),
                        'desc'      => '',
                        'default'   => '',
                    ),

                )
            );
            $this->sections[] = array(
                'title'  => esc_html__( 'Custom CSS & Script', 'g5plus-megatron' ),
                'desc'   => esc_html__( 'If you change Custom CSS, you must "Save & Generate CSS"', 'g5plus-megatron' ),
                'icon'   => 'el el-edit',
                'fields' => array(
                    array(
                        'id' => 'custom_css',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'title' => esc_html__('Custom CSS', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Add some CSS to your theme by adding it to this textarea. Please do not include any style tags.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => '',
                        'options'  => array('minLines'=> 20, 'maxLines' => 60)
                    ),
                    array(
                        'id' => 'custom_js',
                        'type' => 'ace_editor',
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'title' => esc_html__('Custom JS', 'g5plus-megatron'),
                        'subtitle' => esc_html__('Add some custom JavaScript to your theme by adding it to this textarea. Please do not include any script tags.', 'g5plus-megatron'),
                        'desc' => '',
                        'default' => '',
                        'options'  => array('minLines'=> 20, 'maxLines' => 60)
                    ),

                )
            );
        }

        public function setHelpTabs() {
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'           => 'g5plus_megatron_options',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'       => $theme->get( 'Name' ),
                // Name that appears at the top of your panel
                'display_version'    => $theme->get( 'Version' ),
                // Version that appears at the top of your panel
                'menu_type'          => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'     => true,
                // Show the sections below the admin menu item or not
                'menu_title'         => esc_html__( 'Theme Options', 'g5plus-megatron' ),
                'page_title'         => esc_html__( 'Theme Options', 'g5plus-megatron' ),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'     => '',
                // Must be defined to add google fonts to the typography module

                'async_typography'   => false,
                // Use a asynchronous font on the front end or font string
                'admin_bar'          => true,
                // Show the panel pages on the admin bar
                'global_variable'    => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode'           => false,
                // Show the time the page took to load, etc
                'customizer'         => true,
                // Enable basic customizer support

                // OPTIONAL -> Give you extra features
                'page_priority'      => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'        => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_theme_page#Parameters
                'page_permissions'   => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon'          => '',
                // Specify a custom URL to an icon
                'last_tab'           => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon'          => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug'          => '_options',
                // Page slug used to denote the panel
                'save_defaults'      => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show'       => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark'       => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time'     => 60 * MINUTE_IN_SECONDS,
                'output'             => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'         => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'           => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'        => false,
                // REMOVE

                // HINTS
                'hints'              => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'   => 'light',
                        'shadow'  => true,
                        'rounded' => false,
                        'style'   => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'click mouseleave',
                        ),
                    ),
                )
            );

            // Panel Intro text -> before the form
            if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                if ( ! empty( $this->args['global_variable'] ) ) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace( '-', '_', $this->args['opt_name'] );
                }
                $this->args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'g5plus-megatron' ), $v );
            } else {
                $this->args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'g5plus-megatron' );
            }
        }

    }

    global $reduxConfig;
    $reduxConfig = new Redux_Framework_options_config();
}