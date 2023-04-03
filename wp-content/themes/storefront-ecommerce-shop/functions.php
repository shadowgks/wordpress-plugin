<?php
/**
 * Theme functions and definitions
 *
 * @package Storefront Ecommerce Shop
 */

if ( ! function_exists( 'storefront_ecommerce_shop_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function storefront_ecommerce_shop_enqueue_styles() {
		wp_enqueue_style( 'modern-ecommerce-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'storefront-ecommerce-shop-style', get_stylesheet_directory_uri() . '/style.css', array( 'modern-ecommerce-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'storefront_ecommerce_shop_enqueue_styles', 99 );

function storefront_ecommerce_shop_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'storefront-ecommerce-shop-featured-image', 2000, 1200, true );
	add_image_size( 'storefront-ecommerce-shop-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'storefront-ecommerce-shop' ),
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

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', modern_ecommerce_fonts_url() ) );
}
add_action( 'after_setup_theme', 'storefront_ecommerce_shop_setup' );

function storefront_ecommerce_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'storefront-ecommerce-shop' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'storefront-ecommerce-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'storefront-ecommerce-shop' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'storefront-ecommerce-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'storefront-ecommerce-shop' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'storefront-ecommerce-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'storefront-ecommerce-shop' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'storefront-ecommerce-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'storefront-ecommerce-shop' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'storefront-ecommerce-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'storefront-ecommerce-shop' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'storefront-ecommerce-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'storefront_ecommerce_shop_widgets_init' );

function storefront_ecommerce_shop_customize_register() {
  	global $wp_customize;

  	$wp_customize->remove_section( 'modern_ecommerce_pro' );
		$wp_customize->remove_setting( 'modern_ecommerce_sticky_header' );
		$wp_customize->remove_control( 'modern_ecommerce_sticky_header' );
}
add_action( 'customize_register', 'storefront_ecommerce_shop_customize_register', 11 );

function storefront_ecommerce_shop_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	$wp_customize->add_section('storefront_ecommerce_shop_pro', array(
		'title'    => __('UPGRADE ECOMMERCE PREMIUM', 'storefront-ecommerce-shop'),
		'priority' => 1,
	));

	$wp_customize->add_setting('storefront_ecommerce_shop_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Shop_Pro_Control($wp_customize, 'storefront_ecommerce_shop_pro', array(
		'label'    => __('Storefront Ecommerce Shop PREMIUM', 'storefront-ecommerce-shop'),
		'section'  => 'storefront_ecommerce_shop_pro',
		'settings' => 'storefront_ecommerce_shop_pro',
		'priority' => 1,
	)));
}
add_action( 'customize_register', 'storefront_ecommerce_shop_customize' );

function storefront_ecommerce_shop_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'storefront_ecommerce_shop_enqueue_comments_reply' );

define('STOREFRONT_ECOMMERCE_SHOP_PRO_LINK',__('https://www.ovationthemes.com/wordpress/woocommerce-storefront-theme/','storefront-ecommerce-shop'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Storefront_Ecommerce_Shop_Pro_Control')):
    class Storefront_Ecommerce_Shop_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( STOREFRONT_ECOMMERCE_SHOP_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ECOMMERCE PREMIUM','storefront-ecommerce-shop');?> </a>
            </div>
            <div class="col-md">
                <img class="storefront_ecommerce_shop_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('Storefront Ecommerce Shop PREMIUM - Features', 'storefront-ecommerce-shop'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'storefront-ecommerce-shop');?> </li>
                    <li class="upsell-storefront_ecommerce_shop"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'storefront-ecommerce-shop');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( STOREFRONT_ECOMMERCE_SHOP_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ECOMMERCE PREMIUM','storefront-ecommerce-shop');?> </a>
            </div>
        </label>
    <?php } }
endif;

if ( ! defined( 'MODERN_ECOMMERCE_SUPPORT' ) ) {
define('MODERN_ECOMMERCE_SUPPORT',__('https://wordpress.org/support/theme/storefront-ecommerce-shop','storefront-ecommerce-shop'));
}
if ( ! defined( 'MODERN_ECOMMERCE_REVIEW' ) ) {
define('MODERN_ECOMMERCE_REVIEW',__('https://wordpress.org/support/theme/storefront-ecommerce-shop/reviews/#new-post','storefront-ecommerce-shop'));
}
if ( ! defined( 'MODERN_ECOMMERCE_LIVE_DEMO' ) ) {
define('MODERN_ECOMMERCE_LIVE_DEMO',__('https://www.ovationthemes.com/demos/storefront-ecommerce-shop/','storefront-ecommerce-shop'));
}
if ( ! defined( 'MODERN_ECOMMERCE_BUY_PRO' ) ) {
define('MODERN_ECOMMERCE_BUY_PRO',__('https://www.ovationthemes.com/wordpress/woocommerce-storefront-theme/','storefront-ecommerce-shop'));
}
if ( ! defined( 'MODERN_ECOMMERCE_PRO_DOC' ) ) {
define('MODERN_ECOMMERCE_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-storefront-ecommerce-shop-pro-doc/','storefront-ecommerce-shop'));
}
if ( ! defined( 'MODERN_ECOMMERCE_THEME_NAME' ) ) {
define('MODERN_ECOMMERCE_THEME_NAME',__('Premium Storefront Theme','storefront-ecommerce-shop'));
}
