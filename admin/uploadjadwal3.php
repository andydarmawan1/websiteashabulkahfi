<?php
session_start();
$conn= mysqli_connect("localhost","ashabul2_sipak","sipak_ashabul2","ashabul2_sipak");
$id=$_SESSION['id_admin'];

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../user/file/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = ("Jadwal_Jaga_Malam.pdf");
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql1="Delete from tbl_uploads where file='Jadwal_Jaga_Malam.pdf'";
  mysqli_query($conn, $sql1);
  
  $sql="INSERT INTO tbl_uploads(file,type,size, id_register) VALUES('$final_file','$file_type','$new_size','$id')";
  mysqli_query($conn, $sql);
  ?>
  <script>
  alert('successfully uploaded');
         window.location.href='jadwal.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
         window.location.href='jadwal.php?fail';
        </script>
  <?php
 }
}
?>