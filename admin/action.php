<?php
include('security.php');

$connection = mysqli_connect("localhost","root","","db_tugasakhir");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Password and confirm Password Does Not Match";
        header('Location: register.php');
    }

}   


if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    echo $id;
    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
}


if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Datamu wes tak update";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Datamu Raiso di Update";
        header('Location: register.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run) 
    {
        $_SESSION['success'] = "Datamu Wes Tak Delete";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Datamu Raiso Di Delete";
        header('Location: register.php');
    }

}


if(isset($_POST['login_btn']))
{
    $email_login=$_POST['emaill'];
    $password_login=$_POST['passwordd'];

    $query="SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
    $query_run=mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] = 'Email atau password salah';
        header('Location: login.php');
    }
}

if(isset($_POST['about_save']))
{
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];

    $query = "INSERT INTO abouts (title,subtitle,description,links) VALUES ('$title','$subtitle','$description','$links')";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "About Us Added";
        header('Location: about.php');
    }
    else{
        $_SESSION['status'] = 'About Us Not Added';
        header('Location: about.php');
    }
}

if(isset($_POST['update_about']))
{
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];

    $query = "UPDATE abouts SET title='$title', subtitle='$subtitle', description='$description', links='$links' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Datamu wes tak update";
        header('Location: about.php');
    }
    else
    {
        $_SESSION['status'] = "Datamu Raiso di Update";
        header('Location: about.php');                                                                                                                                        
    }
}

// ---------- Data Santri --------------

if(isset($_POST['datasantri_save']))
{
    $nama_santri = $_POST['nama_santri'];
    $emailsantri = $_POST['emailsantri'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $no_ktp = $_POST['no_ktp'];
    $perguruan_tinggi = $_POST['perguruan_tinggi'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $nama_ayah = $_POST['nama_ayah'];
    $tempat_tgllahir_ayah = $_POST['tempat_tgllahir_ayah'];
    $no_ktp_ayah = $_POST['no_ktp_ayah'];
    $alamat_ayah = $_POST['alamat_ayah'];
    $no_hp_ayah = $_POST['no_hp_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $tempat_tgllahir_ibu  = $_POST['tempat_tgllahir_ibu'];
    $no_ktp_ibu = $_POST['no_ktp_ibu'];
    $alamat_ibu = $_POST['alamat_ibu'];
    $no_hp_ibu = $_POST['no_hp_ibu'];

    $query = "INSERT INTO santri 
    (nama_santri,emailsantri,jeniskelamin,tempatlahir,tanggallahir,no_ktp,perguruan_tinggi,no_hp,alamat,nama_ayah,tempat_tgllahir_ayah,no_ktp_ayah,alamat_ayah,no_hp_ayah,nama_ibu,tempat_tgllahir_ibu,no_ktp_ibu,alamat_ibu,no_hp_ibu) VALUES ('$nama_santri','$emailsantri','$jeniskelamin','$tempatlahir','$tanggallahir','$no_ktp','$perguruan_tinggi','$no_hp','$alamat','$nama_ayah','$tempat_tgllahir_ayah','$no_ktp_ayah','$alamat_ayah','$no_hp_ayah','$nama_ibu','$tempat_tgllahir_ibu','$no_ktp_ibu','$alamat_ibu','$no_hp_ibu')";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Data Santri Berhasil Ditambahkan";
        header('Location: datasantri.php');
    }
    else{
        $_SESSION['status'] = 'Data Santri Gagal Ditambahkan';
        header('Location: datasantri.php');
    }
}

if(isset($_POST['update_datasantri']))
{
    $id_santri = $_POST['edit_id_santri'];
    $nama_santri = $_POST['edit_nama_santri'];
    $emailsantri = $_POST['edit_emailsantri'];
    $jeniskelamin = $_POST['edit_jeniskelamin'];
    $tempatlahir = $_POST['edit_tempatlahir'];
    $tanggallahir = $_POST['edit_tanggallahir'];
    $no_ktp = $_POST['edit_no_ktp'];
    $perguruan_tinggi = $_POST['edit_perguruan_tinggi'];
    $no_hp = $_POST['edit_no_hp'];
    $alamat = $_POST['edit_alamat'];
    $nama_ayah = $_POST['edit_nama_ayah'];
    $tempat_tgllahir_ayah = $_POST['edit_tempat_tgllahir_ayah'];
    $no_ktp_ayah = $_POST['edit_no_ktp_ayah'];
    $alamat_ayah = $_POST['edit_alamat_ayah'];
    $no_hp_ayah = $_POST['edit_no_hp_ayah'];
    $nama_ibu = $_POST['edit_nama_ibu'];
    $tempat_tgllahir_ibu  = $_POST['edit_tempat_tgllahir_ibu'];
    $no_ktp_ibu = $_POST['edit_no_ktp_ibu'];
    $alamat_ibu = $_POST['edit_alamat_ibu'];
    $no_hp_ibu = $_POST['edit_no_hp_ibu'];


    $query = "UPDATE santri SET nama_santri='$nama_santri', emailsantri='$emailsantri', jeniskelamin='$jeniskelamin', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', no_ktp='$no_ktp', perguruan_tinggi='$perguruan_tinggi', no_hp='$no_hp', alamat='$alamat', nama_ayah='$nama_ayah', tempat_tgllahir_ayah='$tempat_tgllahir_ayah', no_ktp_ayah='$no_ktp_ayah', alamat_ayah='$alamat_ayah', no_hp_ayah='$no_hp_ayah', nama_ibu='$nama_ibu', tempat_tgllahir_ibu='$tempat_tgllahir_ibu', no_ktp_ibu='$no_ktp_ibu', alamat_ibu='$alamat_ibu', no_hp_ibu='$no_hp_ibu' WHERE id_santri='$id_santri' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Data Santri Sudah Diperbarui";
        header('Location: datasantri.php');
    }
    else
    {
        $_SESSION['status'] = 'Data Santri Tidak Bisa Diperbarui';
        header('Location: datasantri.php');           
         }
    }


if(isset($_POST['delete_datasantri']))
{
    $idsantri = $_POST['delete_idsantri'];

    $query = "DELETE FROM santri WHERE id_santri='$id_santri' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run) 
    {
        $_SESSION['success'] = "Datamu Wes Tak Delete";
        header('Location: datasantri.php');
    }
    else
    {
        $_SESSION['status'] = "Datamu Raiso Di Delete";
        header('Location: datasantri.php');
    }
}

// -------------- Data Admin --------------

if(isset($_POST['dataadmin_save']))
{
    $nama_admin = $_POST['nama_admin'];
    $no_ktp_admin = $_POST['no_ktp_admin'];
    $no_hp_admin = $_POST['no_hp_admin'];
    $alamat_admin = $_POST['alamat_admin'];

    $query = "INSERT INTO admin (nama_admin,no_ktp_admin,no_hp_admin,alamat_admin) VALUES ('$nama_admin','$no_ktp_admin','$no_hp_admin','$alamat_admin')";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "About Us Added";
        header('Location: dataadmin.php');
    }
    else{
        $_SESSION['status'] = 'About Us Not Added';
        header('Location: dataadmin.php');
    }
}

