<?php
include('security.php');
// session_start();
$connection = mysqli_connect("localhost","ashabul2_sipak","sipak_ashabul2","ashabul2_sipak");

if(isset($_POST['login_btn']))
{
    $email_login=$_POST['emaill'];
    $password_login=$_POST['passwordd'];

    $query="SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
    $query_run=mysqli_query($connection, $query);
    $user=mysqli_fetch_array($query_run);

    if($user)
    {
        $_SESSION['username'] = $email_login;
        $_SESSION['cid'] = $user['id_register'];
        $_SESSION['nama_user'] = $user['username'];
        header('Location: home.php');
    }
    else
    {
        $_SESSION['status'] = 'Email atau password salah';
        header('Location: index.php');
    }
}
?>
