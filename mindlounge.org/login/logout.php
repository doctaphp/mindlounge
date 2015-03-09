<?php
header("location: ../index.php");
?>
<?php 
 
setcookie("loggedIn", false, time() + (86400 * 30), "/");
setcookie("fname", false, time() + (86400 * 30), "/");
setcookie("email", false, time() + (86400 * 30), "/");


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}



?>