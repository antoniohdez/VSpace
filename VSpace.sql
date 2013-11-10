-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2013 a las 02:04:40
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `VSpace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feeling` varchar(20) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `message` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `points`
--

INSERT INTO `points` (`id`, `feeling`, `latitude`, `longitude`, `message`) VALUES
(1, 'happy', 30, 132, NULL),
(2, 'happy', 21, -103, NULL),
(3, 'happy', 20.7347, -103.457, NULL),
(4, 'happy', 20.7347, -103.457, NULL),
(5, 'happy', 20.7347, -103.457, NULL),
(6, 'happy', 20.7348, -103.457, NULL),
(7, 'happy', 20.5639, -103.154, NULL),
(8, 'tired', 21.0443, -104.369, NULL),
(9, 'happy', 20.7347, -103.457, NULL),
(10, 'tired', 20.7347, -103.457, NULL),
(11, 'bored', 20.7347, -103.457, NULL),
(12, 'sad', 20.7564, -103.442, 'dfdcgdg');
