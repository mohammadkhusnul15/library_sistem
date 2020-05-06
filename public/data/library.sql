-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 02.32
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_year` year(4) NOT NULL,
  `rack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pages` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `name`, `jumlah`, `picture`, `author`, `publisher`, `publication_year`, `rack`, `stack`, `total_pages`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Buku Dummy Programming', 100, 'favicon.png', 'Mohammad Khusnul Khuluq', 'Elexmedia Komputindo', 2000, '2', '3', 156, '350000.00', NULL, '2020-05-05 15:20:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_01_01_193651_create_roles_permissions_tables', 1),
(3, '2018_08_01_183154_create_pages_table', 1),
(4, '2018_08_04_122319_create_settings_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_05_04_153146_create_books_table', 1),
(7, '2020_05_04_153328_create_transactions_table', 1),
(8, '2020_05_04_155633_create_activity_log_table', 1),
(9, '2020_05_04_220051_add_data_to_users_table', 2),
(10, '2020_05_05_194042_add_data_to_books_table', 3),
(11, '2020_05_05_195245_add_data_to_transaction_table', 4),
(12, '2020_05_05_220830_add_status_to_transactions_table', 5),
(13, '2020_05_05_221253_add_data_to_transactions_table', 6),
(14, '2020_05_05_223318_add_data_to_users_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pengembalian` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `code_transaction`, `users_id`, `books_id`, `jumlah`, `pengembalian`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mvuVoSXdK2XX7etJUSR-3', 3, 1, 0, '0000-00-00', NULL, '2020-05-04 16:47:27', '2020-05-04 16:47:27'),
(2, 'bGw1CDuLGFmWmtC7USR-4', 4, 1, 0, '0000-00-00', NULL, '2020-05-04 16:48:16', '2020-05-04 16:48:16'),
(3, 'g1LV7yUAZU8n5A3zUSR-5', 5, 1, 0, '0000-00-00', NULL, '2020-05-04 16:49:22', '2020-05-04 16:49:22'),
(4, 'gtQP16IdFViFCQxEUSR-6', 6, 1, 0, '0000-00-00', NULL, '2020-05-04 16:50:17', '2020-05-04 16:50:17'),
(6, 'V6rfm_USR-8', 8, 1, 0, '0000-00-00', NULL, '2020-05-05 10:19:10', '2020-05-05 10:19:10'),
(7, 'AzvF6_USR-9', 9, 1, 0, '2020-05-05', 'Sudah dikembalikan', '2020-05-05 12:52:06', '2020-05-05 15:30:11'),
(8, '13ihq_USR-10', 10, 1, 1, '2020-05-05', 'Sudah dikembalikan', '2020-05-05 12:57:24', '2020-05-05 15:20:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `majors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `api_token`, `picture`, `class`, `majors`, `address`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Khusnul Khuluq', 'khusnul.ninno15@dolan.com', '$2y$10$ReKWph9kjj7v2wCokSoNIeJei4GbewciuiZaYcyYblc2yRUbmlqgy', '85645027785', NULL, '1588635293_5eb0a69dd42f2.jpg', '11', 'RPL', 'pws-pas-jatim', NULL, NULL, '2020-05-04 16:34:54', '2020-05-04 16:34:54'),
(3, 'Mohammad Khusnul Khuluq', 'khusnul.ninno15@gmail.com', '$2y$10$IU79YAsnHD0U6eqFOaEWzuSyqZ20Wf1yZumWvPoIxE3UOLG.3UNFq', '85645027785', NULL, '1588636046_5eb0a98ee61cc.jpg', '11', 'RPL', 'pws-pas-jatim', NULL, NULL, '2020-05-04 16:47:27', '2020-05-04 16:47:27'),
(4, 'Febri George', 'febri@gmail.com', '$2y$10$K/g2kYOmnIO0pdqkGH8FuupKDKNSx9/g8616N1lGJlrgqBNe4fssK', '85645027785', NULL, '1588636095_5eb0a9bfcef80.jpg', '11', 'RPL', 'pws-pas-jatim', NULL, NULL, '2020-05-04 16:48:16', '2020-05-04 16:48:16'),
(5, 'Adellia Andri Cahyani', 'adel@gmail.com', '$2y$10$YjK62BXwA4vaNTYqYeEbuehM/CXIPX3i0r/BNJpZ3TD4/jCrM6SMK', '85645027785', NULL, '1588636161_5eb0aa01ee74c.jpeg', '11', 'RPL', 'pws-pas-jatim', NULL, NULL, '2020-05-04 16:49:22', '2020-05-04 16:49:22'),
(6, 'Mohammad Febri', 'febri@main.com', '$2y$10$RdTbuIMyLX2ePoFxBOL7Kuml/jUvNCqDm5WFD5gs.RRT.xz49mwF2', '85645027785', NULL, '1588636217_5eb0aa39aa0af.jpg', '11', 'RPL', 'pws-pass-jatim', NULL, NULL, '2020-05-04 16:50:17', '2020-05-04 16:50:17'),
(8, 'Mohammad Ninno', 'ee@gmail.com', '$2y$10$4fk34pN.ztlhDBmRY9kZjOmg5bBztMtuTFwT0b.dF0vHLPZSluTYW', '85645027785', NULL, '1588699147_5eb1a00b8fcfc.jpg', '11', 'RPL', 'aa', NULL, NULL, '2020-05-05 10:19:09', '2020-05-05 10:19:09'),
(9, 'Adellia Andri Cahyani', 'eecc@gmail.com', '$2y$10$Td8sB14CG623XdEQtUjpzu.yhHu0JSm5Yc8BtU7u747V63AA9Adam', '85645027785', NULL, '1588708325_5eb1c3e5a4f07.jpg', '11', 'MM', 'pws', NULL, NULL, '2020-05-05 12:52:06', '2020-05-05 12:52:06'),
(10, 'Mohammad Ninno', 'exxa@gmail.com', '$2y$10$doltzIVPWbP6qSK9RJ4K1.8nehQXSkHeq6CjerTDcKnj2ecq323dq', '85645027785', NULL, '1588708643_5eb1c523cf3e6.jpg', '11', 'RPL', 'pws', NULL, NULL, '2020-05-05 12:57:24', '2020-05-05 13:11:49'),
(11, 'Mohammad Khusnul Khuluq', 'aass@gmail.com', '$2y$10$wyUK/j.G4hH.4Is.sRLQ0.08Q9FSZ9NVyQx6bcdR0taXDJwMEFhOu', '+6285645027785', 'xFtMdrNQBbMRps88N1oEbhV4v', '1588719479_5eb1ef770f115.jpg', '11', 'RPL', 'pws', 'Admin', NULL, '2020-05-05 15:57:59', '2020-05-05 15:57:59'),
(12, 'aabb', 'aabb@gmail.com', '$2y$10$Ew68LCwrBmDTCqHfh3IMeegwBhS2cGuiTBEuMwJyznKOKKP/BuPTu', '+6285645027785', 'uy5T0S9FEZHBwFExUdF4AuQGg', '1588719610_5eb1effa4c4a0.jpg', '10', 'RPL', '1234', 'Admin', NULL, '2020-05-05 16:00:10', '2020-05-05 16:00:10'),
(13, 'admin', 'admin@sidescript.com', '$2y$10$uUXKbj3qYGUrsmQNIyO7sO2vu4mk3u.Q.OEtpDDsHtfYM3q1UrWy.', '+62085645027785', '1zzvjIbanR3amhWfFisktMg2S', '1588724936_5eb204c8d9c89.jpg', '11', 'RPL', 'Purwosari - Pasuruan - Jawatimur', 'Admin', NULL, '2020-05-05 17:28:57', '2020-05-05 17:28:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_transaction` (`code_transaction`),
  ADD KEY `transactions_users_id_foreign` (`users_id`),
  ADD KEY `transactions_books_id_foreign` (`books_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `api_token` (`api_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
