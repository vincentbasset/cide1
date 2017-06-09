
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
  `filiere` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annee` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaissance` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cv` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `motdepasse`, `photo`, `statut`, `filiere`, `annee`, `datenaissance`, `cv`) VALUES
(117, 'truc', 'truc', 'merd@uh.fr', 'ert', 'image/profil.jpg', 'etudiant', NULL, NULL, '', NULL),
(116, 'Vernay', 'Jacques', 'truc@uha.fr', '$2y$10$BtbVr7eSq7wF.NFo1hSFRea4aWEm/fLkZcZyY3tuGqblCNYr.Sa9S', 'image/profil.jpg', 'etudiant', 'Informatique', '1A', '1995-01-30', NULL),
(115, 'zd', 'zd', 'zd@zd.zd', '$2y$10$T02pBTlSPfbRTMUQA1z1wuj4XBxwLNcpHNEdNES5deEsnArRZDLr2', 'image/profil.jpg', 'Professeur', NULL, NULL, '2017-05-30', NULL),
(114, 'bn', 'bn', 'bn@bn.bn', '$2y$10$l4dg8ub3JvYHMW9VVT1/2.fLcavZvi6raB71C/GJUZVk0S5MzuJYG', 'image/profil.jpg', 'Professeur', NULL, NULL, '2017-05-31', NULL);
