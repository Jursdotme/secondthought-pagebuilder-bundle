<?php

// If accordion is empty dont go any further
if( empty($instance['accordion_repeater']) ) return;


function  echo_accordion_ul_start() { echo '<ul class="accordion">'; }

add_action( 'st_accordion_ul_before', 'echo_accordion_ul_start', 10 );

function  echo_accordion_ul_end() { echo '</ul>'; }

add_action( 'st_accordion_ul_after', 'echo_accordion_ul_end', 10 );


// TEMPLATE

do_action( 'st_accordion_ul_before' );

  foreach($instance['accordion_repeater'] as $tab) {

  echo '<li>';

    echo '<a href="javascript:void(0)" class="js-accordion-trigger">';
      do_action('st_accordion_tab_label_before', $tab);
      echo $tab['tab_label'];
      do_action('st_accordion_tab_label_after', $tab);
    echo '</a>';

    echo '<div class="accordion-content">';
      do_action('st_accordion_content_before', $tab);
      echo $tab['tab_content'];
      do_action('st_accordion_content_after', $tab);
    echo '</div>';

  echo '</li>';

}

do_action( 'st_accordion_ul_after' );
