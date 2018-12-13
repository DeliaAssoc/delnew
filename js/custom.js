 $( document ).ready( function() {

	// Variables
	$mNav = $( '.main-navigation' ),
	$mChilds = $( '.menu-item-has-children' ),
	$hHeight = $( '.site-header' ).outerHeight();



	
	// Move site content down to line up with header(Due to position:fixed header)
	$( '.site-content' ).css( 'paddingTop', $hHeight );




	// Open Modal Nav
	$( '.menu-toggle' ).on( 'click', function( e ){

		e.preventDefault();
		$mNav.fadeIn();
	});

	// Close Modal Nav
	$mNav.on( 'click', '.close-menu', function( e ){

		e.preventDefault();
		$( this ).closest( $mNav ).fadeOut();
	});

	// Open Sub Navigation on Main Menu
	$mNav.on( 'click', '.menu-item-has-children', function( e ){
		
		if ( $( this ).find( '.sub-menu' ).hasClass( 'open' ) ) {
			$( this ).find( '.sub-menu' ).removeClass( 'open' ).slideUp();
		} else {
			$mNav.find( '.sub-menu' ).removeClass( 'open' ).slideUp();
			$( this ).find( '.sub-menu' ).addClass( 'open' ).slideDown();
		}
	
	});





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


	


	// TABBED CONTENT ON WHAT WE DO TEMPLATE PAGES

	// Display first target and content block as default page load
	$( '.boast-selector-target:first-of-type' ).addClass( 'active' );
	$( '.boast-content:first-of-type' ).addClass( 'active' );

	$( '.boast-selectors .boast-selector-target' ).on( 'click', function( e ){

		e.preventDefault();

		$allTargets = $( '.boast-selectors .boast-selector-target' ),
		$allContent = $( '.boasts-content .boast-content' ),
		$hitTarget = $( this ),
		$currSelected = $hitTarget.data( 'ref' ),
		$selContent = $('#' + $currSelected );

		if ( !$hitTarget.hasClass( '.active' ) ) {

			$allTargets.removeClass( 'active' );
			$hitTarget.addClass( 'active' );
		}

		if ( !$selContent.hasClass( 'active' ) ) {

			// Remove active from all blocks
			$allContent.removeClass( 'active' );

			// Add active to selected block
			$selContent.addClass( 'active' );

		}

	});





	// Homepage modal for video
	var $modal = $( '#youtube-modal' ),
		$modalBtn = $( '#comp-vid-play' ),
		$modalClose = $( '.close' );


	$modalBtn.on( 'click', function( e ){

		e.preventDefault();
		$modal.fadeIn();
	});

	$modal.on( 'click', function(){
		$modal.fadeOut();
	});

	$modalClose.on( 'click', function(){
		$modal.fadeOut();
	});

	$( '.home-slider .slider' ).slick({
		infinite: true,
		autoplay: false,
		autoplaySpeed: 5000
	});

	
	$hmSlides = $( '.home-slider' ).find( '.slide' );

	// Turn text animation on or off depending on current slide
	function textAnimationTimer() {

		setTimeout( function(){
			$currentSlide = $hmSlides.find( '.slick-current' );
			$slide = $( '.slick-current' );
			$noSLide = $( '.slide' ).not( '.slick-current' );
			
			$slide.find( '.animated' ).css( 'display', 'block' );
			$noSLide.find( '.animated' ).css( 'display', 'none' );

			textAnimationTimer();
		}, 1500);

	}
	
	textAnimationTimer();

	// use js to play videos on chrome
	$video = $( '.home-slider' ).find( '.video' );
	$i = 0;
	$.each( $video, function(){
		$video[$i].play();
		$i++;
	});




	// Sorting animation on portfolio page
	var isotopeContainer = $('#portfoliolist');
	if( !isotopeContainer.length || !jQuery().isotope ) return;
	$(window).on('load', function(){
		isotopeContainer.isotope({
			itemSelector: '.portfolio'
		});
	$('#filters').on( 'click', 'span', function(e) {
			$('.filters').find('.active').removeClass('active');
			$(this).addClass('active');
			var filterValue = $(this).attr('data-filter');
			isotopeContainer.isotope({ filter: filterValue });
			e.preventDefault();
		});
	});







	// TABBED CONTENT ON WHAT WE DO TEMPLATE PAGES

	// Display first target and content block as default page load
	$( '.boast-selector-target:first-of-type' ).addClass( 'active' );
	$( '.boast-content:first-of-type' ).addClass( 'active' );

	$( '.boast-selectors .boast-selector-target' ).on( 'click', function( e ){

		e.preventDefault();

		$allTargets = $( '.boast-selectors .boast-selector-target' ),
		$allContent = $( '.boasts-content .boast-content' ),
		$hitTarget = $( this ),
		$currSelected = $hitTarget.data( 'ref' ),
		$selContent = $('#' + $currSelected );

		if ( !$hitTarget.hasClass( '.active' ) ) {

			$allTargets.removeClass( 'active' );
			$hitTarget.addClass( 'active' );
		}

		if ( !$selContent.hasClass( 'active' ) ) {

			// Remove active from all blocks
			$allContent.removeClass( 'active' );

			// Add active to selected block
			$selContent.addClass( 'active' );

		}

	});





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

