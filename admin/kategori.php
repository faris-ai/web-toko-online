<?php
include 'header.php';
$kategori_query = "SELECT * FROM kategori";
$run_query = mysqli_query($con,$kategori_query);
$jumlah_kategori = mysqli_num_rows($run_query);
if($jumlah_kategori > 0){
    while($row = mysqli_fetch_array($run_query)){
        $kategori[] = $row;
    }
}
?>
<div class="container mt-4 mb-5">
<div class="shadow p-3 bg-white rounded">
<h1 class="m-4">Data Kategori<span><h3 class="pull-right"><?=$jumlah_kategori;?> Kategori</h3></span></h1>
<a href="kategori_action.php?action=0" class="btn mb-4" style="background-color: #602749; color:white; float:right">+ Tambah Kategori Baru</a>
<?php if(isset($kategori)) : ?>
<table id="dtOrderExample" class="table table-striped mt-5" cellspacing="0" width="100%">
  <thead>
    <tr class="th-sm text-center">
      <th scope="col">No</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $i = 1;
      
      foreach ($kategori as $ktgr) :
        $id_kat = $ktgr['id_kategori'];
        $nama_kategori = $ktgr['nama'];


      ?>
    <tr>
      

      <th scope="row" class="align-middle text-center"><?=$i;?></th>
      <td class="align-middle text-center"><?=$nama_kategori;?></td>

      <td class="align-middle text-center">  
        <a class='btn btn-primary mr-3' href='kategori_action.php?action=1&kat=<?=$id_kat;?>' role='button'><i style='font-size:16px' class='fa fa-edit '></i> Edit</a> 
        <a class='btn btn-danger' href='kategori_action.php?action=2&kat=<?=$id_kat;?>' role='button' onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')"><i style='font-size:16px' class='fa fa-trash-o'></i> Delete</a>
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