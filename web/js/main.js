$(document).ready(function() {
	$(window).scroll(function() {
    if($(document).scrollTop() > 100) {
    	$('header.head-landing nav').removeClass('navbar-noscroll');
			$('header.head-landing nav').addClass('navbar-scroll');
			$('header.head-landing button.logout').removeClass('logout-noscroll');
			$('header.head-landing button.logout').addClass('logout-scroll');
    }
    else {
      $('header.head-landing nav').addClass('navbar-noscroll');
			$('header.head-landing nav').removeClass('navbar-scroll');
			$('header.head-landing button.logout').addClass('logout-noscroll');
			$('header.head-landing button.logout').removeClass('logout-scroll');
    }
  });
});
