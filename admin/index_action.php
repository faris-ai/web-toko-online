<?php

include '../db.php';

$akun = mysqli_query($con, "SELECT * FROM users");
$jumlah_akun = mysqli_num_rows($akun);

$akunAwal = mysqli_query($con, "SELECT * FROM users WHERE status = 0");
$jumlah_akun_awal = mysqli_num_rows($akunAwal);

$akunAktif = mysqli_query($con, "SELECT * FROM users WHERE status = 1");
$jumlah_akun_aktif = mysqli_num_rows($akunAktif);

$akunBlokir = mysqli_query($con, "SELECT * FROM users WHERE status = 2");
$jumlah_akun_blokir = mysqli_num_rows($akunBlokir);

$produk = mysqli_query($con, "SELECT * FROM produk");
$jumlah_produk = mysqli_num_rows($produk);

$kategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlah_kategori = mysqli_num_rows($kategori);