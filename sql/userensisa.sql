-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Juin 2017 à 16:48
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
-- Structure de la table `userensisa`
--

CREATE TABLE `userensisa` (
  `id` int(11) NOT NULL,
  `mail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `filiere` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annee` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `userensisa`
--

INSERT INTO `userensisa` (`id`, `mail`, `statut`, `filiere`, `annee`) VALUES
(1, 'louis.planes@uha.fr', 'etudiant', 'Informatique', '1A'),
(2, 'fanny.ringler@uha.fr', 'etudiant', 'Informatique', '1A'),
(3, 'florian.jaby@uha.fr', 'etudiant', 'Informatique', '1A');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `userensisa`
--
ALTER TABLE `userensisa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `userensisa`
--
ALTER TABLE `userensisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
