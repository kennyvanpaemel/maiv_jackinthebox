-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 10 Jun 2013 om 20:48
-- Serverversie: 5.5.9
-- PHP-Versie: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jackinthebox`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_burgers`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgers`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_burgersingredients`
--

CREATE TABLE `jitb_burgersingredients` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `burger_id` tinyint(4) NOT NULL,
  `ingredient_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgersingredients`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_burgersusers`
--

CREATE TABLE `jitb_burgersusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `burger_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgersusers`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_comments`
--

CREATE TABLE `jitb_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `comment` varchar(160) DEFAULT NULL,
  `burger_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_comments`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_ingredients`
--

CREATE TABLE `jitb_ingredients` (
  `ingredient_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `taste` varchar(255) DEFAULT NULL,
  `vegi` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_ingredients`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_tastes`
--

CREATE TABLE `jitb_tastes` (
  `taste_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`taste_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_tastes`
--

INSERT INTO `jitb_tastes` VALUES(1, 'zoet');
INSERT INTO `jitb_tastes` VALUES(2, 'zuur');
INSERT INTO `jitb_tastes` VALUES(3, 'bitter');
INSERT INTO `jitb_tastes` VALUES(4, 'zout');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_users`
--

CREATE TABLE `jitb_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `burger_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_users`
--

INSERT INTO `jitb_users` VALUES(1, 'kennyvanpaemel', 'Kenny', 'Vanpaemel', 'kenny@kenny.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);
INSERT INTO `jitb_users` VALUES(2, 'bassie', 'Bastiaan', 'Andriessen', 'bastiaan.andriessen@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);
