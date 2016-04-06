$(document).ready(function(){

  // Find fillerup targets
  var fillerup = $('.fillerup');

  fillerup.each(function(){

    $this = $(this);

    var instanceSubtract = $this.data('subtract');
    var instanceMinHeight = $this.data('minheight');
    var instanceMaxHeight = $this.data('maxheight');
    var headerHeight = $('.header_wrapper').outerHeight();
    var subtractedHeight = "";

    if ($this.data('subtractheader') == "1") {
      subtractedHeight = headerHeight;
    } else {
      subtractedHeight = instanceSubtract;
    }

    // console.log(instanceSubtract);
    $this.Fillerup({
      subtract: parseInt(subtractedHeight),
      minHeight: parseInt(instanceMinHeight),
      maxHeight: parseInt(instanceMaxHeight)
    });

  });
});

$('.scroll-button').each(function() {

  var scrolltext = $(this).data('scroll-text');
  var scrollcolor = $(this).data('scroll-color');
  var scrollicon = $(this).data('scroll-icon');

  if (scrollcolor != undefined && scrollcolor != "") {
    scrollcolor = 'style="color: ' + scrollcolor + '"';
  } else {
    scrollcolor = '';
  }
  if (scrolltext != undefined && scrolltext != "") {
    scrolltext = '<h4 '+scrollcolor+'>' + scrolltext + '</h4>';
  } else {
    scrolltext = '';
  }
  if (scrollicon != undefined && scrollicon != "") {
    scrollicon = scrollicon;
  } else {
    scrollicon = 'fa-angle-down';
  }
  $(this).prepend( "<a href='javascript:void(0);' class='scroll-arrow' "+scrollcolor+">" + scrolltext + "<i class='fa "+scrollicon+"'></i></a>" );
});

$('.scroll-arrow').on('click', function() {

  blockOffset = $(this).parent().offset().top;
  blockHeight = $(this).parent().outerHeight();

  $("html, body").animate({
    scrollTop: blockOffset+blockHeight
  }, 600);

});

if ( $('.fillerup .widget_secondthought-hero').length ) {
  $('.secondthought-slider-image-wrapper').parentsUntil('.fillerup').css('height', '100%');
}
