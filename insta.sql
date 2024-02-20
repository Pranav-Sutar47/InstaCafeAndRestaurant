-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 03:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta`
--

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

CREATE TABLE `bar` (
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`name`, `price`) VALUES
('Appletini', 1800),
('Choc Pear', 150),
('Tamarind Margarita', 200),
('Ultimate Lemon Drop', 550);

-- --------------------------------------------------------

--
-- Table structure for table `customerdata`
--

CREATE TABLE `customerdata` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `village` varchar(35) NOT NULL,
  `dist` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `itemcategory` varchar(20) NOT NULL,
  `itemname` varchar(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pperq` float NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerdata`
--

INSERT INTO `customerdata` (`id`, `name`, `mobileno`, `email`, `village`, `dist`, `state`, `itemcategory`, `itemname`, `quantity`, `pperq`, `price`, `status`) VALUES
(1, 'Sanchita Chavan', '9665646048', 'sanchitachavan08@gmail.co', 'Sangali', 'Sangali', 'Maharashtra', 'Kids Special', 'Soft Drinks', 1, 15, 15, 0),
(3, 'Viraj Benade', '9730628692', 'virajbenade34@gmail.com', 'Kote', 'Kolhapur', 'Maharashtra', 'Indian Food', 'Aloo Tikki', 2, 70, 140, 0),
(5, 'Pranav', '9730628692', 'pranavsutar4747@gmail.com', 'Kote', 'Kolhapur', 'Maharashtra', 'Indian Food', 'Chicken Tikka', 2, 250, 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `mobileno`, `email`, `feedback`) VALUES
('Manish', '7350831920', 'manishsutar1314@gmail.com', 'Nice Food.'),
('Pranav', '9730628692', 'drsandip511@gmail.com', 'Hi'),
('Viraj Benade', '9730628697', 'virajbenade34@gmail.com', 'Nice Food');

-- --------------------------------------------------------

--
-- Table structure for table `indianfood`
--

CREATE TABLE `indianfood` (
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indianfood`
--

INSERT INTO `indianfood` (`name`, `price`) VALUES
('Aloo Tikki', 70),
('Chicken Pakora', 100),
('Chicken Tikka', 250),
('Dal Soup', 50),
('Momo', 90),
('Onion Bhaji', 30),
('Pakora Masala', 80),
('Samosa', 15);

-- --------------------------------------------------------

--
-- Table structure for table `kidsfood`
--

CREATE TABLE `kidsfood` (
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kidsfood`
--

INSERT INTO `kidsfood` (`name`, `price`) VALUES
('3 PIECE TANDOORI CHI', 50),
('4 Piece Chicken Strips & ', 80),
('Apple Juice', 30),
('CHICKEN MOMO', 100),
('Chocolate Cake W/Vanilla ', 40),
('Chocolate Vanilla Shake', 30),
('Jaipuri Samosa', 20),
('Mango Kulfi', 40),
('Mango Lassi', 10),
('Oranage Juice', 30),
('Pista Kulfi', 20),
('Roy Rodgers', 20),
('Shirley Temple', 30),
('Soft Drinks', 15),
('Sweet Lassi', 20),
('Vanilla Ice Cream', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`mobileno`);

--
-- Indexes for table `indianfood`
--
ALTER TABLE `indianfood`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `kidsfood`
--
ALTER TABLE `kidsfood`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerdata`
--
ALTER TABLE `customerdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
