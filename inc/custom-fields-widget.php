<?php
/*--------------------------------------------*
 * Widget fields
/*--------------------------------------------*/

  function widget_style_fields($fields) {
    $fields['parallax'] = array(
        'name'        => __('Parallax', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'design',
        'description' => __('If enabled, the background image will have a parallax effect.', 'siteorigin-panels'),
        'priority'    => 11,
    );

    $fields['center-content'] = array(
        'name'        => __('Center content', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'design',
        'description' => __('If enabled, the content of this widget will be centered horizontally.', 'siteorigin-panels'),
        'priority'    => 11,
    );

    $fields['border-radius'] = array(
        'name'        => __('Border radius', 'siteorigin-panels'),
        'type'        => 'measurement',
        'group'       => 'design',
        'description' => __('Add rounded corners to this widgets background.', 'siteorigin-panels'),
        'priority'    => 5,
    );

    $fields['border-radius'] = array(
        'name'        => __('Border radius', 'siteorigin-panels'),
        'type'        => 'measurement',
        'group'       => 'design',
        'description' => __('Add rounded corners to this widgets background.', 'siteorigin-panels'),
        'priority'    => 5,
    );

    $fields['remove-outer-margin'] = array(
        'name'        => __('Remove outer margin', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'design',
        'description' => __('Remove margin for the side facing the window border.', 'siteorigin-panels'),
        'priority'    => 11,
    );

    return $fields;
  }

  add_filter( 'siteorigin_panels_widget_style_fields', 'widget_style_fields' );

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


      return $attributes;
  }

  add_filter('siteorigin_panels_widget_style_attributes', 'widget_style_attributes', 10, 2);

// END widget classes
