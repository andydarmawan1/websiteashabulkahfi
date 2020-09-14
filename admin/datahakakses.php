<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

require 'functions.php';

?>
<?php
$connection = mysqli_connect("localhost", "ashabul2_sipak", "sipak_ashabul2", "ashabul2_sipak");
$query = "SELECT * FROM akses";
$query_run = mysqli_query($connection, $query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Akses</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Hak Akses</li>
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

          <!-- =================================Data Akses=========================================== -->

          <!-- Membuat tabel -->
          <?php
          $akses = query("SELECT a.nama_akses, aa.email, aa.expired_at, aa.id, a.id_akses FROM akses_admin as aa INNER JOIN akses as a ON aa.id_akses=a.id_akses");
          if (isset($_POST["cari"])) {
            $akses = cari($_POST["keyword"]);
          }
          ?>

          <br />
          <!-- Membuat tabel -->

          <table class="table table-bordered">
            <thead>
              <tr bgcolor="#C0C0C0">

                <td align="left"><b>NO</b></td>
                <td align="center"><b>Nama Akses</b></td>
                <td align="center"><b>Nama Admin</b></td>
                <td align="center"><b>Tanggal Berakhir</b></td>
                <td align="center"><b>Aksi</b></td>
              </tr>
            </thead>

            <tbody>
              <?php $no = 1;
              foreach ($akses as $row) :
                $id_aks = $row['id_akses']; ?>
                <tr>
                  <th><?= $no; ?></th>
                  <th><?= $row["nama_akses"]; ?></th>
                  <th><?= $row["email"]; ?></th>
                  <th><?= $row["expired_at"]; ?></th>
                  <th>
                    <a class="btn btn-info" href="edit_datahakakses.php?id=<?php echo $id_aks; ?>">Edit</a>
                    <!-- untuk ke tampilan edit -->
                  </th>
                </tr>

              <?php $no++;
              endforeach; ?>
          </table>


        </div>


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