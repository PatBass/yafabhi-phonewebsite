-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 24 Septembre 2014 à 13:29
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `yafabhi2`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `dateAjout` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `last_name`, `first_name`, `email`, `message`, `dateAjout`) VALUES
(1, 'uyggihsjg', 'vbkhljl', 'hjjhk@fghhj.co', 'hishfjk', '2013-08-23 14:56:50'),
(2, 'uyggihsjg', 'vbkhljl', 'hjjhk@fghhj.co', 'hishfjk', '2013-08-23 15:01:16'),
(3, 'gfhgfjj', 'HH', 'FJGJHJ@FG.CV', 'DFGNJ', '2013-08-25 14:42:57'),
(4, 'last name', 'first name', 'mail1@domain.net', 'a message', '2014-09-17 11:54:05'),
(5, 'last name', 'first name', 'mail1@domain.net', 'a message', '2014-09-17 11:57:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
