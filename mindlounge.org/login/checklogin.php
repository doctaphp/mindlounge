<?php

include('../config.php');


mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$uemail=$_POST['form1email']; 
$upassword=$_POST['form1password']; 

// To protect MySQL injection (more detail about MySQL injection)
$uemail = stripslashes($uemail);
$upassword = stripslashes($upassword);

$uemail = mysql_real_escape_string($uemail);
$upassword = mysql_real_escape_string($upassword);





$upassword = encrypt($upassword, ENCRYPTION_KEY);
$sql="SELECT * FROM registered_members WHERE email='$uemail' and password='$upassword'";

$result=mysql_query($sql);


$count=mysql_num_rows($result);



if ($count == 1) {

$sql1="SELECT * FROM registered_members WHERE email ='$uemail'";
$result1=mysql_query($sql1);
$rows=mysql_fetch_array($result1);

$fname=$rows['fname'];
$email=$rows['email'];
 

	 setcookie("loggedIn", true, time() + (86400 * 30), "/");
	 setcookie("fname", $fname, time() + (86400 * 30), "/");
	 setcookie("email", $email, time() + (86400 * 30), "/");
	 
	 header("Location: ../posts.php"); // This is wherever you want to redirect the user to
} else {
	 setcookie("loggedIn", false, time() + (86400 * 30), "/");
	 echo "
<!DOCTYPE html>
<html>
<head>
	<script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<script src='../js/forms.js'></script>
	<link href='../style/login.css' rel='stylesheet' type='text/css' />	
</head>
<body>
	<div id='title'>
	</div>
	<div>
		<table>
			<form id='form1' name='form1' method='post' action='../index.php'>
				<tr>
					<td >
						<h1>Wrong username or password</h1>
					</td>
				</tr>
				<tr>
					<td>
						<input type='submit' name='Submit' value='Try again'>
					</td>
				</tr>
			</form>	
		</table>
	</div>
</body>
</html>";
}
mysql_close($link);
?>