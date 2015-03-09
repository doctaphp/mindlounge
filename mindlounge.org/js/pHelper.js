
			$(function() {
				var header = $(".top_menu");
				var headerList = $(".top_menu  a");
				$(window).scroll(function() {    
					var scroll = $(window).scrollTop();
				
					if (scroll >= 1) {
						header.addClass("topScroll");
						headerList.addClass("topScroll");
					} else {
						header.removeClass("topScroll");
						headerList.removeClass("topScroll");
					}
				});	
				
			$(document).keypress(function(e) {
				if(e.which == 13) {
					e.preventDefault();
					addNews();
					document.getElementById("news").value = "";
					
				}
			});
				
			});
	