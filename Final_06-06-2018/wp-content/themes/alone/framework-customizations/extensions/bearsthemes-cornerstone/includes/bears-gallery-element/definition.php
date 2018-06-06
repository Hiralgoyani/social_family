<?php
/**
 * Element Definition: "Bears Gallery Element"
 */

class Bears_Gallery_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Gallery', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function flags() {
		return array(
		    // 'dynamic_child' => true,
		);
	}
}
