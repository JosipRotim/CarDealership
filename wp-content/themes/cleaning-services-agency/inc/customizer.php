<?php
/**
 * Cleaning Services Agency Theme Customizer
 *
 * @package Cleaning Services Agency
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cleaning_services_agency_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('cleaning-services-agency-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('cleaning_services_agency_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_integer'
	));
	$wp_customize->add_control(new Cleaning_Services_Agency_Slider_Custom_Control( $wp_customize, 'cleaning_services_agency_logo_width',array(
		'label'	=> esc_html__('Logo Width','cleaning-services-agency'),
		'section'=> 'title_tagline',
		'settings'=>'cleaning_services_agency_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// color site title
	$wp_customize->add_setting('cleaning_services_agency_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sitetitle_color', array(
	   'settings' => 'cleaning_services_agency_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('cleaning_services_agency_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
	));
	$wp_customize->add_control( 'cleaning_services_agency_title_enable', array(
	   'settings' => 'cleaning_services_agency_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','cleaning-services-agency'),
	   'type'      => 'checkbox'
	));


	// color site tagline
	$wp_customize->add_setting('cleaning_services_agency_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sitetagline_color', array(
	   'settings' => 'cleaning_services_agency_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('cleaning_services_agency_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
	));
	$wp_customize->add_control( 'cleaning_services_agency_tagline_enable', array(
	   'settings' => 'cleaning_services_agency_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','cleaning-services-agency'),
	   'type'      => 'checkbox'
	));

	//Theme Options
	$wp_customize->add_panel( 'cleaning_services_agency_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'cleaning-services-agency' ),
	) );

	// Header Section
	$wp_customize->add_section('cleaning_services_agency_header_section', array(
        'title' => __('Manage Header Section', 'cleaning-services-agency'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','cleaning-services-agency'),
        'priority' => null,
		'panel' => 'cleaning_services_agency_panel_area',
 	));

 	$wp_customize->add_setting('cleaning_services_agency_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
	));

	$wp_customize->add_control( 'cleaning_services_agency_stickyheader', array(
	   'section'   => 'cleaning_services_agency_header_section',
	   'label'	=> __('Check To Show Sticky Header','cleaning-services-agency'),
	   'type'      => 'checkbox'
 	));

 	$wp_customize->add_setting('cleaning_services_agency_topbar',array(
		'default' => false,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
	));

	$wp_customize->add_control( 'cleaning_services_agency_topbar', array(
	   'section'   => 'cleaning_services_agency_header_section',
	   'label'	=> __('Check To Show Topbar','cleaning-services-agency'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('cleaning_services_agency_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_email_address', array(
	   'settings' => 'cleaning_services_agency_email_address',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Add Email Address', 'cleaning-services-agency'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('cleaning_services_agency_time',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_time', array(
	   'settings' => 'cleaning_services_agency_time',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Opening Time', 'cleaning-services-agency'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('cleaning_services_agency_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_phone_number', array(
	   'settings' => 'cleaning_services_agency_phone_number',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Add Phone Number', 'cleaning-services-agency'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('cleaning_services_agency_phone_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_phone_text', array(
	   'settings' => 'cleaning_services_agency_phone_text',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Add Call Text', 'cleaning-services-agency'),
	   'type'      => 'text'
	));

	// facebook
	$wp_customize->add_setting('cleaning_services_agency_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_fb_link', array(
	   'settings' => 'cleaning_services_agency_fb_link',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Facebook Link', 'cleaning-services-agency'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('cleaning_services_agency_fb_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_fb_color', array(
	   'settings' => 'cleaning_services_agency_fb_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Facebook Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// twitter
	$wp_customize->add_setting('cleaning_services_agency_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_twitt_link', array(
	   'settings' => 'cleaning_services_agency_twitt_link',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Twitter Link', 'cleaning-services-agency'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('cleaning_services_agency_twitt_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_twitt_color', array(
	   'settings' => 'cleaning_services_agency_twitt_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Twitter Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// instagram
	$wp_customize->add_setting('cleaning_services_agency_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_insta_link', array(
	   'settings' => 'cleaning_services_agency_insta_link',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Instagram Link', 'cleaning-services-agency'),
	   'type'      => 'url'
	));

	// color twitt
	$wp_customize->add_setting('cleaning_services_agency_insta_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_insta_color', array(
	   'settings' => 'cleaning_services_agency_insta_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Instagram Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// linkedin
	$wp_customize->add_setting('cleaning_services_agency_linkedin_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_linkedin_link', array(
	   'settings' => 'cleaning_services_agency_linkedin_link',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Linkedin Link', 'cleaning-services-agency'),
	   'type'      => 'url'
	));

	// color linkedin
	$wp_customize->add_setting('cleaning_services_agency_linkedin_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_linkedin_color', array(
	   'settings' => 'cleaning_services_agency_linkedin_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Linkedin Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// youtube
	$wp_customize->add_setting('cleaning_services_agency_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_youtube_link', array(
	   'settings' => 'cleaning_services_agency_youtube_link',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Youtube Link', 'cleaning-services-agency'),
	   'type'      => 'url'
	));

	// color linkedin
	$wp_customize->add_setting('cleaning_services_agency_youtube_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_youtube_color', array(
	   'settings' => 'cleaning_services_agency_youtube_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Youtube Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// header menu
	$wp_customize->add_setting('cleaning_services_agency_menu_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_menu_color', array(
	   'settings' => 'cleaning_services_agency_menu_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Menu Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	// header menu hover color
	$wp_customize->add_setting('cleaning_services_agency_menuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_menuhrv_color', array(
	   'settings' => 'cleaning_services_agency_menuhrv_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('Menu Hover Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// header sub menu color
	$wp_customize->add_setting('cleaning_services_agency_submenu_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_submenu_color', array(
	   'settings' => 'cleaning_services_agency_submenu_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('SubMenu Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// header sub menu bg color
	$wp_customize->add_setting('cleaning_services_agency_submenubg_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_submenubg_color', array(
	   'settings' => 'cleaning_services_agency_submenubg_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('SubMenu BG Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// header sub menu hover color
	$wp_customize->add_setting('cleaning_services_agency_submenuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_submenuhrv_color', array(
	   'settings' => 'cleaning_services_agency_submenuhrv_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('SubMenu Hover Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// header sub menu border color
	$wp_customize->add_setting('cleaning_services_agency_submenuborder_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_submenuborder_color', array(
	   'settings' => 'cleaning_services_agency_submenuborder_color',
	   'section'   => 'cleaning_services_agency_header_section',
	   'label' => __('SubMenu Border Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	// Home Category Dropdown Section
	$wp_customize->add_section('cleaning_services_agency_one_cols_section',array(
		'title'	=> __('Manage Slider Section','cleaning-services-agency'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1200 x 600).','cleaning-services-agency'),
		'priority'	=> null,
		'panel' => 'cleaning_services_agency_panel_area'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'cleaning_services_agency_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Cleaning_Services_Agency_Category_Dropdown_Custom_Control( $wp_customize, 'cleaning_services_agency_slidersection', array(
		'section' => 'cleaning_services_agency_one_cols_section',
		'settings'   => 'cleaning_services_agency_slidersection',
	) ) );

	//Hide Section
	$wp_customize->add_setting('cleaning_services_agency_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_hide_categorysec', array(
	   'settings' => 'cleaning_services_agency_hide_categorysec',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label'     => __('Check To Enable This Section','cleaning-services-agency'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('cleaning_services_agency_button_text',array(
		'default' => 'Appointment',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_button_text', array(
	   'settings' => 'cleaning_services_agency_button_text',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Add Button Text', 'cleaning-services-agency'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('cleaning_services_agency_button2_text',array(
		'default' => 'Contacts',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_button2_text', array(
	   'settings' => 'cleaning_services_agency_button2_text',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Add Button 2 Text', 'cleaning-services-agency'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('cleaning_services_agency_button2_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'cleaning_services_agency_button2_url', array(
	   'settings' => 'cleaning_services_agency_button2_url',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Add Button 2 URL', 'cleaning-services-agency'),
	   'type'      => 'url'
	));


	// color slider title
	$wp_customize->add_setting('cleaning_services_agency_slidertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_slidertitle_color', array(
	   'settings' => 'cleaning_services_agency_slidertitle_color',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Title Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// color slider description
	$wp_customize->add_setting('cleaning_services_agency_sliderdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sliderdescription_color', array(
	   'settings' => 'cleaning_services_agency_sliderdescription_color',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Description Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	// color slider button1 text
	$wp_customize->add_setting('cleaning_services_agency_sliderbutton1text_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sliderbutton1text_color', array(
	   'settings' => 'cleaning_services_agency_sliderbutton1text_color',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Button 1 Text Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// color slider button1
	$wp_customize->add_setting('cleaning_services_agency_sliderbutton1_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sliderbutton1_color', array(
	   'settings' => 'cleaning_services_agency_sliderbutton1_color',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Button 1 Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// color slider button2 text
	$wp_customize->add_setting('cleaning_services_agency_sliderbutton2text_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sliderbutton2text_color', array(
	   'settings' => 'cleaning_services_agency_sliderbutton2text_color',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Button 2 Text Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// color slider button2
	$wp_customize->add_setting('cleaning_services_agency_sliderbutton2_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_sliderbutton2_color', array(
	   'settings' => 'cleaning_services_agency_sliderbutton2_color',
	   'section'   => 'cleaning_services_agency_one_cols_section',
	   'label' => __('Button 2 Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	// Services Section
	$wp_customize->add_section('cleaning_services_agency_about_section', array(
		'title'	=> __('Manage About Section','cleaning-services-agency'),
		'description'	=> __('<p class="sec-title">Manage About Section</p> Select about page and service category from the Dropdowns for about section.','cleaning-services-agency'),
		'priority'	=> null,
		'panel' => 'cleaning_services_agency_panel_area',
	));

	$wp_customize->add_setting('cleaning_services_agency_about_pageboxes',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'cleaning_services_agency_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'cleaning_services_agency_about_pageboxes',array(
		'type' => 'dropdown-pages',
		'section' => 'cleaning_services_agency_about_section',
	));	

	$wp_customize->add_setting('cleaning_services_agency_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( 'cleaning_services_agency_disabled_pgboxes', array(
	   'settings' => 'cleaning_services_agency_disabled_pgboxes',
	   'section'   => 'cleaning_services_agency_about_section',
	   'label'     => __('Check To Enable This Section','cleaning-services-agency'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting( 'cleaning_services_agency_services_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Cleaning_Services_Agency_Category_Dropdown_Custom_Control( $wp_customize, 'cleaning_services_agency_services_cat', array(
		'section' => 'cleaning_services_agency_about_section',
		'settings'   => 'cleaning_services_agency_services_cat',
	) ) );

	$wp_customize->add_setting('cleaning_services_agency_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_disabled_pgboxes', array(
	   'settings' => 'cleaning_services_agency_disabled_pgboxes',
	   'section'   => 'cleaning_services_agency_about_section',
	   'label'     => __('Check To Enable This Section','cleaning-services-agency'),
	   'type'      => 'checkbox'
	));

	//  service heading color
	$wp_customize->add_setting('cleaning_services_agency_serviceheading_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_serviceheading_color', array(
	   'settings' => 'cleaning_services_agency_serviceheading_color',
	   'section'   => 'cleaning_services_agency_about_section',
	   'label' => __('Heading Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	//  service title color
	$wp_customize->add_setting('cleaning_services_agency_servicetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_servicetitle_color', array(
	   'settings' => 'cleaning_services_agency_servicetitle_color',
	   'section'   => 'cleaning_services_agency_about_section',
	   'label' => __('Title Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	//Blog post
	$wp_customize->add_section('cleaning_services_agency_blog_post_settings',array(
        'title' => __('Manage Post Section', 'cleaning-services-agency'),
        'priority' => null,
        'panel' => 'cleaning_services_agency_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('cleaning_services_agency_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'cleaning_services_agency_sanitize_choices'
	));
	$wp_customize->add_control('cleaning_services_agency_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'cleaning-services-agency'),
     'description'   => __('This option work for blog page, archive page and search page.', 'cleaning-services-agency'),
     'section' => 'cleaning_services_agency_blog_post_settings',
     'choices' => array(
         'full' => __('Full','cleaning-services-agency'),
         'left' => __('Left','cleaning-services-agency'),
         'right' => __('Right','cleaning-services-agency'),
         'three-column' => __('Three Columns','cleaning-services-agency'),
         'four-column' => __('Four Columns','cleaning-services-agency'),
         'grid' => __('Grid Layout','cleaning-services-agency')
     ),
	) );

	$wp_customize->add_setting('cleaning_services_agency_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'cleaning_services_agency_sanitize_choices'
	));
	$wp_customize->add_control('cleaning_services_agency_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','cleaning-services-agency'),
        'section' => 'cleaning_services_agency_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','cleaning-services-agency'),
            'Excerpt Content' => __('Excerpt Content','cleaning-services-agency'),
            'Full Content' => __('Full Content','cleaning-services-agency'),
        ),
	) );

	// Footer Section
	$wp_customize->add_section('cleaning_services_agency_footer', array(
		'title'	=> __('Manage Footer Section','cleaning-services-agency'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','cleaning-services-agency'),
		'priority'	=> null,
		'panel' => 'cleaning_services_agency_panel_area',
	));

	$wp_customize->add_setting('cleaning_services_agency_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'cleaning_services_agency_copyright_line', array(
	   'section' 	=> 'cleaning_services_agency_footer',
	   'label'	 	=> __('Copyright Line','cleaning-services-agency'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('cleaning_services_agency_copyright_link',array(
		'default' => 'https://www.theclassictemplates.com/free-cleaning-wordpress-theme/',
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'cleaning_services_agency_copyright_link', array(
	   'section' 	=> 'cleaning_services_agency_footer',
	   'label'	 	=> __('Copyright Link','cleaning-services-agency'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('cleaning_services_agency_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_footercoypright_color', array(
	   'settings' => 'cleaning_services_agency_footercoypright_color',
	   'section'   => 'cleaning_services_agency_footer',
	   'label' => __('Coypright Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	//  footer bg color
	$wp_customize->add_setting('cleaning_services_agency_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_footerbg_color', array(
	   'settings' => 'cleaning_services_agency_footerbg_color',
	   'section'   => 'cleaning_services_agency_footer',
	   'label' => __('BG Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));


	//  footer title color
	$wp_customize->add_setting('cleaning_services_agency_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_footertitle_color', array(
	   'settings' => 'cleaning_services_agency_footertitle_color',
	   'section'   => 'cleaning_services_agency_footer',
	   'label' => __('Title Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('cleaning_services_agency_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_footerdescription_color', array(
	   'settings' => 'cleaning_services_agency_footerdescription_color',
	   'section'   => 'cleaning_services_agency_footer',
	   'label' => __('Description Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('cleaning_services_agency_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'cleaning_services_agency_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cleaning_services_agency_footerlist_color', array(
	   'settings' => 'cleaning_services_agency_footerlist_color',
	   'section'   => 'cleaning_services_agency_footer',
	   'label' => __('List Color', 'cleaning-services-agency'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('cleaning_services_agency_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'cleaning_services_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cleaning_services_agency_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'cleaning-services-agency' ),
        'section'        => 'cleaning_services_agency_footer',
        'settings'       => 'cleaning_services_agency_scroll_hide',
        'type'           => 'checkbox',
    )));


}
add_action( 'customize_register', 'cleaning_services_agency_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cleaning_services_agency_customize_preview_js() {
	wp_enqueue_script( 'cleaning_services_agency_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'cleaning_services_agency_customize_preview_js' );
