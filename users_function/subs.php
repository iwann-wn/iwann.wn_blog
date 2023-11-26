<?php  

//subscribe
function subscribe_user($nama, $email){
	$nama = escape($nama);
	$email = escape($email);

	$query = "INSERT INTO subscribe (nama, email) VALUES ('$nama', '$email')";
	return run($query);
}

function subscribe_cek_email($email){
	$email = escape($email);

	$query = "SELECT * FROM subscribe WHERE email='$email'";
	global $link;

	if($result= mysqli_query($link, $query)){
		if(mysqli_num_rows($result) == 0)return true;
		else return false;
	}
}

error_reporting(0);
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);

?>