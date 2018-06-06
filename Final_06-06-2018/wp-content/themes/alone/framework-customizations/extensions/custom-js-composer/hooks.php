<?php
// check Visual Composer plugin active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(! is_plugin_active( 'js_composer/js_composer.php' )) return;


// Before VC Init
if(! function_exists('_alone_vc_before_init_actions')) :
  function _alone_vc_before_init_actions() {
    // Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){
        vc_set_shortcodes_templates_dir( get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements' );
    }

    alone_vc_load_custom_elements();
  }
endif;
add_action( 'vc_before_init', '_alone_vc_before_init_actions' );

// After VC Init
if(! function_exists('_alone_vc_after_init_actions')) :
  function _alone_vc_after_init_actions() {

    // Add Params vc_progress_bar
    $vc_progress_bar_new_params = array(
      array(
        'type' => 'dropdown',
        'heading' => __('Ui', 'alone'),
        'param_name' => 'custom_ui',
        'value' => array(
          __('Default', 'alone') => '',
          __('Round - Slender', 'alone') => 'round-slender',
          __('Square - Slender', 'alone') => 'square-slender',
          __('Slender line', 'alone') => 'slender-line',
        ),
        'std'         => 'default',
        'description' => __( "Custom ui for each item progress bar (default / Round / Square)", 'alone' ),
        'group'       => __('Extra Group', 'alone'),
      ),
    );
    vc_add_params('vc_progress_bar', $vc_progress_bar_new_params);

    // Add Params vc_custom_heading
    $vc_custom_heading_new_params = array(
      array(
        "type" => "textfield",
        "heading" => __('Letter Spacing', 'alone'),
        "param_name" => 'custom_letter_spacing',
        "value" => '',
        'group'       => __('Extra Group', 'alone'),
      )
    );
    vc_add_params('vc_custom_heading', $vc_custom_heading_new_params);

    // Add Params vc_custom_heading
    $vc_icon_new_params = array(
      array(
        "type" => "dropdown",
        "heading" => __('Action', 'alone'),
        "param_name" => 'custom_action',
        'value' => array(
          __('Default', 'alone') => '',
          __('Click on open lightbox', 'alone') => 'lightbox',
        ),
        'description' => __('Optons: Default / Lightbox (Image, Video - Youtube, Vimeo, Video Html5)', 'alone'),
        'group'       => __('Extra Group', 'alone'),
      )
    );
    vc_add_params('vc_icon', $vc_icon_new_params);

    // remove params type in vc_post_slider
    vc_remove_param('vc_posts_slider', 'type');
  }
endif;
add_action('vc_after_init', '_alone_vc_after_init_actions');

if(! function_exists('_alone_vc_image_picker_settings_field')) :
  function _alone_vc_image_picker_settings_field( $settings, $value ) {
    $output = '';

    if ( ! empty( $settings['value'] ) ) {
  		foreach ( $settings['value'] as $index => $data ) {

  			$selected = '';
  			if ( '' !== $value && $index === $value ) {
  				$selected = ' checked="checked"';
  			}
  			$option_class = str_replace( '#', 'hash-', $index );
  			$output .= '<label class="image-picker-item">
          <input type="radio" name="' . $settings['param_name'] . '" value="' . esc_attr( $index ) . '" class="radio ' . esc_attr( $option_class ) . '" ' . $selected . ' />
          <span><img src="'. $data .'" alt="#"/></span>
          </label>';
  		}
  	}

    return '<div class="vc_image_picker_block">' .
           $output .
           '<input type="hidden" name="' . $settings['param_name'] . '" value="' . esc_attr( $value ) . '" class="wpb_vc_param_value"/>' .
           '</div>'; // This is html markup that will be outputted in content elements edit form
  }
endif;
vc_add_shortcode_param( 'vc_image_picker', '_alone_vc_image_picker_settings_field' );


if(! function_exists('_alone_vc_load_default_templates')) :
  /**
   * _alone_vc_load_default_templates
   * @since 0.0.7
   */
  function _alone_vc_load_default_templates($templates) {
    $templates = array_merge($templates, alone_vc_load_templates(get_template_directory() . "/framework-customizations/extensions/custom-js-composer/vc-templates-default/*.php", 'alone'));

    //Load additional templates from plugins or themes
    //foreach($templates as $additional_location) $templates = array_merge($templates, alone_vc_load_templates( trailingslashit($additional_location) . '*.php', 'plugin'));

    return $templates;
  }
endif;
add_filter('vc_load_default_templates', '_alone_vc_load_default_templates', 12);
