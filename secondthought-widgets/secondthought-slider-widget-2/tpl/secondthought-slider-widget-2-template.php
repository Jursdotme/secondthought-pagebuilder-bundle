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

?>

<div class="secondthought-slider-2" data-padding="<?php echo $instance['caption_padding']; ?>" <?php if ($instance['fill_screen']) {	echo 'data-fullwidth="true"'; } if ($instance['full_height']) {	echo 'data-fullheight="true"'; } ?> style="height: <?php echo $instance['minimum_height']; ?>px;">

<?php foreach($instance['slider_2_repeater'] as $slide) { ?>

<?php	$background_image = wp_get_attachment_image_src($slide['background_image'], 'full'); ?>

	<div class="slide <?php echo $instance['horizontal_align_radio']; ?> <?php echo $instance['vertical_align_radio']; ?>" style="height: 100%; background-image: url('<?php echo $background_image[0]?>'); <?php if ($instance['full_height']) { echo $backgroundColor; } ?>">
		<?php if ($slide['tinymce_editor']) { ?>
			<div class="caption" style="<?php if ($instance['fill_screen'] && !$instance['full_height']) { echo $backgroundColor; } ?>">
				<div class="caption-inner" style="<?php if (!$instance['fill_screen'] && !$instance['full_height']) { echo $backgroundColor; } ?> padding: <?php echo $instance['caption_padding']; ?>px; width: <?php echo $instance['content_width']; ?>%; float: <?php echo $instance['horizontal_align_radio']; ?>;">
					<?php echo $slide['tinymce_editor']; ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php } ?>

</div>
