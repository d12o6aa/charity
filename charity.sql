-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2024 at 06:39 PM
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
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Donation'),
(2, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `message` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `location` text CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `postalCode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `categories` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `date` date NOT NULL,
  `title` varchar(225) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `newsDesc` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `categories`, `date`, `title`, `newsDesc`, `img`) VALUES
(5, '2', '2024-05-01', 'Clothing donation to urban area', 'Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito Professional charity theme based on Bootstrap', 0x2e2e2f696d616765732f30332d34362d3331636c6f73652d75702d766f6c756e746565722d6f67616e697a696e672d73747566662d646f6e6174696f6e2e6a7067),
(6, 'Clothing', '2024-05-23', 'Food donation area', 'Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus elementum, tempor risus vel, condimentum orci', 0x2e2e2f696d616765732f30332d34382d3230636c6f73652d75702d68617070792d70656f706c652d776f726b696e672d746f6765746865722e6a7067),
(7, 'Clothing', '2024-05-02', 'test3', 'hellllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllo', 0x2e2e2f696d616765732f30332d34332d31316d656469756d2d73686f742d70656f706c652d636f6c6c656374696e672d666f6f6473747566662e6a7067),
(8, 'Donation', '2024-05-10', 'Clothing donation to urban area', 'wwwwwwwwwd  wefwffffffffffffff\r\nefweeeeeeeeeeeeee\r\neeeeeeeeee', 0x2e2e2f696d616765732f30342d32302d35386d656469756d2d73686f742d70656f706c652d636f6c6c656374696e672d666f6f6473747566662e6a7067),
(9, 'Donation', '2024-05-01', 'eeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee e\r\neeeeeeeeeeeeeeeeeeeeeeeeeeeee\r\nwwwwwwwwwwwwwwwwwww\r\nwwwwwwwwwwww\r\nwwwwwwww', 0x2e2e2f696d616765732f30342d32312d32326d656469756d2d73686f742d766f6c756e74656572732d776974682d636c6f7468696e672d646f6e6174696f6e732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paypalEmail` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `paypalPassord` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `creaditCard` int(50) DEFAULT NULL,
  `expirtDate` int(50) DEFAULT NULL,
  `CCV` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'doaa@gmail.com', '123'),
(2, 'doaa123@gmaill.com', '11111'),
(3, 'aaa777@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `subject` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `comment` text CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `location` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
