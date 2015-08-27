$(document).ready(function(){
  $('.secondthought-slider-2').slick({
    // Find options here: http://kenwheeler.github.io/slick/
  });

  $('.widget_secondthought-slider-widget-2').css('height', '100%');

  $('.widget_secondthought-slider-widget-2').each(function(){

    var $this = $(this);

    // set max width on caption
    var caption = $(this).find('.caption');
    var windowsize = $(window).width();
    var containerWidth = $('.caption').closest('.panel-grid').width();
    var initializedSlider = $this.find('.secondthought-slider-2');
    var sliderHeight = initializedSlider.data('sliderheight');

    if (initializedSlider.data('fullwidth')) {
      caption.css('max-width', windowsize);
    } if ($this.find('.left')) {
      caption.css('max-width', containerWidth);
    } else {
      caption.css('max-width', containerWidth);
      caption.css('left', (windowsize - containerWidth) / 2);
    }

    console.log(initializedSlider);

    $(caption).each(function(){
      var singleCaption = $(this)
      var captionInnerHeight = singleCaption.find('.caption-inner').height();
      var captionInnerPadding = singleCaption.closest('.secondthought-slider-2').data('padding')*2;

      if (captionInnerPadding == '0') {
        var newHeight = parseInt(captionInnerHeight, 10);
      } else {
        var newHeight = parseInt(captionInnerHeight, 10) + parseInt(captionInnerPadding, 10);
      }

      console.log(newHeight);

      singleCaption.css('height', newHeight + "px");

    });

    $this.parent().css('height', '100%');
    $this.find('.panel-widget-style').css('height', '100%');

    if (sliderHeight) {
      $this.find('.so-widget-secondthought-slider-widget-2').css('height', sliderHeight);
    } else {
      $this.find('.so-widget-secondthought-slider-widget-2').css('height', '100%');
    }


  });

});
