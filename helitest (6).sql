-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mar. 22 juin 2021 à 12:52
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
  `mail_administrateur` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `jeton` varchar(255) NOT NULL,
  PRIMARY KEY (`mail_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`mail_administrateur`, `prenom`, `nom`, `mdp`, `jeton`) VALUES
('cecile.meynieux@free.fr', 'Cecile', 'Meynieux', '$2y$10$Auwbw7mMUQGTCk5oBwaOLOpVIlTTOkdrlcCvz2GniWk4ttLZwjIn.', '60b33a659f39a');

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
  `valider` tinyint(1) NOT NULL DEFAULT 0,
  `clef_confirmation` varchar(255) NOT NULL,
  `jeton` varchar(255) NOT NULL,
  PRIMARY KEY (`mail_candidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`mail_candidat`, `nom`, `prenom`, `mdp`, `date_naissance`, `numero_tel`, `genre`, `code_postal`, `valider`, `clef_confirmation`, `jeton`) VALUES
('Camille@gmail.com', 'Jourdan', 'Camille', 'tyvj', '2021-06-03', '0987654321', 'F', 34567, 1, '', ''),
('cecile.meynieux@eleve.isep.fr', 'Meynieux', 'Cécile', '$2y$10$f/BbHfWVkzcDD58Sxgn5UuAQvF6Al31jtNSHG4xRmbF1JudPzSAIO', '1998-03-28', '0633100256', 'F', 13122, 1, '90945295826925', '60b6155797c73'),
('francois@gmail.com', 'Renauld', 'francois', 'turebhj', '2000-06-07', '000000000', 'M', 12345, 1, '', ''),
('jean.pierre@gmail.com', 'Jean', 'Pierre', 'turebhj', '2000-06-07', '000000000', 'M', 12345, 1, '', ''),
('laura12@gmail.com', 'Dupont', 'Laura', 'tyvj', '2021-06-03', '0987654321', 'F', 34567, 1, '', ''),
('LenaDurand@gmail.com', 'Durand', 'Lena', 'tyvj', '2021-06-03', '0987654321', 'F', 34567, 1, '', ''),
('pv@gmail.com', 'Vidor', 'Paul', '$2y$10$cMwmP0ExShef7yMkG1nP8u/CfaZAiluqvjN.IRv6fL83WXv/uU0Yy', '1997-06-27', '0633100256', 'M', 75006, 1, '', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id_faq`, `theme`, `question`, `reponse`) VALUES
(3, 'Test', 'Quelles sont les épreuves ?', 'Il y a plusieurs types d\'épreuves qui visent à évaluer les reflex mais également la gestion du stress.'),
(4, 'Test', 'Comment se préparer aux épreuves ?', 'Aucune préparation n’est requise afin de se préparer à ces épreuves. En effet, il s’agit de compétences innées. '),
(5, 'Résultat', 'Pourquoi n’ai-je que les résultats aux différentes épreuves et pas le résultat final ? ', 'Le résultat final n’est communiqué qu’à la suite de la réception de tous les tests de candidats qui étaient prévus dans la session. Cependant, les résultats aux différentes épreuves sont communiqués instantanément au candidat. '),
(6, 'Résultat', 'Puis-je repasser les épreuves en cas de non succès ?', 'Vous pouvez repasser jusqu’à trois fois les tests, en étant âgé de moins de 32 ans. En cas de nos succès aux différents tests lors de trois sessions, vous n’aurez plus la capacité de postuler pour devenir pilote d’hélicoptère.'),
(7, 'Résultat', 'Comment sont définis les seuils de validation des épreuves ?', 'Les seuils sont définis par les valeurs standard attendu pour un pilote d\'hélicoptère. Cependant, si le nombre de candidat ayant réussi est supérieur au nombre de place disponible, le recruteur à la possibilité de remonter les seuils pour ne garder que les meilleurs de la session. Il n\'a pas la possibilité de les abaisser.'),
(8, 'Informations personnelles', 'A quoi servent mes données personnelles ?', 'Les données personnelles sont stockées durant dix ans par l’armée. Cela permet d’effectuer des statistiques afin de s’adapter aux candidats et de mettre à jour régulièrement les tests. '),
(9, 'Informations personnelles ', 'Quels sont mes droits ? ', 'Vous avez droits de demander une suppression de l’ensemble de vos données personnelles stockées numériquement comme le prévoit la loi. Ainsi, veuillez contacter le support, grâce à l’onglet « contact» afin de faire valoir vos droits. Une réponse vous sera adressé une fois que l’opération aura été effectuée. '),
(20, 'Informations personnelles', 'BOnjour', 'Bonjour');

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
  `jeton` varchar(255) NOT NULL,
  PRIMARY KEY (`mail_recruteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`mail_recruteur`, `nom`, `prenom`, `mdp`, `jeton`) VALUES
('marie.mottier@gmail.com', 'Mottier', 'Marie', '$2y$10$InE6xQzHXPcCuVP60vIIYe1Be.5vtv36NcK.zskE7a3FVGf8smsB6', ''),
('meynieux.cecile@gmail.com', 'Meynieux', 'Cécile', '$2y$10$mhA9gqB0shzpD2IWkNtfteECGzAxoM9AhElOB9OF.ORqHLS7FyxF6', '0');

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
  `session_finie` varchar(255) NOT NULL DEFAULT 'En cours',
  PRIMARY KEY (`id_session`),
  KEY `mail_recruteur` (`mail_recruteur`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `session_test`
--

INSERT INTO `session_test` (`id_session`, `mail_recruteur`, `seuil_frequence_cardiaque_h`, `seuil_frequence_cardiaque_f`, `seuil_temperature`, `seuil_tonalite`, `seuil_dif_frequence_cardiaque`, `seuil_dif_temperature`, `seuil_stimulus_audio`, `seuil_stimulus_visuel`, `session_finie`) VALUES
(1, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'Finie'),
(5, 'marie.mottier@gmail.com', 75, 80, 32, 70, 20, 10, 225, 250, 'En cours'),
(6, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 245, 'Finie'),
(7, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(8, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(9, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(10, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(11, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(12, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'Finie'),
(13, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(14, 'marie.mottier@gmail.com', 75, 80, 30, 70, 20, 10, 225, 250, 'Finie');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `mail_candidat` varchar(255) NOT NULL,
  `id_session` int(11) NOT NULL,
  `date_test` date NOT NULL DEFAULT current_timestamp(),
  `frequence_cardiaque` double DEFAULT NULL,
  `temperature` double DEFAULT NULL,
  `tonalite` double DEFAULT NULL,
  `frequence_cardiaque_bis` double DEFAULT NULL,
  `temperature_bis` double DEFAULT NULL,
  `stimulus_visuel` double DEFAULT NULL,
  `stimulus_audio` double DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  UNIQUE KEY `mail_candidat` (`mail_candidat`),
  KEY `id_session` (`id_session`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id_test`, `mail_candidat`, `id_session`, `date_test`, `frequence_cardiaque`, `temperature`, `tonalite`, `frequence_cardiaque_bis`, `temperature_bis`, `stimulus_visuel`, `stimulus_audio`) VALUES
(1, 'pv@gmail.com', 1, '2021-05-30', 71, 29, 13, 68, 31, 20, 10),
(2, 'Camille@gmail.com', 1, '2021-06-02', 75, 27, 80, 89, 29, 256, 235),
(6, 'cecile.meynieux@eleve.isep.fr', 13, '2021-06-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
