
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
(1, 'info-1A', 'defaut', 'filière informatique première année', 'image/icone.jpg'),
(2, 'BDE', 'defaut', 'Bureau Des Eleves', 'image/icone.jpg'),
(3, 'IARISS', 'officiel', 'Junior de l\'ENSISA', 'image/icone.jpg'),
(4, 'BDS', 'officiel', 'Bureau Des Sport', 'image/icone.jpg'),
(7, 'croustibat', 'prive', 'qui peut te battre', 'image/icone.jpg'),
(6, 'salit', 'public', 'salut', 'image/icone.jpg'),
(8, 'moihahaha', 'prive', 'mon groupe a moi', 'image/icone.jpg'),
(9, 'informatique-1A', 'officiel', 'filière informatique et réseaux première années', 'image/icone.jpg'),
(10, 'professeur', 'defaut', 'prof', 'image/icone.jpg'),
(11, 'prepa', 'defaut', 'prepa integrer', 'image/icone.jpg');
