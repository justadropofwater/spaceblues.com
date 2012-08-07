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

	Drupal.behaviors.browseCycle = {
	    attach: function(context, settings) {
			$('.browse-portfolios-thumbnails').each(function() {
				$(this).cycle({ 
			    	pause:  0,
			    	fx:     'fade',
					speed: 1000,
					timeout: 70,
				}).cycle('pause');
				// Pause & play on hover
				$('.browse-portfolios').hover(function(){
					$(this).find('.browse-portfolios-thumbnails').addClass('active').cycle('resume');
										$(this).find('.browse-portfolios-author-details').css('visibility','visible');

				}, function(){
					$(this).find('.browse-portfolios-thumbnails').removeClass('active').cycle('pause');
										$(this).find('.browse-portfolios-author-details').css('visibility','hidden');	

				
				});	   	           
			});
		
/*
			$('.browse-portfolios').each(function() {
				$('.browse-portfolios-details').hover(function(){
					$(this).find('.browse-portfolios-author-details').css('visibility','visible');
					}, function(){
					$(this).find('.browse-portfolios-author-details').css('visibility','hidden');	
				});
			});
*/
			
		}
	}
})(jQuery, Drupal, this, this.document);