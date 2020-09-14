-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2020 at 07:11 PM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashabul2_sipak`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `alfa` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_santri`, `nama_santri`, `tanggal_absen`, `tanggal`, `waktu`, `alfa`, `sakit`, `izin`) VALUES
(3, 28, '', '2020-07-08', '0000-00-00', '00:00:00', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_ktp_admin` varchar(25) NOT NULL,
  `no_hp_admin` varchar(20) NOT NULL,
  `alamat_admin` varchar(250) NOT NULL,
  `level` varchar(11) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `no_ktp_admin`, `no_hp_admin`, `alamat_admin`, `level`) VALUES
(3, 'superadmin', 'superadmin@gmail.com', 'superadmin', '123456789', '123456789', '-', 'superadmin'),
(4, 'Andy Darmawan', 'andydarmawan243@gmail.com', '123', '352323230002', '085819432211', 'Probolinggo', 'admin'),
(5, 'Tyka', 'tyka@gmail.com', '123', '86435325342', '084535433342', 'sukabumi', 'admin'),
(6, 'richo', 'richo@gmail.com', '123', '4899297563893920', '082233100323', 'tuban', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`) VALUES
(1, 'Data Santri'),
(2, 'Perizinan'),
(3, 'Absensi'),
(4, 'Pelanggaran'),
(5, 'Pembayaran'),
(6, 'Raport Ramadhan');

-- --------------------------------------------------------

--
-- Table structure for table `akses_admin`
--

CREATE TABLE `akses_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `expired_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_admin`
--

INSERT INTO `akses_admin` (`id`, `email`, `id_akses`, `updated_at`, `expired_at`) VALUES
(1, 'tyka@gmail.com', 1, '2020-07-24', '2020-07-31'),
(2, 'tyka@gmail.com', 2, '2020-07-23', '2020-07-27'),
(3, 'tyka@gmail.com', 3, '2020-07-23', '2020-07-25'),
(4, 'andydarmawan243@gmail.com', 4, '2020-07-23', '2020-07-25'),
(5, 'andydarmawan243@gmail.com', 5, '2020-07-23', '2020-07-25'),
(6, 'andydarmawan243@gmail.com', 6, '2020-07-23', '2020-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pelanggaran` varchar(30) NOT NULL,
  `tindakan` varchar(30) NOT NULL,
  `penanggungjawab` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `id_santri`, `tanggal`, `waktu`, `nama_santri`, `nama_ayah`, `pelanggaran`, `tindakan`, `penanggungjawab`, `keterangan`) VALUES
