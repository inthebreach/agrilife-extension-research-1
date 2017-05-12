<?php
/**
 * Plugin Name: AgriLife Extension Research
 * Plugin URI: https://github.com/AgriLife/agrilife-extension-research
 * Description: Functionality for AgriLife Extension Research sites using AgriFlex 3
 * Version: 1.0
 * Author: Zach Watkins
 * Author URI: http://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * License: GPL2+
 */

require 'vendor/autoload.php';

define( 'AG_EXTRES_DIRNAME', 'agrilife-extension-research' );
define( 'AG_EXTRES_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AG_EXTRES_DIR_FILE', __FILE__ );
define( 'AG_EXTRES_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AG_EXTRES_TEMPLATE_PATH', AG_EXTRES_DIR_PATH . 'view' );

$extension_required_dom = new \AgriLife\Extension\RequiredDOM();

$extension_asset = new \AgriLife\Extension\Asset();

$extension_templates = new \AgriLife\Extension\Templates();

$extension_widget_areas = new \AgriLife\Extension\WidgetAreas();

add_action( 'agrilife_core_init', function() {
  $extres_home_template = new \AgriLife\Core\PageTemplate();
  $extres_home_template->with_path( AG_EXTRES_TEMPLATE_PATH )->with_file( 'home' )->with_name( 'Home' );
  $extres_home_template->register();
});

if ( class_exists( 'Acf' ) ) {
  require_once(AG_EXTRES_DIR_PATH . 'fields/home-top-details.php');
  require_once(AG_EXTRES_DIR_PATH . 'fields/home-programs-details.php');
  require_once(AG_EXTRES_DIR_PATH . 'fields/banner-details.php');
  require_once(AG_EXTRES_DIR_PATH . 'fields/flexiblecolumns-columnsaddon.php');
}

// Add ACF fields to Flexible Columns field group
add_filter('acf/load_field/key=field_5772ab6603192', 'aer_acf_load_extras');
function aer_acf_load_extras($field) {

	// Add Publications row type
  $pub = file_get_contents(AG_EXTRES_DIR_PATH . 'fields/publications-details.json');
  $pub_field = json_decode( $pub, true );
  $pub_subfield = $pub_field[0]['fields'][0]['layouts'][0];

  $field['layouts'][] = $pub_subfield;

  // Add full content type to Columns row
  $fullcols = file_get_contents(AG_EXTRES_DIR_PATH . 'fields/flexiblecolumns-columnsaddon-details.json');
  $fullcols_field = json_decode( $fullcols, true );
  $fullcols_subfield = $fullcols_field[0]['fields'];

  // Fields to add to the Columns row type
	$columntype = $fullcols_subfield[0];
	$columnwidths = $fullcols_subfield[1];
	$columnone = $fullcols_subfield[2];
	$columntwo = $fullcols_subfield[3];

	// Conditional logic to add to some existing fields in the Columns row type
	$conditional_logic = $columnwidths['conditional_logic'];
	$conditional_logic[0][0]['operator'] = '!=';

  // Find the Columns field and insert the new fields
  foreach ($field['layouts'] as $key => $value) {

  	if($value['name'] == 'columns'){

  		// Add conditional logic to summary-only columns fields
  		foreach ($value['sub_fields'] as $subkey => $subvalue){

  			if( $subvalue['key'] != 'field_59108cfb935ff' ){

  				// This field should have conditional logic
  				$field['layouts'][$key]['sub_fields'][$subkey]['conditional_logic'] = $conditional_logic;

  			}

  		}

  		// Insert the column type field after the first field
  		array_splice(
  			$field['layouts'][$key]['sub_fields'], 1, 0, array( $columntype )
  		);

  		// Insert the column width field after the column type field
  		array_splice(
  			$field['layouts'][$key]['sub_fields'], 2, 0, array( $columnwidths )
  		);

  		// Insert the column content fields at the end
  		$field['layouts'][$key]['sub_fields'][] = $columnone;
  		$field['layouts'][$key]['sub_fields'][] = $columntwo;

  	// 	echo '<pre>';
			// print_r($field['layouts'][$key]);
			// echo '</pre>';
			break;

  	}

  }

  return $field;

}
