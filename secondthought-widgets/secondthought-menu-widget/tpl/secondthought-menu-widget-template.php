<?php
  if ($instance['affix']) {
    echo "<div class='myAffix' data-spy='scroll'>";
  } else {
    echo "<div>";
  }


  if ( $instance['another_selection'] == 'subpages') {

    echo '<div class="menu-about-menu-container">';
      echo '<ul class="menu">';
        pages_menu();
      echo '</ul>';
    echo '</div>';

  } else {

    wp_nav_menu( array(
      'menu' => $instance['another_selection']
    ) );

  }


  echo "</div>";
?>
