-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 03:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point-sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('food','colddrink','coffee') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `is_admin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'counter manager', 'manager@gmail.com', '$2y$10$SfuxjuKWwKOP7xIkORl4z.LjxWUEWRR.xdLZ3GdgJgcgcWAkWEFFO', '3109488696', '1660907636.png', 'food', 'active', '2022-08-19 06:13:56', '2022-08-19 06:29:21'),
(2, 'kitchen manager', 'kitchen@gmail.com', '$2y$10$kfyjAYDtBCYiXMS2ZiYgHO3UtX4DNo/sk5pLa6sAG/daxphoCajXC', '3109488696', '1661160986.png', 'food', 'active', '2022-08-22 04:36:26', '2022-08-22 04:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Food', 'active', '2022-08-24 06:45:58', '2022-08-24 06:45:58', NULL),
(2, 'Beverages', 'active', '2022-08-24 06:46:39', '2022-08-24 06:46:39', NULL),
(3, 'Desserts', 'active', '2022-08-24 06:50:33', '2022-08-24 06:50:33', NULL),
(4, 'Sides', 'active', '2022-08-25 06:23:09', '2022-08-25 06:25:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_drink` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `image`, `address`, `is_drink`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tauseef Ullah', 'tauseef@gmail.com', '03109488696', '1660909174.png', 'Islamabad', '0', 'active', '2022-08-19 06:30:55', '2022-08-19 06:39:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, '2022_08_16_131059_create_product_images_table', 2),
(18, '2014_10_12_000000_create_users_table', 3),
(19, '2014_10_12_100000_create_password_resets_table', 3),
(20, '2019_08_19_000000_create_failed_jobs_table', 3),
(21, '2022_08_16_082415_create_admins_table', 3),
(22, '2022_08_16_130837_create_products_table', 3),
(23, '2022_08_16_132044_create_categories_table', 3),
(24, '2022_08_17_115626_create_product_images', 3),
(25, '2022_08_18_052016_create_customers_table', 3),
(26, '2022_08_22_110051_create_place_orders_table', 4),
(28, '2022_08_23_050304_create_subcategories_table', 5),
(30, '2022_08_23_052000_create_subcategories_table', 6),
(31, '2022_08_23_083230_create_subcategories_table', 7),
(32, '2022_08_24_062408_create_products_table', 8);

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
-- Table structure for table `place_orders`
--

