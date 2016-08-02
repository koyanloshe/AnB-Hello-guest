var G5Plus = G5Plus || {};
(function ($) {
    "use strict";

    var $window = $(window),
        $body = $('body'),
        isRTL = $body.data('rtl') ? true : false,
        deviceAgent = navigator.userAgent.toLowerCase(),
        isMobile = deviceAgent.match(/(iphone|ipod|android|iemobile)/),
        isMobileAlt = deviceAgent.match(/(iphone|ipod|ipad|android|iemobile)/),
        isAppleDevice = deviceAgent.match(/(iphone|ipod|ipad)/),
        isIEMobile = deviceAgent.match(/(iemobile)/);


    G5Plus.common = {
        init: function () {
            G5Plus.common.owlCarousel();
            G5Plus.common.stellar();
            G5Plus.common.prettyPhoto();
            G5Plus.common.magicLine();
            G5Plus.common.tooltip();
        },
        owlCarousel: function () {
            $('div.owl-carousel:not(.manual):not(.owl-loaded)').each(function () {
                var slider = $(this);
                var defaults = {
                    items: 4,
                    nav:false,
                    navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
                    dots:false,
                    loop: true,
                    center: false,
                    mouseDrag: true,
                    touchDrag: true,
                    pullDrag: true,
                    freeDrag: false,

                    margin: 0,
                    stagePadding: 0,

                    merge: false,
                    mergeFit: true,
                    autoWidth: false,



                    startPosition: 0,
                    rtl: isRTL,

                    smartSpeed: 250,
                    fluidSpeed: false,
                    dragEndSpeed: false,

                    autoplayHoverPause: true
                };

                var config = $.extend({}, defaults, slider.data("plugin-options"));
                // Initialize Slider
                slider.owlCarousel(config);

                slider.on('initialized.owl.carousel', function(event) {
                   G5Plus.common.owlCarousel();
                });
            });
        },
        isDesktop: function () {
            var responsive_breakpoint = 991;
            var $menu = $('.x-nav-menu');
            if (($menu.length > 0) && (typeof ($menu.attr('responsive-breakpoint')) != "undefined" ) && !isNaN(parseInt($menu.attr('responsive-breakpoint'), 10))) {
                responsive_breakpoint = parseInt($menu.attr('responsive-breakpoint'), 10);
            }
            return window.matchMedia('(min-width: ' + (responsive_breakpoint + 1) + 'px)').matches;
        },
        stellar : function() {
            $.stellar({
                horizontalScrolling: false,
                scrollProperty: 'scroll',
                positionProperty: 'position',
                responsive: false
            });
        },
        prettyPhoto : function() {
            $("a[data-rel^='prettyPhoto']").prettyPhoto({
                hook:'data-rel',
                social_tools:'',
                animation_speed:'normal',
                theme:'light_square'
            });
        },
        magicLine : function(){
            $('.magic-line-container').each(function() {
                var activeItem = $('li.active',this);
                var topMagicLine = $('.top.magic-line', $(activeItem).parent());
                var bottomMagicLine = $('.bottom.magic-line', $(activeItem).parent());
                topMagicLine.hide();
                bottomMagicLine.hide();
                setTimeout(function(){
                    G5Plus.common.magicLineSetPosition(activeItem);
                    topMagicLine.show();
                    bottomMagicLine.show();
                },100);


                $('li',this).hover(function(){
                    if(!$(this).hasClass('none-magic-line')){
                        G5Plus.common.magicLineSetPosition(this);
                    }
                },function(){
                    if(!$(this).hasClass('none-magic-line')){
                        G5Plus.common.magicLineReturnActive(this);
                    }
                });
            });
        },
        magicLineSetPosition : function(item) {
            if(item!=null && item!='undefined'){
                var left = 0;
                var $padding_left = $(item).css("padding-left");
                if(typeof $padding_left !='undefined'){
                    $padding_left = $padding_left.replace("px", "");

                    $padding_left  = parseInt($padding_left);
                }else{
                    $padding_left = 0;
                }
                if($(item).position()!=null)
                    left = $(item).position().left + $padding_left;

                var marginLeft = $(item).css('margin-left');
                var marginRight = $(item).css('margin-right');

                var topMagicLine = $('.top.magic-line', $(item).parent());
                var bottomMagicLine = $('.bottom.magic-line', $(item).parent());
                if(topMagicLine!=null && topMagicLine != 'undefined'){
                    $(topMagicLine).css('left',left);
                    $(topMagicLine).css('width',$(item).width());
                    $(topMagicLine).css('margin-left',marginLeft);
                    $(topMagicLine).css('margin-right',marginRight);
                }
                if(bottomMagicLine!=null && bottomMagicLine != 'undefined'){
                    $(bottomMagicLine).css('left',left);
                    $(bottomMagicLine).css('width',$(item).width());
                    $(bottomMagicLine).css('margin-left',marginLeft);
                    $(bottomMagicLine).css('margin-right',marginRight);
                }
            }
        },
        magicLineReturnActive : function(current_item) {
            if(!$(current_item).hasClass('active')){
                var activeItem = $('li.active',$(current_item).parent());
                G5Plus.common.magicLineSetPosition(activeItem);
            }
        },
        showLoading : function() {
            $body.addClass('overflow-hidden');
            if ($('.loading-wrapper').length == 0) {
                $body.append('<div class="loading-wrapper"><span class="spinner-double-section-far"></span></div>');
            }
        },
        hideLoading : function() {
            $('.loading-wrapper').fadeOut(function () {
                $('.loading-wrapper').remove();
                $('body').removeClass('overflow-hidden');
            });
        },
        tooltip : function () {
            if ($().tooltip && !isMobileAlt) {
                if (!$body.hasClass('woocommerce-compare-page')) {
                    $('[data-toggle="tooltip"]').tooltip();
                }
                $('.yith-wcwl-wishlistexistsbrowse,.yith-wcwl-add-button,.yith-wcwl-wishlistaddedbrowse', '.product-actions').tooltip({
                    title: g5plus_framework_constant.product_wishList
                });
            }
        },
	    isIE: function() {
		    var ua = window.navigator.userAgent;
		    var msie = ua.indexOf("MSIE ");

		    if (msie || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
			    return true;
		    }
		    return false;
	    }
    };


    G5Plus.page = {
        init: function () {
            G5Plus.page.pageTransition();
            G5Plus.page.footerParallax();
            G5Plus.page.topDrawer();
            G5Plus.page.events();
            G5Plus.page.backToTop();
            G5Plus.page.setWidgetCollapse();
            //G5Plus.page.pageTitleBackgroundParallax();
        },
        events : function() {
        },
        windowLoad : function() {
            G5Plus.page.setPositionPageTitle();
            G5Plus.page.fadePageIn();
        },
        windowResized: function() {
            G5Plus.page.footerParallax();
            G5Plus.page.setPositionPageTitle();
            G5Plus.page.setWidgetCollapse();
            //G5Plus.page.pageTitleBackgroundParallax();
        },
        setPositionPageTitle : function() {
	        var $sectionTitle = $('#page-title');
            if (!G5Plus.common.isDesktop()) {
	            if ($('#mobile-header-wrapper').hasClass('mobile-header-float')) {
		            var headerHeight = $('#mobile-header-wrapper').outerHeight();
		            $sectionTitle.css('padding-top', headerHeight);
	            }
	            else {
		            $sectionTitle.css('padding-top', '');
	            }
            }
	        else {
	            if( $('body').hasClass('header-is-float')){
		            if($sectionTitle!=null && typeof $sectionTitle!='undefined'){
			            var headerHeight = $('header.main-header').outerHeight();
			            $sectionTitle.css('padding-top',headerHeight);
		            }
	            }
	            else {
		            $sectionTitle.css('padding-top', '');
	            }
            }
        },
        footerParallax: function () {
            var $footer = $('footer.main-footer-wrapper'),
                headerSticky  = $('header.main-header .sticky-wrapper').length > 0 ? 60 : 0,
                $adminBar = $('#wpadminbar'),
                $adminBarHeight = $adminBar.length > 0 ?  $adminBar.outerHeight() : 0;


            if (!$body.hasClass('page-template-coming-soon')) {
                if ($footer.hasClass('enable-parallax')) {
                    if ((G5Plus.common.isDesktop()) && ($window.height() >= ($footer.outerHeight() + headerSticky + $adminBarHeight))) {
                        $body.css({
                            'padding-bottom': ($footer.outerHeight()) + 'px'
                        });
                        $body.removeClass('footer-static');
                    } else {
                        $body.addClass('footer-static');
                        $body.css({
                            'padding-bottom': '0px'
                        });
                    }
                }
            } else {
                $body.removeClass('footer-static');
            }
        },
        topDrawer : function() {
            $('.top-drawer-toggle').click( function(){
                var $topDrawerBar = $('#top-drawer-bar' );
                $topDrawerBar.slideToggle('slow' );
                $(this).toggleClass('open');
            });
        },
        backToTop : function() {
            var $backToTop = $('.back-to-top');
            if ($backToTop.length > 0) {
                $backToTop.click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: '0px'},800);
                });
                $window.on('scroll', function (event) {
                    var scrollPosition = $window.scrollTop();
                    var windowHeight = $window.height() / 2;
                    if (scrollPosition > windowHeight) {
                        $backToTop.addClass('in');
                    }
                    else {
                        $backToTop.removeClass('in');
                    }
                });
            }
        },
        setWidgetCollapse : function() {
            var windowWidth = $window.width();
            if( window.matchMedia('(max-width: 767px)').matches){
                $('footer.footer-collapse-able aside.widget').each(function(){
                    var title = $('h4:first',this);
                    var content = $(title).next();
                    $(title).addClass('collapse');
                    if(content!=null && content!='undefined')
                        $(content).hide();
                    $(title).off();
                    $(title).click(function(){
                        var content = $(this).next();
                        if($(this).hasClass('expanded')){
                            $(this).removeClass('expanded');
                            $(title).addClass('collapse');
                            $(content).slideUp();
                        }
                        else
                        {
                            $(this).addClass('expanded');
                            $(title).removeClass('collapse');
                            $(content).slideDown();
                        }

                    });

                });
            }else{
                $('footer aside.widget').each(function(){
                    var title = $('h4:first',this);
                    $(title).off();
                    var content = $(title).next();
                    $(title).removeClass('collapse');
                    $(title).removeClass('expanded');
                    $(content).show();
                });
            }
        },
        pageTransition : function() {
            if ($body.hasClass('page-transitions')) {
                var linkElement = '.animsition-link, a[href]:not([target="_blank"]):not([href^="#"]):not([href*="javascript"]):not([href*=".jpg"]):not([href*=".jpeg"]):not([href*=".gif"]):not([href*=".png"]):not([href*=".mov"]):not([href*=".swf"]):not([href*=".mp4"]):not([href*=".flv"]):not([href*=".avi"]):not([href*=".mp3"]):not([href^="mailto:"]):not([class*="no-animation"]):not([class*="prettyPhoto"]):not([class*="add_to_wishlist"]):not([class*="add_to_cart_button"])';
                $(linkElement).on('click', function(event) {
	                if ($( event.target ).closest($('b.x-caret', this)).length > 0) {
		                event.preventDefault();
		                return;
	                }
                    event.preventDefault();
                    var $self = $(this);
                    var url = $self.attr('href');

                    // middle mouse button issue #24
                    // if(middle mouse button || command key || shift key || win control key)
                    if (event.which === 2 || event.metaKey || event.shiftKey || navigator.platform.toUpperCase().indexOf('WIN') !== -1 && event.ctrlKey) {
                        window.open(url, '_blank');
                    } else {
                        G5Plus.page.fadePageOut(url);
                    }

                });
            }
        },
        fadePageIn : function() {
            if ($body.hasClass('page-loading')) {
                var preloadTime = 1000,
                    $loading = $('.site-loading');
                $loading.css('opacity', '0');
                setTimeout(function() {
                    $loading.css('display', 'none');
                }, preloadTime);
            }
        },
        fadePageOut: function(link) {

            $('.site-loading').css('display', 'block').animate({
                opacity: 1,
                delay: 200
            }, 600, "linear" );

            $('html,body').animate({scrollTop: '0px'},800);

            setTimeout(function() {
                window.location = link;
            }, 600);
        },
        pageTitleBackgroundParallax : function() {
            var windowWidth = $window.width();
            $('.page-title-parallax').css('background-size', windowWidth + 'px');
        }
    };

    G5Plus.portfolio = {
        init: function () {

        }
    };

    G5Plus.blog = {
        init: function () {
            G5Plus.blog.jPlayerSetup();
            G5Plus.blog.infiniteScroll();
            G5Plus.blog.loadMore();
            G5Plus.blog.gridLayout();
            setInterval(G5Plus.blog.gridLayout,300);
            G5Plus.blog.masonryLayout();
            setInterval(G5Plus.blog.masonryLayout,300);
            G5Plus.blog.likeComment();
        },
        windowResized : function() {
            G5Plus.blog.processWidthAudioPlayer();
        },
        jPlayerSetup : function() {
            $('.jp-jplayer').each(function () {
                var $this = $(this),
                    url = $this.data('audio'),
                    title = $this.data('title'),
                    type = url.substr(url.lastIndexOf('.') + 1),
                    player = '#' + $this.data('player'),
                    audio = {};
                audio[type] = url;
                audio['title'] = title;
                $this.jPlayer({
                    ready: function () {
                        $this.jPlayer('setMedia', audio);
                    },
                    swfPath: '../plugins/jquery.jPlayer',
                    cssSelectorAncestor: player
                });
            });
            G5Plus.blog.processWidthAudioPlayer();
        },
        processWidthAudioPlayer : function() {
            setTimeout(function () {
                $('.jp-audio .jp-type-single').each(function () {
                    var _width = $(this).outerWidth() - $('.jp-controls', this).outerWidth() - parseInt($('.jp-controls', this).css('margin-right').replace('px',''),10) - parseInt($('.jp-controls', this).css('margin-left').replace('px',''),10)  - 25;
                    $('.jp-progress', this).width(_width);
                });
            }, 100);
        },
        infiniteScroll : function() {
            var contentWrapper = '.blog-inner';
            $('.blog-inner').infinitescroll({
                navSelector: "#infinite_scroll_button",
                nextSelector: "#infinite_scroll_button a",
                itemSelector: "article",
                animate : true,
                loading: {
                    'selector': '#infinite_scroll_loading',
                    'img': g5plus_framework_theme_url + 'assets/images/ajax-loader.gif',
                    'msgText': 'Loading...',
                    'finishedMsg': ''
                }
            }, function (newElements, data, url) {
                var $newElems = $(newElements).css({
                    opacity: 0
                });
                $newElems.imagesLoaded(function () {
                    G5Plus.common.owlCarousel();
                    G5Plus.blog.jPlayerSetup();
                    G5Plus.common.prettyPhoto();
                    $newElems.animate({
                        opacity: 1
                    });


                    if ($(contentWrapper).hasClass('blog-style-masonry')) {
                        $(contentWrapper).isotope('appended', $newElems);
                        setTimeout(function() {
                            $(contentWrapper).isotope('layout');
                        }, 400);
                    }


                });

            });
        },
        loadMore : function() {
            $('.blog-load-more').on('click', function (event) {
                event.preventDefault();
                var $this = $(this).button('loading');
                var link = $(this).attr('data-href');
                var contentWrapper = '.blog-inner';
                var element = 'article';

                $.get(link, function (data) {
                    var next_href = $('.blog-load-more', data).attr('data-href');
                    var $newElems = $(element, data).css({
                        opacity: 0
                    });

                    $(contentWrapper).append($newElems);
                    $newElems.imagesLoaded(function () {
                        G5Plus.common.owlCarousel();
                        G5Plus.blog.jPlayerSetup();
                        G5Plus.common.prettyPhoto();

                        $newElems.animate({
                            opacity: 1
                        });

                        if (($(contentWrapper).hasClass('blog-style-masonry'))  || ($(contentWrapper).hasClass('blog-style-grid'))) {
                            $(contentWrapper).isotope('appended', $newElems);
                            setTimeout(function() {
                                $(contentWrapper).isotope('layout');
                            }, 400);
                        }

                    });


                    if (typeof(next_href) == 'undefined') {
                        $this.parent().remove();
                    } else {
                        $this.button('reset');
                        $this.attr('data-href', next_href);
                    }

                });
            });
        },
        gridLayout : function() {
            var $blog_grid = $('.blog-style-grid');
            $blog_grid.imagesLoaded( function() {
                $blog_grid.isotope({
                    itemSelector : 'article',
                    layoutMode: "fitRows",
                    isOriginLeft: !isRTL
                });
                setTimeout(function () {
                    $blog_grid.isotope('layout');
                }, 500);
            });
        },
        masonryLayout : function() {
            var $blog_masonry = $('.blog-style-masonry');
            $blog_masonry.imagesLoaded( function() {
                $blog_masonry.isotope({
                    itemSelector : 'article',
                    layoutMode: "masonry",
                    isOriginLeft: !isRTL
                });

                setTimeout(function () {
                    $blog_masonry.isotope('layout');
                }, 500);
            });
        },
        likeComment : function() {
            $(document).on('click','a[data-like-comment="true"]:not(".liked")',function(event){
                event.preventDefault();
                var $this = $(this);
                var id = $(this).data('id');
                var comment_liked = $.cookie('g5plus_comment_liked');
                if (typeof(comment_liked) != "undefined" && comment_liked.indexOf('|'+id+'|') >= 0) {
                    return;
                }
                $.ajax({
                    url: g5plus_framework_ajax_url,
                    data : {
                        action : 'blog_comment_like',
                        id : id
                    },
                    success: function(data) {
                        var comment_liked =   $.cookie('g5plus_comment_liked');
                        if (typeof(comment_liked) == "undefined") {
                            comment_liked = '|' + id + '|';
                        } else {
                            comment_liked += id + '|';
                        }
                        $.cookie('g5plus_comment_liked',comment_liked,{path: '/'});
                        $this.addClass('liked');
                        $('label',$this).text(data);
                    }
                });
            });
        }
    };

    G5Plus.woocommerce = {
        init: function () {
            G5Plus.woocommerce.setCartScrollBar();
            G5Plus.woocommerce.addCartQuantity();
            if (!$body.hasClass('woocommerce-compare-page')) {
                G5Plus.woocommerce.addToCart();
            }

            G5Plus.woocommerce.quickView();
            G5Plus.woocommerce.updateShippingMethod();
            G5Plus.woocommerce.addToWishlist();
            G5Plus.woocommerce.productFilter();
        },
        windowResized : function () {
            G5Plus.woocommerce.setCartScrollBar();
        },
        windowLoad : function() {
            G5Plus.woocommerce.setCartScrollBar();
        },
        setCartScrollBar: function () {
	        $('ul.cart_list.product_list_widget').perfectScrollbar({
		        wheelSpeed: 0.5,
		        suppressScrollX: true
	        });
        },
        addCartQuantity: function () {
            $(document).off('click', '.quantity .btn-number').on('click', '.quantity .btn-number', function (event) {
                event.preventDefault();
                var type = $(this).data('type'),
                    input = $('input', $(this).parent()),
                    current_value = parseFloat(input.val()),
                    max  = parseFloat(input.attr('max')),
                    min = parseFloat(input.attr('min')),
                    step = parseFloat(input.attr('step')),
                    stepLength = 0;
                if (input.attr('step').indexOf('.') > 0) {
                    stepLength = input.attr('step').split('.')[1].length;
                }

                if (isNaN(max)) {
                    max = 100;
                }
                if (isNaN(min)) {
                    min = 0;
                }
                if (isNaN(step)) {
                    step = 1;
                    stepLength = 0;
                }

                if (!isNaN(current_value)) {
                    if (type == 'minus') {
                        if (current_value > min) {
                            current_value = (current_value - step).toFixed(stepLength);
                            input.val(current_value).change();
                        }

                        if (parseFloat(input.val()) <= min) {
                            input.val(min).change();
                            $(this).attr('disabled', true);
                        }
                    }

                    if (type == 'plus') {
                        if (current_value < max) {
                            current_value = (current_value + step).toFixed(stepLength);
                            input.val(current_value).change();
                        }
                        if (parseFloat(input.val()) >= max) {
                            input.val(max).change();
                            $(this).attr('disabled', true);
                        }
                    }
                } else {
                    input.val(min);
                }
            });


            $('input', '.quantity').focusin(function () {
                $(this).data('oldValue', $(this).val());
            });

            $('input', '.quantity').on('change', function () {
                var input = $(this),
                    max = parseFloat(input.attr('max')),
                    min = parseFloat(input.attr('min')),
                    current_value = parseFloat(input.val()),
                    step = parseFloat(input.attr('step'));

                if (isNaN(max)) {
                    max = 100;
                }
                if (isNaN(min)) {
                    min = 0;
                }

                if (isNaN(step)) {
                    step = 1;
                }


                var btn_add_to_cart = $('.add_to_cart_button', $(this).parent().parent().parent());
                if (current_value >= min) {
                    $(".btn-number[data-type='minus']", $(this).parent()).removeAttr('disabled');
                    if (typeof(btn_add_to_cart) != 'undefined') {
                        btn_add_to_cart.attr('data-quantity', current_value);
                    }

                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));

                    if (typeof(btn_add_to_cart) != 'undefined') {
                        btn_add_to_cart.attr('data-quantity', $(this).data('oldValue'));
                    }
                }

                if (current_value <= max) {
                    $(".btn-number[data-type='plus']", $(this).parent()).removeAttr('disabled');
                    if (typeof(btn_add_to_cart) != 'undefined') {
                        btn_add_to_cart.attr('data-quantity', current_value);
                    }
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                    if (typeof(btn_add_to_cart) != 'undefined') {
                        btn_add_to_cart.attr('data-quantity', $(this).data('oldValue'));
                    }
                }

            });
        },
        addToCart: function () {

            $(document).on('click', '.add_to_cart_button', function () {
                var button = $(this),
                    buttonWrap = button.parent();

                if (!button.hasClass('single_add_to_cart_button') && button.is( '.product_type_simple' )) {
                    button.addClass("added-spinner");
                    button.find('i').attr('class', 'fa fa-spinner fa-spin');
                    var productWrap = buttonWrap.parent().parent().parent().parent();
                    if (typeof(productWrap) == 'undefined') {
                        return;
                    }
                    productWrap.addClass('active');
                }

            });


            $body.bind("added_to_cart", function (event, fragments, cart_hash, $thisbutton) {
                G5Plus.woocommerce.setCartScrollBar();
                var is_single_product = $thisbutton.hasClass('single_add_to_cart_button');

                if (is_single_product) return;

                var button = $thisbutton,
                    buttonWrap = button.parent(),
                    buttonViewCart = buttonWrap.find('.added_to_cart'),
                    addedTitle = buttonViewCart.text(),
                    productWrap = buttonWrap.parent().parent().parent().parent();

                button.remove();

                buttonViewCart.html('<i class="fa fa-check"></i>');
                setTimeout(function () {
                    buttonWrap.tooltip('hide').attr('title', addedTitle).tooltip('fixTitle');
                }, 500);

                setTimeout(function () {
                    productWrap.removeClass('active');
                }, 700);

            });
        },
        quickView : function() {
            var is_click_quick_view = false;
            $('.product-quick-view').on('click', function (event) {
                event.preventDefault();
                if (is_click_quick_view) return;
                is_click_quick_view = true;
                var product_id = $(this).data('product_id'),
                    popupWrapper = '#popup-product-quick-view-wrapper',
                    $icon = $(this).find('i'),
                    iconClass = $icon.attr('class'),
                    productWrap = $(this).parent().parent().parent().parent(),
                    button = $(this);
                productWrap.addClass('active');
                button.addClass('active');
                $icon.attr('class','fa fa-spinner fa-spin');
                $.ajax({
                    url: g5plus_framework_ajax_url,
                    data: {
                        action: 'product_quick_view',
                        id: product_id
                    },
                    success: function (html) {
                        productWrap.removeClass('active');
                        button.removeClass('active');
                        $icon.attr('class',iconClass);
                        if ($(popupWrapper).length) {
                            $(popupWrapper).remove();
                        }
                        $('body').append(html);
                        G5Plus.woocommerce.addCartQuantity();
                        G5Plus.common.tooltip();
                        var $productImageWrap = $('#quick-view-product-image');
                        G5Plus.woocommerce.singleProductImage($productImageWrap);
                        $(popupWrapper).modal();
                        is_click_quick_view = false;
                    },
                    error: function (html) {
                        G5Plus.common.hideLoading();
                        is_click_quick_view = false;
                    }
                });

            });
        },
        updateShippingMethod : function() {
            $body.bind('updated_shipping_method',function(){
                $('select.country_to_state, input.country_to_state').change();
            });
        },
        addToWishlist : function() {
            $(document).on('click', '.add_to_wishlist', function () {
                var button = $(this),
                    buttonWrap = button.parent().parent();

                if (!buttonWrap.parent().hasClass('single-product-function')) {
                    button.addClass("added-spinner");
                    var productWrap = buttonWrap.parent().parent().parent().parent();
                    if (typeof(productWrap) == 'undefined') {
                        return;
                    }
                    productWrap.addClass('active');
                }

            });

            $body.bind("added_to_wishlist", function (event, fragments, cart_hash, $thisbutton) {
                var button = $('.added-spinner.add_to_wishlist'),
                    buttonWrap = button.parent().parent();
                if (!buttonWrap.parent().hasClass('single-product-function')) {
                    var productWrap = buttonWrap.parent().parent().parent().parent();
                    if (typeof(productWrap) == 'undefined') {
                        return;
                    }
                    setTimeout(function () {
                        productWrap.removeClass('active');
                        button.removeClass('added-spinner');
                    }, 700);
                }

            });


        },
        productFilter : function() {
            var $filterWrap = $('#product-filter-wrap');
            if ($filterWrap.length == 0) return;

            $('.product-filter').on('click',function() {
                if (($body.hasClass('product-filter-in')) ) return;
                $body.addClass('product-filter-in');
            });

            $('#product-filter-overlay').click(function() {
                $body.removeClass('product-filter-in');
            });

            $filterWrap.perfectScrollbar({
                wheelSpeed: 0.5,
                suppressScrollX: true
            });
        },
        singleProductImage : function($productImageWrap) {
            var vertical = $productImageWrap.hasClass('vertical'),
                $slider = $productImageWrap.find('.product-image-slider'),
                $thumb = $productImageWrap.find('.product-image-thumb'),
                visibleItems = [],
                option = 0;

            $slider.slick({
                infinite: false,
                fade: true,
                speed: 400,
                adaptiveHeight: true,
                arrows: false,
                dots: false
            });

            $slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                syncPosition(nextSlide);
            });


            $thumb.on("init", function (event, slick) {
                $(this).find(".slick-slide").eq(0).addClass("synced");
                var WW = window.innerWidth;
                if (WW >= 1020) {
                    option = 4;
                }

                if (WW < 1020) {
                    option = 3;
                }

                for (var i = 0; i < option; i++) {
                    visibleItems.push(i);
                }
            });

            $window.on('resize load', function (event) {
                var WW = window.innerWidth;
                if (WW >= 1020) {
                    option = 4;
                }

                if (WW < 1020) {
                    option = 3;
                }
                return option;
            });

            $thumb.on('afterChange', function (event, slick, currentSlide) {
                visibleItems.length = 0;
                for (var i = currentSlide; i < currentSlide + option; i++) {
                    visibleItems.push(i);
                }
            });

            $thumb.slick({
                swipeToSlide: true,
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                speed: 400,
                arrows: false,
                centerPadding: '0px',
                vertical: vertical,
                verticalSwiping: vertical,
                responsive: [
                    {
                        breakpoint: 1230,
                        settings: {
                            slidesToShow: 4,
                            vertical: false,
                            verticalSwiping: false
                        }
                    },
                    {
                        breakpoint: 1020,
                        settings: {
                            slidesToShow: 3,
                            vertical: false,
                            verticalSwiping: false
                        }
                    }
                ]
            });

            $thumb.on("click", ".slick-slide", function (e) {
                e.preventDefault();
                var number = $(this).data("slick-index");
                $slider.slick("slickGoTo", number);
            });



            function syncPosition(value) {
                var current = value;
                $thumb
                    .find(".slick-slide")
                    .removeClass("synced")
                    .eq(current)
                    .addClass("synced");
                center(current);
            }



            function center(number) {
                var num = number;
                var found = false;
                var lastSlideIndex = $thumb.find('.slick-slide:last').index();
                for (var i in visibleItems) {
                    if (num === visibleItems[i]) {
                        var found = true;
                    }
                }

                if (found === false) {
                    if (num > visibleItems[visibleItems.length - 1]) {
                        if (num == lastSlideIndex) {
                            $thumb.slick("slickGoTo", num - visibleItems.length + 1);
                        }

                        else {
                            $thumb.slick("slickGoTo", num - visibleItems.length + 2);
                        }
                    }
                    else {
                        if (num - 1 === -1) {
                            $thumb.slick("slickGoTo", 0);
                        }
                        else {
                            $thumb.slick("slickGoTo", num - 1);
                        }
                    }

                } else if (num === visibleItems[visibleItems.length - 1]) {
                    $thumb.slick("slickGoTo", visibleItems[1]);
                } else if (num === visibleItems[0]) {
                    $thumb.slick("slickGoTo", num - 1);
                }
            }

            $(document).on('change', '.variations_form .variations select,.variations_form .variation_form_section select,div.select', function () {
                var variation_form = $(this).closest('.variations_form');
                var current_settings = {},
                    reset_variations = variation_form.find('.reset_variations');
                variation_form.find('.variations select,.variation_form_section select').each(function () {
                    // Encode entities
                    var value = $(this).val();

                    // Add to settings array
                    current_settings[$(this).attr('name')] = jQuery(this).val();
                });

                variation_form.find('.variation_form_section div.select input[type="hidden"]').each(function () {
                    // Encode entities
                    var value = $(this).val();

                    // Add to settings array
                    current_settings[$(this).attr('name')] = jQuery(this).val();
                });

                var all_variations = variation_form.data('product_variations');

                var variation_id = 0;
                var match = true;

                for (var i = 0; i < all_variations.length; i++) {
                    match = true;
                    var variations_attributes = all_variations[i]['attributes'];
                    for (var attr_name in variations_attributes) {
                        var val1 = variations_attributes[attr_name];
                        var val2 = current_settings[attr_name];
                        if (val1 == undefined || val2 == undefined) {
                            match = false;
                            break;
                        }
                        if (val1.length == 0) {
                            continue;
                        }

                        if (val1 != val2) {
                            match = false;
                            break;
                        }
                    }
                    if (match) {
                        variation_id = all_variations[i]['variation_id'];
                        break;
                    }
                }

                if (variation_id > 0) {
                    var index = parseInt($('a[data-variation_id*="|' + variation_id + '|"]',$slider).data('index'), 10);
                    if (!isNaN(index)) {
                        $slider.slick("slickGoTo", index);
                    }
                }
            });
	        setTimeout(function(){
		        $slider.slick('refresh');
		        $thumb.slick('refresh');
	        },500);
        }
    };

	G5Plus.search = {
		up: function($wrapper) {
			var $item = $('li.selected', $wrapper);
			console.log($item, $wrapper);
			if ($('li', $wrapper).length < 2) return;
			var $prev = $item.prev();
			$item.removeClass('selected');
			if ($prev.length) {
				$prev.addClass('selected');
			}
			else {
				$('li:last', $wrapper).addClass('selected');
				$prev = $('li:last', $wrapper);
			}
			var $ajaxSearchResult = $(' > ul', $wrapper);

			if ($prev.position().top < $ajaxSearchResult.scrollTop()) {
				$ajaxSearchResult.scrollTop($prev.position().top);
			}
			else if ($prev.position().top + $prev.outerHeight() > $ajaxSearchResult.scrollTop() + $ajaxSearchResult.height()) {
				$ajaxSearchResult.scrollTop($prev.position().top - $ajaxSearchResult.height() + $prev.outerHeight());
			}
		},
		down: function ($wrapper) {
			var $item = $('li.selected', $wrapper);
			if ($('li', $wrapper).length < 2) return;
			var $next = $item.next();
			$item.removeClass('selected');
			if ($next.length) {
				$next.addClass('selected');
			}
			else {
				$('li:first', $wrapper).addClass('selected');
				$next = $('li:first', $wrapper);
			}
			var $ajaxSearchResult = $('> ul', $wrapper);

			if ($next.position().top < $ajaxSearchResult.scrollTop()) {
				$ajaxSearchResult.scrollTop($next.position().top);
			}
			else if ($next.position().top + $next.outerHeight() > $ajaxSearchResult.scrollTop() + $ajaxSearchResult.height()) {
				$ajaxSearchResult.scrollTop($next.position().top - $ajaxSearchResult.height() + $next.outerHeight());
			}
		}
	};

    G5Plus.header = {
        timeOutSearch: null,
        init: function () {
            G5Plus.header.stickyHeader();
            G5Plus.header.menuOnePage();
            G5Plus.header.menuMobile();
            G5Plus.header.events();
            G5Plus.header.search();
	        G5Plus.header.searchAjaxForm();
	        G5Plus.header.headerLeftPosition();
	        G5Plus.header.searchCategory();
	        G5Plus.header.headerOverlay();
	        G5Plus.header.canvasMenu();
        },
        events: function() {
            // Anchors Position
            $("a[data-hash]").on("click", function (e) {
                e.preventDefault();
                G5Plus.page.anchorsPosition(this);
                return false;
            });

	        // Sroll bar header mobile
	        $('#mobile-header-wrapper .header-mobile-nav').perfectScrollbar({
		        wheelSpeed: 0.5,
		        suppressScrollX: true
	        });
        },
        windowResized : function(){
            G5Plus.header.stickyHeader();
	        G5Plus.header.headerNavSpacing(1);
            if (G5Plus.common.isDesktop()) {
                $('.toggle-icon-wrapper[data-drop]').removeClass('in');
            }
            var $adminBar = $('#wpadminbar');

            if ($adminBar.length > 0) {
                $body.attr('data-offset', $adminBar.outerHeight() + 1);
            }
            if ($adminBar.length > 0) {
                $body.attr('data-offset', $adminBar.outerHeight() + 1);
            }
	        G5Plus.header.headerMobileFlyPosition();
	        G5Plus.header.headerMobilePosition();
	        G5Plus.header.changeSubMenuMultiHeight();
        },
	    windowLoad: function() {
		    G5Plus.header.headerNavSpacing(1);
		    G5Plus.header.headerLeftScrollBar();
		    G5Plus.header.headerMobileFlyPosition();
		    G5Plus.header.headerMobilePosition();
		    G5Plus.header.fixStickyLogoSize();
		    G5Plus.header.changeSubMenuMultiHeight();
	    },
	    fixStickyLogoSize: function() {
			// if IE
		    if (G5Plus.common.isIE()) {
			    var $logo = $("header .logo-sticky img");
			    if ($logo.length == 0) {
				    return;
			    }
			    var logo_url = $logo.attr('src');
			    if (logo_url.length - logo_url.lastIndexOf('.svg') != 4) {
				    return;
			    }
			    $.get(logo_url, function(svgxml){
				    /* now with access to the source of the SVG, lookup the values you want... */
				    var attrs = svgxml.documentElement.attributes;

				    var pic_real_width = attrs.width.value;   // Note: $(this).width() will not
				    var pic_real_height = attrs.height.value; // work for in memory images.

				    if (typeof (pic_real_width) == "string") {
					    pic_real_width = pic_real_width.replace('px','');
					    pic_real_width = parseInt(pic_real_width, 10);
				    }
				    if (typeof (pic_real_height) == "string") {
					    pic_real_height = pic_real_height.replace('px','');
					    pic_real_height = parseInt(pic_real_height, 10);
				    }

				    if (pic_real_height > 0) {
					    $logo.css('width', (pic_real_width * 30 / pic_real_height) +  'px');
				    }
			    }, "xml");

			}
	    },
		headerMobileFlyPosition: function() {
			var top = 0;
			if (($('#wpadminbar').length > 0) && ($('#wpadminbar').css('position') == 'fixed')) {
				top = $('#wpadminbar').outerHeight();
			}
			if (top > 0) {
				$('.header-mobile-nav.menu-drop-fly').css('top',top + 'px');
			}
			else {
				$('.header-mobile-nav.menu-drop-fly').css('top','');
			}
		},
	    headerMobilePosition: function() {
		    var top = 0;
		    if (($('#wpadminbar').length > 0) && ($('#wpadminbar').css('position') == 'fixed')) {
			    top = $('#wpadminbar').outerHeight();
		    }
		    if (top > 0) {
			    $('.header-mobile-nav.menu-drop-fly').css('top',top + 'px');
		    }
		    else {
			    $('.header-mobile-nav.menu-drop-fly').css('top','');
		    }
	    },
	    headerLeftPosition: function() {
			var top = 0;
		    if ($('#wpadminbar').length > 0) {
			    top = $('#wpadminbar').outerHeight();
		    }
			if (top > 0) {
				$('header.header-left').css('top',top + 'px');
			}
	    },
        stickyHeader : function() {
            var topSticky = 0,
                $adminBar = $('#wpadminbar');

            if (($adminBar.length > 0) && ($adminBar.css('position') =='fixed')) {
	            topSticky = $adminBar.outerHeight();
            }

            $('.header-sticky, .header-mobile-sticky').unstick();

	        var topSpacing = topSticky;

            if (G5Plus.common.isDesktop()) {
	            topSpacing = -$(window).height() + 132; // 66 sticky height
                $('.header-sticky').sticky({
	                topSpacing:topSpacing,
	                topSticky: topSticky,
	                change: function() {
		                G5Plus.header.headerNavSpacing(1);
		                $('header.main-header .x-nav-menu > li').each(function() {
			                APP_XMENU.process_menu_position(this);
		                });
	                }
                });
            }
            else {
                $('.header-mobile-sticky').sticky({topSpacing:topSpacing, topSticky: topSticky});
            }
        },
        menuOnePage : function() {
            $('.menu-one-page').onePageNav({
                currentClass: 'menu-current',
                changeHash: false,
                scrollSpeed: 750,
                scrollThreshold: 0,
                filter: '',
                easing: 'swing'
            });
        },
        anchorsPosition : function(obj, time) {
            var target = $(obj).attr("href");
            if ($(target).length > 0) {
                var _scrollTop = $(target).offset().top,
                    $adminBar = $('#wpadminbar');
                if ($adminBar.length > 0) {
                    _scrollTop -= $adminBar.outerHeight();
                }
                $("html,body").animate({scrollTop: _scrollTop}, time, 'swing', function () {

                });
            }
        },
        menuMobile : function() {
            $('.toggle-mobile-menu[data-ref]').click(function(event) {
                event.preventDefault();
                var $this = $(this);
                var data_drop = $this.data('ref');
                $this.toggleClass('in');
                switch ($this.data('drop-type')) {
                    case 'dropdown':
                        $('#' + data_drop).slideToggle();
                        break;
                    case 'fly':
                        $('body').toggleClass('menu-mobile-in');
                        $('#' + data_drop).toggleClass('in');
                        break;
                }

            });

            $('.toggle-icon-wrapper[data-ref]:not(.toggle-mobile-menu)').click(function(event) {
                event.preventDefault();
                var $this = $(this);
                var data_ref = $this.data('ref');
                $this.toggleClass('in');
                $('#' + data_ref).toggleClass('in');
            });

            $('.main-menu-overlay').click(function() {
                $body.removeClass('menu-mobile-in');
                $('#nav-menu-mobile').removeClass('in');
                $('.toggle-icon-wrapper[data-ref]').removeClass('in');
            });
        },
        search : function() {
            var $search_popup = $('#search_popup_wrapper');
            if (($search_popup.length > 0) && ($('header .icon-search-menu').data('search-type') == 'standard')) {
                var dlg_search = new DialogFx( $search_popup[0] );
                $('header .icon-search-menu').click(dlg_search.toggle.bind(dlg_search));

            }

            $('header .icon-search-menu').click(function (event) {
                event.preventDefault();
                if ($(this).data('search-type') == 'ajax') {
                    G5Plus.header.searchPopupOpen();
                }
                else {
                    $('#search_popup_wrapper input[type="text"]').focus();
                }
            });

            $('.g5plus-dismiss-modal, .modal-backdrop', '#g5plus-modal-search').click(function(){
                G5Plus.header.searchPopupClose();
            });
            $('.g5plus-search-wrapper button > i.ajax-search-icon').click(function(){
                s_search();
            });

            // Search Ajax
            $('#search-ajax', '#g5plus-modal-search').on('keyup', function(event){
                if (event.altKey || event.ctrlKey || event.shiftKey || event.metaKey) {
                    return;
                }

                var keys = ["Control", "Alt", "Shift"];
                if (keys.indexOf(event.key) != -1) return;
                switch (event.which) {
                    case 27:	// ESC
                        G5Plus.header.searchPopupClose();
                        break;
                    case 38:	// UP
                        s_up();
                        break;
                    case 40:	// DOWN
                        s_down();
                        break;
                    case 13:	//ENTER
                        var $item = $('li.selected a', '#g5plus-modal-search');
                        if ($item.length == 0) {
                            event.preventDefault();
                            return false;
                        }
                        s_enter();
                        break;
                    default:
                        clearTimeout(G5Plus.header.timeOutSearch);
                        G5Plus.header.timeOutSearch = setTimeout(s_search, 500);
                        break;
                }
            });

            function s_up(){
                var $item = $('li.selected', '#g5plus-modal-search');
                if ($('li', '#g5plus-modal-search').length < 2) return;
                var $prev = $item.prev();
                $item.removeClass('selected');
                if ($prev.length) {
                    $prev.addClass('selected');
                }
                else {
                    $('li:last', '#g5plus-modal-search').addClass('selected');
                    $prev = $('li:last', '#g5plus-modal-search');
                }
                if ($prev.position().top < $('#g5plus-modal-search .ajax-search-result').scrollTop()) {
                    $('#g5plus-modal-search .ajax-search-result').scrollTop($prev.position().top);
                }
                else if ($prev.position().top + $prev.outerHeight() > $('#g5plus-modal-search .ajax-search-result').scrollTop() + $('#g5plus-modal-search .ajax-search-result').height()) {
                    $('#g5plus-modal-search .ajax-search-result').scrollTop($prev.position().top - $('#g5plus-modal-search .ajax-search-result').height() + $prev.outerHeight());
                }
            }
            function s_down() {
                var $item = $('li.selected', '#g5plus-modal-search');
                if ($('li', '#g5plus-modal-search').length < 2) return;
                var $next = $item.next();
                $item.removeClass('selected');
                if ($next.length) {
                    $next.addClass('selected');
                }
                else {
                    $('li:first', '#g5plus-modal-search').addClass('selected');
                    $next = $('li:first', '#g5plus-modal-search');
                }
                if ($next.position().top < $('#g5plus-modal-search .ajax-search-result').scrollTop()) {
                    $('#g5plus-modal-search .ajax-search-result').scrollTop($next.position().top);
                }
                else if ($next.position().top + $next.outerHeight() > $('#g5plus-modal-search .ajax-search-result').scrollTop() + $('#g5plus-modal-search .ajax-search-result').height()) {
                    $('#g5plus-modal-search .ajax-search-result').scrollTop($next.position().top - $('#g5plus-modal-search .ajax-search-result').height() + $next.outerHeight());
                }
            }
            function s_enter() {
                var $item = $('li.selected a', '#g5plus-modal-search');
                if ($item.length > 0) {
                    window.location = $item.attr('href');
                }
            }
            function s_search() {
                var keyword = $('input[type="search"]', '#g5plus-modal-search').val();
                if (keyword.length < 3) {
                    $('.ajax-search-result', '#g5plus-modal-search').html('');
                    return;
                }
                $('.ajax-search-icon', '#g5plus-modal-search').addClass('fa-spinner fa-spin');
                $('.ajax-search-icon', '#g5plus-modal-search').removeClass('fa-search');
                $.ajax({
                    type   : 'POST',
                    data   : 'action=result_search&keyword=' + keyword,
                    url    : g5plus_framework_ajax_url,
                    success: function (data) {
                        $('.ajax-search-icon', '#g5plus-modal-search').removeClass('fa-spinner fa-spin');
                        $('.ajax-search-icon', '#g5plus-modal-search').addClass('fa-search');
                        var html = '';
	                    var html_view_more = '';
                        if (data) {
                            var items = $.parseJSON(data);
                            if (items.length) {
                                html +='<ul>';
                                if (items[0]['id'] == -1) {
                                    html += '<li>' + items[0]['title']  + '</li>';
                                }
                                else {
                                    $.each(items, function (index) {
	                                    if (this['id'] == -2) {
		                                    html_view_more = '<div class="search-view-more">' + this['title'] + '</div>';
	                                    }
	                                    else {
		                                    if (index == 0) {
			                                    html += '<li class="selected">';
		                                    }
		                                    else {
			                                    html += '<li>';
		                                    }
		                                    if (this['title'] == null || this['title'] == '') {
			                                    html += '<a href="' + this['guid'] + '">' + this['date'] + '</a>';
		                                    }
		                                    else {
			                                    html += '<a href="' + this['guid'] + '">' + this['title'] + '</a>';
			                                    html += '<span>' + this['date'] + ' </span>';
		                                    }
		                                    html += '</li>';
	                                    }
                                    });
                                }


                                html +='</ul>';
                            }
                            else {
                                html = '';
                            }
                        }
                        $('.ajax-search-result', '#g5plus-modal-search').html(html + html_view_more);
                        $('#g5plus-modal-search .ajax-search-result').scrollTop(0);
                    },
                    error : function(data) {
	                    $('.ajax-search-icon', '#g5plus-modal-search').removeClass('fa-spinner fa-spin');
	                    $('.ajax-search-icon', '#g5plus-modal-search').addClass('fa-search');
                    }
                });
            }
        },
        searchPopupOpen : function() {
            if (!$('#g5plus-modal-search').hasClass('in')) {
	            $('body').addClass('overflow-hidden');
                $('#g5plus-modal-search').show();
                setTimeout(function () {
                    $('#g5plus-modal-search').addClass('in');
                }, 300);

                if ($('#search-ajax', '#g5plus-modal-search').length > 0) {
                    $('#search-ajax', '#g5plus-modal-search').focus();
                    $('#search-ajax', '#g5plus-modal-search').val('');
                }
                else {
                    $('#search-standard', '#g5plus-modal-search').focus();
                    $('#search-standard', '#g5plus-modal-search').val('');
                }

                $('.ajax-search-result', '#g5plus-modal-search').html('');
            }
        },
        searchPopupClose : function() {
            if ($('#g5plus-modal-search').hasClass('in')) {
                $('#g5plus-modal-search').removeClass('in');
                setTimeout(function () {
                    $('#g5plus-modal-search').hide();
	                $('body').removeClass('overflow-hidden');
                }, 300);
            }
        },
	    searchAjaxForm: function() {
		    var $wrapper = $('header.main-header .search-box-wrapper');
		    var $form_wrapper = $('header.main-header .search-box-wrapper form.search-type-ajax');
		    $($window).click(function(event){
			    if ($(event.target).closest('header.main-header .search-box-wrapper').length == 0) {
				    $('.ajax-search-result', $wrapper).remove();
				    $('> input[type="text"]', $form_wrapper).val('');
			    }
		    });
		    $form_wrapper.submit(function() {
			    return false;
		    });

		    $('> input[type="text"]', $form_wrapper).on('keyup', function(event) {
			    if (event.altKey || event.ctrlKey || event.shiftKey || event.metaKey) {
				    return;
			    }

			    var keys = ["Control", "Alt", "Shift"];
			    if (keys.indexOf(event.key) != -1) return;
			    switch (event.which) {
				    case 27:	// ESC
					    remove_search_result();
					    break;
				    case 38:	// UP
					    G5Plus.search.up($wrapper);
					    break;
				    case 40:	// DOWN
					    G5Plus.search.down($wrapper);

					    break;
				    case 13:	//ENTER
					    s_enter();
					    break;
				    default:
					    clearTimeout(G5Plus.header.timeOutSearch);
					    G5Plus.header.timeOutSearch = setTimeout(s_search, 500);
					    break;
			    }
			    function remove_search_result() {
					$('.ajax-search-result', $wrapper).remove();
				    $('> input[type="text"]', $form_wrapper).val('');
			    }

			    function s_enter() {
				    var $item = $('li.selected a', $wrapper);

				    if ($item.length > 0) {
					    window.location = $item.attr('href');
				    }
			    }
			    function s_search() {
				    var keyword = $('input[type="text"]', $form_wrapper).val();
				    if (keyword.length < 3) {
					    if ($('.ajax-search-result', $form_wrapper).length == 0) {
						    $($form_wrapper).append('<div class="ajax-search-result"></div>');
					    }
					    var hint_message = $wrapper.attr('data-hint-message');

					    $('.ajax-search-result', $wrapper).html('<ul><li class="no-result">' + hint_message + '</li></ul>');
					    return;
				    }
				    $('button > i', $form_wrapper).addClass('fa-spinner fa-spin');
				    $('button > i', $form_wrapper).removeClass('fa-search');
				    $.ajax({
					    type   : 'POST',
					    data   : 'action=result_search&keyword=' + keyword,
					    url    : g5plus_framework_ajax_url,
					    success: function (data) {
						    $('button > i', $wrapper).removeClass('fa-spinner fa-spin');
						    $('button > i', $wrapper).addClass('fa-search');
						    var html = '';
						    var html_view_more = '';
						    if (data) {
							    var items = $.parseJSON(data);
							    if (items.length) {
								    html +='<ul>';
								    if (items[0]['id'] == -1) {
									    html += '<li class="no-result">' + items[0]['title']  + '</li>';
								    }
								    else {
									    $.each(items, function (index) {
										    if (this['id'] == -2) {
											    html_view_more = '<div class="search-view-more">' + this['title'] + '</div>';
										    }
										    else {
											    if (index == 0) {
												    html += '<li class="selected">';
											    }
											    else {
												    html += '<li>';
											    }
											    if (this['title'] == null || this['title'] == '') {
												    html += '<a href="' + this['guid'] + '">' + this['date'] + '</a>';
											    }
											    else {
												    html += '<a href="' + this['guid'] + '">' + this['title'] + '</a>';
											    }
											    html += '</li>';
										    }
									    });
								    }
								    html +='</ul>';
							    }
							    else {
								    html = '';
							    }
						    }
						    if ($('.ajax-search-result', $form_wrapper).length == 0) {
							    $($form_wrapper).append('<div class="ajax-search-result"></div>');
						    }

						    $('.ajax-search-result', $wrapper).html(html + html_view_more);
						    $('.ajax-search-result ul', $wrapper).scrollTop(0);
					    },
					    error : function(data) {
						    $('button > i', $wrapper).removeClass('fa-spinner fa-spin');
						    $('button > i', $wrapper).addClass('fa-search');
					    }
				    });
			    }


		    });
	    },

	    headerNavSpacing: function(retryAmount) {
		    if (typeof (retryAmount) == "undefined") {
			    retryAmount = 0;
		    }

		    if (!G5Plus.common.isDesktop()) {
			    G5Plus.header.changeStickyWrapperSize(3);
		        return;
		    }

		    var arrConfig = {
				'header-1': {
					container: 'header.main-header .header-container',
					items: '> .header-logo, > .header-nav-right'
				},
			    'header-2': {
				    container: 'header.main-header .header-nav-left, header.main-header .header-nav-right',
				    items: '> .header-customize'
			    },
			    'header-3': {
				    container: 'header.main-header .header-nav-left, header.main-header .header-nav-right',
				    items: '> .header-customize'
			    },
			    'header-4': {
				    container: 'header.main-header .header-container',
				    items: '> .header-nav-left, > .header-nav-right'
			    },
			    'header-5': {
				    container: 'header.main-header .header-container',
				    items: '> .header-nav-left, > .header-nav-right'
			    },
			    'header-6': {
				    container: 'header.main-header .header-container',
				    items: '> .header-nav-left, > .header-nav-right'
			    }
		    };

		    var headerLayout = $('body').attr('data-header');

		    if ((typeof (headerLayout) != "undefined") && (headerLayout != null) && (typeof (arrConfig[headerLayout]) != "undefined")) {
			    $(arrConfig[headerLayout].container).each(function() {
					var $container = $(this);
				    $('ul.main-menu > li', $container).css('margin-left','');

				    var marginDefault = 40;
				    var containerWidth = $container.width();

				    var navItemCount = 0;

				    $('.x-nav-menu > li', $container).each(function(){
					    var $this = $(this);
					    if ($this.is(':visible')) {
						    navItemCount++;
					    }
				    });

				    var  totalWidth = 0;
				    $(arrConfig[headerLayout].items, $container).each(function(){
					    var $this = $(this);
					    if ($this.is(':visible')) {
						    totalWidth += $this.outerWidth();
					    }
				    });

				    if (containerWidth < totalWidth) {
					    navItemCount--;

					    if (navItemCount > 0) {
						    console.log(marginDefault, totalWidth, containerWidth, navItemCount);
						    var marginLeft = marginDefault - (totalWidth - containerWidth + 40) * 1.0/ navItemCount;
						    if (marginLeft < 10) {
							    marginLeft = 10;
						    }
						    if (marginLeft < marginDefault) {
							    $('ul.main-menu > li', $container).not(':first').css('margin-left', marginLeft + 'px');
						    }
					    }
				    }
			    });
		    }

		    G5Plus.header.changeStickyWrapperSize(3);

		    if (retryAmount > 0) {
			    setTimeout(function() {
				    G5Plus.header.headerNavSpacing(retryAmount - 1);
			    }, 100);
		    }
	    },
	    changeStickyWrapperSize: function(count) {
		    var $sticky_wrapper = $('header.main-header .sticky-wrapper');
		    if ($sticky_wrapper.length > 0) {
			    $sticky_wrapper.height($(' > .header-sticky',$sticky_wrapper).outerHeight());
		    }

		    if (count > 0) {
			    setTimeout(function() {
				    G5Plus.header.changeStickyWrapperSize(count - 1);
			    }, 100);
		    }
	    },
	    headerLeftScrollBar: function () {
		    $('header.header-left').perfectScrollbar({
			    wheelSpeed: 0.5,
			    suppressScrollX: true
		    });
	    },
	    searchCategory: function () {
		    $('.search-with-category').each(function() {
			    var $wrapperLeft = $('.form-search-left', this);
			    var $wrapper = $(this);
			    $(document).on('click', function(event) {
				    if ($(event.target).closest('.form-search-left', $wrapper).length === 0) {
					    $(' > ul', $wrapperLeft).slideUp();
				    }
				    if (($(event.target).closest('.form-search-right,.ajax-search-result', $wrapper).length === 0)) {
					    $('.ajax-search-result', $wrapper).remove();
					    $('input', $wrapper).val('');
				    }
			    });

			    var sHtml = '<li><span data-id="-1" data-value="' + $('> span', $wrapperLeft).text() + '">[' + $('> span', $wrapperLeft).text() + ']</span></li>';
			    $('> ul', $wrapperLeft).prepend(sHtml);

			    // Select Category
			    $('> span', $wrapperLeft).on('click', function() {
				    $('> ul', $(this).parent()).slideToggle();
			    });

			    // Category Click
			    $('li > span', $wrapperLeft).on('click', function() {
				    var $this = $(this);
				    var id = $this.attr('data-id');
				    var text = '';
				    if (typeof ($this.attr('data-value')) != "undefined") {
					    text = $this.attr('data-value');
				    }
				    else {
					    text = $this.text();
				    }

				    var $cate_current = $('> span', $wrapperLeft);
				    $cate_current.text(text);
				    $cate_current.attr('data-id', id);
				    $(' > ul', $wrapperLeft).slideUp();
			    });

			    // Search process
			    //--------------------------------------------------------------------------------------
			    var $inputSearch = $('input', $wrapper);
			    $inputSearch.on('keyup', function(event){
				    var s_timeOut_search = null;
				    if (event.altKey || event.ctrlKey || event.shiftKey || event.metaKey) {
					    return;
				    }

				    var keys = ["Control", "Alt", "Shift"];
				    if (keys.indexOf(event.key) != -1) return;
				    switch (event.which) {
					    case 37:
					    case 39:
						    break;
					    case 27:	// ESC
						    $('.ajax-search-result', $wrapper).remove();
						    $(this).val('');
						    break;
					    case 38:	// UP
						    G5Plus.search.up($('.ajax-search-result', $wrapper));
						    break;
					    case 40:	// DOWN
						    G5Plus.search.down($('.ajax-search-result', $wrapper));
						    break;
					    case 13:	//ENTER
						    var $item = $('.ajax-search-result li.selected a', $wrapper);
						    if ($item.length == 0) {
							    event.preventDefault();
							    return false;
						    }

						    window.location = $item.attr('href');

						    event.preventDefault();
						    return false;
					    default:
						    clearTimeout(s_timeOut_search);
						    s_timeOut_search = setTimeout(function() {
							    s_search($wrapper);
						    }, 500);
						    break;
				    }
			    });
		    });

		    function s_search($wrapper) {
			    var keyword = $('input[type="text"]', $wrapper).val();
			    if (keyword.length < 3) {
				    if ($('.ajax-search-result', $wrapper).length == 0) {
					    $($wrapper).append('<div class="ajax-search-result"></div>');
				    }
				    var hint_message = $wrapper.attr('data-hint-message');

				    $('.ajax-search-result', $wrapper).html('<ul><li class="no-result">' + hint_message + '</li></ul>');
				    return;
			    }
			    $('button > i', $wrapper).addClass('fa-spinner fa-spin');
			    $('button > i', $wrapper).removeClass('fa-search');
			    $.ajax({
				    type   : 'POST',
				    data   : 'action=result_search_product&keyword=' + keyword + '&cate_id=' + $('.form-search-left > span', $wrapper).attr('data-id'),
				    url    : g5plus_framework_ajax_url,
				    success: function (data) {
					    $('button > i', $wrapper).removeClass('fa-spinner fa-spin');
					    $('button > i', $wrapper).addClass('fa-search');
					    var html = '';
					    var sHtmlViewMore = '';
					    if (data) {
						    var items = $.parseJSON(data);
						    if (items.length) {
							    html +='<ul>';
							    if (items[0]['id'] == -1) {
								    html += '<li class="no-result">' + items[0]['title']  + '</li>';
							    }
							    else {
								    $.each(items, function (index) {
									    if (this['id'] == -2) {
										    sHtmlViewMore = '<div class="search-view-more">' + this['title'] + '</div>';
									    }
									    else {
										    if (index == 0) {
											    html += '<li class="selected">';
										    }
										    else {
											    html += '<li>';
										    }
										    html += '<a href="' + this['guid'] + '">';
										    html += this['thumb'];
										    html += this['title'] + '</a>';
										    html += '<div class="price">' + this['price'] + '</div>';
										    html += '</li>';
									    }

								    });
							    }
							    html +='</ul>';
						    }
						    else {
							    html = '';
						    }
					    }
					    if ($('.ajax-search-result', $wrapper).length == 0) {
						    $($wrapper).append('<div class="ajax-search-result"></div>');
					    }

					    $('.ajax-search-result', $wrapper).html(html + sHtmlViewMore);

					    $('.ajax-search-result li', $wrapper).hover(function () {
						    $('.ajax-search-result li', $wrapper).removeClass('selected');
						    $(this).addClass('selected');
					    });

					    $('.ajax-search-result ul', $wrapper).scrollTop(0);

				    },
				    error : function(data) {
					    $('button > i', $wrapper).removeClass('fa-spinner fa-spin');
					    $('button > i', $wrapper).addClass('fa-search');
				    }
			    });
		    }
	    },
	    headerOverlay: function () {
		    $('.overlay-menu-wrapper .overlay-menu-inner').perfectScrollbar({
			    wheelSpeed: 0.5,
			    suppressScrollX: true
		    });

		    $('header.main-header .header-overlay-open').on('click', function () {
			    $('header.main-header .header-overlay-open').toggleClass('in');
			    $('.overlay-menu-wrapper').toggleClass('in');
		    });
		    $('header.main-header .header-overlay-close').on('click', function () {
			    $('header.main-header .header-overlay-open').toggleClass('in');
			    $('.overlay-menu-wrapper').toggleClass('in');
		    });

	    },
	    canvasMenu: function () {
		    $('nav.canvas-menu-wrapper').perfectScrollbar({
			    wheelSpeed: 0.5,
			    suppressScrollX: true
		    });

		    $(document).on('click', function(event) {
				if (($(event.target).closest('nav.canvas-menu-wrapper').length == 0)
					&& ($(event.target).closest('.canvas-menu-toggle')).length == 0) {
					$('nav.canvas-menu-wrapper').removeClass('in');
				}
		    });

		    $('.canvas-menu-toggle').on('click', function (event) {
				event.preventDefault();
				$('nav.canvas-menu-wrapper').toggleClass('in');
		    });
		    $('.canvas-menu-close').on('click', function (event) {
			    event.preventDefault();
			    $('nav.canvas-menu-wrapper').removeClass('in');
		    });
	    },
	    changeSubMenuMultiHeight: function () {
			if (G5Plus.common.isDesktop()) {
				$('.x-sub-menu-multi-column > li').css('height','');

				$('.x-sub-menu-multi-column').each(function() {

				});
			}
		    else {
				$('.x-sub-menu-multi-column > li').css('height','');
			}
	    }
    };

    G5Plus.footer = {
        init: function () {
            G5Plus.footer.showMap();
            G5Plus.footer.scrollUp();
        },
        showMap: function(){
            var $map_wrap = $('.handmade-map','.map-scroll-up');
            var $maps = $('.handmade-google-map','.map-scroll-up');
            $($map_wrap).hide();
            $('.a-map','.map-scroll-up').click(function(){
                if($($map_wrap).is(':visible')){
                    $($map_wrap).slideUp();
                }else{
                    $($map_wrap).slideDown(function(){
                        if($maps.length>0){
                            var $map = $maps[0];
                            var isInit = $($map).attr('data-map-init');
                            if( (typeof isInit)=='undefined' || isInit==null || isInit==''){
                                var locationX = $($map).attr('data-location-x');
                                var locationY = $($map).attr('data-location-y');
                                var markerTitle = $($map).attr('data-marker-title');
                                var mapZoom = $($map).attr('data-map-zoom');
                                if (mapZoom == '' || (typeof mapZoom)=='undefined') {
                                    mapZoom = 11;
                                }
                                if((typeof markerTitle)=='markerTitle'){
                                    markerTitle = 'Our location';
                                }
                                mapZoom = parseInt(mapZoom, 10);
                                var map = new google.maps.Map($map, {
                                    zoom: mapZoom,
                                    scrollwheel: false,
                                    center: new google.maps.LatLng(locationX, locationY)
                                });

                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locationX, locationY),
                                    map: map,
                                    title: markerTitle
                                });
                                $($map).attr('data-map-init', 1);
                            }
                        }
                    });
                }
            });
        },
        scrollUp:function(){
            var $scrollUp = $('.a-scroll-up','.map-scroll-up');
            if ($scrollUp.length > 0) {
                $scrollUp.click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: '0px'},800);
                });
            }
        }
    };

    G5Plus.onReady = {
        init: function () {
            G5Plus.common.init();
            G5Plus.header.init();
            G5Plus.page.init();
            G5Plus.blog.init();
            G5Plus.portfolio.init();
            G5Plus.woocommerce.init();
            G5Plus.footer.init();
        }
    };

    G5Plus.onLoad = {
        init: function () {
	        G5Plus.header.windowLoad();
	        G5Plus.page.windowLoad();
	        G5Plus.woocommerce.windowLoad();
        }
    };

    G5Plus.onResize = {
        init: function () {
            G5Plus.page.windowResized();
            G5Plus.woocommerce.windowResized();
            G5Plus.header.windowResized();
            G5Plus.blog.windowResized();
        }
    };

	G5Plus.onScroll = {
		init: function () {

		}
	};

    $(window).resize(G5Plus.onResize.init);
	$(window).scroll(G5Plus.onScroll.init);
    $(document).ready(G5Plus.onReady.init);
    $(window).load(G5Plus.onLoad.init);
})(jQuery);

