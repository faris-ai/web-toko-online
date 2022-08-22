<?php

if (isset($_POST["simpan"])) {
    $nama_toko = stripcslashes($_POST["toko"]);
    $deskripsi = stripcslashes($_POST["deskripsi"]);
    $fotoLama = $_POST["fotoLama"];
		if ($_FILES["foto"]["error"] === 4) {
			$foto = $fotoLama;
		} else {
            $foto = upload();
            if ($fotoLama != "shop.png")
                unlink("foto_toko/$fotoLama");
		}

    $query = "UPDATE toko SET nama = '$nama_toko', deskripsi = '$deskripsi', foto = '$foto' WHERE id_toko = $id_toko";

        mysqli_query($con, $query);
        
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>
		alert('Anda telah berhasil update profil toko!');
		document.location.href = 'toko.php';
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

		move_uploaded_file($tmpName, 'foto_toko/'.$namaFileBaru);

		return $namaFileBaru;
	}