<?php
include 'header.php';
$produk_query = "SELECT * FROM produk";
$run_query = mysqli_query($con,$produk_query);
$jumlah_produk = mysqli_num_rows($run_query);
if($jumlah_produk > 0){
    while($row = mysqli_fetch_array($run_query)){
        $produk[] = $row;
    }
}
?>
<div class="container mt-4 mb-5">
<div class="shadow p-3 bg-white rounded">
<h1 class="m-4">Data Produk<span><h3 class="pull-right"><?=$jumlah_produk;?> Produk</h3></span></h1>

<?php if(isset($produk)) : ?>
<table id="dtOrderExample" class="table table-striped mt-5" cellspacing="0" width="100%">
  <thead>
    <tr class="th-sm text-center">
      <th scope="col">No</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah Stok</th>
      <th scope="col">Toko</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $i = 1;

      foreach ($produk as $pro) :
        $pro_id = $pro['id_produk'];
        $pro_nama = $pro['nama'];
        $pro_harga = $pro['harga'];
        $pro_jumlah = $pro['jumlah'];
        $pro_foto = $pro['foto'];
        $id_kategori = $pro['id_kategori'];
        $id_toko = $pro['id_toko'];

        $kategori_query = "SELECT nama FROM kategori where id_kategori=".$id_kategori;
        $run_query = mysqli_query($con,$kategori_query);
        $nama_kategori = mysqli_fetch_array($run_query)['nama'];

        $toko_query = "SELECT nama FROM toko where id_toko=".$id_toko;
        $run_query = mysqli_query($con,$toko_query);
        $nama_toko = mysqli_fetch_array($run_query)['nama'];
      ?>
    <tr>
      

      <th scope="row" class="align-middle text-center"><?=$i;?></th>
      <td class="align-middle text-center"><img width="100" height="100" src="../foto_produk/<?=$pro_foto;?>" alt="" class="img-thumbnail"></td>
      <td class="align-middle"><?=$pro_nama;?></td>
      <td class="align-middle text-center"><?=$nama_kategori;?></td>
      <td class="align-middle text-right">Rp <?=number_format($pro_harga,0,",",".") ?></td>
      <td class="align-middle text-center"><?=$pro_jumlah; ?></td>
      <td class="align-middle text-center"><?=$nama_toko; ?></td>
      <td class="align-middle text-center">                                    
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