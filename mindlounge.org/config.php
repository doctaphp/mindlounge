<?php

$host="mysql.mindlounge.org"; // Host name 
$username="mindlounge"; // Mysql username 
$password="mindlounge12"; // Mysql password 
$db_name="mindlounge"; // Database name 
$link = mysql_connect($host, $username, $password);


//Connect to server and select database.
$link or die("cannot connect to server"); 
mysql_select_db("$db_name")or die("cannot select DB");

define("ENCRYPTION_KEY", "JHGFE$%^&*UIJU*&^TRFT^&&^%$#@W");


/**
 * Returns an encrypted & utf8-encoded
 */
function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
	}

?>