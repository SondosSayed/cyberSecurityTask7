-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 03:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amna store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `barcode`, `name`, `price`, `qty`, `image`) VALUES
(29, 20, 'Blouse', 5, 24, 'blousee.png'),
(30, 78, 'Niqab', 7, 6, 'niqab1.png'),
(31, 7, 'Skirt', 5, 14, 'skirtt.png'),
(32, 15, 'Hijab', 14, 25, 'w1.png');

-- --------------------------------------------------------

--
-- Table structure for table `testproduct`
--

CREATE TABLE `testproduct` (
  `product_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `testproduct`
--

INSERT INTO `testproduct` (`product_id`, `barcode`, `name`, `price`, `qty`, `image`) VALUES
(58, 5, 'Abaya', 50, 20, 'w2.png'),
(59, 3, 'Sweater', 10, 5, 'blouseAndsweater.png'),
(60, 15, 'Dress', 20, 7, 'w4.png'),
(61, 8, 'Niqab', 10, 31, 'niqab2.png'),
(62, 2, 'Skirt', 18, 14, 'skirtt.png'),
(64, 20, 'Blouse', 5, 24, 'blousee.png'),
(67, 33, 'Abaya', 20, 14, 'w3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_name`, `email`, `password`, `role`) VALUES
(13, 'Sondos Sayed Gaber', 'sondos', 'sondosgaber98@gmail.com', '$2y$10$o1OMIcUoe.xYBhJuJMCQZulOU1NkcI8HH.XYmM61EJkSoTJlxdinu', 'user'),
(14, 'Sondos Gaber', 'sondos015', 'sondos@gmail.com', '$2y$10$YHftGzeVlWXH15/cCgwg1.XYajcF.dVhzdOYwBbrHG/gHWNQ8CBVG', 'admin'),
(15, 'Sondos Sayed Gaber', 'sondosGaber', 'sondosgaber98@gmail.com', '$2y$10$DpODW5NCI91zdYDw4maSq.V0og18CvkIxVsKYaZOOb6zG4byD7fhC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `testproduct`
--
ALTER TABLE `testproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `testproduct`
--
ALTER TABLE `testproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
