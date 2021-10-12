-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 01:07 PM
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
-- Database: `carshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `position`, `status`, `datetime`) VALUES
(1, 'admin', 'admin@gmail.com', '1b7ce0742dca60b3193b2066e89316e1', 'Admin', 'Active', '2021-09-24 05:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_booked` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booked_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unapproved',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `vehicle_id`, `vehicle_plate`, `seat_booked`, `total`, `booked_by`, `approvel`, `datetime`) VALUES
(6, 'Vehicle-0000001', 'Dhaka Metro - SHA 25-6025', '2', '3000', 'User-0000001', 'Complete', '2021-09-24 10:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_trip`
--

CREATE TABLE IF NOT EXISTS `cancelled_trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancelled_trip`
--

INSERT INTO `cancelled_trip` (`id`, `user_id`, `vehicle_plate`, `datetime`) VALUES
(1, 'User-0000001', 'Dhaka Metro - SHA 25-6025', '2021-09-24 04:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Rajshahi'),
(4, 'Khulna'),
(5, 'Sylhet'),
(6, 'Mymensingh'),
(7, 'Barisal'),
(8, 'Rangpur'),
(9, 'Comilla'),
(10, 'Narayanganj'),
(11, 'Gazipur');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurney_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_seat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `from_loc`, `to_loc`, `vehicle_plate`, `jurney_date`, `seat`, `price_per_seat`, `author_code`, `datetime`) VALUES
(1, 'Dhaka', 'Mymensingh', 'Dhaka Metro - SHA 25-6025', '2021-09-25', '2', '1500', 'Rider-0000001', '2021-09-24 10:46:44'),
(2, 'Dhaka', 'Mymensingh', 'Mymensingh Metro - Pa 45-6086', '2021-09-25', '4', '700', 'Rider-0000002', '2021-09-23 19:10:39'),
(3, 'Dhaka', 'Khulna', 'Dhaka Metro - GA 46-2582', '2021-09-25', '12', '500', 'Rider-0000001', '2021-09-23 19:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE IF NOT EXISTS `rider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Rider',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`id`, `name`, `email`, `code`, `password`, `position`, `status`, `datetime`) VALUES
(1, 'Abdul Mukib', 'a_mukib@gmail.com', 'Rider-0000001', '989c475d1bf5c530db1b9a31dd70b845', 'Rider', 'Inactive', '2021-09-24 11:05:28'),
(2, 'Kashem Ali', 'kashem_ali@mail.com', 'Rider-0000002', '6795efad03c7c22167848dbf4f34047f', 'Rider', 'Active', '2021-09-22 16:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `rider_details`
--

CREATE TABLE IF NOT EXISTS `rider_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider_details`
--

INSERT INTO `rider_details` (`id`, `code`, `name`, `email`, `nid`, `contact`, `address`) VALUES
(1, 'Rider-0000001', 'Abdul Mukib', 'a_mukib@gmail.com', '015226622412', '0193252963', 'House-25, Road-10, East Nakhalpara, Mohakhali, Dhaka-1212'),
(2, 'Rider-0000002', 'Kashem Ali', 'kashem_ali@mail.com', '0169366528228522', '01711144866', 'House-15, Road-6/A, Taltola, Kilgaon, Dhaka-1219');

-- --------------------------------------------------------

--
-- Table structure for table `rider_serial`
--

CREATE TABLE IF NOT EXISTS `rider_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider_serial`
--

INSERT INTO `rider_serial` (`id`, `code`, `name`) VALUES
(1, 'Rider-0000001', 'Abdul Mukib'),
(2, 'Rider-0000002', 'Kashem Ali');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `code`, `password`, `position`, `status`, `datetime`) VALUES
(1, 'Afreed Bin Haque', 'afreed@gmail.com', 'User-0000001', '4262469e0aeaad16600fa7a2f597c570', 'User', 'Active', '2021-09-24 10:45:06'),
(3, 'Anika Haque', 'anika@mail.com', 'User-0000002', '9a24a010fb44e52093732c71e605f80f', 'User', 'Active', '2021-09-17 15:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `code`, `name`, `email`, `nid`, `contact`, `address`) VALUES
(1, 'User-0000001', 'Afreed Bin Haque', 'afreed@gmail.com', '1859246129', '01849593860', 'house-12, Road-10, Sector-12,Uttara,Dhaka-1230'),
(3, 'User-0000002', 'Anika Haque', 'anika@mail.com', '15265252521', '01949398460', 'House-07, Road-12, Sector- 12, Uttara, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `user_serial`
--

CREATE TABLE IF NOT EXISTS `user_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_serial`
--

INSERT INTO `user_serial` (`id`, `code`, `name`) VALUES
(1, 'User-0000001', 'Afreed Bin Haque'),
(3, 'User-0000002', 'Anika Haque');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `mileage`, `vehicle_id`, `plate_no`, `con`, `model`, `color`, `image`, `author_code`, `status`, `datetime`) VALUES
(9, '15000 Kilometre', 'Vehicle-0000001', 'Dhaka Metro - SHA 25-6025', 'In mid Condition', 'Toyota Allion ', '#828e9c', '9998-Screenshot 2021-09-22 183517.png', 'Rider-0000001', 'Active', '2021-09-24 10:18:20'),
(10, '25000 kilometer', 'Vehicle-0000002', 'Dhaka Metro - GA 46-2582', 'The family car Hiace is a family car with accommodation of 14 passenger. The can is well maintained and still runs smooth.', 'Toyota Hiace 2007', '#e6e5e3', '3203-Screenshot 2021-09-22 222258.png', 'Rider-0000001', 'Inactive', '2021-09-24 10:37:32'),
(11, '4000 kilometer', 'Vehicle-0000003', 'Mymensingh Metro - Pa 45-6086', 'This car is a family sedan capable of comfortable long route journey. AC is totally working fine and interior is fresh as new.\r\n', 'TOYOTA COROLLA XE SALOON LIMITED ', '#b5bdca', '4644-Screenshot 2021-09-23 231344.png', 'Rider-0000002', 'Active', '2021-09-24 10:37:41'),
(14, '10000 Kilometre', 'Vehicle-0000004', 'à¦šà¦Ÿà§à¦Ÿ à¦®à§‡à¦Ÿà§à¦°à§‹ à¦• à§¨à§®-à§¯à§¬à§©à§¯', 'In  good condition. Prefect for family long tour. AC is working as its new', 'Toyota Hiace 2007', '#d8d8f1', '6477-Screenshot 2021-09-24 160209.png', 'Rider-0000002', 'Inactive', '2021-09-24 10:37:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
