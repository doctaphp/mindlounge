<?php
//phpinfo();
include('../config.php');

// table name 
$tbl_name=temp_members_db;

// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// values sent from form 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass = $_POST['password'];
$pass = encrypt($pass, ENCRYPTION_KEY);

$picName = basename($_FILES["profilePic"]["name"]);

echo($picName);

$target_dir = "profilePics/";
$target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["profilePic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["profilePic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Insert data into database 
$sql="INSERT INTO $tbl_name(confirm_code, fname,lname, email, password, profilePic)VALUES('$confirm_code', '$fname','$lname', '$email', '$pass', '$picName')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email 
if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: mindlounge <customerservice@mindlounge.org>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.mindlounge.org/signup/confirmation.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "Not found your email in our database";
}

// if your email succesfully sent

/*if($sentmail){
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
			<table >
				<tr>
					<form id='form1' name='form1' method='post' action='../index.html'>
						<td>
							<h1>Confirmation link has been sent to your email!</h1>
						</td>					
					</form>
				</tr>
			</table>
		</div>
	</body>
</html>";


}
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
			<table >
				<tr>
					<form id='form1' name='form1' method='post' action='../index.html'>
						<td>
							<h1>Could not send confirmation link!</h1>
						</td>					
					</form>
				</tr>
			</table>
		</div>
	</body>
</html>";
}*/
mysql_close($link);
?>