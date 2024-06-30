-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 05:15 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20637323_logindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `regdno` varchar(128) NOT NULL,
  `course` varchar(128) NOT NULL,
  `attended` int(11) NOT NULL,
  `conducted` int(11) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`regdno`, `course`, `attended`, `conducted`, `percent`) VALUES
('RA2111047010042', 'Math', 32, 38, 84),
('RA2111047010030', 'Cnc', 32, 40, 80),
('RA2111047010044', 'Cnc', 32, 35, 91),
('RA2111047010030', 'Escaping alimony', 20, 20, 100),
('RA2111047010020', 'Math', 32, 35, 91),
('RA2111047010042', 'Cnc', 30, 35, 85),
('RA2111047010042', 'Dbms', 36, 38, 94),
('RA2111047010042', 'Ada', 28, 35, 80),
('RA2111047010042', 'Nnml', 30, 40, 75),
('RA2111047010042', 'Foai', 20, 26, 76),
('RA2111047010042', 'Math', 40, 45, 88),
('RA2111047010042', 'Pyschology', 10, 18, 55),
('210390116009', 'IT', 63, 70, 90);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `regdno` varchar(128) NOT NULL,
  `course` varchar(255) NOT NULL,
  `obtained` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`regdno`, `course`, `obtained`, `total`, `percent`) VALUES
('RA2111047010042', 'Math', 47, 50, 94),
('RA2111047010030', 'Math', 46, 50, 92),
('RA2111047010030', 'Math', 46, 50, 92),
('RA2111047010044', 'Cnc', 45, 50, 90),
('RA2111047010042', 'Rizzing', 0, 15, 0),
('RA2111047010030', 'Rizzing', 0, 15, 0),
('RA2111047010020', 'Math', 48, 50, 96),
('RA2111047010042', 'Dbms', 22, 25, 88),
('RA2111047010042', 'Ada', 38, 50, 76),
('RA2111047010042', 'Nnml', 23, 25, 92),
('RA2111047010042', 'Foai', 40, 50, 80),
('RA2111047010042', 'Math', 30, 40, 75),
('RA2111047010028', 'dbms', 30, 40, 75),
('RA2111047010042', 'Pyschology', 45, 50, 90),
('RA2111047010030', 'ada', 30, 50, 60),
('210390116009', 'IT', 69, 70, 98),
('210390116009', 'AI', 70, 70, 100),
('RA2111047010042', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `branch` varchar(128) NOT NULL,
  `section` varchar(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `branch`, `section`, `password_hash`) VALUES
(1, 'Dinesh', 'Dinesh@srmist.edu.in', 'AI', 'A', '$2y$10$2nQpd062VtIDZLL1yavO7emFZJbIBHaojgkIVzyKFqY1aow7rUNha'),
(2, 'Malhar', 'wawa@gmail.com', 'Dating coaching', '12', '$2y$10$2mFGlDH5Mz2p4Q/jBauSYea7GEJUC6mzEaXd7XbWAfRov29r91CWy'),
(3, 'Ishan', 'is9678@srmist.edu.in', 'BTech AI', 'A', '$2y$10$grFHyVCYCVdW3w5ez06T9.eIIcLBNJY4Rxn7eSVlFVpefXGyFh326'),
(4, 'ck', 'charvinkhanpara123@gmail.com', 'IT', 'IT', '$2y$10$vEu4h9aKvQvSaUCCVBNVGec5t4TLOshApymeICXN.5WpKBSHnglkW'),
(7, 'ck sir ', 'charvinkhanpara@gmail.com', 'IT', 'IT', '$2y$10$6T9aPgeLwy57t8JULTv1m.DATIuD2B2acRmeL.XWEgWPI6KQt8qYi'),
(8, 'jeet', 'ifallsuave8@gmail.com', 'it', 'a', '$2y$10$7fttkDRW3Ch8nRj8BpvXQuXuNf0RwUb215FttzkBwQnLHIes9ag56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `regdno` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `yos` int(11) NOT NULL,
  `branch` varchar(128) NOT NULL,
  `section` varchar(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `regdno`, `dob`, `yos`, `branch`, `section`, `password_hash`) VALUES
(1, 'Ishan', 'RA2111047010042', '2003-09-04', 2, 'AI', 'A', '$2y$10$8GDjJ0MzxQU/WmqI7tJgm.DSABjvSM4qLFJ93XHByhrKVL3jicINO'),
(2, 'Hithesh', 'RA2111047010030', '2003-02-14', 2, 'AI', 'A', '$2y$10$ict5wkdX59alZCkI5Vgnx.u3/2zJxCkEgCsqrHchUcA37vTK/Gtjq'),
(3, 'Nithin', 'RA2111047010044', '2003-06-02', 2, 'AI', 'A', '$2y$10$UNyKTqGsSNipG7F1uRPf1uJd7hSTVTTpbqgDEZ6RQBAtg1azenCfG'),
(4, 'Meghanand', 'RA2111047010020', '2003-12-15', 2, 'AI', 'A', '$2y$10$ZajLp5QXvv/6k3yBCkdI1u/poILKpSuX3NF4csufc6JjY.IHgpy2q'),
(5, 'Malhar', '123456', '1991-02-09', 1897, 'Dating coaching', '12', '$2y$10$lEE2OYfP8JfM2wfzbEB2TeB2bZzv0hD7CL8u6bIZRw6PvjYRJWMNO'),
(6, 'Anugnya', 'RA2111047010028', '2003-06-17', 2, 'AI', 'A', '$2y$10$jfkWBBYj7ybOfxoCAASXSeIg8JT4azuV4iewJBw8CwGoNX3kMX3aG'),
(7, 'Anirudh Kavle', 'RA2111047010022', '2003-04-28', 2023, 'A.I', 'A', '$2y$10$1ZWWZ6BuULFXCBE66Mjkku5jFECmO0a4eG6wv.yoZe2VzVZuw2h9a'),
(8, 'charvin khanpara', '210390116009', '2004-04-18', 3, 'IT', 'IT', '$2y$10$KwmFHHlqht6hl7qF2ubigeD6NtJsVuA55dfEtbQQ2uFe8Qcemfm.m'),
(9, 'jeet', '123', '2003-11-28', 3, 'it', 'a', '$2y$10$nJbBHT15LQivxPAx9aCaZ.lp/GnpXMUgSOKkLOWp9q6EZxBoURQX.'),
(11, 'rahil ', '3102008', '2008-10-03', 3, 'BE', 'IT', '$2y$10$7C4gMp6J1hGPHv2wWDLvNuON1lsyfKKp5c801MGinZc2HXAYdimPy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regdno` (`regdno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
