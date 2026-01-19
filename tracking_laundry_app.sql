-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2026 at 01:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_laundry_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Nia', '085559680218', 'Kemantren', '2025-12-24 05:23:56', '2025-12-24 05:23:56'),
(2, 'Nia', '085559680218', 'Kemantren', '2025-12-24 21:00:02', '2025-12-24 21:00:02'),
(3, 'Nia', '085559680218', 'Kemantren', '2025-12-24 21:01:47', '2025-12-24 21:01:47'),
(4, 'Nia', '085559680218', 'Kemantren', '2025-12-24 21:04:36', '2025-12-24 21:04:36'),
(5, 'Nia', '085559680218', 'Kemantren', '2025-12-24 21:16:32', '2025-12-24 21:16:32'),
(6, 'Liana', '085745789099', 'Prajurit Kulon', '2026-01-04 18:08:27', '2026-01-04 18:08:27'),
(7, 'Dinda', '081515047150', 'Pulorejo', '2026-01-06 19:30:19', '2026-01-06 19:30:19'),
(8, 'Vira', '085730456634', 'Kesamben', '2026-01-06 20:28:33', '2026-01-06 20:28:33'),
(9, 'Ayu', '085732930544', 'Kemantren', '2026-01-07 00:28:29', '2026-01-07 00:28:29'),
(10, 'Arum', '0876433465426', 'jhbyftrf', '2026-01-07 23:53:18', '2026-01-07 23:53:18'),
(11, 's', '09999999999999', '4', '2026-01-08 00:11:30', '2026-01-08 00:11:30'),
(12, 'Artanti', '085174086408', 'Ngabar', '2026-01-08 20:51:08', '2026-01-08 20:51:08'),
(13, 'Artanti', '085174086408', 'Ngabar', '2026-01-08 21:06:42', '2026-01-08 21:06:42'),
(14, 'Liana', '0876433465426', 'Prajurit Kulon', '2026-01-09 00:25:51', '2026-01-09 00:25:51'),
(15, 'Arimbi', '085174086408', 'Terusan', '2026-01-10 05:36:04', '2026-01-10 05:36:04'),
(16, 'ff', '97868', 'hggtg', '2026-01-11 22:53:44', '2026-01-11 22:53:44'),
(17, 'Artanti', '085174086408', 'Ngabar', '2026-01-13 20:56:08', '2026-01-13 20:56:08'),
(18, 'Bella', '085559680218', 'Terusan', '2026-01-13 21:45:49', '2026-01-13 21:45:49'),
(19, 'Rini', '0876433465426', 'Penompo', '2026-01-14 00:03:33', '2026-01-14 00:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laundries`
--

CREATE TABLE `laundries` (
  `id` bigint NOT NULL,
  `nama_laundry` varchar(100) DEFAULT NULL,
  `harga_per_kg` int NOT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laundries`
--

INSERT INTO `laundries` (`id`, `nama_laundry`, `harga_per_kg`, `alamat`, `no_hp`, `deskripsi`, `created_at`) VALUES
(1, 'NIA LAUNDRY', 7000, 'Kemantren RT.7 RW.2', '085559680218', NULL, '2026-01-08 04:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_items`
--

CREATE TABLE `laundry_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `jenis_pakaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_orders`
--

CREATE TABLE `laundry_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `estimasi_selesai` date NOT NULL,
  `berat` decimal(5,2) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('diterima','diproses','selesai','diambil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `laundry_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundry_orders`
--

INSERT INTO `laundry_orders` (`id`, `customer_id`, `user_id`, `tracking_code`, `tanggal_masuk`, `estimasi_selesai`, `berat`, `total_harga`, `status`, `created_at`, `updated_at`, `laundry_id`) VALUES
(11, 15, 1, 'TRK-1768048564', '2026-01-10', '2026-01-17', 5.00, 35000.00, 'selesai', '2026-01-10 05:36:04', '2026-01-11 20:01:41', 1),
(14, 18, 1, 'TRK-1768365949', '2026-01-14', '2026-01-17', 2.50, 17500.00, 'selesai', '2026-01-13 21:45:49', '2026-01-18 04:37:24', 1),
(15, 19, 1, 'TRK-1768374213', '2026-01-19', '2026-01-25', 3.00, 21000.00, 'diproses', '2026-01-14 00:03:33', '2026-01-18 04:37:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_tracking_histories`
--

CREATE TABLE `laundry_tracking_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `laundry_order_id` bigint UNSIGNED NOT NULL,
  `tracking_status_id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laundry_tracking_histories`
--

INSERT INTO `laundry_tracking_histories` (`id`, `laundry_order_id`, `tracking_status_id`, `keterangan`, `created_at`) VALUES
(28, 11, 1, 'Order diterima', '2026-01-10 12:36:04'),
(29, 11, 2, 'Status diperbarui', '2026-01-10 12:36:19'),
(30, 11, 3, 'Bisa diambil sekarang', '2026-01-12 03:01:41'),
(33, 14, 1, 'Order diterima', '2026-01-14 04:45:49'),
(34, 14, 2, 'Status diperbarui', '2026-01-14 04:45:57'),
(35, 15, 1, 'Order diterima', '2026-01-14 07:03:33'),
(36, 14, 3, 'Status diperbarui', '2026-01-18 11:37:24'),
(37, 15, 2, 'Status diperbarui', '2026-01-18 11:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_tracking_logs`
--

CREATE TABLE `laundry_tracking_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `tracking_status_id` bigint UNSIGNED NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `waktu_update` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_24_070332_create_customers_table', 2),
(5, '2025_12_24_070342_create_tracking_statuses_table', 2),
(6, '2025_12_24_070352_create_laundry_orders_table', 2),
(7, '2025_12_24_070401_create_laundry_items_table', 2),
(8, '2025_12_24_070410_create_laundry_tracking_logs_table', 2),
(9, '2025_12_24_070417_create_notifications_table', 2),
(10, '2025_12_25_042358_add_is_read_to_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_id`, `customer_id`, `pesan`, `is_read`, `created_at`, `updated_at`) VALUES
(10, 11, 15, 'Order TRK-1768048564 sekarang DIPROSES', 0, '2026-01-10 05:36:19', '2026-01-10 05:36:19'),
(11, 11, 15, 'Order TRK-1768048564 sekarang SELESAI', 0, '2026-01-11 20:01:41', '2026-01-11 20:01:41'),
(12, 14, 18, 'Order TRK-1768365949 sekarang DIPROSES', 0, '2026-01-13 21:45:57', '2026-01-13 21:45:57'),
(13, 14, 18, 'Order TRK-1768365949 sekarang SELESAI', 0, '2026-01-18 04:37:24', '2026-01-18 04:37:24'),
(14, 15, 19, 'Order TRK-1768374213 sekarang DIPROSES', 0, '2026-01-18 04:37:38', '2026-01-18 04:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rnpjZizFeRuK06qMjXbgXXOKAszNQz5qoCT4C9eK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicjd5b3VJbUZQQXc4ZXVsSFJlVk9oSFc4YWZneFh2UnEybTRFd1NGaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767866922);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_statuses`
--

CREATE TABLE `tracking_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking_statuses`
--

INSERT INTO `tracking_statuses` (`id`, `nama_status`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Diterima', 1, NULL, NULL),
(2, 'Diproses', 2, NULL, NULL),
(3, 'Selesai', 3, NULL, NULL),
(4, 'Diambil', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'Admin Laundry', 'admin@laundry.com', NULL, '$2y$12$xY7jtah88YNmxdTfUNbBHewuPG4O0GegKYnr0oE8tHdJFmbbYhOni', NULL, '2025-12-24 01:19:22', '2025-12-24 01:19:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundries`
--
ALTER TABLE `laundries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_items`
--
ALTER TABLE `laundry_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laundry_orders_tracking_code_unique` (`tracking_code`),
  ADD KEY `laundry_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `laundry_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `laundry_tracking_histories`
--
ALTER TABLE `laundry_tracking_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tracking_order` (`laundry_order_id`),
  ADD KEY `fk_tracking_status` (`tracking_status_id`);

--
-- Indexes for table `laundry_tracking_logs`
--
ALTER TABLE `laundry_tracking_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_tracking_logs_order_id_foreign` (`order_id`),
  ADD KEY `laundry_tracking_logs_tracking_status_id_foreign` (`tracking_status_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`),
  ADD KEY `notifications_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tracking_statuses`
--
ALTER TABLE `tracking_statuses`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundries`
--
ALTER TABLE `laundries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry_items`
--
ALTER TABLE `laundry_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `laundry_tracking_histories`
--
ALTER TABLE `laundry_tracking_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `laundry_tracking_logs`
--
ALTER TABLE `laundry_tracking_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tracking_statuses`
--
ALTER TABLE `tracking_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundry_items`
--
ALTER TABLE `laundry_items`
  ADD CONSTRAINT `laundry_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `laundry_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
  ADD CONSTRAINT `laundry_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laundry_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laundry_tracking_histories`
--
ALTER TABLE `laundry_tracking_histories`
  ADD CONSTRAINT `fk_tracking_order` FOREIGN KEY (`laundry_order_id`) REFERENCES `laundry_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tracking_status` FOREIGN KEY (`tracking_status_id`) REFERENCES `tracking_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laundry_tracking_logs`
--
ALTER TABLE `laundry_tracking_logs`
  ADD CONSTRAINT `laundry_tracking_logs_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `laundry_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laundry_tracking_logs_tracking_status_id_foreign` FOREIGN KEY (`tracking_status_id`) REFERENCES `tracking_statuses` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `laundry_orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
