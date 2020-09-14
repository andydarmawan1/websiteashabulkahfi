 <?php
// session_start();
 // include('security.php');
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
  if(edit_dataraportramadhan($_POST)>0){
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
          <h1>Data Raport Ramadhan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Data Raport Ramadhan</li>
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
          <a class="nav-link active" href="TampilPembayaran.php?id=<?=$id?>">Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TampilRaportRamadhan.php?id=<?=$id?>">Raport Ramadhan</a>
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
           $raport_ramadhan=query("SELECT * FROM raport_ramadhan WHERE id_santri=$id");
           if(isset($_POST["cari"])){
             $raport_ramadhan=cari($_POST["keyword"]);
           }
           ?>

           <br/>

            <br><br>
            <table class="table table-bordered">
              <thead> 
                <tr bgcolor="#C0C0C0">

                      <td align="left"><b>No</b></td>
                      <td align="center"><b>Nama Santri</b></td>
                      <td align="center"><b>Tanggal</b></td>
                      <td align="center"><b>Waktu</b></td>
                      <td align="center"><b>Kegiatan</b></td>
                      <td align="center"><b>Alfa</b></td>
                      <td align="center"><b>Izin</b></td>
                      <td align="center"><b>Sakit</b></td>
                </tr>
              </thead>

              <tbody>
                <?php $no=1; 
                      foreach($raport_ramadhan as $row): 
                        $id_raportramadhan=$row['id_raport'];
                        ?>
                        <tr>
                          <th><?= $no; ?></th>
                          <th><?= $row["nama_santri"]; ?></th>
                          <th><?= $row["tanggal"]; ?></th>
                          <th><?= $row["waktu"]; ?></th>
                          <th><?= $row["kegiatan"]; ?></th>
                          <th><?= $row["alfa"]; ?></th>
                          <th><?= $row["izin"]; ?></th>
                          <th><?= $row["sakit"]; ?></th>
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