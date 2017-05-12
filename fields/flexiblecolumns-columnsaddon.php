<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5915ba7560b11',
	'title' => 'Flexible Columns - Columns Row Enhancement',
	'fields' => array (
		array (
			'multiple' => 0,
			'allow_null' => 0,
			'choices' => array (
				'summary' => 'Summaries',
				'full' => 'Full Content',
			),
			'default_value' => array (
				0 => 'full',
			),
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'return_format' => 'value',
			'key' => 'field_59107c430b640',
			'label' => 'Type',
			'name' => 'type',
			'type' => 'select',
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
			'multiple' => 0,
			'allow_null' => 0,
			'choices' => array (
				3 => '25% | 75%',
				4 => '33% | 67%',
				5 => '40% | 60%',
				6 => '50% | 50%',
				7 => '60% | 40%',
				8 => '67% | 33%',
				9 => '75% | 25%',
			),
			'default_value' => array (
				0 => '6',
			),
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'return_format' => 'value',
			'key' => 'field_59107510580c5',
			'label' => 'Width',
			'name' => 'column_widths',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_59107c430b640',
						'operator' => '==',
						'value' => 'full',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'default_value' => '',
			'delay' => 1,
			'key' => 'field_59107e0b7d745',
			'label' => 'First Column',
			'name' => 'column_one',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_59107c430b640',
						'operator' => '==',
						'value' => 'full',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'default_value' => '',
			'delay' => 1,
			'key' => 'field_59107eef9fa77',
			'label' => 'Second Column',
			'name' => 'column_two',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_59107c430b640',
						'operator' => '==',
						'value' => 'full',
					),
				),
			),
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
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'local' => 'php',
));

endif;
