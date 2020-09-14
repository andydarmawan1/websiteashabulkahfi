<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
require 'functions.php';
//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];
//var_dump($id);

//query berdasarkan id
$mhs=query("SELECT * FROM perizinan WHERE id_perizinan=$id")[0];
$rowid=$mhs['id_santri'];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_dataperizinan($_POST)>0){

    echo"
    <script>
    alert('Data berhasil diperbarui!');
document.location.href='TampilPerizinan.php?id=$id';
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
          <h1>Edit Data Perizinan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Edit Data Perizinan</li>
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
                  <label for="input-id" class="cal-sm-2">Tanggal Izin</label>
                  <input type= "date" name="tanggalizin" value="<?php echo $mhs['tanggalizin']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Tanggal Pulang</label>
                  <input type= "date" name="tanggalpulang" value="<?php echo $mhs['tanggalpulang']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Nama Penjemput</label>
                  <input type= "text" name="nama_penjemput" value="<?php echo $mhs['nama_penjemput']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>              
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Status</label>
                  <select name="status" class="form-control" required="">
                              <?php
                              if ($mhs['status'] == "diizinkan"){
                                echo "<option value='diizinkan' selected>Diizinkan</option>    
                                <option value='belumdiizinkan'>Belum Diizinkan</option>";
                              } else if ($mhs['status'] == "belumdiizinkan"){
                                echo "<option value='diizinkan'>Diizinkan</option>    
                                <option value='belumdiizinkan' selected>Belum Diizinkan</option>";                              } 
                              ?>
                            </select>  
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Keterangan</label>
                  <input type= "text" name="keterangan" value="<?php echo $mhs['keterangan']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" align="center"><img width="170" height="210" src="img/<?= $mhs["filesurat"]; ?>" alt=""  srcset=""></td>
            </tr>
            <tr>

              <td align="center" colspan="3">
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">File Surat</label>
                  <div class="col-sm-7">
                    <input name="file" type="file" value="upload" id="textfield" class="form-control">
                  </div>
                </div>
              </td>
              <td></td>
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