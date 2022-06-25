-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 08:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psi`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Kades'),
(3, 'Kriteria'),
(4, 'Alternatif'),
(5, 'Penilaian'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` char(3) NOT NULL,
  `nama_alternatif` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `statuskeluarga` varchar(10) NOT NULL,
  `jmlhtanggungan` int(2) NOT NULL,
  `kondisirumah` varchar(20) NOT NULL,
  `penghasilan` varchar(20) NOT NULL,
  `statusrumah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `alamat`, `pekerjaan`, `statuskeluarga`, `jmlhtanggungan`, `kondisirumah`, `penghasilan`, `statusrumah`) VALUES
(1, 'A01', 'Supriadi', 'Gg. Rukun, No.19', 'Pegawai Swasta', 'pkh', 4, 'batupermanen', '3850000', 'sendiri'),
(2, 'A02', 'Sukarni', 'Gg. Sejahtera, No.9', 'Tidak Bekerja', 'pkh', 5, 'bambuanyam', '2300000', 'sendiri'),
(3, 'A03', 'Budi Soetomo', 'Gg. Jaya, No.14', 'Wiraswasta', 'non', 3, 'batupermanen', '3550000', 'sendiri'),
(4, 'A04', 'Ajeng', 'Simp.Abadi No.117', 'Pegawai Swasta', 'pkh', 4, 'batupermanen', '3211000', 'sewa'),
(5, 'A05', 'Ari Wibowo', 'Jl.Pahlawan Lor.3 No.142', 'PNS', 'non', 2, 'batupermanen', '4675000', 'sendiri'),
(6, 'A06', 'Jumiati', 'Gg. Amal, No.129', 'Wiraswasta', 'pkh', 5, 'batupermanen', '2755000', 'sendiri'),
(7, 'A07', 'Lokot Damanik', 'Gg. Swadaya No. 21          ', 'Pegawai Swasta', 'non', 4, 'batupermanen', '3200000', 'sendiri'),
(8, 'A08', 'Endang', 'Gg. B.O, Lor.5 No.3', 'Wiraswasta', 'pkh', 2, 'batupermanen', '2890000', 'sendiri'),
(9, 'A09', 'Yadi Kusuma', 'Gg. Tani, No.22', 'Pegawai Swasta', 'non', 6, 'papan', '3200000', 'sendiri'),
(10, 'A10', 'Adi Keling', 'Jl. Pahlawan, Lor.2 No.92          ', 'Serabutan', 'pkh', 5, 'papan', '2700000', 'sewa'),
(11, 'A11', 'Supratno', 'Gg. B.O, Lor.2 No.4          ', 'PNS', 'non', 2, 'batupermanen', '4550000', 'sendiri'),
(12, 'A12', 'Syahrul Ramadhan', 'Gg. Sejahtera, No.11', 'PNS', 'non', 2, 'batupermanen', '5200000', 'sendiri'),
(13, 'A13', 'Rizaldi Purnomo', 'Jl. Pahlawan, Lor.5 No.2', 'Tukang Bangunan', 'pkh', 4, 'batupermanen', '2200000', 'sewa'),
(14, 'A14', 'Nugraha Tarigan', 'Gg. Cempaka, Lor. An-nur, No.88', 'PNS', 'non', 1, 'batupermanen', '3920000', 'sendiri'),
(15, 'A15', 'Linggom', 'Gg. Keluarga No.23', 'Wiraswasta', 'pkh', 3, 'papan', '2900000', 'sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` char(3) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL,
  `jenis_kriteria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `jenis_kriteria`) VALUES
(1, 'C01', 'Status Keluarga', 'Benefit'),
(2, 'C02', 'Jumlah Tanggungan', 'Benefit'),
(3, 'C03', 'Kondisi Rumah', 'Cost'),
(4, 'C04', 'Jumlah Penghasilan', 'Cost'),
(5, 'C05', 'Status Kepemilikan Rumah', 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Kades');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `image`, `password`, `role_id`, `date_created`) VALUES
(26, 'KAUR Keuangan', 'admin', 'face-13.jpg', '$2y$10$QQiZCmk8RpYWEptfluzRFOCTq2soO0iNzy3yQMfO4H3HrFtvDvSA.', 1, 1622075498),
(28, 'Kepala Desa', 'kades', 'default.jpg', '$2y$10$h8.C/3vJa4IloocSuabY/.2tY8.xkGWaUkB.52ojl4F1a7Cu/gdUW', 2, 1624783078);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 1, 6),
(12, 2, 4),
(13, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
