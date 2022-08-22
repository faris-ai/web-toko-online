<?php
session_start();
$title = "Kategori | Ooshop!";
include 'header.php';
include 'db.php';

$id_kategori = $_GET['kat_id'];
$kategori_query = "SELECT nama FROM kategori where id_kategori=".$id_kategori;
$run_query = mysqli_query($con,$kategori_query);
$nama_kategori = mysqli_fetch_array($run_query)['nama'];
?>
<br>
<div class="container">
	<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Ooshop!</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?= $nama_kategori; ?></li>
	</ol>
	</nav>
	<div class='header'>
		<div class='text-center'>
			<h2>
				<strong> <?= $nama_kategori; ?> </strong>
			</h2>
		</div>
	</div>
	<div class='row'>
	<?php 
		$produk_kategori = "SELECT * FROM produk WHERE id_kategori=".$id_kategori;
		$run_query = mysqli_query($con,$produk_kategori);
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){
				$pro_id = $row['id_produk'];
				$pro_nama = $row['nama'];
				$pro_harga = $row['harga'];
				$pro_jumlah = $row['jumlah'];
				$pro_foto = $row['foto'];
					echo "
					<div class='col-sm-3'>
					<div class='card m-2 my-2'>
					<div class='shadow-lg bg-white rounded'>
					<a href='detail_produk.php?produk=$pro_id'>
					<img class='card-img-top' src='foto_produk/$pro_foto' alt='$pro_nama'>
					</a>
					<div class='card-body'>
					<a href='detail_produk.php?produk=$pro_id'><h5 class='card-title'>$pro_nama</h5></a>
					<p style='color:#000000;'>Rp ".number_format($pro_harga,0,",",".")."</p>
					<!--<a href='detail.php?produk=$pro_id' class='btn mx-auto d-block' style='background-color: #602749; color:white'>Details</a>-->
					</div>
					</div>
					</div>
					</div>
					
					";

					}
				}
	?>
	</div>
<?php 
include 'footer.php';
?>
</div>
