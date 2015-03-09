<?php

if(!isset($_COOKIE['loggedIn'])){
	header("Location: index.php");
	}

include_once "config.php";
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$id = $_COOKIE['id'];


$sql = "CREATE TABLE comments_$id (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)) 
  ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($sql);

$sql1="SELECT * FROM news WHERE id ='$id'";
$result1=mysql_query($sql1);
$rows=mysql_fetch_array($result1);


$desc=$rows['description'];
$Title=$rows['title'];
$name=$rows['name'];
$date=$rows['date'];

/**
* Adding News for Demo request by applying check on addnews POST parameter
**/
if(isset($_POST['addnews'])){
	$news = filter_input(INPUT_POST, 'news', FILTER_SANITIZE_SPECIAL_CHARS);
	$name = $_COOKIE['fname'];
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
	$sql = "INSERT INTO comments_$id (description, name, date) VALUES ('".$news."', '".$name."', '".date('Y-m-d H:i:s')."')";
	//$sql = "INSERT INTO news (description, name, date) VALUES ('".$news."', '".$name."', '".date('Y-m-d H:i:s')."')";
	mysql_query($sql);
	}
/**
* Preparing and getting response for latest feed items.
**/
if(isset($_POST['latest_news_time'])){
	$sql = "SELECT * FROM comments_$id ";  
	$sql .= "WHERE date > '".$_POST['latest_news_time']."' ";
	$sql .= "ORDER BY date DESC";
	$resource = mysql_query($sql);
	$current_time = $_POST['latest_news_time'];
	$item = mysql_fetch_assoc($resource);
	$last_news_time = $item['date'];
		while ($last_news_time < $current_time) {
			usleep(1000); //giving some rest to CPU
			$resource = mysql_query($sql);
			$item = mysql_fetch_assoc($resource);
			$last_news_time = $item['date'];
			if(!$item['date']){
				$last_news_time = -1;
			}
	}
	?>
	<li class="response" name="<?php echo $item['id'] ?>" id="<?php echo $item['date'] ?>">
							<span class="feedtext">
								<span class="left">
									<?php echo $item['name'].' says:' ?>
								</span> <br> 
								<span class="commentGuts">
									<?php echo '"'.$item['description'].'"' ?> <br>
								</span>
								<span class="date"><?php echo $item['date'] ?></span>
							</span>
	</li>
	<?php
	exit;
	/*
	
	
	
	
	*/
}
/**
* Getting news Items and preparing sql query with respect to request
**/
$sql = "SELECT * FROM comments_$id ORDER BY date DESC LIMIT 0, 10";
	if(isset($_POST['last_time'])){
		$sql = "SELECT * FROM comments_$id WHERE date < '".$_POST['last_time']."' ORDER BY date DESC LIMIT 0, 10";
	}
$resource = mysql_query($sql);
$news = array();
while($row = mysql_fetch_assoc($resource)){
	$news[] = $row;
}
mysql_close($link);
?>

<html>
<head>
	<title>Mind Lounge</title>
	<link rel="Shortcut Icon" href="images/icon_M.ico" type="image/x-icon" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!------jQuery------>		
	<script src="js/scroll-pagination.js" type="text/javascript"></script>
	<script src="js/slimScroll.js" type="text/javascript"></script>
	<script src="plugins/jspkg-archive/javascripts/jquery.js" type="text/javascript"></script>
	<script src="plugins/jspkg-archive/javascripts/jquery.cssemoticons.js" type="text/javascript"></script>
	<script src="plugins/wait/jquery.waituntilexists.min.js" type="text/javascript"></script>
<!------STYLE---->	
	<link href="style/styles.css" rel="stylesheet" type="text/css" />
	<link href="plugins/jspkg-archive/stylesheets/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Chivo:400,900' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
	
$(function(){
	/**
	* Integrating slim scroll
	**/
	$("#feeds ul").slimScroll({
        height: '500px'
    });
	/**
	* Integrating Scroll Pagination
	**/
	var feeds = $("#feeds ul");
	var last_time = feeds.children().last().attr('id');
    feeds.scrollFeedPagination({
        'contentPage': 'chat.php',
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
	setInterval(function() {updateFeed();}, 60000);
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
            'url' : 'chat.php',
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
</script>
<script>
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
</script>
<script type="text/javascript">

  
  $( document ).ready(function() {
    
	  //$('.feedtext').emoticonize();
	  $('.feed_head').emoticonize();
	  
	  $('.feedtext').waitUntilExists(function() {
  
	$('.feedtext').emoticonize();
  });
  ///                                                      for top menu in post file
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
  
  });
</script>

</head>

<body>
<div id="pageWrap">
	<div id="wrapper">
		<div class="main_container">
			
			<div class="feeds_container">
				<h3 class="feed_head" id="feed_head_2" > 
					<?php echo($desc);?>
				</h3>
				<div id="feeds" class="feeds">
					<ul>
						<?php foreach($news as $item): ?>
						<li name="<?php echo $item['id'] ?>" id="<?php echo $item['date'] ?>">
							<span class="feedtext">
								<span class="left">
									<?php echo $item['name'].' says:' ?>
								</span> <br> 
								<span class="commentGuts">
									<?php echo '"'.$item['description'].'"' ?> <br>
								</span>
								<span class="date"><?php echo $item['date'] ?></span>
							</span>
						</li>
						<?php endforeach; ?>
					</ul>	
					<div class="loading">
						<img src="images/loading.gif"  alt=""/>
					</div>				
				</div>
			</div>
		</div>
		<div class="IdeaForm" id="CommForm">
					<form action="" id="add-news-form" method="post">
						<label for="Comment">Comment:</label> <br />
						<textarea  placeholder="comments" name="news" class="big" id="news" type="text" rows='5' cols='25'></textarea><br />
						<input type="button" onclick="addNews()" value="comment" />
					</form>
		</div>
	</div>
</div>

<div class="top_menu">
		<ul>
			<li><a class="menuLogo"  href="#"></a></li>
			<li><a href="http://mindlounge.org/posts.php">BACK</a></li>
			<li><a href="http://mindlounge.org">ABOUT</a></li>
			<li><a href="login/logout.php">LOGOUT</a></li>
			<li><a href="http://mindlounge.org">CONTACT</a></li>
		</ul>
</div>
	<a id="leave" href="login/logout.php">logout</a>
</body>


</html>
