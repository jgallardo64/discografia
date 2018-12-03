-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 15:54:22
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `discografia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `codigo` int(7) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `interprete` varchar(50) NOT NULL,
  `discografica` varchar(50) NOT NULL,
  `formato` enum('vinilo','cd','dvd','mp3') NOT NULL,
  `fechaLanzamiento` date NOT NULL,
  `fechaCompra` date NOT NULL,
  `precio` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`codigo`, `titulo`, `interprete`, `discografica`, `formato`, `fechaLanzamiento`, `fechaCompra`, `precio`) VALUES
(1, 'The Fame', 'Lady Gaga', 'Interscope Records', 'cd', '2008-08-19', '2008-08-19', 25.00),
(2, 'Backstreet\'s Back', 'Backstreet Boys', 'EMI', 'cd', '1997-08-11', '1997-08-11', 12.00),
(3, 'Smoke + Mirrors', 'Imagine Dragons', 'Interscope', 'cd', '2015-02-17', '2015-02-17', 14.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `titulo` varchar(100) NOT NULL,
  `album` int(7) NOT NULL,
  `posicion` int(2) NOT NULL,
  `duracion` time NOT NULL,
  `genero` enum('acustico','BSO','blues','folk','jazz','new age','pop','rock','electronica') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`titulo`, `album`, `posicion`, `duracion`, `genero`) VALUES
('10,000 Promises', 2, 5, '00:04:00', 'pop'),
('Again Again', 1, 9, '00:03:05', 'pop'),
('All I Have To Give', 2, 3, '00:04:37', 'pop'),
('As Long As You Love Me', 2, 2, '00:03:40', 'pop'),
('Beautiful, Dirty, Rich', 1, 4, '00:03:05', 'pop'),
('Boys Boys Boys', 1, 10, '00:03:20', 'pop'),
('Brown Eyes', 1, 11, '00:04:05', 'pop'),
('Dream', 3, 9, '00:04:18', 'rock'),
('Eh, Eh (Nothing Else I Can Say)', 1, 5, '00:03:20', 'pop'),
('Everybody (Backstreet\'s Back)', 2, 1, '00:03:44', 'pop'),
('Friction', 3, 7, '00:03:21', 'rock'),
('Gold', 3, 2, '00:03:36', 'rock'),
('Hey, Mr. D.J. (Keep Playin\' This Song)', 2, 7, '00:04:25', 'pop'),
('Hopeless Opus', 3, 12, '00:04:01', 'rock'),
('I Bet My Life', 3, 5, '00:03:14', 'rock'),
('I Like It Rough', 1, 12, '00:03:23', 'pop'),
('I\'m So Sorry', 3, 4, '00:03:50', 'rock'),
('If I Don\'t Have You', 2, 11, '00:04:35', 'pop'),
('If You Want It to Be Good Girl (Get Yourself a Bad Boy)', 2, 10, '00:04:47', 'pop'),
('It Comes Back to You', 3, 8, '00:03:37', 'rock'),
('Just Dance', 1, 1, '00:04:00', 'pop'),
('Like a Child', 2, 6, '00:05:05', 'pop'),
('LoveGame', 1, 2, '00:03:35', 'pop'),
('Money Honey', 1, 8, '00:03:10', 'pop'),
('Paparazzi', 1, 3, '00:03:30', 'pop'),
('Poker Face', 1, 6, '00:03:35', 'pop'),
('Polaroid', 3, 6, '00:03:51', 'rock'),
('Set Adrift on Memory Bliss', 2, 8, '00:03:40', 'pop'),
('Shots', 3, 1, '00:03:52', 'rock'),
('Smoke and Mirrors', 3, 3, '00:04:20', 'rock'),
('Summer', 3, 11, '00:03:38', 'rock'),
('That\'s the Way I Like It', 2, 4, '00:03:40', 'pop'),
('That\'s What She Said', 2, 9, '00:04:05', 'pop'),
('The Fall', 3, 13, '00:06:05', 'rock'),
('The Fame', 1, 7, '00:03:30', 'pop'),
('Trouble', 3, 10, '00:03:12', 'rock');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`titulo`,`album`),
  ADD KEY `album` (`album`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`album`) REFERENCES `album` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
