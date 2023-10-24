
/* Input incrementer*/
	$(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
	$(".button_inc").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});

	//Filters version 2 mobile
	$('a.open_filters').on("click", function () {
		$('.filter_col').toggleClass('show');
		$('main').toggleClass('freeze');
		$('.layer').toggleClass('layer-is-visible');
	});

	// Jquery select
$('.custom-select-form select').niceSelect();