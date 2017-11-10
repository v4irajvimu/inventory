-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 07:28 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `slogon` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tp_1` varchar(45) DEFAULT NULL,
  `tp_2` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `clr_header_bg` varchar(10) DEFAULT '#0080c7',
  `clr_header_txt` varchar(10) DEFAULT '#ffffff',
  `clr_subheader_bg` varchar(10) DEFAULT '#e8e8e8',
  `clr_subheader_bg_hover` varchar(10) DEFAULT '#e8e8e8',
  `clr_subheader_txt` varchar(10) DEFAULT '#393939',
  `online` tinyint(1) DEFAULT '0',
  `clr_ui_border_bottom` varchar(10) DEFAULT '#e8e8e8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `slogon`, `email`, `tp_1`, `tp_2`, `fax`, `clr_header_bg`, `clr_header_txt`, `clr_subheader_bg`, `clr_subheader_bg_hover`, `clr_subheader_txt`, `online`, `clr_ui_border_bottom`) VALUES
(2, 'Consolidated', 'Australia', 'The Best', 'viraj.vimu@gmail.com', '+94718784949', '+94718784949', '+94718784949', '#80ff00', '#ff0000', '#00ffff', '#e8e8e8', '#393939', 1, '#e8e8e8');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `selling` decimal(10,2) DEFAULT NULL,
  `itemcode` varchar(100) DEFAULT NULL,
  `online` tinyint(4) DEFAULT '1',
  `minQty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `cost`, `selling`, `itemcode`, `online`, `minQty`) VALUES
(2, 'Soap', 'Soap desc', '40.25', '50.50', 'SOAP001', 1, 10),
(3, 'BUS', 'NIS', '80.00', '150.00', 'BUS', 1, 12),
(4, 'PAN', 'PANMA Thamaa. :p ', '50.00', '150.00', 'PAN', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `itemimages`
--

CREATE TABLE `itemimages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `online` tinyint(1) DEFAULT '1',
  `ismain` tinyint(1) DEFAULT '0',
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itemimages`
--

INSERT INTO `itemimages` (`id`, `name`, `online`, `ismain`, `item_id`) VALUES
(2, 'ITMSOAP0012.png', 1, 1, 2),
(3, 'ITMBUS3.png', 1, 1, 3),
(4, 'ITMPAN4.png', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`id`, `name`, `value`) VALUES
(1, 'status', 'local'),
(2, 'pages', '20');

-- --------------------------------------------------------

--
-- Table structure for table `trans_type`
--

CREATE TABLE `trans_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `online` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_type`
--

INSERT INTO `trans_type` (`id`, `name`, `online`) VALUES
(1, 'QUANTITY IN', '1'),
(2, 'QUANTITY OUT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_item`
--

CREATE TABLE `t_item` (
  `id` int(11) NOT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `selling` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `item_code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `trans_type_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_item`
--

INSERT INTO `t_item` (`id`, `cost`, `selling`, `qty`, `created`, `item_code`, `name`, `trans_type_id`, `item_id`, `online`) VALUES
(6, '40.25', '50.50', 500, '2017-11-08 22:33:40', 'SOAP001', 'Soap', 1, 2, 1),
(7, '40.25', '50.50', 200, '2017-11-08 22:33:49', 'SOAP001', 'Soap', 2, 2, 1),
(8, '40.25', '50.50', 800, '2017-11-08 22:33:57', 'SOAP001', 'Soap', 1, 2, 1),
(9, '40.25', '50.50', 150, '2017-11-08 22:34:04', 'SOAP001', 'Soap', 1, 2, 1),
(10, '80.00', '150.00', 500, '2017-11-08 22:34:13', 'BUS', 'BUS', 1, 3, 1),
(11, '80.00', '150.00', 230, '2017-11-08 22:34:22', 'BUS', 'BUS', 1, 3, 1),
(12, '40.25', '50.50', 360, '2017-11-08 22:34:29', 'SOAP001', 'Soap', 1, 2, 1),
(13, '80.00', '150.00', 90, '2017-11-08 22:34:41', 'BUS', 'BUS', 2, 3, 1),
(14, '80.00', '150.00', 410, '2017-11-08 22:34:51', 'BUS', 'BUS', 2, 3, 1),
(15, '50.00', '150.00', 50, '2017-11-08 23:49:25', 'PAN', 'PAN', 1, 4, 1),
(16, '40.25', '50.50', 1550, '2017-11-08 23:50:01', 'SOAP001', 'Soap', 2, 2, 1),
(17, '80.00', '150.00', 190, '2017-11-08 23:50:27', 'BUS', 'BUS', 2, 3, 1),
(18, '40.25', '50.50', 60, '2017-11-10 17:47:08', 'SOAP001', 'Soap', 1, 2, 1),
(19, '40.25', '50.50', 23, '2017-11-10 18:49:15', 'SOAP001', 'Soap', 1, 2, 1),
(20, '40.25', '50.50', 23, '2017-11-10 18:49:29', 'SOAP001', 'Soap', 2, 2, 1),
(21, '40.25', '50.50', 50, '2017-11-10 19:03:10', 'SOAP001', 'Soap', 1, 2, 1),
(22, '80.00', '150.00', 20, '2017-11-10 19:06:23', 'BUS', 'BUS', 1, 3, 1),
(23, '80.00', '150.00', 70, '2017-11-10 19:07:24', 'BUS', 'BUS', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tp_fixed` varchar(15) DEFAULT NULL,
  `tp_mobile` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `last_logged` datetime DEFAULT NULL,
  `online` tinyint(4) DEFAULT '1',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `user_levels_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `address`, `tp_fixed`, `tp_mobile`, `dob`, `created`, `last_logged`, `online`, `username`, `password`, `email`, `company_id`, `user_levels_id`) VALUES
(3, 'Viraj', '901030040V', 'Kandy', '0094718784949', '0094718784949', '1990-07-11', '2017-11-08 00:00:00', '2017-11-10 17:17:15', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `online` tinyint(4) DEFAULT '1',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `name`, `online`, `created`) VALUES
(4, 'Admin', 1, '2017-11-08 00:00:00'),
(5, 'Super Admin', 1, '2017-11-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemcode` (`itemcode`);

--
-- Indexes for table `itemimages`
--
ALTER TABLE `itemimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_itemimages_item1_idx` (`item_id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_type`
--
ALTER TABLE `trans_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_item`
--
ALTER TABLE `t_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_item_trans_type1_idx` (`trans_type_id`),
  ADD KEY `fk_t_item_item1_idx` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic_UNIQUE` (`nic`),
  ADD KEY `fk_users_company1_idx` (`company_id`),
  ADD KEY `fk_users_user_levels1_idx` (`user_levels_id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itemimages`
--
ALTER TABLE `itemimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trans_type`
--
ALTER TABLE `trans_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_item`
--
ALTER TABLE `t_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemimages`
--
ALTER TABLE `itemimages`
  ADD CONSTRAINT `fk_itemimages_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_item`
--
ALTER TABLE `t_item`
  ADD CONSTRAINT `fk_t_item_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_item_trans_type1` FOREIGN KEY (`trans_type_id`) REFERENCES `trans_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_user_levels1` FOREIGN KEY (`user_levels_id`) REFERENCES `user_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
