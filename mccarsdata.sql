-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2018 at 03:31 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mccarsdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert_email`
--

CREATE TABLE `alert_email` (
  `alert_id` int(11) NOT NULL,
  `email_alert` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert_email`
--

INSERT INTO `alert_email` (`alert_id`, `email_alert`, `date_time`) VALUES
(1, 'caipheilunga@gmail.com', '2018-04-22 10:43:52'),
(2, 'vickymbuyi@yahoo.com', '2018-04-27 12:03:56'),
(3, 'vickymbuyi@gmail.com', '2018-05-06 20:57:07'),
(4, 'marcusilula@gmail.com', '2018-05-06 21:02:23'),
(5, 'ephratshilos@gmail.com', '2018-05-06 21:04:34'),
(6, 'noellakabanga@gmail.com', '2018-05-06 21:05:23'),
(7, 'Bananga@gmail.com', '2018-05-06 21:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `area_table`
--

CREATE TABLE `area_table` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_table`
--

INSERT INTO `area_table` (`area_id`, `area_name`, `date_time`) VALUES
(1, 'Durban', '2018-04-19 23:40:12'),
(2, 'Joburg', '2018-04-19 23:40:24'),
(3, 'Capetown', '2018-04-19 23:40:44'),
(4, 'Benoni', '2018-04-19 23:40:52'),
(5, 'Germiston', '2018-04-19 23:40:58'),
(6, 'Ballito', '2018-04-19 23:41:06'),
(7, 'Umbilo', '2018-05-02 18:03:12'),
(8, 'Westville', '2018-05-02 18:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `car_data`
--

CREATE TABLE `car_data` (
  `car_id` int(11) NOT NULL,
  `make_name` varchar(255) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `body_type` varchar(255) NOT NULL,
  `max_mileague` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `color` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `number_of_door` varchar(255) NOT NULL,
  `dealer_name` varchar(255) NOT NULL,
  `dealer_contact` varchar(255) NOT NULL,
  `dealer_email` varchar(255) NOT NULL,
  `dealer_address` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `photo5` varchar(255) NOT NULL,
  `photo6` varchar(255) NOT NULL,
  `photo7` varchar(255) NOT NULL,
  `photo8` varchar(255) NOT NULL,
  `photo9` varchar(255) NOT NULL,
  `registered_by` varchar(255) NOT NULL,
  `avalaibility` varchar(255) NOT NULL,
  `on_sale` varchar(250) NOT NULL,
  `madein` varchar(250) NOT NULL,
  `car_description` text NOT NULL,
  `more_options` text NOT NULL,
  `car_code` varchar(250) NOT NULL,
  `rate` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_data`
--

INSERT INTO `car_data` (`car_id`, `make_name`, `model_name`, `vehicle_type`, `body_type`, `max_mileague`, `fuel_type`, `area`, `year`, `price`, `color`, `state`, `number_of_door`, `dealer_name`, `dealer_contact`, `dealer_email`, `dealer_address`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `photo7`, `photo8`, `photo9`, `registered_by`, `avalaibility`, `on_sale`, `madein`, `car_description`, `more_options`, `car_code`, `rate`, `date_time`) VALUES
(27, 'BMW', 'A5', 'Manual', 'Hatchbacks', '100 000 Km', 'Electric', 'Durban', '2017', 100000, 'Grey', 'used car', '2', 'Heritier', '0846023232', 'heritier@gmail.com', 'Berea', '310201.jpg', '696311.jpg', '454074.jpg', '247315.jpg', '484200.jpg', '746163.jpg', '207194.jpg', '373973.jpg', '951739.jpg', 'Ephra Ilunga', 'Available', 'On Sale', 'USA', 'This is a new BMW brought to Africa from USA. In excellent conditions with a great design ...', 'Strong as newer body type, cameras at the back and front. Manufactured in USA by the experienced engineers ', 'dfa36897d0d79626c26c3a60bbf710ce93f678ec201822860', 5, '2018-05-15 14:12:31'),
(28, 'Honda', 'CityR2', 'Automatic', 'Cabriolets', '175 000 Km', 'Hibrid', 'Capetown', '2016', 150000, 'Grey', 'used car', '4', 'Warren', '0613026565', 'warren@yahoo.com', 'Glenmore', '364138.jpg', '65031.jpg', '920648.jpg', '114766.jpg', '264377.jpg', '167539.jpg', '189344.jpg', '132829.jpg', '409683.jpg', 'Nitesh Moodley', 'Available', 'On Sale', 'USA', 'This Honda is made and built in China with great and advanced Technology', '', 'db61627fd377a85d0dd574b16a9d72269ab9fc3e201889374', 3, '2018-05-15 14:12:43'),
(29, 'Mercedes', 'Benz', 'Manual', 'Bakkies', '150 000 Km', 'Electric', 'Germiston', '2018', 80000, 'Red', 'new car', '4', 'Flory', '035626363', 'flory@gmail.com', 'Umbilo', '233100.jpg', '643392.jpg', '714579.jpg', '380731.jpg', '258183.jpg', '594431.jpg', '884883.jpg', '965254.jpg', '420370.jpg', 'Ashley Palmer', 'Available', 'not_on_sale', 'ENGLAND', 'Great product build and manufactured in England by Elon Musk and all his great and experienced team...', '', '8a6d7b0873fff3eacf939291db530ffb5195b216201875474', 5, '2018-05-15 14:12:10'),
(30, 'Honda', 'BX7', 'Manual', 'Hatchbacks', '100 000 Km', 'Electric', 'Durban', '2016', 20000, 'Blue', 'used car', '2', 'Felix', '074653201212', 'felix@gmail.com', 'Durban Central', '314883.jpg', '404948.jpg', '617437.jpg', '967570.jpg', '472097.jpg', '449863.jpg', '735824.jpg', '7364.jpg', '142844.jpg', 'Ephra Ilunga', 'Available', 'On Sale', 'SOUTH AFRICA', 'Great car with an awesome engine, well manufactured in South Africa with new Technology and many more new features...', '', 'db61627fd377a85d0dd574b16a9d72269ab9fc3e201898614', 4, '2018-05-13 14:27:24'),
(31, 'Fords', 'serie05', 'Automatic', 'Cabriolets', '100 000 Km', 'Electric', 'Capetown', '2016', 30000, 'Blue', 'new car', '4', 'Kapil', '0746023535', 'kapil@gmail.com', 'Durban', '380965.jpg', '614583.jpg', '9114.jpg', '815445.jpg', '90993.jpg', '959595.jpg', '958390.jpg', '925637.jpg', '944988.jpg', 'Bob Akur', 'Available', 'On Sale', 'ENGLAND', 'ABS, Air bags, Aircon, Alarm, Cruise control, Electric Windows, Full service record, Leather seats, Radio, Sunroof, Xenon lights', '', '682b8f4523122b955181a0290bb9a4215bc6b3b5201814297', 5, '2018-05-13 14:28:18'),
(32, 'Audi', '7 Series', 'Manual', 'Cabriolets', '125 000 Km', 'Electric', 'Durban', '2016', 50000, 'Red', 'used car', '4', 'Reddy', '0746523232', 'redy@gmail.com', 'Glenmore', '236730.jpg', '265610.jpg', '782068.jpg', '551859.jpg', '964484.jpg', '86168.jpg', '61102.jpg', '608245.jpg', '736013.jpg', 'Ephra Ilunga', 'Available', 'On Sale', 'ENGLAND', 'Great model manufactured in England by Elon Must. Great body type and awesome to use.', '', '0fee08a6f90299dbd4f51d4a7bf03cbb683884a9201824527', 5, '2018-05-13 14:28:05'),
(33, 'Jaguar', 'E5', 'Automatic', 'SUV\'s', '100 000 Km', 'Diesel', 'Durban', '2016', 25000, 'Red', 'used car', '4', 'Kapil', '0746203535', 'kapil@gmail.com', 'Redhill', '113782.jpg', '670395.jpg', '576590.jpg', '983147.jpg', '999113.jpg', '598771.jpg', '152472.jpg', '371350.jpg', '754733.jpg', 'Mfundo Ntombela', 'Available', 'not_on_sale', 'USA', 'This is a new model Jaguar made and manufactured by in USA by expert engineers.', '', '432f1e4cbb778a30494bdf5d9561d596b75d2443201829458', 5, '2018-05-13 14:27:52'),
(34, 'BMW', 'A5', 'Manual', 'Hatchbacks', '20 000 Km', 'Electric', 'Durban', '2017', 20000, 'Silver', 'new car', '4', 'Meshen', '0746526565', 'meshen@gmail.com', 'Durban ', '38930.jpg', '211106.jpg', '673078.jpg', '364859.jpg', '569787.jpg', '980857.jpg', '352891.jpg', '257539.jpg', '277194.jpg', 'Ephra Ilunga', 'Available', 'not_on_sale', 'CHINA', 'In good condition. This vehicle is build and manufactured in China by the american industries.', '', 'dfa36897d0d79626c26c3a60bbf710ce93f678ec201890155', 5, '2018-05-13 14:27:38'),
(35, 'Honda', 'CityR2', 'Manual', 'MPV\'S', '70 000 Km', 'Electric', 'Germiston', '2015', 70000, 'White', 'used car', '4', 'fabien', '0716023535', 'fabien@gmail.com', 'Durban', '24745.jpg', '97617.jpg', '776548.jpg', '684585.jpg', '783242.jpg', '307887.jpg', '22261.jpg', '151334.jpg', '649525.jpg', 'Ephra Ilunga', 'Available', 'On Sale', 'ENGLAND', 'thiiii', 'Hnnnnnnnnnnn', 'db61627fd377a85d0dd574b16a9d72269ab9fc3e201861917', 5, '2018-05-13 23:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `car_likes`
--

CREATE TABLE `car_likes` (
  `car_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `ikes` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car_views`
--

CREATE TABLE `car_views` (
  `ref` int(11) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `views` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_views`
--

INSERT INTO `car_views` (`ref`, `ip_address`, `views`, `date_time`) VALUES
(27, '127.0.0.1', 9, '2018-05-06 22:05:36'),
(28, '127.0.0.1', 6, '2018-05-06 23:05:23'),
(29, '127.0.0.1', 29, '2018-05-06 23:05:23'),
(30, '127.0.0.1', 7, '2018-05-07 23:05:21'),
(31, '127.0.0.1', 21, '2018-05-06 23:05:12'),
(32, '127.0.0.1', 23, '2018-05-06 22:05:48'),
(33, '127.0.0.1', 20, '2018-05-09 12:05:50'),
(34, '127.0.0.1', 9, '2018-05-09 14:05:07'),
(35, '127.0.0.1', 1, '2018-05-13 23:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `make_id` int(11) NOT NULL,
  `make_name` varchar(255) NOT NULL,
  `registred_by` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`make_id`, `make_name`, `registred_by`, `date_time`) VALUES
(1, 'BMW', 'Ephra Ilunga', '2018-04-19 23:06:03'),
(2, 'Hyundai', 'Ephra Ilunga', '2018-04-19 23:06:52'),
(3, 'Suzuki', 'Ephra Ilunga', '2018-04-20 09:03:35'),
(4, 'Jaguar', 'Ephra Ilunga', '2018-04-20 09:24:15'),
(5, 'Ferari', 'Ephra Ilunga', '2018-04-25 23:25:07'),
(6, 'Honda', 'Ephra Ilunga', '2018-04-25 23:25:31'),
(7, 'Audi', 'Ephra Ilunga', '2018-04-25 23:25:45'),
(8, 'Mercedes', 'Ephra Ilunga', '2018-04-25 23:25:50'),
(9, 'Fords', 'Ephra Ilunga', '2018-04-29 10:33:41'),
(10, 'New Make', 'Ephra Ilunga', '2018-05-03 14:23:41'),
(11, 'Volvo', 'Ephra Ilunga', '2018-05-05 02:00:28'),
(12, 'Cytroen', 'Ephra Ilunga', '2018-05-05 02:00:40'),
(13, 'Nissan', 'Ephra Ilunga', '2018-05-05 02:00:53'),
(14, 'Toyota', 'Ephra Ilunga', '2018-05-05 02:00:58'),
(15, 'Cadillac', 'Ephra Ilunga', '2018-05-06 02:42:34'),
(16, 'Chery', 'Ephra Ilunga', '2018-05-06 02:43:53'),
(17, 'Chevrolet', 'Ephra Ilunga', '2018-05-06 02:45:20'),
(18, 'Dodge', 'Ephra Ilunga', '2018-05-06 02:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `make_id` varchar(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `registeredBy` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `make_id`, `model_name`, `registeredBy`, `date_time`) VALUES
(4, 'Suzuki', 'make3560', 'Ephra Ilunga', '2018-04-20 09:04:06'),
(5, 'BMW', 'Makblue', 'Ephra Ilunga', '2018-04-20 09:23:58'),
(8, 'Hyundai', 'hiun450', 'Ephra Ilunga', '2018-04-21 08:20:52'),
(9, 'Mercedes', 'Benz', 'Ephra Ilunga', '2018-04-25 23:26:06'),
(10, 'Fords', 'serie05', 'Ephra Ilunga', '2018-04-29 13:57:15'),
(11, 'Ferari', 'serie2018', 'Ephra Ilunga', '2018-04-30 01:59:49'),
(12, 'BMW', 'A5', 'Ephra Ilunga', '2018-04-30 05:03:15'),
(13, 'BMW', 'Calofornia', 'Ephra Ilunga', '2018-04-30 05:03:25'),
(14, 'BMW', 'Kalorado', 'Ephra Ilunga', '2018-04-30 05:03:34'),
(15, 'Honda', 'CityR2', 'Ephra Ilunga', '2018-05-03 03:26:59'),
(16, 'New Make', '1250', 'Ephra Ilunga', '2018-05-03 14:23:58'),
(17, 'BMW', 'i8', 'Ephra Ilunga', '2018-05-05 02:01:50'),
(18, 'BMW', 'A1', 'Ephra Ilunga', '2018-05-05 02:01:55'),
(19, 'BMW', 'WB', 'Ephra Ilunga', '2018-05-05 02:02:02'),
(20, 'BMW', 'A2', 'Ephra Ilunga', '2018-05-05 02:02:07'),
(21, 'BMW', 'A3', 'Ephra Ilunga', '2018-05-05 02:02:13'),
(22, 'Audi', 'X1', 'Ephra Ilunga', '2018-05-05 02:02:22'),
(23, 'Audi', 'X2', 'Ephra Ilunga', '2018-05-05 02:02:26'),
(24, 'Audi', 'X3', 'Ephra Ilunga', '2018-05-05 02:02:31'),
(25, 'Audi', 'X4', 'Ephra Ilunga', '2018-05-05 02:02:35'),
(26, 'Audi', '1 Series', 'Ephra Ilunga', '2018-05-05 02:03:50'),
(27, 'Audi', '2 Series', 'Ephra Ilunga', '2018-05-05 02:03:56'),
(28, 'Audi', '3 Series', 'Ephra Ilunga', '2018-05-05 02:04:03'),
(29, 'Audi', '4 Series', 'Ephra Ilunga', '2018-05-05 02:04:08'),
(30, 'Audi', '5 Series', 'Ephra Ilunga', '2018-05-05 02:04:14'),
(31, 'Audi', '6 Series', 'Ephra Ilunga', '2018-05-05 02:04:31'),
(32, 'Audi', '7 Series', 'Ephra Ilunga', '2018-05-05 02:04:42'),
(33, 'BMW', 'M1', 'Ephra Ilunga', '2018-05-06 02:40:34'),
(34, 'BMW', 'M2', 'Ephra Ilunga', '2018-05-06 02:40:43'),
(35, 'BMW', 'M4', 'Ephra Ilunga', '2018-05-06 02:40:53'),
(36, 'Audi', 'M5', 'Ephra Ilunga', '2018-05-06 02:41:02'),
(37, 'BMW', 'M6', 'Ephra Ilunga', '2018-05-06 02:41:11'),
(38, 'BMW', 'X1', 'Ephra Ilunga', '2018-05-06 02:41:19'),
(39, 'BMW', 'X2', 'Ephra Ilunga', '2018-05-06 02:41:26'),
(40, 'BMW', 'X4', 'Ephra Ilunga', '2018-05-06 02:41:35'),
(41, 'BMW', 'i3', 'Ephra Ilunga', '2018-05-06 02:41:48'),
(42, 'Cadillac', 'Bls', 'Ephra Ilunga', '2018-05-06 02:43:01'),
(43, 'Cadillac', 'Cts', 'Ephra Ilunga', '2018-05-06 02:43:11'),
(44, 'Cadillac', 'Fleetwood', 'Ephra Ilunga', '2018-05-06 02:43:21'),
(45, 'Cadillac', 'Srx', 'Ephra Ilunga', '2018-05-06 02:43:31'),
(46, 'Chery', 'J1', 'Ephra Ilunga', '2018-05-06 02:44:05'),
(47, 'Chery', 'J2', 'Ephra Ilunga', '2018-05-06 02:44:13'),
(48, 'Chery', 'J3', 'Ephra Ilunga', '2018-05-06 02:44:24'),
(49, 'Chery', 'J4', 'Ephra Ilunga', '2018-05-06 02:44:33'),
(50, 'Chery', 'J5', 'Ephra Ilunga', '2018-05-06 02:44:39'),
(51, 'Chery', 'J7', 'Ephra Ilunga', '2018-05-06 02:44:46'),
(52, 'Chery', 'QQ3', 'Ephra Ilunga', '2018-05-06 02:45:03'),
(53, 'Chevrolet', 'Aveo', 'Ephra Ilunga', '2018-05-06 02:45:41'),
(54, 'Chevrolet', 'Camaro', 'Ephra Ilunga', '2018-05-06 02:45:52'),
(55, 'Chevrolet', 'Captiva', 'Ephra Ilunga', '2018-05-06 02:46:03'),
(56, 'Chevrolet', 'Corsa Utility', 'Ephra Ilunga', '2018-05-06 02:46:17'),
(57, 'Chevrolet', 'Corvette', 'Ephra Ilunga', '2018-05-06 02:46:28'),
(58, 'Chevrolet', 'Lumina', 'Ephra Ilunga', '2018-05-06 02:46:39'),
(59, 'Chevrolet', 'Optra', 'Ephra Ilunga', '2018-05-06 02:46:48'),
(60, 'Chevrolet', 'Orlando', 'Ephra Ilunga', '2018-05-06 02:47:01'),
(61, 'Chevrolet', 'Spark', 'Ephra Ilunga', '2018-05-06 02:47:13'),
(62, 'Chevrolet', 'Traiblazer', 'Ephra Ilunga', '2018-05-06 02:47:27'),
(63, 'Chevrolet', 'Vivant', 'Ephra Ilunga', '2018-05-06 02:47:40'),
(64, 'Dodge', 'Caliber', 'Ephra Ilunga', '2018-05-06 02:48:52'),
(65, 'Dodge', 'Journey', 'Ephra Ilunga', '2018-05-06 02:49:03'),
(66, 'Dodge', 'Nitro', 'Ephra Ilunga', '2018-05-06 02:49:13'),
(67, 'Dodge', 'Ram', 'Ephra Ilunga', '2018-05-06 02:49:24'),
(68, 'Ferari', '308', 'Ephra Ilunga', '2018-05-06 02:49:41'),
(69, 'Ferari', '348', 'Ephra Ilunga', '2018-05-06 02:49:56'),
(70, 'Ferari', '360', 'Ephra Ilunga', '2018-05-06 02:50:05'),
(71, 'Ferari', '458', 'Ephra Ilunga', '2018-05-06 02:50:16'),
(72, 'Ferari', 'California', 'Ephra Ilunga', '2018-05-06 02:50:29'),
(73, 'Ferari', 'F12', 'Ephra Ilunga', '2018-05-06 02:50:43'),
(74, 'Ferari', 'F430', 'Ephra Ilunga', '2018-05-06 02:51:00'),
(75, 'Honda', 'BX7', 'Ephra Ilunga', '2018-05-06 07:31:26'),
(76, 'Jaguar', 'E5', 'Ephra Ilunga', '2018-05-08 05:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `newsletteremail`
--

CREATE TABLE `newsletteremail` (
  `email_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletteremail`
--

INSERT INTO `newsletteremail` (`email_id`, `email`, `date_time`) VALUES
(1, 'caipheilunga@gmail.com', '2018-05-10 12:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int(11) NOT NULL,
  `prices` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `prices`, `date_time`) VALUES
(14, 25000, '2018-05-13 13:04:02'),
(15, 30000, '2018-05-13 13:01:42'),
(16, 50000, '2018-05-13 13:03:06'),
(17, 90000, '2018-05-13 13:04:16'),
(18, 45000, '2018-05-13 13:04:28'),
(19, 60000, '2018-05-13 13:04:36'),
(20, 70000, '2018-05-13 13:04:46'),
(21, 100000, '2018-05-13 13:04:56'),
(22, 40000, '2018-05-13 13:05:07'),
(24, 20000, '2018-05-13 13:05:14'),
(26, 120000, '2018-05-13 13:05:22'),
(27, 140000, '2018-05-13 13:05:30'),
(28, 160000, '2018-05-13 13:05:36'),
(29, 200000, '2018-05-13 13:05:46'),
(30, 35000, '2018-05-15 05:56:19'),
(31, 55000, '2018-05-15 05:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `comment_sender` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `frstname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `frstname`, `contact`, `email`, `username`, `password`, `user_code`, `active`, `date_time`) VALUES
(7, 'Ilunga', '0749026530', 'ilunga@gmail.com', 'marcv', '24ec2890876ec514de292bcf190df1b9c410c749', '0b7a5160afe9d178df6432331da4bccd78c3d4d1434120.12935100 1526096951', 0, '2018-05-12 03:49:11'),
(8, 'Vicky', '0846565799', 'vicky@gmail.com', 'marck', 'e09134ba3bbac17e9362508b8b7f8daedf063585', '0366732401779c3c7d47a566d4b5dfc4a8f58ff9866960.58636100 1526263256', 0, '2018-05-14 02:00:56'),
(9, 'Aimee', '004381653232', 'aimee@gmail.com', 'admin', '2438f48b835e7c7ec3defb0a4b114ce50228bcd9', 'd033e22ae348aeb5660fc2140aec35850c4da997189110.20076400 1526455116', 0, '2018-05-16 07:18:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert_email`
--
ALTER TABLE `alert_email`
  ADD PRIMARY KEY (`alert_id`);

--
-- Indexes for table `area_table`
--
ALTER TABLE `area_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `car_data`
--
ALTER TABLE `car_data`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_likes`
--
ALTER TABLE `car_likes`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_views`
--
ALTER TABLE `car_views`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `newsletteremail`
--
ALTER TABLE `newsletteremail`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert_email`
--
ALTER TABLE `alert_email`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `area_table`
--
ALTER TABLE `area_table`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `car_data`
--
ALTER TABLE `car_data`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `car_likes`
--
ALTER TABLE `car_likes`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `newsletteremail`
--
ALTER TABLE `newsletteremail`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
