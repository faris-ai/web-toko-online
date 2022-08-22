<?php 
	session_start();
    include '../db.php';
	if (!isset($_SESSION["loginO"])) {
		header("Location: ../login.php");
		exit;
	}

    $id_produk = $_GET["produk"];
    $run_query = mysqli_query($con,"SELECT * FROM produk where id_produk=".$id_produk);
	$foto = mysqli_fetch_array($run_query)["foto"];
	mysqli_query($con, "DELETE FROM produk WHERE id_produk = $id_produk");
	if ($foto != "product.jpg")
            unlink("../foto_produk/$foto");
	if (mysqli_affected_rows($con) > 0){
		echo "<script>
		alert('Data berhasil dihapus!');
		document.location.href = 'produk.php';
		</script>";
	} else {
		echo "<script>
		alert('Data gagal dihapus!');
		document.location.href = 'produk.php';
		</script>";
	}
?>