<?php
include 'header.php';
require 'toko_action.php';
?>
<div class="container mt-4">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Ooshop! Toko</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profil Toko</li>
  </ol>
</nav>
  <div class='card'>
    <div class='shadow bg-white rounded p-3'>
    <h2 class="m-3">Profil Toko</h2>  
    <hr />
    <div class='card-body'>
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-9">
          <div class="form-group row">
              <label class="control-label col-sm-4" for="toko"><b>Nama Toko</b></label>
              <div class="col">
                <input type="text" class="form-control" name="toko" id="toko" placeholder="Masukkan Nama Toko" value="<?=$nama_toko;?>">
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-4" for="deskripsi"><b>Deskripsi</b></label>
              <div class="col">
                <textarea type="area" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi"><?=$deskripsi;?></textarea>
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-4"><b>Jumlah posting produk</b>
                <a class="material-tooltip-main" data-toggle="tooltip" title="Jumlah batasan mengupload produk. Hubungi admin untuk menambah batasan upload.">&#226141176;</a>
              </label>
              <div class="col">
                <?=$jumlah_posting;?>
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-4"><b>Status</b></label>
              <div class="col">
                <?=$status?>
              </div>
          </div>
          </div>
          <div class="col">
          <img id="preview" class="img-thumbnail icon icon-lg rounded-circle mx-auto d-block" src="foto_toko/<?=$foto_toko;?>">
          <div class="div mt-4 px-5">
            <label class="btn btn-sm btn-outline-dark mx-auto d-block">
                Ganti Foto <input name="foto" id="foto" type="file" accept="image/*" hidden>
            </label>
            <input type="hidden" name="fotoLama" value="<?= $foto_toko; ?>">
          </div>
          </div>
        </div>
        <div class="form-group row">
              <div class="col-sm-offset-12 col-sm-12">
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