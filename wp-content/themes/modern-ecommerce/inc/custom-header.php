<?php
/**
 * Custom header
 */

function modern_ecommerce_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'modern_ecommerce_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'wp-head-callback'       => 'modern_ecommerce_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'modern_ecommerce_custom_header_setup' );

if ( ! function_exists( 'modern_ecommerce_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see modern_ecommerce_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'modern_ecommerce_header_style' );
function modern_ecommerce_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'modern-ecommerce-style', $custom_css );
	endif;
}
endif;