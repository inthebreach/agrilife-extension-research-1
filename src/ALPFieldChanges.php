<?php
namespace AgriLife\ExtensionResearch;

/**
 * Creates the shortcode to list people. Can be filtered by Type taxonomy
 */

class ALPFieldChanges {

	public function __construct() {

		// Add ACF fields to Flexible Columns field group
		add_filter('acf/load_field/key=field_52540abf41c38', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_5272c2754c8fa', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_52540ba541c3c', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_52540bf641c3e', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_52541865a0bba', array( $this, 'remove_field' ) );
		add_filter('acf/load_field/key=field_5254180ea0bb8', array( $this, 'remove_field' ) );

		// Add Agency taxonomy to People posts
		// Taxonomy labels
		$labels = array(
			'name' => __( 'Agency', 'agrilife' ),
			'singular_name' => __( 'Agency', 'agrilife' ),
			'search_items' => __( 'Search Agencies', 'agrilife' ),
			'all_items' => __( 'All Agencies', 'agrilife' ),
			'parent_item' => __( 'Parent Agency', 'agrilife' ),
			'parent_item_colon' => __( 'Parent Agency:', 'agrilife' ),
			'edit_item' => __( 'Edit Agency', 'agrilife' ),
			'update_item' => __( 'Update Agency', 'agrilife' ),
			'add_new_item' => __( 'Add New Agency', 'agrilife' ),
			'new_item_name' => __( 'New Agency Name', 'agrilife' ),
			'menu_name' => __( 'Agencies', 'agrilife' ),
		);

		// Taxonomy arguments
		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' ),
		);

		// Register the Agency taxonomy
		register_taxonomy( 'agency', 'people', $args );

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
