// slideshow
$(document).ready(function(){
	$("#slideshow > div:gt(0)").hide();
	
	setInterval(function() { 
	  $('#slideshow > div:first')
	    .fadeIn(1000)
	    .next()
	    .fadeOut(1000)
	    .end()
	    .appendTo('#slideshow');
	},  6000);
});

/* ----------------------------------------------------------- */

// remove flash messages
$(document).ready(function() {
    $(".fa-times").click(function() {
        $(".msg").fadeOut(700,"swing");
    });
});

/* ----------------------------------------------------------- */

// user dropdown menu
$(document).ready(function() {
    $(".user_link").click(function() {
        $(".user_dropdown").slideToggle();
    });
});

/* ----------------------------------------------------------- */

// login dropdown menu
$(document).ready(function() {
    $(".login_link").hover(function() {
        $(".login_dropdown").slideToggle('slow');
    });
});

/* ----------------------------------------------------------- */

//rotate caret on click
$(function () {
    $(".user_link").click(function() {
    	$(".fa-caret-down").toggleClass("arrow_rotate");
    });
});

/* ----------------------------------------------------------- */

// sticky navigation
$(document).ready(function() {
	// grab the initial top offset of the navigation 
   	var sticky_nav_top = $('#navigation').offset().top;
   	
   	// our function that decides weather the navigation bar should have "fixed" css position or not.
   	var sticky_nav = function(){
	    var scroll_top = $(window).scrollTop(); // our current vertical position from the top
	         
	    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
	    // otherwise change it back to relative
	    if (scroll_top > sticky_nav_top) { 
	        $('#navigation').addClass('sticky slider');
	    } else {
	        $('#navigation').removeClass('sticky'); 
	    }
	};

	sticky_nav();
	// and run it again every time you scroll
	$(window).scroll(function() {
		sticky_nav();
	});
});

/* ----------------------------------------------------------- */

// count number of remaining characters
function count_char(val,num,where) {
    var len = val.value.length;
    if (len >= num) {
      val.value = val.value.substring(0, num);
    } else {
       $(where).html(num - len);
    }
};

/* ----------------------------------------------------------- */

// avatar change button show/hide on hover
$(function () {
    $(".profile_img").hover(function() {
        $(".proftle_img_upload").slideToggle();
        $(".profile_gradiant").css("background", "linear-gradient(to top, rgba(255,0,0,0), rgba(255,0,0,1))");
        // $(this).css("border", "10px solid red");
    });
});

/* ----------------------------------------------------------- */

// show or hide menu categories
$(document).ready(function() {
    
  var respmenu  = $('.list_categories_btn');
  var menu      = $('.list_categories');

  $(respmenu).on('click', function(e) {
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

/* ----------------------------------------------------------- */

// show or hide menu
$(document).ready(function() {
    
  var respmenu  = $('.list_pages_btn');
  var menu      = $('.list_pages,.user');

  $(respmenu).on('click', function(e) {
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