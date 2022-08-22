<?php
include 'header.php';
?>

<div class="container mt-4">
<img src="foto_toko/<?=$foto_toko;?>" width="170" class="rounded-circle mx-auto d-block">
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
		if(mysqli_num_rows($run_query) > 0) :
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
					<a href='detail_produk.php?produk_toko=$pro_id'>
					<img class='card-img-top' src='../foto_produk/$pro_foto' alt='$pro_nama'>
					</a>
					<div class='card-body'>
					<a href='detail_produk.php?produk_toko=$pro_id'><h5 class='card-title'>$pro_nama</h5></a>
					<p style='color:#000000;'>Rp ".number_format($pro_harga,0,",",".")."</p>
					<!--<a href='detail.php?produk=$pro_id' class='btn mx-auto d-block' style='background-color: #602749; color:white'>Details</a>-->
					</div>
					</div>
					</div>
					</div>
					
					";

					}
				else :
	?>
	<div class="col">

		<div class="text-center">
			<h3>Wah, produkmu masih kosong</h3>
			<h4>Yuk, tambah produk barumu di Ooshop!</h4>
			<a href="tambah_produk.php" class="btn px-5 my-4" style="background-color: #602749; color:white">Tambah Produk Baru</a>
		</div>
	</div>
	<?php endif; ?>
	</div>
</div>


<?php
include 'footer.php';
?>