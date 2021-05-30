-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2021 at 08:58 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `helitest`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `mail_administrateur` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `mdp` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`mail_administrateur`, `prenom`, `nom`, `mdp`) VALUES
('cecile.meynieux@free.fr', 'Cecile', 'Meynieux', '$2y$10$tMvDpQMUfUdscJZ3U1VF9e838zyaKdXTkGT1Yp7il6EsaM41apjHu');


-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

CREATE TABLE `candidat` (
  `mail_candidat` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `numero_tel` varchar(64) NOT NULL,
  `genre` char(1) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `valider` tinyint(1) NOT NULL DEFAULT '0',
  `clef_confirmation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidat`
--

INSERT INTO `candidat` (`mail_candidat`, `nom`, `prenom`, `mdp`, `date_naissance`, `numero_tel`, `genre`, `code_postal`, `valider`, `clef_confirmation`) VALUES
('cecile.meynieux@eleve.isep.fr', 'Meynieux', 'Cécile', '$2y$10$BEJMiosCMzdSaaDYlxgFYOHjdk00s1jwTNSPqwESpYh8vKq/HOy3u', '1998-03-28', '0633100256', 'F', 13122, 1, '90945295826925'),
('fz@gmail.com', 'tg', 'tg', '$2y$10$XW.H8rCAMIT3sf3IchTQ3OEpdCNh.KYtSmbKnXlklhjcMWGyvXMe6', '2000-05-07', '0659818876', 'F', 9876, 0, '07623615630435'),
('pconde@isep.fr', 'Conde-CESPESDES', 'Patricia', '$2y$10$CbZF.PyXgQ5EGcfRUQ0IL.e1rTjqY6pTTAOTVEXXDivAWYylAwYvi', '2000-10-11', '0633100256', 'F', 75006, 0, ''),
('pv@gmail.com', 'Vidor', 'Paul', '$2y$10$cMwmP0ExShef7yMkG1nP8u/CfaZAiluqvjN.IRv6fL83WXv/uU0Yy', '1997-06-27', '0633100256', 'M', 75467, 0, ''),
('R.h@free.fr', 'Henry', 'Robin', '$2y$10$ou2LJ/qekAy.0002WnKa9.9wjQFrYRK.MJmIl3v2cN2h8lEf49.bK', '1999-02-28', '0834543212', 'M', 13122, 0, ''),
('ze@gmail.com', 'eg', 'eg', '$2y$10$BWPT7LngEQJycF3AnbcMeegMcZ6I8ya/xTeYPE4qpWqWs6Aa.bxum', '2000-05-20', '0659818876', 'F', 98767, 0, '79534421839778');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `theme` varchar(128) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
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
(9, 'Informations personnelles ', 'Quels sont mes droits ? ', 'Vous avez droits de demander une suppression de l’ensemble de vos données personnelles stockées numériquement comme le prévoit la loi. Ainsi, veuillez contacter le support, grâce à l’onglet « contact» afin de faire valoir vos droits. Une réponse vous sera adressé une fois que l’opération aura été effectuée. '),
(17, 'Informations personnelles', 'salut', 'tipi');

-- --------------------------------------------------------

--
-- Table structure for table `recruteur`
--

CREATE TABLE `recruteur` (
  `mail_recruteur` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recruteur`
--

INSERT INTO `recruteur` (`mail_recruteur`, `nom`, `prenom`, `mdp`) VALUES
('marie.mottier@gmail.com', 'Mottier', 'Marie', '$2y$10$InE6xQzHXPcCuVP60vIIYe1Be.5vtv36NcK.zskE7a3FVGf8smsB6');

-- --------------------------------------------------------

--
-- Table structure for table `session_test`
--

CREATE TABLE `session_test` (
  `id_session` int(11) NOT NULL,
  `mail_recruteur` varchar(255) NOT NULL,
  `seuil_frequence_cardiaque_h` int(11) NOT NULL DEFAULT '75',
  `seuil_frequence_cardiaque_f` int(11) NOT NULL DEFAULT '80',
  `seuil_temperature` int(11) NOT NULL DEFAULT '35',
  `seuil_tonalite` int(11) NOT NULL DEFAULT '70',
  `seuil_dif_frequence_cardiaque` int(11) NOT NULL DEFAULT '20',
  `seuil_dif_temperature` int(11) NOT NULL DEFAULT '10',
  `seuil_stimulus_audio` int(11) NOT NULL DEFAULT '225',
  `seuil_stimulus_visuel` int(11) NOT NULL DEFAULT '250',
  `session_finie` varchar(255) NOT NULL DEFAULT 'En cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session_test`
--

INSERT INTO `session_test` (`id_session`, `mail_recruteur`, `seuil_frequence_cardiaque_h`, `seuil_frequence_cardiaque_f`, `seuil_temperature`, `seuil_tonalite`, `seuil_dif_frequence_cardiaque`, `seuil_dif_temperature`, `seuil_stimulus_audio`, `seuil_stimulus_visuel`, `session_finie`) VALUES
(1, 'marie.mottier@gmail.com', 75, 80, 35, 70, 20, 10, 225, 250, 'En cours'),
(5, 'marie.mottier@gmail.com', 75, 80, 32, 70, 20, 10, 225, 250, 'En cours');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `mail_candidat` varchar(255) NOT NULL,
  `id_session` int(11) NOT NULL,
  `date_test` date NOT NULL,
  `frequence_cardiaque` double NOT NULL,
  `temperature` double NOT NULL,
  `tonalite` double NOT NULL,
  `frequence_cardiaque_bis` double NOT NULL,
  `temperature_bis` double NOT NULL,
  `stimulus_visuel` double NOT NULL,
  `stimulus_audio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `mail_candidat`, `id_session`, `date_test`, `frequence_cardiaque`, `temperature`, `tonalite`, `frequence_cardiaque_bis`, `temperature_bis`, `stimulus_visuel`, `stimulus_audio`) VALUES
(1, 'pv@gmail.com', 1, '2021-05-30', 71, 29, 13, 68, 31, 20, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`mail_administrateur`);

--
-- Indexes for table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`mail_candidat`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`mail_recruteur`);

--
-- Indexes for table `session_test`
--
ALTER TABLE `session_test`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `mail_recruteur` (`mail_recruteur`) USING BTREE;

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD UNIQUE KEY `mail_candidat` (`mail_candidat`),
  ADD KEY `id_session` (`id_session`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `session_test`
--
ALTER TABLE `session_test`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `session_test`
--
ALTER TABLE `session_test`
  ADD CONSTRAINT `session_test_ibfk_1` FOREIGN KEY (`mail_recruteur`) REFERENCES `recruteur` (`mail_recruteur`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`mail_candidat`) REFERENCES `candidat` (`mail_candidat`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`id_session`) REFERENCES `session_test` (`id_session`);
