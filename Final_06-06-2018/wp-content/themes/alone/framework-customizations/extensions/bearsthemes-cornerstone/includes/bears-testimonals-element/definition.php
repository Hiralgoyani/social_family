<?php
/**
 * Element Definition: "Bears Testimonals Element"
 */

class Bears_Testimonals_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Testimonals', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function flags() {
		return array(
			// 'dynamic_child' => true,
		);
	}
}
