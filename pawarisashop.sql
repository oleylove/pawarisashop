-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 04:59 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawarisashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `freeshipping` int(11) NOT NULL DEFAULT 1000,
  `shipping` int(11) NOT NULL DEFAULT 100,
  `bbl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bbl_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'config',
  `kbsnk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kbsnk_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'config',
  `scb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scb_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'config',
  `bay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bay_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'config',
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `title`, `website`, `facebook`, `line`, `address`, `phone`, `freeshipping`, `shipping`, `bbl`, `bbl_logo`, `kbsnk`, `kbsnk_logo`, `scb`, `scb_logo`, `bay`, `bay_logo`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Pawarisa-Shop', 'https://pawarisa-shop.com', 'https://www.facebook.com', '@line', 'KhaoPan Shop 30/13 หมู่3 ตำลบคลองหนึ่ง อำเภคลองหลวง จังหวัดปทุมธานี รหัสไปรษณีย์ 12120', '088-328-8235', 1000, 100, 'เลขบัญชี 036-5-XXXXX-6  ชื่่อบัญชี Pawarisa Shop สาขา กรุงเทพมหานคร', 'config/bbl_logo.png', 'เลขบัญชี 036-5-XXXXX-6  ชื่่อบัญชี Pawarisa Shop สาขา กรุงเทพมหานคร', 'config/kbsnk_logo.png', 'เลขบัญชี 036-5-XXXXX-6  ชื่่อบัญชี Pawarisa Shop สาขา กรุงเทพมหานคร', 'config/scb_logo.png', 'เลขบัญชี 036-5-XXXXX-6  ชื่่อบัญชี Pawarisa Shop สาขา กรุงเทพมหานคร', 'config/bay_logo.png', 'config.png', '2020-09-07 10:43:55', '2020-09-07 10:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสบัญชี',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันลงบัญชี',
  `income` double(8,2) NOT NULL COMMENT 'เงินได้',
  `refer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อ้างอิง',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `date`, `income`, `refer`, `created_at`, `updated_at`) VALUES
(5, '2020-09-08 12:42:33', -1089.00, 'ซื้อสินค้า', '2020-09-08 12:42:33', '2020-09-08 12:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสโหวต',
  `user_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `prod_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `likes` int(11) NOT NULL COMMENT 'ถูกใจ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4, '2020_07_28_103749_create_orders_table', 1),
(5, '2020_07_28_103911_create_products_table', 1),
(6, '2020_07_28_104010_create_profiles_table', 1),
(7, '2020_07_28_104018_create_votes_table', 1),
(8, '2020_07_28_113626_create_configs_table', 1),
(9, '2020_08_04_083852_create_reviews_table', 1),
(10, '2020_08_04_193915_create_order_products_table', 1),
(11, '2020_08_04_213327_create_wishlists_table', 1),
(12, '2020_08_15_051700_create_incomes_table', 1),
(13, '2020_08_15_203513_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสออเดอร์',
  `inc_id` int(11) DEFAULT NULL COMMENT 'รหัสบัญชี',
  `user_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `shipping` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ค่าจัดส่ง',
  `price` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ราคารวม',
  `disc` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ส่วนลด',
  `net` double(8,2) NOT NULL COMMENT 'รวมจ่าย',
  `tracking` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขพัสดุ',
  `score_total` int(11) NOT NULL DEFAULT 0 COMMENT 'แต้มสะสม',
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะจัดส่ง',
  `slip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สลิป',
  `paid_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาชำระเงิน',
  `checking_at` timestamp NULL DEFAULT NULL COMMENT 'เวลายืนยันชำระเงิน',
  `sent_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาจัดส่ง',
  `completed_at` timestamp NULL DEFAULT NULL COMMENT 'เวลารับสินค้า',
  `cancelled_at` timestamp NULL DEFAULT NULL COMMENT 'เวลายกเลิก',
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่อยู่จัดส่ง',
  `consignee` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'คนรับของ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัส OrderDtl',
  `user_id` int(11) DEFAULT NULL COMMENT 'รหหัสลูกค้า',
  `prod_id` int(11) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `po_id` int(11) DEFAULT NULL COMMENT 'รหัส Order',
  `qty` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `price` double(8,2) DEFAULT NULL COMMENT 'ราคารวม',
  `disc` double(8,2) DEFAULT NULL COMMENT 'ส่วนลด',
  `net` double(8,2) DEFAULT NULL COMMENT 'จ่ายสุทธิ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสสินค้า',
  `inc_id` int(11) DEFAULT NULL COMMENT 'รหัสบัญชี',
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'โค้ดสินค้า',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `size` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ขนาด',
  `color` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สี',
  `price` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ราคา',
  `cost` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ต้นทุน',
  `disc` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ส่วนลด',
  `sold` int(11) NOT NULL DEFAULT 0 COMMENT 'ขายไปแล้ว',
  `photo1` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'photo1' COMMENT 'รูป1',
  `photo2` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'photo2' COMMENT 'รูป2',
  `photo3` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'photo3' COMMENT 'รูป3',
  `qty` int(11) NOT NULL DEFAULT 0 COMMENT 'จำนวน',
  `hot` int(11) NOT NULL DEFAULT 0 COMMENT 'มาใหม่',
  `likes` int(11) NOT NULL DEFAULT 0 COMMENT 'ถูกใจ',
  `view` int(11) NOT NULL DEFAULT 0 COMMENT 'ยอดวิว',
  `vote` int(11) NOT NULL DEFAULT 0 COMMENT 'คะแนนโหวต',
  `score` int(11) NOT NULL DEFAULT 0 COMMENT 'คะแนนรวม',
  `rating` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'ควมนิยม',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ขาย' COMMENT 'สถานะสินค้า',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `inc_id`, `code`, `name`, `content`, `size`, `color`, `price`, `cost`, `disc`, `sold`, `photo1`, `photo2`, `photo3`, `qty`, `hot`, `likes`, `view`, `vote`, `score`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'D200', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 10.00, 0, 'products/1-photo1.jpg', 'products/1-photo2.jpg', 'products/1-photo3.jpg', 7, 1, 0, 55, 0, 0, 0.00, 'ขาย', '2020-09-07 11:04:24', '2020-10-11 05:47:37'),
(2, 0, 'D200', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 0.00, 0, 'products/2-photo1.jpg', 'products/2-photo2.jpg', 'products/2-photo3.jpg', 9, 1, 0, 25, 0, 0, 0.00, 'ขาย', '2020-09-07 11:04:24', '2020-10-11 05:47:49'),
(3, 0, 'D201', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 0.00, 0, 'products/3-photo1.jpg', 'products/3-photo2.jpg', 'products/3-photo3.jpg', 10, 1, 0, 4, 0, 0, 0.00, 'ขาย', '2020-09-07 11:04:24', '2021-01-16 10:21:09'),
(4, 0, 'D201', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 20.00, 0, 'products/4-photo1.jpg', 'products/4-photo2.jpg', 'products/4-photo3.jpg', 10, 1, 0, 1, 0, 0, 0.00, 'ขาย', '2020-09-07 11:04:24', '2020-09-08 05:56:01'),
(5, 0, 'D202', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 5.00, 0, 'products/5-photo1.jpg', 'products/5-photo2.jpg', 'products/5-photo3.jpg', 10, 1, 0, 0, 0, 0, 0.00, 'ขาย', '2020-09-07 11:04:24', '2020-09-08 05:15:31'),
(6, 0, 'D202', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 0.00, 0, 'products/6-photo1.jpg', 'products/6-photo2.jpg', 'products/6-photo3.jpg', 10, 1, 0, 1, 0, 0, 0.00, 'ขาย', '2020-09-07 11:04:24', '2020-10-11 05:48:00'),
(7, 0, 'D200', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 10.00, 0, 'products/7-photo1.jpg', 'products/7-photo2.jpg', 'products/7-photo3.jpg', 8, 1, 0, 35, 0, 0, 0.00, 'ขาย', '2020-09-07 04:04:24', '2020-09-07 22:27:34'),
(8, 0, 'D200', 'กางเกงยีนส์แฟชั่น', 'กางเกงยีนส์ ขายาวระบายฟรุ้งฟริ้ง เอวสูง ทรงกระบอกใหญ่ ตกแต่งกระดุมด้านหน้า กางเกงยีนส์ผู้หญิงแฟชั่น', 'XL', 'ชมพู', 250.00, 0.00, 0.00, 0, 'products/8-photo1.jpg', 'products/8-photo2.jpg', 'products/8-photo3.jpg', 9, 1, 0, 20, 0, 0, 0.00, 'ขาย', '2020-09-07 04:04:24', '2020-09-07 22:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสโปรไฟล์',
  `user_id` int(11) DEFAULT NULL COMMENT 'รหัสลูกค้า',
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทร',
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่อยู่',
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สำหรับจัดส่งสินค้า',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสคิดเห็น',
  `user_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `prod_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `comment` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ความเห็น',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest',
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'users/user.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `score_total` int(11) NOT NULL DEFAULT 50,
  `score_used` int(11) NOT NULL DEFAULT 50,
  `score_usable` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `photo`, `email_verified_at`, `password`, `score_total`, `score_used`, `score_usable`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pawarisa', 'pawarisa.shop2020@gmail.com', 'admin', 'users/user.png', NULL, '$2y$10$hKt8EL6HWewzo.ztokLg1.Sl2ndW59czsbpTGWZgmRFybqjBtqBLW', 50, 50, 0, 'M9OcmWEIXYxWSgoRy5oYeZ794jNzw5JQEFDOjWQjtDp1NI20FOjoHbJ0J7UC', '2020-09-07 10:43:40', '2020-09-07 10:43:40'),
(3, 'นิติกร หงษาพุทธ', 'nitikorn@gmail.com', 'guest', 'users/user.png', NULL, '$2y$10$sn5IFKKIu5BcmILpNahXqeE4j19gf1OkCkH0ss.kZY.ip1zi5FOyC', 50, 50, 0, NULL, '2020-09-08 13:27:46', '2020-09-08 13:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสโหวต',
  `user_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `prod_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `score` int(11) NOT NULL COMMENT 'คะแนน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัส',
  `user_id` int(11) DEFAULT NULL COMMENT 'รหหัสลูกค้า',
  `prod_id` int(11) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '2021-01-19 03:59:26', '2021-01-19 03:59:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสบัญชี', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสโหวต';

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสออเดอร์', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัส OrderDtl', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสโปรไฟล์', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสคิดเห็น';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสโหวต';

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
