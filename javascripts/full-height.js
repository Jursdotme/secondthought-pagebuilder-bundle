$(document).ready(function(){

  // Find fillerup targets
  var fillerup = $('.fillerup');

  fillerup.each(function(){

    $this = $(this);

    var instanceSubtract = $this.data('subtract');
    var instanceMinHeight = $this.data('minheight');
    var instanceMaxHeight = $this.data('maxheight');

    console.log(instanceSubtract);
    $this.Fillerup({
      subtract: parseInt(instanceSubtract),
      minHeight: parseInt(instanceMinHeight),
      maxHeight: parseInt(instanceMaxHeight)
    });

  });
});

// .full-height-100-500-900 (DEPRICATED)
$(document).ready(function(){
  var fullHeighElement = $('[class*=full-height-]');

  // console.log(fullHeighElement);

  fullHeighElement.each(function(){

    $this = $(this);

    var theClass = $this.attr('class');

    var classArray = theClass.split(' ');

    Array.prototype.find = function(match) {
      var matches = [];
      $.each(this, function(index, str) {
          if(str.indexOf(match) !== -1) {
              matches.push(index);
          }
      });
      return matches;
    }

    // Find the full-height... class and isolate it in a variable
    var wantedPosition = classArray.find('full-height-');
    var fullHeightSettings = classArray[ wantedPosition[1]];

    // Split the full-height.. variable into an array containing the wanted settings
    var fullHeightSettings = fullHeightSettings.split('-');

    // console.log(fullHeightSettings);
    $this.Fillerup({
      subtract: fullHeightSettings[2],
      minHeight: fullHeightSettings[3],
      maxHeight: fullHeightSettings[4]
    });

  });
});

$('.scroll-button').append( "<a href='#' class='scroll-arrow'><i class='fa fa-angle-down'></i></a>" );

$('.scroll-arrow').on('click', function() {

  blockOffset = $(this).parent().offset().top;
  blockHeight = $(this).parent().outerHeight();

  $("html, body").animate({
    scrollTop: blockOffset+blockHeight
  }, 600);

});
