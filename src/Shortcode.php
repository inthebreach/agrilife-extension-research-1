<?php
namespace AgriLife\ExtensionResearch;
use \ALP_Query;

/**
 * Creates the shortcode to list people. Can be filtered by Type taxonomy
 */

class Shortcode {

	public function __construct() {

		add_action( 'init', array( $this, 'init' ), 20 );

	}

	public function init(){

		remove_shortcode( 'people_listing' );
		add_shortcode( 'people_listing', array( $this, 'create_shortcode' ) );

	}

	/**
	 * Renders the 'people_listing' shortcode
	 * @param  string $atts The shortcode attributes
	 * @return string       The shortcode output
	 */
	public function create_shortcode( $atts ) {

		extract( shortcode_atts( array(
				'type'   => false,
				'lastnamefirst' => false,
				'website' => 'yes'
			),
			$atts ));

		$people = ALP_Query::get_people( $type );

		// The website parameter is passed as a string. Convert it to boolean.
		$website = $website === 'yes' ? true : false;

		// The lastnamefirst parameter is passed as a string. Convert it to boolean.
		$lastnamefirst = $lastnamefirst === 'true' ? true : false;

		ob_start();

		require AG_EXTRES_TEMPLATE_PATH . '/people-list.php';

		$output = ob_get_contents();
		ob_clean();

		return $output;

	}

}
