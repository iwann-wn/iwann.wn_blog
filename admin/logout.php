<?php  

require_once "core/init.php";

$_SESSION = [];
session_unset();
unset($_SESSION['user']);
session_destroy();

header('Location: login.php');

?>