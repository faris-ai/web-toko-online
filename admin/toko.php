<?php
include 'header.php';
$toko_run = mysqli_query($con, "SELECT * FROM toko");
$toko_toko = array();
if (mysqli_num_rows($toko_run)>0) {
    while ($row = mysqli_fetch_array($toko_run))
        $toko_toko[] = $row;
} 

?>

<div class="container mt-4 mb-5">
<div class="shadow p-3 bg-white rounded">
<h1 class="m-4">Data Toko<span><h3 class="pull-right"><?=count($toko_toko);?> toko</h3></span></h1>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="panel-body">
            <?php if(isset($toko_toko)) : ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Toko</th>
                                <th>Deskripsi</th>
                                <th>Batasan Jumlah Posting</th>
                                <th>Jumlah Produk</th>
                                <th>Status</th>
                                <th>Akun Pemilik Toko</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($toko_toko as $toko) :
                                $id_toko = $toko["id_toko"];
                                $foto = $toko["foto"];
                                $nama = $toko["nama"];
                                $deskripsi = $toko["deskripsi"];
                                
                                $produk_run = mysqli_query($con, "SELECT * FROM produk WHERE id_toko =".$id_toko);
                                $jumlah_produk = mysqli_num_rows($produk_run);

                                $akun_run = mysqli_query($con, "SELECT * FROM users WHERE id_toko =".$id_toko);
                                while ($row = mysqli_fetch_array($akun_run)) {
                                    $id_user = $row["id_user"];
                                    $nama_akun = $row["nama"];
                                    $jumlah_posting = $row["jumlah_posting"];
                                        $status = ($row['status'] == 0) ? "Belum Aktif" : (($row['status'] == 1) ? "Aktif" : "Terblokir");
                                        $badge = ($row['status'] == 0) ? "badge-warning" : (($row['status'] == 1) ? "badge-success" : "badge-danger");
                                } 
                                

                            ?>
                            <tr>
                                <td class="text-center"><?=$i;?></td>
                                <td class="text-center"><img src="../toko/foto_toko/<?=$foto;?>" class="icon icon-xs rounded-circle"/></td>
                                <td><?=$nama;?></td>
                                <td><?=$deskripsi;?></td>
                                <td class="text-center"><?=$jumlah_posting;?><a class="badge badge-primary ml-3" href="edit_posting.php?uid=<?=$id_user;?>">edit</a></td>
                                <td class="text-center"><?=$jumlah_produk;?></td>
                                <td class="text-center">
                                    <span class="badge <?=$badge;?>"><?=$status;?></span></td>
                                <td class="text-center"><?=$nama_akun;?></td>
                            </tr>
                            <?php
                            $i++;
                            endforeach; 
                            ?>

                        </tbody>
                    </table>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
</div>
            
<?php
include 'footer.php';
?>