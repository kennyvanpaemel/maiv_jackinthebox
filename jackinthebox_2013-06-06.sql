# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: jackinthebox
# Generation Time: 2013-06-06 13:02:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table jitb_burgers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jitb_burgers`;

CREATE TABLE `jitb_burgers` (
  `burger_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `taste` varchar(255) DEFAULT NULL,
  `vegi` int(11) DEFAULT NULL,
  `rating` bigint(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `ingredients` mediumtext,
  `usergroup_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`burger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table jitb_burgersusers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jitb_burgersusers`;

CREATE TABLE `jitb_burgersusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `burger_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table jitb_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jitb_comments`;

CREATE TABLE `jitb_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `comment` varchar(160) DEFAULT NULL,
  `burger_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table jitb_ingredients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jitb_ingredients`;

CREATE TABLE `jitb_ingredients` (
  `ingredient_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `taste` varchar(255) DEFAULT NULL,
  `vegi` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table jitb_tastes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jitb_tastes`;

CREATE TABLE `jitb_tastes` (
  `taste_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`taste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jitb_tastes` WRITE;
/*!40000 ALTER TABLE `jitb_tastes` DISABLE KEYS */;

INSERT INTO `jitb_tastes` (`taste_id`, `name`)
VALUES
	(1,'zoet'),
	(2,'zuur'),
	(3,'bitter'),
	(4,'zout');

/*!40000 ALTER TABLE `jitb_tastes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jitb_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jitb_users`;

CREATE TABLE `jitb_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `burger_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jitb_users` WRITE;
/*!40000 ALTER TABLE `jitb_users` DISABLE KEYS */;

INSERT INTO `jitb_users` (`user_id`, `username`, `name`, `lastname`, `email`, `password`, `burger_id`)
VALUES
	(1,'kennyvanpaemel','kenny','vanpaemel','kenny@kenny.com','test',1);

/*!40000 ALTER TABLE `jitb_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