CREATE TABLE `place_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_drink` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','waiting','ready') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `subcat_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_drink` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cat_id`, `subcat_id`, `price`, `quantity`, `is_drink`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Product1', 3, 11, '250', '2000', '1', 'active', '2022-08-25 02:02:57', '2022-08-26 05:43:15', NULL),
(4, 'Product2', 3, 10, '60', '150', '1', 'active', '2022-08-25 02:03:31', '2022-08-25 02:03:31', NULL),
(5, 'Product3', 2, 6, '80', '130', '0', 'active', '2022-08-25 02:04:06', '2022-08-25 02:04:06', NULL),
(6, 'Product4', 2, 8, '90', '250', '0', 'active', '2022-08-25 02:04:40', '2022-08-25 02:04:40', NULL),
(7, 'Product5', 2, 4, '50', '500', '0', 'active', '2022-08-25 02:06:29', '2022-08-25 02:06:29', NULL),
(8, 'Product6', 1, 1, '110', '60', '1', 'active', '2022-08-25 06:07:09', '2022-08-25 06:07:09', NULL),
(9, 'Product7', 2, 5, '100', '600', '0', 'active', '2022-08-25 23:36:24', '2022-08-25 23:36:24', NULL),
(10, 'Product8', 4, 13, '50', '123', '1', 'active', '2022-08-26 05:53:24', '2022-08-26 05:53:24', NULL),
(11, 'Product9', 3, 12, '200', '10', '1', 'active', '2022-08-26 05:58:06', '2022-08-26 05:58:06', NULL),
(12, 'Product10', 1, 18, '170', '20', '1', 'active', '2022-08-26 05:58:59', '2022-08-26 05:58:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1661405248.jpg', '2022-08-25 00:00:54', '2022-08-25 00:00:54', NULL),
(2, 2, '1661409335.jpg', '2022-08-25 00:03:22', '2022-08-25 00:03:22', NULL),
(3, 3, '1661425102.jpg', '2022-08-25 02:02:57', '2022-08-25 02:02:57', NULL),
(4, 4, '1661411011.jpg', '2022-08-25 02:03:31', '2022-08-25 02:03:31', NULL),
(5, 5, '1661411046.webp', '2022-08-25 02:04:06', '2022-08-25 02:04:06', NULL),
(6, 6, '1661495438.webp', '2022-08-25 02:04:40', '2022-08-25 02:04:40', NULL),
(7, 7, '1661411189.jpg', '2022-08-25 02:06:29', '2022-08-25 02:06:29', NULL),
(8, 8, '1661425629.jpg', '2022-08-25 06:07:09', '2022-08-25 06:07:09', NULL),
(9, 9, '1661488584.webp', '2022-08-25 23:36:24', '2022-08-25 23:36:24', NULL),
(10, 10, '1661511204.jpg', '2022-08-26 05:53:24', '2022-08-26 05:53:24', NULL),
(11, 11, '1661511486.jpg', '2022-08-26 05:58:06', '2022-08-26 05:58:06', NULL),
(12, 12, '1661511539.jpg', '2022-08-26 05:58:59', '2022-08-26 05:58:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cat_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Vegetables', '2022-08-24 06:51:08', '2022-08-24 06:51:08', NULL),
(2, 1, 'Bread and Cereals', '2022-08-24 06:51:26', '2022-08-24 06:51:26', NULL),
(3, 1, 'Diary Foods', '2022-08-24 06:51:58', '2022-08-24 06:51:58', NULL),
(4, 2, 'Mineral Water', '2022-08-24 06:52:34', '2022-08-24 06:52:34', NULL),
(5, 2, 'Milk', '2022-08-24 06:52:45', '2022-08-24 06:52:45', NULL),
(6, 2, 'Green Tea', '2022-08-24 06:53:02', '2022-08-24 06:53:02', NULL),
(7, 2, 'Black Tea', '2022-08-24 06:53:18', '2022-08-24 06:53:18', NULL),
(8, 2, 'Coffee', '2022-08-24 06:53:27', '2022-08-25 07:55:19', NULL),
(9, 3, 'Cakes', '2022-08-24 06:53:51', '2022-08-25 01:12:01', NULL),
(10, 3, 'Cookies', '2022-08-24 06:54:00', '2022-08-24 06:54:00', NULL),
(11, 3, 'Pastries', '2022-08-24 06:54:18', '2022-08-24 06:54:18', NULL),
(12, 3, 'Biscuits', '2022-08-24 06:54:26', '2022-08-24 06:54:26', NULL),
(13, 4, 'Salad', '2022-08-25 06:23:40', '2022-08-25 07:51:58', NULL),
(14, 2, 'Ice Cream', '2022-08-25 07:08:42', '2022-08-25 07:12:39', NULL),
(15, 2, 'Aqua Water', '2022-08-25 07:08:54', '2022-08-25 07:12:15', NULL),
(16, 1, 'Burger', '2022-08-25 07:09:30', '2022-08-25 07:11:38', NULL),
(17, 1, 'Custards', '2022-08-25 07:44:40', '2022-08-25 07:46:03', NULL),
(18, 1, 'Rice', '2022-08-25 07:45:00', '2022-08-25 07:54:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$tHNQmkAWp9Wbg7./WmadhO4iJLLlewFWQ1dydyzA4dDfiruWJjN2C', NULL, '2022-08-19 05:30:01', '2022-08-19 05:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `place_orders`
--
ALTER TABLE `place_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `place_orders`
--
ALTER TABLE `place_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
