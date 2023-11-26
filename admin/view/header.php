<?php  
$login = false;
if($_SESSION['user']){
	$login = true;
}
?>

<head>
	<title>IWAN BLOG</title>
	<link rel="stylesheet" href="view/style.css">
</head>

<div class="logo">
	<a href="index.php"> 
		<p>IWAN BLOG</p>
	</a>
</div>
<div id="menu">
	<a href="index.php">Home</a> | 
	<a href="add.php">Insert</a> | 
	<a href="register.php">Register</a> | 

	<?php if($login == true): ?>
		<a href="logout.php">Logout</a>
	<?php else: ?>
		<a href="login.php">Login</a>
	<?php endif; ?>

</div>