<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
require 'functions.php';
//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];
//var_dump($id);

//query berdasarkan id
$mhs=query("SELECT * FROM pembayaran WHERE id_pembayaran=$id")[0];
$rowid=$mhs['id_santri'];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  $nominal        = $_POST['nominal'];
    $terbayar       = $_POST['terbayar'];
        if($terbayar == $nominal){
            if(edit_datapembayaranlunas($_POST)>0){  
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
        if(edit_datapembayaranbelumlunas($_POST)>0){
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
          <h1>Edit Data Pembayaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Edit Data Pembayaran</li>
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
<input type="text" hidden="" class="name" name="id" value="<?php echo $id?>" >
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
                  <label for="input-id" class="cal-sm-2">Bulan</label>
                  <input type= "text" name="bulan" readonly value="<?php echo $mhs['bulan']; ?>" class="form-control" required>
                  
                </div>
              </td>
            </tr>
            
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Nominal</label>
                  <input type= "number" name="nominal" readonly value="<?php echo $mhs['nominal']; ?>" class="form-control" required> 
                </div>
              </td>
            </tr>
            <tr>
              <td>              
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Terbayar</label>
                  <input type= "number" name="terbayar" value="<?php echo $mhs['terbayar']; ?>" class="form-control" required> 
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