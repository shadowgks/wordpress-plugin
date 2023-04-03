<?php
/**
 * Displays footer site info
 *
 * @subpackage Storefront Ecommerce Shop
 * @since 1.0
 * @version 1.0
 */

?>

<div class="site-info py-4 text-center">
	<?php
        echo esc_html( get_theme_mod( 'modern_ecommerce_footer_text' ) );
        printf(
            /* translators: %s: Storefornt Ecommerce WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-ecommerce-wordpress-theme/', 'storefront-ecommerce-shop' ) . '"> %s</a>',
            esc_html__( 'Ecommerce WordPress Theme', 'storefront-ecommerce-shop' )
        );
    ?>
</div>
