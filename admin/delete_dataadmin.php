<?php 
require 'functions.php';
 $id=$_GET["id"];

// peritah untuk menghapus data sesuai id yang dipilih

 if(hapus_admin($id)>0){
     echo "
     <script>
     alert('Data berhasil dihapus');
     document.location.href='dataadmin.php';
     </script>";
 }else{
     echo "
     <script>
     alert('Data gagal dihapus');
     document.location.href='dataadmin.php';
     </script>";
     echo "<br>";
     echo mysqli_error($conn);
 }
?>
