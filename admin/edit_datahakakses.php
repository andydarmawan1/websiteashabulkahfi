<?php
// session_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

require 'functions.php';

//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];

$mhs=query("SELECT a.nama_akses, aa.email, aa.expired_at, aa.id, a.id_akses FROM akses_admin as aa INNER JOIN akses as a ON aa.id_akses=a.id_akses where aa.id_akses=$id")[0];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_hakakses($_POST)>0){
    echo"
    <script>
    alert('Data berhasil diperbarui!');
    document.location.href='datahakakses.php';
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
            <li class="breadcrumb-item active">Data Hak Akses</li>
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
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Nama Akses</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_akses" class="form-control" readonly value="<?php echo $mhs['nama_akses']; ?>" id="inputdatasantri" >
                       <input type="text" name="id_akses" class="form-control" readonly value="<?php echo $mhs['id_akses']; ?>" id="inputdatasantri" >
                    </div>
                  </div>
                </td>
                <tr>
                <td>
                  <div class="form-group row">
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Email Admin</label>
                    <div class="col-lg-12">
                        <select name="email" id="inputdatasantri" required>
                          <option disabled selected> Pilih </option>
                         <?php 
                         $conn= mysqli_connect("localhost","ashabul2_sipak","sipak_ashabul2","ashabul2_sipak");
                          
                          $sqlemail=mysqli_query($conn, "SELECT email FROM admin where level='admin'");
                          while ($data=mysqli_fetch_array($sqlemail)) {
                         ?>
                           <option value="<?=$data['email']?>"> <?=$data['email']?> </option> 
                         <?php
                          }
                         ?>
                          </select>
                        
                        
                        
                      <!--<input type="text" name="email" class="form-control" value="<?php echo $mhs['email']; ?>" id="inputdatasantri" >-->
                    </div>
                  </div>
                </td>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">Tanggal Berakhir</label>
                        <div class="col-lg-12">
                          <input type="date" name="expired_at" class="form-control" value="<?php echo $mhs['expired_at']; ?>" id="inputdatasantri" placeholder="No HP Admin" required>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <td height="100">
                   <input class="btn btn-warning" type="submit" name="simpan" id="simpan" value="Simpan Perubahan" /> <!--untuk menyimpan data-->
                   <a class="btn btn-info" href="datahakakses.php">Batal<br>
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