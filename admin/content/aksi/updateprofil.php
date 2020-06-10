<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    include"../../../config/config.php";
    session_start();
    if($_POST['posting']):
        $title = $_POST['title'];
        $misi = $_POST['misi'];
        $tujuan = $_POST['tujuan'];
        // sosial media
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        // alamat dan copyright
        $copyright = $_POST['copyright'];
        $email = $_POST['email'];
        $nowa = $_POST['nowa'];

        // Baca lokasi file sementar dan nama file dari form (fupload)
        $lokasi_file = $_FILES['fupload']['tmp_name'];
        $nama_file   = $_FILES['fupload']['name'];
        // Tentukan folder untuk menyimpan file
        $folder = "../../../images/logo/$nama_file";
        // Apabila file berhasil di upload
        if (move_uploaded_file($lokasi_file,"$folder")):
            $query =  $con->query ("update profil set
            title_foto = '$nama_file'
            where id = 1
            ");
        endif;

        // Baca lokasi file sementar dan nama file dari form (fupload)
        $lokasi_file2 = $_FILES['fupload2']['tmp_name'];
        $nama_file2   = $_FILES['fupload2']['name'];
        // Apabila file berhasil di upload
        if (move_uploaded_file($lokasi_file2,"$folder")):
            $query =  $con->query ("update profil set
            logo = '$nama_file2'
            where id = 1
            ");
        endif;
        
        $query =  $con->query ("update profil set
            title = '$title',
            misi  = '$misi',
            tujuan = '$tujuan',
            facebook = '$facebook',
            instagram = '$instagram',
            email = '$email',
	     no_wa = '$nowa',
            copyright = '$copyright'
            where id = 1
            ");

         header('Location: ../../home.php?page=profilfakultas');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>