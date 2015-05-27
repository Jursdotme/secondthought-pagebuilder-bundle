// Row background-size: Contain
$(document).ready(function(){
  $('.background-contain').css('background-size', 'contain').css('background-repeat', 'no-repeat').css('background-position', 'center');
});

// Column background opacity
$(document).ready(function(){
  var transparentElement = $('[class*=transparency-]');

  transparentElement.each(function(){

    var bgColor = $(this).css('background-color');

    var transparentclass = $(this).attr('class');

    var classPosition = parseInt(transparentclass.search("transparency"), 10);
    var transparentAmount = transparentclass.substr(classPosition ,15).slice(-2);

    var result = bgColor.replace(')', ', '+(transparentAmount/100)+')').replace('rgb', 'rgba');

    $(this).css('background-color', result);

  });
});

// Row backgroud opacity
$(document).ready(function(){
  var transparentElement = $('[class*=background-]');

  transparentElement.each(function(){

    var bgColor = $(this).css('background-color');

    var transparentclass = $(this).attr('class');

    var classPosition = parseInt(transparentclass.search(" background-"), 10);

    var transparentAmount = transparentclass.substr(classPosition ,14).slice(-2);

    var result = bgColor.replace(')', ', '+(transparentAmount/100)+')').replace('rgb', 'rgba');

    $(this).css('background-color', result);

  });
});

// Column border radius
$(document).ready(function(){
  var transparentElement = $('[class*=radius-]');

  transparentElement.each(function(){

    var borderradiusclass = $(this).attr('class');

    var classPosition = parseInt(borderradiusclass.search("radius-"), 10);

    var radius = borderradiusclass.substr(classPosition ,9).slice(7).trim();

    $(this).css('border-radius', radius+'px');

  });
});

var calculateImageHeight = function(imageDiv){


    imageDiv.css('height', 0)
    parentHeight = imageDiv.closest('.panel-row-style').outerHeight();
    parentWidth = imageDiv.closest('.so-panel').outerWidth();

    addedMargin = imageDiv.closest('.panel-row-style').css("margin-right");
    addedMargin = parseInt(addedMargin)*-1;

    calculatedWidth = parentWidth+addedMargin;

    if(imageDiv.closest('.panel-grid-cell').is(':first-child')){
      imageDiv
        .css('height', parentHeight+"px")
        .css('width', calculatedWidth+"px")
        .css('margin-left', addedMargin*-1)
    } else {
      imageDiv
        .css('height', parentHeight+"px")
        .css('width', calculatedWidth+"px")
    }
    if ($(window).width() < 767) {
      imageDiv.css('width',
      (imageDiv.parent().outerWidth())+30
    );
    }


}

var id;
$(window).resize(function() {
    clearTimeout(id);
    id = setTimeout(doneResizing, 500);

});

function doneResizing(){
  $('.fill-image').each(function(){
    calculateImageHeight($(this));
  });
}


$(document).ready(function() {

  $('.fill-image').each(function(){
    calculateImageHeight($(this));
  });

});

// .full-height-100-500-900
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

$(function() {
  var $elements = $('.matchheight > .panel-grid-cell > .so-panel');
  $elements.children().matchHeight();
});

$(document).ready(function(){

  $('.parallax').attr("data-stellar-background-ratio", ".3");

});

var isMobile = {
  Android: function() {
    return navigator.userAgent.match(/Android/i);
  },
  BlackBerry: function() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS: function() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  Opera: function() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  Windows: function() {
    return navigator.userAgent.match(/IEMobile/i);
  },
  any: function() {
    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
  }
};
jQuery(document).ready(function(){
  if( !isMobile.any() ){
    $(window).stellar({
      horizontalScrolling: false,
      //verticalOffset: 40,
      responsive: false,
      parallaxElements: false,
    });
  }
});
