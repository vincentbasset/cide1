
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

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `idUtil`, `idGroupe`, `idUtilmur`, `idPost`, `visibilite`, `importance`, `message`, `url`, `datepost`) VALUES
(1, 115, 1, 0, 0, 0, 0, 'coucou', '', '2017-06-06 17:54:06'),
(2, 115, 1, 0, 0, 0, 0, 'salut', '', '2017-06-06 17:56:40');
