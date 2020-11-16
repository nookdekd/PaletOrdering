-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 05:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewooding`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`id`, `order_id`, `status_id`, `pic`, `date`) VALUES
(1, 6, 0, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 07:31:10'),
(2, 6, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 07:32:46'),
(3, 6, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 07:35:00'),
(4, 6, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 07:37:10'),
(5, 6, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 07:39:05'),
(6, 1, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:01:12'),
(7, 7, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:06:29'),
(8, 7, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:07:31'),
(9, 7, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:08:50'),
(10, 1, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:14:11'),
(11, 1, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:15:43'),
(12, 1, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:17:41'),
(13, 1, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:17:52'),
(14, 22, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:33:20'),
(15, 22, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:36:39'),
(16, 22, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:37:17'),
(17, 22, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:38:49'),
(18, 22, 1, '997a2ac6b1c814e1b82401.jpg', '2020-09-28 08:41:05'),
(19, 22, 1, '10879.jpg', '2020-09-28 08:42:22'),
(20, 6, 1, '10879.jpg', '2020-09-28 08:44:18'),
(21, 25, 1, '10879.jpg', '2020-09-28 08:48:37'),
(22, 0, 1, '10879.jpg', '2020-09-28 08:52:06'),
(23, 0, 1, '10879.jpg', '2020-09-28 08:53:37'),
(24, 0, 1, '10879.jpg', '2020-09-28 08:54:05'),
(25, 0, 1, '10879.jpg', '2020-09-28 08:54:36'),
(26, 7, 1, '10879.jpg', '2020-09-28 08:56:57'),
(27, 14, 1, '10879.jpg', '2020-09-28 09:02:01'),
(28, 1, 1, '10879.jpg', '2020-09-28 09:10:47'),
(29, 6, 1, '10879.jpg', '2020-09-28 09:13:22'),
(30, 27, 1, '1087d9.jpg', '2020-09-28 09:34:57'),
(31, 28, 1, '1087d9.jpg', '2020-09-28 09:38:29'),
(32, 34, 1, 'spiderman-miles-lost-in-space-4k-0f-1920x1080.jpg', '2020-09-30 01:04:18'),
(33, 31, 1, 'nathan-thomassin-pGT8GQEdpsg-unsplash (1).jpg', '2020-10-01 03:59:13'),
(34, 3, 1, '03_413485.jpg', '2020-10-23 15:21:33'),
(35, 4, 1, '03_413485.jpg', '2020-10-23 15:35:30'),
(36, 4, 1, 'RBS31728010.jpg', '2020-10-23 19:41:11'),
(37, 3, 1, 'KT3380.jpg', '2020-10-23 19:42:44'),
(38, 5, 1, 'Photo - 22-Mar-2020 23_02_04 - 1.jpg', '2020-10-23 19:43:24'),
(39, 6, 1, 'RBS31728010.jpg', '2020-10-23 19:43:58'),
(40, 7, 1, 'KT3380.jpg', '2020-10-23 19:44:52'),
(41, 22, 1, 'IMG_20201023_004537.jpg', '2020-10-24 05:27:22'),
(42, 0, 1, '124849659_2714473832150636_699904213688735851_n.png', '2020-11-15 14:27:33'),
(43, 0, 1, '125071703_411186886568714_1862613913131427347_n.png', '2020-11-15 14:27:48'),
(44, 0, 1, '1.jpg', '2020-11-15 14:27:58'),
(45, 4, 1, '3.jpg', '2020-11-15 14:31:10'),
(46, 5, 1, '16.jpg', '2020-11-15 14:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `catPic` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `catPic`) VALUES
(1, 'Jamie', '123250664_1227204654339745_2599508899323861422_n.jpg'),
(2, 'HAWAII FIVE-O', '123538849_3923495890997042_3560254465883702779_n.jpg'),
(3, 'MIAMI VICE', 'MIAMI VICE2.jpg'),
(4, 'SERENA', 'SERENA2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `cust_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(2) NOT NULL,
  `report_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `cust_id`, `status_id`, `report_id`) VALUES
(5, '2020-11-15 21:32:15', '11', 1, '2011-15-0004'),
(4, '2020-11-15 21:30:59', '11', 1, '2011-15-0000');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_detail_quantity` tinyint(4) NOT NULL,
  `order_detail_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_process_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`, `status_process_id`) VALUES
(6, 1, '2490.00', 9, 4, 0),
(5, 2, '1490.00', 8, 4, 0),
(4, 1, '10.00', 1, 4, 0),
(7, 1, '1490.00', 10, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productdata`
--

CREATE TABLE `productdata` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productdata`
--

INSERT INTO `productdata` (`id`, `product_id`, `qty`, `price`, `pdate`) VALUES
(3, 1, 100, 4500, '2020-11-09 08:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_img_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `qty` int(255) NOT NULL,
  `catId` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(2) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_price`, `qty`, `catId`, `dateadd`, `status_id`, `userid`) VALUES
(1, 'P00008', 'tester', 'tester', '1.jpg', '10.00', 11, '1', '2020-11-15 14:30:59', 0, 0),
(8, 'P00008', 'tester', '15432396', '4.jpg', '1490.00', 10, '1', '2020-11-15 14:30:59', 0, 0),
(9, 'PD00006', 'Genius DX-130', 'เมาส์แบบมีสายดีไซน์เรียบหรู ออกแบบรูปทรงพิเศษจับได้กระชับมืออย่างเป็นธรรมชาติ', '2.jpg', '2490.00', 11, '1', '2020-11-15 14:30:59', 0, 0),
(10, 'CST', 'เตียง', 'เมาส์แบบมีสายดีไซน์เรียบหรู ออกแบบรูปทรงพิเศษจับได้กระชับมืออย่างเป็นธรรมชาติ Width : 222.2 Height : 22', '0', '1490.00', -1, '0', '2020-11-15 14:39:55', 8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `status_cash`
--

CREATE TABLE `status_cash` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_cash`
--

INSERT INTO `status_cash` (`status_id`, `status_name`, `color`) VALUES
(0, 'ยังไม่ได้ชำระ', '#FF6666'),
(1, 'ชำระเงินแล้ว', '#FF9966');

-- --------------------------------------------------------

--
-- Table structure for table `status_process`
--

CREATE TABLE `status_process` (
  `status_process_id` int(11) NOT NULL,
  `status_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_process`
--

INSERT INTO `status_process` (`status_process_id`, `status_name`, `color`) VALUES
(1, 'กำลังดำเนินการ', '#FFCC66'),
(2, 'ดำเนินการเสร็จสิ้น', '#FF6666');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custaddr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `fullname`, `username`, `useremail`, `custaddr`, `password`, `regdate`, `role_id`) VALUES
(4, 'admin', 'admin', 'admin@akara.co.th', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-09 08:25:12', 1),
(11, 'test', 'test', 'natee@gmail.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-09 08:25:10', 0),
(19, 'testadd', 'testadd', 'testadd@gmail.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-09 08:25:08', 0),
(20, 'admin@localhost', 'admin@localhost', 'admin@localhost.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', '25f9e794323b453885f5181f1b624d0b', '2020-11-09 08:25:19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_cash`
--
ALTER TABLE `status_cash`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_process`
--
ALTER TABLE `status_process`
  ADD PRIMARY KEY (`status_process_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productdata`
--
ALTER TABLE `productdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_cash`
--
ALTER TABLE `status_cash`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_process`
--
ALTER TABLE `status_process`
  MODIFY `status_process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
