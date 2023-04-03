<?php
/**
 * Modern Ecommerce functions and definitions
 *
 * @subpackage Modern Ecommerce
 * @since 1.0
 */

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'modern_ecommerce_loop_columns', 999);
if (!function_exists('modern_ecommerce_loop_columns')) {
	function modern_ecommerce_loop_columns() {
		return 3;
	}
}

function modern_ecommerce_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function modern_ecommerce_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function modern_ecommerce_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function modern_ecommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function modern_ecommerce_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<div class="link-more text-center"><a href="%1$s" class="more-link py-2 px-4">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'modern-ecommerce' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'modern_ecommerce_excerpt_more' );

add_filter( 'woocommerce_add_to_cart_fragments', 'modern_ecommerce_update_cart_count_items' );
function modern_ecommerce_update_cart_count_items( $fragments ) {
    global $woocommerce;

    $fragments['.header-cart'] = '<a href="'.wc_get_cart_url().'" class="header-cart"><i class="fas fa-shopping-basket"></i><span>'.$woocommerce->cart->cart_contents_count.'</span></a>';

    return $fragments;
}

function modern_ecommerce_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
        wp_safe_redirect( admin_url("themes.php?page=modern-ecommerce-guide-page") );
    }
}
add_action('after_setup_theme', 'modern_ecommerce_notice');

function modern_ecommerce_add_new_page() {
  $edit_page = admin_url().'post-new.php?post_type=page';
  echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

  exit;
}
add_action( 'wp_ajax_modern_ecommerce_add_new_page','modern_ecommerce_add_new_page' );

function modern_ecommerce_setup() {

	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'modern-ecommerce-featured-image', 2000, 1200, true );
	add_image_size( 'modern-ecommerce-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'modern-ecommerce' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', modern_ecommerce_fonts_url() ) );

}
add_action( 'after_setup_theme', 'modern_ecommerce_setup' );

function modern_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'modern-ecommerce' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'modern-ecommerce' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'modern-ecommerce' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'modern-ecommerce' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'modern-ecommerce' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'modern-ecommerce' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'modern-ecommerce' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'modern-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'modern_ecommerce_widgets_init' );

function modern_ecommerce_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

//Enqueue scripts and styles.
function modern_ecommerce_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'modern-ecommerce-fonts', modern_ecommerce_fonts_url(), array() );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'modern-ecommerce-style', get_stylesheet_uri() );

	wp_style_add_data('modern-ecommerce-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'modern-ecommerce-style',$modern_ecommerce_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Block Style
	wp_enqueue_style( 'modern-ecommerce-block-style', esc_url( get_template_directory_uri() ).'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'modern-ecommerce-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'modern-ecommerce-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Superfish JS
	wp_enqueue_script( 'superfish-js', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ),true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modern_ecommerce_scripts' );

function modern_ecommerce_fonts_scripts() {
	$modern_ecommerce_headings_font = esc_html(get_theme_mod('modern_ecommerce_headings_text'));
	$modern_ecommerce_body_font = esc_html(get_theme_mod('modern_ecommerce_body_text'));

	if( $modern_ecommerce_headings_font ) {
		wp_enqueue_style( 'modern-ecommerce-headings-fonts', '//fonts.googleapis.com/css?family='. $modern_ecommerce_headings_font );
	} else {
		wp_enqueue_style( 'modern-ecommerce-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $modern_ecommerce_body_font ) {
		wp_enqueue_style( 'modern-ecommerce-body-fonts', '//fonts.googleapis.com/css?family='. $modern_ecommerce_body_font );
	} else {
		wp_enqueue_style( 'modern-ecommerce-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'modern_ecommerce_fonts_scripts' );

function modern_ecommerce_enqueue_admin_script( $hook ) {

	// Admin JS
	wp_enqueue_script( 'modern-ecommerce-admin.js', get_theme_file_uri( '/assets/js/modern-ecommerce-admin.js' ), array( 'jquery' ), true );

	wp_localize_script('modern-ecommerce-admin.js', 'modern_ecommerce_scripts_localize',
        array(
            'ajax_url' => esc_url(admin_url('admin-ajax.php'))
        )
    );
}
add_action( 'admin_enqueue_scripts', 'modern_ecommerce_enqueue_admin_script' );

// Enqueue editor styles for Gutenberg
function modern_ecommerce_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'modern-ecommerce-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'modern-ecommerce-fonts', modern_ecommerce_fonts_url(), array() );
}
add_action( 'enqueue_block_editor_assets', 'modern_ecommerce_block_editor_styles' );

function modern_ecommerce_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'modern_ecommerce_front_page_template' );

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_template_directory() .'/inc/TGM/tgm.php';

require get_parent_theme_file_path( '/inc/typofont.php' );

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );

require get_template_directory() . '/inc/wptt-webfont-loader.php';

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'modern_ecommerce_customize_controls_register_scripts' );

function modern_ecommerce_customize_controls_register_scripts() {
	
	wp_enqueue_style( 'modern-ecommerce-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}