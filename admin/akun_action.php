<?php

session_start();
include '../db.php';

if (isset($_GET)) {
    if(isset($_GET["blokir"])){
        $id_user = $_GET["blokir"];
        mysqli_query($con, "UPDATE users SET status = 2 WHERE id_user = $id_user");
        if (mysqli_affected_rows($con) > 0){
            echo "<script>
            alert('Akun berhasil diblokir!');
            document.location.href = 'akun_aktif.php';
            </script>";
        } else {
            echo "<script>
            alert('Akun gagal diblokir!');
            document.location.href = 'akun_aktif.php';
            </script>";
        }
    } else if(isset($_GET["aktif"])){
        $id_user = $_GET["aktif"];
        mysqli_query($con, "UPDATE users SET status = 1 WHERE id_user = $id_user");
        if (mysqli_affected_rows($con) > 0){
            echo "<script>
            alert('Akun berhasil diaktifkan!');
            document.location.href = 'akun_terblokir.php';
            </script>";
        } else {
            echo "<script>
            alert('Akun gagal diaktifkan!');
            document.location.href = 'akun_terblokir.php';
            </script>";
        }
    }
}