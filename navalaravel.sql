-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2018 at 09:34 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navalaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'اجتماعی', 'social'),
(2, 'طنز', 'fun'),
(3, 'سیاسی', 'political');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inherit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 36, 'this is first comment', 'publish', '2018-12-06 20:30:00', '2018-12-06 20:30:00'),
(2, 1, 36, 'this is secound comment', 'publish', '2018-12-06 20:30:00', '2018-12-06 20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `ffmpegs`
--

CREATE TABLE `ffmpegs` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patch` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '240:-2',
  `audio` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '96k',
  `bitrate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '410K',
  `format` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mp4',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ffmpegs`
--

INSERT INTO `ffmpegs` (`id`, `post_id`, `patch`, `size`, `audio`, `bitrate`, `format`, `status`, `created_at`, `updated_at`) VALUES
(2, '27', '/content/uploads/useruploads/2018/12/10/9ibQSs7zx8irYIHIafxKOVa018Sxtvu1DIOEgv5g.mp4', '240:-2', '96k', '410K', 'mp4', 'converting', '2018-12-10 10:44:54', '2018-12-10 10:45:02'),
(4, '36', '/content/uploads/useruploads/2018/12/10/vseHR0gBugnfNw1KlzG7mFLtg0dC7wR7vEu5XZRm.mp4', '240:-2', '96k', '410K', 'mp4', 'waiting', '2018-12-16 05:03:53', '2018-12-16 05:03:53'),
(5, '36', '/content/uploads/useruploads/2018/12/10/vseHR0gBugnfNw1KlzG7mFLtg0dC7wR7vEu5XZRm.mp4', '240:-2', '96k', '410K', 'mp4', 'waiting', '2018-12-16 05:05:31', '2018-12-16 05:05:31');

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
(3, '2018_09_23_093155_create_posts_table', 1),
(4, '2018_09_23_094125_create_post_metas_table', 2),
(5, '2018_09_23_094808_create_categories_table', 3),
(6, '2018_09_23_095407_create_tags_table', 4),
(7, '2018_09_23_095821_create_category_posts_table', 5),
(8, '2018_09_23_100005_create_post_tags_table', 5),
(9, '2018_09_23_105023_create_comments_table', 6),
(10, '2018_09_24_070153_create_user_metas_table', 7),
(11, '2018_09_25_185734_create_rates_table', 8),
(12, '2016_06_01_000001_create_oauth_auth_codes_table', 9),
(13, '2016_06_01_000002_create_oauth_access_tokens_table', 9),
(14, '2016_06_01_000003_create_oauth_refresh_tokens_table', 9),
(15, '2016_06_01_000004_create_oauth_clients_table', 9),
(16, '2016_06_01_000005_create_oauth_personal_access_clients_table', 9),
(17, '2018_12_06_085444_create_temporary_users_table', 9),
(18, '2018_12_08_110656_create_ffmpegs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('17ef8b01145e7a02c43bd891c63096774653df95f3850d9be4f14555f3e51ddc937c26ba9e025c6f', 1, 3, NULL, '[]', 0, '2018-12-10 06:50:27', '2018-12-10 06:50:27', '2019-12-10 10:20:27'),
('2993c3f88173f8f2b524efbcdcfa229e874bf015e680ec83e46063c3c6a4c19e6205ee8c257e71a8', 1, 3, NULL, '[]', 0, '2018-12-10 10:40:28', '2018-12-10 10:40:28', '2019-12-10 14:10:28'),
('47b6a749c22dcf88106fba24b93140241e09458212550a2c66ffc242219f61e23312676ec71bf402', 1, 3, NULL, '[]', 0, '2018-12-08 14:42:12', '2018-12-08 14:42:12', '2019-12-08 18:12:12'),
('66257013fc99dfe76a33dacf6d7c1fc5930bfc4689af3ebe54f0e9d4c17e5207735e7d788099b77e', 2, 3, NULL, '[]', 0, '2018-12-16 06:02:33', '2018-12-16 06:02:33', '2019-12-16 09:32:33'),
('8d982763fbc21e55b2a4852bd81cbfd959a5d680527221e08d150b6c7bbbde7c67475aac7f3470a6', 1, 3, NULL, '[]', 0, '2018-12-14 15:14:45', '2018-12-14 15:14:45', '2019-12-14 18:44:45'),
('ca8bd0cbc0cc1e717ac8b658eccfd2168198647c96703c9203df6f68e363040cef5b96686463442b', 1, 3, NULL, '[]', 0, '2018-12-08 14:13:48', '2018-12-08 14:13:48', '2019-12-08 17:43:48'),
('f3edcb7169da284a70e29126cf5bb73e453e58ba10e41845bd493b16898696fc80a575d3ca93232f', 1, 3, NULL, '[]', 0, '2018-12-08 14:13:59', '2018-12-08 14:13:59', '2019-12-08 17:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'CyWafk5dnf3BVI1BpBz5pdChg25DvJ3CTGHCTmGv', 'http://localhost', 1, 0, 0, '2018-12-08 14:09:39', '2018-12-08 14:09:39'),
(2, NULL, 'Laravel Password Grant Client', 'qCJnMGFQr1NpZQxCPhbG2QYQBnBzMo35trpNBQMw', 'http://localhost', 0, 1, 0, '2018-12-08 14:09:40', '2018-12-08 14:09:40'),
(3, NULL, 'nava', 'bFIMQg9XBUlylg9OdPWLesdGNVEWhBh9WLy1s6xs', 'http://localhost', 0, 1, 0, '2018-12-08 14:12:32', '2018-12-08 14:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-12-08 14:09:40', '2018-12-08 14:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0f9fd65eb3385b91057166687e67fccd4e764136c626c30ad78eb89f1a2d1eef04827553b4a12cf8', '2993c3f88173f8f2b524efbcdcfa229e874bf015e680ec83e46063c3c6a4c19e6205ee8c257e71a8', 0, '2019-01-09 14:10:29'),
('3cdd86c76056f090844f1143357516aa11ebe1a1b1f90b2536625da3ba2e20a956de1727bc6d5bdf', '47b6a749c22dcf88106fba24b93140241e09458212550a2c66ffc242219f61e23312676ec71bf402', 0, '2019-01-07 18:12:12'),
('5dceb91f5b12f7156eea0d71c2fbbf8ace5f6951811bbcd31967b0298aa3b8a82eb313b0879ce408', '8d982763fbc21e55b2a4852bd81cbfd959a5d680527221e08d150b6c7bbbde7c67475aac7f3470a6', 0, '2019-01-13 18:44:45'),
('809fcb1b42a4765087ad29f1c6fb5de83241c8044ed2707ec8571e0479909bb9b15d95357c14c328', '66257013fc99dfe76a33dacf6d7c1fc5930bfc4689af3ebe54f0e9d4c17e5207735e7d788099b77e', 0, '2019-01-15 09:32:33'),
('94162351f39c3f1470050e23b9d5302aed071539960b5f7fdfe89955d986132097382f337363cdd8', 'f3edcb7169da284a70e29126cf5bb73e453e58ba10e41845bd493b16898696fc80a575d3ca93232f', 0, '2019-01-07 17:43:59'),
('f2af8d31f13fb0c8c0fca5c240260c023fe77818de378caf816ba5b77d682089b989f255b37dc0a9', 'ca8bd0cbc0cc1e717ac8b658eccfd2168198647c96703c9203df6f68e363040cef5b96686463442b', 0, '2019-01-07 17:43:48'),
('f920369a6512580ce437f040bb79d8d143b606f46ab483ae939500b9a4880b623d1289566ec11525', '17ef8b01145e7a02c43bd891c63096774653df95f3850d9be4f14555f3e51ddc937c26ba9e025c6f', 0, '2019-01-09 10:20:26');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `seo` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inherit',
  `comment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `views` int(11) NOT NULL DEFAULT '0',
  `rate` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `excerpt`, `seo`, `status`, `comment_status`, `post_type`, `views`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'تست شماره 1', 'تست می شود', NULL, NULL, 'publish', 'open', 'video', 0, 0, '2018-09-25 06:56:32', '2018-09-25 06:56:32'),
(2, 1, 'تست شماره 2', 'تست می شود', NULL, NULL, 'publish', 'open', 'video', 0, 0, '2018-09-26 04:56:32', '2018-09-26 04:56:32'),
(28, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 10:46:13', '2018-12-10 10:46:13'),
(29, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 10:51:59', '2018-12-10 10:51:59'),
(30, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 10:57:44', '2018-12-10 10:57:44'),
(31, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 11:00:48', '2018-12-10 11:00:48'),
(32, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 11:01:11', '2018-12-10 11:01:11'),
(33, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 11:03:29', '2018-12-10 11:03:29'),
(34, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 11:23:28', '2018-12-10 11:23:28'),
(35, 1, 'latest test api video 2018', 'this is test', NULL, NULL, 'inherit', 'open', 'video', 0, 0, '2018-12-10 11:26:59', '2018-12-10 11:26:59'),
(36, 1, 'آپیت ویدیو', NULL, NULL, NULL, 'publish', 'open', 'video', 4, 75, '2018-12-10 11:27:48', '2018-12-16 06:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `post_metas`
--

CREATE TABLE `post_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_metas`
--

INSERT INTO `post_metas` (`id`, `post_id`, `key`, `value`) VALUES
(1, 1, 'attachment', '/content/uploads/useruploads/2018/09/25/FdoaCPCsap0pXBUlKZJfqxV7yHQex0UdgP0zj38a.mp4'),
(2, 1, 'attachment', '/content/uploads/useruploads/2018/09/25/FdoaCPCsap0pXBUlKZJfqxV7yHQex0UdgP0zj38a.mp4'),
(33, 28, 'VideoFile', '/content/uploads/useruploads/2018/12/10/Bk9TKfH8S8nwJv7hlXnqhwfloPzNxoevydykSSIZ.mp4'),
(34, 28, 'VideoDuration', '0:01:00'),
(35, 28, 'thumbnail', '/content/uploads/useruploads/2018/12/10/Bk9TKfH8S8nwJv7hlXnqhwfloPzNxoevydykSSIZ.mp4-thumbnail.jpg'),
(36, 28, 'VideoFile', '/content/uploads/useruploads/2018/12/10/Bk9TKfH8S8nwJv7hlXnqhwfloPzNxoevydykSSIZ.mp4-mobile.mp4'),
(37, 29, 'VideoFile', '/content/uploads/useruploads/2018/12/10/PCD6aXjpTEhpMJLGczgELaH7wcBeYSPMnqvT7XHJ.mp4'),
(38, 29, 'VideoDuration', '0:01:00'),
(39, 29, 'thumbnail', '/content/uploads/useruploads/2018/12/10/PCD6aXjpTEhpMJLGczgELaH7wcBeYSPMnqvT7XHJ.mp4-thumbnail.jpg'),
(40, 30, 'VideoFile', '/content/uploads/useruploads/2018/12/10/5poOyZGTK7dTOQXq7i1fkQmCUZMJGzrFKVUV3QGI.mp4'),
(41, 30, 'VideoDuration', '0:01:00'),
(42, 30, 'thumbnail', '/content/uploads/useruploads/2018/12/10/5poOyZGTK7dTOQXq7i1fkQmCUZMJGzrFKVUV3QGI.mp4-thumbnail.jpg'),
(43, 29, 'VideoFile', '/content/uploads/useruploads/2018/12/10/PCD6aXjpTEhpMJLGczgELaH7wcBeYSPMnqvT7XHJ.mp4-mobile.mp4'),
(44, 30, 'VideoFile', '/content/uploads/useruploads/2018/12/10/5poOyZGTK7dTOQXq7i1fkQmCUZMJGzrFKVUV3QGI.mp4-mobile.mp4'),
(45, 31, 'VideoFile', '/content/uploads/useruploads/2018/12/10/MfibmAlmYSUlXcnv8zuLO74IkD11xyRNlKtgVBj2.mp4'),
(46, 31, 'VideoDuration', '0:01:00'),
(47, 31, 'thumbnail', '/content/uploads/useruploads/2018/12/10/MfibmAlmYSUlXcnv8zuLO74IkD11xyRNlKtgVBj2.mp4-thumbnail.jpg'),
(48, 32, 'VideoFile', '/content/uploads/useruploads/2018/12/10/IQdOopdM8pRpYLRx05fuNcgHrGlj0qzwhHdSs0O3.mp4'),
(49, 32, 'VideoDuration', '0:01:00'),
(50, 32, 'thumbnail', '/content/uploads/useruploads/2018/12/10/IQdOopdM8pRpYLRx05fuNcgHrGlj0qzwhHdSs0O3.mp4-thumbnail.jpg'),
(51, 31, 'VideoFile', '/content/uploads/useruploads/2018/12/10/MfibmAlmYSUlXcnv8zuLO74IkD11xyRNlKtgVBj2.mp4-mobile.mp4'),
(52, 32, 'VideoFile', '/content/uploads/useruploads/2018/12/10/IQdOopdM8pRpYLRx05fuNcgHrGlj0qzwhHdSs0O3.mp4-mobile.mp4'),
(53, 33, 'VideoFile', '/content/uploads/useruploads/2018/12/10/NfUifyqtvRVdMt6nzk0P0Sgn9xzirZoxoKI7kiEX.mp4'),
(54, 33, 'VideoDuration', '0:01:00'),
(55, 33, 'thumbnail', '/content/uploads/useruploads/2018/12/10/NfUifyqtvRVdMt6nzk0P0Sgn9xzirZoxoKI7kiEX.mp4-thumbnail.jpg'),
(56, 34, 'VideoFile', '/content/uploads/useruploads/2018/12/10/8Ymo0O4jtLnlERTruhrq4tWltm0hKS63uxBfy4oN.mp4'),
(57, 34, 'VideoDuration', '0:01:00'),
(58, 34, 'thumbnail', '/content/uploads/useruploads/2018/12/10/8Ymo0O4jtLnlERTruhrq4tWltm0hKS63uxBfy4oN.mp4-thumbnail.jpg'),
(59, 33, 'VideoFile', '/content/uploads/useruploads/2018/12/10/NfUifyqtvRVdMt6nzk0P0Sgn9xzirZoxoKI7kiEX.mp4-mobile.mp4'),
(60, 34, 'VideoFile', '/content/uploads/useruploads/2018/12/10/8Ymo0O4jtLnlERTruhrq4tWltm0hKS63uxBfy4oN.mp4-mobile.mp4'),
(61, 35, 'VideoFile', '/content/uploads/useruploads/2018/12/10/QFHzvBrRMiTVxIrUbD0mMPg9R0S0H3vshH7Xntt6.mp4'),
(62, 35, 'VideoDuration', '0:01:00'),
(63, 35, 'thumbnail', '/content/uploads/useruploads/2018/12/10/QFHzvBrRMiTVxIrUbD0mMPg9R0S0H3vshH7Xntt6.mp4-thumbnail.jpg'),
(64, 35, 'VideoFile', '/content/uploads/useruploads/2018/12/10/QFHzvBrRMiTVxIrUbD0mMPg9R0S0H3vshH7Xntt6.mp4-mobile.mp4'),
(65, 36, 'VideoFile', '/content/uploads/useruploads/2018/12/10/vseHR0gBugnfNw1KlzG7mFLtg0dC7wR7vEu5XZRm.mp4'),
(66, 36, 'VideoDuration', '0:01:00'),
(67, 36, 'thumbnail', '/content/uploads/useruploads/2018/12/10/vseHR0gBugnfNw1KlzG7mFLtg0dC7wR7vEu5XZRm.mp4-thumbnail.jpg'),
(68, 36, 'VideoFile', '/content/uploads/useruploads/2018/12/10/vseHR0gBugnfNw1KlzG7mFLtg0dC7wR7vEu5XZRm.mp4-mobile.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(2, 36, 2),
(3, 36, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `post_id`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 36, 100, '2018-12-16 06:00:03', '2018-12-16 06:00:26'),
(2, 2, 36, 50, '2018-12-16 06:02:57', '2018-12-16 06:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'اولین برچسب'),
(2, 'first'),
(3, 'scound');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_users`
--

CREATE TABLE `temporary_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inviteby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobilecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobilecodedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inherit',
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `mobile`, `bio`, `role`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'سعید رحیمی منش', 'saeed@rahimimanesh.com', '$2y$10$wRKvjdFCXtfbid8adQCdte5l7yaYqzFpdOc.z27UWWgeKVesNHU4K', 'inherit', '09193350901', 'I am windows', 'admin', 'hOtMlirtPSvlcdP', 'e7NdHJg46TEVE7cA3yrk3NIH9SXaL8DM9y8CeKu7NTLU6BI7C4vSEWMTUKbs', '2018-09-23 09:32:00', '2018-12-14 14:46:40'),
(2, 'آریا کرنافی', 'info.aryakarnafi@gmail.com', '$2y$10$wRKvjdFCXtfbid8adQCdte5l7yaYqzFpdOc.z27UWWgeKVesNHU4K', 'inherit', '09309848197', 'I am windows 2', 'admin', 'hOqTlirtPSvbvdP', 'e7NdHJg46TEVE7cA3yrk3NIH9SXaL8DM9y8CeKu7NTLU6BI7C4vSEWMTUKbs', '2018-09-23 09:32:00', '2018-12-14 14:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `user_id`, `key`, `value`) VALUES
(1, 1, 'thumbnail', '/content/uploads/useruploads/2018/09/25/EHB8PrCd86ttRdddm1TLJVm2ivVIVnE2HvDM1Qb1.jpeg'),
(2, 1, 'telegram', 'saeed_rm6'),
(3, 1, 'instagram', '3aeed_rm6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ffmpegs`
--
ALTER TABLE `ffmpegs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_metas`
--
ALTER TABLE `post_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_users`
--
ALTER TABLE `temporary_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ffmpegs`
--
ALTER TABLE `ffmpegs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `post_metas`
--
ALTER TABLE `post_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `temporary_users`
--
ALTER TABLE `temporary_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
