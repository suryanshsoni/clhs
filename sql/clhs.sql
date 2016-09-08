-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2016 at 09:30 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE `active_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`id`, `user`, `session_id`, `hash`, `expires`) VALUES
(4, 1, 'tk3fo7c2apd8s5uimmnlsoto21', 'a631edc91d4641ed5e46e935e71c699bb9a6943193158338c0d9b0464afac16e0e9a816e2296f74b9cd0e26d7846ebe8a3d031988753c3310726ec3cfd830afb', 1473363887),
(5, 1, '3av9ctlffj6mmoeferphigm903', '37eb9c204f28c89d823dd7069075f48b3d2358d4d967df257f58fdb831c0248390b0ad6f3e5f3a60afd99abac4d1821482bdd9f6fba0ae6b0d192fc26d1e8e38', 1473363887),
(6, 1, 'ga5up2te8flbtg71l34pkd7li7', 'd8a30b694d7ef6271be8b59acc141b47ce98be0c08ea9b500f37aa4f6e33cf0588150a7f18a8c418791cac4551dc61500e8b0c4be0fb4bc0e36ea23602da46f2', 1473363887),
(7, 1, 'ga5up2te8flbtg71l34pkd7li7', 'd8a30b694d7ef6271be8b59acc141b47ce98be0c08ea9b500f37aa4f6e33cf0588150a7f18a8c418791cac4551dc61500e8b0c4be0fb4bc0e36ea23602da46f2', 1473363887),
(8, 1, 'ga5up2te8flbtg71l34pkd7li7', 'd8a30b694d7ef6271be8b59acc141b47ce98be0c08ea9b500f37aa4f6e33cf0588150a7f18a8c418791cac4551dc61500e8b0c4be0fb4bc0e36ea23602da46f2', 1473363887);

-- --------------------------------------------------------

--
-- Table structure for table `batting_scorecard`
--

CREATE TABLE `batting_scorecard` (
  `s_match_id` int(11) NOT NULL DEFAULT '0',
  `s_player_id` int(11) NOT NULL DEFAULT '0',
  `s_runs` int(11) DEFAULT NULL,
  `s_balls_faced` int(11) DEFAULT NULL,
  `s_fours` int(11) DEFAULT NULL,
  `s_sixes` int(11) DEFAULT NULL,
  `s_caught_by` int(11) DEFAULT NULL,
  `s_bowled_by` int(11) DEFAULT NULL,
  `s_league_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bowling_scorecard`
--

CREATE TABLE `bowling_scorecard` (
  `s_match_id` int(11) NOT NULL DEFAULT '0',
  `s_player_id` int(11) NOT NULL DEFAULT '0',
  `s_overs` int(11) DEFAULT NULL,
  `s_wickets` int(11) DEFAULT NULL,
  `s_maiden_overs` int(11) DEFAULT NULL,
  `s_wides` int(11) DEFAULT NULL,
  `s_no_balls` int(11) DEFAULT NULL,
  `s_leg_byes` int(11) DEFAULT NULL,
  `s_league_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentary`
--

CREATE TABLE `commentary` (
  `innings_id` int(11) NOT NULL DEFAULT '0',
  `ball_number` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `result_of_ball` varchar(20) DEFAULT NULL,
  `fixture_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `f_match_id` int(11) NOT NULL,
  `f_team1_id` int(11) DEFAULT NULL,
  `f_team2_id` int(11) DEFAULT NULL,
  `f_venue` int(11) DEFAULT NULL,
  `f_date` date DEFAULT NULL,
  `f_winner_id` int(11) DEFAULT NULL,
  `f_league_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE `grounds` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(40) DEFAULT NULL,
  `g_city` varchar(40) DEFAULT NULL,
  `g_country` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

CREATE TABLE `league` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(40) DEFAULT NULL,
  `l_winner` varchar(40) DEFAULT NULL,
  `l_sixes` int(11) DEFAULT NULL,
  `l_fours` int(11) DEFAULT NULL,
  `l_wickets` int(11) DEFAULT NULL,
  `l_overs` int(11) DEFAULT NULL,
  `l_user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(40) DEFAULT NULL,
  `p_dob` date DEFAULT NULL,
  `p_runs` int(11) DEFAULT '0',
  `p_wickets` int(11) DEFAULT '0',
  `p_strike_rate` decimal(10,0) DEFAULT '0',
  `p_economy` decimal(10,0) DEFAULT '0',
  `p_average` decimal(10,0) DEFAULT '0',
  `p_batting_style` varchar(40) DEFAULT NULL,
  `p_bowling_style` varchar(40) DEFAULT NULL,
  `p_team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`p_id`, `p_name`, `p_dob`, `p_runs`, `p_wickets`, `p_strike_rate`, `p_economy`, `p_average`, `p_batting_style`, `p_bowling_style`, `p_team_id`) VALUES
(1, 'Sachin Tendulkar', '1985-09-27', 0, 0, '0', '0', '0', '', '', NULL),
(2, 'Virat Kohli', '1548-08-05', 0, 0, '0', '0', '0', 'Right Hand Batsman', 'Right Hand Fast', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(40) DEFAULT NULL,
  `t_coach` varchar(40) DEFAULT NULL,
  `t_captain_id` int(11) DEFAULT NULL,
  `t_league_id` int(11) DEFAULT NULL,
  `t_points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `umpfix`
--

CREATE TABLE `umpfix` (
  `umpire_id` int(11) NOT NULL DEFAULT '0',
  `fixture_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `umpires`
--

CREATE TABLE `umpires` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(40) DEFAULT NULL,
  `u_experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'admin', 'Administrator', 'srajan1996@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_users`
--
ALTER TABLE `active_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `batting_scorecard`
--
ALTER TABLE `batting_scorecard`
  ADD PRIMARY KEY (`s_match_id`,`s_player_id`,`s_league_id`);

--
-- Indexes for table `bowling_scorecard`
--
ALTER TABLE `bowling_scorecard`
  ADD PRIMARY KEY (`s_match_id`,`s_player_id`,`s_league_id`);

--
-- Indexes for table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`fixture_id`,`innings_id`,`ball_number`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`f_match_id`);

--
-- Indexes for table `grounds`
--
ALTER TABLE `grounds`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_captain_id` (`t_captain_id`);

--
-- Indexes for table `umpfix`
--
ALTER TABLE `umpfix`
  ADD PRIMARY KEY (`umpire_id`,`fixture_id`);

--
-- Indexes for table `umpires`
--
ALTER TABLE `umpires`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_users`
--
ALTER TABLE `active_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`t_captain_id`) REFERENCES `players` (`p_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
