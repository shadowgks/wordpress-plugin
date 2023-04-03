<?php
/**
 * The header for our theme
 *
 * @subpackage Modern Ecommerce
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'modern-ecommerce' ); ?></a>
	<?php if( get_theme_mod('modern_ecommerce_theme_loader','') != ''){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-3 text-center text-lg-left text-md-left">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12 align-self-center text-md-center text-lg-left bull-icon">
								<?php if( get_theme_mod('modern_ecommerce_top_text') != '' ){ ?>
									<span><i class="<?php echo esc_html(get_theme_mod('modern_ecommerce_offer_icon','fas fa-bullhorn')); ?> mr-2"></i><?php echo esc_html(get_theme_mod('modern_ecommerce_top_text','')); ?></span>
								<?php }?>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-6 align-self-center text-md-right g-translate">
								<?php if( get_theme_mod('modern_ecommerce_change_language') != '' ){ ?>
									<?php echo do_shortcode('[google-translator]'); ?>
								<?php }?>
							</div>
							<div class="col-lg-1 col-md-3 col-sm-3 col-6 align-self-center text-md-right dropdown">
								<?php if( get_theme_mod('modern_ecommerce_change_usd') != '' ){ ?>
									<?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]'); ?>
								<?php }?>
							</div>
							<div class="col-lg-3 col-md-5 col-sm-5 align-self-center text-md-right options">
								<?php
									if ( class_exists( 'WooCommerce' ) ) { ?>
									<?php if ( is_user_logged_in() ) { ?>
										<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="mr-3 mx-md-3"><?php esc_html_e( 'My Account','modern-ecommerce');?></a>
									<?php } else { ?>
										<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="mr-3 mx-md-3"><?php esc_html_e( 'Login Now','modern-ecommerce');?></a>
									<?php } ?>
								<?php } ?>
								<?php if( get_theme_mod('modern_ecommerce_wishlist_url') != '' || get_theme_mod('modern_ecommerce_wishlist') != '' ){ ?>
									<a href="<?php echo esc_html(get_theme_mod('modern_ecommerce_wishlist_url','')); ?>" class="mr-3 mx-md-3"><?php echo esc_html(get_theme_mod('modern_ecommerce_wishlist','')); ?></a>
								<?php }?>
								<?php if( get_theme_mod('modern_ecommerce_regiter_url') != '' || get_theme_mod('modern_ecommerce_regiter') != '' ){ ?>
									<a href="<?php echo esc_html(get_theme_mod('modern_ecommerce_regiter_url','')); ?>" class="mr-3 mx-md-3"><?php echo esc_html(get_theme_mod('modern_ecommerce_regiter','')); ?></a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu_header py-3">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2 col-md-6 col-sm-6 col-6 align-self-center">
								<div class="logo text-center text-md-left text-sm-left py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $modern_ecommerce_blog_info = get_bloginfo( 'name' ); ?>
					              	<?php if( get_theme_mod('modern_ecommerce_logo_title',true) != '' ){ ?>
						                <?php if ( ! empty( $modern_ecommerce_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                  		<?php endif; ?>
						                <?php endif; ?>
						            <?php }?>
						                <?php
					                  		$modern_ecommerce_description = get_bloginfo( 'description', 'display' );
						                  	if ( $modern_ecommerce_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_theme_mod('modern_ecommerce_logo_tagline_text',false) != '' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($modern_ecommerce_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-5 col-md-4 col-sm-4 col-4 align-self-center">
								<?php if(has_nav_menu('primary')){?>
									<div class="toggle-menu gb_menu text-md-right">
										<button onclick="modern_ecommerce_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','modern-ecommerce'); ?></p></button>
									</div>
								<?php }?>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-1 col-md-2 col-sm-2 col-2 pl-0 align-self-center text-center">
								<?php
									if ( class_exists( 'WooCommerce' ) ) { ?>
									<?php global $woocommerce; ?>
									<a href="<?php echo wc_get_cart_url() ?>" class="header-cart"><i class="fas fa-shopping-basket"></i> <span><?php echo $woocommerce->cart->cart_contents_count ?></span></a>
								<?php }?>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-6 col-6 pr-0 pt-md-3 pt-lg-3 align-self-center">
								<?php dynamic_sidebar( 'product-cat' ); ?>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-6 col-6 pl-0 pt-md-3 pt-lg-3 align-self-center">
								<div class="product-search">
									<?php
									if ( class_exists( 'WooCommerce' ) ) { ?>
										<?php get_product_search_form(); ?>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
