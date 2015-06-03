<?php if( empty($instance['slides']) ) return;

if (!function_exists('secondthought_hex2rgba')) {
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

// Animation Settings
$autoplay = ($instance['animation']['autoplay'] ? '1' : '0');
$autoplaySpeed = $instance['animation']['autoplay_speed'];
$fade = ($instance['animation']['fade'] ? '1' : '0');
$animationSpeed = $instance['animation']['animation_speed'];

// Dots
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
$arrowIndent = $instance['arrows']['arrow_indent'];

$slideHeight = $instance['layout']['slide_height'];

?>

<div class="secondthought-slider"
	data-autoplay="<?php echo $autoplay; ?>"
	data-animation-speed="<?php echo $animationSpeed; ?>"
	data-fade="<?php echo $fade; ?>"
	data-autoplay-speed="<?php echo $autoplaySpeed; ?>"
	data-dots-color-active="<?php echo $dotActiveColor; ?>"
	data-dots-color-passive="<?php echo $dotPassiveColor; ?>"
	data-dots-size="<?php echo $dotSize; ?>"
	data-dots-spacing="<?php echo $dotSpacing; ?>"
	data-dots-position="<?php echo $dotPosition; ?>"
	data-arrow-icon-right="<?php echo $arrowIconRight; ?>"
	data-arrow-icon-left="<?php echo $arrowIconLeft; ?>"
	data-arrow-size="<?php echo $arrowSize; ?>"
	data-arrow-indent="<?php echo $arrowIndent; ?>"
	data-showarrow="<?php echo $showArrow; ?>"
	style="height: <?php echo $slideHeight; ?>;"
>

	<?php foreach($instance['slides'] as $slide) { ?>

		<?php

		$background_image = wp_get_attachment_image_src($slide['slide_background'], 'full');


		$headerColor = $instance['layout']['heading_color'];
		$captionColor = $instance['layout']['caption_color'];
		$backgroundSize = $instance['layout']['background_size'];
		$backgroundPosition = $instance['layout']['background_position'];
		$captionWidth = $instance['layout']['caption_width'] . "px";
		$captionAlign = $instance['layout']['caption_align'];

		// Background Color Settings
		$bgColorType = $slide['bg_color_settings']['background_color_type'];
		$bgColor = $slide['bg_color_settings']['background_color'];
		$bgOpacity = $slide['bg_color_settings']['bg_transparency']/100;
		$bgRgbaValue = secondthought_hex2rgba($bgColor, $bgOpacity);
		$bgBorderRadius = $slide['bg_color_settings']['bg_border_radius'];

		?>

		<div class="slide" style="height: 100%;<?php echo 'background-image: url('.$background_image[0].');' ?> background-size: <?php echo  $backgroundSize; ?>; background-position: <?php echo $backgroundPosition; ?>; <?php if($bgColorType == 'slide_overlay') { echo 'background-color:' . $bgRgbaValue . ';';} ?> " >
			<div class="slide_inner">
				<div class="slide_content" style="margin: 0 auto; max-width: <?php echo $captionWidth; ?>; text-align: <?php echo $captionAlign; ?>; background-color: <?php if($bgColorType == 'caption_bg'){ echo $bgRgbaValue;} ?>; <?php echo 'border-radius:'.$bgBorderRadius.'px;'; ?>">
					<h1 style="color: <?php echo $headerColor; ?>;"><?php echo $slide['slide_header']; ?></h1>
					<p style="color: <?php echo $captionColor; ?>;">
						<?php echo $slide['slide_caption']; ?>
					</p>
					<?php if ($slide['slide_link']) { ?>
						<a class="btn-brand btn-large" href="<?php echo sow_esc_url( $slide['slide_link'] ); ?>"><?php _e('Read more', 'siteorigin-widgets'); ?></a>
					<?php	} ?>
				</div>
			</div>
		</div>

	<?php } ?>

</div>
