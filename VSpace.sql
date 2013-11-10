-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2013 a las 07:02:14
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
-- Estructura de tabla para la tabla `gifts`
--

CREATE TABLE IF NOT EXISTS `gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift` varchar(128) NOT NULL,
  `message` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `gifts`
--

INSERT INTO `gifts` (`id`, `gift`, `message`, `user_id`) VALUES
(1, '', 'Lets drink!', 1),
(2, 'beer', 'Lets drink!', 1),
(3, 'like', 'Tglkmg', 1);

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcar la base de datos para la tabla `points`
--

INSERT INTO `points` (`id`, `feeling`, `latitude`, `longitude`, `message`, `user_id`) VALUES
(15, 'happy', 20.3696, -102.769, 'I feel god!', 1),
(16, 'happy', 20.3696, -102.769, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Eros Espinola Gonzalez', 'eros.espinola.gonzalez@gmail.com', ''),
(2, 'Antonio', 'info@creatorsstudio.mx', 'eee7ac208064d408e84ab5e26d24b278'),
(5, 'Antonio', 'info@creatorsstudio.mx', 'eee7ac208064d408e84ab5e26d24b278');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
