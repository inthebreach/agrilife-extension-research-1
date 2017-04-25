<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_58f7b7bd60267',
		'title' => 'Home - Top',
		'fields' => array (
			array (
				'default_value' => 0,
				'message' => '',
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
				'key' => 'field_58f7b80f68727',
				'label' => 'Show Page Title',
				'name' => 'show_page_title',
				'type' => 'true_false',
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
				'default_value' => 0,
				'message' => '',
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
				'key' => 'field_58f7b7c668725',
				'label' => 'Carousel Slider',
				'name' => 'show_slider',
				'type' => 'true_false',
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
				'default_value' => 0,
				'message' => '',
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
				'key' => 'field_58fe4ebe69315',
				'label' => 'Full Width',
				'name' => 'full_width',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_58f7b7c668725',
							'operator' => '==',
							'value' => '1',
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
				'post_type' => array (
					0 => 'soliloquy',
				),
				'taxonomy' => array (
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
				'key' => 'field_58f7b7f268726',
				'label' => 'Select Carousel Slider',
				'name' => 'select_carousel_slider',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_58f7b7c668725',
							'operator' => '==',
							'value' => '1',
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
					'value' => 'page',
				),
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => AG_EXTRES_TEMPLATE_PATH . '/home.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;
