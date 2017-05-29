$('header nav').removeClass('navbar-scroll');
$('header button.logout').removeClass('logout-scroll');
$('header nav').addClass('navbar-noscroll');
$('header button.logout').addClass('logout-noscroll');

$(document).ready(function() {
	$(window).scroll(function() {
    if($(document).scrollTop() > 100) {
    	$('header nav').removeClass('navbar-noscroll');
			$('header nav').addClass('navbar-scroll');
			$('header button.logout').removeClass('logout-noscroll');
			$('header button.logout').addClass('logout-scroll');
    }
    else {
      $('header nav').addClass('navbar-noscroll');
			$('header nav').removeClass('navbar-scroll');
			$('header button.logout').addClass('logout-noscroll');
			$('header button.logout').removeClass('logout-scroll');
    }
  });
});
