-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 02:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `cus_id` int(10) NOT NULL,
  `cus_email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_fname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_lname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_address` text COLLATE utf8_unicode_ci,
  `cus_tel` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`cus_id`, `cus_email`, `cus_password`, `cus_fname`, `cus_lname`, `cus_address`, `cus_tel`, `status`) VALUES
(1, 'mike@mike.com', '1111', 'mike', 'mike', 'mike', '0987654321', '1'),
(2, 'mike2@mike.com', '1234', 'mike2', 'mike2', 'mike2', '0987654321', '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_fullname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_address` text COLLATE utf8_unicode_ci,
  `order_phone` text COLLATE utf8_unicode_ci,
  `cus_id` int(10) DEFAULT NULL COMMENT 'id คนสั่งสินค้า',
  `status` text COLLATE utf8_unicode_ci COMMENT 'สถานะบิล',
  `order_payment` text COLLATE utf8_unicode_ci COMMENT 'ลิงค์บิล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_fullname`, `order_address`, `order_phone`, `cus_id`, `status`, `order_payment`) VALUES
(1, '2018-05-12 22:10:34', 'mike', 'mike1111/111', '1234567890', 2, 'ส่งของแล้ว', 'image/payments/20180512_221113-009-padlock.svg'),
(2, '2018-05-12 22:12:10', 'mike', 'mike1111/111', '1234567890', 2, 'รออนุมัติ', 'image/payments/20180516_140021-Screenshot from 2018-05-14 00-49-40.png'),
(3, '2018-05-16 13:59:13', 'aaaaaaaaaaaaaaa', 'adasdsdsad/123123', '123456789', 2, 'รออนุมัติ', 'image/payments/20180516_140046-Screenshot from 2018-05-14 00-49-40.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_cus`
--

CREATE TABLE `order_cus` (
  `id` int(50) NOT NULL,
  `name` text COLLATE utf8_unicode_ci COMMENT 'ชื่อสินค้า',
  `detail` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  `size` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ขนาด',
  `favcolor` text COLLATE utf8_unicode_ci COMMENT 'สีสินค้า',
  `pattern` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ลายสินค้า',
  `patterncolor` text COLLATE utf8_unicode_ci COMMENT 'สีลายสินค้า',
  `quty` int(50) DEFAULT NULL COMMENT 'จำนวน',
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สั่ง',
  `order_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL COMMENT 'ราคา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_cus`
--

INSERT INTO `order_cus` (`id`, `name`, `detail`, `size`, `favcolor`, `pattern`, `patterncolor`, `quty`, `datetime`, `order_id`, `price`) VALUES
(1, 'vvvv', 'sdffsdfsdfsdfsdfsdf', 'L', '#00ff10', 'C', '#8500ff', 6, '2018-05-12 15:12:10', 2, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_detail_quantity` tinyint(4) NOT NULL,
  `order_detail_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`) VALUES
(1, 1, '300.00', 1, 1),
(2, 1, '300.00', 2, 1),
(3, 1, '300.00', 3, 1),
(4, 1, '300.00', 5, 1),
(5, 1, '300.00', 1, 3),
(6, 1, '300.00', 2, 3),
(7, 1, '300.00', 3, 3),
(8, 1, '300.00', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `pro_id` int(10) NOT NULL COMMENT 'รหัส',
  `pro_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `pro_detail` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  `pro_price` double DEFAULT NULL COMMENT 'ราคา',
  `pro_num` int(10) DEFAULT NULL COMMENT 'จำนวน',
  `pro_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่เข้าสต๊อค',
  `pro_img1` text COLLATE utf8_unicode_ci COMMENT 'รูป1',
  `pro_img2` text COLLATE utf8_unicode_ci COMMENT 'รูป2',
  `pro_img3` text COLLATE utf8_unicode_ci COMMENT 'รูป3',
  `pro_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชนิด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางสินค้า';

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`pro_id`, `pro_name`, `pro_detail`, `pro_price`, `pro_num`, `pro_date`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_type`) VALUES
(1, 'ดอกทานตะวัน', 'ฟหกฟหกฟหก', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(2, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(3, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(4, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(5, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(6, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(7, 'ดอกทานตะวัน', 'fghbbh', 446, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(8, 'sdfnbvn', 'dfgfdg', 488, 2, '2018-05-03 17:11:17', 'image/20180504_001117-001-monitor.svg', 'image/20180504_001117-005-tablet.svg', 'image/20180504_001117-006-shop.svg', 'g'),
(9, 'sdfnbvn', 'dfgfdg', 488, 2, '2018-05-03 17:11:17', 'image/20180504_001117-001-monitor.svg', 'image/20180504_001117-005-tablet.svg', 'image/20180504_001117-006-shop.svg', 'g'),
(10, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(11, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(12, 'ดอกทานตะวัน', 'fghbbh', 446, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(13, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(14, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(15, 'ดอกทานตะวัน', 'fghbbh', 446, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm'),
(16, 'sdfnbvn', 'dfgfdg', 488, 2, '2018-05-03 17:11:17', 'image/20180504_001117-001-monitor.svg', 'image/20180504_001117-005-tablet.svg', 'image/20180504_001117-006-shop.svg', 'g'),
(17, 'sdfnbvn', 'dfgfdg', 488, 2, '2018-05-03 17:11:17', 'image/20180504_001117-001-monitor.svg', 'image/20180504_001117-005-tablet.svg', 'image/20180504_001117-006-shop.svg', 'g'),
(18, 'ดอกทานตะวัน', 'จากวิกิพีเดีย', 300, 50, '2016-10-14 08:54:54', 'image/1.jpg', 'image/1.jpg', 'image/1.jpg', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_cus`
--
ALTER TABLE `order_cus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `cus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_cus`
--
ALTER TABLE `order_cus`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
