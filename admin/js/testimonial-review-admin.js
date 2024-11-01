(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	var review_testimonial_type = $("#review_testimonial_type").val();
	if( review_testimonial_type == 1 ){
		$("#test01").show();
		$("#test02").hide();
	}
	else {
		$("#test01").hide();
		$("#test02").show();
	}
	
	$("#review_testimonial_type").on('change', function(){
		var review_testimonial_type = $("#review_testimonial_type").val();
		if( review_testimonial_type == 2 ){
			$("#test01").hide();
			$("#test02").show();
		}
		else{
			$("#test01").show();
			$("#test02").hide();
		}
	});

	$(document).on('click', '.expandable .header', function(){
		if($(this).parent().hasClass('active')){
			$(this).parent().removeClass('active');
		}
		else{
			$(this).parent().addClass('active');	
		}
	});

	$(document).on('click', '.tab-nav li', function(){
		$(".active").removeClass("active");
		$(this).addClass("active");
		var nav = $(this).attr("nav");
		$(".box li.tab-box").css("display","none");
		$(".box"+nav).css("display","block");
		$("#review_testimonial_navs").val(nav);
	});

	var review_testimonial_grid_type = $("#review_testimonial_grid_type").val();
	if( review_testimonial_grid_type == 1 ){
		$("#type1").hide('slow');
	}
	else {
		$("#type1").show('slow');
	}

	$("#review_testimonial_grid_type").on('change', function(){
		var review_testimonial_grid_type = $("#review_testimonial_grid_type").val();
		if( review_testimonial_grid_type == 2 ){
			$("#type1").show('slow');
		}
		else{
			$("#type1").hide('slow');
		}
	});

})( jQuery );