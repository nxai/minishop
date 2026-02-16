-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2026 at 08:46 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop_2026`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
CREATE TABLE IF NOT EXISTS `tb_categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(1, 'ກ້ອງວົງຈອນປິດ', '2026-01-26 09:38:12'),
(2, 'ຄອມພິວເຕີ', '2026-02-02 15:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

DROP TABLE IF EXISTS `tb_products`;
CREATE TABLE IF NOT EXISTS `tb_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `name`, `description`, `price`, `qty`, `image`, `cat_id`) VALUES
(3, 'Mac', 'ກຫກຳໄກໄຳໄຳໄຳ', 5000, 222, '1771231089_430.jpg', 1),
(4, 'ກ້ອງວົງຈອນປິດ', 'ັຫັຫ', 5000, 0, '1771231099_661.jpg', 2),
(5, 'notebook acer', '', 50000, 50, NULL, 0),
(7, '111', '111', 11, 1, NULL, 0),
(8, 'ກ້ອງວົງຈອນປິດ C121', 'sdsdsdsdssdsd', 14544, 111, '1770865837_783.png', 1),
(11, 'ຫກຫກຫກຫ', 'ກຫຫ', 55, 55, '1771231113_278.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `fullname`, `role`, `created_at`) VALUES
(1, 'admin', '123', 'admin', 'user', '2026-02-16 03:16:21'),
(2, 'bobby', '$2y$10$87YezhWvsDpryjjkrHejeO9PI9qWqSNvAnpx2DOSnBawR6Z/T2ff.', 'bobby', 'user', '2026-02-16 03:17:38'),
(3, 'xai', '$2y$10$3IJvMCa3mLAsYdLdy4av5uUjXW/R8jwRUHL3O.GhADEJT2ktJ7Z8G', 'xai', 'admin', '2026-02-16 04:01:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
