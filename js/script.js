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

    function initMainNavigation( container ) {
		// Add dropdown toggle that display child menu items.
		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggle-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this );
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	// Re-initialize the main navigation when it is updated, persisting any existing submenu expanded states.
	$( document ).on( 'customize-preview-menu-refreshed', function( e, params ) {
		if ( 'primary' === params.wpNavMenuArgs.theme_location ) {
			initMainNavigation( params.newContainer );

			// Re-sync expanded states from oldContainer.
			params.oldContainer.find( '.dropdown-toggle.toggle-on' ).each(function() {
				var containerId = $( this ).parent().prop( 'id' );
				$( params.newContainer ).find( '#' + containerId + ' > .dropdown-toggle' ).triggerHandler( 'click' );
			});
		}
	});

  var headerHeight = $('.headerslider').height();
  var adminHeight = $('#wpadminbar').height();
  var totalHeight = headerHeight + adminHeight;
  var navHeight = $('.main-navigation').height();
  $(window).bind('scroll', function() {
  if ($(window).scrollTop() + adminHeight > totalHeight && window.innerWidth > 872) {
   $('.main-navigation').addClass('navbar-fixed').css('marginTop',adminHeight);
   $('body').css('marginTop',navHeight);
   $('.site-logo a').css({
     'position' : 'fixed',
     'top' : navHeight + adminHeight + 16 + 'px',
     'transition' : 'all 1.5s ease-in-out'
   });
   }
   else {
     $('.main-navigation').removeClass('navbar-fixed').css('marginTop',0);
     $('body').css('marginTop','0');
     $('.site-logo a').css({
       'position' : 'absolute',
       'top' : adminHeight + 16 + 'px'
     })
   }
  });

  // $(window).scroll(function() {
  //
  //   var wScroll = $(this).scrollTop();
  //   var menuHeight = $('.main-navigation').height();
  //   var sliderImg = $('.headerslider').height();
  //   var adminBar = $('#wpadminbar').height();
  //   if (wScroll >= sliderImg ) {
  //   }
  //
  //     $('.main-navigation').css({
  //       'position' : 'fixed',
  //       'top' : adminBar + 'px',
  //       'max-width' : 1600,
  //       'z-index' : 1000
  //     });
  //     $('.site-content').css({
  //       'margin' : menuHeight + 'px auto 0'
  //     });
  //
  //   } else {
  //     $('.main-navigation').css({
  //       'position' : 'relative',
  //       'top' : 0,
  //     });
  //     $('.site-content').css({
  //       'margin' : '0 auto'
  //     });
  //   }
  //
  //   if (window.innerWidth <= 872) {
  //     $('.main-navigation').css({
  //       'position' : 'fixed',
  //       'top' : '100%',
  //       'bottom' : 0,
  //       'z-index' : 1001,
  //       'box-shadow' : 'none'
  //     });
  //   }
  //
  // });

});
