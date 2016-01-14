-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2016 at 07:09 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

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
-- Table structure for table `egresos`
--

CREATE TABLE `egresos` (
  `egreso_id` int(11) NOT NULL,
  `folio` varchar(50) NOT NULL,
  `concepto` text,
  `cantidad` int(11) DEFAULT NULL,
  `importe` double DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingresos`
--

CREATE TABLE `ingresos` (
  `ingreso_id` int(11) NOT NULL,
  `folio` text NOT NULL,
  `concepto` text,
  `cantidad` double DEFAULT NULL,
  `importe` double DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `komanda`
--

CREATE TABLE `komanda` (
  `komanda_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` double NOT NULL,
  `mesa` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komanda`
--

INSERT INTO `komanda` (`komanda_id`, `menu_id`, `observaciones`, `cantidad`, `precio`, `mesa`, `fecha`) VALUES
(1, 1, '', 1, 20, 7, '2015-11-12'),
(2, 1, '', 1, 20, 7, '2015-11-12'),
(3, 1, '', 1, 20, 7, '2015-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `nombre_producto` text NOT NULL,
  `precio_producto` text NOT NULL,
  `status_producto` tinyint(1) NOT NULL DEFAULT '1',
  `icono_png` varchar(15) NOT NULL,
  `horario_ini` time NOT NULL,
  `horario_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `nombre_producto`, `precio_producto`, `status_producto`, `icono_png`, `horario_ini`, `horario_fin`) VALUES
(1, 'cafe', '15', 1, '', '00:00:00', '00:00:00'),
(2, 'molletes', '50', 1, '', '00:00:00', '00:00:00'),
(3, 'huevos mexicana', '59', 1, '', '00:00:00', '00:00:00'),
(4, 'omelett cabra', '69', 1, '', '00:00:00', '00:00:00'),
(5, 'te ', '10', 1, '', '00:00:00', '00:00:00'),
(6, 'omelette cabra', '69', 1, '', '00:00:00', '00:00:00'),
(7, 'omelette queso organico', '65', 1, '', '00:00:00', '00:00:00'),
(8, 'motuleños', '69', 1, '', '00:00:00', '00:00:00'),
(9, 'a la mexicana', '59', 1, '', '00:00:00', '00:00:00'),
(10, 'rancheros', '59', 1, '', '00:00:00', '00:00:00'),
(11, 'albañil', '58', 1, '', '00:00:00', '00:00:00'),
(12, 'tirados', '50', 1, '', '00:00:00', '00:00:00'),
(13, 'pan frances', '49', 1, '', '00:00:00', '00:00:00'),
(14, 'chilaquiles', '62', 1, '', '00:00:00', '00:00:00'),
(15, 'chilaquiles pollo', '68', 1, '', '00:00:00', '00:00:00'),
(16, 'chilaquiles huevo', '63', 1, '', '00:00:00', '00:00:00'),
(17, 'chilaquiles arrachera', '75', 1, '', '00:00:00', '00:00:00'),
(18, 'enchiladas suizas', '65', 1, '', '00:00:00', '00:00:00'),
(19, 'enfrijoladas', '63', 1, '', '00:00:00', '00:00:00'),
(20, 'torta ahogada vegetariana', '54', 1, '', '00:00:00', '00:00:00'),
(21, 'molletes', '50', 1, '', '00:00:00', '00:00:00'),
(22, 'molletes jamon o champi', '55', 1, '', '00:00:00', '00:00:00'),
(23, 'quesadillas', '45', 1, '', '00:00:00', '00:00:00'),
(24, 'sincronizada', '45', 1, '', '00:00:00', '00:00:00'),
(25, 'enchiladas queretanas', '60', 1, '', '00:00:00', '00:00:00'),
(26, 'enmoladas', '65', 1, '', '00:00:00', '00:00:00'),
(27, 'onden extra pollo', '15', 1, '', '00:00:00', '00:00:00'),
(28, 'onden extra huevo', '5', 1, '', '00:00:00', '00:00:00'),
(29, 'onden extra frijoles', '10', 1, '', '00:00:00', '00:00:00'),
(30, 'ensalada kaluna', '75', 1, '', '00:00:00', '00:00:00'),
(31, 'ensalada de la mancha', '70', 1, '', '00:00:00', '00:00:00'),
(32, 'ensalada primavera', '70', 1, '', '00:00:00', '00:00:00'),
(33, 'ensalada cesar', '79', 1, '', '00:00:00', '00:00:00'),
(34, 'hamburguesa pollo o res', '80', 1, '', '00:00:00', '00:00:00'),
(35, 'pizza vegetariana', '58', 1, '', '00:00:00', '00:00:00'),
(36, 'pizza atun', '58', 1, '', '00:00:00', '00:00:00'),
(37, 'pizza hawai', '58', 1, '', '00:00:00', '00:00:00'),
(38, 'pizza mexicana', '68', 1, '', '00:00:00', '00:00:00'),
(39, 'pizza italiana', '68', 1, '', '00:00:00', '00:00:00'),
(40, 'pizza 4 quesos', '68', 1, '', '00:00:00', '00:00:00'),
(41, 'chapata kaluna', '65', 1, '', '00:00:00', '00:00:00'),
(42, 'chapata atun', '65', 1, '', '00:00:00', '00:00:00'),
(43, 'chapata pechuga de pavo', '65', 1, '', '00:00:00', '00:00:00'),
(44, 'chapata capresse', '65', 1, '', '00:00:00', '00:00:00'),
(45, 'chapata del campo', '65', 1, '', '00:00:00', '00:00:00'),
(46, 'chapata mexicana', '79', 1, '', '00:00:00', '00:00:00'),
(47, 'chapata roast beef', '79', 1, '', '00:00:00', '00:00:00'),
(48, 'chapata de la granja', '79', 1, '', '00:00:00', '00:00:00'),
(49, 'lasaña a la boloñesa', '89', 1, '', '00:00:00', '00:00:00'),
(50, 'espaguetti', '79', 1, '', '00:00:00', '00:00:00'),
(51, 'ñoquis', '88', 1, '', '00:00:00', '00:00:00'),
(52, 'americano', '20', 1, '', '00:00:00', '00:00:00'),
(53, 'express', '25', 1, '', '00:00:00', '00:00:00'),
(54, 'express doble', '30', 1, '', '00:00:00', '00:00:00'),
(55, 'europeo', '25', 1, '', '00:00:00', '00:00:00'),
(56, 'capuchino', '35', 1, '', '00:00:00', '00:00:00'),
(57, 'capuchino con sabor', '39', 1, '', '00:00:00', '00:00:00'),
(58, 'creme con cardamomo', '39', 1, '', '00:00:00', '00:00:00'),
(59, 'affogato', '39', 1, '', '00:00:00', '00:00:00'),
(60, 'lechero', '39', 1, '', '00:00:00', '00:00:00'),
(61, 'chocolate gourmet', '39', 1, '', '00:00:00', '00:00:00'),
(62, 'te chai', '40', 1, '', '00:00:00', '00:00:00'),
(63, 'tisanas', '38', 1, '', '00:00:00', '00:00:00'),
(64, 'malteadas', '40', 1, '', '00:00:00', '00:00:00'),
(65, 'esquimos', '38', 1, '', '00:00:00', '00:00:00'),
(66, 'nevados', '38', 1, '', '00:00:00', '00:00:00'),
(67, 'soda italiana', '25', 1, '', '00:00:00', '00:00:00'),
(68, 'limonada o naranjada', '25', 1, '', '00:00:00', '00:00:00'),
(69, 'chocolate frio', '30', 1, '', '00:00:00', '00:00:00'),
(70, 'frapuchino', '40', 1, '', '00:00:00', '00:00:00'),
(71, 'frapuchino sabor', '42', 1, '', '00:00:00', '00:00:00'),
(72, 'frapuoreo', '44', 1, '', '00:00:00', '00:00:00'),
(73, 'licuados', '40', 1, '', '00:00:00', '00:00:00'),
(74, 'brownie con vainilla', '35', 1, '', '00:00:00', '00:00:00'),
(75, 'pay de queso', '32', 1, '', '00:00:00', '00:00:00'),
(76, 'tarta de manza ', '45', 1, '', '00:00:00', '00:00:00'),
(77, 'pastel de chocolate aleman', '45', 1, '', '00:00:00', '00:00:00'),
(78, 'creme brule', '45', 1, '', '00:00:00', '00:00:00'),
(79, 'banana split', '49', 1, '', '00:00:00', '00:00:00'),
(80, 'crepas dulces', '55', 1, '', '00:00:00', '00:00:00'),
(81, 'crepas pavo o champiñones', '70', 1, '', '00:00:00', '00:00:00'),
(82, 'crepas boloñesa o 4 quesos', '89', 1, '', '00:00:00', '00:00:00'),
(83, 'cerveza vic pac leon corona', '32', 1, '', '00:00:00', '00:00:00'),
(84, 'cerveza negra modelo y especial', '35', 1, '', '00:00:00', '00:00:00'),
(85, 'chelada', '42', 1, '', '00:00:00', '00:00:00'),
(86, 'michelada', '45', 1, '', '00:00:00', '00:00:00'),
(87, 'michelada sabor', '48', 1, '', '00:00:00', '00:00:00'),
(88, 'clamatada', '49', 1, '', '00:00:00', '00:00:00'),
(89, 'ponche aleman', '55', 1, '', '00:00:00', '00:00:00'),
(90, 'cerveza artesanal', '65', 1, '', '00:00:00', '00:00:00'),
(91, 'papas alioli', '29', 1, '', '00:00:00', '00:00:00'),
(92, 'focaccia', '35', 1, '', '00:00:00', '00:00:00'),
(93, 'brushetas', '37', 1, '', '00:00:00', '00:00:00'),
(94, 'plato de queso y carnes frias', '40', 1, '', '00:00:00', '00:00:00'),
(95, 'totopos', '25', 1, '', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `clear_password` varchar(20) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` tinytext NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `turno` varchar(1) NOT NULL,
  `full_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `clear_password`, `first_name`, `last_name`, `email`, `id_area`, `id_estado`, `turno`, `full_name`) VALUES
(2, 'chuy', '3b9ec5ec31211b291c331bf48093bb4aa7e952b0', '123456', 'Héctor', 'López', 'chuy_2@hotmail.com', 0, 0, '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`egreso_id`);

--
-- Indexes for table `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`ingreso_id`);

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
-- AUTO_INCREMENT for table `egresos`
--
ALTER TABLE `egresos`
  MODIFY `egreso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `ingreso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `komanda`
--
ALTER TABLE `komanda`
  MODIFY `komanda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
