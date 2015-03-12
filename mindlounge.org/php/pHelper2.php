<?php
include_once "config.php";
$MYsql = "SELECT profilePic FROM registered_members ";
$MYsql .= "WHERE email = '".$_COOKIE['email']."' ";
$MYresource = mysql_query($MYsql);
$MYitem = mysql_fetch_assoc($MYresource);

?>