-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 10:36 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `document_pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `initials`, `created_at`, `updated_at`, `user_id`, `document_pdf`) VALUES
(1, 'Niyaz\'s HW', 'NbH', '2018-03-31 23:47:49', '2018-03-31 23:47:49', 1, '1801CSE323Assignment01_1522561669.pdf'),
(2, 'hello', 'dpz', '2018-04-01 08:41:26', '2018-04-01 08:41:26', 2, '1801CSE323Assignment01_1522593686.pdf'),
(3, 'Test HW 123', '123', '2018-04-04 11:12:53', '2018-04-04 11:12:53', 6, '1801CSE323Assignment01_1522861973.pdf'),
(4, 'DIPANZAN\'s DOCUMENT', 'DDD', '2018-04-05 05:44:59', '2018-04-05 05:44:59', 7, '1801CSE323Assignment01_1522928698.pdf'),
(5, 'DOCUMENT 2', 'DDDDDD', '2018-04-05 05:47:05', '2018-04-05 05:47:05', 7, '1801CSE323Assignment01_1522928825.pdf'),
(6, 'Arefin\'s Document', 'RAB', '2018-04-08 08:40:14', '2018-04-08 08:40:14', 11, 'Themes Mid 2_1523198414.pdf'),
(7, 'PDF', 'NbH', '2018-04-08 14:01:49', '2018-04-08 14:01:49', 8, 'pdf_1523217708.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_30_140901_create_documents_table', 1),
(4, '2018_03_31_061205_add_user_id_to_documents', 2),
(5, '2018_03_31_073707_add_document_pdf_to_documents', 3),
(7, '2018_04_01_124319_create_social_providers_table', 4),
(8, '2018_04_04_163610_create_social_providers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 5, '12604904', 'github', '2018-04-05 04:28:33', '2018-04-05 04:28:33'),
(2, 7, '101518497115765662418', 'google', '2018-04-05 04:30:28', '2018-04-05 04:30:28'),
(3, 8, '103304705814527517325', 'google', '2018-04-05 06:09:01', '2018-04-05 06:09:01'),
(4, 12, '117248060394436911986', 'google', '2018-04-08 10:53:13', '2018-04-08 10:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niyaz', 'niyaz@gmail.com', '$2y$10$qvyU73almLkah4YH/siG6ObApnKgc7vMIc68K8mj4i81SSd3ENaKm', '8rtiVAQFtprYm6YXt8DfdZEwX2Jxb0Xcu6bgqCa2LLvpgF0Tg77eyomr1XBC', '2018-03-31 23:47:13', '2018-03-31 23:47:13'),
(5, 'Dipanzan Islam', 'dipanzan@live.com', '', '11hknWJcK22TxR8gq7VSCHSk6OUsYkqE9upXBEAsBrZ07tXRe8hESBcvlt8v', '2018-04-04 10:02:42', '2018-04-04 10:02:42'),
(6, 'Test 123', 'testing@gmail.com', '$2y$10$SYbBoFaoFyMdpDbHdVTLeuGLdAybaRlDTqKWmTqPxCk6e4bSun9rS', 'iIeWlmFmuWJx7XWuvaXY8twKqlGj5MGSv6rupIkiC6x1cRWXUKVpz1FxR4uI', '2018-04-04 11:09:16', '2018-04-04 11:09:16'),
(7, 'Dipanzan Islam', 'dipanzan@gmail.com', '', '6AyvdNzDZBVQG7EJqGw999uRNRuJ5RgFEdVOYdTYkD7ZGL6H2mMjdXP7zXTK', '2018-04-05 04:30:28', '2018-04-05 04:30:28'),
(8, 'Niyaz Bin Hashem', 'niyazbinhashem@gmail.com', '', 'eRxdeN6yzAifUXt6wSqetr6OQ9tSLnzbJBMM6ulnBPtLYBfxJxoaeyY0Y47t', '2018-04-05 06:09:00', '2018-04-05 06:09:00'),
(9, 'Griffin Erdman', 'wanda.sporer@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'yIDg99YLuM', '2018-04-07 07:11:33', '2018-04-07 07:11:33'),
(10, 'Abir', 'abir@gmail.com', '$2y$10$qTkl1AbT6CTpG0wMmRJrPeRFtOvVYMgOq.3B/zXhxt.9TYS6iqDNO', 'tNeVYWsQGh065vsEIRcBR7MShEKaZWjugp9tLFb4tfvdMfMkCX9nlJDzf5Sz', '2018-04-07 07:17:12', '2018-04-07 07:17:12'),
(11, 'Rifat Arefin', 'rifat@gmail.com', '$2y$10$RbrMk9XMMaosc7de1X9pU.ie2TZsbRJHFcLJKIm8gD8HJP3E4EMw6', 'eCWzxzMSGlJv7sKOS5qSvv80iYAkIcVslPdGSNqObBYy6R6y6BhG0lOwsdyC', '2018-04-08 08:39:36', '2018-04-08 08:39:36'),
(12, 'Rifat Badhon', 'rarefinb@gmail.com', '', 'wZKh3tvDVQcCrLRtyvO5Q9pEMszcSXV9Phr1YrHPwZfcVRVyiq0FhlRVnMqV', '2018-04-08 10:53:13', '2018-04-08 10:53:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
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
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
