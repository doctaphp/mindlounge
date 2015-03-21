<?php include 'php/pHelper.php' ?>
<?php include_once "php/pHelper2.php"; ?>

<html>
<head>
	<title>Mind Lounge</title>
		
	<link rel="Shortcut Icon" href="images/icon_M.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!---JavaScrip--JavaScrip--JavaScrip--JavaScrip--JavaScrip--JavaScrip--JavaScrip--->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/scroll-pagination.js" type="text/javascript"></script>
	<script src="js/slimScroll.js" type="text/javascript"></script> 
	<script src="plugins/jspkg-archive/javascripts/jquery.js" type="text/javascript"></script>
	<script src="plugins/jspkg-archive/javascripts/jquery.cssemoticons.js" type="text/javascript"></script>
	<script src="plugins/wait/jquery.waituntilexists.min.js" type="text/javascript"></script>
	<script src="js/posts.js" type="text/javascript"></script>
	<script type="text/javascript"  src="js/pHelper.js"></script>
<!---CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS--CSS-->	
	<link href="style/styles.css" rel="stylesheet" type="text/css" />
	<link href="plugins/jspkg-archive/stylesheets/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Cherry+Cream+Soda|Archivo+Narrow:400,400italic' rel='stylesheet' type='text/css'>
		
</head>
<body>
<div class="wrapper">
	<div class="feeds_container">	
		<div class="IdeaForm">
			<div id="pulldown">
				<form action="" id="add-news-form" method="post" class="post">				
					<textarea placeholder="What's on your mind?" name="news" class="big" id="news" ></textarea>					
				</form>
				<p style="display:none;">hit the button to post &#10152;<p>
				<button id="shareButt" type="button">share</button>
			</div>		
		</div>
		<div id="feeds" class="feeds">
			<ul>
				<?php foreach($news as $item): ?>
				<li name="<?php echo $item['id'] ?>" id="<?php echo $item['date'] ?>">			
					<span class="left">							
						<span class="profilePic" id="pic" style="background-image: url(http://mindlounge.org/profilePics/<?php 
						if(!select($item['email']))
						{
							echo 'Default_UserPic.png';
						}
						else {echo(select($item['email']));	}	?>)">
							
						</span>
							
						</span>
						<span class="UserName">
							<?php echo $item['name'] ?>
						</span>
					</span>
					<span class="right">
						<span class="MindFeed">	
							<?php echo $item['title'];  ?> 	
						</span>
						<span class="date">
							<i><?php echo $item['date'] ?></i>
						</span>
					</span>
					<span>
						<button class="JoinChat" id="<?php echo $item['id'] ?>" type="button">View</button>
					</span>
				<?php endforeach; ?>
				</li>			
			</ul>	
			<div class="loading">
				<img src="images/loading.gif"  alt=""/>
			</div>				
		</div>
	</div>
</div>	
<nav class="top_menu">
	<ul>
		<li><a class="MLlogo" href="http://mindlounge.org"></a></li>
		<li class="backButt">BACK &nbsp;</li>
		<li><a href="/links/About.html">ABOUT &nbsp;</a></li>
		<li><a href="/links/Contact.html">CONTACT &nbsp;</a></li>
		<li><a href="login/logout.php">LOGOUT &nbsp;</a></li>
		<li><span class="profileLink">PROFILE &nbsp; <div class="profile"><h1>coming soon:<br />user profile details.</h1></div></span></li>
	</ul>
</nav>
</body>
</html>

