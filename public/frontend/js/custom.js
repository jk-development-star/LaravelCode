(function ($) {

	"use strict";

	$('.editor').summernote({
        tabsize: 2,
        height: 300
    });

	$( "#timepicker" ).timepicker();

	// Scroll-Top
	$(".scroll-top").hide();
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 300) {
			$(".scroll-top").fadeIn();
		} else {
			$(".scroll-top").fadeOut();
		}
	});
	$(".scroll-top").on("click", function () {
		$("html, body").animate({
			scrollTop: 0,
		}, 700)
	});

	$('#example').DataTable();

	$(document).ready(function() {

		$('.select2').select2({
			theme: "bootstrap"
		});

	    $('.paypal').hide();
	    $('.stripe').hide();
	    $('.bank').hide();
	    $('.cash-on-delivery').hide();

		$('#paymentMethodChange').on('change',function() {

		    if($('#paymentMethodChange').val() == 'PayPal')
		    {
		        $('.paypal').show();
		        $('.stripe').hide();
		        $('.bank').hide();
		        $('.cash-on-delivery').hide();
		    }
		    else if($('#paymentMethodChange').val() == 'Stripe')
		    {
		        $('.paypal').hide();
		        $('.stripe').show();
		        $('.bank').hide();
		        $('.cash-on-delivery').hide();
		    }
		    else if($('#paymentMethodChange').val() == 'Bank')
		    {
		    	$('.paypal').hide();
		        $('.stripe').hide();
		        $('.bank').show();
		        $('.cash-on-delivery').hide();
		    }
		    else if($('#paymentMethodChange').val() == 'Cash On Delivery')
		    {
		    	$('.paypal').hide();
		        $('.stripe').hide();
		        $('.bank').hide();
		        $('.cash-on-delivery').show();
		    }
		    else if($('#paymentMethodChange').val() == '')
		    {
		    	$('.paypal').hide();
		        $('.stripe').hide();
		        $('.bank').hide();
		        $('.cash-on-delivery').hide();
		    }

		});
	});


	// Wow Active
	new WOW().init();

	// Mean Menu
	jQuery('.mean-menu').meanmenu({
		meanScreenWidth: "991"
	});

	// Video Popup
	$('.video-button').magnificPopup({
	  	type: 'iframe',
		gallery:{
			enabled:true
		}
	});

	$('.magnific').magnificPopup({
	  	type: 'image',
		gallery:{
			enabled:true
		}
	});

	$('.my').iconpicker();

})(jQuery);
