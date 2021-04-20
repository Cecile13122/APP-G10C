-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mar. 20 avr. 2021 à 18:18
-- Version du serveur :  10.3.14-MariaDB
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `helitest`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `mail_admin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  PRIMARY KEY (`mail_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `mail_candidat` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `numero_tel` varchar(64) NOT NULL,
  `genre` char(1) NOT NULL,
  `code_postal` int(11) NOT NULL,
  PRIMARY KEY (`mail_candidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(128) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

DROP TABLE IF EXISTS `recruteur`;
CREATE TABLE IF NOT EXISTS `recruteur` (
  `mail_recruteur` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`mail_recruteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `session_test`
--

DROP TABLE IF EXISTS `session_test`;
CREATE TABLE IF NOT EXISTS `session_test` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `mail_recruteur` varchar(255) NOT NULL,
  `seuil_frequence_cardiaque_h` int(11) NOT NULL DEFAULT 75,
  `seuil_frequence_cardiaque_f` int(11) NOT NULL DEFAULT 80,
  `seuil_temperature` int(11) NOT NULL DEFAULT 35,
  `seuil_tonalite` int(11) NOT NULL DEFAULT 70,
  `seuil_dif_frequence_cardiaque` int(11) NOT NULL DEFAULT 20,
  `seuil_dif_temperature` int(11) NOT NULL DEFAULT 10,
  `seuil_stimulus_audio` int(11) NOT NULL DEFAULT 225,
  `seuil_stimulus_visuel` int(11) NOT NULL DEFAULT 250,
  PRIMARY KEY (`id_session`),
  UNIQUE KEY `mail_recruteur` (`mail_recruteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `mail_candidat` varchar(255) NOT NULL,
  `id_session` int(11) NOT NULL,
  `date_test` date NOT NULL,
  `frequence_cardiaque` double NOT NULL,
  `temperature` double NOT NULL,
  `tonalite` double NOT NULL,
  `frequence_cardiaque_bis` double NOT NULL,
  `temperature_bis` double NOT NULL,
  `stimulus_visuel` double NOT NULL,
  `stimulus_audio` double NOT NULL,
  PRIMARY KEY (`id_test`),
  UNIQUE KEY `mail_candidat` (`mail_candidat`),
  UNIQUE KEY `id_session` (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `session_test`
--
ALTER TABLE `session_test`
  ADD CONSTRAINT `session_test_ibfk_1` FOREIGN KEY (`mail_recruteur`) REFERENCES `recruteur` (`mail_recruteur`);

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`mail_candidat`) REFERENCES `candidat` (`mail_candidat`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`id_session`) REFERENCES `session_test` (`id_session`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
