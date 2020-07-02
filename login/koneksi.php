<?php
$conn=mysqli_connect("localhost","root","","tokoonline");
if ($conn){
    echo "Success";
}else{
    echo "Failed";
}
?>