-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2023 at 04:20 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_spdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_13_181830_create_tb_mahasiswa_table', 1),
(6, '2023_01_13_182306_create_tb_prodi_table', 1),
(7, '2023_01_13_183124_create_tb_angkatan_table', 1),
(8, '2023_01_13_183341_create_tb_kelas_table', 1),
(9, '2023_01_13_183611_create_tb_profil_mahasiswa_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_angkatan`
--

CREATE TABLE `tb_angkatan` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `jumlah_kelas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_angkatan`
--

INSERT INTO `tb_angkatan` (`id`, `tahun`, `jumlah_kelas`, `created_at`, `updated_at`) VALUES
(8, 2020, 3, NULL, NULL),
(9, 2022, 3, NULL, NULL),
(10, 2021, 4, NULL, NULL),
(11, 2023, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A1', NULL, NULL),
(2, 'A2', NULL, NULL),
(3, 'A3', NULL, NULL),
(4, 'A4', NULL, NULL),
(5, 'A5', NULL, NULL),
(6, 'A6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` bigint(20) NOT NULL,
  `nim` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) NOT NULL,
  `angkatan_id` bigint(20) NOT NULL,
  `kelas_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `prodi_id`, `angkatan_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(35, 202223245, 53, 9, 3, NULL, NULL),
(36, 200180100, 53, 9, 3, NULL, NULL),
(37, 2334554566, 52, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id`, `name`, `logo`, `kepala_prodi`, `created_at`, `updated_at`) VALUES
(52, 'TEKNIK SIPIL', 'http://127.0.0.1:8000/logo-prodi/1673693547download.png', 'DR. T. NAZARUDDIN, S.H., M.HUM', NULL, NULL),
(53, 'SISTEM INFORMASI', 'http://127.0.0.1:8000/logo-prodi/1673693674HMJM FEB.jpg', 'DR. MUNIRUL ULA, S.T., M.ENG.', NULL, NULL),
(54, 'TEKNIK INDUSTRI', 'http://127.0.0.1:8000/logo-prodi/1673693703HMTI-1024x823.png', 'SAFWANDI, S.T., M.KOM', NULL, NULL),
(55, 'TEKNIK KIMIA', 'http://127.0.0.1:8000/logo-prodi/1673693782Logo-HMS-FT-ULM-1024x1024.png', 'DR. MARBAWI, S.E.,M.M', NULL, NULL),
(56, 'TEKNIK ELEKTRO', 'http://127.0.0.1:8000/logo-prodi/1673693817Logo-hmtm.png', 'DR. MOHD. HEIKAL, S.E., M.M', NULL, NULL),
(57, 'TEKNIK INFORMATIKA', 'http://127.0.0.1:8000/logo-prodi/1673693934download.jfif', 'DR. MURHABAN, S.E., M.SI, AK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_mahasiswa`
--

CREATE TABLE `tb_profil_mahasiswa` (
  `id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_profil_mahasiswa`
--

INSERT INTO `tb_profil_mahasiswa` (`id`, `mahasiswa_id`, `name`, `jenis_kelamin`, `agama`, `alamat`, `created_at`, `updated_at`) VALUES
(30, 35, 'Laila Harahap', 'Perempuan', 'Islam', 'Batu Bara', NULL, NULL),
(31, 36, 'Nur Alimul Haq', 'Laki-Laki', 'Islam', 'Medan', NULL, NULL),
(32, 37, 'Azril Simanjuntak', 'Laki-Laki', 'Kristen', 'Rambung raya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'tses@gmail.com', NULL, '$2y$10$3QnWxNHE0anvh5LBrMlFfuYMi00tzGjytWr7nySjsx.3KaeWCrKJW', 'nGPJKU0U2GYimFbbkRMt13DdLVC0rmQMzKJf8Png0Dz0vramSf84uSPyyYxX', NULL, NULL),
(2, 'rdd', 'dosen2@gmail.com', NULL, '$2y$10$YigXXtCXMh43A7TOZVJNk.S.ryVM4U3Qu8jBuvNQFsb2HUrHFNtB6', 'AYtJ0BOKULPRIgzQArxQ6pjLAizeXHZsEsrVTkCS3OOJGv4CIzI87hEL2702', NULL, NULL),
(3, 'dsad', 'siswa2@gmail.com', NULL, '$2y$10$537bfH0JflhF9kLZk3cNT.NpOJHuoV344BPM.XcUOXK9IEqiZYSh2', 'MXdhoKyPfOeBb3kSE1Zc4OW6cUD1KMv1VPG5kxv9b0OlYNDelsX14tei1MdO', NULL, NULL),
(4, 'Nur Alimul Haq', 'tes@gmail.com', NULL, '$2y$10$4t0XQ.NVRX966gkH7GwLnexXkwCWSBnQS3wcqbNzZS73qCh9GGQh.', 'cFx8CpjCXnK12bVJV29Vyq6WjHaTMnZxdG9DCVFOWscCDYq6wcrYPjBIwyvB', NULL, NULL),
(5, 'dasds', 'admin@gmail.com', NULL, '$2y$10$rEBBPGgYZCNYVOhKc0Vsh.m8.R3.c4SMrv6cxPoXw5G5.dDRecwIu', '6g5rP7scbKBT9IxZO47ofwLYjR0OCtMwlFCVNYzLfLLxfpGfW4W77OTLky6h', NULL, NULL),
(6, 'Nur Alimul Haq', 'nur.200180100@mhs.unimal.ac.id', NULL, '$2y$10$qiX68bUlaZ.whux5xqRBNuX.M14YJegnQyKAuDLsp4Lq95Db7lgUO', 'mwY2sbsHWV0f57ESH8MVQWgYXPGjXckX728WDp4yPBqSlNRHBG6jOMsahet0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_mahasiswa_nim_unique` (`nim`),
  ADD KEY `tb_mahasiswa_jurusan_id_index` (`prodi_id`),
  ADD KEY `tb_mahasiswa_angkatan_id_index` (`angkatan_id`),
  ADD KEY `tb_mahasiswa_kelas_id_index` (`kelas_id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_prodi_name_unique` (`name`);

--
-- Indexes for table `tb_profil_mahasiswa`
--
ALTER TABLE `tb_profil_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_profil_mahasiswa`
--
ALTER TABLE `tb_profil_mahasiswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `tb_prodi` (`id`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_3` FOREIGN KEY (`angkatan_id`) REFERENCES `tb_angkatan` (`id`);

--
-- Constraints for table `tb_profil_mahasiswa`
--
ALTER TABLE `tb_profil_mahasiswa`
  ADD CONSTRAINT `tb_profil_mahasiswa_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `tb_mahasiswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
