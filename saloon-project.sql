-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 08:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saloon-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `appoint_user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appoint_user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appoint_user_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appoint_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appoint_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_appoint_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_appoint_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_appoint_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `created_at`, `updated_at`, `appoint_user_name`, `appoint_user_email`, `appoint_user_contact`, `appoint_date`, `appoint_time`, `shop_appoint_name`, `shop_appoint_id`, `shop_appoint_email`, `amount`, `payment_order_id`, `transaction_id`, `status`) VALUES
(1, '2021-01-23 13:22:03', '2021-01-23 14:15:48', 'Robin', 'robinsingh71119@gmail.com', '1234567890', '2021-01-25', '00:21', 'aaa', '1', 'testing@gmail.com', '11', '600c7c527afec', '20210124111212800110168329102321162', '1'),
(2, '2021-01-24 12:46:38', '2021-01-24 12:47:48', 'ss', 'robinsingh71119@gmail.com', '1234567890', '2021-01-24', '22:16', 'ccc', '2', 'sfh@gmail.com', '22', '600d6c50a1dd1', '20210124111212800110168974202316114', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `user_name`, `user_email`, `subject`, `shop_id`, `shop_name`, `shop_email`, `message`) VALUES
(1, '2021-01-24 06:04:08', '2021-01-24 06:04:08', 'robinsingh', 'robinsingh71119@gmail.com', 'sdsad', '2', 'ccc', 'sfh@gmail.com', 'ascscscdscdscdscsdcsdcdc sd csddsfsdf'),
(2, '2021-01-25 09:57:52', '2021-01-25 09:57:52', 'name', 'robinsingh71119@gmail.com', 'dasdad', '1', 'aaa', 'testing@gmail.com', 'sadsadadasdd');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
(81, '2020_04_20_131035_create_service_from_homes_table', 5),
(83, '2014_10_12_000000_create_users_table', 6),
(84, '2014_10_12_100000_create_password_resets_table', 6),
(85, '2020_04_05_080752_create_registers_table', 6),
(86, '2020_04_06_050325_create_social_auth_google_controllers_table', 6),
(87, '2020_04_08_093627_create_verify_emails_table', 6),
(88, '2020_04_11_084310_create_shop_infos_table', 6),
(89, '2020_04_14_125134_create_comments_table', 6),
(90, '2020_04_16_074912_create_appointments_table', 6),
(91, '2020_05_07_125341_create_contact_forms_table', 6);

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
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `created_at`, `updated_at`, `name`, `email`, `provider_user_id`, `email_verify`, `password`, `profile_image`, `contact`, `user_type`) VALUES
(1, '2021-01-23 12:44:00', '2021-01-23 12:48:28', 'Robin', 'robinsingh71119@gmail.com', '1427126807370492416', 'verified', '1111', '17047606321611425665.jpeg', '1234567890', 'user'),
(2, '2021-01-23 12:55:36', '2021-01-23 12:56:55', 'test', 'testing@gmail.com', '3394598358753920512', 'verified', '1111', '10548302781611426360.jpg', '1414141414', 'sh'),
(3, '2021-01-24 05:57:12', '2021-01-24 05:58:14', 'sfh', 'sfh@gmail.com', '827703885093253248', 'verified', '1111', '705019331611487656.jpg', '1523641254', 'sfh');

-- --------------------------------------------------------

--
-- Table structure for table `shop_infos`
--

CREATE TABLE `shop_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employ_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_services` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_services_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specillaty_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specillaty_service_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liked_user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_infos`
--

INSERT INTO `shop_infos` (`id`, `created_at`, `updated_at`, `owner_name`, `shop_name`, `address`, `user_email`, `shop_contact`, `provider_user_id`, `shop_type`, `employ_number`, `images`, `shop_services`, `shop_services_amount`, `specillaty_service`, `specillaty_service_amount`, `user_type`, `liked_user_email`) VALUES
(1, '2021-01-23 13:09:21', '2021-01-23 14:08:04', 'abc', 'aaa', 'acacac', 'testing@gmail.com', '1234567890', '3394598358753920512', 'female', '2', 'grill.jpg,mint.jpeg,mint.jpg,pharma (1).jpg', 'Basic hair Cut,Basic Body Massage,Basic Head Wash,Basic Shave', '111,44,323,333', 'Quality Gel Shave', '122', 'sh', 'robinsingh71119@gmail.com'),
(2, '2021-01-24 06:02:31', '2021-01-24 06:02:31', 'sss', 'ccc', 'cdcd', 'sfh@gmail.com', '1212121212', '827703885093253248', 'unisex', '2', '21005835471611487951team building rocket.png,12396718771611487951output-onlinepngtools (2).png,12219377971611487951about_us_bg.jpg', 'Basic hair Cut,Basic Head Wash,Basic Shave', '222,333,111', 'Executive Wash', '111', 'sfh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_auth_google_controllers`
--

CREATE TABLE `social_auth_google_controllers` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verify_emails`
--

CREATE TABLE `verify_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_verified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
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
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_infos`
--
ALTER TABLE `shop_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_emails`
--
ALTER TABLE `verify_emails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_infos`
--
ALTER TABLE `shop_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verify_emails`
--
ALTER TABLE `verify_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
