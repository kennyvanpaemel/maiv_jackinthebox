-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 13 Jun 2013 om 13:37
-- Serverversie: 5.5.9
-- PHP-Versie: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jackinthebox`
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
  `burger_id` int(11) NOT NULL DEFAULT '0',
  `burger_final_save` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_users`
--

INSERT INTO `jitb_users` VALUES(1, 'bassie', 'bastiaan', 'andriessen', 'bastiaan.andriessen@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 1);
INSERT INTO `jitb_users` VALUES(20, 'bastiaan', 'Qsdf', 'Qsdf', 'bastiaan@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(21, 'blub', 'Bqsdf', 'Qsdf', 'qsdf@qsdf.sdf.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
INSERT INTO `jitb_users` VALUES(22, 'kenny', 'Kenny', 'Blub', 'kenny@kenny.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 0);
