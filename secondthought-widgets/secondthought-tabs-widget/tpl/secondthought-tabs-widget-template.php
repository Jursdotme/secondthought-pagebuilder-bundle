<?php if( empty($instance['tab_repeater']) ) return; ?>

<ul class="accordion-tabs">

<?php foreach($instance['tab_repeater'] as $tab) { ?>

  <li class="tab-header-and-content">
    <a href="javascript:void(0)" class="tab-link"><?php echo $tab['tab_label']; ?></a>
    <div class="tab-content">
      <?php echo $tab['tab_content']; ?>
    </div>
  </li>

<?php } ?>

</ul>
