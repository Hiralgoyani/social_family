<?php
/**
 * Element Definition: "Bears Team Element"
 */

class Bears_Team_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Team', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}

  public function flags() {
		return array(
			// 'dynamic_child' => true,
		);
	}
}
