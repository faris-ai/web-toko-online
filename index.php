<?php 
session_start();
$title = "Ooshop! | Ingat belanja ya di Ooshop!";
include 'header.php';


?>

<div class="container">
	<div id="carouselBanner" class="carousel slide mt-4 data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselBanner" data-slide-to="0" class="active"></li>
		<li data-target="#carouselBanner" data-slide-to="1"></li>
		<li data-target="#carouselBanner" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
		<img class="d-block w-100" src="public/img/store.jpg" alt="First slide">
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="public/img/store2.jpg" alt="Second slide">
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="public/img/store3.jpg" alt="Third slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselBanner" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselBanner" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	</div>

<br>

	<div class='header'>
			<h2>Produk Terbaru</h2>
	</div>
	<div class='row'>
	<?php 
		$produk_terbaru = "SELECT id_produk, nama, harga, jumlah, foto FROM produk ORDER BY id_produk DESC LIMIT 8";
		$run_query = mysqli_query($con,$produk_terbaru);
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
</div>
<?php 
include 'footer.php';
?>