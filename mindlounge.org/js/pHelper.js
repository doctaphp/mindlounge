



$(function() {	

 
////////////////////////////////////////Steven Code 3/13/15, 3/14, 3/18
//Change font size in news feed
var shareForm =  $('.post textarea');
	
	$(".MindFeed").each(function() {
		$(this).addClass($(this).text().length > 60 ? "MindFeedLG" : "MindFeedSM");		
	});
	
    shareForm.focus(slideDown);
	shareForm.blur(slowUP);	

	$("#shareButt").click(function(){
		addNews();
		$( shareForm ).val("");
	});
//Back button control	
	$('.backButt').click(function(){
		parent.history.back();
		return false;
	});	
 function slowUP(){
	setTimeout(function() { 
	$(shareForm).attr('placeholder',"What's on your mind?");
	$(shareForm).animate({ height: 40 }, 000);
	$('#shareButt, #pulldown p').hide();
	$('.feeds_container').removeClass('containerSlide'); 
	$('.IdeaForm').removeClass('IdeaFormSlide');  }, 500);
	
};  

////FOR CONTACT FORM contact.html
$('#contactForm input[type="text"],#contactForm textarea,#add-news-form textarea.CommentTextarea ').focus(function(){
		   $(this).data('placeholder',$(this).attr('placeholder'))
		   $(this).attr('placeholder','');
		});
	$('#contactForm input[type="text"],#contactForm textarea,#add-news-form textarea.CommentTextarea ').blur(function(){
		   $(this).attr('placeholder',$(this).data('placeholder'));
		});	
	$("#contact").submit(function(e){
    e.preventDefault();
    alert('Sorry about that. We are still working on this form.');
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
		if (Winheight <= 580)
			{
			$(this).animate({ height: '9%' }, 500);
				}
				else if (Winheight > 580 && Winheight < 2050)
					{
					$(this).animate({ height: '79%' }, 300);
						}	
						else
						{
						$(this).animate({ height: '99%' }, 200);
							}
	
};
 


