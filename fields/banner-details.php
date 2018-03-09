<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_58f7ba1d9ef3c',
	'title' => 'Banner',
	'fields' => array(
		array(
			'key' => 'field_5911e10f596da',
			'label' => 'Title',
			'name' => 'bannertitle',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5911e11c596db',
			'label' => 'Description',
			'name' => 'bannerdescription',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'new_lines' => 'wpautop',
			'maxlength' => '',
			'placeholder' => '',
			'rows' => 4,
		),
		array(
			'key' => 'field_58f7ba36e089a',
			'label' => 'Image',
			'name' => 'bannerimage',
			'type' => 'image_crop',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'crop_type' => 'min',
			'target_size' => 'custom',
			'width' => 1024,
			'height' => 210,
			'preview_size' => 'medium',
			'force_crop' => 'no',
			'save_in_media_library' => 'yes',
			'retina_mode' => 'no',
			'save_format' => 'object',
			'library' => 'all',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'page_template',
				'operator' => '!=',
				'value' => AG_EXTRES_TEMPLATE_PATH . '/home.php',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'research-project',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
