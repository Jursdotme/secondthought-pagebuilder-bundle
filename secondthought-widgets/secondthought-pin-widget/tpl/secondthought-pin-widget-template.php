<?php
if( empty($instance['pin_map']) )
		return;

$pin_image = get_field('image', $instance['pin_map']);
$pin_repeater = get_field('pins', $instance['pin_map']);


// icon settings
$pin_icon = str_replace('fontawesome-','fa-',$instance['icon_settings']['pin_icon']);
$pin_icon_size = $instance['icon_settings']['pin_icon_size'];
$pin_icon_size_int = intval($pin_icon_size);

$pin_icon_padding = $instance['icon_settings']['pin_icon_padding'];
if (!empty($pin_icon_padding)) {
	$pin_icon_size_int = $pin_icon_size_int+(intval($pin_icon_padding)*2);
	$pin_icon_padding = ' padding: ' . $pin_icon_padding . 'px;';
}
if (!empty($pin_icon_size)) { $pin_icon_size = ' font-size:' . $pin_icon_size . 'px; width:' . $pin_icon_size_int . 'px; height:' . $pin_icon_size_int . 'px; line-height:' . $pin_icon_size . 'px;'; }

$pin_icon_color = $instance['icon_settings']['pin_icon_color'];
if (!empty($pin_icon_color)) { $pin_icon_color = ' color:' . $pin_icon_bg_color . ';'; }

$pin_icon_bg_color = $instance['icon_settings']['pin_icon_bg_color'];
if (!empty($pin_icon_bg_color)) { $pin_icon_bg_color = ' background-color:' . $pin_icon_bg_color . ';'; }

$pin_icon_border_color = $instance['icon_settings']['pin_icon_border_color'];
if (!empty($pin_icon_border_color)) { $pin_icon_border_color = ' border: 1px solid ' . $pin_icon_border_color . ';'; }

$pin_icon_border_rounded = $instance['icon_settings']['pin_icon_border_rounded'];
if (!empty($pin_icon_border_rounded)) { $pin_icon_border_rounded = ' border-radius:50%;'; }

$pin_icon_shadow = $instance['icon_settings']['pin_icon_shadow'];
if (!empty($pin_icon_shadow)) { $pin_icon_shadow = ' box-shadow: 2px 2px 8px rgba(0,0,0,.25);'; }


// content settings
$pin_content_size = $instance['content_settings']['pin_content_size'];
$pin_content_size_int = intval($pin_content_size);

$pin_content_padding = $instance['content_settings']['pin_content_padding'];
if (!empty($pin_content_padding)) {
	$pin_content_size_int = $pin_content_size_int+(intval($pin_content_padding)*2);
	$pin_content_padding = ' padding: ' . $pin_content_padding . 'px;';
}
if (!empty($pin_content_size)) { $pin_content_size = ' font-size:' . $pin_content_size . 'px;'; }

$pin_content_color = $instance['content_settings']['pin_content_color'];
if (!empty($pin_content_color)) { $pin_content_color = ' color:' . $pin_content_bg_color . ';'; }

$pin_content_bg_color = $instance['content_settings']['pin_content_bg_color'];
if (!empty($pin_content_bg_color)) { $pin_content_bg_color = ' background-color:' . $pin_content_bg_color . ';'; }

$pin_content_border_color = $instance['content_settings']['pin_content_border_color'];
if (!empty($pin_content_border_color)) { $pin_content_border_color = ' border: 1px solid ' . $pin_content_border_color . ';'; }

$pin_content_border_rounded = $instance['content_settings']['pin_content_border_rounded'];
if (!empty($pin_content_border_rounded)) { $pin_content_border_rounded = ' border-radius:'.$pin_content_border_rounded.'px;'; }

$pin_content_shadow = $instance['content_settings']['pin_content_shadow'];
if (!empty($pin_content_shadow)) { $pin_content_shadow = ' box-shadow: 2px 2px 8px rgba(0,0,0,.25);'; }
?>

<div class="secondthought-pin-widget">
<img src="<?php echo $pin_image['url']; ?>" class="pin-image">
<?php foreach( $pin_repeater as $pins ) { ?>
	<div class="pin" style="left:<?php echo $pins['pin_placement_x'];?>%; top:<?php echo $pins['pin_placement_y']; ?>%; ">
			<i class="fa <?php echo $pin_icon; ?>" aria-hidden="true" style="<?php echo $pin_icon_border_color . $pin_icon_bg_color . $pin_icon_border_rounded . $pin_icon_color . $pin_icon_size . $pin_icon_padding . $pin_icon_shadow;?> margin:-<?php echo $pin_icon_size_int/2; ?>px 0px 0px -<?php echo $pin_icon_size_int/2; ?>px;"></i>
			<div class="caption">
				<div class="close" style="<?php echo $pin_content_border_color . $pin_content_bg_color . $pin_content_shadow;?>">&times;</div>
				<div class="caption-inner" style="<?php echo $pin_content_border_color . $pin_content_bg_color . $pin_content_border_rounded . $pin_content_color . $pin_content_size . $pin_content_padding . $pin_content_shadow;?>">
					<?php
					if ($pins['pin_title']) {
						echo '<h4>' . $pins['pin_title'] . '</h4>';
					}
					?>
					<?php echo $pins['pin_description']; ?>
				</div>
			</div>
	</div>
<?php }; ?>
</div>
