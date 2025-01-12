-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 07:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `isdel` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `tahun`, `id_penulis`, `nama_penulis`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `isdel`) VALUES
(1, 'ada roti ada ikan', 1999, 0, 'Jamal', 2, '2024-12-09 07:39:04', 2, '2024-12-21 18:43:12', NULL, NULL, 0),
(3, 'tampar aku', 9999, 0, 'Liam Enere', 2, '2024-12-09 07:56:57', NULL, NULL, 2, '2024-12-21 17:47:24', 1),
(4, 'aku suka ayam goreng', 13231, 0, '', 2, '2024-12-21 17:47:37', NULL, NULL, 2, '2024-12-21 17:49:13', 1),
(5, 'aku suka nasi goreng', 13231, 0, '', 2, '2024-12-21 17:49:06', NULL, NULL, 2, '2024-12-21 17:50:30', 1),
(6, 'aku anak indonesia', 19988, 0, '', 2, '2024-12-21 17:50:43', NULL, NULL, 2, '2024-12-21 17:53:53', 1),
(7, 'aku anak indonesia', 2000, 0, '', 2, '2024-12-21 17:50:51', NULL, NULL, 2, '2024-12-21 17:53:56', 1),
(8, 'empat sehat lima sempurna', 12121, 0, '', 2, '2024-12-21 17:54:09', NULL, NULL, 2, '2024-12-21 17:56:40', 1),
(9, 'aku bukan bapakmu', 12121, 0, '', 2, '2024-12-21 17:54:18', NULL, NULL, 2, '2024-12-21 17:54:57', 1),
(10, 'aku sehat', 11111, 0, '', 2, '2024-12-21 17:55:02', NULL, NULL, 2, '2024-12-21 17:55:15', 1),
(11, 'aku mandi dulu', 12121, 0, '', 2, '2024-12-21 17:56:37', NULL, NULL, 2, '2024-12-21 18:03:55', 1),
(12, 'kangkung chef', 12121, 0, '', 2, '2024-12-21 17:57:25', NULL, NULL, 2, '2024-12-21 17:57:27', 1),
(13, 'Boboiboy New Episode', 1981, 0, '', 2, '2024-12-21 18:03:22', 2, '2024-12-21 18:44:03', NULL, NULL, 0),
(14, 'mengenal hewan primata', 12121, 0, '', 2, '2024-12-21 18:04:24', NULL, NULL, 2, '2024-12-21 18:04:28', 1),
(15, 'aku seorang pilot', 12121, 0, '', 2, '2024-12-21 18:36:12', NULL, NULL, 2, '2024-12-21 18:36:15', 1),
(16, 'Ganteng Ganteng Serigala', 1987, 0, '', 2, '2024-12-21 18:43:31', 2, '2024-12-21 18:43:38', 2, '2024-12-21 18:44:11', 1),
(17, 'asede', 10230123, 0, '', 2, '2024-12-21 18:45:52', 2, '2024-12-21 18:46:03', 2, '2024-12-21 18:46:06', 1),


-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`) VALUES
(1, 'Aji', 'aji123@gmail.com', '$2y$10$/UC7KmwaoI/xm1HMO4gRIeOrL9jKGLPqenLGnofJwIStIB9SB52jG', 1),
(2, 'Irfan', 'irfan123@gmail.com', '$2y$10$/UC7KmwaoI/xm1HMO4gRIeOrL9jKGLPqenLGnofJwIStIB9SB52jG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
