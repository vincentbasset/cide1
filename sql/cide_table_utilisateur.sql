
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
(115, 'Ringler', 'Fanny', 'fanny.ringler@uha.fr', '$2y$10$Rb.Z1jkj455qwY19atVeteh6W5YNNozkIyJp7gIGKxTIW5OikehrS', 'image/photo_id=115.jpg', 'etudiant', 'Informatique', '1A', '15/01/1996', NULL, 'Soyez les bienvenues'),
(116, 'Basset', 'Vincent', 'vincent.basset@uha.fr', '$2y$10$Np.G/pzLaJ/YnKVRaPuN6.IjH.IC12WxP73yIkp8cayVp/hyvL482', 'image/photo_id=116.jpg', 'etudiant', 'Informatique', '1A', '01/07/1995', NULL, NULL),
(1, 'Directeur', 'Directeur', 'p.a@uha.fr', '$2y$10$VbcSAVK7klAveW.Vrmz/kembS294EVbsw/61RWJcwQN85Am/K4IEi', 'image/profil.jpg', 'Administration', NULL, NULL, '01/01/1960', NULL, NULL),
(118, 'Vernay', 'Jacques', 'Jacques.vernay@uha.fr', '$2y$10$8BlHK2ugCVKebbbYhHPGYeAZySRM0gBtZ9HD.zzmRkXQxGz0TlFP.', 'image/photo_id=118.jpg', 'etudiant', 'Informatique', '1A', '30/01/1995', NULL, NULL),
(119, 'Planes', 'Louis', 'louis.planes@uha.fr', '$2y$10$xMWEFcDVGnS0gyMn1qiRfukVKfMYELObceHxyJlc974qZpumL1fpy', 'image/photo_id=119.jpg', 'etudiant', 'Informatique', '1A', '1996-10-04', NULL, NULL);
