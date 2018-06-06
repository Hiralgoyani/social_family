<?php
/**
 * Element Definition: "Bears Image Item Element"
 */

class Bears_Image_Item_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Image Item', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function flags() {
    return array(
      'child' => true,
    );
  }

  public function update_build_shortcode_atts($atts, $parent) {
    // This allows us to manipulate attributes that will be assigned to the shortcode
    // Here we will inject a background-color into the style attribute which is
    // already present for inline user styles
    if ( !isset( $atts['style'] ) ) {
			$atts['style'] = '';
		}

    if ( ! is_null( $parent ) ) {
			$atts['layout'] = $parent['layout'];
			$atts['show_title_on_hover'] = $parent['show_title_on_hover'];
		}

    return $atts;
  }
}
