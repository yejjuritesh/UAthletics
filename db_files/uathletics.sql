-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2022 at 09:32 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uathletics`
--
CREATE DATABASE IF NOT EXISTS `uathletics` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uathletics`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `teams` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `event_image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `location`, `teams`, `email`, `event_date`, `ticket_price`, `event_image`) VALUES
(1, 'UofU vs UMinnesota', 'Rice Eccless Stadium, SLC', 'UofU, UMinnesota', 'organizer@gmail.com', '2022-03-25', 50, 'images/uofu.jpg'),
(2, 'Summer Football match   ', 'Dumke Stadium, SLC   ', 'Utes, Racers   ', 'organizer@gmail.com   ', '2022-03-26', 10, 'images/foot.jpg'),
(3, 'Basketball match 1', 'Huntsman Center ', 'Team A, Team B ', 'org@gmail.com ', '2022-05-24', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `number_of_players` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `sport_name`, `number_of_players`) VALUES
(1, 'Football', 11),
(2, 'Basketball', 5),
(3, 'Gymnastics', 15);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `est_date` date DEFAULT NULL,
  `no_players` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `team_icon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `sport_id`, `email`, `est_date`, `no_players`, `income`, `team_icon`) VALUES
(2, 'Best football team', 1, 'bestteam@athletics.utah.edu    ', '2013-03-01', 11, 150000, 'images/bestteam.jpg'),
(3, 'The basketball team', 2, 'basketballteam@athletics.utah.edu', '2001-12-30', 5, 250000, 'images/basketballteam.jpg'),
(4, 'A team', 2, 'ateam@athletics.utah.edu', '2001-02-10', 5, 20000, 'images/ateam.jpg'),
(5, 'Gynastics team', 3, 'gymnasticsteam@athletics.utah.edu', '2001-12-30', 15, 50000, 'images/gymnasticsteam.jpg'),
(6, 'Utes team', 3, 'utesteam@athletics.utah.edu', '2011-10-15', 15, 700000, 'images/utesteam.jpg'),
(7, 'B team   ', 2, 'bteam@athletics.utah.edu   ', '2001-05-10', 5, 150000, 'images/bteam.jpg'),
(8, 'Superkings', 1, 'superkings@athletics.utah.edu', '2012-09-30', 11, 10000, 'images/superkings.jpg'),
(9, 'Knight Riders', 3, 'knightriders@athletics.utah.edu', '2006-07-01', 15, 98000, 'images/knightriders.jpg'),
(10, 'Dare devils', 2, 'daredevils@athletics.utah.edu', '2001-12-30', 5, 250000, 'images/daredevils.jpg'),
(11, 'Kings XI', 1, 'kingsxi@athletics.utah.edu', '2001-12-30', 11, 65000, 'images/kingsxi.jpg'),
(12, 'Tuskers', 2, 'tuskers@athletics.utah.edu', '2001-12-30', 5, 16000, 'images/tuskers.jpg'),
(13, 'Lions', 3, 'lions@athletics.utah.edu', '2001-12-30', 21, 87000, 'images/lions.jpg'),
(14, 'Royal Challengers', 1, 'royalchallengers@athletics.utah.edu', '2001-12-30', 11, 431000, 'images/royalchallengers.jpg'),
(15, 'Sunrisers', 2, 'sunrisers@athletics.utah.edu', '2001-12-30', 5, 324000, 'images/sunrisers.jpg'),
(16, 'Titans', 3, 'titans@athletics.utah.edu', '2001-12-30', 20, 900000, 'images/titans.jpg'),
(17, 'Capitals', 1, 'capitals@athletics.utah.edu', '2001-12-30', 11, 87005, 'images/capitals.jpg'),
(18, 'Royals', 2, 'royals@athletics.utah.edu', '2001-12-30', 5, 91000, 'images/royals.jpg'),
(19, 'Super Gaints', 3, 'supergaints@athletics.utah.edu', '2001-12-30', 13, 14300, 'images/supergaints.jpg'),
(20, 'The Indians', 1, 'indians@athletics.utah.edu', '2001-12-30', 11, 923400, 'images/indians.jpg'),
(1, 'Team1', 1, 'team1@athletics.utah.edu', '2010-12-01', 11, 10200, 'team1.jpg'),
(22, 'Team X', 1, 'teamx@uathletics.utah.edu', '2020-03-20', 11, 18900, 'images/teamx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_ledger`
--

CREATE TABLE `transaction_ledger` (
  `income_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_ledger`
--

INSERT INTO `transaction_ledger` (`income_id`, `team_id`, `transaction_amount`, `transaction_type`) VALUES
(1, 1, 15000, 'income'),
(5, 7, 13010, 'income'),
(2, 1, 1300, 'expense'),
(3, 2, 12900, 'income'),
(4, 2, 1400, 'income');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`),
  ADD UNIQUE KEY `sport_name` (`sport_name`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `team_name` (`team_name`),
  ADD KEY `team_table_fkey_sport_id` (`sport_id`);

--
-- Indexes for table `transaction_ledger`
--
ALTER TABLE `transaction_ledger`
  ADD PRIMARY KEY (`income_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
