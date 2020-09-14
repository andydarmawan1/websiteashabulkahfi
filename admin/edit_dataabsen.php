<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
require 'functions.php';
//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];
//var_dump($id);

//query berdasarkan id
$mhs=query("SELECT * FROM absen WHERE id_absen=$id")[0];
$rowid=$mhs['id_santri'];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_dataabsen($_POST)>0){

    echo"
    <script>
    alert('Data berhasil diperbarui!');
document.location.href='TampilAbsensi.php?id=$id';
    </script>";

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
          <h1>Edit Data Absensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Edit Data Absensi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <p>Silahkan Isi Data Diri</p>
          <hr>
        </br></br>
        <table align="left">
          <form action="#" class="inner-login" method="post" enctype="multipart/form-data">
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Tanggal Absen</label>
                  <input type= "date" name="tanggal_absen" value="<?php echo $mhs['tanggal_absen']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Tanggal</label>
                  <input type= "date" name="tanggal" readonly value="<?php echo $mhs['tanggal']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>              
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Waktu</label>
                  <input type= "time" name="waktu" readonly value="<?php echo $mhs['waktu']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Alfa</label>
                  <input type= "number" name="alfa" value="<?php echo $mhs['alfa']; ?>" class="form-control"> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Sakit</label>
                  <input type= "number" name="sakit" value="<?php echo $mhs['sakit']; ?>" class="form-control"> 
                </div>
              </td>
            </tr>
            <tr>
              <td>              
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Izin</label>
                  <input type= "number" name="izin" value="<?php echo $mhs['izin']; ?>" class="form-control"> 
                </div>
              </td>
            </tr>

          </div>
        </div>
        <tr height="100">
          <td>
           <input class="btn btn-warning" type="submit" name="simpan" id="simpan" value="Simpan Perubahan" /> <!--untuk menyimpan data-->
           <a class="btn btn-info" href="datasantricoba.php">Batal</a>
         </div>
       </div>
     </td>
   </tr>
 </form>
</table>
</thead>
</tbody>

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