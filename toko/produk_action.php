<?php
if (isset($_POST["simpan"]) || isset($_POST["tambah"])) {
	$id_toko = $_SESSION["tid"];
	if (isset($_POST["simpan"]))
		$id_produk = $_POST["idproduk"];
		$nama_produk = stripcslashes($_POST["produk"]);
		$id_kategori = (isset($_POST["kategori"])) ? stripcslashes($_POST["kategori"]) : "";
		$harga = stripcslashes($_POST["harga"]);
		$jumlah = stripcslashes($_POST["jumlah"]);
		$deskripsi = stripcslashes($_POST["deskripsi"]);
		$foto_produk = $_POST["fotoProduk"];

    if(empty($nama_produk) || empty($id_kategori) || empty($harga) || empty($jumlah)){
        echo "<script>
            alert('Nama Produk / Kategori / Harga / Jumlah tidak boleh kosong!');
            </script>";
            return false;
    }

    if ($_FILES["foto"]["error"] === 4) {
        $foto = $foto_produk;
    } else {
        $foto = upload();
        if ($foto_produk != "product.jpg")
            unlink("../foto_produk/$foto_produk");
    }
	if (isset($_POST["tambah"]))
		$query = "INSERT INTO produk (id_kategori, id_toko, nama, harga, jumlah, deskripsi, foto) VALUES ($id_kategori, $id_toko, '$nama_produk', $harga, $jumlah, '$deskripsi', '$foto')"; 
	else if (isset($_POST["simpan"]))
		$query = "UPDATE produk SET id_kategori = $id_kategori, nama = '$nama_produk', harga = $harga, jumlah = $jumlah, deskripsi ='$deskripsi', foto = '$foto' WHERE id_produk = $id_produk";
	
        mysqli_query($con, $query);
	if (mysqli_affected_rows($con) > 0) {
		if (isset($_POST["tambah"]))
			echo "<script>
			alert('Anda telah berhasil menambahkan produk!');
			document.location.href = 'produk.php';
			</script>";
		else if (isset($_POST["simpan"]))
			echo "<script>
			alert('Anda telah berhasil mengupdate produk!');
			document.location.href = 'produk.php';
			</script>";	

	} else {
		echo mysqli_error($con);
	}
}

function upload()
	{
		$namaFile = $_FILES["foto"]["name"];
		$tmpName = $_FILES["foto"]["tmp_name"];
		$error = $_FILES["foto"]["error"];
		$ukuran = $_FILES["foto"]["size"];

		if ($error === 4){
			echo "
			<script>
			alert('Tidak ada foto yang diupload');
			</script>
			";
			return false;
		}

		$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
		$ekstensiFoto = explode('.', $namaFile);
		$ekstensiFoto = strtolower(end($ekstensiFoto));
		if (!in_array($ekstensiFoto, $ekstensiFotoValid)){
			echo "
			<script>
			alert('Ekstensi file yang diupload bukan foto');
			</script>
			";
			return false;
		}

		if ($ukuran > 5000000 || $ukuran == 0) {
			echo "
			<script>
			alert('Ukuran file foto terlalu besar');
			</script>
			";
			return false;
		}
		
		$namaFileBaru = uniqid().'.'.$ekstensiFoto; 

		move_uploaded_file($tmpName, '../foto_produk/'.$namaFileBaru);

		return $namaFileBaru;
	}