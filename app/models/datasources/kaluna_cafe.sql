-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2015 at 04:40 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaluna_cafe`
--
CREATE DATABASE IF NOT EXISTS `kaluna_cafe` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kaluna_cafe`;

-- --------------------------------------------------------

--
-- Table structure for table `komanda`
--

CREATE TABLE IF NOT EXISTS `komanda` (
  `komanda_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` double NOT NULL,
  `mesa` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komanda`
--

INSERT INTO `komanda` (`komanda_id`, `menu_id`, `observaciones`, `cantidad`, `precio`, `mesa`, `fecha`) VALUES
(8, 1, '', 1, 20, 5, '2015-11-12'),
(9, 1, '', 1, 20, 5, '2015-11-12'),
(10, 1, '', 1, 20, 5, '2015-11-12'),
(11, 1, '', 1, 20, 5, '2015-11-12'),
(12, 1, '', 1, 20, 5, '2015-11-12'),
(13, 1, '', 1, 20, 7, '2015-11-12'),
(14, 1, '', 1, 20, 7, '2015-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL,
  `nombre_producto` text NOT NULL,
  `precio_producto` text NOT NULL,
  `status_producto` tinyint(1) NOT NULL DEFAULT '1',
  `icono_png` varchar(15) NOT NULL,
  `horario_ini` time NOT NULL,
  `horario_fin` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `nombre_producto`, `precio_producto`, `status_producto`, `icono_png`, `horario_ini`, `horario_fin`) VALUES
(1, 'Cerveza', '20', 1, 'beer.png', '10:00:00', '22:00:00'),
(2, 'Huevos al Gusto', '35', 1, 'eggs.png', '10:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `clear_password` varchar(20) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` tinytext NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `turno` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `clear_password`, `first_name`, `last_name`, `email`, `id_area`, `id_estado`, `turno`) VALUES
(1, 'chuy', '047723b2561c4c09ec3eb7aec1dbf01871a79a76', '123456', 'HÃ©ctor', 'LÃ³pez', 'chuy@kaluna.com', 0, 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komanda`
--
ALTER TABLE `komanda`
  ADD PRIMARY KEY (`komanda_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komanda`
--
ALTER TABLE `komanda`
  MODIFY `komanda_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
