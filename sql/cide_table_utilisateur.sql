
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
  `cv` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `motdepasse`, `photo`, `statut`, `filiere`, `annee`, `datenaissance`, `cv`, `description`) VALUES
(114, 'Jaby', 'Florian', 'florian.jaby@uha.fr', '$2y$10$KfOHCf50iT6.kVLQhxxxW.rAs63U5z46lx/uaOcXzJKX8DFBuffLy', 'image/photo_id=114.jpg', 'etudiant', 'Informatique', '1A', '25/10/1994', NULL, 'Je suis le plus beau!'),
(115, 'Ringler', 'Fanny', 'fanny.ringler@uha.fr', '$2y$10$h9KU0OvwWsca4YiyXUz4X.ax01IFhczTnzvzlC4jzxFNilMXrImYa', 'image/photo_id=115.jpg', 'etudiant', 'Informatique', '1A', '15/01/1996', 'cv/cv_id=115.pdf', 'Je suis folle!'),
(116, 'Basset', 'Vincent', 'vincent.basset@uha.fr', '$2y$10$Np.G/pzLaJ/YnKVRaPuN6.IjH.IC12WxP73yIkp8cayVp/hyvL482', 'image/profil.jpg', 'etudiant', 'Informatique', '1A', '01/07/1995', NULL, NULL),
(1, 'Alliot', 'Patrick', 'p.a@uha.fr', '$2y$10$xU60EZZYldJnDJyI1DE.xevRe1wjNxIEjZgQ2EqNCZVK1d6dvj.qu', 'image/profil.jpg', 'Administration', NULL, NULL, '01/01/1960', NULL, NULL);
