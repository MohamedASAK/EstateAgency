-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `nid` varchar(14) NOT NULL,
  `image` varchar(300) NOT NULL DEFAULT 'person.png',
  `image_path` varchar(300) NOT NULL,
  `salary` float NOT NULL,
  `theme` varchar(10) NOT NULL DEFAULT 'light',
  `rule` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `address`, `nid`, `image`, `image_path`, `salary`, `theme`, `rule`, `create_at`) VALUES
(1, 'Mohamed', 'mo@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '015', 'cairo', '015', 'person.png', '', 10000, 'light', 1, '2024-04-08 13:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `nid` varchar(14) NOT NULL,
  `image` varchar(300) NOT NULL DEFAULT 'person.png',
  `image_path` varchar(300) NOT NULL,
  `salary` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `joindataproperities`
-- (See below for the actual view)
--
CREATE TABLE `joindataproperities` (
`propId` int(11)
,`title` varchar(50)
,`description` varchar(120)
,`location` varchar(120)
,`price` float
,`image_path` varchar(300)
,`agentId` int(11)
,`agentName` varchar(90)
,`agentImage` varchar(300)
,`devId` int(11)
,`devName` varchar(90)
);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` varchar(300) NOT NULL DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(120) NOT NULL,
  `price` float NOT NULL,
  `location` varchar(120) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `sales_agent` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `real_estate_developer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_developers`
--

CREATE TABLE `real_estate_developers` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `image` varchar(300) NOT NULL DEFAULT 'person.png',
  `image_path` varchar(300) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `nid` varchar(14) NOT NULL,
  `image` varchar(300) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `joindataproperities`
--
DROP TABLE IF EXISTS `joindataproperities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `joindataproperities`  AS SELECT `properties`.`id` AS `propId`, `properties`.`title` AS `title`, `properties`.`description` AS `description`, `properties`.`location` AS `location`, `properties`.`price` AS `price`, `properties`.`image_path` AS `image_path`, `agents`.`id` AS `agentId`, `agents`.`name` AS `agentName`, `agents`.`image` AS `agentImage`, `real_estate_developers`.`id` AS `devId`, `real_estate_developers`.`name` AS `devName` FROM ((`properties` join `agents` on(`properties`.`sales_agent` = `agents`.`id`)) join `real_estate_developers` on(`properties`.`real_estate_developer` = `real_estate_developers`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_agent` (`sales_agent`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `real_estate_developer` (`real_estate_developer`);

--
-- Indexes for table `real_estate_developers`
--
ALTER TABLE `real_estate_developers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`sales_agent`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_3` FOREIGN KEY (`real_estate_developer`) REFERENCES `real_estate_developers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
