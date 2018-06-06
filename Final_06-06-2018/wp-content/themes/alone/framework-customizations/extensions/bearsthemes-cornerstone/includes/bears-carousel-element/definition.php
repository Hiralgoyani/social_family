<?php
/**
 * Element Definition: "Bears Carousel Element"
 */

class Bears_Carousel_Element {
  public function ui() {
		return array(
      'title'       => __( 'Bears Carousel', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function flags() {
		return array(
			// 'dynamic_child' => true,
		);
	}
}
