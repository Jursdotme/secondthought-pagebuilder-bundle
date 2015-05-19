<?php $image_lg_desktop = wp_get_attachment_image_src( $instance['image_lg_desktop'], 'full' )[0]; ?>
<?php $image_sm_desktop = wp_get_attachment_image_src( $instance['image_sm_desktop'], 'full' )[0]; ?>
<?php $image_tablet_portrait = wp_get_attachment_image_src( $instance['image_tablet_portrait'], 'full' )[0]; ?>
<?php $image_tablet_landscape = wp_get_attachment_image_src( $instance['image_tablet_landscape'], 'full' )[0]; ?>
<?php $image_mobile_portrait = wp_get_attachment_image_src( $instance['image_mobile_portrait'], 'full' )[0]; ?>
<?php $image_mobile_landscape = wp_get_attachment_image_src( $instance['image_mobile_landscape'], 'full' )[0]; ?>

<div class="preload" style="overflow: hidden; width: 0px; height: 0px">
	<img src="<?php echo $image_lg_desktop; ?>" />
	<img src="<?php echo $image_sm_desktop; ?>" />
	<img src="<?php echo $image_tablet_portrait; ?>" />
	<img src="<?php echo $image_tablet_landscape; ?>" />
	<img src="<?php echo $image_mobile_portrait; ?>" />
	<img src="<?php echo $image_mobile_landscape; ?>" />
</div>


<div class="md-slider">
	<div class="md-device-wrapper">
		<div class="md-device md-device-1">
			<a href="#"><img src="<?php echo $image_lg_desktop; ?>" /></a>
			<div class="md-border-element"></div>
			<div class="md-base-element"></div>
		</div>
	</div>
</div>

<script>
	var el = document.querySelector( '.md-slider' ),
		settings = {
			autoplay : true,
			interval : 3000,
			devices : [
				{ cName : 'md-device-1', canRotate : false, imgsrc : '<?php echo $image_lg_desktop; ?>' },
				{ cName : 'md-device-2', canRotate : false, imgsrc : '<?php echo $image_sm_desktop; ?>' },
				{ cName : 'md-device-3', canRotate : true, imgsrc : '<?php echo $image_tablet_portrait; ?>', rotatedsrc : '<?php echo $image_tablet_landscape; ?>' },
				{ cName : 'md-device-4', canRotate : true, imgsrc : '<?php echo $image_mobile_landscape; ?>', rotatedsrc : '<?php echo $image_mobile_landscape; ?>' }
			]
		},
		devicesTotal = settings.devices.length,
		ds = MorphingDevice( el, settings );

	// create navigation triggers
	var nav = document.createElement( 'nav' );
	for( var i = 0; i < devicesTotal; ++i ) {

		var trigger = document.createElement( 'a' );
		trigger.className = i === 0 ? 'md-current' : '';
		trigger.setAttribute( 'href', '#' );
		trigger.setAttribute( 'pos', i );
		trigger.onclick = function( event ) {

			ds.stopSlideshow();
			var pos = Number( event.target.getAttribute( 'pos' ) );
			if( pos === ds.getCurrent() ) {
				return false;
			}
			ds.updateCurrentTrigger( event.target );
			ds.setCurrent( pos );
			ds.changeDevice();
			return false;

		};
		nav.appendChild( trigger );

	}
	el.appendChild( nav );

	if( settings.autoplay ) {
		ds.startSlideshow();
	}
</script>
