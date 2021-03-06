-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 08:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `cardnum` text NOT NULL,
  `card_expiration` text NOT NULL,
  `card_securitynum` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `username`, `pass_hash`, `secret`) VALUES
(14, 'parth', '$2y$10$JPG.qKXQmaM8hlgLE06zDO21LMPEdWfNH6xfHLDMCm9J6IoIT1d.G', '6YWCH5BFI6VT2L2L'),
(15, 'asdf', '$2y$10$nfm4yLXRAH9laZlkPZ/EQeZw6SYndmLKr7H1lslpfmpyzabk6S0lq', 'HBW2RS7VRNVSNJK4'),
(17, 'test', '$2y$10$wKNtCDdBBsUOStfsj4wKKOEZ7Fr/ogG0GGhgGj.kR7u2t2ilQVQGe', 'YLSGGL35JZAEZL7V'),
(18, 'armenj', '$2y$10$7ULaF.czfy5HepwxJ7IB4OF7inL8RVYwWstjh1eUL0yWm/bolb/uu', 'OPOYVJOE5MQKHFSJ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `rating` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `rating`, `image`) VALUES
(1, 'Test', '9999.99', 'test item', 0, ''),
(6, 'Test 1', '9999.99', 'test item 1', 0, ''),
(7, 'Test 2', '9999.99', 'test item 2', 0, ''),
(8, 'Test 3', '9999.99', 'test item 3', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `City`, `Phone`, `Picture`) VALUES
(1, 'Dave', 'Halifax', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;