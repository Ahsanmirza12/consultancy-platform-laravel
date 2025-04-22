-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 10:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Asad', 'asad@gmail.com', '6 month subscription', 'Hi! I have subscribed to a 6-month subscription, but it\'s still showing as pending. Could you please approve it and activate my package?', '2025-04-21 12:25:55', '2025-04-21 12:25:55'),
(2, 'Azahar', 'azhar@gmail.com', '1 month subscription', 'Hi! I have subscribed to a 1 month subscription, but it\'s still showing as pending. Could you please approve it and activate my package?', '2025-04-21 12:30:09', '2025-04-21 12:30:09'),
(3, 'Azhar', 'azhar@gmail.com', '1 month subscription', 'Hi! I have subscribed to a 1 month subscription, but it\'s still showing as pending. Could you please approve it and activate my package?', '2025-04-21 12:34:26', '2025-04-21 12:34:26'),
(4, 'Logan West', 'lapoxuze@mailinator.com', '3 month package', 'Hi! I have subscribed to a 3-month subscription, but it\'s still showing as pending. Could you please approve it and activate my package?', '2025-04-21 12:40:52', '2025-04-21 12:40:52'),
(5, 'Ahsan Shawal', 'admin@mysite.com', '2 month', 'Hi! I have subscribed to a 2-month subscription, but it\'s still showing as pending. Could you please approve it and activate my package?', '2025-04-21 12:42:15', '2025-04-21 12:42:15'),
(6, 'Ahsan Shawal', 'admin@mysite.com', 'assdsdf', 'saaggdfgdgf', '2025-04-21 14:31:27', '2025-04-21 14:31:27'),
(7, 'Ahsan Shawal', 'admin@mysite.com', 'aadfdfd', 'dffdfdfvsfv', '2025-04-21 14:34:09', '2025-04-21 14:34:09'),
(8, 'ashad', 'ashad@gmail.com', 'asadfsgsg', 'asdfdfsdfa', '2025-04-21 14:36:45', '2025-04-21 14:36:45'),
(9, 'Ahsan Shawal', 'admin@mysite.com', 'asdsfdghfgs', 'cVdzbdxdzD', '2025-04-21 14:40:30', '2025-04-21 14:40:30'),
(10, 'Nina Patel', 'dazej@mailinator.com', 'Software Engineer', 'dasafgsggsdfsdfg', '2025-04-21 14:49:38', '2025-04-21 14:49:38'),
(11, 'Nina Patel', 'dazej@mailinator.com', 'sdfgsdvdfvdf', 'fsgggh', '2025-04-21 14:51:03', '2025-04-21 14:51:03'),
(12, 'afgggg', 'dfsfgg@gmail.com', 'efertgtrg', 'ffggh', '2025-04-21 14:52:19', '2025-04-21 14:52:19'),
(13, 'Nina Patel', 'dazej@mailinator.com', 'Software developer', 'dasfgfgdfg', '2025-04-21 14:53:11', '2025-04-21 14:53:11'),
(14, 'Nina Patel', 'dazej@mailinator.com', 'Sint dolor beatae en', 'dfssfggfgf', '2025-04-21 14:54:32', '2025-04-21 14:54:32'),
(15, 'Nina Patel', 'dazej@mailinator.com', 'math', 'DFAADFADFF', '2025-04-21 14:58:44', '2025-04-21 14:58:44'),
(16, 'Ahsan Shawal', 'admin@mysite.com', 'Software Engineer', 'GTHHRHTY', '2025-04-21 15:02:17', '2025-04-21 15:02:17'),
(17, 'Asss', 'asad12@gmail.com', 'Mollit quidem irure', 'vdfsvdfvd', '2025-04-21 15:10:40', '2025-04-21 15:10:40'),
(18, 'asaqi', 'lapoxuze@mailinator.com', 'Mollit quidem irure', 'svvvdsdfv', '2025-04-21 15:11:37', '2025-04-21 15:11:37'),
(19, 'Zahid sir', 'zarrs@gmail.com', 'Software developer', 'asfggdgfgd', '2025-04-22 00:56:23', '2025-04-22 00:56:23'),
(20, 'Ahsan Shawal', 'admin@mysite.com', 'aaaa', 'jkjkj', '2025-04-22 00:58:56', '2025-04-22 00:58:56'),
(21, 'zahid', 'zHIDUM@gmail.com', 'asdsd', 'mnkljdkld', '2025-04-22 01:07:22', '2025-04-22 01:07:22'),
(22, 'zahid2', 'zHIDUM@gmail2.com', 'asdsd', 'mnkljdkld', '2025-04-22 01:12:03', '2025-04-22 01:12:03'),
(23, 'zahid2', 'zHIDUM4@gmail2.com', 'asdsd', 'mnkljdkld', '2025-04-22 01:21:05', '2025-04-22 01:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_08_120029_create_admins_table', 1),
(5, '2025_04_09_081021_create_sessions_table', 1),
(6, '2025_04_09_130415_add_remember_token_to_users_table', 1),
(7, '2025_04_10_060600_create_packages_table', 1),
(8, '2025_04_10_060605_create_user_packages_table', 1),
(9, '2025_04_10_114100_create_subscriptions_table', 2),
(10, '2025_04_10_125056_create_subscriptions_table', 3),
(11, '2025_04_18_194037_create_personal_access_tokens_table', 4),
(12, '2025_04_19_100645_add_google_id_to_users_table', 5),
(13, '2025_04_21_171757_create_contacts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `duration_days`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Monthly Package', 30, 500.00, '2025-04-10 03:10:57', '2025-04-10 03:10:57'),
(2, '2 Month', 60, 1000.00, '2025-04-22 06:38:41', '2025-04-22 11:36:42'),
(3, '4 month', 120, 1500.00, '2025-04-22 11:41:52', '2025-04-22 11:41:52'),
(4, 'Six-Month Package', 180, 2500.00, '2025-04-10 03:10:57', '2025-04-10 03:10:57'),
(5, 'Yearly Package', 365, 5000.00, '2025-04-21 03:52:45', '2025-04-22 11:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment_screenshot` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `package_id`, `start_date`, `end_date`, `payment_screenshot`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(15, 2, 4, '2025-04-21', '2025-10-18', 'screenshots/1745222085_6805f9c5577da.jpg', 'jazz_cash', 'approved', '2025-04-21 02:54:45', '2025-04-21 04:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `google_id`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Ahsan', 'Mirza', 'ahsan123@gmail.com', '$2y$12$GStONMtW85B38JAqa1GfreoOiPgkMICkWTEQK6ZEmPNhw7vZFpJGq', NULL, 'admin', '2025-04-10 04:03:23', '2025-04-22 05:03:36', 'xFXXm4hmvHcglnJEQAZ94MqR6vJOehYbG2IhUAn72kFSCgSRXDMUNzfOM7M3'),
(2, 'naresh', 'kumar', 'naresh12@gmail.com', '$2y$12$iC/K0TaCVOHh7wkmfMRlTextQORvH0AKXV8Dxt5HxM4Q3LDkLcs.q', NULL, 'user', '2025-04-10 05:53:47', '2025-04-10 05:53:47', 'emLg8xMTLOemXQAuFLjEuehiDVSuejvf1SdVUDBwzuf9O05LLPGRUn14fhGR'),
(6, 'zahid', 'khurshid', 'zaars@gmail.com', '$2y$12$rR0r3heMhdwkyGSWrP5pBuQRUv/HYxPuO.nhqE9wNsRHZeqANV6ee', NULL, 'user', '2025-04-22 04:03:52', '2025-04-22 05:06:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_package_id_foreign` (`package_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
