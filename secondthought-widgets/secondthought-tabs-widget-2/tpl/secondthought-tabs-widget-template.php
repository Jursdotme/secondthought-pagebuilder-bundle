<?php if( empty($instance['tab_repeater']) ) return; ?>

  <ul class="tabs">

<?php
  $i = 0;
  foreach($instance['tab_repeater'] as $tab) {
  $i++;
?>

  <li data-tab-trigger="tab-<?php echo $i; ?>">
    <?php echo $tab['tab_label']; ?>
  </li>

<?php } ?>

</ul>
  <div class="tab-content">
<?php
  $i = 0;
  foreach($instance['tab_repeater'] as $tab) {
  $i++;
?>



    <div data-tab-content="tab-<?php echo $i; ?>">
      <?php echo $tab['tab_content']; ?>
    </div>



<?php } ?>
  </div>
