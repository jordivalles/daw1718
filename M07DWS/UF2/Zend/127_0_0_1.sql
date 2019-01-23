-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 23-01-2019 a les 18:59:53
-- Versió del servidor: 5.7.17
-- Versió de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `departaments`
--
CREATE DATABASE IF NOT EXISTS `departaments` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `departaments`;

-- --------------------------------------------------------

--
-- Estructura de la taula `departament`
--

CREATE TABLE `departament` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `departament`
--

INSERT INTO `departament` (`id`, `nom`) VALUES
(1, 'Informatica'),
(2, 'Ventes'),
(3, 'Compres'),
(-1, 'altres');

-- --------------------------------------------------------

--
-- Estructura de la taula `empleats`
--

CREATE TABLE `empleats` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dpt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `empleats`
--

INSERT INTO `empleats` (`id`, `nom`, `dpt`) VALUES
(1, 'Pedro', 1),
(2, 'Kevin', 1),
(3, 'Kevin', 1),
(4, 'uh', 2),
(8, 'weeew', -1),
(7, 'Prova', -1),
(9, 'sdas', -1),
(10, 'qwqwqw', -1),
(11, 'qwqwqw', -1);

-- --------------------------------------------------------

--
-- Estructura de la taula `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `recurs` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `permisos`
--

INSERT INTO `permisos` (`id`, `recurs`, `rol`) VALUES
(1, 'Departament', 'administrador'),
(2, 'Empleats', 'usuari');

-- --------------------------------------------------------

--
-- Estructura de la taula `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `recurs` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `recursos`
--

INSERT INTO `recursos` (`id`, `recurs`) VALUES
(1, 'Departament'),
(2, 'Empleats');

-- --------------------------------------------------------

--
-- Estructura de la taula `rols`
--

CREATE TABLE `rols` (
  `id` int(11) NOT NULL,
  `rolid` varchar(50) NOT NULL,
  `parentrol` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `rols`
--

INSERT INTO `rols` (`id`, `rolid`, `parentrol`) VALUES
(1, 'usuari', NULL),
(3, 'administrador', 'usuari');

-- --------------------------------------------------------

--
-- Estructura de la taula `tasques`
--

CREATE TABLE `tasques` (
  `id` int(11) NOT NULL,
  `descripcio` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `usuaris`
--

INSERT INTO `usuaris` (`id`, `user`, `password`, `rol`) VALUES
(1, 'pedro', 'pedro', 'usuari'),
(2, 'admin', 'admin', 'administrador');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `empleats`
--
ALTER TABLE `empleats`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `tasques`
--
ALTER TABLE `tasques`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la taula `empleats`
--
ALTER TABLE `empleats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la taula `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la taula `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la taula `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la taula `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
