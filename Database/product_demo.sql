-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 05:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `is_active` varchar(2) NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `is_active`, `insert_date`) VALUES
(1, 'Mobile', '1', '2024-02-09 03:17:33'),
(2, 'Laptop', '1', '2024-02-09 03:17:33'),
(3, 'AC', '1', '2024-02-09 03:17:33'),
(4, 'TV', '1', '2024-02-09 03:17:33'),
(5, 'Smart Watch', '1', '2024-02-09 03:45:29'),
(6, 'Home Appliances', '1', '2024-02-09 03:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `product_qty`, `product_price`) VALUES
(1, 0, 3, 5, 111499),
(2, 0, 1, 3, 15499),
(3, 0, 4, 2, 111499),
(4, 6, 1, 5, 15499),
(5, 7, 3, 4, 111499);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_mobile` varchar(10) NOT NULL,
  `shipping_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `order_date`, `user_id`, `order_status`, `shipping_name`, `shipping_mobile`, `shipping_address`) VALUES
(1, '0000-00-00 00:00:00', 0, 'pending', '', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH'),
(2, '0000-00-00 00:00:00', 0, 'pending', 'SOHIL', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH'),
(3, '2011-02-23 18:30:00', 0, 'pending', 'SOHIL', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH'),
(4, '2011-02-23 18:30:00', 1, 'pending', 'SOHIL', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH'),
(5, '2011-02-23 18:30:00', 1, 'pending', 'SOHIL', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH'),
(6, '2011-02-23 18:30:00', 1, 'pending', 'SOHIL', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH'),
(7, '2011-02-23 18:30:00', 1, 'pending', 'SOHIL', '7383063130', '203,  BASERA APPT, NAVA GHANCHI WADA, SUKHNATH CHOWK,, JUNAGADH');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `pro_id` int(5) NOT NULL,
  `pro_title` varchar(100) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `sub_cat_id` int(5) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `is_active` varchar(3) NOT NULL,
  `is_delete` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`pro_id`, `pro_title`, `pro_detail`, `pro_price`, `pro_image`, `sub_cat_id`, `pro_qty`, `is_active`, `is_delete`) VALUES
(1, 'Samsung Galaxy A14 5G ', '(Dark Red, 4GB, 128GB Storage) | Triple Rear Camera (50 MP Main) | Upto 8 GB RAM with RAM Plus | Without Charger', 15499, 'm21.jpg', 1, 7, '1', '0'),
(2, 'Samsung Galaxy A14 5G ', '(Dark Red, 4GB, 128GB Storage) | Triple Rear Camera (50 MP Main) | Upto 8 GB RAM with RAM Plus | Without Charger', 15499, 'm21.jpg', 1, 7, '1', '0'),
(3, 'Microsoft New Surface Pro9', ' 13 Inch (33.03 cm)\r\n Intel Evo 12 Gen i5 / 8GB / 256GB Graphite with Windows 11 Home, Wi-Fi, 365 Family 30-Day Trial & Xbox Game Pass Ultimate 30-Day Trial', 111499, '51L40XTsN+L._AC_UY218_.jpg', 8, 8, '1', '0'),
(4, 'Microsoft New Surface Pro9', ' 13 Inch (33.03 cm)\r\n Intel Evo 12 Gen i5 / 8GB / 256GB Graphite with Windows 11 Home, Wi-Fi, 365 Family 30-Day Trial & Xbox Game Pass Ultimate 30-Day Trial', 111499, '51L40XTsN+L._AC_UY218_.jpg', 8, 8, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(9) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'sohil vora', 'user@user', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(5) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `is_active` varchar(2) NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_name`, `cat_id`, `is_active`, `insert_date`) VALUES
(1, 'Smart Phone', 1, '1', '2024-02-09 03:18:55'),
(2, 'Smart Watch', 5, '1', '2024-02-09 03:47:17'),
(3, 'MacBook', 2, '1', '2024-02-09 03:18:43'),
(4, 'Android Tv', 4, '4', '2024-02-08 09:59:28'),
(5, 'Apple Phone', 2, '5', '2024-02-09 03:18:33'),
(7, 'Power Bank', 1, '1', '2024-02-09 03:34:58'),
(8, 'Laptop', 2, '1', '2024-02-09 04:37:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
