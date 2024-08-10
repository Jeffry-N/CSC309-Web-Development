-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 08:29 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cName` varchar(255) NOT NULL,
  `imageName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cName`, `imageName`) VALUES
(1, 'MacBook', 'macbooks-removebg-preview.png'),
(2, 'iPhone', 'file-removebg-preview.png'),
(3, 'iPad', 'ipads-removebg-preview.png'),
(4, 'Accessories', 'Apple-Accessories-Logo-Vector-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` varchar(10) NOT NULL,
  `imgename` varchar(255) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `color`, `price`, `imgename`, `categoryId`) VALUES
(1, 'iPhone 15 Pro Max', '2024 brand new iPhone by Apple', 'Black', '2000$', 'iphone15pmax-removebg-preview.png', 2),
(2, 'iPhone 15 Pro', '2023 Apple iPhone 15 Pro', 'white', '1900', 'iphone15p-removebg-preview.png', 2),
(3, 'iPhone 15', '2022 Apple iPhone 13', 'Green', '1800$', 'iphone15-removebg-preview.png', 2),
(4, 'iPhone 14 Pro Max', '2021 Apple iPhone 12', 'Gold', '1700$', 'iphone14prmax-removebg-preview.png', 2),
(5, 'iPhone 14 Pro', '14 proz', 'White', '1600$', 'iphone14pr-removebg-preview.png', 2),
(6, 'iPhone 14 Plus', 'iphone 14 plus', 'Midnight Blue', '1500$', 'iPhone14p-removebg-preview.png', 2),
(7, 'iPhone 14', 'iphone 14', 'Purple', '1400$', 'iPhone14-removebg-preview.png', 2),
(8, 'iPhone 13 Pro Max', 'iphone 13 pro max', 'Black', '1300$', 'iphone13pmax-removebg-preview.png', 2),
(9, 'iPhone 13 Pro', 'iphone 13 peo', 'Pastel Blue', '1200$', 'iphone13p-removebg-preview.png', 2),
(10, 'iPhone 13', 'iphone 13', 'Blue', '1100$', 'iphone13b-removebg-preview.png', 2),
(11, 'iPhone 13 Mini', 'iphone 13 mini', 'Gold', '1000$', 'apple13m.png', 2),
(12, 'iPhone SE', 'iphone se', 'White', '900$', 'iphonese-removebg-preview.png', 2),
(15, 'Apple MacBook Air MXCU3LL/A ', 'Apple Macbook AIR', 'yellow', '3000$', '126mac.png', 1),
(16, 'Macbook Pro A5', 'A5 2024', 'Blue', '2800', '1-25-removebg-preview.png', 1),
(17, 'Macbook Air 3', 'MacBook Air 3 2023', 'Purple', '1850', '1-23-removebg-preview.png', 1),
(18, 'Apple Macbook v12', 'v12 by apple', 'Red', '4500', '1605032111_1604809-removebg-preview.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `date_of_birth`, `is_admin`, `is_active`) VALUES
(4, 'Robert', '$2y$10$ZOyiC3WXn.H08Lyt/z9XZexw.eDrX1BIty2LmlANwhi3NklvI8K/G', 'Robert', 'Abi Najem', '2003-02-15', 0, 0),
(3, 'Admin', '$2y$10$0bHX6t4kZWswkyUn3G628.icHBAQl2lGAzBwedEGxMk3hhamJjoKW', 'Administrator', '.j', '2004-10-20', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
