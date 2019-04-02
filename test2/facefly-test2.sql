-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 08:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `airline_id` int(11) NOT NULL,
  `airline_name` varchar(55) NOT NULL,
  `airline_nation_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`, `airline_nation_id`) VALUES
(1, 'Korean Airlines ', 2),
(2, 'Vietnam Airlines', 1),
(3, 'VietJet', 1),
(4, 'Japan Airlines', 3);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `airport_id` int(11) NOT NULL,
  `airport_name` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airport_id`, `airport_name`) VALUES
(1, 'Tan Son Nhat International Airport'),
(2, 'Noi Bai International Airport'),
(3, 'Da Nang International Airport'),
(4, 'Can Tho International Airport'),
(5, 'Incheon International Airport');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(55) NOT NULL,
  `city_code` varchar(15) NOT NULL,
  `city_airport_id` int(11) NOT NULL,
  `city_nation_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_code`, `city_airport_id`, `city_nation_id`) VALUES
(1, 'Hồ Chí Minh', 'SGN', 1, 1),
(2, 'Hà Nội', 'HAN', 2, 1),
(3, 'Đà Nẵng', 'DN', 3, 1),
(4, 'Cần Thơ', 'CT', 4, 1),
(5, 'Hàn Quốc', 'ICN', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_listcus_id` int(11) DEFAULT NULL,
  `customer_first_name` varchar(55) NOT NULL,
  `customer_last_name` varchar(16) NOT NULL,
  `customer_phone` int(13) NOT NULL,
  `customer_email` varchar(55) NOT NULL,
  `customer_method` int(11) NOT NULL,
  `customer_credit_name` varchar(55) DEFAULT NULL,
  `customer_credit_ccv` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_listcus_id`, `customer_first_name`, `customer_last_name`, `customer_phone`, `customer_email`, `customer_method`, `customer_credit_name`, `customer_credit_ccv`) VALUES
(1, 0, '', '', 0, '', 0, '', ''),
(2, 0, '', '', 0, '', 0, '', ''),
(3, 0, '', '', 0, '', 0, '', ''),
(4, 0, '', '', 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

CREATE TABLE `flight_booking` (
  `fb_id` int(11) NOT NULL,
  `fb_airline_id` int(11) NOT NULL,
  `fb_city_from_id` int(11) NOT NULL,
  `fb_city_to_id` int(11) NOT NULL,
  `fb_transit_id` int(11) NOT NULL,
  `fb_customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `flight_classes` (
  `fc_id` int(11) NOT NULL,
  `fc_name` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `flight_list` (
  `fl_id` int(11) NOT NULL,
  `fl_code` varchar(15) DEFAULT NULL,
  `fl_airline_id` int(11) NOT NULL,
  `fl_fc_id` int(11) NOT NULL,
  `fl_type` tinyint(11) DEFAULT NULL,
  `fl_total` int(11) NOT NULL,
  `fl_total_km` float DEFAULT NULL,
  `fl_city_from_id` int(11) NOT NULL,
  `fl_city_to_id` int(11) NOT NULL,
  `fl_departure_day` datetime DEFAULT NULL,
  `fl_landing_day` datetime DEFAULT NULL,
  `fl_return_day` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_list`
--

INSERT INTO `flight_list` (`fl_id`, `fl_code`, `fl_airline_id`, `fl_fc_id`, `fl_type`, `fl_total`, `fl_total_km`, `fl_city_from_id`, `fl_city_to_id`, `fl_departure_day`, `fl_landing_day`, `fl_return_day`) VALUES
(1, 'VVCS/VCS', 1, 2, 2, 100, 1500, 1, 2, '2019-03-15 06:00:00', '2019-03-16 12:00:00', '2019-03-17 09:00:00'),
(2, 'VVCT/VCA', 2, 2, 1, 150, 550, 1, 3, '2019-03-07 07:20:00', '2019-03-08 10:00:00', '2019-03-10 08:08:00'),
(3, 'VVTS/SGN', 3, 3, 2, 250, 3500, 2, 3, '2019-03-15 10:20:00', '2019-03-16 06:00:00', '2019-03-17 00:00:00'),
(4, 'VVCT/VCA', 2, 1, NULL, 5, NULL, 1, 2, '2019-04-26 00:00:00', '2019-04-27 00:00:00', '2019-04-28 00:00:00'),
(5, 'VVCT/VCA', 2, 2, NULL, 5, NULL, 1, 2, '2019-04-26 00:00:00', '2019-04-27 00:00:00', '2019-04-28 00:00:00'),
(6, 'VVCT/VCA', 2, 1, NULL, 2, NULL, 1, 2, '2019-04-03 00:00:00', '2019-04-02 00:00:00', '2019-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nations`
--

CREATE TABLE `nations` (
  `nation_id` int(11) NOT NULL,
  `nation_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_link_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`nation_id`, `nation_name`, `country_link_id`) VALUES
(1, 'Việt Nam', '2, 3'),
(2, 'Hàn Quốc', '1'),
(3, 'Nhật Bản', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transits`
--

CREATE TABLE `transits` (
  `transit_id` int(11) NOT NULL,
  `transit_city_id` int(11) NOT NULL,
  `transit_fl_id` int(11) NOT NULL,
  `transit_departure_date` datetime NOT NULL,
  `transit_landing_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
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
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_first_name`, `user_last_name`, `user_phone`, `user_last_access`, `user_attempt`, `user_status`, `updated_at`, `created_at`, `remember_token`) VALUES
(9, 'kimngan@gmail.com', '$2y$10$DQQ.x/zyHelwo7gklVmgwu2yKw9NyT7KR.SETsAoxG.h7Yyj8lBDe', 'Kim Ngan', 'Tran Thi', '0327098408', '2019-04-01 18:10:21', 0, 1, '2019-04-02 01:10:13', '2019-04-02 01:10:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`airport_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `flight_classes`
--
ALTER TABLE `flight_classes`
  ADD PRIMARY KEY (`fc_id`);

--
-- Indexes for table `flight_list`
--
ALTER TABLE `flight_list`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `nations`
--
ALTER TABLE `nations`
  ADD PRIMARY KEY (`nation_id`);

--
-- Indexes for table `transits`
--
ALTER TABLE `transits`
  ADD PRIMARY KEY (`transit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flight_classes`
--
ALTER TABLE `flight_classes`
  MODIFY `fc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flight_list`
--
ALTER TABLE `flight_list`
  MODIFY `fl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nations`
--
ALTER TABLE `nations`
  MODIFY `nation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transits`
--
ALTER TABLE `transits`
  MODIFY `transit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
