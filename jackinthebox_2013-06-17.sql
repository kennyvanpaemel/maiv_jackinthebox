-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 17 Jun 2013 om 10:58
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Gegevens worden uitgevoerd voor tabel `jitb_burgers`
--

