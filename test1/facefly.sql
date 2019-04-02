-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 04:38 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facefly`
--
CREATE DATABASE IF NOT EXISTS `facefly` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `facefly`;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE IF NOT EXISTS `airlines` (
  `airline_id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_name` varchar(55) NOT NULL,
  `airline_nation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`airline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`, `airline_nation_id`) VALUES
(1, 'Qatar Airways', 1),
(2, 'Vietnam Airlines', 1),
(3, 'VietJet', 3),
(4, 'Japan Airlines', 3);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE IF NOT EXISTS `airports` (
  `airport_id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(55) NOT NULL,
  PRIMARY KEY (`airport_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airport_id`, `airport_name`) VALUES
(1, 'Doha Hamad International Airport'),
(2, 'Soekarno Hatta Intl Airport'),
(3, 'Abu Dhabi Intl'),
(4, 'Tan Son Nhat International Airport');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(55) NOT NULL,
  `city_code` varchar(15) NOT NULL,
  `city_airport_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_code`, `city_airport_id`) VALUES
(1, 'Hồ Chí Minh', 'SGN', 1),
(2, 'Hà Nội', 'HAN', 2),
(3, 'Đà Nẵng', 'DN', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_user_id` int(11) NOT NULL,
  `customer_first_name` varchar(55) NOT NULL,
  `customer_last_name` varchar(16) NOT NULL,
  `customer_title` varchar(16) NOT NULL,
  `customer_transfer` varchar(55) NOT NULL,
  `customer_paypal` varchar(55) NOT NULL,
  `customer_credit_card` int(16) NOT NULL,
  `customer_credit_name` varchar(55) NOT NULL,
  `customer_credit_ccv` varchar(8) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_user_id`, `customer_first_name`, `customer_last_name`, `customer_title`, `customer_transfer`, `customer_paypal`, `customer_credit_card`, `customer_credit_name`, `customer_credit_ccv`) VALUES
(1, 0, '', '', '', '', '', 0, '', ''),
(2, 0, '', '', '', '', '', 0, '', ''),
(3, 0, '', '', '', '', '', 0, '', ''),
(4, 0, '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

DROP TABLE IF EXISTS `flight_booking`;
CREATE TABLE IF NOT EXISTS `flight_booking` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_airline_id` int(11) NOT NULL,
  `fb_city_from_id` int(11) NOT NULL,
  `fb_city_to_id` int(11) NOT NULL,
  `fb_transit_id` int(11) NOT NULL,
  `fb_customer_id` int(11) NOT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_booking`
--

INSERT INTO `flight_booking` (`fb_id`, `fb_airline_id`, `fb_city_from_id`, `fb_city_to_id`, `fb_transit_id`, `fb_customer_id`) VALUES
(1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flight_classes`
--

DROP TABLE IF EXISTS `flight_classes`;
CREATE TABLE IF NOT EXISTS `flight_classes` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_name` varchar(55) NOT NULL,
  PRIMARY KEY (`fc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_classes`
--

INSERT INTO `flight_classes` (`fc_id`, `fc_name`) VALUES
(1, 'Economy'),
(2, 'Business'),
(3, 'Premium Economy');

-- --------------------------------------------------------

--
-- Table structure for table `flight_list`
--

DROP TABLE IF EXISTS `flight_list`;
CREATE TABLE IF NOT EXISTS `flight_list` (
  `fl_id` int(11) NOT NULL AUTO_INCREMENT,
  `fl_code` varchar(15) NOT NULL,
  `fl_airline_id` int(11) NOT NULL,
  `fl_fc_id` int(11) NOT NULL,
  `fl_type` tinyint(11) NOT NULL,
  `fl_total` int(11) NOT NULL,
  `fl_total_km` float DEFAULT NULL,
  `fl_city_from_id` int(11) NOT NULL,
  `fl_city_to_id` int(11) NOT NULL,
  `fl_departure_day` datetime DEFAULT NULL,
  `fl_landing_day` datetime DEFAULT NULL,
  `fl_return_day` datetime DEFAULT NULL,
  PRIMARY KEY (`fl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_list`
--

INSERT INTO `flight_list` (`fl_id`, `fl_code`, `fl_airline_id`, `fl_fc_id`, `fl_type`, `fl_total`, `fl_total_km`, `fl_city_from_id`, `fl_city_to_id`, `fl_departure_day`, `fl_landing_day`, `fl_return_day`) VALUES
(1, 'VVCS/VCS', 1, 2, 2, 100, 1500, 1, 2, '2019-03-15 06:00:00', '2019-03-16 12:00:00', '2019-03-17 09:00:00'),
(2, 'VVCT/VCA', 2, 2, 1, 150, 550, 1, 3, '2019-03-07 07:20:00', '2019-03-08 10:00:00', '2019-03-10 08:08:00'),
(3, 'VVTS/SGN', 3, 3, 3, 250, 3500, 2, 3, '2019-03-15 10:20:00', '2019-03-16 06:00:00', '2019-03-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nations`
--

DROP TABLE IF EXISTS `nations`;
CREATE TABLE IF NOT EXISTS `nations` (
  `nation_id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`nation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`nation_id`, `nation_name`) VALUES
(1, 'Việt Nam'),
(2, 'Hàn Quốc'),
(3, 'Nhật Bản');

-- --------------------------------------------------------

--
-- Table structure for table `transits`
--

DROP TABLE IF EXISTS `transits`;
CREATE TABLE IF NOT EXISTS `transits` (
  `transit_id` int(11) NOT NULL AUTO_INCREMENT,
  `transit_city_id` int(11) NOT NULL,
  `transit_fl_id` int(11) NOT NULL,
  `transit_departure_date` datetime NOT NULL,
  `transit_landing_date` datetime NOT NULL,
  PRIMARY KEY (`transit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transits`
--

INSERT INTO `transits` (`transit_id`, `transit_city_id`, `transit_fl_id`, `transit_departure_date`, `transit_landing_date`) VALUES
(1, 1, 1, '2019-03-08 02:05:00', '2019-03-07 00:05:00'),
(2, 2, 2, '2019-03-08 09:00:00', '2019-03-08 08:10:00'),
(3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(55) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_first_name` varchar(55) NOT NULL,
  `user_last_name` varchar(15) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_last_access` datetime DEFAULT NULL,
  `user_attempt` int(11) DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_first_name`, `user_last_name`, `user_phone`, `user_last_access`, `user_attempt`, `user_status`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'nhozstar0024@gmail.com', '$2y$10$0gE1bxXqFcgY1KQxD9/iC.4jXEIbR4ztKSphEI7l2jhohYTK6FlXe', 'Honga', 'Uts', '9094494122', '2019-03-28 06:18:40', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'asd@gmail.com', '$2y$10$/qqZvvP2Ng0ykKaT485S5OgS15BvxdP/pLznKUlS5tmoZdKnfOu6e', 'Hong', 'Ut', '909449412', '2019-03-28 06:19:08', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'asdasd@yahoo.com', '$2y$10$PPBw10K4KSxtH8uM93L8QOvl5A7tHOmjygYzztp25bns1tzMD2EiG', 'Hong', 'Ut', '909449412', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'hongut@gmail.com', '$2y$10$C3nm4r6RoI8WievfSs2H7eIoun5Wsb.aXqw6fOPXCnex9x5Lff9LK', 'Hong', 'Ut', '909449412', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'nhozstar00242@gmail.com', '$2y$10$Pli4ccFDFynKfne0y0GrQejH3taR2t7yyGwQZkYvCoOQK4byTzdy2', 'Hong', 'Ut', '123123123', NULL, NULL, NULL, '2019-03-27 11:14:11', '2019-03-27 11:14:11', NULL),
(6, 'nhozstar00244@gmail.com', '$2y$10$D4PtW4lGFYCT2kPL4eU5C.3Lua.24U6pVK111zbwthbENAeL041SK', 'Hong', 'Ut', '123123123', NULL, NULL, NULL, '2019-03-27 11:16:25', '2019-03-27 11:16:25', NULL),
(7, 'nhozstar002442@gmail.com', '$2y$10$kvdOaYKIENSUWtJPryeNae9uT/w4qtj3ZKKPX5zh8Exa5iXB7pmTG', 'Hong', 'Ut', '123123123', NULL, NULL, NULL, '2019-03-27 11:17:13', '2019-03-27 11:17:13', NULL),
(8, 'tanphong@gmail.com', '$2y$10$A2y19UIu34Cfq7lIhxn1UOEFbnAYOwfR4XUfk0zzGSDCTvwNYS8OC', 'Phong', 'Jame', '123123123', '2019-03-28 06:19:26', 0, 1, '2019-03-27 11:27:53', '2019-03-27 11:27:53', 'b2L4d9KDBtSPJPPFL6GeoJPbRDbmBC4zeNcmR3OTkdfcinLvCQewXZtiqhEM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
