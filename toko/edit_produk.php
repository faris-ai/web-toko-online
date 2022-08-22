<?php 
include 'header.php';
require 'produk_action.php';
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
      <li class="breadcrumb-item active" aria-current="page">Edit Produk <?=$nama_produk;?></li>
  </ol>
</nav>

<div class='card'>
    <div class='shadow bg-white rounded p-3'>
    <h2 class="m-3">Edit Produk</h2>  
    <hr />
    <div class='card-body'>
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-8">
          <div class="form-group row">
              <label class="control-label col-sm-4" for="produk"><b>Nama Produk</b></label>
              <div class="col">
                <input type="text" name="idproduk" value="<?=$id_produk;?>" hidden>
                <input type="text" class="form-control" name="produk" id="produk" placeholder="Masukkan Nama Produk" value="<?=$nama_produk;?>">
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="kategori"><b>Kategori</b></label>
              <div class="col">
              <select name="kategori" id="kategori" class="form-control">
                    <?php
                        $kategori_query = "SELECT * FROM kategori";
                        $run_query = mysqli_query($con,$kategori_query);
                        while ($row = mysqli_fetch_array($run_query)) {
                           $id_kategori = $row["id_kategori"];
                            $kategori = $row["nama"];
                            if ($kategori == $nama_kategori){
                                echo '
                            <option value="'.$id_kategori.'" selected>'.$kategori.'</option>
                            ';
                            } else {
                            echo '
                            <option value="'.$id_kategori.'">'.$kategori.'</option>
                            ';
                            }
                        }
                    ?>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="harga"><b>Harga Produk</b></label>
              <div class="input-group col">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input type="number" min="0" step="100" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga Produk" value="<?=$harga;?>">
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="jumlah"><b>Jumlah Stok Produk</b></label>
              <div class="col">
                <input type="number" min="0" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Produk" value="<?=$jumlah;?>">
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="deskripsi"><b>Deskripsi</b></label>
              <div class="col">
                <textarea type="area" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi"><?=$deskripsi;?></textarea>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="jumlah"><b>Foto Produk</b></label>
              <div class="col-6">
                <img id="preview" class="img-thumbnail" src="../foto_produk/<?=$foto;?>">
              </div>
              <div class="col">
              <label class="btn btn-sm btn-outline-dark">
                        Ganti Foto <input name="foto" id="foto" type="file" accept="image/*" hidden>
                    </label>
                    <input type="hidden" name="fotoProduk" value="<?= $foto; ?>">
              </div>
          </div>

        <div class="form-group row">
              <div class="col">
              <button name="simpan" type="submit" class="btn px-5 mt-3 mx-auto d-block" style="background-color: #602749; color:white">Simpan</button>
              </div>
          </div>
        </div>
        </div>
      </form>
    </div>
    </div>
  </div>

</div>

<?php 
include 'footer.php';
?>
