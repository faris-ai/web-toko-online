<?php 
    require "login_action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Ooshop!</title>

	<link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css">
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
      <a href="index.php">
        <img src="public/img/logo-p.png"class="my-4 mx-auto d-block" height="50px" alt="" loading="lazy">
      </a>
        <div class="card p-4 shadow-nohover">
          <h4>Masuk</h4>
          <div class="pull-right ml-auto">Baru di Ooshop!? <a href="register.php">Daftar</a></div>
          <div class="px-5">
          <form action="" method="POST">
            <div class="form-group my-4">
              <label for="username">Username / Email / No. Handphone</label>
              <input type="username" class="form-control" id="username" placeholder="Masukkan username" name="username">
            </div>
            <div class="form-group my-4">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
              <a class="pull-right" href="#">Lupa password?</a>
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Ingat saya
              </label>
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
