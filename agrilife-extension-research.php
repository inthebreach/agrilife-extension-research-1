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
}

// Add Publication ACF fields to Flexible Columns field group
add_filter('acf/load_field/key=field_5772ab6603192', 'aer_acf_load_publications');
function aer_acf_load_publications($field) {

    $json = file_get_contents(AG_EXTRES_DIR_PATH . 'fields/publications-details.json');
    $new_field = json_decode( $json, true );
    $subfield = $new_field[0]['fields'][0]['layouts'][0];

    $field['layouts'][] = $subfield;

    return $field;

}
