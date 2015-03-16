


$(document).ready(function() {	


	
		
		
	
////////////////////////////////////////Steven Code 3/13/15, 3/14
//Change font size in news feed
	$(".MindFeed").each(function() {
		$(this).addClass($(this).text().length > 60 ? "MindFeedLG" : "MindFeedSM");		
	});
	
	$("#pulldown").click(function(){
		
		if ($('input,textarea').attr('')) 
		{
			$('input,textarea').blur(slideUp());
		} 
		else 
		{
			$('input,textarea').focus(slideDown());			
		}
        
   
}); 
	
	
		$("#shareButt").click(function(){
			addNews();
			$('input,textarea').blur(slideUp());
		}); 
		
		
    
//Back button control	
	$('.backButt').click(function(){
		parent.history.back();
		return false;
	});	

});
  

function slideDown() {
	$(this).data('placeholder',$(this).attr('placeholder'));
	$(this).attr('placeholder',''); 	
	$(this).attr('data-default', $(this).height());	
	$("#shareButt, #pulldown p").show();
	$('.feeds_container').addClass('containerSlide'); 
	$('.IdeaForm').addClass('IdeaFormSlide'); 
		var Winheight = $(window).height();
		if (Winheight <= 580) {
			$(this).animate({ height: '9%' }, 500);
				}
				else if (Winheight > 580 && Winheight < 2050){
					$(this).animate({ height: '79%' }, 300);
					}	
					else{
						$(this).animate({ height: '99%' }, 200);
				}
	
};
function slideUp() {
	var ht = $(this).attr('data-default');
	
	$(this).attr('placeholder',$(this).data('placeholder'));
	$(this).attr('placeholder',"What's on your mind?"); 
	$(this).animate({ height: ht }, 000);
	$('#shareButt, #pulldown p').hide();
	$('.feeds_container').removeClass('containerSlide'); 
	$('.IdeaForm').removeClass('IdeaFormSlide'); 
};	  
  
  
