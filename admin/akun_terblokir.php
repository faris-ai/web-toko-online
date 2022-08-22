<?php
include 'header.php';
$akunAktif = mysqli_query($con, "SELECT * FROM users WHERE status = 2");
$akuns = array();
if (mysqli_num_rows($akunAktif)>0) {
    while ($row = mysqli_fetch_array($akunAktif))
        $akuns[] = $row;
} 

?>

<div class="container mt-4 mb-5">
<div class="shadow p-3 bg-white rounded">
    <h1 class="m-4">Akun Terblokir<span><h3 class="pull-right"><?=count($akuns);?> Akun</h3></span></h1>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="panel-body">
            <?php if(isset($akuns)) : ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables-example">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Username</th>
                                <th>Nama Akun</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($akuns as $akun) :
                                $id_user = $akun["id_user"];
                                $foto = $akun["foto"];
                                $username = $akun["username"];
                                $nama = $akun["nama"];
                                $email = $akun["email"];
                                $status = ($akun['status'] == 0) ? "Belum Aktif" : (($akun['status'] == 1) ? "Aktif" : "Terblokir");
                                $badge = ($akun['status'] == 0) ? "badge-warning" : (($akun['status'] == 1) ? "badge-success" : "badge-danger");

                            ?>
                            <tr>
                                <td class="text-center"><?=$i;?></td>
                                <td class="text-center"><img src="../foto_profil/<?=$foto;?>" class="icon icon-xs rounded-circle"/></td>
                                <td><?=$username;?></td>
                                <td><?=$nama;?></td>
                                <td><?=$email;?></td>
                                <td class="text-center">
                                    <span class="badge <?=$badge;?>"><?=$status;?></span></td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="akun_action.php?aktif=<?=$id_user;?>" role="button"data-toggle="tooltip" data-placement="top" title="Aktifkan Akun" onclick="return confirm('Apakah anda yakin ingin mengaktifkan akun ini?')"><i style='font-size:16px' class="fa fa-check fa-3x"></i></a>
                                </td>
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