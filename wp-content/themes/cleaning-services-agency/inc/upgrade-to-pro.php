<?php
/**
 * Upgrade to pro options
 */
function cleaning_services_agency_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => esc_html( CLEANING_SERVICES_AGENCY_PRO_NAME ),
			'pro_text' => esc_html__( 'About Cleaning Services Agency','cleaning-services-agency'),
			'priority' => 1,
		)
	);

	class Cleaning_Services_Agency_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'cleaning-services-agency' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_SUPPORT ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'cleaning-services-agency' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_REVIEW ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'cleaning-services-agency' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_PRO_DEMO ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'cleaning-services-agency' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'cleaning-services-agency' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLEANING_SERVICES_AGENCY_THEME_DOCUMENTATION ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'cleaning-services-agency' ); ?> </a></li>

				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'cleaning_services_agency_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Cleaning_Services_Agency_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'cleaning_services_agency_upgrade_pro_options' );
