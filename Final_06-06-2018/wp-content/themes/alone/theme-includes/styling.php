<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

if ( ! defined( 'FW' ) ) {
	return;
}

$alone_customizer_option = function_exists('fw_get_db_customizer_option') ? fw_get_db_customizer_option() : array();

global $alone_scss_variables;
$alone_scss_variables = array();

if( empty($alone_customizer_option) ) {
	return;
}

$alone_typography_settings  = $alone_customizer_option['typography_settings'];
$alone_color_settings       = $alone_customizer_option['color_settings'];

$alone_website_background   = $alone_customizer_option['website_background'];
$alone_header_settings      = $alone_customizer_option['header_settings'];
$alone_title_bar_settings   = $alone_customizer_option['general_title_bar'];
$alone_footer_settings      = $alone_customizer_option['footer_settings'];
$alone_logo_settings        = $alone_customizer_option['logo_settings'];

$alone_scss_variables['website-bg-color'] = (isset($alone_website_background['website_bg_color']) && ! empty($alone_website_background['website_bg_color'])) ? $alone_website_background['website_bg_color'] : '#ffffff';

// website background
if ( isset( $alone_website_background['website_bg']['type'] ) && $alone_website_background['website_bg']['type'] == 'custom' ) {
	// custom image
    if( isset($alone_website_background['website_bg']['data']['icon']) && !empty($alone_website_background['website_bg']['data']['icon']) ) {
        $alone_scss_variables['body-bg-image'] = '"'.alone_change_original_link_with_cdn( $alone_website_background['website_bg']['data']['icon'] ).'"';
    }
	$alone_modified_variables['body-bg-repeat'] = 'repeat';
} elseif ( isset( $alone_website_background['website_bg']['type'] ) && $alone_website_background['website_bg']['type'] == 'predefined' ) {
	if ( isset( $alone_website_background['website_bg']['predefined'] ) && $alone_website_background['website_bg']['predefined'] != 'none' ) {
		// predefined image
        $alone_scss_variables['body-bg-image'] = '"'.alone_change_original_link_with_cdn( $alone_website_background['website_bg']['data']['icon'] ).'"';
		$alone_scss_variables['body-bg-repeat'] = $alone_website_background['website_bg']['data']['css']['background-repeat'];
	}
}

// boxed site width
if ( isset( $alone_customizer_option['container_site_type']['selected'] ) && $alone_customizer_option['container_site_type']['selected'] == 'bt-side-boxed') {
	// boxed margin top/bottom
	if(!empty($alone_customizer_option['container_site_type']['bt-side-boxed']['site_margin'])){
		$alone_scss_variables['boxed-site-margin-bottom'] = $alone_customizer_option['container_site_type']['bt-side-boxed']['site_margin'] . 'px';
		$alone_scss_variables['boxed-site-margin-top'] = $alone_customizer_option['container_site_type']['bt-side-boxed']['site_margin'] . 'px';
	}

	// boxed container background
	if( isset($alone_customizer_option['container_site_type']['bt-side-boxed']['boxed_container_bg']) && !empty($alone_customizer_option['container_site_type']['bt-side-boxed']['boxed_container_bg']) ){
		$alone_scss_variables['boxed-container-bg'] = $alone_customizer_option['container_site_type']['bt-side-boxed']['boxed_container_bg'];
	}
}

// links and buttons colors
if ( isset( $alone_customizer_option['buttons_settings']['links_normal_state'] ) && ! empty( $alone_customizer_option['buttons_settings']['links_normal_state'] ) ) {
	if ( isset( $alone_customizer_option['buttons_settings']['links_normal_state']['id'] ) && $alone_customizer_option['buttons_settings']['links_normal_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_customizer_option['buttons_settings']['links_normal_state']['color'] ) ) {
			$alone_scss_variables['link-color'] = $alone_customizer_option['buttons_settings']['links_normal_state']['color'];
		}
	} elseif ( isset( $alone_customizer_option['buttons_settings']['links_normal_state']['id'] ) ) {
		$alone_scss_variables['link-color'] = $alone_color_settings[ $alone_customizer_option['buttons_settings']['links_normal_state']['id'] ];
	}
}

