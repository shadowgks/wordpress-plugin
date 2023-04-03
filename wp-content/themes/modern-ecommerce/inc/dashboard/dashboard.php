<?php

add_action( 'admin_menu', 'modern_ecommerce_gettingstarted' );
function modern_ecommerce_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'modern-ecommerce'), esc_html__('Theme Documentation', 'modern-ecommerce'), 'edit_theme_options', 'modern-ecommerce-guide-page', 'modern_ecommerce_guide');   
}

function modern_ecommerce_admin_theme_style() {
   wp_enqueue_style('modern-ecommerce-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'modern_ecommerce_admin_theme_style');

if ( ! defined( 'MODERN_ECOMMERCE_SUPPORT' ) ) {
define('MODERN_ECOMMERCE_SUPPORT',__('https://wordpress.org/support/theme/modern-ecommerce/','modern-ecommerce'));
}
if ( ! defined( 'MODERN_ECOMMERCE_REVIEW' ) ) {
define('MODERN_ECOMMERCE_REVIEW',__('https://wordpress.org/support/theme/modern-ecommerce/reviews/','modern-ecommerce'));
}
if ( ! defined( 'MODERN_ECOMMERCE_LIVE_DEMO' ) ) {
define('MODERN_ECOMMERCE_LIVE_DEMO',__('https://www.ovationthemes.com/demos/modern-ecommerce-pro/','modern-ecommerce'));
}
if ( ! defined( 'MODERN_ECOMMERCE_BUY_PRO' ) ) {
define('MODERN_ECOMMERCE_BUY_PRO',__('https://www.ovationthemes.com/wordpress/ecommerce-wordpress-theme/','modern-ecommerce'));
}
if ( ! defined( 'MODERN_ECOMMERCE_PRO_DOC' ) ) {
define('MODERN_ECOMMERCE_PRO_DOC',__('https://ovationthemes.com/docs/ot-modern-ecommerce-pro-doc/','modern-ecommerce'));
}
if ( ! defined( 'MODERN_ECOMMERCE_THEME_NAME' ) ) {
define('MODERN_ECOMMERCE_THEME_NAME',__('Premium Modern Ecommerce Theme','modern-ecommerce'));
}

/**
 * Theme Info Page
 */
function modern_ecommerce_guide() {

	// Theme info
	$modern_ecommerce_return = add_query_arg( array()) ;
	$modern_ecommerce_theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $modern_ecommerce_theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'modern-ecommerce'); ?><?php echo esc_html($modern_ecommerce_theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( MODERN_ECOMMERCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'modern-ecommerce'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( MODERN_ECOMMERCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'modern-ecommerce'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','modern-ecommerce'); ?></h3>
					<p><?php esc_html_e('To setup the Modern Ecommerce theme follow the below steps.','modern-ecommerce'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','modern-ecommerce'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your button text and links.','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=modern_ecommerce_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','modern-ecommerce'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','modern-ecommerce'); ?></a>					

					<h4><?php esc_html_e('5. Setup Footer','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','modern-ecommerce'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=modern_ecommerce_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','modern-ecommerce'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','modern-ecommerce'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','modern-ecommerce'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates.>> Publish it.','modern-ecommerce'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','modern-ecommerce'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','modern-ecommerce'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=modern_ecommerce_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','modern-ecommerce'); ?></a>

					<h4><?php esc_html_e('3. Setup Services','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','modern-ecommerce'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Select category.','modern-ecommerce'); ?></p>

					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=modern_ecommerce_service_box_section') ); ?>" target="_blank"><?php esc_html_e('Add Services','modern-ecommerce'); ?></a>

					<h4><?php esc_html_e('4. Setup Products','modern-ecommerce'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Page >> Add New page >> Add title, content, product shortcode >> Publish it.','modern-ecommerce'); ?></p>
					<p><?php esc_html_e('Add Page >> Click on "+" Icon >> Search "shortcode" >> Click on shortcode block >> Add product shortcode >> Publish it.','modern-ecommerce'); ?></p>
					<p><?php esc_html_e('NOTE: Use this shortcode','modern-ecommerce'); ?> [products limit="4" columns="2" visibility="featured" ]</p>
					<a href="#" class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','modern-ecommerce'); ?></a>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Product Settings >> Select Page.','modern-ecommerce'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=modern_ecommerce_product_box_section') ); ?>" target="_blank"><?php esc_html_e('Add Product Page','modern-ecommerce'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(MODERN_ECOMMERCE_THEME_NAME) ?></h3>
				<img class="modern_ecommerce_img_responsive" style="width: 100%;" src="<?php echo esc_url( $modern_ecommerce_theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary buynow" href="<?php echo esc_url( MODERN_ECOMMERCE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'modern-ecommerce'); ?></a>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( MODERN_ECOMMERCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'modern-ecommerce'); ?></a>					
					<a class="button-primary docs" href="<?php echo esc_url( MODERN_ECOMMERCE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'modern-ecommerce'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'modern-ecommerce');?> </li>
					<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'modern-ecommerce');?> </li>
          	</ul>
        	</div>
		</div>
	</div>

<?php }?>