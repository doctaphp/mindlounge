<?php

function select($email){
$host="mysql.mindlounge.org"; // Host name 
$username="mindlounge"; // Mysql username 
$password="mindlounge12"; // Mysql password 
$db_name="mindlounge"; // Database name 
$link = mysql_connect($host, $username, $password);


//Connect to server and select database.
$link or die("cannot connect to server"); 
mysql_select_db("$db_name")or die("cannot select DB");

//$e = preg_replace('/\s+/', '', $email);

$Msql = "SELECT * FROM registered_members WHERE email = '".$email."'";
//echo $Msql;
$Mresource = mysql_query($Msql);
//echo $Mresource;
//var_dump($Mresource);

$Mitem = mysql_fetch_assoc($Mresource);
 
// var_dump($Mitem);
 

return $Mitem['profilePic'];
}

?>