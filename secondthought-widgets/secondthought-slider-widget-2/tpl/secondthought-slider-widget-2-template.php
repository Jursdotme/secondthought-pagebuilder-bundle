<?php if( empty($instance['slider_2_repeater']) ) return;?>

<?php if (!function_exists('secondthought_hex2rgba')) {
	function secondthought_hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if(empty($color))
	    return $default;

		//Sanitize $color if "#" is provided
	  if ($color[0] == '#' ) {
	  	$color = substr( $color, 1 );
	  }

	  //Check if color has 6 or 3 characters and get values
	  if (strlen($color) == 6) {
	    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	  } elseif ( strlen( $color ) == 3 ) {
	    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	  } else {
	    return $default;
	  }

	  //Convert hexadec to rgb
	  $rgb =  array_map('hexdec', $hex);

	  //Check if opacity is set(rgba or rgb)
	  if($opacity){
	  	if(abs($opacity) > 1)
	  		$opacity = 1.0;
	  	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	  } else {
	  	$output = 'rgb('.implode(",",$rgb).')';
	  }

	  //Return rgb(a) color string
	  return $output;
	}
}

if (!$instance['background_color'] || $instance['background_transparency'] == '0') {
	$backgroundColor = "background-color: none;";
} else {
	$backgroundColor = "background-color:" . secondthought_hex2rgba($instance['background_color'], ($instance['background_transparency']/100)) . ";";
}

//Animation
$autoplay = ($instance['animation']['autoplay'] ? '1' : '0');
$autoplaySpeed = $instance['animation']['autoplay_speed'];
$fade = ($instance['animation']['fade'] ? '1' : '0');
$animationSpeed = $instance['animation']['animation_speed'];

// Dots
$showDot = ($instance['dots']['toogle_dots_visibility'] ? '1' : '0');
$dotActiveColor = $instance['dots']['color_active'];
$dotPassiveColor = $instance['dots']['color_passive'];
$dotSize = $instance['dots']['dot_size'];
$dotSpacing = $instance['dots']['dot_spacing'];
$dotPosition = $instance['dots']['dot_position'];

// Arrows
$showArrow = ($instance['arrows']['toogle_arrow_visibility'] ? '1' : '0');
$arrowIconRight = $instance['arrows']['icon_right'];
$arrowIconLeft = $instance['arrows']['icon_left'];
$arrowSize = $instance['arrows']['arrow_size'];
$arrowColor = $instance['arrows']['arrow_color'];
$arrowIndent = $instance['arrows']['arrow_indent'];

//thumbnails
$thumbDisplay = ($instance['thumbnails']['thumbnail_display'] ? 1 : 0);
$thumbDesktopSize = $instance['thumbnails']['thumbnail_count_desktop'];
$thumbTabletSize = $instance['thumbnails']['thumbnail_count_tablet'];
$thumbMobileSize = $instance['thumbnails']['thumbnail_count_mobile'];
$thumbnailMargin = $instance['thumbnails']['thumbnail_margin'];
$thumbnailArrows = ($instance['thumbnails']['thumbnail_arrows'] ? 'true' : 'false');
$thumbnailCentered = ($instance['thumbnails']['thumbnail_centered'] ? 'true' : 'false');

echo '<div class="secondthought-slider-2"
 data-autoplay="' . $autoplay . '"
 data-animation-speed="' . $animationSpeed . '"
 data-fade="' . $fade . '"
 data-autoplay-speed="' . $autoplaySpeed . '"
 data-dots-color-active="' . $dotActiveColor . '"
 data-dots-color-passive="' . $dotPassiveColor . '"
 data-dots-size="' . $dotSize . '"
 data-dots-spacing="' . $dotSpacing . '"
 data-dots-position="' . $dotPosition . '"
 data-dots-show="' . $showDot . '"
 data-arrow-icon-right="' . $arrowIconRight . '"
 data-arrow-icon-left="' . $arrowIconLeft . '"
 data-arrow-size="' . $arrowSize . '"
 data-arrow-color="' . $arrowColor . '"
 data-arrow-indent="' . $arrowIndent . '"
 data-arrow-show="' . $showArrow . '"
 data-padding="' . $instance['caption_padding'] . '"';
 if ($instance['fill_screen']) {	echo ' data-full-width="true"'; }
 if ($instance['full_height']) {	echo ' data-full-height="true"'; }
 echo 'data-slider-height="' . $instance["minimum_height"] . '"';
 echo ' style="height:' . $instance["minimum_height"] . 'px;">';

foreach($instance['slider_2_repeater'] as $slide) {
	if (!$slide['hide_slide']) {
		$background_image = wp_get_attachment_image_src($slide['background_image'], 'full');
		echo '<div class="slide '.$instance['horizontal_align_radio'].' ' . $instance['vertical_align_radio'] . '" style="height: 100%; background-image: url(\'' . $background_image[0] . '\');">';
		if ($slide['tinymce_editor']) {
			echo '<div class="caption"';
			 if ($instance['fill_screen']) { echo ' style="'.$backgroundColor.'"'; }
			 echo '>';
				echo '<div class="caption-inner" style="';
				if (!$instance['fill_screen']) { echo ' ' . $backgroundColor; }
				if ( $instance['full_height']) { echo ' height:100%;'; }
				echo ' padding: ' . $instance['caption_padding'] . 'px;';
				echo ' width: '. $instance['content_width'] . '%;';
				echo ' float: ' .$instance['horizontal_align_radio'] . ';">';
					echo $slide['tinymce_editor'];
				echo '</div>';
			echo '</div>';
		}
	echo '</div>';
	}
}
echo '</div>';

if ($thumbDisplay) {
	echo '<div class="slider-thumbnails thumbdesktop_'.$thumbDesktopSize.' thumbtablet_'.$thumbTabletSize.' thumbmobile_'.$thumbMobileSize.'" data-thumbs-desktop="'.$thumbDesktopSize.'" data-thumbs-tablet="'.$thumbTabletSize.'" data-thumbs-mobile="'.$thumbMobileSize.'" data-arrows="'.$thumbnailArrows.'" data-centered="'.$thumbnailCentered.'">';
	foreach($instance['slider_2_repeater'] as $thumbnail) {
		if (!$thumbnail['hide_slide']) {
			$background_image = wp_get_attachment_image_src($thumbnail['background_image'], 'secondthought_slider_thumbnails');
			echo '<div class="thumbnail" style="margin: '.$thumbnailMargin.'">';
				echo '<img src="'. $background_image[0] . '" />';
				if ($thumbnail['thumbnail_text']) {
					echo '<div class="thumbnail_text">' . $thumbnail['thumbnail_text'] . '</div>';
				}
			echo '</div>';

		}
	}
	echo '</div>';
}


?>
