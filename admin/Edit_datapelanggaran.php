<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
require 'functions.php';
//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];
//var_dump($id);

//query berdasarkan id
$mhs=query("SELECT * FROM pelanggaran WHERE id_pelanggaran=$id")[0];
$rowid=$mhs['id_santri'];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_datapelanggaran($_POST)>0){

    echo"
    <script>
    alert('Data berhasil diperbarui!');
document.location.href='TampilPelanggaran.php?id=$id';
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
          <h1>Edit Data Pelanggaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Edit Data Pelanggaran</li>
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
                  <label for="input-id" class="cal-sm-2">Nama Santri</label>
                  <input type= "text" name="nama_santri" readonly value="<?php echo $mhs['nama_santri']; ?>" class="form-control"> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Nama Ayah</label>
                  <input type= "text" name="nama_ayah" readonly value="<?php echo $mhs['nama_ayah']; ?>" class="form-control"> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                <select name="pelanggaran" class="form-control" required="">
                    <?php
                    if ($mhs['pelanggaran'] == "Pelanggaran Talim"){
                      echo "<option value='Pelanggaran Talim' selected>Pelanggaran Talim</option>    
                      <option value='Pelanggaran Izin Pulang'>Pelanggaran Izin Pulang</option>
                      <option value='Pelanggaran Piket'>Pelanggaran Piket</option>
                      <option value='Pelanggaran Jaga Malam'>Pelanggaran Jaga Malam</option>";
                    } else if ($mhs['pelanggaran'] == "Pelanggaran Izin Pulang"){
                      echo "<option value='Pelanggaran Talim'>Pelanggaran Talim</option>    
                      <option value='Pelanggaran Izin Pulang' selected>Pelanggaran Izin Pulang</option>
                      <option value='Pelanggaran Piket'>Pelanggaran Piket</option>
                      <option value='Pelanggaran Jaga Malam'>Pelanggaran Jaga Malam</option>";
                    } else if ($mhs['pelanggaran'] == "Pelanggaran Piket"){
                      echo "<option value='Pelanggaran Talim'>Pelanggaran Talim</option>    
                      <option value='Pelanggaran Izin Pulang'>Pelanggaran Izin Pulang</option>
                      <option value='Pelanggaran Piket' selected>Pelanggaran Piket</option>
                      <option value='Pelanggaran Jaga Malam'>Pelanggaran Jaga Malam</option>";
                    } else if ($mhs['pelanggaran'] == "Pelanggaran Jaga Malam"){
                      echo "<option value='Pelanggaran Talim'>Pelanggaran Talim</option>    
                      <option value='Pelanggaran Izin Pulang'>Pelanggaran Izin Pulang</option>
                      <option value='Pelanggaran Piket'>Pelanggaran Piket</option>
                      <option value='Pelanggaran Jaga Malam' selected>Pelanggaran Jaga Malam</option>";
                    } 
                    ?>
                  </select>  
                </div>
              </td>
            </tr>

              <td>              
                <div class="form-group">
                <label for="input-id" class="cal-sm-2">Tindakan</label>
                  <select name="tindakan" class="form-control" required="">
                    <?php
                    if ($mhs['tindakan'] == "Mencabut Rumput"){
                      echo "<option value='Mencabut Rumput' selected>Mencabut Rumput</option>    
                      <option value='Membersihkan Kamar Mandi'>Membersihkan Kamar Mandi</option>
                      <option value='Membersihkan balkon 1'>Membersihkan balkon 1</option>
                      <option value='Membersihkan balkon 2'>Membersihkan balkon 2</option>
                      <option value='Membersihkan balkon 3'>Membersihkan balkon 3</option>";
                    } else if ($mhs['tindakan'] == "Membersihkan Kamar Mandi"){
                      echo "<option value='Mencabut Rumput'>Mencabut Rumput</option>    
                      <option value='Membersihkan Kamar Mandi'  selected>Membersihkan Kamar Mandi</option>
                      <option value='Membersihkan balkon 1'>Membersihkan balkon 1</option>
                      <option value='Membersihkan balkon 2'>Membersihkan balkon 2</option>
                      <option value='Membersihkan balkon 3'>Membersihkan balkon 3</option>";
                    } else if ($mhs['tindakan'] == "Membersihkan balkon 1"){
                      echo "<option value='Mencabut Rumput'>Mencabut Rumput</option>    
                      <option value='Membersihkan Kamar Mandi'>Membersihkan Kamar Mandi</option>
                      <option value='Membersihkan balkon 1'  selected>  selectedMembersihkan balkon 1</option>
                      <option value='Membersihkan balkon 2'>Membersihkan balkon 2</option>
                      <option value='Membersihkan balkon 3'>Membersihkan balkon 3</option>";
                    } else if ($mhs['tindakan'] == "Membersihkan balkon 2"){
                      echo "<option value='Mencabut Rumput'>Mencabut Rumput</option>    
                      <option value='Membersihkan Kamar Mandi'>Membersihkan Kamar Mandi</option>
                      <option value='Membersihkan balkon 1'>Membersihkan balkon 1</option>
                      <option value='Membersihkan balkon 2'  selected>Membersihkan balkon 2</option>
                      <option value='Membersihkan balkon 3'>Membersihkan balkon 3</option>";
                    } else if ($mhs['tindakan'] == "Membersihkan balkon 3"){
                      echo "<option value='Mencabut Rumput'>Mencabut Rumput</option>    
                      <option value='Membersihkan Kamar Mandi'>Membersihkan Kamar Mandi</option>
                      <option value='Membersihkan balkon 1'>Membersihkan balkon 1</option>
                      <option value='Membersihkan balkon 2'>Membersihkan balkon 2</option>
                      <option value='Membersihkan balkon 3'  selected>Membersihkan balkon 3</option>";
                    } 
                    ?>
                  </select>  
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Penanggung Jawab</label>
                  <input type= "text" name="penanggungjawab" value="<?php echo $mhs['penanggungjawab']; ?>" class="form-control"> 
                </div>
              </td>
            </tr>
            <tr>
            <td>              
                <div class="form-group">
                  <label for="input-id" class="cal-sm-2">Keterangan</label>
                  <input type= "text" name="keterangan" value="<?php echo $mhs['keterangan']; ?>" class="form-control"> 
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