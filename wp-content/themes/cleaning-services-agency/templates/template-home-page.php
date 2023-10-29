<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Cleaning Services Agency
 */

get_header(); ?>

<div id="content" >
  <?php
    $hidcatslide = get_theme_mod('cleaning_services_agency_hide_categorysec', true);
    if( $hidcatslide != ''){
  ?>
    <section id="slider">
      <div class="owl-carousel owl-theme slider-sec">
        <?php if( get_theme_mod('cleaning_services_agency_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('cleaning_services_agency_slidersection',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
          <div class="item">
            <div class="content d-flex align-items-center" style="background-image: url(<?php 
              if (has_post_thumbnail()) {
                  echo the_post_thumbnail_url('full');
              } else {
                  echo esc_url(get_template_directory_uri() . '/images/slider-img.png');
              }
              ?>);">
              <div class="sliderbox">
                    <h1 class="title-slider text-white mb-2 text-start">
                      <?php the_title(); ?>
                    </h1>
                    <?php
                      $trimexcerpt = get_the_excerpt();
                      $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 25 );
                      echo ' <p class="text-slider text-white mb-2 text-start">' . esc_html( $shortexcerpt ) . '</p>'; 
                    ?>
                    <div class="gap-md-3 gap-1 text-start mt-4 sliderbtn">
                      <?php if (get_theme_mod('cleaning_services_agency_button_text', 'true') != "") { ?>
                          <a href="<?php the_permalink(); ?>" class="button redmor mb-3">
                              <?php echo esc_html(get_theme_mod('cleaning_services_agency_button_text', __('Appointment', 'cleaning-services-agency'))); ?>
                              <span class="screen-reader-text">
                                  <?php echo esc_html(get_theme_mod('cleaning_services_agency_button_text', __('Appointment', 'cleaning-services-agency'))); ?>
                              </span>
                          </a>
                      <?php } ?>
                      <?php if (get_theme_mod('cleaning_services_agency_button2_text', 'true') != "") { ?>
                          <a href="<?php echo esc_url(get_theme_mod('cleaning_services_agency_button2_url')); ?>" class="button cont-us mb-3">
                              <?php echo esc_html(get_theme_mod('cleaning_services_agency_button2_text', __('Contacts', 'cleaning-services-agency'))); ?>
                              <span class="screen-reader-text">
                                  <?php echo esc_html(get_theme_mod('cleaning_services_agency_button2_text', __('Contacts', 'cleaning-services-agency'))); ?>
                              </span>
                          </a>
                      <?php } ?>
                  </div>
              </div>
              <div class="overlayer"></div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php } ?>
      </div>
    </section>
  <?php } ?>

  <?php
$cleaning_services_agency_hidepageboxes = get_theme_mod('cleaning_services_agency_disabled_pgboxes', true);
if ($cleaning_services_agency_hidepageboxes != '') {
?>
  <section id="service">
    <div class="row">
      <?php if (get_theme_mod('cleaning_services_agency_about_pageboxes', false)) { ?>
        <div class="col-lg-7 col-md-6 about-box my-md-5 my-3">
          <?php $cleaning_services_agency_querymed = new WP_Query('page_id=' . esc_attr(get_theme_mod('cleaning_services_agency_about_pageboxes', true))); ?>
          <?php while ($cleaning_services_agency_querymed->have_posts()) : $cleaning_services_agency_querymed->the_post(); ?>
            <div class="text-inner-box">
              <h2><?php the_title(); ?></h2>
              <p class="abt-content"><?php echo esc_html(wp_trim_words(get_the_content(), 60)); ?></p>
              <div class="serv-btn mt-md-4 mt-3">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'cleaning-services-agency'); ?><span class="screen-reader-text"><?php esc_html_e('Read More', 'cleaning-services-agency'); ?></span></a>
              </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php } ?>

        <?php if (get_theme_mod('cleaning_services_agency_services_cat', false)) { ?>
          <div class="col-lg-5 col-md-6 serv-box">
            <div class="row">
              <?php $queryvar = new WP_Query('cat=' . esc_attr(get_theme_mod('cleaning_services_agency_services_cat', true)));
                  while ($queryvar->have_posts()) : $queryvar->the_post(); ?>
                  <div class="col-lg-6 col-md-6 col-sm-6 services">
                    <div class="service-content">
                        <div class="meta-fields">
                          <?php if (get_post_meta($post->ID, 'cleaning_services_agency_custom_icon', true)) { ?>
                              <p class="text-center mb-1"><i class="<?php echo esc_attr(get_post_meta($post->ID, 'cleaning_services_agency_custom_icon', true)); ?>"></i></p>
                          <?php } ?>
                          <?php if (get_post_meta($post->ID, 'cleaning_services_agency_custom_number', true)) { ?>
                              <p class="text-center mb-1 serv-num"><?php echo esc_html(get_post_meta($post->ID, 'cleaning_services_agency_custom_number', true)); ?></p>
                          <?php } ?>
                        </div>
                        <h3 class="text-center services_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                  </div>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          </div>
        <?php } ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>
