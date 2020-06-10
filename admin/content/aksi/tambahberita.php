<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?><?php 
    include"../../../config/config.php";
   
    $id = $_SESSION['id'];

        if(isset($_POST['posting'])):
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];

            date_default_timezone_set('Asia/Jakarta');
            $jam    = date("H");
            $menit  = date("i:s");
            $tglindo = date('d-m-Y H:i:s');
            $hari   = date("d");
            $bulan  = date("m");
            $tahun  = date("Y");
            $tgl    = "$tahun-$bulan-$hari";
            $jam    = "$jam:$menit";
            // Baca lokasi file sementar dan nama file dari form (fupload)
            $lokasi_file = $_FILES['fupload']['tmp_name'];
            $nama_file   = $_FILES['fupload']['name'];
            // Tentukan folder untuk menyimpan file
            $folder = "../../dist/img/berita/$nama_file";
            // tanggal sekarang
            $tgl_upload = date("Ymd");
            // Apabila file berhasil di upload
            if (move_uploaded_file($lokasi_file,"$folder")):

                $query = "INSERT INTO berita (nama_file,judul,deskripsi, tanggal)
                            VALUES('$nama_file','$judul', '$deskripsi','$tgl $jam')";
                mysqli_query($con, $query);
            else:
                $query = "INSERT INTO berita (judul,deskripsi, tanggal)
                            VALUES('$judul', '$deskripsi','$tgl $jam')";
                mysqli_query($con, $query);
            endif;
        header('Location: ../../home.php?page=berita');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>