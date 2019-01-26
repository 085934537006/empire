-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 11:56 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empire`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer_name`, `manufacturer_logo`) VALUES
(16, 'Alfa Romeo', ''),
(18, 'BMW', ''),
(19, 'Bugatti', ''),
(20, 'Aston Martin', ''),
(21, 'Audi', ''),
(22, 'Toyota', ''),
(23, 'Daihatsu', ''),
(24, 'Suzuki', '');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `manufacturer_id`, `model_name`, `model_description`) VALUES
(12, 23, 'Xenia', ''),
(13, 22, 'Avanza', ''),
(14, 24, 'Ertiga', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `su` int(11) DEFAULT '0',
  `adminlevel` int(11) DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `su`, `adminlevel`, `email`, `password`, `first_name`, `last_name`, `birthday`, `mobile`, `address`) VALUES
(6, 1, 2, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', '2016-12-27', '081912345678', 'asdfsdafasd'),
(7, 1, 1, 'employee@employee.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'EMPLOYEE', 'EDISON', '2015-11-30', '2323', 'qwsdasd'),
(8, 0, 0, 'me@mail.com', '098f6bcd4621d373cade4e832627b4f6', 'Me', 'Time', '1990-01-01', '081999123331', 'Monjok'),
(9, 0, 0, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Pengguna', 'Acak', '1990-01-01', '081777199200', 'Jl TEngah'),
(10, 0, 0, 'mimin@mimin.com', '03f7f7198958ffbda01db956d15f134a', 'Mimin', 'Mimin', '1990-01-01', '0192183103921', 'A'),
(11, 0, 0, 'p@a.com', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', '1990-11-11', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `mileage` int(11) NOT NULL,
  `color` varchar(15) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sold_date` datetime DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'available',
  `registration_year` int(4) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gear` varchar(15) NOT NULL,
  `doors` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `tank` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `engine_no` int(11) NOT NULL,
  `chesis_no` int(11) NOT NULL,
  `featured` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `manufacturer_id`, `model_id`, `category`, `price`, `mileage`, `color`, `add_date`, `sold_date`, `status`, `registration_year`, `insurance_id`, `user_id`, `gear`, `doors`, `seats`, `tank`, `image`, `engine_no`, `chesis_no`, `featured`) VALUES
(2, 16, 9, 'Subcompact', 12000100, 55, 'red', '2016-12-27 12:00:00', NULL, 'available', 2010, 2147483647, 1, 'auto', 6, 2147483647, 25, '77303.jpg', 2147483647, 21231231, 1),
(5, 18, 9, 'Subcompact', 10000200, 25, 'black', '2016-12-27 12:00:00', NULL, 'available', 2010, 4545656, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', 2147483647, 21231231, 1),
(7, 19, 10, 'Subcompact', 11000100, 25, 'black', '2016-12-27 12:00:00', '2016-12-29 00:00:00', 'sold', 2010, 4545656, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', 2147483647, 21231231, NULL),
(8, 20, 9, 'Compact', 10000100, 556, 'Yellow', '2016-12-28 12:00:00', '2016-12-29 00:00:00', 'sold', 2012, 2147483647, 1, 'auto', 4, 4, 25, 'yellow-lamborghini-gallardo-Wallpaper.jpg', 2147483647, 2147483647, NULL),
(12, 16, 9, 'Subcompact', 2000000, 3, 'Black', '2016-12-28 12:00:00', '2016-12-29 00:00:00', 'sold', 2001, 121212, 1, 'auto', 2, 3, 34, '7538.jpg', 23232, 232323, 1),
(17, 23, 12, 'Subcompact', 150000000, 2000, '1', '2019-01-24 16:00:00', NULL, 'available', 1990, 0, 6, 'auto', 4, 7, 10, 'download2.jpg', 1, 1, 1),
(18, 24, 14, 'Subcompact', 270000000, 1, 'Biru', '2019-01-24 16:00:00', '2019-01-25 00:00:00', 'sold', 1990, 0, 6, 'auto', 4, 7, 5, 'images_(1).jpg', 1, 1, 1),
(19, 18, 12, 'Subcompact', 1, 1, 'a', '2019-01-24 16:00:00', NULL, 'available', 1, 0, 9, 'auto', 1, 1, 1, 'download_(1)1.jpg', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
