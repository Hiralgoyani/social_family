<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Custom_Js_Composer extends FW_Extension {

	/**
	 * @internal
	 */
	protected function _init() {

		$this->add_filters();
		$this->add_actions();
	}

	private function add_filters() {

	}

	private function add_actions() {

	}
}

if(class_exists('Vc_Manager')) :

endif;

if(class_exists('WPBakeryVisualComposerAbstract')) :
	class __VcShadowWPBakeryVisualComposerAbstract extends WPBakeryVisualComposerAbstract{
		//
	}

	global $__VcShadowWPBakeryVisualComposerAbstract;
	$__VcShadowWPBakeryVisualComposerAbstract = new __VcShadowWPBakeryVisualComposerAbstract;
endif;
