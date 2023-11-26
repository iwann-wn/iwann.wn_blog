<?php  
require_once "users_core/init.php";
require_once "users_function/link.php";


$error = '';

if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$email = $_POST['email'];

	if(!empty(trim($nama)) && !empty(trim($email))){

		if(subscribe_cek_email($email)){
			if(subscribe_user($nama, $email)){
				header('Location: index.php');
			}else{
				$error = 'Aduhhh ada masalah saat Subscribe';
			}
		}else{
			$error = 'Email yang dimasukkan sudah Subscribe';
		}

	}else{
		$error = 'Nama dan Email wajib diisi';
	}
}

require_once "users_view/header.php";

?>


<br>
<div class="container">


	<form action="" method="post" class="form-group col-md-7">
		<h3> Subscribe </h3> <br>

		<div id="error"><?=$error ?></div>

		<div class="form-group ">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama" id="nama">
		</div>
		<div class="form-group ">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email">
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-dark">Submit</button>
	</form>


</div>


<?php require_once "users_view/footer.php"; ?>
