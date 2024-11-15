-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 09:41 PM
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
-- Database: `online_ordering_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `order_id`, `name`, `quantity`, `price`) VALUES
(457, 2, 'Tinola', 3, 45),
(458, 2, 'Adobo', 3, 35),
(460, 0, 'Adobo', 1, 35),
(461, 2, 'Adobo', 1, 35),
(463, 0, 'Adobo', 1, 35),
(464, 0, 'Adobo', 1, 35),
(470, 4, 'Adobo', 1, 35),
(471, 4, 'Tinola', 2, 45),
(472, 5, 'Cordon bleu', 1, 80),
(473, 5, 'Bulalo', 1, 100),
(474, 7, 'Adobo', 1, 35),
(475, 7, 'Kare-Kare', 2, 80),
(476, 7, 'Tinola', 1, 45),
(477, 8, 'Adobo', 3, 35),
(480, 9, 'Tinola', 1, 45),
(482, 10, 'Tinola', 1, 45),
(483, 11, 'Sinigang', 1, 70),
(484, 11, 'Kare-Kare', 5, 80),
(485, 11, 'Cordon bleu', 2, 80),
(486, 13, 'Adobo', 1, 35),
(487, 13, 'Adobo', 1, 35),
(488, 13, 'Adobo', 1, 35),
(489, 14, 'Tinola', 1, 45),
(491, 14, 'Cordon bleu', 1, 80),
(492, 14, 'Cordon bleu', 1, 80),
(494, 15, 'Bulalo', 1, 100),
(495, 18, 'Adobo', 1, 35),
(496, 18, 'Sinigang', 1, 70),
(497, 19, 'Adobo', 1, 35),
(498, 19, 'Bulalo', 1, 100),
(500, 20, 'Bulalo', 1, 100),
(502, 21, 'Bulalo', 1, 100),
(504, 22, 'Tinola', 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `imagelink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `price`, `imagelink`) VALUES
(32, 'Bulalo', 100, '/img/bulalo.jpg'),
(42, 'Adobo', 35, '/img/adobo.jpg'),
(57, 'Tinola', 45, '/img/tinola.jpg'),
(58, 'Cordon bleu', 80, '/img/cordonbleu.jpg'),
(59, 'Sinigang', 70, '/img/sinigang.jpg'),
(60, 'Kare-Kare', 80, '/img/karekare.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `deliverymode` varchar(255) NOT NULL,
  `contact_num` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `paymentmethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `first_name`, `last_name`, `deliverymode`, `contact_num`, `address`, `totalamount`, `paymentmethod`) VALUES
(1, 83, '', '', 'Yoo', 0, '', 0, ''),
(2, 67, '', '', 'Delivery', 0, '', 0, ''),
(8, 1, 'Claricel', 'Vergara', '', 84754938, 'Bagac', 105, ''),
(9, 1, 'jello', 'vergz', '', 3949274, 'pangasinan', 45, ''),
(10, 1, 'Claricel', 'as', 'Delivery Vehicle', 643532, 'ewt', 45, 'credit'),
(11, 1, 'Selda', 'Mahabags', 'Bike', 9342748, 'Balangas', 630, 'cod'),
(13, 1, '', '', '', 0, '', 0, ''),
(14, 1, '', '', '', 0, '', 0, ''),
(15, 1, '', '', '', 0, '', 0, ''),
(16, 1, '', '', '', 0, '', 0, ''),
(17, 1, '', '', '', 0, '', 0, ''),
(18, 1, '', '', '', 0, '', 0, ''),
(19, 1, '', '', '', 0, '', 0, ''),
(20, 1, '', '', '', 0, '', 100, ''),
(21, 1, 'Kathryn', 'Bernardo', 'Delivery Vehicle', 2147483647, 'Manila', 100, 'cod'),
(22, 1, 'Kathryn', 'Bernardo', 'Bike', 2147483647, 'Llaollao', 45, 'gcash'),
(23, 1, '', '', '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'sample123', 'sample123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;