<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
return array(
	/**
	 * Array for demos
	 */
	'demos' => array(
		'alone-ngo' => array(
      array(
        'name' => 'Ninja Forms',
        'slug' => 'ninja-forms',
      ),
      array(
        'name' => 'Visual Composer Templates Library',
        'slug' => 'vc-design-template-library',
      ),
      array(
        'name' => 'WooCommerce',
        'slug' => 'woocommerce',
      ),
    ),
    'alone-5' => array(
      array(
        'name' => 'Ninja Forms',
        'slug' => 'ninja-forms',
      ),
      array(
        'name' => 'Visual Composer Templates Library',
        'slug' => 'vc-design-template-library',
      ),
      array(
        'name' => 'WooCommerce',
        'slug' => 'woocommerce',
      ),
    ),
	),
	'plugins' =>
		array(
      array(
          'name'   => 'Visual Composer',
          'slug'   => 'js_composer',
          'source' => 'http://theme.bearsthemes.com/plugin_install/visual-composer.zip'
      ),
      array(
          'name'   => 'Revolution Slider',
          'slug'   => 'revslider',
          'source' => 'http://theme.bearsthemes.com/plugin_install/revslider.zip'
      ),
			array(
          'name'   => 'Give – Donation Plugin and Fundraising Platform',
          'slug'   => 'give',
      ),
			array(
          'name'   => 'Unyson Event Helper',
          'slug'   => 'unyson-event-helper',
          'source' => 'http://theme.bearsthemes.com/plugin_install/unyson-event-helper2.zip'
      ),
		),
	'theme_id'           => 'alone',
	'child_theme_source' => 'http://theme.bearsthemes.com/import_demo/alone/alone-child.zip',
	'has_demo_content' => true
);
