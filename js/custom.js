 $( document ).ready( function() {



	// Tabbed Boasts
	$( '.tab-links a:first-of-type' ).addClass( 'active' );
	$( '.tab-content-block:first-of-type' ).addClass( 'active' ).css( 'display', 'block' );

	$( '.tab-links a' ).on( 'click', function( e )
		{
			e.preventDefault();
			// Create unique identifier for code
			$clicked = $( this ).data( 'ref' );
			
			// Remove active class from tab-link
			$( '.tab-links a' ).removeClass( 'active' );

			$( this ).addClass( 'active' );

			// Remove active class from any tab-content
			if ( $( '.tab-content-block' ).hasClass( 'active' ) ) {
				$( '.tab-content-block' ).removeClass( 'active' ).css( 'display', 'none' );
			}

			// Add active class to selected tab-content from tab-link a
			$( '.tab-content' ).find( '#' + $clicked ).addClass( 'active' ).fadeIn();

		}
	);



	// Smooth Scroll for Back To Top Button *Thank you CSS-TRICKS*
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
				return false;
			}
		}
	});
});

