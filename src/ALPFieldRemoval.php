<?php
namespace AgriLife\ExtensionResearch;

/**
 * Creates the shortcode to list people. Can be filtered by Type taxonomy
 */

class ALPFieldRemoval {

	public function __construct() {

		// Add ACF fields to Flexible Columns field group
		add_filter('acf/load_field/key=field_52540abf41c38', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_5272c2754c8fa', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_52540ba541c3c', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_52540bf641c3e', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_52541865a0bba', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_5254180ea0bb8', array( $this, 'remove_field' ) );

	}

	/**
	 * Remove fields from the AgriLife People post type's ACF field group
	 * @param  array $field The target field group
	 * @return array        The target field group
	 */
	public function remove_field($field) {

	  return array();

	}

}
