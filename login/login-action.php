<?php
include "koneksi.php";
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELCET * FROM admin WHERE username = '$username' AND password = '$password'");
    if (mysqli_num_rows($query) !== 0){
        echo "ALHAMDULILLAH GA ERROR GAES";
    }
    else {
        echo "DAHLAH";
    }
} else{
    echo "";
}
