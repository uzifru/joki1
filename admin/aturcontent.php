<?php 
    $konten = @$_GET['page'];
    if($konten == ''):
        include"content/konten.php";

    
    elseif($konten == 'donasi'):
        include"content/donasi.php";

    elseif($konten == 'berita'):
        include"content/berita.php";
    elseif($konten == 'tambah_berita'):
        include"content/tambah_berita.php";
    elseif($konten == 'edit_berita'):
        include"content/edit_berita.php";

    elseif($konten == 'gantipassword'):
        include"content/gantipassword.php";

    elseif($konten == 'profiladmin'):
        include"content/profiladmin.php";
    else:
        include"content/404.php";
    endif;
?>