<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
 <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    
    <br><br><br>
    <section class="container">
      <!-- Small boxes (Stat box) -->
      <?php
        $count1 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM donasi"));
        $count2 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM berita"));

        $uang = $con->query("select * from donasi ");
          while($donasi = $uang->fetch_assoc()):

            number_format($donasi['jumlah']);

            $total = $total+$donasi['jumlah'];

          endwhile;  
      ?>
      <div class="row">
        <div class="col-lg-4 col-xs-6 mb-2">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count2; ?></h3>

              <p>Jumlah Berita</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="home.php?page=berita" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6 mb-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo number_format($total); ?></h3>

              <p>Jumlah Uang</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="home.php?page=donasi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6 mb-2">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $count1; ?></h3>

              <p>Jumlah Donatur</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="home.php?page=donasi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>