-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 12:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eeelectronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Customer_id` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Customer_id`, `Date`) VALUES
(1, 'ww', '2022-04-11'),
(2, '', '2022-11-11'),
(3, '', '2022-11-11'),
(4, '', '2022-11-11'),
(5, '', '2022-11-11'),
(6, '', '2022-11-11'),
(7, '8', '2022-11-11'),
(8, '8', '2022-11-11'),
(9, '8', '2022-11-11'),
(10, '8', '2022-11-11'),
(11, '8', '2022-11-11'),
(12, '8', '2022-11-11'),
(13, '8', '2022-11-11'),
(14, '8', '2022-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Test` int(11) NOT NULL,
  `Product_id` text NOT NULL,
  `Product_Model` text NOT NULL,
  `Picture` text NOT NULL,
  `Description` text NOT NULL,
  `Price` float NOT NULL,
  `Type` text NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Test`, `Product_id`, `Product_Model`, `Picture`, `Description`, `Price`, `Type`, `Stock`) VALUES
(7, 'C000001', 'Macbook_pro', 'https://www.ubuy.com.sg/productimg/?image=aHR0cHM6Ly9tLm1lZGlhLWFtYXpvbi5jb20vaW1hZ2VzL0kvNzFwQzY5STNsekwuX0FDX1NMMTUwMF8uanBn.jpg', '14 inch', 1499.99, 'Computer', 0),
(9, 'Test', 'Test', 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/macbook-air-midnight-select-20220606?wid=904&hei=840&fmt=jpeg&qlt=90&.v=1653084303665', 'Test', 1200, 'Computer', 0),
(10, 'T000001', 'Ipad_Mini', 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ipad-mini-select-wifi-pink-202109_FMT_WHH?wid=1000&hei=1000&fmt=jpeg&qlt=95&.v=1629840647000', 'Ipad Mini', 1000, 'Tablet', 100),
(11, 'C222', 'Maic', 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/refurb-mac-mini-2020?wid=1144&hei=1144&fmt=jpeg&qlt=90&.v=1614364640000', 'Maic', 500, 'Computer', 100),
(13, 'C123456', 'Alienware', 'https://cdn1.productnation.co/stg/sites/3/62d140f8be848.jpeg', 'Wow', 3000, 'Computer', 300),
(20, 'Lettuce', 'try', 'https://i.dell.com/is/image/DellContent//content/dam/ss2/product-images/dell-client-products/notebooks/latitude-notebooks/14-3420/media-gallery/peripherals_laptop_latitude_3420nt_gallery_1.psd?fmt=pjpg&pscan=auto&scl=1&wid=3319&hei=2405&qlt=100,1&resMode=sharp2&size=3319,2405&chrss=full&imwidth=5000', 'thisagain', 12, 'Computer', 1),
(21, 'Laptop', 'C000002', 'https://images.prismic.io/frameworkmarketplace/46cbf974-cdff-4cd8-b761-8b4a3343f6c4_FW-chromebook-homepage-carousel.png?auto=compress,format', 'Laptop', 1500, 'Computer', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `Customer_id` int(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`Customer_id`, `user_name`, `display_name`, `password`, `email`) VALUES
(4, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', ''),
(5, 'aa', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa@aa.com'),
(6, 'wed', '', '42647ab608c1dbafc2b378c45dc7bd8a', ''),
(7, 'wendy', '', '2cff03e4b9eb85b3bf5e924ccdc1348d', ''),
(8, 'ww', 'ww', 'ad57484016654da87125db86f4227ea3', 'ww@ww.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Test`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`Customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `Customer_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
