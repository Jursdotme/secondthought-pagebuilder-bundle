<?php
/*--------------------------------------------*
 * Field Groups
/*--------------------------------------------*/

function row_style_groups($groups) {
  $groups['background'] = array(
			'name' => __('Background', 'siteorigin-panels'),
			'priority' => 20
  );

  $groups['height'] = array(
			'name' => __('Height', 'siteorigin-panels'),
			'priority' => 20
  );

  return $groups;
}

add_filter( 'siteorigin_panels_row_style_groups', 'row_style_groups' );

// END Field Groups

/*--------------------------------------------*
 * Row fields
/*--------------------------------------------*/

  function row_style_fields($fields) {

    // PARALLAX
    $fields['parallax'] = array(
        'name'        => __('Parallax', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'background',
        'description' => __('If enabled, the background image will have a parallax effect.', 'siteorigin-panels'),
        'priority'    => 11,
    );

    // CENTER CONTENT
    $fields['center-content'] = array(
        'name'        => __('Center content', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'layout',
        'description' => __('If enabled, the content of this row will be centered horizontally (only works with a single cell).', 'siteorigin-panels'),
        'priority'    => 11,
    );

    // MATCH HEIGHT
    $fields['matchheight'] = array(
        'name'        => __('Match height on cells', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'height',
        'description' => __('If enabled, the cells in this row will get matching heights automatically', 'siteorigin-panels'),
        'priority'    => 11,
    );

    // FILL HEIGHT
    $fields['fillheight'] = array(
        'name'        => __('Fixed height', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'height',
        'description' => __('If enabled, the height of this row will match the window height. Use the settings below for further control.', 'siteorigin-panels'),
        'priority'    => 12,
    );
    $fields['heightMin'] = array(
			'name' => __('Minimum height (Fixed height)', 'siteorigin-panels'),
			'type' => 'measurement',
			'group' => 'height',
			'description' => __('Minimum height of the row when using fixed height.', 'siteorigin-panels'),
			'priority' => 13,
			'multiple' => false
		);
    $fields['heightMax'] = array(
			'name' => __('Maximum height (Fixed height)', 'siteorigin-panels'),
			'type' => 'measurement',
			'group' => 'height',
			'description' => __('Maximum height of the row when using fixed height.', 'siteorigin-panels'),
			'priority' => 13,
			'multiple' => false
		);
    $fields['subtractheight'] = array(
			'name' => __('Subtract height (Fixed height)', 'siteorigin-panels'),
			'type' => 'measurement',
			'group' => 'height',
			'description' => __('Subtract a fixed amount when using minimum height.', 'siteorigin-panels'),
			'priority' => 13,
			'multiple' => false
		);

    // BACKGROUND OPACITY
    $fields['backgroundOpacity'] = array(
			'name' => __('Background color opacity', 'siteorigin-panels'),
			'type' => 'text',
			'group' => 'background',
			'description' => __('Sets opacity on background color. Use this to give background images an overlay.', 'siteorigin-panels'),
			'priority' => 11,
		);

    // "SCROLL TO NEXT ROW" BUTTON
    $fields['scrollToRowButton'] = array(
        'name'        => __('Scroll Button', 'siteorigin-panels'),
        'type'        => 'checkbox',
        'group'       => 'layout',
        'description' => __('If enabled, this row will display a button that scrolls down to the following row.', 'siteorigin-panels'),
        'priority'    => 12,
    );

    /* ========== Change default fields ========== */

    $fields['background']['group'] = 'background';

    $fields['background_image_attachment']['group'] = 'background';

    $fields['background_display']['group'] = 'background';
    $fields['background_display']['options']['contain'] = __('Fill', 'siteorigin-panels');



    unset($fields['border_color']);

    return $fields;
  }

  add_filter( 'siteorigin_panels_row_style_fields', 'row_style_fields', 20 );

// END Row fields

/*--------------------------------------------*
 * row classes
/*--------------------------------------------*/

  function row_style_attributes( $attributes, $args ) {
      if( !empty( $args['parallax'] ) ) {
          array_push($attributes['class'], 'parallax');
      }

      if( !empty( $args['center-content'] ) ) {
          array_push($attributes['class'], 'center-content');
      }

      if( !empty( $args['matchheight'] ) ) {
          array_push($attributes['class'], 'matchheight');
      }

      if (!isset($args['background_display'])) {
        $args['background_display'] = array();
      }

      if( $args['background_display'] == 'contain' ) {
          $attributes['style'] .= 'background-position: center center; background-repeat: no-repeat; background-size: contain;';
      }

      if( $args['background_display'] == 'cover' ) {
          $attributes['style'] .= 'background-position: center center; background-repeat: no-repeat; background-size: cover;';
      }

      if( !empty( $args['fillheight'] ) ) {
          array_push($attributes['class'], 'fillerup');

          if (!empty( $args['heightMin'] )) {
            $attributes['data-minheight'] = $args['heightMin'];
          }
          if (!empty( $args['heightMax'] )) {
            $attributes['data-maxheight'] = $args['heightMax'];
          }
          if (!empty( $args['subtractheight'] )) {
            $attributes['data-subtract'] = $args['subtractheight'];
          }
      }

      if( !empty( $args['backgroundOpacity'] ) ) {
          $attributes['data-bg-opacity'] = $args['backgroundOpacity'];
          array_push($attributes['class'], 'color-overlay');
      }

      if( !empty( $args['scrollToRowButton'] ) ) {
          array_push($attributes['class'], 'scroll-button');
      }

      return $attributes;
  }

  add_filter('siteorigin_panels_row_style_attributes', 'row_style_attributes', 10, 2);

// END row classes
