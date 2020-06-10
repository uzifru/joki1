<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?> <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Berita</h3>
            </div>
            <div class="box-header">
              <a href="home.php?page=tambah_berita"><input type="button" class='btn btn-success' value="Tambah Berita"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Foto</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $query =  $con->query("select * from berita");
                    while($berita = $query->fetch_assoc()):
                ?>
                <tr>
                  <td align='center'>
                     <?php 
                        if($berita['nama_file'] != ''):
                     ?>
                      <img src="dist/img/berita/<?php echo $berita['nama_file'];?>" width='50px' height='50px' alt="">
                     <?php 
                        else:
                            echo"Tidak Tersedia";
                        endif;
                     ?>
                  </td>
                  <td><?php echo $berita['judul'];?></td>
                  <td>
                    <?php 
                      $deskpendek = $berita['deskripsi'];
                      if (strlen($berita['deskripsi']) > 50) $berita['deskripsi'] = substr($berita['deskripsi'], 0, 50) . "........"; 
                      echo $berita['deskripsi'];
                      // echo strlen($deskpendek);
                    ?></td>
                  <td><?php echo $berita['tanggal'];?></td>
                  <td>
                    <a href="home.php?page=edit_berita&id=<?php echo $berita['id']?>"><i class='fa fa-edit'></i></a>
                     | <a href="content/aksi/editdeleteberita.php?aksi=hapus&id=<?php echo $berita['nama_file']?>&idd='<?php echo $berita['id']?>'"><i class='fa fa-trash'></i></a>
                  </td>
                </tr>
                <?php 
                    endwhile;
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
  <?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>