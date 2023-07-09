-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2023 at 12:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpkad_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_surat`
--

CREATE TABLE `file_surat` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_surat`
--

INSERT INTO `file_surat` (`id`, `surat_id`, `file_surat`, `created_at`, `updated_at`) VALUES
('9c275b1f-a952-4697-8dfa-48ff65f9d162', '3bfb0f52-b729-46f9-a0c7-e68fadfb870b', 'uploads/surat/biasa/surat Biasa - 3aac7dae52a8b62d6d47673d64b87267', '2023-07-09 03:19:25', '2023-07-09 03:19:25'),
('d795d016-0cd1-48a5-a9f1-0139fb3c3406', 'cc09cbc3-31f8-4973-9c00-5c30e0d9a4de', 'uploads/surat/biasa/surat Biasa - 3aac7dae52a8b62d6d47673d64b87267', '2023-07-09 03:19:58', '2023-07-09 03:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_07_07_021724_create_surat', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(3, '2023_07_07_025127_create_distribusi', 2),
(4, '2023_07_07_025401_create_file_surat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat` enum('masuk','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dinas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` text COLLATE utf8mb4_unicode_ci,
  `uraian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` enum('Biasa','Undangan','Disposisi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_terima` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `surat`, `dinas`, `tgl_masuk`, `no_surat`, `tgl_surat`, `disposisi`, `uraian`, `jenis_surat`, `tanda_terima`, `created_at`, `updated_at`) VALUES
('3bfb0f52-b729-46f9-a0c7-e68fadfb870b', 'masuk', 'DPRD Provinsi NTB', '01/02/2023', '005/II/DPRD/2023', '01/02/2023', NULL, '<div>\r\n<div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At voluptatem nam beatae error minus, minima nobis molestias totam voluptatum voluptate reprehenderit deleniti deserunt libero, laborum perspiciatis magnam sunt eveniet voluptas?\r\n<div>\r\n<div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At voluptatem nam beatae error minus, minima nobis molestias totam voluptatum voluptate reprehenderit deleniti deserunt libero, laborum perspiciatis magnam sunt eveniet voluptas?</div>\r\n</div>\r\n</div>\r\n</div>', 'Biasa', 'as\'ad, 01/02/2023', '2023-07-09 03:19:24', '2023-07-09 03:19:24'),
('cc09cbc3-31f8-4973-9c00-5c30e0d9a4de', 'masuk', 'DPRD Provinsi NTB', '01/02/2023', '005/II/DPRD/2023', '01/02/2023', NULL, '<div>\r\n<div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At voluptatem nam beatae error minus, minima nobis molestias totam voluptatum voluptate reprehenderit deleniti deserunt libero, laborum perspiciatis magnam sunt eveniet voluptas?\r\n<div>\r\n<div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At voluptatem nam beatae error minus, minima nobis molestias totam voluptatum voluptate reprehenderit deleniti deserunt libero, laborum perspiciatis magnam sunt eveniet voluptas?</div>\r\n</div>\r\n</div>\r\n</div>', 'Biasa', 'as\'ad, 01/02/2023', '2023-07-09 03:19:58', '2023-07-09 03:19:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distribusi_surat_id_index` (`surat_id`),
  ADD KEY `distribusi_bidang_id_index` (`bidang_id`);

--
-- Indexes for table `file_surat`
--
ALTER TABLE `file_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_surat_surat_id_index` (`surat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `distribusi_ibfk_1` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_surat`
--
ALTER TABLE `file_surat`
  ADD CONSTRAINT `file_surat_ibfk_1` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
