<?php  

function tampikan(){ //TAMPILKAN SEMUA DATA KE INDEX
	$query = "SELECT * FROM blog";
	return result($query);
}

function tampilkan_per_id($id){//MENGAMBIL & MENAMPILKAN PER ID KE single
	$query = "SELECT * FROM blog WHERE id=$id";
	return result($query);
}

function hasil_cari($cari){//PENCARIAN	
	$query = "SELECT * FROM blog WHERE judul LIKE '%$cari%'";
	return result($query);
}

function result($query){
	global $link;
	if($result = mysqli_query($link, $query) or die ('gagal menampilkan data')){
		return $result;
	}
}

function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;
	else return false;
}

function excerpt($string){
	$string = substr($string, 0, 199);
	return $string . "...";
}

function escape($data){
	global $link;
	return mysqli_real_escape_string($link, $data);
}


error_reporting(0);
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);

?>