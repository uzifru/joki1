<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    include"../../../config/config.php";
    session_start();
    $id = $_SESSION['id'];
    $kode = $_GET['id'];
    $aksi = $_GET['aksi'];
    $aslina = $_GET['aslina'];

    $ambil = $con->query("SELECT * FROM donasi WHERE id = $kode");
    $pecah = $ambil->fetch_assoc();
    $fotoproduk = $pecah['bukti'];
    if (file_exists("../../../assets/img/bukti/$fotoproduk")) {
        unlink("../../../assets/img/bukti/$fotoproduk");
    }

    if($aksi = 'hapus' and $id != ''):
            $query =  $con->query("DELETE FROM donasi
            where id = $kode
            ");
            header('Location: ../../home.php?page=donasi');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>