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

    $kode = @$_GET['id'];
    $aksi = @$_GET['aksi'];
    $aslina = @$_GET['aslina'];
    $idd = @$_GET['idd'];

    if(@$_POST['posting']):
        if($aksi == '' and $kode != ''):
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

                    endif;

            
            
            if($nama_file == ''):

                $query =  $con->query("update berita set
                judul  = '$judul',
                deskripsi  = '$deskripsi'
                where id = $kode
                ");
            else:
                $query =  $con->query("update berita set
                nama_file = '$nama_file',
                judul  = '$judul',
                deskripsi  = '$deskripsi'
                where id = $kode
                ");
            endif;
            header('Location: ../../home.php?page=berita');
        endif;
    elseif($aksi = 'hapus' and $id != ''):
            //The name of the folder.
            $folder = "../../dist/img/berita/$nama_file";
            //Get a list of all of the file names in the folder.
            $files = glob($folder . '/'.$kode);

            //Loop through the file list.
            foreach($files as $file){
                //Make sure that this is a file and not a directory.
                if(is_file($file)){
                    //Use the unlink function to delete the file.
                    unlink($file);
                }
            }

            $query =  $con->query("DELETE FROM berita
            where id = $idd
            ");
         header('Location: ../../home.php?page=berita');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>