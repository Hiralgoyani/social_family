<?php if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}
/**
 * Include static files: javascript and css
 */

$alone_template_directory = get_template_directory_uri();
if (defined('FW')) {
	$alone_version = fw()->theme->manifest->get_version();
} else {
	$alone_version = '1.0';
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Load jquery
// wp_enqueue_script( 'jquery' );

// jquery ui resizable
wp_enqueue_script( 'jquery-ui-resizable' );

if (is_singular() && comments_open() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}

// Load bootstrap Css
wp_enqueue_style(
	'bootstrap',
	 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
	array(),
	$alone_version
);

// Load bootstrap script
wp_enqueue_script(
	'bootstrap',
	$alone_template_directory . '/assets/bootstrap/js/bootstrap.js',
	array( 'jquery' ),
	$alone_version,
	true
);

// Load font-awesome stylesheet.
wp_enqueue_style(
	'font-awesome',
	$alone_template_directory . '/assets/css/font-awesome.css',
	array(),
	$alone_version
);

// Load ionicons stylesheet.
wp_enqueue_style(
	'ionicons',
	$alone_template_directory . '/assets/fonts/ionicons/css/ionicons.min.css',
	array(),
	$alone_version
);

wp_enqueue_script(
	'lazysizes',
	$alone_template_directory . '/assets/js/lazysizes.min.js',
	array('jquery'),
	$alone_version,
	true
);

// Load stellar (parallax session)
wp_enqueue_script(
	'stellar',
	$alone_template_directory . '/assets/js/jquery.stellar.min.js',
	array('jquery'),
	$alone_version,
	true
);

// isotope
wp_enqueue_script(
	'isotope',
	$alone_template_directory . '/assets/js/isotope.pkgd.min.js',
	array(),
	$alone_version,
	true
);

// mousewheel
wp_enqueue_script(
	'mousewheel',
	$alone_template_directory . '/assets/js/jquery.mousewheel.min.js',
	array('jquery'),
	$alone_version,
	true
);

// vimeo player api
wp_enqueue_script(
	'froogaloop2',
	$alone_template_directory . '/assets/js/froogaloop2.min.js',
	array(),
	$alone_version,
	true
);

// lightGallery
wp_enqueue_style(
	'lightGallery',
	$alone_template_directory . '/assets/lightGallery/css/lightgallery.min.css',
	array(),
	$alone_version
);

wp_enqueue_script(
	'lightGallery',
	$alone_template_directory . '/assets/lightGallery/js/lightgallery.min.js',
	array('jquery', 'mousewheel'),
	$alone_version,
	true
);

wp_enqueue_script(
	'lg-zoom',
	$alone_template_directory . '/assets/lightGallery/js/lg-zoom.min.js',
	array('lightGallery'),
	$alone_version,
	true
);

wp_enqueue_script(
	'lg-autoplay',
	$alone_template_directory . '/assets/lightGallery/js/lg-autoplay.min.js',
	array('lightGallery'),
	$alone_version,
	true
);

wp_enqueue_script(
	'lg-thumbnail',
	$alone_template_directory . '/assets/lightGallery/js/lg-thumbnail.min.js',
	array('lightGallery'),
	$alone_version,
	true
);

wp_enqueue_script(
	'lg-video',
	$alone_template_directory . '/assets/lightGallery/js/lg-video.min.js',
	array('lightGallery'),
	$alone_version,
	true
);

wp_enqueue_script(
	'jquery-plugin',
	$alone_template_directory . '/assets/jquery-countdown/jquery.plugin.min.js',
	array('jquery'),
	$alone_version
);
wp_enqueue_script(
	'jquery-countdown',
	$alone_template_directory . '/assets/jquery-countdown/jquery.countdown.min.js',
	array('jquery'),
	$alone_version
);

// owl.carousel 2.1
wp_enqueue_style(
	'owl.carousel',
	$alone_template_directory . '/assets/owl.carousel/assets/owl.carousel.min.css',
	array(),
	$alone_version
);

wp_enqueue_script(
	'owl.carousel',
	$alone_template_directory . '/assets/owl.carousel/owl.carousel.min.js',
	array('jquery'),
	$alone_version,
	true
);

/* tilt */
wp_enqueue_script(
	'tilt',
	$alone_template_directory . '/assets/js/tilt.jquery.min.js',
	array('jquery'),
	$alone_version,
	true
);

/* sweetalert */
wp_enqueue_style(
	'sweetalert',
	$alone_template_directory . '/assets/sweetalert/dist/sweetalert.css',
	array(),
	$alone_version
);
wp_enqueue_script(
	'sweetalert',
	$alone_template_directory . '/assets/sweetalert/dist/sweetalert.min.js',
	array('jquery'),
	$alone_version,
	true
);

//progressbar.min.js
wp_enqueue_script(
	'progressbarjs',
	$alone_template_directory . '/assets/js/progressbar.min.js',
	array('jquery'),
	$alone_version,
	true
);

// jquery.waypoints.js support jquery.counterup.min.js
wp_enqueue_script(
	'waypoints',
	$alone_template_directory . '/assets/js/jquery.waypoints.js',
	array('jquery'),
	$alone_version,
	true
);
// jquery.counterup.min.js
wp_enqueue_script(
	'counterup',
	$alone_template_directory . '/assets/js/jquery.counterup.min.js',
	array('jquery', 'waypoints'),
	$alone_version,
	true
);

// Load animate stylesheet.
wp_enqueue_style(
	'animate',
	$alone_template_directory . '/assets/css/animate.css',
	array(),
	$alone_version
);

// Load our main stylesheet.
wp_enqueue_style(
 'fw-theme-style',
 get_stylesheet_uri(),
 array(),
 $alone_version
);

add_editor_style();

// Load local font
wp_enqueue_style(
	'alone-local-font',
	$alone_template_directory . '/assets/fonts/local-font.css',
	array(),
	$alone_version
);

// Load theme stylesheet.
wp_enqueue_style(
	'alone-theme-style',
	$alone_template_directory . '/assets/css/alone.css',
	array(),
	$alone_version
);

// Load theme script
wp_enqueue_script(
	'alone-theme-script',
	$alone_template_directory . '/assets/js/theme-script.js',
	array( 'jquery' ),
	$alone_version,
	true
);

wp_localize_script('alone-theme-script', 'BtPhpVars', array(
	'ajax_url' => admin_url('admin-ajax.php'),
	'template_directory' => $alone_template_directory,
	'previous' => esc_html__('Previous', 'alone'),
	'next' => esc_html__('Next', 'alone'),
	'smartphone_animations' => function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_smartphone_animations', 'no') : 'no',
	'fail_form_error' => esc_html__('Sorry you are an error in ajax, please contact the administrator of the website', 'alone'),
));
