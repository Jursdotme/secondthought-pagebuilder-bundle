<?php
/*--------------------------------------------*
 * Widget fields
/*--------------------------------------------*/

  function widget_style_fields($fields) {
    $fields['center-content'] = array(
        'name'        => __('Center content', 'secondthought_pagebuilder_bundle'),
        'type'        => 'checkbox',
        'group'       => 'design',
        'description' => __('If enabled, the content of this widget will be centered horizontally.', 'secondthought_pagebuilder_bundle'),
        'priority'    => 11,
    );

    $fields['border-radius'] = array(
        'name'        => __('Border radius', 'secondthought_pagebuilder_bundle'),
        'type'        => 'measurement',
        'group'       => 'design',
        'description' => __('Add rounded corners to this widgets background.', 'secondthought_pagebuilder_bundle'),
        'priority'    => 5,
    );

    $fields['remove-outer-margin'] = array(
        'name'        => __('Remove outer margin', 'secondthought_pagebuilder_bundle'),
        'type'        => 'checkbox',
        'group'       => 'design',
        'description' => __('Remove margin for the side facing the window border.', 'secondthought_pagebuilder_bundle'),
        'priority'    => 11,
    );

    $fields['box-shadow'] = array(
			'name' => __('Background drop shadow', 'secondthought_pagebuilder_bundle'),
			'type' => 'select',
			'group' => 'design',
			'options' => array(
				'' => __('none', 'secondthought_pagebuilder_bundle'),
				'2dp' => __('2dp', 'secondthought_pagebuilder_bundle'),
        '3dp' => __('3dp', 'secondthought_pagebuilder_bundle'),
        '4dp' => __('4dp', 'secondthought_pagebuilder_bundle'),
        '6dp' => __('6dp', 'secondthought_pagebuilder_bundle'),
        '8dp' => __('8dp', 'secondthought_pagebuilder_bundle'),
        '16dp' => __('16dp', 'secondthought_pagebuilder_bundle'),
			),
			'description' => __('Add a drop shadow to this widget', 'secondthought_pagebuilder_bundle'),
			'priority' => 7,
		);

    // BACKGROUND OPACITY
    $fields['backgroundOpacity'] = array(
			'name' => __('Background color opacity', 'secondthought_pagebuilder_bundle'),
			'type' => 'text',
			'group' => 'design',
			'description' => __('Sets opacity on background color. Use this to give background images an overlay.', 'secondthought_pagebuilder_bundle'),
			'priority' => 11,
		);

    unset($fields['border_color']);

    return $fields;
  }

  add_filter( 'siteorigin_panels_widget_style_fields', 'widget_style_fields', 20);

// END Widget fields

/*--------------------------------------------*
 * Widget classes
/*--------------------------------------------*/

  function widget_style_attributes( $attributes, $args ) {
      if( !empty( $args['parallax'] ) ) {
          array_push($attributes['class'], 'parallax');
      }

      if( !empty( $args['center-content'] ) ) {
          array_push($attributes['class'], 'center-content');
      }

      if( !empty( $args['border-radius'] ) ) {
  			$attributes['style'] .= 'border-radius: ' . esc_attr($args['border-radius']) . ';';
  		}

      if( !empty( $args['remove-outer-margin'] ) ) {
          array_push($attributes['class'], 'remove-outer-margin');
      }

      if( !empty( $args['box-shadow'] ) ) {
          array_push($attributes['class'], 'mdl-shadow--'.esc_attr($args['box-shadow']));
      }

      if( !empty( $args['backgroundOpacity'] ) ) {
          $attributes['style'] .= 'background-color: ' . 'rgba(' . hex2rgb($args['background'])[0] . ', ' . hex2rgb($args['background'])[1] . ', ' . hex2rgb($args['background'])[2] . ', ' . $args['backgroundOpacity']/100 . ')';
      }

      return $attributes;
  }

  add_filter('siteorigin_panels_widget_style_attributes', 'widget_style_attributes', 100, 2);

// END widget classes
