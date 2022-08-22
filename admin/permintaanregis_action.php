<?php

session_start();
include '../db.php';

if (isset($_GET)) {
    if(isset($_GET["terima"])){
        $id_user = $_GET["terima"];
        $query_user = "SELECT * FROM users WHERE id_user = ".$id_user;
		$run_user = mysqli_query($con, $query_user);
        $username = mysqli_fetch_array($run_user)["username"];

        $query = "INSERT INTO toko (nama) VALUES ('$username')";
		mysqli_query($con, $query);

		$run_query = mysqli_query($con,"SELECT id_toko FROM toko WHERE nama= '$username'");
        $id_toko = mysqli_fetch_array($run_query)["id_toko"];
        
        mysqli_query($con, "UPDATE users SET status = 1, id_toko = $id_toko WHERE id_user = $id_user");
        if (mysqli_affected_rows($con) > 0){
            echo "<script>
            alert('Akun berhasil diterima!');
            document.location.href = 'permintaanregis.php';
            </script>";
        } else {
            echo "<script>
            alert('Akun gagal diterima!');
            document.location.href = 'permintaanregis.php';
            </script>";
        }
    } else if(isset($_GET["hapus"])){
        $id_user = $_GET["hapus"];
        mysqli_query($con, "DELETE FROM users WHERE id_user = $id_user");
        if (mysqli_affected_rows($con) > 0){
            echo "<script>
            alert('Akun berhasil dihapus!');
            document.location.href = 'permintaanregis.php';
            </script>";
        } else {
            echo "<script>
            alert('Akun gagal dihapus!');
            document.location.href = 'permintaanregis.php';
            </script>";
        }
    }
}