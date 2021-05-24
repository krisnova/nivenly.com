(function($) {
  "use strict";
  //slider script
  var tpj = jQuery;
  //fixed menu on scrolling
	$(window).on('bind scroll', function(e) {
	if ($(window).scrollTop() > 40) {
	$('.header_top_main').addClass('fixed_menu');
	} else {
	$('.header_top_main').removeClass('fixed_menu');
	}
	});
	
  //Header Height
	var height = jQuery(".wrapper_main.header_top_main").outerHeight();  
	jQuery(".wrapper_main.breadcum_part").css('margin-top',height);  
	
  // navigation menu script start
	//navigation toogle
	$(".navbar_toogle").on("click", function() {
		$(".mk_top_navigations").slideToggle(500);
	});
	
  //navigation right
   var navright = $(".navigaton_right");
   var menuclose = $(".navigaton_right, .side_navigation_second");
   var close = $(".close_button");
  $(".navbar_toogle_right").on("click", function() {
		navright.slideToggle(400);
		$(".header_orange").css("background-color", "#f9ce89");
  });
  close.on("click", function() {
		menuclose.slideToggle(400);
		$(".header_orange").css("background-color", "#f39c12");
  });
  
  //add class in navigation menu
  $(".mk_top_navigations ul.sub-menu").parents("li").addClass("dropdown_menu");
  $(".dropdown_menu").append("<i class='caret_down'></i>");
  
/*dropdown toggle html on tablat/mobile width for open dropdown*/

	var width = $(document).width();
		if (width < 991) {
			$('.mk_top_navigations > ul > li').children('.caret_down').on('click', function(){
				$(this).prev('ul.sub-menu').slideToggle();	
			});
			
			// leverl 3 submenu
			$('.mk_top_navigations > ul > li > ul.sub-menu > li > .caret_down').on('click', function(){
				$('.mk_top_navigations > ul > li > ul.sub-menu > li > ul.sub-menu').slideToggle();	
			});
			
			// leverl 4 submenu
			$('.mk_top_navigations > ul > li > ul.sub-menu > li > ul > li > .caret_down').on('click', function(){
				$('.mk_top_navigations > ul > li > ul.sub-menu > li > ul.sub-menu > li > ul').slideToggle();	
			});
			
		}
  //responsive  menu toogle right navigation
  $('.navigaton_right .menu').find('>li.dropdown_menu').on('click', function() {
		$('li > ul.sub-menu').not($(this).children("ul.sub-menu").slideToggle()).hide();
  });
  
  //add active class on menu click
  $('.menu a').on('click', function() {
		$('.menu').find(".active_menu").removeClass('active_menu');
		$(this).parent().addClass('active_menu');
  });
 
  // navigation menu script end
  
  //selectpicker
  $('.selectpicker').selectpicker({
		style: 'btn-info',
		size: 4
  });
  //toogle on map 
  $(".heading_toggle").on("click", function() {
		if ($(window).width() < 767) {
			$(".bottom_details").slideToggle();
		}
		else {}
  });
  
}(jQuery));