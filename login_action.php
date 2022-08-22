<?php
session_start();
include "db.php";
if (isset($_COOKIE["id_df"]) && isset($_COOKIE["key_name"])) {
	$id = $_COOKIE["id_df"];
	$keyName = $_COOKIE["key_name"];

	$result = mysqli_query($conn, "SELECT username FROM users WHERE id_user = $id");
	$row = mysqli_fetch_assoc($result);

	if ($keyName === hash("sha256", $row["username"])) {
		$_SESSION["loginO"] = true;
		$_SESSION["user"] = $row["username"];
		$_SESSION["nama"] = $row["nama"];
	}

}

if (isset($_SESSION["loginO"])) {
	echo "
			<script>
			document.location.href = 'index.php';
			</script>
			";
	exit;
}

if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($con,$_POST["username"]);
		$password = $_POST["password"];

		if(empty($username) || empty($password)){
			echo "<script>
				alert('Pastikan anda mengisi semua kolom!');
				</script>";
				return false;
		}

		$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username' OR telepon = '$username'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		$row = mysqli_fetch_array($run_query);
			
			if($count == 1){
				if (password_verify($password, $row["password"])){
					if ($row["status"] == 1) {
						$_SESSION["uid"] = $row["id_user"];
						$_SESSION["foto"] = $row["foto"];
						$_SESSION["user"] = $row["username"];
						$_SESSION["tid"] = $row["id_toko"];
						$_SESSION["loginO"] = true;
						if (isset($_POST["remember"])) {
							setcookie("id_df", $row["id_user"], time()+3600);
							setcookie("key_name", hash("sha256", $row["username"]), time()+3600);
						}
						echo "<script>
						alert('Anda telah berhasil masuk!');
						</script>";
						header("Location: index.php");
					} else if ($row["status"] == 0) {
						echo "<script>
						alert('Akun anda masih belum aktif. Hubungi admin untuk mengonfirmasi akun anda.');
						</script>";
					} else if ($row["statu"] == 2) {
						echo "<script>
						alert('Akun anda terblokir. Hubungi admin untuk mengaktifkan akun anda kembali.');
						</script>";
					}
				} else {
					echo "<script>
						alert('Password yang anda masukkan salah!');
						</script>";
					
				}
			} else {
				echo "<script>
						alert('Anda belum mendaftar!');
						</script>";
			}
		}
?>
