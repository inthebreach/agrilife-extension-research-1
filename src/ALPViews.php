<?php
namespace AgriLife\ExtensionResearch;

/**
 * Creates the shortcode to list people. Can be filtered by Type taxonomy
 */

class ALPViews {

	public function __construct() {

		add_filter( 'archive_template', array( $this, 'get_archive_template' ), 11 );
		add_filter( 'search_template', array( $this, 'get_search_template' ), 11 );
		add_filter( 'single_template', array( $this, 'get_single_template' ), 11 );
		add_filter( 'taxonomy_template', array( $this, 'get_types_template' ), 11 );
	}

	/**
	 * Shows the archive template when needed
	 * @param  string $archive_template The default archive template
	 * @return string                   The correct archive template
	 */
	public function get_archive_template( $archive_template ) {

		global $post;

		if ( is_post_type_archive( 'people' ) ) {
			$archive_template = AG_EXTRES_TEMPLATE_PATH . '/archive-people.php';
		}

		return $archive_template;

	}

	/**
	 * Shows the search template when needed
	 * @param  string $search_template The default search template
	 * @return string                  The correct search template
	 */
	public function get_search_template( $search_template ) {

		global $post;

		if ( get_query_var( 'post_type' ) == 'people' ) {
			$search_template = AG_EXTRES_TEMPLATE_PATH . '/search-people.php';
		}

		return $search_template;

	}

	/**
	 * Shows the single template when needed
	 * @param  string $single_template The default single template
	 * @return string                  The correct single template
	 */
	public function get_single_template( $single_template ) {

		global $post;

		if ( get_query_var( 'post_type' ) == 'people' ) {
			$single_template = AG_EXTRES_TEMPLATE_PATH . '/single-people.php';
		}

		return $single_template;

	}

	/**
	 * Shows the taxonomy archive when needed
	 * @param  string $types_template The default taxonomy archive
	 * @return string                 The correct taxonomy archive
	 */
	public function get_types_template( $types_template ) {

		global $post;

		if ( get_query_var( 'taxonomy' ) == 'types' ) {
			$types_template = AG_EXTRES_TEMPLATE_PATH . '/taxonomy-types-people.php';
		}

		return $types_template;

	}

}
