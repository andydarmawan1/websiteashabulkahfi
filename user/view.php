<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "db_askaf");
$id = $_SESSION['cid'];

?>

<body>
   <div id="header">
      <label>Form Perizinan</label>
   </div>
   <div id="body">
      <table width="80%" border="1">
         <tr>
            <th colspan="4">your uploads...<label><a href="TampilPerizinan.php">upload new files...</a></label></th>
         </tr>
         <tr>
            <td>File Name</td>
            <td>File Size(KB)</td>
            <td>View</td>
         </tr>
         <?php
         $sql = "SELECT * FROM tbl_uploads where id_register=$id";
         $result_set = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_array($result_set)) {
         ?>
            <tr>
               <td><?php echo $row['file'] ?></td>
               <td><?php echo $row['size'] ?></td>
               <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
            </tr>
         <?php
         }
         ?>
      </table>

   </div>
</body>

</html>