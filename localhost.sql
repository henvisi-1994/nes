-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2021 at 07:57 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vihnolos_nes`
--
CREATE DATABASE IF NOT EXISTS `vihnolos_nes` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `vihnolos_nes`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED DEFAULT NULL,
  `liked_user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userid`, `liked_user_id`) VALUES
(46, 7, 9),
(50, 7, 25),
(23, 9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id_to` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id_from` int(10) UNSIGNED NOT NULL,
  `isread` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `created_at`, `user_id_to`, `message`, `user_id_from`, `isread`) VALUES
(207, '2021-09-09 03:16:54', 7, 'Hola', 9, 1),
(208, '2021-09-09 03:17:03', 9, 'Hola', 7, 1),
(209, '2021-09-09 03:17:20', 7, 'HolLa', 9, 1),
(228, '2021-09-09 03:44:53', 7, 'Hola hermosa', 25, 1),
(229, '2021-09-09 03:45:04', 7, 'Me enseñas el toto?', 25, 1),
(230, '2021-09-09 03:45:31', 9, 'Hola', 25, 1),
(231, '2021-09-09 03:45:45', 25, 'Holaa', 7, 1),
(232, '2021-09-09 03:45:54', 25, 'Como se te ve?', 7, 1),
(233, '2021-09-09 03:46:16', 7, 'A mi fantástico', 25, 1),
(234, '2021-09-09 03:46:19', 7, 'Y yu?', 25, 1),
(235, '2021-09-09 03:46:23', 25, 'Genial', 7, 1),
(236, '2021-09-09 03:46:31', 25, 'Ahora como te parece el sitio web?', 7, 1),
(237, '2021-09-09 03:46:35', 25, 'Sin alertas', 7, 1),
(238, '2021-09-09 03:46:45', 25, 'Estás allí ?', 9, 1),
(239, '2021-09-09 03:46:58', 7, 'Mal, a mi me gusta con alertas', 25, 1),
(240, '2021-09-09 03:47:05', 25, 'XD', 7, 1),
(241, '2021-09-09 03:47:20', 25, 'Pero has dicho que las alertas te daban líos', 7, 1),
(242, '2021-09-09 03:47:24', 25, 'Tu me dices', 7, 1),
(243, '2021-09-09 03:47:46', 25, 'A mi me parece que está bien', 7, 1),
(244, '2021-09-09 03:47:51', 7, 'Ponle todo y que la gente le baje el volumen', 25, 1),
(245, '2021-09-09 03:47:54', 25, 'Pero tú qué opinas?', 7, 1),
(246, '2021-09-09 03:48:11', 25, 'Que? O.o', 7, 1),
(247, '2021-09-09 03:48:13', 9, 'Perra', 25, 1),
(248, '2021-09-09 03:48:23', 9, 'Que olor a toto?', 25, 1),
(249, '2021-09-09 03:48:40', 7, 'Con todo', 25, 1),
(250, '2021-09-10 21:43:30', 25, 'Hola', 7, 1),
(251, '2021-09-10 21:44:03', 25, 'Queq', 7, 1),
(252, '2021-09-10 21:45:43', 7, 'hey', 25, 1),
(253, '2021-09-10 21:45:58', 7, 'h', 25, 1),
(254, '2021-09-10 21:46:05', 7, 'j', 25, 1),
(255, '2021-09-10 21:46:09', 7, 'l', 25, 1),
(256, '2021-09-10 21:46:15', 7, 'll', 25, 1),
(257, '2021-09-10 21:46:29', 7, 'pp', 25, 1),
(258, '2021-09-10 21:49:34', 25, 'Hh', 7, 1),
(259, '2021-09-10 21:49:59', 7, 'a', 25, 1),
(260, '2021-09-10 21:58:31', 7, 'q', 25, 1),
(261, '2021-09-10 21:58:45', 7, 'qq', 25, 1),
(262, '2021-09-10 21:58:48', 7, 'aa', 25, 1),
(263, '2021-09-11 00:41:12', 7, 'Hola guapa', 25, 1),
(264, '2021-09-11 00:41:33', 25, 'Heey', 7, 1),
(265, '2021-09-11 00:41:40', 7, 'Que tal', 25, 1),
(266, '2021-09-11 00:41:45', 25, 'Genial', 7, 1),
(267, '2021-09-11 00:41:49', 25, 'Hablando contigo ajajaj', 7, 1),
(268, '2021-09-11 00:42:04', 7, 'Hola', 25, 1),
(269, '2021-09-11 00:42:25', 7, 'Que tak', 25, 1),
(270, '2021-09-11 00:42:53', 7, 'Como vas', 25, 1),
(271, '2021-09-11 00:43:47', 7, 'Eyyy', 25, 1),
(272, '2021-09-11 00:44:18', 25, 'G', 7, 1),
(273, '2021-09-11 00:44:27', 25, ':P', 7, 1),
(274, '2021-09-14 19:11:35', 11, 'Hola', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_07_161925_create_messages_table', 2);

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
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `id` int(11) NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `starred_user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star`
--

INSERT INTO `star` (`id`, `userid`, `starred_user_id`) VALUES
(10, 19, 2),
(15, 19, 7),
(16, 19, 10),
(22, 19, 6),
(25, 9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes_man` tinyint(1) DEFAULT NULL,
  `likes_woman` tinyint(1) DEFAULT NULL,
  `likes_trans` tinyint(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `country`, `city`, `isadmin`, `gender`, `likes_man`, `likes_woman`, `likes_trans`, `birthday`, `image`) VALUES
