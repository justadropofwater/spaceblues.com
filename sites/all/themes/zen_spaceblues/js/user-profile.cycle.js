
(function($){

	Drupal.behaviors.userProfileCycle = {
	    attach: function(context, settings) {
			$('.user-profile-portfolios').each(function() {
				$(this).cycle({ 
			    pause:  1,
			    easeIn: 'easeInOutSine',
			    easeOut: 'easeInSine',
				fx:     'shuffle, bindY, scrollLeft, scrollRight, scrollHorz, scrollVert, toss, uncover, slideUp, slideDown, scrollUp, scrollDown',
				randomizeEffects: 1,
				speed: 900,
				timeout: 2000,
				delay: $(this).data('value'),
				sync: 0,
			});	   	            


			// timeouts per slide (in seconds), fucking math
	
			});
		}
	}
}(jQuery));