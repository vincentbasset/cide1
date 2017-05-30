-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 30 Mai 2017 à 17:06
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cide`
--

-- --------------------------------------------------------

--
-- Structure de la table `affiche`
--

CREATE TABLE `affiche` (
  `idGroupe` int(11) NOT NULL,
  `idPost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idUtil` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `droit` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'membre'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartient`
--

INSERT INTO `appartient` (`idUtil`, `idGroupe`, `droit`) VALUES
(1, 1, 'membre'),
(2, 1, 'membre'),
(3, 1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

CREATE TABLE `ecrit` (
  `idUtil` int(11) NOT NULL,
  `idPost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ecrit`
--

INSERT INTO `ecrit` (`idUtil`, `idPost`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `type`, `description`) VALUES
(1, 'info-1A', 'default', 'filière informatique première année');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `visibilite` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `visibilite`, `importance`, `message`, `datepost`) VALUES
(1, 1, 1, 'message public et important', '2017-05-30 12:32:19'),
(2, 0, 0, 'message non privée et non important', '2017-05-30 12:32:19'),
(3, 0, 1, 'message privée mais important', '2017-05-30 12:33:04'),
(4, 1, 0, 'message public mais non important', '2017-05-30 12:33:04'),
(5, 1, 1, 'partielle 1A info incomming', '2017-05-30 12:45:46'),
(6, 1, 0, 'message public non important de la part de votre délégué', '2017-05-30 12:45:46');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/profil.jpg',
  `statut` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `filiere` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annee` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaissance` date NOT NULL,
  `cv` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `motdepasse`, `photo`, `statut`, `filiere`, `annee`, `datenaissance`, `cv`) VALUES
(1, 'Basset', 'Vincent', 'vincent.basset@uha.fr', 'jacquesetsunsalopard', 'image/profil.jpg', 'etudiant', 'info', '1A', '1995-07-01', NULL),
(2, 'Vernay', 'Jacques', 'jacques.vernay@uha.fr', 'vincentestmondieu', 'image/profil.jpg', 'etudiant', 'info', '1A', '1995-01-30', NULL),
(3, 'Planes', 'Louis', 'louis.planes@uha.fr', 'ichwill', 'image/profil-louis-planes.jpg', 'etudiant', 'info', '1A', '1996-09-04', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `affiche`
--
ALTER TABLE `affiche`
  ADD PRIMARY KEY (`idGroupe`,`idPost`),
  ADD UNIQUE KEY `idPost` (`idPost`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idUtil`,`idGroupe`);

--
-- Index pour la table `ecrit`
--
ALTER TABLE `ecrit`
  ADD PRIMARY KEY (`idUtil`,`idPost`),
  ADD UNIQUE KEY `idPost` (`idPost`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
