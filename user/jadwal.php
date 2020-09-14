<?php
// include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Jadwal Kepondokan</h4>
  </div>

  <div class="card-body">

    <div class="table-responsive">


      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Jadwal Ta'lim </th>
            <th> Jadwal Kebersihan </th>
            <th> Jadwal Jaga Malam </th>
         </tr>
        </thead>
        <tr>
            <td> <a href="download.php?filename=jadwal_talim.pdf" class="" >Download</a> </td>
            <td> <a href="download.php?filename=jadwal_kebersihan.pdf" class="" >Download</a> </td>
            <td> <a href="download.php?filename=jadwal_jaga_malam.pdf" class="" >Download</a></td>
            
          </tr>

         
      </table>

    </div>
  </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>