<?php
// session_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require 'functions.php';

if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php

  //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(input_admin($_POST)>0){
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
<?php
$connection = mysqli_connect("localhost","ashabul2_sipak","sipak_ashabul2","ashabul2_sipak");
$query = "SELECT * FROM admin";
$query_run = mysqli_query($connection, $query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kelola Data Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Admin</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <table align="left">
            <td  width="700">
              <form action="#" class="inner-login" method="post" enctype="multipart/form-data">

              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group row">
                  <label for="inputPassword" class="col-md-6 col-form-label">Nama Admin</label>
                  <div class="col-lg-12">
                    <input type="text" name="nama_admin" class="form-control" value="" placeholder="Nama Admin" required>
                  </div>
                </div>
              </td>
            </tr>
                        <tr>
              <td>
                <div class="form-group row">
                  <label for="inputPassword" class="col-md-6 col-form-label">Email</label>
                  <div class="col-lg-12">
                    <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
                  </div>
                </div>
              </td>
            </tr>
                                    <tr>
              <td>
                <div class="form-group row">
                  <label for="inputPassword" class="col-md-6 col-form-label">Password</label>
                  <div class="col-lg-12">
                    <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group row">
                  <label for="inputPassword" class="col-md-6 col-form-label">No. KTP Admin</label>
                  <div class="col-lg-12">
                    <input type="number" name="no_ktp_admin" class="form-control" value="" placeholder="No. KTP Admin" required>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group row">
                  <label for="inputPassword" class="col-md-6 col-form-label">No. HP Admin</label>
                  <div class="col-lg-12">
                    <input type="number" name="no_hp_admin" class="form-control" value="" placeholder="No. HP Admin" required>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group row">
                  <label for="inputPassword" class="col-md-6 col-form-label">Alamat Admin</label>
                  <div class="col-lg-12">
                    <input type="text" name="alamat_admin" class="form-control" value="" placeholder="Alamat Admin" required>
                  </div>
                </div>
              </td>
            </tr>    
            <td height="100">
              <input class="btn btn-warning" type="submit" name="simpan" id="simpan" value="Simpan Data" /> <!--untuk menyimpan data-->
              <input class="btn btn-dark" type="reset" name="reset" id="reset" value="Batal" /></th> <!--untuk me reset data yg sudah di ketik-->
            </td>
          </form>
        </div>
      </div>
    </table>

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