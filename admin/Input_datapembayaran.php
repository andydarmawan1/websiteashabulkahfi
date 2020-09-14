<?php
// session_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require 'functions.php';
$id = $_GET['id'];

$mhs=query("SELECT * FROM santri WHERE id_santri=$id")[0];

$nama_santri = $mhs['nama_santri']; 
//query berdasarkan id

if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php

  //cek sukses data ditambah menggunakan function tambah pada functions.php
  
    $nominal        = $_POST['nominal'];
    $terbayar       = $_POST['terbayar'];
        if($terbayar == $nominal){
            if(input_datapembayaranlunas($_POST)>0){  
                echo "<script>
                alert('Data berhasil diperbarui!');
                document.location.href='TampilPembayaran.php?id=$id';
                </script>";

       }
    }else if($terbayar > $nominal){
         echo"
        <script>
        alert('Uang yang dibayar tidak boleh lebih dari nominal!');
        history.go(-1);
        </script>
        ";
    }else{
        if(input_datapembayaranbelumlunas($_POST)>0){
            echo"
            <script>
            alert('Data berhasil diperbarui!');
            document.location.href='TampilPembayaran.php?id=$id';
            </script>
            ";
        }
    }
   
  }else{
    echo mysqli_error($conn);
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Data Pembayaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
                        <li class="breadcrumb-item active">Input Data Pembayaran</li>
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
                        <label for="inputdatasantri" class="col-md-6 col-form-label">Admin</label><p></p>
                        <div class="col-lg-12">
                        <input type="text" name="nama_admin" class="form-control" readonly value="<?php echo $_SESSION['nama_admin'] ?>" >
                      </div>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputdatasantri" class="col-md-6 col-form-label">Bulan</label><p></p>
                        <div class="col-lg-12">
                        <select name="bulan" required="">
                        <option value="JANUARI">JANUARI</option>
                        <option value="FEBRUARI">FEBRUARI</option>
                        <option value="MARET">MARET</option>
                        <option value="APRIL">APRIL</option>
                        <option value="MEI">MEI</option>
                        <option value="JUNI">JUNI</option>
                        <option value="JULI">JULI</option>
                        <option value="AGUSTUS">AGUSTUS</option>
                        <option value="SEPTEMBER">SEPTEMBER</option>
                        <option value="OKTOBER">OKTOBER</option>
                        <option value="NOVEMBER">NOVEMBER</option>
                        <option value="DESEMBER">DESEMBER</option>
                      </select> 
                      </div>
                    </div>
                    </td>
                  </tr>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">Nominal</label>
                          <div class="col-lg-12">
                          <input type="number" name="nominal" class="form-control" value="" placeholder="Nominal" required>
                         </div>
                       </div>
                     </td>
                   </tr>
                   <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">Terbayar</label>
                        <div class="col-lg-12">
                          <input type="number" name="terbayar" class="form-control" value="" placeholder="Terbayar" required>
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