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
