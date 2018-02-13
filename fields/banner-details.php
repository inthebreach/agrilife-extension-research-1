<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58f7ba1d9ef3c',
	'title' => 'Banner',
	'fields' => array (
		array (
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'key' => 'field_5911e10f596da',
			'label' => 'Title',
			'name' => 'bannertitle',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => '',
			'new_lines' => 'wpautop',
			'maxlength' => '',
			'placeholder' => '',
			'rows' => 4,
			'key' => 'field_5911e11c596db',
			'label' => 'Description',
			'name' => 'bannerdescription',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'return_format' => 'array',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => 1024,
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'key' => 'field_58f7ba36e089a',
			'label' => 'Image',
			'name' => 'bannerimage',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array (
				'param' => 'page_template',
				'operator' => '!=',
				'value' => AG_EXTRES_TEMPLATE_PATH . '/home.php',
			),
		),
		array (
			array (
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
