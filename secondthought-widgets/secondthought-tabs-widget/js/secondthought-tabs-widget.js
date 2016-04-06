$(document).ready(function () {
  $('.accordion-tabs').each(function(index) {
    $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
    $(this).find('.tab-content').append('<div class="shadow-hider"></div>');

    // get horisontal postition of tab

    $(this).find('.shadow-hider').each(function(index) {
      $tabWidth = $(this).closest('li').find('.tab-link').innerWidth();
      $tabPosH = $(this).closest('li').find('.tab-link').position();
      $contentPosH = $(this).closest('ul').position();

      $(this).css('width', $tabWidth);
      $(this).css('left', parseInt($tabPosH.left, 10) - parseInt($contentPosH.left, 10));
    });



  });

  $('.accordion-tabs').on('click', '> li > a', function(event) {
    if (!$(this).hasClass('is-active')) {
      event.preventDefault();
      var accordionTabs = $(this).closest('.accordion-tabs');
      accordionTabs.find('.is-open').removeClass('is-open').hide();

      $(this).next().toggleClass('is-open').toggle();
      accordionTabs.find('.is-active').removeClass('is-active');
      $(this).addClass('is-active');


      $(this).find('.shadow-hider').css('width', $(this).find('.tab-link').outerWidth());
    } else {
      event.preventDefault();
    }

  });
});
