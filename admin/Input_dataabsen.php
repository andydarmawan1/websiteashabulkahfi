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
  if(input_dataabsen($_POST)>0){
    echo"
    <script>
    alert('Data berhasil ditambah!');
document.location.href='TampilAbsensi.php?id=$id';
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
          <h1>Input Data Absensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Input Data Absensi</li>
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
          <h3><?php echo $nama_santri?></h3>
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
                  <div class="form-group">
                    <label for="input-id" class="cal-sm-2">Tanggal</label>
                    <input type= "date" name="tanggal_absen" class="form-control" required> 
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label for="input-id" class="cal-sm-2">Alfa</label>
                    <input type= "number" name="alfa" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td>               
                  <div class="form-group">
                    <label for="input-id" class="cal-sm-2">Sakit</label>
                    <input type= "number" name="sakit" class="form-control"> 
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label for="input-id" class="cal-sm-2">Izin</label>
                    <input type="number" name="izin" class="form-control"> 
                  </div>
                </td>
              </tr>
              <tr>
                <td>

                </div>
              </div>
              <br>
              <input class="btn btn-warning" type="submit" name="simpandata" id="simpandata" value="Simpan Perubahan" /> <!--untuk menyimpan data-->
              <input class="btn btn-dark" type="reset" name="reset" id="reset" value="Batal" /></th> <!--untuk me reset data yg sudah di ketik-->
            </div>
          </div>
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