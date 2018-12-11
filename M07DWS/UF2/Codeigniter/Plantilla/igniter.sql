-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Temps de generació: 19-12-2017 a les 17:13:00
-- Versió del servidor: 5.1.49
-- Versió de PHP : 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `igniter`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ub22kmrecc00fu6q8vakeiip9c9p4qob', '127.0.0.1', 1511809334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313830393234373b656d61696c7c733a31333a227465737440746573742e636f6d223b),
('5v77r2ca6g4155gb645pgm2aoometlu8', '127.0.0.1', 1511809945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313830393634353b656d61696c7c733a31333a227465737440746573742e636f6d223b),
('bk5umantvll1pqv8atdmbov7q45ubl9n', '127.0.0.1', 1511809954, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313830393935343b656d61696c7c733a31333a227465737440746573742e636f6d223b),
('l13t2a09eue890rd2n76ld80t33k38fb', '127.0.0.1', 1511810632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313831303433313b656d61696c7c733a31333a227465737440746573742e636f6d223b),
('7tn6riadot79pk7kuovph9rf6rpl8skm', '127.0.0.1', 1511810983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313831303738323b656d61696c7c733a31333a227465737440746573742e636f6d223b),
('fo9g70lhrslpuj9jr9kdv7u5j9qnmmp8', '127.0.0.1', 1511811933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313831313731313b656d61696c7c733a31333a227465737440746573742e636f6d223b),
('tdi6bedhstdrojgimr8el8osrs4bbrp8', '127.0.0.1', 1511812634, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313831323335343b656d61696c7c733a31333a227465737440746573742e636f6d223b);

-- --------------------------------------------------------

--
-- Estructura de la taula `comarques`
--

CREATE TABLE IF NOT EXISTS `comarques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Bolcant dades de la taula `comarques`
--

INSERT INTO `comarques` (`id`, `nom`) VALUES
(1, 'anoia'),
(2, 'bages'),
(3, 'bergueda'),
(4, 'solsones'),
(5, 'osona'),
(6, 'moianes');

-- --------------------------------------------------------

--
-- Estructura de la taula `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idUser` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Bolcant dades de la taula `item`
--

INSERT INTO `item` (`id`, `nom`, `descripcion`, `idUser`) VALUES
(6, 'marc', 'desc marc', 'test@test.com'),
(7, 'Isi', 'doro', 'test@test.com'),
(9, 'jana', 'montana', 'test@test.com');

-- --------------------------------------------------------

--
-- Estructura de la taula `municipis`
--

CREATE TABLE IF NOT EXISTS `municipis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `comarca` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Bolcant dades de la taula `municipis`
--

INSERT INTO `municipis` (`id`, `nom`, `comarca`) VALUES
(1, 'piera', 'anoia'),
(2, 'igualada', 'anoia'),
(3, 'odena', 'anoia'),
(4, 'hostalets', 'anoia'),
(5, 'st.sadurni', 'anoia'),
(6, 'masquefa', 'anoia'),
(7, 'vilanova del cami', 'anoia'),
(8, 'calaf', 'anoia'),
(9, 'manresa', 'bages'),
(10, 'sallent', 'bages'),
(11, 'navarcles', 'bages'),
(12, 'suria', 'bages'),
(13, 'navas', 'bages'),
(14, 'balsareny', 'bages'),
(15, 'cardona', 'bages'),
(16, 'solsona', 'solsones'),
(17, 'berga', 'bergueda'),
(18, 'gironella', 'bergueda'),
(19, 'puigreig', 'bergueda'),
(20, 'avia', 'bergueda'),
(21, 'borreda', 'bergueda'),
(22, 'gosol', 'bergueda'),
(23, 'manlleu', 'osona'),
(24, 'seva', 'osona'),
(25, 'vic', 'osona'),
(26, 'torello', 'osona'),
(27, 'moia', 'moianes'),
(28, 'calders', 'moianes'),
(29, 'castellserol', 'moianes'),
(30, 'sta.maria olo', 'moianes');

-- --------------------------------------------------------

--
-- Estructura de la taula `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `user`
--

INSERT INTO `user` (`email`, `password`) VALUES
('test@test.com', 'test');
