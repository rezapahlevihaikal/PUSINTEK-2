-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 14 Agu 2019 pada 01.22
-- Versi Server: 5.7.19
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusintek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `nama_gedung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai_gedung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `created_by`, `nama_gedung`, `lantai_gedung`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 4, 'Gedung Djuanda', '8', 'Betulin Kabel LAN', '2019-08-13 00:28:13', '2019-08-13 00:28:13'),
(5, 4, 'PUSINTEK', '3', '-', '2019-08-13 00:47:09', '2019-08-13 00:47:09'),
(6, 1, 'LPDP', '4', 'Pasang Jaringan LAN', '2019-08-13 00:48:36', '2019-08-13 00:48:36'),
(7, 1, 'PUSINTEK', '3', '-', '2019-08-13 00:50:10', '2019-08-13 00:50:10'),
(8, 1, 'Gedung OJK', '5', 'Ada Kerjaan Pokoknya', '2019-08-13 01:08:14', '2019-08-13 01:08:14'),
(9, 7, 'PUSINTEK', '3', '-', '2019-08-13 01:29:51', '2019-08-13 01:29:51'),
(10, 7, '-', '-', '-', '2019-08-13 01:32:36', '2019-08-13 01:32:36'),
(11, 8, 'DJUANDA', '10', 'Benerin Printer', '2019-08-13 01:39:35', '2019-08-13 01:39:35'),
(12, 9, 'PuSinTek', '3', '-', '2019-08-13 01:41:32', '2019-08-13 01:41:32'),
(13, 10, 'pusintek', '3', '-', '2019-08-13 01:43:25', '2019-08-13 01:43:25'),
(14, 11, 'pusintek', '3', '-', '2019-08-13 01:58:02', '2019-08-13 01:58:02'),
(15, 12, 'pusintek', '3', '-', '2019-08-13 02:01:12', '2019-08-13 02:01:12'),
(16, 13, 'pusintek', '3', '-', '2019-08-13 02:03:35', '2019-08-13 02:03:35'),
(17, 4, '-', '-', '-', '2019-08-13 02:51:45', '2019-08-13 02:51:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_05_071104_create_roles_table', 1),
(4, '2019_08_07_081856_add_role_id_to_users', 1),
(5, '2019_08_07_022054_create_locations_table', 2),
(6, '2019_08_09_031504_add_image_to_users', 3),
(7, '2019_08_09_041317_create_loc_manage_table', 4),
(8, '2019_08_13_065054_add_user_id_to_locations', 5),
(9, '2019_08_13_065419_add_status_location_to_users', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'admin', '2019-08-08 01:05:16', '2019-08-08 01:05:16'),
(4, 'programmer', '2019-08-08 01:10:57', '2019-08-08 01:10:57'),
(5, 'staff', '2019-08-08 01:11:07', '2019-08-08 01:11:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `image`, `status`, `location`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'reza pahlevi haikal', 'reza@admin.com', 3, '1565579342.jpg', 2, 'Gedung OJK', '$2y$10$QyjODWCE//1moSxAsRf/QO7NB8CypME03Q4U.Iy6z5P206gjnVh/a', 'Wzg4uF3XOiucP4sCDkb8x4b5ipqHro9Jole27JxpqDsMuDuuyYSlZq41Fnwb', '2019-08-08 01:02:48', '2019-08-13 01:08:14'),
(4, 'pria aji setya negoro', 'priaaji@admin.com', 3, '1565578959.png', 3, '-', '$2y$10$X8moLk0VtHMoc6KaMR8gJu91imiRHDQvS5e2/YGUq/mKyPFE8NU0K', 'nKGXl88imEStp9NgOsnyJerSjrmou9DZv9KCVQBJhXbK1aaoYRsL0vhCAq2d', '2019-08-08 18:44:13', '2019-08-13 02:51:45'),
(7, 'mr. bean', 'bean@gmail.com', 5, '1565343936.jpg', 3, '-', '$2y$10$mclJAt7PCUxVr6i6ytQx0.zxtF05WYURCe5JrozwExLjalRCcYsA6', 'jJtFwWRyzcsB2tRfHrWeNYrLgYtUihOlzfOsWJWEZ5OoPcMzpSzZHAiooPy4', '2019-08-09 00:13:35', '2019-08-13 01:32:36'),
(8, 'Mayana Evendy', 'maya@evendy.com', 4, '1565579459.jpg', 2, 'DJUANDA', '$2y$10$C5BnHZJMfE2nzqj6eggabOaRk9D78HyVW7KqnMhUBq7uR2tapDz/a', 'uGTjqhwKbt0ZNYT988LeRmTzlcWL2j8Rs6u7mQf6QdBzMLrl0NIaKNDpojGs', '2019-08-11 20:10:59', '2019-08-13 01:39:35'),
(9, 'MUHAMMAD DHERRY AULIA DHARMAWAN', 'derry@gmail.com', 5, '1565580116.jpg', 1, 'PuSinTek', '$2y$10$NVVc0mVmMtSRw9/fIVAL2.lYKrY33MkdkFAyeAbggDfNJk8D1SEhW', 'oreVzoyufW2bD8cRrC8AStU51ABnWoKMHwkTbVO9dc98nPhmgavCog7kMIXD', '2019-08-11 20:21:56', '2019-08-13 01:41:32'),
(10, 'ADAM MUHAMMAD GALIB', 'golib@yahoo.com', 5, '1565580273.jpg', 1, 'pusintek', '$2y$10$.J3JQblmfRFYgLsU5w6pi.8k8Cf7oWtr32i2KksH0DTjBh1pMCwHS', 'ZyEzrSf0dq3QFL6eEBBeBqYpG56IAVqCNi2wMJPw5xT0Di69Tb4dfPYwvZf2', '2019-08-11 20:24:33', '2019-08-13 01:43:25'),
(11, 'IMAM RAMADHAN', 'imam@yahoo.com', 4, '1565580981.png', 1, 'pusintek', '$2y$10$LpLh.71tXtCVmo9.lXEC.u0p.VS6nLtMpx4XmNlmkRW3rHi1yq5pu', 'ZInZF8EXqciMVB8APzX3LC0QDcHghxrI64WW0bsF7jiCOIEqPbBHB7I5L5W8', '2019-08-11 20:33:15', '2019-08-13 01:58:02'),
(12, 'DIO PANGESTU PRAKOSO', 'dio@pangestu.com', 5, '1565671124.jpg', 1, 'pusintek', '$2y$10$ph0OZlHaBM2zYhQkIso/l.AvFj5Mj7yjb1bKMoo6fiyLAjnBsgEci', 'eRwbgWH0Q9PSHoArnC4z8h8GWM2BpXUvYfSmTlbQUxy8lS0kUq9LyGKVtZmN', '2019-08-12 21:38:44', '2019-08-13 02:01:12'),
(13, 'ZIKRI DARMAWAN', 'zikri@darmawan.com', 4, '1565671508.jpg', 1, 'pusintek', '$2y$10$i5ROXw5M7VSaatQ3rv5HPeG5wumF2wZ7MZOcARcK9i8fIYBKHJclu', 'VDaD4uopHDHcZ9Ol5UygI0Sy1bu0E9d8MA2sobLgHNoBfbprwQNdRb4CHOHM', '2019-08-12 21:45:08', '2019-08-13 02:03:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
