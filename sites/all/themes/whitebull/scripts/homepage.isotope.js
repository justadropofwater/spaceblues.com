
(function($){
	Drupal.behaviors.isotope = {
	    attach: function(context, settings) {
	    	var $container = $('#content-middle div.view-latest-studios div.view-content #container');
	    	
	    	$container.isotope({
	        	itemClass: 'element',
	        	layoutMode: 'masonry',
	        	masonry: {
	         		columnWidth: 180
	         		},
	        });
	     
	        $('#content-middle div.view-latest-studios div.view-content #container .element').hover(
	            function() {
	                $(this).find('.overlay').fadeIn('fast');
	            },
	            function() {
	                $(this).find('.overlay').hide();
	            }
	        );
	            
	    }  
	}
})(jQuery);