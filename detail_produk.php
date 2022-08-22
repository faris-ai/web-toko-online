<?php
session_start();
include 'db.php';
$id_produk = $_GET['produk'];
$produk_query = "SELECT * FROM produk where id_produk=".$id_produk;
$run_query = mysqli_query($con,$produk_query);
while($row = mysqli_fetch_array($run_query)){
    $id_produk = $row['id_produk'];
	$nama_produk = $row['nama'];
	$harga = $row['harga'];
	$jumlah = $row['jumlah'];
	$foto = $row['foto'];
	$deskripsi = $row['deskripsi'];
	$id_toko = $row['id_toko'];
	$id_kategori = $row['id_kategori'];
}
$kategori_query = "SELECT nama FROM kategori WHERE id_kategori=".$id_kategori;
$run_query = mysqli_query($con,$kategori_query);
$nama_kategori = mysqli_fetch_array($run_query)['nama'];

$toko_query = "SELECT * FROM toko WHERE id_toko=".$id_toko;
$run_query = mysqli_query($con,$toko_query);
while($row = mysqli_fetch_array($run_query)){
	$id_toko = $row['id_toko'];
	$nama_toko = $row['nama'];
	$deskripsi_toko = $row['deskripsi'];
	$foto_toko = $row['foto'];
}
$title = $nama_produk." | Ooshop!";   
include 'header.php';
require "detail_produk_action.php";


?>

<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Ooshop!</a></li>
        <li class="breadcrumb-item"><a href="kategori.php?kat_id=<?= $id_kategori; ?>"><?= $nama_kategori; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $nama_produk; ?></li>
    </ol>
  </div>
</section>


<section class="section-content bg-white padding-y">
<div class="container">


	<div class="row">
		<aside class="col-md-6">
<div class="card">
<article class="gallery-wrap"> 
	<div class="img-big-wrap">
	  <div> <a href="#!"><img src="<?= "foto_produk/$foto"; ?>"></a></div>
	</div>
	<!-- <div class="thumbs-wrap">
	  <a href="" class="item-thumb"> <img src="<?= "$nama_kategori/$foto"; ?>"></a>
	  <a href="" class="item-thumb"> <img src="<?= "$nama_kategori/$foto"; ?>"></a>
	  <a href="" class="item-thumb"> <img src="<?= "$nama_kategori/$foto"; ?>"></a>
	  <a href="" class="item-thumb"> <img src="<?= "$nama_kategori/$foto"; ?>"></a>
	</div> slider-nav.// -->
</article>
</div>
</aside>
<main class="col-md-6">
<article class="product-info-aside">

<h2 class="title mt-3"><?= $nama_produk; ?></h2>


<div class="my-3"> 
	<var class="price h3" style="color:#602749;">Rp <?= number_format($harga,0,",","."); ?></var> <br>
	<small class="label-rating mt-0 <?php if ($jumlah==0) echo 'text-danger';?> " >Jumlah stok <?= $jumlah; ?></small>
</div>

<p>
	<?=$deskripsi;?>
</p>
<form action="" method="POST">
<dl class="row mt-4">
  <dt class="col-sm-3"><label for="inputUkuran">Ukuran</label></dt>
  <dd class="col-sm-5"> <div class="form-group">
      <select id="inputUkuran" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div></dd>
	<div class="col-sm-4"></div>

  <dt class="col-sm-3"><label for="inputWarna">Warna</label></dt>
  <dd class="col-sm-5"> <div class="form-group">
      <select id="inputWarna" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div></dd>
	<div class="col-sm-4"></div>

  <dt class="col-sm-3">Jumlah</dt>
  <dd class="col-sm-9"><div class="form-group">
			<div class="input-group input-spinner">
			  <div class="input-group-prepend">
			    <button class="btn btn-light" type="button" id="button-plus"> &minus; </button>
			  </div>
			  <input name="qty" type="text" class="form-control" value="1">
			  <div class="input-group-append">
			    <button class="btn btn-light" type="button" id="button-minus"> + </button>
			  </div>
			</div></dd>

  <dt class="col-sm-3"><label for="inputPengiriman">Pengiriman</label>	</dt>
  <dd class="col-sm-5"> <div class="form-group">
      <select id="inputPengiriman" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div></dd>
	<div class="col-sm-4"></div>

</dl>
	<div class="form-row mt-4">
		<div class="form-group col-md">	
		<input name="idproduk" type="text" value="<?=$id_produk;?>" hidden>
		<input name="jumlah" type="text" value="<?=$jumlah;?>" hidden>
		<button name="keranjang" id="keranjang" type="submit" class="btn btn-outline-dark mr-2" <?php if($jumlah==0) echo 'disabled';?>><i class="fa fa-shopping-cart"></i> <span class="text">Masukkan Keranjang</span> </button>
		<button name="beli" type="submit" class="btn px-5" style="background-color: #602749; color:white" <?php if($jumlah==0) echo 'disabled';?>>Beli Sekarang</button>
		
		</div> 
	</div> 
	</form>
</article> 
</main> 
</div>
</div>
</section>

<section class="section-name padding-y bg">
<div class="container">

<div class="box mb-5">
	<div class="row">
		<div class="col-1">
			<img class="icon icon-md rounded-circle" src="toko/foto_toko/<?=$foto_toko;?>">
		</div>
		<div class="col">
			<h5 class="title-description"><?= $nama_toko; ?></h5>
			<p><?= $deskripsi_toko; ?></p>
		</div>
		<div class="col-2">
			<a class="btn" style="background-color: #602749; color:white" href="toko.php?toko=<?= $id_toko; ?>" >Kunjungi Toko</a>
		</div>
	</div>
</div>
</div> 
</section>

<?php 
include 'footer.php';
?>