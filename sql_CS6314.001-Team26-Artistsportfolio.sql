-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 06:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(1, 'carousel1.jpg'),
(3, 'carousel3.jpg'),
(5, 'carousel5.jpg'),
(27, '13.jpg'),
(30, '10.jpg'),
(31, '1.jpg.jpeg'),
(32, '8.jpg'),
(35, 'carousel4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `image`) VALUES
(1, 'carousel2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `merch_id` int(100) NOT NULL,
  `item_type` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`merch_id`, `item_type`, `item_name`, `item_price`, `item_image`, `gender`) VALUES
(3, 'merch', 'tshirt_black_female', 20, 'tshirt_black_female.jpg', 'f'),
(11, 'merch', 'tshirt_white_male', 10, 'tshirt_white_male.jpg', 'm'),
(12, 'merch', 'tshirt_grey_male', 15, 'tshirt_grey_male.jpg', 'm'),
(18, 'merch', 'tshirt_white_female', 10, 'tshirt_white_female.jpg', 'f'),
(19, 'merch', 'tshirt_orange_female', 10, 'tshirt_orange_female.jpg', 'f'),
(22, 'merch', 'tshirt_white_female', 12, 'tshirt_white_female.jpg', 'f'),
(23, 'merch', 'tshirt_grey_male', 15, 'tshirt_grey_male.jpg', 'm'),
(24, 'merch', 'tshirt_orange_female', 15, 'tshirt_orange_female.jpg', 'f'),
(25, 'merch', 'tshirt_white_male', 20, 'tshirt_white_male.jpg', 'm'),
(26, 'merch', 'tshirt_black_female', 10, 'tshirt_black_female.jpg', 'f'),
(27, 'merch', 'tshirt_black_female', 15, 'tshirt_black_female.jpg', 'f'),
(28, 'merch', 'tshirt_white_male', 10, 'tshirt_white_male.jpg', 'm'),
(29, 'merch', 'tshirt_grey_male', 15, 'tshirt_grey_male.jpg', 'm'),
(33, 'merch', 'tshirt_black_female', 100, 'tshirt_orange_female.jpg', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `date` int(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `location`, `day`, `date`, `month`, `year`, `image`, `ticket`) VALUES
(1, 'Paris', 'Wednesday', 27, 'January', 2021, 'paris.jpg', 'https://seatgeek.com/concert-tickets'),
(2, 'New York', 'Saturday', 30, 'Januray', 2021, 'newyork.jpg', 'https://seatgeek.com/concert-tickets'),
(4, 'San Francisco', 'Sunday', 29, 'February', 2015, 'sanfran.jpg', 'https://seatgeek.com/concert-tickets');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `item_id`, `item_name`, `item_price`, `item_image`, `quantity`, `date`) VALUES
(51, 2, 3, 'tshirt_black_female', 20, 'tshirt_black_female.jpg', 2, '2020-12-06 22:30:18'),
(53, 2, 19, 'tshirt_orange_female', 10, 'tshirt_orange_female.jpg', 2, '2020-12-06 22:30:18'),
(54, 2, 3, 'tshirt_black_female', 20, 'tshirt_black_female.jpg', 2, '2020-12-06 22:57:02'),
(55, 2, 11, 'tshirt_white_male', 10, 'tshirt_white_male.jpg', 1, '2020-12-06 22:57:02'),
(56, 2, 12, 'tshirt_grey_male', 15, 'tshirt_grey_male.jpg', 1, '2020-12-06 22:57:02'),
(57, 2, 18, 'tshirt_white_female', 10, 'tshirt_white_female.jpg', 1, '2020-12-06 22:57:02'),
(58, 2, 19, 'tshirt_orange_female', 10, 'tshirt_orange_female.jpg', 1, '2020-12-06 22:57:02'),
(59, 2, 22, 'tshirt_white_female', 12, 'tshirt_white_female.jpg', 1, '2020-12-06 22:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123'),
(2, 'rose', 'rose@gmail.com', 'rose123');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `youtubeid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `youtubeid`) VALUES
(1, 'My Other Side (Open Air)', 'mqiuOfrz7So'),
(2, 'My Other Side (Official Video)', 'MVAo-7Kgrxs'),
(3, 'Walk With Me (Official Video)', 'OJLRRMye4YI'),
(4, 'Shaayad (Official Video)', 'Cdys7CdwZac'),
(5, 'Ngo Akin | NYISHI TRIBE SONG', 'D9j6T3VLGy8'),
(6, 'A Family Get Together (Audio)', '3g3flfL-7qA'),
(7, 'Morning Sun | Stop Motion Music Video', 'peBCfGoNOkc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`merch_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `merch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
