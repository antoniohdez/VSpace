-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2013 at 07:03 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE IF NOT EXISTS `gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift` varchar(128) NOT NULL,
  `message` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `gift`, `message`, `user_id`, `point_id`) VALUES
(13, 'beer', 'Chela!', 4, 42),
(14, 'like', 'chido tu coto', 4, 42),
(15, 'love', 'h', 4, 42),
(16, 'hug', 'de', 4, 42),
(17, 'beer', 'lol', 4, 42);

--
-- Triggers `gifts`
--
DROP TRIGGER IF EXISTS `increasePoints`;
DELIMITER //
CREATE TRIGGER `increasePoints` BEFORE INSERT ON `gifts`
 FOR EACH ROW UPDATE users 
    SET users.points = users.points + 1
    WHERE new.user_id = users.user_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `points`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `feeling`, `latitude`, `longitude`, `message`, `user_id`) VALUES
(42, 'happy', 20.3696, -102.769, 'happy', 4);

--
-- Triggers `points`
--
DROP TRIGGER IF EXISTS `increasePoint`;
DELIMITER //
CREATE TRIGGER `increasePoint` BEFORE INSERT ON `points`
 FOR EACH ROW UPDATE users 
    SET users.points = users.points + 1
    WHERE new.user_id = users.user_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `points`) VALUES
(4, 'Eros EspÃ­nola', 'eros.espinola.gonzalez@gmail.com', '37f62f1363b04df4370753037853fe88', 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
