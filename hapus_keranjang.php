<?php 
	session_start();
    include 'db.php';
	if (!isset($_SESSION["loginO"])) {
		header("Location: login.php");
		exit;
	}

    $id = $_GET["id"];
    mysqli_query($con, "DELETE FROM keranjang WHERE id_keranjang = $id");
	if (mysqli_affected_rows($con) > 0){
        echo "<script>
		document.location.href = 'keranjang.php';
		</script>";
	} else {
		echo "<script>
		alert('Data gagal dihapus!');
		document.location.href = 'keranjang.php';
		</script>";
	}
?>