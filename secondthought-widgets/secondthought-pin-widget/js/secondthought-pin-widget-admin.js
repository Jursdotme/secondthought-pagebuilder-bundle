jQuery(window).load(function(){
  var image = jQuery('.post-type-inz_pin_widget .acf-image-uploader img');
  jQuery('.post-type-inz_pin_widget .acf-image-uploader img').click( function(e) {
    image = jQuery(this);
    var offset = image.offset();
    var width = parseInt(image.width());
    var height = parseInt(image.height());
    var relativeX = parseInt(e.pageX - offset.left);
    var relativeY = parseInt(e.pageY - offset.top);
    var positionX = parseFloat(relativeX/width*100).toFixed(2);
    var positionY = parseFloat(relativeY/height*100).toFixed(2);
    // console.log("X: " + relativeX + "  Y: " + relativeY);
    // console.log("X: " + positionX + "%  Y: " + positionY + "%");

    jQuery('.post-type-inz_pin_widget .add_pin .acf-button').trigger( "click" );
    setTimeout(function() {
      var acf_row = jQuery('.post-type-inz_pin_widget .add_pin .acf-row:nth-last-child(2)');
      var acf_id = acf_row.data('id');

      inz_create_pin(acf_row, acf_id, positionX, positionY, image);

      //scroll to pin options
      jQuery('html, body').animate({
        scrollTop: acf_row.offset().top
      }, 500);

      //add values to option
      jQuery('.post-type-inz_pin_widget .add_pin .acf-row:nth-last-child(2) .placement_x input').val(positionX);
      jQuery('.post-type-inz_pin_widget .add_pin .acf-row:nth-last-child(2) .placement_y input').val(positionY);

    }, 500);

  });


  // check for each row of pins
  jQuery('.post-type-inz_pin_widget .add_pin .acf-row').each(function () {
    var acf_row = jQuery(this);
    if (!acf_row.hasClass("acf-clone")) {
      var acf_id = acf_row.data('id');
      var positionX = jQuery('.placement_x input', acf_row).val();
      var positionY = jQuery('.placement_y input', acf_row).val();

      inz_create_pin(acf_row, acf_id, positionX, positionY, image);
    }
  });


});


function inz_create_pin(acf_row, acf_id, positionX, positionY, image){
  var pin = jQuery('<div class="pin" data-acf-id="'+acf_id+'" style="left:'+positionX+'%;top:'+positionY+'%;">+</div>')

  //append pin
  image.after(pin);

  //add click to pin
  pin.click( function() {
    //scroll to pin options
    jQuery('html, body').animate({
      scrollTop: acf_row.offset().top
    }, 500);
  });

  //add listener to remove rows
  jQuery('.acf-icon.-minus', acf_row).click( function() {
    pin.remove();
  });
}
