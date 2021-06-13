-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 10:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_office_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_creator` int(11) NOT NULL,
  `employee_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_designation`, `employee_phone`, `employee_email`, `employee_office_id`, `employee_image`, `employee_slug`, `employee_creator`, `employee_status`, `created_at`, `updated_at`) VALUES
(2, 'Abu Bokkor Farhan', 'Something', '01868362878', 'farhanbokkor@gmail.com', '2222', '', 'E601e7a916f4b0', 1, 1, '2021-02-06 11:16:33', '2021-02-10 08:12:42'),
(5, 'Karim Khan', 'officer', '01758484364', 'karim@gmail.com', '5971', 'Employee_5_1612880896.jpg', 'E60229c0068693', 1, 1, '2021-02-09 14:28:16', '2021-02-09 15:32:21');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_09_115434_create_user_roles_table', 2),
(5, '2019_09_16_104732_create_departments_table', 3),
(6, '2021_02_06_150627_create_product_categories_table', 4),
(7, '2021_02_06_151205_create_employees_table', 5),
(8, '2021_02_08_125936_create_products_table', 6),
(9, '2021_02_08_131112_create_product_purchases_table', 7),
(10, '2021_02_21_155628_create_product_requisitions_table', 8),
(11, '2021_02_21_190137_create_product_distributions_table', 9),
(12, '2021_02_22_120233_create_product_damages_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('uzzalbd.creative@gmail.com', '$2y$10$O3aDJ6Jd1ggblvOdOL98ne2mI0tYC/g2WebALYxDtfWdS5XiepU8y', '2019-09-09 07:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `procate_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_creator` int(11) DEFAULT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `procate_id`, `product_name`, `product_details`, `product_remarks`, `product_image`, `product_slug`, `product_creator`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobile', 'None lorem ipsum doller', '........', 'Product1-1612779452.jpg', '1612779452mobile', 1, 1, '2021-02-08 09:36:12', '2021-02-08 19:47:37'),
(3, 1, 'Pendrive', 'Pendrive', '...', NULL, '1613907478pendrive', 1, 1, '2021-02-21 11:37:58', '2021-02-23 19:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `procate_id` bigint(20) UNSIGNED NOT NULL,
  `procate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procate_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procate_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procate_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procate_creator` int(11) NOT NULL,
  `procate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`procate_id`, `procate_name`, `procate_remarks`, `procate_image`, `procate_slug`, `procate_creator`, `procate_status`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', NULL, NULL, 'PC_601eadaf8e404', 1, 1, '2021-02-09 05:02:17', '2021-02-07 04:47:34'),
