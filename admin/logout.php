<?php 
    session_start();
    session_unset($_SESSION["AdminLog"]);
    session_destroy();

    header("Location: login.php");
?>