-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 11:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parent_monitoring_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `childrenId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1:assigned 2: completed',
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `detail`, `parentId`, `childrenId`, `status`, `file_name`) VALUES
(5, 'and test', 5, 4, 1, 'inventory_manager_schema.png'),
(8, 'test task', 5, 4, 1, NULL),
(9, '', 0, NULL, 0, NULL),
(12, 'clean room', 9, 8, 1, 'Lab 1 - HCI.pdf'),
(14, 'washing clothes', 9, 8, 2, 'IMG_0003.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 : parent 2:children',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `user_type`, `password`) VALUES
(2, 'test', 'test@gmail.com', '0000-00-00', 2, '1234567'),
(3, 'test', 'tester@gmail.com', '10/10/1993', 2, '123456'),
(4, 'test', 'admin@gmail.com', '10/10/1993', 2, 'admin@123'),
(5, 'test parent', 'parent@gmail.com', '10/10/1993', 1, '123456'),
(6, 'ghalia', 'g_khalid97@hotmail.com', '2', 2, '123456'),
(7, 'g', 'galmulhim97@gmail.com', '22', 2, '123'),
(8, 'saif', 'saif@hotmail.com', '22', 2, '123'),
(9, 'sara', 'sara@hotmail.com', '11', 1, '123'),
(10, 'kha;id', 'khalid@hotmail.com', '1981', 2, '121212'),
(11, 'khalid1', 'khalid1@hotmail.com', '1981', 1, '123123123123'),
(12, 'ghalia', 'ghalia@hotmail.com', '22', 1, '123'),
(13, 'dalal', 'dalal@hotmail.com', '1997', 1, '123'),
(14, 'rawan', 'rawan@hotmail.com', '1997', 1, '123'),
(15, 'norah', 'norah@hotmail.com', '1997', 1, '123'),
(16, 'omar', 'omar@hotmail.com', '2009', 2, '123'),
(17, 'saleh', 'saleh@hotmail.com', '2010', 2, '123'),
(18, 'ahmed', 'ahmed@hotmail.com', '2008', 2, '123'),
(19, 'mohammed', 'mohammed@hotmail.com', '2010', 2, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
