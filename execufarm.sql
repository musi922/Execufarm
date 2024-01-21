-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 03:46 PM
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
-- Database: `execufarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'richard', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `image_path`, `image`, `date_created`) VALUES
(4, 'Success Stories', 'After connecting with ExecuFarm Solutions, he received expert advice on pest management and was provided with access to weather forecasting tools. Through these services, Jean was able to adopt sustainable farming practices', 'uploads\\mon5.jpg', NULL, '2024-01-19 11:15:40'),
(5, 'latest agricultural technologies', 'Farming machines are becoming automated as well. This technology increases agricultural efficiency by automating the crop or livestock production process...', 'uploads\\moo.jpg', NULL, '2024-01-19 11:16:14'),
(6, 'Weather and Climate Update', 'according to Meteo Rwanda - Today weather forecast in Rwanda There is Rain with thunder, and it is Mostly cloudy...', 'uploads\\mon3.jpg', NULL, '2024-01-19 11:16:47'),
(7, 'Local and Global Agricultural News', 'Rwandans are adopting sustainable farming practices, such as organic farming and soil conservation, to improve crop yields and protect the environment. in Rwanda, including maize, beans, coffee, and tea, and analyze the implications for local farmers and consumers.', 'uploads\\mon1.jpg', NULL, '2024-01-19 11:17:15'),
(8, 'Best Practices for Livestock Farming', 'here\'s an example of a guide on best practices for livestock farming: Selecting Livestock, Nutrition, Health and Disease Management, Breeding Practices, Animal Welfare, Waste Management, Sustainability and Eco-Friendly Practices, Record Keeping, Marketing and Sales', 'uploads\\mon2.jpg', NULL, '2024-01-19 11:17:51'),
(9, 'Educational Tutorials', 'Educational tutorials can be a valuable resource for farmers and agribusinesses, offering step-by-step guidance on various agricultural topics. Here\'s an example of an educational tutorial on \"Crop Rotation for Sustainable Farming\" we are going to train to:', 'uploads\\mon6.jpg', NULL, '2024-01-19 11:18:35'),
(10, 'Success Stories', 'After connecting with ExecuFarm Solutions, he received expert advice on pest management and was provided with access to weather forecasting tools. Through these services, Jean was able to adopt sustainable farming practices', 'uploads\\moo.jpg', NULL, '2024-01-19 11:19:15'),
(12, 'Success Stories', 'After connecting with ExecuFarm Solutions, he received expert advice on pest management and was provided with access to weather forecasting tools. Through these services, Jean was able to adopt sustainable farming practices', 'uploads\\mon5.jpg', NULL, '2024-01-19 12:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `Name` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Message` varchar(500) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`Name`, `Email`, `Message`, `ID`) VALUES
('mugisha', 'richardmusime6@gmail.com', 'Facilitate access to microloans or financial institutions that specialize in agricultural funding to help farmers secure capital for their operations.', 27),
('Richard Musime', 'richardmusime6@gmail.com', 'Facilitate access to microloans or financial institutions that specialize in agricultural funding to help farmers secure capital for their operations.', 28),
('manzi', 'richardmusime6@gmail.com', 'Facilitate access to microloans or financial institutions that specialize in agricultural funding to help farmers secure capital for their operations.', 29);

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(39) DEFAULT NULL,
  `LastName` varchar(39) DEFAULT NULL,
  `Username` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `Pin` varchar(255) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `sector` varchar(40) NOT NULL,
  `role` varchar(255) DEFAULT 'farmer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `FirstName`, `LastName`, `Username`, `email`, `Pin`, `district`, `sector`, `role`) VALUES
(11, 'gihozo', 'cri', 'gihozo', 'gihozochristian313@gmail.com', 'aaa', 'hhgfd', 'hgfd', 'farmer'),
(12, 'manzi', 'enock', 'manzi', 'manzi@gmail.com', 'aaa', 'Nyarugenge', 'Nyamirambo', 'farmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