if ( isset( $alone_customizer_option['buttons_settings']['links_hover_state'] ) && ! empty( $alone_customizer_option['buttons_settings']['links_hover_state'] ) ) {
	if ( isset( $alone_customizer_option['buttons_settings']['links_hover_state']['id'] ) && $alone_customizer_option['buttons_settings']['links_hover_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_customizer_option['buttons_settings']['links_hover_state']['color'] ) ) {
			$alone_scss_variables['link-hover-color'] = $alone_customizer_option['buttons_settings']['links_hover_state']['color'];
		}
	} elseif ( isset( $alone_customizer_option['buttons_settings']['links_hover_state']['id'] ) ) {
		$alone_scss_variables['link-hover-color'] = $alone_color_settings[ $alone_customizer_option['buttons_settings']['links_hover_state']['id'] ];
	}
}

if ( isset( $alone_customizer_option['buttons_settings']['buttons_normal_state'] ) && ! empty( $alone_customizer_option['buttons_settings']['buttons_normal_state'] ) ) {
	if ( isset( $alone_customizer_option['buttons_settings']['buttons_normal_state']['id'] ) && $alone_customizer_option['buttons_settings']['buttons_normal_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_customizer_option['buttons_settings']['buttons_normal_state']['color'] ) ) {
			$alone_scss_variables['fw-btn-color'] = $alone_customizer_option['buttons_settings']['buttons_normal_state']['color'];
		}
	} elseif ( isset( $alone_customizer_option['buttons_settings']['buttons_normal_state']['id'] ) ) {
		$alone_scss_variables['fw-btn-color'] = $alone_color_settings[ $alone_customizer_option['buttons_settings']['buttons_normal_state']['id'] ];
	}
}
if ( isset( $alone_customizer_option['buttons_settings']['buttons_hover_state'] ) && ! empty( $alone_customizer_option['buttons_settings']['buttons_hover_state'] ) ) {
	if ( isset( $alone_customizer_option['buttons_settings']['buttons_hover_state']['id'] ) && $alone_customizer_option['buttons_settings']['buttons_hover_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_customizer_option['buttons_settings']['buttons_hover_state']['color'] ) ) {
			$alone_scss_variables['fw-btn-hover-color'] = $alone_customizer_option['buttons_settings']['buttons_hover_state']['color'];
		}
	} elseif ( isset( $alone_customizer_option['buttons_settings']['buttons_hover_state']['id'] ) ) {
		$alone_scss_variables['fw-btn-hover-color'] = $alone_color_settings[ $alone_customizer_option['buttons_settings']['buttons_hover_state']['id'] ];
	}
}

// h1
if ( isset( $alone_typography_settings['h1'] ) ) {
	$font_styles                                = alone_get_font_array( $alone_typography_settings['h1'], $alone_color_settings );
	$alone_scss_variables['fw-h1-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-h1-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-h1-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-h1-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-h1-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-h1-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-h1-font-weight'] = $font_styles['font-weight'];
}

// h2
if ( isset( $alone_typography_settings['h2'] ) ) {
	$font_styles                                = alone_get_font_array( $alone_typography_settings['h2'], $alone_color_settings );
	$alone_scss_variables['fw-h2-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-h2-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-h2-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-h2-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-h2-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-h2-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-h2-font-weight'] = $font_styles['font-weight'];
}

// h3
if ( isset( $alone_typography_settings['h3'] ) ) {
	$font_styles                                = alone_get_font_array( $alone_typography_settings['h3'], $alone_color_settings );
	$alone_scss_variables['fw-h3-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-h3-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-h3-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-h3-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-h3-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-h3-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-h3-font-weight'] = $font_styles['font-weight'];
}

// h4
if ( isset( $alone_typography_settings['h4'] ) ) {
	$font_styles                                = alone_get_font_array( $alone_typography_settings['h4'], $alone_color_settings );
	$alone_scss_variables['fw-h4-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-h4-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-h4-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-h4-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-h4-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-h4-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-h4-font-weight'] = $font_styles['font-weight'];
}

