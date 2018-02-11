$(document).ready(function(){
    $('.user_dropdown').click(function(){
        $(".dropdown_content").slideToggle();
    });

    //show or hide user dropdown on click
    $(".dropbtn").click(function(){
    	  $(".fa-caret-down").toggleClass("arrow_rotate");
    });
});

/* ----------------------------------------------------------- */

// remove flash messages
$(document).ready(function() {
    $(".fa-times").click(function() {
      $(".msg").fadeOut(700,"swing");
    });
});

/* ----------------------------------------------------------- */

// show or hide article links on hover
$(function () {
	$('.article_link').hover(function(){
      $(".new_article").slideToggle('slow');
    });
});

/* ----------------------------------------------------------- */

// show or hide user links on hover
$(function () {
	$('.user_link').hover(function(){
      $(".new_user").slideToggle('slow');
    });
});

/* ----------------------------------------------------------- */

// display real time
$(document).ready(function() {
    var interval = setInterval(function() {
        var now = moment();
        // $('#date').html(now.format('YYYY MMMM DD') + ' ' + now.format('dddd').substring(0,3).toUpperCase());
        $('#date').html(now.format('HH:mm:ss'));
    }, 100);
});

/* ----------------------------------------------------------- */

// show or hide admin burger
$(document).ready(function() {
    
  var btn   = $('#nav_burger');
  var menu  = $('.menu_links');

  $(btn).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle('slow');
  });
  
  $(window).resize(function(){
    var sirina = $(window).width();
    if(sirina > 768 && menu.is(':hidden')) {
      menu.removeAttr('style');
    } 
  });
  
});

$(document).ready(function(){
    $('#nav_burger').on( "click", function(){
        $(this).toggleClass('open');
    });
});

/* ----------------------------------------------------------- */
