-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 01:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `master_cook`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas_masak`
--

CREATE TABLE `kelas_masak` (
  `id` int NOT NULL,
  `judul` varchar(60) NOT NULL,
  `ringkasan` text NOT NULL,
  `syarat_dan_ketentuan` text NOT NULL,
  `poster` varchar(100) NOT NULL,
  `pukul` varchar(40) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `kelas_masak`
--

INSERT INTO `kelas_masak` (`id`, `judul`, `ringkasan`, `syarat_dan_ketentuan`, `poster`, `pukul`, `tanggal`, `lokasi`, `harga`, `id_user`) VALUES
(1, 'Menu Sehat ala Chef Arnold', 'Kelas Memasak Sehat dan Praktis adalah solusinya! Yuk join kelas yang mau menjaga pola makan sehat tanpa mengorbankan rasa. Disini kalian akan belajar olahan salad yang penuh banyak varian.', '            1. Pendaftaran: Peserta harus mendaftar dan membayar biaya kelas di muka. Pendaftaran bisa dilakukan secara offline di tempat.\r\n            2. Peserta diharapkan mengenakan pakaian yang nyaman dan sepatu tertutup untuk keamanan. \r\n            3. Semua peralatan dan bahan memasak akan disediakan. Peserta tidak perlu membawa peralatan pribadi.\r\n            ', 'card1.png', '13:50 - 16:10 WIB', '21 Mei 2024', 'Jember Town Square', 160000, 4),
(2, 'Menu Sehat ala Chef Juna', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, voluptatibus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere sint optio illum. Assumenda distinctio explicabo fugit cupiditate quo laudantium ad saepe corrupti nihil tempora ipsum, natus, soluta consequatur nam.', 'card2.png', '15:50 - 17:10 WIB', '22 Mei 2024', 'Jember Town Square', 200000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_kelas`
--

CREATE TABLE `pendaftaran_kelas` (
  `id` int NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_user` int NOT NULL,
  `id_kelas_masak` int NOT NULL,
  `motivasi` text NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `pendaftaran_kelas`
--

INSERT INTO `pendaftaran_kelas` (`id`, `tanggal_daftar`, `id_user`, `id_kelas_masak`, `motivasi`, `alamat`) VALUES
(1, '2024-06-07', 1, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(2, '2024-06-07', 2, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(3, '2024-06-07', 6, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(5, '2024-06-07', 5, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','chef','pengguna','') NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `no_telp`, `password`, `role`, `status`) VALUES
(1, '@pacar_minggyu', 'Elvy Yunia', '085649554149', 'Mas@kY0k!', 'pengguna', 1),
(2, 'pengguna123', 'Pengguna', '085649554141', '123', 'pengguna', 1),
(3, 'admin123', 'Admin', '085649554142', '123', 'admin', 1),
(4, 'chef123', 'Chefs', '085649554143', '123', 'chef', 1),
(5, 'jerry', 'Jerry Sainfeld', '085619554141', '123', 'pengguna', 1),
(6, 'koha', 'Kohaku Sino', '085619554221', '123', 'pengguna', 1),
(7, 'jiro', 'Jiro Shirogane', '085655554221', '123', 'pengguna', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas_masak`
--
ALTER TABLE `kelas_masak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_kelas`
--
ALTER TABLE `pendaftaran_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas_masak` (`id_kelas_masak`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas_masak`
--
ALTER TABLE `kelas_masak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftaran_kelas`
--
ALTER TABLE `pendaftaran_kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran_kelas`
--
ALTER TABLE `pendaftaran_kelas`
  ADD CONSTRAINT `pendaftaran_kelas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pendaftaran_kelas_ibfk_2` FOREIGN KEY (`id_kelas_masak`) REFERENCES `kelas_masak` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
