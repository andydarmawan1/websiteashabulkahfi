<?php
// include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Jadwal Kepondokan</h4>
  </div>

  <div class="card-body">

    <div class="table-responsive">


      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Jadwal Ta'lim </th>
            <th> Jadwal Kebersihan </th>
            <th> Jadwal Jaga Malam </th>
         </tr>
        </thead>
        <tr>
            <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#UploadModal1">Upload</a></a></td>
            <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#UploadModal2">Upload</a></a></td>
            <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#UploadModal3">Upload</a></a></td>
            
          </tr>
      </table>
    </div>
  </div>
</div>
</div>
    <div class="modal fade" id="UploadModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Mengupload ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<div id="body">
 <form action="uploadjadwal1.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>Upload Berhasil...  <a href="viewjadwal1.php">Klik disini untuk melihat file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Terjadi masalah saat mwengupload!</label>
        <?php
 }
 else
 {
  ?>         <?php
 }
 ?>

      </div>
    </div>
  </div>

</div>

    <div class="modal fade" id="UploadModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Mengupload ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<div id="body">
 <form action="uploadjadwal2.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>Upload Berhasil...  <a href="viewjadwal2.php">Klik disini untuk melihat file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Terjadi masalah saat mwengupload!</label>
        <?php
 }
 else
 {
  ?>         <?php
 }
 ?>

      </div>
    </div>
  </div>

</div>

 <div class="modal fade" id="UploadModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Mengupload ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<div id="body">
 <form action="uploadjadwal3.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>Upload Berhasil...  <a href="viewjadwal3.php">Klik disini untuk melihat file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Terjadi masalah saat mwengupload!</label>
        <?php
 }
 else
 {
  ?>         <?php
 }
 ?>

      </div>
    </div>
  </div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>