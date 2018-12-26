
$(document).ready(function() {
	// music page
	var categories 	= $(".category h3");

	categories.click(function() {
		$(this).parent().toggleClass("closed");
		$(this).parent().toggleClass("opened");
	});


	// mobile menu
	var menu_btn 	= $("#img_tap_div");
	var nav 		= $("#nav");

	menu_btn.click(function() {
		nav.toggleClass("closed");
		nav.toggleClass("opened");
	});
});

