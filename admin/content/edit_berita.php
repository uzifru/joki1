<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<?php 
    error_reporting(0);
    $id = $_GET['id'];
    $berita = $con->query("select * from berita where id = $id");
    $query = $berita->fetch_assoc();
?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Berita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/editdeleteberita.php?id=<?php echo $id ?>'>
              <div class="box-body">
                <div class="form-group">
                  <img src="dist/img/berita/<?php echo $query['nama_file'] ?>" width ='70px' height='70px' alt="">
                </div>
                <div class="form-group">
                  <label for="foto">Foto Utama</label>
                  <input type="file" name='fupload' id="foto" placeholder='Masukan foto'>
                  <p class="help-block"><?php echo $query['nama_file'] ?></p>
                </div>
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" value='<?php echo $query['judul'] ?>' name='judul' placeholder="Judul Opini" required>
                </div>
                <div class="form-group">
                  <label for="desk">Deskripsi</label>
                  <textarea id='desk' name="deskripsi"><?php echo $query['deskripsi'] ?></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name='posting' class='btn btn-info' value="Posting">
              </div>
            </form>
          </div>
    </div>
    </div>
</section>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>