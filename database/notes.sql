-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 jan. 2022 à 20:39
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `simple_note_book`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` int NOT NULL AUTO_INCREMENT,
  `note_titre` varchar(100) DEFAULT NULL,
  `note_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `favorite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`note_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`note_id`, `note_titre`, `note_body`, `add_time`, `user_id`, `archived`, `favorite`) VALUES
(56, 'qsjmkfgjqsklf', 'lsjfg', '2022-01-24 20:14:41', 4, 1, 1),
(57, 'w!lsdkfnv', ';wx!jvn', '2022-01-24 20:20:24', 4, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
