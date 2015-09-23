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
      full_width            = $slider.data('full-width');

      $slider.slick({
        autoplay: autoplay_setting,
        autoplaySpeed: autoplay_speed,
        fade: fade_setting,
        speed: animation_speed,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        dots: dots_show,
        arrows: arrow_show,
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
    } if ($slider.find('.left')) {
      caption.css('max-width', container_width);
    } else {
      caption.css('max-width', container_width);
      caption.css('left', (window_size - container_width) / 2);
    }


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

    if (slider_height) {
      $this.find('.so-widget-secondthought-slider-widget-2').css('height', slider_height);
    } else {
      $this.find('.so-widget-secondthought-slider-widget-2').css('height', '100%');
    }


  });

});
