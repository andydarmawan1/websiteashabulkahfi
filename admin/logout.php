<?php
session_start();
if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['id_admin']);
    unset($_SESSION['nama_admin']);
    header('Location: index.php');
}
?>