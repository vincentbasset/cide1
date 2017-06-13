
-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `icone` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/icone.jpg',
  `accepte` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `type`, `description`, `icone`, `accepte`) VALUES
(8, 'Informatique-1A', 'defaut', '', 'image/icone.jpg', 1),
(7, 'Master-automatique', 'defaut', '', 'image/icone.jpg', 1),
(6, 'Master-mécanique', 'defaut', '', 'image/icone.jpg', 1),
(5, 'Master-cge', 'defaut', '', 'image/icone.jpg', 1),
(4, 'Professeur', 'defaut', 'Professeur de l\'ENSISA', 'image/icone.jpg', 1),
(3, 'Technique', 'defaut', 'Techniciens de l\'ENSISA', 'image/icone.jpg', 1),
(2, 'Administration', 'defaut', 'Administration de l\'ENSISA', 'image/icone.jpg', 1),
(1, 'ENSISA', 'defaut', 'Ecole National Supérieur d\'Ingénieurs Sud Alsace', 'image/icone.jpg', 1),
(9, 'Informatique-2A', 'defaut', '', 'image/icone.jpg', 1),
(10, 'Informatique-3A', 'defaut', '', 'image/icone.jpg', 1),
(11, 'Automatique-1A', 'defaut', '', 'image/icone.jpg', 1),
(12, 'Automatique-2A', 'defaut', '', 'image/icone.jpg', 1),
(13, 'Automatique-3A', 'defaut', '', 'image/icone.jpg', 1),
(14, 'Mécanique-1A', 'defaut', '', 'image/icone.jpg', 1),
(15, 'Mécanique-2A', 'defaut', '', 'image/icone.jpg', 1),
(16, 'Mécanique-3A', 'defaut', '', 'image/icone.jpg', 1),
(17, 'Textile-1A', 'defaut', '', 'image/icone.jpg', 1),
(18, 'Textile-2A', 'defaut', '', 'image/icone.jpg', 1),
(19, 'Textile-3A', 'defaut', '', 'image/icone.jpg', 1),
(20, 'Fip-1A', 'defaut', '', 'image/icone.jpg', 1),
(21, 'Fip-2A', 'defaut', '', 'image/icone.jpg', 1),
(22, 'Fip-3A', 'defaut', '', 'image/icone.jpg', 1),
(23, 'Prépa-1A', 'defaut', '', 'image/icone.jpg', 1),
(24, 'Prépa-2A', 'defaut', '', 'image/icone.jpg', 1),
(25, 'Ancien', 'defaut', '', 'image/icone.jpg', 1),
(26, 'BDE', 'defaut', 'Bureau des élèves de l\'ENSISA', 'image/icone_id=115.jpg', 1),
(56, 'coucou tu veux voir...', 'prive', 'ma cape?', 'image/icone.jpg', 1);
