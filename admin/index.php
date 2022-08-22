<?php
include 'header.php';
require 'index_action.php';
?>

<div class="container mt-4">
<div class="row">
<div class='col-sm-5'>
<div class='card m-2 ' style="width: 25rem;">
    <div class='shadow bg-white rounded p-3'>
    <h3 class="m-3"><span class="fa fa-sign-in fa-fw mr-3"></span>Permintaan Registrasi</h3>
    <h1 class="display-3 text-center"><?=$jumlah_akun_awal;?></h1>
    <hr />
    <a href="permintaanregis.php" class="btn pull-right px-4 mx-auto d-block" style="background-color: #602749; color:white">Lihat Data</a>
    </div>
</div>
</div>
<div class='col-sm-5'>
<div class='card m-2' style="width: 25rem;">
    <div class='shadow bg-white rounded p-3'>
    <h3 class="m-3"><span class="fa fa-users fa-fw mr-3"></span>Jumlah Seluruh Akun</h3>
    <h1 class="display-3 text-center"><?=$jumlah_akun;?></h1>
    <hr />
    <a href="all_akun.php" class="btn pull-right px-4 mx-auto d-block" style="background-color: #602749; color:white">Lihat Data</a>
    </div>
</div>
</div>
<div class='col-sm-5'>
<div class='card m-2 mt-5' style="width: 25rem;">
    <div class='shadow bg-white rounded p-3'>
    <h3 class="m-3"><span class="fa fa-check-square-o fa-fw mr-3"></span>Akun Aktif</h3>
    <h1 class="display-3 text-center"><?=$jumlah_akun_aktif;?></h1>
    <hr />
    <a href="akun_aktif.php" class="btn pull-right px-4 mx-auto d-block" style="background-color: #602749; color:white">Lihat Data</a>
    </div>
</div>
</div>
<div class='col-sm-5'>
<div class='card m-2 mt-5' style="width: 25rem;">
    <div class='shadow bg-white rounded p-3'>
    <h3 class="m-3"><span class="fa fa-user-times fa-fw mr-3"></span>Akun Terblokir</h3>
    <h1 class="display-3 text-center"><?=$jumlah_akun_blokir;?></h1>
    <hr />
    <a href="akun_terblokir.php" class="btn pull-right px-4 mx-auto d-block" style="background-color: #602749; color:white">Lihat Data</a>
    </div>
</div>
</div>
<div class='col-sm-5'>
<div class='card m-2 mt-5' style="width: 25rem;">
    <div class='shadow bg-white rounded p-3'>
    <h3 class="m-3"><span class="fa fa-archive fa-fw mr-3"></span>Jumlah Produk</h3>
    <h1 class="display-3 text-center"><?=$jumlah_produk;?></h1>
    <hr />
    <a href="produk.php" class="btn pull-right px-4 mx-auto d-block" style="background-color: #602749; color:white">Lihat Data</a>
    </div>
</div>
</div>
<div class='col-sm-5'>
<div class='card m-2 mt-5' style="width: 25rem;">
    <div class='shadow bg-white rounded p-3'>
    <h3 class="m-3"><span class="fa fa-th-list fa-fw mr-3"></span>Jumlah Kategori</h3>
    <h1 class="display-3 text-center"><?=$jumlah_kategori;?></h1>
    <hr />
    <a href="kategori.php" class="btn pull-right px-4 mx-auto d-block" style="background-color: #602749; color:white">Lihat Data</a>
    </div>
</div>
</div>
</div>
</div>


<?php
include 'footer.php';
?>