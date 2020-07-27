function vw_gardening_landscaping_menu_open_nav() {
	window.responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_gardening_landscaping_menu_close_nav() {
	window.responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
	"use strict";
	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
	});
});

jQuery(document).ready(function () {
	window.currentfocus=null;
  	vw_gardening_landscaping_checkfocusdElement();
	var body = document.querySelector('body');
	body.addEventListener('keyup', vw_gardening_landscaping_check_tab_press);
	var gotoHome = false;
	var gotoClose = false;
	window.responsiveMenu=false;
 	function vw_gardening_landscaping_checkfocusdElement(){
	 	if(window.currentfocus=document.activeElement.className){
		 	window.currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_gardening_landscaping_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.responsiveMenu){
			if (!e.shiftKey) {
				if(gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				gotoHome = true;
			} else {
				gotoHome = false;
			}

		}else{

			if(window.currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.responsiveMenu){
				if(gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					gotoClose = true;
				} else {
					gotoClose = false;
				}
			
			}else{

			if(window.responsiveMenu){
			}}}}
		}
	 	vw_gardening_landscaping_checkfocusdElement();
	}
});

(function( $ ) {
	jQuery(window).load(function() {
	    jQuery("#status").fadeOut();
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})

	$(window).scroll(function(){
	  var sticky = $('.header-sticky'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('header-fixed');
	  else sticky.removeClass('header-fixed');
	});

	$(document).ready(function () {

		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});

		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});

	});
})( jQuery );