<?php 
include 'header.php';
$id_produk = $_GET['produk_toko'];
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
if($_SESSION['tid'] != $id_toko){
  echo "
      <script>
      alert('Anda tidak punya akses untuk produk ini');
      document.location.href = 'produk.php';
      </script>
  ";
}
$kategori_query = "SELECT nama FROM kategori WHERE id_kategori=".$id_kategori;
$run_query = mysqli_query($con,$kategori_query);
$nama_kategori = mysqli_fetch_array($run_query)['nama'];

?>
<div class="container mt-4 mb-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Ooshop! Toko</a></li>
      <li class="breadcrumb-item"><a href="produk.php">Produk Saya</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Produk <?=$nama_produk;?></li>
  </ol>
</nav>

<div class='card'>
    <div class='shadow bg-white rounded p-3'>
    <h2 class="m-3">Detail Produk</h2>  
    <hr />
    <div class='card-body'>
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-8">
          <div class="form-group row">
              <label class="control-label col-sm-4"><b>Nama Produk</b></label>
              <div class="col">
                <?=$nama_produk;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4"><b>Kategori</b></label>
              <div class="col">
                <?=$nama_kategori;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4"><b>Harga Produk</b></label>
              <div class="col">
                <?=number_format($harga,0,",",".") ?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="jumlah"><b>Jumlah Stok Produk</b></label>
              <div class="col">
                <?=$jumlah;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="deskripsi"><b>Deskripsi</b></label>
              <div class="col">
                <p><?=$deskripsi;?></p>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="jumlah"><b>Foto Produk</b></label>
              <div class="col">
                <img class="img-thumbnail" src="../foto_produk/<?=$foto;?>">
              </div>
          </div>
          </div>
        </div>
        <div class="text-center mt-3">
              <a href="edit_produk.php?produk_toko=<?=$id_produk;?>" class="btn btn-primary px-5 mx-3">Edit</a>
              <a href="hapus_produk.php?produk=<?=$id_produk;?>" class="btn btn-danger px-5 mx-3" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')">Hapus</a>
          </div>
      </form>
    </div>
    </div>
  </div>

</div>

<?php 
include 'footer.php';
?>
