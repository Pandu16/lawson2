-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 09:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawson`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `serial_number` int(10) NOT NULL,
  `no_tag` int(10) NOT NULL,
  `nama_aset` char(50) NOT NULL,
  `id_tipe` int(3) NOT NULL,
  `merk_aset` char(25) NOT NULL,
  `jenis_aset` char(25) NOT NULL,
  `spesifikasi` text NOT NULL,
  `id_lokasi` varchar(3) NOT NULL,
  `id_ruang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`serial_number`, `no_tag`, `nama_aset`, `id_tipe`, `merk_aset`, `jenis_aset`, `spesifikasi`, `id_lokasi`, `id_ruang`) VALUES
(1000004, 1000004, 'Printer L110', 0, 'Epson', 'Asset Office IT', 'Print scan copy', '5', 1),
(100000000, 100000000, 'Komputer Acer', 0, 'Acer', 'Asset Office IT', 'Processor core i5,\r\nRAM 4GB,\r\nHDD 500GB', '1', 1),
(123456789, 123456789, 'Printer L360', 0, 'Epson', 'Asset Office IT', 'Print', '2', 1),
(987654321, 987654321, 'Monitor', 0, 'Acer', 'Asset Office IT', 'LED, 18 inch', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(10) NOT NULL,
  `nama_lengkap` char(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_lengkap`, `jenis_kelamin`) VALUES
('10.10.10.1', 'Pandu', 'Laki-laki'),
('10.10.10.2', 'Ramadhan', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pengecekan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pengecekan`) VALUES
(1, 35),
(2, 42);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` varchar(3) NOT NULL,
  `nama_lokasi` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
('1', 'Jakarta Pusat'),
('2', 'Jakarta Barat'),
('3', 'Jakarta Selatan'),
('4', 'Tangerang Selatan'),
('5', 'Kabupaten Tangerang'),
('6', 'Kota Tangerang'),
('7', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan`
--

CREATE TABLE `pengecekan` (
  `id_pengecekan` int(11) NOT NULL,
  `serial_number` int(10) NOT NULL,
  `kegiatan` char(50) NOT NULL,
  `id_lokasi` varchar(3) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `tgl_cek` date NOT NULL,
  `kondisi` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengecekan`
--

INSERT INTO `pengecekan` (`id_pengecekan`, `serial_number`, `kegiatan`, `id_lokasi`, `gambar`, `tgl_cek`, `kondisi`) VALUES
(35, 100000000, 'Maintenance', '1', '6154f3317d504.png', '0000-00-00', ''),
(42, 1000004, 'Maintenance', '5', '6155147996f26.png', '2021-09-30', ''),
(58, 123456789, 'Maintenance', '2', '615a5d8b16ee8.png', '2021-10-04', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(3) NOT NULL,
  `nama_ruang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`) VALUES
(1, 'HRD'),
(2, 'Finance'),
(3, 'Marketing'),
(4, 'IT'),
(5, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(3) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`serial_number`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pengecekan` (`id_pengecekan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`),
  ADD KEY `serial_number` (`serial_number`,`id_lokasi`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengecekan`
--
ALTER TABLE `pengecekan`
  MODIFY `id_pengecekan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_pengecekan`) REFERENCES `pengecekan` (`id_pengecekan`);

--
-- Constraints for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD CONSTRAINT `pengecekan_ibfk_1` FOREIGN KEY (`serial_number`) REFERENCES `aset` (`serial_number`),
  ADD CONSTRAINT `pengecekan_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
