<?php
// session_start();
// include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

require 'functions.php';

//cek apakah button submit sudah ditekan atau belum
$id=$_SESSION['cid'];

$mhs=query("SELECT * FROM santri WHERE id_santri=$id")[0];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_santri($_POST)>0){
    echo"
    <script>
    alert('Data berhasil diperbarui!');
    document.location.href='datasantricoba.php';
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
          <h1>Data Santri</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Santri</li>
            <li class="breadcrumb-item active">Data Santri</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <!-- TAB -->
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="Edit_datasantrinew.php?id=<?=$id?>">Data Santri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilPerizinan.php?id=<?=$id?>">Perizinan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilAbsensi.php?id=<?=$id?>">Absensi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilPelanggaran.php?id=<?=$id?>">Pelanggaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilPembayaran.php?id=<?=$id?>">Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="TampilRaportRamadhan.php?id=<?=$id?>">Raport Ramadhan</a>
        </li>
      </ul>
    </div>
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
                    <label for="inputdatasantri" class="col-md-6 col-form-label">NIS</label>
                    <div class="col-lg-12">
                      <input type="number" name="nis" class="form-control" readonly value="<?php echo $mhs['nis']; ?>" id="inputdatasantri" placeholder="NIS">
                    </div>
                  </div>
                </td>
                <tr>
                  <td>
                    <div class="form-group row">
                      <label for="inputdatasantri" class="col-md-4 col-form-label">Nama Santri</label>
                      <div class="col-lg-12">
                        <input type="text" name="nama_santri" class="form-control" readonly value="<?php echo $mhs['nama_santri']; ?>" id="inputdatasantri" placeholder="Nama lengkap">
                      </div>
                    </div>
                  </td>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputdatasantri" class="col-md-4 col-form-label">Email</label>
                        <div class="col-lg-12">
                          <input type="email" name="email" class="form-control" readonly value="<?php echo $mhs['emailsantri'] ?>" id="inputdatasantri" placeholder="Email">
                        </div>
                      </div>
                    </td>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">Jenis Kelamin</label>
                          <div class="col-lg-12">
                            <input  type="radio" name="jeniskelamin" value="L" <?php if ($mhs['jeniskelamin']=='L') { echo 'checked';}?>> Laki-laki
                           <input  type="radio" name="jeniskelamin" value="P" <?php if ($mhs['jeniskelamin']=='P') { echo 'checked';}?>> Perempuan
                         </div>
                       </div>
                     </td>
                   </tr>
                   <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">Tempat Lahir</label>
                        <div class="col-lg-12">
                          <input type="text" name="tempatlahir" class="form-control" readonly value="<?php echo $mhs['tempatlahir']; ?>" id="inputdatasantri" placeholder="Tempat Lahir" required>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">Tanggal Lahir</label>
                        <div class="col-lg-12">
                          <input type="date" name="tanggallahir" class="form-control" readonly value="<?php echo $mhs['tanggallahir']; ?>" id="inputdatasantri" placeholder="tanggallahir" required>
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
                          <input type="number" name="no_ktp" class="form-control" readonly value="<?php echo $mhs['no_ktp']; ?>" id="inputdatasantri"  placeholder="No. KTP" required>
                        </div>
                      </div>
                    </td>
                    <td></td>
                    <tr>
                      <td>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">Perguruan Tinggi</label>
                          <div class="col-lg-12">
                            <input type="text" name="perguruan_tinggi" class="form-control" readonly value="<?php echo $mhs['perguruan_tinggi']; ?>" id="inputdatasantri"  placeholder="Perguruan Tinggi" required>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td width="420">
                        <div class="form-group row">
                          <label for="inputPassword" class="col-md-6 col-form-label">No. HP</label>
                          <div class="col-lg-12">
                            <input type="number" name="no_hp" class="form-control" readonly value="<?php echo $mhs['no_hp']; ?>" id="inputdatasantri"  placeholder="No. HP" required>
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <tr>
                        <td width="420">
                          <div class="form-group row">
                            <label for="inputPassword" class="col-md-6 col-form-label">Alamat Santri</label>
                            <div class="col-lg-12">
                              <input type="text" name="alamat" class="form-control" readonly value="<?php echo $mhs['alamat']; ?>" id="inputdatasantri"  placeholder="Alamat Santri" required>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Nama Ayah</label>
                            <div class="col-lg-12">
                              <input type="text" name="nama_ayah" class="form-control" readonly value="<?php echo $mhs['nama_ayah']; ?>" id="inputdatasantri"  placeholder="Nama Ayah" required>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group row">
                            <label for="inputPassword" class="col-md-9 col-form-label">Tempat, Tanggal Lahir Ayah</label>
                            <div class="col-lg-12">
                              <input type="text" name="tempat_tgllahir_ayah" class="form-control" readonly value="<?php echo $mhs['tempat_tgllahir_ayah']; ?>" id="inputdatasantri"  placeholder="Tempat, yyyy/mm/dd" required>
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
                              <input type="number" name="no_ktp_ayah" class="form-control" readonly value="<?php echo $mhs['no_ktp_ayah']; ?>" id="inputdatasantri"  placeholder="No. KTP Ayah" required>
                            </div>
                          </div>
                        </td>
                        <td></td>
                        <tr>
                          <td>
                            <div class="form-group row">
                              <label for="inputPassword" class="col-md-6 col-form-label">Alamat Ayah</label>
                              <div class="col-lg-12">
                                <input type="text" name="alamat_ayah" class="form-control" readonly value="<?php echo $mhs['alamat_ayah']; ?>" id="inputdatasantri"  placeholder="Alamat Ayah" required>
                              </div>
                            </div>
                          </td>
                          <tr>
                            <td width="420">
                              <div class="form-group row">
                                <label for="inputPassword" class="col-md-6 col-form-label">No. HP Ayah</label>
                                <div class="col-lg-12">
                                  <input type="number" name="no_hp_ayah" class="form-control" readonly value="<?php echo $mhs['no_hp_ayah']; ?>" id="inputdatasantri"  placeholder="No. HP Ayah" required>
                                </div>
                              </div>
                            </td>
                            <td></td>                        
                          </tr>

                          <tr>
                            <td>
                              <div class="form-group row">
                                <label for="inputPassword" class="col-md-6 col-form-label">Nama Ibu</label>
                                <div class="col-lg-12">
                                  <input type="text" name="nama_ibu" class="form-control" readonly value="<?php echo $mhs['nama_ibu']; ?>" id="inputdatasantri"  placeholder="Nama Ibu" required>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-group row">
                                <label for="inputPassword" class="col-md-6 col-form-label">Tempat, Tanggal Lahir Ibu</label>
                                <div class="col-lg-12">
                                  <input type="text" name="tempat_tgllahir_ibu" class="form-control" readonly value="<?php echo $mhs['tempat_tgllahir_ibu']; ?>" id="inputdatasantri"  placeholder="Tempat, yyyy/mm/dd" required>
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
                                  <input type="number" name="no_ktp_ibu" class="form-control" readonly value="<?php echo $mhs['no_ktp_ibu']; ?>" id="inputdatasantri"  placeholder="No. KTP Ibu" required>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <tr>
                              <td>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-md-6 col-form-label">Alamat Ibu</label>
                                  <div class="col-lg-12">
                                    <input type="text" name="alamat_ibu" class="form-control" readonly value="<?php echo $mhs['alamat_ibu']; ?>" id="inputdatasantri"  placeholder="Alamat Ibu" required>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="420">
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-md-6 col-form-label">No. HP Ibu</label>
                                  <div class="col-lg-12">
                                    <input type="number" name="no_hp_ibu" class="form-control" readonly value="<?php echo $mhs['no_hp_ibu']; ?>" id="inputdatasantri"  placeholder="No. HP Ibu" required>
                                  </div>
                                </div>
                              </td>
                              <td></td>
                            </tr>   
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