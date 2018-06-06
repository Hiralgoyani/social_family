<?php
/**
 * Element Definition: "Bears Recent Post Element"
 */

class Bears_Recent_Post_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Recent Post', 'alone' ),
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

    return $atts;
  }
}
