<?php 
    session_start();
    if (!isset($_SESSION["loginO"])) {
    echo "
            <script>
            document.location.href = '../login.php';
            </script>
            ";
    exit;
    }
    include '../db.php';
    $id_user = $_SESSION["uid"];
    $id_toko = $_SESSION["tid"];
    $run_query = mysqli_query($con,"SELECT jumlah_posting, id_toko, status FROM users WHERE id_user =".$id_user);
    if(mysqli_num_rows($run_query) == 0) {
        echo "
            <script>
            document.location.href = '../logout.php';
            </script>
            ";
    exit;
    }
     while ($row = mysqli_fetch_array($run_query)) {
         $jumlah_posting = $row['jumlah_posting'];
         $status = ($row['status'] == 0) ? "Belum Aktif" : (($row['status'] == 1) ? "Aktif" : "Terblokir");
        }
    $toko_query = "SELECT * FROM toko WHERE id_toko =".$id_toko;
    $run_query = mysqli_query($con,$toko_query);
    while($toko = mysqli_fetch_array($run_query)){
        $nama_toko = $toko["nama"];
        $deskripsi = $toko["deskripsi"];
        $foto_toko = $toko["foto"];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Ooshop! Toko</title>

	<link type="text/css" rel="stylesheet" href="../public/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="../public/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="../public/css/style.css">
	<link rel="stylesheet" href="../public/css/simple-sidebar.css">
    <link href="../public/css/ui.css?v=2.0" rel="stylesheet" type="text/css"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-expand-md shadow-sm" style="background-color: white;">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="../public/img/logo-p.png" height="30" class="d-inline-block align-top" alt="">
        <span class="menu-collapsed">Toko</span>
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="nav navbar-nav" style="float: right">
            <li class="nav-item">
                <a class="nav-link pull-right mr-5" href="../">Kembali ke Ooshop!</a>
            </li>
            <div class="widget dropdown d-inline-block">
                <a href="#" class="icontext mr-4 dropdown-toggle" data-toggle="dropdown">
                    <img class="icon icon-xs rounded-circle" src="../foto_profil/<?=$_SESSION["foto"];?>">
                        <?=$_SESSION["user"];?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="toko.php">Profil Toko</a>
                    <a class="dropdown-item" href="../logout.php">Keluar</a>
                </div>
            </div>
            <li class="nav-item">
                <a class="nav-link pull-right" href="#">Bantuan</a>
            </li>

            <li class="nav-item dropdown d-sm-block d-md-none">
            <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                <a class="dropdown-item" href="#">Produk</a>
                <a class="dropdown-item" href="#">Toko</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <a href="index.php" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-home fa-fw mr-3"></span>
                        <span>Beranda</span>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-shopping-bag fa-fw mr-3"></span>
                        <span class="menu-collapsed">Produk</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="produk.php" class="list-group-item list-group-item-action">
                        <span class="menu-collapsed">Produk Saya</span>
                    </a>
                    <a href="tambah_produk.php" class="list-group-item list-group-item-action">
                        <span class="menu-collapsed">Tambah Produk</span>
                    </a>
                </div>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Profil</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="toko.php" class="list-group-item list-group-item-action">
                        <span class="menu-collapsed">Toko</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="menu-collapsed">Pengaturan</span>
                    </a>
                </div>            
            </ul>
        </div>
    