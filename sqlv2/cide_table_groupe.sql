
-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `icone` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/icone.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `type`, `description`, `icone`) VALUES
(8, 'Informatique-1A', 'defaut', '', 'image/icone.jpg'),
(7, 'Master-automatique', 'defaut', '', 'image/icone.jpg'),
(6, 'Master-mécanique', 'defaut', '', 'image/icone.jpg'),
(5, 'Master-cge', 'defaut', '', 'image/icone.jpg'),
(4, 'Professeur', 'defaut', 'Professeur de l\'ENSISA', 'image/icone.jpg'),
(3, 'Technique', 'defaut', 'Techniciens de l\'ENSISA', 'image/icone.jpg'),
(2, 'Administration', 'defaut', 'Administration de l\'ENSISA', 'image/icone.jpg'),
(1, 'ENSISA', 'defaut', 'Ecole National Supérieur d\'Ingénieurs Sud Alsace', 'image/icone.jpg'),
(9, 'Informatique-2A', 'defaut', '', 'image/icone.jpg'),
(10, 'Informatique-3A', 'defaut', '', 'image/icone.jpg'),
(11, 'Automatique-1A', 'defaut', '', 'image/icone.jpg'),
(12, 'Automatique-2A', 'defaut', '', 'image/icone.jpg'),
(13, 'Automatique-3A', 'defaut', '', 'image/icone.jpg'),
(14, 'Mécanique-1A', 'defaut', '', 'image/icone.jpg'),
(15, 'Mécanique-2A', 'defaut', '', 'image/icone.jpg'),
(16, 'Mécanique-3A', 'defaut', '', 'image/icone.jpg'),
(17, 'Textile-1A', 'defaut', '', 'image/icone.jpg'),
(18, 'Textile-2A', 'defaut', '', 'image/icone.jpg'),
(19, 'Textile-3A', 'defaut', '', 'image/icone.jpg'),
(20, 'Fip-1A', 'defaut', '', 'image/icone.jpg'),
(21, 'Fip-2A', 'defaut', '', 'image/icone.jpg'),
(22, 'Fip-3A', 'defaut', '', 'image/icone.jpg'),
(23, 'Prépa-1A', 'defaut', '', 'image/icone.jpg'),
(24, 'Prépa-2A', 'defaut', '', 'image/icone.jpg'),
(25, 'Ancien', 'defaut', '', 'image/icone.jpg'),
(26, 'groupe test', 'prive', 'test 1 2 1 2', 'image/icone.jpg');
