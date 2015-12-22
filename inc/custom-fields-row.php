<?php
/*--------------------------------------------*
 * Field Groups
/*--------------------------------------------*/

function row_style_groups($groups) {
  $groups['background'] = array(
			'name' => __('Background', 'secondthought_pagebuilder_bundle'),
			'priority' => 20
  );

  $groups['height'] = array(
			'name' => __('Height', 'secondthought_pagebuilder_bundle'),
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

    // // PARALLAX
    // $fields['parallax'] = array(
    //     'name'        => __('Parallax', 'secondthought_pagebuilder_bundle'),
    //     'type'        => 'checkbox',
    //     'group'       => 'background',
    //     'description' => __('If enabled, the background image will have a parallax effect.', 'secondthought_pagebuilder_bundle'),
    //     'priority'    => 11,
    // );

    // CENTER CONTENT
    $fields['center-content'] = array(
        'name'        => __('Center content', 'secondthought_pagebuilder_bundle'),
        'type'        => 'checkbox',
        'group'       => 'layout',
        'description' => __('If enabled, the content of this row will be centered horizontally (only works with a single cell).', 'secondthought_pagebuilder_bundle'),
        'priority'    => 11,
    );

    // MATCH HEIGHT
    $fields['matchheight'] = array(
        'name'        => __('Match height on cells', 'secondthought_pagebuilder_bundle'),
        'type'        => 'checkbox',
        'group'       => 'height',
        'description' => __('If enabled, the cells in this row will get matching heights automatically', 'secondthought_pagebuilder_bundle'),
        'priority'    => 11,
    );

    // FILL HEIGHT
    $fields['fillheight'] = array(
        'name'        => __('Fixed height', 'secondthought_pagebuilder_bundle'),
        'type'        => 'checkbox',
        'group'       => 'height',
        'description' => __('If enabled, the height of this row will match the window height. Use the settings below for further control.', 'secondthought_pagebuilder_bundle'),
        'priority'    => 12,
    );
    $fields['heightMin'] = array(
			'name' => __('Minimum height (Fixed height)', 'secondthought_pagebuilder_bundle'),
			'type' => 'measurement',
			'group' => 'height',
			'description' => __('Minimum height of the row when using fixed height.', 'secondthought_pagebuilder_bundle'),
			'priority' => 13,
			'multiple' => false
		);
    $fields['heightMax'] = array(
			'name' => __('Maximum height (Fixed height)', 'secondthought_pagebuilder_bundle'),
			'type' => 'measurement',
			'group' => 'height',
			'description' => __('Maximum height of the row when using fixed height.', 'secondthought_pagebuilder_bundle'),
			'priority' => 13,
			'multiple' => false
		);
    $fields['subtractheight'] = array(
			'name' => __('Subtract height (Fixed height)', 'secondthought_pagebuilder_bundle'),
			'type' => 'measurement',
			'group' => 'height',
			'description' => __('Subtract a fixed amount when using minimum height.', 'secondthought_pagebuilder_bundle'),
			'priority' => 13,
			'multiple' => false
		);

    // BACKGROUND OPACITY
    $fields['backgroundOpacity'] = array(
			'name' => __('Background color opacity', 'secondthought_pagebuilder_bundle'),
			'type' => 'text',
			'group' => 'background',
			'description' => __('Sets opacity on background color. Use this to give background images an overlay.', 'secondthought_pagebuilder_bundle'),
			'priority' => 11,
		);

    // "SCROLL TO NEXT ROW" BUTTON
    $fields['scrollToRowButton'] = array(
        'name'        => __('Scroll Button', 'secondthought_pagebuilder_bundle'),
        'type'        => 'checkbox',
        'group'       => 'layout',
        'description' => __('If enabled, this row will display a button that scrolls down to the following row.', 'secondthought_pagebuilder_bundle'),
        'priority'    => 12,
    );

    // "SCROLL TO NEXT ROW" TEXT
    $fields['scrollToRowText'] = array(
        'name'        => __('Scroll text', 'secondthought_pagebuilder_bundle'),
        'type'        => 'text',
        'group'       => 'layout',
        'description' => __('Scroll text for scroll button', 'secondthought_pagebuilder_bundle'),
        'priority'    => 13,
    );
    // "SCROLL TO NEXT ROW" COLOR
    $fields['scrollToRowColor'] = array(
        'name'        => __('Scroll color', 'secondthought_pagebuilder_bundle'),
        'type'        => 'color',
        'group'       => 'layout',
        'description' => __('Color for scroll text and button', 'secondthought_pagebuilder_bundle'),
        'priority'    => 14,
    );
    // "SCROLL TO NEXT ROW" TEXT
    $fields['scrollToRowIcon'] = array(
        'name'        => __('Scroll icon', 'secondthought_pagebuilder_bundle'),
        'type'        => 'text',
        'group'       => 'layout',
        'description' => __('Scroll icon for scroll button', 'secondthought_pagebuilder_bundle'),
        'priority'    => 15,
    );

    /* ========== Change default fields ========== */

    $fields['background']['group'] = 'background';

    $fields['background_image_attachment']['group'] = 'background';

    $fields['background_display']['group'] = 'background';
    $fields['background_display']['options']['contain'] = __('Fill', 'secondthought_pagebuilder_bundle');



    unset($fields['border_color']);

    return $fields;
  }

  add_filter( 'siteorigin_panels_row_style_fields', 'row_style_fields', 20 );

// END Row fields

/*--------------------------------------------*
 * row classes
/*--------------------------------------------*/

  function row_style_attributes( $attributes, $args ) {
      // if( !empty( $args['parallax'] ) ) {
      //     array_push($attributes['class'], 'parallax');
      // }

      if( !empty( $args['center-content'] ) ) {
          array_push($attributes['class'], 'secondthought-center-content');
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
          $attributes['data-scroll-text'] = $args['scrollToRowText'];
          $attributes['data-scroll-color'] = $args['scrollToRowColor'];
          $attributes['data-scroll-icon'] = $args['scrollToRowIcon'];
      }

      return $attributes;
  }

  add_filter('siteorigin_panels_row_style_attributes', 'row_style_attributes', 10, 2);

// END row classes
