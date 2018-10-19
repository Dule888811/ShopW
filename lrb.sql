-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 03:32 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_price` int(11) NOT NULL DEFAULT '0',
  `article_lager` int(11) NOT NULL DEFAULT '0',
  `article_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unisex',
  `article_action` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NE',
  `article_description` text COLLATE utf8_unicode_ci NOT NULL,
  `brend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_price`, `article_lager`, `article_type`, `article_action`, `article_description`, `brend_id`) VALUES
(1, 'Perforated Steel', 5000, 33, 'DeÄji', 'DA', 'svetli', 5),
(2, 'Silver Chrono Bracelet Watch', 5000, 0, 'Muški', 'DA', 'Description for A|X Silver Chrono Bracelet Watch.', 1),
(5, 'DIESSEL-80', 15000, 5, 'Å½enski', 'DA', 'sat', 2),
(6, 'DIESSEL-1000', 7000, 11, 'Unisex', 'DA', 'This is description for DIESSEL 800 article.', 3),
(13, 'Angry Birds', 500, 20, 'Dečji', 'DA', 'Dečji sat sa motivima popularne igre.', 5),
(14, 'Žanski sat', 333, 3, 'Ženski', 'DA', 'Žensaki sat opis.', 2),
(15, 'iWatch', 15000, 5, 'Unisex', 'DA', 'Pametni sat.', 2),
(16, 'tik-tak', 3000, 11, 'Muški', 'DA', 'super', 1),
(17, 'lacosta', 3000, 5, 'Muški', 'DA', 'tacnost pre svega', 4),
(18, 'lacosta', 3000, 5, 'Muški', 'DA', 'tacnost pre svega', 4),
(19, 'lacosta', 3000, 5, 'Muški', 'DA', 'tacnost pre svega', 4),
(20, 'image', 3000, 5, 'Muški', 'DA', 'image', 4),
(22, 'casa', 111111, 11, 'Muški', 'DA', 'plasticna', 1),
(24, 'tabakera', 888, 4, 'Muški', 'DA', 'drvena', 1),
(25, 'kockica', 222, 22, 'Muški', 'DA', 'kockasta', 1),
(26, 'satoviW', 200, 12, 'Å½enski', 'NE', 'tacan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `brends`
--

CREATE TABLE `brends` (
  `brend_id` int(11) NOT NULL,
  `brend_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brend_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brends`
--

INSERT INTO `brends` (`brend_id`, `brend_name`, `brend_description`) VALUES
(1, 'ARMANI EXCHANGE', 'Standardni opis za AE.'),
(2, 'CASIO', 'Standardni opis za CASSIO.'),
(3, 'DIESSEL', 'Standardni opis za DIESSEL.'),
(4, 'FOSSIL', 'Standardni opis za FOSSIL.'),
(5, 'HUGO HOSS', 'Standardni opis za HB');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_user_status` int(11) NOT NULL DEFAULT '0',
  `cart_admin_status` int(11) NOT NULL DEFAULT '0',
  `cart_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `article_id`, `user_id`, `cart_user_status`, `cart_admin_status`, `cart_code`) VALUES
(44, 1, 14, 1, 1, '141202031201281'),
(46, 6, 14, 1, 1, '141202031201281'),
(47, 5, 18, 1, 1, '141202031559217'),
(48, 2, 1, 0, 0, '141203114138921'),
(69, 2, 19, 0, 0, '141211113035761'),
(70, 3, 19, 0, 0, '141211113035761'),
(76, 16, 1, 0, 0, '141203114138921'),
(77, 1, 1, 0, 0, '141203114138921'),
(78, 1, 1, 0, 0, '141203114138921'),
(79, 2, 1, 0, 0, '141203114138921'),
(80, 1, 1, 0, 0, '141203114138921'),
(81, 1, 1, 0, 0, '141203114138921'),
(82, 2, 1, 0, 0, '141203114138921'),
(83, 2, 1, 0, 0, '141203114138921'),
(84, 2, 0, 0, 0, '181019022031749'),
(85, 2, 0, 0, 0, '181019022031749'),
(86, 2, 1, 0, 0, '141203114138921'),
(87, 2, 1, 0, 0, '141203114138921'),
(88, 16, 1, 0, 0, '141203114138921'),
(89, 16, 1, 0, 0, '141203114138921'),
(90, 2, 1, 0, 0, '141203114138921'),
(91, 22, 1, 0, 0, '141203114138921'),
(92, 22, 1, 0, 0, '141203114138921'),
(93, 22, 1, 0, 0, '141203114138921'),
(94, 2, 1, 0, 0, '141203114138921'),
(95, 2, 1, 0, 0, '141203114138921'),
(96, 2, 1, 0, 0, '141203114138921'),
(97, 2, 1, 0, 0, '141203114138921'),
(98, 2, 1, 0, 0, '141203114138921'),
(99, 21, 1, 0, 0, '141203114138921'),
(100, 2, 1, 0, 0, '141203114138921'),
(101, 2, 1, 0, 0, '141203114138921'),
(102, 22, 1, 0, 0, '141203114138921'),
(103, 2, 27, 1, 1, '181019030413324'),
(104, 22, 27, 1, 1, '181019030413324'),
(105, 13, 27, 1, 1, '181019030441813'),
(107, 2, 27, 1, 1, '181019032952768'),
(108, 24, 27, 1, 1, '181019032952768');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cart_code`
-- (See below for the actual view)
--
CREATE TABLE `cart_code` (
`cart_code` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `closed_cart_code`
-- (See below for the actual view)
--
CREATE TABLE `closed_cart_code` (
`cart_code` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `article_id`, `comment`, `time`) VALUES
(14, 16, 5, 'Moj komentar.', '2014-12-03 10:41:05'),
(15, 1, 15, 'Odličan sat.', '2014-12-03 10:47:04'),
(16, 14, 1, 'Dobar odnos cene i kvaliteta.', '2014-12-10 15:52:16'),
(17, 19, 14, 'Dopada mi se.', '2014-12-11 10:27:19'),
(18, 21, 13, 'Lep decji sat...', '2015-03-26 14:22:45'),
(19, 14, 1, 'Ovo je moj komentar.', '2016-03-02 14:25:51'),
(21, 1, 2, 'super\r\n', '2018-10-19 14:31:50'),
(22, 27, 1, 'da', '2018-10-19 15:04:58'),
(23, 27, 2, 'da', '2018-10-19 15:22:43'),
(24, 27, 2, 'da', '2018-10-19 15:26:24');

-- --------------------------------------------------------

--
-- Stand-in structure for view `open_cart_code`
-- (See below for the actual view)
--
CREATE TABLE `open_cart_code` (
`cart_code` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`) VALUES
(1, 'admin', 'admin', 'Darko', 'Pantovic', 'darko.pantovic@link.co.rs', 2),
(19, 'marija', '2808c6d6e7b4aed69d3390e5ead943a6', 'Marija', 'Marijanovic', 'marija@gmail.com', 1),
(22, 'dule88', 'dusko88', 'Dusan', 'Pavlovic', 'dusan.pavlovic88@yahoo.com', 2),
(23, 'nikola88', 'de59843dae8614b19695b4e320c9bdf4', 'nikola', 'mag', 'nidza.mag@gmail.com', 1),
(24, 'dusan88', '0e84724c1d309d5785e729253e7f01fa', 'dusan', 'Pavlovic', 'funkcija@gmail.com', 1),
(25, 'dusko88', '0e84724c1d309d5785e729253e7f01fa', 'Dusan', 'Pavlovic', 'dusko.dugusko@gmail.com', 1),
(26, 'aladin', 'aladin88', 'arif', 'kuntakinte', 'arif@gmail.com', 1),
(27, 'jekazeka', 'jekazeka', 'Jelena', 'Maletic', 'zeka@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure for view `cart_code`
--
DROP TABLE IF EXISTS `cart_code`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_code`  AS  select distinct `carts`.`cart_code` AS `cart_code` from `carts` ;

-- --------------------------------------------------------

--
-- Structure for view `closed_cart_code`
--
DROP TABLE IF EXISTS `closed_cart_code`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `closed_cart_code`  AS  select distinct `carts`.`cart_code` AS `cart_code` from `carts` where (`carts`.`cart_admin_status` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `open_cart_code`
--
DROP TABLE IF EXISTS `open_cart_code`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `open_cart_code`  AS  select distinct `carts`.`cart_code` AS `cart_code` from `carts` where ((`carts`.`cart_admin_status` = 0) and (`carts`.`cart_user_status` = 1)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `brend_id` (`brend_id`);

--
-- Indexes for table `brends`
--
ALTER TABLE `brends`
  ADD PRIMARY KEY (`brend_id`),
  ADD KEY `brend_id` (`brend_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `article_id` (`article_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `brends`
--
ALTER TABLE `brends`
  MODIFY `brend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
