-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 11:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bk2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(6) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_kls` char(6) NOT NULL,
  `absensi` char(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nis`, `id_kls`, `absensi`, `tanggal`) VALUES
(2, 2020610002, 'KLS002', 'I', '2022-01-30'),
(3, 2021610008, 'KLS019', 'I', '2022-02-02'),
(5, 1235611112, 'KLS001', 'S', '2022-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `bimpel`
--

CREATE TABLE `bimpel` (
  `id_bimpel` char(10) NOT NULL,
  `id_jbimpel` char(10) NOT NULL,
  `id_jpel` char(10) NOT NULL,
  `id_katpel` char(10) NOT NULL,
  `id_jbim` char(10) NOT NULL,
  `NIS` int(10) NOT NULL,
  `NIP` int(10) NOT NULL,
  `tgl_bimpel` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimpel`
--

INSERT INTO `bimpel` (`id_bimpel`, `id_jbimpel`, `id_jpel`, `id_katpel`, `id_jbim`, `NIS`, `NIP`, `tgl_bimpel`, `keterangan`) VALUES
('BP0001', 'JBP001', 'JPEL001', 'KP0001', 'JB0001', 101011, 10001, '2022-02-13', 'cabut');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` char(10) NOT NULL,
  `nama_guru` varchar(25) NOT NULL,
  `id_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `id_jabatan`) VALUES
('1010101010', 'Endra Kasmawati, S.pd', '5'),
('1212121211', 'Ike Valencia', '3'),
('1212121212', 'Nuraini', '1'),
('1212121213', 'Sofyan syarif', '4'),
('1212121216', 'Endra Kasmawati, S.pd', '2'),
('1212121217', 'Sofyan', '4'),
('1212121219', 'gita yetni', '6');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` char(3) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
('1', 'Kepala Sekolah'),
('2', 'Wakil Kurikulum'),
('3', 'Wakil Sarana dan Prasaran'),
('4', 'Wakil Kesiswaan'),
('5', 'Guru'),
('6', 'Guru BK');

-- --------------------------------------------------------

--
-- Table structure for table `jbimpel`
--

CREATE TABLE `jbimpel` (
  `id_jbimpel` char(10) NOT NULL,
  `kategori_bimpel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jbimpel`
--

INSERT INTO `jbimpel` (`id_jbimpel`, `kategori_bimpel`) VALUES
('JBP001', 'bimbingan'),
('JBP002', 'pelanggaran');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bimbingan`
--

CREATE TABLE `jenis_bimbingan` (
  `id_jbim` char(6) NOT NULL,
  `kategori_bimbingan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_bimbingan`
--

INSERT INTO `jenis_bimbingan` (`id_jbim`, `kategori_bimbingan`) VALUES
('JB0001', 'Akademik'),
('JB0002', 'Peminatan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggaran`
--

CREATE TABLE `jenis_pelanggaran` (
  `id_jpel` int(6) NOT NULL,
  `jpel` varchar(100) NOT NULL,
  `id_katpel` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `sanksi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`id_jpel`, `jpel`, `id_katpel`, `bobot`, `sanksi`) VALUES
(1, 'Cabut', 2, 25, 'Hormat Bendera'),
(2, 'Ribut dikelas', 1, 15, 'Tolerasi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelanggaran`
--

CREATE TABLE `kategori_pelanggaran` (
  `id_katpel` char(6) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_pelanggaran`
--

INSERT INTO `kategori_pelanggaran` (`id_katpel`, `kategori`) VALUES
('KP0001', 'Ringan'),
('KP0002', 'Sedang'),
('KP0003', 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kls` char(6) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kls`, `kelas`) VALUES
('KLS001', 'X.IPA.1'),
('KLS002', 'X.IPA.2'),
('KLS003', 'X.IPA.3'),
('KLS004', 'X.IPS.1'),
('KLS005', 'X.IPS.2'),
('KLS006', 'X.IPS.3'),
('KLS007', 'XI.IPA.1'),
('KLS008', 'XI.IPA.2'),
('KLS009', 'XI.IPA.3'),
('KLS010', 'XI.IPS.1'),
('KLS011', 'XI.IPS.2'),
('KLS012', 'XI.IPS.3'),
('KLS013', 'XII.IPA.1'),
('KLS014', 'XII.IPA.2'),
('KLS015', 'XII.IPA.3'),
('KLS016', 'XII.IPS.1'),
('KLS017', 'XII.IPS.2'),
('KLS018', 'XII.IPS.3');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `ta` varchar(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `mk` varchar(7) NOT NULL,
  `nidn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`ta`, `nim`, `mk`, `nidn`) VALUES
('20201', '1234567890', 'TIS8312', '1025108901'),
('20201', '2019610051', 'TIS1213', '1017067501'),
('20201', '2019610051', 'TIS3321', '1010128501'),
('20201', '2019610051', 'TIS5623', '1005079101'),
('20201', '2019610051', 'TIS5653', '1005079101'),
('20201', '2019610051', 'TIS7312', '1006068501'),
('20201', '2019610051', 'TIS7613', '1010128501'),
('20201', '2019610051', 'TIS8312', '1025108901'),
('20201', '2020610034', 'TIS1213', '1017067501'),
('20202', '2020610001', 'TIS6642', '1022077601');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` varchar(7) NOT NULL,
  `nama_mk` varchar(25) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('TIS1112', 'Pendidikan Pancasila', 2),
('TIS1213', 'Kalkulus 1', 3),
('TIS1313', 'Bahasa Pemograman', 3),
('TIS2223', 'Algoritma dan Pemograman', 3),
('TIS2642', 'Tek. Elektronika Digital', 2),
('TIS3213', 'Struktur Data', 3),
('TIS3221', 'Prak. Struktur Data', 1),
('TIS3313', 'Sistem Operasi', 3),
('TIS3321', 'Prak. Sistem Operasi', 1),
('TIS4613', 'Perancangan Web', 3),
('TIS5623', 'Komputer Grafis', 3),
('TIS5653', 'Pemograman Web', 3),
('TIS6313', 'Jaringan Komputer 2', 3),
('TIS6321', 'Prak. Jaringan Komputer 2', 1),
('TIS6642', 'Sist. Pendukung Keputusan', 2),
('TIS7312', 'Metodologi Riset', 2),
('TIS7613', 'Aplikasi Multimedia 2', 3),
('TIS8312', 'Kerja Praktek', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nis`, `prestasi`, `keterangan`) VALUES
(1, 2021610001, 'O2SN', 'Juara 2'),
(3, 2020610010, 'Lomba Futsal', 'Juara Umum');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_kls` char(6) NOT NULL,
  `id_walas` char(6) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `ortu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `no_hp`, `id_kls`, `id_walas`, `jk`, `alamat`, `ortu`) VALUES
(2020610001, 'Yuci Aidil Hanabi', '08526578656', 'KLS007', 'W0002', 'Perempuan', 'Kp. Sagit', 'Hengki Orizal'),
(2020610022, 'Husni', '08123456890', 'KLS007', 'W0007', 'Perempuan', 'pariaman', 'fitriani'),
(2020710005, 'Sri Rahayu', '081234907856', 'KLS016', 'W0014', 'Perempuan', 'Pariaman', 'tono putra'),
(2020710006, 'Fitri Mesa', '081234907856', 'KLS018', 'W0015', 'Perempuan', 'Kp. Tangah Barangan', 'Ryan'),
(2020710007, 'Novia Juwita', '081234907856', 'KLS007', 'W0015', 'Perempuan', 'Pariaman', 'Murni'),
(2021610001, 'Arman Putra', '08123456882', 'KLS001', 'W0001', 'Laki-laki', 'Limau Purut', 'Irfan'),
(2021610002, 'Muhammad Arief', '08123457890', 'KLS001', 'W0001', 'Laki-laki', 'Limau Purut', 'Ali Nuwir'),
(2021610003, 'Merry Oktaviani', '08133478650', 'KLS001', 'W0001', 'Perempuan', 'Nareh', 'Aridianis'),
(2021610004, 'Yuli Asni', '08213498656', 'KLS001', 'W0001', 'Perempuan', 'Nareh', 'Bastian'),
(2021610005, 'Merry Andriani', '08133478650', 'KLS001', 'W0001', 'Perempuan', 'Nareh', 'Aridianis'),
(2021610006, 'Marsya Amanda Tanjung', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Limau Purut', 'Jasminar'),
(2021610007, 'Muhammad Arief', '08123456891', 'KLS001', 'W0001', 'Laki-laki', 'Limau Purut', 'Ali Nuwir'),
(2021610008, 'Merry Oktaviani', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Nareh', 'Aridianis'),
(2021610009, 'Jenita Otri Rahayu', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Pariaman', 'Elmi'),
(2021610010, 'Nella Octavia', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Limau Purut', 'Ali samri'),
(2021610011, 'Muhammad Rizky', '08123456891', 'KLS001', 'W0001', 'Laki-laki', 'Limau Purut', 'Ali Nuwar'),
(2021610012, 'Tria Ananta ', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Limau  Purut', 'Anis Mawar'),
(2021610013, 'Marya Nadia Putri', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Palak Juha', 'Maryulis'),
(2021610014, 'Veni Melinda', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Palak Juha', 'Elmi Yanti'),
(2021610015, 'Siva Soraya', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Limau Purut', 'Arniati'),
(2021610016, 'Herry Saputra', '08123456891', 'KLS001', 'W0001', 'Laki-laki', 'Limau Purut', 'Ali Rusdi'),
(2021610017, 'Silvia Wahyuni', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Nareh', 'Amran'),
(2021610018, 'Cintya Permata Sari', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Pariaman', 'Emi'),
(2021610019, 'Arman Maulana', '08123456891', 'KLS001', 'W0001', 'Laki-laki', 'Padang Alai', 'Jafar'),
(2021610020, 'Silvia Dian Sari', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'KP. Sagit', 'Ali Amran'),
(2021610021, 'Pre Juwita', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Palak Juha', 'Yarlina'),
(2021610022, 'Yogi Saputa Ananda', '0812347865', 'KLS001', 'W0001', 'Laki-laki', 'Kudu ', 'Yusnani'),
(2021610023, 'Muhammad Aidil Chandra', '08123456891', 'KLS001', 'W0001', 'Laki-Laki', 'Palak Juha', 'Gusnia'),
(2021610024, 'Arsyad Hafizan', '08123456891', 'KLS001', 'W0001', 'Laki-Laki', 'Limau Purut', 'Hafiz'),
(2021610025, 'Dila Faradila', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Limau Purut', 'Suryani'),
(2021610026, 'Dika Mahendra', '0812347865', 'KLS001', 'W0001', 'Laki-Laki', 'Kudu', 'Sofyan'),
(2021610027, 'Tika Sismonika', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Barangan', 'Afryal Joni'),
(2021610028, 'Yosa Afriska', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Padang Alai', 'Eprizal'),
(2021610029, 'Miftahul Rizqa', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Limau Purut', 'Weni wijaya'),
(2021610030, 'Vira Nilmania', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Limau  Purut', 'Anis '),
(2021610031, 'Widya Devita', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Palak Juha', 'Resita Andriani'),
(2021610032, 'Tuti Citra Dewi', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Palak Juha', 'Zaina'),
(2021610033, 'Nurul Hidayah', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Palah Juha', 'Eli Suryani'),
(2021610034, 'Novelion Bona  Findra', '08123456891', 'KLS001', 'W0001', 'Laki-Laki', 'Palak Juha', 'Zayarni'),
(2021610035, 'Yesi Aprilia', '0812347865', 'KLS001', 'W0001', 'Perempuan', 'Palak Juha', 'Amran'),
(2021610036, 'Cintya Sari', '08123456891', 'KLS001', 'W0001', 'Perempuan', 'Kudu', 'Yanti'),
(2021610037, 'Anisa Faizah Aulia', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Pariaman', 'Anis'),
(2021610038, 'Anisa Fauziah', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Kudu', 'rino'),
(2021610039, 'Asri Suandi', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Lansano', 'Andi'),
(2021610040, 'Asyifa Muhazira', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Pariaman', 'Feranita'),
(2021610041, 'Danil Afryan', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Pariaman', 'Herry'),
(2021610042, 'Deri', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Pariaman', 'Yuli Marnis'),
(2021610043, 'Adinda Fauziah Putriani', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Limau Purut', 'Rina'),
(2021610044, 'Dwita Fitri', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Limau Purut', 'Murni'),
(2021610045, 'Fahdina Ikma', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Koto Marapak', 'Ardina'),
(2021610046, 'A.Fauzi Jamil', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Limau Purut', 'Fadil'),
(2021610047, 'Abel Rayhan Fajri', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Padang Alai', 'Robi Putra'),
(2021610048, 'Ahlal Bait AM', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Limau Purut', 'Siti'),
(2021610049, 'Aidil Fadhli', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Limau Purut', 'Afryanto'),
(2021610050, 'Fahmi Zaini', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Padang Alai', 'Murni'),
(2021610051, 'Akmalia Sopa Putri', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Palak Juha', 'Piani'),
(2021610052, 'Faisal Asril', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Palak Juha', 'Deki Kurnia '),
(2021610053, 'AL Fauzan Salim', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Limau Purut', 'Salim'),
(2021610054, 'Fauzan Hayat', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Pariaman', 'Yanto'),
(2021610055, 'Avifo Anwar', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Limau Purut', 'Rivo Armaja'),
(2021610056, 'Abiyyu Atha Savara', '081234907856', 'KLS002', 'W0002', 'Laki-Laki', 'Lansano', 'Fajar Rahmad'),
(2021610057, 'Agnesia Putri', '081234907856', 'KLS002', 'W0002', 'Perempuan', 'Padang Alai', 'Hendrianto');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `ta` varchar(5) NOT NULL,
  `detail_ta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`ta`, `detail_ta`) VALUES
('20191', 'Ganjil TA 2019/2020'),
('20192', 'Genap TA 2019/2020'),
('20201', 'Ganjil TA 2020/2021'),
('20202', 'Genap TA 2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(4) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `registrasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role_id`, `registrasi`) VALUES
('13', 'r', 'khodori', '62ffcf83abf54e00d844ace606d8026e', 4, '2022-02-15 04:28:16'),
('80', 'r', 'wiwit', '0def2ce58a357f04a796a887ac24319b', 5, '2022-02-15 04:23:32'),
('U001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-02-03 02:46:40'),
('U002', 'Olga Desti Nopita', 'olga', '4826dda6d59daf77f9db6025ca720bf4', 2, '2022-02-13 08:54:57'),
('U003', 'Agmad', 'Sofyan', 'a43ea2f3c29ef3423c48d633d1a1909d', 3, '2022-02-13 08:58:02'),
('U004', 'Otri', 'otri', '16e9e0341d491ff0f2d28170b24647bc', 4, '2022-02-13 08:57:40'),
('U005', 'Fitri', 'fitri', '534a0b7aa872ad1340d0071cbfa38697', 5, '2022-02-13 08:58:21'),
('U006', 'Fitri', 'arif', '534a0b7aa872ad1340d0071cbfa38697', 5, '2022-02-13 08:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'guru bk'),
(3, 'wali kelas'),
(4, 'siswa'),
(5, 'ortu');

-- --------------------------------------------------------

--
-- Table structure for table `walas`
--

CREATE TABLE `walas` (
  `id_walas` char(6) NOT NULL,
  `nip` int(11) NOT NULL,
  `nis` char(12) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walas`
--

INSERT INTO `walas` (`id_walas`, `nip`, `nis`, `tahun`) VALUES
('W0001', 1212121212, '2021610004', 2022),
('W0002', 1212121211, '2021610002', 2022),
('W0003', 1212121219, '2021610001', 2022),
('W0004', 1212121211, '2020610001', 2022),
('W0005', 1212121212, '2019610001', 2022),
('W0006', 1212121213, '2021610005', 2022),
('W0007', 1212121212, '2021610005', 2022),
('W0008', 1212121211, '2021610005', 2022),
('W0009', 1212121219, '2021610005', 2022),
('W0010', 1212121211, '2020610001', 2022),
('W0011', 1212121212, '2019610001', 2022),
('W0012', 1212121213, '2021610005', 2022),
('W0013', 1212121212, '2021610005', 2022),
('W0014', 1212121211, '2021610005', 2022),
('W0015', 1212121219, '2021610005', 2022),
('W0016', 1212121211, '2020610001', 2022),
('W0017', 1212121212, '2019610001', 2022),
('W0018', 1212121213, '2021610005', 2022),
('W0022', 1010101010, '1235611112', 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `bimpel`
--
ALTER TABLE `bimpel`
  ADD PRIMARY KEY (`id_bimpel`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jbimpel`
--
ALTER TABLE `jbimpel`
  ADD PRIMARY KEY (`id_jbimpel`);

--
-- Indexes for table `jenis_bimbingan`
--
ALTER TABLE `jenis_bimbingan`
  ADD PRIMARY KEY (`id_jbim`);

--
-- Indexes for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  ADD PRIMARY KEY (`id_jpel`);

--
-- Indexes for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  ADD PRIMARY KEY (`id_katpel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kls`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`ta`,`nim`,`mk`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`ta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `walas`
--
ALTER TABLE `walas`
  ADD PRIMARY KEY (`id_walas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  MODIFY `id_jpel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
