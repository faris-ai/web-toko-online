<?php
include 'header.php';
$produk_query = "SELECT * FROM produk WHERE id_toko = ".$id_toko;
$run_query = mysqli_query($con,$produk_query);
$jumlah_produk = mysqli_num_rows($run_query);
if($jumlah_produk > 0){
    while($row = mysqli_fetch_array($run_query)){
        $produk[] = $row;
    }
}
?>
<div class="container mt-4 mb-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Ooshop! Toko</a></li>
      <li class="breadcrumb-item active" aria-current="page">Produk Saya</li>
  </ol>
</nav>
<div class="shadow p-3 bg-white rounded">
<h1>Produk Saya</h1>
<br>
<h3><?=$jumlah_produk;?> Produk<span> <a href="tambah_produk.php" class="btn" style="background-color: #602749; color:white; float:right">+ Tambah Produk Baru</a></span></h3>
<?php
if($jumlah_produk >= $jumlah_posting){
    echo '
      <small class="text-danger">Anda telah mencapai batas posting produk</small>  
    ';
}
?>

<?php if(isset($produk)) : ?>
<table id="dtOrderExample" class="table table-striped mt-5" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th scope="col" class="th-sm text-center">No</th>
      <th scope="col" class="th-sm text-center">Foto</th>
      <th scope="col" class="th-sm text-center">Nama Barang</th>
      <th scope="col" class="th-sm text-center">Kategori</th>
      <th scope="col" class="th-sm text-center">Harga</th>
      <th scope="col" class="th-sm text-center">Jumlah Stok</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $i = 1;
      $total_harga=0;
      
      foreach ($produk as $pro) :
        $pro_id = $pro['id_produk'];
        $pro_nama = $pro['nama'];
        $pro_harga = $pro['harga'];
        $pro_jumlah = $pro['jumlah'];
        $pro_foto = $pro['foto'];
        $id_kategori = $pro['id_kategori'];

        $kategori_query = "SELECT nama FROM kategori where id_kategori=".$id_kategori;
        $run_query = mysqli_query($con,$kategori_query);
        $nama_kategori = mysqli_fetch_array($run_query)['nama'];
      ?>
    <tr>
      

      <th scope="row" class="align-middle text-center"><?=$i;?></th>
      <td class="align-middle text-center"><img width="100" height="100" src="../foto_produk/<?=$pro_foto;?>" alt="" class="img-thumbnail"></td>
      <td class="align-middle"><a href='detail_produk.php?produk_toko=<?=$pro_id?>'><?=$pro_nama;?></a></td>
      <td class="align-middle text-center"><?=$nama_kategori;?></td>
      <td class="align-middle text-right">Rp <?=number_format($pro_harga,0,",",".") ?></td>
      <td class="align-middle text-center"><?=$pro_jumlah; ?></td>
      <td class="align-middle text-center">
            <a class="btn btn-primary" href="edit_produk.php?produk_toko=<?=$pro_id;?>" role="button"><i style='font-size:16px' class="fa fa-edit"></i></a>                                         
          <a class="btn btn-danger" href="hapus_produk.php?produk=<?=$pro_id;?>" role="button" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')"><i style='font-size:16px' class="fa fa-trash-o"></i></a>
      </td>

    </tr>
    <?php
    $i++;
    endforeach; 
    ?>
  </tbody>
</table>
<?php endif;?>

</div>
</div>

<?php
include 'footer.php'; 
?>