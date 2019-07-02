
(function ($) {
	jQuery(document).ready(function($) {

		jQuery('a.epsilon-button').on( 'click', function( e ){
			e.preventDefault();
			section = jQuery(this).data('section');
			if ( section ) {
				wp.customize.section( section ).focus();
			}
		});

	});
})(jQuery);
