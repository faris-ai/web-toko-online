<?php
if (!isset($_SESSION["loginO"])) {
	echo "
		  <script>
		  document.location.href = 'login.php';
		  </script>
		  ";
	exit;
  }
include 'db.php';
$id_user = $_SESSION["uid"];
$user_query = "SELECT * FROM users where id_user=".$id_user;
$run_query = mysqli_query($con,$user_query);
while($row = mysqli_fetch_array($run_query)){
  $nama_user = $row['nama'];
  $email = $row['email'];
  $username = $row['username'];
  $telepon = $row['telepon'];
  $alamat = $row['alamat'];
  $jeniskelamin = $row['jenis_kelamin'];
  $tanggallahir = $row['tanggal_lahir'];
  $foto = $row['foto'];
  $status = ($row['status'] == 0) ? "Belum Aktif" : (($row['status'] == 1) ? "Aktif" : "Terblokir");
  $jumlah_posting = $row['jumlah_posting'];
  $id_toko = $row['id_toko'];
}

if (isset($_POST["simpan"])) {
    $userid = $_SESSION["uid"];
    $fullname = stripcslashes($_POST["fullname"]);
    $username = strtolower(stripcslashes($_POST["username"]));
    $email = strtolower(stripcslashes($_POST["email"]));
    $telepon = stripcslashes($_POST["telepon"]);
    $alamat = stripcslashes($_POST["alamat"]);
    $jeniskelamin = stripcslashes($_POST["optionsRadios"]);
    $tanggallahir = stripcslashes($_POST["datepicker"]);
    $fotoLama = $_POST["fotoLama"];
    
    $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) && $username != $_SESSION["user"]) {
        echo "<script>
            alert('Username sudah dipakai!');
            </script>";
            return false;
	}
	
	if ($_FILES["foto"]["error"] === 4) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
		if ($fotoLama != "profile.png")
			unlink("foto_profil/$fotoLama");
	}

    $query = "UPDATE users SET nama = '$fullname', username = '$username', email = '$email', telepon = '$telepon', alamat = '$alamat', jenis_kelamin = '$jeniskelamin', tanggal_lahir = '$tanggallahir', foto = '$foto' WHERE id_user = $userid";

        mysqli_query($con, $query);
        
        if (mysqli_affected_rows($con) > 0) {
            $_SESSION["nama"] = $fullname;
			$_SESSION["user"] = $username;
			$_SESSION["foto"] = $foto;
            echo "<script>
		alert('Anda telah berhasil update profil!');
		document.location.href = 'profile.php';
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

		move_uploaded_file($tmpName, 'foto_profil/'.$namaFileBaru);

		return $namaFileBaru;
	}