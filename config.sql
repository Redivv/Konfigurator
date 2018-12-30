-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2018 at 12:55 PM
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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `field` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `org_price` varchar(250) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `image` varchar(250) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `field`, `org_price`, `image`) VALUES
(1, 'iroN CUBE', '1', '3800', 'iroN.png'),
(2, 'Mac Pro', '2', '14300', 'mac.png'),
(3, 'iMac', '2', '7460', 'imac.png'),
(4, 'Mac Mini', '2', '5910', 'mac_mini.png'),
(5, 'iMac Pro', '2', '23999', 'imac_pro.png'),
(6, 'iroN Tower', '1', '8500', 'iron_tower.png');

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
(2, '6-core i5 2.8 GHz', 1, 1, 1, '500', '21228'),
(3, '6-core i7 3.2 GHz', 1, 1, 1, '1000', '23767'),
(4, '6-core i7 3.7 GHz', 1, 1, 1, '1350', '27628'),
(5, '8-core i9 3.6 GHz', 1, 1, 1, '2100', '35713'),
(6, 'Intel UHD630', 1, 2, 1, '0', 'Wynik GeekBench'),
(7, 'RX560', 1, 2, 1, '700', 'Wynik GeekBench'),
(8, 'RX570', 1, 2, 1, '900', 'Wynik GeekBench'),
(9, '16 GB', 1, 3, 1, '0', 'Wynik GeekBench'),
(10, '32 GB', 1, 3, 1, '650', 'Wynik GeekBench'),
(11, '64 GB', 1, 3, 1, '2050', 'Wynik GeekBench'),
(13, '500 GB SSD', 1, 4, 1, '0', 'Wynik GeekBench'),
(14, '1 TB SSD', 1, 4, 1, '700', 'Wynik GeekBench'),
(15, '2 TB SSD', 1, 4, 1, '1600', 'Wynik GeekBench'),
(16, '6-core Xeon 3,5 GHz', 2, 1, 2, '0', '17874'),
(17, '8-core Xeon 3,0 GHz', 2, 1, 2, '3740', '22833'),
(18, '12-core Xeon 2,7 GHz', 2, 1, 2, '9500', '26261'),
(19, '2xFirePro D500', 2, 2, 2, '0', 'Wynik GeekBench'),
(20, '2xFirePro D700', 2, 2, 2, '960', 'Wynik GeekBench'),
(21, '16 GB', 2, 3, 2, '0', 'Wynik GeekBench'),
(22, '32 GB', 2, 3, 2, '1920', 'Wynik GeekBench'),
(23, '64 GB', 2, 3, 2, '5760', 'Wynik GeekBench'),
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
(39, 'Intel UHD630', 2, 2, 4, '0', 'Wynik GeekBench'),
(41, '16 GB', 2, 3, 4, '0', 'Wynik GeekBench'),
(42, '32 GB', 2, 3, 4, '960', 'Wynik GeekBench'),
(43, '64 GB', 2, 3, 4, '6720', 'Wynik GeekBench'),
(44, '256 GB SSD', 2, 4, 4, '0', 'Wynik GeekBench'),
(45, '512 GB SSD', 2, 4, 4, '1920', 'Wynik GeekBench'),
(46, '1 TB SSD', 2, 4, 4, '3840', 'Wynik GeekBench'),
(47, '2 TB SSD', 2, 4, 4, '7680', 'Wynik GeekBench'),
(48, 'Radeon Pro 560 4 GB', 2, 2, 3, '40', 'Wynik GeekBench'),
(53, '8-core i9 3.6 GHz', 0, 1, 6, '0', '35000'),
(54, 'RX 560', 0, 2, 6, '0', 'Wynik GeekBench'),
(55, '32GB', 0, 3, 6, '0', 'Wynik GeekBench'),
(56, 'SSD 500GB', 0, 4, 6, '0', 'Wynik GeekBench'),
(57, '8-core 3.2 GHz', 0, 1, 5, '0', '30527'),
(58, 'Vega 56', 0, 2, 5, '0', 'Wynik GeekBench'),
(59, '32GB', 0, 3, 5, '0', 'Wynik GeekBench'),
(60, '1TB', 0, 4, 5, '0', 'Wynik GeekBench'),
(61, 'Karta muzyczna PCIe', 1, 5, 1, '700', '-'),
(62, 'Kontroler Thunderbolt 3 ', 1, 5, 1, '400', '-'),
(63, 'eGPU RX580', 2, 5, 2, '0', '-'),
(64, 'Dysk HDD 1TB ', 2, 5, 2, '370', '-'),
(65, 'G-drive 4TB', 2, 5, 2, '1700', '-'),
(66, 'Karta Muzyczna', 2, 5, 2, '700', '-'),
(67, 'eGPU RX580', 2, 5, 3, '0', '-'),
(68, 'Dysk HDD 1TB ', 2, 5, 3, '670', '-'),
(69, 'Dysk G-drive 4TB', 2, 5, 3, '1700', '-'),
(70, 'Karta muzyczna', 2, 5, 3, '700', '-'),
(71, 'eGPU RX580', 2, 5, 4, '0', '-'),
(72, 'Dysk HDD 1TB ', 2, 5, 4, '670', '-'),
(73, 'G-drive 4TB', 2, 5, 4, '1700', '-'),
(74, 'Karta muzyczna', 2, 5, 4, '700', '-'),
(75, 'eGPU RX580', 2, 5, 5, '0', '-'),
(76, 'Dysk HDD 1TB ', 2, 5, 5, '370', '-'),
(77, 'Dysk G-drive 4TB', 2, 5, 5, '1700', '-'),
(78, 'Karta muzyczna', 2, 5, 5, '700', '-'),
(79, 'Karta muzyczna PCIe', 1, 5, 6, '700', '-'),
(80, 'Kontroler Thunderbolt 3', 1, 5, 6, '400', '-'),
(81, 'Dysk HDD 4TB', 1, 5, 1, '450', '-'),
(82, 'Dysk HDD 4TB', 1, 5, 6, '450', '-'),
(83, '10-core i9 3.3 GHz', 0, 1, 6, '2200', '39184'),
(84, '12-core i9 2.9 GHz', 0, 1, 6, '2500', '43000'),
(85, 'RX 580', 0, 2, 6, '500', 'Wynik GeekBench'),
(86, 'Vega 56', 0, 2, 6, '1000', 'Wynik GeekBench'),
(87, '64GB', 0, 3, 6, '1600', 'Wynik GeekBench'),
(88, '128GB', 0, 3, 6, '4800', 'Wynik GeekBench'),
(89, 'SSD 1TB', 0, 4, 6, '700', 'Wynik GeekBench'),
(90, 'SSD 2TB', 0, 4, 6, '1600', 'Wynik GeekBench'),
(91, '10-core 3.0 GHz', 0, 1, 5, '3840', '35201'),
(92, 'RX580', 0, 2, 1, '1200', 'Wynik GeekBench'),
(93, '4 TB SSD', 0, 4, 1, '3400', 'Wynik GeekBench'),
(94, 'RX580', 0, 2, 2, '2890', 'Wynik GeekBench'),
(95, 'RX Vega 56', 0, 2, 2, '5890', 'Wynik GeekBench'),
(96, 'RX 580', 0, 2, 3, '2890', 'Wynik GeekBench'),
(97, 'RX Vega 56', 0, 2, 3, '5890', 'Wynik GeekBench'),
(98, 'RX 580', 0, 2, 4, '2890', 'Wynik GeekBench'),
(99, 'RX Vega 56', 0, 2, 4, '4800', 'Wynik GeekBench'),
(100, '14-core i9 3.1 GHz', 0, 1, 6, '2900', '48369'),
(101, '16-core i9 2.8 GHz', 0, 1, 6, '3900', '50000'),
(102, '500 GB SSD M.2', 0, 4, 1, '530', 'Wynik GeekBench'),
(103, '1TB SSD M.2', 0, 4, 1, '1050', 'Wynik GeekBench'),
(104, '2TB SSD M.2', 0, 4, 1, '2200', 'Wynik GeekBench'),
(106, '18-core i9 2.6 GHz', 0, 1, 6, '8000', '51319'),
(108, 'Vega 64', 0, 2, 6, '1500', 'Wynik GeekBench'),
(110, 'GTX 1080TI', 0, 2, 6, '3400', 'Wynik GeekBench'),
(111, 'SSD 4TB', 0, 4, 6, '3400', 'Wynik GeekBench'),
(112, 'SSD 500GB M.2', 0, 4, 6, '530', 'Wynik GeekBench'),
(113, 'SSD 1TB M.2', 0, 4, 6, '1050', 'Wynik GeekBench'),
(114, 'SSD 2TB M.2', 0, 4, 6, '2200', 'Wynik GeekBench'),
(115, '14-core 2.5 GHz', 0, 1, 5, '7680', '40538'),
(116, '18-core 2.3 GHz', 0, 1, 5, '11520', '46712'),
(117, 'Vega 64', 0, 2, 5, '2880', 'Wynik GeekBench'),
(118, '64GB', 0, 3, 5, '3840', 'Wynik GeekBench'),
(119, '128GB', 0, 3, 5, '11520', 'Wynik GeekBench'),
(120, '2TB', 0, 4, 5, '3840', 'Wynik GeekBench'),
(121, '4TB', 0, 4, 5, '13440', 'Wynik GeekBench'),
(123, 'Monitor 4K', 1, 5, 1, '0', '-'),
(124, 'Monitor 5K', 1, 5, 1, '0', '-'),
(125, 'Monitor 4K', 1, 5, 6, '0', '-'),
(126, 'Monitor 5K', 1, 5, 6, '0', '-'),
(127, 'WiFi + Bluetooth', 1, 5, 1, '0', '-'),
(128, 'WiFi + Bluetooth', 1, 5, 6, '0', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
