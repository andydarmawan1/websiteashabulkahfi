<?php
// session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
require 'functions.php';

if (isset($_POST['simpan'])) {
  //cek sukses data ditambah menggunakan function tambah pada functions.php

  //cek sukses data ditambah menggunakan function tambah pada functions.php
  if (input_santri($_POST) > 0) {
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
<?php
$connection = mysqli_connect("localhost", "root", "", "db_askaf");
$query = "SELECT * FROM santri";
$query_run = mysqli_query($connection, $query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kelola Data Santri</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
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
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">NIS</label>
                    <div class="col-lg-12">
                      <input type="number" name="nis" class="form-control" value="" placeholder="NIS" required>
                    </div>
                  </div>
                </td>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Nama Santri</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_santri" class="form-control" value="" placeholder="Nama Santri" required>
                    </div>
                  </div>
                </td>
              <tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Email</label>
                    <div class="col-lg-12">
                      <input type="email" name="emailsantri" class="form-control" value="" placeholder="Email" required>
                    </div>
                  </div>
                </td>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Jenis Kelamin</label>
                    <div class="col-lg-12">
                      <input type="radio" value="L" name="jeniskelamin"> Laki-Laki<br>
                      <input type="radio" value="P" name="jeniskelamin"> Perempuan
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Tempat Lahir</label>
                    <div class="col-lg-12">
                      <input type="text" name="tempatlahir" class="form-control" value="" placeholder="Tempat Lahir" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Tanggal Lahir</label>
                    <div class="col-lg-12">
                      <input type="date" name="tanggallahir" class="form-control" value="" placeholder="tanggallahir" required>
                    </div>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">No. KTP</label>
                    <div class="col-lg-12">
                      <input type="text" name="no_ktp" class="form-control" value="" placeholder="No. KTP" required>
                    </div>
                  </div>
                </td>
                <td></td>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Perguruan Tinggi</label>
                    <div class="col-lg-12">
                      <input type="text" name="perguruan_tinggi" class="form-control" value="" placeholder="Perguruan Tinggi" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td width="420">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">No. HP</label>
                    <div class="col-lg-12">
                      <input type="text" name="no_hp" class="form-control" value="" placeholder="No. HP" required>
                    </div>
                  </div>
                </td>
                <td></td>
              <tr>
                <td width="420">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Alamat Santri</label>
                    <div class="col-lg-12">
                      <input type="text" name="alamat" class="form-control" value="" placeholder="Alamat Santri" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Nama Ayah</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_ayah" class="form-control" value="" placeholder="Nama Ayah" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Tempat, Tanggal Lahir Ayah</label>
                    <div class="col-lg-12">
                      <input type="text" name="tempat_tgllahir_ayah" class="form-control" value="" placeholder="Tempat, yyyy/mm/dd" required>
                    </div>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">No. KTP Ayah</label>
                    <div class="col-lg-12">
                      <input type="text" name="no_ktp_ayah" class="form-control" value="" placeholder="No. KTP Ayah" required>
                    </div>
                  </div>
                </td>
                <td></td>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Alamat Ayah</label>
                    <div class="col-lg-12">
                      <input type="text" name="alamat_ayah" class="form-control" value="" placeholder="Alamat Ayah" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Nomor HP Ayah</label>
                    <div class="col-lg-12">
                      <input type="number" name="no_hp_ayah" class="form-control" value="" placeholder="No HP Ayah" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Nama Ibu</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_ibu" class="form-control" value="" placeholder="Nama Ibu" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Tempat, Tanggal Lahir Ibu</label>
                    <div class="col-lg-12">
                      <input type="text" name="tempat_tgllahir_ibu" class="form-control" value="" placeholder="Tempat, yyyy/mm/dd" required>
                    </div>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">No. KTP Ibu</label>
                    <div class="col-lg-12">
                      <input type="text" name="no_ktp_ibu" class="form-control" value="" placeholder="No. KTP Ibu" required>
                    </div>
                  </div>
                </td>
                <td></td>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Alamat Ibu</label>
                    <div class="col-lg-12">
                      <input type="text" name="alamat_ibu" class="form-control" value="" placeholder="Alamat Ibu" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-md-6 col-form-label">Nomor HP Ibu</label>
                    <div class="col-lg-12">
                      <input type="number" name="no_hp_ibu" class="form-control" value="" placeholder="No HP Ibu" required>
                    </div>
                  </div>
                </td>
              </tr>
              <td height="100">
                <input class="btn btn-warning" type="submit" name="simpan" id="simpan" value="Simpan Data" />
                <!--untuk menyimpan data-->
                <input class="btn btn-dark" type="reset" name="reset" id="reset" value="Batal" /></th>
                <!--untuk me reset data yg sudah di ketik-->
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