<?php
session_start();
if (isset($_SESSION["loginO"])) {
	echo "
		  <script>
		  document.location.href = 'index.php';
		  </script>
		  ";
	exit;
  }
include "db.php";
if (isset($_POST["register"])) {
	if (register($_POST) > 0){
		echo "<script>
		alert('Anda telah berhasil mendaftar! Tunggu konfirmasi dari admin untuk menggunakan akun anda.');
		document.location.href = 'login.php';
		</script>";
	} else {
		echo mysqli_error($con);
	}
}
function register($data)
	{
		global $con;

		$fullname = stripcslashes($data["fullname"]);
		$username = strtolower(stripcslashes($data["username"]));
		$email = strtolower(stripcslashes($data["email"]));
		$password = mysqli_real_escape_string($con, $data["password"]);
		$repassword = mysqli_real_escape_string($con, $data["repassword"]);

		if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($repassword)){
			echo "<script>
				alert('Pastikan anda mengisi semua kolom!');
				</script>";
				return false;
		}
		$result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
				alert('Username sudah dipakai!');
				</script>";
				return false;
		}
		if ($password !== $repassword) {
			echo "<script>
				alert('Konfirmasi password tidak sesuai');
				</script>";
			return false;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$query = "INSERT INTO users (id_user, nama, username, email, password) VALUES (NULL, '$fullname', '$username', '$email', '$password')";

		mysqli_query($con, $query);
		return mysqli_affected_rows($con);

	}

?>