<?php 
session_start();
if (isset($_SESSION["AdminLog"])) {
    echo "
            <script>
            document.location.href = 'index.php';
            </script>
            ";
    exit;
}
include "../db.php";

if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($con,$_POST["username"]);
        $password = $_POST["password"];

        if(empty($username) || empty($password)){
            echo "<script>
                alert('Pastikan anda mengisi semua kolom!');
                </script>";
                return false;
        }

        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $run_query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);
        $row = mysqli_fetch_array($run_query);
            
            if($count == 1){
                if (password_verify($password, $row["password"])){
                    $_SESSION["AdminLog"] = true;
                    echo "<script>
                    alert('Anda telah berhasil masuk!');
                    </script>";
                    header("Location: index.php");
                } else {
                    echo "<script>
                        alert('Password yang anda masukkan salah!');
                        </script>";
                    
                }
            } else {
                echo "<script>
                        alert('Admin tidak ditemukan!');
                        </script>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Ooshop! Admin</title>

	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
  <style>
    .shadow-nohover {
  box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.14);
  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <img src="assets/img/logo-p.png"class="my-4 mx-auto d-block" height="50px" alt="" loading="lazy">
        <div class="card p-4 shadow-nohover">
          <h4>Masuk Admin</h4>
          <div class="px-5">
          <form action="" method="POST">
            <div class="form-group my-4">
              <label for="username">Username</label>
              <input type="username" class="form-control" id="username" placeholder="Masukkan username" name="username">
            </div>
            <div class="form-group my-4">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
            </div>
            <button type="submit" name="login" class="btn px-5 my-4 mx-auto d-block" style="background-color: #602749; color:white">Masuk</button>
          </form>
          </div>
        </div>
      </div>
    <div class="col-md-3"></div>
  </div>
</div>

</body>
</html>
