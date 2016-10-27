$(document).ready(function(){

  $('.widget_secondthought-slider-widget-2').css('height', '100%');

  $('.widget_secondthought-slider-widget-2').each(function(){

    var $this = $(this);
    var $slider = $this.find('.secondthought-slider-2'),
      autoplay_setting      = $slider.data('autoplay') != 0 ? true : false,
      autoplay_speed        = $slider.data('autoplay-speed'),
      fade_setting          = $slider.data('fade') != 0 ? true : false,
      animation_speed       = $slider.data('animation-speed'),
      dots_show             = $slider.data('dots-show') != 0 ? true : false,
      dots_size             = $slider.data('dots-size'),
      dots_spacing          = $slider.data('dots-spacing'),
      dots_position         = $slider.data('dots-position'),
      dots_color_passive    = $slider.data('dots-color-passive'),
      dots_color_active     = $slider.data('dots-color-active'),
      arrow_show            = $slider.data('arrow-show') != 0 ? true : false,
      arrow_icon_right      = $slider.data('arrow-icon-right'),
      arrow_icon_left       = $slider.data('arrow-icon-left'),
      arrow_size            = $slider.data('arrow-size'),
      arrow_color           = $slider.data('arrow-color'),
      arrow_indent          = $slider.data('arrow-indent'),
      caption               = $slider.find('.caption'),
      window_size           = $(window).width(),
      container_width       = $('.caption').closest('.panel-grid').width(),
      slider_height         = $slider.data('slider-height'),
      full_height           = $slider.data('full-height'),
      full_width            = $slider.data('full-width'),
      $slides_desktop       = parseInt($slider.data('slides-desktop')),
      $slides_tablet        = parseInt($slider.data('slides-tablet')),
      $slides_mobile        = parseInt($slider.data('slides-mobile')),
      $slides_count = $( '.slide' , $slider ).length;
      if ($slides_desktop > $slides_count) { $slides_desktop = $slides_count; }
      if ($slides_tablet > $slides_count) { $slides_tablet = $slides_count; }
      if ($slides_mobile > $slides_count) { $slides_mobile = $slides_count; }

    //thumbnails
    var $thumbnails = $( '.slider-thumbnails' , $slider.parent() );
    if ($thumbnails.length) {
      var $thumbs_desktop = parseInt($thumbnails.data('thumbs-desktop'));
      var $thumbs_tablet = parseInt($thumbnails.data('thumbs-tablet'));
      var $thumbs_mobile = parseInt($thumbnails.data('thumbs-mobile'));
      var $thumbs_count = $( '.thumbnail' , $thumbnails ).length;
      var $thumbs_arrows = $thumbnails.data('arrows');
      var $thumbs_centered = $thumbnails.data('centered');
      if ($thumbs_desktop > $thumbs_count) { $thumbs_desktop = $thumbs_count; }
      if ($thumbs_tablet > $thumbs_count) { $thumbs_tablet = $thumbs_count; }
      if ($thumbs_mobile > $thumbs_count) { $thumbs_mobile = $thumbs_count; }
      $thumbnails.slick({
        slidesToShow: $thumbs_desktop,
        slidesToScroll: 1,
        asNavFor: $slider,
        dots: false,
        centerMode: $thumbs_centered,
        focusOnSelect: true,
        arrows: $thumbs_arrows,
        infinite: true,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: $thumbs_tablet,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: $thumbs_mobile,
            slidesToScroll: 1,
          }
        }],
        nextArrow: '<button type="button" data-role="none" class="fa fa-'+arrow_icon_right+' slick-next" aria-label="next" style="margin-top: -'+arrow_size/2+'px;right:'+arrow_indent+'px;font-size: '+arrow_size+'px; display: block; color: '+arrow_color+';"></button>',
        prevArrow: '<button type="button" data-role="none" class="fa fa-'+arrow_icon_left+' slick-prev" aria-label="previous" style="margin-top: -'+arrow_size/2+'px;left:'+arrow_indent+'px;font-size: '+arrow_size+'px; display: block; color: '+arrow_color+';"></button>'
      });

    }

      $slider.slick({
        slidesToShow: $slides_desktop,
        slidesToScroll: 1,
        autoplay: autoplay_setting,
        autoplaySpeed: autoplay_speed,
        fade: fade_setting,
        speed: animation_speed,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        dots: dots_show,
        arrows: arrow_show,
        asNavFor: $thumbnails,
        infinite: true,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: $slides_tablet,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: $slides_mobile,
            slidesToScroll: 1,
          }
        }],
        nextArrow: '<button type="button" data-role="none" class="fa fa-'+arrow_icon_right+' slick-next" aria-label="next" style="margin-top: -'+arrow_size/2+'px;right:'+arrow_indent+'px;font-size: '+arrow_size+'px; display: block; color: '+arrow_color+';"></button>',
        prevArrow: '<button type="button" data-role="none" class="fa fa-'+arrow_icon_left+' slick-prev" aria-label="previous" style="margin-top: -'+arrow_size/2+'px;left:'+arrow_indent+'px;font-size: '+arrow_size+'px; display: block; color: '+arrow_color+';"></button>'
      });

    $slider.find('.slick-dots li button').css('font-size', dots_size).html('&bull;');
    $slider.find('.slick-dots li').css('margin', '0px '+dots_spacing+'px');
    $slider.find('.slick-dots').css('bottom', dots_position+'px');
    $slider.find('.slick-dots li button').css('color', dots_color_passive);
    $slider.find('.slick-dots li.slick-active button').css('color', dots_color_active);

    $slider.on('afterChange', function(){
      $slider.find('.slick-dots li button').css('color', dots_color_passive);
      $slider.find('.slick-dots li.slick-active button').css('color', dots_color_active);
    });



    if (full_width) {
      caption.css('max-width', window_size);
    } else if ($slider.find('.left')) {
      caption.css('max-width', container_width);
    } else {
      caption.css('max-width', container_width);
      caption.css('left', (window_size - container_width) / 2);
    }

    $(window).resize(function() {
      if (full_width) {
        caption.css('max-width', window_size);
      } else if ($slider.find('.left')) {
        caption.css('max-width', container_width);
      } else {
        caption.css('max-width', container_width);
        caption.css('left', (window_size - container_width) / 2);
      }
    });


    $(caption).each(function(){
      var single_caption = $(this)
      if (full_height != true) {
        var caption_inner_height = single_caption.find('.caption-inner').height();
        var caption_inner_padding = single_caption.closest('.secondthought-slider-2').data('padding')*2;

        if (caption_inner_padding == '0') {
          var new_height = parseInt(caption_inner_height, 10);
        } else {
          var new_height = parseInt(caption_inner_height, 10) + parseInt(caption_inner_padding, 10);
        }
      } else {
        new_height=slider_height;
      }
      //console.log(new_height);

      single_caption.css('height', new_height + "px");

    });

    $this.parent().css('height', '100%');
    $this.find('.panel-widget-style').css('height', '100%');



    // if ($thumbnails.length) {

      // var i = 0;
      // $( '.thumbnail' , $thumbnails ).each( function() {
      //   $(this).click( function() {
      //     $slider.slick('slickGoTo',i);
      //   });
      //   i++;
      // });
    // }

    // if (slider_height) {
    //   $this.find('.so-widget-secondthought-slider-widget-2').css('height', slider_height);
    // } else {
    //   $this.find('.so-widget-secondthought-slider-widget-2').css('height', '100%');
    // }


  });

});
