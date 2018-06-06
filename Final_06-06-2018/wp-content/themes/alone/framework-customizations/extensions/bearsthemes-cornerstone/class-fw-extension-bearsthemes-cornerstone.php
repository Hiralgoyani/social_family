<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Bearsthemes_Cornerstone extends FW_Extension {
  private $extension_path, $extension_url;

  /**
	 * @internal
	 */
	protected function _init() {
    $this->extension_path = get_template_directory() . '/framework-customizations/extensions/bearsthemes-cornerstone/';
    $this->extension_url = get_template_directory_uri() . '/framework-customizations/extensions/bearsthemes-cornerstone/';

    $this->add_filters();
		$this->add_actions();
  }

  /**
	 * @internal
	 */
  private function add_filters() {
		add_filter('cornerstone_icon_map', array($this, 'bearsthemes_extension_icon_map'));
	}

  /**
	 * @internal
	 */
  private function add_actions() {
		add_action('wp_enqueue_scripts_clean', array($this, 'bearsthemes_extension_admin_enqueue_scripts'));
    add_action('cornerstone_register_elements', array($this, 'bearsthemes_extension_register_elements'));
  }

	/**
	 * bearsthemes_extension_admin_enqueue_scripts
	 */
	public function bearsthemes_extension_admin_enqueue_scripts() {
		wp_enqueue_style( 'bearsthemes_cornerstone-styles', $this->extension_url . '/assets/css/bearsthemes-cornerstone.css', array(), '0.1.0' );
	}

  /**
   * bearsthemes_extension_register_elements
   */
  public function bearsthemes_extension_register_elements() {
		/* bears heading */
    cornerstone_register_element( 'Bears_Heading_Element', 'bears-heading-element', $this->extension_path . 'includes/bears-heading-element' );

		/* bears button */
    cornerstone_register_element( 'Bears_Button_Element', 'bears-button-element', $this->extension_path . 'includes/bears-button-element' );

		/* bears underline */
    cornerstone_register_element( 'Bears_Underline_Element', 'bears-underline-element', $this->extension_path . 'includes/bears-underline-element' );

		/* bears testimonal item */
    cornerstone_register_element( 'Bears_Testimonal_Item_Element', 'bears-testimonal-item-element', $this->extension_path . 'includes/bears-testimonal-item-element' );
		/* bears testimonal */
    cornerstone_register_element( 'Bears_Testimonals_Element', 'bears-testimonals-element', $this->extension_path . 'includes/bears-testimonals-element' );

		/* bears team item */
    cornerstone_register_element( 'Bears_Team_Item_Element', 'bears-team-item-element', $this->extension_path . 'includes/bears-team-item-element' );
		/* bears team */
    cornerstone_register_element( 'Bears_Team_Element', 'bears-team-element', $this->extension_path . 'includes/bears-team-element' );

		/* bears image item */
		cornerstone_register_element( 'Bears_Image_Item_Element', 'bears-image-item-element', $this->extension_path . 'includes/bears-image-item-element' );
		/* bears gallery */
    cornerstone_register_element( 'Bears_Gallery_Element', 'bears-gallery-element', $this->extension_path . 'includes/bears-gallery-element' );

		/* bears carousel item */
		cornerstone_register_element( 'Bears_Carousel_Item_Element', 'bears-carousel-item-element', $this->extension_path . 'includes/bears-carousel-item-element' );
		/* bears carousel */
    cornerstone_register_element( 'Bears_Carousel_Element', 'bears-carousel-element', $this->extension_path . 'includes/bears-carousel-element' );

		/* bears recent post */
		cornerstone_register_element( 'Bears_Recent_Post_Element', 'bears-recent-post-element', $this->extension_path . 'includes/bears-recent-post-element' );

		/* bears countdown */
    // cornerstone_register_element( 'Bears_Countdown_Element', 'bears-countdown-element', $this->extension_path . 'includes/bears-countdown-element' );

		/* check WooCommerce exist */
		if(class_exists('WooCommerce')) {
		  /* bears products */
			cornerstone_register_element( 'Bears_Products_Element', 'bears-products-element', $this->extension_path . 'includes/bears-products-element' );
		}

		/* check Portfolio exist */
		if (function_exists('fw_ext') && fw_ext('portfolio')) {
			/* bears portfolio */
			cornerstone_register_element( 'Bears_Portfolio_Element', 'bears-portfolio-element', $this->extension_path . 'includes/bears-portfolio-element' );
		}
	}

	/**
	 * bearsthemes_extension_icon_map
	 */
	public function bearsthemes_extension_icon_map() {
		$icon_map['bears-element'] = get_template_directory_uri() . '/assets/images/svg/Bearsthemes-logo.svg';
		return $icon_map;
	}
}
