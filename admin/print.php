<?php
    session_start(); //memulai session
    include "koneksi.php";
    require 'functions.php';
    $mahasiswa=query("SELECT * FROM datakaryawan");
?>
<html>
<head>
<title>Cetak Nota</title>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Gallery</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<br>
<div class="container">

         <h1><center>Data Karyawan</center></h1>
       
         <br>
         <!-- ========================================DATA KARYAWAN==========================================-->
         <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datakaryawan` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
            
            </thead>
           <tbody>
           <?php foreach($result as $row): ?> 

               <tr>
               <td> <b>NAMA</b></td>
               <td><?= $row["Nama"]; ?></td>
               <td> <b>INITIAL</b></td>
               <td><?= $row["Initial"]; ?></td>
               <td rowspan="6" colspan="2" align="center"><img width="190" height="230" src="images/<?= $row["Foto"]; ?>" alt=""  srcset="">
               </tr>

              <tr>
               <td> <b>PANGGILAN</b></td>
               <td><?= $row["Panggilan"]; ?></td>
               <td> <b>AGAMA</b></td>
               <td><?= $row["Agama"]; ?></td>
               </tr>
           
               <tr>
               <td> <b>L/P</b></td>
               <td><?= $row["JenisKelamin"]; ?></td>
               <td> <b>STATUS</b></td>
               <td><?= $row["Status"]; ?></td>
                </tr>

               <tr>
               <td> <b>NIK</b></td>
               <td><?= $row["NIK"]; ?></td>
               <td> <b>NIK LAMA</b></td>
               <td><?= $row["NIKLama"]; ?></td>
               </tr>

               <tr>
               <td> <b>JAMSOSTEK</b></td>
               <td><?= $row["Jamsostek"]; ?></td>
               <td> <b>JAMSOSTEK LAMA</b></td>
               <td><?= $row["JamsostekLama"]; ?></td>
               </tr>
                      
               <tr>
               
               <td> <b>TGL. NIKAH</b></td>
               <td><?= $row["TglNikah"]; ?></td>
               <td> <b>TGL. MASUK</b></td>
               <td><?= $row["TglMasuk"]; ?></td>
               </tr>

               <tr>
               <td> <b>BANK</b></td>
               <td><?= $row["Bank"]; ?></td>
               <td> <b>A/C NO.</b></td>
               <td><?= $row["NoAcc"]; ?></td>
               <td> <b>TELP KONTAK</b></td>
               <td><?= $row["TelpKontak"]; ?></td>
               </tr>

               <tr>
               <td> <b>TGL. LAHIR</b></td>
               <td><?= $row["TglLahir"]; ?></td>
               <td> <b>TEMPAT</b></td>
               <td><?= $row["TempatLahir"]; ?></td>
               <td> <b>GOLONGAN DARAH</b></td>
               <td><?= $row["GolDarah"]; ?></td>
               </tr>

               <tr>
               <td> <b>ALAMAT TINGGAL</b></td>
               <td><?= $row["Alamat"]; ?></td>
               <td> <b>TELEPON</b></td>
               <td><?= $row["Telepon"]; ?></td>
               <td> <b>DEPARTEMEN</b></td>
               <td><?= $row["Departemen"]; ?></td>
               </tr>

               <tr>
               <td> <b>KOTA</b></td>
               <td><?= $row["Kota"]; ?></td>
               <td> <b>NAMA KONTAK</b></td>
               <td><?= $row["NamaKontak"]; ?></td>
               <td> <b>DIVISI</b></td>
               <td><?= $row["Divisi"]; ?></td>
               </tr>

               <tr>
               <td> <b>ALAMAT KONTAK</b></td>
               <td><?= $row["AlamatKontak"]; ?></td>
               <td> <b>KOTA KONTAK</b></td>
               <td><?= $row["KotaKontak"]; ?></td>
               <td> <b>JABATAN</b></td>
               <td><?= $row["Jabatan"]; ?></td>
               </tr>

               <tr>
               <td> <b>KOTA</b></td>
               <td><?= $row["Kota"]; ?></td>
               <td> <b>NAMA KONTAK</b></td>
               <td><?= $row["NamaKontak"]; ?></td>
               <td> <b>RANK</b></td>
               <td><?= $row["Rank"]; ?></td>
               </tr>

             <?php endforeach; ?>                       
             <?php }?>
         </table>   
<!-- ========================================DATA PENDIDIKAN==========================================-->
<h6><b>DATA PENDIDIKAN</b></h6>
         <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datapendidikan` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th>Jenis</th>
               <th>Nama Institusi Pendidikan</th>
               <th>Kota</th>
               <th>Jurusan</th>
               <th>Tahun Lulus</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["Jenis"]; ?></td>
               <td><?= $row["NamaSekolah"]; ?></td>
               <td><?= $row["KotaSekolah"]; ?></td>
               <td><?= $row["Jurusan"]; ?></td>
               <td><?= $row["ThnLulus"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
         </table>     
         <!-- ========================================DATA KELUARGA==========================================-->
         <h6><b>DATA KELUARGA</b></h6>
         <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datakeluarga` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th>Hubungan</th>
               <th>Nama</th>
               <th>Tanggal Lahir</th>
               <th>Jenis Kelamin</th>
               <th>Pendidikan Terakhir</th>
               <th>Tahun Lulus</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["Hub"]; ?></td>
               <td><?= $row["Nama"]; ?></td>
               <td><?= $row["TglLahir"]; ?></td>
               <td><?= $row["JenisKelamin"]; ?></td>
               <td><?= $row["Pendidikan"]; ?></td>
               <td><?= $row["ThnLulus"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
         </table>  
          <!-- ========================================DATA SANKSI ADMINISTRATIF==========================================-->
          <h6><b>DATA SANKSI ADMINISTRATIF</b></h6>
          <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datasanksi` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th>Jenis Sanksi Administratif</th>
               <th>Masa Berlaku</th>
               <th>Ref No. Surat</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["Jenis"]; ?></td>
               <td><?= $row["Masa"]; ?></td>
               <td><?= $row["Ref"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
         </table>    
          <!-- ========================================DATA MUTASI==========================================-->
          <h6><b>DATA MUTASI</b></h6>
          <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datamutasi` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th>Tanggal</th>
               <th>No. Ref</th>
               <th>Jabatan Lama</th>
               <th>Jabatan Baru</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["Tanggal"]; ?></td>
               <td><?= $row["NoRef"]; ?></td>
               <td><?= $row["JabatanLama"]; ?></td>
               <td><?= $row["JabatanBaru"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
         </table>   
          <!-- ========================================DATA PENGALAMAN KERJA==========================================-->
          <h6><b>DATA PENGALAMAN KERJA</b></h6>
          <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datapengalaman` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th>Periode Tahun</th>
               <th>Nama Perusahaan</th>
               <th>Jenis Industri</th>
               <th>Jabatan</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["PeriodeThn"]; ?></td>
               <td><?= $row["NamaPerusahaan"]; ?></td>
               <td><?= $row["JenisIndustri"]; ?></td>
               <td><?= $row["Jabatan"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
         </table> 
          <!-- ========================================DATA TRAINING SEBELUM DI PON==========================================-->
          <h6><b>DATA TRAINING (LOKAKARYA/ WORKSHOP) SEBELUM DI PT. PON</b></h6>
          <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datatraining` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th>Periode Tanggal</th>
               <th>Institusi Pemberi Training</th>
               <th>Jenis/Topik/Judul Training</th>
               <th>Score</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["PeriodeTgl"]; ?></td>
               <td><?= $row["InstiPemberTraining"]; ?></td>
               <td><?= $row["JenisTopik"]; ?></td>
               <td><?= $row["Score"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
         </table> 
<!-- ========================================DATA TRAINING DI PON==========================================-->
<h6><b>DATA TRAINING (LOKAKARYA/ WORKSHOP) DI PT. PON</b></h6>
        <table class="table table-bordered">
         <?php $id=$_GET['id'];
                       $chrt = "SELECT * FROM `datatrainingpon` WHERE ID_Karyawan = '$id'";
                       //$almat = "SELECT * FROM tb_user WHERE id_user='$us'";
                       
                       $result = mysqli_query($mysqli, $chrt);
                    ?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)) { ?>
             <tr>
               <th >Periode Tanggal</th>
               <th>Institusi Pemberi Training</th>
               <th>Jenis/Topik/Judul Training</th>
               <th>Score</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($result as $row): ?>
             <tr> 
               <td><?= $row["PeriodeTgl"]; ?></td>
               <td><?= $row["InstiPemberTraining"]; ?></td>
               <td><?= $row["JenisTopik"]; ?></td>
               <td><?= $row["Score"]; ?></td>
             </tr>
             </tbody>
             <?php endforeach; ?>                       
             <?php }?>
             </table>
       </div>
</body>
<script> //untuk memproses fungsi print dengan menampilkan tampilan print pada browser
		window.load = print_d(); 
		function print_d(){
			window.print();
		}
</script>
</html>