<?php  
require_once "users_core/init.php";

$articles = tampikan();

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$articles = hasil_cari($cari);
}

require_once "users_view/header.php";
?>

<div class="jumbotron">
	<h1>WELCOME TO IWAN BLOG</h1>
	<form action="" method="get">
		<input type="search" name="cari" placeholder="Cari Apa ??? Cari Disini !!!"></input>
	</form>
</div>



<p style="text-align: center; font-weight: bold; font-size: 25px;">Article</p><hr><br>

<?php while($row = mysqli_fetch_assoc($articles)):?>
	<div class="each_article">
		<h3><a href="single.php?id=<?= $row['id']; ?>"><?= $row['judul']; ?></a></h3>
		<p>
			<?= excerpt($row['isi']); ?>
		</p>
		<p class="waktu"> <?= $row['waktu']; ?> </p>
		<p class="tag"> Tag: <?= $row['tag']; ?> </p>
		
	</div> <hr>
<?php endwhile ?>


<?php require_once "users_view/footer.php"; ?>
