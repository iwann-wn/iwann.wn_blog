<?php  
require_once "core/init.php";
require_once "functions/link.php";

if(!$_SESSION['user']){
	header('Location: login.php');
}

require_once "view/header.php";

$error = '';
$id = $_GET['id'];

if(isset($_GET['id'])){
	$article = tampilkan_per_id($id);
	while($row = mysqli_fetch_assoc($article)){
		$judul_awal = $row['judul'];
		$konten_awal = $row['isi'];
		$tag_awal = $row['tag'];
	}
}

if(isset($_POST['submit'])){
	$judul = $_POST['judul'];
	$konten = $_POST['konten'];
	$tag = $_POST['tag'];

	if(!empty(trim($judul)) && !empty(trim($konten))){

		if(edit_data($judul, $konten, $tag, $id)){
			header('Location: index.php');
		}else{
			$error = 'ada masalah saat update data';
		}

	}else{
		$error = 'judul dan konten wajib diisi';
	}
}

?>

	
<br>
<div class="container">

	<form action="" method="post" class="form-group col-md-7">
		<h3> Post Blog </h3> <br>

		<div id="error"><?=$error ?></div>

		<div class="form-group ">
			<label for="judul">judul</label>
			<input type="text" class="form-control" name="judul" id="judul" value="<?=$judul_awal; ?>">
		</div>

		<div class="form-group ">
			<label for="konten">Isi Blog</label>
			<textarea class="form-control" name="konten" id="konten" rows="9"><?=$konten_awal; ?></textarea>
		</div>

		<div class="form-group ">
			<label for="tag">Tag</label>
			<input type="text" class="form-control" name="tag" id="tag" value="<?=$tag_awal; ?>">
 		</div>

		<button type="submit" name="submit" value="submit" class="btn btn-dark">Submit</button>
	</form>

</div>


<?php require_once "view/footer.php"; ?>
