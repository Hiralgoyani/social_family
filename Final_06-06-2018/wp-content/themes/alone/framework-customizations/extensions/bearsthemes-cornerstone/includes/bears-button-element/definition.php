<?php
/**
 * Element Definition: "Bears Button Element"
 */

class Bears_Button_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Button', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function update_build_shortcode_atts($atts) {
    // This allows us to manipulate attributes that will be assigned to the shortcode
    // Here we will inject a background-color into the style attribute which is
    // already present for inline user styles
    if ( !isset( $atts['style'] ) ) {
			$atts['style'] = '';
		}

    /* border-radius */
    if(!empty($atts['border_radius'])) {
      $atts['style'] .= "border-radius: {$atts['border_radius']};";
    }

    return $atts;
  }
}
