<?php
session_start();


$_SESSION = array();

session_destroy();

// redirect to login page
header('Location: login.php');
exit();
?>