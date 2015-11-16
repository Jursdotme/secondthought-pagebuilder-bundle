<?php
  // If flexbox is empty dont go any further
  if( empty($instance['flexbox_repeater']) ) return;
?>

<?php // TEMPLATE ?>
<div class="flexbox-widget">

  <?php foreach($instance['flexbox_repeater'] as $tab) { ?>

  <div class="flexbox-widget-item">
    <?php echo $tab['tab_content']; ?>
  </div>

  </li>

<?php } ?>

</div>
