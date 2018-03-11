-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 07:51 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `image`, `mob_no`, `email`) VALUES
('rajesh', 'rajesh', 'img/rajesh.jpg', 8058862604, 'meena.8@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `user_id` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`user_id`, `password`, `type`) VALUES
('deewan', 'deewan', 'stud'),
('rajesh', 'rajesh', 'admin'),
('shiv', '671fc86500ae5dd534f859e4483354fe', 'stud');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(40) NOT NULL,
  `id` varchar(10) NOT NULL,
  `num_leave` int(11) NOT NULL,
  `mob_no` int(11) NOT NULL,
  `p_mob_no` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `id`, `num_leave`, `mob_no`, `p_mob_no`, `email`, `password`, `image`, `type`) VALUES
('deewan', 'deewan', 1, 2147483647, 0, 'singh.8@gmail.com', 'deewan', 'img/default.png', 'stud'),
('shiv', 'shiv', 0, 123456789, 0, 'shiv@gmail.com', '671fc86500ae5dd534f859e4483354fe', 'img/default.png', 'stud');

-- --------------------------------------------------------

--
-- Table structure for table `student_leave`
--

CREATE TABLE `student_leave` (
  `id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `days` int(11) NOT NULL,
  `reason` text NOT NULL,
  `comments` text NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_leave`
--

INSERT INTO `student_leave` (`id`, `date`, `days`, `reason`, `comments`, `name`, `status`) VALUES
('deewan', '2018-04-22', 3, 'wedding', '', 'deewan', 'Approved'),
('shiv', '0000-00-00', 0, '', '', 'shiv', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_leave`
--
ALTER TABLE `student_leave`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
