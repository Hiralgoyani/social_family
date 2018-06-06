<?php
/**
 * alone_load_custom_elements
 *
 */
if(! function_exists('alone_vc_load_custom_elements')) :
  function alone_vc_load_custom_elements() {
    $path = get_template_directory() . '/framework-customizations/extensions/custom-js-composer/';
    $new_elements = array(
      'vc_posts_slider_2',
      'vc_base_carousel',
      'vc_featured_box',
      'vc_pricing_table',
      'vc_progressbar_svg',
      'vc_posts_grid_resizable',
      'vc_liquid_button',
      'vc_counter_up',
    );

    /* check plugin Give (donations) exist  */
    if (class_exists('Give')) :
      $new_elements[] = 'grid_builder_give_goal_progress';
      $new_elements[] = 'grid_builder_give_button_donate';
      $new_elements[] = 'vc_give_forms_slider';
    endif;

    /* portfolio */
    if (function_exists('fw_ext') && fw_ext('portfolio')) {
      $new_elements[] = 'vc_portfolio_grid';
    }

    /* event */
    if (function_exists('fw_ext') && fw_ext('events')) {
      $new_elements[] = 'vc_events_slider';
      $new_elements[] = 'vc_events_listing';
    }

    foreach($new_elements as $item) :
      $dir = $path . 'vc-params/' . $item . '.php';
      if(file_exists($dir)) require $dir;
    endforeach;
  }
endif;

if(! function_exists('alone_vc_load_templates')) :
  /**
   * alone_vc_load_templates
   * @since 0.0.7
   */
  function alone_vc_load_templates($folder = 'default_templates') {
    $templates = array();

    //Load default tempaltes
    foreach (glob($folder) as $filename)
    {
      $template_params = alone_vc_get_template_data($filename);
      $filename_clean = basename($filename, '.php');

      $data = array();
      $data['name']         = $template_params['template_name'];
      $data['weight']       = 0;
      $data['custom_class'] = 'vc-default-temp-' . $filename_clean;
      $data['content']      = file_get_contents($filename);
      $templates[] = $data;
    }

    return $templates;
  }
endif;

if(! function_exists('alone_vc_get_template_data')) :
  /**
   * vctl_get_template_data
   * @since 0.0.7
   */
  function alone_vc_get_template_data($file) {
    $default_headers = array(
      'template_name' => 'Template Name',
      'preview_image' => 'Preview Image',
      'descriptions'  => 'Descriptions',
    );

    return get_file_data($file, $default_headers);
  }
endif;
