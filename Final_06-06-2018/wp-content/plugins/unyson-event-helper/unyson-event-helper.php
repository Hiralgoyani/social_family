<?php
/**
 * @package Unyson Event Helper
 */
/*
Plugin Name: Unyson Event Helper
Plugin URI: http://plugin/bearsthemes.com/
Description: Plugin for bearsthemes
Version: 1.0.1
Author: Huynh
Author URI: #Huynh
License: GPLv2 or later
Text Domain: unyson-event-helper
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// if (defined('FW')) :
  define('UNYSON_EVENT_HELPER', true);
  define('UNYSON_EVENT_HELPER_DIR', plugin_dir_path( __FILE__ ));

  require_once( UNYSON_EVENT_HELPER_DIR . '/lib/PostStatusExtender.php' );
  require_once( UNYSON_EVENT_HELPER_DIR . '/lib/payment.php' );
  require_once( UNYSON_EVENT_HELPER_DIR . '/lib/Dompdf.php' );
  require_once( UNYSON_EVENT_HELPER_DIR . '/hooks.php' );
  // require_once( UNYSON_EVENT_HELPER_DIR . '/functions.php' );

  if(! function_exists('_unyson_event_helper_init')) :
    function _unyson_event_helper_init() {
      if(! defined('FW')) return;
      require_once( UNYSON_EVENT_HELPER_DIR . '/functions.php' );
    }
    add_action('init', '_unyson_event_helper_init');
  endif;

// endif;
