-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 07:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyers_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(111) NOT NULL,
  `admin_email` varchar(111) NOT NULL,
  `admin_password` varchar(222) NOT NULL,
  `admin_role` varchar(111) NOT NULL,
  `admin_status` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_role`, `admin_status`) VALUES
(1, 'Raheel', 'admin@gmail.com', 'admin', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(111) NOT NULL,
  `booking_description` varchar(555) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `status` enum('pending','approved','declined') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `booking_description`, `client_id`, `lawyer_id`, `status`) VALUES
(10, '2023-08-29', 'walajkedjklsdfkjl', 2, 2, 'approved'),
(11, '2023-08-25', 'Criminal law', 2, 2, 'approved'),
(12, '2000-06-17', 'abc', 2, 2, 'approved'),
(13, '2023-08-22', 'I have an family issue', 5, 5, 'approved'),
(16, '2023-08-25', 'Demo', 6, 6, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city`) VALUES
(8, 'Gilgit'),
(4, 'Islamabad'),
(1, 'Karachi'),
(2, 'Lahore'),
(10, 'Mardan'),
(3, 'Peshawar'),
(9, 'Sawabi');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(111) NOT NULL,
  `client_phone` varchar(13) NOT NULL,
  `client_email` varchar(111) NOT NULL,
  `client_password` varchar(111) NOT NULL,
  `client_city` varchar(111) NOT NULL,
  `client_role` varchar(111) NOT NULL,
  `client_status` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_phone`, `client_email`, `client_password`, `client_city`, `client_role`, `client_status`) VALUES
(1, 'Raheel Izaz', '03202065505', 'r@gmail.com', '123456', 'peshawar', 'user', 'active'),
(2, 'Saad Ahmed', '03312425145', 'saad@gmail.com', 'saad', 'punjab', 'user', 'active'),
(3, '', '', '', '', 'Select City', 'user', 'active'),
(5, 'Talha', 'name', 't@gmail.com', '123456', 'karachi', 'user', 'active'),
(6, 'Demo Demo', '03112121212', 'demo@gmail.com', 'demo', 'paris', 'user', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `lawyer_id` int(11) NOT NULL,
  `lawyer_name` varchar(111) NOT NULL,
  `lawyer_email` varchar(111) NOT NULL,
  `lawyer_phone` varchar(13) NOT NULL,
  `laywer_password` varchar(222) NOT NULL,
  `lawyer_specialty` int(11) NOT NULL,
  `lawyer_city` int(11) NOT NULL,
  `lawyer_image` varchar(111) NOT NULL,
  `role` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`lawyer_id`, `lawyer_name`, `lawyer_email`, `lawyer_phone`, `laywer_password`, `lawyer_specialty`, `lawyer_city`, `lawyer_image`, `role`) VALUES
(1, 'Waleed Siddique', 'waleed@gmail.com', '03112121212', '123456', 1, 1, 'education.jpg', 'lawyer'),
(2, 'Shayan Izaz', 's@gmail.com', '03134121222', 'shayan', 2, 2, 'gold.jpg', 'lawyer'),
(3, 'Ahmed Raza', 'ahmed@gmail.com', '03134121222', 'ahmed', 3, 3, 'pexels-sora-shimazaki-5668774.jpg', 'lawyer'),
(4, 'Sudais Izaz', 'sudais@gmail.com', '03634181232', 'sudais', 3, 3, 'pexels-teddy-joseph-2955375.jpg', 'lawyer'),
(5, 'Talha', 'tal@gmail.com', '03112121212', '123', 1, 10, 'pexels-andrea-piacquadio-3785104.jpg', 'lawyer'),
(6, 'John Doe', 'john@gmail.com', '09812344456', 'john', 5, 9, 'pexels-kamshotthat-3217111.jpg', 'lawyer');

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  `specialty_id` int(11) NOT NULL,
  `specialty` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`specialty_id`, `specialty`) VALUES
(2, 'Criminal law'),
(5, 'Divorce Law'),
(1, 'Family Law'),
(6, 'Finance Law'),
(7, 'Harassment Law'),
(3, 'Investment Law');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `UC_city` (`city`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`lawyer_id`),
  ADD UNIQUE KEY `lawyer_email` (`lawyer_email`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`specialty_id`),
  ADD UNIQUE KEY `UC_specialty` (`specialty`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`lawyer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
