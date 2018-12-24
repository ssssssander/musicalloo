
var menu_btn 	= document.getElementById("img_tap_div");
var nav 		= document.getElementById("nav");

menu_btn.onclick = function() {
	nav.classList.toggle("closed");
	nav.classList.toggle("opened");
};
