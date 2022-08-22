<?php 
    include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?= $title; ?></title>

	<link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/style.css">
    <link href="public/css/ui.css?v=2.0" rel="stylesheet" type="text/css"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar sticky-top navbar-dark navbar-expand-md py-0" style="background-color: #3E1C33;">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="nav navbar-nav" style="float: right">
                <li class="nav-item">
                    <a class="nav-link pull-right" href="toko/">Jual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pull-right" href="#">Tentang Ooshop!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pull-right" href="#">Bantuan</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <nav class="navbar sticky-top navbar-dark navbar-expand-lg shadow" style="background-color: #602749;">
    <div class="container">
    <a class="navbar-brand" href="index.php">
            <img src="public/img/logo.png"class="d-inline-block align-top" height="50px" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php 
                    $kategori = "SELECT * FROM kategori";
                    $run_query = mysqli_query($con,$kategori);
                    if(mysqli_num_rows($run_query) > 0){
                        while($row = mysqli_fetch_array($run_query)){
                            $kat_id = $row['id_kategori'];
                            $kat_nama = $row['nama'];
                            echo "
                            <a class='dropdown-item' href='kategori.php?kat_id=$kat_id'>$kat_nama</a>
                            ";
                        }
                    }
                    ?>
                    </div>
                </li>
            </ul>
            <div class="col-md col-md-6 col">
                <form action="#" class="search-header">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" style="width:60%;" placeholder="Search">
                        <div class="input-group-append">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        </div>
                    </div>
                </form>
            </div>

            <a href="keranjang.php" class="widget-header btn btn-outline-light ml-auto mr-4">
                <i class="fa fa-shopping-cart"></i>
                <?php 
                    if(isset($_SESSION["loginO"])){
                        $keranjang = "SELECT * FROM keranjang WHERE id_user =".$_SESSION['uid'];
                        $run_query = mysqli_query($con,$keranjang);
                        if (mysqli_num_rows($run_query) > 0)
                            echo '<span class="notify">'.mysqli_num_rows($run_query).'</span>';
                    }
                ?>
                
            </a>

            <span class="navbar-text mr-4">|</span>
            
            <?php
                if (isset($_SESSION["loginO"])){
                    echo '
                        <div class="widget dropdown d-inline-block">
                            <a href="#" class="icontext mr-4 dropdown-toggle" data-toggle="dropdown" style="color: white;">
                                <img class="icon icon-xs rounded-circle" src="foto_profil/'.$_SESSION["foto"].'">
                                    '.$_SESSION["user"].'
                            </a> <!-- iconbox // -->
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="profile.php">Akun Saya</a>
                                <a class="dropdown-item" href="logout.php">Keluar</a>
                            </div>
                        </div>
                            ';
                } else {
                    echo '
                    <a class="btn btn-outline-light mr-sm-2 " href="login.php" role="button">Masuk</a>
                    <a class="btn btn-light" href="register.php" role="button">Daftar</a>
                    ';
                }
            ?>
            
        </div>
    </nav>