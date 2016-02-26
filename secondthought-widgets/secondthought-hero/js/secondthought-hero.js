/**
 * SiteOrigin Slider Javascript.
 *
 * Copyright 2014, Greg Priday
 * Released under GPL 2.0 - see http://www.gnu.org/licenses/gpl-2.0.html
 */

var siteoriginSlider = {};
jQuery( function($){

    var playSlideVideo = siteoriginSlider.playSlideVideo = function(el) {
        $(el).find('video').each(function(){
            if(typeof this.play !== 'undefined') {
                this.play();
            }
        });
    };

    var pauseSlideVideo = siteoriginSlider.pauseSlideVideo = function(el) {
        $(el).find('video').each(function(){
            if(typeof this.pause !== 'undefined') {
                this.pause();
            }
        });
    };

    var setupActiveSlide = siteoriginSlider.setupActiveSlide = function(slider, newActive, speed){
        // Start by setting up the active sentinel
        var
            sentinel = $(slider).find('.cycle-sentinel'),
            active = $(newActive),
            video = active.find('video.secondthought-background-element');

        if( speed == undefined ) {
            sentinel.css( 'height', active.outerHeight() );
        }
        else {
            sentinel.animate( {height: active.outerHeight()}, speed );
        }

        if( video.length ) {

            // Resize the video so it fits in the current slide
            var
                slideRatio = active.outerWidth() / active.outerHeight(),
                videoRatio = video.outerWidth() / video.outerHeight();

            if( slideRatio > videoRatio ) {
                video.css( {
                    'width' : '100%',
                    'height' : 'auto'
                } );
            }
            else {
                video.css( {
                    'width' : 'auto',
                    'height' : '100%'
                } );
            }

            video.css( {
                'margin-left' : -Math.ceil(video.width()/2),
                'margin-top' : -Math.ceil(video.height()/2)
            } );
        }
    };

    $('.secondthought-slider-images').each(function(){
        var $$ = $(this);
        var $p = $$.siblings('.secondthought-slider-pagination');
        var $base = $$.closest('.secondthought-slider-base');
        var $n = $base.find('.secondthought-slide-nav');
        var $slides = $$.find('.secondthought-slider-image');
        var settings = $$.data('settings');

        $slides.each(function( index, el) {
            var $slide = $(el);
            var urlData = $slide.data('url');
            $slide.click(function(event) {
                if( event.target == $slide || $(event.target).is('.secondthought-slider-image-wrapper')) {
                    window.open(urlData.url, urlData.new_window ? '_blank' : '_self');
                }
            })
        });

        var setupSlider = function(){
            // Show everything for this slider
            $base.show();

            // Setup each of the slider frames
            $$.find('.secondthought-slider-image').each( function(){
                var $i = $(this);

                $(window)
                    .resize(function(){
                        // $i.css( 'height', $i.find('.secondthought-slider-image-wrapper').outerHeight() );
                    })
                    .resize();
            } );

            // Set up the Cycle with videos
            $$
                .on({
                    'cycle-after' : function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag){
                        var $$ = $(this);
                        playSlideVideo(incomingSlideEl);
                        setupActiveSlide( $$, incomingSlideEl );
                    },

                    'cycle-before' : function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
                        var $$ = $(this);
                        $p.find('> li').removeClass('secondthought-active').eq(optionHash.slideNum-1).addClass('secondthought-active');
                        pauseSlideVideo(outgoingSlideEl);
                        setupActiveSlide($$, incomingSlideEl, optionHash.speed);
                    },

                    'cycle-initialized' : function(event, optionHash){
                        playSlideVideo( $(this).find('.cycle-slide-active') );
                        setupActiveSlide( $$, optionHash.slides[0] );

                        $p.find('>li').removeClass('secondthought-active').eq(0).addClass('secondthought-active');
                        if(optionHash.slideCount <= 1) {
                            // Special case when there is only one slide
                            $p.hide();
                            $n.hide();
                        }

                        $(window).resize();
                    }
                })
                .cycle( {
                    'slides' : '> .secondthought-slider-image',
                    'speed' : settings.speed,
                    'timeout' : settings.timeout,
                    'swipe' : true,
                    'swipe-fx' : 'scrollHorz',
                    'auto-height' : 0
                } );

            $$ .find('video.secondthought-background-element').on('loadeddata', function(){
                setupActiveSlide( $$, $$.find( '.cycle-slide-active' ) );
            } );

            // Set up showing and hiding navs
            $p.add($n).hide();
            if( !$base.hasClass('secondthought-slider-is-mobile') && $slides.length > 1 ) {

                var toHide = false;
                $base
                    .mouseenter(function(){
                        $p.add($n).clearQueue().fadeIn(150);
                        toHide = false;
                    })
                    .mouseleave(function(){
                        toHide = true;
                        setTimeout(function(){
                            if( toHide ) {
                                $p.add($n).clearQueue().fadeOut(150);
                            }
                            toHide = false;
                        }, 750);
                    });
            }

            // Resize the sentinel when ever the window is resized
            $( window ).resize( function(){
                setupActiveSlide( $$, $$.find( '.cycle-slide-active' ) );
            } );

            // Setup clicks on the pagination
            $p.find( '> li > a' ).click( function(e){
                e.preventDefault();
                $$.cycle( 'goto', $(this).data('goto') );
            } );

            // Clicking on the next and previous navigation buttons
            $n.find( '> a' ).click( function(e){
                e.preventDefault();
                $$.cycle( $(this).data('action') );
            } );

            $base.keydown(
                function(event) {
                    if(event.which === 37) {
                        //left
                        $$.cycle('prev');
                    }
                    else if (event.which === 39) {
                        //right
                        $$.cycle('next');
                    }
                }
            );
        };

        var images = $$.find('img');
        var imagesLoaded = 0;
        var sliderLoaded = false;

        // Preload all the images, when they're loaded, then display the slider
        images.each( function(){
            var $i = $(this);
            if( this.complete ) {
                imagesLoaded++;
            }
            else {
                $(this).one('load', function(){
                    imagesLoaded++;

                    if(imagesLoaded === images.length && !sliderLoaded) {
                        setupSlider();
                        sliderLoaded = true;
                    }
                })
                // Reset src attribute to force 'load' event for cached images in IE9 and IE10.
                .attr('src', $(this).attr('src'));
            }

            if(imagesLoaded === images.length && !sliderLoaded) {
                setupSlider();
                sliderLoaded = true;
            }
        } );

        if(images.length === 0) {
            setupSlider();
        }
    });
} );
