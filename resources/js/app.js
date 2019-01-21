import './bootstrap';
import 'angular';

//carousel premium
	var $origin = $("#carouselPlus .carousel-inner").prop("outerHTML");
	function multiCarousel(){
		if ( $( "#lg" ).is( ":visible" ) ) {
			do {
				$( "#carouselPlus .carousel-inner" ).children( ".carousel-grid:lt(6)" ).wrapAll( "<div class=\"carousel-item\"><div class=\"row\"></div></div>" );
				$( "#carouselPlus .carousel-inner .carousel-item:first" ).addClass("active");
			} while ( $( "#carouselPlus .carousel-inner" ).children( ".carousel-grid" ).length );
		} else if ( $( "#md" ).is( ":visible" ) ) {
			do {
				$( "#carouselPlus .carousel-inner" ).children( ".carousel-grid:lt(3)" ).wrapAll( "<div class=\"carousel-item\"><div class=\"row\"></div></div>" );
				$( "#carouselPlus .carousel-inner .carousel-item:first" ).addClass("active");
			} while ( $( "#carouselPlus .carousel-inner" ).children( ".carousel-grid" ).length );
		} else {
			do {
				$( "#carouselPlus .carousel-inner" ).children( ".carousel-grid:lt(1)" ).wrapAll( "<div class=\"carousel-item\"><div class=\"row\"></div></div>" );
				$( "#carouselPlus .carousel-inner .carousel-item:first" ).addClass("active");
			} while ( $( "#carouselPlus .carousel-inner" ).children( ".carousel-grid" ).length);
		}
	}
	$(window).on( "load resize", function() {
		$.when(
			$( "#carouselPlus .carousel-inner" ).replaceWith( $origin ),
			multiCarousel()
		).done(function() {
			$( ".multi-carousel" ).animate({opacity: "1"}, 1000);
		});
	});
//Fin carousel premium

//imágenes detalle de anuncios
	$(document).ready(function(){
	    $('.thumb a').click(function(e){
	        e.preventDefault();
	        $('.imgBox img').attr("src", $(this).attr("href"));
	    });
	});
//Fin imágenes detalle de anuncios

// info button
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})

	$('.popover-dismiss').popover({
	  trigger: 'focus'
	})
//Fin info button


$( "div[id^='']" ).mouseover(function() {
  $( "div[id^='']" ).addClass('shadow')
});

$( "div[id^='']" ).mouseout(function() {
  $( "div[id^='']" ).removeClass('shadow')
});



const observer = lozad();
observer.observe();