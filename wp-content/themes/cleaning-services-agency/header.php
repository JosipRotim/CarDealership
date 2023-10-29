<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Cleaning Services Agency
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'cleaning-services-agency' ); ?></a>

<header id="header" class="w-100 left-0">
  <?php if (get_theme_mod('cleaning_services_agency_topbar',false) != "") { ?>
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 align-self-center">
            <?php if ( get_theme_mod('cleaning_services_agency_email_address') != "") { ?>
              <p class="mb-md-0"><a class="mb-0 email" href="mailto:<?php echo esc_attr( get_theme_mod('cleaning_services_agency_email_address','') ); ?>"><i class="far fa-envelope"></i><?php echo esc_html(get_theme_mod ('cleaning_services_agency_email_address','')); ?></a></p>
            <?php }?>
          </div>
          <div class="col-lg-3 col-md-4 align-self-center">
            <?php if ( get_theme_mod('cleaning_services_agency_time') != "") { ?>
              <p class="mb-md-0 time"><i class="far fa-clock"></i><?php echo esc_html(get_theme_mod ('cleaning_services_agency_time','')); ?></p>
            <?php }?>
          </div>
          <div class="col-lg-6 col-md-4 menubox align-self-center">
            <div class="w-auto gap-3 social-icon my-2">
              <?php if ( get_theme_mod('cleaning_services_agency_fb_link') != "") { ?>
                <a title="<?php echo esc_attr('facebook', 'cleaning-services-agency'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('cleaning_services_agency_fb_link')); ?>" class="text-decoration-none">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
              <?php } ?>
              <?php if ( get_theme_mod('cleaning_services_agency_twitt_link') != "") { ?>
                <a title="<?php echo esc_attr('twitter', 'cleaning-services-agency'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('cleaning_services_agency_twitt_link')); ?>" class="text-decoration-none">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
              <?php } ?>
              <?php if ( get_theme_mod('cleaning_services_agency_insta_link') != "") { ?>
                <a title="<?php echo esc_attr('instagram', 'cleaning-services-agency'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('cleaning_services_agency_insta_link')); ?>" class="text-decoration-none">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
              <?php } ?>
              <?php if ( get_theme_mod('cleaning_services_agency_linkedin_link') != "") { ?>
                <a title="<?php echo esc_attr('Linkedin', 'cleaning-services-agency'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('cleaning_services_agency_linkedin_link')); ?>" class="text-decoration-none">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
              <?php } ?>
              <?php if ( get_theme_mod('cleaning_services_agency_youtube_link') != "") { ?>
                <a title="<?php echo esc_attr('Youtube', 'cleaning-services-agency'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('cleaning_services_agency_youtube_link')); ?>" class="text-decoration-none">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="bg-inner">
    <div class="container">
      <div class="<?php echo esc_attr(cleaning_services_agency_sticky_menu()); ?>">
        <div class="row">
          <div class="col-lg-3 col-md-4 align-self-center">
            <div class="logo">
              <?php cleaning_services_agency_the_custom_logo(); ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( get_theme_mod('cleaning_services_agency_title_enable',true) != "") { ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                  <?php endif; ?>
                <?php } ?>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php $cleaning_services_agency_description = get_bloginfo( 'description', 'display' );
                    if ( $cleaning_services_agency_description || is_customize_preview() ) : ?>
                    <?php if ( get_theme_mod('cleaning_services_agency_tagline_enable',false) != "") { ?>
                    <p class="site-tagline my-2"><?php echo esc_html( $cleaning_services_agency_description ); ?></p>
                    <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-7 col-md-4 col-4 menubox align-self-center">
            <div class="toggle-nav text-center my-2 align-self-center <?php echo esc_attr(cleaning_services_agency_sticky_menu_mobile()); ?>">
              <?php if(has_nav_menu('primary')){ ?>
                <button role="tab"><?php esc_html_e('MENU','cleaning-services-agency'); ?></button>
              <?php }?>
            </div>
            <div id="mySidenav" class="nav sidenav text-right">
              <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','cleaning-services-agency' ); ?>">
                <ul class="mobile_nav">
                  <?php
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu' ,
                      'items_wrap' => '%3$s',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  ?>
                </ul>
                <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','cleaning-services-agency'); ?></a>
              </nav>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-8 align-self-center text-right">
            <div class="phone_number text-right my-md-2 my-4 ps-3">
              <?php if ( get_theme_mod('cleaning_services_agency_phone_number') != "" || get_theme_mod('cleaning_services_agency_phone_text') != "") { ?>
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-2 text-center">
                    <i class="fas fa-mobile-alt mb-3"></i>
                  </div>
                  <div class="col-lg-10 col-md-10 col-10 ps-md-4 ps-3">
                    <a href="tel:<?php echo esc_url( get_theme_mod('cleaning_services_agency_phone_number','' )); ?>"><?php echo esc_html(get_theme_mod ('cleaning_services_agency_phone_number','')); ?></a>
                    <p><?php echo esc_html(get_theme_mod ('cleaning_services_agency_phone_text','')); ?></p>
                  </div>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
