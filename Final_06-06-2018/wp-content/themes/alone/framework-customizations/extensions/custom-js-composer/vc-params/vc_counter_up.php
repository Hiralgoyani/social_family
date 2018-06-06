<?php
/*
Element Description: VC Counter Up
*/

// Element Class
class vcCounterUp extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_counter_up_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_counter_up', array( $this, 'vc_counter_up_html' ));
    }

     // Element Mapping
    public function vc_counter_up_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
            array(
                'name' => __( 'Counter Up', 'alone' ),
                'base' => 'vc_counter_up',
                'description' => __('Counter Up', 'alone'),
                'category' => __('Theme Elements', 'alone'),
                'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/counter-up.png',
                'params' => array(
                    /* source */
                    array(
                        'type' => 'textfield',
                        'heading' => __('Counter number', 'alone'),
                        'param_name' => 'counter_number',
                        'description' => __('Enter number', 'alone'),
                        // 'group' => 'Source',
                        'value' => '2,846',
                    ),
                    array(
              				'type' => 'font_container',
              				'param_name' => 'font_container',
              				'value' => 'tag:h2|text_align:left',
              				'settings' => array(
              					'fields' => array(
              						'tag' => 'h2',
              						// default value h2
              						'text_align',
              						'font_size',
              						'line_height',
              						'color',
              						'tag_description' => __( 'Select element tag.', 'alone' ),
              						'text_align_description' => __( 'Select text alignment.', 'alone' ),
              						'font_size_description' => __( 'Enter font size.', 'alone' ),
              						'line_height_description' => __( 'Enter line height.', 'alone' ),
              						'color_description' => __( 'Select heading color.', 'alone' ),
              					),
              				),
                      // 'group' => 'Source',
              			),
                    array(
              				'type' => 'checkbox',
              				'heading' => __( 'Use theme default font family?', 'alone' ),
              				'param_name' => 'use_theme_fonts',
              				'value' => array( __( 'Yes', 'alone' ) => 'yes' ),
              				'description' => __( 'Use font family from the theme.', 'alone' ),
                      // 'group' => 'Source',
              			),
                    array(
              				'type' => 'google_fonts',
              				'param_name' => 'google_fonts',
              				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
              				'settings' => array(
              					'fields' => array(
              						'font_family_description' => __( 'Select font family.', 'alone' ),
              						'font_style_description' => __( 'Select font styling.', 'alone' ),
              					),
              				),
              				'dependency' => array(
              					'element' => 'use_theme_fonts',
              					'value_not_equal_to' => 'yes',
              				),
                      // 'group' => 'Custom Font Settings',
              			),

                    /* Setting */
                    array(
                        'type' => 'textfield',
                        'heading' => __('Before prefix', 'alone'),
                        'param_name' => 'before_prefix',
                        'description' => __('Enter before prefix', 'alone'),
                        'group' => 'Counter Setting',
                        'value' => '$',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('After prefix', 'alone'),
                        'param_name' => 'after_prefix',
                        'description' => __('Enter after prefix', 'alone'),
                        'group' => 'Counter Setting',
                        'value' => ' ',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Delay', 'alone'),
                        'param_name' => 'delay',
                        'description' => __('Enter delay number', 'alone'),
                        'group' => 'Counter Setting',
                        'value' => '10',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Time', 'alone'),
                        'param_name' => 'time',
                        'description' => __('Enter time number', 'alone'),
                        'group' => 'Counter Setting',
                        'value' => '1000',
                    ),

                    /* Style */
                    array(
                        'type' => 'el_id',
                        'heading' => __( 'Element ID', 'alone' ),
                        'param_name' => 'el_id',
                        'description' => __( 'Enter element ID .', 'alone' ),
                        // 'group' => 'Source',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Extra class name', 'alone' ),
                        'param_name' => 'el_class',
                        'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'alone' ),
                        // 'group' => 'Source',
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

    // Enqueue right google font from Googleapis
    public function enqueueGoogleFonts( $fontsData ) {

        // Get extra subsets for settings (latin/cyrillic/etc)
        $settings = get_option( 'wpb_js_google_fonts_subsets' );
        if ( is_array( $settings ) && ! empty( $settings ) ) {
            $subsets = '&subset=' . implode( ',', $settings );
        } else {
            $subsets = '';
        }

        // We also need to enqueue font from googleapis
        if ( isset( $fontsData['values']['font_family'] ) ) {
            wp_enqueue_style(
                'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ),
                '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
            );
        }

    }

    public function getAttributes( $atts ) {
  		/**
  		 * Shortcode attributes
  		 * @var $text
  		 * @var $google_fonts
  		 * @var $font_container
  		 * @var $el_class
  		 * @var $link
  		 * @var $css
  		 */
  		// $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
  		extract( $atts );

  		/**
  		 * Get default values from VC_MAP.
  		 **/
  		$google_fonts_field = $google_fonts; // $this->getParamData( 'google_fonts' );
  		$font_container_field = $font_container; // $this->getParamData( 'font_container' );

  		// $el_class = $this->getExtraClass( $el_class );
  		$font_container_obj = new Vc_Font_Container();
  		$google_fonts_obj = new Vc_Google_Fonts();
  		$font_container_field_settings = isset( $font_container_field['settings'], $font_container_field['settings']['fields'] ) ? $font_container_field['settings']['fields'] : array();
  		$google_fonts_field_settings = isset( $google_fonts_field['settings'], $google_fonts_field['settings']['fields'] ) ? $google_fonts_field['settings']['fields'] : array();
  		$font_container_data = $font_container_obj->_vc_font_container_parse_attributes( $font_container_field_settings, $font_container );
  		$google_fonts_data = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $google_fonts_field_settings, $google_fonts ) : '';

  		return array(
  			// 'counter_number' => isset( $counter_number ) ? $counter_number : '',
  			'google_fonts' => $google_fonts,
  			'font_container' => $font_container,
  			// 'el_class' => $el_class,
  			// 'css' => isset( $css ) ? $css : '',
  			// 'link' => ( 0 === strpos( $link, '|' ) ) ? false : $link,
  			'font_container_data' => $font_container_data,
  			'google_fonts_data' => $google_fonts_data,
  		);
  	}

    /**
  	 * Parses google_fonts_data and font_container_data to get needed css styles to markup
  	 *
  	 * @param $el_class
  	 * @param $css
  	 * @param $google_fonts_data
  	 * @param $font_container_data
  	 * @param $atts
  	 *
  	 * @since 4.3
  	 * @return array
  	 */
  	public function getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) {
  		$styles = array();
  		if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
  			foreach ( $font_container_data['values'] as $key => $value ) {
  				if ( 'tag' !== $key && strlen( $value ) ) {
  					if ( preg_match( '/description/', $key ) ) {
  						continue;
  					}
  					if ( 'font_size' === $key || 'line_height' === $key ) {
  						$value = preg_replace( '/\s+/', '', $value );
  					}
  					if ( 'font_size' === $key ) {
  						$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
  						// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
  						$regexr = preg_match( $pattern, $value, $matches );
  						$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
  						$unit = isset( $matches[2] ) ? $matches[2] : 'px';
  						$value = $value . $unit;
  					}
  					if ( strlen( $value ) > 0 ) {
  						$styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
  					}
  				}
  			}
  		}
  		if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
  			$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
  			$styles[] = 'font-family:' . $google_fonts_family[0];
  			$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
  			$styles[] = 'font-weight:' . $google_fonts_styles[1];
  			$styles[] = 'font-style:' . $google_fonts_styles[2];
  		}

  		/**
  		 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
  		 *
  		 * @param string - filter_name
  		 * @param string - element_class
  		 * @param string - shortcode_name
  		 * @param array - shortcode_attributes
  		 *
  		 * @since 4.3
  		 */
      // $css_class = apply_filters( 'vc_counter_up_filter_class', 'wpb_theme_custom_element wpb_counter_up ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_theme_custom_element wpb_counter_up ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
  	}


    public function _template($temp = 'default', $params = array()) {

    }

    // Element HTML
    public function vc_counter_up_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_counter_up.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcCounterUp();
