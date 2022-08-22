<?php
include '../db.php';
if (isset($_GET["action"])) :
    if($_GET["action"] == 2) :
        $id_kat = $_GET["kat"];
        mysqli_query($con, "DELETE FROM kategori WHERE id_kategori = $id_kat");
        if (mysqli_affected_rows($con) > 0){
            echo "<script>
            alert('Kategori berhasil dihapus!');
            document.location.href = 'kategori.php';
            </script>";
        } else {
            echo "<script>
            alert('Kategori gagal dihapus!');
            document.location.href = 'kategori.php';
            </script>";
        }
    elseif($_GET["action"] == 1) :
        $id_kat = $_GET["kat"];
        $kategori_query = "SELECT nama FROM kategori where id_kategori=".$id_kat;
        $run_query = mysqli_query($con,$kategori_query);
        $nama_kategori = mysqli_fetch_array($run_query)['nama'];
        if (isset($_POST["edit"])) {
            $nama_baru = $_POST["kategori"];
            mysqli_query($con, "UPDATE kategori SET nama = '$nama_baru' WHERE id_kategori = $id_kat");
            if (mysqli_affected_rows($con) > 0){
                echo "<script>
                alert('Kategori berhasil diupdate!');
                document.location.href = 'kategori.php';
                </script>";
            } else {
                echo "<script>
                alert('Kategori gagal diupdate!');
                document.location.href = 'kategori.php';
                </script>";
            }
        }
        include 'header.php';
?>
<div class="container mt-4">
  <div class='card'>
    <div class='shadow bg-white rounded p-3'>
    <h2 class="m-3">Edit Kategori</h2>  
    <hr />
    <div class='card-body'>
      <form class="form-horizontal" action="" method="POST">
        <div class="row">
          <div class="col-sm-9">
          <div class="form-group row">
              <label class="control-label col-sm-4" for="kategori"><b>Nama Kategori</b></label>
              <div class="col">
                <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan Nama Kategori" value="<?=$nama_kategori;?>">
              </div>
          </div>
        </div>
        </div>
        <div class="form-group row">
              <div class="col-sm-offset-12 col-sm-12">
              <button name="edit" type="submit" class="btn px-5 mt-3 mx-auto d-block" style="background-color: #602749; color:white">Simpan</button>
              </div>
          </div>
      </form>
      <a href="kategori.php" class="btn btn-light"><i style='font-size:16px' class="fa fa-angle-left fa-3x"></i> Kembali</a>
    </div>
    </div>
  </div>
</div>

<?php
include 'footer.php'; 

elseif ($_GET["action"] == 0) :
    if (isset($_POST["tambah"])) {
        $nama_kategori = $_POST["kategori"];
        mysqli_query($con, "INSERT INTO kategori VALUES (NULL, '$nama_kategori')");
        if (mysqli_affected_rows($con) > 0){
            echo "<script>
            alert('Kategori berhasil ditambahkan!');
            document.location.href = 'kategori.php';
            </script>";
        } else {
            echo "<script>
            alert('Kategori gagal ditambahkan!');
            document.location.href = 'kategori.php';
            </script>";
        }
    }
    include 'header.php';
    ?>
    <div class="container mt-4">
      <div class='card'>
        <div class='shadow bg-white rounded p-3'>
        <h2 class="m-3">Tambah Kategori</h2>  
        <hr />
        <div class='card-body'>
          <form class="form-horizontal" action="" method="POST">
            <div class="row">
              <div class="col-sm-9">
              <div class="form-group row">
                  <label class="control-label col-sm-4" for="kategori"><b>Nama Kategori</b></label>
                  <div class="col">
                    <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan Nama Kategori" value="">
                  </div>
              </div>
            </div>
            </div>
            <div class="form-group row">
                  <div class="col-sm-offset-12 col-sm-12">
                  <button name="tambah" type="submit" class="btn px-5 mt-3 mx-auto d-block" style="background-color: #602749; color:white">Tambah</button>
                  </div>
              </div>
          </form>
          <a href="kategori.php" class="btn btn-light"><i style='font-size:16px' class="fa fa-angle-left fa-3x"></i> Kembali</a>
        </div>
        </div>
      </div>
    </div>
    
<?php
include 'footer.php'; 
endif;
endif;
?>