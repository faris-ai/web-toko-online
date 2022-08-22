<?php

if (!isset($_SESSION["AdminLog"])) {
    echo "
        <script>
        alert('Anda tidak mempunyai akses!');
        document.location.href = 'login.php';
        </script>
    ";
    exit;
}

include '../db.php';
$password = password_hash("Admin123", PASSWORD_DEFAULT);

$query = "INSERT INTO admin (id_admin, username, password, nama) VALUES (NULL, 'admin', '$password', 'Admin')";

mysqli_query($con, $query);
if (mysqli_affected_rows($con) > 0){
    echo "<script>
    alert('Akun admin berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>";
} else {
    echo mysqli_error($con);
}

