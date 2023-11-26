<?php  
session_start();

require_once "functions/db.php";
require_once "functions/blog.php";
require_once "functions/user.php";


error_reporting(0);
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);

?>