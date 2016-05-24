$(window).load(function(){
  if ( $('.secondthought-pin-widget img.pin-image') ) {
    var image = $('.secondthought-pin-widget img.pin-image');
    var pin_width = image.outerWidth();
    $('.secondthought-pin-widget .pin').each(function () {
      var pin = $(this);
      var icon = $( 'i.fa ' , pin);
      var caption = $( '.caption ' , pin );
      var caption_width = parseInt(caption.outerWidth());
      var image_offset = parseInt(image.offset().left)+pin_width;
      caption.css('margin-left','-'+ (caption_width/2)+'px');
      // if too much too the left
      if ( parseInt(caption.offset().left) < parseInt(image.offset().left) ) {
        caption.css('margin-left',parseInt(caption.css('margin-left')) + (parseInt(image.offset().left)-parseInt(caption.offset().left)) + 'px');
      } else { // if too much too the right
        var caption_offset = (parseInt(caption.offset().left)+caption_width)
        if ( caption_offset > image_offset ) {
          caption.css('margin-left','-' + ((caption_width/2)+(caption_offset-image_offset)) + 'px');
        }

      }

      // hide caption after getting its width etc...
      caption.hide()

      // adding click to buttons
      $( '.caption .close' , pin).click( function() {
        icon.trigger('click');
      });
      icon.click( function() {
        pin.toggleClass('active');
        caption.toggle( 500, 'swing', function() { });
      })
    });
  }
});
