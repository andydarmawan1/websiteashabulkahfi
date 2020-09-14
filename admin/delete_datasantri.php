<?php 
require 'functions.php';
 $id=$_GET["id"];

// peritah untuk menghapus data sesuai id yang dipilih

 if(hapus_santri($id)>0){
     echo "
     <script>
     alert('Data berhasil dihapus');
     document.location.href='datasantricoba.php';
     </script>";
 }else{
     echo "
     <script>
     alert('Data berhasil dihapus');
     document.location.href='datasantricoba.php';
     </script>";
     echo "<br>";
     echo mysqli_error($conn);
 }
?>
