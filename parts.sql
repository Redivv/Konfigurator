-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 01:23 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `config`
--

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `field_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `fieldset_id` int(11) NOT NULL,
  `price` varchar(250) COLLATE utf8_polish_ci NOT NULL DEFAULT '-',
  `score` varchar(250) COLLATE utf8_polish_ci NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `name`, `field_id`, `type_id`, `fieldset_id`, `price`, `score`) VALUES
(1, '4-core i3 3.6 GHz', 1, 1, 1, '0', '15290'),
(2, '6-core i5 2.8 GHz', 1, 1, 1, '10', '21228'),
(3, '6-core i7 3.2 GHz', 1, 1, 1, '15', '23767'),
(4, '6-core i7 3.7 GHz', 1, 1, 1, '20', '27628'),
(5, '8-core i9 3.6 GHz', 1, 1, 1, '25', '32713'),
(6, 'RX560', 1, 2, 1, '0', 'Wynik GeekBench'),
(7, 'RX570', 1, 2, 1, '10', 'Wynik GeekBench'),
(8, 'RX580', 1, 2, 1, '15', 'Wynik GeekBench'),
(9, '16 GB', 1, 3, 1, '0', 'Wynik GeekBench'),
(10, '32 GB', 1, 3, 1, '5', 'Wynik GeekBench'),
(11, '64 GB', 1, 3, 1, '15', 'Wynik GeekBench'),
(12, '250 GB SSD', 1, 4, 1, '0', 'Wynik GeekBench'),
(13, '500 GB SSD', 1, 4, 1, '22', 'Wynik GeekBench'),
(14, '1 TB SSD', 1, 4, 1, '48', 'Wynik GeekBench'),
(15, '2 TB SSD', 1, 4, 1, '50', 'Wynik GeekBench'),
(16, '6-core Xeon 3,5 GHz', 2, 1, 2, '0', '17874'),
(17, '8-core Xeon 3,0 GHz', 2, 1, 2, '3740', '22833'),
(18, '12-core Xeon 2,7 GHz', 2, 1, 2, '9500', '26261'),
(19, '2xFirePro D500', 2, 2, 2, '0', 'Wynik GeekBench'),
(20, '2xFirePro D700', 2, 2, 2, '960', 'Wynik GeekBench'),
(21, '16 GB', 2, 3, 2, '0', 'Wynik GeekBench'),
(22, '32 GB', 2, 3, 2, '1920', 'Wynik GeekBench'),
(23, '64 Gb', 2, 3, 2, '5760', 'Wynik GeekBench'),
(24, '256 GB SSD', 2, 4, 2, '0', 'Wynik GeekBench'),
(25, '512 GB SSD', 2, 4, 2, '960', 'Wynik GeekBench'),
(26, '1 TB SSD', 2, 4, 2, '2880', 'Wynik GeekBench'),
(27, '4-core i5 3.0 GHz', 2, 1, 3, '0', '13074'),
(28, '4-core i5 3.4 GHz', 2, 1, 3, '480', '13472'),
(29, '4-core i7 3.6 GHz', 2, 1, 3, '1440', '17776'),
(30, 'Radeon Pro 555 2 GB', 2, 2, 3, '0', 'Wynik GeekBench'),
(31, '8 GB', 2, 3, 3, '0', 'Wynik GeekBench'),
(32, '16 GB', 2, 3, 3, '960', 'Wynik GeekBench'),
(33, '32 GB', 2, 3, 3, '2880', 'Wynik GeekBench'),
(34, '256 GB SSD', 2, 4, 3, '0', 'Wynik GeekBench'),
(35, '512 GB SSD', 2, 4, 3, '1920', 'Wynik GeekBench'),
(36, '4-core i3 3.6 GHz', 2, 1, 4, '0', '14448'),
(37, '6-core i5 3.0 GHz', 2, 1, 4, '540', '17511'),
(38, '6-core i7 3.2 GHz', 2, 1, 4, '1500', '20912'),
(39, 'Intel Graphics 630 ', 2, 2, 4, '0', 'Wynik GeekBench'),
(40, '8 GB', 2, 3, 4, '0', 'Wynik GeekBench'),
(41, '16 GB', 2, 3, 4, '960', 'Wynik GeekBench'),
(42, '32 GB', 2, 3, 4, '2880', 'Wynik GeekBench'),
(43, '64 GB', 2, 3, 4, '6720', 'Wynik GeekBench'),
(44, '256 GB SSD', 2, 4, 4, '0', 'Wynik GeekBench'),
(45, '512 GB SSD', 2, 4, 4, '1920', 'Wynik GeekBench'),
(46, '1 TB SSD', 2, 4, 4, '3840', 'Wynik GeekBench'),
(47, '2 TB SSD', 2, 4, 4, '7680', 'Wynik GeekBench'),
(48, 'Radeon Pro 560 4 GB', 2, 2, 3, '40', 'Wynik GeekBench'),
(49, 'Nazwa', 0, 1, 1, 'Cena', 'Wynik GeekBench'),
(50, 'Nazwa', 0, 1, 1, 'Cena', 'Wynik GeekBench'),
(51, 'Nazwa', 0, 1, 1, 'Cena', 'Wynik GeekBench'),
(52, 'Nazwa', 0, 1, 1, 'Cena', 'Wynik GeekBench');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
