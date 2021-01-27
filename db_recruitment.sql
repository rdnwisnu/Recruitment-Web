-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jan 2021 pada 09.41
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_recruitment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(6) NOT NULL,
  `code_category` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `name_category` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `code_category`, `name_category`) VALUES
(1, 'IT', 'Teknologi Informasi 232'),
(2, 'AccountingS1', 'Accounting S1'),
(8, 'Test', 'das'),
(9, 'OP', 'Operator Produksi'),
(10, 'HRD', 'Human Resorches');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_config`
--

CREATE TABLE `email_config` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `email_config`
--

INSERT INTO `email_config` (`email`, `password`) VALUES
('ptnok4@gmail.com', 'ronal123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_article`
--

CREATE TABLE `job_article` (
  `id_job` int(6) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `contents` text CHARACTER SET utf8,
  `date_from` date DEFAULT NULL,
  `date_thru` date DEFAULT NULL,
  `id_users` int(6) DEFAULT NULL,
  `id_category` int(6) DEFAULT NULL,
  `description` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `job_article`
--

INSERT INTO `job_article` (`id_job`, `title`, `contents`, `date_from`, `date_thru`, `id_users`, `id_category`, `description`) VALUES
(1998, 'Sitem Perancangan Informasi', '<ul><li>S1</li><li>Rekayasa perangakat lunak</li><li>Menguasai laravel</li></ul>', '2020-06-06', '2021-06-12', 2, 1, 'TEST'),
(1999, 'Accounting S1', '<ul><li>S1&nbsp; Accounting</li><li>Woman age 22-30 years</li><li>Smartpoeple</li></ul>', '2020-05-29', '2020-06-06', 2, 2, 'dibutuhkan s1 akutansi kompeten mahir menggunakan zahir dan accurate'),
(2001, 'Operator', '<ul><li>Pria</li><li>Umur Max 23</li><li>Dapat beekrja sama dalam tim</li></ul>', '2020-06-14', '2020-07-01', 15, 1, 'Lowongan operator'),
(2002, 'Operator Produksi', '<ul><li>Melakukan pengecekan mesin secara berkala</li><li>Mengisi Form Laporan Produksi</li></ul>', '2021-01-25', '2021-02-25', 15, 9, 'Minumum SMA/SMK\r\nUsia Maksimal 20 Tahun'),
(2003, 'Assistent Manager HRD', '<ul><li>Maksimal 35-40 Tahun</li><li>Lulusan S1 (Hukum, Psikolog, Lawyer)</li><li>Pengalaman minimal 5 tahun</li></ul>', '2021-01-30', '2021-02-20', 15, 1, 'Melakukan Pendataan Absen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id_message` int(6) NOT NULL,
  `code_message` varchar(30) DEFAULT NULL,
  `content_message` text,
  `title_message` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id_message`, `code_message`, `content_message`, `title_message`) VALUES
(4, 'Message1', '<p><b>TEST</b></p>', 'TEST');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(6) NOT NULL,
  `id_users` int(6) DEFAULT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `jenis_kelamin` int(6) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `no_sim` varchar(50) DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  `agama` int(6) DEFAULT NULL,
  `gol_darah` int(6) DEFAULT NULL,
  `tinggi_badan` int(6) DEFAULT NULL,
  `berat_badan` int(6) DEFAULT NULL,
  `alamat_ktp` varchar(255) DEFAULT NULL,
  `RT_RW` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota_kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `no_handphone` varchar(50) DEFAULT NULL,
  `nama_ibu_kandung` varchar(75) DEFAULT NULL,
  `hubungan_keluarga` int(6) DEFAULT NULL,
  `nama_keluarga` varchar(75) DEFAULT NULL,
  `jenis_kelamin_keluarga` int(6) DEFAULT NULL,
  `alamat_keluarga` varchar(255) DEFAULT NULL,
  `no_telp_keluarga` varchar(50) DEFAULT NULL,
  `institusi_pendidikan` varchar(50) DEFAULT NULL,
  `jenjang_pendidikan` int(6) DEFAULT NULL,
  `fakultas` varchar(40) DEFAULT NULL,
  `jurusan` varchar(40) DEFAULT NULL,
  `akreditasi` int(6) DEFAULT NULL,
  `tahun_masuk` date DEFAULT NULL,
  `tahun_lulus` date DEFAULT NULL,
  `NEM_IPK` varchar(20) DEFAULT NULL,
  `kompetensi` varchar(50) DEFAULT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `industri` varchar(50) DEFAULT '',
  `bagian` varchar(50) DEFAULT NULL,
  `spesialisasi` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `masuk_perusahaan` date DEFAULT NULL,
  `berakhir_perusahaan` date DEFAULT NULL,
  `bersedia_berpergian` int(6) DEFAULT NULL,
  `gaji_diharapkan` int(6) DEFAULT NULL,
  `tanggal_siap_bekerja` date DEFAULT NULL,
  `upload_ktp` varchar(255) DEFAULT NULL,
  `upload_cv` varchar(255) DEFAULT NULL,
  `upload_ijazah` varchar(255) DEFAULT NULL,
  `upload_transkip` varchar(255) DEFAULT NULL,
  `upload_kartu_keluarga` varchar(255) DEFAULT NULL,
  `upload_akte_lahir` varchar(255) DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `personal`
--

INSERT INTO `personal` (`id_personal`, `id_users`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `no_sim`, `status`, `agama`, `gol_darah`, `tinggi_badan`, `berat_badan`, `alamat_ktp`, `RT_RW`, `kelurahan`, `kecamatan`, `kota_kabupaten`, `provinsi`, `kode_pos`, `email`, `no_telepon`, `no_handphone`, `nama_ibu_kandung`, `hubungan_keluarga`, `nama_keluarga`, `jenis_kelamin_keluarga`, `alamat_keluarga`, `no_telp_keluarga`, `institusi_pendidikan`, `jenjang_pendidikan`, `fakultas`, `jurusan`, `akreditasi`, `tahun_masuk`, `tahun_lulus`, `NEM_IPK`, `kompetensi`, `perusahaan`, `industri`, `bagian`, `spesialisasi`, `jabatan`, `masuk_perusahaan`, `berakhir_perusahaan`, `bersedia_berpergian`, `gaji_diharapkan`, `tanggal_siap_bekerja`, `upload_ktp`, `upload_cv`, `upload_ijazah`, `upload_transkip`, `upload_kartu_keluarga`, `upload_akte_lahir`, `foto_diri`) VALUES
(2, 8, 'ARI WIBISONO', 1, 'Bekasi', '2019-06-22', '0038230382823', '003298329398', 1, 1, 3, 170, 100, 'Jl mawar 05 no 27', '005/019', 'Taman Setia Mekar', 'Taman Setia Mekar', 'Bekasi', 'Jawa Barat', '17510', 'anakarland@gmail.com', '082246766573', '082246766573', 'TUTI MUSTIKA NINGSIH', 3, 'TUTI MUSTIKA NINGSIH', 1, 'Jl mawar 05 no 27', '082246766573', 'SMK AL-Muhadjirin', 1, '', 'Rekayasa Perangkat Lunak', 1, '2014-06-01', '2017-06-01', '2', 'komputer', 'PT INVOSA SYSTEMS', 'TEKNOLOGI INFORMASI', 'DEVELOP', '', 'DEVELOP', '2019-06-22', '2020-06-22', 1, 5000000, '2020-05-31', '1a1028bae28943d0e64e828a3646dac6.jpg', 'f9394501fd0d3750be8e028b4c4d2dbe.pdf', 'd1746929e8818884f5681195d75abc26.PNG', 'cca66d049cf93c2981bc3f7a83265233.jpg', '5f5982b465bdbdd2bafcd046d69e3c02.jpg', '30fdc7babdbac9bab5485ff1f86110d7.jpg', '1a1028bae28943d0e64e828a3646dac6.jpg'),
(4, 14, 'Ronal', 1, 'Bekasi', '1998-11-30', '00023232398392', '00038213982932', 1, 1, 2, 170, 70, 'Jl Nusantara no 1', '006/019', 'Aren Jaya', 'Bekasi', NULL, 'Jawa Barat', '15710', 'ronal161@yahoo.com', '082246766573', '08328328', 'Ningish', 2, 'Ningsih', 2, 'Jlan Nusantara', '082328832', NULL, 2, 'BSI cut mutia', 'Manajemen Informasi', 2, '2019-06-01', '2020-05-31', '3,7', '', 'PT NOK', 'Otomotif', 'Gudang', 'Packing', '', '2019-06-01', '2020-05-31', 1, 4000000, '2020-05-31', '8df78395c3f0fda4d760d1a4c98ea804.PNG', '47c4a2154e9147104365a26a60bb8fd5.pdf', '94be466cfaac5c400e08402a53cc2772.PNG', 'c553bbb05f021507ef2cc15b1d0bea0c.PNG', '010a50eaf21a90479be18aa1fbd51f2d.PNG', '7cf678bd3e1a71e46c43adb42623958f.PNG', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `recruitment`
--

CREATE TABLE `recruitment` (
  `id_recruitment` int(6) NOT NULL,
  `id_users` int(6) DEFAULT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `jenis_kelamin` int(32) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `no_sim` varchar(50) DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  `agama` int(6) DEFAULT NULL,
  `gol_darah` int(6) DEFAULT NULL,
  `tinggi_badan` int(6) DEFAULT NULL,
  `berat_badan` int(6) DEFAULT NULL,
  `alamat_ktp` varchar(255) DEFAULT NULL,
  `RT_RW` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota_kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `no_handphone` varchar(50) DEFAULT NULL,
  `nama_ibu_kandung` varchar(50) DEFAULT NULL,
  `hubungan_keluarga` int(6) DEFAULT NULL,
  `nama_keluarga` varchar(50) DEFAULT NULL,
  `jenis_kelamin_keluarga` int(6) DEFAULT NULL,
  `alamat_keluarga` varchar(255) DEFAULT NULL,
  `no_telp_keluarga` varchar(50) DEFAULT NULL,
  `institusi_pendidikan` varchar(50) DEFAULT NULL,
  `jenjang_pendidikan` int(6) DEFAULT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `akreditasi` int(6) DEFAULT NULL,
  `tahun_masuk` date DEFAULT NULL,
  `tahun_lulus` date DEFAULT NULL,
  `NEM_IPK` varchar(20) DEFAULT NULL,
  `kompetensi` varchar(50) DEFAULT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `industri` varchar(50) DEFAULT '',
  `bagian` varchar(50) DEFAULT NULL,
  `spesialisasi` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `masuk_perusahaan` date DEFAULT NULL,
  `berakhir_perusahaan` date DEFAULT NULL,
  `bersedia_berpergian` int(6) DEFAULT NULL,
  `gaji_diharapkan` int(20) DEFAULT NULL,
  `tanggal_siap_bekerja` date DEFAULT NULL,
  `upload_ktp` varchar(255) DEFAULT NULL,
  `upload_cv` varchar(255) DEFAULT NULL,
  `upload_ijazah` varchar(255) DEFAULT NULL,
  `upload_transkip` varchar(255) DEFAULT NULL,
  `upload_kartu_keluarga` varchar(255) DEFAULT NULL,
  `upload_akte_lahir` varchar(255) DEFAULT NULL,
  `status_recruitment` varchar(255) DEFAULT NULL,
  `id_job` int(6) NOT NULL,
  `id_personal` int(6) DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL,
  `kode_bukti` varchar(20) DEFAULT NULL,
  `tanggal_apply` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `recruitment`
--

INSERT INTO `recruitment` (`id_recruitment`, `id_users`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `no_sim`, `status`, `agama`, `gol_darah`, `tinggi_badan`, `berat_badan`, `alamat_ktp`, `RT_RW`, `kelurahan`, `kecamatan`, `kota_kabupaten`, `provinsi`, `kode_pos`, `email`, `no_telepon`, `no_handphone`, `nama_ibu_kandung`, `hubungan_keluarga`, `nama_keluarga`, `jenis_kelamin_keluarga`, `alamat_keluarga`, `no_telp_keluarga`, `institusi_pendidikan`, `jenjang_pendidikan`, `fakultas`, `jurusan`, `akreditasi`, `tahun_masuk`, `tahun_lulus`, `NEM_IPK`, `kompetensi`, `perusahaan`, `industri`, `bagian`, `spesialisasi`, `jabatan`, `masuk_perusahaan`, `berakhir_perusahaan`, `bersedia_berpergian`, `gaji_diharapkan`, `tanggal_siap_bekerja`, `upload_ktp`, `upload_cv`, `upload_ijazah`, `upload_transkip`, `upload_kartu_keluarga`, `upload_akte_lahir`, `status_recruitment`, `id_job`, `id_personal`, `foto_diri`, `kode_bukti`, `tanggal_apply`) VALUES
(7, 8, 'ARI WIBISONO', 1, 'Bekasi', '2019-06-22', '0038230382823', '003298329398', 1, 1, 3, 170, 100, 'Jl mawar 05 no 27', '005/019', 'Taman Setia Mekar', 'Taman Setia Mekar', 'Bekasi', 'Jawa Barat', '17510', 'anakarland@gmail.com', '082246766573', '082246766573', 'TUTI MUSTIKA NINGSIH', 3, 'TUTI MUSTIKA NINGSIH', 1, 'Jl mawar 05 no 27', '082246766573', 'SMK AL-Muhadjirin', 1, '', 'Rekayasa Perangkat Lunak', 1, '2014-06-01', '2017-06-01', '2', 'komputer', 'PT INVOSA SYSTEMS', 'TEKNOLOGI INFORMASI', 'DEVELOP', '', 'DEVELOP', '2019-06-22', '2020-06-22', 1, 5000000, '2020-05-31', '1a1028bae28943d0e64e828a3646dac6.jpg', 'f9394501fd0d3750be8e028b4c4d2dbe.pdf', 'd1746929e8818884f5681195d75abc26.PNG', 'cca66d049cf93c2981bc3f7a83265233.jpg', '5f5982b465bdbdd2bafcd046d69e3c02.jpg', '30fdc7babdbac9bab5485ff1f86110d7.jpg', 'approved', 1998, 2, '1a1028bae28943d0e64e828a3646dac6.jpg', '8f14e45fcee', NULL),
(11, 8, 'ARI WIBISONO', 1, 'Bekasi', '2019-06-22', '0038230382823', '003298329398', 1, 1, 3, 170, 100, 'Jl mawar 05 no 27', '005/019', 'Taman Setia Mekar', 'Taman Setia Mekar', 'Bekasi', 'Jawa Barat', '17510', 'anakarland@gmail.com', '082246766573', '082246766573', 'TUTI MUSTIKA NINGSIH', 3, 'TUTI MUSTIKA NINGSIH', 1, 'Jl mawar 05 no 27', '082246766573', 'SMK AL-Muhadjirin', 1, '', 'Rekayasa Perangkat Lunak', 1, '2014-06-01', '2017-06-01', '2', 'komputer', 'PT INVOSA SYSTEMS', 'TEKNOLOGI INFORMASI', 'DEVELOP', '', 'DEVELOP', '2019-06-22', '2020-06-22', 1, 5000000, '2020-05-31', '1a1028bae28943d0e64e828a3646dac6.jpg', 'f9394501fd0d3750be8e028b4c4d2dbe.pdf', 'd1746929e8818884f5681195d75abc26.PNG', 'cca66d049cf93c2981bc3f7a83265233.jpg', '5f5982b465bdbdd2bafcd046d69e3c02.jpg', '30fdc7babdbac9bab5485ff1f86110d7.jpg', 'approved', 1999, 2, '1a1028bae28943d0e64e828a3646dac6.jpg', '6512bd43d9c', '2020-05-29'),
(12, 14, 'Ronal', 1, 'Bekasi', '1998-11-30', '00023232398392', '00038213982932', 1, 1, 2, 170, 70, 'Jl Nusantara no 1', '006/019', 'Aren Jaya', 'Bekasi', NULL, 'Jawa Barat', '15710', 'ronal161@yahoo.com', '082246766573', '08328328', 'Ningish', 2, 'Ningsih', 2, 'Jlan Nusantara', '082328832', NULL, 2, 'BSI cut mutia', 'Manajemen Informasi', 2, '2019-06-01', '2020-05-31', '3,7', '', 'PT NOK', 'Otomotif', 'Gudang', 'Packing', '', '2019-06-01', '2020-05-31', 1, 4000000, '2020-05-31', '8df78395c3f0fda4d760d1a4c98ea804.PNG', '47c4a2154e9147104365a26a60bb8fd5.pdf', '94be466cfaac5c400e08402a53cc2772.PNG', 'c553bbb05f021507ef2cc15b1d0bea0c.PNG', '010a50eaf21a90479be18aa1fbd51f2d.PNG', '7cf678bd3e1a71e46c43adb42623958f.PNG', 'approved', 1999, 4, NULL, 'c20ad4d76fe', '2020-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `name` varchar(75) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(75) CHARACTER SET utf8 NOT NULL,
  `level` int(1) NOT NULL,
  `id_users` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`name`, `password`, `email`, `level`, `id_users`) VALUES
('ari123', '$2y$10$0w.0I7ePcLj15IByn5Y8b.qVgU98Cd81DbvJsXQE550ah8Q92CIse', 'ariwibisono220699@gmail.com', 1, 15),
('ronal', '$2y$10$LxgPG4jJ7Gee8yZbHI7hmuT.wAL/WS51tpt64tq4Hdxy1qIWM8Sl6', 'ronal161@yahoo.com', 2, 14),
('Raden Wisnu', '$2y$10$GslcDPVHC/P9TjYVkCp/tOumaFncrhMgWddw19Pf1Abtp3/g7zvSW', 'rdnwisnu07@gmail.com', 2, 19),
('Amwal Nasution', '$2y$10$PREpkGnpRpL4AWI35Tu9lOgmkpW82r3E0mrZLbsAL3AeTHd.FIlP6', 'amwal@gmail.com', 2, 18),
('Admin', '$2y$10$IYD.CahnqEOJs54RKzCHmuVCF5jGY44Nzplr4HAMwHKkEKqcEJ1Wm', 'admin@gmail.com', 1, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`) USING BTREE;

--
-- Indexes for table `job_article`
--
ALTER TABLE `job_article`
  ADD PRIMARY KEY (`id_job`) USING BTREE,
  ADD KEY `id_users` (`id_users`) USING BTREE,
  ADD KEY `id_category` (`id_category`) USING BTREE;

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`) USING BTREE;

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`) USING BTREE;

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id_recruitment`) USING BTREE,
  ADD KEY `FK_JobID` (`id_job`) USING BTREE,
  ADD KEY `id_personal` (`id_personal`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_article`
--
ALTER TABLE `job_article`
  MODIFY `id_job` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id_recruitment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
