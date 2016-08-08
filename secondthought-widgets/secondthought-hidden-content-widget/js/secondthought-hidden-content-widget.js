$(function() {
  $( ".appender" ).each(function( index ) {
    var appender = $( this );

    $('.read-more, .close', appender).click( function(){
      console.log(appender)
      $('.appended-content', appender).slideToggle(500);
      appender.toggleClass('inactive active');
    });

  });
});
