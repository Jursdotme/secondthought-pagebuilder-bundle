var calculateImageHeight = function(imageDiv){
    imageDiv.css('height', 0);
    parentHeight = imageDiv.closest('.panel-row-style').outerHeight();
    parentWidth = imageDiv.closest('.so-panel').outerWidth();

    addedMargin = imageDiv.closest('.panel-row-style').css("margin-right");
    addedMargin = parseInt(addedMargin)*-1;

    calculatedWidth = parentWidth+addedMargin;

    if(imageDiv.closest('.panel-grid-cell').is(':first-child')){
      imageDiv
        .css('height', parentHeight+"px")
        .css('width', calculatedWidth+"px")
        .css('margin-left', addedMargin*-1);
    } else {
      imageDiv
        .css('height', parentHeight+"px")
        .css('width', calculatedWidth+"px");
    }
    if ($(window).width() < 767) {
      imageDiv.css('width', (imageDiv.parent().outerWidth())+30);
    }

};

var resizeId;
$(window).resize(function() {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 500);

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


  var fullContainer = $('body');
    if( fullContainer.length === 0 ) {
        fullContainer = $('body');
    }
  $('.remove-outer-margin').each(function(){
    var $$ = $(this);

      var onResizeCustom = function(){

        var leftSpace = $$.closest('.so-panel').offset().left - fullContainer.offset().left;
        var rightSpace = fullContainer.outerWidth() - leftSpace - $$.parent().outerWidth();
        // console.log(fullContainer.offset().left);
        // console.log(leftSpace);

        if ($$.closest('.panel-grid-cell').is(':first-child')) {
          $$.css({
              'margin-left' :-leftSpace,
              'padding-left' : leftSpace
          });
        } if ($$.closest('.panel-grid-cell').is(':last-child')) {
          $$.css({
              'margin-right' :-rightSpace,
              'padding-right' : rightSpace
          });
        }

      };


      onResizeCustom();

      $(window).on('resize', throttle(function (event) {
          onResizeCustom();
      }, 100));

      $$.css({
          'border-left' : 0,
          'border-right' : 0
      });
  });
});
