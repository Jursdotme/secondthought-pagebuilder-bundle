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

?>

<div class="secondthought-slider-2"
	data-autoplay="<?php echo $autoplay; ?>"
	data-animation-speed="<?php echo $animationSpeed; ?>"
	data-fade="<?php echo $fade; ?>"
	data-autoplay-speed="<?php echo $autoplaySpeed; ?>"
	data-dots-color-active="<?php echo $dotActiveColor; ?>"
	data-dots-color-passive="<?php echo $dotPassiveColor; ?>"
	data-dots-size="<?php echo $dotSize; ?>"
	data-dots-spacing="<?php echo $dotSpacing; ?>"
	data-dots-position="<?php echo $dotPosition; ?>"
	data-dots-show="<?php echo $showDot; ?>"
	data-arrow-icon-right="<?php echo $arrowIconRight; ?>"
	data-arrow-icon-left="<?php echo $arrowIconLeft; ?>"
	data-arrow-size="<?php echo $arrowSize; ?>"
	data-arrow-color="<?php echo $arrowColor; ?>"
	data-arrow-indent="<?php echo $arrowIndent; ?>"
	data-arrow-show="<?php echo $showArrow; ?>"
	data-padding="<?php echo $instance['caption_padding']; ?>"
	<?php
	if ($instance['fill_screen']) {	echo 'data-full-width="true"'; }
	if ($instance['full_height']) {	echo 'data-full-height="true"'; }
	?>
	data-slider-height="<?php echo $instance["minimum_height"]; ?>"
>

<?php foreach($instance['slider_2_repeater'] as $slide) { ?>

<?php	$background_image = wp_get_attachment_image_src($slide['background_image'], 'full'); ?>

	<div class="slide <?php echo $instance['horizontal_align_radio']; ?> <?php echo $instance['vertical_align_radio']; ?>" style="height: 100%; background-image: url('<?php echo $background_image[0]?>');<?php// if ($instance['full_height']) { echo $backgroundColor; } ?> ">
		<?php if ($slide['tinymce_editor']) { ?>
			<div class="caption" style="<?php if ($instance['fill_screen'] && !$instance['full_height']) { echo $backgroundColor; } ?>">
				<div class="caption-inner" style="<?php if (!$instance['fill_screen'] && $instance['full_height']) { echo $backgroundColor; } ?> padding: <?php echo $instance['caption_padding']; ?>px; <?php if ($instance['full_height']) { echo 'height:100%;'; } ?> width: <?php echo $instance['content_width']; ?>%; float: <?php echo $instance['horizontal_align_radio']; ?>;">
					<?php echo $slide['tinymce_editor']; ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php } ?>

</div>
