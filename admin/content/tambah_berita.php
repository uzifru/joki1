<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Berita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/tambahberita.php'>
              <div class="box-body">
                <div class="form-group">
                  <label for="foto">Foto Utama</label>
                  <input type="file" name='fupload' id="foto" placeholder='Masukan foto'>
                  <p class="help-block">foto unggulan</p>
                </div>
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name='judul' placeholder="Judul" required>
                </div>
                <div class="form-group">
                  <label for="desk">Deskripsi File</label>
                  <textarea id='desk' name="deskripsi" rows="15"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="form-group">
                <input type="submit" name='posting' class='btn btn-info' value="Posting">
                * Jangan Refresh halaman (Tunggu Sampai Proses Upload Selesai)
              </div>
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