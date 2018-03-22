-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 11:06 AM
-- Server version: 5.7.15
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newtoru`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` set('Active','Suspended','Disabled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `description`, `parent_id`, `lft`, `rght`, `created`, `modified`, `status`) VALUES
(1, 'Toru Construction Company', 'Toru Construction Company Main Account', 0, 16, 16, '2018-02-21 16:31:49', '2018-02-21 16:31:49', 'Active'),
(7, 'Palo Dehri To Jalil', 'palo dehri to jalil main account', 1, 0, 9, '2018-03-03 08:53:34', '2018-03-03 08:53:34', 'Active'),
(8, 'Sub Base', 'sub base main account', 7, 1, 2, '2018-03-03 08:55:12', '2018-03-03 08:55:12', 'Active'),
(9, 'Steel', 'steel items main account', 7, 3, 6, '2018-03-03 08:56:38', '2018-03-03 08:56:38', 'Active'),
(10, 'Rustum road to Shaheedan', 'rustum road to shaheedan main account', 1, 10, 15, '2018-03-03 08:57:03', '2018-03-03 08:57:03', 'Active'),
(11, 'Crush', 'Crush Main Account which will have sub accounts of sub contractors', 10, 11, 12, '2018-03-03 08:57:38', '2018-03-03 08:57:38', 'Active'),
(12, 'steel merchant', 'steel merchant', 9, 4, 5, '2018-03-03 09:10:02', '2018-03-03 09:10:02', 'Active'),
(13, 'Sub Base', 'main account for shaheedan subbase', 10, 13, 14, '2018-03-03 17:40:28', '2018-03-03 17:40:28', 'Active'),
(14, 'Crush', 'main account for palo dehri crush', 7, 7, 8, '2018-03-03 17:41:21', '2018-03-03 17:41:21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `details` varchar(500) NOT NULL,
  `Location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `details`, `Location`) VALUES
(2, 'Irrigation 2 Swabi', 'Irrigation division 2 swabi main swabi choak ', 'Swabi'),
(3, 'Mardan Enclave', 'Mardan Enclave western bypass. its a town ship opposite green acres', 'Mardan'),
(5, 'C&W HighWay Mardan', 'Construction and works department mardan devision near gpo office mardan', 'Mardan');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `description` varchar(500) NOT NULL,
  `voucher` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `from_account` int(11) NOT NULL,
  `to_account` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `from_account`, `to_account`, `description`, `amount`, `voucher_no`, `voucher`, `date`) VALUES
(1, 1, 12, 'testing ', '100', 1, '', '2018-03-09 18:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` mediumtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `status_description` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `project_cost` varchar(30) NOT NULL,
  `project_bid_cost` int(30) NOT NULL,
  `completion_cost` varchar(20) NOT NULL,
  `additional_security` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `work_order_date` date NOT NULL,
  `agrement_status` varchar(30) NOT NULL,
  `ts_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `start_date`, `end_date`, `status`, `status_description`, `location`, `clients_id`, `project_cost`, `project_bid_cost`, `completion_cost`, `additional_security`, `duration`, `work_order_date`, `agrement_status`, `ts_status`) VALUES
(2, 'Dubi Adda to Gulabad', 'length 1.5 km', '2015-06-19', '2016-01-30', 'Completed', 'Completed', 'Mardan', 5, '16000000', 13000000, '14000000', 0, 6, '2015-05-04', 'done', 'revised'),
(3, 'Dubi Adda to Sreekh Village', '1.1 Km length', '2015-06-12', '2017-01-04', 'Completed', 'waiting for security ', 'Mardan', 5, '16000000', 13000000, '9500000', 0, 19, '2015-05-15', 'done', 'Approved'),
(4, 'Naray Banda to Barikaab', '1.7 km length', '2015-09-10', '2017-04-08', 'Completed', 'waiting for security ', 'Mardan', 5, '16000000', 12300000, '12500000', 0, 22, '2015-06-04', 'done', 'Approved'),
(5, 'Kala Dara Flood Protection', 'Flood protection wall at kala dara swabi main road', '2015-07-04', '2016-03-04', 'Completed', 'Completed', 'Swabi', 2, '6000000', 5950000, '5950000', 0, 6, '2015-07-04', 'done', 'Approved'),
(6, 'Rustum road to Shaheedan', '1.8 km length', '2016-02-04', '2018-06-30', 'In Progress', 'Structure work in progress', 'Mardan', 5, '35000000', 29700000, '33000000', 0, 24, '2016-03-04', 'done', 'Not yet Submitted'),
(7, 'palo dehri to jalil and chiragah', '1.4 km from sreekh village to chiragah and 1.6 km from nang to village jalil', '2016-08-04', '2018-06-04', 'In Progress', 'In Progress', 'Mardan', 5, '85000000', 82400000, '82400000', 0, 18, '2016-08-04', 'Not Done', 'Not Submitted'),
(8, 'Mardan Enclaves', 'Mardan Enclaves is a town ship , we have to develop the roads till sub base level.', '2016-01-01', '2018-06-01', 'In Progress', 'Second layer of SubGrade', 'Mardan', 3, '30000000', 23700000, '0', 0, 24, '2016-01-01', 'Done', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'umartoru', '$2y$10$wPm6f5SgLYjSuBppqIzeve71JQ4s1fnnksm.ZBrqk9rI4nyNR4kTK', 'CEO', '2018-02-21 13:21:00', '2018-02-21 13:21:00'),
(2, 'm.shoaib', '$2y$10$Oe34SYmqDHipuZV6FgBtmOQpfMrldyjCfZHhe6LWapwYgcVb9S2AS', 'General Manager', '2018-02-21 13:49:34', '2018-02-21 13:49:34'),
(3, 'umarhayat', '$2y$10$vRUYXySCJfyNnVWzLn1qFeQJzTO6YVq7nM1OpA6//wt8buuEJY4BK', 'Accountant', '2018-02-21 13:49:59', '2018-02-21 13:49:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_id` (`accounts_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_account` (`from_account`),
  ADD KEY `to_account` (`to_account`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id` (`clients_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_ibfk_1` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`from_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`to_account`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
