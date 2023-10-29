<?php

  $cleaning_services_agency_color_scheme_css = '';

  // slider hide css
  $cleaning_services_agency_hide_categorysec = get_theme_mod( 'cleaning_services_agency_hide_categorysec', false);
  if($cleaning_services_agency_hide_categorysec != true){
    $cleaning_services_agency_color_scheme_css .=' #service{';
      $cleaning_services_agency_color_scheme_css .='margin-top:30px;';
    $cleaning_services_agency_color_scheme_css .='}';
  }

  //---------------------------------Logo-Max-height--------- 
  $cleaning_services_agency_logo_width = get_theme_mod('cleaning_services_agency_logo_width');

  if($cleaning_services_agency_logo_width != false){

    $cleaning_services_agency_color_scheme_css .='.logo .custom-logo-link img{';

      $cleaning_services_agency_color_scheme_css .='width: '.esc_html($cleaning_services_agency_logo_width).'px;';

    $cleaning_services_agency_color_scheme_css .='}';
  }

