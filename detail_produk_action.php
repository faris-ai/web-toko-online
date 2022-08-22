<?php
if (isset($_POST["keranjang"])){
    if(isset($_SESSION["loginO"])){
        $id_user = $_SESSION["uid"];
        $qty = $_POST['qty'];
        $jumlah = $_POST['jumlah'];
        $id_produk = $_POST['idproduk'];
        $keranjang_query = "SELECT * FROM keranjang WHERE id_user=".$id_user." AND id_produk =".$id_produk;
        $run_query = mysqli_query($con, $keranjang_query);
        if(mysqli_num_rows($run_query)>0)
            $qty += mysqli_fetch_array($run_query)['qty'];
        if($qty > $jumlah) {
            echo "
            <script>
            alert('Jumlah produk ini yang kamu masukkan dalam keranjang melebihi stok yang ada!');
            document.location.href = 'detail_produk.php?produk=$id_produk';
            </script>
        ";
        exit;
        }
        
        if (mysqli_affected_rows($con) > 0) {
            $query = "UPDATE keranjang set qty = ".$qty." WHERE id_user=".$id_user." AND id_produk =".$id_produk;
            
        } else {
            $query = "INSERT INTO keranjang (id_keranjang, id_user, id_produk, qty) VALUES (NULL, '$id_user', '$id_produk', $qty)";
        } 

        mysqli_query($con, $query);
        echo "
        <script>
		document.location.href = 'keranjang.php';
		</script>
        ";
    } else {
        echo "
        <script>
		document.location.href = 'login.php';
		</script>
        ";
    }
}
