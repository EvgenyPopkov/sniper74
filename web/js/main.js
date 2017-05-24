$(document).ready(function() {
	$(window).scroll(function() {
    if($(document).scrollTop() > 100) {
    	$('nav').removeClass('navbar-noscroll');
			$('nav').addClass('navbar-scroll');
			$('.logout').removeClass('logout-noscroll');
			$('.logout').addClass('logout-scroll');
    }
    else {
      $('nav').addClass('navbar-noscroll');
			$('nav').removeClass('navbar-scroll');
			$('.logout').addClass('logout-noscroll');
			$('.logout').removeClass('logout-scroll');
    }
  });
});
