-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2024 pada 06.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `bimpel`
--

CREATE TABLE `bimpel` (
  `id_bimpel` int(5) NOT NULL,
  `id_jbimpel` char(10) NOT NULL,
  `id_jpel` int(11) DEFAULT NULL,
  `id_katpel` char(4) DEFAULT NULL,
  `id_jbim` char(6) DEFAULT NULL,
  `NIS` int(10) NOT NULL,
  `NIP` int(10) NOT NULL,
  `tgl_bimpel` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bimpel`
--

INSERT INTO `bimpel` (`id_bimpel`, `id_jbimpel`, `id_jpel`, `id_katpel`, `id_jbim`, `NIS`, `NIP`, `tgl_bimpel`, `keterangan`) VALUES
(1, 'JBP002', 1, 'KP01', NULL, 2020810001, 1967100501, '2024-01-03', 'membersihkan lapangan sekolah'),
(2, 'JBP002', 1, 'KP01', NULL, 2020810001, 1967100501, '2024-01-04', 'berdiri didepan kelas'),
(6, 'JBP001', NULL, NULL, 'JB0001', 2020810001, 1967100501, '2024-01-08', 'teori newton'),
(7, 'JBP001', NULL, NULL, 'JB0001', 2020810006, 1967100501, '2024-02-09', 'penjelasan teori gaya'),
(8, 'JBP001', NULL, NULL, 'JB0001', 2020810001, 1377040802, '2024-02-20', 'penjelasan teori gaya'),
(9, 'JBP001', NULL, NULL, 'JB0001', 2020810001, 1377040802, '2024-01-22', 'penjelasan tentang abrasi'),
(12, 'JBP001', NULL, NULL, 'JB0001', 2020810006, 1377040802, '2024-01-23', 'penjelasan tentang molekul atom'),
(13, 'JBP002', 15, 'KP02', NULL, 2020810001, 1967100501, '2024-01-23', 'hormat bendera'),
(14, 'JBP002', 18, 'KP02', NULL, 2020810003, 1967100501, '2024-01-23', 'memakai kain sarung selama jam pelajaran'),
(15, 'JBP001', NULL, NULL, 'JB0002', 2020810006, 1377040802, '2024-01-23', 'konsultasi tentang pemilihan jurusan untuk kuliah'),
(16, 'JBP002', 1, 'KP01', NULL, 2020810001, 1967100501, '2024-02-07', 'membersihkan kelas'),
(23, 'JBP002', 21, 'KP03', NULL, 2020810001, 1967100501, '2024-02-22', 'pemanggilan orang tua'),
(25, 'JBP002', 13, 'KP03', NULL, 2020810001, 1967100501, '2024-02-22', 'hormat bendera'),
(26, 'JBP001', NULL, NULL, 'JB0002', 2020810001, 1377040802, '2024-03-01', 'konsultasi tentang sepak bola'),
(29, 'JBP001', NULL, NULL, 'JB0002', 2020810001, 1377040802, '2024-03-05', 'Penjelasan tentang pemilihan jurusan untuk kuliah'),
(30, 'JBP002', 23, 'KP03', NULL, 2020810001, 1967100501, '2024-03-04', 'pemanggilan orang tua'),
(31, 'JBP001', NULL, NULL, 'JB0001', 2020810001, 1967100501, '2024-03-01', 'matematika'),
(32, 'JBP001', NULL, NULL, 'JB0001', 2020810002, 1967100501, '2024-01-02', 'Teori Trigonometri'),
(33, 'JBP002', 2, 'KP01', NULL, 2020810007, 1967100501, '2024-02-12', 'Teguran'),
(34, 'JBP002', 2, 'KP01', NULL, 2020810002, 1967100501, '2024-02-12', 'Teguran'),
(35, 'JBP001', NULL, NULL, 'JB0002', 2020810003, 1978092702, '2024-01-16', 'Penetuan Jurusan kuliah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `pengirim` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `nis`, `nip`, `pesan`, `pengirim`, `tanggal`) VALUES
(1, 2020810006, 1967100501, 'halo', 5, '2022-08-23 13:31:29'),
(2, 2020810006, 1967100501, 'haloooo', 5, '2022-08-23 13:31:39'),
(3, 2020810006, 1967100501, 'hello', 39, '2022-08-23 13:32:32'),
(4, 2020810005, 1967100501, 'hai', 0, '2022-08-12 04:34:05'),
(5, 2020810011, 1377147602, 'p', 0, '2022-08-14 07:58:57'),
(6, 2020810011, 1377147602, 'p', 0, '2022-08-14 07:59:03'),
(7, 2020810006, 1967100501, 'hai', 0, '2022-08-12 09:05:43'),
(8, 2020810005, 1967100501, 'hello', 0, '2022-08-12 09:06:02'),
(9, 2020810011, 1377147602, 'p', 0, '2022-08-14 07:58:38'),
(10, 2020810011, 1377147602, 'hai', 0, '2022-08-14 07:58:44'),
(11, 2020810011, 1967100501, 'p', 0, '2022-08-14 07:58:50'),
(12, 2020810001, 1377040802, 'p', 0, '2022-08-14 17:19:33'),
(13, 2020810011, 1967100501, 'p', 0, '2022-08-23 12:42:00'),
(14, 2020810011, 1967100501, 'p', 0, '2022-08-23 12:45:07'),
(15, 2020810011, 1967100501, 'hello', 0, '2022-08-23 13:59:10'),
(16, 2020810006, 1967100501, 'hello ges', 5, '2022-08-23 14:19:15'),
(17, 2020810006, 1967100501, 'malam', 5, '2022-08-23 14:59:39'),
(18, 2020610001, 1978092702, 'siang', 0, '2022-08-23 15:03:48'),
(19, 2020610001, 1978092702, 'siang', 5, '2022-08-23 15:04:15'),
(20, 2020810011, 1967100501, 'malam', 38, '2022-08-23 15:08:14'),
(21, 2020810003, 1978092702, '1', 7, '2024-03-22 05:42:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(10) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `tgl_lahir_g` date DEFAULT NULL,
  `jekel` char(1) NOT NULL,
  `nohp` char(12) DEFAULT NULL,
  `email_g` varchar(100) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `tgl_lahir_g`, `jekel`, `nohp`, `email_g`, `id_jabatan`, `id_status`) VALUES
(1367022302, 'Kasmara Dewi', '1980-10-18', 'P', '081270907688', 'kasmaradewi@gmail.com', 5, 2),
(1372010502, 'Desi Susanti', '1986-01-18', 'P', '081270907624', 'desisusanti@gmail.com', 5, 3),
(1377000302, 'Agra Fanela', '1996-06-11', 'P', '081271657890', 'agrafanela@gmail.com', 5, 2),
(1377015102, 'Weni Mutia', '1989-05-10', 'P', '081370798997', 'wenimutia@gmail.com', 5, 2),
(1377026202, 'Neli Hartati', '1994-09-12', 'P', '082280439077', 'nellihartati@gmail.com', 5, 2),
(1377040501, 'Sofyan syarif', '1980-12-05', 'L', '081270556689', 'sofyansy@gmail.com', 5, 2),
(1377040802, 'Salma', '1980-12-05', 'P', '081270553421', 'salmaicha@gmail.com', 5, 2),
(1377042402, 'Ria Icha', '1984-04-24', 'P', '081274808182', 'riaicha@gmail.com', 5, 2),
(1377051002, 'Rinita', '1992-05-10', 'P', '081370796600', 'rinita@gmail.com', 5, 2),
(1377052702, 'Dilla Zalfitri Nanda', '1992-05-27', 'P', '08138568090', 'dillazalfitrinanda@gmail.com', 5, 2),
(1377086601, 'Azwarman', '1982-07-07', 'L', '085265805966', 'azwarman@gmail.com', 5, 2),
(1377145502, 'Gita yetni', '1993-09-12', 'P', '082280439077', 'gitayetni12@gmail.com', 5, 3),
(1377147602, 'Nuraini', '1985-12-11', 'P', '081271675599', 'nuraini@gmail.com', 5, 2),
(1377148602, 'Nova Firman Sari', '1985-11-11', 'P', '081271675566', 'novafirmansari@gmail.com', 5, 2),
(1377170902, 'Hawariyu Rahmi', '1993-05-19', 'P', '082280438088', 'hawariyurahmi@gmail.com', 5, 2),
(1965110901, 'Drs. Oyong Aziz', '1965-11-09', 'L', '081245678900', 'oyongaziz65@gmail.com', 1, 1),
(1967100501, 'Zulfahmi', '1967-05-10', 'L', '081370798990', 'zulfahmi67@gmail.com', 5, 1),
(1968051002, 'Irna Wati', '1968-05-10', 'P', '081370796678', 'irnawati@gmail.com', 5, 1),
(1968091801, 'Syaiful', '1968-09-18', 'L', '085270658907', 'syaifulbuya@mail.com', 4, 1),
(1970092802, 'Patri Yetni', '1970-09-28', 'P', '085270658654', 'patri@gmail.com', 3, 1),
(1970611302, 'Defri Hayati', '1996-06-11', 'P', '081271657890', 'agrafanela@gmail.com', 5, 1),
(1971090802, 'Dwi Innike VD', '1971-09-08', '', '085270718055', 'innike@gmail.com', 5, 1),
(1972052702, 'Rajulaiti ', '1972-05-27', 'P', '081385678912', 'rajulaiti@gmail.com', 5, 1),
(1972081002, 'Gustina', '1972-08-10', 'P', '081274678856', 'gustina@gmail.com', 5, 1),
(1972122702, 'Endra Kasmawati', '1972-12-27', 'P', '085265808890', 'endrakasmawati@gmail.com', 2, 1),
(1974042402, 'Yusmawati', '1974-04-24', 'P', '081274679091', 'yusmawati@gmail.com', 5, 1),
(1978092702, 'Yuniza', '1978-09-27', 'P', '085265802290', 'yuniza@gmail.com', 5, 1),
(1982122702, 'Elri Eka Gusni', '1982-08-27', 'P', '085265806543', 'elrigusni@gmail.com', 5, 1),
(1985080601, 'Ali Nuzar', '1985-08-06', 'L', '08124578918', 'nuzarali@gmail.com', 5, 1),
(1985080602, 'Kelly Fajri', '1985-08-06', 'P', '08124578918', 'nuzarali@gmail.com', 5, 1),
(1987100502, 'Widya Wati', '1987-05-10', 'P', '081370798990', 'widyawati10@gmail.com', 5, 1),
(1988051002, 'Ike Valencia', '1988-05-10', 'P', '081370796600', 'ike@gmail.com', 5, 1),
(1988081702, 'Desma Juwita', '1968-09-18', 'P', '085270659090', 'desmajuwita@gmail.com', 5, 1),
(1989022202, 'Reni Elvira', '1989-02-22', 'P', '082280203089', 'renielvira@gmail.com', 5, 1),
(1989110902, 'Firda Nengsih', '1989-11-09', 'P', '08124569044', 'firdanengsih@gmail.com', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` char(3) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
('1', 'Kepala Sekolah'),
('2', 'Wakil Kurikulum'),
('3', 'Wakil Sarana dan Prasaran'),
('4', 'Wakil Kesiswaan'),
('5', 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jbimpel`
--

CREATE TABLE `jbimpel` (
  `id_jbimpel` char(10) NOT NULL,
  `kategori_bimpel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jbimpel`
--

INSERT INTO `jbimpel` (`id_jbimpel`, `kategori_bimpel`) VALUES
('JBP001', 'bimbingan'),
('JBP002', 'pelanggaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bimbingan`
--

CREATE TABLE `jenis_bimbingan` (
  `id_jbim` char(10) NOT NULL,
  `kategori_bimbingan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_bimbingan`
--

INSERT INTO `jenis_bimbingan` (`id_jbim`, `kategori_bimbingan`) VALUES
('JB0001', 'Akademik'),
('JB0002', 'Peminatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelanggaran`
--

CREATE TABLE `jenis_pelanggaran` (
  `id_jpel` int(5) NOT NULL,
  `jpel` varchar(100) NOT NULL,
  `id_katpel` char(10) NOT NULL,
  `bobot` int(11) NOT NULL,
  `sanksi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`id_jpel`, `jpel`, `id_katpel`, `bobot`, `sanksi`) VALUES
(1, 'Terlambat masuk sekolah', 'KP01', 5, 'Teguran '),
(2, 'Tanpa Atribut sekolah', 'KP01', 5, 'Teguran'),
(3, 'Tidak bersepatu hitam dan berkaos kaki putih', 'KP01', 5, 'Teguran'),
(4, 'Tidak berpakaian rapi', 'KP01', 5, 'Teguran'),
(5, 'Tidak piket kelas', 'KP01', 5, 'Teguran'),
(6, 'Pemalsuan identitas (pake atribut,kartu atau tanda pengenal sekolah lain )', 'KP01', 10, 'Teguran'),
(7, 'Pakaian dicoret-coret', 'KP01', 10, 'Teguran'),
(8, 'Tidak memakai seragam olahraga pada saat jam pelajaran olahraga', 'KP01', 10, 'Teguran'),
(9, 'Memakai make up dan perhiasan yang berlebihan bagi putri', 'KP01', 10, 'Teguran'),
(10, 'Tidak patuh pada instruksi guru/petugas', 'KP01', 10, 'Teguran'),
(11, 'Tidak mengikuti upacara bendera', 'KP02', 15, 'Teguran'),
(12, 'Pulang sekolah sebelm pelajaran selesai', 'KP02', 15, 'Teguran'),
(13, 'Cabut ketika jam pelajaran', 'KP02', 20, 'Teguran'),
(14, 'Membawa komik,majalah,/novel ', 'KP02', 20, 'Teguran'),
(15, 'Alpha >3 hari tanpa keterangan', 'KP02', 25, 'Teguran'),
(16, 'Membuat keterangan palsu', 'KP02', 25, 'Teguran'),
(17, 'Rambut panjang,Punk,(Laki-Laki)', 'KP02', 30, 'Teguran'),
(18, 'Rok pendek, dirempel bagi perempuan', 'KP02', 30, 'Teguran'),
(19, 'Pelecehan terhadap siswi perempuan', 'KP02', 50, 'Pemanggilan orang tua ke-1'),
(20, 'Merusak fasilitas sekolah', 'KP02', 50, 'Pemanggilan orang tua ke-1'),
(21, 'Pemalsuan nilai dan tanda tangan Kepala sekolah, guru dan staf tata usaha', 'KP02', 100, 'Pemanggilan orang tua Ke-3'),
(22, 'Melawan/menghina/mengejek kepala sekolah, guru, dan staf TU', 'KP03', 125, 'Scorsing 1 (satu) hari'),
(23, 'Meloncat pagar sekolah', 'KP03', 125, 'Scorsing 1 (satu) hari'),
(24, 'Berkelahi/tawuran', 'KP03', 125, 'Scorsing 1 (satu) hari'),
(25, 'Membawa senjata tajam', 'KP03', 125, 'Scorsing 1 (satu) hari'),
(26, 'Mencuri', 'KP03', 125, 'Scorsing 3 (tiga) hari'),
(27, 'perjudian', 'KP03', 150, 'Scorsing 3 (tiga) hari'),
(28, 'Mabuk dan mengajak teman', 'KP03', 150, 'Scorsing 3 (tiga) hari'),
(29, 'Pencemaran nama baik sekolah', 'KP03', 150, 'Scorsing 3 (tiga) hari'),
(30, 'Hamil/menghamili', 'KP03', 200, 'Dikembalikan pada orang tua atau dikeluarkan dari sekolah'),
(31, 'Pemakai / pengedar narkotik', 'KP03', 200, 'Dikembalikan pada orang tua atau dikeluarkan dari sekolah'),
(32, 'meokok', 'KP01', 10, 'teguran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pelanggaran`
--

CREATE TABLE `kategori_pelanggaran` (
  `id_katpel` char(10) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `batas_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_pelanggaran`
--

INSERT INTO `kategori_pelanggaran` (`id_katpel`, `kategori`, `batas_bobot`) VALUES
('KP01', 'Ringan', 5),
('KP02', 'Sedang', 25),
('KP03', 'Berat', 125);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_prestasi`
--

CREATE TABLE `kategori_prestasi` (
  `id_katpres` int(6) NOT NULL,
  `nama_prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_prestasi`
--

INSERT INTO `kategori_prestasi` (`id_katpres`, `nama_prestasi`) VALUES
(1, 'O2SN'),
(2, 'ONMIPA'),
(3, 'Lomba Futsal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kls` char(6) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
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
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(6) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `jekel_ortu` char(1) NOT NULL,
  `tlp_ortu` char(12) NOT NULL,
  `id_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `nama_ortu`, `jekel_ortu`, `tlp_ortu`, `id_pekerjaan`) VALUES
(1, 'Tono \nPutra', 'L', '085280765632', '1'),
(2, 'Hengki Orizal', 'L', '081270354756', '2'),
(3, 'Ali Samri', 'L', '085280765632', '1'),
(4, 'Otri Yanto', 'L', '081270354756', '3'),
(5, 'Agusrini', 'P', '085280765632', '5'),
(6, 'Hengki Orizal', 'L', '081270354756', '2'),
(7, 'Ali Samri', 'L', '085280765632', '1'),
(8, 'Ardianis', 'L', '081270354756', '3'),
(9, 'Jasminar', 'P', '085280765632', '5'),
(10, 'Mona Rahayu', 'P', '081270354756', '5'),
(11, 'Meriza Nitra', 'P', '085280765632', '1'),
(12, 'Zalkhairi', 'P', '081270354756', '2'),
(13, 'Arneti', 'P', '085280765632', '1'),
(14, 'Wiwi Afrina', 'P', '081270354756', '3'),
(15, 'Maysari', 'P', '085280765632', '5'),
(16, 'Yulia Anggraini', 'P', '081270354756', '2'),
(17, 'Anrison', 'P', '085280765632', '1'),
(18, 'kamsuardi', 'L', '081270354756', '3'),
(19, 'Novi Yanti', 'P', '085280765632', '5'),
(20, 'Fitri', 'P', '081270354756', '5'),
(21, 'Fitri Yani', 'P', '081270354756', '5'),
(22, 'Rusman', 'P', '085280765632', '1'),
(23, 'Junaidi', 'P', '081270354756', '2'),
(24, 'Ernawati', 'P', '085280765632', '1'),
(25, 'Fairuza Syukri', 'P', '081270354756', '3'),
(26, 'Fatmaliani', 'P', '085280765632', '5'),
(27, 'Khairat', 'P', '081270354756', '2'),
(28, 'Surya Ningrat', 'P', '085280765632', '1'),
(29, 'Silvia Erina', 'P', '081270354756', '3'),
(30, 'Istajib Jazuli', 'P', '085280765632', '5'),
(31, 'Abdul Rasid', 'P', '081270354756', '5'),
(32, 'Marlini', 'P', '085280765632', '5'),
(33, 'Shaifuwita', 'P', '081270354756', '2'),
(34, 'Agusrini Pratama', 'P', '085280765632', '1'),
(35, 'Intan Permata Sari', 'P', '081270354756', '3'),
(36, 'Mel Pitasari', 'P', '085280765632', '5'),
(37, 'Abdul Rasid', 'P', '081270354756', '5'),
(38, 'Afrinal', 'P', '085280765632', '5'),
(39, 'Arbiah', 'P', '081270354756', '2'),
(40, 'Edi Suherman', 'P', '085280765632', '1'),
(41, 'Yarlina', 'P', '081270354756', '3'),
(42, 'Elfiza', 'P', '085280765632', '5'),
(43, 'Erni Yusnita', 'P', '081270354756', '5'),
(44, 'Irwanto', 'P', '085280765632', '5'),
(45, 'Kartika', 'P', '081270354756', '2'),
(46, 'Lismawati', 'P', '085280765632', '1'),
(47, 'Maria Ulfa', 'P', '081270354756', '3'),
(48, 'Marleni Fitri', 'P', '085280765632', '5'),
(49, 'Khaiiria Husniati', 'P', '081270354756', '5'),
(50, 'Irvan', 'P', '081270354756', '5'),
(51, 'Ulfawati', 'P', '081270354756', '3'),
(52, 'Yarisuni', 'P', '085280765632', '5'),
(53, 'Yeli Nengsih', 'P', '081270354756', '5'),
(54, 'Yurniati', 'P', '085280765632', '5'),
(55, 'Ali Nuwir', 'P', '081270354756', '2'),
(56, 'Rino Isnan', 'P', '085280765632', '1'),
(57, 'Syafril', 'P', '081270354756', '3'),
(58, 'Irawati', 'P', '085280765632', '5'),
(59, 'nurmaini', 'P', '081270354756', '5'),
(60, 'Syamsirman', 'P', '081270354756', '5'),
(61, 'Ikhsanul Hakim', 'P', '081270354756', '3'),
(62, 'Alkhafi', 'P', '085280765632', '5'),
(63, 'kurniawan', 'P', '081270354756', '5'),
(64, 'hanggia Shafitri', 'P', '085280765632', '5'),
(65, 'Haryanto', 'P', '081270354756', '2'),
(66, 'Hawa Heliza', 'P', '085280765632', '1'),
(67, 'Nurhafizah', 'P', '081270354756', '3'),
(68, 'Vivi Usnita', 'P', '085280765632', '5'),
(69, 'Frengki', 'P', '081270354756', '5'),
(70, 'Revalino Oktavian', 'P', '081270354756', '5'),
(71, 'Arya', 'P', '081270354756', '3'),
(72, 'Eriko Putra', 'P', '085280765632', '5'),
(73, 'Habibi Wijaya', 'P', '081270354756', '5'),
(74, 'Arifnal', 'P', '085280765632', '5'),
(75, 'Mufti', 'P', '081270354756', '2'),
(76, 'Wijaya', 'P', '085280765632', '1'),
(77, 'Rezi Alta Pranata', 'P', '081270354756', '3'),
(78, 'Wilmatrona', 'P', '085280765632', '5'),
(79, 'Sarah', 'P', '081270354756', '5'),
(80, 'Maryulis', 'P', '081270354756', '5'),
(81, 'Ade', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan_ortu`
--

CREATE TABLE `pekerjaan_ortu` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_kerja` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pekerjaan_ortu`
--

INSERT INTO `pekerjaan_ortu` (`id_pekerjaan`, `nama_kerja`) VALUES
(1, 'Buruh Tani'),
(2, 'Nelayan'),
(3, 'ABK(Anak Buah Kapal)'),
(4, 'Wiraswasta'),
(5, 'PNS'),
(6, 'ASN'),
(7, 'Karyawan'),
(8, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(2) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_katpres` char(6) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `tahun_p` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nis`, `id_katpres`, `keterangan`, `tahun_p`) VALUES
(1, 2020810006, ' 1 O2S', 'Juara 1 ', '2023-07-19'),
(3, 2020810010, ' 3', 'Juara 3', '2023-05-04'),
(7, 2020810004, ' 2', 'Harapan Umum', '2023-01-06'),
(8, 2020810011, ' 2', 'Harapan Umum', '2023-01-06'),
(9, 2020810001, ' 3', 'Juara 1', '2022-02-18'),
(10, 2020810008, ' 1', '2020', '2022-05-24'),
(11, 2020810004, ' 2', 'Juara 2', '2022-08-02'),
(12, 2020810002, '1', 'Juara 1', '2022-08-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` char(12) NOT NULL,
  `id_kls` char(6) NOT NULL,
  `id_walas` char(6) NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `id_ortu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `email`, `no_hp`, `id_kls`, `id_walas`, `jk`, `alamat`, `id_ortu`) VALUES
(2020810001, 'Herry Saputra', 'Pariaman', '2006-10-20', 'herryputra@gmail.com', '08123456891', 'KLS001', 'W0001', 'L', 'Limau Purut', 1),
(2020810002, 'Silvia Wahyuni', 'Limau Purut', '2006-07-08', 'silviawahyuni@gmai.com', '081234786588', 'KLS001', 'W0001', 'P', 'Nareh', 14),
(2020810003, 'Cintya Permata Sari', 'Palak Juha', '2006-07-07', 'cintyaps@gmail.com', '08123456891', 'KLS001', 'W0001', 'P', 'Pariaman', 5),
(2020810004, 'Pre Juwita', 'Palak Juha', '2006-02-26', 'prejuwita@gmail.com', '081234786553', 'KLS001', 'W0001', 'P', 'Palak Juha', 6),
(2020810005, 'Silvia Dian Sari', 'Santok', '2006-09-12', 'silviasari@gmail.com', '08123456891', 'KLS001', 'W0001', 'P', 'KP. Sagit', 4),
(2020810006, 'Marsya Amanda Tanjung', 'Jakarta', '2007-05-05', 'marsyatanjung05@gmail.com', '08123456891', 'KLS001', 'W0001', 'P', 'Limau Purut', 7),
(2020810007, 'Muhammad Arief', 'Jambi', '2006-08-08', 'muhammadarief@gmail.com', '08123456891', 'KLS001', 'W0001', 'L', 'Pariaman', 8),
(2020810008, 'Nella Octavia', 'Kampung Sagit', '2007-10-10', 'nelaoctavia@gmail.com', '08123456891', 'KLS001', 'W0001', 'P', 'Pariaman', 9),
(2020810009, 'Berliana Erta', 'Jakarta', '2007-01-12', 'berliana@gmail.com', '081234786590', 'KLS001', 'W0001', 'P', 'Pariaman', 10),
(2020810010, 'Jenita Otri Rahayu', 'Jakarta', '2006-10-19', 'jenitaotrirahayu@gmail.com', '08123456891', 'KLS001', 'W0001', 'P', 'Pariaman', 13),
(2020810011, 'Sri Rahayu', 'Padang', '2007-06-12', 'rahayusrin@gmail.com', '081288655301', 'KLS001', 'W0001', 'P', 'Pariaman', 81),
(2021710462, 'Muhammad Rizky', 'Pariaman', '2022-08-01', 'muhammadrizky12@gmail.com', '08123456891', 'KLS002', 'W0002', 'L', 'Limau Purut', 20),
(2021710463, 'Tria Ananta ', 'Kampung Sagit', '2005-07-08', 'trianantaalmi@gmail.com', '0812347865', 'KLS002', 'W0002', 'P', 'Limau  Purut', 15),
(2021710464, 'Yulia Pratiwi', 'Pasaman', '2005-12-11', 'yulia@gmail.com', '0812347865', 'KLS002', 'W0002', 'P', 'Palak Juha', 16),
(2021710465, 'Veni Melinda', 'Jambi', '2005-05-22', 'Venia@gmail.com', '08123456891', 'KLS002', 'W0002', 'P', 'Palak Juha', 17),
(2021710466, 'Siva Soraya', 'Koto Tabang', '2005-09-28', 'sivasr@gamil.com', '08123456891', 'KLS002', 'W0002', 'P', 'Limau Purut', 18),
(2021710467, ' Diana Erna Sofia', 'Simpang Koto Hilalang', '2005-09-09', 'ernasofia@gmai.com', '08123456891', 'KLS002', 'W0002', 'P', 'Limau Purut', 19),
(2021710468, 'Yosalia Afriska', 'Koto tinggi', '2005-09-23', 'yosaliafriska@gmail.com', '0812347865', 'KLS002', 'W0002', 'P', 'Nareh', 20),
(2021710469, 'Siti Nurhaliza', 'Pariaman', '2005-07-12', 'sitinurhaliza@gmail.com', '08123456891', 'KLS002', 'W0002', 'P', 'Pariaman', 21),
(2021710470, 'Zea Rahmatul Khaira', 'Pariaman', '2005-08-12', 'zearkhaira@gmail.com', '0812347865', 'KLS002', 'W0002', 'P', 'Palak Juha', 22),
(2021710471, 'Nurhayati', 'Pariaman', '2007-03-26', 'nurhayati@gmail.com', '08123456891', 'KLS003', 'W0003', 'P', 'KP. Sagit', 56),
(2021710472, 'Siviatul Rosyah', 'sikilir', '2006-09-11', 'siviatulr@gmail.com', '08123456891', 'KLS003', 'W0003', 'P', 'Limau Purut', 30),
(2021710473, 'Arnes Syaputra', 'pariaman', '2007-01-05', 'arnessyahputra@gmail.com', '08123456891', 'KLS003', 'W0003', 'L', 'Limau Purut', 67),
(2021710474, 'Sabrina Zhafira', 'pariaman', '2007-02-27', 'sabrina@gmail.com', '08123456891', 'KLS003', 'W0003', 'P', 'Limau Purut', 70),
(2021710475, 'Merry Oktaviani', 'Jakarta', '2006-01-09', 'merryoktaviani@gmail.com', '0812347865', 'KLS003', 'W0003', 'P', 'Nareh', 27),
(2021710476, 'Ristaya Dwi Anugrah', 'Bisati', '2006-08-10', 'rista@gmail.com', '08123456891', 'KLS003', 'W0003', 'P', 'Pariaman', 0),
(2021710477, 'Yessar Arbid', 'koto baru', '2007-02-05', 'yessar@gmail.com', '08123456891', 'KLS003', 'W0003', 'L', 'Limau Purut', 0),
(2021710478, 'Salsabila Wardah Zaura', 'pariaman', '2007-06-11', 'salsabilawz@gmail.com', '0812347865', 'KLS003', 'W0003', 'P', 'Limau  Purut', 0),
(2021710486, 'Nabila Amelia Saputri', 'Tanjung Pinang', '2007-09-01', 'nabilaamelia@gmail.com', '08123456891', 'KLS004', 'W0004', 'P', 'Pariaman', 49),
(2021710487, 'Muhammad Kalil', 'Kuala Lumpur', '2007-01-30', 'muhammadkalil@gmail.com', '08123456891', 'KLS004', 'W0004', 'L', 'Limau Purut', 56),
(2021710489, 'Khaira Khairunnisa', 'Jakarta', '2007-06-13', 'khairunisa@gmail.com', '0812347865', 'KLS004', 'W0004', 'P', 'Limau  Purut', 39),
(2021710490, 'Muhammad Iswandi', 'pariaman', '2007-10-26', 'miswandi@gmail.com', '0812347865', 'KLS004', 'W0004', 'L', 'Palak Juha', 32),
(2021710491, 'M Ilham Akbar', 'pariaman', '2007-10-20', 'milhamakbar@gmail.com', '08123456891', 'KLS004', 'W0004', 'L', 'Palak Juha', 65),
(2021710497, 'Jefriadi Putra', 'pariaman', '2007-07-13', 'jefri@gmail.com', '08123456891', 'KLS005', 'W0005', 'L', 'KP. Sagit', 50),
(2021710498, 'Ibnu Al Habsy', 'kampung gadang', '2006-10-13', 'ibnu@gmail.com', '08123456891', 'KLS005', 'W0005', 'L', 'Limau Purut', 69),
(2021710499, 'Hanif Maulana', 'pariaman', '2007-03-06', 'hanif@gmail.com', '08123456891', 'KLS005', 'W0005', 'L', 'Limau Purut', 33),
(2021710500, 'Hanna Nurul Adha', 'koto pauh', '2006-12-31', 'hanna@gmail.com', '08123456891', 'KLS005', 'W0005', 'P', 'Limau Purut', 52),
(2021710501, 'Gemfitani Silfiola', 'lohong', '2007-03-06', 'gemfitani@gmail.com', '0812347865', 'KLS005', 'W0005', 'P', 'Nareh', 58),
(2021710507, 'Fauzi Yarahmah', 'marunggi', '2007-12-09', 'fauzi@gmail.com', '08123456891', 'KLS006', 'W0006', 'P', 'Pariaman', 17),
(2021710508, 'Fadhil Indra Fata', 'Rimbo Bujang', '2007-04-04', 'fadhil@gmail.com', '08123456891', 'KLS006', 'W0006', 'L', 'Limau Purut', 19),
(2021710509, 'Alhusnatul Ilmi', 'Cubadak Mentawai', '2007-10-25', 'alhusnatul@gmail.com', '0812347865', 'KLS006', 'W0006', 'P', 'Limau  Purut', 18),
(2021710510, 'Wiyanda Hidayati', 'pariaman', '2007-05-24', 'windya@gmail.com', '0812347865', 'KLS006', 'W0006', 'P', 'Palak Juha', 12),
(2021710511, 'Reva Novia', 'koto marapak', '2007-11-20', 'reva@gmail.com', '08123456891', 'KLS006', 'W0006', 'P', 'Palak Juha', 37),
(2021710512, 'Aulia Rahma Azzahro', 'jambi', '2006-09-28', 'aulia@gmail.com', '08123456891', 'KLS007', 'W0007', 'P', 'Limau Purut', 68),
(2021710513, 'Raqwa Aufa', 'pariaman', '2006-09-09', 'raqwa@gmailcom', '08123456891', 'KLS007', 'W0007', 'L', 'Limau Purut', 70),
(2021710514, 'Aatifa Nadya Shafwah', 'batam', '2007-05-08', 'aatifa@gmail.com', '0812347865', 'KLS007', 'W0007', 'P', 'Nareh', 31),
(2021710515, 'Anisa', 'pekanbaru', '2005-03-15', 'anisa@gmail.com', '08123456891', 'KLS007', 'W0007', 'P', 'Pariaman', 29),
(2021710516, 'Anisa Rahma', 'pauh kamba', '2005-10-12', 'anisarahma@gmail.com', '0812347865', 'KLS007', 'W0007', 'P', 'Palak Juha', 39),
(2021710522, 'Khairunisa', 'pariaman', '2005-06-13', 'khairunisa@gmail.com', '08123456891', 'KLS008', 'W0008', 'P', 'Pariaman', 59),
(2021710523, 'Ajoy Immamul Umar', 'pariaman', '2006-05-28', 'ajoy@gmail.com', '08123456891', 'KLS008', 'W0008', 'L', 'Limau Purut', 60),
(2021710529, 'Jefri Geopani', 'pariaman', '2006-12-07', 'jefrigeopani@gmail.com', '0812347865', 'KLS008', 'W0008', 'L', 'Nareh', 0),
(2021710530, 'M Rafif Alghani ', 'bukittinggi', '2005-08-08', 'mrafifalghani@gmail.com', '08123456891', 'KLS008', 'W0008', 'P', 'Pariaman', 0),
(2021710531, 'Maztalifa', 'pariaman', '2005-07-08', 'maztalifa@gmail.com', '0812347865', 'KLS008', 'W0008', 'P', 'Palak Juha', 0),
(2021710537, 'Anisa Rahmadani', 'kampung dalam', '2007-09-15', 'anisarahmadani@gmail.com', '08123456891', 'KLS009', 'W0009', 'P', 'Pariaman', 10),
(2021710538, 'Ahmad taufik hidayat', 'toboh marunggai', '2006-01-03', 'Ahmadtaufik hidayat@gmail.com', '08123456891', 'KLS009', 'W0009', 'L', 'Limau Purut', 0),
(2021710539, 'Intan Nuryuza', 'pariaman', '2006-11-15', 'intannuryuza@gmail.com', '0812347865', 'KLS009', 'W0009', 'P', 'Nareh', 0),
(2021710540, 'Jamiatul Hasanah', 'pariaman', '2006-02-23', 'jamiatulhasanah@gmail.com', '08123456891', 'KLS009', 'W0009', 'P', 'Pariaman', 0),
(2021710541, 'Putri Azzula', 'lohong', '2006-12-01', 'putriazzula@gmail.com', '0812347865', 'KLS009', 'W0009', 'P', 'Palak Juha', 0),
(2021710547, 'Alya Resdiana Rosa', 'sungai limau', '2006-03-18', 'alyarosa@gmail.com', '08123456891', 'KLS010', 'W0010', 'P', 'Pariaman', 11),
(2021710548, 'Zahra Melanie', 'padang alai', '2007-02-23', 'zahramelanie@gmail.com', '08123456891', 'KLS010', 'W0010', 'P', 'Limau Purut', 0),
(2021710549, 'Balqis Mutia', 'medan', '2007-03-30', 'balqismutia@gmail.com', '08123456891', 'KLS010', 'W0010', 'P', 'Limau Purut', 0),
(2021710550, 'Naufa Fatharani', 'kampung dalam', '2006-10-31', 'naufafatharani@gmail.com', '08123456891', 'KLS010', 'W0010', 'P', 'Limau Purut', 0),
(2021710551, 'Nayla Putri', 'sawahlunto', '2006-10-20', 'naylaputri@gmail.com', '0812347865', 'KLS010', 'W0010', 'P', 'Nareh', 0),
(2021710557, 'Fanesa Asti', 'Limau Purut', '2006-03-27', 'fanesa@gmail.com', '08123456891', 'KLS011', 'W0011', 'P', 'KP. Sagit', 12),
(2021710558, 'Noval Alfarissy', 'pariaman', '2007-05-08', 'novalalfarissy@gmail.com', '08123456891', 'KLS011', 'W0011', 'P', 'Limau Purut', 0),
(2021710559, 'Fitri Elhusni', 'kuta bumi', '2006-10-20', 'fitrielhusni@gmai.com', '08123456891', 'KLS011', 'W0011', 'P', 'Limau Purut', 0),
(2021710560, 'Nurul Zahra', 'cubadak air utara', '2007-01-19', 'nurulzahra@gmail.com', '08123456891', 'KLS011', 'W0011', 'P', 'Limau Purut', 0),
(2021710561, 'Hafna Ilmi Muhalla', 'sungai sirah pilubang', '2006-07-11', 'hafnailmi@gmail.com', '0812347865', 'KLS011', 'W0011', 'P', 'Nareh', 0),
(2021710562, 'Anisa Selfira', 'lansano', '2006-08-13', 'anisaselfira@gmail.com', '08123456891', 'KLS012', 'W0012', 'P', 'Pariaman', 13),
(2021710563, 'Rahmat Naufal', 'pauh kamba', '2006-08-15', 'rahmatnaufal@gmail.com', '08123456891', 'KLS012', 'W0012', 'L', 'Limau Purut', 0),
(2021710564, 'Raissa Athilla Fitqy', 'pariaman', '2007-05-03', 'raissatila@gmail.com', '0812347865', 'KLS012', 'W0012', 'P', 'Nareh', 0),
(2021710565, 'Restu Afryan', 'kampung sagit', '2006-10-07', 'restuafryan@gmail.com', '08123456891', 'KLS012', 'W0012', 'P', 'Pariaman', 0),
(2021710566, 'Ivena Putri', 'koto bangko', '2007-03-06', 'ivenaputri@gmail.com', '0812347865', 'KLS012', 'W0012', 'P', 'Palak Juha', 0),
(2021710569, 'Isel Mawati', 'kallawi', '2006-12-05', 'iselmawati@gmail.com', '08123456891', 'KLS012', 'W0012', 'L', 'Limau Purut', 0),
(2021710570, 'Mona Kencana Rahayu', 'jakarta', '2006-06-05', 'monakencanarahayu@gmail.com', '08123456891', 'KLS012', 'W0012', 'P', 'Limau Purut', 0),
(2021710571, 'Mega Aviva', 'pariaman', '2005-02-17', 'megaaviva@gmail.com', '0812347865', 'KLS012', 'W0012', 'P', 'Nareh', 0),
(2021710578, 'Alya Zahwa', 'padang', '2005-03-17', 'alyazahwa@gmail.com', '08123456891', 'KLS013', 'W0013', 'P', 'Limau Purut', 14),
(2021710579, 'Mhafizh', 'lohong', '2005-06-15', 'mhafizh@gmail.com', '08123456891', 'KLS013', 'W0013', 'L', 'Limau Purut', 0),
(2021710580, 'Fachry Al Aziz', 'pariaman', '2005-09-09', 'fachryalaziz@gmail.com', '08123456891', 'KLS013', 'W0013', 'L', 'Limau Purut', 0),
(2021710581, 'Reva Aulia', 'kampung sagit', '2005-03-27', 'revaulia@gmail.com', '0812347865', 'KLS013', 'W0013', 'P', 'Nareh', 0),
(2021710587, 'Finanda Tri Rasita', 'Pematang Tinggi', '2005-10-17', 'finanda@gmail.com', '08123456891', 'KLS014', 'W0014', 'P', 'KP. Sagit', 15),
(2021710588, 'Rizki Aprilian Putra', 'sikapak', '2005-07-25', 'rizkiaprilianputra@gmail.com', '08123456891', 'KLS014', 'W0014', 'L', 'Pariaman', 0),
(2021710589, 'Salsabila Citra', 'pariaman', '2005-10-20', 'salsabilacitra@gmail.com', '0812347865', 'KLS014', 'W0014', 'P', 'Palak Juha', 0),
(2021710590, 'Nevil Arfyan Putra', 'palak juha', '2005-11-15', 'nevilafryanputra@gmail.com', '08123456891', 'KLS014', 'W0014', 'L', 'KP. Sagit', 0),
(2021710591, 'Rival Atmaja', 'pariaman', '2005-09-09', 'rivalatmaja@gmail.com', '0812347865', 'KLS014', 'W0014', 'L', 'Palak Juha', 0),
(2021710592, 'Arief Syahputra', 'jakarta', '2005-03-27', 'ariefsyahputra@gmail.com', '08123456891', 'KLS013', 'W0013', 'L', 'KP. Sagit', 0),
(2021710598, 'Fitratul Ilmi', 'pariaman', '2006-02-07', 'fitratul@gmail.com', '08123456899', 'KLS015', 'W0015', 'P', 'KP. Sagit', 16),
(2021710599, 'Aldi Muhammad Nur', 'trenggalek', '2005-03-31', 'aldimuhammadnur@gmail.com', '08123456891', 'KLS015', 'W0015', 'L', 'Limau Purut', 0),
(2021715100, 'Alwi Afalah', 'pariaman', '2005-08-29', 'alwiafalah@gmail.com', '08123456891', 'KLS015', 'W0015', 'L', 'Limau Purut', 0),
(2021715101, 'Anjel Febrina', 'toboh marunggai', '2005-06-09', 'anjelfebrina@gmail.com', '08123456891', 'KLS015', 'W0015', 'P', 'Limau Purut', 0),
(2021715102, 'Salma Navisya', 'sikilir', '2005-07-27', 'salmanavisya@gmail.com', '0812347865', 'KLS015', 'W0015', 'P', 'Nareh', 0),
(2021715108, 'Dzikra Assyifa', 'pariaman', '2006-10-31', 'syifa@gmail.com', '08123456891', 'KLS016', 'W0016', 'P', 'Pariaman', 17),
(2021715109, 'Ayuni Syahputri', 'pariaman', '2005-08-07', 'ayunisyahputri@gmail.com', '08123456891', 'KLS016', 'W0016', 'P', 'Pariaman', 0),
(2021715110, 'Yuriko Pratama', 'pariaman', '2005-02-27', 'yurikopratama@gmail.com', '08123456891', 'KLS016', 'W0016', 'L', 'Pariaman', 0),
(2021715111, 'Rehan Wijaya', 'koto tinggi', '2005-12-16', 'rehanwijaya@gmail.com', '08123456891', 'KLS016', 'W0016', 'L', 'Pariaman', 0),
(2021715112, 'Siti Sarah', 'Gasan Kaciak', '2005-11-05', 'sitisarah@gmail.com', '08123456891', 'KLS016', 'W0016', 'P', 'Pariaman', 0),
(2021715117, 'Haviz Rahman Syahlendra', 'kamumuan', '2006-12-17', 'haviz@gmail.com', '08123456891', 'KLS017', 'W0017', 'L', 'Pariaman', 18),
(2021715118, 'Shofia Aina Salsabila', 'gacasan gadang', '2005-05-05', 'shofiasalsabila@gmail.com', '08123456891', 'KLS017', 'W0017', 'P', 'Pariaman', 0),
(2021715119, 'Hafiz Fajrillah', 'limau hantu', '2005-03-11', 'hafizfajrillah@gmail.com', '08123456891', 'KLS017', 'W0017', 'L', 'Pariaman', 0),
(2021715120, 'Reno Febrian', 'rimbo bujang', '2005-02-27', 'renofebrian@gmail.com', '08123456891', 'KLS017', 'W0017', 'L', 'Pariaman', 0),
(2021715121, 'Jesica Olivia Putri', 'gasan kaciak', '2005-11-05', 'jesicaoliviaputri@gmail.com', '08123456891', 'KLS017', 'W0017', 'P', 'Pariaman', 0),
(2021715122, 'Suci Wulan Sari', 'pariaman', '2005-07-21', 'suciwulansari@gmail.cm', '08123456891', 'KLS017', 'W0017', 'P', 'Pariaman', 0),
(2021715128, 'Arismantoni', 'sungai geringging', '2004-11-18', 'aris@gmail.com', '08123456891', 'KLS018', 'W0018', 'L', 'Pariaman', 19),
(2021715129, 'Maisyarah', 'bungo tanjung', '2005-12-09', 'maisyarah@gmail.com', '08123456891', 'KLS018', 'W0018', 'P', 'Pariaman', 0),
(2021715130, 'Nabila Rizqia Afifah', 'rimbo bujang', '2005-08-10', 'nabilarizqiafifah@gmail.com', '08123456891', 'KLS018', 'W0018', 'P', 'Pariaman', 0),
(2021715131, 'Yaser Ilham', 'pariaman', '2005-05-11', 'yaserilham@gmail.com', '08123456891', 'KLS018', 'W0018', 'P', 'Pariaman', 0),
(2021715132, 'Nesya Maharani Utami', 'banten', '2005-05-21', 'nesyamaharaniutami@gmail.com', '08123456891', 'KLS018', 'W0018', 'P', 'Pariaman', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_guru`
--

CREATE TABLE `status_guru` (
  `id_status` int(2) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_guru`
--

INSERT INTO `status_guru` (`id_status`, `status`) VALUES
(1, 'PNS'),
(2, 'Honorer'),
(3, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `nip` int(10) DEFAULT NULL,
  `nis` int(10) DEFAULT NULL,
  `id_ortu` int(10) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `registrasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nip`, `nis`, `id_ortu`, `username`, `password`, `role_id`, `registrasi`, `is_active`) VALUES
(1, 'Gita Yendri', 1377145502, NULL, 0, 'gita', '4cb6903c6f8b22d7f191aff3e137dbef', 1, '2022-08-14 17:01:27', 1),
(2, 'Oyong Aziz', 1965110901, NULL, 0, 'oyong', '92874b1af6ec284b26eed7db7b04f87d', 7, '2024-03-22 02:00:23', 1),
(3, 'Endra Kasmawati', 1972122702, NULL, 0, 'endra', 'e5f35523181f285e31bb6d2538989156', 3, '2024-03-22 01:58:30', 1),
(4, 'Gustina', 1972081002, NULL, 0, 'gustina', 'a152f3ad8a4632fbb04b583c5efada7f', 3, '2022-08-04 05:44:52', 0),
(5, 'Zulfahmi', 1967100501, NULL, 0, 'zulfahmi', '1f261a396ddba4c98d5c17209aecd8b3', 3, '2022-08-13 11:19:25', 1),
(6, 'Patri Yetni', 1970092802, NULL, 0, 'patri', '713c1af9bedb3813e754b22b5a228201', 3, '2022-08-04 05:45:34', 0),
(7, 'Yuniza', 1978092702, NULL, 0, 'yuniza', '3464bbd59feddf040689e5c09c14aa46', 3, '2024-03-22 01:45:55', 1),
(8, 'Yusmawati', 1974042402, NULL, 0, 'yusmawati', '0b784775dd48262246bddadcc4a4553f', 3, '2022-08-04 05:52:50', 0),
(9, 'Irna Wati', 1968051002, NULL, 0, 'irnawati', '1aa53402f7250e7dc2ab836ffe07777d', 3, '2022-08-04 05:53:49', 0),
(10, 'Rajuliati', 1972052702, NULL, 0, 'rajuliati', '3db4372768090a88e9bc210d4d435a84', 3, '2022-08-04 05:54:14', 0),
(11, 'Syaiful', 1968091801, NULL, 0, 'syaiful', 'b6963c5c79188269d9054a7aa4192fe8', 3, '2022-08-04 05:54:44', 0),
(12, 'Reni Elvira', 1989022202, NULL, 0, 'renielvira', '85c729f5e8ec68668977385bd45613e2', 3, '2022-08-04 05:55:23', 0),
(13, 'Ike Valencia', 1988051002, NULL, 0, 'ikevalencia', 'da98183bd728ac415294f4f74175f363', 3, '2022-08-04 05:57:40', 0),
(14, 'Widya Wati', 1987100502, NULL, 0, 'widyawati', '77abb0b805bf8858340f7571943f5bda', 3, '2022-08-04 05:58:53', 0),
(15, 'Ali Nuzar', 1985080601, NULL, 0, 'alinuzar', '36713cb462a2d53f8136a3144e325423', 3, '2022-08-04 05:59:52', 0),
(16, 'Dwi Innike VD', 1971090802, NULL, 0, 'innike', '95e1cf5674caf01eca60a61a2077cab9', 3, '2022-08-04 06:00:45', 0),
(17, 'Elri Eka Gusni', 1982122702, NULL, 0, 'elrieka', '40f8667d2a192c54728e01987992418d', 3, '2022-08-04 06:01:44', 0),
(18, 'Kelly Fajri', 1985080602, NULL, 0, 'kellyfajri', '0d6bbaea301d892d6cab41c6a1baeb09', 3, '2022-08-04 06:02:43', 0),
(19, 'Desma Juwita', 1988081702, NULL, 0, 'Juwita', 'f3973459a8014e56ba4b67c426ec3c6e', 3, '2022-08-04 06:03:13', 0),
(20, 'Firda Nengsih', 1989110902, NULL, 0, 'firda', '5ed291923179b73cbc6ef968b35361ff', 3, '2022-08-04 06:03:27', 0),
(21, 'Kasmara Dewi', 1367022302, NULL, 0, 'kasmara', '02b983d8aab48f7626bbd7c4129d42be', 2, '2024-03-22 04:09:37', 1),
(22, 'Desi Susanti', 1372010502, NULL, 0, 'susanti', 'c3a217b79fe6e611ba9d4c13fdcb0742', 2, '2022-08-04 06:04:38', 0),
(23, 'Agra Fanela', 1377000302, NULL, 0, 'agra', '59c80748f493ceecd0d76b57ebe2de2e', 2, '2022-08-04 06:04:59', 0),
(24, 'Weni Mutia', 1377015102, NULL, 0, 'weni', '65b4deaffc27195de6d25c43e492beaf', 2, '2022-08-04 06:05:23', 0),
(25, 'Nelli Hartati', 1377026202, NULL, 0, 'nelli', 'edf1b35d2bde6bbd04d063fcb79ea56d', 2, '2022-08-04 06:06:04', 0),
(26, 'Sofyan Syarif', 1377040501, NULL, 0, 'sofyan', 'a43ea2f3c29ef3423c48d633d1a1909d', 2, '2022-08-04 06:07:31', 0),
(27, 'Salma', 1377040802, NULL, 0, 'salma', 'f6852b2a3ac0cd7e69c801f69eddb57a', 6, '2022-08-14 16:36:26', 1),
(28, 'Ria Icha', 1377042402, NULL, 0, 'riaicha', '6a49b08a2f3dc68c63e0c8bf8d1dab1e', 2, '2022-08-04 06:08:07', 0),
(29, 'Rinita', 1377051002, NULL, 0, 'rinita', '422c79cfbd4a9e3c84171f8363d567d3', 2, '2022-08-04 06:08:24', 0),
(30, 'Dilla Zalfitri Nanda', 1377052702, NULL, 0, 'zalfitri', '5559bd19491904dd0d8cd275ddcb0da0', 2, '2022-08-04 06:08:38', 0),
(31, 'Azwarman', 1377086601, NULL, 0, 'azwarman', 'ede4d26b688d33f5a923ab484dd071cb', 2, '2022-08-04 06:08:48', 0),
(32, 'Nuraini', 1377147602, NULL, 0, 'nuraini', '6ed07478e416f0e7434ea62cee047e95', 2, '2022-08-14 19:45:32', 1),
(33, 'Nova Firman Sari', 1377148602, NULL, 0, 'nova', '1a9c91f6e0310d4f55b7ee7f22c2c9df', 2, '2022-08-04 06:09:28', 0),
(34, 'Hawariyu Rahmi', 1377170902, NULL, 0, 'hawariyu', 'ac3eec3e9a33f189e77a33a630d3e23b', 2, '2022-08-04 06:09:40', 0),
(35, 'Defri Hayati', 1970611302, NULL, 0, 'hayati', '73e405227c02a626e66f0dc4dd3a53a3', 2, '2022-08-04 06:09:57', 0),
(36, 'Jenita Otri Rahayu', 0, NULL, 0, 'otri', '16e9e0341d491ff0f2d28170b24647bc', 4, '2024-03-22 04:30:13', 1),
(37, 'Tono Putra', 0, NULL, 1, 'tono', '14d2d4119982cd6c68a566e523cb16ae', 5, '2022-08-14 19:51:22', 1),
(38, 'Sri Rahayu', 0, 2020810011, 0, 'srin', 'da68cb4d79a934bc702769b70429cb39', 4, '2024-03-22 01:24:00', 1),
(39, 'Herry Syaputra', 0, 2020810001, 0, 'herry', '673491c1a59d25086ac3c58964dae71a', 4, '2022-08-10 10:37:33', 0),
(40, 'Nurhayati', 0, NULL, 0, 'nurhayati', '601a351d479b5cf47d2b544b27484c71', 4, '2022-08-03 17:37:44', 0),
(41, 'Nabila Amelia Saputri', 0, NULL, 0, 'nabila', '652d3266220e0aacb047d3aa6f51f1b0', 4, '2022-08-03 17:39:48', 0),
(42, 'Jefriadi Putra', 0, NULL, 0, 'jefriadi', '6dbbcbd9b41cfe5f8405be0a8a389b81', 4, '2022-08-03 17:40:59', 0),
(43, 'Ibnu Al Habsy', 0, NULL, 0, 'ibnu', '195ace8d50de761419faf08845304398', 4, '2022-08-03 17:41:55', 0),
(44, 'Fauzi Yarahmah', 0, NULL, 0, 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7', 4, '2022-08-03 17:43:47', 0),
(45, 'Aulia Rahma Azzahro', 0, NULL, 0, 'aulia', '614913bc360cdfd1c56758cb87eb9e8f', 4, '2022-08-03 17:44:42', 0),
(46, 'Khairunisa', 0, NULL, 0, 'khairunisa', '473742eb88bbb2cea04986a157306929', 4, '2022-08-03 17:45:25', 0),
(47, 'Anisa Rahmadani', 0, NULL, 0, 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', 4, '2022-08-03 17:46:30', 0),
(48, 'Alya Resdiana Rosa', 0, NULL, 0, 'alya', '11928ca22a60b25479e3f0799a0a3d5f', 4, '2022-08-03 17:47:46', 0),
(49, 'Fanesa Asti', 0, NULL, 0, 'fanesa ', 'f2544538487700c750e37493566b3018', 4, '2022-08-03 17:48:49', 0),
(50, 'Anisa Selfira', 0, NULL, 0, 'selfira', 'eac02a49e07198305c5ae9289ebbbe21', 4, '2022-08-03 17:50:36', 0),
(51, 'Alya Zahwa', 0, NULL, 0, 'zahwa', 'f89591d47404d65ebd907d58baf484e6', 4, '2022-08-03 17:52:19', 0),
(52, 'Finanda Tri Rasita', 0, NULL, 0, 'finanda', '213776c3acc851f92f6d2d7aad9b8a92', 4, '2022-08-03 17:53:25', 0),
(53, 'Fitratul Ilmi', 0, NULL, 0, 'fitratul', 'ff9a82ca20494c281a1c373e0c3cc347', 4, '2022-08-03 17:54:06', 0),
(54, 'Dzikra Assyifa', 0, NULL, 0, 'dzikra', 'fde92bd0fb5856ee35d3a90c86a16e60', 4, '2022-08-03 17:55:03', 0),
(55, 'Haviz Rahman Syahlendra', 0, NULL, 0, 'haviz', 'c73a38fcc9a0129d536ecde6be396e08', 4, '2022-08-03 17:55:41', 0),
(56, 'Arismantoni', 0, NULL, 0, 'arismantoni', 'fd93ae896908d352f7d5dd668bee0584', 4, '2022-08-03 17:56:50', 0),
(57, 'Silvia Wahyuni', NULL, 2020810002, NULL, 'silvia', 'e5cb7c411f1d9a67f68deff4a954cfbc', 4, '2022-08-10 10:24:48', 0),
(58, 'Cintya Permata Sari', NULL, 2020810003, NULL, 'cintya', 'cff503a0c816e5c9f3b5604ba992b678', 4, '2024-03-22 05:42:15', 1),
(59, 'Pre Juwita', NULL, 2020810004, NULL, 'prejuwita', 'aa4b46ccf495da46a8ffd1a86ef44cec', 4, '2022-08-04 06:12:11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'guru '),
(3, 'wali kelas'),
(4, 'siswa'),
(5, 'ortu'),
(6, 'guru BK'),
(7, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `walas`
--

CREATE TABLE `walas` (
  `id_walas` char(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` int(10) NOT NULL,
  `id_kls` char(6) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `walas`
--

INSERT INTO `walas` (`id_walas`, `id_user`, `nip`, `id_kls`, `tahun`) VALUES
('W0001', 5, 1967100501, 'KLS001', 2022),
('W0002', 0, 1972122702, 'KLS002', 2022),
('W0003', 0, 1972081002, 'KLS003', 2022),
('W0004', 0, 1970092802, 'KLS004', 2022),
('W0005', 0, 1978092702, 'KLS005', 2022),
('W0006', 0, 1974042402, 'KLS006', 2022),
('W0007', 0, 1968051002, 'KLS007', 2022),
('W0008', 0, 1972052702, 'KLS008', 2022),
('W0009', 0, 1968091801, 'KLS009', 2022),
('W0010', 0, 1989022202, 'KLS010', 2022),
('W0011', 0, 1988051002, 'KLS011', 2022),
('W0012', 0, 1987100502, 'KLS012', 2022),
('W0013', 0, 1985080601, 'KLS013', 2022),
('W0014', 0, 1971090802, 'KLS014', 2022),
('W0015', 0, 1982122702, 'KLS015', 2022),
('W0016', 0, 1985080602, 'KLS016', 2022),
('W0017', 0, 1988081702, 'KLS017', 2022),
('W0018', 0, 1989110902, 'KLS018', 2022),
('W0020', 0, 1377145502, 'KLS018', 2022);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimpel`
--
ALTER TABLE `bimpel`
  ADD PRIMARY KEY (`id_bimpel`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jbimpel`
--
ALTER TABLE `jbimpel`
  ADD PRIMARY KEY (`id_jbimpel`);

--
-- Indeks untuk tabel `jenis_bimbingan`
--
ALTER TABLE `jenis_bimbingan`
  ADD PRIMARY KEY (`id_jbim`);

--
-- Indeks untuk tabel `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  ADD PRIMARY KEY (`id_jpel`);

--
-- Indeks untuk tabel `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  ADD PRIMARY KEY (`id_katpel`);

--
-- Indeks untuk tabel `kategori_prestasi`
--
ALTER TABLE `kategori_prestasi`
  ADD PRIMARY KEY (`id_katpres`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kls`);

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indeks untuk tabel `pekerjaan_ortu`
--
ALTER TABLE `pekerjaan_ortu`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `status_guru`
--
ALTER TABLE `status_guru`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `walas`
--
ALTER TABLE `walas`
  ADD PRIMARY KEY (`id_walas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimpel`
--
ALTER TABLE `bimpel`
  MODIFY `id_bimpel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  MODIFY `id_jpel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `kategori_prestasi`
--
ALTER TABLE `kategori_prestasi`
  MODIFY `id_katpres` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan_ortu`
--
ALTER TABLE `pekerjaan_ortu`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `status_guru`
--
ALTER TABLE `status_guru`
  MODIFY `id_status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
