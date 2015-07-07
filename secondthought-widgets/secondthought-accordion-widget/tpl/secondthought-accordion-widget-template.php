<?php
  // If accordion is empty dont go any further
  if( empty($instance['accordion_repeater']) ) return;
?>

<h2 class="accordion-header"> <?php echo $instance['accordion_header']; ?> </h2>

<?php // TEMPLATE ?>
<ul class="accordion">

  <?php foreach($instance['accordion_repeater'] as $tab) { ?>

  <li>

    <a href="javascript:void(0)" class="js-accordion-trigger">
      <?php echo $tab['tab_label']; ?>
      <i class="fa fa-plus"></i>
    </a>

    <div class="accordion-content">
      <?php
        echo $tab['tab_content'];
      ?>
    </div>

  </li>

<?php } ?>

</ul>
