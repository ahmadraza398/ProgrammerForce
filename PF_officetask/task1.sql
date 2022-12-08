-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 02:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `age`, `gender`, `image`) VALUES
(13, 'ammar ', 'ammar@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e49', '22', 'male', 'xyz2.jpg'),
(14, 'ahmad ', 'ahmed@gmail.com', '202cb962ac59075b964b07152d234b70', '24', 'male', 'xyz1.jpg'),
(15, 'ashfq ', 'ashfq@gmail.com', '289dff07669d7a23de0ef88d2f7129', '25', 'male', 'xyz2.jpg'),
(16, 'umar ', 'umar@gmail.com', '202cb962ac59075b964b07152d234b70', '25', 'male', 'xyz3.jpg'),
(17, ' afaq ahmad ', 'afaq@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '22', 'male', 'xyz4.jpg'),
(24, 'ahmad', 'ahmed@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '24', 'male', '1670495512-WhatsApp Image 2022'),
(25, 'kamran', 'kamran@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '22', 'male', '1670495948-Sequence Diagram.jp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
