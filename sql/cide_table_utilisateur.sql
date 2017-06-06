
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
(1, 'Basset', 'Vincent', 'vincent.basset@uha.fr', 'jacquesetsunsalopard', 'image/profil.jpg', 'etudiant', 'info', '1A', '1995-07-01', NULL),
(2, 'Vernay', 'Jacques', 'jacques.vernay@uha.fr', 'vincentestmondieu', 'image/profil.jpg', 'etudiant', 'info', '1A', '1995-01-30', NULL),
(3, 'Planes', 'Louis', 'louis.planes@uha.fr', 'ichwill', 'image/profil-louis-planes.jpg', 'etudiant', 'info', '1A', '1996-09-04', NULL),
(4, 'Fanny', 'Ringler', 'fanny.ringler@uha.fr', 'jesuisdaccordavecvincent', 'image/profil.jpg', 'etudiant', 'info', '1A', '1996-01-30', NULL),
(5, 'vergnaut', 'david', 'a@uh.fr', '$2y$10$inJjcWpVNxeh8a2t.cDEueRWC3WH8pohte06JyQoCXmF4YGn0YPcS', 'image/profil.jpg', 'etudiant', 'textile', NULL, '2017-05-31', NULL),
(6, 'polo', 'marco', 'polo@uha.fr', '$2y$10$aqmBCgzwGXRR4H4SEfERV.pNPfQX/UEewsAPBF4JaQFRfm5oahARq', 'image/profil.jpg', 'etudiant', 'informatique', '2A', '2017-06-14', NULL),
(97, 'JM', 'Perronne', 'p@uha.fr', '$2y$10$QHPWJxMHPNTYt3YMq88oaeQ4IJUdsakr28NF.ck1yKLjLryQCftZS', 'image/profil.jpg', 'professeur', NULL, NULL, '2017-01-01', NULL),
(95, 'a', 'a', 'a@a.a', '$2y$10$SVd1.cWTl0Q8cp6q0CB6qe3R7RfY0Nt1EzXzzme2dovSg4Epli9Te', 'image/profil.jpg', 'etudiant', 'informatique', '1A', '2017-12-31', NULL),
(99, 'fr', 'fr', 'fr@fr.fr', '$2y$10$0nHtUERRESG4ifoHyRUDUumMIrkyVLKLdgsHhA4UQLtsHNciAoJAu', 'image/profil.jpg', 'etudiant', 'informatique', '1A', '2017-06-01', NULL);
