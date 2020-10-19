<link href="css/sb-admin-2.min.css" rel="stylesheet">

<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_askaf";

$connection = mysqli_connect($server_name, $db_username, $db_password);
$dbconfig = mysqli_select_db($connection, $db_name);

if ($dbconfig) {
    // echo "Database konek yeee";
} else {
    // echo "Database Connection Failed";
    echo '
    <div class="container">
    <div class="row">
        <div class="col-md-6 mr-auto ml-auto text-center py-5 mt-5"
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title bg-warning"> Database Connection Failed </h1>
                    <h2 class="card-title"> Database Failure </h2>
                    <p class="card-text"> Please Check Your Database Connection</p>
                    <a href="#" class="btn btn-primary"> :) </a>
                </div>
            </div>
        </div>
    </div>
</div>

            ';
}
?>
<div class="container"></div>