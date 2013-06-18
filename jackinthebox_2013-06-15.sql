-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 Jun 2013 om 22:53
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
  `added_ingredients_ids` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgers`
--

INSERT INTO `jitb_burgers` VALUES(47, NULL, 'bitter', 0, 0, '5');
INSERT INTO `jitb_burgers` VALUES(48, NULL, 'sweet', 0, 0, '2');
INSERT INTO `jitb_burgers` VALUES(49, NULL, 'sweet', 0, 0, '1');
INSERT INTO `jitb_burgers` VALUES(50, NULL, 'sweet', 0, 0, '1');
INSERT INTO `jitb_burgers` VALUES(65, NULL, 'spicy', 0, 0, '9');
INSERT INTO `jitb_burgers` VALUES(66, NULL, 'bitter', 0, 0, '5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jitb_burgersingredients`
--

CREATE TABLE `jitb_burgersingredients` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `burger_id` tinyint(4) NOT NULL,
  `ingredient_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgersingredients`
--

INSERT INTO `jitb_burgersingredients` VALUES(47, 54, 24);
INSERT INTO `jitb_burgersingredients` VALUES(48, 55, 23);
INSERT INTO `jitb_burgersingredients` VALUES(49, 56, 1);
INSERT INTO `jitb_burgersingredients` VALUES(50, 57, 5);
INSERT INTO `jitb_burgersingredients` VALUES(60, 65, 9);
INSERT INTO `jitb_burgersingredients` VALUES(61, 66, 5);

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
INSERT INTO `jitb_ingredients` VALUES(8, 'Pepper Jack Cheese', 'spicy', 1, 'pepperjackcheese');
INSERT INTO `jitb_ingredients` VALUES(9, 'Hot Sauce', 'spicy', 1, 'hotsauce');
INSERT INTO `jitb_ingredients` VALUES(10, 'Spicy Chicken Patty', 'spicy', 0, 'spicychickenpatty');
INSERT INTO `jitb_ingredients` VALUES(11, 'Apple', 'sweet', 1, 'apple');
INSERT INTO `jitb_ingredients` VALUES(12, 'Tomato', 'sweet', 1, 'tomato');
INSERT INTO `jitb_ingredients` VALUES(13, 'Bacon', 'sweet', 0, 'bacon');
INSERT INTO `jitb_ingredients` VALUES(14, 'Sauerkraut', 'sour', 1, 'sauerkraut');
INSERT INTO `jitb_ingredients` VALUES(15, 'Lemon Slice', 'sour', 1, 'lemonslice');
INSERT INTO `jitb_ingredients` VALUES(16, 'Sour Cream', 'sour', 1, 'sourcream');
INSERT INTO `jitb_ingredients` VALUES(17, 'Sauerbraten Patty', 'sour', 0, 'sauerbratenpatty');
INSERT INTO `jitb_ingredients` VALUES(18, 'Olives', 'bitter', 1, 'olives');
INSERT INTO `jitb_ingredients` VALUES(19, 'Chicory', 'bitter', 1, 'chicory');
INSERT INTO `jitb_ingredients` VALUES(20, 'Citrus Peel', 'bitter', 1, 'citruspeel');
INSERT INTO `jitb_ingredients` VALUES(21, 'Balsamic Vinegar', 'bitter', 1, 'balsamicvinegar');
INSERT INTO `jitb_ingredients` VALUES(22, 'Smoked Pork Patty', 'bitter', 0, 'smokedporkpatty');
INSERT INTO `jitb_ingredients` VALUES(23, 'Beef Patty', 'neutral', 0, 'beefpatty');
INSERT INTO `jitb_ingredients` VALUES(24, 'Cheddar Cheese', 'neutral', 0, 'cheddarcheese');
INSERT INTO `jitb_ingredients` VALUES(25, 'Sliced Jalapenos', 'spicy', 1, 'slicedjalapenos');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_users`
--

INSERT INTO `jitb_users` VALUES(1, 'bassie', 'bastiaan', 'andriessen', 'bastiaan.andriessen@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 47, 1, 0);
INSERT INTO `jitb_users` VALUES(20, 'bastiaan', 'Bastiaan', 'Andriessen2', 'bastiaan@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 50, 0, 0);
INSERT INTO `jitb_users` VALUES(21, 'blub', 'Bqsdf', 'Qsdf', 'qsdf@qsdf.sdf.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 50, 0, 1);
INSERT INTO `jitb_users` VALUES(22, 'kenny', 'Kenny', 'Blub', 'kenny@kenny.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 66, 0, 0);
INSERT INTO `jitb_users` VALUES(23, 'derp', 'Test', 'Tester', 'bastiaan.d@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 49, 0, 0);
INSERT INTO `jitb_users` VALUES(24, 'bqsdf', 'Bqsdf', 'Qsdf', 'bfdqs@herpes.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 49, 0, 0);
INSERT INTO `jitb_users` VALUES(40, 'pol', 'Pol', 'Qsdf', 'pol@drol.de', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 65, 0, 0);
