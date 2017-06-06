
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
(2, 'IARISS', 'officiel', 'iariss', 'image/icone.jpg'),
(1, 'info-1A', 'defaut', 'info-1A', 'image/icone.jpg');
