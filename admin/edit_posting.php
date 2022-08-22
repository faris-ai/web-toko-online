<?php 
include 'header.php';
$id_user = $_GET["uid"];
$akun_run = mysqli_query($con, "SELECT * FROM users WHERE id_user =".$id_user);
while ($row = mysqli_fetch_array($akun_run)) {
    $username = $row["username"];
    $email = $row["email"];
    $nama_akun = $row["nama"];
    $jumlah_posting = $row["jumlah_posting"];
    $status = ($row['status'] == 0) ? "Belum Aktif" : (($row['status'] == 1) ? "Aktif" : "Terblokir");
    $badge = ($row['status'] == 0) ? "badge-warning" : (($row['status'] == 1) ? "badge-success" : "badge-danger");
    $id_toko = $row["id_toko"];
}

$toko_run = mysqli_query($con, "SELECT * FROM toko WHERE id_toko =".$id_toko);
while ($toko = mysqli_fetch_array($toko_run)) {
    $foto = $toko["foto"];
    $nama_toko = $toko["nama"];
    $deskripsi = $toko["deskripsi"];
}

$produk_run = mysqli_query($con, "SELECT * FROM produk WHERE id_toko =".$id_toko);
$jumlah_produk = mysqli_num_rows($produk_run);

if (isset($_POST["simpan"])) {
    $jumlah_posting = $_POST["posting"];

    $query = "UPDATE users SET jumlah_posting = $jumlah_posting WHERE id_user = $id_user";
	
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con) > 0) {
        echo "<script>
        alert('Anda telah berhasil mengupdate jumlah batasan posting pada akun ini!');
        document.location.href = 'toko.php';
        </script>";	

	} else {
		echo mysqli_error($con);
	}
}
?>
<div class="container mt-4 mb-5">
<div class='card'>
    <div class='shadow bg-white rounded p-3'>
    <h2 class="m-3">Edit Batasan Posting Produk</h2>  
    <hr />
    <div class='card-body'>
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-8">
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Username</b></label>
              <div class="col ml-2">
                <?=$username;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Email</b></label>
              <div class="col ml-2">
                <?=$email;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Nama Akun</b></label>
              <div class="col ml-2">
              <?=$nama_akun;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Foto Toko</b></label>
              <div class="col ml-2">
                <img class="icon icon-md" src="../toko/foto_toko/<?=$foto;?>">
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Nama Toko</b></label>
              <div class="col ml-2">
              <?=$nama_toko;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Deskripsi</b></label>
              <div class="col ml-2">
                <p><?=$deskripsi;?></p>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5"><b>Jumlah Produk</b></label>
              <div class="col ml-2">
                <?=$jumlah_produk;?>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-5" for="posting"><b>Batasan Jumlah Posting Produk</b></label>
              <div class="col-sm-2">
              <input type="number" min="0" class="form-control" name="posting" id="jupostingmlah" placeholder="Masukkan Jumlah Produk" value="<?=$jumlah_posting;?>">
              </div>
          </div>
          </div>
        </div>
        <div class="form-group row">
              <div class="col">
              <button name="simpan" type="submit" class="btn px-5 mt-3 mx-auto d-block" style="background-color: #602749; color:white">Simpan</button>
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
