 <?php
// session_start();
//  include('security.php');
 include('includes/header.php'); 
 include('includes/navbar.php'); 

 require 'functions.php';

//cek apakah button submit sudah ditekan atau belum
$id=$_SESSION['cid'];

 $mhs=query("SELECT * FROM santri WHERE id_santri=$id")[0];

//var_dump($mhs[0]["Nama"]);
 if(isset($_POST['simpan']))
 {
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_datapembayaran($_POST)>0){
    echo"
    <script>
    alert('Data berhasil diperbarui!');
    document.location.href='datasantricoba.php';
    </script>
    ";
  }else{
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
          <a class="nav-link active" href="Edit_datasantrinew.php?id=<?=$id?>">Data Santri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilPerizinan.php?id=<?=$id?>">Perizinan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilAbsensi.php?id=<?=$id?>">Absensi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilPelanggaran.php?id=<?=$id?>">Pelanggaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TampilPembayaran.php?id=<?=$id?>">Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilRaportRamadhan.php?id=<?=$id?>">Raport Ramadhan</a>
        </li>
      </ul>
    </div>
    <!-- BATAS TAB-->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

           <!-- =================================DATA KELUARGA=========================================== -->

           <!-- Membuat tabel -->
           <?php
           $pembayaran=query("SELECT * FROM pembayaran WHERE id_santri=$id");
           if(isset($_POST["cari"])){
             $pembayaran=cari($_POST["keyword"]);
           }
           ?>

           <br/>
           <!-- Membuat tabel -->
<!--            <a href="Input_datapembayaran.php?id=<?php echo $id; ?>" class="btn btn-warning">
            <span class="glyphicon glyphicon-plus"></span>Tambah Data</a> -->
            <br><br>
            <table class="table table-bordered">
              <thead> 
                <tr bgcolor="#C0C0C0">

                    <td align="left"><b>NO</b></td>
                    <td align="left"><b>Nama Admin</b></td>
                    <td align="left"><b>Nama Santri</b></td>
                    <td align="center"><b>Tanggal</b></td>
                    <td align="center"><b>Waktu</b></td>
                    <td align="center"><b>Bulan</b></td>
                    <td align="center"><b>Nominal</b></td>
                    <td align="center"><b>Terbayar</b></td>
                    <td align="center"><b>Status</b></td>
                </tr>
              </thead>

              <tbody>
                <?php $no=1; 
                    foreach($pembayaran as $row): 
                      $id_pembayar=$row['id_pembayaran'];?>
                      <tr>
                        <th><?= $no; $id_santri=$row["id_santri"]; ?> </th>
                        <th><?= $row["nama_admin"]; ?></th>
                        <th><?= $row["nama_santri"]; ?></th>
                        <th><?= $row["tanggal"]; ?></th>
                        <th><?= $row["waktu"]; ?></th>
                        <th><?= $row["bulan"]; ?></th>
                        <th><?= $row["nominal"]; ?></th>
                        <th><?= $row["terbayar"]; ?></th>
                        <th><?= $row["status"]; ?></th>
                  </tr>

                <?php $no++; endforeach; ?>
              </table>  


            </div>


          </div>
        </div>
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>