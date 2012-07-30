/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// Place your code here.


})(jQuery, Drupal, this, this.document);



(function($, Drupal, window, document, undefined){

	Drupal.behaviors.userProfileCycle = {
	    attach: function(context, settings) {
			$('.user-profile-portfolios-thumbnails').each(function() {
				$(this).cycle({ 
			    pause:  0,
				fx:     'fade',
				speed: 1000,
				timeout: 70,
			}).cycle('pause');

			// Pause & play on hover
			$('.user-profile-my-portfolios').hover(function(){
				$(this).find('.user-profile-portfolios-thumbnails').addClass('active').cycle('resume');
			}, function(){
				$(this).find('.user-profile-portfolios-thumbnails').removeClass('active').cycle('pause');
			});
	   	            


			// timeouts per slide (in seconds), fucking math
	
			});
		}
	}
})(jQuery, Drupal, this, this.document);