(1, 'Alberto', 'Vihnoestamossolos@gmail.com', NULL, '$2y$10$EcyIncb6g8ISMNLs9LCqZusQfOTqpZxUombrUMvr779CDSuRsD8Ja', NULL, '2021-08-03 12:32:55', '2021-08-03 12:32:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, ''),
(2, 'Mike', 'a@a.a', NULL, '$2y$10$ts0w1hGYwZ8qjXvRVWPKFeTablqnwQk6T.0TNpfu/gVIPSwZuT5GW', NULL, '2021-08-04 08:02:33', '2021-08-04 08:02:33', 'Andorra', 'Andorra la Vella', 0, 'man', NULL, NULL, NULL, '2011-08-03', 'a.jpg'),
(3, 'Roberto', 'b@b.b', NULL, '', NULL, '2021-08-04 09:32:28', '2021-08-04 09:32:28', 'Andorra', 'Andorra la Vella', 0, 'man', NULL, NULL, NULL, '2002-08-11', 'b.jpg'),
(6, 'Andrea', 'c@c.c', NULL, '$2y$10$IR9sxiDoaMTeuXla.yl.dOa98h.xfrWmxvgQ.ZP7flw4akj3vCyJy', NULL, '2021-08-04 11:20:32', '2021-08-04 11:20:32', 'Argentina', 'Acebal', 0, 'man', NULL, NULL, NULL, '2003-08-11', 'c.jpg'),
(7, 'Michela', 'd@d.d', NULL, '$2y$10$ztyPsRHEoXL8CMGjvcA36uJZSajNcvPE7msofpd6K2hZ4mILSf3/W', 'Lu1W9UFJH6bMBLQvvhCNPI75VZrhBKzv6wAkXDiktF8BjGri6hQxO5kNbJ1B', '2021-08-04 11:22:11', '2021-08-19 11:57:08', 'Antigua and Barbuda', 'All Saints', 0, 'woman', NULL, NULL, NULL, '2009-08-25', 'd.jpg'),
(8, 'Paulo', 'e@e.e', NULL, '$2y$10$DASEesypxpb0dy7nBRQ36.tmwuCGqp2nMfhD9DOBE8GZfPUYrDVPe', NULL, '2021-08-04 11:22:41', '2021-08-04 11:22:41', 'Benin', 'Alibori', 0, 'man', NULL, NULL, NULL, '2012-08-01', 'e.jpg'),
(9, 'Luisa', 'f@f.f', NULL, '$2y$10$kv5bl5sqAy9MexJjiRgNC.bMnviz.YD/ryLQpEZEDFkQavh98i4fe', NULL, '2021-08-04 11:23:03', '2021-08-04 11:23:03', 'Bahamas', NULL, 0, 'woman', NULL, NULL, NULL, '2000-08-03', 'f.jpg'),
(10, 'Victor', 'g@g.g', NULL, '$2y$10$Pbp3aaaWNI7fJYyf8Li.U.NJ37WDmt9FCxtDPZ26O3AH8yEULwj46', NULL, '2021-08-04 11:23:36', '2021-08-04 11:23:36', 'Guatemala', 'Antigua Guatemala', 0, 'man', NULL, NULL, NULL, '2000-08-19', 'g.jpg'),
(11, 'Ylenia', 'h@h.h', NULL, '$2y$10$FhMH2TramipxGNyyqIsowuiPK/iRmou8eEMSp7anWCgD4vVzADawm', NULL, '2021-08-04 11:24:14', '2021-08-04 11:24:14', 'Venezuela', 'Acarigua', 0, 'woman', NULL, NULL, NULL, '2001-08-21', 'h.jpg'),
(19, 'Juan', 'i@i.i', NULL, '$2y$10$/2n8MScBLplnckl2ZwlB6ehRYoKFP5/XX./P1qUWeOibN0M/6FsOW', NULL, '2021-08-05 09:53:31', '2021-08-05 09:53:50', 'Bolivia', 'Anillo', 0, 'man', NULL, NULL, NULL, '1999-09-02', 'Juan_1.jpg'),
(20, 'Elizabeth', 'l@l.l', NULL, '$2y$10$YsDdOISzisAxv7UlNhixFeuIsh49tWKJK.0s3NxNNWaxHjU3vFHi6', NULL, '2021-08-17 07:36:44', '2021-08-17 07:36:44', 'Angola', 'Ambriz', NULL, 'woman', NULL, NULL, NULL, '1997-05-19', 'Elizabeth_1.jpg'),
(24, 'Alex', 't@t.t', NULL, '$2y$10$Jn2gpelx7qz5tO3Vfb5fdeVsDOpZ.wOzJBd3dTIaOiKLa/gE8.24m', NULL, '2021-08-29 21:06:07', '2021-08-29 21:06:07', 'American Samoa', NULL, NULL, 'man', NULL, NULL, NULL, '2021-08-19', 'Alex_1.jpg'),
(25, 'Alberto', 'alberto@gmail.com', NULL, '$2y$10$wokrWYlUer45WKgEoS7JLOJktbNt3KTXwDHzzoc8NaEmFeryXGVqa', 'lrSddkMiFUXsrbb8SZz10EUlfAQrqbVgCR2Y56AnYNIT0oqpcCPVIVhSdB58', '2021-08-29 21:52:18', '2021-08-29 21:54:44', 'Spain', 'Madrid', 0, 'man', NULL, NULL, NULL, '1992-07-09', 'Alberto_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`userid`,`liked_user_id`),
  ADD KEY `fk_likes_1` (`liked_user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `starred_user_id` (`starred_user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_1` FOREIGN KEY (`liked_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `star`
--
ALTER TABLE `star`
  ADD CONSTRAINT `fk_star_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_star_2` FOREIGN KEY (`starred_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
