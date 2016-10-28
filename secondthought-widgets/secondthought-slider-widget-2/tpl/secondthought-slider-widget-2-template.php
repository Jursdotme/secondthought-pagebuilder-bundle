<?php
if( empty($instance['slider_2_repeater']) && (empty($instance['posts']['posts_query']) || !$instance['posts']['posts_visibility']) ) return;?>

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

//slide count
$slideDesktopSize = $instance['slide_settings']['slide_count_desktop'];
if (!$slideDesktopSize) { $slideDesktopSize = 1; }
$slideTabletSize = $instance['slide_settings']['slide_count_tablet'];
if (!$slideTabletSize) { $slideTabletSize = 1; }
$slideMobileSize = $instance['slide_settings']['slide_count_mobile'];
if (!$slideMobileSize) { $slideMobileSize = 1; }

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
 data-padding="' . $instance['caption_padding'] . '"
 data-slides-desktop="'.$slideDesktopSize.'"
 data-slides-tablet="'.$slideTabletSize.'"
 data-slides-mobile="'.$slideMobileSize.'"
 ';
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
				if ($slide['font_color']) { echo ' color:' . $slide['font_color'] . ';'; }
				echo ' padding: ' . $instance['caption_padding'] . 'px;';
				echo ' width: '. $instance['content_width'] . '%;';
				echo ' float: ' .$instance['horizontal_align_radio'] . ';">';
				if ($slide['icon'] && $instance['icons']['icon_placement'] == 'top') { echo '<div class="slide-icon" style="font-size:'.$instance['icons']['icon_size'].'px;text-align:'.$instance['icons']['icon_alignment'].';">'.siteorigin_widget_get_icon($slide['icon']).'</div>'; }
					echo $slide['tinymce_editor'];
				if ($slide['icon'] && $instance['icons']['icon_placement'] == 'bottom') { echo '<div class="slide-icon" style="font-size:'.$instance['icons']['icon_size'].'px;text-align:'.$instance['icons']['icon_alignment'].';">'.siteorigin_widget_get_icon($slide['icon']).'</div>'; }
				echo '</div>';
			echo '</div>';
		}
	echo '</div>';
	}
}

if ($instance['posts']['posts_visibility']) {
	$query = siteorigin_widget_post_selector_process_query( $instance['posts']['posts_query'] );
	$posts = new WP_Query($query);
	if($posts->have_posts()) {
		while($posts->have_posts()) {
			$posts->the_post();
			$post_image[0] = '';
			$background_image[0] = '';
			if (has_post_thumbnail() ) {
				if ($instance['posts']['posts_images']) {
					$post_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'secondthought_slider_image');
				} else {
					$background_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				}
			}

			echo '<div class="slide '.$instance['horizontal_align_radio'].' ' . $instance['vertical_align_radio'] . ' is_post_slide" style="height: 100%; background-image: url(\'' . $background_image[0] . '\');">';
				echo '<div class="caption"';
				if ($instance['fill_screen']) { echo ' style="'.$backgroundColor.'"'; }
				echo '>';

					echo '<div class="caption-inner" style="';
					if (!$instance['fill_screen']) { echo ' ' . $backgroundColor; }
					if ( $instance['full_height']) { echo ' height:100%;'; }
					echo ' padding: ' . $instance['caption_padding'] . 'px;';
					echo ' width: '. $instance['content_width'] . '%;';
					echo ' float: ' .$instance['horizontal_align_radio'] . ';">';

						echo '<a href="' . get_the_permalink() . '">';
							if ($instance['posts']['posts_images'])
								echo '<img class="slider_post_image" src="' . $post_image[0] . '"/>';
							echo '<h3>' . get_the_title() .'</h3>';
							echo '<p>' . get_the_excerpt() .'</p>';
						echo '</a>';

					echo '</div>';

				echo '</div>';

			echo '</div>';

		}
		wp_reset_postdata();
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
