
-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `idUtil` int(11) NOT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `idUtilmur` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `visibilite` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
