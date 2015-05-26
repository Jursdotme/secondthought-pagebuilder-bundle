<?php
  // Setup Image data
  $id = $instance['image_button_image'];
  $size = 'full'; // (thumbnail, medium, large, full or custom size)
  $image_attributes = wp_get_attachment_image_src( $id, $size );

	$buttonHeight = $instance['image_button_height'];
	$textColor = $instance['image_button_text_color'];
	$overlayTransparency = $instance['image_button_overlay_transparency'];
 ?>

<figure class="effect-chico" style="height: <?php echo $buttonHeight; ?>px;">
	<img src="<?php echo $image_attributes[0]; ?>" alt="img01"/>
	<figcaption>


		<a href="<?php echo sow_esc_url($instance['image_button_link']); ?>">
      <h2><?php echo $instance['image_button_text']; ?></h2>
    </a>
	</figcaption>
</figure>
