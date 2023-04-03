<?php
/**
 * Displays footer site info
 *
 * @subpackage Modern Ecommerce
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
	<?php
        echo esc_html( get_theme_mod( 'modern_ecommerce_footer_text' ) );
        printf(
            /* translators: %s: Ecommerce WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-ecommerce-wordpress-theme/', 'modern-ecommerce' ) . '"> %s</a>',
            esc_html__( 'Ecommerce WordPress Theme', 'modern-ecommerce' )
        );
    ?>
</div>
