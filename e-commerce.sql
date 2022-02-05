-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 12:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(3, 'แว่นตาผู้ชาย', '2022-02-01 10:56:46', NULL),
(5, 'กางเกงผู้ชาย', '2022-02-01 10:56:52', NULL),
(6, 'กางเกงผู้หญิง', '2022-02-01 10:56:56', NULL),
(7, 'รองเท้าผู้ชาย', '2022-02-01 10:57:01', NULL),
(8, 'รองเท้าผู้หญิง', '2022-02-01 10:57:05', NULL),
(13, 'เสื้อผ้าผู้ชาย', '2022-02-01 11:16:32', NULL),
(14, 'เสื้อผ้าผู้หญิง', '2022-02-01 11:16:50', NULL),
(16, 'นาฬิกาผู้หญิง', '2022-02-01 11:20:13', NULL),
(27, 'เสื้อผ้าผู้ชายนะ', '2022-02-04 10:09:07', NULL),
(28, 'ของเด็กเล่น', '2022-02-04 10:20:21', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(5, '2022_01_31_111203_create_products_table', 1),
(6, '2022_02_01_173120_create_categories_table', 1),
(7, '2022_02_01_174010_create_orders', 1),
(9, '2022_02_01_175408_create_order_items', 2),
(10, '2022_02_01_201730_add_userid_field', 3),
(11, '2022_02_01_215919_add_quantity_field', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `item_id`, `order_id`, `item_name`, `item_price`, `quantity`, `item_image`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 6, 7, 'รองเท้าแบรนด์เนม', '500.00', 2, 'images/products/1723584719583441.jfif', 2, NULL, NULL),
(12, 10, 8, 'เสื้อเท่ๆ', '999.00', 1, 'images/products/1723585832300199.jpg', 2, NULL, NULL),
(13, 5, 9, 'กางเกงเท่ๆ', '700.00', 10, 'images/products/1723584692268368.jpg', 2, NULL, NULL),
(14, 5, 10, 'กางเกงเท่ๆ', '700.00', 10, 'images/products/1723584692268368.jpg', 2, NULL, NULL),
(15, 5, 11, 'กางเกงเท่ๆ', '700.00', 10, 'images/products/1723584692268368.jpg', 2, NULL, NULL),
(16, 15, 12, 'นาฬิกาสวยๆ', '1000.00', 10, 'images/products/1723854027765319.jpg', 3, NULL, NULL),
(17, 6, 13, 'รองเท้าแบรนด์เนม', '500.00', 1, 'images/products/1723584719583441.jfif', 2, NULL, NULL),
(18, 9, 13, 'เสื้อหนังสัตว์', '200.00', 1, 'images/products/1723585757675701.jfif', 2, NULL, NULL),
(19, 11, 13, 'เสื้อผ้าใหม', '450.00', 1, 'images/products/1723585853485090.jfif', 2, NULL, NULL),
(20, 7, 14, 'รองเท้าสวย', '2000.00', 1, 'images/products/1723584738152276.jfif', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_date` date NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `price`, `status`, `del_date`, `fname`, `lname`, `address`, `phone`, `zipcode`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(7, '2002-02-22', '1000.00', 'Not Paid', '2002-02-22', 'จัตตุดนัย', 'กิตติชัยพัฒน์', '60/5 ม.4 ต.ในเมือง อ.เมือง จ.กาญจนบุรี', '0915589742', '71000', 'user@gmail.com', 2, NULL, NULL),
(8, '2003-02-22', '999.00', 'complete', '2003-02-22', 'john', 'doe', '60/8 กรุงเทพมหานคร', '0987502364', '70190', 'user@gmail.com', 2, NULL, NULL),
(9, '2004-02-22', '7000.00', 'Not Paid', '2004-02-22', 'Phannida', 'Kamphet', '50/12', '0517852648', '61409', 'juttudanai@gmail.com', 2, NULL, NULL),
(10, '2004-02-22', '7000.00', 'Not Paid', '2004-02-22', 'Phannida', 'Juttudanai', '9/42', '0615502361', '71000', 'juttudanai@gmail.com', 2, NULL, NULL),
(11, '2004-02-22', '7000.00', 'complete', '2004-02-22', 'surasit', 'doe', '80/1', '0816932874', '78000', 'user@gmail.com', 2, NULL, NULL),
(12, '2005-02-22', '10000.00', 'complete', '2005-02-22', 'john', 'doe', '56/61', '0123456789', '68241', 'user02@gmail.com', 3, NULL, NULL),
(13, '2005-02-22', '1150.00', 'complete', '2005-02-22', 'นาย ทดสอบ', 'ชำระเงิน', '123/987', '0649802578', '12345', 'user@gmail.com', 2, NULL, NULL),
(14, '2005-02-22', '2000.00', 'complete', '2005-02-22', 'user', 'test', '9/58', '0748853269', '10190', 'user@gmail.com', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$EplOGijTq0IXboQinTMRruiso8vdh0ZOXD7LBgoG9O.ZMkKpCuQMW', '2022-02-03 01:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `paypal_order_id` text NOT NULL,
  `payer_id` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `amount`, `paypal_order_id`, `payer_id`, `order_id`) VALUES
(1, '2003-02-22', '999', '2UL06496V43026421', 'BBWF347N6S6W4', 8),
(2, '2004-02-22', '7000', '3X4743332L0436307', 'BBWF347N6S6W4', 11),
(3, '2005-02-22', '10000', '5FE129012N4088030', 'BBWF347N6S6W4', 12),
(4, '2005-02-22', '1150', '3VF92041MC787642P', 'BBWF347N6S6W4', 13),
(5, '2005-02-22', '2000', '85E740839E365550X', 'BBWF347N6S6W4', 14);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `category_id`, `product_image`, `created_at`, `updated_at`) VALUES
(3, 'กางเกงน่ารัก', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias nobis doloremque? Dolores tempore, exercitationem qui maiores labore amet dolore, dignissimos odit id distinctio nulla inventore optio. Laudantium, doloribus! Voluptatibus?', '890.00', 6, 'images/products/1723584645860618.jfif', NULL, NULL),
(4, 'กางเกงขาสั้น', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias nobis doloremque? Dolores tempore, exercitationem qui maiores labore amet dolore, dignissimos odit id distinctio nulla inventore optio. Laudantium, doloribus! Voluptatibus?', '450.00', 6, 'images/products/1723584667779677.jpg', NULL, NULL),
(5, 'กางเกงเท่ๆ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias nobis doloremque? Dolores tempore, exercitationem qui maiores labore amet dolore, dignissimos odit id distinctio nulla inventore optio. Laudantium, doloribus! Voluptatibus?', '700.00', 5, 'images/products/1723584692268368.jpg', NULL, NULL),
(6, 'รองเท้าแบรนด์เนม', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias nobis doloremque? Dolores tempore, exercitationem qui maiores labore amet dolore, dignissimos odit id distinctio nulla inventore optio. Laudantium, doloribus! Voluptatibus?', '500.00', 7, 'images/products/1723584719583441.jfif', NULL, NULL),
(7, 'รองเท้าสวย', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias nobis doloremque? Dolores tempore, exercitationem qui maiores labore amet dolore, dignissimos odit id distinctio nulla inventore optio. Laudantium, doloribus! Voluptatibus?', '2000.00', 8, 'images/products/1723584738152276.jfif', NULL, NULL),
(8, 'เสื้อผ้าแบรนด์เนม', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium repellendus earum repellat? Est debitis ex harum ratione dignissimos minima libero, vel maxime rem iste explicabo! Quod iusto facere repudiandae qui.', '3000.00', 14, 'images/products/1723585741816755.jfif', NULL, NULL),
(9, 'เสื้อหนังสัตว์', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium repellendus earum repellat? Est debitis ex harum ratione dignissimos minima libero, vel maxime rem iste explicabo! Quod iusto facere repudiandae qui.', '200.00', 13, 'images/products/1723585757675701.jfif', NULL, NULL),
(10, 'เสื้อเท่ๆ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium repellendus earum repellat? Est debitis ex harum ratione dignissimos minima libero, vel maxime rem iste explicabo! Quod iusto facere repudiandae qui.', '999.00', 13, 'images/products/1723585832300199.jpg', NULL, '2022-02-01 11:19:00'),
(11, 'เสื้อผ้าใหม', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium repellendus earum repellat? Est debitis ex harum ratione dignissimos minima libero, vel maxime rem iste explicabo! Quod iusto facere repudiandae qui.', '450.00', 14, 'images/products/1723585853485090.jfif', NULL, NULL),
(15, 'นาฬิกาสวยๆ', 'สวยนะ จะบอกให้', '1000.00', 16, 'images/products/1723854027765319.jpg', NULL, NULL),
(16, 'รองเท้าเก๋ๆ', 'ใส่หมอเท่เสมอ', '2000.00', 8, 'images/products/1723923269884622.jfif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, NULL, '$2y$10$1qzzvLB25XrXDwi3M.ppwO0pKLVlJj68ByvwmDox1.Pi/GcszrNVy', NULL, '2022-02-01 10:55:16', '2022-02-04 10:27:10'),
(2, 'user', 'user@gmail.com', 0, NULL, '$2y$10$PxjBomKBbzF1Fbr5a.06R.zPRvXHCnuz8Llos1/Vij/uGNemoY65W', NULL, '2022-02-01 10:56:14', '2022-02-04 12:14:31'),
(3, 'user02', 'user02@gmail.com', 0, NULL, '$2y$10$oBw4Pdyd4MsyJePhvceVOukmklEUfCqTvH3ToNqr/TXvwXA8YthdG', NULL, '2022-02-01 14:08:49', '2022-02-01 14:08:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
