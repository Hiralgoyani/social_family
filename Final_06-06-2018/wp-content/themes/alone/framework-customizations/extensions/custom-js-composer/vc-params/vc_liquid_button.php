<?php
/*
Element Description: VC Liquid Button
*/

// Element Class
class vcLiquidButton extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_liquid_button_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_liquid_button', array( $this, 'vc_liquid_button_html' ));
    }

    // Element Mapping
    public function vc_liquid_button_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Liquid Button', 'alone'),
            'base' => 'vc_liquid_button',
            'description' => __('Liquid Button', 'alone'),
            'category' => __('Theme Elements', 'alone'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/liquid-button.png',
            'params' => array(
              /* source */
              array(
                'type' => 'textfield',
                'heading' => __('Button Text', 'alone'),
                'param_name' => 'content',
                'description' => __('Enter button text', 'alone'),
                'group' => 'Source',
                'value' => '►',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Href', 'alone'),
                'param_name' => 'href',
                'description' => __('Enter href', 'alone'),
                'group' => 'Source',
                'value' => '#',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Button Width', 'alone'),
                'param_name' => 'width',
                'description' => __('Button width (ex: 100)', 'alone'),
                'group' => 'Source',
                'value' => 100,
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Button Height', 'alone'),
                'param_name' => 'width',
                'description' => __('Button height (ex: 100)', 'alone'),
                'group' => 'Source',
                'value' => 100,
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('Color 1', 'alone'),
                'param_name' => 'color_1',
                'value' => '#36DFE7', //Default Red color
                'description' => __('Select color 1', 'alone'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('Color 2', 'alone'),
                'param_name' => 'color_2',
                'value' => '#8F17E1', //Default Red color
                'description' => __('Select color 2', 'alone'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('Color 3', 'alone'),
                'param_name' => 'color_3',
                'value' => '#BF09E6', //Default Red color
                'description' => __('Select color 3', 'alone'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('Text Color', 'alone'),
                'param_name' => 'text_color',
                'value' => '#FFFFFF', //Default Red color
                'description' => __('Select text color', 'alone'),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Alignment', 'alone'),
                'param_name' => 'align',
                'description' => __('Select button alignment', 'alone'),
                'value' => array(
                  __('Left', 'alone') => 'left',
                  __('Right', 'alone') => 'right',
                  __('Center', 'alone') => 'center',
                ),
                'std' => 'center',
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('action', 'alone'),
                'param_name' => 'action',
                'description' => __('Select button click action', 'alone'),
                'value' => array(
                  __('Default', 'alone') => '',
                  __('Lightbox', 'alone') => 'lightbox',
                ),
                'std' => '',
                'group' => 'Source',
              ),
              array(
          			'type' => 'el_id',
          			'heading' => __( 'Element ID', 'alone' ),
          			'param_name' => 'el_id',
          			'description' => __( 'Enter element ID .', 'alone' ),
                'group' => 'Source',
              ),
          		array(
          			'type' => 'textfield',
          			'heading' => __( 'Extra class name', 'alone' ),
          			'param_name' => 'el_class',
          			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'alone' ),
                'group' => 'Source',
              ),
              /* css editor */
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'alone' ),
                'param_name' => 'css',
                'group' => __( 'Design Options general', 'alone' ),
              ),
            ),
          )
        );
    }

    /**
  	 * Parses google_fonts_data and font_container_data to get needed css styles to markup
  	 *
  	 * @param $el_class
  	 * @param $css
  	 * @param $atts
  	 *
  	 * @since 1.0
  	 * @return array
  	 */
    public function getStyles($el_class, $css, $atts) {
      $styles = array();

      /**
  		 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_liquid_button class
  		 *
  		 * @param string - filter_name
  		 * @param string - element_class
  		 * @param string - shortcode_name
  		 * @param array - shortcode_attributes
  		 *
  		 * @since 4.3
  		 */
  		$css_class = apply_filters( 'vc_liquid_button_filter_class', 'wpb_theme_custom_element wpb_liquid_button ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }


    public function _template($temp = 'default', $params = array()) {

    }

    // Element HTML
    public function vc_liquid_button_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_liquid_button.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcLiquidButton();
