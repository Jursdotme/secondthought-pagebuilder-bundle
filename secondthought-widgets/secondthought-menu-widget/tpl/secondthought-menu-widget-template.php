

<?php



    if ($instance['affix']) {
      echo "<div class='myAffix' data-spy='scroll'>";
    } else {
      echo "<div>";
    }

    wp_nav_menu( array(
      'menu' => $instance['another_selection']
    ) );
    "</div>";
    ?>
