$(function() {
  var $elements = $('.matchheight > .panel-grid-cell > .so-panel, .left-nav');
  console.log($elements);
  $elements.children().matchHeight();
});
