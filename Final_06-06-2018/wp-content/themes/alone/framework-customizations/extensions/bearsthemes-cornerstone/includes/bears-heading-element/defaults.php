<?php
/**
 * Element Defaults: Bears Heading
 */

return array(
	'id'          						=> '',
	'class'       						=> '',
	'style'       						=> '',
	'text_align'   						=> 'none',
	'padding'      						=> array( '0px', '0px', '0px', '0px', 'unlinked' ),
	'margin'       						=> array( '0px', '0px', '0px', '0px', 'unlinked' ),
	'border_style' 						=> 'none',
	'border_color' 						=> '',
	'border_width' 						=> array( '1px', '1px', '1px', '1px', 'linked' ),

  'fade'                  	=> false,
	'fade_animation'        	=> 'in',
	'fade_animation_offset' 	=> '45px',
	'fade_duration'         	=> '750',

	/* general settings */
	'content'									=> esc_html__('Heading...', 'alone'),
	'level'										=> 'h2',
	'color'										=> '',
	'font_size'								=> '',
	'line_height'							=> '',
	'letter_spacing'					=> '',
	'custom_typography'				=> '',
);
