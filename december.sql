-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2021 at 01:52 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `december`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `number` int(6) NOT NULL,
  `password` int(12) NOT NULL,
  `email` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `popup` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `image`, `number`, `password`, `email`, `popup`) VALUES
(83, 'Orhan Kansız', '1639316836-image1.png', 123321, 23134, 'orhan@gmail.com', 1),
(84, 'Hasan Gündoğdu', 'no-image.png', 6145, 8597, 'hasso@hasso.com', 0),
(85, 'Helin Part', '1639316887-image4.png', 747, 8962, 'helin@mynet.com', 0),
(86, 'Gamze Sert', '1639316918-image2.png', 54325, 45545, 'gamze@hello.com', 1),
(87, 'Zaraki Kenpachi', '1639316977-image3.png', 986554, 25963, 'bleach@com.jp', 0),
(88, 'Dolar Lorem', 'no-image.png', 132456, 987987, 'ipsum@sit.a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'demo@demo.com', 'demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
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
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
