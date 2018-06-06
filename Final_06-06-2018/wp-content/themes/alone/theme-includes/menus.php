<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * Register menus
 */
$alone_menu_locations = array(
	'primary'   => esc_html__( 'Top Primary Menu', 'alone' ),
	'secondary' => esc_html__( 'Top Secondary Menu', 'alone' ),
	'mobi_menu'    => esc_html__( 'Mobi Menu', 'alone' ),
);

/**
 * This theme uses wp_nav_menu() in 3 locations.
 */
register_nav_menus( $alone_menu_locations );

global $alone_menus;
$alone_menus = array(
	'primary'   => array(
		'depth'           => 4,
		'container'       => 'nav',
		'container_id'    => 'bt-menu-primary',
		'container_class' => 'bt-site-navigation primary-navigation',
		'menu_class'      => 'bt-nav-menu',
		'theme_location'  => 'primary',
		'fallback_cb'     => 'bt_theme_select_menu_message',
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
	'secondary' => array(
		'depth'           => 4,
		'container'       => 'nav',
		'container_id'    => 'bt-menu-secondary',
		'container_class' => 'bt-site-navigation secondary-navigation',
		'menu_class'      => 'bt-nav-menu',
		'theme_location'  => 'secondary',
		'fallback_cb'     => 'bt_theme_select_menu_message_secondary',
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
	'mobi_menu' => array(
		'depth'           => 4,
		'container'       => 'nav',
		'container_id'    => 'bt-menu-mobi-menu',
		'container_class' => 'bt-site-navigation mobi-menu-navigation',
		'menu_class'      => 'bt-nav-menu',
		'theme_location'  => 'mobi_menu',
		'fallback_cb'     => 'bt_theme_select_menu_message_mobi_menu',
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
);

/* START - Overdide $alone_menus use $_GET */
# 1. Primary menu
if(isset($_GET['theme_custom_primary_menu']) && ! empty($_GET['theme_custom_primary_menu'])) {
  $alone_menus['primary']['menu'] = $_GET['theme_custom_primary_menu'];
}

# 2. Secondary menu
if(isset($_GET['theme_custom_secondary_menu']) && ! empty($_GET['theme_custom_secondary_menu'])) {
  $alone_menus['secondary']['menu'] = $_GET['theme_custom_secondary_menu'];
}
/* END - Overdide $alone_menus use $_GET */

if ( ! function_exists( 'fw_theme_nav_menu' ) ) :
	/**
	 * Display the nav menu
	 */
	function fw_theme_nav_menu( $menu_type ) {
		global $alone_menus;

		if ( ! isset( $alone_menus[ $menu_type ] ) ) {
			return;
		}
		/**
		 * if w3 total cache is active, add google_ad_ comment after li's, to fix problem with li justify
		 * add this 'google_ad_' in w3 admin confing -> minify -> HTML & XML -> Ignored comment stems:
		 */
		if ( defined( 'W3TC' ) ) {
			$alone_menus[ $menu_type ]['echo'] = false;
			$alone_html_menu                   = wp_nav_menu( $alone_menus[ $menu_type ] );
			echo str_ireplace( '</li>', '</li> <!-- google_ad_ -->', $alone_html_menu );
		} else {
			wp_nav_menu( $alone_menus[ $menu_type ] );
		}

	}
endif;


if ( ! function_exists( 'bt_theme_select_menu_message' ) ) :
	/**
	 * Display the select menu message
	 */
	function bt_theme_select_menu_message() {
		echo '<div class="topmenu"><p class="bt-primary-menu-message">' . esc_html__( 'Please go to the', 'alone' ) . ' <a href="' . admin_url( 'nav-menus.php' ) . '" target="_blank">' . esc_html__( 'Menu', 'alone' ) . '</a> ' . esc_html__( 'section, create a  menu and then select the newly created menu from the Theme Locations box from the left.', 'alone' ) . '</p></div>';
	}
endif;


if ( ! function_exists( 'fw_theme_select_menu_message_secondary' ) ) :
	/**
	 * Display the select menu message for secondary menu
	 */
	function bt_theme_select_menu_message_secondary() {
		echo '<div class="topmenu"><p class="bt-secondary-menu-message">' . esc_html__( 'Please select a Top Secondary Menu from the', 'alone' ) . ' ' . ' <a href="' . admin_url( 'nav-menus.php?action=locations' ) . '" target="_blank">' . esc_html__( 'Menu Locations', 'alone' ) . '</a>' . ' ' . esc_html__( 'tab in order to make your header display as intended.', 'alone' ) . '</p></div>';
	}
endif;

if( ! function_exists('bt_theme_select_menu_message_mobi_menu') ) :
	function bt_theme_select_menu_message_mobi_menu() {
		echo '<div class="topmenu"><p class="bt-mobi-menu-message">' . esc_html__( 'Please select a Mobi Menu from the', 'alone' ) . ' ' . ' <a href="' . admin_url( 'nav-menus.php?action=locations' ) . '" target="_blank">' . esc_html__( 'Menu Locations', 'alone' ) . '</a>' . ' ' . esc_html__( 'tab in order to make your header display as intended.', 'alone' ) . '</p></div>';
	}
endif;
