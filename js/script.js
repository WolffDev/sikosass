jQuery(document).ready(function($) {

    //Smooth scroll effect til anchor på samme side
    $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 2000);
        return false;
      }
    }
  });

  var position, direction, previous;

  	$(window).scroll(function() {
  		if( $(this).scrollTop() >= position ) {
  			direction ='down';
  			if(direction !== previous) {
  				$('.menu-toggle').addClass('hide');

  				previous =direction;
  			}
  		} else {
  			direction = 'up';
  			if('direction' !== previous) {
  				$('.menu-toggle').removeClass('hide');

  				previous = direction;
  			}
  		}
  		position = $(this).scrollTop();
  	});

});
