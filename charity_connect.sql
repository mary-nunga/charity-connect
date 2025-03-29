-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `Donation_id` int(11) NOT NULL,
  `Receipient_name` varchar(250) DEFAULT NULL,
  `Amount_donated` varchar(250) DEFAULT NULL,
  `Payment_method` varchar(250) DEFAULT NULL,
  `Donor` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`Donation_id`, `Receipient_name`, `Amount_donated`, `Payment_method`, `Donor`, `Date`) VALUES
(1, 'Stacy', '200000', 'Card', 'dariu5', '2025-03-28'),
(2, 'Marion Academy', '96000', 'Card', 'dariu5', '2025-03-28'),
(3, 'James', '1230000', 'MPESA', 'dobby_is_free', '2025-03-28'),
(4, 'Bruce', '650000', 'Paypal', 'dobby_is_free', '2025-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `name`, `title`, `description`, `image`) VALUES
(1, 'James', 'STAND WITH JAMES', 'James is a 10 year old boy who was left orphaned and homeless by a war in his city. He is currently placed in a welfare camp and needs your help to build his life. Be James\' hero', 'James.jpeg'),
(2, 'Marion Academy', 'SUPPORT MARION ACADEMY', 'Marion academy is a kindergaten whos mission is to provide free education to children everywhere. They are in need of financial support to make it possible. Help them help others.', 'school.jpg'),
(3, 'Stacy', 'STAND WITH STACY', 'Stacy is in need of your help to pay for her college fund. Be her hero today', 'Stacy.jpeg'),
(4, 'Bruce', 'BE A HERO', 'Bruce is 21 years old and does not have enough income to support his growing business. Help Bruce grow.', 'bruce.jpeg'),
(5, 'Sophie', 'SOPHIE NEEDS YOUR HELP', 'Sophie is an 18 year old girl who is suffering from leukimia. Her parents have tried their best to pay for her medical bills but it is becoming too much for them to handle. Help Sophie recover.', 'Sophie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ID` int(250) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FirstName`, `LastName`, `Username`, `Password`, `ID`, `role`) VALUES
('Administrator', 'N/A', 'admin', '$2y$10$GZ86FydxHPs2hvPCkl069eJElrimYssZWPgFFKElOKsOEqA43TWiK', 1, 'admin'),
('Damien', 'Salvator', 'damien', '$2y$10$41Y.OmfjZeRrh4/gQCd4H.IBbcjcBZVf4cMkGWTfW2mzUpoHsO9GW', 7, 'user'),
('Dobby', 'Sock', 'dobby_is_free', '$2y$10$q6QxcauEDXoRAv5OXFnvju8CCuIOVg.3Yl607Y0tsO6p.WE1koVG6', 8, 'user'),
('Sam', 'Darius', 'dariu5', '$2y$10$TqPoeVVca901cXtZckFKHOZZWCA29nZyefWXH0B.fATRgDj97gZ0m', 9, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`Donation_id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `Donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
