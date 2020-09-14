<?php
// session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');



?>
<?php
$connection = mysqli_connect("localhost", "ashabul2_sipak", "sipak_ashabul2", "ashabul2_sipak");
$query = "SELECT * FROM admin";
$query_run = mysqli_query($connection, $query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kelola Data Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Admin</li>
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

          <br />
          <a href="Input_admin.php" class="btn btn-warning">Tambah Data Admin</a><br />
          <br />

          <table class="table table-bordered">
            <thead>
              <tr bgcolor="#C0C0C0">
                <td align="center"><b>ID</b></td>
                <td align="center"><b>Nama Admin</b></td>
                <td align="center"><b>No KTP Admin</b></td>
                <td align="center"><b>No HP Admin</b></td>
                <td align="center"><b>Alamat Admin</b></td>
                <td align="center" colspan="3"><b>ACTION</b></td>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <tr align="center">
                    <th><?= $row["id_admin"]; ?></th>
                    <th><?= $row["nama_admin"]; ?></th>
                    <th><?= $row["no_ktp_admin"]; ?></th>
                    <th><?= $row["no_hp_admin"]; ?></th>
                    <th><?= $row["alamat_admin"]; ?></th>
                    <!-- ================================BUTTON====================================== -->
                    <td align="center"><a class="btn btn-info" href="edit_dataadmin.php?id=<?php echo $row['id_admin']; ?>">Edit <br></td><!-- untuk ke tampilan edit -->
                    <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a></a></td><!-- untuk menghapus data -->
                  </tr> <?php
                      }
                    } else {
                      echo "No Record Found";
                    }
                        ?>
          </table>


        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Menghapus ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

        <form action="delete_dataadmin.php?id=<?php echo $row['id_admin']; ?>" method="POST">

          <button type="submit" name="logout_btn" class="btn btn-danger">Hapus</button>

        </form>


      </div>
    </div>
  </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>