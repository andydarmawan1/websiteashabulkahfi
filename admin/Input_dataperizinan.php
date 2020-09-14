<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
require 'functions.php';
$id = $_GET['id'];


$mhs=query("SELECT * FROM santri WHERE id_santri=$id")[0];
$nama_santri = $mhs['nama_santri']; 

//query berdasarkan id


if(isset($_POST['simpandata']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(input_perizinan($_POST)>0){
    echo"
    <script>
    alert('Data berhasil ditambah!');
document.location.href='TampilPerizinan.php?id=$id';
    </script>
    ";
    echo"ok";
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
          <h1>Input Data Perizinan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
                        <li class="breadcrumb-item active">Input Data Perizinan</li>
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
          <p>Silahkan Isi Data Diri</p>
          <hr>
          <table align="center">
            <tr>
              <td  width="700">
                <form action="#" class="inner-login" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" hidden="" class="name" name="id" value="<?php echo $id?>" >
                  </div>
                </td>
              </tr>
              <td>
              <div class="form-group row">
                  <label for="inputdatasantri" class="col-md-6 col-form-label">Nama Santri</label>
                  <div class="col-lg-12">
                    <input type="text" name="nama_santri" class="form-control" readonly value="<?php echo $nama_santri?>" placeholder="Nama Santri" required>
                  </div>
                </div>
              </td>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Tanggal Izin</label>
                    <div class="col-lg-12">
                      <input type="date" name="tanggalizin" class="form-control" value="" placeholder="Tanggal Izin" required>
                    </div>
                  </div>
                </td>
                <tr>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputdatasantri" class="col-md-6 col-form-label">Tanggal Pulang</label>
                        <div class="col-lg-12">
                          <input type="date" name="tanggalpulang" class="form-control" value="" placeholder="Tanggal Pulang" required>
                        </div>
                      </div>
                    </td>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">Nama Penjemput</label>
                          <div class="col-lg-12">
                            <input type="text" name="nama_penjemput" class="form-control" value="" placeholder="Nama Penjemput" required>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">Status</label>
                          <div class="col-lg-12">
                            <select name="status" required="">
                              <option value="diizinkan">Diizinkan</option>
                              <option value="belumdiizinkan">Tidak Diizinkan</option>
                            </select> 
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">Keterangan</label>
                          <div class="col-lg-12">
                            <input type="text" name="keterangan" class="form-control" value="" placeholder="Keterangan" required>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">File Surat</label>
                          <div class="col-lg-12">
                            <input name= "file" type="file" class="form-control" value="upload" required>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <td height="100">
                      <input class="btn btn-warning" type="submit" name="simpandata" id="simpandata" value="Simpan Perubahan" /> <!--untuk menyimpan data-->
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