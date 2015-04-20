$(function() {
    secondthoughtSliderInstances = $('.so-widget-secondthought-slider-widget');

    $('.secondthought-slider').each(function(){

      var $this = $(this),
          autoplaySetting = $this.data('autoplay') != 0 ? true : false,
          autoplaySpeedSetting = $this.data('autoplay-speed'),
          FadeSetting = $this.data('fade') != 0 ? true : false,
          AnimationSpeedSetting = $this.data('animation-speed');
          showArrow = $this.data('showarrow') != 0 ? true : false,
          arrowIconRight = $this.data('arrow-icon-right');
          arrowIconLeft = $this.data('arrow-icon-left');
          arrowSize = $this.data('arrow-size');
          arrowIndent = $this.data('arrow-indent');

      $this.slick({
        autoplay: autoplaySetting,
        autoplaySpeed: autoplaySpeedSetting,
        fade: FadeSetting,
        speed: AnimationSpeedSetting,
        dots: true,
        arrows: showArrow,
        nextArrow: '<button type="button" data-role="none" class="fa fa-'+arrowIconRight+' slick-next" aria-label="next" style="margin-top: -'+arrowSize/2+'px;right:'+arrowIndent+'px;font-size: '+arrowSize+'px; display: block; color: rgb(193, 193, 193);"></button>',
        prevArrow: '<button type="button" data-role="none" class="fa fa-'+arrowIconLeft+' slick-prev" aria-label="previous" style="margin-top: -'+arrowSize/2+'px;left:'+arrowIndent+'px;font-size: '+arrowSize+'px; display: block; color: rgb(193, 193, 193);"></button>'
      });

      $this.find('.slick-dots button').css('font-size', $this.data('dots-size'));
      $this.find('.slick-dots li').css('margin', '0px '+$this.data('dots-spacing')+'px');
      $this.find('.slick-dots ul').css('bottom', $this.data('dots-position')+'px');
      $this.find('button').css('color', $this.data('dots-color-passive'));
      $this.find('.slick-active button').css('color', $this.data('dots-color-active'));

      $this.on('afterChange', function(){
        // console.log("Slide change!");
        $this.find('button').css('color', $this.data('dots-color-passive'));
        $this.find('.slick-active button').css('color', $this.data('dots-color-active'));
      });

      // Find sliders within full-height-elements
      $('[class*=full-height-]').find('.slick-slider').parent().css('height', 'inherit');
      $('[class*=full-height-]').find('.slick-slider').parent().parent().css('height', 'inherit');
      $('[class*=full-height-]').find('.slick-slider').parent().parent().parent().css('height', 'inherit');

    })
});
