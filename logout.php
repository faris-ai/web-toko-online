<?php 
    session_start();
    session_unset();
    session_destroy();

    setcookie("id_df", "", time()-3600);
    setcookie("key_name", "", time()-3600);

    header("Location: index.php");
?>