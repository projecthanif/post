-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(100) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `present_time` date DEFAULT curdate(),
  `text` mediumtext NOT NULL,
  `present_date` datetime DEFAULT curtime(),
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `present_time`, `text`, `present_date`, `image`) VALUES
(0, NULL, '2023-01-13', 'TEST', '2023-01-13 14:38:41', 'IMG-132037.jpg'),
(0, NULL, '2023-01-13', '', '2023-01-13 15:07:43', 'IMG-106088.jpg'),
(0, NULL, '2023-01-13', '', '2023-01-13 15:07:48', 'IMG-126103.jpg'),
(0, NULL, '2023-01-13', '    \r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum possimus architecto quibusdam. Voluptatibus provident dignissimos pariatur soluta est odit tenetur rerum accusantium aperiam, quisquam quae cumque in. Facilis, delectus veniam!', '2023-01-13 16:13:14', NULL),
(0, NULL, '2023-01-13', '', '2023-01-13 16:18:44', 'IMG-182872.png'),
(0, NULL, '2023-01-13', '', '2023-01-13 16:19:23', 'IMG-153204.jpg'),
(0, NULL, '2023-01-13', '', '2023-01-13 16:19:45', 'IMG-155237.jpg'),
(0, NULL, '2023-01-13', '', '2023-01-13 21:36:34', 'IMG-141736.jpg'),
(0, NULL, '2023-01-14', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe reiciendis, dolore totam vero sint vel enim ullam animi ducimus inventore eius consequuntur, magnam odit dicta id suscipit beatae dolor architecto?', '2023-01-14 14:01:45', 'IMG-194303.jpg'),
(0, NULL, '2023-01-14', '', '2023-01-14 19:58:41', 'IMG-157491.jpg'),
(0, NULL, '2023-01-14', '', '2023-01-14 20:26:31', 'IMG-138561.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `user_password`) VALUES
(153, 'Mustapha', 'mustapha@gmail.com', '909', '$2y$10$11LeKOemFSgblz7eMD/d6.c.V8jVr3etlRBmpq1XNdqgXyer3Xabm'),
(199, 'Hanif', 'hanif@gmail.com', '090543', '$2y$10$Ej.7B4F/YSa0N564Vv7ryeh89mHixNh8VWyZJeK/Rhw48CpR5fY9O'),
(200, 'Hanif', 'iamustapha@gmail.com', '090617732344', '$2y$10$z2l3IASg8IA0Tq55dvW9yOhVP9LO/UPq/g89igvyo0tLjfgx.YyQy'),
(201, 'Ibrahim Ibrahim', 'Ibrahim16@gmail.com', '0908743121', '$2y$10$MfFqEDnOmojQHurIXYQw/Oe/73jyNjLWYiIUQ2edz7RZDeQujiT.e'),
(202, 'Mustapha', 'Ibrahim@gmail.com', '09061887329', '$2y$10$6BDVDhHMpeYPoFaU6UnntOk/RDfHaTlmHpQC5IyjWq1Y2aenJT7..');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `number` (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