(7, 'Medicine', NULL, NULL, 'PC6020fcaf45a52', 1, 1, '2021-02-08 08:56:15', '2021-02-10 09:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_damages`
--

CREATE TABLE `product_damages` (
  `damage_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `damage_quantity` int(11) NOT NULL,
  `damage_chalan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damage_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damage_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damage_creator` int(11) NOT NULL,
  `damage_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_damages`
--

INSERT INTO `product_damages` (`damage_id`, `product_id`, `damage_quantity`, `damage_chalan`, `damage_remarks`, `damage_slug`, `damage_creator`, `damage_status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'C210101', 'Expired Date', 'PDa603b3152111af', 1, 1, '2021-02-28 05:59:46', NULL),
(2, 1, 4, 'C210102', 'Technical Problem', 'PDa603b31732f673', 1, 1, '2021-02-28 06:00:19', NULL),
(3, 3, 5, 'C210104', 'Not Working Device', 'PDa603ba7804b845', 1, 1, '2021-02-28 14:24:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_distributions`
--

CREATE TABLE `product_distributions` (
  `pd_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `pd_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pd_quantity` int(11) DEFAULT NULL,
  `pd_chalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pd_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pd_creator` int(11) DEFAULT NULL,
  `pd_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pd_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_distributions`
--

INSERT INTO `product_distributions` (`pd_id`, `user_id`, `pr_id`, `product_id`, `pd_code`, `pd_quantity`, `pd_chalan`, `pd_remarks`, `pd_creator`, `pd_slug`, `pd_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 'PD202111', 2, 'C210101', '...', 1, 'PD603b31090d7f0', 1, '2021-02-28 05:58:33', '2021-02-28 05:58:33'),
(2, 1, 1, 1, 'PD202112', 1, 'C210102', '...', 1, 'PD603b3117cc7d6', 1, '2021-02-28 05:58:47', '2021-02-28 05:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_quantity` int(11) DEFAULT NULL,
  `purchase_unit_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_sub_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_supplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_chalan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_voucher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_creator` int(11) DEFAULT NULL,
  `purchase_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`purchase_id`, `product_id`, `purchase_quantity`, `purchase_unit_price`, `purchase_sub_price`, `purchase_discount`, `purchase_total_price`, `purchase_date`, `purchase_brand`, `purchase_supplier`, `purchase_chalan`, `purchase_voucher`, `purchase_slug`, `purchase_creator`, `purchase_status`, `created_at`, `updated_at`) VALUES
(1, 3, 20, '200', NULL, NULL, '4000', '2021-02-18', 'A4 Tech', 'Smart Tech', 'C210101', 'V210101', '1614491126-3', 1, 1, '2021-02-28 05:45:26', NULL),
(2, 1, 10, '5000', NULL, NULL, '50000', '2021-02-11', 'Samsung', 'Samsung Company', 'C210102', 'V210102', '1614491210-1', 1, 1, '2021-02-28 05:46:50', NULL),
(3, 3, 10, '300', NULL, NULL, '3000', '2021-02-20', 'Apace', 'Globe Company', 'C210103', 'V210103', '1614491335-3', 1, 1, '2021-02-28 05:48:55', NULL),
(4, 3, 15, '200', NULL, NULL, '3000', '2021-02-11', 'Normal', 'Raiyans Computer', 'C210104', 'V210104', '1614522106-3', 1, 1, '2021-02-28 14:21:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_requisitions`
--

CREATE TABLE `product_requisitions` (
  `pr_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pr_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_quantity` int(11) DEFAULT NULL,
  `pr_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_requisition_status` int(11) NOT NULL DEFAULT 0,
  `pr_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_requisitions`
--

INSERT INTO `product_requisitions` (`pr_id`, `user_id`, `product_id`, `pr_code`, `pr_quantity`, `pr_remarks`, `pr_slug`, `pr_requisition_status`, `pr_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PR202111', 1, '...', 'PR603b2f1a0f42b', 1, 1, '2021-02-28 05:50:18', '2021-02-28 05:58:47'),
(2, 1, 3, 'PR202112', 2, '...', 'PR603b2f289c2a0', 1, 1, '2021-02-28 05:50:32', '2021-02-28 05:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 7,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `designation`, `employee_id`, `photo`, `role_id`, `slug`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Saidul Islam Uzzal', '01710726035', 'uzzalbd.creative@gmail.com', NULL, '$2y$10$FT6089P.vxr3rIXi7ZDf7Oq61jcS2GafizxlTnRkpVkcJrdKTjKHq', NULL, 'Director General', '1121778', 'user_1_1568273089.jpg', 1, 'U219879672', 1, 1, '2019-09-12 07:24:49', '2019-09-12 07:24:49'),
(2, 'admin', NULL, 'admin@gmail.com', NULL, '$2y$10$pPXdjS.x.v2EB92fwqCHg.U4jfKpWMHk8t3q/gxI83cfHjvsFyufa', NULL, 'Director General', '1789023', 'user_2_1612939482.jpg', 1, 'U908761231', 1, 1, '2021-02-10 06:44:42', '2021-02-10 06:44:43'),
(3, 'Saidul', '01710726030', 'saidul@gmail.com', NULL, '$2y$10$b4EXjwY2N4VbCj0tGTgmP.Dr1O3Lo6kNnj6wc28qMRWwEvgT0lq9u', NULL, 'Web Developer', '1211122', NULL, 7, 'EMP6031f7759faf3', 1, 1, '2021-02-21 06:02:29', NULL),
(4, 'Shahin Alom', '01725191028', 'shahin@gmail.com', NULL, '$2y$10$yu7BEp09j6axu5UhRMgFfemsRNB4kds5uMUlnMdz.2ZvE4.MwzlCK', NULL, 'Director', '1278955', '', 7, 'EMP6031f775978t4', 1, 1, '2021-02-21 06:07:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `role_slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `role_status`, `role_slug`, `created_at`, `updated_at`) VALUES
(1, 'DG', 1, 'dg', '2019-09-09 01:00:00', NULL),
(2, 'DR', 1, 'dr', '2019-09-08 23:00:00', NULL),
(3, 'DD', 1, 'dd', '2019-09-09 00:00:00', NULL),
(4, 'AD', 1, 'ad', '2019-09-09 01:00:00', NULL),
(5, 'Store-Officer', 1, 'so', '2019-09-09 01:00:00', NULL),
(6, 'Store-Keeper', 1, 'sk', '2021-02-09 07:17:45', NULL),
(7, 'Employee', 1, 'emp', '2021-02-09 07:18:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`procate_id`),
  ADD UNIQUE KEY `product_categories_procate_name_unique` (`procate_name`);

--
-- Indexes for table `product_damages`
--
ALTER TABLE `product_damages`
  ADD PRIMARY KEY (`damage_id`);

--
-- Indexes for table `product_distributions`
--
ALTER TABLE `product_distributions`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `product_requisitions`
--
ALTER TABLE `product_requisitions`
  ADD PRIMARY KEY (`pr_id`),
  ADD UNIQUE KEY `product_requisitions_pr_code_unique` (`pr_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `procate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_damages`
--
ALTER TABLE `product_damages`
  MODIFY `damage_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_distributions`
--
ALTER TABLE `product_distributions`
  MODIFY `pd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `purchase_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_requisitions`
--
ALTER TABLE `product_requisitions`
  MODIFY `pr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
