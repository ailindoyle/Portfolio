# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.39)
# Database: doyle_portfolio
# Generation Time: 2018-03-23 13:39:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table about
# ------------------------------------------------------------

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photoSource` varchar(255) DEFAULT NULL,
  `photoAlt` varchar(255) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(2000) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table home
# ------------------------------------------------------------

DROP TABLE IF EXISTS `home`;

CREATE TABLE `home` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `headerTop` varchar(255) DEFAULT NULL,
  `headerBottom` varchar(255) DEFAULT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `projectDescription` varchar(1000) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `imageSource` varchar(255) DEFAULT NULL,
  `alternativeText` varchar(255) DEFAULT NULL,
  `featured` tinyint(11) DEFAULT '0',
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skills`;

CREATE TABLE `skills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `skillName` varchar(255) DEFAULT NULL,
  `imageSource` varchar(255) DEFAULT NULL,
  `alternative` varchar(255) DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
