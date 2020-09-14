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
  if(input_dataraportramadhan($_POST)>0){
    echo"
    <script>
    alert('Data berhasil ditambah!');
document.location.href='TampilRaportRamadhan.php?id=$id';
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
          <h1>Input Data Raport Ramadhan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
                        <li class="breadcrumb-item active">Input Data Raport Ramadhan</li>
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
            <form action="#" class="inner-login" method="post" enctype="multipart/form-data">
              <tr>
                <td>
                  <div class="form-group">
                    <input type="text" hidden="" class="name" name="id" value="<?php echo $id?>" >
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Nama Santri</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_santri" class="form-control" readonly value="<?php echo $nama_santri?>" placeholder="Nama Santri" required>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Kegiatan</label>
                    <div class="col-lg-12">
                      <input type="text" name="kegiatan" class="form-control" value="" placeholder="Kegiatan" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Alfa</label>
                    <div class="col-lg-12">
                      <input type="number" name="alfa" class="form-control" value="" placeholder="Alfa">
                    </div>
                  </div>
                </td>
                <td></td> 
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Izin</label>
                    <div class="col-lg-12">
                      <input type="number" name="izin" class="form-control" value="" placeholder="Izin">
                    </div>
                  </div>
                </td>
                <td></td>
                <tr>
                  <td>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-md-6 col-form-label">Sakit</label>
                      <div class="col-lg-12">
                        <input type="number" name="sakit" class="form-control" value="" placeholder="Sakit">
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