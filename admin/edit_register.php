<?php
// session_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

require 'functions.php';

//cek apakah button submit sudah ditekan atau belum
$id=$_GET['id'];

$mhs=query("SELECT * FROM register WHERE id_register=$id")[0];

//var_dump($mhs[0]["Nama"]);
if(isset($_POST['simpan']))
{
    //cek sukses data ditambah menggunakan function tambah pada functions.php
  if(edit_register($_POST)>0){
    echo"
    <script>
    alert('Data berhasil diperbarui!');
    document.location.href='dataregister.php';
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
          <h1>Data Register</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kelola Data Register</li>
            <li class="breadcrumb-item active">Data Register</li>
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
                    <label for="inputdatasantri" class="col-md-6 col-form-label">Username</label>
                    <div class="col-lg-12">
                      <input type="text" name="username" class="form-control" value="<?php echo $mhs['username']; ?>" id="inputdatasantri" placeholder="Username">
                    </div>
                  </div>
                </td>
                <tr>
                  <td>
                    <div class="form-group row">
                      <label for="inputdatasantri" class="col-md-6 col-form-label">Email</label>
                      <div class="col-lg-12">
                        <input type="email" name="email" class="form-control" value="<?php echo $mhs['email'] ?>" id="inputdatasantri" placeholder="Email">
                      </div>
                    </div>
                  </td>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">password</label>
                        <div class="col-lg-12">
                          <input type="password" name="password" class="form-control" value="<?php echo $mhs['password']; ?>" id="inputdatasantri" placeholder="Password" required>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-md-6 col-form-label">Usertype</label>
                        <div class="col-lg-12">
                          <select name="usertype" class="form-control" required="">
                            <?php
                            if ($mhs['usertype'] == "user"){
                              echo "<option value='user' selected>User</option>    
                              <option value='admin'>Admin</option>";
                            } else if ($mhs['usertype'] == "admin"){
                              echo "<option value='user'>User</option>    
                              <option value='admin' selected>Admin</option>";
                            } 
                            ?>
                          </select>  
                        </div>
                      </div>
                    </td>
                  </tr>
                  <td height="100">
                   <input class="btn btn-warning" type="submit" name="simpan" id="simpan" value="Simpan Perubahan" /> <!--untuk menyimpan data-->
                   <a class="btn btn-info" href="dataregister.php">Batal<br>
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