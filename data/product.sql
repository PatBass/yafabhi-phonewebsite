-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 24 Septembre 2014 à 13:30
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
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `price` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(40) NOT NULL,
  `image` varchar(128) NOT NULL DEFAULT '',
  `dateAdded` datetime NOT NULL,
  `dateUpdated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `description`, `category`, `image`, `dateAdded`, `dateUpdated`) VALUES
(4, 'Smartphone BK5 Gold', '2.99', 'Chipset: MTK6592 2.0 GHZ Octa Core CPU\r\nSim Card: Dual sim cards, Dual Standby\r\nOS: Android v4.2.2\r\nNetworks: 3G, GPS + AGPS, Wi-Fi, etc\r\nScreen: 5.0” IPS HD with OGS Screen\r\nResolution: 1280*720 pixels\r\nFront Camera: 5.0 M Pixel\r\nRear Camera: 1280*720 pixels\r\nInternal Memory: 2 GB RAM + 16 GB storage\r\nExternal Memory: Micro SD card (T-FLASH card), max 32 GB\r\nTalk Time: 3-5.5 Hours\r\nStandby Time: 180 Hours', 'smartphones', './images_uploads/4.png', '2014-07-03 22:11:36', '2014-09-12 16:40:25'),
(9, 'Smartphone BK3', '103', 'Chipset: MTK6582 1.3 GHZ Quad-Core\r\nSim Card: Dual sim cards, Dual standby\r\nOS: Android v4.2.2\r\nNetworks: 3G, GPS, Wi-Fi, etc\r\nScreen: 5.0” HD\r\nResolution: 1280*720 pixels (294PPI)\r\nFront Camera: 5.0 M Pixel\r\nRear Camera: 13.0 M Pixels with AF\r\nInternal Memory: 16 GB ROM + 1 GB RAM\r\nExternal Memory: Micro SD card (T-FLASH card), max 32 GB\r\nTalk Time: 120-150 (Unit: Mins)\r\nStandby Time: 120-180 hours\r\nHand-writing: Support', 'smartphones', './images_uploads/9.png', '2014-07-07 15:57:14', '2014-07-09 18:11:34'),
(10, 'Smartphone BK5 Blue', '102', 'Chipset: MTK6592 2.0 GHZ Octa Core CPU\r\nSim Card: Dual sim cards, Dual Standby\r\nOS: Android v4.2.2\r\nNetworks: 3G, GPS + AGPS, Wi-Fi, etc\r\nScreen: 5.0” IPS HD with OGS Screen\r\nResolution: 1280*720 pixels\r\nFront Camera: 5.0 M Pixel\r\nRear Camera: 1280*720 pixels\r\nInternal Memory: 2 GB RAM + 16 GB storage\r\nExternal Memory: Micro SD card (T-FLASH card), max 32 GB\r\nTalk Time: 3-5.5 Hours\r\nStandby Time: 180 Hours', 'smartphones', './images_uploads/10.png', '2014-07-08 19:46:34', '2014-07-09 18:10:30'),
(11, 'Phone BK110', '101', 'Single or Dual-SIM: Optional\r\nBattery: up to 7.5 hours, 10 days in stand-by mode\r\nMemory: support up to 8 GB\r\nCamera\r\nBuild in FM-Radio\r\nBluetooth\r\nSMS', 'phones', './images_uploads/11.png', '2014-07-08 20:04:11', '2014-07-09 18:09:21'),
(12, 'Smartphone BK26', '108', 'Chipset: MTK6582 1.3 GHZ Quad-Core\r\nSim Card: Dual sim cards, Dual standby\r\nOS: Android v4.2.2\r\nNetworks: 3G, GPS, Wi-Fi, etc\r\nScreen: 5.0” HD\r\nResolution: 1280*720 pixels (294PPI)\r\nFront Camera: 5.0 M Pixel\r\nRear Camera: 13.0 M Pixels with AF\r\nInternal Memory: 16 GB ROM + 1 GB RAM\r\nExternal Memory: Micro SD card (T-FLASH card), max 32 GB\r\nTalk Time: 120-150 (Unit: Mins)\r\nStandby Time: 120-180 hours\r\nHand-writing: Support', 'smartphones', './images_uploads/12.png', '2014-07-08 20:07:18', '2014-07-11 21:01:35'),
(13, 'Phone YF02Z', '4.95', 'Single or Dual-SIM: Optional\r\nBattery: up to 7.5 hours, 10 days in stand-by mode\r\nMemory: support up to 8 GB\r\nCamera\r\nBuild in FM-Radio\r\nBluetooth\r\nSMS\r\n', 'phones', 'images_uploads/13.png', '2014-08-31 19:52:55', '2014-08-31 19:52:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
