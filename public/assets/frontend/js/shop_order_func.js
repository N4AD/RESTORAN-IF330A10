(function ($) {

	"use strict";

	// Sticky sidebar
		$('#sidebar_fixed').theiaStickySidebar({
			minWidth: 991,
			updateSidebarHeight: true,
			additionalMarginTop: 90
		});

	/* drodown options prevent close */
		$('.dropdown-options .dropdown-menu').on("click",function(e) {e.stopPropagation();});
		/* remove items order sum */
		$('.main ul li a').on('click', function (c) {
			$(this).parent().fadeOut('slow', function (c) {});
		});
		/* Close Dropdown options on add cart button click + add to cart message */
		$(".dropdown-menu a.btn_1").on('click',function() {
		    $(this).closest(".dropdown-menu").prev().dropdown("toggle");
		    $('#message').fadeIn('slow', function(){
               $('#message').delay(1000).fadeOut(); 
            });
		});
		$(".options > a").on('click',function() {
		    $('#message').fadeIn('slow', function(){
               $('#message').delay(1000).fadeOut(); 
            });
		});

	// Time and people select
	$('.radio_select input[type="radio"]').on("click", function () {
	    var value = $("input[name='time']:checked").val();
	    $('#selected_time').text(value);
	});

	$('.radio_select input[type="radio"]').on("click", function (){
	    var value = $("input[name='people']:checked").val();
	    $('#selected_people').text(value);
	});

	$('.radio_select input[type="radio"]').on("click", function (){
	    var value = $("input[name='day']:checked").val();
	    $('#selected_day').text(value);
	});

})(window.jQuery); 