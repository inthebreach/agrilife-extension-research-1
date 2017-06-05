<?php

namespace AgriLife\ExtensionResearch;

class CustomFields {

    public function __construct() {

        // Load ACF fields
        if ( class_exists( 'Acf' ) ) {
            require_once(AG_EXTRES_DIR_PATH . 'fields/home-top-details.php');
            require_once(AG_EXTRES_DIR_PATH . 'fields/home-programs-details.php');
            require_once(AG_EXTRES_DIR_PATH . 'fields/banner-details.php');
        }

        // Add ACF fields to Flexible Columns field group
        add_filter('acf/load_field/key=field_5772ab6603192', array( $this, 'aer_acf_load_extras' ) );

    }


    /**
     * Adds fields to the Flexible Columns ACF field group
     * @param  array $field The target field group
     * @return array        The target field group
     */
    public function aer_acf_load_extras($field) {

        // Prevent this filter from running while editing exportable ACF field group data
        if(function_exists('get_current_screen')){
            $screen = get_current_screen();
            if(!is_null($screen) && $screen->post_type == 'acf-field-group')
                return $field;
        }

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
                break;

            }

        }

        return $field;

    }

}