if(isset($_POST['edit_dataadmin']))
{
    $id_admin = $_POST['edit_id_admin'];
    $nama_admin = $_POST['edit_nama_admin'];
    $no_ktp_admin = $_POST['edit_no_ktp_admin'];
    $no_hp_admin = $_POST['edit_no_hp_admin'];
    $alamat_admin = $_POST['edit_alamat_admin'];

    $query = "UPDATE admin SET nama_admin='$nama_admin', no_ktp_admin='$no_ktp_admin', no_hp_admin='$no_hp_admin', alamat_admin='$alamat_admin' WHERE id_admin='$id_admin' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Datamu wes tak update";
        header('Location: dataadmin.php');
    }
    else
    {
        $_SESSION['status'] = "Datamu Raiso di Update";
        header('Location: dataadmin.php');                                                                                                                                        
    }
}

// ----------------- Data Absen --------------------

if(isset($_POST['dataabsen_save']))
{
    $id_santri = $_POST['id_santri'];
    $alfa = $_POST['alfa'];
    $sakit = $_POST['sakit'];
    $izin = $_POST['izin'];

    $query = "INSERT INTO dataabsen (id_santri,alfa,sakit,izin) VALUES ('$id_santri','$alfa','$sakit','$izin')";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "About Us Added";
        header('Location: dataabsen.php');
    }
    else{
        $_SESSION['status'] = 'About Us Not Added';
        header('Location: dataabsen.php');
    }
}

if(isset($_POST['edit_dataabsen']))
{
    $id_admin = $_POST['edit_id_absen'];
    $id_santri = $_POST['edit_id_santri'];
    $alfa = $_POST['alfa'];
    $sakit = $_POST['sakit'];
    $izin = $_POST['izin'];

    $query = "UPDATE abouts SET id_santri='$id_santri', alfa='$alfa', sakit='$sakit', izin='$izin' WHERE id_absen='$id_absen' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Datamu wes tak update";
        header('Location: dataabsen.php');
    }
    else
    {
        $_SESSION['status'] = "Datamu Raiso di Update";
        header('Location: dataabsen.php');                                                                                                                                        
    }
}

?>