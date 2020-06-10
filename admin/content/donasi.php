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
              <h3 class="box-title">Data Donasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>No Handphone</th>
                  <th>Jumlah</th>
                  <th>Bukti (click)</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $query =  $con->query("select * from donasi ");
                    while($donasi = $query->fetch_assoc()):
                ?>
                <tr>
                  <td><?php echo $donasi['nama'];?></td>
                  <td><?php echo $donasi['nohp'];?></td>
                  <td><?php echo $donasi['jumlah'];?></td>
                  <td align='center'>
                     <?php 
                        if($donasi['bukti'] != ''):
                     ?>
                      <a href="../assets/img/bukti/<?php echo $donasi['bukti'];?>" target="_blank">
                        <img src="../assets/img/bukti/<?php echo $donasi['bukti'];?>" width='50px' height='50px' alt="">
                      </a>
                      
                     <?php 
                        else:
                            echo"Tidak Tersedia";
                        endif;
                     ?>
                  </td>
                  <td><a href="content/aksi/deletedonasi.php?aksi=hapus&id=<?php echo $donasi['id']?>"><i class='fa fa-trash'></i></a>
                  </td>
                </tr>
                <?php 
                    endwhile;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>No Handphone</th>
                  <th>Jumlah</th>
                  <th>Bukti</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
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