<?php
/**
 * Element Definition: "Bears Portfolio Element"
 */

class Bears_Portfolio_Element {
  public function ui() {
		return array(
      'title'       => esc_html__( 'Bears Portfolio', 'alone' ),
    	'icon_group'  => 'bears-element',
    );
	}
}
