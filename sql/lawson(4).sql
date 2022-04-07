-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 10:03 PM
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
  `id_aset` int(11) NOT NULL,
  `serial_number` varchar(10) NOT NULL,
  `no_tag` varchar(15) NOT NULL,
  `nama_aset` char(50) NOT NULL,
  `id_tipe` int(3) NOT NULL,
  `merk_aset` char(25) NOT NULL,
  `spesifikasi` text NOT NULL,
  `kd_store` varchar(4) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `kondisi` char(15) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `serial_number`, `no_tag`, `nama_aset`, `id_tipe`, `merk_aset`, `spesifikasi`, `kd_store`, `id_ruang`, `kondisi`, `harga`) VALUES
(1, '3456', 'S/6A01/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik', 3000000),
(2, '3457', 'S/6A01/2', 'Monitor A22', 2, 'Acer', 'LCD', '6A01', 1, 'Baik', 800000),
(3, '3458', 'S/6A01/3', 'Printer Thermal', 3, 'Epson', 'Print', '6A01', 1, 'Baik', 500000),
(4, '3459', 'S/6A01/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik', 3000000),
(5, '3460', 'S/6A01/5', 'Monitor A23', 2, 'Acer', 'LCD', '6A01', 1, 'Baik', 800000),
(6, '3461', 'S/6A01/6', 'Printer Thermal', 3, 'Epson', 'Print', '6A01', 1, 'Baik', 500000),
(7, '3462', 'S/6A01/7', 'Proyektor E1', 4, 'Epson', 'LED', '6A01', 1, 'Baik', 1000000),
(8, '3463', 'S/6A01/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik', 3000000),
(9, '3464', 'S/6A01/9', 'Monitor A23', 2, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik', 800000),
(10, '3465', 'S/6A01/10', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A01', 1, 'Baik', 500000),
(11, '3466', 'S/6A01/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik', 3000000),
(12, '3467', 'S/6A02/1', 'Monitor A24', 2, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik', 800000),
(13, '3468', 'S/6A02/2', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A02', 1, 'Baik', 500000),
(14, '3469', 'S/6A02/3', 'Proyektor E2', 4, 'Epson', 'HDD 1TB', '6A02', 1, 'Baik', 1000000),
(15, '3470', 'S/6A02/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik', 3000000),
(16, '3471', 'S/6A02/5', 'Monitor A24', 2, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik', 800000),
(17, '3472', 'S/6A02/6', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A02', 1, 'Baik', 500000),
(18, '3473', 'S/6A02/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik', 3000000),
(19, '3474', 'S/6A02/8', 'Monitor A25', 2, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik', 800000),
(20, '3475', 'S/6A02/9', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A02', 1, 'Baik', 500000),
(21, '3476', 'S/6A02/10', 'Proyektor E3', 4, 'Epson', 'HDD 1TB', '6A02', 1, 'Baik', 1000000),
(22, '3477', 'S/6A02/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik', 3000000),
(23, '3478', 'S/6A03/1', 'Monitor A25', 2, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 800000),
(24, '3479', 'S/6A03/2', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A03', 1, 'Baik', 500000),
(25, '3480', 'S/6A03/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 3000000),
(26, '3481', 'S/6A03/4', 'Monitor A26', 2, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 800000),
(27, '3482', 'S/6A03/5', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A03', 1, 'Baik', 500000),
(28, '3483', 'S/6A03/6', 'Proyektor E4', 4, 'Epson', 'HDD 1TB', '6A03', 1, 'Baik', 1000000),
(29, '3484', 'S/6A03/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 3000000),
(30, '3485', 'S/6A03/8', 'Monitor A26', 2, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 800000),
(31, '3486', 'S/6A03/9', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A03', 1, 'Baik', 500000),
(32, '3487', 'S/6A03/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 3000000),
(33, '3488', 'S/6A03/11', 'Monitor A27', 2, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik', 800000),
(34, '3489', 'S/6A16/1', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A16', 1, 'Baik', 500000),
(35, '3490', 'S/6A16/2', 'Proyektor E5', 4, 'Epson', 'HDD 1TB', '6A16', 1, 'Baik', 1000000),
(36, '3491', 'S/6A16/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 3000000),
(37, '3492', 'S/6A16/4', 'Monitor A27', 2, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 800000),
(38, '3493', 'S/6A16/5', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A16', 1, 'Baik', 500000),
(39, '3494', 'S/6A16/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 3000000),
(40, '3495', 'S/6A16/7', 'Monitor A28', 2, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 800000),
(41, '3496', 'S/6A16/8', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A16', 1, 'Baik', 500000),
(42, '3497', 'S/6A16/9', 'Proyektor E6', 4, 'Epson', 'HDD 1TB', '6A16', 1, 'Baik', 1000000),
(43, '3498', 'S/6A16/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 3000000),
(44, '3499', 'S/6A16/11', 'Monitor A28', 2, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 800000),
(45, '3500', 'S/6A05/1', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A05', 1, 'Baik', 500000),
(46, '3501', 'S/6A05/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik', 3000000),
(47, '3502', 'S/6A05/3', 'Monitor A29', 2, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik', 800000),
(48, '3503', 'S/6A05/4', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A05', 1, 'Baik', 500000),
(49, '3504', 'S/6A05/5', 'Proyektor E7', 4, 'Epson', 'HDD 1TB', '6A05', 1, 'Baik', 1000000),
(50, '3505', 'S/6A05/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik', 3000000),
(51, '3506', 'S/6A05/7', 'Monitor A29', 2, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik', 800000),
(52, '3507', 'S/6A05/8', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A05', 1, 'Baik', 500000),
(53, '3508', 'S/6A05/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik', 3000000),
(54, '3509', 'S/6A05/10', 'Monitor A30', 2, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik', 800000),
(55, '3510', 'S/6A05/11', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A05', 1, 'Baik', 500000),
(56, '3511', 'S/6A17/1', 'Proyektor E8', 4, 'Epson', 'HDD 1TB', '6A17', 1, 'Baik', 1000000),
(57, '3512', 'S/6A17/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 3000000),
(58, '3513', 'S/6A17/3', 'Monitor A30', 2, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 800000),
(59, '3514', 'S/6A17/4', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A17', 1, 'Baik', 500000),
(60, '3515', 'S/6A17/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 3000000),
(61, '3516', 'S/6A17/6', 'Monitor A31', 2, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 800000),
(62, '3517', 'S/6A17/7', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A17', 1, 'Baik', 500000),
(63, '3518', 'S/6A17/8', 'Proyektor E9', 4, 'Epson', 'HDD 1TB', '6A17', 1, 'Baik', 1000000),
(64, '3519', 'S/6A17/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 3000000),
(65, '3520', 'S/6A17/10', 'Monitor A31', 2, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 800000),
(66, '3521', 'S/6A17/11', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A17', 1, 'Baik', 500000),
(67, '3522', 'S/6A07/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik', 3000000),
(68, '3523', 'S/6A07/2', 'Monitor A32', 2, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik', 800000),
(69, '3524', 'S/6A07/3', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A07', 1, 'Baik', 500000),
(70, '3525', 'S/6A07/4', 'Proyektor E10', 4, 'Epson', 'HDD 1TB', '6A07', 1, 'Baik', 1000000),
(71, '3526', 'S/6A07/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik', 3000000),
(72, '3527', 'S/6A07/6', 'Monitor A32', 2, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik', 800000),
(73, '3528', 'S/6A07/7', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A07', 1, 'Baik', 500000),
(74, '3529', 'S/6A07/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik', 3000000),
(75, '3530', 'S/6A07/9', 'Monitor A33', 2, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik', 800000),
(76, '3531', 'S/6A07/10', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A07', 1, 'Baik', 500000),
(77, '3532', 'S/6A07/11', 'Proyektor E11', 4, 'Epson', 'HDD 1TB', '6A07', 1, 'Baik', 1000000),
(78, '3533', 'S/6A08/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(79, '3534', 'S/6A08/2', 'Monitor A33', 2, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 800000),
(80, '3535', 'S/6A08/3', 'Printer Thermal', 3, 'Epson', 'HDD 1TB', '6A08', 1, 'Baik', 500000),
(81, '3536', 'S/6A08/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(82, '3537', 'S/6A08/5', 'Monitor A34', 2, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 800000),
(83, '3538', 'S/6A08/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(84, '3539', 'S/6A08/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(85, '3540', 'S/6A08/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(86, '3541', 'S/6A08/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(87, '3542', 'S/6A08/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(88, '3543', 'S/6A08/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik', 3000000),
(89, '3544', 'S/6A09/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(90, '3545', 'S/6A09/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(91, '3546', 'S/6A09/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(92, '3547', 'S/6A09/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(93, '3548', 'S/6A09/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(94, '3549', 'S/6A09/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(95, '3550', 'S/6A09/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(96, '3551', 'S/6A09/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(97, '3552', 'S/6A09/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(98, '3553', 'S/6A09/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(99, '3554', 'S/6A09/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik', 3000000),
(100, '3555', 'S/6A10/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(101, '3556', 'S/6A10/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(102, '3557', 'S/6A10/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(103, '3558', 'S/6A10/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(104, '3559', 'S/6A10/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(105, '3560', 'S/6A10/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(106, '3561', 'S/6A10/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(107, '3562', 'S/6A10/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(108, '3563', 'S/6A10/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(109, '3564', 'S/6A10/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(110, '3565', 'S/6A10/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik', 3000000),
(111, '3566', 'S/6A11/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(112, '3567', 'S/6A11/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(113, '3568', 'S/6A11/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(114, '3569', 'S/6A11/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(115, '3570', 'S/6A11/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(116, '3571', 'S/6A11/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(117, '3572', 'S/6A11/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(118, '3573', 'S/6A11/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(119, '3574', 'S/6A11/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(120, '3575', 'S/6A11/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(121, '3576', 'S/6A11/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik', 3000000),
(122, '3577', 'S/6A12/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(123, '3578', 'S/6A12/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(124, '3579', 'S/6A12/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(125, '3580', 'S/6A12/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(126, '3581', 'S/6A12/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(127, '3582', 'S/6A12/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(128, '3583', 'S/6A12/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(129, '3584', 'S/6A12/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(130, '3585', 'S/6A12/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(131, '3586', 'S/6A12/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(132, '3587', 'S/6A12/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik', 3000000),
(133, '3588', 'S/6A13/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(134, '3589', 'S/6A13/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(135, '3590', 'S/6A13/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(136, '3591', 'S/6A13/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(137, '3592', 'S/6A13/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(138, '3593', 'S/6A13/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(139, '3594', 'S/6A13/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(140, '3595', 'S/6A13/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(141, '3596', 'S/6A13/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(142, '3597', 'S/6A13/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(143, '3598', 'S/6A13/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik', 3000000),
(144, '3599', 'S/6A14/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(145, '3600', 'S/6A14/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(146, '3601', 'S/6A14/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(147, '3602', 'S/6A14/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(148, '3603', 'S/6A14/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(149, '3604', 'S/6A14/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(150, '3605', 'S/6A14/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(151, '3606', 'S/6A14/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(152, '3607', 'S/6A14/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(153, '3608', 'S/6A14/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(154, '3609', 'S/6A14/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik', 3000000),
(155, '3610', 'S/6A15/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(156, '3611', 'S/6A15/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(157, '3612', 'S/6A15/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(158, '3613', 'S/6A15/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(159, '3614', 'S/6A15/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(160, '3615', 'S/6A15/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(161, '3616', 'S/6A15/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(162, '3617', 'S/6A15/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(163, '3618', 'S/6A15/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(164, '3619', 'S/6A15/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(165, '3620', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik', 3000000),
(166, '3621', 'S/6A16/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik', 3000000),
(167, '3622', 'S/6A17/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik', 3000000),
(168, '3623', 'S/6A18/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A18', 1, 'Baik', 3000000),
(169, '3624', 'S/6A19/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A19', 1, 'Baik', 3000000),
(170, '3625', 'S/6A20/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A20', 1, 'Baik', 3000000),
(171, '3626', 'S/6A21/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A21', 1, 'Baik', 3000000),
(172, '3627', 'S/6A22/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A22', 1, 'Baik', 3000000),
(173, '3628', 'S/6A23/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A23', 1, 'Baik', 3000000),
(174, '3630', 'S/6A25/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A25', 1, 'Baik', 3000000),
(175, '3631', 'S/6A26/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A26', 1, 'Baik', 3000000),
(176, '3632', 'S/6A27/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A27', 1, 'Baik', 3000000),
(177, '3633', 'S/6A28/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A28', 1, 'Baik', 3000000),
(178, '3634', 'S/6A29/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A29', 1, 'Baik', 3000000),
(179, '3635', 'S/6A30/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A30', 1, 'Baik', 3000000),
(180, '3636', 'S/6A31/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A31', 1, 'Baik', 3000000),
(181, '3637', 'S/6A32/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A32', 1, 'Baik', 3000000),
(182, '3638', 'S/6A33/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A33', 1, 'Baik', 3000000),
(183, '3639', 'S/6A34/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A34', 1, 'Baik', 3000000),
(184, '3640', 'S/6A35/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A35', 1, 'Baik', 3000000),
(185, '3641', 'S/6A36/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A36', 1, 'Baik', 3000000),
(186, '3642', 'S/6A37/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A37', 1, 'Baik', 3000000),
(187, '3643', 'S/6A38/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A38', 1, 'Baik', 3000000),
(188, '3644', 'S/6A39/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A39', 1, 'Baik', 3000000),
(189, '3645', 'S/6A40/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A40', 1, 'Baik', 3000000),
(190, '3646', 'S/6A41/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A41', 1, 'Baik', 3000000),
(191, '3647', 'S/6A42/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A42', 1, 'Baik', 3000000),
(192, '3648', 'S/6A43/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A43', 1, 'Baik', 3000000),
(193, '3649', 'S/6A44/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A44', 1, 'Baik', 3000000),
(194, '3650', 'S/6A45/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A45', 1, 'Baik', 3000000),
(195, '3651', 'S/6A46/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A46', 1, 'Baik', 3000000),
(196, '3652', 'S/6A47/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A47', 1, 'Baik', 3000000),
(197, '3653', 'S/6A48/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A48', 1, 'Baik', 3000000),
(198, '3654', 'S/6A49/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A49', 1, 'Baik', 3000000),
(199, '3655', 'S/6A50/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A50', 1, 'Baik', 3000000),
(200, '3656', 'S/6A51/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A51', 1, 'Baik', 3000000),
(201, '3657', 'S/6A52/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A52', 1, 'Baik', 3000000),
(202, '3658', 'S/6A53/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A53', 1, 'Baik', 3000000),
(203, '3659', 'S/6A54/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A54', 1, 'Baik', 3000000),
(204, '3660', 'S/6A55/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A55', 1, 'Baik', 3000000),
(205, '3661', 'S/6A56/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A56', 1, 'Baik', 3000000),
(206, '3662', 'S/6A57/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A57', 1, 'Baik', 3000000),
(207, '3663', 'S/6A58/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A58', 1, 'Baik', 3000000),
(208, '3664', 'S/6A59/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A59', 1, 'Baik', 3000000),
(209, '3665', 'S/6A60/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A60', 1, 'Baik', 3000000),
(210, '3666', 'S/6A61/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A61', 1, 'Baik', 3000000),
(211, '3667', 'S/6A62/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A62', 1, 'Baik', 3000000),
(212, '3668', 'S/6A63/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A63', 1, 'Baik', 3000000),
(213, '3669', 'S/6A64/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A64', 1, 'Baik', 3000000),
(214, '3670', 'S/6A65/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A65', 1, 'Baik', 3000000),
(215, '3671', 'S/6A66/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A66', 1, 'Baik', 3000000),
(216, '3672', 'S/6A67/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A67', 1, 'Baik', 3000000),
(217, '3673', 'S/6A68/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A68', 1, 'Baik', 3000000),
(218, '3674', 'S/6A69/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A69', 1, 'Baik', 3000000),
(219, '3675', 'S/6A70/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A70', 1, 'Baik', 3000000),
(220, '3676', 'S/6A71/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A71', 1, 'Baik', 3000000),
(221, '3677', 'S/6A72/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A72', 1, 'Baik', 3000000),
(222, '3678', 'S/6A73/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A73', 1, 'Baik', 3000000),
(223, '3679', 'S/6A74/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A74', 1, 'Baik', 3000000),
(224, '3680', 'S/6A75/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A75', 1, 'Baik', 3000000),
(225, '3681', 'S/6A76/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A76', 1, 'Baik', 3000000),
(226, '3682', 'S/6A77/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A77', 1, 'Baik', 3000000),
(227, '3684', 'S/6A79/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A79', 1, 'Baik', 3000000),
(228, '3685', 'S/6A80/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A80', 1, 'Baik', 3000000),
(229, '3686', 'S/6A81/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A81', 1, 'Baik', 3000000),
(230, '3687', 'S/6A82/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A82', 1, 'Baik', 3000000),
(231, '3688', 'S/6A83/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A83', 1, 'Baik', 3000000),
(232, '3689', 'S/6A84/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A84', 1, 'Baik', 3000000),
(234, '1234567890', 'S/6A01/1928/6', 'Monitor Viewsonic VA16', 2, 'Viewsonic', 'LCD', '6A01', 5, 'Baik', 800000),
(235, '0987654321', '0987654321', 'Monitor viewsonic a23', 2, 'Viewsonic', 'LED, 16 Inch', '6A02', 1, 'Baik', 900000),
(236, '7656', '7656', 'Printer L360', 3, 'Epson', 'Print, Scan', '6A01', 1, 'Baik', 500000),
(237, '8888', '8888', 'Printer L110', 3, 'Viewsonic', 'Print, Scan', '6A02', 2, 'Baik', 500000),
(239, '1234512345', 'S/6A01/1928/110', 'Printer L360', 3, 'Epson', 'Print', '6A01', 1, 'Baik', 1000000),
(240, '12341245', 'S/6A01/1928/119', 'Komputer Server', 1, 'Acer', '', '6a01', 0, '', 1000000),
(242, '9876', 'S/6A01/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Rusak', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id_histori` int(11) NOT NULL,
  `sn_lama` varchar(10) NOT NULL,
  `sn_baru` varchar(10) NOT NULL,
  `no_tag_lama` varchar(15) NOT NULL,
  `no_tag_baru` varchar(15) NOT NULL,
  `nama_aset` char(50) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `tgl_histori` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_histori`, `sn_lama`, `sn_baru`, `no_tag_lama`, `no_tag_baru`, `nama_aset`, `alasan`, `nip`, `tgl_histori`, `jam`, `gambar`) VALUES
(74, '123', '12', '123', '12', 'Komputer Client', 'Karena', '10.10.10.1', '2021-11-04', '10:29:51', '618353c9d83e3.png'),
(75, '1010101010', '1212121212', '1010101010', '1212121212', 'Printer L360', 'Karena', '10.10.10.1', '2021-11-04', '11:24:11', '6183607eefcb9.png'),
(76, '12345', '123456', 'S/6A01/192', 'S/6A01/192', 'Komputer Client', 'Karena', '10.10.10.1', '2021-11-04', '15:08:31', '6183953a36e1d.png'),
(77, '12345', '12345', 'S/6A01/1928/2', '12345', 'Komputer Client', 'Tes', '10.10.10.1', '2021-11-08', '13:52:52', '6188c95406269.png'),
(78, '12345', '12345', '12345', 'S/6A01/1928/2', 'Komputer Client', 'Tes', '10.10.10.1', '2021-11-08', '13:53:19', '6188c96ecbbdd.png'),
(79, '123123', '12341234', 'S/6A01/1928/1', 'S/6A01/1928/1', 'Printer Thermal', 'Karena', '10.10.10.1', '2021-11-08', '16:33:47', '6188ef2635881.png'),
(80, '1231231231', '1231231231', 'S/6A10/1928/1', 'S/6A01/1928/3', 'Monitor viewsonic a33', 'Karena', '10.10.10.1', '2021-11-15', '08:59:37', '6191bf443ebf5.png'),
(81, '1231231231', '1231231231', 'S/6A01/1928/3', 'S/6A10/1928/1', 'Monitor viewsonic a33', 'Pergantaian aset dan tag karena', '10.10.10.1', '2021-11-15', '09:40:08', '6191c8ae88acc.png'),
(82, '1234123412', '1234512345', 'S/6A01/1928/110', 'S/6A01/1928/110', 'Printer L360', 'Karena', '10.10.10.1', '2021-11-22', '12:56:58', '619b315440830.png'),
(83, '1234567890', '1234567891', 'S/6A01/1928/5', 'S/6A01/1928/5', 'Monitor Viewsonic VA16', 'Karena', '10.10.10.1', '2021-11-29', '15:09:48', '61a48ae83ddfc.png'),
(84, '1234567891', '1234567890', 'S/6A01/1928/5', 'S/6A01/1928/6', 'Monitor Viewsonic VA16', 'Karena', '10.10.10.1', '2021-11-29', '15:10:25', '61a48b0c7e5c0.png'),
(85, '1231231231', '7656', '1231231231', '7656', 'Printer L360', 'Karena', '10.10.10.1', '2021-12-07', '16:22:00', '61af27cdf3f31.png'),
(86, '1231231232', '8888', '1231231232', '8888', 'Printer L110', '43567', '10.10.10.2', '2022-01-20', '13:49:22', '61e90695b8b24.png');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(10) NOT NULL,
  `nama_lengkap` char(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_lengkap`, `jenis_kelamin`, `email`) VALUES
('10.10.10.1', 'Pandu', 'Laki-Laki', 'hediansyahpandu@gmail.com'),
('10.10.10.2', 'Ramadhan', 'Laki-laki', 'hediansyahpandu@gmail.com'),
('10.10.10.3', 'Andre', 'Laki-laki', 'pandu.hediansyah@raharja.info'),
('10.10.10.4', 'Wendy', 'Laki-laki', ''),
('10.10.10.5', 'Wawan', 'Laki-laki', ''),
('10.10.10.6', 'Wiwin', 'Perempuan', 'hediansyahpandu@gmail.com'),
('100', 'Manajer', 'Laki-Laki', 'pandu.hediansyah@raharja.info');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pengecekan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `pemusnahan`
--

CREATE TABLE `pemusnahan` (
  `id_musnah` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `serial_number` int(10) NOT NULL,
  `no_tag` varchar(15) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `spesifikasi` text NOT NULL,
  `kondisi` char(15) NOT NULL,
  `surat_jalan` varchar(25) NOT NULL,
  `kd_store` varchar(4) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemusnahan`
--

INSERT INTO `pemusnahan` (`id_musnah`, `id_aset`, `nip`, `serial_number`, `no_tag`, `nama_aset`, `spesifikasi`, `kondisi`, `surat_jalan`, `kd_store`, `id_ruang`, `tgl`, `jam`) VALUES
(98, 234, '10.10.10.3', 1234567890, 'S/6A01/1928/6', 'Monitor Viewsonic VA16', 'LCD', 'Baik', '61a492170047e.png', '6A01', 1, '2021-11-29', '15:40:30'),
(99, 66, '10.10.10.1', 3521, 'S/6A17/11', 'Printer Thermal', 'HDD 1TB', 'Rusak', '61dc1156ed09b.png', '6A17', 1, '2022-01-10', '17:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan`
--

CREATE TABLE `pengecekan` (
  `id_pengecekan` int(11) NOT NULL,
  `serial_number` int(10) NOT NULL,
  `no_tag` varchar(15) NOT NULL,
  `nama_aset` char(50) NOT NULL,
  `merk_aset` char(25) NOT NULL,
  `spesifikasi` text NOT NULL,
  `kegiatan` char(50) NOT NULL,
  `kd_store` varchar(4) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `tgl_cek` date NOT NULL,
  `jam_cek` time NOT NULL,
  `kondisi` char(10) NOT NULL,
  `id_tipe` int(3) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengecekan`
--

INSERT INTO `pengecekan` (`id_pengecekan`, `serial_number`, `no_tag`, `nama_aset`, `merk_aset`, `spesifikasi`, `kegiatan`, `kd_store`, `gambar`, `tgl_cek`, `jam_cek`, `kondisi`, `id_tipe`, `id_ruang`, `nip`, `harga`) VALUES
(129, 12345, 'S/6A01/1928/2', 'Komputer Client', 'Acer', 'Proc I3,\r\nHDD 1TB,\r\nRAM 4GB', 'Maintenance', '6A01', '61889a0d19c98.png', '2021-11-08', '10:30:59', 'Rusak', 1, 5, '10.10.10.1', 0),
(131, 123123, 'S/6A01/1928/1', 'Printer Thermal', 'Epson', 'Print', 'Maintenance', '6A01', '6188cb0400ae6.png', '2021-11-08', '13:59:54', 'Baik', 3, 5, '10.10.10.1', 0),
(132, 12345, 'S/6A01/1928/2', 'Komputer Client', 'Acer', 'Proc I3,HDD 1TB,RAM 4GB', 'Tes', '6A01', '6188cc22756ca.png', '2021-11-08', '14:04:46', 'Baik', 1, 5, '10.10.10.1', 0),
(133, 123123, 'S/6A01/1928/1', 'Printer Thermal', 'Epson', 'Print', 'Tes', '6A01', '6188cc36e7b0e.png', '2021-11-08', '14:05:13', 'Baik', 3, 5, '10.10.10.1', 0),
(134, 123123, 'S/6A01/1928/1', 'Printer Thermal', 'Epson', 'Print', 'Tes', '6A01', '6188cc4776cca.png', '2021-11-08', '14:05:32', 'Pilih Kond', 3, 5, '10.10.10.1', 0),
(135, 12345, 'S/6A01/1928/2', 'Komputer Client', 'Acer', 'Proc I3,HDD 1TB,RAM 4GB', 'Tes', '6A01', '6188cc7a387ff.png', '2021-11-08', '14:06:13', 'Baik', 1, 5, '10.10.10.1', 0),
(136, 123123, 'S/6A01/1928/1', 'Printer Thermal', 'Epson', 'Print', 'Tes', '6A01', '6188d00ad2221.png', '2021-11-08', '14:19:07', 'Baik', 3, 5, '10.10.10.1', 0),
(137, 1231231232, 'S/6A10/1928/2', 'Monitor viewsonic a23', 'Viewsonic', 'LED 16 inch', 'Maintenance', '6A10', '6188e1d0a8180.png', '2021-11-08', '15:36:51', 'Rusak', 2, 5, '10.10.10.1', 0),
(138, 1231231231, 'S/6A10/1928/1', 'Monitor viewsonic a33', 'Viewsonic', 'LED 16 inch', 'Maintenance', '6A10', '6188f2755ef3b.png', '2021-11-08', '16:47:42', 'Baik', 2, 5, '10.10.10.1', 0),
(139, 1234567890, 'S/6A01/1928/3', 'Komputer Server', 'Acer', 'Proc I5,\r\nHDD 4TB,\r\nRAM 16GB', 'Maintenance', '6A01', '6191b53b149ff.png', '2021-11-15', '08:17:23', 'Baik', 1, 4, '10.10.10.1', 0),
(140, 1231231231, 'S/6A10/1928/1', 'Monitor viewsonic a33', 'Viewsonic', 'LED 16 inch', 'Maintenance', '6A10', '6191f9c71c8a7.png', '2021-11-15', '13:09:49', 'Baik', 2, 5, '10.10.10.1', 0),
(141, 1231231231, 'S/6A10/1928/1', 'Monitor viewsonic a33', 'Viewsonic', 'LED 16 inch', 'Maintenance', '6A01', '6192288f59b70.png', '2021-11-15', '16:29:34', 'Baik', 2, 5, '10.10.10.1', 0),
(142, 1231231231, 'S/6A10/1928/1', 'Monitor viewsonic a33', 'Viewsonic', 'LED 16 inch', 'Maintenance', '6A01', '61922a55c5673.png', '2021-11-15', '16:37:05', 'Rusak', 2, 5, '10.10.10.1', 0),
(143, 1234567890, 'S/6A01/1928/3', 'Komputer Server', 'Acer', 'Proc I5,\r\nHDD 4TB,\r\nRAM 16GB', 'Maintenance', '6A01', '6195cdc5312c1.png', '2021-11-18', '10:50:50', 'Baik', 1, 4, '10.10.10.1', 0),
(144, 3456, 'S/6A01/1', 'Komputer Client', 'Acer', 'HDD 1TB', 'Maintenance', '6A01', '61960fc15da78.png', '2021-11-18', '15:31:35', 'Baik', 1, 1, '10.10.10.1', 0),
(145, 1234123412, 'S/6A01/1928/110', 'Printer L360', 'Epson', 'Print', 'Maintenance', '6A01', '619b310dde6ce.png', '2021-11-22', '12:37:07', 'Baik', 3, 1, '10.10.10.1', 0),
(146, 1234512345, 'S/6A01/1928/110', 'Printer L360', 'Epson', 'Print', 'Maintenance', '6A01', '619b40f1689fe.png', '2021-11-22', '14:03:40', 'Baik', 3, 1, '10.10.10.1', 1000000),
(147, 1231231232, '1231231232', 'Printer L110', 'Viewsonic', 'Print, Scan', 'Maintenance', '6A02', '61a47ebf37d17.jpg', '2021-11-29', '14:17:21', 'Baik', 3, 2, '10.10.10.1', 500000),
(149, 1234512345, 'S/6A01/1928/110', 'Printer L360', 'Epson', 'Print', 'Checking', '6A01', '61a88e5c95814.jpeg', '2021-12-02', '16:13:43', 'Baik', 3, 1, '10.10.10.1', 1000000),
(150, 1234512345, 'S/6A01/1928/110', 'Printer L360', 'Epson', 'Print', 'Maintenance`', '6A01', '61b1971714cc6.png', '2021-12-09', '12:41:06', 'Baik', 3, 1, '10.10.10.1', 1000000),
(151, 1234567890, 'S/6A01/1928/6', 'Monitor Viewsonic VA16', 'Viewsonic', 'LCD', 'Maintenance', '6A01', '61e8d2195bf37.png', '2022-01-20', '10:06:55', 'Baik', 2, 1, '10.10.10.1', 800000),
(152, 1234567890, 'S/6A01/1928/6', 'Monitor Viewsonic VA16', 'Viewsonic', 'LCD', 'Maintenance', '6A01', '61e8e71ec71b5.png', '2022-01-20', '11:37:10', 'Baik', 2, 5, '10.10.10.1', 800000),
(153, 1234512345, 'S/6A01/1928/110', 'Printer L360', 'Epson', 'Print', 'Maintenance', '6A01', '61e9055f7b218.png', '2022-01-20', '13:45:39', 'Baik', 3, 1, '10.10.10.2', 1000000);

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
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `KD_STORE` varchar(4) NOT NULL,
  `KD_REGION` char(3) NOT NULL,
  `KD_BRANCH` char(4) NOT NULL,
  `NAMA_STORE` varchar(50) NOT NULL,
  `ALIAS` char(4) NOT NULL,
  `ALAMAT1` varchar(50) NOT NULL,
  `ALAMAT2` varchar(50) NOT NULL,
  `ALAMAT3` varchar(20) NOT NULL,
  `KODE_POS` int(5) NOT NULL,
  `TELP` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`KD_STORE`, `KD_REGION`, `KD_BRANCH`, `NAMA_STORE`, `ALIAS`, `ALAMAT1`, `ALAMAT2`, `ALAMAT3`, `KODE_POS`, `TELP`) VALUES
('6A01', 'JBK', '6A00', 'AKSES UI[ASI]', 'ASI', 'JL. AKSES UI KELAPA', 'TUGU - CIMANGGIS', 'DEPOK', 16951, '816712628'),
('6A02', 'JBK', '6A00', 'RAYA PRAMUKA[RPA]', 'RPA', 'JL. PRAMUKA NO. C22', '', 'JAKARTA PUSAT', 0, '81380789824'),
('6A03', 'JBK', '6A00', 'MERUYA SELATAN[MSL]', 'MSL', 'JL. MERUYA SELATAN R', '', 'JAKARTA BARAT', 0, ''),
('6A05', 'JBK', '6A00', 'BUNDA MULIA[BNM]', 'BNM', 'JL. LODAN NO. 02 (LO', 'ANCOL - PADEMANGAN', 'JAKARTA UTARA', 14430, '81380789885'),
('6A07', 'JBK', '6A00', 'REST AREA KM. 57[KM57]', 'KM57', 'JL. TOL JAKARTA - CI', 'GINTUNG KERTA - KLAR', 'JAWA BARAT', 41371, '81380790151'),
('6A08', 'JBK', '6A00', 'RAYA CIPETE[RCE]', 'RCE', 'JL. RAYA CIPETE NO.', 'CIPETE SELATAN - CIL', 'JAKARTA SELATAN', 12410, '81511205029'),
('6A09', 'JBK', '6A00', 'MANGGA BESAR RAYA[MBR]', 'MBR', 'JL. MANGGA BESAR RAY', 'MANGGA BESAR - TAMAN', 'JAKARTA BARAT', 11180, '81380789884'),
('6A10', 'JBK', '6A00', 'TANGERANG CITY[TRC]', 'TRC', 'RUKO BUSINESS PARK T', 'BABAKAN - TANGERANG', 'TANGERANG', 15117, '81380789973'),
('6A11', 'JBK', '6A00', 'REST AREA KM. 42[RE42]', 'RE42', 'TOL JAKARTA - CIKAMP', 'WANASARI-TELUK JAMBE', 'KAB. KARAWANG', 41361, '81380790117'),
('6A12', 'JBK', '6A00', 'REST AREA KM. 39[RE39]', 'RE39', 'TOL JAKARTA - CIKAMP', 'PASIR TANJUNG - CIKA', 'BEKASI', 41371, '81380790145'),
('6A13', 'JBK', '6A00', 'PERCETAKAN NEGARA[PNG]', 'PNG', 'JL. PERCETAKAN NEGAR', 'RAWASARI - CEMPAKA P', 'JAKARTA PUSAT', 10570, '81511114984'),
('6A14', 'JBK', '6A00', 'SEKOLAH BUNDA MULIA[SBL]', 'SBL', 'JL. AM SANGAJI RAYA', 'PETOJO UTARA - GAMBI', 'JAKARTA PUSAT', 10130, '81380789875'),
('6A15', 'JBK', '6A00', 'SINGARAJA[SRJ]', 'SRJ', 'JL. SINGARAJA  RUKO', 'CIBATU - CIKARANG', 'BEKASI', 17550, '81380789942'),
('6A16', 'JBK', '6A00', 'DR. SATRIO[DSR]', 'DSR', 'JL. PROF.DR. SATRIO', 'KARET KUNINGAN - SET', 'JAKARTA SELATAN', 12940, '81380789815'),
('6A17', 'JBK', '6A00', 'TAMAN MALAKA SELATAN[TML]', 'TML', 'JL. TAMAN MALAKA SEL', 'DUREN SAWIT - PONDOK', 'JAKARTA TIMUR', 13450, '8158276955'),
('6A18', 'JBK', '6A00', 'RUKO VIENNA[RVN]', 'RVN', 'KELAPA DUA BLOK A 1', 'KELAPA DUA - KELAPA', 'KAB. TANGERANG', 15325, '81380789967'),
('6A19', 'JBK', '6A00', 'PERMATA KARAWACI[PKI]', 'PKI', 'JL. PERMATASARI LIPP', 'BINONG - CURUG', 'KAB. TANGERANG', 15810, '81380789964'),
('6A20', 'JBK', '6A00', 'RAYA PAMULANG[RPL]', 'RPL', 'JL. RAYA PAMULANG PE', 'PAMULANG BARAT - PAM', 'TANGERANG SELATAN', 15417, '81380789963'),
('6A21', 'JBK', '6A00', 'BENDUNGAN WALAHAR[BWL]', 'BWL', 'JL. BENDUNGAN WALAHA', 'BENDUNGAN HILIR - TA', 'JAKARTA PUSAT', 10210, '81380790024'),
('6A22', 'JBK', '6A00', 'KOTA WISATA[KTW]', 'KTW', 'RUKO CONCORDILA BLOK', 'CIANGSANA - GUNUNG P', 'KAB. BOGOR', 16968, '81380790074'),
('6A23', 'JBK', '6A00', 'SYAHDAN[SYN]', 'SYN', 'JL. KH. SYAHDAN GG H', 'PALMERAH PALMERAH', 'JAKARTA BARAT', 11480, '81585130585'),
('6A25', 'JBK', '6A00', 'EQUITY TOWER[ETW]', 'ETW', 'JL. SUDIRMAN KOMP. N', 'SENAYAN - KEBAYORAN', 'JAKARTA SELATAN', 12190, '81380789918'),
('6A26', 'JBK', '6A00', 'SARINAH[SNH]', 'SNH', ' JL. M.H. THAMRIN NO', 'GONDANGDIA - MENTENG', 'JAKARTA PUSAT', 10350, '81380789862'),
('6A27', 'JBK', '6A00', 'MID PLAZA[MPZ]', 'MPZ', 'JL. JEND. SUDIRMAN K', 'KARET TENGSIN - TANA', 'JAKARTA PUSAT', 10220, '81380789981'),
('6A28', 'JBK', '6A00', 'GRAHA MANDIRI[GMN]', 'GMN', 'JL. IMAM BONJOL NO.', 'MENTENG - MENTENG', 'JAKARTA PUSAT', 10310, '81380789860'),
('6A29', 'JBK', '6A00', 'RAWA BELONG[RBL]', 'RBL', 'JL. RAWA BELONG RAYA', 'SUKABUMI UTARA - KEB', 'JAKARTA BARAT', 11540, '81584453491'),
('6A30', 'JBK', '6A00', 'SENTRAL SENAYAN II[SLS]', 'SLS', 'BASEMENT FLOOR, SENT', 'GELORA BUNG KARNO -', 'JAKARTA PUSAT', 10270, '81380789917'),
('6A31', 'JBK', '6A00', 'BTPN TOWER[BTR]', 'BTR', 'JL. DR. IDE ANAK AGU', 'KUNINGAN TIMUR', 'JAKARTA SELATAN', 12950, '81380789811'),
('6A32', 'JBK', '6A00', 'MITSUBISHI (MMKI)[MBI]', 'MBI', 'GREENLAND INTERNATIO', 'PASIRANJI - CIKARANG', 'BEKASI', 17812, '81380790094'),
('6A33', 'JBK', '6A00', 'REST AREA KM 10[RE10]', 'RE10', 'JL. TOLL JAGORAWI KM', 'CIPAYUNG - CIPAYUNG', 'JAKARTA TIMUR', 13840, '85880132614'),
('6A34', 'JBK', '6A00', 'STASIUN MANGGARAI[STM]', 'STM', 'PINTU MASUK STASIUN', 'MANGGARAI - TEBET', 'JAKARTA SELATAN', 12850, '85880132610'),
('6A35', 'JBK', '6A00', 'STASIUN SUDIRMAN[STD]', 'STD', 'PINTU STASIUN SUDIRM', 'MENTENG - MENTENG', 'JAKARTA SELATAN', 10310, '81380789980'),
('6A36', 'JBK', '6A00', 'STASIUN SENEN[STN]', 'STN', 'JL. STASIUN SENEN NO', 'SENEN-SENEN', 'JAKARTA PUSAT', 10410, '81380789849'),
('6A37', 'JBK', '6A00', 'UBM TOWER ALAMSUTERA[UMT]', 'UMT', 'GROUND FLOOR (GF) OF', 'PANUNGGANGAN TIMUR -', 'KOTA TANGERANG', 15143, '81380789951'),
('6A38', 'JBK', '6A00', 'REST AREA KM 43[RE43]', 'RE43', 'JL TOLL TANGERANG ?', 'SUKAMURNI - BALARAJA', 'KAB. TANGERANG', 15610, '81380789816'),
('6A39', 'JBK', '6A00', 'GRAHA TAMIYA[GTA]', 'GTA', 'JL. SCIENTIA BOULEVA', 'CURUGSANGERENG - KEL', 'KAB. TANGERANG', 15811, '81380789574'),
('6A40', 'JBK', '6A00', 'RUKO VERSAILLES[RVS]', 'RVS', 'RUKO VERSAILLES SEKT', 'RAWA BUNTU - SERPONG', 'TANGERANG SELATAN', 15318, '81380789547'),
('6A41', 'JBK', '6A00', 'REST AREA KM 6 B[RE6]', 'RE6', 'JL TOLL JAKARTA BEKA', 'JATIBENING BARU - PO', 'KOTA BEKASI', 17412, '81380799352'),
('6A42', 'JBK', '6A00', 'PGC[PGC]', 'PGC', 'JL. MAYJEN SUTOYO NO', 'CILILITAN - KRAMAT J', 'JAKARTA TIMUR', 13640, '81380789483'),
('6A43', 'JBK', '6A00', 'GRAHA SUCOFINDO[GSO]', 'GSO', 'JL. RAYA PASAR MINGG', 'PANCORAN - PANCORAN', 'JAKARTA SELATAN', 12780, '81380789253'),
('6A44', 'JBK', '6A00', 'REST AREA KM 72A[RE72]', 'RE72', 'REST AREA KM 72A TOL', 'DESA CIGELAM KEC BAB', 'KAB PURWAKARTA', 41151, '81315477772'),
('6A45', 'JBK', '6A00', 'MRT FATMAWATI[FTM]', 'FTM', 'JL.R.A.KARTINI RT 8/', 'CILANDAK BARAT, CILA', 'JAKARTA SELATAN', 12430, '81315477878'),
('6A46', 'JBK', '6A00', 'MRT SENAYAN[SNY]', 'SNY', 'JL. JEND. SUDIRMAN R', 'KEL SENAYAN, KEC KEB', 'DKI JAKARTA', 12190, '81315477900'),
('6A47', 'JBK', '6A00', 'SCK PERCETAKAN[SPN]', 'SPN', 'JL. PERCETAKAN NEGAR', ' KELURAHAN RAWASARI,', 'JAKARTA PUSAT', 10570, '0'),
('6A48', 'JBK', '6A00', 'MENARA ASTRA[MAA]', 'MAA', 'JL. JENDRAL SUDIRMAN', 'KARET TENGSIN, TANAH', 'JAKARTA PUSAT', 10220, '81315477781'),
('6A49', 'JBK', '6A00', 'SYAHDAN 2[SYN2]', 'SYN2', 'JL. K.H. SYAHDAN NO.', 'KEL PALMERAH, KEC PA', 'JAKARTA BARAT', 11480, '81219221751'),
('6A50', 'JBK', '6A00', 'UIN KERTAMUKTI[UKI]', 'UKI', 'JL. RAYA KERTAMUKTI', 'KEL. PISANGAN KEC. C', 'TANGERANG SELATAN', 15419, '81219221752'),
('6A51', 'JBK', '6A00', 'STASIUN GAMBIR[SGR]', 'SGR', 'PINTU UTARA, JL. MED', 'GAMBIR - GAMBIR', 'JAKARTA PUSAT', 10110, '81219221753'),
('6A52', 'JBK', '6A00', 'KEBON KACANG[KKG]', 'KKG', '', 'JL. KEBON KACANG 30', 'KEL. KEBON KACANG KE', 0, '10240'),
('6A53', 'JBK', '6A00', 'CEMPAKA MAS[CMS]', 'CMS', 'JAKARTA PUSAT', 'GRAHA CEMPAKA MAS, J', 'KEL. SUMUR BATU KEC.', 0, '10640'),
('6A54', 'JBK', '6A00', 'AEROPOLIS [APS]', 'APS', 'KOTA TANGERANG', 'AEROPOLIS COMMERCIAL', 'Tangerang', 0, '0'),
('6A55', 'JBK', '6A00', 'RSAB HARAPAN KITA[RHK]', 'RHK', 'JAKARTA BARAT', 'JL. LET JEN S PARMAN', 'BAMBU UTARA - PALMER', 0, '11420'),
('6A56', 'JBK', '6A00', 'APT BELLEZZA[ABA]', 'ABA', 'JAKARTA SELATAN', 'JL. ARTERI SOEPONO N', 'GROGOL UTARA - KEBAY', 0, '12210'),
('6A57', 'JBK', '6A00', 'M GOLD[MGD]', 'MGD', 'BEKASI', 'JL. KH NOER ALI, KAL', 'PEKAYON JAYA - BEKAS', 0, '17148'),
('6A58', 'JBK', '6A00', 'GRAHA SURVEYOR[GSR]', 'GYR', 'JAKARTA', 'JL. JEND GATOT SUBRO', 'KUNINGAN TIMUR - SET', 0, '12950'),
('6A59', 'JBK', '6A00', 'KTB MITSUBISHI [KTB]', 'KTB', 'JAKARTA TIMUR', 'JL. JEND A YANI, PRO', '', 0, '0'),
('6A60', 'JBK', '6A00', 'MEDITERANIA 1[MTR]', 'MTR', 'JAKARTA BARAT', 'JL. TANJUNG DUREN RA', 'TANJUNG DUREN SELATA', 0, '11470'),
('6A61', 'JBK', '6A00', 'MENARA MULIA[MMA]', 'MMA', 'JAKARTA', 'JL. JEND. GATOT SUBR', 'KARET SEMANGGI - SET', 0, '12930'),
('6A62', 'JBK', '6A00', 'MANGGA DUA SQUARE [MDS]', 'MDS', 'JAKARTA PUSAT', 'MANGGA DUA SQUARE LT', '', 0, '0'),
('6A63', 'JBK', '6A00', 'ITC DEPOK [IDK]', 'IDK', 'KOTA DEPOK', 'LT DASAR HALL C JL.', '', 0, '0'),
('6A64', 'JBK', '6A00', 'METROPOLITAN MALL [MTM]', 'MTM', 'BEKASI', 'JL. KH. NOER ALI', 'BEKASI', 0, '0'),
('6A65', 'JBK', '6A00', 'CBD PLUIT[CBP]', 'CBP', 'JAKARTA UTARA', 'KOMPLEK CBD PLUIT BL', 'PENJARINGAN - PENJAR', 0, '14440'),
('6A66', 'JBK', '6A00', 'SUNTER KIRANA [SRK]', 'SRK', 'JAKARTA UTARA', 'JL SUNTER JAYA TIMUR', '', 0, '0'),
('6A67', 'JBK', '6A00', 'ABDULLAH SAFEI', 'AHS', 'JAKARTA SELATAN', 'JL KH ABDULLAH SAFE\'', '', 0, '0'),
('6A68', 'JBK', '6A00', 'KEMANG RAYA [KMR]', 'KMR', 'JAKARTA SELATAN', 'JL. KEMANG RAYA NO.', '', 0, '0'),
('6A69', 'JBK', '6A00', 'LANDMARK PLUIT [LKP]', 'LKP', 'JAKARTA UTARA', 'KOMP PERKANTORAN LAN', '', 0, '0'),
('6A70', 'JBK', '6A00', 'THAMRIN CITY [TMC]', 'TMC', 'JAKARTA PUSAT', 'JL KEBON KACANG RAYA', '', 0, '0'),
('6A71', 'JBK', '6A00', 'STASIUN GONDANGDIA [SGA]', 'SGA', 'JAKARTA PUSAT', 'JL SRIKAYA NO 1', '', 0, '0'),
('6A72', 'JBK', '6A00', 'KELAPA GADING BLVRD [KGB]', 'KGB', 'JAKARTA UTARA', 'JL KELAPA GADING BOU', '', 0, '0'),
('6A73', 'JBK', '6A00', 'MENARA DANAMON [MON]', 'MON', 'JAKARTA SELATAN', 'JL HR RASUNA SAID KA', '', 0, '0'),
('6A74', 'JBK', '6A00', 'PGC 2 [PGC 2]', 'PGC', 'JAKARTA TIMUR', 'JL MAYJEN SUTOYO NO', '', 0, '0'),
('6A75', 'JBK', '6A00', 'BANDARA TERMINAL 2E [BTL]', 'BTL', '', 'SHOPPING ARCADE TERM', '', 0, '0'),
('6A76', 'JBK', '6A00', 'JB TOWER [JBT]', 'JBT', 'JAKARTA PUSAT', 'JL KEBON SIRIH NO 48', '', 0, '0'),
('6A77', 'JBK', '6A00', 'TANJUNG DUREN [TDN]', 'TDN', 'JAKARTA BARAT', 'RUKO TANJUNG DUREN S', 'JAKARTA BARAT', 0, '0'),
('6A79', 'JBK', '6A00', 'ANTAM [ATM]', 'ATM', 'JAKARTA SELATAN', 'JL. TB SIMATUPANG NO', '', 0, '0'),
('6A80', 'JBK', '6A00', 'SCK WALAHARN[SWR]', 'SWR', 'JAKARTA PUSAT', 'JL BENDUNGAN WALAHAR', ' BENDUNGAN HILIR,', 0, '10570'),
('6A81', 'JBK', '6A00', 'MANGGA BESAR 2 [MBR2]', 'MBR2', 'JAKARTA PUSAT', 'JL MANGGA BESAR RAYA', '', 0, '0'),
('6A82', 'JBK', '6A00', 'MEDITERANIA 2 [MTR2]', 'MTR2', 'JAKARTA PUSAT', 'JL S PARMAN LT G NO', '', 0, '0'),
('6A83', 'JBK', '6A00', 'SCK MANGGA BESAR 2 [SMB]', 'SMB', 'JAKARTA PUSAT', 'JL MANGGA BESAR RAYA', 'SAWAH BESAR', 0, '0'),
('6A84', 'JBK', '6A00', 'RS HUSADA [RHA]', 'RHA', 'JAKARTA PUSAT', 'JL RAYA MANGGA BESAR', '', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id_aset` int(11) NOT NULL,
  `serial_number` varchar(10) NOT NULL,
  `no_tag` varchar(15) NOT NULL,
  `nama_aset` char(50) NOT NULL,
  `id_tipe` int(3) NOT NULL,
  `merk_aset` char(25) NOT NULL,
  `spesifikasi` text NOT NULL,
  `kd_store` varchar(4) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `kondisi` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id_aset`, `serial_number`, `no_tag`, `nama_aset`, `id_tipe`, `merk_aset`, `spesifikasi`, `kd_store`, `id_ruang`, `kondisi`) VALUES
(1, '3456', 'S/6A01/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(2, '3457', 'S/6A01/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(3, '3458', 'S/6A01/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(4, '3459', 'S/6A01/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(5, '3460', 'S/6A01/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(6, '3461', 'S/6A01/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(7, '3462', 'S/6A01/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(8, '3463', 'S/6A01/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(9, '3464', 'S/6A01/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(10, '3465', 'S/6A01/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(11, '3466', 'S/6A01/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A01', 1, 'Baik'),
(12, '3467', 'S/6A02/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(13, '3468', 'S/6A02/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(14, '3469', 'S/6A02/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(15, '3470', 'S/6A02/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(16, '3471', 'S/6A02/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(17, '3472', 'S/6A02/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(18, '3473', 'S/6A02/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(19, '3474', 'S/6A02/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(20, '3475', 'S/6A02/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(21, '3476', 'S/6A02/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(22, '3477', 'S/6A02/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A02', 1, 'Baik'),
(23, '3478', 'S/6A03/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(24, '3479', 'S/6A03/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(25, '3480', 'S/6A03/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(26, '3481', 'S/6A03/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(27, '3482', 'S/6A03/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(28, '3483', 'S/6A03/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(29, '3484', 'S/6A03/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(30, '3485', 'S/6A03/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(31, '3486', 'S/6A03/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(32, '3487', 'S/6A03/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(33, '3488', 'S/6A03/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A03', 1, 'Baik'),
(34, '3489', 'S/6A16/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(35, '3490', 'S/6A16/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(36, '3491', 'S/6A16/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(37, '3492', 'S/6A16/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(38, '3493', 'S/6A16/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(39, '3494', 'S/6A16/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(40, '3495', 'S/6A16/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(41, '3496', 'S/6A16/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(42, '3497', 'S/6A16/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(43, '3498', 'S/6A16/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(44, '3499', 'S/6A16/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(45, '3500', 'S/6A05/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(46, '3501', 'S/6A05/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(47, '3502', 'S/6A05/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(48, '3503', 'S/6A05/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(49, '3504', 'S/6A05/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(50, '3505', 'S/6A05/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(51, '3506', 'S/6A05/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(52, '3507', 'S/6A05/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(53, '3508', 'S/6A05/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(54, '3509', 'S/6A05/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(55, '3510', 'S/6A05/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A05', 1, 'Baik'),
(56, '3511', 'S/6A17/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(57, '3512', 'S/6A17/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(58, '3513', 'S/6A17/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(59, '3514', 'S/6A17/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(60, '3515', 'S/6A17/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(61, '3516', 'S/6A17/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(62, '3517', 'S/6A17/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(63, '3518', 'S/6A17/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(64, '3519', 'S/6A17/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(65, '3520', 'S/6A17/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(66, '3521', 'S/6A17/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(67, '3522', 'S/6A07/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(68, '3523', 'S/6A07/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(69, '3524', 'S/6A07/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(70, '3525', 'S/6A07/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(71, '3526', 'S/6A07/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(72, '3527', 'S/6A07/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(73, '3528', 'S/6A07/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(74, '3529', 'S/6A07/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(75, '3530', 'S/6A07/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(76, '3531', 'S/6A07/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(77, '3532', 'S/6A07/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A07', 1, 'Baik'),
(78, '3533', 'S/6A08/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(79, '3534', 'S/6A08/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(80, '3535', 'S/6A08/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(81, '3536', 'S/6A08/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(82, '3537', 'S/6A08/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(83, '3538', 'S/6A08/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(84, '3539', 'S/6A08/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(85, '3540', 'S/6A08/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(86, '3541', 'S/6A08/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(87, '3542', 'S/6A08/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(88, '3543', 'S/6A08/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A08', 1, 'Baik'),
(89, '3544', 'S/6A09/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(90, '3545', 'S/6A09/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(91, '3546', 'S/6A09/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(92, '3547', 'S/6A09/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(93, '3548', 'S/6A09/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(94, '3549', 'S/6A09/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(95, '3550', 'S/6A09/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(96, '3551', 'S/6A09/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(97, '3552', 'S/6A09/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(98, '3553', 'S/6A09/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(99, '3554', 'S/6A09/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A09', 1, 'Baik'),
(100, '3555', 'S/6A10/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(101, '3556', 'S/6A10/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(102, '3557', 'S/6A10/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(103, '3558', 'S/6A10/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(104, '3559', 'S/6A10/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(105, '3560', 'S/6A10/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(106, '3561', 'S/6A10/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(107, '3562', 'S/6A10/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(108, '3563', 'S/6A10/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(109, '3564', 'S/6A10/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(110, '3565', 'S/6A10/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A10', 1, 'Baik'),
(111, '3566', 'S/6A11/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(112, '3567', 'S/6A11/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(113, '3568', 'S/6A11/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(114, '3569', 'S/6A11/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(115, '3570', 'S/6A11/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(116, '3571', 'S/6A11/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(117, '3572', 'S/6A11/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(118, '3573', 'S/6A11/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(119, '3574', 'S/6A11/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(120, '3575', 'S/6A11/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(121, '3576', 'S/6A11/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A11', 1, 'Baik'),
(122, '3577', 'S/6A12/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(123, '3578', 'S/6A12/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(124, '3579', 'S/6A12/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(125, '3580', 'S/6A12/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(126, '3581', 'S/6A12/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(127, '3582', 'S/6A12/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(128, '3583', 'S/6A12/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(129, '3584', 'S/6A12/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(130, '3585', 'S/6A12/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(131, '3586', 'S/6A12/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(132, '3587', 'S/6A12/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A12', 1, 'Baik'),
(133, '3588', 'S/6A13/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(134, '3589', 'S/6A13/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(135, '3590', 'S/6A13/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(136, '3591', 'S/6A13/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(137, '3592', 'S/6A13/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(138, '3593', 'S/6A13/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(139, '3594', 'S/6A13/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(140, '3595', 'S/6A13/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(141, '3596', 'S/6A13/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(142, '3597', 'S/6A13/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(143, '3598', 'S/6A13/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A13', 1, 'Baik'),
(144, '3599', 'S/6A14/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(145, '3600', 'S/6A14/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(146, '3601', 'S/6A14/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(147, '3602', 'S/6A14/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(148, '3603', 'S/6A14/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(149, '3604', 'S/6A14/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(150, '3605', 'S/6A14/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(151, '3606', 'S/6A14/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(152, '3607', 'S/6A14/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(153, '3608', 'S/6A14/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(154, '3609', 'S/6A14/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A14', 1, 'Baik'),
(155, '3610', 'S/6A15/1', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(156, '3611', 'S/6A15/2', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(157, '3612', 'S/6A15/3', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(158, '3613', 'S/6A15/4', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(159, '3614', 'S/6A15/5', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(160, '3615', 'S/6A15/6', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(161, '3616', 'S/6A15/7', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(162, '3617', 'S/6A15/8', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(163, '3618', 'S/6A15/9', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(164, '3619', 'S/6A15/10', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(165, '3620', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A15', 1, 'Baik'),
(166, '3621', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A16', 1, 'Baik'),
(167, '3622', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A17', 1, 'Baik'),
(168, '3623', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A18', 1, 'Baik'),
(169, '3624', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A19', 1, 'Baik'),
(170, '3625', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A20', 1, 'Baik'),
(171, '3626', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A21', 1, 'Baik'),
(172, '3627', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A22', 1, 'Baik'),
(173, '3628', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A23', 1, 'Baik'),
(174, '3630', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A25', 1, 'Baik'),
(175, '3631', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A26', 1, 'Baik'),
(176, '3632', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A27', 1, 'Baik'),
(177, '3633', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A28', 1, 'Baik'),
(178, '3634', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A29', 1, 'Baik'),
(179, '3635', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A30', 1, 'Baik'),
(180, '3636', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A31', 1, 'Baik'),
(181, '3637', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A32', 1, 'Baik'),
(182, '3638', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A33', 1, 'Baik'),
(183, '3639', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A34', 1, 'Baik'),
(184, '3640', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A35', 1, 'Baik'),
(185, '3641', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A36', 1, 'Baik'),
(186, '3642', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A37', 1, 'Baik'),
(187, '3643', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A38', 1, 'Baik'),
(188, '3644', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A39', 1, 'Baik'),
(189, '3645', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A40', 1, 'Baik'),
(190, '3646', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A41', 1, 'Baik'),
(191, '3647', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A42', 1, 'Baik'),
(192, '3648', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A43', 1, 'Baik'),
(193, '3649', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A44', 1, 'Baik'),
(194, '3650', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A45', 1, 'Baik'),
(195, '3651', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A46', 1, 'Baik'),
(196, '3652', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A47', 1, 'Baik'),
(197, '3653', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A48', 1, 'Baik'),
(198, '3654', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A49', 1, 'Baik'),
(199, '3655', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A50', 1, 'Baik'),
(200, '3656', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A51', 1, 'Baik'),
(201, '3657', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A52', 1, 'Baik'),
(202, '3658', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A53', 1, 'Baik'),
(203, '3659', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A54', 1, 'Baik'),
(204, '3660', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A55', 1, 'Baik'),
(205, '3661', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A56', 1, 'Baik'),
(206, '3662', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A57', 1, 'Baik'),
(207, '3663', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A58', 1, 'Baik'),
(208, '3664', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A59', 1, 'Baik'),
(209, '3665', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A60', 1, 'Baik'),
(210, '3666', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A61', 1, 'Baik'),
(211, '3667', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A62', 1, 'Baik'),
(212, '3668', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A63', 1, 'Baik'),
(213, '3669', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A64', 1, 'Baik'),
(214, '3670', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A65', 1, 'Baik'),
(215, '3671', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A66', 1, 'Baik'),
(216, '3672', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A67', 1, 'Baik'),
(217, '3673', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A68', 1, 'Baik'),
(218, '3674', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A69', 1, 'Baik'),
(219, '3675', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A70', 1, 'Baik'),
(220, '3676', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A71', 1, 'Baik'),
(221, '3677', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A72', 1, 'Baik'),
(222, '3678', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A73', 1, 'Baik'),
(223, '3679', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A74', 1, 'Baik'),
(224, '3680', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A75', 1, 'Baik'),
(225, '3681', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A76', 1, 'Baik'),
(226, '3682', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A77', 1, 'Baik'),
(227, '3684', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A79', 1, 'Baik'),
(228, '3685', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A80', 1, 'Baik'),
(229, '3686', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A81', 1, 'Baik'),
(230, '3687', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A82', 1, 'Baik'),
(231, '3688', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A83', 1, 'Baik'),
(232, '3689', 'S/6A15/11', 'Komputer Client', 1, 'Acer', 'HDD 1TB', '6A84', 1, 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(3) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `nama_tipe`) VALUES
(1, 'Komputer'),
(2, 'Monitor'),
(3, 'Printer'),
(4, 'Proyektor'),
(5, 'Router');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(15) NOT NULL,
  `nip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nip`) VALUES
(1, 'admin', 'admin', 'admin', '10.10.10.1'),
(2, 'support', 'support', 'support', '10.10.10.2'),
(4, 'wendy', 'wendy', 'support', '10.10.10.4'),
(10, 'andre', 'andre', 'manajer', '10.10.10.3'),
(11, 'wiwin', 'wiwin', 'admin', '10.10.10.6'),
(12, 'manajer', 'manajer', 'manajer', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `kd_store` (`kd_store`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id_histori`);

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
-- Indexes for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  ADD PRIMARY KEY (`id_musnah`);

--
-- Indexes for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`),
  ADD KEY `id_tipe` (`id_tipe`,`id_ruang`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `kd_store` (`kd_store`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`KD_STORE`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `kd_store` (`kd_store`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  MODIFY `id_musnah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pengecekan`
--
ALTER TABLE `pengecekan`
  MODIFY `id_pengecekan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_pengecekan`) REFERENCES `pengecekan` (`id_pengecekan`);

--
-- Constraints for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD CONSTRAINT `pengecekan_ibfk_2` FOREIGN KEY (`kd_store`) REFERENCES `store` (`KD_STORE`),
  ADD CONSTRAINT `pengecekan_ibfk_3` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id_ruang`),
  ADD CONSTRAINT `pengecekan_ibfk_4` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id_tipe`);

--
-- Constraints for table `tes`
--
ALTER TABLE `tes`
  ADD CONSTRAINT `tes_ibfk_1` FOREIGN KEY (`kd_store`) REFERENCES `store` (`KD_STORE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
