<?php if( empty($instance['accordion_repeater']) ) return; ?>

<ul class="accordion">

<?php foreach($instance['accordion_repeater'] as $tab) { ?>

  <li>
    <a href="javascript:void(0)" class="js-accordion-trigger"><?php echo $tab['tab_label']; ?></a>
    <div class="accordion-content">
      <?php echo $tab['tab_content']; ?>
    </div>
  </li>

<?php } ?>

</ul>
