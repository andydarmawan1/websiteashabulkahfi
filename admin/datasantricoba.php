<?php
// session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

require 'functions.php';

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

  <?php
  $san = query("SELECT * FROM santri ORDER BY nis ASC");
  if (isset($_POST["cari"])) {
    $san = cari($_POST["keyword"]);
  }
  ?>

  <?php
  $tglNow = date('Y-m-d');
  // echo $_SESSION['level'];

  $email_admin = $_SESSION['username'];
  if ($_SESSION['level'] == 'superadmin') {
  ?>
    <form class="form-inline ml-3" action="caridatasantri.php" method="post" require>
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="input_cari" placeholder="Cari NIS" aria-label="Search" require>
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" name="cari">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <a href="Input_datasantri.php" class="btn btn-warning">Tambah Data Santri</a><br />
    <?php }

  $akses = query("SELECT a.level, aa.id_akses, aa.expired_at FROM akses_admin as aa INNER JOIN admin as a ON aa.email=a.email WHERE aa.email='$email_admin'");
  foreach ($akses as $row) :
    if ($row["id_akses"] == 1) {

      if ($tglNow <= $row["expired_at"]) {
    ?>
        <form class="form-inline ml-3" action="caridatasantri.php" method="post" require>
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="input_cari" placeholder="Cari NIS" aria-label="Search" require>
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit" name="cari">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

  <?php
      }
    }
  endforeach;
  ?>

  <table class="table table-bordered">
    <thead>
      <tr bgcolor="#C0C0C0">
        <td align="center"><b>ID</b></td>
        <td align="center"><b>NIS</b></td>
        <td align="center"><b>Nama Santri</b></td>
        <td align="center"><b>Jenis Kelamin</b></td>
        <td align="center"><b>Tempat Lahir</b></td>
        <td align="center"><b>Tanggal Lahir</b></td>
        <td align="center" colspan="3"><b>ACTION</b></td>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($san as $row) : ?>
        <tr align="left">
          <th><?= $no; ?></th>
          <th><?= $row["nis"]; ?></th>
          <th><?= $row["nama_santri"]; ?></th>
          <th><?= $row["jeniskelamin"]; ?></th>
          <th><?= $row["tempatlahir"]; ?></th>
          <th><?= $row["tanggallahir"]; ?></th>
          <!-- ================================BUTTON====================================== -->
          <td align="center"><a class="btn btn-info" href="Edit_datasantrinew.php?id=<?php echo $row['id_santri']; ?>">Edit <br></td><!-- untuk ke tampilan edit -->
          <td align="center"><a class="btn btn-dark" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a></a></td> <!-- untuk menghapus data -->
        </tr>
      <?php $no++;
      endforeach; ?>



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

        <form action="delete_datasantri.php?id=<?php echo $row['id_santri']; ?>" method="POST">

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