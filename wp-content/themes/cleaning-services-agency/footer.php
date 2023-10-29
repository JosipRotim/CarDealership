<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cleaning Services Agency
 */
?>
<div style="background-color: #efebe5;">
<div id="footer">
  <div class="container">
    <div class="row py-3 footer-content">
      <?php dynamic_sidebar('footer-nav'); ?>
    </div>
  </div>
  <div class="copywrap text-center">
    <div class="container">
      <p><a href="<?php echo esc_html(get_theme_mod('cleaning_services_agency_copyright_link',__('https://www.theclassictemplates.com/free-cleaning-wordpress-theme/','cleaning-services-agency'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('cleaning_services_agency_copyright_line',__('Cleaning Services Agency WordPress Theme','cleaning-services-agency'))); ?></a> <?php echo esc_html('By Classic Templates','cleaning-services-agency'); ?></p>
    </div>
  </div>
</div>
</div>

<?php if(get_theme_mod('cleaning_services_agency_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'cleaning-services-agency'); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
