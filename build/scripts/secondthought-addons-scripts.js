function doneResizing(){$(".fill-image").each(function(){calculateImageHeight($(this))})}$(document).ready(function(){$(".background-contain").css("background-size","contain").css("background-repeat","no-repeat").css("background-position","center")}),$(document).ready(function(){var t=$("[class*=transparency-]");t.each(function(){var t=$(this).css("background-color"),a=$(this).attr("class"),e=parseInt(a.search("transparency"),10),i=a.substr(e,15).slice(-2),r=t.replace(")",", "+i/100+")").replace("rgb","rgba");$(this).css("background-color",r)})}),$(document).ready(function(){var t=$("[class*=background-]");t.each(function(){var t=$(this).css("background-color"),a=$(this).attr("class"),e=parseInt(a.search(" background-"),10),i=a.substr(e,14).slice(-2),r=t.replace(")",", "+i/100+")").replace("rgb","rgba");$(this).css("background-color",r)})}),$(document).ready(function(){var t=$("[class*=radius-]");t.each(function(){var t=$(this).attr("class"),a=parseInt(t.search("radius-"),10),e=t.substr(a,9).slice(7).trim();$(this).css("border-radius",e+"px")})});var calculateImageHeight=function(t){t.css("height",0),parentHeight=t.closest(".panel-row-style").outerHeight(),parentWidth=t.closest(".so-panel").outerWidth(),addedMargin=t.closest(".panel-row-style").css("margin-right"),addedMargin=-1*parseInt(addedMargin),calculatedWidth=parentWidth+addedMargin,t.closest(".panel-grid-cell").is(":first-child")?t.css("height",parentHeight+"px").css("width",calculatedWidth+"px").css("margin-left",-1*addedMargin):t.css("height",parentHeight+"px").css("width",calculatedWidth+"px"),$(window).width()<767&&t.css("width",t.parent().outerWidth()+30)},id;$(window).resize(function(){clearTimeout(id),id=setTimeout(doneResizing,500)}),$(document).ready(function(){$(".fill-image").each(function(){calculateImageHeight($(this))})}),$(document).ready(function(){var t=$("[class*=full-height-]");t.each(function(){$this=$(this);var t=$this.attr("class"),a=t.split(" ");Array.prototype.find=function(t){var a=[];return $.each(this,function(e,i){-1!==i.indexOf(t)&&a.push(e)}),a};var e=a.find("full-height-"),i=a[e[1]],i=i.split("-");$this.Fillerup({subtract:i[2],minHeight:i[3],maxHeight:i[4]})})}),$(".scroll-button").append("<a href='#' class='scroll-arrow'><i class='fa fa-angle-down'></i></a>"),$(".scroll-arrow").on("click",function(){blockOffset=$(this).parent().offset().top,blockHeight=$(this).parent().outerHeight(),$("html, body").animate({scrollTop:blockOffset+blockHeight},600)}),$(function(){var t=$(".matchheight > .panel-grid-cell > .so-panel");t.children().matchHeight()}),$(document).ready(function(){$(".parallax").attr("data-stellar-background-ratio",".3")});var isMobile={Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},any:function(){return isMobile.Android()||isMobile.BlackBerry()||isMobile.iOS()||isMobile.Opera()||isMobile.Windows()}};jQuery(document).ready(function(){isMobile.any()||$(window).stellar({horizontalScrolling:!1,responsive:!1,parallaxElements:!1})});