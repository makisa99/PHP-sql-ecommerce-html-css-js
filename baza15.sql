-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 08:45 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza15`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `laptop_id`) VALUES
(9, 4, 11),
(15, 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `problem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `cena` smallint(6) NOT NULL,
  `pic_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `ime`, `cena`, `pic_url`) VALUES
(11, 'sadasd', 123, ''),
(12, 'sadas123', 2312, ''),
(14, 'aCES', 12312, ''),
(15, 'AsusROG', 998, 'https://www.notebooks-center.com/img/laptop/large/laptop_asus_g703s_ro_e5051t_1.jpg'),
(16, 'asd', 0, 'sad'),
(17, 'asd', 0, 'asd'),
(18, 'asd', 0, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`id`, `user_id`, `laptop_id`) VALUES
(1, 1, 11),
(2, 1, 15),
(3, 1, 15),
(4, 1, 15),
(5, 1, 11),
(6, 1, 12),
(7, 3, 14),
(8, 3, 15),
(9, 1, 11),
(10, 6, 14),
(11, 1, 15),
(12, 1, 15),
(13, 1, 15),
(14, 1, 15),
(15, 1, 15),
(16, 1, 15),
(17, 1, 15),
(18, 1, 15),
(19, 1, 15),
(20, 1, 15),
(21, 1, 15),
(22, 1, 15),
(23, 1, 15),
(24, 1, 15),
(25, 1, 15),
(26, 1, 15),
(27, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sifra` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `email`, `sifra`, `admin`) VALUES
(1, 'Mario', 'mario@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'obican', 'obican@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(3, 'user', 'user@user.com', '202cb962ac59075b964b07152d234b70', 0),
(4, '123', '123@123.123', '202cb962ac59075b964b07152d234b70', 0),
(5, 'Vanja', 'Vanja@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(6, 'asd', 'asd@asd.com', '202cb962ac59075b964b07152d234b70', 0),
(7, 'user', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
