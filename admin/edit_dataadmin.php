<?php
// session_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

require 'functions.php';

//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];

$mhs=query("SELECT * FROM admin WHERE id_admin=$id")[0];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_admin($_POST)>0){
    echo"
    <script>
    alert('Data berhasil diperbarui!');
    document.location.href='dataadmin.php';
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
          <h1>Data Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Admin</li>
            <li class="breadcrumb-item active">Data Admin</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- BATAS TAB-->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <table align="left">
            <form action="#" class="inner-login" method="post" enctype="multipart/form-data">
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Nama Admin</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_admin" class="form-control" value="<?php echo $mhs['nama_admin']; ?>" id="inputdatasantri" placeholder="Nama Admin">
                    </div>
                  </div>
                </td>
                <tr>
                  <td>
                    <div class="form-group row">
                      <label for="inputdatasantri" class="col-md-6 col-form-label">No KTP Admin</label>
                      <div class="col-lg-12">
                        <input type="number" name="no_ktp_admin" class="form-control" value="<?php echo $mhs['no_ktp_admin'] ?>" id="inputdatasantri" placeholder="No KTP Admin">
                      </div>
                    </div>
                  </td>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">No HP Admin</label>
                        <div class="col-lg-12">
                          <input type="number" name="no_hp_admin" class="form-control" value="<?php echo $mhs['no_hp_admin']; ?>" id="inputdatasantri" placeholder="No HP Admin" required>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">Alamat Admin</label>
                        <div class="col-lg-12">
                          <input type="text" name="alamat_admin" class="form-control"  value="<?php echo $mhs['alamat_admin']; ?>" id="inputdatasantri"  placeholder="Alamat Admin" required>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <td height="100">
                   <input class="btn btn-warning" type="submit" name="simpan" id="simpan" value="Simpan Perubahan" /> <!--untuk menyimpan data-->
                   <a class="btn btn-info" href="dataadmin.php">Batal<br>
                   </td>
                 </form>
               </div>
             </div>
           </table>

           <div>


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