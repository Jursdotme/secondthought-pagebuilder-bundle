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

  $fields['backgroundGradient'] = array(
      'name'        => __('Use background gradient', 'secondthought_pagebuilder_bundle'),
      'type'        => 'checkbox',
      'group'       => 'background',
      'description' => __('If enabled, this row will display a button that scrolls down to the following row.', 'secondthought_pagebuilder_bundle'),
      'priority'    => 12,
  );

  $fields['gradientstart'] = array(
		'name' => __('Gradient start', 'secondthought_pagebuilder_bundle'),
		'type' => 'text',
		'group' => 'background',
		'description' => __('Gradient starting point (in %).', 'secondthought_pagebuilder_bundle'),
		'priority' => 13,
	);

  $fields['gradientend'] = array(
		'name' => __('Gradient end', 'secondthought_pagebuilder_bundle'),
		'type' => 'text',
		'group' => 'background',
		'description' => __('Gradient ending point (in %).', 'secondthought_pagebuilder_bundle'),
		'priority' => 14,
	);

  $fields['gradientdeg'] = array(
		'name' => __('Gradient Orientation', 'secondthought_pagebuilder_bundle'),
		'type' => 'text',
		'group' => 'background',
		'description' => __('Gradient orientation in deg', 'secondthought_pagebuilder_bundle'),
		'priority' => 15,
    'default' => 270,
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

    // if( !empty( $args['backgroundOpacity'] ) ) {
    //     $attributes['data-bg-opacity'] = $args['backgroundOpacity'];
    //     array_push($attributes['class'], 'color-overlay');
    // }

    if( !empty( $args['scrollToRowButton'] ) ) {
        array_push($attributes['class'], 'scroll-button');
        if( !empty( $args['scrollToRowText'] ) ) { $attributes['data-scroll-text'] = $args['scrollToRowText']; };
        if( !empty( $args['scrollToRowColor'] ) ) { $attributes['data-scroll-color'] = $args['scrollToRowColor']; };
        if( !empty( $args['scrollToRowIcon'] ) ) { $attributes['data-scroll-icon'] = $args['scrollToRowIcon']; };
    }

    return $attributes;
}

add_filter('siteorigin_panels_row_style_attributes', 'row_style_attributes', 10, 2);

// Add gradient styling
function my_custom_row_styles($css, $panels_data, $post_id) {
  //Get the data from the $panels_data array and loop through all the panel rows(['grids']). This contains all the variables set in the admin  (BG Color etc.)
  foreach ( $panels_data['grids'] as $gi => $grid ) {
    // print_r($gi);
    // Get the mobile width.
    $settings = siteorigin_panels_setting();
	  $panels_mobile_width = $settings['mobile-width'];

    // Get the attributes i need. Note: many of these ar custom ones i have added myself. (See this article: https://siteorigin.com/docs/page-builder/hooks/custom-row-settings/)
    $grad_start = isset($grid['style']['gradientstart']) ? $grid['style']['gradientstart'] : '';
    $grad_end = isset($grid['style']['gradientend']) ? $grid['style']['gradientend'] : '';
    $background_opacity = isset($grid['style']['backgroundOpacity']) ? $grid['style']['backgroundOpacity'] : '';
    $grad_color = isset($grid['style']['background'] ) ? $grid['style']['background'] : '';
    $grad_deg = isset($grid['style']['gradientdeg']) ? $grid['style']['gradientdeg'] : '';
    $gradColor = hex2rgb($grad_color);


    // Check if the panel row has the "Use Background gradient" checked.
    if ( !empty( $grid['style']['backgroundGradient'] ) ) {


      // add new css to the $css array.
      $css->add_row_css($post_id, $gi, '.panel-row-style:before', array(
        'content'          => '""',
        'position'         => 'absolute',
        'top'              => '0',
        'left'             => '0',
        'width'            => '100%',
        'height'           => '100%',
        'z-index'          => '-1',
        'background-color' => 'inherit',
        'background-color' => 'transparent',
        'background-image' => 'linear-gradient(' . $grad_deg . 'deg,transparent ' . $grad_start . '%, rgba(' . $gradColor[0] . ', ' . $gradColor[1] . ', ' . $gradColor[2] . ', ' . $background_opacity/100 . ') ' . $grad_end . '%)',
      ) );
    } else {
      // add new css to the $css array.
      $css->add_row_css($post_id, $gi, '.panel-row-style:before', array(
        'content'          => '""',
        'position'         => 'absolute',
        'top'              => '0',
        'left'             => '0',
        'width'            => '100%',
        'height'           => '100%',
        'z-index'          => '-1',
        'background-color' => 'inherit',
        'background-color' => 'rgba(' . $gradColor[0] . ', ' . $gradColor[1] . ', ' . $gradColor[2] . ', ' . $background_opacity/100 . ')',
      ) );
    }

    // Center content
    if ( !empty( $grid['style']['center-content'] ) ) {
      // add new css to the $css array.
      $css->add_row_css($post_id, $gi, '.panel-row-style', array(
        'display'             => '-webkit-box',
        'display'             => '-webkit-flex',
        'display'             => '-ms-flexbox',
        'display'             => 'flex',
        '-webkit-box-align'   => 'center',
        '-webkit-align-items' => 'center',
        '-ms-flex-align'      => 'center',
        'align-items'         => 'center',
      ));
      $css->add_row_css($post_id, $gi, '.panel-row-style', array(
        '-webkit-box-orient'      => 'vertical',
        '-webkit-box-direction'   => 'normal',
        '-webkit-flex-direction'  => 'column',
        '-ms-flex-direction'      => 'column',
        'flex-direction'          => 'column',
        '-webkit-box-pack'        => 'center',
        '-webkit-justify-content' => 'center',
        '-ms-flex-pack'           => 'center',
        'justify-content'         => 'center',
      ), $settings['mobile-width'] );
    }

    // Transparent background-image
    if ( !empty( $background_opacity ) ) {
      // add new css to the $css array.
      $css->add_row_css($post_id, $gi, '.panel-row-style', array(
        'position' => 'relative',
        'z-index'  => '1',
        'background-color' => 'transparent !important',
      ));
      $css->add_row_css($post_id, $gi, '.panel-row-style:before', array(
        'content'          => '""',
        'position'         => 'absolute',
        'top'              => '0',
        'left'             => '0',
        'width'            => '100%',
        'height'           => '100%',
        'z-index'          => '-1',
        'background-color' => 'rgba(' . $grad_color[0] . ', ' . $grad_color[1] . ', ' . $grad_color[2] . ', ' . $background_opacity/100 . ')',
      ));
    }
    $typography_tags = array('p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'li');

    foreach ($typography_tags as $typography_tag => $tag) {
      $css->add_row_css($post_id, $gi, $tag, array(
        'color' => 'inherit',
      ));
    }

  }
  return $css;
}
// Add the above function with this hook.
add_filter( 'siteorigin_panels_css_object', 'my_custom_row_styles', 1, 3);

// END row classes
