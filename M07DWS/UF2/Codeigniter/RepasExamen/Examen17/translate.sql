-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 20:18:03
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `translate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` varchar(8) NOT NULL,
  `category` varchar(16) DEFAULT NULL,
  `text` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `category`, `text`) VALUES
('A0', NULL, 'One'),
('A1', NULL, 'Two'),
('A2', NULL, 'Three'),
('A3', NULL, 'Four'),
('A4', NULL, 'Five'),
('A5', NULL, 'a'),
('A6', NULL, 'b'),
('A7', NULL, 'c'),
('A8', NULL, 'd'),
('A9', NULL, 'e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` varchar(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lang`
--

INSERT INTO `lang` (`id`, `name`) VALUES
('ca', 'CA'),
('es', 'ES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trans`
--

CREATE TABLE IF NOT EXISTS `trans` (
  `item` varchar(8) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `text` varchar(128) NOT NULL,
  PRIMARY KEY (`item`,`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trans`
--

INSERT INTO `trans` (`item`, `lang`, `text`) VALUES
('A0', 'ca', 'Un');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id` varchar(32) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
