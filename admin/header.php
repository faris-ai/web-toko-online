<?php 
session_start();
if (!isset($_SESSION["AdminLog"])) {
    echo "
        <script>
        document.location.href = 'login.php';
        </script>
    ";
    exit;
}
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Ooshop! Admin</title>

	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/simple-sidebar.css">
    <link href="assets/css/ui.css?v=2.0" rel="stylesheet" type="text/css"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #602749;">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-white" href="index.php">
        <img src="assets/img/logo.png" height="30" class="d-inline-block align-top" alt="">
        <span class="menu-collapsed">Admin</span>
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="nav navbar-nav" style="float: right">
            <li class="nav-item">
                <a class="text-white nav-link pull-right" href="logout.php">Keluar</a>
            </li>

            <li class="nav-item dropdown d-sm-block d-md-none">
            <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Permintaan Registrasi</a>
                <a class="dropdown-item" href="#">Data Akun</a>
                <a class="dropdown-item" href="#">Toko</a>
                <a class="dropdown-item" href="#">Produk</a>
                <a class="dropdown-item" href="#">Kategori</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>Admin</small>
                </li>
                <a href="index.php" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span>Dashboard</span>
                    </div>
                </a>
                <a href="permintaanregis.php" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-sign-in fa-fw mr-3"></span>
                        <span>Permintaan Registrasi</span>
                        <?php 
                            $akunAwal = mysqli_query($con, "SELECT * FROM users WHERE status = 0");
                            $jumlah_akun_awal = mysqli_num_rows($akunAwal);
                            if ($jumlah_akun_awal > 0) {
                                echo '
                                <span class="badge badge-danger">'.$jumlah_akun_awal.'</span>
                                ';
                            }
                        ?>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-users fa-fw mr-3"></span>
                        <span class="menu-collapsed">Data Akun</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="all_akun.php" class="list-group-item list-group-item-action">
                        <span class="fa fa-users fa-fw mr-3"></span>
                        <span class="menu-collapsed">Data Seluruh Akun</span>
                    </a>
                    <a href="akun_aktif.php" class="list-group-item list-group-item-action">
                        <span class="fa fa-check-square-o fa-fw mr-3"></span>
                        <span class="menu-collapsed">Akun AKtif</span>
                    </a>
                    <a href="akun_terblokir.php" class="list-group-item list-group-item-action">
                        <span class="fa fa-user-times fa-fw mr-3"></span>
                        <span class="menu-collapsed">Akun Terblokir</span>
                    </a>
                </div>
                <a href="toko.php" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tags fa-fw mr-3"></span>
                        <span>Toko</span>
                    </div>
                </a>
                <a href="produk.php" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-archive fa-fw mr-3"></span>
                        <span>Produk</span>
                    </div>
                </a>
                <a href="kategori.php" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-th-list fa-fw mr-3"></span>
                        <span>Kategori</span>
                    </div>
                </a>   
            </ul>
        </div>
    