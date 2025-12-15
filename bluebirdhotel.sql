-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 12:56 PM
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
-- Database: `bluebirdhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

CREATE TABLE `emp_login` (
  `empid` int(100) NOT NULL,
  `Emp_Email` varchar(50) NOT NULL,
  `Emp_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`empid`, `Emp_Email`, `Emp_Password`) VALUES
(1, 'Admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `NoofRoom` int(30) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `noofdays` int(30) NOT NULL,
  `roomtotal` double(8,2) NOT NULL,
  `bedtotal` double(8,2) NOT NULL,
  `meal` varchar(30) NOT NULL,
  `mealtotal` double(8,2) NOT NULL,
  `finaltotal` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Name`, `Email`, `RoomType`, `Bed`, `NoofRoom`, `cin`, `cout`, `noofdays`, `roomtotal`, `bedtotal`, `meal`, `mealtotal`, `finaltotal`) VALUES
(9, 'Azizi Jamaludin', 'az@gmail.com', 'Single', 'Single', 1, '2025-12-15', '2025-12-18', 3, 0.00, 0.00, 'Room only', 0.00, 0.00),
(10, 'Azizi Jamaludin', 'az@gmail.com', 'Guest House', 'Triple', 1, '2025-12-15', '2025-12-18', 3, 4500.00, 135.00, 'Breakfast', 270.00, 4905.00);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `bedding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`) VALUES
(31, '', ''),
(32, '', ''),
(33, 'Superior Room', 'Single'),
(34, 'Deluxe Room', 'Quad'),
(35, 'Single Room', 'Double'),
(36, 'Guest House', ''),
(37, 'Deluxe Room', ''),
(38, 'Deluxe Room', ''),
(39, '', 'Quad'),
(40, 'Superior Room', ''),
(41, 'Single Room', ''),
(42, 'Single Room', '');

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `icnumber` varchar(18) NOT NULL,
  `dob` date NOT NULL,
  `Country` varchar(30) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `Emergcontname` varchar(50) NOT NULL,
  `Emergcontphone` varchar(50) NOT NULL,
  `adult` varchar(50) NOT NULL,
  `children` varchar(50) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `NoofRoom` varchar(30) NOT NULL,
  `Meal` varchar(30) NOT NULL,
  `smoke` varchar(50) NOT NULL,
  `arrival_time` varchar(50) NOT NULL,
  `departure_time` varchar(50) NOT NULL,
  `special_request` varchar(50) NOT NULL,
  `promo_code` varchar(50) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `nodays` int(50) NOT NULL,
  `stat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `firstname`, `lastname`, `icnumber`, `dob`, `Country`, `occupation`, `Email`, `Phone`, `address`, `city`, `state`, `postcode`, `Emergcontname`, `Emergcontphone`, `adult`, `children`, `RoomType`, `Bed`, `NoofRoom`, `Meal`, `smoke`, `arrival_time`, `departure_time`, `special_request`, `promo_code`, `cin`, `cout`, `nodays`, `stat`) VALUES
(9, 'Azizi', 'Jamaludin', '0922129121', '0000-00-00', 'Malaysia', 'Student', 'az@gmail.com', '0172922725', 'No 77', 'melaka', 'melaka', '041321', 'muaz rafie', '0123456789', '1', '1', 'Single', 'Single', '1', 'Room only', 'Yes', '1', '1', '1', '1', '2025-12-15', '2025-12-18', 3, 'Confirm'),
(10, 'Azizi', 'Jamaludin', '0922129121', '2025-12-15', 'Malaysia', 'Student', 'az@gmail.com', '0172922725', 'No 77', 'melaka', 'melaka', '041321', 'muaz rafie', '0123456789', '1', '1', 'Guest House', 'Triple', '1', 'Breakfast', 'Yes', '1', '1', '1', '1', '2025-12-15', '2025-12-18', 3, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `UserID` int(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`UserID`, `Email`, `Password`, `firstname`, `lastname`, `phone`) VALUES
(1, 'az@gmail.com', '12345', 'Azizi', 'Jamaludin', '19231');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `work` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `work`) VALUES
(1, 'Tushar pankhaniya', 'Manager'),
(3, 'rohit patel', 'Cook'),
(4, 'Dipak', 'Cook'),
(5, 'tirth', 'Helper'),
(6, 'mohan', 'Helper'),
(7, 'shyam', 'cleaner'),
(8, 'rohan', 'weighter'),
(9, 'hiren', 'weighter'),
(10, 'nikunj', 'weighter'),
(11, 'rekha', 'Cook');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_login`
--
ALTER TABLE `emp_login`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_login`
--
ALTER TABLE `emp_login`
  MODIFY `empid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