(3, 28, '0000-00-00', '00:00:00', 'Achmad Alfinda Fadly', 'Zaenal', 'Talim Shubuh', 'Jabut rumput dan bersihkan kam', '', 'Sudah dibangunkan tapi tetap tidak punya keinginan untuk bangun');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `terbayar` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_santri`, `nama_admin`, `nama_santri`, `tanggal`, `waktu`, `bulan`, `nominal`, `terbayar`, `status`) VALUES
(20, 19, '', '', '2020-07-21', '23:50:33', 'JANUARI', 1000000, '1000000', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id_perizinan` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `tanggalizin` date NOT NULL,
  `tanggalpulang` date NOT NULL,
  `nama_penjemput` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `filesurat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`id_perizinan`, `id_santri`, `tanggal`, `waktu`, `nama_santri`, `tanggalizin`, `tanggalpulang`, `nama_penjemput`, `status`, `keterangan`, `filesurat`) VALUES
(2, 77, '0000-00-00', '00:00:00', '', '2020-07-10', '2020-07-15', 'Andy Darmawan', 'diizinkan', 'klaten', 'Screenshot (2).png'),
(4, 28, '0000-00-00', '00:00:00', '', '2020-07-08', '2020-07-13', 'Andy Darmawan', 'Kediri', 'diizinkan', 'surat izin tidak sekolah.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `raport_ramadhan`
--

CREATE TABLE `raport_ramadhan` (
  `id_raport` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `alfa` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `sakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raport_ramadhan`
--

INSERT INTO `raport_ramadhan` (`id_raport`, `id_santri`, `nama_santri`, `tanggal`, `waktu`, `kegiatan`, `alfa`, `izin`, `sakit`) VALUES
(2, 28, 'Achmad Alfinda Fadly', '0000-00-00', '00:00:00', 'Talim Shubuh', 7, 6, 0),
(3, 28, 'Achmad Alfinda Fadly', '0000-00-00', '00:00:00', 'Talim Maghrib', 3, 2, 2),
(4, 28, 'Achmad Alfinda Fadly', '0000-00-00', '00:00:00', 'Kegiatan Sore', 0, 0, 0),
(5, 28, 'Achmad Alfinda Fadly', '0000-00-00', '00:00:00', 'Qiyamul Lail', 1, 0, 0),
(8, 2, 'MUHAMMAD DZIKRI', '2020-07-23', '09:58:18', 'talim masjid', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id_register` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id_register`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'A. Ilman Fauzi', 'ilmanfauzi11@gmail.com', '202001', 'user'),
(2, 'Muhammad Dzikri', 'Dzikri31@gmail.com', '202002', 'user'),
(3, 'Mohammad Ikhwan Fauzi', 'Ikhwanfauzi20@gmail.com', '202003', 'user'),
(4, 'Muchammad Jamalluddin', 'Jamal@gmail.com', '202004', 'user'),
(5, 'Moh Zainal Alim', 'Zainalalim12@gmail.com', '202005', 'user'),
(6, 'Tadetiya Yusmita Pratama', 'tadetiya62@gmail.com', '202006', 'user'),
(7, 'Fatihul Fikri', 'Fatih@gmail.com', '202007', 'user'),
(8, 'Febriyandi Anugrah Maulana', 'Febri5@gmail.com', '202008', 'user'),
(9, 'Lukman Ali Muhyiddin', 'lukman@gmail.com', '202009', 'user'),
(10, 'Ahmad Zainul Rizka', 'Zainul@gmail.com', '202010', 'user'),
(11, 'Muhammad Taufik Hidayat', 'taufik202@gmail.com', '202011', 'user'),
(13, 'Rifqy Hidayatullah', 'dayat45@gmail.com', '202013', 'user'),
(14, 'Ahmad Zaenal Arifin', 'Zaenal75@gmail.com', '202014', 'user'),
(15, 'Ali Ar Ridla', 'Aliarridla@gmail.com', '202015', 'user'),
(16, 'M Iqbal Fatony', 'iqbalfatony@gmail.com', '202016', 'user'),
(17, 'Muhammad Rafli Albar', 'muhammadraflialbar@gmail.com', '202017', 'user'),
(18, 'Moch Agung Mulyono H.S', 'agungmulyono@gmail.com', '202018', 'user'),
(19, 'Hayatur Rahman', 'Hayat@gmaill.com', '202019', 'user'),
(20, 'Royhan Firdaus', 'Royhanfirdaus@gmail.com', '202020', 'user'),
(21, 'Mohammad Najib Alif Rahmawan', 'Najibalif22@gmail.com', '202021', 'user'),
(22, 'Irsyad Tsani Ramadhan', 'irsyad243@gmail.com', '202022', 'user'),
(23, 'Zidny Alfian Bachri Erwan S.P.', 'Zidny@gmail.com', '202023', 'user'),
(24, 'Izzul Fikri Hidayatullah', 'izzul@gmail.com', '202024', 'user'),
(25, 'Sabda Amirul Habib', 'sabdaamirul@gmail.com', '202025', 'user'),
(26, 'Fahriza Dimas Bayu Andrian', 'fahriza@gmail.com', '202026', 'user'),
(27, 'Maulana Yusuf Arraihan', 'maulanayusuf@gmail.com', '202027', 'user'),
(28, 'Achmad Alfinda Fadly', 'alfinda@gmail.com', '202028', 'user'),
(29, 'Dhimas Afiffudin', 'afif@gmail.com', '202029', 'user'),
(30, 'Ramadian Budi Hardoyo', 'budi110@gmail.com', '202030', 'user'),
(31, 'Ahmad Rofikil Khoiri', 'Ahmadrofikilkhoiri@gmail.com', '202031', 'user'),
(32, 'Naufal Hanif Fadhlurrohman Azi', 'Hanif@gmail.com', '202032', 'user'),
(33, 'Muhammad Faqih Aulia Rahman', 'faqih40@gmail.com', '202033', 'user'),
(35, 'Moh. Rijalus Sholihin', 'sholihin23@gmail.com', '202035', 'user'),
(36, 'Novan Dimas Bayu Andrian', 'novan@gmail.com', '202036', 'user'),
(37, 'Najibur Rohman', 'Najib99@gmail.com', '202037', 'user'),
(38, 'Ahmad Zian Paradise', 'zian@gmail.com', '202038', 'user'),
(39, 'Muhammad Hanif Fatchuriza', 'muhammadhanif@gmail.com', '202039', 'user'),
(40, 'ACH. Turmudzi Ramadhani', 'turmudzi@gmail.com', '202040', 'user'),
(41, 'Nur Hamid Fuadi', 'fuad22@gmail.com', '202041', 'user'),
(42, 'M. Yuki Miftakhurrizqi', 'yuki@gmail.com', '202042', 'user'),
(43, 'Achmad dzulfikri almufti asyha', 'dzulfikri@gmail.com', '202043', 'user'),
(44, 'Tito Rizky Budi Pratama', 'tito@gmail.com', '202044', 'user'),
(45, 'Muhammad Hafizh Irsan Santoso', 'hafizh@gmail.com', '202045', 'user'),
(46, 'Ahmad Zainurridha', 'ahmadzain@gmail.com', '202046', 'user'),
(47, 'Akmal Fahmi', 'akmalfahmi@gmail.com', '202047', 'user'),
(48, 'Bangkit Nasrul Khaq', 'bangkit@gmail.com', '202048', 'user'),
(49, 'Achmad Nurdiansyah', 'dian@gmail.com', '202049', 'user'),
(50, 'Abdullah Faqih', 'Abdullahfaqih@gmail.com', '202050', 'user'),
(51, 'afifah', 'afifah@gmail.com', '202051', 'user'),
(52, 'Aliv Srianissya B', 'aliv@gmail.com', '202052', 'user'),
(53, 'Amyrah P. Hartanto', 'amyrah@gmail.com', '202053', 'user'),
(54, 'Anila Wirrantika', 'anila@gmail.com', '202054', 'user'),
(55, 'Anisah', 'anisah@gmail.com', '202055', 'user'),
(56, 'Annisah/Ninis', 'ninis@gmail.com', '202056', 'user'),
(57, 'Arsellina Khoirunnisa Caroline', 'arsellina@gmail.com', '202057', 'user'),
(58, 'Astika Pujiarti', 'astika@gmail.com', '202058', 'user'),
(59, 'Aulia Umi N', 'aulia@gmail.com', '202059', 'user'),
(60, 'Ayu Miladiyana Aslamiyah', 'ayu@gmail.com', '202060', 'user'),
(61, 'Cahyani Septyana', 'CahyaniSeptyana@gmail.com', '202061', 'user'),
(62, 'Dahlia Adies Sakina', 'dahlia@gmail.com', '202062', 'user'),
(63, 'Danish Nurul Fadilah', 'DanishNurulFadilah21@gmail.com', '202063', 'user'),
(64, 'Diana Assholehah', 'DianaAssholehah23@gmail.com', '202064', 'user'),
(65, 'Dinatul Islamiyah', 'DinatulIslamiyah11@gmail.com', '202065', 'user'),
(66, 'Durrotul Ainiyah', 'DurrotulAiniyah@gmail.com', '202066', 'user'),
(67, 'Eka Nurhayati', 'EkaNurhayati@gmail.com', '202067', 'user'),
(68, 'Elok Amalia', 'elok@gmail.com', '202068', 'user'),
(69, 'Erika Amalia', 'ErikaAmalia@gmail.com', '202069', 'user'),
(70, 'Evelyn Zhahlita F', 'EvelynZhahlita@gmail.com', '202070', 'user'),
(71, 'Faiqotul Himmah', 'FaiqotulHimmah13@gmail.com', '202071', 'user'),
(72, 'Ica Amarta', 'IcaAmarta@gmail.com', '202072', 'user'),
(73, 'Ihshania Yulita Natory', 'IhshaniaYulitaNatory@gmail.com', '202073', 'user'),
(74, 'Ikrimatuz Zulaykha', 'Ikrimatuzzulaykha@gmail.com', '202074', 'user'),
(75, 'Ilmiana Nurur Rohma', 'Ilmiananururrohma@gmail.com', '202075', 'user'),
(76, 'Indah Suci Fatmah Sari', 'IndahSuciFatmahSari@gmail.com', '202076', 'user'),
(77, 'Intan Fadilla', 'Intanfadilla@gmail.com', '202077', 'user'),
(78, 'Ira Zulfia', 'Irazulfia@gmail.com', '202078', 'user'),
(79, 'Isrul An Nuriah', 'Isrulannuriah@gmail.com', '202079', 'user'),
(80, 'Jamilatul Badriyah', 'Jamilatulbadriyah@gmail.com', '202080', 'user'),
(81, 'Kartika Sari', 'kartikasari@gmail.com', '202081', 'user'),
(82, 'Kumala Alda Z', 'Kumalaalda@gmail.com', '202082', 'user'),
(83, 'Laila Nuril Fadilah', 'Lailanurilfadilah@gmail.com', '202083', 'user'),
(84, 'Laila Rizqi Rhomadia', 'Lailarizqirhomadia@gmail.com', '202084', 'user'),
(85, 'Lila Mufidatul Khasanah', 'LilaMufidatulKhasanah@gmail.com', '202085', 'user'),
(86, 'Lutfiatun Hasanah', 'LutfiatunHasanah@gmail.com', '202086', 'user'),
(87, 'Makkiyah', 'makkiyah@gmail.com', '202087', 'user'),
(88, 'Nabilah Roisul A', 'NabilahRoisulAmini@gmail.com', '202088', 'user'),
(89, 'Puji Astutik', 'pujiastutik@gmail.com', '202089', 'user'),
(90, 'Riris Silvia Zahri', 'RirisSilviaZahri@gmail.com', '202090', 'user'),
(91, 'Rizka Hayyu Mustofa', 'RizkaHayyuMustofa@gmail.com', '202091', 'user'),
(92, 'Rizki Novitaria Rahmawat', 'RizkiNovitariaRahmawat@gmail.com', '202092', 'user'),
(93, 'Runiatus Sa`adah', 'RuniatusSaadah@gmail.com', '202093', 'user'),
(94, 'Salamatul Hifdiyah', 'SalamatulHifdiyah@gmail.com', '202094', 'user'),
(95, 'Sayyidah Khaizatul U', 'SayyidahKhaizatul@gmail.com', '202095', 'user'),
(96, 'Shinta Adinda', 'ShintaAdinda@gmail.com', '202096', 'user'),
(97, 'Shofia Anjarsari', 'ShofiaAnjarsari@gmail.com', '202097', 'user'),
(98, 'Silmi Kumala Dewi', 'SilmiKumalaDewi@gmail.com', '202098', 'user'),
(99, 'Siti Alhikmatul Hidayah', 'SitiAlhikmatulHidayah@gmail.com', '202099', 'user'),
(100, 'Siti Hajar', 'SitiHajar@gmail.com', '2020100', 'user'),
(101, 'Siti Novia Sari', 'SitiNoviaSari@gmail.com', '2020101', 'user'),
(102, 'Ulaa Masrurotus Saniyah', 'UlaaMasrurotusSaniyah@gmail.com', '2020102', 'user'),
(103, 'Wilujeng', 'Wilujeng@gmail.com', '2020103', 'user'),
(104, 'Zahra Habibah Maharani', 'ZahraHabibahMaharani@gmail.com', '2020104', 'user'),
(105, 'Zumrotul Fahmia', 'ZumrotulFahmia@gmail.com', '2020105', 'user'),
(106, 'Salsabila', 'Salsabila@gmail.com', '2020106', 'user'),
(107, 'Ulfa Rida', 'ulfarida@gmail.com', '2020107', 'user'),
(108, 'Ifa Datus Salamah', 'IfaDatusSalamah@gmail.com', '2020108', 'user'),
(109, 'Nahdiyah Lifah', 'Nahdiyahlifah@gmail.com', '2020109', 'user'),
(110, 'Agung Dwi Cahyono', 'AgungDwi@gmail.com', '202110', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `emailsantri` varchar(100) NOT NULL,
  `jeniskelamin` varchar(2) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tanggallahir` date NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `perguruan_tinggi` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `tempat_tgllahir_ayah` varchar(30) NOT NULL,
  `no_ktp_ayah` varchar(25) NOT NULL,
  `alamat_ayah` varchar(200) NOT NULL,
  `no_hp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `tempat_tgllahir_ibu` varchar(30) NOT NULL,
  `no_ktp_ibu` varchar(25) NOT NULL,
  `alamat_ibu` varchar(200) NOT NULL,
  `no_hp_ibu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `nis`, `nama_santri`, `emailsantri`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `no_ktp`, `perguruan_tinggi`, `no_hp`, `alamat`, `nama_ayah`, `tempat_tgllahir_ayah`, `no_ktp_ayah`, `alamat_ayah`, `no_hp_ayah`, `nama_ibu`, `tempat_tgllahir_ibu`, `no_ktp_ibu`, `alamat_ibu`, `no_hp_ibu`) VALUES
(2, 202002, 'MUHAMMAD DZIKRI', '', 'L', 'Lhoksukon', '2019-08-06', '', 'Politeknik negeri malang jurusan teknik mesin', '085217999914', 'Jl semanggi barat no.1A kota malang.pondok peaantren ashabul kahfi', 'MUHAMMAD YUSUF', '', '', '', '081269662849', '', '', '', '', ''),
(3, 202003, 'Mohammad Ikhwan Fauzi', '', 'L', 'PONOROGO', '2019-08-26', '', 'Polinema Administrasi Niaga', '089506970787', 'Rt 03 Rw 02 Paju Ponorogo', 'Budiono', '', '', 'Rt 03 Rw 02 Paju Ponorogo', '0895366782223', '', '', '', '', ''),
(4, 202004, 'Muchammad jamalluddin ', '', 'L', 'Pasuruan', '2000-09-20', '', 'Universitas Brawijaya/Peternakan', '085851919611', 'Jl.mujair Kauman No.411 Bangil Pasuruan ', 'M.faqih', '', '', '', '081234665211', '', '', '', '', ''),
(5, 202005, 'Moh Zainal Alim', '', 'L', 'Sumenep', '2001-08-10', '', 'Politeknik Negeri Malang dan Administrasi Niaga', '085236514533', 'Dsn. Kalaba\'an Dajah', 'Moh Ruddin', '', '', '', '087866245667', '', '', '', '', ''),
(6, 202006, 'TADETIYA YUSMITA PRATAMA', '', 'L', 'Solo ,karanganyar ', '2001-03-23', '', 'Polinema / jurusan elektro', '081615360061', 'Jl.walet 2 no 1 gka gresik kebomas jawa timur', 'Moh.Yusuf ', '', '', '', '081233594646', '', '', '', '', ''),
(7, 202007, 'Fatihul Fikri', '', 'L', 'Surabaya', '1999-11-10', '', 'UIN Malang. Kimia', '083854436148', 'Jl. Pagesangan IIA no 37', 'Syahrul Munir', '', '', '', '085706642528', '', '', '', '', ''),
(8, 202008, 'Febriyandi Anugrah Maulana', '', 'L', 'Malang', '2019-02-02', '', 'POLINEMA / D-VI JTD', '085733585125', 'DSN Bareng RT 4 RW 2, Sumberejo, Pandaan, Pasuruan', 'Mulyono', '', '', '', '08563946162', '', '', '', '', ''),
(9, 202009, 'Lukman Ali Muhyiddin', '', 'L', 'Tulungagung', '2000-10-14', '', 'Polinema Jurusan Teknik Kimia', '085791649273', 'RT/RW 03/01 Dsn. Tawang Ds. Tugu Kec. Rejotangan Kab. Tulungagung', 'Ali Musthofa', '', '', '', '085745945004', '', '', '', '', ''),
(10, 202010, 'Ahmad Zainul RIZKA', '', 'L', 'Bima,NTB', '2001-12-19', '', 'UMM/informatika', '082228824737', 'Pager kulon,kec Purwosari,kab.pasuruan', 'Mu\'alimin', '', '', '', '085708304802', '', '', '', '', ''),
(11, 202011, 'Muhammad taufik hidayat ', '', 'L', 'Bontang, Kaltim ', '2001-08-26', '', 'Polinema, D3 teknik mesin', '082350513598', 'Bontang, Kalimantan Timur ', 'Edi siswanto', '', '', '', '081253461843', '', '', '', '', ''),
(12, 202012, 'Lukman Ali Muhyiddin', '', 'L', 'Pasuruan', '2001-09-03', '', 'Polinema Elektro prodi D 3 teknik telekomunikasi', '0881026490722', 'Sembung parerejo Purwodadi Pasuruan', 'H Choirul anwar', '', '', '', '081805147652', '', '', '', '', ''),
(13, 202013, 'Rifqy Hidayatullah', '', 'L', 'SUMENEP', '2000-08-24', '', 'UNISMA FKIP (Pendidikan Bahasa & Sastra Indonesia)', '085234512225', 'Dusun Perigi Barat, Ds. Gadu Barat, Kec. Ganding, Kab. Sumenep ', 'Arba\'ie', '', '', '', '082341128693', '', '', '', '', ''),
(14, 202014, 'Ahmad zaenal arifin', '', 'L', 'Malang', '2001-08-23', '', 'Polinema jurusan teknologi informasi', '081358129552', 'Jl.hayam wuruk 1 gondang legi malang', 'Abdul hamid', '', '', '', '085101345199', '', '', '', '', ''),
(15, 202015, 'Ali Ar Ridla', '', 'L', 'Sumenep', '2000-02-11', '', 'Polinema /Teknologi Informasi', '085130336828', 'DSN Guluk-GulukbTengah', 'Surakna', '', '', '', '082302297795', '', '', '', '', ''),
(16, 202016, 'M. Iqbal Fatony', '', 'L', 'Banyuwangi', '2000-05-06', '', 'Polinema D4 Manajemen Pemasaran', '081258135824', 'RT07, RW05, Dusun Krajan, Desa Kebaman, Kec. Srono, Kab. Banyuwangi', 'Ahmad Syaifullah', '', '', '', '085330651993', '', '', '', '', ''),
(17, 202017, 'Muhammad Rafli Albar', '', 'L', 'Pasuruan', '2001-09-03', '', 'Polinema dan Elektro prodi D3 TT', '0881026490722', 'Sembung parerejo Purwodadi Pasuruan', 'H Choirul anwar', '', '', '', '081805147652', '', '', '', '', ''),
(18, 202018, 'Moch. Agung Mulyono H.S', '', 'L', 'Bojonegoro', '2001-03-17', '', 'Polinema, Jurusan Teknik Elektro, Prodi D3 TT', '085235645562', 'Jalan K.H.R Moch. Rosyid, No. 71, RT 02/01, Desa Ngumpak Dalem, Kecamatan Dander, Kab Bojonegoro', 'Supardi', '', '', '', '085231854425', '', '', '', '', ''),
(19, 202019, 'Hayatur Rahman', '', 'L', 'Sumenep', '2000-04-22', '', 'Politeknik Negeri Malang', '085231175692', 'Jln.Pasarean Agung Pandak No.04 Dusun Prigi Barat Desa Gadu Barat Kec Ganding Kab Sumenep Madura', 'Moh.Ramli', '', '', '', '082335067593', '', '', '', '', ''),
(20, 202020, 'Royhan Firdaus', '', 'L', 'Sumenep', '2001-11-13', '', 'Politeknik negeri Malang', '087846123034', 'Panagan Gapura Sumenep', 'Muhdar', '', '', '', '081939436688', '', '', '', '', ''),
(21, 202021, 'Mohammad najib alif rahmawan', '', 'L', 'Lamongan', '2000-12-26', '', 'Polinema manajemen informatika', '081332765222', 'Pangakterjo maduran lamongan', '', '', '', '', '', 'Faidatul khudliyah', '', '', '', '081358453908'),
(22, 202022, 'Irsyad Tsani Ramadhan', '', 'L', 'Pasuruan', '1998-12-25', '', 'Politeknik Negeri Malang/D4 Teknik informatika', '082153125325', 'Perum. Bukit Samboja Indah RT 07 kel. Wonotirto kec. Samboja kab. Kutai Kartanegara', '', '', '', '', '', 'Elly Khuriati', '', '', '', '08123207894'),
(23, 202023, 'Zidny Alfian Bachri Erwan S P', '', 'L', 'Malang', '2001-09-20', '', 'ITN malang dan Jurusan Teknik Mesin S1', '085755809950', 'Jalan ahmad nyani gondanglegi malang', '', '', '', '', '', '', 'Erni Nurul Imamah', '', '', '085791655088'),
(24, 202024, 'Izzul Fikri Hidayatullah', '', 'L', 'Malang', '2001-05-10', '', 'UNISMA Fakultas Keguruan dan ilmu Pendidikan', '082141248921', 'Jl Letjen S. Parman No 07 Rt 10 Rw 01 Kec.Gondanglegi Kab.Malang', '', '', '', '', '', 'Umi azizah', '', '', '', '081333304927'),
(25, 202025, 'Sabda Amirul Habib', '', 'L', 'TUBAN', '2000-05-30', '', 'UMM / T. ELEKTRO', '082140003411', 'Ds. Mentoso Kec. Jenu Kab. Tuban', 'Ramuanto', '', '', '', '081332406730', '', '', '', '', ''),
(26, 202026, 'Fahriza Dimas Bayu Andrian', '', 'L', 'Malang', '2000-08-02', '', 'UIN Maulana Malik Ibrahim Malang - Fisika', '081359844621', 'Jalan Pemancar TVRI RT.01 RW.08 Wonorejo, Lawang, Malang', 'Suriyanto', '', '', '', '085790330847', '', '', '', '', ''),
(27, 202027, 'Maulana Yusuf Arraihan ', '', 'L', 'Brebes', '2001-01-19', '', 'Polinema-Teknik Elektro', '083854433850', 'Perum. Melati Residence A12 Mojosari, Kab. Mojokerto', 'Dedy Arifianto', '', '', '', '081234100053', '', '', '', '', ''),
(28, 202028, 'Achmad Alfinda Fadly', '', 'L', 'Kediri ', '2000-03-24', '3506042403000002', 'Universitas Negeri Malang (Pendidikan  Geografi) ', '085745475714', 'Dsn Ngreco,  Rt/Rt 04/01, Desa Rembang,  kec Ngadiluwih, Kab Kediri', 'Zaenal', 'Kediri, 03 Januari 1973', '3506040301730001', 'Dsn Ngreco,  Rt/Rt 04/01, Desa Rembang,  kec Ngadiluwih, Kab Kediri', '085815964466', 'Nurhayati', 'Kediri,  14 Maret 1979', '3506045403790001', 'Dsn Ngreco,  Rt/Rt 04/01, Desa Rembang,  kec Ngadiluwih, Kab Kediri', '085815964466'),
(29, 202029, 'Dhimas afiffudin', '', 'L', 'Trenggalek', '2000-01-29', '3503062901000001', 'Polinema(D4-sistem kelistrikan)', '082233138733', 'Rt 17 Rw 06 desa Buluagung kec Karangan kab Trenggalek', 'Muyasir(almarhum)', '', '', '', '', 'Katiyah', 'Trenggalek,26 Februari 1970', '3503066602700001', 'Rt 17 Rw 06 desa Buluagung kec Karangan kab Trenggalek', '082233653750'),
(30, 202030, 'Ramadian Budi Hardoyo', '', 'L', 'Kediri', '2000-03-24', '3506042403000002', 'Universitas Negeri Malang (Pendidikan  Geografi) ', '085745475714', 'Dsn Ngreco,  Rt/Rt 04/01, Desa Rembang,  kec Ngadiluwih, Kab Kediri', 'Zaenal', 'Kediri, 03 Januari 1973', '3506040301730001', 'Dsn Ngreco,  Rt/Rt 04/01, Desa Rembang,  kec Ngadiluwih, Kab Kediri', '085815964466', 'Nurhayati', 'Kediri,  14 Maret 1979', '3506045403790001', 'Dsn Ngreco,  Rt/Rt 04/01, Desa Rembang,  kec Ngadiluwih, Kab Kediri', '085815964466'),
(31, 202031, 'Ahmad Rofikil Khoiri', '', 'L', 'Probolinggo', '2000-02-10', '3513111002000001', 'Polinema(Manajemen Informatika)', '085221949589', 'Triwungan Kotaanyar Probolinggo', 'Zubairi', 'Probolinggo,09 Agustus 1970', '3513110908700001', 'Triwungan Kotaanyar Probolinggo', '082302316177', 'Nour Subaihah', 'Probolinggo,05 12 1975', '3513114512750001', 'Triwungan Kotaanyar Probolinggo', '085259010228'),
(32, 202032, 'Naufal Hanif Fadhlurrohman Azi', '', 'L', 'Batu', '2000-02-02', '3507210202000002', 'Polinema (D4 Teknik Mesin Produksi & Perawatan)', '083848414458', 'Triwungan Kotaanyar Probolinggo', 'Sungadi', 'Sragen, 5 Januari 1965', '3507210501650003', 'Perumahan Griya Sejahtera LPK 3 Jl. Joko Tole no.12 kec, wagir, kab. Malang', '08125222926', 'Ika Widianti', 'Batu, 22 Juni 1979', '3507216206790001', 'Perumahan Griya Sejahtera LPK 3 Jl. Joko Tole no.12 kec, wagir, kab. Malang', '081252532224'),
(33, 202033, 'Muhammad faqih aulia rahman', '', 'L', 'Probolinggo', '2000-07-03', '3513120307000003', 'Polinema ( teknik mesin )', '082339637187', 'Sumberanyar paiton probolinggo', 'Jasuli', 'Probolinggo 06 juni 1972', '3513120606720002', 'Sumberanyar paiton probolinggo', '082334509672', 'Nurhani khukmiyati', 'Magelang 7 februari 1977', '3513124702770003', 'Sumberanyar paiton probolinggo', '082330643461'),
(34, 202034, 'Ramadian Budi Hardoyo', '', 'L', 'Siarang - arang', '2000-10-16', '6207021610000002', 'Polinema (teknik mesin )', '081230017671', 'Pakis Durenan Trenggalek', 'Bharma Suhardoyo', 'Surabaya, 16 april 1970', '6207021604700001', 'Pakis Durenan Trenggalek', '082255009775', 'Rohana Patwinarti', 'Trenggalek, 24 oktober 1976', '6207026410760002', 'Pakis Durenan Trenggalek', '081256450357'),
(35, 202035, 'Moh. Rijalus Sholihin', '', 'L', 'Probolinggo', '2000-09-17', '3513101809990002', 'Politeknik Negeri Malang (Teknik Elektro) ', '082337105933', 'Dsn Mungging, RT/RW 008/004, Desa Alas Pandan, Kec. Pakuniran, Kab. Probolinggo', 'Suki Susanto', 'Probolinggo, 20 Maret 1972', '3513102003720002', 'Dsn Mungging, RT/RW 008/004, Desa Alas Pandan, Kec. Pakuniran, Kab. Probolinggo', '082332821906', 'Lusmiati', 'Probolinggo, 6 September 1978', '3513104609780001', 'Pakis Durenan Trenggalek', '081256450357'),
(36, 202036, 'Novan Dimas Bayu Andrian', '', 'L', 'Malang', '2000-08-02', '3507250208000003', 'POLINEMA (Teknik Elektro)', '092337864294', 'Jalan Pemancar TVRI RT 01 RW 08 Krajan Barat, Wonorejo, Lawang - Malang', 'Suriyanto', 'Malang, 3 Juli 1970', '3507250307700009', 'Jalan Pemancar TVRI RT 01 RW 08 Krajan Barat, Wonorejo, Lawang - Malang', '085100358704', 'Arlina', 'Malang, 15 Juli 1976', '3507255507760005', 'Dsn Mungging, RT/RW 008/004, Desa Alas Pandan, Kec. Pakuniran, Kab. Probolinggo', '082332821906'),
(37, 202037, 'Najibur Rohman', '', 'L', 'Jombang', '2000-02-11', '3174091102000003', 'POLINEMA (Teknik Elektro)', '081367246884', 'Jl.Barkah RT/RW 03/05 Ciganjur Jagakarsa Jakarta Selatan', 'Khoirul Waton ', 'Jombang, 06 02 1965', '3174090602650004', 'Jl.Barkah RT/RW 03/05 Ciganjur Jagakarsa Jakarta Selatan ', '08128097630', 'Muawanah', 'Jombang, 20 09 1973', '3174096009730003', 'Jl.Barkah RT/RW 03/05 Ciganjur Jagakarsa Jakarta Selatan ', '081387237458'),
(38, 202038, 'Ahmad Zian Paradise', '', 'L', 'Sumenep', '1999-02-03', '3529090302990003', 'Keuangan', '082330021189', 'Sumenep,Guluk Guluk,Guluk Guluk Timur Kemisan', 'ahmad sahenal', 'Sumenep', '3529091001780005', 'Guluk Guluk Timur', '085336598979', 'Nasilatul Khalisah', 'Sumenep', '3529094201820005', 'Guluk Guluk timur', '082335959531'),
(39, 202039, 'Muhammad Hanif Fatchuriza', '', 'L', 'Kediri', '1999-10-27', '3506252711990002', 'Polinema (D4 Keuangan)', '082234872385', 'Perumahan jenggolo indah R-16 Desa Gogorante Kec. Ngasem Kab. Kediri', 'Imam Kanapi', 'Tulungagung, 09 Juni 1965', '3506250906650001', 'Perumahan jenggolo indah R-16 Desa Gogorante Kec. Ngasem Kab. Kediri', '081234307513', 'Anik Purwati', 'Nganjuk, 13 Agustus 1972', '3506255308720001', 'Perumahan jenggolo indah R-16 desa Gogorante kec. Ngasem Kab. Kediri', '081335490351'),
(40, 202040, 'ACH. Turmudzi Ramadhani', '', 'L', 'sumenep', '2000-01-07', '3529070701001155', 'polinema Teknik mesin', '083117908295', 'meddelan lenteng sumenep', 'SUBARDI', 'sumenep, 19-12-1966', '3529071912660001', 'meddelan lenteng sumenep', '082338868740', 'MARDIYA', 'sumenep, 03-11-1976 ', '3529074311760005', 'meddelan lenteng sumenep', '085231146450'),
(41, 202041, 'Nur Hamid Fuadi', '', 'L', 'Nganjuk', '2000-07-07', '3518070706000003', 'UM (Biologi)', '081515102767', 'Sukorejo, Klurahan, Ngronggot, Nganjuk', 'Alm. Muh Kusnan', 'Kediri, 13 Oktober 1954', '', 'Sukorejo, Klurahan, Ngronggot, Nganjuk', '', 'Ulfatul Hasanah', 'Nganjuk, 29 Agustus 1965', '', 'Sukorejo, Klurahan, Ngronggot, Nganjuk', '085755490908'),
(42, 202042, 'M. Yuki Miftakhurrizqi', '', 'L', 'Sidoarjo', '2000-03-02', '3515140203000003', 'Polinema (D3 Manajemen Informatika)', '085606164346', 'Plumbungan RT.11 RW 04 Sukodono Sidoarjo', 'Abd. Ghofur', 'Sidoarjo, 02 Mei 1971', '3515140205710001', 'Plumbungan RT.11 RW 04 Sukodono Sidoarjo', '082220314531', 'Churiyah Milqiyatinu', 'Sidoarjo, 28 Maret 1973', '3515146803730001', 'Plumbungan RT.11 RW 04 Sukodono Sidoarjo', '081235054133'),
(43, 202043, 'Achmad dzulfikri almufti asyha', '', 'L', 'Kediri', '2000-02-23', '3518132302000004', 'UM (pend.biologi)', '082244295763', 'Jl.letjend suprapto 1a ds. Ploso kec. Nganjuk kab.nganjuk', 'Imam mahmud', 'Nganjuk 26 februari 1978', '3518132802730004', 'Jl.letjend suprapto 1a ds. Ploso kec. Nganjuk kab.nganjuk', '085233901873', 'Luluk dewi masruroh', 'Kediri 7 agustus 1981', '3518134708760001', 'Jl.letjend suprapto 1a ds. Ploso kec. Nganjuk kab.nganjuk', '085335061928'),
(44, 202044, 'Tito Rizky Budi Pratama', '', 'L', 'Kediri', '1999-10-30', '3506063010990002', 'Universitas Negri Malang (Ilmu Keolahragaan)', '085736850028', 'Dsn.Ngelowan Rt.15/Rw.04 Ds.Duwet, Kec.Wates, Kab.Kediri, Jawa Timur', 'Budiono', 'Kediri, 19 Februari 1969', '3506061902690001', 'Dsn.Ngelowan Rt.15/Rw.04 Ds.Duwet, Kec.Wates, Kab.Kediri, Jawa Timur', '081234065758', 'Hariyanti', 'Kediri, 25 Agustus 1979', '3506066508790002', 'Dsn.Ngelowan Rt.15/Rw.04 Ds.Duwet, Kec.Wates, Kab.Kediri, Jawa Timur', '085730412578'),
(45, 202045, 'Muhammad Hafizh Irsan Santoso', '', 'L', 'Mojokerto', '2000-05-06', '', 'Polinema ( Teknik Sipil)', '089676782380', 'Villa Adonia D.8 BSP Sooko', 'Pudji Santoao', 'Surabaya 18 juli 1967', '3576011807670001', 'Villa Adonia D.8 BSP Sooko', '081235429872', 'Erawati Yuana', 'Mojokerto 30 januari 1969', '3576017001690001', 'Villa Adonia D.8 BSP Sooko', '081331866047'),
(46, 202046, 'Ahmad Zainurridha', '', 'L', 'Sumenep', '2000-01-15', '3529071501000002', 'Polinema D4 manajemen pemasaran', '081357953839', 'Moncek Barat Lenteng Sumenep', 'Abul Chair', 'Sumenep 21 mei 1978', '3529072105780004', 'Moncek barat lenteng sumenep', '082333821517', 'Nur Hayati', 'Sumenep 20 nopember 1979', '3529076011790005', 'Moncek barat lenteng sumenep', '082333821517'),
(47, 202047, 'Akmal fahmi', '', 'L', 'Sampang', '2000-07-13', '', 'UM (GEOGRAFI)', '081359028663', 'Jl sumber omben sampang  madura', 'Supandi', 'Pamekasan 07 juli 1956', '', 'Jl sersan misrul pamekasa madura', '085233041640', 'Hanifah', 'Sampang 17 mei 1960', '', 'Jl sumber omben sampang madura', '0878557850106'),
(48, 202048, 'Bangkit Nasrul Khaq', '', 'L', 'Kediri', '2000-08-25', '3506022508990001', 'Polinema teknik sipil', '081615486412', 'RT 2/RW 2 dusun pelem desa Medan kecamatan mojo kabupaten Kediri ', 'Jaelani', 'Kediri, 09 Juni 19719', '3506020906710001', 'Pelem Maesan mojo kediri', '085851366065', 'Nurhidayati', 'Kediri, 17 Agustus 1976', '3506025708770005', 'Pelem Maesan mojo kediri', '085235890875'),
(49, 202049, 'Achmad nurdiansyah', '', 'L', 'Gresik', '2000-07-24', '3525102407990003', 'Polinema (managemen pemasaran) ', '085785980062', 'Jl satelit X manyar-manyarejo', 'Ach afif', 'Gresik,  02-04-1967', '3525100204670004', 'Jl satelit X manyar-manyarejo', '085859284961', 'Yuanik wijaya', 'Tuban,  16-07-1968', '352510567680003', 'Jl satelit X manyar-manyarejo', '085806983405'),
(50, 202050, 'Abdullah faqih', '', 'L', 'Probolinggo', '2000-04-04', '3513120404000005', 'Unisma jurusan teknik mesin', '082233107457', 'Dusun curah rt 3 rw 5 petunjungan paiton probolinggo', 'Abdullah', 'Probolinggo, 08-02-1971', '3513120802710001', 'Dusun curah rt 3 rw 5 petunjungan paiton probolinggo', '085258718369', 'Yuliati', 'Probolinggo, 02-12-1973', '3513124212730002', 'Dusun curah rt 3 rw 5 petunjungan paiton probolinggo', '082233107457'),
(51, 202051, 'Afifah', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 202052, 'Aliv Srianissya B', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, 202053, 'Amyrah P. Hartanto', '', 'P', 'Bekasi', '2002-01-09', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 202054, 'Anila Wirrantika', '', 'P', 'Purbalingga', '2001-04-11', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 202055, 'Anisah', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 202056, 'Annisah/Ninis', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 202057, 'Arsellina Khoirunnisa Caroline', '', 'P', 'Sumenep', '2001-06-06', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 202058, 'Astika Pujiarti', '', 'P', 'Nganjuk', '2001-07-12', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, 202059, 'Aulia Umi N', '', 'P', 'Malang', '2001-12-18', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 202060, 'Ayu Miladiyana Aslamiyah', '', 'P', 'Banyuwangi', '1999-03-03', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 202061, 'Cahyani Septyana', '', 'P', 'Probolinggo', '1999-09-24', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 202062, 'Dahlia Adies Sakina', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 202063, 'Danish Nurul Fadilah', '', 'P', 'Malang', '2001-08-01', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 202064, 'Diana Assholehah', '', 'P', 'Sampang', '2000-02-18', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 202065, 'Dinatul Islamiyah', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 202066, 'Durrotul Ainiyah', '', 'P', 'Jombang', '1998-03-28', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 202067, 'Eka Nurhayati', '', 'P', 'Nganjuk', '2000-10-08', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 202068, 'Elok Amalia', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 202069, 'Erika Amalia ', '', 'P', 'Probolinggo', '2001-08-01', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 202070, 'Evelyn Zhahlita F', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 202071, 'Faiqotul Himmah', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 202072, 'Ica Amarta', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 202073, 'Ihshania Yulita Natory', '', 'P', 'Malang', '1997-10-08', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 202074, 'Ikrimatuz Zulaykha', '', 'P', 'Malang', '2001-07-07', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, 202075, 'Ilmiana Nurur Rohma', '', 'P', 'Bojonegoro', '2000-04-01', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 202076, 'Indah Suci Fatmah Sari', '', 'P', 'Probolinggo', '2000-12-12', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, 202077, 'Intan Fadilla', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, 202078, 'Ira Zulfia', '', 'P', 'Malang', '2000-06-16', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, 202079, 'Isrul An Nuriah', '', 'P', 'Nganjuk', '2000-09-25', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 202080, 'Jamilatul Badriyah', '', 'P', 'Probolinggo', '1999-11-04', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, 202081, 'Kartika Sari', '', 'P', 'Pasuruan', '1999-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 202082, 'Kumala Alda Z', '', 'P', 'Nganjuk', '2000-01-01', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 202083, 'Laila Nuril Fadilah', '', 'P', 'Blora', '2001-04-01', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 202084, 'Laila Rizqi Rhomadiani', '', 'P', 'Lamongan', '2001-12-16', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 202085, 'Lila Mufidatul Khasanah', '', 'P', 'Malang', '1999-04-03', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 202086, 'Lutfiatun Hasanah', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 202087, 'Makkiyah', '', 'P', 'Sumenep', '2001-05-11', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 202088, 'Nabilah Roisul A', 'nabilahroisul811@gmail.com', 'P', 'probolinggo', '1999-11-08', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 202089, 'Puji Astutik', '', 'P', 'Pasuruan', '2000-11-06', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 202090, 'Riris Silvia Zahri', '', 'P', 'Malang', '2001-03-12', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 202091, 'Rizka Hayyu Mustofa', '', 'P', 'Pasuruan', '2001-07-29', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 202092, 'Rizki Novitaria Rahmawati', '', 'P', 'Kediri', '1999-11-13', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 202093, 'Runiatus Sa`adah', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, 202094, 'Salamatul Hifdiyah', '', 'P', 'Pasuruan', '2001-06-07', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, 202095, 'Sayyidah Khaizatul U', '', 'P', 'Lumajang', '1997-11-04', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, 202096, 'Shinta Adinda', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, 202097, 'Shofia Anjarsari', '', 'P', 'Tulungagung', '1999-09-06', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, 202098, 'Silmi Kumala Dewi', '', 'P', 'Semarang', '2000-06-06', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, 202099, 'Siti Alhikmatul Hidayah', '', 'P', 'Pasuruan', '1998-10-14', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, 202100, 'Siti Hajar', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, 202101, 'Siti Novia Sari', '', 'P', 'Nganjuk', '2000-10-17', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, 202102, 'Ulaa Masrurotus Saniyah', '', 'P', 'Malang', '2000-10-14', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, 202103, 'Wilujeng F.', '', 'P', 'Probolinggo', '2000-01-15', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, 202104, 'Zahra Habibah Maharani', '', 'P', 'Malang', '1999-10-29', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, 202105, 'Zumrotul Fahmia', '', 'P', 'Malang', '1998-11-17', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, 202106, 'Salsabila', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, 202107, 'Ulfa Rida', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `id` int(11) NOT NULL,
  `id_register` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id`, `id_register`, `file`, `type`, `size`) VALUES
(1, 1, '12225-form_perizinan.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14),
(2, 1, '49862-form_perizinan.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14),
(3, 1, '24524-form_perizinan.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14),
(4, 1, '18527-form_perizinan.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14),
(5, 1, '85173-form_perizinan.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14),
(6, 1, '24153-form_perizinan.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14),
(23, 5, 'jadwal_talim.pdf', 'application/pdf', 103),
(22, 5, 'jadwal_talimm.pdf', 'application/pdf', 103);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akses_admin`
--
ALTER TABLE `akses_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id_perizinan`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `raport_ramadhan`
--
ALTER TABLE `raport_ramadhan`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_register`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akses_admin`
--
ALTER TABLE `akses_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id_perizinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `raport_ramadhan`
--
ALTER TABLE `raport_ramadhan`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santri` (`id_santri`);

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santri` (`id_santri`);

--
-- Constraints for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD CONSTRAINT `perizinan_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santri` (`id_santri`);

--
-- Constraints for table `raport_ramadhan`
--
ALTER TABLE `raport_ramadhan`
  ADD CONSTRAINT `raport_ramadhan_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santri` (`id_santri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
