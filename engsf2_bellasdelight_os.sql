-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 08:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engsf2_bellasdelight_os`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(138, '2020_05_21_100000_create_teams_table', 1),
(139, '2020_05_21_200000_create_team_user_table', 1),
(140, '2020_05_21_300000_create_team_invitations_table', 1),
(424, '2014_10_12_000000_create_users_table', 2),
(425, '2014_10_12_100000_create_password_resets_table', 2),
(426, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(427, '2019_08_19_000000_create_failed_jobs_table', 2),
(428, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(429, '2021_11_25_120911_create_sessions_table', 2),
(431, '2021_11_25_121826_create_registered_customers_table', 2),
(435, '2021_11_26_094136_laratrust_setup_tables', 3),
(436, '2021_11_29_150952_create_orders_table', 4),
(440, '2021_12_06_134317_create_category_table', 5),
(442, '2021_11_25_121610_create_products_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','cancelled','delivered','accepted','to recieve') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart`, `address`, `total`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:7:\"bread f\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:15:\"Strawberry Cake\";s:5:\"price\";d:250;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '260.00', 'CoD', 'delivered', '2021-12-05 19:21:27', '2021-12-05 19:21:27'),
(3, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:31;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:2:\"31\";s:4:\"name\";s:10:\"Muffin Man\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:7:\"bread f\";s:5:\"price\";d:10;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '30.00', 'CoD', 'cancelled', '2021-12-05 21:24:55', '2021-12-05 21:24:55'),
(4, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:7:\"bread f\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:31;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:2:\"31\";s:4:\"name\";s:10:\"Muffin Man\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '20.00', 'GCASH', 'cancelled', '2021-12-05 21:50:56', '2021-12-05 21:50:56'),
(5, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:7:\"bread f\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:27;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:2:\"27\";s:4:\"name\";s:11:\"Orange Cake\";s:5:\"price\";d:300;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '310.00', 'CoD', 'cancelled', '2021-12-05 21:56:04', '2021-12-05 21:56:04'),
(6, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:27;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:2:\"27\";s:4:\"name\";s:11:\"Orange Cake\";s:5:\"price\";d:300;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:15:\"Strawberry Cake\";s:5:\"price\";d:250;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '550.00', 'CoD', 'delivered', '2021-12-05 21:59:48', '2021-12-05 21:59:48'),
(7, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:7:\"bread f\";s:5:\"price\";d:10;s:8:\"quantity\";i:3;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:31;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:2:\"31\";s:4:\"name\";s:10:\"Muffin Man\";s:5:\"price\";d:10;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '50.00', 'CoD', 'delivered', '2021-12-06 01:10:34', '2021-12-06 01:10:34'),
(10, 6, '{\"34\":{\"id\":\"34\",\"name\":\"Muffin Cke\",\"price\":23,\"quantity\":\"1\",\"attributes\":{\"image\":null},\"conditions\":[]},\"35\":{\"id\":\"35\",\"name\":\"Coke Shake\",\"price\":20,\"quantity\":\"1\",\"attributes\":{\"image\":\"C:\\\\xampp\\\\tmp\\\\php3A5.tmp\"},\"conditions\":[]}}', 'Doon sa SOBRANG LAYO', '43.00', 'GCASH', 'delivered', '2021-12-06 04:50:46', '2021-12-06 04:50:46'),
(11, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:12:\"Ginger Bread\";s:5:\"price\";d:20.3;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:10:\"Muffin Cke\";s:5:\"price\";d:6;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"C:\\xampp\\tmp\\phpF2D4.tmp\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '26.30', 'CoD', 'delivered', '2021-12-06 06:32:40', '2021-12-06 06:32:40'),
(12, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '65.00', 'GCASH', 'delivered', '2021-12-06 06:33:43', '2021-12-06 06:33:43'),
(13, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:1;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:10:\"Muffin Cke\";s:5:\"price\";d:6;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"C:\\xampp\\tmp\\phpF2D4.tmp\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '6.00', 'CoD', 'delivered', '2021-12-06 06:33:54', '2021-12-06 06:33:54'),
(14, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:15:\"Straberry Shake\";s:5:\"price\";d:20.3;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '20.30', 'GCASH', 'to recieve', '2021-12-06 06:36:35', '2021-12-06 06:36:35'),
(15, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:12:\"Ginger Bread\";s:5:\"price\";d:20.3;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '20.30', 'CoD', 'delivered', '2021-12-06 06:41:06', '2021-12-06 06:41:06'),
(16, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:12:\"Ginger Bread\";s:5:\"price\";d:20.3;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '85.30', 'CoD', 'pending', '2021-12-06 06:43:14', '2021-12-06 06:43:14'),
(17, 6, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:15:\"Straberry Shake\";s:5:\"price\";d:20.3;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 'Doon sa SOBRANG LAYO', '20.30', 'GCASH', 'to recieve', '2021-12-06 06:43:24', '2021-12-06 06:43:24'),
(18, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:12:\"Ginger Bread\";s:5:\"price\";d:20.3;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '20.30', 'GCASH', 'delivered', '2021-12-08 15:41:39', '2021-12-08 15:41:39'),
(19, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:3;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:15:\"Straberry Shake\";s:5:\"price\";d:20.3;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '170.60', 'GCASH', 'cancelled', '2021-12-08 23:45:50', '2021-12-08 23:45:50'),
(20, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '65.00', 'CoD', 'cancelled', '2021-12-09 00:06:37', '2021-12-09 00:06:37'),
(21, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:12:\"Ginger Bread\";s:5:\"price\";d:20.3;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '105.60', 'CoD', 'delivered', '2021-12-09 18:15:13', '2021-12-09 18:15:13'),
(22, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:2;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:12:\"Ginger Bread\";s:5:\"price\";d:20.3;s:8:\"quantity\";i:20;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '406.00', 'GCASH', 'delivered', '2021-12-09 18:19:22', '2021-12-09 18:19:22'),
(23, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:2:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:10:\"Muffin Cke\";s:5:\"price\";d:6;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"C:\\xampp\\tmp\\phpF2D4.tmp\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '71.00', 'CoD', 'delivered', '2021-12-09 23:26:45', '2021-12-09 23:26:45'),
(24, 5, 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";N;s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:10:\"Loaf Bread\";s:5:\"price\";d:65;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2112231', '65.00', 'CoD', 'cancelled', '2021-12-09 23:52:57', '2021-12-09 23:52:57');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(9, 'products-create', 'Create Products', 'Create Products', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(10, 'products-read', 'Read Products', 'Read Products', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(11, 'products-update', 'Update Products', 'Update Products', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(12, 'products-delete', 'Delete Products', 'Delete Products', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(13, 'records-create', 'Create Records', 'Create Records', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(14, 'records-read', 'Read Records', 'Read Records', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(15, 'records-update', 'Update Records', 'Update Records', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(16, 'records-delete', 'Delete Records', 'Delete Records', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(17, 'report-create', 'Create Report', 'Create Report', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(18, 'report-read', 'Read Report', 'Read Report', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(19, 'report-update', 'Update Report', 'Update Report', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(20, 'report-delete', 'Delete Report', 'Delete Report', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(21, 'profile-read', 'Read Profile', 'Read Profile', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(22, 'profile-update', 'Update Profile', 'Update Profile', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(23, 'profile-delete', 'Delete Profile', 'Delete Profile', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(24, 'orders-read', 'Read Orders', 'Read Orders', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(25, 'orders-update', 'Update Orders', 'Update Orders', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(26, 'orders-delete', 'Delete Orders', 'Delete Orders', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(27, 'product-menu-read', 'Read Product-menu', 'Read Product-menu', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(28, 'product-menu-update', 'Update Product-menu', 'Update Product-menu', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(29, 'cart-create', 'Create Cart', 'Create Cart', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(30, 'cart-read', 'Read Cart', 'Read Cart', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(31, 'cart-update', 'Update Cart', 'Update Cart', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(32, 'cart-delete', 'Delete Cart', 'Delete Cart', '2021-12-05 18:42:51', '2021-12-05 18:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 1, 'App\\Models\\User'),
(3, 1, 'App\\Models\\User'),
(4, 1, 'App\\Models\\User'),
(5, 1, 'App\\Models\\User'),
(6, 1, 'App\\Models\\User'),
(7, 1, 'App\\Models\\User'),
(8, 1, 'App\\Models\\User'),
(9, 1, 'App\\Models\\User'),
(10, 1, 'App\\Models\\User'),
(11, 1, 'App\\Models\\User'),
(12, 1, 'App\\Models\\User'),
(13, 1, 'App\\Models\\User'),
(14, 1, 'App\\Models\\User'),
(15, 1, 'App\\Models\\User'),
(16, 1, 'App\\Models\\User'),
(17, 1, 'App\\Models\\User'),
(18, 1, 'App\\Models\\User'),
(19, 1, 'App\\Models\\User'),
(20, 1, 'App\\Models\\User'),
(21, 1, 'App\\Models\\User'),
(22, 1, 'App\\Models\\User'),
(23, 1, 'App\\Models\\User'),
(24, 1, 'App\\Models\\User'),
(25, 1, 'App\\Models\\User'),
(26, 1, 'App\\Models\\User'),
(27, 1, 'App\\Models\\User'),
(28, 1, 'App\\Models\\User'),
(5, 2, 'App\\Models\\User'),
(24, 2, 'App\\Models\\User'),
(25, 2, 'App\\Models\\User'),
(27, 2, 'App\\Models\\User'),
(29, 2, 'App\\Models\\User'),
(30, 2, 'App\\Models\\User'),
(31, 2, 'App\\Models\\User'),
(32, 2, 'App\\Models\\User'),
(5, 3, 'App\\Models\\User'),
(6, 3, 'App\\Models\\User'),
(7, 3, 'App\\Models\\User'),
(8, 3, 'App\\Models\\User'),
(10, 3, 'App\\Models\\User'),
(24, 3, 'App\\Models\\User'),
(25, 3, 'App\\Models\\User'),
(27, 3, 'App\\Models\\User'),
(29, 3, 'App\\Models\\User'),
(30, 3, 'App\\Models\\User'),
(31, 3, 'App\\Models\\User'),
(32, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDesc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `productPrice` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `profile_photo_path`, `productName`, `productDesc`, `quantity`, `rating`, `productPrice`, `created_at`, `updated_at`) VALUES
(1, 'Muffin', 'C:\\xampp\\tmp\\phpF2D4.tmp', 'Muffin Cke', 'Do you know The Muffin man? the Muffin MAN? THE MUFFIN MAN', 5, NULL, 6, '2021-12-06 06:25:13', '2021-12-06 06:25:13'),
(2, 'Cookie', NULL, 'Ginger Bread', 'Do you know The Muffin man? the Muffin MAN? THE MUFFIN MAN', 60, NULL, 20.3, '2021-12-06 06:25:48', '2021-12-06 06:25:48'),
(3, 'Dessert', NULL, 'Straberry Shake', 'Shake shake shake zamora', 60, NULL, 20.3, '2021-12-06 06:26:43', '2021-12-06 06:26:43'),
(4, 'Pizza', NULL, 'Hawaiian', 'uhh.. its a pizza?', 0, NULL, 250, '2021-12-06 06:27:15', '2021-12-06 06:27:15'),
(5, 'Snack Cakes', NULL, 'Short Cakes', 'uhh.. its a cake, but smaller :>', 3, NULL, 20.3, '2021-12-06 06:27:46', '2021-12-06 06:27:46'),
(6, 'Sweet Goods', NULL, 'Sugar Cane', 'uhh.. its a sugar cane, literally :>', 0, NULL, 10.6, '2021-12-06 06:28:37', '2021-12-06 06:29:09'),
(7, 'Tortilla', NULL, 'Taco', 'It\'s raining tacos From out of the sky Tacos No need to ask why Just open your mouth and close your eyes It\'s raining tacos', 60, NULL, 50, '2021-12-06 06:31:00', '2021-12-06 06:31:00'),
(8, 'Bread', NULL, 'Loaf Bread', 'Its a Loaf bread, but larger :)', 60, NULL, 65, '2021-12-06 06:32:09', '2021-12-06 06:32:09'),
(9, 'Bread', 'C:\\xampp\\tmp\\php7231.tmp', 'Madiko-n Bread', 'Bread made my a student who gave up.', 12, NULL, 69, '2021-12-09 00:09:57', '2021-12-09 00:09:57'),
(10, 'Bread', 'C:\\xampp\\tmp\\php5CCC.tmp', 'Sweet Bread', 'BERYBERY SWEET', 12, NULL, 123, '2021-12-09 17:16:40', '2021-12-09 17:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `registered_customers`
--

CREATE TABLE `registered_customers` (
  `userID` bigint(20) UNSIGNED NOT NULL,
  `contactNumber` bigint(20) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator', '2021-12-05 18:42:51', '2021-12-05 18:42:51'),
(2, 'customer', 'Customer', 'Customer', '2021-12-05 18:42:51', '2021-12-05 18:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fyHrOeZMqt5NiGEpzFQtFEKR27UCLlL4bqeDDsiq', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiU0MzVHRLMHZ5cEF4aTN4cmJkS1BjSXNSTlNlZ2F6aUZyMHAxdkQxNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lci1vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSXFway9IcnFwNVp5OTlQaWdCQXQ3T2hKTVJNOVY3N0tkT0ZOOHI2bkF3ektOT1g5c1FmOW0iO3M6MjY6IjR5VGxUREt1M29KT2Z6RF9jYXJ0X2l0ZW1zIjthOjA6e31zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRJcXBrL0hycXA1Wnk5OVBpZ0JBdDdPaEpNUk05Vjc3S2RPRk44cjZuQXd6S05PWDlzUWY5bSI7fQ==', 1639122785),
('JfN2xIFH2il5lq4iUrpCPUR1Pg5KtuErGz2AIHCF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYjJrNDNFVUFrV2phTE5oY25hRTA1RUlzc1l1b1FMYkFqNFkwOGNRcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVnlkYXdORnZ1aTBvY2JwSDBMNDNYZUpnVXhHR2syTW15WTNlSFJRWDJPTHFMWmdFSC9MNksiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFZ5ZGF3TkZ2dWkwb2NicEgwTDQzWGVKZ1V4R0drMk1teVkzZUhSUVgyT0xxTFpnRUgvTDZLIjt9', 1639122813);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactNumber` bigint(20) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `profile_photo_path`, `email`, `email_verified_at`, `user_type`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `contactNumber`, `address`, `remember_token`, `current_team_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'profile-photos/fFJElP6XKKwkJDG5LPJKYjvx88WgS29ueTjkSlk4.jpg', 'admin@admin.com', '2021-11-29 22:16:43', 'customer', '$2y$10$VydawNFvui0ocbpH0L43XeJgUxGGk2MmyY3eHRQX2OLqLZgEH/L6K', NULL, NULL, 321654987, 'Olympus', NULL, NULL, '2021-11-29 22:16:29', '2021-12-02 05:34:47'),
(5, 'Cean', 'Jena', 'profile-photos/Nrwle0FpVqhW9kh3sZYklCo2EuIEBOKoXe8ix285.jpg', 'user@user.com', '2021-12-05 19:09:57', 'customer', '$2y$10$Iqpk/Hrqp5Zy99PigBAt7OhJMRM9V77KdOFN8r6nAwzKNOX9sQf9m', NULL, NULL, 213546879, '2112231', NULL, NULL, '2021-12-05 19:09:02', '2021-12-08 23:58:48'),
(6, 'Zed', 'Pool', NULL, 'user2@user.com', '2021-12-06 01:10:11', 'customer', '$2y$10$fTeEGvFcjI4SiQgpIPwXbeclZ6JZ9syycBWbncRzoqoh9ZW4WH6Se', NULL, NULL, 321564879, 'Doon sa SOBRANG LAYO', NULL, NULL, '2021-12-06 01:08:59', '2021-12-06 01:10:11');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

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
-- Indexes for table `registered_customers`
--
ALTER TABLE `registered_customers`
  ADD KEY `registered_customers_userid_foreign` (`userID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered_customers`
--
ALTER TABLE `registered_customers`
  ADD CONSTRAINT `registered_customers_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
