<?php
session_start();
if (!isset($_SESSION["loginO"])) {
  echo "
        <script>
		document.location.href = 'login.php';
		</script>
        ";
  exit;
}
$title = "Keranjang | Ooshop!";
include 'header.php';


$id_user = $_SESSION['uid'];
$keranjang = "SELECT * FROM keranjang WHERE id_user =".$id_user;
$run_query = mysqli_query($con,$keranjang);
while($row = mysqli_fetch_array($run_query)){
  $keranjangs[] = $row;
}

?>
<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Ooshop!</a></li>
    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
  </ol>
</nav>
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<h2><i class='fa fa-shopping-cart' style='font-size:24px'></i> Keranjang</h2>
<?php if(isset($keranjangs)) : ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">No</th>
      <th scope="col" class="text-center">Gambar</th>
      <th scope="col" class="text-center">Nama Barang</th>
      <th scope="col" class="text-center">Jumlah</th>
      <th scope="col" class="text-center">Harga</th>
      <th scope="col" class="text-center">Total Harga</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $i = 1;
      $total_harga=0;
      foreach ($keranjangs as $keran) :
        $qty = $keran["qty"];
        $produk = "SELECT * FROM produk WHERE id_produk=".$keran["id_produk"];
        $run_query = mysqli_query($con,$produk);
        while($row = mysqli_fetch_array($run_query)){
          $pro_id = $row['id_produk'];
          $pro_nama = $row['nama'];
          $pro_harga = $row['harga'];
          $pro_jumlah = $row['jumlah'];
          $pro_foto = $row['foto'];
        }
      ?>
    <tr>
      

      <th scope="row" class="align-middle text-center"><?=$i;?></th>
      <td class="align-middle text-center"><img width="100" height="100" src="foto_produk/<?=$pro_foto;?>" alt="" class="img-thumbnail"></td>
      <td class="align-middle"><a href='detail_produk.php?produk=<?=$pro_id?>'><?=$pro_nama;?></a></td>
      <td class="align-middle text-center">
        <div class="btn-group" role="group" aria-label="basic example">
          <button type="button" class="btn btn-secondary">-</button>
          <a type="text" class="btn btn-secondary"><?=$qty;?></a>
          <button type="button" class="btn btn-secondary">+</button>
        </div>
      </td>
      <td class="align-middle text-right">Rp <?=number_format($pro_harga,0,",",".") ?></td>
      <td class="align-middle text-right">Rp <?=number_format(($pro_harga*$qty),0,",",".") ?></td>
      <td class="align-middle text-center">
          <a class="btn btn-danger" href="hapus_keranjang.php?id=<?=$keran["id_keranjang"];?>" role="button" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini dari keranjang?')"><i style='font-size:16px' class="fa fa-trash-o"></i></a>
      </td>

    </tr>
    <?php
    $total_harga += ($pro_harga*$qty);
    $i++;
    endforeach;
    
    ?>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <th class="text-right">Total Harga</th>
      <th class="text-right">Rp <?=number_format($total_harga,0,",",".") ?></th>
      <td class="text-center"><a class="btn btn-success" href="#" role="button"><i style='font-size:16px' class="fa fa-shopping-cart fa-3x"></i> Checkout </a></td>
    </tr>
  </tbody>
</table>
<?php else : ?>
  <div class="text-center">
    <h3>Wah, keranjang belanjamu masih kosong</h3>
    <h4>Yuk, telusuri produk menarik dari Ooshop!</h4>
    <a href="index.php" class="btn px-5 my-4" style="background-color: #602749; color:white">Belanja sekarang</a>
  </div>
<?php endif;?>
</div>

</div>      
</div>

<?php 
include 'footer.php';
?>
