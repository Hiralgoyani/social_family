<?php
/**
 * Element Definition: "Bears Team Item Element"
 */

class Bears_Carousel_Item_Element {
  public function ui() {
		return array(
      'title'       => __( 'Bears Carousel Item', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function flags() {
    return array(
      'child' => true,
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
