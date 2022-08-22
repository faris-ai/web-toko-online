<?php 
    require 'register_action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Daftar Ooshop!</title>

	<link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css">
  <style>
    .shadow-nohover {
  box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.14);
  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
  </style>
</head>
<body>
  <div class="container mb-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <a href="index.php">
          <img src="public/img/logo-p.png"class="my-4 mx-auto d-block" height="50px" alt="" loading="lazy">
        </a>
        <div class="card p-4 shadow-nohover">
          <h4>Daftar</h4>
          <div class="pull-right ml-auto">Sudah punya akun? <a href="login.php">Masuk</a></div>
          <div class="px-5">
          <form action="" method="post">
            <div class="form-group my-4">
              <label for="fullname">Nama Lengkap</label>
              <input type="text" class="form-control" id="fullname" placeholder="Masukkan nama lengkap" name="fullname">
            </div>
            <div class="form-group my-4">
              <label for="username">Username</label>
              <input type="username" class="form-control" id="username" placeholder="Masukkan username" name="username">
            </div>
            <div class="form-group my-4">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email"">
            </div>
            <div class="form-group my-4">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
            </div>
            <div class="form-group my-4">
              <label for="repassword">Konfirmasi Password</label>
              <input type="password" class="form-control" id="repassword" placeholder="Masukkan konfirmasi password" name="repassword">
            </div>
            <button type="submit" name="register" class="btn px-5 my-4 mx-auto d-block" style="background-color: #602749; color:white">Daftar</button>
          </form>
          </div>
        </div>
      </div>
    <div class="col-md-3"></div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/actions.js"></script> -->
</body>
</html>
