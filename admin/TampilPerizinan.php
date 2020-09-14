 <?php
// session_start();
 include('security.php');
 include('includes/header.php'); 
 include('includes/navbar.php'); 

 require 'functions.php';

//cek apakah button submit sudah ditekan atau belum
 $id=$_GET['id'];

//  $mhs=query("SELECT * FROM santri WHERE id_santri=$id")[0];


//var_dump($mhs[0]["Nama"]);
 if(isset($_POST['simpan']))
 {
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_dataperizinan($_POST)>0){
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
          <h1>Data Perizinan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Data Perizinan</li>
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
          <a class="nav-link" href="TampilPerizinan.php?id=<?=$id?>">Perizinan</a>
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
          <a class="nav-link active" href="TampilRaportRamadhan.php?id=<?=$id?>">Raport Ramadhan</a>
        </li>
      </ul>
    </div>
    <!-- BATAS TAB-->

    <section class="content">
      <div class="container-fluid">
          <br>
          <p> <button type="button" class=""> <a href="download.php?filename=Form_Perizinan.docx" class="" >Download Form Perizinan</a></button> </p>
          <p> 
          
          <body>
<div id="header">
<label>Upload Form Perizinan</label>
</div>
<div id="body">
 <form action="upload.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>Upload Berhasil...  <a href="view.php">Klik disini untuk melihat file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Terjadi masalah saat mwengupload!</label>
        <?php
 }
 else
 {
  ?>
        <label>Upload file dalam format (*.pdf)</label>
        <p>
        <label><a href="view.php">Data Upload Form Perizinan</a></label>
        </p>
        <?php
 }
 ?>
</div>

</body>


          </p>
 
        </div><!-- /.container-fluid -->
      </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>