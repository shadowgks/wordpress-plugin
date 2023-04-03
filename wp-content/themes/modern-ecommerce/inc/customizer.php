<?php
/**
 * Modern Ecommerce: Customizer
 *
 * @subpackage Modern Ecommerce
 * @since 1.0
 */

function modern_ecommerce_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Modern_Ecommerce_Toggle_Control' );

	// Typography
	$wp_customize->add_section( 'modern_ecommerce_typography_settings', array(
		'title'       => __( 'Typography', 'modern-ecommerce' ),
		'priority'       => 24,
	) );

	$font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);


	$wp_customize->add_setting( 'modern_ecommerce_headings_text', array(
		'sanitize_callback' => 'modern_ecommerce_sanitize_fonts',
	));
	$wp_customize->add_control( 'modern_ecommerce_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'modern-ecommerce'),
		'section' => 'modern_ecommerce_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'modern_ecommerce_body_text', array(
		'sanitize_callback' => 'modern_ecommerce_sanitize_fonts'
	));
	$wp_customize->add_control( 'modern_ecommerce_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'modern-ecommerce' ),
		'section' => 'modern_ecommerce_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('modern_ecommerce_pro', array(
        'title'    => __('UPGRADE ECOMMERCE PREMIUM', 'modern-ecommerce'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('modern_ecommerce_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Modern_Ecommerce_Pro_Control($wp_customize, 'modern_ecommerce_pro', array(
        'label'    => __('MODERN ECOMMERCE PREMIUM', 'modern-ecommerce'),
        'section'  => 'modern_ecommerce_pro',
        'settings' => 'modern_ecommerce_pro',
        'priority' => 1,
    )));

    $wp_customize->add_setting( 'modern_ecommerce_logo_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_logo_title', array(
		'label'       => esc_html__( 'Show Site Title', 'modern-ecommerce' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_logo_title',
	) ) );

    $wp_customize->add_setting( 'modern_ecommerce_logo_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_logo_tagline_text', array(
		'label'       => esc_html__( 'Show Site Tagline', 'modern-ecommerce' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_logo_tagline_text',
	) ) );

    // Theme General Settings
    $wp_customize->add_section('modern_ecommerce_theme_settings',array(
        'title' => __('Theme General Settings', 'modern-ecommerce'),
        'priority' => 1,
    ) );

    $wp_customize->add_setting( 'modern_ecommerce_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_sticky_header',
	) ) );

    $wp_customize->add_setting( 'modern_ecommerce_theme_loader', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_theme_loader',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_scroll_enable', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_scroll_enable', array(
		'label'       => esc_html__( 'Show Scroll Top', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_scroll_enable',
	) ) );

	$wp_customize->add_setting('modern_ecommerce_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'modern_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('modern_ecommerce_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','modern-ecommerce'),
        'section' => 'modern_ecommerce_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','modern-ecommerce'),
            'center_align' => __('Center Align','modern-ecommerce'),
            'left_align' => __('Left Align','modern-ecommerce'),
        ),
	) );

	$wp_customize->add_setting('modern_ecommerce_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Modern_Ecommerce_Fontawesome_Icon_Chooser(
        $wp_customize,'modern_ecommerce_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','modern-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'modern_ecommerce_theme_settings',
		'setting'	=> 'modern_ecommerce_scroll_top_icon',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting('modern_ecommerce_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'modern_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('modern_ecommerce_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','modern-ecommerce'),
        'section' => 'modern_ecommerce_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','modern-ecommerce'),
            'UPPERCASE' => __('UPPERCASE','modern-ecommerce'),
            'LOWERCASE' => __('LOWERCASE','modern-ecommerce'),
        ),
	) );

	$wp_customize->add_setting( 'modern_ecommerce_shop_page_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_shop_page_sidebar', array(
		'label'       => esc_html__( 'Show Shop Page Sidebar', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_shop_page_sidebar',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_wocommerce_single_page_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_wocommerce_single_page_sidebar', array(
		'label'       => esc_html__( 'Show Single Product Page Sidebar', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_wocommerce_single_page_sidebar',
	) ) );

	//theme width
	$wp_customize->add_section('modern_ecommerce_theme_width_settings',array(
        'title' => __('Theme Width Option', 'modern-ecommerce'),
        'priority' => 1,
    ) );

	$wp_customize->add_setting('modern_ecommerce_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'modern_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('modern_ecommerce_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','modern-ecommerce'),
        'section' => 'modern_ecommerce_theme_width_settings',
        'choices' => array(
            'full_width' => __('fullwidth','modern-ecommerce'),
            'container' => __('container','modern-ecommerce'),
            'container_fluid' => __('container Fluid','modern-ecommerce'),
        ),
	) );

	// Post Layouts
    $wp_customize->add_section('modern_ecommerce_layout',array(
        'title' => __('Post Layout', 'modern-ecommerce'),
        'description' => __( 'Change the post layout from below options', 'modern-ecommerce' ),
        'priority' => 1
    ) );

	$wp_customize->add_setting( 'modern_ecommerce_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('modern_ecommerce_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select'
	));
	$wp_customize->add_control('modern_ecommerce_post_option',array(
		'label' => esc_html__('Select Layout','modern-ecommerce'),
		'section' => 'modern_ecommerce_layout',
		'setting' => 'modern_ecommerce_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','modern-ecommerce'),
            'grid_post' => __('Grid Post','modern-ecommerce'),
        ),
	));

    $wp_customize->add_setting('modern_ecommerce_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select'
	));
	$wp_customize->add_control('modern_ecommerce_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','modern-ecommerce'),
		'section' => 'modern_ecommerce_layout',
		'setting' => 'modern_ecommerce_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','modern-ecommerce'),
            '2_column' => __('2','modern-ecommerce'),
            '3_column' => __('3','modern-ecommerce'),
            '4_column' => __('4','modern-ecommerce'),
            '5_column' => __('6','modern-ecommerce'),
        ),
	));

	$wp_customize->add_setting( 'modern_ecommerce_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_date', array(
		'label'       => esc_html__( 'Hide Date', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_date',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_date', array(
		'selector' => '.date-box',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_date',
	) );

	$wp_customize->add_setting( 'modern_ecommerce_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_admin',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_admin',
	) );

	$wp_customize->add_setting( 'modern_ecommerce_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_comment',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_comment',
	) );

	// Top Header
    $wp_customize->add_section('modern_ecommerce_top',array(
        'title' => __('Contact info', 'modern-ecommerce'),
        'priority' => 1
    ) );

	$wp_customize->add_setting( 'modern_ecommerce_change_language', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_change_language', array(
		'label'       => esc_html__( 'Show Language Translator', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_top',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_change_language',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_change_language', array(
		'selector' => '.g-translate',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_change_language',
	) );

	$wp_customize->add_setting( 'modern_ecommerce_change_usd', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_change_usd', array(
		'label'       => esc_html__( 'Show Currency Switcher', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_top',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_change_usd',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_change_usd', array(
		'selector' => '.dropdown',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_change_usd',
	) );

    $wp_customize->add_setting('modern_ecommerce_top_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_ecommerce_top_text',array(
		'label' => esc_html__('Add Text','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_top_text',
		'type'    => 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_top_text', array(
		'selector' => '.bull-icon',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_top_text',
	) );

	$wp_customize->add_setting('modern_ecommerce_offer_icon',array(
		'default'	=> 'fas fa-bullhorn',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Modern_Ecommerce_Fontawesome_Icon_Chooser(
        $wp_customize,'modern_ecommerce_offer_icon',array(
		'label'	=> __('Add Topbar Offer Icon','modern-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'modern_ecommerce_top',
		'setting'	=> 'modern_ecommerce_offer_icon',
		'type'		=> 'icon'
	)));	

    $wp_customize->add_setting('modern_ecommerce_wishlist',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_ecommerce_wishlist',array(
		'label' => esc_html__('Add Text','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_wishlist',
		'type'    => 'text'
	));

    $wp_customize->add_setting('modern_ecommerce_wishlist_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('modern_ecommerce_wishlist_url',array(
		'label' => esc_html__('Add URL','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_wishlist_url',
		'type'    => 'url'
	));

    $wp_customize->add_setting('modern_ecommerce_regiter',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_ecommerce_regiter',array(
		'label' => esc_html__('Add Text','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_regiter',
		'type'    => 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_regiter', array(
		'selector' => '.options a',
		'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_regiter',
	) );

    $wp_customize->add_setting('modern_ecommerce_regiter_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('modern_ecommerce_regiter_url',array(
		'label' => esc_html__('Add URL','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_regiter_url',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'modern_ecommerce_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'modern-ecommerce' ),
    	'description' => __('Slider Image Dimension ( 600px x 700px )','modern-ecommerce'),
		'priority'   => 3,
	) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst_sls[]= __('Select','modern-ecommerce');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('modern_ecommerce_post_setting'.$i,array(
			'sanitize_callback' => 'modern_ecommerce_sanitize_select',
		));
		$wp_customize->add_control('modern_ecommerce_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','modern-ecommerce'),
			'section' => 'modern_ecommerce_slider_section',
		));

		$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_post_setting'.$i, array(
			'selector' => '.slide-content',
			'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_post_setting'.$i,
		) );

	}
	wp_reset_postdata();

	$wp_customize->add_setting('modern_ecommerce_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'modern_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('modern_ecommerce_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','modern-ecommerce'),
        'section' => 'modern_ecommerce_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','modern-ecommerce'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','modern-ecommerce'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','modern-ecommerce'),),
	) );

	// Services Section
	$wp_customize->add_section( 'modern_ecommerce_service_box_section' , array(
    	'title'      => __( 'Services Settings', 'modern-ecommerce' ),
		'priority'   => 4,
	) );

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('modern_ecommerce_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select',
	));
	$wp_customize->add_control('modern_ecommerce_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','modern-ecommerce'),
		'section' => 'modern_ecommerce_service_box_section',
	));

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_category_setting', array(
	  'selector' => '.services-box',
	  'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_category_setting',
	) );

	// Product Box
	$wp_customize->add_section( 'modern_ecommerce_product_box_section' , array(
    	'title'      => __( 'Product Settings', 'modern-ecommerce' ),
    	'description' => __( 'Add New Page >> Add Title >> Add Shortcode "[products limit="4" columns="2" visibility="featured" ]" >> Then Select the page in the below page dropdown.', 'modern-ecommerce' ),
		'priority'   => 5,
	) );

    $wp_customize->add_setting('modern_ecommerce_product_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_ecommerce_product_title',array(
		'label'	=> esc_html__('Section Title','modern-ecommerce'),
		'section'	=> 'modern_ecommerce_product_box_section',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_product_title', array(
	  'selector' => '.prod_head',
	  'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_product_title',
	) );

    $wp_customize->add_setting('modern_ecommerce_product_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_ecommerce_product_text',array(
		'label'	=> esc_html__('Section Text','modern-ecommerce'),
		'section'	=> 'modern_ecommerce_product_box_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'modern_ecommerce_product_box_page', array(
		'default'  => '',
		'sanitize_callback' => 'modern_ecommerce_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'modern_ecommerce_product_box_page', array(
		'label'    => esc_html__( 'Select Product Page', 'modern-ecommerce' ),
		'section'  => 'modern_ecommerce_product_box_section',
		'type'     => 'dropdown-pages'
	) );

	//Footer
    $wp_customize->add_section( 'modern_ecommerce_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'modern-ecommerce' ),
    	'priority' => 6
	) );

    $wp_customize->add_setting('modern_ecommerce_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_ecommerce_footer_text',array(
		'label'	=> esc_html__('Copyright Text','modern-ecommerce'),
		'section'	=> 'modern_ecommerce_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_ecommerce_footer_text', array(
	  'selector' => '.site-info',
	  'render_callback' => 'modern_ecommerce_customize_partial_modern_ecommerce_footer_text',
	) );

	$wp_customize->add_setting('modern_ecommerce_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select'
	));
	$wp_customize->add_control('modern_ecommerce_footer_widget',array(
		'label' => esc_html__('Footer Per Column','modern-ecommerce'),
		'section' => 'modern_ecommerce_footer_copyright',
		'setting' => 'modern_ecommerce_footer_widget',
		'type' => 'radio',
				'choices' => array(
						'1'   => __('1 Column', 'modern-ecommerce'),
						'2'  => __('2 Column', 'modern-ecommerce'),
						'3' => __('3 Column', 'modern-ecommerce'),
						'4' => __('4 Column', 'modern-ecommerce')
				),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'modern_ecommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'modern_ecommerce_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'modern_ecommerce_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'modern_ecommerce_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'modern-ecommerce' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'modern-ecommerce' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'modern_ecommerce_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'modern_ecommerce_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'modern_ecommerce_customize_register' );

function modern_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}
function modern_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function modern_ecommerce_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function modern_ecommerce_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('MODERN_ECOMMERCE_PRO_LINK',__('https://www.ovationthemes.com/wordpress/ecommerce-wordpress-theme/','modern-ecommerce'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Modern_Ecommerce_Pro_Control')):
    class Modern_Ecommerce_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( MODERN_ECOMMERCE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ECOMMERCE PREMIUM','modern-ecommerce');?> </a>
	        </div>
            <div class="col-md">
                <img class="modern_ecommerce_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('Modern Ecommerce PREMIUM - Features', 'modern-ecommerce'); ?></h3>
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
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( MODERN_ECOMMERCE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ECOMMERCE PREMIUM','modern-ecommerce');?> </a>
		    </div>
		    <p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'modern-ecommerce'), '<a target="blank" href="https://wordpress.org/support/theme/modern-ecommerce/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;
