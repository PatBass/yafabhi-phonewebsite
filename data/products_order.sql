-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 24 Septembre 2014 à 13:33
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
-- Structure de la table `products_order`
--

CREATE TABLE IF NOT EXISTS `products_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(40) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` char(60) NOT NULL,
  `shipping_address` text NOT NULL,
  `registration_number` varchar(30) NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `products_order`
--

INSERT INTO `products_order` (`id`, `company_name`, `address`, `country`, `tel`, `fax`, `note`, `contact_name`, `email`, `pwd`, `shipping_address`, `registration_number`, `dateAdded`) VALUES
(46, 'my company name', 'my address', 'my shipping address', 'my note', 'my country', 'my tel', 'my fax', 'my email', '', 'my contact name', 'my registration number', '0000-00-00 00:00:00'),
(47, 'my company name', 'my full address', 'AU', '0123456789', '1234567890', '', 'my contact name', 'ab@ac.net', '', '', '', '2014-08-25 17:15:05'),
(48, 'my company name', 'my full address', 'AU', '0123456789', '1234567890', '', 'my contact name', 'ab@ac.net', '', '', '', '2014-08-25 17:16:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
