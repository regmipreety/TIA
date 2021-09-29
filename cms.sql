-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 06:27 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name_np` varchar(100) NOT NULL,
  `limit_size` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `entry_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', 'Main Menu', 1, '1', '2018-12-04 09:19:49', '0000-00-00 00:00:00'),
(2, 'Footer Menu', 'footer menu', NULL, '1', '2018-12-07 09:05:50', '0000-00-00 00:00:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `description` longtext,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `content_type` enum('C','L','E','F') DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `title_np` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_np` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(500) DEFAULT NULL,
  `file_url` varchar(500) DEFAULT NULL,
  `file_url_np` varchar(500) DEFAULT NULL,
  `link_url` varchar(500) DEFAULT NULL,
  `link_url_np` varchar(500) DEFAULT NULL,
  `link_url_external` varchar(500) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `parent_id`, `status`, `entry_by`, `menu_id`, `content_type`, `order_by`, `title_np`, `description_np`, `image_url`, `file_url`, `file_url_np`, `link_url`, `link_url_np`, `link_url_external`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(2, 'Contact Us', 'contact-us', '<p>Contact Us</p>', 0, '1', 1, 1, 'C', 3, 'सम्पर्क', '<p>Contact Us</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 08:49:16', '2018-12-07 00:30:10'),
(3, 'About Us', 'about-us', '<p>About Us</p>', 0, '1', 1, 1, 'C', 1, 'हाम्रो बारेमा\r\n', '<p>About Us</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 08:49:56', '2018-12-09 23:07:09'),
(4, 'Introduction', 'introduction', '<p>Introduction</p>', 3, '1', 1, 1, 'C', 3, 'परिचय', '<p>Introduction</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 08:50:07', '2018-12-07 05:13:08'),
(5, 'Gallery', 'gallery', '<p>Gallery</p>', 0, '1', 1, 1, 'C', 2, 'ग्यालरी', '<p>Gallery</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 08:51:27', '2018-12-09 23:07:10'),
(6, 'Photos', 'photos', '<p>Photos</p>', 5, '1', 1, 1, 'C', 2, 'फोटो', '<p>Photos</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 08:51:29', '2018-12-09 01:03:31'),
(7, 'Videos', 'videos', '<p>Videos</p>', 5, '1', 1, 1, 'C', 1, 'भिडियो', '<p>Videos</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 08:51:40', '2018-12-09 04:16:46'),
(8, 'History', 'history', '<p>History</p>', 4, '1', 1, 1, 'C', 7, 'History', '<p>History</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-09 23:13:43', '2018-12-09 23:13:43');

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
-- Table structure for table `tbl_admin_groups`
--

CREATE TABLE `tbl_admin_groups` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_groups`
--

INSERT INTO `tbl_admin_groups` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin\r\n', NULL, 1, NULL, NULL),
(2, 'Member', 'member', 1, '2018-11-28 05:14:52', '2018-11-28 05:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_menus`
--

CREATE TABLE `tbl_admin_menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_controller` varchar(200) DEFAULT NULL,
  `menu_name` varchar(256) DEFAULT NULL,
  `menu_link` varchar(256) DEFAULT NULL,
  `style` varchar(256) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_menus`
--

INSERT INTO `tbl_admin_menus` (`id`, `parent_id`, `menu_controller`, `menu_name`, `menu_link`, `style`, `menu_order`, `status`) VALUES
(1, 0, '', 'UserGroup', '', 'fas fa-users', 1, 1),
(2, 1, 'AdminGroupController', 'User Group', 'usergroup.index', 'fas fa-list-ul', 1, 1),
(3, 1, 'AdminRoleAccessController', 'Role', 'role-access.index', 'fas fa-list-ul', 2, 1),
(4, 0, '', 'Pages', '', 'fas fa-file-alt', 2, 1),
(5, 4, 'AdminPagesController', 'All Pages', 'pages.index', 'fas fa-list-ul', 1, 1),
(6, 4, 'AdminPagesController', 'Add Page', 'pages.create', 'fas fa-plus', 2, 1),
(7, 0, NULL, 'Contents', NULL, 'fas fa-file-alt', 3, 1),
(8, 7, 'AdminCategoryController', 'Category', 'category.index', 'fas fa-list-ul', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_roles`
--

CREATE TABLE `tbl_admin_roles` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `allow_view` int(11) DEFAULT NULL,
  `allow_add` int(11) DEFAULT NULL,
  `allow_edit` int(11) DEFAULT NULL,
  `allow_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_roles`
--

INSERT INTO `tbl_admin_roles` (`id`, `user_group_id`, `menu_id`, `allow_view`, `allow_add`, `allow_edit`, `allow_delete`) VALUES
(2, 1, 1, 1, 1, 1, 1),
(3, 1, 2, 1, 1, 1, 1),
(4, 2, 1, 0, 0, 0, 0),
(5, 2, 2, 0, 0, 0, 0),
(6, 1, 3, 1, 1, 1, 1),
(7, 2, 3, 0, 0, 0, 0),
(8, 3, 1, 0, 0, 0, 0),
(9, 3, 2, 0, 0, 0, 0),
(10, 3, 3, 0, 0, 0, 0),
(11, 1, 4, 1, 1, 1, 1),
(12, 1, 5, 1, 1, 1, 1),
(13, 1, 6, 1, 1, 1, 1),
(14, 1, 7, 1, 1, 1, 1),
(15, 1, 8, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobileno`, `email_verified_at`, `password`, `remember_token`, `status`, `user_group_id`, `created_at`, `updated_at`) VALUES
(1, 'sudeep shrestha', 'sudeepsth@outlook.com', '9840064816', NULL, '$2y$10$VrpgSy4O6LwgGhXSk.FjO.W4RbnRrBxHUWxNBTE1ItLFtGidVjIaG', '594ZujkQ8VqcxcNaZiwtWAJzly7QxWEiq43E7itsmY7vaMj7f0oY5XEVdV4r', '1', 1, '2018-10-25 22:48:48', '2018-11-05 03:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_admin_groups`
--
ALTER TABLE `tbl_admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_menus`
--
ALTER TABLE `tbl_admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin_groups`
--
ALTER TABLE `tbl_admin_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin_menus`
--
ALTER TABLE `tbl_admin_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
