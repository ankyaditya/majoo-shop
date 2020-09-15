-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2020 pada 06.13
-- Versi Server: 5.6.14
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `majoo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_14_114241_penyesuaian_table_users', 2),
(4, '2020_09_14_125814_create_table_products', 3),
(5, '2020_09_15_004152_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pesanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_pesanan`, `name`, `phone_number`, `address`, `product_name`, `product_price`, `product_image`, `status`, `order_date`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, '20200915032427253654', 'Anky Aditya P', '082336447445', 'Bandung', 'majoo Pro', 2750000, 'product_images/gw0y94JtkKTW4XmeIeTnruJrZ4ZFhX1ACAyjcRDY.png', 'Verified', '2020-09-15', NULL, NULL, NULL, '2020-09-14 20:24:27', '2020-09-14 20:46:07'),
(7, '20200915040215807819', 'Farhan', '08123456789', 'Jakarta', 'majoo Pro', 2750000, 'product_images/gw0y94JtkKTW4XmeIeTnruJrZ4ZFhX1ACAyjcRDY.png', 'Verified', '2020-09-15', NULL, NULL, NULL, '2020-09-14 21:02:15', '2020-09-14 21:03:43'),
(8, '20200915040325626075', 'Kun', '08987654321', 'Lumajang', 'Keyboard', 500000, 'product_images/3a5Snn7yfcrU9QjOovmjkFZA4LUDAfHxNRfeEdvk.png', 'Not Verified', '2020-09-15', NULL, NULL, NULL, '2020-09-14 21:03:25', '2020-09-14 21:03:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_products_product_name_unique` (`product_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_description`, `product_image`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'majoo Pro', 2750000, 'majoo Pro description', 'product_images/gw0y94JtkKTW4XmeIeTnruJrZ4ZFhX1ACAyjcRDY.png', NULL, NULL, NULL, '2020-09-14 06:06:40', '2020-09-14 15:48:15'),
(2, 'majoo Advance', 2750000, 'majoo Advance', 'product_images/u0PiVBfxzZEvbIpeXnxNYHjll4rGKTyIeNz64qvN.png', NULL, NULL, NULL, '2020-09-14 15:48:50', '2020-09-14 18:14:11'),
(3, 'majoo Lifestyle', 2750000, 'majoo Lifestyle description', 'product_images/3WHleEssOHd9BlrWHxrdPzUxq9pg1eLhDmoDCBUy.png', NULL, NULL, NULL, '2020-09-14 15:49:25', '2020-09-14 15:49:25'),
(4, 'majoo Desktop', 2750000, 'majoo Desktop description', 'product_images/jIyaM0mXkCT5cWE6HqfSgqyUvvpIsbpWUV21VY4T.png', NULL, NULL, NULL, '2020-09-14 15:49:53', '2020-09-14 15:49:53'),
(5, 'Mouse', 100000, 'Mouse description', 'product_images/agu1g2IDZ3MEdMt7DnE5B62ndaID5GTlihTSfMO0.png', NULL, NULL, NULL, '2020-09-14 19:14:54', '2020-09-14 19:42:04'),
(6, 'Printer', 200000, 'Printer description', 'product_images/xYPPpuRfgLnShSZ9CWCvXXLdh60u9fekzsQXwitw.png', NULL, NULL, NULL, '2020-09-14 19:15:32', '2020-09-14 19:42:17'),
(7, 'Smartphone', 300000, 'Smartphone description', 'product_images/MEH2zqxagvLOvAZnr84fTmm2EaLZi8wD715X0jTe.png', NULL, NULL, NULL, '2020-09-14 19:15:58', '2020-09-14 19:42:32'),
(8, 'Laptop', 400000, 'Laptop description', 'product_images/QX1njPCNOPPnMudd3Wj0bV7sF7djTXh3pRyqanba.png', NULL, NULL, NULL, '2020-09-14 19:16:13', '2020-09-14 19:42:42'),
(9, 'Keyboard', 500000, 'Keyboard description', 'product_images/3a5Snn7yfcrU9QjOovmjkFZA4LUDAfHxNRfeEdvk.png', NULL, NULL, NULL, '2020-09-14 19:43:09', '2020-09-14 19:43:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `address`, `phone`, `status`) VALUES
(1, 'Site Administrator', 'admin@majoo.com', '$2y$10$qcG9t2w0vvEXgsxyJQYExu5azDnpTJcfJhxUl6Cg/zvAudKR9krJq', NULL, '2020-09-14 04:50:34', '2020-09-14 04:50:34', 'administrator', '["ADMIN"]', 'Sarmili, Bintaro, Tangerang Selatan', NULL, 'ACTIVE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
