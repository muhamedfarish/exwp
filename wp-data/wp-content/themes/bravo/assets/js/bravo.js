(function($) {
    "use strict"; 
    $(function() {     	
    	var winWidth = $(window).width();   	
    	// header navigation    	
    	dropDown();	
		$(window).resize(function() {
			dropDown();
		});						
		function dropDown() {			
			if (winWidth > 768) {
				$('header nav .menu-item-has-children').hover(
					function() {
				    	$(this).find('ul').fadeIn('fast');
					}, function() {
				    	$(this).find('ul').fadeOut('fast');
				  }
				);
				$('header nav').css('display','block');	
			}	
		}
		// fixed nav
		if ($('#hero-block').length == 1) {
			var stickyOffset = $('#hero-block').offset().top;
			$(window).scroll(function(){
			  var sticky = $('#header-sticky'),
			      scroll = $(window).scrollTop();
			  if (scroll >= stickyOffset) {
			  	sticky.addClass('fixed');		  	
			  } else {
			  	sticky.removeClass('fixed');
			  }
			});
			// hero block
			if (winWidth > 992) {
				var heroHeight = $('#hero-block').height() /2.3;
				$('#hero-block a').css('margin-top',heroHeight);
			}
		}	
		// mobile nav
		$('#hamburger').click(function() {
		  $('header nav').toggle();
		});	
		// single title position
		if ($('body').hasClass('single')) {
			var titleHeight = $('#post-title-img').height();			
			if (titleHeight < 36) {
				$('#post-title-img').addClass('single');
			} else {
				$('#post-title-img').addClass('double');
			}
		}
 	}); 
}(jQuery));