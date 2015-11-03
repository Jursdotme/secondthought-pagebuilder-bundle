$(function() {

  var $instance = $('.so-widget-secondthought-tabs-widget');

  $instance.each(function($i) {

    var $this = $(this);

    var $backgroundColor = $this.css('background-color');

    $this.css('background-color', 'transparent');

    // Add initial active classes
    $this.find('.tabs > li:first').addClass('active');
    $this.find('.tab-content > div:first').addClass('active');

    var removeActive = function() {
      $this.find('.active').removeClass('active');
    }

    var addActive = function($target) {

      var $targetId = $target.data('tab-trigger');

      $target.addClass('active');

      $("[data-tab-content='" + $targetId + "']").addClass('active')
    }

    $this.find('.tabs li').each(function($i) {

      var $tabItem = $(this);

      $tabItem.click(function() {
        var $tab = $(this);
        removeActive();
        addActive($tab);
      });

    });

  });

});
