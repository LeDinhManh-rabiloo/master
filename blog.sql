-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 02:18 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_catalog`
--

CREATE TABLE `menu_catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metaTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_catalog`
--

INSERT INTO `menu_catalog` (`id`, `name`, `metaTitle`, `created`, `updated`) VALUES
(1, 'Đời sống', 'Doi-song', '2018-01-31 11:25:25', '2018-01-31 11:25:25'),
(2, 'Công nghệ thông tin', 'Cong-nghe-thong-tin', '2018-01-31 11:26:12', '2018-02-01 01:10:46'),
(3, 'Kinh tế', 'Kinh-te', '2018-01-31 12:17:22', '2018-01-31 12:26:57'),
(4, 'Pháp luật', 'Phap-luat', '2018-01-31 12:17:29', '2018-01-31 12:27:01'),
(5, 'Y tế', 'Y-te', '2018-01-31 12:26:37', '2018-01-31 12:27:05'),
(6, 'Ngoại giao', 'Ngoai-giao', '2018-05-16 01:20:10', '2018-05-16 01:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `menu_list_blog`
--

CREATE TABLE `menu_list_blog` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metaTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog` int(2) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `hot` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_list_blog`
--

INSERT INTO `menu_list_blog` (`id`, `avatar`, `name`, `metaTitle`, `catalog`, `description`, `content`, `token`, `hot`, `new`, `created`, `updated`, `dateTime`) VALUES
(1, 'upload/images/QJfiu_thutuong.jpg', 'Thủ tướng chỉ đạo xử lý khiếu nại tố cáo về dự án Thủ Thiêm', 'Thu-tuong-chi-dao-xu-ly-khieu-nai-to-cao-ve-du-an-Thu-Thiem', 1, 'Ngày 15/5, Thủ tướng Nguyễn Xuân Phúc đã chủ trì cuộc họp với các Bộ, ngành liên quan, UBND TP.HCM để bàn về việc xử lý khiếu nại, tố cáo của người dân về dự án này.', '<p>Kết th&uacute;c cuộc họp, Thủ tướng đ&atilde; c&oacute; kết luận: Trong qu&aacute; tr&igrave;nh thực hiện dự &aacute;n khu đ&ocirc; thi Thủ Thi&ecirc;m, c&oacute; c&aacute;c sai s&oacute;t về quản l&yacute; đất đai, quy hoạch, lưu trữ hồ sơ, giải quyết.</p>', 'uKi8xgiHrb', 1, 1, '2018-05-16 00:57:20', '2018-05-20 03:15:43', '20/05/2018');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created`, `updated`) VALUES
(1, 'Lê Đình Mạnh', 'manhga3689@gmail.com', '$2y$10$xPCl.2.RwdelNlDG2qU3oOh1wD2s4ZiJ/uhU1IZoAJrWSukmUQJwS', '7GSG6mxrlNxlMSuvfRt3jFehGaxkfZBYmeFBkC25SOAomKGgGQp8SA421Znn', '2018-01-19 14:35:45', '2018-05-20 02:31:14'),
(2, 'Lê Đình Dũng', 'ledung10102003@gmail.com', '$2y$10$c6njcwDWCc8fCfERcb5QaOEPeMJoAO29OxCr4QdrUAYL/op2BFYmq', 'u7EmMMOtRM', '2018-01-26 14:31:13', '2018-05-11 09:16:56'),
(3, 'Lê Đình Nam', 'Nammi@gmail.com', '$2y$10$z81Gh.meoeWqPKs4WMEQy.rGSvY5b1YU5zh7WdsjAk9BLSDqEwQZy', '5VmBUrcQGbtHuXyFQy6NZRB65QUbUl', '2018-05-11 09:22:40', '2018-05-11 09:22:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_catalog`
--
ALTER TABLE `menu_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_list_blog`
--
ALTER TABLE `menu_list_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_catalog`
--
ALTER TABLE `menu_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_list_blog`
--
ALTER TABLE `menu_list_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
