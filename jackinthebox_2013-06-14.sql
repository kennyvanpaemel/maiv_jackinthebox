-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 14 Jun 2013 om 21:37
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `taste` varchar(255) DEFAULT NULL,
  `vegi` int(11) DEFAULT NULL,
  `rating` bigint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `taste` varchar(255) DEFAULT NULL,
  `vegi` tinyint(1) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_ingredients`
--

INSERT INTO `jitb_ingredients` VALUES(1, 'Honey bbq sauce', 'sweet', 0, 'honeybbqsauce');
INSERT INTO `jitb_ingredients` VALUES(2, 'Pineapple', 'sweet', 1, 'pineapple');
INSERT INTO `jitb_ingredients` VALUES(5, 'Lettuce', 'neutral', 1, 'lettuce');
INSERT INTO `jitb_ingredients` VALUES(6, 'Pickle', 'sour', 1, 'pickle');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_users`
--

CREATE TABLE `jitb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `burger_id` int(11) NOT NULL DEFAULT '0',
  `burger_final_save` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_users`
--

INSERT INTO `jitb_users` VALUES(1, 'bassie', 'bastiaan', 'andriessen', 'bastiaan.andriessen@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(20, 'bastiaan', 'Qsdf', 'Qsdf', 'bastiaan@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(21, 'blub', 'Bqsdf', 'Qsdf', 'qsdf@qsdf.sdf.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(22, 'kenny', 'Kenny', 'Blub', 'kenny@kenny.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(23, 'derp', 'Test', 'Tester', 'bastiaan.d@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(24, 'bqsdf', 'Bqsdf', 'Qsdf', 'bfdqs@herpes.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
