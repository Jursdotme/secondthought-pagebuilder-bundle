// Row backgroud opacity
$(document).ready(function(){
  var transparentElement = $('[data-bg-opacity]');

  console.log(transparentElement);

  transparentElement.each(function(){

    $this = $(this)

    var bgColor = $this.css('background-color');

    var transparentAmount = $this.data('bg-opacity');

    var result = bgColor.replace(')', ', '+(transparentAmount/100)+')').replace('rgb', 'rgba');

    $this.css('background-color', result);

  });
});

// Column background opacity OLD AND DEPRICATED
$(document).ready(function(){
  var transparentElement = $('[class*=transparency-]');

  transparentElement.each(function(){

    var bgColor = $(this).css('background-color');

    var transparentclass = $(this).attr('class');

    var classPosition = parseInt(transparentclass.search("transparency"), 10);
    var transparentAmount = transparentclass.substr(classPosition ,15).slice(-2);

    var result = bgColor.replace(')', ', '+(transparentAmount/100)+')').replace('rgb', 'rgba');

    $(this).css('background-color', result);

  });
});

// Row backgroud opacity OLD AND DEPRICATED
$(document).ready(function(){
  var transparentElement = $('[class*=background-]');

  transparentElement.each(function(){

    var bgColor = $(this).css('background-color');

    var transparentclass = $(this).attr('class');

    var classPosition = parseInt(transparentclass.search(" background-"), 10);

    var transparentAmount = transparentclass.substr(classPosition ,14).slice(-2);

    var result = bgColor.replace(')', ', '+(transparentAmount/100)+')').replace('rgb', 'rgba');

    $(this).css('background-color', result);

  });
});
