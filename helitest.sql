-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  lun. 03 mai 2021 à 19:11
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
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  PRIMARY KEY (`mail_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`mail_admin`, `prenom`, `nom`, `mdp`) VALUES
('cecile.meynieux@free.fr', 'Cecile', 'Meynieux', '$2y$10$tMvDpQMUfUdscJZ3U1VF9e838zyaKdXTkGT1Yp7il6EsaM41apjHu');

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

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`mail_candidat`, `nom`, `prenom`, `mdp`, `date_naissance`, `numero_tel`, `genre`, `code_postal`) VALUES
('pconde@isep.fr', 'Conde-CESPESDES', 'Patricia', '$2y$10$CbZF.PyXgQ5EGcfRUQ0IL.e1rTjqY6pTTAOTVEXXDivAWYylAwYvi', '2000-10-11', '0633100256', 'F', 75006),
('pv@gmail.com', 'Vidor', 'Paul', '$2y$10$d0DlgNacFN.NgMaAPV3.9.XmpAe4U9LiFTAOAQB0LT8C8w5EZe1vS', '1997-06-27', '0633100256', 'M', 75467),
('R.h@free.fr', 'Henry', 'Robin', '$2y$10$ou2LJ/qekAy.0002WnKa9.9wjQFrYRK.MJmIl3v2cN2h8lEf49.bK', '1999-02-28', '0834543212', 'M', 13122);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(128) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id_faq`, `theme`, `question`, `reponse`) VALUES
(1, 'Test', 'Où se déroulent les tests ?', 'Les test ne s\'effectuent qu\'en présentiel au Centre d\'Information et de Recrutement des Forces Armées (CIRFA) le plus proche de chez vous après une prise de rendez-vous avec un recruteur.'),
(2, 'Test', 'Comment se déroule un test ?', 'Un test dure une quinzaine de minutes durant lesquels plusieurs épreuves auront lieu. Un boîtier électronique est utilisé pour faire un test.'),
(3, 'Test', 'Quelles sont les épreuves ?', 'Il y a plusieurs types d\'épreuves qui visent à évaluer les reflex mais également la gestion du stress.'),
(4, 'Test', 'Comment se préparer aux épreuves ?', 'Aucune préparation n’est requise afin de se préparer à ces épreuves. En effet, il s’agit de compétences innées. '),
(5, 'Résultat', 'Pourquoi n’ai-je que les résultats aux différentes épreuves et pas le résultat final ? ', 'Le résultat final n’est communiqué qu’à la suite de la réception de tous les tests de candidats qui étaient prévus dans la session. Cependant, les résultats aux différentes épreuves sont communiqués instantanément au candidat. '),
(6, 'Résultat', 'Puis-je repasser les épreuves en cas de non succès ?', 'Vous pouvez repasser jusqu’à trois fois les tests, en étant âgé de moins de 32 ans. En cas de nos succès aux différents tests lors de trois sessions, vous n’aurez plus la capacité de postuler pour devenir pilote d’hélicoptère.'),
(7, 'Résultat', 'Comment sont définis les seuils de validation des épreuves ?', 'Les seuils sont définis par les valeurs standard attendu pour un pilote d\'hélicoptère. Cependant, si le nombre de candidat ayant réussi est supérieur au nombre de place disponible, le recruteur à la possibilité de remonter les seuils pour ne garder que les meilleurs de la session. Il n\'a pas la possibilité de les abaisser.'),
(8, 'Informations personnelles', 'A quoi servent mes données personnelles ?', 'Les données personnelles sont stockées durant dix ans par l’armée. Cela permet d’effectuer des statistiques afin de s’adapter aux candidats et de mettre à jour régulièrement les tests. '),
(9, 'Informations personnelles ', 'Quels sont mes droits ? ', 'Vous avez droits de demander une suppression de l’ensemble de vos données personnelles stockées numériquement comme le prévoit la loi. Ainsi, veuillez contacter le support, grâce à l’onglet « contact» afin de faire valoir vos droits. Une réponse vous sera adressé une fois que l’opération aura été effectuée. ');

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

DROP TABLE IF EXISTS `recruteur`;
CREATE TABLE IF NOT EXISTS `recruteur` (
  `mail_recruteur` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`mail_recruteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`mail_recruteur`, `nom`, `prenom`, `mdp`) VALUES
('marie.mottier@gmail.com', 'Mottier', 'Marie', '$2y$10$InE6xQzHXPcCuVP60vIIYe1Be.5vtv36NcK.zskE7a3FVGf8smsB6');

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
