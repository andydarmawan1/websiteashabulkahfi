<?php
include('security.php');
// session_start();
$connection = mysqli_connect("localhost", "root", "", "db_askaf");

if(isset($_POST['login_btn']))
{
    $email_login=$_POST['emaill'];
    $password_login=$_POST['passwordd'];

    $query="SELECT * FROM admin WHERE email='$email_login' AND password='$password_login' ";
    $query_run=mysqli_query($connection, $query);
    $admin=mysqli_fetch_array($query_run);

    if($admin)
    {
        $_SESSION['username'] = $email_login;
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['nama_admin'] = $admin['nama_admin'];
        $_SESSION['level'] = $admin['level'];

        header('Location: home.php');
        
            }
    else 
    {
        $_SESSION['status'] = 'Email atau password salah';
        header('Location: index.php');
    }
    
}
