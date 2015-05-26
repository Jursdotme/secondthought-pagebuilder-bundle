$(function() {
  $('.widget_secondthought-image-button-widget').each(function() {
    $this = $(this);
    $backgroundColor = $this.find('> div').css('background-color');
    $figure = $this.find('figure');
    $figure.css('background-color', $backgroundColor);

    $figureWidth = $figure.outerWidth();
    // $figureHeight = $figure.css('height', $figureWidth/1.777777777777778);
    console.log($figureWidth);
  });
});
