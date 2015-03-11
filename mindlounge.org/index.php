<?php
if(isset($_COOKIE['loggedIn']))
	{
	header("Location: posts.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mind Lounge</title>
		<link rel="Shortcut Icon" href="images/icon_M.ico" type="image/x-icon" /> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script> 
		<script src="js/forms.js"></script>
		<link href="style/login.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Sarina|Cherry+Cream+Soda' rel='stylesheet' type='text/css'>
	
		<script src="plugins/jQuery-File-Upload-9.9.3/js/vendor/jquery.ui.widget.js"></script>
		<script src="plugins/jQuery-File-Upload-9.9.3/js/jquery.iframe-transport.js"></script>
		<script src="plugins/jQuery-File-Upload-9.9.3/js/jquery.fileupload.js"></script>
		<script>
				$(function () {
					
					
					
    $('#upload').fileupload({
		
        dataType: 'json',
        add: function (e, data) {
			
			
					
			
			if (data.files && data.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#target').attr('src', e.target.result);
        }
        reader.readAsDataURL(data.files[0]);
        
        
    }
			
            data.context = $('<button/>').text('Choose Picture')
                .appendTo('#u')
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
		data.submit();
                });
				

        },
		
        done: function (e, data) {
            data.context.text('Upload finished.');
			data.context.text('');
			$('#progress .bar').css('width',0);
        },
		progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .bar').css(
            'width',
            progress + '%'
        );
    }
		
		
    });
	
});
				
	











</script>
		
	</head>
<body>
<div id ="PageWrap">
<div id ="wrapper">

<!--
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
													TITLE IMAGE
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
-->
	<div id="title">
	</div>
	<div id="holder">
		<div id="about">
			Welcome to MindLounge! We are dedicated to providing a <strong>DRAMA</strong>
			free "social network." Feel free to share your thoughts and indulge in others too!
			Have fun! <br><a href="#">About us</a>
		</div>
	</div>
<!--
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
													LOG IN FORM
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
-->
	<div id="logOn">
		<form id="form1" autocomplete="off" name="form1" method="post" action="login/checklogin.php">
			<table id="signuptable" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FBF2EF">
				<tr >
					<td>
						<input id="form1email" name="form1email" placeholder="Email" type="text" class="input" size="30">
					</td>					
				</tr>
				<tr>
					<td>
						<input id="form1password" name="form1password" placeholder="Password" type="password" class="input" size="30">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="Submit" value="Log In">
					</td>
				</tr>
			</table>
		</form>
	</div>
	
	<a href="#signUp">
		<div id="or">	
		Sign up to become a member.		
		</div>
	</a>

<!--
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
													SIGN UP FORM
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
-->	
	<div id="signUp" style="display:none">
		<form id="form2" name="form2" method="post" action="signup/signup_ac.php">
			<table id="signuptable" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FBF2EF">
				<tr>
					<td>
						<input id="fname" class="input" name="fname" placeholder="First name" type="text"  size="30"> 
					</td>
				</tr>
				<tr>
					<td>
						<input id="lname" name="lname" placeholder="Last name" type="text" class="input" size="30">
					</td>
				</tr>
				<tr>
					<td>
						<input id="email" name="email" placeholder="Email" type="text" class="input" size="30">
					</td>
				</tr>
				<tr>
					<td>
						<input id="reemail" name="reemail" placeholder="Re-enter email" type="text" class="input" size="30">
					</td>
				</tr>
				<tr>		
					<td>
						<input id="password" name="password" placeholder="Password" type="password" class="input" size="30">
					</td>
				</tr>
				<tr>		
					<td>
						<input id="repassword" name="repassword" placeholder="Re-enter password" type="password" class="input" size="30">
					</td>			
				</tr>
				<tr>
					<td >
						<div id="u" style="background-color:white;">
						<br>
							<input  id="upload" type="file" data-url="plugins/jQuery-File-Upload-9.9.3/server/php/" >
							
							<br><br>
							
							<img height="100" width="100" id="target" src="" alt="" />
							
							
							<div id="progress">
								<div class="bar" style="width: 0%;"></div>
							</div>
							
							
						</div>
					</td>				
				</tr>
				<tr>		
					<td>
						<input type="submit" name="Submit" value="Sign Up">	
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!--
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
													FOOTER
	OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
-->	
<footer id="foot">
		<div id ="footDivOne">
			<a href="#site" id="bioPic" title='Check Out Site'>
			</a>	
			<h1>MindLounge.org</h1>
				<div id="map">
					<ul >
						<li><a href ="#">&nbsp; Home &nbsp;</a>|&nbsp;</li>
						<li><a href ="#">&nbsp; About &nbsp;</a>|&nbsp;</li>
						<li><a href ="#">&nbsp; Contact &nbsp;</a></li>
					</ul>
				</div>
				<div id ="copy">
			The Mind Lounge is Copyright &copy; 2015 Dave Cribbs &amp; Steven Clark.
				
			</div>
		</div>
	
</footer>
</div>

</body>
</html>