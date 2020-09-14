 <?php
  // session_start();
  include('security.php');
  include('includes/header.php');
  include('includes/navbar.php');

  require 'functions.php';

  //cek apakah button submit sudah ditekan atau belum
  $id = $_GET['id'];

  $mhs = query("SELECT * FROM santri WHERE id_santri=$id")[0];
  $nama_santri = $mhs['nama_santri'];

  //var_dump($mhs[0]["Nama"]);
  if (isset($_POST['simpan'])) {
    //cek sukses data ditambah menggunakan function tambah pada functions.php
    if (edit_datapembayaran($_POST) > 0) {
      echo "
    <script>
    alert('Data berhasil diperbarui!');
    document.location.href='datasantricoba.php';
    </script>
    ";
    } else {
      echo mysqli_error($conn);
    }
  }
  ?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Data Pembayaran</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Kelola Data Santri</li>
             <li class="breadcrumb-item active">Data Pembayaran</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->


   <!-- TAB -->
   <div class="card text-center">
     <div class="card-header">
       <ul class="nav nav-tabs card-header-tabs">
         <li class="nav-item">
           <a class="nav-link active" href="Edit_datasantrinew.php?id=<?= $id ?>">Data Santri</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="TampilPerizinan.php?id=<?= $id ?>">Perizinan</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="TampilAbsensi.php?id=<?= $id ?>">Absensi</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="TampilPelanggaran.php?id=<?= $id ?>">Pelanggaran</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="TampilPembayaran.php?id=<?= $id ?>">Pembayaran</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="TampilRaportRamadhan.php?id=<?= $id ?>">Raport Ramadhan</a>
         </li>
       </ul>
     </div>
     <!-- BATAS TAB-->

     <section class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-12">

             <!-- =================================Data Pembayaran=========================================== -->

             <!-- Membuat tabel -->
             <?php
              $pembayaran = query("SELECT * FROM pembayaran WHERE id_santri=$id ORDER BY tanggal DESC, waktu DESC");
              if (isset($_POST["cari"])) {
                $pembayaran = cari($_POST["keyword"]);
              }
              ?>

             <br />
             <!-- Membuat tabel -->

             <?php
              $tglNow = date('Y-m-d');
              // echo $_SESSION['level'];

              $email_admin = $_SESSION['username'];
              if ($_SESSION['level'] == 'superadmin') {
              ?>
               <a href="Input_datapembayaran.php?id=<?php echo $id; ?>" class="btn btn-warning">
                 <span class="glyphicon glyphicon-plus"></span>Tambah Data</a>

               <a href="fpdf182/cetak_pembayaran.php" class="btn btn-success">
                 <span class="glyphicon glyphicon-plus"></span>Cetak</a>

               <?php
              }





              $akses = query("SELECT a.level, aa.id_akses, aa.expired_at FROM akses_admin as aa INNER JOIN admin as a ON aa.email=a.email WHERE aa.email='$email_admin'");
              foreach ($akses as $row) :
                if ($row["id_akses"] == 5) {

                  if ($tglNow <= $row["expired_at"]) {
                ?>
                   <a href="Input_datapembayaran.php?id=<?php echo $id; ?>" class="btn btn-warning">
                     <span class="glyphicon glyphicon-plus"></span>Tambah Data</a>

                   <a href="fpdf182/cetak_pembayaran.php" class="btn btn-success">
                     <span class="glyphicon glyphicon-plus"></span>Cetak</a>
             <?php
                  }
                }
              endforeach;
              ?>

             <br><br>
             <table class="table table-bordered">
               <thead>
                 <tr bgcolor="#C0C0C0">

                   <td align="left"><b>NO</b></td>
                   <td align="left"><b>Nama Santri</b></td>
                   <td align="left"><b>Nama Admin</b></td>
                   <td align="center"><b>Tanggal</b></td>
                   <td align="center"><b>Waktu</b></td>
                   <td align="center"><b>Bulan</b></td>
                   <td align="center"><b>Nominal</b></td>
                   <td align="center"><b>Terbayar</b></td>
                   <td align="center"><b>Status</b></td>
                   <?php
                    $tglNow = date('Y-m-d');
                    // echo $_SESSION['level'];

                    $email_admin = $_SESSION['username'];
                    if ($_SESSION['level'] == 'superadmin') {
                    ?>
                     <td colspan='2' align='center'><b>Action</b></td>
                     <?php }
                    $akses = query("SELECT a.level, aa.id_akses, aa.expired_at FROM akses_admin as aa INNER JOIN admin as a ON aa.email=a.email WHERE aa.email='$email_admin'");
                    foreach ($akses as $row) :
                      if ($row["id_akses"] == 5) {
                        if ($tglNow <= $row["expired_at"]) {
                      ?>
                         <td colspan='2' align='center'><b>Action</b></td>
                   <?php
                        }
                      }
                    endforeach;
                    ?>

                 </tr>
               </thead>

               <tbody>
                 <?php $no = 1;
                  foreach ($pembayaran as $row) :
                    $id_pembayar = $row['id_pembayaran']; ?>
                   <tr>
                     <th><?= $no;
                          $id_santri = $row["id_santri"]; ?> </th>
                     <th><?= $row["nama_admin"]; ?></th>
                     <th><?= $row["nama_santri"]; ?></th>
                     <th><?= $row["tanggal"]; ?></th>
                     <th><?= $row["waktu"]; ?></th>
                     <th><?= $row["bulan"]; ?></th>
                     <th><?= $row["nominal"]; ?></th>
                     <th><?= $row["terbayar"]; ?></th>
                     <th><?= $row["status"]; ?></th>

                     <?php
                      $tglNow = date('Y-m-d');
                      // echo $_SESSION['level'];

                      $email_admin = $_SESSION['username'];
                      if ($_SESSION['level'] == 'superadmin') {
                      ?>
                       <td align="center"><a class="btn btn-info" href="Edit_datapembayaran.php?id=<?php echo $id_pembayar; ?>">Edit <br></td><!-- untuk ke tampilan edit -->
                       <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a></a></td> <!-- untuk menghapus data -->
                       <?php }
                      $akses = query("SELECT a.level, aa.id_akses, aa.expired_at FROM akses_admin as aa INNER JOIN admin as a ON aa.email=a.email WHERE aa.email='$email_admin'");
                      foreach ($akses as $row) :
                        if ($row["id_akses"] == 5) {
                          if ($tglNow <= $row["expired_at"]) {
                        ?>
                           <td align="center"><a class="btn btn-info" href="Edit_datapembayaran.php?id=<?php echo $id_pembayar; ?>">Edit <br></td><!-- untuk ke tampilan edit -->
                           <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a></a></td> <!-- untuk menghapus data -->
                     <?php
                          }
                        }
                      endforeach;
                      ?>

                   </tr>

                 <?php $no++;
                  endforeach; ?>
             </table>


           </div>


         </div>
       </div>
   </div><!-- /.container-fluid -->

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Menghapus ?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

         <form action="delete_datapembayaran.php?id=<?php echo $id_pembayar; ?>&&id_santri=<?php echo $id_santri; ?>" method="POST">

           <button type="submit" name="logout_btn" class="btn btn-danger">Hapus</button>

         </form>


       </div>
     </div>
   </div>
 </div>

 <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>