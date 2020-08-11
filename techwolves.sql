-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 08:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techwolves`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Test Name', 'test@test.com', 'Subject Here', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut earum necessitatibus, neque possimus quisquam quo sapiente! Assumenda ea nulla quo sapiente? Blanditiis cum, cupiditate itaque laboriosam quaerat quibusdam ratione.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `fav_id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2020_07_09_064624_create_contacts_table', 1),
(5, '2020_07_09_094725_create_subscriptions_table', 1),
(6, '2020_07_15_080126_create_products_table', 1),
(7, '2020_07_29_123745_create_orders_table', 1),
(8, '2020_08_03_132519_create_favourites_table', 1),
(9, '2020_08_05_152009_create_ratings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orginalPrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountedPrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountRate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productOwnerId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productDescription`, `orginalPrice`, `discountedPrice`, `discountRate`, `categories`, `productImage`, `productOwnerId`, `created_at`, `updated_at`) VALUES
(1, 'Acer Aspire 5', 'Acer Aspire 5 Slim Laptop, 15.6 inches Full HD IPS Display, AMD Ryzen 3 3200U, Vega 3 Graphics, 4GB DDR4, 128GB SSD, Backlit Keyboard, Windows 10 in S Mode, A515-43-R19L,Silver', '50000', '47500', '5', 'laptop', '1597169979.jpg', 2, '2020-07-27 12:18:28', '2020-08-11 18:19:39'),
(2, 'Alienware', 'Alienware - 17.3\" Gaming Laptop - Intel Core i7 - 16GB Memory - NVIDIA GeForce RTX 2070 - 512GB SSD + 1TB+8GB Hybrid Hard Drive - Epic Silver', '124000', '115320', '7', 'laptop', '1597169987.jpg', 2, '2020-07-27 12:19:04', '2020-08-11 18:19:47'),
(3, 'ASUS - ROG GU502GV', 'ASUS - ROG GU502GV 15.6\" Gaming Laptop - Intel Core i7 - 16GB Memory - NVIDIA GeForce RTX 2060 - 1TB SSD + Optane - Brushed Metallic Black', '140000', '131600', '6', 'laptop', '1597169994.jpg', 2, '2020-07-27 12:20:07', '2020-08-11 18:19:54'),
(4, 'MSI - GS66 Stealth', 'MSI - GS66 Stealth 15.6\" Gaming Laptop - Intel Core i7 - 16GB Memory - NVIDIA GeForce RTX 2070 - 1TB Solid State Drive - Core Black', '185000', '175750', '5', 'laptop', '1597170002.jpg', 2, '2020-07-27 12:21:55', '2020-08-11 18:20:02'),
(5, 'iBUYPOWER Gaming PC Computer Desktop', 'iBUYPOWER Gaming PC Computer Desktop Element 9260 (Intel Core i7-9700F 3.0Ghz, NVIDIA GeForce GTX 1660 Ti 6GB, 16GB DDR4, 240GB SSD, 1TB HDD, WiFi & Windows 10 Home) Black', '110000', '107800', '2', 'pc', '1597170013.jpg', 2, '2020-07-27 12:25:26', '2020-08-11 18:20:13'),
(6, 'MECO USB 3.0', 'MECO USB 3.0 32GB 64GB Memory Stick USB Stick Flash Drive Thumb Drive with Key Ring Pen Drive - 32G', '1500', '1350', '10', 'drives', '1597170021.jpg', 2, '2020-07-27 12:26:38', '2020-08-11 18:20:21'),
(7, 'Original Xiaomi Piston', 'Original Xiaomi Piston Basic Edition In-ear Headset Earphone With Mic - Black', '1200', '1080', '10', 'others', '1597170029.jpg', 2, '2020-07-27 12:28:50', '2020-08-11 18:20:29'),
(8, 'Micro USB Magnetic Fast Charging Data Cable', 'FONKEN 3A Micro USB Magnetic Fast Charging Data Cable For Oneplus HUAWEI P30 Xiaomi Redmi Nokia Android Phone - 1M Silver', '1499', '1274.15', '15', 'others', '1597170038.png', 2, '2020-07-27 12:30:49', '2020-08-11 18:20:38'),
(9, 'Acer Aspire Z24-890-UA91 AIO Desktop', 'Acer Aspire Z24-890-UA91 AIO Desktop, 23.8 inches Full HD, 9th Gen Intel Core i5-9400T, 12GB DDR4, 512GB SSD, 802.11ac Wifi, USB 3.1 Type C, Wireless Keyboard and Mouse, Windows 10 Home, Silver', '80000', '74400', '7', 'pc', '1597170047.jpg', 2, '2020-07-27 12:33:50', '2020-08-11 18:20:47'),
(10, 'Samsung 860 QVO 4TB Solid State Drive', 'Samsung 860 QVO 1TB Solid State Drive (MZ-76Q1T0) V-NAND, SATA 6Gb/s, Quality and Value Optimized SSD\r\nAbout this item\r\nVALUE OPTIMIZED SSD: Built with Samsung V-NAND Technology, the 860 QVO SSD gives you huge storage, solid performance and reliability with exceptional value\r\nENHANCED READ WRITE SPEEDS: Sequential read and write performance levels of up to 550MB/s and 520MB/s, respectively\r\nINTELLIGENT TURBOWRITE: Accelerates write speeds and maintains long-term high performance with a larger variable buffer\r\nSECURE ENCRYPTION: Protect data by selecting security options, including AES 256-bit hardware-based encryption compliant with TCG Opal and IEEE 1667\r\nWARRANTY AND COMPATIBILITY: 3-year limited warranty; Interface: SATA 6 Gb/s interface, compatible with SATA 3 Gb/s & SATA 1.5 Gb/s interface', '60000', '55800', '7', 'drives', '1597170056.jpg', 2, '2020-07-27 12:35:39', '2020-08-11 18:20:56'),
(11, 'Nepal Flag Logo Updated', 'Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo Nepal Flag Logo', '500', '500', '0', 'others', '1597170117.jpg', 4, '2020-07-28 00:45:41', '2020-08-11 18:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `r_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test@test.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `telephone`, `address`, `gender`, `password`, `regType`, `profileImage`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'admin@admin.com', NULL, '9843324021', 'Satdobato', 'male', '$2y$10$TgEjl1eVN5KExG99YrAq5OxGzvAvP0Nuy7A8lAKI/5Tghyyn4MhEy', 'ADMIN', 'default.png', 1, '1bq7lb4vCb', '2020-08-11 18:17:46', '2020-08-11 18:17:46'),
(2, 'Devish Baidawar Chhetri', 'devish@gmail.com', NULL, '9843324021', 'Sunakothi', 'male', '$2y$10$xpD023gNny/7RirUKMc3KuPlzib20fULgFVTSZGQEoQbvFbz33g4y', 'seller', '1596456458.jpg', 0, NULL, '2020-07-27 12:14:20', '2020-08-11 18:21:08'),
(3, 'Ronisha Shrestha', 'ronisha@gmail.com', NULL, '9854421254', 'Patan', 'female', '$2y$10$.BK99May80.imh4qu63X2u5iQWiTubngnmSCDLivL1GWYrd2CYhGG', 'buyer', '1596456809.jpg', 0, NULL, '2020-07-27 12:14:20', '2020-07-27 12:14:20'),
(4, 'Niyash Baidawar Chhetri', 'niyash@gmail.com', NULL, '9845521254', 'Subarnapur', 'male', '$2y$10$ZjZcAmpONlOIocXbdUexv.Af3Hi.R4z.KksDgN6M2yO2oKQ5YOukm', 'seller', '1596456808.jpg', 0, NULL, '2020-07-28 00:44:07', '2020-07-28 00:44:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `favourites_userid_foreign` (`userId`),
  ADD KEY `favourites_productid_foreign` (`productId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_productownerid_foreign` (`productOwnerId`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `fav_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `r_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_productownerid_foreign` FOREIGN KEY (`productOwnerId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
