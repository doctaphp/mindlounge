$(function(){
	/**
	* Integrating slim scroll
	**/
	$("#feeds ul").slimScroll({
        height: '520px'
    });
	/**
	* Integrating Scroll Pagination
	**/
	var feeds = $("#feeds ul");
	var last_time = feeds.children().last().attr('id');
    feeds.scrollFeedPagination({
        'contentPage': 'posts.php',
        'contentData': {
            'last_time' : last_time
        },
        'scrollTarget': feeds, 
        'beforeLoad': function(){
            feeds.parents('#feeds').find('.loading').fadeIn();
        },
        'afterLoad': function(elementsLoaded){
            last_time = feeds.children().last().attr('id');
            feeds.scrollFeedPagination.defaults.contentData.last_time = last_time;
            feeds.parents('#feeds').find('.loading').fadeOut();
            var i = 1;
            $(elementsLoaded).fadeInWithDelay();
        }
    });
    $.fn.fadeInWithDelay = function(){
        var delay = 0;
        return this.each(function(){
            $(this).delay(delay).animate({
                opacity:1
            }, 200);
            delay += 100;
        });
    };
	//calling the function to update news feed
    setTimeout('updateFeed()', 1000);
	
});
/**
* Function to update the news feed
**/
function updateFeed(){

		id = $('#feeds li :first').attr('id');
if(!id){
	id = 0;
}
		
        $.ajax({
            'url' : 'posts.php',
            'type' : 'POST',
            'data' : {
                'latest_news_time' : id  
            },
            success : function(data){
				setTimeout('updateFeed()', 1000);
				$(data).prependTo("#feeds ul");
				
            }
        }) 
	}
	
	
	/**
* Function to add news
**/
function addNews(){
	var validation = "";
	var values = {};
	$.each($('#add-news-form').serializeArray(), function(i, field) {
        if((field.value == 0)){
            validation = "false";
        }
        values[field.name] = field.value;
    });
	if(validation == "false"){
		alert("Name and News are required Values");
		return false;
	}
	values['addnews'] = '';
	$.ajax({
        'url' : '',
        'type' : 'POST',
        'data' : values,
        success : function(data){
			
        }
    }) 
}


/*$(document).ready(function(){  $(".JoinChat").click(function(){
  alert(this.id);
});
});


function join(){
  

  $('#wrapper').replaceWith("Joined chat <INPUT TYPE='button' onClick='history.go(0)' VALUE='Back'>");
 alert(this.id);
 

}	*/

/*
$( document ).ready(function() {
    $('body').on('click','.JoinChat',function (e) {
      $('#wrapper').replaceWith("Joined chat <INPUT TYPE='button' onClick='history.go(0)' VALUE='Back'>");
	  });
  });*/
  
  $( document ).ready(function() {
  
 // $('.feedtext').emoticonize();
  
    $('body').on('click','.JoinChat',function (e) {
	var that = this.id;
	

document.cookie='id=' + that + ';';
window.location = 'http://mindlounge.org/chat.php';
      
	
	  });
	  
	  $('.feedtext').waitUntilExists(function() {
  
	$('.feedtext').emoticonize();
  });
  
  
	  
  });
  
