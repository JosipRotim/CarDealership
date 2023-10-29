<?php
/*
 * @package Car Service
 */

function cleaning_services_agency_admin_enqueue_scripts() {
	wp_enqueue_style( 'cleaning-services-agency-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'cleaning_services_agency_admin_enqueue_scripts' );

add_action('after_switch_theme', 'cleaning_services_agency_options');

function cleaning_services_agency_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=cleaning-services-agency' ) );
		exit;
	}
}

function cleaning_services_agency_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'cleaning-services-agency' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'cleaning-services-agency' ),'edit_theme_options','cleaning-services-agency','cleaning_services_agency_theme_info_page'
	);
}
add_action( 'admin_menu', 'cleaning_services_agency_theme_info_menu_link' );

function cleaning_services_agency_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'cleaning-services-agency' ), esc_html($theme->display( 'Name', 'cleaning-services-agency'  )),esc_html($theme->display( 'Version', 'cleaning-services-agency' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'cleaning-services-agency' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'cleaning-services-agency' ); ?>:</strong>
			<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'cleaning-services-agency' ); ?></a>
			<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'cleaning-services-agency' ); ?></a>
			<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'cleaning-services-agency' ); ?></a>
			<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'cleaning-services-agency' ); ?></a>
			<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'cleaning-services-agency' ); ?></a>
			<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'cleaning-services-agency' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'cleaning-services-agency' ), 
		esc_html($theme->display( 'Name', 'cleaning-services-agency' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'cleaning-services-agency' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt="" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'cleaning-services-agency' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'cleaning-services-agency' ),esc_html($theme->display( 'Name', 'cleaning-services-agency' ))); ?></p>
					<p>
					<a href="<?php echo esc_attr(wp_customize_url()); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customize Theme', 'cleaning-services-agency' ); ?></a>
					<a href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'cleaning-services-agency' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'cleaning-services-agency' ),
			esc_html($theme->display( 'Name', 'cleaning-services-agency' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'cleaning-services-agency' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( CLEANING_SERVICES_AGENCY_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'cleaning-services-agency' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'cleaning-services-agency' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
