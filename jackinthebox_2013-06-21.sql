-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 21 Jun 2013 om 14:11
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
  `name` varchar(255) NOT NULL,
  `taste` varchar(255) DEFAULT NULL,
  `vegi` int(11) DEFAULT NULL,
  `rating` bigint(11) NOT NULL DEFAULT '0',
  `added_ingredients_ids` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgers`
--

INSERT INTO `jitb_burgers` VALUES(80, '', 'bitter', 0, 0, '21');
INSERT INTO `jitb_burgers` VALUES(81, '', 'sweet', 0, 0, '23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_burgersingredients`
--

CREATE TABLE `jitb_burgersingredients` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `burger_id` tinyint(4) NOT NULL,
  `ingredient_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgersingredients`
--

INSERT INTO `jitb_burgersingredients` VALUES(84, 80, 21);
INSERT INTO `jitb_burgersingredients` VALUES(85, 81, 23);
INSERT INTO `jitb_burgersingredients` VALUES(86, 80, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_ingredients`
--

INSERT INTO `jitb_ingredients` VALUES(1, 'Honey bbq sauce', 'sweet', 1, 'honeybbqsauce');
INSERT INTO `jitb_ingredients` VALUES(2, 'Pineapple', 'sweet', 1, 'pineapple');
INSERT INTO `jitb_ingredients` VALUES(5, 'Lettuce', 'neutral', 1, 'lettuce');
INSERT INTO `jitb_ingredients` VALUES(6, 'Pickle', 'sour', 1, 'pickle');
INSERT INTO `jitb_ingredients` VALUES(7, 'Chilli Pepper ', 'spicy', 1, 'chillipepper');
INSERT INTO `jitb_ingredients` VALUES(9, 'Hot Sauce', 'spicy', 1, 'hotsauce');
INSERT INTO `jitb_ingredients` VALUES(10, 'Spicy Chicken Patty', 'spicy', 0, 'spicychickenpatty');
INSERT INTO `jitb_ingredients` VALUES(11, 'Apple', 'sweet', 1, 'apple');
INSERT INTO `jitb_ingredients` VALUES(12, 'Tomato', 'sweet', 1, 'tomato');
INSERT INTO `jitb_ingredients` VALUES(13, 'Bacon', 'sweet', 0, 'bacon');
INSERT INTO `jitb_ingredients` VALUES(14, 'Sauerkraut', 'sour', 1, 'sauerkraut');
INSERT INTO `jitb_ingredients` VALUES(15, 'Lemon Slice', 'sour', 1, 'lemonslice');
INSERT INTO `jitb_ingredients` VALUES(18, 'Olives', 'bitter', 1, 'olives');
INSERT INTO `jitb_ingredients` VALUES(19, 'Chicory', 'bitter', 1, 'chicory');
INSERT INTO `jitb_ingredients` VALUES(20, 'Citrus Peel', 'bitter', 1, 'citruspeel');
INSERT INTO `jitb_ingredients` VALUES(21, 'Balsamic Vinegar', 'bitter', 1, 'balsamicvinegar');
INSERT INTO `jitb_ingredients` VALUES(23, 'Beef Patty', 'neutral', 0, 'beefpatty');
INSERT INTO `jitb_ingredients` VALUES(24, 'Cheddar Cheese', 'neutral', 0, 'cheddarcheese');
INSERT INTO `jitb_ingredients` VALUES(25, 'Sliced Jalapenos', 'spicy', 1, 'slicedjalapenos');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_qrcodes`
--

CREATE TABLE `jitb_qrcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qrcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_qrcodes`
--


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
  `burger_id` int(11) unsigned NOT NULL DEFAULT '0',
  `burger_final_save` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `added_to_group` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `voted_tastes` varchar(255) NOT NULL,
  `burgervoted_id` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_users`
--

INSERT INTO `jitb_users` VALUES(1, 'bassie', 'bastiaan', 'andriessen', 'bastiaan.andriessen@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 90, 1, 0, '', '');
INSERT INTO `jitb_users` VALUES(20, 'bastiaan', 'Bastiaan', 'Andriessen2', 'bastiaan@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 90, 1, 0, '', '');
INSERT INTO `jitb_users` VALUES(21, 'blub', 'Bqsdf', 'Qsdf', 'qsdf@qsdf.sdf.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 90, 1, 0, '', '');
INSERT INTO `jitb_users` VALUES(22, 'kenny', 'Kenny', 'Blub', 'kenny@kenny.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 91, 1, 0, '', '');
INSERT INTO `jitb_users` VALUES(23, 'derp', 'Test', 'Tester', 'bastiaan.d@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 94, 1, 1, '', '');
INSERT INTO `jitb_users` VALUES(24, 'bqsdf', 'Bqsdf', 'Qsdf', 'bfdqs@herpes.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 94, 1, 1, '', '');
INSERT INTO `jitb_users` VALUES(41, 'pol', 'Pol', 'Ghh', 'pol@ihg.hh', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 94, 1, 1, '', '');
INSERT INTO `jitb_users` VALUES(42, 'test', 'Qsdf', 'Qsdf', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 97, 1, 0, '', '');
INSERT INTO `jitb_users` VALUES(43, 'derpina', 'Qsdf', 'Qsdfmlkj', 'derpina@derp.herp', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0, 0, '', '');
