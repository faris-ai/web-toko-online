<?php
    session_start();
    $title = "Akun Saya | Ooshop!";
    include 'header.php';
    require 'profile_action.php';

?>
<div class="container mt-4">
  <div class="row">
<div class='col-md-2'>
<div class="mt-3 mx-auto d-block">
  
  <h5><img class="icon icon-sm rounded-circle mr-3 cover" src="foto_profil/<?=$foto;?>"><?=$username;?></h5>
</div>
<hr />
<div class="nav flex-column nav-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-profil-tab" data-toggle="pill" href="#v-pills-profil" role="tab" aria-controls="v-pills-profil" aria-selected="true">Profil Saya</a>
      <a class="nav-link" id="v-pills-pesanan-tab" data-toggle="pill" href="#v-pills-pesanan" role="tab" aria-controls="v-pills-pesanan" aria-selected="false">Pesanan Saya</a>
      <a class="nav-link" id="v-pills-notif-tab" data-toggle="pill" href="#v-pills-notif" role="tab" aria-controls="v-pills-notif" aria-selected="false">Notifikasi</a>
    </div>
</div>
<div class='col-md-10'>
<div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-profil" role="tabpanel" aria-labelledby="v-pills-profil-tab">
      <div class='card'>
					<div class='shadow bg-white rounded p-3'>
          <h2 class="m-3">Profil Saya</h2>  
          <hr />
					<div class='card-body'>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-9">
                <div class="form-group row">
                    <label class="control-label col-sm-4" for="username"><b>Username</b></label>
                    <div class="col">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" value="<?=$username;?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-4" for="name"><b>Nama</b></label>
                    <div class="col">
                      <input type="text" class="form-control" name="fullname" id="name" placeholder="Masukkan Nama" value="<?=$nama_user;?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-4" for="email"><b>Email</b></label>
                    <div class="col">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="<?=$email;?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-4" for="tlp"><b>Nomor Telepon</b></label>
                    <div class="col">
                      <input type="tel" class="form-control" name="telepon" id="tlp" placeholder="Masukkan Nomor Telepon" value="<?=$telepon;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-4" for="alamat"><b>Alamat</b></label>
                    <div class="col">
                      <textarea type="area" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"><?=$alamat;?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-sm-4"><b>Jenis Kelamin</b></label>
                  <div class="col">
                    <div class="radio row ml-2">
                      <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="l" <?php echo($jeniskelamin == 'l' ||  $jeniskelamin == null) ? "checked" : ""; ?> /> Laki - Laki
                      </label>
                      <div class="mr-3"></div>
                      <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="p" <?php echo($jeniskelamin == 'p') ? "checked" : ""; ?>/> Perempuan
                      </label>
                  </div>
                  </div>
              </div>
                <div class="form-group row">
                  <label class="control-label col-sm-4"><b>Tanggal Lahir</b></label>
                    <div class="col">
                      <input type="date" class="form-control" id="datepicker"  name="datepicker" value="<?=$tanggallahir;?>">
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
                <img id="preview" class="img-thumbnail icon icon-lg rounded-circle mx-auto d-block" src="foto_profil/<?=$foto;?>">
                <div class="div mt-4 px-5">
                  <label class="btn btn-sm btn-outline-dark mx-auto d-block">
                      Ganti Foto <input name="foto" id="foto" type="file" accept="image/*"  hidden>
                  </label>
                  <input type="hidden" name="fotoLama" value="<?= $foto; ?>">
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
      <div class="tab-pane fade" id="v-pills-pesanan" role="tabpanel" aria-labelledby="v-pills-pesanan-tab">
      <div class='card'>
					<div class='shadow bg-white rounded p-3'>
            <h2 class="m-3">Pesanan Saya</h2> 
            <hr />
					<div class='card-body'>
					</div>
          </div>
      </div>
      </div>
      <div class="tab-pane fade" id="v-pills-notif" role="tabpanel" aria-labelledby="v-pills-notif-tab">
      <div class='card'>
					<div class='shadow bg-white rounded p-3'>
            <h2 class="m-3">Notifikasi</h2> 
            <hr />
					<div class='card-body'>
					</div>
          </div>
      </div>
      </div>
    </div>
  </div>    
  </div>
</div>

        
<?php
    include 'footer.php';
?>
