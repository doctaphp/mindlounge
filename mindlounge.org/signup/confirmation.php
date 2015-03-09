<?php

include('../config.php');

// Passkey that got from link 
$passkey=$_GET['passkey'];
$tbl_name1="temp_members_db";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=mysql_fetch_array($result1);
$fname=$rows['fname'];
$lname=$rows['lname'];
$email=$rows['email'];
$pass=$rows['password']; 

$tbl_name2="registered_members";

// Insert data that retrieves from "temp_members_db" into table "registered_members" 
$sql2="INSERT INTO $tbl_name2(fname,lname, email, password)VALUES('$fname','$lname', '$email', '$pass')";
$result2=mysql_query($sql2);
}

// if not found passkey, display message "Wrong Confirmation code" 
else {
echo "<!DOCTYPE html>
<html>

	<head>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
		<script src='plugins/additional-methods.min.js'></script>
		<script src='plugins/jquery.validate.min.js'></script>
		<script src='js/forms.js'></script>
		<link href='http://fonts.googleapis.com/css?family=Sarina|Cherry+Cream+Soda' rel='stylesheet' type='text/css'>
		<link href='../style/login.css' rel='stylesheet' type='text/css' />
	</head>
<body>
	<div id='title'></div>
	
	<div id='confirm'>
		<table>
			<form id='form1' name='form1' method='post' action='../index.html'>
				<tr>
					<td>
						<h1>Sorry. Your account activation failed!</h1>
					</td>
				</tr>
				<tr >
					<td>
						<input type='submit' name='Submit' value='Try agian'>
					</td>
				</tr>
			</form>	
		</table>
	</div>
</body>
</html>";
}

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($result2){
echo "<!DOCTYPE html>
<html>

	<head>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
		<script src='plugins/additional-methods.min.js'></script>
		<script src='plugins/jquery.validate.min.js'></script>
		<script src='js/forms.js'></script>
		<link href='http://fonts.googleapis.com/css?family=Sarina|Cherry+Cream+Soda' rel='stylesheet' type='text/css'>
		<link href='../style/login.css' rel='stylesheet' type='text/css' />
	</head>
<body>
	<div id='title'></div>
	
	<div id='confirm'>
		<table>
			<form id='form1' name='form1' method='post' action='../index.html'>
				<tr>
					<td>
						<h1>Your account has been activated! Welcome</h1>
					</td>
				</tr>
				<tr >
					<td>
						<input type='submit' name='Submit' value='Get Started!'>
					</td>
				</tr>
			</form>	
		</table>
	</div>
</body>
</html>";


// Delete information of this user from table "temp_members_db" that has this passkey 
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);

}

}
mysql_close($link);
?>