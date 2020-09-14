<?php 
require 'functions.php';
 $id=$_GET["id"];
 $id_santri=$_GET["id_santri"];
// peritah untuk menghapus data sesuai id yang dipilih

 if(hapus_datapembayaran($id)>0){
     echo "
     <script>
     alert('Data berhasil dihapus');
     document.location.href='TampilPembayaran.php?id=$id_santri';
     </script>";
 }else{
     echo "
     <script>
     alert('Data gagal dihapus');
     document.location.href='TampilPembayaran.php?id=$id_santri';
     </script>";
     echo "<br>";
     echo mysqli_error($conn);
 }
?>
