-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2015 at 04:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cobike`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE IF NOT EXISTS `bikes` (
  `id` int(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `user_id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `mileage` int(3) NOT NULL,
  `no_of_gears` int(2) NOT NULL,
  `fuel_capacity` int(2) NOT NULL,
  `kerb_weight` int(3) NOT NULL,
  `self_start` varchar(20) NOT NULL,
  `Other` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '/img/images/not_available.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `category_id`, `user_id`, `name`, `price`, `mileage`, `no_of_gears`, `fuel_capacity`, `kerb_weight`, `self_start`, `Other`, `date`, `image`) VALUES
(2, 2, 2, 'pulsar', 3000000, 2, 2, 2, 2, 'yes', 'sexy', '0000-00-00', '/img/images/not_available.jpg'),
(4, 3, 3, 'bibi', 0, 2, 2, 2, 2, 'yes', 'es', '0000-00-00', '/img/images/15-08-27-11698588_377634105763878_3669713161899668915_n.jpg'),
(7, 3, 5, 'splendor', 0, 23, 23, 23, 23, 'yes', 'this is splendor goods', '0000-00-00', '/img/images/not_available.jpg'),
(8, 4, 4, 'Apache ', 0, 23, 23, 23, 23, 'yes', 'this is good bike', '0000-00-00', '/img/images/not_available.jpg'),
(9, 4, 4, 'Apache1', 0, 34, 34, 34, 34, 'yes', 'this is apache2', '0000-00-00', '/img/images/not_available.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booked_bikes`
--

CREATE TABLE IF NOT EXISTS `booked_bikes` (
  `id` int(20) NOT NULL,
  `bike_id` int(20) NOT NULL,
  `booked_date` date NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `age` int(99) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_bikes`
--

INSERT INTO `booked_bikes` (`id`, `bike_id`, `booked_date`, `first_name`, `last_name`, `phone_number`, `email`, `age`) VALUES
(1, 2, '2035-01-01', 'muskan', 'rimal', '87999898', 'paudelbipin@yahoo.com', 23),
(2, 2, '2035-01-01', 'Hari', 'laal', '9841407649', 'paudelbipin.bp@gmail.com', 23);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(2, 'Bajaj', 'this is bajaj\r\n'),
(3, 'Hero', 'This is a hero without heroine\r\n'),
(4, 'TVS', 'This is TVS bikes\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `role` enum('admin','vendor') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `phone_number`, `role`) VALUES
(2, 'Bipin', 'Paudel', 'bipinpaudel', 'af2c788d78eeb431c402511d1831279a28ad173c', 'paudelbipin@yahoo.com', '9843178051', 'admin'),
(3, 'Bikash', 'bi', 'bikash', 'af2c788d78eeb431c402511d1831279a28ad173c', 'paudelram@yahoo.com', '9898989898', 'vendor'),
(4, 'Umesh', 'Dhungana', 'umesh', 'af2c788d78eeb431c402511d1831279a28ad173c', 'umesh@gmail.com', '9843554321', 'vendor'),
(5, 'Nikita', 'Gautam', 'nikita', 'af2c788d78eeb431c402511d1831279a28ad173c', 'nikita@gmail.com', '98', 'admin'),
(6, 'admin', 'admin', 'admin', 'af2c788d78eeb431c402511d1831279a28ad173c', 'admin@gmail.com', '1111111111', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_bikes`
--
ALTER TABLE `booked_bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `booked_bikes`
--
ALTER TABLE `booked_bikes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
