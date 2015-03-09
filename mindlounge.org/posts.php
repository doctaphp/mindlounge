<?php include 'php/pHelper.php' ?>
<html>
<head>
	<title>Mind Lounge</title>
		
	<link rel="Shortcut Icon" href="images/icon_M.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/scroll-pagination.js" type="text/javascript"></script>
	<script src="js/slimScroll.js" type="text/javascript"></script> 
	<script src="plugins/jspkg-archive/javascripts/jquery.js" type="text/javascript"></script>
	<script src="plugins/jspkg-archive/javascripts/jquery.cssemoticons.js" type="text/javascript"></script>
	<script src="plugins/wait/jquery.waituntilexists.min.js" type="text/javascript"></script>
	<script src="js/posts.js" type="text/javascript"></script>
		<script src="js/pHelper.js"></script>
	
	<link href="style/styles.css" rel="stylesheet" type="text/css" />
	<link href="plugins/jspkg-archive/stylesheets/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	
		
</head>
<body>

<div id="wrapper">
	<div class="main_container">
			
	<div class="feeds_container">
				
		<div id="feeds" class="feeds">
			<ul>
			
				<?php foreach($news as $item): ?>
				<li name="<?php echo $item['id'] ?>" id="<?php echo $item['date'] ?>">
						<span class="feedtext">
						<img src="http://vignette2.wikia.nocookie.net/le-miiverse-resource/images/d/d0/Funny-profile-pictures-02.jpg/revision/latest?cb=20141022011820" style= "height: 40px; width: 40px; background-color:grey;" class="profilePic">
						<span class="left">
						
						
						
						<?php echo $item['name'] ?>
						<span class="date"><?php echo $item['date'] ?></span>
						</span>
						<br>
						<br>
						<span class="feedTitle">
						<?php echo $item['title'] ?> 
						<br>
						</span>
						<span >

						<br>
						<button style="align: right;" class="JoinChat" id="<?php echo $item['id'] ?>" type="button">View Idea</button>
						</span>
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
<div class="IdeaForm">
	<form action="" id="add-news-form" method="post">				
	<textarea placeholder="Share your thoughts here!..."   name="news" class="big" id="news" ></textarea>					
	</form>	
</div>
	
			
			<div class="top_menu">
		<ul>
			<li><a class="menuLogo"  href="#"></a></li>
			<li><a href="login/logout.php">BACK</a></li>
			<li><a href="http://mindlounge.org">ABOUT</a></li>
			<li><a href="login/logout.php">LOGOUT</a></li>
			<li><a href="http://mindlounge.org">CONTACT</a></li>
		</ul>
</div>
		
		
</div>
	
	
	
</body>

</html>
