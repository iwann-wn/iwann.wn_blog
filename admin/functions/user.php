<?php  

//register
function register_user($email, $pass){
	$email = escape($email);
	$pass = escape($pass);

	$pass = md5($pass);

	$query = "INSERT INTO users (email, password, status) VALUES ('$email', '$pass', 0)";
	return run($query);
}

function register_cek_email($email){
	$email = escape($email);

	$query = "SELECT * FROM users WHERE email='$email'";
	global $link;

	if($result= mysqli_query($link, $query)){
		if(mysqli_num_rows($result) == 0)return true;
		else return false;
	}
}

/*LOGIN*/
function cek_data($email, $pass){
$email = escape($email);
$pass = escape($pass);

$pass = md5($pass);

$query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
global $link;

if($result= mysqli_query($link, $query)){
	if(mysqli_num_rows($result) != 0)return true;
	else return false;
}

}

/*LOGIN LEVEL USER*/
function cek_status($email){
	$email = escape($email);

$query = "SELECT status FROM users WHERE email='$email'";
global $link;

if($result= mysqli_query($link, $query)){
	while($row = mysqli_fetch_assoc($result)){
		$status = $row['status'];
	}
	return $status;
}

}



error_reporting(0);
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);



?>