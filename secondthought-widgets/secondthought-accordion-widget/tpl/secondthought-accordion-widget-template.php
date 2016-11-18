<?php
  // If accordion is empty dont go any further
  if( empty($instance['accordion_repeater']) ) return;

  if ($instance['accordion_header']) {
    echo '<h2 class="accordion-header">' .
      $instance['accordion_header'] .
    '</h2>';
  }


// TEMPLATE ?>
<ul class="accordion">

  <?php foreach($instance['accordion_repeater'] as $tab) { ?>

  <li>

    <a href="javascript:void(0)" class="js-accordion-trigger">
      <span><?php echo $tab['tab_label']; ?></span>
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
