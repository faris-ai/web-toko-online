<?php
session_start();
include 'db.php';
$id_toko = $_GET["toko"];
$toko_query = "SELECT * FROM toko WHERE id_toko =".$id_toko;
    $run_query = mysqli_query($con,$toko_query);
    while($toko = mysqli_fetch_array($run_query)){
        $nama_toko = $toko["nama"];
        $deskripsi = $toko["deskripsi"];
        $foto_toko = $toko["foto"];
    }
$title = "$nama_toko | Ooshop!";
include 'header.php';
?>
<div class="container mt-4">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Ooshop!</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?= $nama_toko; ?></li>
	</ol>
</nav>
<img src="toko/foto_toko/<?=$foto_toko;?>" width="170" class="rounded-circle mx-auto d-block">
        <div class='card m-4'>
            <div class='shadow-sm bg-white rounded'>
            <div class='card-body'>

                <h2><?=$nama_toko;?></h2>
                <p>
                <?=$deskripsi;?>
                </p>

            </div>
            </div>
        </div>

<div class='header'>
	<h2>Produk</h2>
</div>
<div class='row mb-5'>
<?php 
		$produk = "SELECT * FROM produk WHERE id_toko = ".$id_toko;
		$run_query = mysqli_query($con,$produk);
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