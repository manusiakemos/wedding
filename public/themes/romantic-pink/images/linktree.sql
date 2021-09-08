-- -------------------------------------------------------------
-- TablePlus 4.0.2(374)
--
-- https://tableplus.com/
--
-- Database: linktree
-- Generation Time: 2021-08-06 20:00:56.7560
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','super-admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `visits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `primary_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` bigint(20) unsigned NOT NULL,
  `list` json DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `visits_primary_key_secondary_key_unique` (`primary_key`,`secondary_key`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_08_15_123928_add_columns1_to_users_table', 1),
(6, '2020_08_15_124741_add_column2_to_users_table', 1),
(7, '2021_08_06_183044_create_visits_table', 2),
(8, '2021_08_06_185705_create_settings_table', 3);

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Portal Covid Tabalong', '2021-08-06 19:00:56', '2021-08-06 19:00:56');

INSERT INTO `users` (`id`, `name`, `avatar`, `username`, `role`, `api_token`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kane Pfeffer', NULL, 'super-admin', 'super-admin', 'PJRZVEhueaV8OuySJVBOFnqeI7UFxk9cQlhhUBMwMzh9itZg2G4kPfRE4JCTzhYvg1OkqV1vyLwQYBItjIPikmVHG0pERN3v4ww3', 'cpowlowski@example.com', '2021-08-03 16:27:09', '$2y$10$NVd.Z5CEY5XegFkmXcCbpubDPQZ/8zukRSLPZhUuYD0HQmkqEOG1K', 'z3c69kLu5W', '2021-08-03 16:27:09', '2021-08-03 16:27:09'),
(2, 'Miss Caroline Rohan', NULL, 'luis.adams', 'admin', 'T7IBBOGb5MW3qkjXsFi1wJGYtC88cAQr7DxY53JQkkp0Rf2WaYLcEGCHXYxmeATfvXWl1kWUYb5x1pwGQ2RBlkqCSCrce7eqZLQT', 'howell.diana@example.net', '2021-08-03 16:27:56', '$2y$10$JQd8LiVw37G9mAD8r40you0WVVD2Q.KHWDFLUtERwzKiMMDAPU2vu', 'PMXx7cRFQp', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(3, 'Thad Kuhic', NULL, 'simonis.makayla', 'admin', 'LVyhAbIyStLcXDBJ4L8zhzzCA7Jk5xim1gJggwRWuN0PeZI6QlDvVwPlyBAkuvivtVx3Gk0Fo9EHlggOKdbJWCnWMQ6aFIv5ZLLQ', 'buckridge.ignacio@example.net', '2021-08-03 16:27:56', '$2y$10$DoVjSt9v84sh1ml6c2AAAeGq/qsH5zy3Mw1dDCbWgSSdE8eYL68SW', 'W0I4jahORf', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(4, 'Eliseo Runolfsdottir', NULL, 'leora.goodwin', 'super-admin', '2p1GwC1nHldVetSCJDtlfpKhOAO68ZkexJ8CcN5d9rmbQZZTGFxHafnIzU7O81S3gHDJExqq1ovwBaWS84R8mvc4DxxKzlMimzB2', 'belle.cruickshank@example.com', '2021-08-03 16:27:57', '$2y$10$m6T5LMhmB78jUN2GFoooCeJhKRK4/PR4fwoShTET82PQEq0r3WH/e', '7ryBnc7DJW', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(5, 'Donnie Simonis', NULL, 'bednar.kian', 'super-admin', 'E19Nmfp1TdZkQvwN6WLMabN5XzyWoIukHSUPHT1iVgJ7V13CORTjpXSrgTS2WS359Kvsxr2AiuFoCaSJHtJyVlBJGkiVqQD2EJoA', 'hackett.carley@example.com', '2021-08-03 16:27:57', '$2y$10$1ietoik2Kn./J6QYAY0fNu61qE9BEFnmsJsDSJW8w7BKCOr9KeG8K', 'jVWmDH3CrP', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(6, 'Justen Denesik III', NULL, 'schuster.omer', 'admin', 'IDVP8cYfDQuWzl77W8buUdO82QLHymRvRSqmBZkbqbQIPeZXEBBPTlVleNnjlgJ2TwuAK3eWoUJXwgr051CJjB3RoLHelT5feSD2', 'myrtis.johnson@example.org', '2021-08-03 16:27:57', '$2y$10$bwejnl3e.xSSxN586msEleUY6JOiIi75COG56OHh8Y.YFaoWubLOW', 'BjRSPqfxzX', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(7, 'Ena Cummings', NULL, 'twolf', 'admin', 'LwSiyQMXNcvFCZ2hBcQb3k98aKgcCrTJFSpZMWQF1dZrYDa6CprecmGWVRsX6iGCD5JHxyJ2bttSCWJ7bsdvGPagZYk4AiqAwm2o', 'oconnell.preston@example.org', '2021-08-03 16:27:58', '$2y$10$zv/6lFQLDWgx4n9LYerapO9xPD3DyIuzCO.mAauCFkPVa4OKvJ9qi', 'x9z6Q5sWOO', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(8, 'Mittie Lueilwitz Jr.', NULL, 'hermann.misty', 'admin', 'fOIyEEbEgmdQrrpuaAvyHnbLtpWlL2qok12XPGaQMpUlnHVisogJ6oPZxyVpAyG0xUJ5tjh4bUBtILN0abcQwqIMOr9uYnLWdFo4', 'jazmyne.schmeler@example.net', '2021-08-03 16:27:58', '$2y$10$DWGXof8hyalX1KzFYjwhtuYSGqOSpBy330xxXZvHw1HaPYWPvSlui', 'jNN8Eu8Xjm', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(9, 'Myah Anderson III', NULL, 'mbradtke', 'admin', 'dd7k6oirTWMNCO62xVELV58ICkW7nWhO3QF19YudaARPXWNCDPrS4wPV14OMLJqQkRGXHWWTkM3iUgAUL0R6PYiQ1aje9JciohJL', 'jameson.swift@example.com', '2021-08-03 16:27:58', '$2y$10$YcDW1CppGqMeh9oquWG.SeZutTR632rYgLfw727L8RRIT/TS2Y3BS', 'xbIaElveAM', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(10, 'Prof. Alexandro Ferry', NULL, 'nestor.medhurst', 'admin', '99REsTgL8HNxjKJ56iXEdNTgTPCc44bemJMNa5beS2qSCf5ZQHzB86UlR4etqxS3yIzWo17oQHETD5gMHLOQB2X2hlUZX0eHTzT5', 'jspinka@example.net', '2021-08-03 16:27:59', '$2y$10$WFY.t9JLohJiB6sRVqaR6e61TdtH0tSxTomHZTRhNst4vva4qohKO', 'Uz91LykVsh', '2021-08-03 16:27:59', '2021-08-03 16:27:59'),
(11, 'Dr. Clair Schumm', NULL, 'kquigley', 'admin', 'KFPndf2c7dAHUvsfiQOMHkhiLAtY2WAexosgYG8CIFw7kFNhDBJQhbOVAAwkcMQ4D50pbzoqhx8p8Ps1DyqHWIWHppnLz1828jR7', 'emonahan@example.net', '2021-08-03 16:27:59', '$2y$10$k32WhfqTTQbpQ0On6eBDRejz8wo1sH6dxAoai0kDayyE0pyroZ/qG', 'hiJrlVAWmt', '2021-08-03 16:27:59', '2021-08-03 16:27:59');

INSERT INTO `visits` (`id`, `primary_key`, `secondary_key`, `score`, `list`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 'visits:settings_visits_day_total', NULL, 72, NULL, '2021-08-07 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(2, 'visits:settings_visits_day', '0', 0, NULL, '2021-08-07 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(3, 'visits:settings_visits_week_total', NULL, 72, NULL, '2021-08-09 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(4, 'visits:settings_visits_week', '0', 0, NULL, '2021-08-09 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(5, 'visits:settings_visits_month_total', NULL, 72, NULL, '2021-09-01 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(6, 'visits:settings_visits_month', '0', 0, NULL, '2021-09-01 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(7, 'visits:settings_visits_year_total', NULL, 72, NULL, '2022-01-01 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(8, 'visits:settings_visits_year', '0', 0, NULL, '2022-01-01 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(10, 'visits:settings_visits', '1', 72, NULL, NULL, '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(11, 'visits:settings_visits_total', NULL, 72, NULL, NULL, '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(12, 'visits:settings_visits_referers:1', NULL, 72, NULL, NULL, '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(13, 'visits:settings_visits_day', '1', 72, NULL, '2021-08-07 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(14, 'visits:settings_visits_week', '1', 72, NULL, '2021-08-09 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(15, 'visits:settings_visits_month', '1', 72, NULL, '2021-09-01 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(16, 'visits:settings_visits_year', '1', 72, NULL, '2022-01-01 00:00:00', '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(17, 'visits:settings_visits_OSes:1', 'MacOS', 72, NULL, NULL, '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(18, 'visits:settings_visits_languages:1', 'en', 72, NULL, NULL, '2021-08-06 19:07:39', '2021-08-06 19:48:19'),
(89, 'visits:settings_visits_recorded_ips:1:127.0.0.1', NULL, 1, NULL, '2021-08-06 20:03:19', '2021-08-06 19:48:19', '2021-08-06 19:48:19');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;