// h5
if ( isset( $alone_typography_settings['h5'] ) ) {
	$font_styles                                = alone_get_font_array( $alone_typography_settings['h5'], $alone_color_settings );
	$alone_scss_variables['fw-h5-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-h5-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-h5-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-h5-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-h5-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-h5-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-h5-font-weight'] = $font_styles['font-weight'];
}

// h6
if ( isset( $alone_typography_settings['h6'] ) ) {
	$font_styles                                = alone_get_font_array( $alone_typography_settings['h6'], $alone_color_settings );
	$alone_scss_variables['fw-h6-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-h6-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-h6-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-h6-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-h6-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-h6-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-h6-font-weight'] = $font_styles['font-weight'];
}

// body
if ( isset( $alone_typography_settings['body_text'] ) ) {
	$font_styles                               = alone_get_font_array( $alone_typography_settings['body_text'], $alone_color_settings );
	$alone_scss_variables['font-family-base']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['font-size-base'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['line-height-base'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['font-letter-spacing-base'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['text-color'] = $font_styles['color'] : '';
	$alone_scss_variables['font-style-base']  = $font_styles['font-style'];
	$alone_scss_variables['font-weight-base'] = $font_styles['font-weight'];
}

// buttons
if ( isset( $alone_typography_settings['buttons'] ) ) {
	$font_styles                                     = alone_get_font_array( $alone_typography_settings['buttons'], $alone_color_settings );
  $alone_scss_variables['fw-buttons-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-buttons-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-buttons-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-buttons-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$alone_scss_variables['fw-buttons-color'] = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#ffffff';
	$alone_scss_variables['fw-buttons-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-buttons-font-weight'] = $font_styles['font-weight'];
}
if ( isset( $alone_typography_settings['buttons_hover']['id'] ) && $alone_typography_settings['buttons_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_typography_settings['buttons_hover']['color'] ) ) {
		$alone_scss_variables['fw-buttons-hover-color'] = $alone_typography_settings['buttons_hover']['color'];
	}
} elseif ( isset( $alone_typography_settings['buttons_hover']['id'] ) ) {
	$alone_scss_variables['fw-buttons-hover-color'] = $alone_color_settings[ $alone_typography_settings['buttons_hover']['id'] ];
}

// top-bar
if ( isset( $alone_typography_settings['header_top_bar_text'] ) ) {
	$font_styles                                     = alone_get_font_array( $alone_typography_settings['header_top_bar_text'], $alone_color_settings );
	$alone_scss_variables['fw-top-bar-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-top-bar-font-size-text'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-top-bar-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-top-bar-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$alone_scss_variables['fw-top-bar-text-color'] = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#333333';
	$alone_scss_variables['fw-top-bar-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-top-bar-font-weight'] = $font_styles['font-weight'];
}

// header padding top - bottom
$alone_scss_variables['header-padding-top'] = (! empty($alone_header_settings['header_padding_top'])) ? (int) $alone_header_settings['header_padding_top'] . 'px' : '0px';
$alone_scss_variables['header-padding-bottom'] = (! empty($alone_header_settings['header_padding_bottom'])) ? (int) $alone_header_settings['header_padding_bottom'] . 'px' : '0px';

// header 3 extra options
$header_3_options = alone_get_header_3_options();
$alone_scss_variables['header-3-logo-sidebar-padding-top'] = ! empty($header_3_options['header-3']['logo_sidebar_padding_top']) ? (int) $header_3_options['header-3']['logo_sidebar_padding_top'] . 'px' : '0px';
$alone_scss_variables['header-3-logo-sidebar-padding-bottom'] = ! empty($header_3_options['header-3']['logo_sidebar_padding_bottom']) ? (int) $header_3_options['header-3']['logo_sidebar_padding_bottom'] . 'px' : '0px';
$alone_scss_variables['header-3-logo-sidebar-bg-color'] = ! empty($header_3_options['header-3']['logo_sidebar_bg_color']) ? $header_3_options['header-3']['logo_sidebar_bg_color'] : '#ffffff';
$alone_scss_variables['header-3-logo-sidebar-shadow-color'] = ! empty($header_3_options['header-3']['logo_sidebar_shadow_effect']['yes']['shadow_color']) ? $header_3_options['header-3']['logo_sidebar_shadow_effect']['yes']['shadow_color'] : '#222222';

// header menu
if ( isset( $alone_typography_settings['header_menu'] ) ) {
	$font_styles = alone_get_font_array( $alone_typography_settings['header_menu'], $alone_color_settings );
  $alone_scss_variables['fw-menu-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$alone_scss_variables['fw-top-menu-color'] = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#222';
	$alone_scss_variables['fw-menu-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-menu-font-weight'] = $font_styles['font-weight'];
}

// header menu hover color
if ( isset( $alone_typography_settings['header_menu_hover']['id'] ) && $alone_typography_settings['header_menu_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_typography_settings['header_menu_hover']['color'] ) ) {
		$alone_scss_variables['fw-top-menu-line-color'] = $alone_scss_variables['fw-top-menu-item-color-hover'] = $alone_typography_settings['header_menu_hover']['color'];
	}
} elseif ( isset( $alone_typography_settings['header_menu_hover']['id'] ) ) {
	$alone_scss_variables['fw-top-menu-line-color'] = $alone_scss_variables['fw-top-menu-item-color-hover'] = $alone_color_settings[ $alone_typography_settings['header_menu_hover']['id'] ];
}

if ( isset( $alone_typography_settings['header_menu_items_spacing'] ) ) {
	$alone_scss_variables['fw-menu-item-margin-left'] = $alone_typography_settings['header_menu_items_spacing'] . 'px';
}

// header sub menu
if ( isset( $alone_typography_settings['header_sub_menu'] ) ) {
	$font_styles                                  = alone_get_font_array( $alone_typography_settings['header_sub_menu'], $alone_color_settings );
	$alone_scss_variables['fw-sub-menu-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-sub-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-sub-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-sub-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$alone_scss_variables['fw-sub-menu-color'] = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#333333';
	$alone_scss_variables['fw-sub-menu-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-sub-menu-font-weight'] = $font_styles['font-weight'];
}

// header sub menu hover color
if ( isset( $alone_typography_settings['header_sub_menu_hover']['id'] ) && $alone_typography_settings['header_sub_menu_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_typography_settings['header_sub_menu_hover']['color'] ) ) {
		$alone_scss_variables['fw-sub-menu-item-color-hover'] = $alone_typography_settings['header_sub_menu_hover']['color'];
	}
} elseif ( isset( $alone_typography_settings['header_sub_menu_hover']['id'] ) ) {
	$alone_scss_variables['fw-sub-menu-item-color-hover'] = $alone_color_settings[ $alone_typography_settings['header_sub_menu_hover']['id'] ];
}

// header sub menu item spacing
$alone_scss_variables['fw-sub-menu-item-padding-top-bottom'] = isset( $alone_typography_settings['header_sub_menu_items_spacing'] ) ? $alone_typography_settings['header_sub_menu_items_spacing'] . 'px' : '0px';

// echo '<pre>'; print_r($alone_header_settings); echo '</pre>';
// header absolute
if(isset($alone_header_settings['enable_absolute_header'])) {
	$alone_scss_variables['fw-header-absolute-opacity'] = $alone_header_settings['enable_absolute_header']['fw-absolute-header']['absolute_opacity'] . '%';
}

// header sticky
if(isset($alone_header_settings['enable_sticky_header'])) {
  // sticky padding
  $alone_scss_variables['fw-header-sticky-padding-top'] = ! empty($alone_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_top']) ? $alone_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_top'].'px' : '0px';
  $alone_scss_variables['fw-header-sticky-padding-bottom'] = ! empty($alone_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_bottom']) ? $alone_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_bottom'].'px' : '0px';

  // sticky header color
	$alone_header_color_sticky = $alone_header_settings['enable_sticky_header']['fw-sticky-header']['background_color'];
	if($alone_header_color_sticky['id'] == 'fw-custom') {
		$alone_scss_variables['fw-header-sticky-color'] = $alone_header_color_sticky['color'];
	}else {
		$alone_scss_variables['fw-header-sticky-color'] = $alone_color_settings[ $alone_header_color_sticky['id'] ];
	}

	// opacity
	$alone_scss_variables['fw-header-sticky-opacity'] = $alone_header_settings['enable_sticky_header']['fw-sticky-header']['sticky_opacity'] . '%';

	// sticky header menu color lvl 1
	$alone_header_sticky_menu_item_color = $alone_header_settings['enable_sticky_header']['fw-sticky-header']['menu_item_color'];
	if($alone_header_sticky_menu_item_color['id'] == 'fw-custom') {
		$alone_scss_variables['fw-header-sticky-menu-item-color-lvl1'] = $alone_header_sticky_menu_item_color['color'];
	}else {
		$alone_scss_variables['fw-header-sticky-menu-item-color-lvl1'] = $alone_color_settings[ $alone_header_sticky_menu_item_color['id'] ];
	}

	// sticky header menu hover color lvl 1
	$alone_header_sticky_menu_item_color_hover = $alone_header_settings['enable_sticky_header']['fw-sticky-header']['menu_item_color_hover'];
	if($alone_header_sticky_menu_item_color_hover['id'] == 'fw-custom') {
		$alone_scss_variables['fw-header-sticky-menu-item-hover-color-lvl1'] = $alone_header_sticky_menu_item_color_hover['color'];
	}else {
		$alone_scss_variables['fw-header-sticky-menu-item-hover-color-lvl1'] = $alone_color_settings[ $alone_header_sticky_menu_item_color_hover['id'] ];
	}
}

// title bar title typography
// echo '<pre>'; print_r($alone_title_bar_settings['title_bar_title_typography']); echo '</pre>';
if ( isset( $alone_title_bar_settings['title_bar_title_typography'] ) ) {
	$font_styles = alone_get_font_array( $alone_title_bar_settings['title_bar_title_typography']['typography'], $alone_color_settings );

	$alone_scss_variables['fw-title-bar-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-title-bar-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-title-bar-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-title-bar-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-title-bar-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-title-bar-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-title-bar-font-weight'] = $font_styles['font-weight'];
}

// title bar description typography
if ( isset( $alone_title_bar_settings['title_bar_description_typography'] ) ) {
	$font_styles = alone_get_font_array( $alone_title_bar_settings['title_bar_description_typography']['typography'], $alone_color_settings );
	$alone_scss_variables['fw-title-bar-description-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-title-bar-description-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-title-bar-description-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-title-bar-description-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-title-bar-description-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-title-bar-description-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-title-bar-description-font-weight'] = $font_styles['font-weight'];
}

// breadcrumbs_typography
if ( isset( $alone_title_bar_settings['breadcrumbs_typography'] ) ) {
	$font_styles = alone_get_font_array( $alone_title_bar_settings['breadcrumbs_typography']['typography'], $alone_color_settings );
  // print_r($font_styles);die;
  $alone_scss_variables['breadcrumbs-typographyfont-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['breadcrumbs-typographyfont-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['breadcrumbs-typographyfont-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['breadcrumbs-typographyfont-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['breadcrumbs-typographyfont-color'] = $font_styles['color'] : '#333';
	$alone_scss_variables['breadcrumbs-typographyfont-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['breadcrumbs-typographyfont-font-weight'] = $font_styles['font-weight'];

  $alone_scss_variables['breadcrumbs-typographyfont-text-uppercase'] = (isset($alone_title_bar_settings['breadcrumbs_typography']['text_uppercase']) && $alone_title_bar_settings['breadcrumbs_typography']['text_uppercase'] == 'yes' ) ? 'uppercase' : 'initial';
}

// footer copyright
if ( isset( $alone_typography_settings['footer_copyright_typography'] ) ) {
	$font_styles                                       = alone_get_font_array( $alone_typography_settings['footer_copyright_typography'], $alone_color_settings );
	$alone_scss_variables['fw-copyright-font-family']    = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-copyright-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-copyright-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-copyright-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-copyright-text-color'] = $font_styles['color'] : '';
	$alone_scss_variables['fw-copyright-font-style']  = $font_styles['font-style'];
	$alone_scss_variables['fw-copyright-font-weight'] = $font_styles['font-weight'];
}

// transform header mobi
$alone_scss_variables['max-width-transform-header-mobi'] = isset($alone_header_settings['transform_header_mobi']) ? $alone_header_settings['transform_header_mobi'] . 'px' : '996px' ;

// header bg color
if ( isset( $alone_header_settings['header_bg_color']['id'] ) && $alone_header_settings['header_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_header_settings['header_bg_color']['color'] ) ) {
		$alone_scss_variables['fw-menu-bg'] = $alone_header_settings['header_bg_color']['color'];
	}
} elseif ( isset( $alone_header_settings['header_bg_color']['id'] ) ) {
	$alone_scss_variables['fw-menu-bg'] = $alone_color_settings[ $alone_header_settings['header_bg_color']['id'] ];
}

// header menu color
if ( isset( $alone_header_settings['menu_color']['id'] ) && $alone_header_settings['menu_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_header_settings['menu_color']['color'] ) ) {
		$alone_scss_variables['fw-menu-color'] = $alone_header_settings['menu_color']['color'];
	}
} elseif ( isset( $alone_header_settings['menu_color']['id'] ) ) {
	$alone_scss_variables['fw-menu-color'] = $alone_color_settings[ $alone_header_settings['menu_color']['id'] ];
}

// header dropdown bg color
if ( isset( $alone_header_settings['dropdown_bg_color']['id'] ) && $alone_header_settings['dropdown_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_header_settings['dropdown_bg_color']['color'] ) ) {
		$alone_scss_variables['fw-dropdown-bg-color'] = $alone_header_settings['dropdown_bg_color']['color'];
	}
} elseif ( isset( $alone_header_settings['dropdown_bg_color']['id'] ) ) {
	$alone_scss_variables['fw-dropdown-bg-color'] = $alone_color_settings[ $alone_header_settings['dropdown_bg_color']['id'] ];
}

// header dropdown links color
if ( isset( $alone_header_settings['dropdown_links_color']['id'] ) && $alone_header_settings['dropdown_links_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_header_settings['dropdown_links_color']['color'] ) ) {
		$alone_scss_variables['fw-dropdown-text-color'] = $alone_header_settings['dropdown_links_color']['color'];
	}
} elseif ( isset( $alone_header_settings['dropdown_links_color']['id'] ) ) {
	$alone_scss_variables['fw-dropdown-text-color'] = $alone_color_settings[ $alone_header_settings['dropdown_links_color']['id'] ];
}

// header top bar
if ( $alone_header_settings['enable_header_top_bar']['selected_value'] == 'yes' ) {
	// header top bar color
	if ( isset( $alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ) && $alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['color'] ) ) {
			$alone_scss_variables['fw-top-bar-bg'] = $alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['color'];
		}
	} elseif ( isset( $alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ) ) {
		$alone_scss_variables['fw-top-bar-bg'] = $alone_color_settings[ $alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ];
	}
}
// print_r($alone_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']);

// if ( $alone_footer_settings['show_footer_widgets']['selected_value'] == 'yes' ) {
	if ( isset( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] ) && $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] != 'none' ) {
		if ( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'color' && isset($alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id']) && $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['color'] ) ) {
				$alone_scss_variables['fw-footer-widgets-bg'] = $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['color'];
			} else {
				// for empty color
				$alone_scss_variables['fw-footer-widgets-bg'] = 'transparent';
			}
		} elseif ( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'color' && isset($alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id']) ) {
			$alone_scss_variables['fw-footer-widgets-bg'] = $alone_color_settings[ $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ];
		} elseif ( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'image' ) {
			if ( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['id'] == 'fw-custom' ) {
				if ( ! empty( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['color'] ) ) {
					$alone_scss_variables['fw-footer-widgets-bg'] = $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['color'];
				} else {
					// for empty color
					$alone_scss_variables['fw-footer-widgets-bg'] = 'transparent';
				}
			} else {
				$alone_scss_variables['fw-footer-widgets-bg'] = $alone_color_settings[ $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['id'] ];
			}

			if ( ! empty( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data'] ) ) {
				$temp_style = '';
                if( isset($alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon']) && !empty($alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon']) ) {
                    $alone_scss_variables['fw-footer-widget-bg-image'] = '"'.alone_change_original_link_with_cdn( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ).'"';
                }
				$alone_scss_variables['fw-footer-widget-bg-repeat'] = $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['repeat'];
				$temp_style .= ' ' . $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_position_x'];
				$temp_style .= ' ' . $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_position_y'];
				$alone_scss_variables['fw-footer-widget-bg-position'] = $temp_style;
				$alone_scss_variables['fw-footer-widget-bg-size']     = $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_size'];
			}
		}
	} else {
		// background none
		$alone_scss_variables['fw-footer-widgets-bg'] = 'transparent';
	}

	// titles color
	if ( isset( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ) && $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['color'] ) ) {
			$alone_scss_variables['fw-footer-widgets-title'] = $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['color'];
		}
	} elseif ( isset( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ) ) {
		$alone_scss_variables['fw-footer-widgets-title'] = $alone_color_settings[ $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ];
	}

	// text color
	if ( isset( $alone_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ) && $alone_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $alone_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['color'] ) ) {
			$alone_scss_variables['fw-footer-widgets-text-color'] = $alone_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['color'];
		}
	} elseif ( isset( $alone_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ) ) {
		$alone_scss_variables['fw-footer-widgets-text-color'] = $alone_color_settings[ $alone_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ];
	}
// }


// footer
if ( isset( $alone_footer_settings['footer_bg_color']['id'] ) && $alone_footer_settings['footer_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $alone_footer_settings['footer_bg_color']['color'] ) ) {
		$alone_scss_variables['fw-footer-bar-bg'] = $alone_footer_settings['footer_bg_color']['color'];
	}
} elseif ( isset( $alone_footer_settings['footer_bg_color']['id'] ) ) {
	$alone_scss_variables['fw-footer-bar-bg'] = $alone_color_settings[ $alone_footer_settings['footer_bg_color']['id'] ];
}

// footer padding top & bottom
if ( isset( $alone_footer_settings['copyright_top'] ) && $alone_footer_settings['copyright_top'] != '' ) {
	$alone_scss_variables['fw-footer-bar-padding-top'] = (int) $alone_footer_settings['copyright_top'] . 'px';
}
if ( isset( $alone_footer_settings['copyright_bottom'] ) && $alone_footer_settings['copyright_bottom'] != '' ) {
	$alone_scss_variables['fw-footer-bar-padding-bot'] = (int) $alone_footer_settings['copyright_bottom'] . 'px';
}

// logo width and height
if ( isset( $alone_logo_settings['logo']['image']['image_logo']['attachment_id'] ) && $alone_logo_settings['logo']['image']['image_logo']['attachment_id'] != '' ) {
	$logo_image = wp_get_attachment_image_src( $alone_logo_settings['logo']['image']['image_logo']['attachment_id'], 'full' );
	if ( isset( $logo_image['1'] ) && isset( $logo_image['2'] ) ) {
		$alone_scss_variables['fw-menu-logo-width']  = $logo_image['1'].'px';
		$alone_scss_variables['fw-menu-logo-height'] = $logo_image['2'].'px';
	}
}

// logo sticky width and height
if ( isset( $alone_header_settings['enable_sticky_header']['fw-sticky-header']['image_logo_sticky']['attachment_id'] ) && $alone_header_settings['enable_sticky_header']['fw-sticky-header']['image_logo_sticky']['attachment_id'] != '' ) {
	$logo_image = wp_get_attachment_image_src( $alone_header_settings['enable_sticky_header']['fw-sticky-header']['image_logo_sticky']['attachment_id'], 'full' );
	if ( isset( $logo_image['1'] ) && isset( $logo_image['2'] ) ) {
		$alone_scss_variables['fw-menu-logo-sticky-width']  = $logo_image['1'].'px';
		$alone_scss_variables['fw-menu-logo-sticky-height'] = $logo_image['2'].'px';
	}
}

// text logo options
if ( $alone_logo_settings['logo']['selected_value'] == 'text' ) {
	// logo title font
	if ( isset( $alone_logo_settings['logo']['text']['logo_title_font'] ) ) {
		$font_styles                                        = alone_get_font_array( $alone_logo_settings['logo']['text']['logo_title_font'], $alone_color_settings );
		$alone_scss_variables['fw-logo-title-font-family']    = $font_styles['font-family'];
		( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-logo-title-font-size'] = $font_styles['font-size'] : '';
		( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-logo-title-line-height'] = $font_styles['line-height'] : '';
		( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-logo-title-letter-spacing'] = $font_styles['letter-spacing'] : '';
		! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-logo-title-color'] = $font_styles['color'] : '';
		$alone_scss_variables['fw-logo-title-font-style']  = $font_styles['font-style'];
		$alone_scss_variables['fw-logo-title-font-weight'] = $font_styles['font-weight'];
	}

	// logo subtitle font
	if ( isset( $alone_logo_settings['logo']['text']['logo_subtitle_font'] ) ) {
		$font_styles                                           = alone_get_font_array( $alone_logo_settings['logo']['text']['logo_subtitle_font'], $alone_color_settings );
		$alone_scss_variables['fw-logo-subtitle-font-family']    = $font_styles['font-family'];
		( $font_styles['font-size'] != 'px') ? $alone_scss_variables['fw-logo-subtitle-font-size'] = $font_styles['font-size'] : '';
		( $font_styles['line-height'] != 'px') ? $alone_scss_variables['fw-logo-subtitle-line-height'] = $font_styles['line-height'] : '';
		( $font_styles['letter-spacing'] != 'px') ? $alone_scss_variables['fw-logo-subtitle-letter-spacing'] = $font_styles['letter-spacing'] : '';
		! empty( $font_styles['color'] ) ? $alone_scss_variables['fw-logo-subtitle-color'] = $font_styles['color'] : '';
		$alone_scss_variables['fw-logo-subtitle-font-style']  = $font_styles['font-style'];
		$alone_scss_variables['fw-logo-subtitle-font-weight'] = $font_styles['font-weight'];
	}
}

// scroll to top button
if( isset($alone_customizer_option['scroll_to_top_styling']) ) {
	$color = alone_get_color_palette_color_and_class( $alone_customizer_option['scroll_to_top_styling']['color'], array('return_color' => true ) );
	if( !empty( $color['color'] ) ) $alone_scss_variables['fw-scroll-to-top-color'] = $color['color'];
}

// color
if ( isset( $alone_color_settings['color_1'] ) && $alone_color_settings['color_1'] != '' ) {
	$alone_scss_variables['theme-color-1'] = $alone_color_settings['color_1'];
}
if ( isset( $alone_color_settings['color_2'] ) && $alone_color_settings['color_2'] != '' ) {
	$alone_scss_variables['theme-color-2'] = $alone_color_settings['color_2'];
}
if ( isset( $alone_color_settings['color_3'] ) && $alone_color_settings['color_3'] != '' ) {
	$alone_scss_variables['theme-color-3'] = $alone_color_settings['color_3'];
}
if ( isset( $alone_color_settings['color_4'] ) && $alone_color_settings['color_4'] != '' ) {
	$alone_scss_variables['theme-color-4'] = $alone_color_settings['color_4'];
}
if ( isset( $alone_color_settings['color_5'] ) && $alone_color_settings['color_5'] != '' ) {
	$alone_scss_variables['theme-color-5'] = $alone_color_settings['color_5'];
}

// $alone_scss_content = alone_scss_variables_handle($alone_scss_variables);

/**
 * Scss handle
 */
// alone_scss_handle($alone_scss_content);
