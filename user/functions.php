<?php
$conn= mysqli_connect("localhost","ashabul2_sipak","sipak_ashabul2","ashabul2_sipak");

if(!$conn){
    die('Kondisi Error : '.mysqli_connect_errno().' - '.mysqli_connect_error());
}

function query($query_kedua){
    global $conn;
    $result=mysqli_query($conn,$query_kedua);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }

    return $rows;
}


/////////////////////////////////////////////////////////////////
//INPUT SANTRI
function input_santri($data){
    global $conn;

    $nama_santri            = htmlspecialchars($_POST['nama_santri']);  
    $emailsantri                  = htmlspecialchars($_POST['emailsantri']);
    $jeniskelamin           = htmlspecialchars($_POST['jeniskelamin']);
    $tempatlahir            = htmlspecialchars($_POST['tempatlahir ']);
    $tanggallahir           = htmlspecialchars($_POST['tanggallahir']);
    $no_ktp                 = htmlspecialchars($_POST['no_ktp']);
    $perguruan_tinggi       = htmlspecialchars($_POST['perguruan_tinggi']);
    $no_hp                  = htmlspecialchars($_POST['no_hp']);
    $alamat                 = htmlspecialchars($_POST['alamat']);
    $nama_ayah              = htmlspecialchars($_POST['nama_ayah']);
    $tempat_tgllahir_ayah   = htmlspecialchars($_POST['tempat_tgllahir_ayah']);
    $no_ktp_ayah            = htmlspecialchars($_POST['no_ktp_ayah']);
    $alamat_ayah            = htmlspecialchars($_POST['alamat_ayah']);
    $no_hp_ayah             = htmlspecialchars($_POST['no_hp_ayah']);
    $nama_ibu               = htmlspecialchars($_POST['nama_ibu']);
    $tempat_tgllahir_ibu    = htmlspecialchars($_POST['tempat_tgllahir_ibu']);
    $no_ktp_ibu             = htmlspecialchars($_POST['no_ktp_ibu']);
    $alamat_ibu             = htmlspecialchars($_POST['alamat_ibu']);
    $no_hp_ibu              = htmlspecialchars($_POST['no_hp_ibu']);


    $query          = "INSERT INTO santri values ('', '$nama_santri', '$email', '$jeniskelamin', '$tempatlahir', '$tanggallahir', '$no_ktp', '$perguruan_tinggi', '$no_hp', '$alamat', '$nama_ayah', '$tempat_tgllahir_ayah', '$no_ktp_ayah', '$alamat_ayah', '$no_hp_ayah', '$nama_ibu', '$tempat_tgllahir_ibu', '$no_ktp_ibu', '$alamat_ibu', '$no_hp_ibu')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function input_perizinan($data){
    global $conn;
    $id             = htmlspecialchars($_POST['id']);
    $tanggalizin    = htmlspecialchars($_POST['tanggalizin']);
    $tanggalpulang  = htmlspecialchars($_POST['tanggalpulang']);
    $nama_penjemput = htmlspecialchars($_POST['nama_penjemput']);
    $status         = htmlspecialchars($_POST['status']);
    $keterangan     = htmlspecialchars($_POST['keterangan']);
    $filesurat           = $_FILES['file']['name'];

    $file           = $_FILES['file']['tmp_name'];
    $filedest       = dirname(__FILE__) . '/img/' . $filesurat;
    move_uploaded_file($file, $filedest);


    $query          = "INSERT INTO perizinan values ('','$id', '$tanggalizin', '$tanggalpulang', '$nama_penjemput', '$status', '$keterangan', '$filesurat')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function input_dataabsen($data){
    global $conn;
    $id             = htmlspecialchars($_POST['id']);
    $tanggal        = htmlspecialchars($_POST['tanggal']);
    $alfa           = htmlspecialchars($_POST['alfa']);
    $sakit          = htmlspecialchars($_POST['sakit']);
    $izin           = htmlspecialchars($_POST['izin']);
    $query          = "INSERT INTO absen values ('', '$id', '$tanggal', '$alfa', '$sakit', '$izin')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function input_datapelanggaran($data){
    global $conn;
    $id             = htmlspecialchars($_POST['id']);
    $nama_santri    = htmlspecialchars($_POST['nama_santri']);
    $nama_ayah      = htmlspecialchars($_POST['nama_ayah']);
    $pelanggaran    = htmlspecialchars($_POST['pelanggaran']);
    $tindakan       = htmlspecialchars($_POST['tindakan']);
    $keterangan     = htmlspecialchars($_POST['keterangan']);
    $query          = "INSERT INTO pelanggaran values ('', '$id', '$nama_santri', '$nama_ayah', '$pelanggaran', '$tindakan', '$keterangan')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function input_datapembayaran($data){
    global $conn;
    $id             = htmlspecialchars($_POST['id']);
    $nama_admin     = htmlspecialchars($_POST['nama_admin']);    
    $bulan          = htmlspecialchars($_POST['bulan']);
    $nominal        = htmlspecialchars($_POST['nominal']);
    $terbayar       = htmlspecialchars($_POST['terbayar']);
    $status         = htmlspecialchars($_POST['status']);    
    $query          = "INSERT INTO pembayaran values ('', '$id', '$nama_admin', now(), now(), '$bulan', '$nominal', '$terbayar', '$status')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function input_dataraportramadhan($data){
    global $conn;
    $id             = htmlspecialchars($_POST['id']);
    $nama_santri    = htmlspecialchars($_POST['nama_santri']);    
    $kegiatan       = htmlspecialchars($_POST['kegiatan']);
    $alfa           = htmlspecialchars($_POST['alfa']);
    $izin           = htmlspecialchars($_POST['izin']);
    $sakit          = htmlspecialchars($_POST['sakit']);
    $query          = "INSERT INTO raport_ramadhan values ('', '$id', '$nama_santri', '$kegiatan', '$alfa', '$izin', '$sakit')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}



/////////////////////////////////////////////////////////////

//EDIT SANTRI
function edit_datasantri($data){
    global $conn;
    $id     = htmlspecialchars($_GET['id']);
    var_dump($id);

    $nama_santri            = htmlspecialchars($_POST['nama_santri']);  
    $jeniskelamin           = htmlspecialchars($_POST['jeniskelamin']);
    $tempatlahir            = htmlspecialchars($_POST['tempatlahir ']);
    $tanggallahir           = htmlspecialchars($_POST['tanggallahir']);
    $no_ktp                 = htmlspecialchars($_POST['no_ktp']);
    $perguruan_tinggi       = htmlspecialchars($_POST['perguruan_tinggi']);
    $no_hp                  = htmlspecialchars($_POST['no_hp']);
    $alamat                 = htmlspecialchars($_POST['alamat']);
    $nama_ayah              = htmlspecialchars($_POST['nama_ayah']);
    $tempat_tgllahir_ayah   = htmlspecialchars($_POST['tempat_tgllahir_ayah']);
    $no_ktp_ayah            = htmlspecialchars($_POST['no_ktp_ayah']);
    $alamat_ayah            = htmlspecialchars($_POST['alamat_ayah']);
    $no_hp_ayah             = htmlspecialchars($_POST['no_hp_ayah']);
    $nama_ibu               = htmlspecialchars($_POST['nama_ibu']);
    $tempat_tgllahir_ibu    = htmlspecialchars($_POST['tempat_tgllahir_ibu']);
    $no_ktp_ibu             = htmlspecialchars($_POST['no_ktp_ibu']);
    $alamat_ibu             = htmlspecialchars($_POST['alamat_ibu']);
    $no_hp_ibu              = htmlspecialchars($_POST['no_hp_ibu']);

    $query="update santri set
    nama_santri='$nama_santri', 
    jeniskelamin='$jeniskelamin', 
    tempatlahir'='$tempatlahir', 
    tanggallahir='$tanggallahir', 
    no_ktp='$no_ktp', 
    perguruan_tinggi='$perguruan_tinggi', 
    no_hp='$no_hp', 
    alamat'$alamat', 
    nama_ayah='$nama_ayah', 
    tempat_tgllahir_ayah='$tempat_tgllahir_ayah', 
    no_ktp_ayah='$no_ktp_ayah', 
    alamat_ayah='$alamat_ayah', 
    no_hp_ayah='$no_hp_ayah', 
    nama_ibu='$nama_ibu', 
    tempat_tgllahir_ibu='$tempat_tgllahir_ibu', 
    no_ktp_ibu='$no_ktp_ibu', 
    alamat_ibu='$alamat_ibu', 
    no_hp_ibu='$no_hp_ibu'
    where id_santri='$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

    
    if(isset($_POST['simpan'])){

    }else{

    }
}
function edit_dataperizinan($data){
    global $conn;
    $id             = htmlspecialchars($_GET['id']);
    $tanggalizin    = htmlspecialchars($_POST['tanggalizin']);
    $tanggalpulang  = htmlspecialchars($_POST['tanggalpulang']);
    $dijemput       = htmlspecialchars($_POST['dijemput']);
    $status         = htmlspecialchars($_POST['status']);
    $keterangan     = htmlspecialchars($_POST['keterangan']);
    $filesurat      = htmlspecialchars($_POST['filesurat']);

    $query="update perizinan set
    tanggalizin='$tanggalizin',
    tanggalpulang='$tanggalpulang',
    dijemput='$dijemput', 
    status='$status'
    keterangan='$keterangan', 
    filesurat='$filesurat'
    where id_perizinan='$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

    
    if(isset($_POST['simpan'])){

    }else{

    }
}

function edit_dataabsen($data){
    global $conn;
    $id         = htmlspecialchars($_GET['id']);
    $tanggal    = htmlspecialchars($_POST['tanggal']);
    $alfa       = htmlspecialchars($_POST['alfa']);
    $sakit      = htmlspecialchars($_POST['sakit']);
    $izin       = htmlspecialchars($_POST['izin']);

    $query="UPDATE `absen` SET `tanggal`='$tanggal',`alfa`='$alfa',`sakit`='$sakit',`izin`='$izin' WHERE `id_absen`=$id ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

    
    if(isset($_POST['simpan'])){

    }else{

    }
}
function edit_datapelanggaran($data){
    global $conn;
    $id             = htmlspecialchars($_GET['id']);
    $nama_santri    = htmlspecialchars($_POST['nama_santri']);
    $nama_ayah      = htmlspecialchars($_POST['nama_ayah']);    
    $pelanggaran    = htmlspecialchars($_POST['pelanggaran']);
    $tindakan       = htmlspecialchars($_POST['tindakan']);
    $keterangan     = htmlspecialchars($_POST['keterangan']);
    $query="update pelanggaran set 

    nama_santri='$nama_santri',
    nama_ayah='$nama_ayah',
    pelanggaran='$pelanggaran',
    tindakan='$tindakan',
    keterangan='$keterangan'

    where id_pelanggaran='$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

    
    if(isset($_POST['simpan'])){

    }else{

    }
}
function edit_datapembayaran($data){
    global $conn;
    $id             = htmlspecialchars($_GET['id']);
    $nama_admin     = htmlspecialchars($_POST['nama_admin']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $bulan          = htmlspecialchars($_POST['bulan']);
    $nominal        = htmlspecialchars($_POST['nominal']);
    $terbayar       = htmlspecialchars($_POST['terbayar']);
    $status         = htmlspecialchars($_POST['status']);
    $query="update pembayaran set
  
    nama_admin='$nama_admin',
    tanggal='$tanggal',
    waktu='$waktu', 
    bulan='$bulan', 
    nominal='$nominal',
    terbayar='$terbayar',
    status='$status'

    where id_pembayaran='$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

    
    if(isset($_POST['simpan'])){

    }else{

    }
}

function edit_dataraportramadhan($data){
    global $conn;
    $id             = htmlspecialchars($_GET['id']);
    $nama_santri    = htmlspecialchars($_POST['nama_santri']);    
    $kegiatan       = htmlspecialchars($_POST['kegiatan']);
    $alfa           = htmlspecialchars($_POST['alfa']);
    $izin           = htmlspecialchars($_POST['izin']);
    $sakit          = htmlspecialchars($_POST['sakit']);
    $query="update raport_ramadhan set

    
    nama_santri='$nama_santri',
    kegiatan='$kegiatan',
    alfa='$alfa',
    izin='$izin',
    sakit='$sakit'

    where id_raport='$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

    
    if(isset($_POST['simpan'])){

    }else{

    }
}
function hapus_dataabsen($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM absen WHERE id_absen=$id");
    return mysqli_affected_rows($conn);
}
function hapus_dataperizinan($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM perizinan WHERE id_perizinan=$id");
    return mysqli_affected_rows($conn);
}
function hapus_datapelanggaran($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pelanggaran WHERE id_pelanggaran=$id");
    return mysqli_affected_rows($conn);
}
function hapus_datapembayaran($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pembayaran WHERE id_pembayaran=$id");
    return mysqli_affected_rows($conn);
}
function hapus_admin($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM admin WHERE id_admin=$id");
    return mysqli_affected_rows($conn);
}
function hapus_register($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM register WHERE id_register=$id");
    return mysqli_affected_rows($conn);
}
function hapus_dataraportramadhan($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM raport_ramadhan WHERE id_raport=$id");
    return mysqli_affected_rows($conn);
}

function hapus_santri($id)
{
    global $conn;

    // Hapus Perizinan
    mysqli_query($conn, "DELETE FROM perizinan WHERE id_santri = '$id'");
    // hapus Absensi
    mysqli_query($conn, "DELETE FROM absen WHERE id_santri = '$id'");
    // hapus Pelanggaran
    mysqli_query($conn, "DELETE FROM pelanggaran WHERE id_santri = '$id'");
    // data Pembayaran
    mysqli_query($conn, "DELETE FROM pembayaran WHERE id_santri = '$id'");
    // data Raport Ramadhan
    mysqli_query($conn, "DELETE FROM raport_ramadhan WHERE id_santri = '$id'");

    // hapus pengguna
    mysqli_query($conn, "DELETE FROM santri WHERE id_santri = '$id'");    

}




function upload(){
    $nama_file = $_FILES['photo']['name'];
    $ukuran_file = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $file_tmp = $_FILES['photo']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
        alert('Tidak ada gambar yang diupload');
        </script>
        ";
        return false;
    }

    $jenis_gambar = ['jpg', 'jpeg', 'png', 'gif']; //jenis gambar yang boleh diinputkan
    $pecah_gambar = explode(".", $nama_file); //Memecah nama file dengan jenis gambar
    $pecah_gambar = strtolower(end($pecah_gambar)); //mengambil data array paling belakang
    if (!in_array($pecah_gambar, $jenis_gambar)) {
        echo "
        <script>
        alert('Yang anda upload bukan file gambar');
        </script>
        ";
        return false;
    }
    //cek kapasitas file yang diupload dala bentuk byte 1 MB = 1000000 Byte
    if ($ukuran_file > 10000000) {
        echo"
        <script>
        alert('Ukuran file terlalu besar');
        </script>
        ";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= ".";
    $namafilebaru .= $pecah_gambar;

    move_uploaded_file($file_tmp, 'img/'.$namafilebaru);

    //mereturn nama file agar masuk ke $gambar == upload()
    return $namafilebaru;
}

?>